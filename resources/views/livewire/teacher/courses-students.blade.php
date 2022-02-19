<div>
    <h1 class="text-2xl font-bold">Alumnos del curso</h1>
    <hr class="mt-2 mb-6">
    <x-table-responsive>

        <div class="px-6 py-4">
            <input wire:model="search" class="form-input w-full" placeholder="Aa" />
        </div>

        @if ($students->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progreso</th> --}}
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">See</span>
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{$student->name}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$student->email}}</div>
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm flex items-center">
                                    @if ($this->student->advance == 100)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terminado<span>
                                    @elseif ($this->student->advance == 0)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Sin iniciar</span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">{{$this->student->advance . '%'}}</span>
                                    @endif
                                </div>
                            </td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="" class="text-indigo-600 hover:text-indigo-900">{{__('See')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{$students->links()}}
            </div>
        @else
            <div class="px-6 py-4 bg-white">
                <strong>No hay coincidencias.</strong>
            </div>
        @endif
    </x-table-responsive>
</div>
