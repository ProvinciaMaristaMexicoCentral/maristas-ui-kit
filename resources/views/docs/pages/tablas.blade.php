<x-maristas::example title="Lista de registros">
    <div class="mr-table-wrap w-100">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr><th>Folio</th><th>Nombre</th><th>Grado</th><th>Estado</th><th>Responsable</th><th class="text-end">Acciones</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#tablas" class="mr-link-id">REG-14958</a></td>
                        <td><div class="d-flex align-items-center gap-2"><x-maristas::avatar name="María López" size="sm" soft />María López</div></td>
                        <td>5º Primaria</td>
                        <td><x-maristas::state tone="success">Completo</x-maristas::state></td>
                        <td>Laura Ramírez</td>
                        <td class="text-end"><x-maristas::button variant="secondary" size="sm" aria-label="Más acciones"><i class="ri-more-2-fill"></i></x-maristas::button></td>
                    </tr>
                    <tr>
                        <td><a href="#tablas" class="mr-link-id">REG-14960</a></td>
                        <td><div class="d-flex align-items-center gap-2"><x-maristas::avatar name="Jorge Hernández" size="sm" soft />Jorge Hernández</div></td>
                        <td>1º Primaria</td>
                        <td><x-maristas::state tone="info">Nuevo</x-maristas::state></td>
                        <td><span class="text-muted">Sin asignar</span></td>
                        <td class="text-end"><x-maristas::button variant="secondary" size="sm" aria-label="Más acciones"><i class="ri-more-2-fill"></i></x-maristas::button></td>
                    </tr>
                    <tr>
                        <td><a href="#tablas" class="mr-link-id">REG-05318</a></td>
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

<x-maristas::example title="Enlace principal de la fila" note="El enlace que abre el registro lleva mr-link-id (semibold, un solo por fila). Si va en una celda de encabezado de fila (th scope=&quot;row&quot;) se alinea con su encabezado igual que un td; los demás enlaces de la tabla usan mr-link.">
    <div class="mr-table-wrap w-100">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr><th scope="col">Folio</th><th scope="col">Nombre</th><th scope="col">Estado</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><a href="#tablas" class="mr-link-id">REG-15037</a></th>
                        <td>Lisbeth Alarcón <a href="#tablas" class="mr-link">Ver contacto</a></td>
                        <td><x-maristas::state tone="info">Contactado</x-maristas::state></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#tablas" class="mr-link-id">REG-14967</a></th>
                        <td>Eduardo Juárez <a href="#tablas" class="mr-link">Ver contacto</a></td>
                        <td><x-maristas::state tone="success">Nuevo</x-maristas::state></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-maristas::example>

<div class="row g-3 mb-4">
    <div class="col-md-6"><x-maristas::rule>El enlace que abre el registro (folio o nombre) usa mr-link-id y hay uno solo por fila. Los demás enlaces dentro de una celda usan mr-link.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No pongas fw-semibold ni fw-bold a mano en los enlaces de una tabla: el peso lo decide el kit con mr-link-id, para que todas las tablas se vean igual.</x-maristas::rule></div>
</div>

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
    
