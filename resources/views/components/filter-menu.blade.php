{{--
    Botón «Filtros» de una tabla de datos que abre un menú con los filtros menos usados.
    Slot por defecto: un bloque por filtro (etiqueta + campo); se acomodan en dos columnas (una en teléfono).
    Slot opcional clear: la acción para quitar los filtros, junto al título del menú.
    count: cuántos filtros están activos (se muestra en el botón).
    El menú no se cierra al elegir un valor; se cierra al hacer clic fuera o con Esc.
    wire:ignore.self conserva el estado abierto cuando Livewire vuelve a pintar el componente.
--}}
@props(['count' => 0, 'label' => 'Filtros'])
<div {{ $attributes->merge(['class' => 'dropdown mr-filter-menu']) }}>
    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" wire:ignore.self
        data-bs-popper-config='{"modifiers":[{"name":"preventOverflow","options":{"padding":16}},{"name":"offset","options":{"offset":[0,4]}}]}'>
        <i class="ri-filter-3-line"></i>{{ $label }}
        @if ($count > 0)<span class="mr-filter-count">{{ $count }}</span>@endif
        <i class="ri-arrow-down-s-line mr-filter-menu-caret"></i>
    </button>
    <div class="dropdown-menu mr-filter-menu-panel" wire:ignore.self>
        <div class="mr-menu-head d-flex justify-content-between align-items-center">
            <strong class="d-inline">{{ $label }}</strong>
            {{ $clear ?? '' }}
        </div>
        <div class="mr-filter-menu-grid">{{ $slot }}</div>
    </div>
</div>
