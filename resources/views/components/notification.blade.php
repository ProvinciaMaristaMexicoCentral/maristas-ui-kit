{{-- Una notificación del panel. --}}
@props(['name' => null, 'icon' => null, 'tone' => 'info', 'time' => null, 'new' => false, 'href' => null])
@php $tag = $href ? 'a' : 'button'; @endphp
<{{ $tag }} @if ($href) href="{{ $href }}" @else type="button" @endif {{ $attributes->class(['mr-notif', 'is-new' => $new]) }}>
    @if ($icon)
        <span class="mr-av mr-av-sm mr-notif-icon mr-notif-{{ $tone }}"><i class="{{ $icon }}"></i></span>
    @elseif ($name)
        <x-maristas::avatar :name="$name" size="sm" soft />
    @endif
    <span class="text-start flex-grow-1 min-w-0">{{ $slot }}@if ($time)<span class="mr-notif-time">{{ $time }}</span>@endif</span>
    @if ($new)<span class="mr-notif-dot" aria-label="Sin leer"></span>@endif
</{{ $tag }}>
