<x-maristas::example title="Menú de acciones" note="Un botón secundario que abre una lista corta. Cada opción lleva un ícono y un verbo.">
    <div class="dropdown">
        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Acciones</button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#"><i class="ri-eye-line"></i>Ver detalle</a>
            <a class="dropdown-item" href="#"><i class="ri-pencil-line"></i>Editar</a>
            <a class="dropdown-item" href="#"><i class="ri-file-copy-line"></i>Duplicar</a>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Con secciones y acción destructiva" note="Separa con encabezado y línea; la acción que borra va al final, en rojo.">
    <div class="dropdown">
        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Más acciones"><i class="ri-more-2-fill"></i></button>
        <div class="dropdown-menu">
            <h6 class="dropdown-header">Registro</h6>
            <a class="dropdown-item" href="#"><i class="ri-pencil-line"></i>Editar</a>
            <a class="dropdown-item" href="#"><i class="ri-user-shared-line"></i>Reasignar</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Zona de riesgo</h6>
            <a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line"></i>Eliminar</a>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Botón dividido" note="La acción más común queda a un clic y las demás detrás de la flecha.">
    <div class="btn-group">
        <button type="button" class="btn btn-primary"><i class="ri-send-plane-line"></i>Enviar</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Más opciones de envío"></button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#"><i class="ri-time-line"></i>Programar envío</a>
            <a class="dropdown-item" href="#"><i class="ri-draft-line"></i>Guardar borrador</a>
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Alineación" note="dropdown-menu-end alinea el menú al borde derecho del botón; úsalo en elementos pegados al borde de la pantalla.">
    <div class="dropdown"><button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Izquierda</button><div class="dropdown-menu"><a class="dropdown-item" href="#">Opción</a></div></div>
    <div class="dropdown"><button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Derecha</button><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Opción</a></div></div>
    <div class="dropup"><button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Hacia arriba</button><div class="dropdown-menu"><a class="dropdown-item" href="#">Opción</a></div></div>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Máximo 7 opciones por menú. Si hay más, agrúpalas con encabezados o usa una búsqueda.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No pongas un menú dentro de otro menú, ni escondas ahí la acción principal de la pantalla.</x-maristas::rule></div>
</div>
