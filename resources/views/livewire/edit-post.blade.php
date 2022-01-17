<div>
    {{--  Edit button  --}}
    <button class="btn btn-green" wire:click="$set('open', true)">
        <li class="fas fa-edit"></li>
    </button>




    {{--  Edit modal  --}}
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar el post <strong>{{ $post->title }}</strong>
        </x-slot>

        <x-slot name="content">
            {{--  While it's loading the image  --}}
            <div wire:loading wire:target="image">
                <x-danger-alert >
                    Espere que la imagen termine de cargar
                </x-danger-alert>
            </div>

            @if ( $image )
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="">
            @else
                <img src="{{Storage::url($post->image)}}" alt="">
            @endif



            {{--  Inputs  --}}
            <div class="mb-4">
                <x-jet-label value="Titulo del post"/>
                <x-jet-input wire:model="post.title" type="text" class="w-full"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido del post"/>
                <textarea wire:model="post.content" rows="6" class="form-control w-full"></textarea>
            </div>

            <div class="mb-4">
                <input type="file" wire:model="image" id="{{ $identifier }}">
                <x-jet-input-error for="image" />
            </div>
        </x-slot>



        {{--  Action buttons  --}}
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
