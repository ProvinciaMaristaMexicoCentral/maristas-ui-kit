{{-- BOTONES --}}
<section id="botones" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Botones</h2>
        <p class="lead-text">Un botón principal por vista. Los demás son secundarios. Todos comparten alto, radio, tipografía y estados; el deshabilitado es azul claro, nunca gris.</p>

        <x-maristas::example title="Variantes">
            <x-maristas::button icon="ri-contacts-fill">Registrar seguimiento</x-maristas::button>
            <x-maristas::button variant="secondary" icon="ri-mail-line">Correo</x-maristas::button>
            <x-maristas::button variant="danger" icon="ri-delete-bin-line">Eliminar</x-maristas::button>
            <x-maristas::button variant="success" icon="ri-check-line">Aprobar</x-maristas::button>
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

        <x-maristas::example title="Grupo y menú de acciones">
            <div class="btn-group" role="group" aria-label="Vista">
                <button type="button" class="btn btn-primary btn-sm">Lista</button>
                <button type="button" class="btn btn-light btn-sm">Tarjetas</button>
            </div>
            <div class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Acciones</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#botones"><i class="ri-user-shared-line me-2"></i>Reasignar</a></li>
                    <li><a class="dropdown-item" href="#botones"><i class="ri-history-line me-2"></i>Ver historial</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#botones"><i class="ri-delete-bin-line me-2"></i>Eliminar</a></li>
                </ul>
            </div>
        </x-maristas::example>

        <div class="row g-3">
            <div class="col-md-6"><x-maristas::rule>Nombra el botón con el verbo de lo que hace: «Guardar cambios», «Registrar seguimiento». Mantén el mismo nombre en todo el flujo.</x-maristas::rule></div>
            <div class="col-md-6"><x-maristas::rule :do="false">No pongas dos botones principales en la misma vista. No uses «Aceptar», «Enviar» o «OK» sin decir qué se acepta o se envía.</x-maristas::rule></div>
        </div>
    </div>
</section>

{{-- FORMULARIOS --}}
<section id="formularios" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Formularios</h2>
        <p class="lead-text">Etiqueta pequeña arriba, campo con radio medio y un anillo azul al enfocar. El mismo estilo para campos, selectores y áreas de texto. Los errores dicen qué pasó y cómo corregirlo.</p>

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
    </div>
</section>

{{-- TABLAS --}}
<section id="tablas" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Tablas</h2>
        <p class="lead-text">Encabezado en gris sobre fondo suave, filas con separadores finos y resaltado al pasar el cursor. Los estados van como etiquetas y las acciones de fila en un menú.</p>

        <x-maristas::example title="Lista de registros">
            <div class="mr-table-wrap w-100">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr><th>Folio</th><th>Nombre</th><th>Grado</th><th>Estado</th><th>Responsable</th><th class="text-end">Acciones</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#tablas" class="mr-link">REG-14958</a></td>
                                <td><div class="d-flex align-items-center gap-2"><x-maristas::avatar name="María López" size="sm" soft />María López</div></td>
                                <td>5º Primaria</td>
                                <td><x-maristas::state tone="success">Completo</x-maristas::state></td>
                                <td>Laura Ramírez</td>
                                <td class="text-end"><x-maristas::button variant="secondary" size="sm" aria-label="Más acciones"><i class="ri-more-2-fill"></i></x-maristas::button></td>
                            </tr>
                            <tr>
                                <td><a href="#tablas" class="mr-link">REG-14960</a></td>
                                <td><div class="d-flex align-items-center gap-2"><x-maristas::avatar name="Jorge Hernández" size="sm" soft />Jorge Hernández</div></td>
                                <td>1º Primaria</td>
                                <td><x-maristas::state tone="info">Nuevo</x-maristas::state></td>
                                <td><span class="text-muted">Sin asignar</span></td>
                                <td class="text-end"><x-maristas::button variant="secondary" size="sm" aria-label="Más acciones"><i class="ri-more-2-fill"></i></x-maristas::button></td>
                            </tr>
                            <tr>
                                <td><a href="#tablas" class="mr-link">REG-05318</a></td>
                                <td><div class="d-flex align-items-center gap-2"><x-maristas::avatar name="Carlos Rivas" size="sm" soft />Carlos Rivas</div></td>
                                <td>Bachillerato</td>
                                <td><x-maristas::state tone="warning">En revisión</x-maristas::state></td>
                                <td>Laura Ramírez</td>
                                <td class="text-end"><x-maristas::button variant="secondary" size="sm" aria-label="Más acciones"><i class="ri-more-2-fill"></i></x-maristas::button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Paginación">
            <nav aria-label="Paginación de la lista">
                <ul class="pagination mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#tablas" aria-label="Anterior"><i class="ri-arrow-left-s-line"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#tablas">1</a></li>
                    <li class="page-item"><a class="page-link" href="#tablas">2</a></li>
                    <li class="page-item"><a class="page-link" href="#tablas">3</a></li>
                    <li class="page-item"><a class="page-link" href="#tablas" aria-label="Siguiente"><i class="ri-arrow-right-s-line"></i></a></li>
                </ul>
            </nav>
        </x-maristas::example>
    </div>
</section>

{{-- TARJETAS Y KPI --}}
<section id="tarjetas" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Tarjetas y cifras</h2>
        <p class="lead-text">La tarjeta agrupa una idea. Solo la cifra que es el punto de la pantalla se destaca como indicador; no todo número merece una tarjeta.</p>

        <x-maristas::example title="Indicadores">
            <div class="row g-3 w-100">
                <div class="col-md-4"><x-maristas::stat label="Registros activos" value="248" delta="12 más que la semana pasada" /></div>
                <div class="col-md-4"><x-maristas::stat label="Respuestas sin leer" value="7" delta="3 más que ayer" trend="down" /></div>
                <div class="col-md-4"><x-maristas::stat label="Citas esta semana" value="19" /></div>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Variantes de tarjeta">
            <div class="row g-3 w-100">
                <div class="col-md-4"><div class="card h-100"><div class="card-body"><h6 class="card-title mb-1">Con sombra</h6><p class="text-muted small mb-0">La predeterminada. Para el contenido principal de la página.</p></div></div></div>
                <div class="col-md-4"><div class="card mr-card-flat h-100"><div class="card-body"><h6 class="card-title mb-1">Plana con borde</h6><p class="text-muted small mb-0">Para contenido secundario o anidado dentro de otra tarjeta.</p></div></div></div>
                <div class="col-md-4"><div class="card mr-card-accent h-100"><div class="card-body"><h6 class="card-title mb-1">Con acento</h6><p class="text-muted small mb-0">Marca una tarjeta que requiere atención. Úsala una vez por vista.</p></div></div></div>
            </div>
        </x-maristas::example>
    </div>
</section>

{{-- ESTADOS --}}
<section id="estados" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Estados y propiedades</h2>
        <p class="lead-text">Una etiqueta de estado dice una cosa y usa un color semántico. Nunca se usa el color de marca para un estado.</p>

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
    </div>
</section>

{{-- ALERTAS --}}
<section id="alertas" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Alertas y avisos</h2>
        <p class="lead-text">Una alerta explica qué pasó y qué hacer. Se queda en la página hasta que se resuelve. Un aviso temporal (toast) confirma una acción y desaparece solo.</p>

        <x-maristas::example title="Alertas" note="Cuatro tonos; puede llevar un botón de cerrar.">
            <div class="w-100 d-flex flex-column gap-2">
                <x-maristas::alert tone="info">El mensaje se enviará desde el buzón de la escuela.</x-maristas::alert>
                <x-maristas::alert tone="success">Responsable actualizado correctamente.</x-maristas::alert>
                <x-maristas::alert tone="warning">En <strong>Confirmación</strong>: los datos del estudiante no pueden modificarse.</x-maristas::alert>
                <x-maristas::alert tone="danger" dismissible>Este registro fue rechazado en la revisión y no puede avanzar.</x-maristas::alert>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Aviso temporal (toast)">
            <x-maristas::button variant="secondary" size="sm" id="kit-toast-btn">Mostrar aviso</x-maristas::button>
            <div class="toast-container position-static">
                <div id="kit-toast" class="toast align-items-center" role="status" aria-live="polite" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body"><i class="ri-checkbox-circle-line text-success me-1"></i>Nota publicada.</div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                    </div>
                </div>
            </div>
        </x-maristas::example>
    </div>
</section>

{{-- NAVEGACIÓN --}}
<section id="navegacion" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Navegación</h2>
        <p class="lead-text">Pestañas para cambiar de contenido dentro de una misma página; filtros en píldora para acotar una lista; ruta de migas para ubicarse.</p>

        <x-maristas::example title="Pestañas con subrayado">
            <ul class="nav nav-tabs mr-tabs w-100">
                <li class="nav-item"><a class="nav-link active" href="#navegacion"><i class="ri-history-line me-1"></i>Seguimiento</a></li>
                <li class="nav-item"><a class="nav-link" href="#navegacion"><i class="ri-mail-line me-1"></i>Comunicación</a></li>
                <li class="nav-item"><a class="nav-link" href="#navegacion"><i class="ri-user-line me-1"></i>Detalles</a></li>
            </ul>
        </x-maristas::example>

        <x-maristas::example title="Píldoras y filtros">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#navegacion">Activos</a></li>
                <li class="nav-item"><a class="nav-link" href="#navegacion">Ganados</a></li>
                <li class="nav-item"><a class="nav-link" href="#navegacion">Perdidos</a></li>
            </ul>
            <div class="mr-filters">
                <button type="button" class="mr-filter is-active">Todo</button>
                <button type="button" class="mr-filter">Notas</button>
                <button type="button" class="mr-filter">Mensajes</button>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Ruta de migas">
            <nav aria-label="Ruta">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#navegacion" class="mr-link">Lista de registros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle del registro</li>
                </ol>
            </nav>
        </x-maristas::example>
    </div>
</section>

{{-- OVERLAYS --}}
<section id="overlays" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Ventanas y capas</h2>
        <p class="lead-text">Modal para decidir o capturar algo sin salir de la página (un editor largo, como redactar un mensaje, va en modal grande con scroll y sin cerrarse al hacer clic fuera); panel lateral para tareas más largas; globos de ayuda para aclarar sin ocupar espacio.</p>

        <x-maristas::example title="Modal, panel lateral, ayuda y popover">
            <x-maristas::button variant="secondary" data-bs-toggle="modal" data-bs-target="#kit-modal">Abrir modal</x-maristas::button>
            <x-maristas::button variant="secondary" data-bs-toggle="offcanvas" data-bs-target="#kit-offcanvas">Abrir panel lateral</x-maristas::button>
            <x-maristas::button variant="secondary" data-bs-toggle="tooltip" data-bs-title="Asigna el registro a otro responsable">Ayuda corta</x-maristas::button>
            <x-maristas::button variant="secondary" data-bs-toggle="popover" data-bs-title="Parentesco" data-bs-content="Indica la relación de la persona de contacto con el estudiante.">Popover</x-maristas::button>
        </x-maristas::example>

        <div class="modal fade" id="kit-modal" tabindex="-1" aria-labelledby="kit-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kit-modal-title">Eliminar documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">El archivo se quitará del expediente y se registrará el movimiento en el historial. ¿Quieres continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="kit-editar-modal" tabindex="-1" aria-labelledby="kit-editar-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kit-editar-modal-title">Editar contacto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="kit-ed-tel">Teléfono celular</label>
                            <input id="kit-ed-tel" class="form-control" type="tel" value="55 1234 5678">
                        </div>
                        <div>
                            <label class="form-label" for="kit-ed-correo">Correo electrónico</label>
                            <input id="kit-ed-correo" class="form-control" type="email" value="maria.lopez@ejemplo.mx">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="kit-offcanvas" aria-labelledby="kit-offcanvas-title">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="kit-offcanvas-title">Filtros</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body">
                <label class="form-label" for="kit-of-estatus">Estado</label>
                <select id="kit-of-estatus" class="form-select mb-3"><option>Todos</option><option>Nuevo</option><option>En revisión</option></select>
                <x-maristas::button class="w-100">Aplicar filtros</x-maristas::button>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6"><x-maristas::rule>El título del modal dice la acción y el botón principal repite ese verbo: «Deshacer cambio». Siempre hay una salida clara: «Cancelar».</x-maristas::rule></div>
            <div class="col-md-6"><x-maristas::rule :do="false">No abras un modal sobre otro modal. No pongas en un tooltip información imprescindible: no se ve en pantallas táctiles.</x-maristas::rule></div>
        </div>
    </div>
</section>

{{-- FEEDBACK --}}
<section id="feedback" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Progreso y carga</h2>
        <p class="lead-text">Mientras algo carga se muestra la forma de lo que vendrá; si no se puede saber cuánto falta, un indicador giratorio.</p>

        <x-maristas::example title="Barras de progreso">
            <div class="w-100 d-flex flex-column gap-3">
                <div><div class="d-flex justify-content-between mr-small mb-1"><span>Documentos entregados</span><span>3 de 5</span></div><div class="progress" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar" style="width: 60%"></div></div></div>
                <div><div class="d-flex justify-content-between mr-small mb-1"><span>Pago de colegiatura</span><span>100%</span></div><div class="progress" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar is-success" style="width: 100%"></div></div></div>
                <div><div class="d-flex justify-content-between mr-small mb-1"><span>Adeudo vencido</span><span>25%</span></div><div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar is-danger" style="width: 25%"></div></div></div>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Indicador giratorio y esqueleto de carga">
            <div class="d-flex align-items-center gap-2"><span class="spinner-border spinner-border-sm" role="status"></span><span class="mr-small">Abriendo correo…</span></div>
            <div class="w-100" style="max-width: 420px;" aria-hidden="true">
                <div class="d-flex gap-3 align-items-center">
                    <span class="mr-skeleton" style="width: 44px; height: 44px; border-radius: 50%;"></span>
                    <div class="flex-grow-1 d-flex flex-column gap-2">
                        <span class="mr-skeleton" style="height: 12px; width: 60%;"></span>
                        <span class="mr-skeleton" style="height: 12px; width: 90%;"></span>
                    </div>
                </div>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Estado vacío">
            <div class="w-100">
                <x-maristas::empty-state icon="ri-mail-open-line" title="Aún no hay mensajes">
                    Los mensajes que envíes y las respuestas que recibas aparecerán aquí.
                    <div class="mt-3"><x-maristas::button size="sm">Redactar mensaje</x-maristas::button></div>
                </x-maristas::empty-state>
            </div>
        </x-maristas::example>
    </div>
</section>

{{-- DISCLOSURE --}}
<section id="disclosure" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Acordeón y listas</h2>
        <p class="lead-text">Para ocultar detalle secundario sin perderlo, y para mostrar elementos que se escanean uno tras otro.</p>

        <x-maristas::example title="Acordeón">
            <div class="accordion w-100" id="kit-acordeon">
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#kit-ac1" aria-expanded="true" aria-controls="kit-ac1">Inscripciones activas</button></h2>
                    <div id="kit-ac1" class="accordion-collapse collapse show" data-bs-parent="#kit-acordeon"><div class="accordion-body small">Ana Sofía Pérez López · 5º Primaria</div></div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kit-ac2" aria-expanded="false" aria-controls="kit-ac2">Inscripciones anteriores</button></h2>
                    <div id="kit-ac2" class="accordion-collapse collapse" data-bs-parent="#kit-acordeon"><div class="accordion-body small">Sin inscripciones anteriores.</div></div>
                </div>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Lista de elementos">
            <ul class="list-group w-100">
                <li class="list-group-item active">Plantilla: Recordatorio de documentos</li>
                <li class="list-group-item">Plantilla: Bienvenida al ciclo escolar</li>
                <li class="list-group-item">Plantilla: Recordatorio de cita</li>
            </ul>
        </x-maristas::example>
    </div>
</section>

{{-- AVATARES --}}
<section id="avatares" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Avatares</h2>
        <p class="lead-text">Iniciales sobre un fondo de marca. Tres tamaños y una versión suave para filas de tabla.</p>
        <x-maristas::example title="Tamaños y variantes">
            <x-maristas::avatar name="María López" size="lg" />
            <x-maristas::avatar name="María López" size="md" />
            <x-maristas::avatar name="María López" size="sm" />
            <x-maristas::avatar name="María López" size="md" soft />
            <span class="mr-av-stack">
                <x-maristas::avatar name="Laura Ramírez" size="sm" />
                <x-maristas::avatar name="Carlos Rivas" size="sm" soft />
                <x-maristas::avatar name="Jorge Hernández" size="sm" />
            </span>
        </x-maristas::example>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.bootstrap) return;
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) { new bootstrap.Tooltip(el); });
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach(function (el) { new bootstrap.Popover(el); });
        var boton = document.getElementById('kit-toast-btn');
        var toast = document.getElementById('kit-toast');
        if (boton && toast) boton.addEventListener('click', function () { bootstrap.Toast.getOrCreateInstance(toast).show(); });
    });
</script>
@endpush
