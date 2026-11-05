{{-- DISCLOSURE --}}
<section id="disclosure" class="mr-doc-section card mb-4">
    <div class="card-body">
        <h2>Acordeón y listas</h2>
        <p class="lead-text">Para ocultar detalle secundario sin perderlo, y para mostrar elementos que se escanean uno tras otro.</p>

        <x-maristas::example title="Acordeón">
            <div class="accordion w-100" id="kit-acordeon">
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#kit-ac1" aria-expanded="true" aria-controls="kit-ac1">Inscripciones activas</button></h2>
                    <div id="kit-ac1" class="accordion-collapse collapse show" data-bs-parent="#kit-acordeon"><div class="accordion-body small">Ana Sofía Pérez López · 5º Primaria</div></div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kit-ac2" aria-expanded="false" aria-controls="kit-ac2">Inscripciones anteriores</button></h2>
                    <div id="kit-ac2" class="accordion-collapse collapse" data-bs-parent="#kit-acordeon"><div class="accordion-body small">Sin inscripciones anteriores.</div></div>
                </div>
            </div>
        </x-maristas::example>

        <x-maristas::example title="Lista de elementos">
            <ul class="list-group w-100">
                <li class="list-group-item active">Plantilla: Recordatorio de documentos</li>
                <li class="list-group-item">Plantilla: Bienvenida al ciclo escolar</li>
                <li class="list-group-item">Plantilla: Recordatorio de cita</li>
            </ul>
        </x-maristas::example>
    </div>
</section>
