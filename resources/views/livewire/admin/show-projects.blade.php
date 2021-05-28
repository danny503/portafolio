<div wire:init="loadProjects">
    <div class="w-full mt-4 container mx-auto">

        <div class="pb-6 flex items-center">
            <x-jet-input type="search" class="w-full"  wire:model="search"/>
            <div class="ml-4">
                @livewire('admin.create-project')
            </div>
        </div>

        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Últimos Proyectos
        </p>
        <div class="bg-white overflow-auto">

            @if (count($projects))
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Título</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Descripción</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Imagen</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">URL</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($projects as $proyecto)
                        <tr>
                            <td class="w-1/5 text-left py-3 px-4">{{$proyecto->title}}</td>
                            <td class="w-1/3 text-left py-3 px-4">{{Str::words(strip_tags( $proyecto->description ), 15, '...')}}</td>
                            <td class="w-1/3 text-left py-3 px-4"><img src="/storage/{{$proyecto->image}}" alt="{{$proyecto->title}}" width="250"></td>
                            <td class="w-1/3 text-left py-3 px-4"><a class="hover:text-blue-500" target="_blank" href="{{$proyecto->link}}">{{$proyecto->link}}</a></td>
                            <td class="w-1/3 text-left py-3 px-4 flex">
                                <a href="#" class="p-2"><i class="fa fa-eye"></i></a>
                                <a href="" wire:click.prevent="modalEdit({{$proyecto->id}})" class="p-2"><i class="fa fa-edit"></i></a>
                                <a href="" class="p-2" wire:click.prevent="confirmDeleting({{$proyecto->id}})" >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($projects->hasPages())
                    <div class="px-6 py-3">
                        {{$projects->links()}}
                    </div>
                @endif

                @else
                    <div class="px-6 py-3" wire:loading>
                        <x-spinner/>''
                    </div>
            @endif

        </div>

    </div>

    <x-jet-dialog-modal wire:model="open_delete">
        <x-slot name="title">
            Eliminar Projecto
        </x-slot>
        <x-slot name="content">
            {{_('Estas seguro de eliminar este proyecto?')}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button type="button" wire:click="$set('open_delete', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="delete({{$open_delete}})">
                Aceptar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


    <!--Modal Editar proyecto -->
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Editar {{$project->title}}
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image">Uploading...</div>
            @if ($image)
            Photo preview
                <img src="{{$image->temporaryUrl()}}" class="mb-4">
            @else
                <img src="storage/{{$project->image}}">
            @endif
            <div class="mb-4">
                <x-jet-label value="Título del proyecto"/>
                <x-jet-input type="text" class="w-full" wire:model="project.title"/>

                <x-jet-input-error for="project.title" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Link del proyecto"/>
                <x-jet-input type="url" class="w-full" wire:model="project.link"/>
                <x-jet-input-error for="project.link" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripción del proyecto"/>
                <textarea rows="6" class="form-control w-full" wire:model="project.description"></textarea>

                <x-jet-input-error for="project.description" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Imagen del proyecto"/>
                <x-jet-input type="file" class="w-full" wire:model="image" id="{{$resetInputImage}}"/>

                <x-jet-input-error for="image" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update()" wire:loading.attr="disabled" wire:target="update, image">
                Guardar Proyecto
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>


