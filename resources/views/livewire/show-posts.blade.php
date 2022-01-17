<div class="bg-white mt-4 rounded-lg show p-4">
    <h2 class="tag-purple">Este es un componente de livewire</h2>

    <p class="font-bold my-2">Información de los posts:</p>
    <div class="py-4 flex gap-2 items-center">
        <x-jet-input wire:model="search" type="text" class="flex-1" placeholder="Escribe un titulo"/>
        @livewire('create-post')
    </div>

    {{-- table --}}
    @if ($posts->count() > 0)
        <x-table>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 px-6 py-3 text-left cursor-pointer text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="sort('id')">
                            ID
                            @if ( $sort == 'id' )
                            @if ( $direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left cursor-pointer text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="sort('title')">
                            Title
                            @if ( $sort == 'title' )
                                @if ( $direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left cursor-pointer text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="sort('content')">
                            Content
                            @if ( $sort == 'content' )
                            @if ( $direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ( $posts as $post )
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $post->id }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 inline-flex text-center text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $post->title }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $post->content }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                @livewire('edit-post',['post' => $post], key( $post->id ))
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-table>
    @else
        <div class="my-4">
            <p class=" text-gray-500">No existe un titulo: {{ $search }}</p>
        </div>
    @endif


</div>
