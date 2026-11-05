{{-- BARRA DE NAVEGACIÓN PRINCIPAL --}}
<section id="barra" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Barra de navegación principal</h2>
        <p class="lead-text">Una barra con dos niveles: arriba la marca y las herramientas de la persona (institución, notificaciones, perfil); abajo la navegación. Lo de uso diario va suelto y lo demás se agrupa en menús desplegables.</p>

        <x-maristas::example title="Barra completa" note="Abre los menús para ver el selector de institución, el panel de notificaciones y el menú de perfil. En pantallas angostas la navegación se oculta detrás del botón de hamburguesa y los grupos se despliegan en lista.">
            <x-maristas::topbar id="kit-topbar" class="w-100">
                <x-slot:brand><a class="mr-topbar-brand" href="#"><i class="ri-graduation-cap-line"></i>Maristas</a></x-slot:brand>

                <x-slot:tools>
                    <x-maristas::institution-menu current="Instituto México Primaria" searchable>
                        <x-maristas::menu-item icon="ri-check-line" :active="true">Instituto México Primaria</x-maristas::menu-item>
                        <x-maristas::menu-item icon="ri-building-line">Colegio Champagnat</x-maristas::menu-item>
                        <x-maristas::menu-item icon="ri-building-line">Instituto Hispano Inglés</x-maristas::menu-item>
                    </x-maristas::institution-menu>

                    <x-maristas::notification-menu :count="3">
                        <x-slot:actions><a href="#" class="mr-link small">Marcar como leídas</a></x-slot:actions>
                        <x-maristas::notification name="Laura Ramírez" time="Hace 5 min" :new="true"><strong>Laura Ramírez</strong> te mencionó en una nota</x-maristas::notification>
                        <x-maristas::notification icon="ri-mail-download-line" tone="success" time="Hace 1 h" :new="true">María López respondió tu mensaje</x-maristas::notification>
                        <x-maristas::notification icon="ri-user-add-line" tone="neutral" time="Ayer">Se te asignó el registro REG-14960</x-maristas::notification>
                        <x-slot:footer><a class="dropdown-item justify-content-center mr-link" href="#">Ver todas</a></x-slot:footer>
                    </x-maristas::notification-menu>

                    <x-maristas::user-menu name="Fredy Osorio" role="Administrador">
                        <x-maristas::menu-item href="#" icon="ri-user-line">Mi perfil</x-maristas::menu-item>
                        <x-maristas::menu-item href="#" icon="ri-lifebuoy-line">Soporte</x-maristas::menu-item>
                        <div class="border-top mt-1 pt-1"><x-maristas::menu-item href="#" icon="ri-logout-box-r-line">Cerrar sesión</x-maristas::menu-item></div>
                    </x-maristas::user-menu>
                </x-slot:tools>

                <x-maristas::nav-link href="#" icon="ri-dashboard-line">Inicio</x-maristas::nav-link>
                <x-maristas::nav-link href="#" icon="ri-filter-3-line" :active="true">Registros</x-maristas::nav-link>
                <x-maristas::nav-group label="Personas" icon="ri-team-line">
                    <x-maristas::menu-item href="#" icon="ri-contacts-line">Responsables</x-maristas::menu-item>
                    <x-maristas::menu-item href="#" icon="ri-user-smile-line">Estudiantes</x-maristas::menu-item>
                </x-maristas::nav-group>
                <x-maristas::nav-group label="Catálogos" icon="ri-book-open-line">
                    <x-maristas::menu-item href="#" icon="ri-book-2-line">Grados y ciclos</x-maristas::menu-item>
                    <x-maristas::menu-item href="#" icon="ri-chat-smile-3-line">Canales de contacto</x-maristas::menu-item>
                    <x-maristas::menu-item href="#" icon="ri-git-branch-line">Transiciones de estado</x-maristas::menu-item>
                </x-maristas::nav-group>
                <x-maristas::nav-group label="Administración" icon="ri-settings-3-line">
                    <x-maristas::menu-item href="#" icon="ri-group-line">Usuarios</x-maristas::menu-item>
                    <x-maristas::menu-item href="#" icon="ri-history-line">Bitácora de actividades</x-maristas::menu-item>
                </x-maristas::nav-group>
            </x-maristas::topbar>

            <x-slot:code>
@verbatim
<x-maristas::topbar id="topbar">
    <x-slot:brand><a class="mr-topbar-brand" href="/">Maristas</a></x-slot:brand>
    <x-slot:tools>
        <x-maristas::institution-menu current="Instituto México Primaria" searchable>
            <x-maristas::menu-item icon="ri-check-line" :active="true">Instituto México Primaria</x-maristas::menu-item>
            <x-maristas::menu-item icon="ri-building-line">Colegio Champagnat</x-maristas::menu-item>
        </x-maristas::institution-menu>
        <x-maristas::notification-menu :count="3">
            <x-maristas::notification name="Laura Ramírez" time="Hace 5 min" :new="true">Te mencionó en una nota</x-maristas::notification>
            <x-slot:footer><a class="dropdown-item" href="/notificaciones">Ver todas</a></x-slot:footer>
        </x-maristas::notification-menu>
        <x-maristas::user-menu name="Fredy Osorio" role="Administrador">
            <x-maristas::menu-item href="/perfil" icon="ri-user-line">Mi perfil</x-maristas::menu-item>
        </x-maristas::user-menu>
    </x-slot:tools>

    <x-maristas::nav-link href="/" icon="ri-dashboard-line">Inicio</x-maristas::nav-link>
    <x-maristas::nav-link href="/registros" icon="ri-filter-3-line" :active="true">Registros</x-maristas::nav-link>
    <x-maristas::nav-group label="Personas" icon="ri-team-line">
        <x-maristas::menu-item href="/responsables" icon="ri-contacts-line">Responsables</x-maristas::menu-item>
    </x-maristas::nav-group>
</x-maristas::topbar>
@endverbatim
            </x-slot:code>
        </x-maristas::example>

        <div class="row g-3">
            <div class="col-md-6"><x-maristas::rule>Máximo 5 elementos en el primer nivel. Lo que se usa todos los días va suelto; lo que se configura de vez en cuando va en un menú. Si un grupo queda vacío para esa persona, no se muestra.</x-maristas::rule></div>
            <div class="col-md-6"><x-maristas::rule :do="false">No hagas una fila plana de 9 enlaces ni escondas lo demás en «Más». Tampoco nombres dos cosas distintas casi igual (por ejemplo, «Actividades» para una bitácora).</x-maristas::rule></div>
        </div>
    </div>
</section>
