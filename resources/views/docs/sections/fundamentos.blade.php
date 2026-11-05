{{-- COLORES --}}
<section id="colores" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Colores</h2>
        <p class="lead-text">La marca es el azul institucional. Los estados (éxito, atención, error, información) son independientes de la marca y nunca se usan como acento decorativo.</p>

        <h6 class="mb-2">Marca</h6>
        <div class="mr-swatches mb-4">
            @foreach ([
                ['--maristas-brand', '#0b3a6f', 'Botón principal, pestaña activa, progreso'],
                ['--maristas-brand-strong', '#082b54', 'Hover del botón principal'],
                ['--maristas-brand-soft', '#e7eefb', 'Fondos suaves, fila seleccionada'],
                ['--maristas-accent', '#2f6fed', 'Foco de teclado, enlaces, indicador de nuevo'],
            ] as [$token, $hex, $uso])
                <div class="mr-swatch">
                    <div class="mr-swatch-color" style="background: var({{ $token }});"></div>
                    <div class="mr-swatch-meta"><code>{{ $token }}</code>{{ $hex }}<div class="text-muted">{{ $uso }}</div></div>
                </div>
            @endforeach
        </div>

        <h6 class="mb-2">Neutros</h6>
        <div class="mr-swatches mb-4">
            @foreach ([
                ['--maristas-ink', '#172033', 'Texto principal'],
                ['--maristas-muted', '#6a7489', 'Texto secundario y etiquetas'],
                ['--maristas-line', '#e6e9f1', 'Bordes y divisores'],
                ['--maristas-soft', '#f4f6fb', 'Fondo de página y bloques'],
                ['--maristas-surface', '#ffffff', 'Tarjetas y campos'],
            ] as [$token, $hex, $uso])
                <div class="mr-swatch">
                    <div class="mr-swatch-color" style="background: var({{ $token }});"></div>
                    <div class="mr-swatch-meta"><code>{{ $token }}</code>{{ $hex }}<div class="text-muted">{{ $uso }}</div></div>
                </div>
            @endforeach
        </div>

        <h6 class="mb-2">Estados (color fuerte y fondo suave)</h6>
        <div class="mr-swatches mb-4">
            @foreach ([
                ['success', '#12805c', '#e3f5ee', 'Éxito, enviado, aprobado'],
                ['warning', '#a96a00', '#fdf1d8', 'Atención, pendiente'],
                ['danger', '#c93a3a', '#fce8e8', 'Error, bloqueo, baja'],
                ['info', '#1f6aa8', '#e3f0fb', 'Información, respuesta nueva'],
            ] as [$nombre, $hex, $soft, $uso])
                <div class="mr-swatch">
                    <div class="mr-swatch-color" style="background: linear-gradient(90deg, var(--maristas-{{ $nombre }}) 50%, var(--maristas-{{ $nombre }}-soft) 50%);"></div>
                    <div class="mr-swatch-meta"><code>--maristas-{{ $nombre }}</code>{{ $hex }} · {{ $soft }}<div class="text-muted">{{ $uso }}</div></div>
                </div>
            @endforeach
        </div>

        <h6 class="mb-2">Contraste de texto sobre fondo</h6>
        <p class="text-muted small mb-2">Pares aprobados para texto normal (mínimo 4.5:1).</p>
        <div class="d-flex flex-wrap gap-2 mb-4">
            <span class="px-3 py-2 rounded" style="background: var(--maristas-surface); color: var(--maristas-ink); border: 1px solid var(--maristas-line);">Ink sobre superficie</span>
            <span class="px-3 py-2 rounded" style="background: var(--maristas-surface); color: var(--maristas-muted); border: 1px solid var(--maristas-line);">Muted sobre superficie</span>
            <span class="px-3 py-2 rounded" style="background: var(--maristas-brand); color: #fff;">Blanco sobre marca</span>
            <span class="px-3 py-2 rounded" style="background: var(--maristas-brand-soft); color: var(--maristas-brand);">Marca sobre marca suave</span>
            <span class="px-3 py-2 rounded" style="background: var(--maristas-success-soft); color: var(--maristas-success);">Éxito sobre éxito suave</span>
            <span class="px-3 py-2 rounded" style="background: var(--maristas-danger-soft); color: var(--maristas-danger);">Error sobre error suave</span>
        </div>

        <div class="row g-3">
            <div class="col-md-6"><x-maristas::rule>Usa el azul de marca para la acción principal y los elementos activos. Usa un color de estado solo cuando comunica un estado.</x-maristas::rule></div>
            <div class="col-md-6"><x-maristas::rule :do="false">No uses verde o rojo como decoración, ni dos colores de estado juntos para una misma información. El color nunca es la única señal: acompáñalo con texto o ícono.</x-maristas::rule></div>
        </div>
    </div>
</section>

{{-- TIPOGRAFÍA --}}
<section id="tipografia" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Tipografía</h2>
        <p class="lead-text">Una sola familia, Poppins, en pesos 400, 500, 600 y 700. La jerarquía se logra con tamaño y peso, no con mayúsculas ni con color.</p>

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
    </div>
</section>

{{-- ÍCONOS --}}
<section id="iconos" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Íconos</h2>
        <p class="lead-text">Usamos Remix Icon (<code>ri-*</code>), en estilo de línea. Haz clic en un ícono para copiar su clase. Un ícono acompaña al texto; si va solo, necesita <code>aria-label</code>.</p>
        <div class="mr-icons">
            @foreach ([
                'ri-user-line' => 'Persona', 'ri-user-smile-line' => 'Alumno', 'ri-phone-line' => 'Teléfono', 'ri-mail-line' => 'Correo',
                'ri-mail-send-line' => 'Enviado', 'ri-mail-open-line' => 'Bandeja', 'ri-sticky-note-line' => 'Nota', 'ri-calendar-event-line' => 'Actividad',
                'ri-contacts-fill' => 'Seguimiento', 'ri-history-line' => 'Historial', 'ri-book-open-line' => 'Oferta', 'ri-building-line' => 'Institución',
                'ri-attachment-2' => 'Adjunto', 'ri-edit-2-line' => 'Redactar', 'ri-pencil-fill' => 'Editar', 'ri-delete-bin-line' => 'Eliminar',
                'ri-check-line' => 'Confirmar', 'ri-close-line' => 'Cerrar', 'ri-search-line' => 'Buscar', 'ri-filter-3-line' => 'Filtrar',
                'ri-lock-line' => 'Bloqueado', 'ri-alert-line' => 'Alerta', 'ri-information-line' => 'Información', 'ri-reply-line' => 'Responder',
                'ri-arrow-down-line' => 'Recibido', 'ri-arrow-up-line' => 'Enviado (flecha)', 'ri-more-2-fill' => 'Más acciones', 'ri-download-2-line' => 'Descargar',
            ] as $clase => $nombre)
                <button type="button" class="mr-icon-tile" onclick="navigator.clipboard?.writeText('{{ $clase }}')" title="Copiar {{ $clase }}">
                    <i class="{{ $clase }}"></i>
                    <span>{{ $nombre }}</span>
                    <code>{{ $clase }}</code>
                </button>
            @endforeach
        </div>
    </div>
</section>

{{-- FORMA --}}
<section id="forma" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Forma y espacio</h2>
        <p class="lead-text">Tres radios según el tamaño del elemento, una sola sombra para las tarjetas y espaciado en múltiplos de 4px.</p>

        <h6 class="mb-2">Radios y sombra</h6>
        <div class="d-flex flex-wrap gap-3 mb-4">
            @foreach ([['sm', '8px', 'Chips, filtros'], ['md', '10px', 'Botones, campos'], ['lg', '16px', 'Tarjetas, modales']] as [$n, $px, $uso])
                <div class="text-center">
                    <div style="width: 96px; height: 64px; background: var(--maristas-brand-soft); border: 1px solid var(--maristas-line); border-radius: var(--maristas-radius-{{ $n }});"></div>
                    <code class="small d-block mt-1">--maristas-radius-{{ $n }}</code>
                    <span class="text-muted small">{{ $px }} · {{ $uso }}</span>
                </div>
            @endforeach
            <div class="text-center">
                <div style="padding: 12px; background: var(--maristas-canvas); border-radius: var(--maristas-radius-lg);"><div style="width: 72px; height: 40px; background: #fff; border-radius: var(--maristas-radius-lg); box-shadow: var(--maristas-shadow-card);"></div></div>
                <code class="small d-block mt-1">--maristas-shadow-card</code>
                <span class="text-muted small">Tarjetas</span>
            </div>
        </div>

        <h6 class="mb-2">Escala de espaciado</h6>
        <div class="d-flex flex-column gap-2 mb-4">
            @foreach ([1 => '4px', 2 => '8px', 3 => '12px', 4 => '16px', 5 => '24px', 6 => '32px'] as $n => $px)
                <div class="d-flex align-items-center gap-3">
                    <code style="width: 150px;">--maristas-space-{{ $n }}</code>
                    <div style="height: 12px; width: var(--maristas-space-{{ $n }}); background: var(--maristas-brand); border-radius: 3px;"></div>
                    <span class="text-muted small">{{ $px }}</span>
                </div>
            @endforeach
        </div>

        <h6 class="mb-2">Cuadrícula y puntos de quiebre</h6>
        <p class="text-muted small mb-2">Se usa la cuadrícula de 12 columnas de Bootstrap. El contenido se apila en una columna por debajo de 768px.</p>
        <div class="table-responsive mr-table-wrap">
            <table class="table mb-0">
                <thead><tr><th>Prefijo</th><th>Ancho mínimo</th><th>Uso típico</th></tr></thead>
                <tbody>
                    <tr><td><code>(sin prefijo)</code></td><td>0</td><td>Celular</td></tr>
                    <tr><td><code>sm</code></td><td>576px</td><td>Celular grande</td></tr>
                    <tr><td><code>md</code></td><td>768px</td><td>Tableta: las columnas empiezan a separarse</td></tr>
                    <tr><td><code>lg</code></td><td>992px</td><td>Laptop: la bandeja pasa a dos paneles</td></tr>
                    <tr><td><code>xl</code></td><td>1200px</td><td>Escritorio</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- ACCESIBILIDAD --}}
<section id="accesibilidad" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Accesibilidad</h2>
        <p class="lead-text">Mínimos que todo componente del kit cumple y que toda pantalla debe respetar.</p>
        <div class="row g-3">
            @foreach ([
                ['Foco visible', 'Todo elemento interactivo muestra un anillo azul al recibir foco con teclado. No lo quites.'],
                ['Contraste', 'El texto normal tiene al menos 4.5:1 contra su fondo. Los pares de la sección de colores ya lo cumplen.'],
                ['No solo color', 'Un estado siempre lleva texto; un ícono solo lleva aria-label.'],
                ['Etiquetas', 'Cada campo tiene un label asociado con for e id. El placeholder no sustituye a la etiqueta.'],
                ['Tamaño de toque', 'Botones y filas clicables miden al menos 32px de alto; las filas de bandeja, 44px.'],
                ['Movimiento', 'Las animaciones se desactivan con prefers-reduced-motion. La única animación continua es el esqueleto de carga.'],
            ] as [$titulo, $texto])
                <div class="col-md-6"><div class="mr-rule mr-rule-do"><strong>{{ $titulo }}</strong>{{ $texto }}</div></div>
            @endforeach
        </div>
    </div>
</section>
