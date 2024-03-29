<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-center object-cover" src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}" title="{{$course->title}}">
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
        <div class="order-2 lg:order-1 lg:col-span-2">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2 text-gray-800">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2 text-gray-800">Temario</h1>
                @foreach ($course->sections as $section)
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
                @endforeach
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl text-gray-800">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @endforeach
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl text-gray-800">Descripción</h1>
                <div class="text-gray-700 text-base">
                    {!!$course->description!!}
                </div>
            </section>

            @livewire('courses-reviews', ['course' => $course])

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
                    
                    @can('enrolled', $course)
                        <button type="submit" class="btn btn-danger w-full mt-4"><a href="{{route('courses.status', $course)}}">Continuar con el curso</a></button>
                    @else
                        @if ($course->price->value == 0)
                            <p class="text-xl font-bold text-gray-500 mt-3 mb-2">GRATIS</p>
                            <form action="{{route('courses.enrolled', $course)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-full">Llevar este curso</button>
                            </form>
                        @else
                            <p class="text-xl font-bold text-gray-500 mt-3 mb-2">${{$course->price->value}} USD</p>
                            <a href="{{route('payment.checkout', $course)}}" class="btn btn-danger w-full block text-center">Comprar este curso</a>
                        @endif
                    @endcan

                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1 class="font-bold text-gray-500 mb-3"><a href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title, 40)}}</a></h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover object-center rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{$similar->teacher->name}}</p>
                            </div>
                            @for ($i = 0; $i < $similar->rating; $i++) <i class="fas fa-star text-sm text-yellow-400"></i> @endfor
                        </div>                        
                    </article>
                @endforeach
            </aside>

        </div>
    </div>
</x-app-layout>