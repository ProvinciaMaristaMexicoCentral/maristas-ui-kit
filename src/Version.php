<?php

namespace Maristas\UiKit;

use Composer\InstalledVersions;

/**
 * Versión del kit para mostrarla en la documentación.
 *
 * Instalado como dependencia usa la versión de Composer (v1.0.3). En el repositorio (documentación
 * publicada, desarrollo) usa la última etiqueta de git, con +N si hay N commits después de ella.
 */
class Version
{
    public static function actual(): string
    {
        // Como dependencia de otro proyecto, Composer sabe la versión. Como proyecto raíz (el propio repositorio)
        // no la sabe: ahí se usa git.
        $comoDependencia = class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled('maristas/ui-kit')
            && (InstalledVersions::getRootPackage()['name'] ?? null) !== 'maristas/ui-kit';

        if ($comoDependencia) {
            $composer = (string) InstalledVersions::getPrettyVersion('maristas/ui-kit');

            if (preg_match('/^v?\d+\.\d+/', $composer)) {
                return $composer;
            }
        }

        return static::deGit() ?? 'dev';
    }

    protected static function deGit(): ?string
    {
        if (! function_exists('shell_exec') || ! is_dir(dirname(__DIR__).'/.git')) {
            return null;
        }

        $salida = trim((string) @shell_exec('git -C '.escapeshellarg(dirname(__DIR__)).' describe --tags --long 2>/dev/null'));

        if (! preg_match('/^(v?\d+\.\d+\.\d+)-(\d+)-g[0-9a-f]+$/', $salida, $m)) {
            return null;
        }

        return $m[1].((int) $m[2] > 0 ? '+'.$m[2] : '');
    }
}
