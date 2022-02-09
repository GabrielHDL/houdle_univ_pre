<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover bg-center" style="background-image: url({{asset('img/home/pexels-ivan.jpg')}})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Domina la tecnología web con Houdle<sup>&reg;</sup></h1>
                <p class="text-white text-lg mt-2 mb-4">En Houdle<sup>&reg;</sup> encontrarás cursos, manuales, y articulos que te ayudarán a convertirte en un profesional del desarrollo web.</p>
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search">
                    
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl uppercase mb-6">Contenido</h1>
        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="h-36 w-full object-cover object-center rounded-xl" src="{{asset('img/home/p1.jpg')}}" alt="">
                </figure>
                <header>
                    <h2 class="text-center mt-2 text-xl text-gray-700">Curso de Laravel</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="h-36 w-full object-cover object-center rounded-xl" src="{{asset('img/home/p2.jpg')}}" alt="">
                </figure>
                <header>
                    <h2 class="text-center mt-2 text-xl text-gray-700">Curso de Vue.js</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="h-36 w-full object-cover object-center rounded-xl" src="{{asset('img/home/p3.jpg')}}" alt="">
                </figure>
                <header>
                    <h2 class="text-center mt-2 text-xl text-gray-700">Curso de React.js</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="h-36 w-full object-cover object-center rounded-xl" src="{{asset('img/home/p4.jpg')}}" alt="">
                </figure>
                <header>
                    <h2 class="text-center mt-2 text-xl text-gray-700">Curso de Node.js</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                </header>
            </article>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes que curso comprar?</h1>
        <p class="text-center text-white">Buscalos por categoría y filtra por tu palabra de interes</p>
        <div class="flex justify-center mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{route('courses.index')}}">Catálogo de cursos</a>
            </button>
        </div>
    </section>

    <section class="my-24">
        <h1 class="uppercase text-center text-3xl text-gray-600">Últimos cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Trabajamos arduamente para continuar subiendo cursos de alta calidad.</p>
        <div class="container grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <div class="text-yellow-400 hidden"></div>
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>

</x-app-layout>