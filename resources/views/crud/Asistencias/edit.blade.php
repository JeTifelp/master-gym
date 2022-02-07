@extends('layouts.app')
@section('content')
<h1>Actualizar nuevo Asistencia</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
    @csrf <!-- crar token-->
    @method('PUT')
    <div class="form-group">
        <label for="">Fecha</label>
        <input type="text" class="form-control" name="fecha" value="{{$asistencia->fecha}}">
    </div>
    <div class="form-group">
        <label for="">Hora</label>
        <input type="text" class="form-control" name="hora" value="{{$asistencia->hora}}">
    </div>
    <div class="form-group">
        <label for="">Presencia</label>
        <input type="text" class="form-control" name="presencia" value="{{$asistencia->presencia}}">
    </div>
    <div class="form-group">
        <label for="">Id_Usuario</label>
        <p>{{$socios}}</p>
        <input type="text" class="form-control" name="id_usuario" value="{{$asistencia->id_usuario}}">
    </div>
    
    
    
    <button type="submit" class="btn-primary">
        Actualizar Asistencia
    </button>
</form>
           
@endsection