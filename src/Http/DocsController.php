<?php

namespace Maristas\UiKit\Http;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Maristas\UiKit\Docs\Catalogo;
use Maristas\UiKit\Docs\GuiaIA;

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

    public function guiaIA(Request $request)
    {
        return response(GuiaIA::generar(! $request->boolean('resumen')), 200, [
            'Content-Type' => 'text/markdown; charset=UTF-8',
        ]);
    }

    public function asset(string $archivo)
    {
        $archivos = [
            'maristas-ui.css' => [__DIR__.'/../../resources/css/maristas-ui.css', 'text/css'],
            'maristas-ui.js' => [__DIR__.'/../../resources/js/maristas-ui.js', 'application/javascript'],
            'maristas-docs.js' => [__DIR__.'/../../resources/js/maristas-docs.js', 'application/javascript'],
            'maristas-logo.svg' => [__DIR__.'/../../resources/images/maristas-logo.svg', 'image/svg+xml'],
        ];

        abort_unless(isset($archivos[$archivo]), 404);

        return response()->file($archivos[$archivo][0], ['Content-Type' => $archivos[$archivo][1]]);
    }
}
