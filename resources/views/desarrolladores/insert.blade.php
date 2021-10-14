@extends('layouts.layout')

@section('titulo', 'Crear desarrollador')
@section('content')
    <h1 class="text-center">Registrar nuevo desarrollador</h1>
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
    <form class="well form-horizontal" action="{{ route('desarrolladores.store') }}" method="post" id="insert_developer">
        @csrf
        @method('post')
        <div class="form-group">
            <label class="col-md-4 control-label">Nombre</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="nombre" placeholder="Nombre" class="form-control" type="text"
                        value="{{ old('nombre') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Apellido</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="apellido" placeholder="Apellido" class="form-control" type="text"
                        value="{{ old('apellido') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Telefono #</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input name="telefono" placeholder="(845)555-1212" class="form-control" type="number"
                        value="{{ old('telefono') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Direccion</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input name="direccion" placeholder="Direccion" class="form-control" type="text"
                        value="{{ old('direccion') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Proyecto</label>
            <div class="col-md-4 selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <select name="proyectoId" class="form-control selectpicker">
                        <option value="">Seleccione...</option>
                        @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}" @if (old('proyectoId') == $proyecto->id)
                                selected
                        @endif>
                        {{ $proyecto->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary my-2"> Guardar </button>
        </div>
    </form>
@endsection
