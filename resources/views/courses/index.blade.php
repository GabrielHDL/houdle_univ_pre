<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover bg-center" style="background-image: url({{asset('img/cursos/pexels-course.jpg')}})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Aprende de forma dinamica con Houdle<sup>&reg;</sup></h1>
                <p class="text-white text-lg mt-2 mb-4">Sí estas buscando adquirir más conocimientos o entrar en el mundo del desarrollo web has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso.</p>
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search">
                    
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </section>
    @livewire('course-index')
</x-app-layout>