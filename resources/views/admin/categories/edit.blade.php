@extends('adminlte::page')

@section('title', 'Houdle Admin')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'autocomplete' => 'off', 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Aa']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop