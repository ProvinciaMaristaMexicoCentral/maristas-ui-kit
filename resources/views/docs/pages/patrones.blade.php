            <x-maristas::example title="Cabecera de perfil" note="Nombre como protagonista, relación en una línea, contacto como chips clicables y una sola acción principal.">
                <div class="w-100 d-flex flex-wrap gap-3 justify-content-between align-items-start">
                    <div class="mr-person">
                        <div class="mr-avatar" aria-hidden="true">ML</div>
                        <div class="min-w-0">
                            <h3 class="mr-name">María López</h3>
                            <div class="mr-relation">Responsable de Ana Sofía Pérez López</div>
                            <div class="mr-chips">
                                <a class="mr-chip" href="#"><i class="ri-phone-line"></i>55 1234 5678</a>
                                <a class="mr-chip" href="#"><i class="ri-mail-line"></i>maria.lopez@ejemplo.mx</a>
                            </div>
                        </div>
                    </div>
                    <div class="mr-actions">
                        <button type="button" class="mr-btn-ghost"><i class="ri-sticky-note-line"></i>Nota</button>
                        <button type="button" class="mr-btn-ghost"><i class="ri-mail-line"></i>Correo</button>
                        <button type="button" class="btn btn-primary"><i class="ri-checkbox-circle-line"></i>Guardar cambios</button>
                    </div>
                </div>
            </x-maristas::example>

            <x-maristas::example title="Progreso por etapas" note="Cuatro etapas; la actual en azul de marca, las anteriores en azul claro. Si el resultado es negativo, agrega is-danger.">
                <ol class="mr-steps w-100" aria-label="Etapas del proceso">
                    <li class="mr-step is-done"><div class="mr-step-bar"></div><div class="mr-step-label">Solicitud</div></li>
                    <li class="mr-step is-current" aria-current="step"><div class="mr-step-bar"></div><div class="mr-step-label">Revisión</div></li>
                    <li class="mr-step"><div class="mr-step-bar"></div><div class="mr-step-label">Confirmación</div></li>
                    <li class="mr-step"><div class="mr-step-bar"></div><div class="mr-step-label">Cierre</div></li>
                </ol>
            </x-maristas::example>

            <x-maristas::example title="Datos clave en una fila" note="Columnas con divisores finos, sin cajas. En pantallas angostas se apilan.">
                <div class="mr-facts w-100" style="margin-top: 0; padding-top: 0; border-top: 0;">
                    <div class="mr-fact"><div class="mr-eyebrow">Estudiante</div><div class="mr-fact-value">Ana Sofía Pérez López</div><div class="mr-fact-sub">Matrícula 20260145</div></div>
                    <div class="mr-fact"><div class="mr-eyebrow">Grado</div><div class="mr-fact-value">5º Primaria</div><div class="mr-fact-sub">Ciclo escolar 2026 - 2027</div></div>
                    <div class="mr-fact"><div class="mr-eyebrow">Responsable</div><div class="mr-fact-value">Laura Ramírez</div></div>
                </div>
            </x-maristas::example>

            <x-maristas::example title="Acción de editar" note="Botón punteado en azul con lápiz y el nombre de lo que edita: «Editar contacto», «Editar estudiante», «Editar grado». Va al final del bloque. Si no se puede editar en ese momento, el mismo botón aparece con candado, atenuado, y explica el motivo al pasar el cursor.">
                <div class="d-flex flex-wrap gap-2">
                    <x-maristas::edit-link target="#kit-editar-modal" label="Editar contacto" />
                    <x-maristas::edit-link target="#kit-editar-modal" label="Editar estudiante" />
                    <x-maristas::edit-link target="#kit-editar-modal" label="Editar grado" />
                    <x-maristas::edit-link target="#kit-editar-modal" :locked="true" locked-label="Estudiante bloqueado" locked-title="Los datos ya fueron confirmados y no pueden modificarse" />
                </div>
            </x-maristas::example>

            <x-maristas::example title="Pestañas y filtros">
                <div class="w-100">
                    <ul class="nav nav-tabs mr-tabs mb-3">
                        <li class="nav-item"><a class="nav-link active" href="#patrones">Actividad</a></li>
                        <li class="nav-item"><a class="nav-link" href="#patrones">Mensajes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#patrones">Detalles</a></li>
                    </ul>
                    <div class="mr-filters">
                        <button type="button" class="mr-filter is-active">Todo</button>
                        <button type="button" class="mr-filter">Notas</button>
                        <button type="button" class="mr-filter">Mensajes</button>
                    </div>
                </div>
            </x-maristas::example>

            <x-maristas::example title="Línea de tiempo por día" note="Un encabezado por día y tres tipos de entrada: las notas y actividades llevan avatar del autor y una burbuja con el texto; los cambios de estado son una sola línea con etiquetas «antes → después»; el autor siempre se muestra: en las notas va en negrita y en los demás eventos junto a la hora. Si un comentario se repite en eventos seguidos, se escribe una sola vez.">
                <div class="w-100">
                    <h6 class="mr-day">Hoy</h6>
                    <ol class="mr-tl">
                        <li class="mr-tl-item">
                            <span class="mr-tl-dot bg-success-subtle text-success"><i class="ri-arrow-left-right-line"></i></span>
                            <div class="mr-tl-main">
                                <div class="mr-tl-line"><x-maristas::state tone="neutral">En revisión</x-maristas::state><i class="ri-arrow-right-line text-muted"></i><x-maristas::state tone="success">Aprobado</x-maristas::state><span class="mr-small">· pasa a <strong>Confirmación</strong></span><span class="mr-tl-time"><span class="mr-tl-author">Laura Ramírez</span> · 11:57 a. m.</span></div>
                            </div>
                        </li>
                        <li class="mr-tl-item">
                            <x-maristas::avatar name="Laura Ramírez" size="sm" class="mr-tl-dot" />
                            <div class="mr-tl-main">
                                <div class="mr-tl-line"><strong>Laura Ramírez</strong><span class="text-muted">agregó una nota</span><span class="mr-tl-time">11:49 a. m.</span></div>
                                <div class="mr-tl-note">Entregó la documentación completa.</div>
                            </div>
                        </li>
                        <li class="mr-tl-item">
                            <x-maristas::avatar name="Laura Ramírez" size="sm" class="mr-tl-dot" />
                            <div class="mr-tl-main">
                                <div class="mr-tl-line"><strong>Laura Ramírez</strong><span class="text-muted">registró</span><x-maristas::state tone="warning" icon="ri-calendar-event-line">Cita</x-maristas::state><span class="mr-tl-time">11:40 a. m.</span></div>
                                <div class="mr-tl-note">Visita al plantel y entrega de documentos.</div>
                            </div>
                        </li>
                    </ol>
                    <h6 class="mr-day">Ayer</h6>
                    <ol class="mr-tl">
                        <li class="mr-tl-item">
                            <span class="mr-tl-dot bg-info-subtle text-info"><i class="ri-mail-download-line"></i></span>
                            <div class="mr-tl-main">
                                <div class="mr-tl-line"><strong>Respuesta recibida</strong><span class="mr-tl-time"><span class="mr-tl-author">María López</span> · 4:12 p. m.</span></div>
                                <div class="mr-tl-quote">Gracias, adjunto el acta de nacimiento que faltaba.</div>
                            </div>
                        </li>
                    </ol>
                </div>
            </x-maristas::example>

            <x-maristas::example title="Fila de bandeja de mensajes" note="Flecha de dirección, remitente, asunto en negrita si no se ha leído, extracto de una línea y estado.">
                <ul class="list-unstyled mb-0 w-100" style="max-width: 380px; border: 1px solid var(--maristas-line); border-radius: var(--maristas-radius-md); overflow: hidden;">
                    <li class="mr-mail is-in is-unread is-selected">
                        <button type="button" class="mr-mail-row">
                            <span class="mr-mail-dir"><i class="ri-arrow-down-line"></i></span>
                            <span class="mr-mail-main">
                                <span class="d-flex justify-content-between gap-2"><span class="mr-mail-who text-truncate">maria.lopez@ejemplo.mx</span><span class="mr-mail-date">5 nov, 11:04 a. m.</span></span>
                                <span class="d-block mr-mail-subject text-truncate">Re: Documentos del ciclo escolar</span>
                                <span class="mr-mail-snippet">Gracias, adjunto el acta de nacimiento que faltaba</span>
                                <span class="d-flex gap-1 mt-1"><x-maristas::state tone="info">Respuesta nueva</x-maristas::state></span>
                            </span>
                        </button>
                    </li>
                    <li class="mr-mail is-out">
                        <button type="button" class="mr-mail-row">
                            <span class="mr-mail-dir"><i class="ri-arrow-up-line"></i></span>
                            <span class="mr-mail-main">
                                <span class="d-flex justify-content-between gap-2"><span class="mr-mail-who text-truncate">secretaria@ejemplo.mx</span><span class="mr-mail-date">11 sep, 2:29 p. m.</span></span>
                                <span class="d-block mr-mail-subject text-truncate">Recordatorio de entrega de documentos</span>
                                <span class="mr-mail-snippet">Hola, María: te recordamos que falta un documento</span>
                                <span class="d-flex gap-1 mt-1"><x-maristas::state tone="success">Enviado</x-maristas::state></span>
                            </span>
                        </button>
                    </li>
                </ul>
            </x-maristas::example>
        
