@props(['icon' => 'ri-inbox-line', 'title'])
<div {{ $attributes->merge(['class' => 'mr-empty']) }}>
    <i class="{{ $icon }}"></i>
    <div class="mr-empty-title">{{ $title }}</div>
    @if (trim((string) $slot) !== '')
        <div class="small">{{ $slot }}</div>
    @endif
</div>
