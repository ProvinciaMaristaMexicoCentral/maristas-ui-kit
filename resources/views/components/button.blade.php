@props(['variant' => 'primary', 'size' => null, 'icon' => null, 'href' => null, 'type' => 'button'])
@php
    $clase = 'btn btn-'.($variant === 'secondary' ? 'light' : $variant).match ($size) { 'sm' => ' btn-sm', 'lg' => ' btn-lg', default => '' };
@endphp
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $clase]) }}>
        @if ($icon)<i class="{{ $icon }}"></i>@endif{{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $clase]) }}>
        @if ($icon)<i class="{{ $icon }}"></i>@endif{{ $slot }}
    </button>
@endif
