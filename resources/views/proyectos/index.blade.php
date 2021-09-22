@extends('layouts.layout')

@section('titulo', 'Proyectos')
@section('content')
    <h1 class = "text-center pt-5 pb-3">Proyectos</h1>

    <a href="{{ route('insertProyectos') }}" class="btn btn-outline-primary mb-3 float-end">Crear proyecto</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $proyecto)
                <tr>
                    <td> {{ $proyecto->nombre }} </td>
                    <td>
                        <a href="{{ route('verProyecto', $proyecto->id) }}" class="btn btn-info">Detalles</a>
                        <a href="" class="btn btn-warning">Editación</a>
                        <a href="" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
@endsection
