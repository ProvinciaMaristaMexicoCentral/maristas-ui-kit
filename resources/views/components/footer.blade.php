{{-- Pie de página: producto y versión a la izquierda, texto legal a la derecha (slot por defecto). --}}
@props(['product' => 'SIGEM', 'version' => null])
<footer {{ $attributes->merge(['class' => 'mr-footer']) }}>
    <div class="d-flex align-items-center gap-2">
        <span>{{ $product }}</span>
        @if ($version)<x-maristas::state tone="info">{{ $version }}</x-maristas::state>@endif
    </div>
    <div class="d-none d-sm-block">{{ $slot }}</div>
</footer>
