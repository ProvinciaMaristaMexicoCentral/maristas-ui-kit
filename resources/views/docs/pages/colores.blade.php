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
    <span class="px-3 py-2 rounded" style="background: var(--maristas-brand); color: var(--maristas-surface);">Blanco sobre marca</span>
    <span class="px-3 py-2 rounded" style="background: var(--maristas-brand-soft); color: var(--maristas-brand);">Marca sobre marca suave</span>
    <span class="px-3 py-2 rounded" style="background: var(--maristas-success-soft); color: var(--maristas-success);">Éxito sobre éxito suave</span>
    <span class="px-3 py-2 rounded" style="background: var(--maristas-danger-soft); color: var(--maristas-danger);">Error sobre error suave</span>
</div>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Usa el azul de marca para la acción principal y los elementos activos. Usa un color de estado solo cuando comunica un estado.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No uses verde o rojo como decoración, ni dos colores de estado juntos para una misma información. El color nunca es la única señal: acompáñalo con texto o ícono.</x-maristas::rule></div>
</div>
    
