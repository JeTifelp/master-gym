@extends('layouts.app')
@section('content')
<h1>Crear nueva Asistencia</h1>

<!-- validacion  de campos -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('asistencias.store') }}" method="POST">
    @csrf <!-- crar token-->

    
        
    
    <div class="form-group">
        <label for="">Fecha : </label>
        <input type="text" class="form-control" name="fecha" value="{{old('fecha')}}">
    </div>
    <div class="form-group">
        <label for="">Hora : </label>
        <input type="text" class="form-control" name="hora" value="{{old('hora')}}">
    </div>
    <div class="form-group">
        <label for="">Presencia :</label>
        <input type="text" class="form-control" name="presencia" value="{{old('presencia')}}">
    </div>
    
    <div class="form-group">
        <label for="">id_usuario :</label>
        <p>{{$socios}}</p>
        <input type="text" class="form-control" name="id_usuario" value="{{old('id_usuario')}}">
    </div>
    
    
    
    <br>
    
    
    <button type="submit" class="btn-primary">
        Registra Nueva Asistencia
    </button>
</form>
           
@endsection