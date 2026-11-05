@php $v = filemtime(app('view')->getFinder()->getHints()['maristas'][0].'/../css/maristas-ui.css'); @endphp
<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') · Maristas UI Kit</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href="{{ route('maristas-ui.asset', 'maristas-ui.css') }}?v={{ $v }}" rel="stylesheet">
</head>
<body class="mr-scope mr-docs">
@php $grupos = \Maristas\UiKit\Docs\Catalogo::grupos(); $actual = $pagina['slug'] ?? 'introduccion'; @endphp

<header class="mr-docbar">
    <button type="button" class="mr-docbar-menu" data-bs-toggle="offcanvas" data-bs-target="#mr-doc-offcanvas" aria-label="Abrir el índice"><i class="ri-menu-2-line"></i></button>
    <a class="mr-docbar-brand" href="{{ route('maristas-ui.docs') }}">
        <img src="{{ route('maristas-ui.asset', 'maristas-logo.svg') }}" alt="Maristas">
        <span class="mr-docbar-tag">UI Kit</span>
    </a>
    <div class="mr-docbar-search">
        <i class="ri-search-line"></i>
        <input type="search" id="mr-doc-search" placeholder="Buscar un componente…" aria-label="Buscar un componente" autocomplete="off">
        <kbd>/</kbd>
    </div>
    <span class="mr-docbar-version">v0.1</span>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ route('maristas-ui.asset', 'maristas-ui.js') }}?v={{ $v }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tooltips, popovers y el aviso de ejemplo
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) { new bootstrap.Tooltip(el); });
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach(function (el) { new bootstrap.Popover(el); });
        var boton = document.getElementById('kit-toast-btn'), toast = document.getElementById('kit-toast');
        if (boton && toast) boton.addEventListener('click', function () { bootstrap.Toast.getOrCreateInstance(toast).show(); });

        // Los enlaces dentro de los ejemplos son solo demostración
        document.addEventListener('click', function (e) {
            var a = e.target.closest('.mr-example-preview a[href="#"], .mr-example-preview a[href^="#"]');
            if (a) e.preventDefault();
        });

        // Buscador del índice: "/" lo enfoca
        var buscador = document.getElementById('mr-doc-search');
        document.addEventListener('keydown', function (e) {
            if (e.key === '/' && !/input|textarea|select/i.test(document.activeElement.tagName)) { e.preventDefault(); buscador.focus(); }
        });
        buscador.addEventListener('input', function () {
            var q = buscador.value.trim().toLowerCase();
            document.querySelectorAll('.mr-docnav a').forEach(function (a) {
                a.hidden = q !== '' && a.textContent.toLowerCase().indexOf(q) === -1;
            });
            document.querySelectorAll('.mr-docnav .mr-docnav-group').forEach(function (g) {
                g.hidden = !g.querySelector('a:not([hidden])');
            });
        });

        // "En esta página": se arma con los ejemplos y se resalta al leer
        var toc = document.getElementById('mr-doc-toc');
        var titulos = document.querySelectorAll('.mr-docmain .mr-example');
        var enlaces = {};
        titulos.forEach(function (ex) {
            var t = ex.querySelector('.mr-example-title');
            if (!t || !ex.id) return;
            var a = document.createElement('a');
            a.href = '#' + ex.id; a.textContent = t.textContent;
            toc.appendChild(a); enlaces[ex.id] = a;
        });
        if (!toc.children.length) toc.closest('.mr-doctoc').style.visibility = 'hidden';
        var visibles = {};
        var obs = new IntersectionObserver(function (entradas) {
            entradas.forEach(function (e) { visibles[e.target.id] = e.isIntersecting; });
            var primero = Object.keys(enlaces).filter(function (id) { return visibles[id]; })[0];
            Object.keys(enlaces).forEach(function (id) { enlaces[id].classList.toggle('is-active', id === primero); });
        }, { rootMargin: '-80px 0px -60% 0px' });
        titulos.forEach(function (ex) { if (enlaces[ex.id]) obs.observe(ex); });
    });
</script>
@stack('scripts')
</body>
</html>
