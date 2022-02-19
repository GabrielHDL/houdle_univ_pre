<x-teacher-layout :course="$course">

    <h1 class="text-2xl font-bold">Información del curso</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($course, ['route' => ['teacher.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

        @include('teacher.courses.partials.form')    

        <div class="flex justify-end">
            {!! Form::submit('Guardar', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-8']) !!}
        </div>

    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/teacher/courses/form.js')}}"></script>
    </x-slot>

</x-teacher-layout>