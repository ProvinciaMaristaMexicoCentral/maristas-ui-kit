<div class="mr-scope">
    <x-maristas::state tone="success" class="mr-chip">Ok</x-maristas::state>
    <x-maristas::edit-link target="#m" locked-label="x" :locked="$a" wire:click="x" />
    <button type="button" aria-label="Eliminar"><i class="ri-delete-bin-line"></i></button>
    <x-maristas::button>Guardar</x-maristas::button>
    <x-maristas::button variant="secondary">Cancelar</x-maristas::button>
    <div class="mr-state-{{ $tono }}"></div>
    <a href="#abc">ancla</a>
</div>
