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
                <div class="toast-body d-flex align-items-start gap-2"><i class="ri-checkbox-circle-line fs-5 mr-toast-success"></i><span>Nota publicada.</span></div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
            </div>
        </div>
    </div>
</x-maristas::example>
    

<x-maristas::example title="Aviso temporal desde JavaScript" note="Para respuestas de acciones (guardado, error). MaristasUI.toast(tono, mensaje) crea el aviso, lo muestra cinco segundos y lo quita. Tonos: success, danger, warning, info.">
    <x-maristas::button variant="secondary" size="sm" onclick="MaristasUI.toast('success', 'Los cambios se guardaron.')">Éxito</x-maristas::button>
    <x-maristas::button variant="secondary" size="sm" onclick="MaristasUI.toast('danger', 'No se pudo guardar. Intenta de nuevo.')">Error</x-maristas::button>
    <x-maristas::button variant="secondary" size="sm" onclick="MaristasUI.toast('warning', 'Falta un dato obligatorio.')">Advertencia</x-maristas::button>
    <x-slot:code>
@verbatim
MaristasUI.toast('success', 'Los cambios se guardaron.');

// Desde Livewire, con el evento que ya escucha el layout:
$this->dispatch('alert', status: 'success', message: 'Guardado');
@endverbatim
    </x-slot:code>
</x-maristas::example>

