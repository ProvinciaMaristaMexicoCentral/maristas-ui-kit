<x-maristas::example title="Fecha y hora" note="Controles nativos: en celular abren el selector del sistema y en escritorio el del navegador.">
    <div class="row g-3 w-100">
        <div class="col-md-4"><label class="form-label" for="mr-f1">Fecha</label><input id="mr-f1" type="date" class="form-control" value="2026-07-18"></div>
        <div class="col-md-4"><label class="form-label" for="mr-f2">Hora</label><input id="mr-f2" type="time" class="form-control" value="12:00"></div>
        <div class="col-md-4"><label class="form-label" for="mr-f3">Fecha y hora</label><input id="mr-f3" type="datetime-local" class="form-control" value="2026-07-18T12:00"></div>
    </div>
</x-maristas::example>

<x-maristas::example title="Rango de fechas">
    <div class="w-100" style="max-width: 460px;">
        <label class="form-label" for="mr-r1">Periodo</label>
        <div class="input-group">
            <input id="mr-r1" type="date" class="form-control" value="2026-07-01" aria-label="Desde">
            <span class="input-group-text">a</span>
            <input type="date" class="form-control" value="2026-07-31" aria-label="Hasta">
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Rango (deslizador)" note="Con data-mr-range-output el valor se muestra al lado y se actualiza al mover.">
    <div class="w-100" style="max-width: 360px;">
        <label class="form-label d-flex justify-content-between" for="mr-rg">Cuota máxima <strong data-mr-range-output="#mr-rg">$15,000</strong></label>
        <input id="mr-rg" type="range" class="form-range" min="5000" max="30000" step="500" value="15000" data-mr-range-format="currency">
    </div>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Muestra el formato esperado cuando el campo no es nativo y valida que el fin del rango no sea anterior al inicio.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No pidas la fecha en tres campos separados (día, mes, año) si el control nativo basta.</x-maristas::rule></div>
</div>
