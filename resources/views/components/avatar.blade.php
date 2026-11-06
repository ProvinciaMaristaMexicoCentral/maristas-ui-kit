{{-- Avatar con iniciales. Si conoces nombre y apellido por separado, pasa `initials` (ej. «JS»): es lo más exacto.
     Si solo hay un nombre completo, usa la primera palabra y la penúltima con tres o más palabras
     («Jorge Eduardo Sanabria Arizmendi» → JS), o las dos primeras si son solo dos («María López» → ML). --}}
@props(['name', 'size' => 'md', 'soft' => false, 'initials' => null])
@php
    $partes = array_values(array_filter(preg_split('/\s+/', trim($name))));
    $segunda = count($partes) >= 3 ? $partes[count($partes) - 2] : ($partes[1] ?? '');
    $iniciales = $initials ? mb_strtoupper(mb_substr($initials, 0, 2)) : mb_strtoupper(mb_substr($partes[0] ?? '', 0, 1).mb_substr($segunda, 0, 1));
@endphp
<span {{ $attributes->merge(['class' => 'mr-av mr-av-'.$size.($soft ? ' mr-av-soft' : ''), 'title' => $name]) }}>{{ $iniciales }}</span>
