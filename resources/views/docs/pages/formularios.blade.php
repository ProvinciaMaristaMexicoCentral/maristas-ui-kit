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
    
