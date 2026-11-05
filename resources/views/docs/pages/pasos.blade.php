<x-maristas::example title="Pasos horizontales" note="Para formularios largos o procesos con orden. Completado, actual y pendiente se distinguen por forma y color, no solo por color.">
    <ol class="mr-stepper w-100" aria-label="Avance del registro">
        <li class="mr-stepper-item is-done"><span class="mr-stepper-dot"><i class="ri-check-line"></i></span><span class="mr-stepper-label">Datos del estudiante</span></li>
        <li class="mr-stepper-item is-current" aria-current="step"><span class="mr-stepper-dot">2</span><span class="mr-stepper-label">Tutor</span></li>
        <li class="mr-stepper-item"><span class="mr-stepper-dot">3</span><span class="mr-stepper-label">Documentos</span></li>
        <li class="mr-stepper-item"><span class="mr-stepper-dot">4</span><span class="mr-stepper-label">Confirmación</span></li>
    </ol>
</x-maristas::example>

<x-maristas::example title="Pasos verticales con descripción" note="Cuando cada paso necesita una explicación o una fecha.">
    <ol class="mr-stepper mr-stepper-vertical" style="max-width: 420px;">
        <li class="mr-stepper-item is-done"><span class="mr-stepper-dot"><i class="ri-check-line"></i></span><span><span class="mr-stepper-label">Solicitud enviada</span><span class="d-block mr-small">16 de julio, 11:47 a. m.</span></span></li>
        <li class="mr-stepper-item is-current"><span class="mr-stepper-dot">2</span><span><span class="mr-stepper-label">Revisión de documentos</span><span class="d-block mr-small">Responsable: Laura Ramírez</span></span></li>
        <li class="mr-stepper-item"><span class="mr-stepper-dot">3</span><span><span class="mr-stepper-label">Entrevista</span><span class="d-block mr-small">Pendiente de agendar</span></span></li>
        <li class="mr-stepper-item"><span class="mr-stepper-dot">4</span><span><span class="mr-stepper-label">Resultado</span></span></li>
    </ol>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Numera los pasos y nombra cada uno con un sustantivo corto. Deja volver a un paso completado.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No uses pasos para procesos de uno o dos pasos, ni más de 6: divide el proceso.</x-maristas::rule></div>
</div>
