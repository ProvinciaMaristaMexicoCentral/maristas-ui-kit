<x-maristas::example title="Variantes">
    <x-maristas::button icon="ri-contacts-fill">Registrar seguimiento</x-maristas::button>
    <x-maristas::button variant="secondary" icon="ri-mail-line">Correo</x-maristas::button>
    <x-maristas::button variant="danger" icon="ri-delete-bin-line">Eliminar</x-maristas::button>
    <x-maristas::button variant="success" icon="ri-check-line">Aprobar</x-maristas::button>
</x-maristas::example>

<x-maristas::example title="Sobre fondo oscuro" note="Con variant light (principal, blanco) y outline-light (fantasma: transparente, se aclara al pasar el cursor). Úsalos en banners y portadas.">
    <div class="w-100 d-flex flex-wrap gap-2 p-4 rounded" style="background: var(--maristas-brand-strong)">
        <x-maristas::button variant="light" icon="ri-add-line">Principal</x-maristas::button>
        <x-maristas::button variant="outline-light" icon="ri-price-tag-3-line">Fantasma</x-maristas::button>
    </div>
    <x-slot:code>
@verbatim
<x-maristas::button variant="light" icon="ri-add-line">Principal</x-maristas::button>
<x-maristas::button variant="outline-light" icon="ri-price-tag-3-line">Fantasma</x-maristas::button>
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Tamaños" note="Pequeño dentro de tarjetas, tablas y barras de herramientas; normal para la acción principal de la página; grande en pantallas táctiles o para una acción única y destacada.">
    <x-maristas::button size="sm">Pequeño</x-maristas::button>
    <x-maristas::button>Normal</x-maristas::button>
    <x-maristas::button size="lg">Grande</x-maristas::button>
    <x-maristas::button variant="secondary" size="sm">Pequeño secundario</x-maristas::button>
    <x-maristas::button variant="secondary" size="lg">Grande secundario</x-maristas::button>
</x-maristas::example>

<x-maristas::example title="Estados">
    <x-maristas::button disabled icon="ri-send-plane-2-line">Publicar nota</x-maristas::button>
    <x-maristas::button variant="secondary" disabled>Deshabilitado</x-maristas::button>
    <x-maristas::button disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Enviando…</x-maristas::button>
</x-maristas::example>

<x-maristas::example title="Solo ícono" note="Siempre con aria-label y title, porque no tiene texto.">
    <x-maristas::button variant="secondary" size="sm" aria-label="Editar" title="Editar"><i class="ri-pencil-fill"></i></x-maristas::button>
    <x-maristas::button variant="secondary" size="sm" aria-label="Descargar" title="Descargar"><i class="ri-download-2-line"></i></x-maristas::button>
    <x-maristas::button variant="secondary" size="sm" aria-label="Más acciones" title="Más acciones"><i class="ri-more-2-fill"></i></x-maristas::button>
</x-maristas::example>

<x-maristas::example title="Botón punteado (editar)" note="La acción de editar de un bloque: «Editar contacto», «Editar estudiante». Es un botón pequeño con borde punteado azul y lápiz. Bloqueado, aparece con candado y atenuado, y explica el motivo al pasar el cursor.">
    <div class="d-flex flex-wrap gap-2">
        <x-maristas::edit-link target="#kit-editar-modal" label="Editar contacto" />
        <x-maristas::edit-link target="#kit-editar-modal" :locked="true" locked-label="Estudiante bloqueado" locked-title="Los datos ya fueron confirmados y no se pueden editar" />
    </div>
</x-maristas::example>

<x-maristas::example title="Grupo y menú de acciones">
    <div class="btn-group" role="group" aria-label="Vista">
        <button type="button" class="btn btn-primary btn-sm">Lista</button>
        <button type="button" class="btn btn-light btn-sm">Tarjetas</button>
    </div>
    <div class="dropdown">
        <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Acciones</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#botones"><i class="ri-user-shared-line"></i>Reasignar</a></li>
            <li><a class="dropdown-item" href="#botones"><i class="ri-history-line"></i>Ver historial</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="#botones"><i class="ri-delete-bin-line"></i>Eliminar</a></li>
        </ul>
    </div>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Nombra el botón con el verbo de lo que hace: «Guardar cambios», «Registrar seguimiento». Mantén el mismo nombre en todo el flujo.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No pongas dos botones principales en la misma vista. No uses «Aceptar», «Enviar» o «OK» sin decir qué se acepta o se envía.</x-maristas::rule></div>
</div>
    
