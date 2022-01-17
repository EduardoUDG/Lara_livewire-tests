<div>
    {{--  Button  --}}
    <x-jet-danger-button wire:click="$set('open', true)">
        Create new post
    </x-jet-danger-button>

    {{--  Modal  --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Create new post
        </x-slot>

        <x-slot name="content">
            <div wire:loading wire:target="image">
                <x-danger-alert >
                    Espere que la imagen termine de cargar
                </x-danger-alert>
            </div>

            @if ( $image )
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="">
            @endif

            <div class="mb-4">
                <x-jet-label value="Post title"/>
                <x-jet-input wire:model.defer="title" type="text" class="w-full"/>
                <x-jet-input-error for="title" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Post content"/>
                <textarea wire:model.defer="content" class="form-control w-full" rows="6"></textarea>
                <x-jet-input-error for="content" />
            </div>

            <div class="mb-4">
                <input type="file" wire:model="image" id="{{ $identifier }}">
                <x-jet-input-error for="image" />
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancel
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Create post
            </x-jet-danger-button>

            {{-- <span wire:loading wire:target="save">Loading...</span> --}}
        </x-slot>

    </x-jet-dialog-modal>

</div>
