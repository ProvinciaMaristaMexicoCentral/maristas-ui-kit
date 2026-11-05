<?php

namespace Maristas\UiKit;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Maristas\UiKit\Console\GuiaIACommand;
use Maristas\UiKit\Http\DocsController;

class UiKitServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/maristas-ui.php', 'maristas-ui');
    }

    public function boot(): void
    {
        $vistas = __DIR__.'/../resources/views';

        $this->loadViewsFrom($vistas, 'maristas');

        // <x-maristas::button>, <x-maristas::topbar>, …
        Blade::anonymousComponentPath($vistas.'/components', 'maristas');

        $this->publishes([
            __DIR__.'/../resources/css/maristas-ui.css' => public_path('vendor/maristas-ui/maristas-ui.css'),
            __DIR__.'/../resources/js/maristas-ui.js' => public_path('vendor/maristas-ui/maristas-ui.js'),
            __DIR__.'/../resources/images/maristas-logo.svg' => public_path('vendor/maristas-ui/maristas-logo.svg'),
        ], 'maristas-ui-assets');

        $this->publishes([
            __DIR__.'/../config/maristas-ui.php' => config_path('maristas-ui.php'),
        ], 'maristas-ui-config');

        if ($this->app->runningInConsole()) {
            $this->commands([GuiaIACommand::class]);
        }

        $this->registrarDocumentacion();
    }

    /**
     * La página de documentación solo existe en los entornos configurados (por defecto local y testing).
     */
    protected function registrarDocumentacion(): void
    {
        if (! $this->app->environment(config('maristas-ui.docs.environments', ['local', 'testing']))) {
            return;
        }

        $ruta = trim(config('maristas-ui.docs.route', 'ui-kit'), '/');

        Route::middleware(config('maristas-ui.docs.middleware', ['web']))->group(function () use ($ruta) {
            Route::get($ruta.'/ia.md', [DocsController::class, 'guiaIA'])->name('maristas-ui.ia');
            Route::get($ruta.'/_assets/{archivo}', [DocsController::class, 'asset'])->name('maristas-ui.asset');
            Route::get($ruta.'/{slug?}', [DocsController::class, 'show'])->name('maristas-ui.docs');
        });
    }
}
