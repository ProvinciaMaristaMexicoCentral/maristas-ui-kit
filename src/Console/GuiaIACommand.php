<?php

namespace Maristas\UiKit\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Maristas\UiKit\Docs\GuiaIA;

class GuiaIACommand extends Command
{
    protected $signature = 'maristas-ui:ia
        {--ruta= : Dónde escribir la guía (por defecto docs/maristas-ui.md)}
        {--resumen : Solo reglas, tokens, componentes y clases, sin ejemplos}
        {--agentes : Agrega un aviso en CLAUDE.md y AGENTS.md para que los asistentes lean la guía}';

    protected $description = 'Genera la guía en Markdown del Maristas UI Kit para asistentes de IA';

    protected const INICIO = '<!-- maristas-ui:inicio -->';

    protected const FIN = '<!-- maristas-ui:fin -->';

    public function handle(): int
    {
        $ruta = $this->option('ruta') ?: base_path('docs/maristas-ui.md');

        File::ensureDirectoryExists(dirname($ruta));
        File::put($ruta, GuiaIA::generar(! $this->option('resumen')));

        $this->components->info('Guía escrita en '.$ruta);

        if ($this->option('agentes')) {
            $this->enlazarAgentes($ruta);
        }

        return self::SUCCESS;
    }

    protected function enlazarAgentes(string $ruta): void
    {
        $relativa = ltrim(str_replace(base_path(), '', $ruta), '/');
        $archivos = array_filter([base_path('CLAUDE.md'), base_path('AGENTS.md')], 'is_file');

        if (! $archivos) {
            $archivos = [base_path('AGENTS.md')];
        }

        $bloque = self::INICIO."\n"
            ."## Interfaz de usuario\n\n"
            ."Toda pantalla nueva o modificada usa el Maristas UI Kit. Antes de escribir vistas lee `{$relativa}` y sigue sus reglas: componentes `x-maristas::*`, clases `.mr-*` y tokens `--maristas-*`; no inventes estilos.\n"
            .self::FIN;

        foreach ($archivos as $archivo) {
            $actual = is_file($archivo) ? File::get($archivo) : '';
            $patron = '/'.preg_quote(self::INICIO, '/').'.*?'.preg_quote(self::FIN, '/').'/s';

            $nuevo = preg_match($patron, $actual)
                ? preg_replace($patron, str_replace('$', '\\$', $bloque), $actual)
                : rtrim($actual)."\n\n".$bloque."\n";

            File::put($archivo, ltrim($nuevo));
            $this->components->info('Aviso actualizado en '.$archivo);
        }
    }
}
