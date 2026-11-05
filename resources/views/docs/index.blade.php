@extends('maristas::docs.layout')
@section('title', 'Maristas UI Kit')

@section('content')
<div class="mr-scope">
    <h1 class="mr-h1 mb-4">Maristas UI Kit</h1>

    <div class="row g-4">
        <aside class="col-lg-2 d-none d-lg-block">
            <nav class="mr-doc-nav" aria-label="Secciones del kit">
                <span class="mr-caption px-2 mt-1">Fundamentos</span>
                <a href="#colores">Colores</a>
                <a href="#tipografia">Tipografía</a>
                <a href="#iconos">Íconos</a>
                <a href="#forma">Forma y espacio</a>
                <a href="#accesibilidad">Accesibilidad</a>
                <span class="mr-caption px-2 mt-3">Componentes</span>
                <a href="#botones">Botones</a>
                <a href="#formularios">Formularios</a>
                <a href="#tablas">Tablas</a>
                <a href="#tarjetas">Tarjetas y cifras</a>
                <a href="#estados">Estados</a>
                <a href="#alertas">Alertas y avisos</a>
                <a href="#navegacion">Navegación</a>
                <a href="#barra">Barra principal</a>
                <a href="#overlays">Ventanas y capas</a>
                <a href="#feedback">Progreso y carga</a>
                <a href="#disclosure">Acordeón y listas</a>
                <a href="#avatares">Avatares</a>
                <span class="mr-caption px-2 mt-3">Aplicación</span>
                <a href="#patrones">Patrones de página</a>
                <a href="#uso">Cómo usarlo</a>
            </nav>
        </aside>

        <div class="col-lg-10">
            <div class="card mb-4">
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

            @include('maristas::docs.sections.fundamentos')
            @include('maristas::docs.sections.componentes')
            @include('maristas::docs.sections.barra')
            @include('maristas::docs.sections.patrones')
            @include('maristas::docs.sections.uso')
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
</script>
@endpush
