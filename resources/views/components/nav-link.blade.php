@props(['href' => '#', 'icon' => null, 'active' => false])
<li><a href="{{ $href }}" {{ $attributes->class(['mr-topbar-link', 'is-active' => $active]) }} @if ($active) aria-current="page" @endif>@if ($icon)<i class="{{ $icon }}"></i>@endif{{ $slot }}</a></li>
