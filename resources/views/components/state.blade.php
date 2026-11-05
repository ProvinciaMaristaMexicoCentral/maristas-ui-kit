@props(['tone' => 'neutral', 'icon' => null])
<span {{ $attributes->merge(['class' => 'mr-state mr-state-'.$tone]) }}>
    @if ($icon)<i class="{{ $icon }}"></i>@endif{{ $slot }}
</span>
