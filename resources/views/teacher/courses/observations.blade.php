<x-teacher-layout :course="$course">
    <h1 class="text-2xl font-bold">Observaciones del curso</h1>
    <hr class="mt-2 mb-6">

    <div class="text-gray-500">
        {!!$course->observations->body!!}
    </div>
    <hr class="mt-2 mb-6">
    <span class="text-base text-indigo-600 italic">Al terminar de corregir tus observaciones puedes enviarnos el curso nuevamente para su aprobación</span>
    <div class="mt-6">
        <form class="flex" action="{{route('teacher.courses.status', $course)}}" method="POST">
            @csrf
            <button type="submit" class="ml-auto btn btn-danger" text-white py-2 px-4 rounded-full">Enviar a revisión</button>
        </form>
    </div>
</x-teacher-layout>