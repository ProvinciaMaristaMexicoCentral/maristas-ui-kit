<ol class="mb-4">
    <li class="mb-2">Envuelve el contenido de la página en <code>&lt;div class="mr-scope"&gt;</code>. Dentro de esa zona Bootstrap toma el estilo Maristas: botones, formularios, tablas, menús, modales y badges.</li>
    <li class="mb-2">Usa los componentes Blade de abajo y, para los patrones, copia el código de cada ejemplo.</li>
    <li>Usa variables <code>var(--maristas-*)</code> en lugar de colores sueltos. Si falta un token, se agrega al kit, no a la pantalla.</li>
</ol>

<h6 class="mb-2">Componentes Blade</h6>
<div class="mr-table-wrap mb-4">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>Componente</th><th>Parámetros</th><th>Ejemplo</th></tr></thead>
            <tbody>
                <tr><td><code>x-maristas::button</code></td><td><code>variant</code> primary, secondary, danger, success · <code>size</code> sm, lg · <code>icon</code> · <code>href</code></td><td><code>&lt;x-maristas::button icon="ri-check-line"&gt;Guardar&lt;/x-maristas::button&gt;</code></td></tr>
                <tr><td><code>x-maristas::state</code></td><td><code>tone</code> success, warning, danger, info, neutral · <code>icon</code></td><td><code>&lt;x-maristas::state tone="success"&gt;Enviado&lt;/x-maristas::state&gt;</code></td></tr>
                <tr><td><code>x-maristas::alert</code></td><td><code>tone</code> info, success, warning, danger · <code>dismissible</code></td><td><code>&lt;x-maristas::alert tone="warning"&gt;…&lt;/x-maristas::alert&gt;</code></td></tr>
                <tr><td><code>x-maristas::empty-state</code></td><td><code>title</code> · <code>icon</code></td><td><code>&lt;x-maristas::empty-state title="Sin mensajes"&gt;…&lt;/x-maristas::empty-state&gt;</code></td></tr>
                <tr><td><code>x-maristas::prop</code></td><td><code>label</code></td><td><code>&lt;x-maristas::prop label="Correo"&gt;…&lt;/x-maristas::prop&gt;</code></td></tr>
                <tr><td><code>x-maristas::stat</code></td><td><code>label</code> · <code>value</code> · <code>delta</code> · <code>trend</code> up, down · <code>icon</code> · <code>hint</code></td><td><code>&lt;x-maristas::stat label="Activos" value="248" /&gt;</code></td></tr>
                <tr><td><code>x-maristas::avatar</code></td><td><code>name</code> · <code>size</code> sm, md, lg · <code>soft</code></td><td><code>&lt;x-maristas::avatar name="María López" /&gt;</code></td></tr>
                <tr><td><code>x-maristas::edit-link</code></td><td><code>target</code> modal · <code>label</code> · <code>locked</code> · <code>locked-label</code> · <code>title</code> · <code>locked-title</code></td><td><code>&lt;x-maristas::edit-link target="#editar-modal" :locked="$bloqueado" /&gt;</code></td></tr>
                <tr><td><code>x-maristas::cover-card</code></td><td><code>title</code> · <code>image</code> · <code>subtitle</code> · <code>icon</code> · slots <code>tags</code>, <code>meta</code>, <code>actions</code></td><td><code>&lt;x-maristas::cover-card title="Evento" :image="$url"&gt;…&lt;/x-maristas::cover-card&gt;</code></td></tr>
                <tr><td><code>x-maristas::banner</code></td><td><code>title</code> · <code>eyebrow</code> · <code>description</code> · <code>icon</code> · slot de acciones</td><td><code>&lt;x-maristas::banner title="Eventos"&gt;…botones…&lt;/x-maristas::banner&gt;</code></td></tr>
                <tr><td><code>x-maristas::topbar</code></td><td>slots <code>brand</code>, <code>tools</code> y la navegación · <code>id</code></td><td><code>&lt;x-maristas::topbar&gt;…&lt;/x-maristas::topbar&gt;</code></td></tr>
                <tr><td><code>x-maristas::nav-link</code></td><td><code>href</code> · <code>icon</code> · <code>active</code></td><td><code>&lt;x-maristas::nav-link href="/" icon="ri-home-line"&gt;Inicio&lt;/x-maristas::nav-link&gt;</code></td></tr>
                <tr><td><code>x-maristas::nav-group</code></td><td><code>label</code> · <code>icon</code> · <code>active</code></td><td><code>&lt;x-maristas::nav-group label="Personas"&gt;…&lt;/x-maristas::nav-group&gt;</code></td></tr>
                <tr><td><code>x-maristas::menu-item</code></td><td><code>href</code> · <code>icon</code> · <code>active</code></td><td><code>&lt;x-maristas::menu-item href="/perfil"&gt;Mi perfil&lt;/x-maristas::menu-item&gt;</code></td></tr>
                <tr><td><code>x-maristas::institution-menu</code></td><td><code>current</code> · <code>searchable</code></td><td><code>&lt;x-maristas::institution-menu current="…"&gt;…&lt;/x-maristas::institution-menu&gt;</code></td></tr>
                <tr><td><code>x-maristas::notification-menu</code></td><td><code>count</code> · slots <code>actions</code>, <code>footer</code></td><td><code>&lt;x-maristas::notification-menu :count="3"&gt;…&lt;/x-maristas::notification-menu&gt;</code></td></tr>
                <tr><td><code>x-maristas::notification</code></td><td><code>name</code> o <code>icon</code> + <code>tone</code> · <code>time</code> · <code>new</code> · <code>href</code></td><td><code>&lt;x-maristas::notification name="Laura" :new="true"&gt;…&lt;/x-maristas::notification&gt;</code></td></tr>
                <tr><td><code>x-maristas::user-menu</code></td><td><code>name</code> · <code>role</code></td><td><code>&lt;x-maristas::user-menu name="Fredy Osorio"&gt;…&lt;/x-maristas::user-menu&gt;</code></td></tr>
                <tr><td><code>x-maristas::rule</code></td><td><code>do</code> true o false (documentación)</td><td><code>&lt;x-maristas::rule :do="false"&gt;…&lt;/x-maristas::rule&gt;</code></td></tr>
            </tbody>
        </table>
    </div>
</div>
<p class="text-muted small mb-0">Esta página solo existe cuando <code>APP_ENV</code> es <code>local</code> o <code>testing</code>.</p>
    
