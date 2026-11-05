@props(['label', 'value', 'delta' => null, 'trend' => 'up'])
<div {{ $attributes->merge(['class' => 'card mr-stat']) }}>
    <div class="mr-stat-label">{{ $label }}</div>
    <div class="mr-stat-value">{{ $value }}</div>
    @if ($delta)
        <div class="mr-stat-delta {{ $trend === 'down' ? 'is-down' : 'is-up' }}">
            <i class="{{ $trend === 'down' ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }}"></i>{{ $delta }}
        </div>
    @endif
</div>
