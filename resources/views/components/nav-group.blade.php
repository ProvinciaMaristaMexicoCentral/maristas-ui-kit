{{-- Grupo desplegable de la navegación. Dentro van <x-maristas::menu-item>. --}}
@props(['label', 'icon' => null, 'active' => false])
<li class="dropdown">
    <button type="button" {{ $attributes->class(['mr-topbar-link dropdown-toggle', 'is-active' => $active]) }} data-bs-toggle="dropdown" aria-expanded="false">@if ($icon)<i class="{{ $icon }}"></i>@endif{{ $label }}</button>
    <div class="dropdown-menu">{{ $slot }}</div>
</li>
