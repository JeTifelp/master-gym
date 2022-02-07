@extends('layouts.app')
@section('content')
<div class="card">            
    <div class="card-body">
      <h5 class="card-title">id:     {{$mensualidad->id}}</h5>
      <h6>Fecha Inicio: {{$mensualidad->fecha_inicio}}</h6>
      <h6>Fecha Fin: {{$mensualidad->fecha_fin}}</h6>
      <h6>Monto de mensualidad: {{$mensualidad->monto}}</h6>
      <h6>Id Promocion Adquirida: {{$mensualidad->id_promocion}}</h6>
      <h6>Id_Usuario: {{$mensualidad->id_usuario}}</h6>
      <h6>Created_at: {{$mensualidad->created_at}}</h6>
      <h6>Updated_at: {{$mensualidad->updated_at}}</h6>
      
      <!--<p class="card-text">Descripcion: </p> -->
    </div>
  </div>    
@endsection
        