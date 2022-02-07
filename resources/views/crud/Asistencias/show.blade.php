@extends('layouts.app')
@section('content')
<div class="card">            
    <div class="card-body">
      <h5 class="card-title">id:     {{$asistencia->id}}</h5>
      <h6>Fecha: {{$asistencia->fecha}}</h6>
      <h6>Hora: {{$asistencia->hora}}</h6>
      <h6>Presencia: {{$asistencia->presencia}}</h6>
      <h6>Id_Usuario: {{$asistencia->id_usuario}}</h6>
      <h6>Created_at: {{$asistencia->created_at}}</h6>
      <h6>Updated_at: {{$asistencia->updated_at}}</h6>
      
      <!--<p class="card-text">Descripcion: </p> -->
    </div>
  </div>    
@endsection
        