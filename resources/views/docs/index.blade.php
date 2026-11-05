@extends('maristas::docs.layout')
@section('title', 'Maristas UI Kit')

@section('content')
<div class="mr-scope">
    <h1 class="mr-h1 mb-4">Maristas UI Kit</h1>

    <div class="row g-4">
        <aside class="col-lg-2 d-none d-lg-block">
            <nav class="mr-doc-nav" aria-label="Secciones del kit">
                <span class="mr-caption px-2 mt-1">Empezar</span>
                <a href="#introduccion">Introducción</a>
                <a href="#uso">Cómo usarlo</a>
                <span class="mr-caption px-2 mt-3">Fundamentos</span>
                <a href="#colores">Colores</a>
                <a href="#tipografia">Tipografía</a>
                <a href="#iconos">Íconos</a>
                <a href="#forma">Forma y espacio</a>
                <a href="#accesibilidad">Accesibilidad</a>
                <span class="mr-caption px-2 mt-3">Entradas</span>
                <a href="#botones">Botones</a>
                <a href="#formularios">Formularios</a>
                <span class="mr-caption px-2 mt-3">Datos</span>
                <a href="#disclosure">Acordeón y listas</a>
                <a href="#avatares">Avatares</a>
                <a href="#estados">Estados</a>
                <a href="#tablas">Tablas</a>
                <a href="#tarjetas">Tarjetas y cifras</a>
                <span class="mr-caption px-2 mt-3">Retroalimentación</span>
                <a href="#alertas">Alertas y avisos</a>
                <a href="#feedback">Progreso y carga</a>
                <span class="mr-caption px-2 mt-3">Navegación</span>
                <a href="#barra">Barra principal</a>
                <a href="#navegacion">Pestañas y migas</a>
                <span class="mr-caption px-2 mt-3">Superposiciones</span>
                <a href="#overlays">Ventanas y capas</a>
                <span class="mr-caption px-2 mt-3">Patrones</span>
                <a href="#patrones">Patrones de página</a>
            </nav>
        </aside>

        <div class="col-lg-10">
            <div class="card mb-4 mr-doc-section" id="introduccion">
                <div class="card-body">
                    <h1 class="mr-h1 mb-2">Un solo lenguaje visual para los sistemas Maristas</h1>
                    <p class="text-muted mb-3" style="max-width: 70ch;">
                        Bootstrap 5 es la base. Este kit fija encima los colores, la tipografía,
                        las formas y los componentes comunes, para que cualquier proyecto de Maristas
                        se vea y se comporte igual. Todo vive en <code>maristas-ui.css</code>;
                        los estilos de Bootstrap solo cambian dentro de un contenedor <code>.mr-scope</code>.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <x-maristas::state tone="info">5 fundamentos</x-maristas::state>
                        <x-maristas::state tone="info">12 familias de componentes</x-maristas::state>
                        <x-maristas::state tone="info">17 componentes Blade</x-maristas::state>
                        <x-maristas::state tone="info">7 patrones de página</x-maristas::state>
                    </div>
                </div>
            </div>

            @include('maristas::docs.sections.uso')
            @include('maristas::docs.sections.fundamentos')
            @include('maristas::docs.sections.botones')
            @include('maristas::docs.sections.formularios')
            @include('maristas::docs.sections.disclosure')
            @include('maristas::docs.sections.avatares')
            @include('maristas::docs.sections.estados')
            @include('maristas::docs.sections.tablas')
            @include('maristas::docs.sections.tarjetas')
            @include('maristas::docs.sections.alertas')
            @include('maristas::docs.sections.feedback')
            @include('maristas::docs.sections.barra')
            @include('maristas::docs.sections.navegacion')
            @include('maristas::docs.sections.overlays')
            @include('maristas::docs.sections.patrones')
            @include('maristas::docs.sections.scripts')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Los enlaces dentro de los ejemplos son solo demostración: no deben mover la página
    document.addEventListener('click', function (e) {
        var enlace = e.target.closest('.mr-example-preview a[href^="#"]');
        if (enlace) e.preventDefault();
    });

    // Resalta en el índice la sección que se está leyendo
    (function () {
        var enlaces = {};
        document.querySelectorAll('.mr-doc-nav a').forEach(function (a) { enlaces[a.getAttribute('href').slice(1)] = a; });
        var visibles = {};
        var actualizar = function () {
            var ids = Object.keys(enlaces).filter(function (id) { return visibles[id]; });
            Object.keys(enlaces).forEach(function (id) { enlaces[id].classList.remove('is-active'); });
            if (ids.length) enlaces[ids[0]].classList.add('is-active');
        };
        var obs = new IntersectionObserver(function (entradas) {
            entradas.forEach(function (e) { visibles[e.target.id] = e.isIntersecting; });
            actualizar();
        }, { rootMargin: '-10% 0px -70% 0px' });
        Object.keys(enlaces).forEach(function (id) { var el = document.getElementById(id); if (el) obs.observe(el); });
    })();
</script>
@endpush
