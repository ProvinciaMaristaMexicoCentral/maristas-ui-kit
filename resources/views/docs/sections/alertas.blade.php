{{-- ALERTAS --}}
<section id="alertas" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Alertas y avisos</h2>
        <p class="lead-text">Una alerta explica qué pasó y qué hacer. Se queda en la página hasta que se resuelve. Un aviso temporal (toast) confirma una acción y desaparece solo.</p>

        <x-maristas::example title="Alertas" note="Cuatro tonos; puede llevar un botón de cerrar.">
            <div class="w-100 d-flex flex-column gap-2">
                <x-maristas::alert tone="info">El mensaje se enviará desde el buzón de la escuela.</x-maristas::alert>
                <x-maristas::alert tone="success">Responsable actualizado correctamente.</x-maristas::alert>
                <x-maristas::alert tone="warning">En <strong>Confirmación</strong>: los datos del estudiante no pueden modificarse.</x-maristas::alert>
                <x-maristas::alert tone="danger" dismissible>Este registro fue rechazado en la revisión y no puede avanzar.</x-maristas::alert>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Aviso temporal (toast)">
            <x-maristas::button variant="secondary" size="sm" id="kit-toast-btn">Mostrar aviso</x-maristas::button>
            <div class="toast-container position-static">
                <div id="kit-toast" class="toast align-items-center" role="status" aria-live="polite" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body"><i class="ri-checkbox-circle-line text-success me-1"></i>Nota publicada.</div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                    </div>
                </div>
            </div>
        </x-maristas::example>
    </div>
</section>
