{{-- Tarjeta con portada: imagen (o ícono si no hay), etiquetas sobre la portada, título, datos con ícono y acciones.
     `fill` (true por defecto) hace que la tarjeta ocupe toda la altura de su columna; con false toma su altura natural.
     Slots: tags (etiquetas <x-maristas::state> sobre la portada: la primera a la izquierda, la segunda a la derecha),
     meta (filas «ícono + texto»), el slot por defecto (texto o contenido libre) y actions (botones). --}}
@props(['title', 'image' => null, 'position' => 'center', 'subtitle' => null, 'icon' => 'ri-image-line', 'fill' => true])
<article {{ $attributes->merge(['class' => 'card mr-card-flat mr-cover-card'.($fill ? ' h-100' : '')]) }}>
    <div class="mr-cover" @if ($image) style="background-image: url('{{ $image }}'); background-position: {{ $position }};" role="img" aria-label="{{ $title }}" @endif>
        @unless ($image)<i class="{{ $icon }} mr-cover-empty" aria-hidden="true"></i>@endunless
        @isset($tags)<div class="mr-cover-tags">{{ $tags }}</div>@endisset
    </div>
    <div class="card-body mr-cover-body">
        <h3 class="mr-cover-title">{{ $title }}</h3>
        @if ($subtitle)<div class="mr-cover-subtitle">{{ $subtitle }}</div>@endif
        @isset($meta)<div class="mr-cover-meta">{{ $meta }}</div>@endisset
        {{ $slot }}
        @isset($actions)<div class="mr-cover-actions">{{ $actions }}</div>@endisset
    </div>
</article>
