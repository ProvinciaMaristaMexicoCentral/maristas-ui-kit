<h6 class="mb-2">Radios y sombra</h6>
<div class="d-flex flex-wrap gap-3 mb-4">
    @foreach ([['xs', '6px', 'Código, atajos'], ['sm', '8px', 'Chips, filtros, ítems de menú'], ['md', '10px', 'Botones, campos, menús, avisos'], ['lg', '16px', 'Tarjetas, modales']] as [$n, $px, $uso])
        <div class="text-center">
            <div style="width: 96px; height: 64px; background: var(--maristas-brand-soft); border: 1px solid var(--maristas-line); border-radius: var(--maristas-radius-{{ $n }});"></div>
            <code class="small d-block mt-1">--maristas-radius-{{ $n }}</code>
            <span class="text-muted small">{{ $px }} · {{ $uso }}</span>
        </div>
    @endforeach
    <div class="text-center">
        <div style="padding: 12px; background: var(--maristas-canvas); border-radius: var(--maristas-radius-lg);"><div style="width: 72px; height: 40px; background: var(--maristas-surface); border-radius: var(--maristas-radius-lg); box-shadow: var(--maristas-shadow-card);"></div></div>
        <code class="small d-block mt-1">--maristas-shadow-card</code>
        <span class="text-muted small">Tarjetas</span>
    </div>
    @foreach ([['sm', 'Sobre imágenes'], ['float', 'Menús, avisos'], ['modal', 'Modales']] as [$n, $uso])
        <div class="text-center">
            <div style="padding: 12px; background: var(--maristas-canvas); border-radius: var(--maristas-radius-lg);"><div style="width: 72px; height: 40px; background: var(--maristas-surface); border-radius: var(--maristas-radius-md); box-shadow: var(--maristas-shadow-{{ $n }});"></div></div>
            <code class="small d-block mt-1">--maristas-shadow-{{ $n }}</code>
            <span class="text-muted small">{{ $uso }}</span>
        </div>
    @endforeach
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

<h6 class="mb-2">Tamaño de los controles</h6>
<p class="text-muted small mb-2">Botón, campo y selector del mismo tamaño miden lo mismo y usan la misma letra, para que queden alineados en una barra o formulario.</p>
<div class="table-responsive mb-4"><table class="table table-sm mb-0">
    <thead><tr><th>Tamaño</th><th>Alto</th><th>Letra</th><th>Clases</th></tr></thead>
    <tbody>
        <tr><td><code>sm</code></td><td>32px</td><td>13px</td><td><code>btn-sm</code>, <code>form-control-sm</code>, <code>form-select-sm</code></td></tr>
        <tr><td>normal</td><td>40px</td><td>14px</td><td><code>btn</code>, <code>form-control</code>, <code>form-select</code></td></tr>
        <tr><td><code>lg</code></td><td>48px</td><td>16px</td><td><code>btn-lg</code>, <code>form-control-lg</code>, <code>form-select-lg</code></td></tr>
    </tbody>
</table></div>

<h6 class="mb-2">Margen de página</h6>
<p class="text-muted small mb-2">El margen lateral de la página es el token <code>--maristas-gutter</code> (<code>clamp(2rem, 7vw, 9rem)</code>): crece con la ventana. El contenido (<code>.mr-page</code>), la barra principal (<code>.mr-topbar-full</code>, sin esquinas redondeadas) y el pie (<code>.mr-footer-full</code>) lo comparten para quedar alineados. Si un sistema necesita otro valor, lo redefine en su <code>:root</code>; no lo reemplaza con un <code>.container</code> de Bootstrap.</p>
<pre class="mb-4"><code>&lt;x-maristas::topbar class="mr-topbar-full"&gt;…&lt;/x-maristas::topbar&gt;
&lt;main class="mr-page"&gt;…&lt;/main&gt;
&lt;x-maristas::footer class="mr-footer-full"&gt;…&lt;/x-maristas::footer&gt;</code></pre>

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
    
