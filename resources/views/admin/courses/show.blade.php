<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-center object-cover" src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}" title="{{$course->title}}">
                @else
                    <img class="h-60 w-full object-center object-cover" src="{{asset('img/cursos/default.jpg')}}" alt="{{$course->title}}" title="{{$course->title}}">
                @endif
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class=""></i> Categoría: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Alumnos: {{$course->students_count}}</p>
                <p class="mb-1">Calificación</p>
                @for ($i = 0; $i < $course->rating; $i++) <i class="fas fa-star text-yellow-400"></i> @endfor
            </div>
        </div>
    </section>
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="bg-red-900 text-center py-4 lg:px-4 transition-all ease-in-out relative">
                    <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="flex justify-center items-center rounded-full bg-red-500 uppercase p-2 h-8 w-8 text-lg font-bold mr-3"><i class="fa-solid fa-circle-exclamation"></i></span>
                    <span class="font-semibold mr-2 text-left flex-auto">{{session('info')}}</span>
                    </div>
                    <span x-on:click="open = false" class="cursor-pointer absolute top-2 right-2 text-lg text-white"><i class="fa-solid fa-circle-xmark"></i></span>
                </div>
            </div>
        @endif

        <div class="order-2 lg:order-1 lg:col-span-2">

            {{-- Metas --}}
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">

                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @empty
                        <li class="text-gray-700 text-base">Este curso no cuenta con metas asignadas</li>
                        @endforelse
                    </ul>
                </div>
            </section>

            {{-- Temario --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>
                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow"
                    @if($loop->first)
                        x-data="{ open: true }"
                    @else
                        x-data="{ open: false }"
                    @endif>
                        <header x-on:click="open = !open" class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i>{{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    <article class="card">
                        <div class="card-body">
                            Este curso no cuenta con secciónes asignadas
                        </div>
                    </article>
                @endforelse
            </section>

            {{-- Requisitos --}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @empty
                        <li class="text-gray-700 text-base">Este curso no tiene requisitos</li>
                    @endforelse
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl">Descripción</h1>
                <div class="text-gray-700 text-base">
                    {!!$course->description!!}
                </div>
            </section>
        </div>
        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="rounded-full object-cover object-center h-12 w-12 shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}" title="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray text-lg">Prof. {{$course->teacher->name}}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>
                    
                    <form action="{{route('admin.courses.approved', $course)}}" method="POST" class="mt-4">
                        @csrf
                        <button class="btn btn-primary w-full" type="submit">Aprobar curso</button>
                    </form>

                    <a href="{{route('admin.courses.observations', $course)}}" class="btn btn-danger w-full block text-center mt-4">Observar curso</a>

                </div>
            </section>
        </div>
    </div>
</x-app-layout>