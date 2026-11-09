<x-maristas::example title="Pestañas con subrayado">
    <ul class="nav nav-tabs mr-tabs w-100">
        <li class="nav-item"><a class="nav-link active" href="#navegacion"><i class="ri-history-line me-1"></i>Seguimiento</a></li>
        <li class="nav-item"><a class="nav-link" href="#navegacion"><i class="ri-mail-line me-1"></i>Comunicación</a></li>
        <li class="nav-item"><a class="nav-link" href="#navegacion"><i class="ri-user-line me-1"></i>Detalles</a></li>
    </ul>
</x-maristas::example>

<x-maristas::example title="Píldoras y filtros">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#navegacion">Activos</a></li>
        <li class="nav-item"><a class="nav-link" href="#navegacion">Ganados</a></li>
        <li class="nav-item"><a class="nav-link" href="#navegacion">Perdidos</a></li>
    </ul>
    <div class="mr-filters">
        <button type="button" class="mr-filter is-active">Todo</button>
        <button type="button" class="mr-filter">Notas</button>
        <button type="button" class="mr-filter">Mensajes</button>
    </div>
</x-maristas::example>

<x-maristas::example title="Ruta de migas">
    <nav aria-label="Ruta">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#navegacion" class="mr-link">Lista de registros</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalle del registro</li>
        </ol>
    </nav>
</x-maristas::example>
    

<x-maristas::example title="Título de pantalla con migas de pan" note="El último elemento es la página actual y no lleva enlace.">
    <div class="w-100">
        <x-maristas::page-bar title="Detalle del funnel" :items="[['name' => 'Inicio', 'href' => '#'], ['name' => 'Lista de funnels', 'href' => '#'], ['name' => 'Detalle del funnel']]" />
    </div>
    <x-slot:code>
@verbatim
<x-maristas::page-bar title="Detalle del funnel"
    :items="[['name' => 'Inicio', 'href' => route('dashboard')], ['name' => 'Detalle del funnel']]" />
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Banner de encabezado" note="Para la cabecera de una pantalla con título, texto de apoyo y acciones. Los botones llevan variant light (principal) y outline-light (secundario).">
    <div class="w-100">
        <x-maristas::banner title="Eventos" eyebrow="Gestión" icon="ri-calendar-event-line" description="Administra las convocatorias y actividades.">
            <x-maristas::button variant="outline-light" icon="ri-price-tag-3-line">Categorías</x-maristas::button>
            <x-maristas::button variant="light" icon="ri-add-line">Nuevo evento</x-maristas::button>
        </x-maristas::banner>
    </div>
    <x-slot:code>
@verbatim
<x-maristas::banner title="Eventos" eyebrow="Gestión" icon="ri-calendar-event-line"
    description="Administra las convocatorias y actividades.">
    <x-maristas::button variant="outline-light" icon="ri-price-tag-3-line">Categorías</x-maristas::button>
    <x-maristas::button variant="light" icon="ri-add-line">Nuevo evento</x-maristas::button>
</x-maristas::banner>
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Pie de página y botón para volver arriba" note="Incluye el botón una sola vez en el diseño: aparece al bajar y vuelve al inicio con desplazamiento suave.">
    <div class="w-100 mr-box p-0 overflow-hidden">
        <x-maristas::footer product="SIGEM" version="V.2.0">Maristas | 2026</x-maristas::footer>
    </div>
    <x-slot:code>
@verbatim
<x-maristas::footer product="SIGEM" version="V.2.0">Maristas | {{ now()->year }}</x-maristas::footer>
<x-maristas::back-to-top />
@endverbatim
    </x-slot:code>
</x-maristas::example>

