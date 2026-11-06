@php
    $filas = [
        ['REG-14958', 'María López', '5º Primaria', ['success', 'Completo'], 'Laura Ramírez', '2026-07-18', 15310],
        ['REG-14960', 'Jorge Hernández', '1º Primaria', ['info', 'Nuevo'], 'Sin asignar', '2026-07-18', 14200],
        ['REG-05318', 'Carlos Rivas', 'Bachillerato', ['warning', 'En revisión'], 'Laura Ramírez', '2026-07-17', 18900],
        ['REG-14961', 'Ana Sofía Pérez', '3º Secundaria', ['success', 'Completo'], 'Mario Díaz', '2026-07-17', 16750],
        ['REG-14955', 'Luis Fernández', '2º Preescolar', ['danger', 'Rechazado'], 'Mario Díaz', '2026-07-16', 12800],
        ['REG-14952', 'Valeria Ortiz', '6º Primaria', ['info', 'Nuevo'], 'Laura Ramírez', '2026-07-16', 15310],
        ['REG-14950', 'Diego Salazar', '1º Secundaria', ['warning', 'En revisión'], 'Sin asignar', '2026-07-15', 16750],
        ['REG-14947', 'Camila Reyes', '4º Primaria', ['success', 'Completo'], 'Mario Díaz', '2026-07-15', 15310],
        ['REG-14944', 'Mateo Cruz', 'Bachillerato', ['info', 'Nuevo'], 'Laura Ramírez', '2026-07-14', 18900],
        ['REG-14940', 'Renata Guzmán', '2º Primaria', ['success', 'Completo'], 'Mario Díaz', '2026-07-14', 14200],
        ['REG-14937', 'Emilio Vargas', '3º Preescolar', ['warning', 'En revisión'], 'Sin asignar', '2026-07-13', 12800],
        ['REG-14933', 'Paula Medina', '5º Primaria', ['danger', 'Rechazado'], 'Laura Ramírez', '2026-07-13', 15310],
    ];
@endphp

<x-maristas::example title="Tabla de datos completa" note="Escribe en el buscador, filtra por estado, haz clic en un encabezado para ordenar, marca filas para ver las acciones en lote y cambia de página.">
    <div class="mr-dt w-100" data-mr-table data-mr-page-size="5">
        <div class="mr-dt-toolbar">
            <div class="mr-dt-search"><i class="ri-search-line"></i><input type="search" class="form-control form-control-sm" placeholder="Buscar en la tabla" aria-label="Buscar en la tabla" data-mr-search></div>
            <select class="form-select form-select-sm mr-dt-filter" aria-label="Filtrar por estado" data-mr-filter="3">
                <option value="">Todos los estados</option>
                <option>Completo</option><option>Nuevo</option><option>En revisión</option><option>Rechazado</option>
            </select>
            <div class="mr-dt-bulk" data-mr-bulk hidden>
                <span><strong data-mr-selected>0</strong> <span data-mr-selected-label>seleccionados</span></span>
                <x-maristas::button variant="secondary" size="sm" icon="ri-user-shared-line">Reasignar</x-maristas::button>
                <x-maristas::button variant="danger" size="sm" icon="ri-delete-bin-line">Eliminar</x-maristas::button>
            </div>
        </div>
        <div class="mr-table-wrap">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 2.5rem"><input class="form-check-input" type="checkbox" aria-label="Seleccionar todas" data-mr-select-all></th>
                            <th data-mr-sort>Folio</th>
                            <th data-mr-sort>Nombre</th>
                            <th data-mr-sort>Grado</th>
                            <th data-mr-sort>Estado</th>
                            <th data-mr-sort>Responsable</th>
                            <th data-mr-sort class="text-end">Cuota</th>
                            <th class="text-end" style="width: 3rem"><span class="visually-hidden">Acciones</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filas as $f)
                            <tr>
                                <td><input class="form-check-input" type="checkbox" aria-label="Seleccionar {{ $f[1] }}" data-mr-select></td>
                                <td><a href="#" class="mr-link">{{ $f[0] }}</a></td>
                                <td><div class="d-flex align-items-center gap-2"><x-maristas::avatar :name="$f[1]" size="sm" soft />{{ $f[1] }}</div></td>
                                <td>{{ $f[2] }}</td>
                                <td><x-maristas::state :tone="$f[3][0]">{{ $f[3][1] }}</x-maristas::state></td>
                                <td>@if ($f[4] === 'Sin asignar')<span class="text-muted">{{ $f[4] }}</span>@else{{ $f[4] }}@endif</td>
                                <td class="text-end" data-sort="{{ $f[6] }}">${{ number_format($f[6]) }}</td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-light btn-sm mr-btn-icon" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Acciones de {{ $f[1] }}"><i class="ri-more-2-fill"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#"><i class="ri-eye-line"></i>Ver detalle</a>
                                            <a class="dropdown-item" href="#"><i class="ri-pencil-line"></i>Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line"></i>Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr data-mr-empty hidden><td colspan="8"><x-maristas::empty-state icon="ri-search-line" title="Sin resultados">Prueba con otra búsqueda o quita los filtros.</x-maristas::empty-state></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mr-dt-footer">
            <span class="mr-small" data-mr-info></span>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select form-select-sm" style="width: auto" aria-label="Filas por página" data-mr-page-size-select>
                    <option value="5">5 por página</option><option value="10">10 por página</option>
                </select>
                <nav aria-label="Paginación"><ul class="pagination pagination-sm mb-0" data-mr-pager></ul></nav>
            </div>
        </div>
    </div>
    <x-slot:code>
@verbatim
<div data-mr-table data-mr-page-size="5">
    <input type="search" data-mr-search>
    <select data-mr-filter="3">…</select>            {{-- índice de la columna a filtrar --}}
    <div data-mr-bulk hidden><strong data-mr-selected>0</strong> seleccionados …</div>
    <table class="table">
        <thead><tr>
            <th><input type="checkbox" data-mr-select-all></th>
            <th data-mr-sort>Folio</th>             {{-- orden al hacer clic --}}
        </tr></thead>
        <tbody>
            <tr><td><input type="checkbox" data-mr-select></td><td>REG-14958</td></tr>
            <tr data-mr-empty hidden><td colspan="2">Sin resultados</td></tr>
        </tbody>
    </table>
    <span data-mr-info></span>
    <ul class="pagination" data-mr-pager></ul>
</div>

{{-- Para ordenar por un valor distinto al texto visible: <td data-sort="15310">$15,310</td> --}}
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Con filtros avanzados y paginación del servidor" note="Para listas grandes (Livewire, controlador): la misma pieza, pero buscar, filtrar y paginar lo hace el servidor. Los filtros menos usados van en un panel que se despliega bajo la barra.">
    <div class="mr-dt w-100">
        <div class="mr-dt-toolbar">
            <div class="mr-dt-search"><i class="ri-search-line"></i><input type="search" class="form-control form-control-sm" placeholder="Buscar por folio, correo u oferta" aria-label="Buscar"></div>
            <button type="button" class="btn btn-light btn-sm" aria-expanded="true" onclick="var p=document.getElementById('mr-demo-panel');p.hidden=!p.hidden;this.setAttribute('aria-expanded',!p.hidden)"><i class="ri-filter-3-line"></i>Filtros<span class="mr-filter-count">2</span></button>
            <div class="mr-dt-toolbar-end">
                <x-maristas::button variant="secondary" size="sm" icon="ri-shield-check-line">Por validar</x-maristas::button>
                <x-maristas::button size="sm" icon="ri-add-line">Nueva oportunidad</x-maristas::button>
            </div>
        </div>
        <div class="mr-dt-panel" id="mr-demo-panel">
            <div class="row g-3">
                <div class="col-md-3"><label class="form-label" for="mr-d1">Ciclo escolar</label><select id="mr-d1" class="form-select form-select-sm"><option>2026-2027</option></select></div>
                <div class="col-md-3"><label class="form-label" for="mr-d2">Estatus</label><select id="mr-d2" class="form-select form-select-sm"><option>Todos</option></select></div>
                <div class="col-md-3"><label class="form-label" for="mr-d3">Canal</label><select id="mr-d3" class="form-select form-select-sm"><option>Todos</option></select></div>
                <div class="col-md-3 d-flex align-items-end justify-content-end"><x-maristas::button variant="secondary" size="sm">Limpiar filtros</x-maristas::button></div>
            </div>
        </div>
        <div class="mr-table-wrap"><div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead><tr><th>Folio</th><th>Nombre</th><th>Estado</th></tr></thead>
                <tbody>
                    <tr><td><a href="#" class="mr-link">FUNNEL-15037</a></td><td>Lisbeth Alarcón</td><td><x-maristas::state tone="info">Contactado</x-maristas::state></td></tr>
                    <tr><td><a href="#" class="mr-link">FUNNEL-14967</a></td><td>Eduardo Juárez</td><td><x-maristas::state tone="success">Nuevo</x-maristas::state></td></tr>
                </tbody>
            </table>
        </div></div>
        <div class="mr-dt-footer">
            <span class="mr-small">1502 resultados</span>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select form-select-sm" style="width: auto" aria-label="Filas por página"><option>25 por página</option></select>
                <nav aria-label="Paginación"><ul class="pagination pagination-sm mb-0"><li class="page-item active"><span class="page-link">1</span></li><li class="page-item"><a class="page-link" href="#">2</a></li><li class="page-item"><a class="page-link" href="#">3</a></li></ul></nav>
            </div>
        </div>
    </div>
    <x-slot:code>
@verbatim
<div class="mr-dt" x-data="{ abierto: false }">
    <div class="mr-dt-toolbar">
        <div class="mr-dt-search"><i class="ri-search-line"></i><input type="search" class="form-control form-control-sm" wire:model.live.debounce.300ms="search"></div>
        <button class="btn btn-light btn-sm" @click="abierto = !abierto" :aria-expanded="abierto">
            <i class="ri-filter-3-line"></i>Filtros <span class="mr-filter-count">2</span>
        </button>
        <div class="mr-dt-toolbar-end">…acciones de la pantalla…</div>
    </div>
    <div class="mr-dt-panel" x-show="abierto" x-cloak>…selects con form-label…</div>
    <div class="mr-table-wrap"><div class="table-responsive"><table class="table table-hover mb-0">…</table></div></div>
    <div class="mr-dt-footer">
        <span class="mr-small">1502 resultados</span>
        <div>…filas por página…  {{ $items->links() }}</div>
    </div>
</div>
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Tabla compacta" note="Con la clase table-sm: menos relleno vertical para pantallas con muchas filas.">
    <div class="mr-table-wrap w-100"><div class="table-responsive">
        <table class="table table-sm table-hover mb-0">
            <thead><tr><th>Concepto</th><th class="text-end">Monto</th><th class="text-end">Saldo</th></tr></thead>
            <tbody>
                <tr><td>Inscripción</td><td class="text-end">$15,310.00</td><td class="text-end">$0.00</td></tr>
                <tr><td>Colegiatura agosto</td><td class="text-end">$4,200.00</td><td class="text-end">$4,200.00</td></tr>
                <tr><td>Beca académica</td><td class="text-end">−$1,200.00</td><td class="text-end">−$1,200.00</td></tr>
            </tbody>
        </table>
    </div></div>
</x-maristas::example>

<x-maristas::example title="Cargando y vacía">
    <div class="mr-table-wrap w-100"><div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>Folio</th><th>Nombre</th><th>Estado</th></tr></thead>
            <tbody>
                @for ($i = 0; $i < 3; $i++)
                    <tr><td><span class="mr-skeleton" style="width: 5rem; height: .8rem; display: inline-block"></span></td><td><span class="mr-skeleton" style="width: 9rem; height: .8rem; display: inline-block"></span></td><td><span class="mr-skeleton" style="width: 4rem; height: .8rem; display: inline-block"></span></td></tr>
                @endfor
            </tbody>
        </table>
    </div></div>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Pon la búsqueda y los filtros arriba, a la izquierda, y las acciones en lote solo cuando hay filas marcadas. Alinea los números a la derecha y el texto a la izquierda.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No escondas la acción principal dentro del menú de la fila ni pongas más de 7 columnas visibles en una pantalla angosta: usa desplazamiento horizontal.</x-maristas::rule></div>
</div>
