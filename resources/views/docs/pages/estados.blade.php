<x-maristas::example title="Etiquetas de estado">
    <x-maristas::state tone="success" icon="ri-check-line">Enviado</x-maristas::state>
    <x-maristas::state tone="info">Respuesta nueva</x-maristas::state>
    <x-maristas::state tone="warning">Enviando…</x-maristas::state>
    <x-maristas::state tone="danger" icon="ri-lock-line">Bloqueado</x-maristas::state>
    <x-maristas::state tone="neutral">Sin asignar</x-maristas::state>
</x-maristas::example>

<x-maristas::example title="Chips" note="Dato corto y clicable (teléfono, correo) en gris. El chip de acción es punteado en azul con lápiz y se usa para editar: «Editar contacto», «Editar estudiante». Con candado y atenuado cuando no se puede editar.">
    <div class="mr-chips">
        <a class="mr-chip" href="#estados"><i class="ri-phone-line"></i>55 1234 5678</a>
        <a class="mr-chip" href="#estados"><i class="ri-mail-line"></i>maria.lopez@ejemplo.mx</a>
        <x-maristas::edit-link target="#kit-editar-modal" label="Editar contacto" />
        <x-maristas::edit-link target="#kit-editar-modal" :locked="true" locked-label="Estudiante bloqueado" locked-title="Los datos ya fueron confirmados y no se pueden editar" />
    </div>
</x-maristas::example>

<x-maristas::example title="Propiedad con etiqueta" note="Etiqueta pequeña en gris y valor debajo. Se usa en las pestañas de detalle.">
    <div class="w-100" style="max-width: 320px;">
        <x-maristas::prop label="Correo electrónico"><a href="#estados" class="mr-link">maria.lopez@ejemplo.mx</a></x-maristas::prop>
        <x-maristas::prop label="Canal de obtención">Facebook</x-maristas::prop>
    </div>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Una etiqueta de estado usa 1 a 3 palabras y el tono que corresponde: verde si salió bien, ámbar si está pendiente, rojo si falló.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No inventes colores nuevos para un estado ni pongas una oración dentro de la etiqueta.</x-maristas::rule></div>
</div>
    

<x-maristas::example title="Distribución por estado" note="Una barra segmentada con una leyenda que dice el nombre, el porcentaje y, si lo necesitas, lleva al listado filtrado. Los colores son de los tonos del kit, no de Bootstrap.">
    <div class="mr-box w-100" style="max-width: 360px;">
        <div class="mr-seg" role="img" aria-label="Nuevo 28%, Contactado 20%, Conversión futura 18%, Perdido 34%">
            <span class="mr-tone-success" style="width: 28%"></span>
            <span class="mr-tone-info" style="width: 20%"></span>
            <span class="mr-tone-warning" style="width: 18%"></span>
            <span class="mr-tone-muted" style="width: 34%"></span>
        </div>
        <ul class="mr-legend">
            <li><a href="#"><span class="mr-dot mr-tone-success"></span>Nuevo<span class="mr-legend-value">28%</span></a></li>
            <li><a href="#"><span class="mr-dot mr-tone-info"></span>Contactado<span class="mr-legend-value">20%</span></a></li>
            <li><a href="#"><span class="mr-dot mr-tone-warning"></span>Conversión futura<span class="mr-legend-value">18%</span></a></li>
            <li><a href="#"><span class="mr-dot mr-tone-muted"></span>Perdido<span class="mr-legend-value">34%</span></a></li>
        </ul>
    </div>
    <x-slot:code>
@verbatim
<div class="mr-seg" role="img" aria-label="Nuevo 28%, Perdido 72%">
    <span class="mr-tone-success" style="width: 28%"></span>
    <span class="mr-tone-muted" style="width: 72%"></span>
</div>
<ul class="mr-legend">
    <li><a href="…"><span class="mr-dot mr-tone-success"></span>Nuevo<span class="mr-legend-value">28%</span></a></li>
</ul>
{{-- Tonos: success, warning, danger, info, brand, muted --}}
@endverbatim
    </x-slot:code>
</x-maristas::example>
