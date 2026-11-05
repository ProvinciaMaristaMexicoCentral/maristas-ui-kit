{{-- Selector de institución. Dentro van <x-maristas::menu-item> (uno por institución, con :active la actual). --}}
@props(['current', 'searchable' => false, 'title' => 'Institución activa', 'hint' => 'Cambia a otra para ver sus datos'])
<div class="dropdown" x-data="{ search: '', normalize: s => (s || '').toString().normalize('NFD').replace(/[̀-ͯ]/g, '').toLowerCase() }">
    <button type="button" class="mr-topbar-btn mr-topbar-inst dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Cambiar de institución">
        <i class="ri-building-line"></i><span class="mr-topbar-inst-label">{{ $current }}</span><i class="ri-arrow-down-s-line"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end mr-topbar-panel mr-scroll-menu">
        <div class="mr-menu-head"><strong>{{ $title }}</strong><span>{{ $hint }}</span></div>
        @if ($searchable)
            <div class="px-2 pb-2"><input type="search" class="form-control form-control-sm" placeholder="Buscar institución" aria-label="Buscar institución" x-model="search" x-on:click.stop></div>
        @endif
        {{ $slot }}
    </div>
</div>
