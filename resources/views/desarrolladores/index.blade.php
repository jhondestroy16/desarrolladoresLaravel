@extends('layouts.layout')

@section('titulo', 'Desarrolladores')

@section('content')
    <h1 class="text-center pt-5 pb-3">Desarrolladores</h1>

    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($query)
    <div class="alert alert-success alert-dismissible fade show">
        <p>Los resultados de la busqueda <strong>{{ $query }} </strong> Son:</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($desarrolladores as $desarrollador)
            <tr>
                <td>{{ $desarrollador->nombre }}</td>
                <td>{{ $desarrollador->apellido }}</td>
                <td>
                    <a href="{{ route('desarrolladores.show', $desarrollador->id) }}" class="btn btn-info">Detalles</a>
                    <a href="{{ route('desarrolladores.edit', $desarrollador->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('desarrolladores.destroy', $desarrollador->id) }}" method="post" class="d-inline-flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                        onclick="return confirm('¿Confirma la eliminacion del desarrollador  {{ $desarrollador->nombre }}?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- @endif --}}
@endsection
