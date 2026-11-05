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
    
