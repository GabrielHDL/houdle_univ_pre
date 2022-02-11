<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover bg-center" style="background-image: url({{asset('img/cursos/pexels-course.jpg')}})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Aprende de forma dinamica con Houdle<sup>&reg;</sup></h1>
                <p class="text-white text-lg mt-2 mb-4">Sí estas buscando adquirir más conocimientos o entrar en el mundo del desarrollo web has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso.</p>
                @livewire('search')
            </div>
        </div>
    </section>
    @livewire('course-index')
</x-app-layout>