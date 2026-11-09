{{-- Banner de encabezado de pantalla: título, texto de apoyo y acciones. El slot por defecto son los botones (variantes light / outline-light sobre el fondo azul). --}}
@props(['title', 'eyebrow' => null, 'description' => null, 'icon' => null])
<section {{ $attributes->merge(['class' => 'mr-banner']) }}>
    <div class="mr-banner-main">
        @if ($icon)<span class="mr-banner-icon" aria-hidden="true"><i class="{{ $icon }}"></i></span>@endif
        <div>
            @if ($eyebrow)<div class="mr-banner-eyebrow">{{ $eyebrow }}</div>@endif
            <h1 class="mr-banner-title">{{ $title }}</h1>
            @if ($description)<p class="mr-banner-lead">{{ $description }}</p>@endif
        </div>
    </div>
    @if (trim((string) $slot) !== '')
        <div class="mr-banner-actions">{{ $slot }}</div>
    @endif
</section>
