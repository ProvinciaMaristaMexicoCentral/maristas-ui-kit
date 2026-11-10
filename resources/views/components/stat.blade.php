{{-- Indicador: etiqueta, valor y, opcionalmente, ícono (cuadro de color a la izquierda), una nota (hint) y una variación (delta). --}}
@props(['label', 'value', 'delta' => null, 'trend' => 'up', 'icon' => null, 'hint' => null])
<div {{ $attributes->merge(['class' => 'card mr-stat'.($icon ? ' mr-stat-with-icon' : '')]) }}>
    @if ($icon)<span class="mr-tile-icon" aria-hidden="true"><i class="{{ $icon }}"></i></span>@endif
    @if ($icon)<div class="mr-stat-body">@endif
    <div class="mr-stat-label">{{ $label }}</div>
    <div class="mr-stat-value">{{ $value }}</div>
    @if ($hint)<div class="mr-stat-hint">{{ $hint }}</div>@endif
    @if ($delta)
        <div class="mr-stat-delta {{ $trend === 'down' ? 'is-down' : 'is-up' }}">
            <i class="{{ $trend === 'down' ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }}"></i>{{ $delta }}
        </div>
    @endif
    @if ($icon)</div>@endif
</div>
