<h6 class="mb-2">Escala</h6>
<div class="mb-4">
    <div class="mr-type-row"><code>.mr-h1 · 1.6rem · 700</code><span class="mr-h1">María López</span></div>
    <div class="mr-type-row"><code>.mr-h2 · 1.25rem · 700</code><span class="mr-h2">Actividades programadas</span></div>
    <div class="mr-type-row"><code>.mr-h3 · 1.1rem · 600</code><span class="mr-h3">NI 5º PRIMARIA</span></div>
    <div class="mr-type-row"><code>.mr-body · 1rem · 400</code><span class="mr-body">Texto de párrafo y valores de formulario.</span></div>
    <div class="mr-type-row"><code>.mr-small · .85rem</code><span class="mr-small">Etiquetas, fechas y datos secundarios.</span></div>
    <div class="mr-type-row"><code>.mr-caption · .75rem</code><span class="mr-caption">Leyendas, contadores y metadatos.</span></div>
</div>

<h6 class="mb-2">Pesos</h6>
<div class="d-flex flex-wrap gap-4 mb-4">
    @foreach ([400 => 'Regular', 500 => 'Medium', 600 => 'Semibold', 700 => 'Bold'] as $peso => $nombre)
        <div><div style="font-size: 1.6rem; font-weight: {{ $peso }};">Aa</div><div class="mr-caption">{{ $nombre }} · {{ $peso }}</div></div>
    @endforeach
</div>

<x-maristas::example title="Enlaces y listas">
    <div class="w-100">
        <p class="mb-2">Un enlace dentro de un texto se ve así: <a href="#tipografia" class="mr-link">revisar el expediente completo</a>.</p>
        <ul class="mb-2">
            <li>Las listas usan el mismo tamaño que el párrafo.</li>
            <li>Cada elemento dice una sola cosa.</li>
        </ul>
        <ol class="mb-0">
            <li>Las listas numeradas solo se usan si el orden importa.</li>
            <li>Por ejemplo, los pasos de un proceso.</li>
        </ol>
    </div>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Escribe en minúsculas con la primera letra en mayúscula (sentence case) en botones, etiquetas y títulos. Limita los párrafos a unos 70 caracteres de ancho.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No uses MAYÚSCULAS SOSTENIDAS para etiquetas ni para destacar. No mezcles más de dos pesos en un mismo bloque.</x-maristas::rule></div>
</div>
    
