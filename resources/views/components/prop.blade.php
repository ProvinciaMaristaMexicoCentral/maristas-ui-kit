@props(['label'])
<div {{ $attributes->merge(['class' => 'mr-prop']) }}>
    <div class="mr-prop-label">{{ $label }}</div>
    <div>{{ $slot }}</div>
</div>
