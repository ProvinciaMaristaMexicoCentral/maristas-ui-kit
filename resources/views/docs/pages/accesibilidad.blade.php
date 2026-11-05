<div class="row g-3">
    @foreach ([
        ['Foco visible', 'Todo elemento interactivo muestra un anillo azul al recibir foco con teclado. No lo quites.'],
        ['Contraste', 'El texto normal tiene al menos 4.5:1 contra su fondo. Los pares de la sección de colores ya lo cumplen.'],
        ['No solo color', 'Un estado siempre lleva texto; un ícono solo lleva aria-label.'],
        ['Etiquetas', 'Cada campo tiene un label asociado con for e id. El placeholder no sustituye a la etiqueta.'],
        ['Tamaño de toque', 'Botones y filas clicables miden al menos 32px de alto; las filas de bandeja, 44px.'],
        ['Movimiento', 'Las animaciones se desactivan con prefers-reduced-motion. La única animación continua es el esqueleto de carga.'],
    ] as [$titulo, $texto])
        <div class="col-md-6"><div class="mr-rule mr-rule-do"><strong>{{ $titulo }}</strong>{{ $texto }}</div></div>
    @endforeach
</div>
    
