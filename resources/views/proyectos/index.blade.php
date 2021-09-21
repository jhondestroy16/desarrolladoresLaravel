@extends('layouts.layout')

@section('titulo', 'Proyectos')
@section('content')
    <h1 class = "text-center">Proyectos</h1>
    <br>
    <a href="{{ route('insertProyectos') }}">
        <button class="btn btn-outline-primary" >Crear proyecto</button>
    </a>
@endsection
