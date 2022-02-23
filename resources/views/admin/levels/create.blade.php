@extends('adminlte::page')

@section('title', 'Houdle Admin')

@section('content_header')
    <h1>Crear nivel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.levels.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nivel') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Aa']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear nivel', ['class' => 'btn btn-primary']) !!}
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