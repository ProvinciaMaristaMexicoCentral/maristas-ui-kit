@php $v = filemtime(app('view')->getFinder()->getHints()['maristas'][0].'/../css/maristas-ui.css'); @endphp
<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') · Maristas UI Kit</title>
    <link rel="icon" type="image/svg+xml" href="{{ route('maristas-ui.asset', 'maristas-favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href="{{ route('maristas-ui.asset', 'maristas-ui.css') }}?v={{ $v }}" rel="stylesheet">
</head>
<body class="mr-scope mr-docs" data-mr-base="{{ parse_url(route('maristas-ui.docs'), PHP_URL_PATH) }}">
@php $grupos = \Maristas\UiKit\Docs\Catalogo::grupos(); $actual = $pagina['slug'] ?? 'introduccion'; @endphp

<header class="mr-docbar">
    <button type="button" class="mr-docbar-menu" data-bs-toggle="offcanvas" data-bs-target="#mr-doc-offcanvas" aria-label="Abrir el índice"><i class="ri-menu-2-line"></i></button>
    <a class="mr-docbar-brand" href="{{ route('maristas-ui.docs') }}">
        <img src="{{ route('maristas-ui.asset', 'maristas-logo.svg') }}" alt="Maristas">
        <span class="mr-docbar-tag">UI Kit</span>
    </a>
    <button type="button" class="mr-docbar-search" data-mr-palette-open aria-label="Buscar en la documentación">
        <i class="ri-search-line"></i><span>Buscar en la documentación…</span><kbd data-mr-kbd>Ctrl K</kbd>
    </button>
    <span class="mr-docbar-version">{{ \Maristas\UiKit\Version::actual() }}</span>
</header>

<div class="mr-doclayout">
    <aside class="mr-docside d-none d-lg-block" aria-label="Índice">
        @include('maristas::docs.partials.nav')
    </aside>

    <main class="mr-docmain">
        @yield('content')
    </main>

    <aside class="mr-doctoc d-none d-xl-block" aria-label="En esta página">
        <div class="mr-doctoc-inner">
            <span class="mr-caption">En esta página</span>
            <nav id="mr-doc-toc"></nav>
        </div>
    </aside>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="mr-doc-offcanvas" aria-label="Índice">
    <div class="offcanvas-header"><h5 class="offcanvas-title">Maristas UI Kit</h5><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button></div>
    <div class="offcanvas-body">@include('maristas::docs.partials.nav')</div>
</div>

@include('maristas::docs.partials.modals')

<div class="mr-palette" id="mr-palette" hidden>
    <div class="mr-palette-box" role="dialog" aria-modal="true" aria-label="Buscar en la documentación">
        <div class="mr-palette-head">
            <i class="ri-search-line"></i>
            <input type="text" id="mr-palette-input" placeholder="Busca un componente, página o ejemplo…" aria-label="Buscar" autocomplete="off" spellcheck="false" role="combobox" aria-expanded="true" aria-controls="mr-palette-list">
            <kbd>Esc</kbd>
        </div>
        <div class="mr-palette-list" id="mr-palette-list" role="listbox"></div>
        <div class="mr-palette-foot"><span><kbd>↑</kbd><kbd>↓</kbd> navegar</span><span><kbd>↵</kbd> abrir</span><span><kbd>Esc</kbd> cerrar</span></div>
    </div>
</div>
<script type="application/json" id="mr-search-index">@json(\Maristas\UiKit\Docs\Indice::generar(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG)</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ route('maristas-ui.asset', 'maristas-ui.js') }}?v={{ $v }}"></script>
<script>
    // Los enlaces dentro de los ejemplos son solo demostración
    document.addEventListener('click', function (e) {
        var a = e.target.closest('.mr-example-preview a[href^="#"]');
        if (a) e.preventDefault();
    });
</script>
<script src="{{ route('maristas-ui.asset', 'maristas-docs.js') }}?v={{ $v }}"></script>
@stack('scripts')
</body>
</html>
