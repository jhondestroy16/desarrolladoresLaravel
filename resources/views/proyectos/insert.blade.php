@extends('layouts.layout')

@section('titulo', 'Crear proyecto')

@section('content')
<h1 class="text-center">Crear nuevo proyecto</h1>
<br><br>
<form action="{{ route('guardarProyecto') }}" method="post">
    @method('post')
    @csrf
    <div>
        <label for="nombre" class="form-label texto my-2"><h4>Nombre del proyecto</h4></label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre de proyecto" class="form-control" required="required">
    </div>
    <div>
        <label for="duracion" class="form-label texto my-2"><h4>Duracion del proyecto en meses</h4></label>
        <input type="number" name="duracion" id="duracion" placeholder="0" class="form-control" required="required">
    </div>
    <div>
        <button type="submit" class="btn btn-primary my-2"> Guardar </button>
    </div>
</form>
@endsection