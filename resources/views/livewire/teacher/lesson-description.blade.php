<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header class="flex items-center">
                <div x-on:click="open = !open" class="cursor-pointer flex items-center">
                    <h1>Descripción de la lección</h1><i class="ml-2 fa-solid fa-angle-down"></i>
                </div>
            </header>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-input w-full"></textarea>

                        @error('description.name')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror

                        <div class="mt-2 flex justify-end">
                            <button wire:click="destroy" class="btn btn-danger text-sm" type="button">Eliminar</button>
                            <button class="btn btn-primary text-sm ml-2" type="submit">Actualizar</button>
                        </div>
                    </form>
                @else
                    <div wire:submit.prevent="update">
                        <textarea wire:model="name" class="form-input w-full" placeholder="Aa"></textarea>

                        @error('name')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror

                        <div class="mt-2 flex justify-end">
                            <button wire:click="store" class="btn btn-primary text-sm">Guardar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
