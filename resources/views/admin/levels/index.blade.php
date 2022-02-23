@extends('adminlte::page')

@section('title', 'Houdle Admin')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.levels.create')}}">Crear nivel</a>
    <h1>Lista de niveles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-danger">
            {{ session('info') }}
        </div>        
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nivel</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>
                                {{$level->id}}
                            </td>
                            <td>
                                {{$level->name}}
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.levels.edit', $level)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.levels.destroy', $level)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop