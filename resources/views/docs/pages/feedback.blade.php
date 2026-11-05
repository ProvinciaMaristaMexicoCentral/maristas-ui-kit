<x-maristas::example title="Barras de progreso">
    <div class="w-100 d-flex flex-column gap-3">
        <div><div class="d-flex justify-content-between mr-small mb-1"><span>Documentos entregados</span><span>3 de 5</span></div><div class="progress" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar" style="width: 60%"></div></div></div>
        <div><div class="d-flex justify-content-between mr-small mb-1"><span>Pago de colegiatura</span><span>100%</span></div><div class="progress" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar is-success" style="width: 100%"></div></div></div>
        <div><div class="d-flex justify-content-between mr-small mb-1"><span>Adeudo vencido</span><span>25%</span></div><div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar is-danger" style="width: 25%"></div></div></div>
    </div>
</x-maristas::example>

<x-maristas::example title="Indicador giratorio y esqueleto de carga">
    <div class="d-flex align-items-center gap-2"><span class="spinner-border spinner-border-sm" role="status"></span><span class="mr-small">Abriendo correo…</span></div>
    <div class="w-100" style="max-width: 420px;" aria-hidden="true">
        <div class="d-flex gap-3 align-items-center">
            <span class="mr-skeleton" style="width: 44px; height: 44px; border-radius: 50%;"></span>
            <div class="flex-grow-1 d-flex flex-column gap-2">
                <span class="mr-skeleton" style="height: 12px; width: 60%;"></span>
                <span class="mr-skeleton" style="height: 12px; width: 90%;"></span>
            </div>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Estado vacío">
    <div class="w-100">
        <x-maristas::empty-state icon="ri-mail-open-line" title="Aún no hay mensajes">
            Los mensajes que envíes y las respuestas que recibas aparecerán aquí.
            <div class="mt-3"><x-maristas::button size="sm">Redactar mensaje</x-maristas::button></div>
        </x-maristas::empty-state>
    </div>
</x-maristas::example>
    
