<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            @if (session('info-create'))
                <div class="bg-green-900 text-center py-4 lg:px-4 transition-all ease-in-out">
                    <div class="p-2 bg-green-800 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="flex justify-center items-center rounded-full bg-green-500 uppercase p-2 h-8 w-8 text-xs font-bold mr-3"><i class="fa-solid fa-check"></i></span>
                    <span class="font-semibold mr-2 text-left flex-auto">{{session('info-create')}}</span>
                    </div>
                </div>
            @endif
            @if (session('info-update'))
                <div class="bg-indigo-900 text-center py-4 lg:px-4 transition-all ease-in-out">
                    <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="flex justify-center items-center rounded-full bg-indigo-500 uppercase p-2 h-8 w-8 text-xs font-bold mr-3"><i class="fa-solid fa-arrows-rotate"></i></span>
                    <span class="font-semibold mr-2 text-left flex-auto">{{session('info-update')}}</span>
                    </div>
                </div>
            @endif
            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-6">

                <aside>
                    <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                    
                    <ul class="text-sm text-gray-600 mb-6">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('teacher.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('teacher.courses.edit', $course)}}">Información del curso</a>
                        </li>
        
                        <li class="leading-7 mb-1 border-l-4 @routeIs('teacher.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('teacher.courses.curriculum', $course)}}">Lecciones del curso</a>
                        </li>
        
                        <li class="leading-7 mb-1 border-l-4 @routeIs('teacher.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('teacher.courses.goals', $course)}}">Metas del curso</a>
                        </li>
        
                        <li class="leading-7 mb-1 border-l-4 @routeIs('teacher.courses.students', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('teacher.courses.students', $course)}}">Alumnos</a>
                        </li>
                    </ul>
                    <span class="text-lg font-bold">Estado del curso</span>
                    <hr class="mt-2 mb-4">
                    @switch($course->status)
                        @case(1)
                            <form action="{{route('teacher.courses.status', $course)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" text-white py-2 px-4 rounded-full">Enviar a revisión</button>
                            </form>
                            @break
                        @case(2)
                            <span class="px-2 inline-flex text-xs leading-5 border-amber-800 border font-semibold rounded-full bg-amber-100 text-amber-800">Curso en revisión</span>
                            @break
                        @case(3)
                        <span class="px-2 inline-flex text-xs leading-5 border-green-800 border font-semibold rounded-full bg-green-100 text-green-800">Curso publicado</span>
                            @break
                        @default
                            
                    @endswitch

                </aside>
        
                <div class="col-span-4 card">
                    <main class="card-body text-gray-600">
                        
                        {{$slot}}
        
                    </main>
                </div>
        
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
        
            {{$js}}

        @endisset
    </body>
</html>
