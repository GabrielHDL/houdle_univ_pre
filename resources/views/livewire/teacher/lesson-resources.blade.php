<div class="card" x-data="{open: false}">
    <div class="card-body bg-gray-100">
        <header>
            <div class="flex items-center cursor-pointer" x-on:click="open = !open">
                <h1>Recursos de la lección</h1><i class="fa-solid fa-paperclip ml-2"></i>
            </div>
        </header>
        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
                <div class="flex justify-between items-center" >
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash cursor-pointer text-red-500"></i>
                </div>
            @else
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model="file" type="file" class="form-input flex-1">
                        <button type="submit" class="btn btn-primary text-sm ml-2">Guardar</button>
                    </div>
                    <div>
                        <span class="text-blue-500 font-bold italic text-xs mt-1" wire:loading wire:target="file">Cargando</span>
                    </div>
                        @error('file')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                </form>
            @endif
        </div>
    </div>
</div>
