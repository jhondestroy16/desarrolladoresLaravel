@extends('layouts.layout')

@section('titulo', 'Editar desarrollador')

@section('content')
    <h1 class="text-center my-5">Editar desarrollador</h1>
    @if ($errors->any())

        <div class="alert alert-danger">
            <div class="header">
                <strong>Ups...</strong>algo salio mal
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('desarrolladores.update', $desarrollador->id) }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label texto my-2">
                <h4>Nombre</h4>
            </label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del desarrollador" class="form-control"
                value="{{ $desarrollador->nombre }}">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label texto my-2">
                <h4>Apellido</h4>
            </label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido del desarrollador" class="form-control"
                value="{{ $desarrollador->apellido }}">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label texto my-2">
                <h4>Telefono</h4>
            </label>
            <input type="number" name="telefono" id="telefono" placeholder="Telefono del desarrollador"
                class="form-control" value="{{ $desarrollador->telefono }}">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label texto my-2">
                <h4>Direccion</h4>
            </label>
            <input type="text" name="direccion" id="direccion" placeholder="Direccion del desarrollador"
                class="form-control" value="{{ $desarrollador->direccion }}">
        </div>
        <div class="mb-3">
            <label for="proyectoId" class="form-label texto my-2">
                <h4>Proyecto</h4>
            </label>
            <select name="proyectoId" class="form-select" id="proyectoId">
                @foreach ($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}" @if ($desarrollador->proyectoId == $proyecto->id)
                        selected
                @endif>
                {{ $proyecto->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-2"> Guardar </button>
        </div>
    </form>
@endsection
