@extends('adminlte::page')

@section('title', 'Houdle Admin')

@section('content_header')
    <h1>Crear precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.prices.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Etiqueta') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Aa']) !!}

                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('value', 'Valor') !!}
                    {!! Form::number('value', null, ['class' => 'form-control', 'placeholder' => '19.99']) !!}
                    @error('value')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {!! Form::submit('Crear precio', ['class' => 'btn btn-primary']) !!}
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