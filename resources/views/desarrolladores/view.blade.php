@extends('layouts.layout')

@section('titulo', 'Desarrolladores')
@section('content')

    <h1 class="text-center pt-5 pb-3">Detalles del desarrollador</h1>
    <div class="row">
        <div class="col-sm-3">
            <h3>Nombre:</h3>
        </div>
        <div class="col-sm-3">
            <p>{{ $desarrollador->nombre }}</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-3">
            <h3>Apellido:</h3>
        </div>
        <div class="col-sm-3">
            <p>{{ $desarrollador->apellido }}</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-3">
            <h3>Direccion:</h3>
        </div>
        <div class="col-sm-3">
            <p>{{ $desarrollador->direccion }}</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-3">
            <h3>Telefono:</h3>
        </div>
        <div class="col-sm-3">
            <p>{{ $desarrollador->telefono }}</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-3">
            <h3>Proyecto actual:</h3>
        </div>
        <div class="col-sm-3">
            <p>{{ $desarrollador->nombreProyecto }}</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-3">
            <h3>Duracion:</h3>
        </div>
        <div class="col-sm-3">
            <p>{{ $desarrollador->duracion }} meses</p>
        </div>
    </div>
    <a href="{{ route('desarrolladores.index') }}" class = "btn btn-primary mt-3">Volver</a>
@endsection
