{{-- Barra principal: marca + herramientas arriba, navegación abajo. Slots: brand, tools y el slot por defecto (la navegación). --}}
@props(['id' => 'mr-topbar', 'label' => 'Navegación principal'])
<header {{ $attributes->merge(['class' => 'mr-topbar']) }} id="{{ $id }}">
    <div class="mr-topbar-main">
        <button type="button" class="mr-topbar-toggler" aria-label="Abrir el menú" aria-controls="{{ $id }}-nav" aria-expanded="false" data-mr-toggle="#{{ $id }}-nav"><i class="ri-menu-line"></i></button>
        {{ $brand }}
        <div class="mr-topbar-tools">{{ $tools }}</div>
    </div>
    <nav class="mr-topbar-nav" id="{{ $id }}-nav" aria-label="{{ $label }}">
        <ul>{{ $slot }}</ul>
    </nav>
</header>
