@props(['href' => null, 'icon' => null, 'active' => false])
@if ($href)
    <a href="{{ $href }}" {{ $attributes->class(['dropdown-item', 'active' => $active]) }}>@if ($icon)<i class="{{ $icon }}"></i>@endif{{ $slot }}</a>
@else
    <button type="button" {{ $attributes->class(['dropdown-item', 'active' => $active]) }}>@if ($icon)<i class="{{ $icon }}"></i>@endif{{ $slot }}</button>
@endif
