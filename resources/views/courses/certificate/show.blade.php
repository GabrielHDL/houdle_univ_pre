<x-app-layout>
    Houdle Certifica que: {{auth()->user()->name}}<br>
    Ha terminado el curso: {{$course->title}}<br>
    Impartido por: {{$course->teacher->name}}<br>
    El día:
    {{$certificate->created_at}}
</x-app-layout>