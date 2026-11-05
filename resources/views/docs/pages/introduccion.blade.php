<section class="mr-blueprint" aria-label="Maristas UI Kit">
    <svg class="mr-blueprint-marks" viewBox="0 0 1000 420" preserveAspectRatio="none" aria-hidden="true">
        {{-- marcas de registro en las esquinas --}}
        <g stroke="currentColor" fill="none" stroke-width="1">
            <circle cx="40" cy="40" r="10"/><path d="M20 40h40M40 20v40"/>
            <circle cx="960" cy="40" r="10"/><path d="M940 40h40M960 20v40"/>
            <circle cx="40" cy="380" r="10"/><path d="M20 380h40M40 360v40"/>
            <circle cx="960" cy="380" r="10"/><path d="M940 380h40M960 360v40"/>
        </g>
    </svg>
    <div class="mr-blueprint-figure">
        <img class="mr-blueprint-logo" src="{{ route('maristas-ui.asset', 'maristas-logo.svg') }}" alt="Maristas">
        <span class="mr-dim mr-dim-h"><b>800 px</b></span>
        <span class="mr-dim mr-dim-v"><b>800 px</b></span>
    </div>
    <div class="mr-blueprint-title">
        <div><span>Proyecto</span><strong>Maristas UI Kit</strong></div>
        <div><span>Rev.</span><strong>0.1</strong></div>
        <div><span>Escala</span><strong>1:1</strong></div>
    </div>
</section>

<div class="mr-pagehead mt-4">
    <h1 class="mr-pagetitle">Un solo lenguaje visual para los sistemas Maristas</h1>
    <p class="mr-pagelead">Bootstrap 5 es la base. El kit fija encima los colores, la tipografía, las formas y los componentes comunes, para que cualquier proyecto de Maristas se vea y se comporte igual. Todo vive en <code>maristas-ui.css</code>; los estilos de Bootstrap solo cambian dentro de un contenedor <code>.mr-scope</code>.</p>
</div>

<div class="row g-3 mb-4">
    @foreach ([
        ['uso', 'ri-rocket-2-line', 'Empieza aquí', 'Instala el paquete, publica los estilos y usa tu primer componente.'],
        ['colores', 'ri-palette-line', 'Fundamentos', 'Colores, tipografía, íconos y reglas de forma y espacio.'],
        ['botones', 'ri-layout-grid-line', 'Componentes', 'Botones, formularios, tablas, alertas, menús y más.'],
        ['patrones', 'ri-stack-line', 'Patrones', 'Composiciones completas listas para copiar y adaptar.'],
    ] as [$slug, $icono, $titulo, $texto])
        <div class="col-md-6">
            <a class="mr-tile" href="{{ route('maristas-ui.docs', $slug) }}">
                <span class="mr-tile-icon"><i class="{{ $icono }}"></i></span>
                <span><strong>{{ $titulo }}</strong><span class="d-block mr-small">{{ $texto }}</span></span>
                <i class="ri-arrow-right-line ms-auto text-muted"></i>
            </a>
        </div>
    @endforeach
</div>

<x-maristas::example title="Instalación rápida" note="Laravel 9 a 12. El paquete no incluye Bootstrap, Remix Icon ni la fuente Poppins: el proyecto debe tenerlos.">
    <div class="w-100"><x-maristas::state tone="info">composer require maristas/ui-kit</x-maristas::state></div>
    <x-slot:code>
@verbatim
composer require maristas/ui-kit
php artisan vendor:publish --tag=maristas-ui-assets

{{-- layout, después de Bootstrap y Remix Icon --}}
<link href="{{ asset('vendor/maristas-ui/maristas-ui.css') }}" rel="stylesheet">
<script src="{{ asset('vendor/maristas-ui/maristas-ui.js') }}"></script>
<body class="mr-scope">
@endverbatim
    </x-slot:code>
</x-maristas::example>
