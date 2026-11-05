@props(['name', 'size' => 'md', 'soft' => false])
@php
    $partes = preg_split('/\s+/', trim($name));
    $iniciales = mb_strtoupper(mb_substr($partes[0] ?? '', 0, 1).mb_substr($partes[1] ?? '', 0, 1));
@endphp
<span {{ $attributes->merge(['class' => 'mr-av mr-av-'.$size.($soft ? ' mr-av-soft' : ''), 'title' => $name]) }}>{{ $iniciales }}</span>
