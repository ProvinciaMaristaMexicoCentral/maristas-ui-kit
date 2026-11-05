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
