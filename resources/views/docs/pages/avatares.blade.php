<x-maristas::example title="Tamaños y variantes">
    <x-maristas::avatar name="María López" size="lg" />
    <x-maristas::avatar name="María López" size="md" />
    <x-maristas::avatar name="María López" size="sm" />
    <x-maristas::avatar name="María López" size="md" soft />
    <span class="mr-av-stack">
        <x-maristas::avatar name="Laura Ramírez" size="sm" />
        <x-maristas::avatar name="Carlos Rivas" size="sm" soft />
        <x-maristas::avatar name="Jorge Hernández" size="sm" />
    </span>
</x-maristas::example>
    

<x-maristas::example title="Iniciales exactas" note="Con nombre y apellido por separado, pasa initials. Sin él, con tres o más palabras se usa la primera y la penúltima (se asume nombre + dos apellidos).">
    <x-maristas::avatar name="Jorge Eduardo Sanabria Arizmendi" />
    <x-maristas::avatar name="Jorge Eduardo Sanabria Arizmendi" initials="JS" soft />
    <x-maristas::avatar name="María López" soft />
    <x-slot:code>
@verbatim
<x-maristas::avatar :name="$lead->nombre_completo" :initials="mb_substr($lead->nombre, 0, 1).mb_substr($lead->apellido_paterno, 0, 1)" />
@endverbatim
    </x-slot:code>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>El avatar de una persona es siempre el azul fuerte (el degradado): es el mismo en la lista, en el detalle y en los paneles, así se reconoce a la persona en toda la aplicación.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No uses la variante clara (soft) para representar a una persona que también aparece con el azul fuerte en otra pantalla. Reserva soft para contextos decorativos donde no haya otra versión.</x-maristas::rule></div>
</div>

