<form autocomplete="off" class="pt-2 relative mx-auto text-gray-600">
    <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search">
    
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
        Buscar
    </button>

    @if ($search)
        <ul class="absolute left-0 w-full bg-white shadow-lg mt-1 rounded-lg overflow-hidden z-50">
            @forelse ($this->results as $result)
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300"><a href="{{route('courses.show', $result)}}">{{$result->title}}</a></li>
            @empty
                <li class="leading-10 px-5 text-sm">No hay ningún resultado que coincida con: {{$search}}.</li>
            @endforelse
        </ul>
    @endif

</form>
