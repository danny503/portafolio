<x-jet-dialog-modal wire:model="open_edit">
    <x-slot name="title">
        Editar Proyectos
    </x-slot>
    <x-slot name="content">
        <div wire:loading wire:target="image">Uploading...</div>

        @if ($image)
            Photo preview
            <img src="{{$image->temporaryUrl()}}" class="mb-4">
        @endif
        <div class="mb-4">
            <x-jet-label value="Título del proyecto"/>
            <x-jet-input type="text" class="w-full" wire:model.defer="title"/>

            <x-jet-input-error for="title" />
        </div>
        <div class="mb-4">
            <x-jet-label value="Link del proyecto"/>
            <x-jet-input type="url" class="w-full" wire:model.defer="link"/>

            <x-jet-input-error for="link" />
        </div>
        <div class="mb-4">
            <x-jet-label value="Descripción del proyecto"/>
            <textarea rows="6" class="form-control w-full" wire:model.defer="description"></textarea>

            <x-jet-input-error for="description" />
        </div>
        <div class="mb-4">
            <x-jet-label value="Imagen del proyecto"/>
            <x-jet-input type="file" class="w-full" wire:model.defer="image" id="{{$resetInputImage}}"/>

            <x-jet-input-error for="image" />
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('open', false)">
            Cancelar
        </x-jet-secondary-button>
        <x-jet-danger-button wire:click="save()" wire:loading.attr="disabled" wire:target="save, image">
            Guardar Proyecto
        </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>
