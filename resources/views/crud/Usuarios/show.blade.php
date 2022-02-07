@extends('layouts.app')
@section('content')
<div class="card">            
    <div class="card-body">
      <h5 class="card-title">{{$usuario->nombre}}</h5>
      <h6>Nombres: {{$usuario->nombres}}</h6>
      <h6>Apellidos: {{$usuario->apellidos}}</h6>
      <h6>Telefono: {{$usuario->telefono}}</h6>
      <h6>Fecha Nacimiento: {{$usuario->fecha_nacimiento}}</h6>
      <h6>Tipo: {{$usuario->tipo}}</h6>
      <h6>Estado: {{$usuario->estado}}</h6>
      <h6>Email: {{$usuario->email}}</h6>
      <!--<p class="card-text">Descripcion: </p> -->
    </div>
  </div>    
@endsection
        