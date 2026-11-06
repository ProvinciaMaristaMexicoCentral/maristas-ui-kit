<?php

namespace Maristas\UiKit\Console;

use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Maristas\UiKit\Docs\Catalogo;
use Maristas\UiKit\Docs\Indice;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Exporta la documentación del kit a HTML estático (para GitHub Pages u otro servidor de archivos).
 *
 * Pide cada página a la propia aplicación y la guarda como <slug>/index.html. Las direcciones se
 * reescriben con la ruta base donde se va a publicar, así la documentación no depende de PHP.
 */
class ExportarDocsCommand extends Command
{
    protected $signature = 'maristas-ui:exportar-docs
        {destino=_site : Carpeta donde se escribe el sitio (se vacía antes)}
        {--base= : Ruta donde se publicará, sin dominio (por ejemplo /maristas-ui-kit). Vacía si va en la raíz}';

    protected $description = 'Exporta la documentación del kit a HTML estático';

    /** Dominio ficticio con el que se genera el HTML; se sustituye por la ruta base. */
    protected const ORIGEN = 'http://maristas-docs.invalid';

    protected const ASSETS = ['maristas-ui.css', 'maristas-ui.js', 'maristas-docs.js', 'maristas-favicon.svg', 'maristas-logo.svg'];

    public function handle(): int
    {
        if (! Route::has('maristas-ui.docs')) {
            $this->components->error('La documentación solo existe en los entornos local y testing (config maristas-ui.docs.environments). Ejecútalo con: vendor/bin/testbench maristas-ui:exportar-docs');

            return self::FAILURE;
        }

        $base = trim((string) $this->option('base'), '/');
        $base = $base === '' ? '' : '/'.$base;
        $ruta = trim(config('maristas-ui.docs.route', 'ui-kit'), '/');
        $destino = rtrim($this->argument('destino'), '/');

        URL::forceRootUrl(self::ORIGEN);
        Indice::reiniciar();

        File::deleteDirectory($destino);
        File::ensureDirectoryExists($destino);

        $paginas = array_keys(Catalogo::paginas());

        foreach ($paginas as $slug) {
            $html = $this->pedir('/'.$ruta.($slug === 'introduccion' ? '' : '/'.$slug))->getContent();
            $html = $this->reescribir($html, $ruta, $base);

            if ($slug === 'introduccion') {
                File::put($destino.'/index.html', $html);
            } else {
                File::ensureDirectoryExists($destino.'/'.$slug);
                File::put($destino.'/'.$slug.'/index.html', $html);
            }
        }

        File::ensureDirectoryExists($destino.'/_assets');
        foreach (self::ASSETS as $archivo) {
            $respuesta = $this->pedir('/'.$ruta.'/_assets/'.$archivo);
            File::copy($respuesta->getFile()->getPathname(), $destino.'/_assets/'.$archivo);
        }

        File::put($destino.'/ia.md', $this->pedir('/'.$ruta.'/ia.md')->getContent());
        File::put($destino.'/ia-resumen.md', $this->pedir('/'.$ruta.'/ia.md?resumen=1')->getContent());
        File::put($destino.'/.nojekyll', '');

        $pendientes = collect(File::allFiles($destino))->filter(fn ($f) => str_contains($f->getContents(), 'maristas-docs.invalid'));
        if ($pendientes->isNotEmpty()) {
            $this->components->error('Quedaron direcciones sin reescribir en: '.$pendientes->map->getRelativePathname()->implode(', '));

            return self::FAILURE;
        }

        $this->components->info(count($paginas).' páginas exportadas en '.$destino.($base !== '' ? " (base {$base})" : ''));

        return self::SUCCESS;
    }

    protected function pedir(string $camino)
    {
        $respuesta = app(Kernel::class)->handle(Request::create(self::ORIGEN.$camino));

        if ($respuesta->getStatusCode() !== 200 && ! $respuesta instanceof BinaryFileResponse) {
            throw new \RuntimeException("{$camino} respondió {$respuesta->getStatusCode()}");
        }

        return $respuesta;
    }

    protected function reescribir(string $html, string $ruta, string $base): string
    {
        $raiz = self::ORIGEN.'/'.$ruta;

        $html = str_replace('data-mr-base="/'.$ruta.'"', 'data-mr-base="'.$base.'"', $html);
        $html = str_replace($raiz.'/ia.md?resumen=1', $base.'/ia-resumen.md', $html);
        $html = str_replace($raiz.'/ia.md', $base.'/ia.md', $html);
        // La raíz exacta (introducción) termina en comilla o ancla
        $html = preg_replace('#'.preg_quote($raiz, '#').'(?=["\'\#])#', $base.'/', $html);

        return str_replace($raiz.'/', $base.'/', $html);
    }
}
