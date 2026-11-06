<x-maristas::example title="Campos">
    <div class="row g-3 w-100">
        <div class="col-md-6">
            <label class="form-label" for="kit-nombre">Nombre</label>
            <input id="kit-nombre" class="form-control" type="text" value="María López">
        </div>
        <div class="col-md-6">
            <label class="form-label" for="kit-asesor">Responsable</label>
            <select id="kit-asesor" class="form-select">
                <option>Laura Ramírez Soto</option>
                <option>Sin asignar</option>
            </select>
        </div>
        <div class="col-12">
            <label class="form-label" for="kit-nota">Nueva nota</label>
            <textarea id="kit-nota" class="form-control" rows="2" placeholder="Escribe un comentario breve para el equipo"></textarea>
            <div class="form-text">Máximo 500 caracteres.</div>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Campos obligatorios y errores" note="Marca los obligatorios con la clase mr-req en la etiqueta: pone el asterisco en rojo sin escribirlo a mano. El error va debajo del campo con is-invalid e invalid-feedback.">
    <div class="row g-3 w-100">
        <div class="col-md-6">
            <label class="form-label mr-req" for="kit-ob-nombre">Nombre</label>
            <input id="kit-ob-nombre" class="form-control" type="text">
        </div>
        <div class="col-md-6">
            <label class="form-label mr-req" for="kit-ob-correo">Correo</label>
            <input id="kit-ob-correo" class="form-control is-invalid" type="email" value="correo-sin-arroba">
            <div class="invalid-feedback">Escribe un correo válido.</div>
        </div>
        <div class="col-12">
            <div class="mr-box">Usa <code>mr-box</code> para agrupar un bloque dentro de un formulario, por ejemplo un registro similar que el asesor debe revisar.</div>
            <div class="d-flex flex-wrap gap-2 mt-2">
                <div class="mr-box mr-box-sm">mr-box-sm: compacta</div>
                <div class="mr-box mr-box-sm is-soft">is-soft: fondo suave</div>
                <div class="mr-box mr-box-sm is-warning">is-warning: pide atención</div>
            </div>
        </div>
    </div>
    <x-slot:code>
@verbatim
<label class="form-label mr-req" for="nombre">Nombre</label>
<input id="nombre" class="form-control @error('nombre') is-invalid @enderror" wire:model="nombre">
@error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror

<div class="mr-box">…bloque…</div>           {{-- is-muted para atenuarlo --}}
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Revisión antes de confirmar y acciones al pie" note="mr-kv ordena pares dato-valor en columnas que se adaptan al ancho. mr-form-actions separa los botones del paso: «Atrás» a la izquierda y la acción principal a la derecha, una sola.">
    <div class="w-100">
        <div class="mr-box">
            <div class="mr-block-head mb-3"><h6 class="card-title mb-0">Contacto</h6><button type="button" class="mr-chip mr-chip-action"><i class="ri-pencil-fill"></i>Editar</button></div>
            <dl class="mr-kv">
                <div><dt>Nombre</dt><dd>María López Soto</dd></div>
                <div><dt>Teléfono</dt><dd>55 1234 5678</dd></div>
                <div class="is-wide"><dt>Correo</dt><dd>maria@example.com</dd></div>
            </dl>
        </div>
        <div class="mr-form-actions">
            <x-maristas::button variant="secondary" icon="ri-arrow-left-line">Atrás</x-maristas::button>
            <x-maristas::button icon="ri-check-line">Confirmar y guardar</x-maristas::button>
        </div>
    </div>
    <x-slot:code>
@verbatim
<div class="mr-box">
    <div class="mr-block-head mb-3"><h6 class="card-title mb-0">Contacto</h6> <button class="mr-chip mr-chip-action">Editar</button></div>
    <dl class="mr-kv">
        <div><dt>Nombre</dt><dd>María López Soto</dd></div>
        <div class="is-wide"><dt>Correo</dt><dd>maria@example.com</dd></div>   {{-- is-wide ocupa toda la fila --}}
    </dl>
</div>
<div class="mr-form-actions">
    <button class="btn btn-light">Atrás</button>
    <button class="btn btn-primary">Confirmar y guardar</button>
</div>
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Etiqueta con acción" note="Cuando la etiqueta lleva un interruptor o un enlace a la derecha, envuélvelos en mr-label-row: el campo queda alineado con sus vecinos.">
    <div class="row g-3 w-100">
        <div class="col-md-6"><label class="form-label" for="kit-lr1">Género</label><select id="kit-lr1" class="form-select"><option>Seleccionar</option></select></div>
        <div class="col-md-6">
            <div class="mr-label-row">
                <label class="form-label" for="kit-lr2">CURP (opcional)</label>
                <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="kit-lr3"><label class="form-check-label mr-small" for="kit-lr3">Extranjero</label></div>
            </div>
            <input id="kit-lr2" class="form-control" type="text" placeholder="CURP (18 caracteres)">
        </div>
    </div>
    <x-slot:code>
@verbatim
<div class="mr-label-row">
    <label class="form-label" for="curp">CURP (opcional)</label>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="extranjero">
        <label class="form-check-label mr-small" for="extranjero">Extranjero</label>
    </div>
</div>
<input id="curp" class="form-control">
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Formulario largo en secciones" note="Divide un formulario de más de cinco campos en secciones con título y una línea de ayuda. Pon el formulario en una tarjeta de ancho cómodo y las instrucciones en una caja a un lado.">
    <div class="row g-3 w-100">
        <div class="col-lg-8">
            <div class="mr-form-section">
                <h6 class="mr-form-section-title">Datos de la persona</h6>
                <p class="mr-form-section-hint">Se toman de SIGEM; revisa que coincidan.</p>
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label mr-req" for="kit-fs1">Nombre</label><input id="kit-fs1" class="form-control"></div>
                    <div class="col-md-6"><label class="form-label mr-req" for="kit-fs2">Correo</label><input id="kit-fs2" class="form-control" type="email"></div>
                </div>
            </div>
            <div class="mr-form-section">
                <h6 class="mr-form-section-title">Acceso</h6>
                <p class="mr-form-section-hint">Define qué puede hacer en el sistema.</p>
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label" for="kit-fs3">Rol</label><select id="kit-fs3" class="form-select"><option>Selecciona un rol</option></select></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4"><div class="mr-box is-soft mr-small">Caja lateral con las instrucciones del formulario.</div></div>
    </div>
    <x-slot:code>
@verbatim
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card"><div class="card-body p-4">
            <section class="mr-form-section">
                <h6 class="mr-form-section-title">Datos de la persona</h6>
                <p class="mr-form-section-hint">Se toman de SIGEM; revisa que coincidan.</p>
                …campos…
            </section>
            <section class="mr-form-section">…</section>
            <div class="mr-form-actions">…</div>
        </div></div>
    </div>
    <div class="col-lg-4"><div class="mr-box is-soft position-sticky" style="top: 1rem">…instrucciones…</div></div>
</div>
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Contraseña y pantalla de acceso" note="mr-password agrega el botón para mostrar u ocultar. Las pantallas de acceso usan mr-auth (fondo), mr-auth-card con has-brand (dos paneles), mr-auth-brand y mr-auth-form. El botón con data-loading-text muestra «Ingresando…» al enviar.">
    <div class="w-100" style="max-width: 420px;">
        <label class="form-label" for="kit-pw">Contraseña</label>
        <div class="mr-password">
            <input id="kit-pw" class="form-control" type="password" value="secreto123" autocomplete="current-password">
            <button type="button" class="mr-password-toggle" data-mr-password-toggle aria-label="Mostrar la contraseña" aria-pressed="false"><i class="ri-eye-line"></i></button>
        </div>
        <button type="button" class="btn btn-primary w-100 mt-3" data-loading-text="Ingresando…">Ingresar</button>
    </div>
    <x-slot:code>
@verbatim
<div class="mr-auth">
    <div class="mr-auth-card has-brand">
        <div class="mr-auth-brand">
            <img class="mr-auth-logo" src="…logo-blanco.svg" alt="SIGEM">
            <img class="mr-auth-crest" src="…escudo-blanco.svg" alt="">
            <p>Sistema de Información para la Gestión Marista.</p>
        </div>
        <div class="mr-auth-form">
            <h1 class="mr-auth-title">Módulo CRM</h1>
            <p class="mr-auth-lead">Inicia sesión con tu correo y contraseña.</p>
            <form method="POST">
                <label class="form-label" for="password">Contraseña</label>
                <div class="mr-password">
                    <input id="password" class="form-control" type="password">
                    <button type="button" class="mr-password-toggle" data-mr-password-toggle aria-label="Mostrar la contraseña" aria-pressed="false"><i class="ri-eye-line"></i></button>
                </div>
                <button class="btn btn-primary w-100 mt-3" data-loading-text="Ingresando…">Ingresar</button>
            </form>
        </div>
    </div>
</div>
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Tamaños de campos" note="Pequeño en filtros y celdas de tabla, normal en formularios, grande en pantallas táctiles. Se piden con form-control-sm, form-control-lg, form-select-sm y form-select-lg.">
    <div class="row g-3 w-100">
        <div class="col-md-4">
            <label class="form-label" for="kit-t-sm">Pequeño</label>
            <input id="kit-t-sm" class="form-control form-control-sm" type="text" value="María López">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="kit-t-md">Normal</label>
            <input id="kit-t-md" class="form-control" type="text" value="María López">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="kit-t-lg">Grande</label>
            <input id="kit-t-lg" class="form-control form-control-lg" type="text" value="María López">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="kit-s-sm">Selector pequeño</label>
            <select id="kit-s-sm" class="form-select form-select-sm"><option>Todos los estados</option></select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="kit-s-md">Selector normal</label>
            <select id="kit-s-md" class="form-select"><option>Todos los estados</option></select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="kit-s-lg">Selector grande</label>
            <select id="kit-s-lg" class="form-select form-select-lg"><option>Todos los estados</option></select>
        </div>
        <div class="col-md-4">
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="ri-search-line"></i></span>
                <input class="form-control" type="search" placeholder="Buscar (pequeño)" aria-label="Buscar, tamaño pequeño">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-text"><i class="ri-search-line"></i></span>
                <input class="form-control" type="search" placeholder="Buscar (normal)" aria-label="Buscar, tamaño normal">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group input-group-lg">
                <span class="input-group-text"><i class="ri-search-line"></i></span>
                <input class="form-control" type="search" placeholder="Buscar (grande)" aria-label="Buscar, tamaño grande">
            </div>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Estados del campo">
    <div class="row g-3 w-100">
        <div class="col-md-4">
            <label class="form-label" for="kit-ok">Correo electrónico</label>
            <input id="kit-ok" class="form-control is-valid" type="email" value="maria.lopez@ejemplo.mx">
            <div class="valid-feedback d-block">Correo válido.</div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="kit-error">Teléfono celular</label>
            <input id="kit-error" class="form-control is-invalid" type="tel" value="55352">
            <div class="invalid-feedback d-block">Escribe los 10 dígitos del celular.</div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="kit-dis">Folio</label>
            <input id="kit-dis" class="form-control" type="text" value="REG-13573" disabled>
            <div class="form-text">Lo asigna el sistema.</div>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Grupo de entrada y búsqueda">
    <div class="row g-3 w-100">
        <div class="col-md-6">
            <label class="form-label" for="kit-buscar">Buscar persona</label>
            <div class="input-group">
                <span class="input-group-text"><i class="ri-search-line"></i></span>
                <input id="kit-buscar" class="form-control" type="search" placeholder="Nombre, correo o folio">
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="kit-cel">Celular</label>
            <div class="input-group">
                <span class="input-group-text">+52</span>
                <input id="kit-cel" class="form-control" type="tel" placeholder="10 dígitos">
            </div>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Casillas, opciones e interruptor">
    <div class="d-flex flex-wrap gap-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="kit-chk" checked>
            <label class="form-check-label" for="kit-chk">Enviar copia al responsable</label>
        </div>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="kit-radio" id="kit-r1" checked>
                <label class="form-check-label" for="kit-r1">Por correo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="kit-radio" id="kit-r2">
                <label class="form-check-label" for="kit-r2">Por teléfono</label>
            </div>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Tamaños de casillas y opciones" note="Con form-check-sm y form-check-lg en el contenedor. El tamaño grande es el recomendado en pantallas táctiles.">
    <div class="d-flex flex-wrap align-items-center gap-4">
        <div class="form-check form-check-sm">
            <input class="form-check-input" type="checkbox" id="kit-c-sm" checked>
            <label class="form-check-label" for="kit-c-sm">Pequeña</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="kit-c-md" checked>
            <label class="form-check-label" for="kit-c-md">Normal</label>
        </div>
        <div class="form-check form-check-lg">
            <input class="form-check-input" type="checkbox" id="kit-c-lg" checked>
            <label class="form-check-label" for="kit-c-lg">Grande</label>
        </div>
        <div class="form-check form-check-lg">
            <input class="form-check-input" type="radio" name="kit-rd-lg" id="kit-rd-lg" checked>
            <label class="form-check-label" for="kit-rd-lg">Opción grande</label>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Interruptores" note="Para opciones que se activan o desactivan al instante. Tres tamaños: pequeño dentro de tablas y barras, normal en formularios, grande en pantallas táctiles.">
    <div class="d-flex flex-wrap align-items-center gap-4">
        <div class="form-check form-switch form-switch-sm">
            <input class="form-check-input" type="checkbox" role="switch" id="kit-sw-sm" checked>
            <label class="form-check-label" for="kit-sw-sm">Pequeño</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="kit-sw-md" checked>
            <label class="form-check-label" for="kit-sw-md">Avisar al responsable</label>
        </div>
        <div class="form-check form-switch form-switch-lg">
            <input class="form-check-input" type="checkbox" role="switch" id="kit-sw-lg" checked>
            <label class="form-check-label" for="kit-sw-lg">Grande</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="kit-sw-off">
            <label class="form-check-label" for="kit-sw-off">Apagado</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="kit-sw-dis" checked disabled>
            <label class="form-check-label" for="kit-sw-dis">Deshabilitado</label>
        </div>
    </div>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Pon la etiqueta arriba del campo y explica el formato en el texto de ayuda. Marca el error junto al campo con una frase que diga cómo corregirlo.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No uses el placeholder como etiqueta. No muestres mensajes de error genéricos como «Dato inválido» ni solo los pintes de rojo.</x-maristas::rule></div>
</div>
    
