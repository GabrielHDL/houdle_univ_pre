<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body text-gray-600">
                <h1 class="text-2xl font-bold">Crear curso</h1>
                <hr class="mt-2 mb-6">
                {!! Form::open(['route' => 'teacher.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}

                    {!! Form::hidden('user_id', auth()->user()->id) !!}

                    @include('teacher.courses.partials.form')

                    <div class="flex justify-end">
                        {!! Form::submit('Crear', ['class' => 'cursor-pointer btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/teacher/courses/form.js')}}"></script>
    </x-slot>
</x-app-layout>