{{-- Avatar con menú de perfil. Dentro van <x-maristas::menu-item>. --}}
@props(['name', 'role' => null])
<div class="dropdown">
    <button type="button" class="mr-topbar-btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Menú de {{ $name }}">
        <x-maristas::avatar :name="$name" size="sm" /><span class="mr-topbar-user-name">{{ $name }}</span><i class="ri-arrow-down-s-line"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <div class="mr-menu-head"><strong>{{ $name }}</strong>@if ($role)<span>{{ $role }}</span>@endif</div>
        {{ $slot }}
    </div>
</div>
