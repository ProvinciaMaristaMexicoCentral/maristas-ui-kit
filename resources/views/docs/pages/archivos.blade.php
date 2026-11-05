<x-maristas::example title="Zona de carga" note="Arrastra archivos o haz clic para elegirlos. Se activa con data-mr-dropzone y muestra la lista debajo.">
    <div class="w-100" data-mr-dropzone>
        <label class="mr-dropzone">
            <i class="ri-upload-cloud-2-line"></i>
            <strong>Arrastra tus archivos aquí</strong>
            <span class="mr-small">o haz clic para elegirlos · PDF, JPG o PNG, máximo 5 MB</span>
            <input type="file" multiple hidden>
        </label>
        <ul class="mr-files" data-mr-file-list></ul>
    </div>
</x-maristas::example>

<x-maristas::example title="Lista de archivos" note="Cada archivo muestra su nombre, tamaño y estado: avance, listo o error.">
    <ul class="mr-files w-100">
        <li class="mr-file"><i class="ri-file-pdf-2-line"></i><div class="flex-grow-1 min-w-0"><div class="d-flex justify-content-between"><span class="text-truncate">acta-de-nacimiento.pdf</span><span class="mr-small">1.2 MB</span></div><div class="progress mt-1" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 4px"><div class="progress-bar bg-success" style="width: 100%"></div></div></div><x-maristas::state tone="success" icon="ri-check-line">Listo</x-maristas::state></li>
        <li class="mr-file"><i class="ri-image-line"></i><div class="flex-grow-1 min-w-0"><div class="d-flex justify-content-between"><span class="text-truncate">comprobante-domicilio.jpg</span><span class="mr-small">3.8 MB</span></div><div class="progress mt-1" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 4px"><div class="progress-bar" style="width: 60%"></div></div></div><x-maristas::state tone="info">60%</x-maristas::state></li>
        <li class="mr-file"><i class="ri-file-pdf-2-line"></i><div class="flex-grow-1 min-w-0"><div class="d-flex justify-content-between"><span class="text-truncate">boleta-anterior.pdf</span><span class="mr-small">8.4 MB</span></div><div class="mr-small text-danger mt-1">Pesa más de 5 MB. Comprímelo e inténtalo de nuevo.</div></div><x-maristas::state tone="danger" icon="ri-error-warning-line">Error</x-maristas::state></li>
    </ul>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Dile a la persona los formatos y el tamaño máximo antes de que elija el archivo, y explica cómo corregir un error.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No rechaces un archivo con un mensaje genérico como «Error al subir».</x-maristas::rule></div>
</div>
