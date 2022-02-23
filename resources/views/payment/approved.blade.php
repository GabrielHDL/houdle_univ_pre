<x-app-layout>
    <div class="container py-12">
        <div class="flex flex-col items-center justify-center">
            <span class="text-2xl text-gray-800 mb-8">Felicidades!</span>
            <span class="text-gray-700 text-xl mb-6">Has adquirido el curso:</span>
            <h1 class="text-3xl font-bold text-indigo-700 mb-10">{{$course->title}}</h1>
            <a class="btn btn-primary text-center" href="{{route('courses.status', $course)}}">Empezar a aprender</a>
        </div>
    </div>
</x-app-layout>