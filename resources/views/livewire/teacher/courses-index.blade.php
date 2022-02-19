<div class="container py-8">
    <x-table-responsive>

        <div class="px-6 py-4 flex items-center">
            <input wire:model="search" wire:keydown="limpiar_page" class="form-input flex-1" placeholder="Aa" />
            <a href="{{route('teacher.courses.create')}}"><button class="btn btn-danger ml-2">Crear curso</button></a>
        </div>

        @if ($courses->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alumnos</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Calificación</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                                        @else
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{asset('img/cursos/default.jpg')}}" alt="">
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{$course->title}}</div>
                                        <div class="text-sm text-gray-500">{{$course->category->name}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                                <div class="text-sm text-gray-500">Alumnos inscritos</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    <div class="text-amber-400 hidden"></div>
                                    <ul class="flex text-sm gap-1">
                                        <li>
                                            <i class="fas fa-star text-{{$course->rating >= 1 ? 'amber' : 'gray'}}-400"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star text-{{$course->rating >= 2 ? 'amber' : 'gray'}}-400"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star text-{{$course->rating >= 3 ? 'amber' : 'gray'}}-400"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star text-{{$course->rating >= 4 ? 'amber' : 'gray'}}-400"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star text-{{$course->rating >= 5 ? 'amber' : 'gray'}}-400"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoración del curso</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Borrador </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800"> Revisión </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Publicado </span>
                                        @break
                                    @default
                                        
                                @endswitch

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('teacher.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">{{__('Edit')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{$courses->links()}}
            </div>
        @else
            <div class="px-6 py-4 bg-white">
                <strong>No hay coincidencias con {{$search}}.</strong>
            </div>
        @endif
    </x-table-responsive>
</div>
