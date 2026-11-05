<x-maristas::example title="Modal, panel lateral, ayuda y popover">
    <x-maristas::button variant="secondary" data-bs-toggle="modal" data-bs-target="#kit-modal">Abrir modal</x-maristas::button>
    <x-maristas::button variant="secondary" data-bs-toggle="offcanvas" data-bs-target="#kit-offcanvas">Abrir panel lateral</x-maristas::button>
    <x-maristas::button variant="secondary" data-bs-toggle="tooltip" data-bs-title="Asigna el registro a otro responsable">Ayuda corta</x-maristas::button>
    <x-maristas::button variant="secondary" data-bs-toggle="popover" data-bs-title="Parentesco" data-bs-content="Indica la relación de la persona de contacto con el estudiante.">Popover</x-maristas::button>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>El título del modal dice la acción y el botón principal repite ese verbo: «Deshacer cambio». Siempre hay una salida clara: «Cancelar».</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No abras un modal sobre otro modal. No pongas en un tooltip información imprescindible: no se ve en pantallas táctiles.</x-maristas::rule></div>
</div>
    
