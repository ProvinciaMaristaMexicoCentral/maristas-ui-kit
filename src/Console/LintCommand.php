<?php

namespace Maristas\UiKit\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Maristas\UiKit\Lint\Linter;
use Symfony\Component\Finder\Finder;

class LintCommand extends Command
{
    protected $signature = 'maristas-ui:lint
        {ruta? : Carpeta o archivo a revisar (por defecto resources/views)}
        {--estricto : Los avisos también hacen fallar el comando}';

    protected $description = 'Revisa las vistas Blade contra las reglas del Maristas UI Kit';

    public function handle(): int
    {
        $ruta = $this->argument('ruta') ?: resource_path('views');

        if (! file_exists($ruta)) {
            $this->components->error("No existe: {$ruta}");

            return self::FAILURE;
        }

        $excluir = array_map(fn ($c) => '/'.trim($c, '/').'/', (array) config('maristas-ui.lint.excluir', ['emails']));

        $archivos = is_file($ruta)
            ? [new \SplFileInfo($ruta)]
            : array_values(array_filter(
                iterator_to_array(Finder::create()->files()->in($ruta)->name('*.blade.php')->sortByName(), false),
                function ($f) use ($excluir) {
                    $camino = str_replace('\\', '/', $f->getPathname());

                    foreach ($excluir as $e) {
                        if (str_contains($camino, $e)) {
                            return false;
                        }
                    }

                    return true;
                }
            ));

        $linter = new Linter;
        $errores = $avisos = $conProblemas = 0;

        foreach ($archivos as $archivo) {
            $hallazgos = $linter->revisar(File::get($archivo->getPathname()));

            if (! $hallazgos) {
                continue;
            }

            $conProblemas++;
            $this->line('<options=bold>'.ltrim(str_replace(base_path(), '', $archivo->getPathname()), '/').'</>');

            foreach ($hallazgos as $h) {
                $esError = $h['nivel'] === Linter::ERROR;
                $esError ? $errores++ : $avisos++;
                $etiqueta = $esError ? '<fg=red>error</>' : '<fg=yellow>aviso</>';
                $this->line(sprintf('  línea %-4d %s  %s', $h['linea'], $etiqueta, $h['mensaje']));
            }

            $this->newLine();
        }

        if (! $errores && ! $avisos) {
            $this->components->info(count($archivos).' vistas revisadas: todo en orden.');

            return self::SUCCESS;
        }

        $this->line("{$errores} errores y {$avisos} avisos en {$conProblemas} de ".count($archivos).' vistas.');

        return ($errores || ($avisos && $this->option('estricto'))) ? self::FAILURE : self::SUCCESS;
    }
}
