<?php

namespace Maristas\UiKit\Http;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Maristas\UiKit\Docs\Catalogo;

class DocsController extends Controller
{
    public function show(?string $slug = null)
    {
        $slug = $slug ?: 'introduccion';
        $pagina = Catalogo::pagina($slug);

        abort_if($pagina === null || ! View::exists('maristas::docs.pages.'.$slug), 404);

        [$anterior, $siguiente] = Catalogo::vecinas($slug);

        return view('maristas::docs.pagina', compact('pagina', 'anterior', 'siguiente'));
    }

    public function asset(string $archivo)
    {
        $archivos = [
            'maristas-ui.css' => [__DIR__.'/../../resources/css/maristas-ui.css', 'text/css'],
            'maristas-ui.js' => [__DIR__.'/../../resources/js/maristas-ui.js', 'application/javascript'],
            'maristas-logo.svg' => [__DIR__.'/../../resources/images/maristas-logo.svg', 'image/svg+xml'],
        ];

        abort_unless(isset($archivos[$archivo]), 404);

        return response()->file($archivos[$archivo][0], ['Content-Type' => $archivos[$archivo][1]]);
    }
}
