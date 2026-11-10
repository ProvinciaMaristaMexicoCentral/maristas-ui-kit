<x-maristas::example title="Indicadores">
    <div class="row g-3 w-100">
        <div class="col-md-4"><x-maristas::stat label="Registros activos" value="248" delta="12 más que la semana pasada" /></div>
        <div class="col-md-4"><x-maristas::stat label="Respuestas sin leer" value="7" delta="3 más que ayer" trend="down" /></div>
        <div class="col-md-4"><x-maristas::stat label="Citas esta semana" value="19" /></div>
    </div>
</x-maristas::example>

<x-maristas::example title="Indicadores con ícono y nota" note="Con icon aparece un cuadro de color a la izquierda; hint agrega una nota corta debajo del valor. Para resúmenes de una ficha o un expediente.">
    <div class="row g-3 w-100">
        <div class="col-md-3"><x-maristas::stat icon="ri-user-3-line" label="Alumno" value="9034" /></div>
        <div class="col-md-3"><x-maristas::stat icon="ri-building-line" label="Colegio" value="10" hint="Marista Norte" /></div>
        <div class="col-md-3"><x-maristas::stat icon="ri-graduation-cap-line" label="Grado" value="2" hint="Nivel 3 · Programa 1" /></div>
        <div class="col-md-3"><x-maristas::stat icon="ri-calendar-check-line" label="Registro" value="05/11/2026" hint="Requisitos v1" /></div>
    </div>
    <x-slot:code>
@verbatim
<x-maristas::stat icon="ri-graduation-cap-line" label="Grado" value="2" hint="Nivel 3 · Programa 1" />
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Variantes de tarjeta">
    <div class="row g-3 w-100">
        <div class="col-md-4"><div class="card h-100"><div class="card-body"><h6 class="card-title mb-1">Con sombra</h6><p class="text-muted small mb-0">La predeterminada. Para el contenido principal de la página.</p></div></div></div>
        <div class="col-md-4"><div class="card mr-card-flat h-100"><div class="card-body"><h6 class="card-title mb-1">Plana con borde</h6><p class="text-muted small mb-0">Para contenido secundario o anidado dentro de otra tarjeta.</p></div></div></div>
        <div class="col-md-4"><div class="card mr-card-accent h-100"><div class="card-body"><h6 class="card-title mb-1">Con acento</h6><p class="text-muted small mb-0">Marca una tarjeta que requiere atención. Úsala una vez por vista.</p></div></div></div>
    </div>
</x-maristas::example>

<x-maristas::example title="Tarjeta con portada" note="Para catálogos y listados con imagen: etiquetas sobre la portada, datos con ícono y acciones al pie. Sin imagen muestra un ícono.">
    <div class="row g-3 w-100">
        <div class="col-md-4">
            <x-maristas::cover-card title="Encuentro de líderes juveniles" subtitle="Convivencia">
                <x-slot:tags>
                    <x-maristas::state tone="success">Aprobado</x-maristas::state>
                </x-slot:tags>
                <x-slot:meta>
                    <div><i class="ri-calendar-event-line"></i><span>29 dic 2026, 09:00</span></div>
                    <div><i class="ri-map-pin-line"></i><span>Colegio Marista Norte</span></div>
                </x-slot:meta>
                <x-slot:actions>
                    <x-maristas::button variant="secondary" size="sm">Ver detalles</x-maristas::button>
                    <x-maristas::button variant="secondary" size="sm" icon="ri-pencil-line">Editar</x-maristas::button>
                </x-slot:actions>
            </x-maristas::cover-card>
        </div>
        <div class="col-md-4">
            <x-maristas::cover-card title="Campamento de verano" icon="ri-tent-line">
                <x-slot:tags>
                    <x-maristas::state tone="info">Campamento</x-maristas::state>
                    <x-maristas::state tone="neutral">Público</x-maristas::state>
                </x-slot:tags>
                <p class="mr-cover-text">Cinco días de convivencia, oración y servicio para estudiantes de secundaria y bachillerato, con actividades al aire libre.</p>
                <x-slot:actions>
                    <x-maristas::button>Ver detalles</x-maristas::button>
                </x-slot:actions>
            </x-maristas::cover-card>
        </div>
    </div>
    <x-slot:code>
@verbatim
<x-maristas::cover-card title="Encuentro de líderes" subtitle="Convivencia" :image="$url">
    <x-slot:tags><x-maristas::state tone="success">Aprobado</x-maristas::state></x-slot:tags>
    <x-slot:meta>
        <div><i class="ri-calendar-event-line"></i><span>29 dic 2026, 09:00</span></div>
    </x-slot:meta>
    <p class="mr-cover-text">Descripción corta…</p>
    <x-slot:actions><x-maristas::button>Ver detalles</x-maristas::button></x-slot:actions>
</x-maristas::cover-card>
@endverbatim
    </x-slot:code>
</x-maristas::example>
