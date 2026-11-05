<?php

namespace Maristas\UiKit;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        ], 'maristas-ui-assets');

        $this->publishes([
            __DIR__.'/../config/maristas-ui.php' => config_path('maristas-ui.php'),
        ], 'maristas-ui-config');

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
            Route::view($ruta, 'maristas::docs.index')->name('maristas-ui.docs');

            Route::get($ruta.'/maristas-ui.css', function () {
                return response()->file(__DIR__.'/../resources/css/maristas-ui.css', ['Content-Type' => 'text/css']);
            })->name('maristas-ui.css');
        });
    }
}
