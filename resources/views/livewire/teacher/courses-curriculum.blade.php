<div>
    <h1 class="text-2xl font-bold">Lecciones del curso</h1>

    <hr class="mt-2 mb-6">
    @foreach ($course->sections as $item)
        <article class="card mb-6" x-data="{open: true}">
            <div class="card-body bg-gray-100">
                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" placeholder="Aa">
                        @error('section.name')
                            <span class="text-red-500 text-xs italic">
                                {{ $message }}
                            </span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección: </strong>{{$item->name}}</h1>
                        <div>
                            <i class="cursor-pointer text-blue-500 fas fa-edit" wire:click="edit({{$item}})"></i>
                            <i class="cursor-pointer text-red-500 fas fa-eraser" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>
                    <div x-show="open">
                        @livewire('teacher.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar sección
        </a>
        <article class="card mt-4" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva sección</h1>
                <div class="mb-4">
                    <input wire:model="name" class="w-full form-input" placeholder="Aa">
                    @error('name')
                        <span class="text-red-500 text-xs italic">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
