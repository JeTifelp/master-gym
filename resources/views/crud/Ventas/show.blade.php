@extends('layouts.app')
@section('content')
<div class="card">            
    <div class="card-body">
      <h5 class="card-title">id Producto:     {{$venta->id}}</h5>
      <h6>Fecha: {{$venta->cantidad}}</h6>
      <h6>Hora: {{$venta->fecha}}</h6>
      <h6>Presencia: {{$venta->precio}}</h6>
      <h6>Id_Usuario: {{$venta->id_producto}}</h6>
      <h6>Created_at: {{$venta->created_at}}</h6>
      <h6>Updated_at: {{$venta->updated_at}}</h6>
      
      <!--<p class="card-text">Descripcion: </p> -->
    </div>
  </div>    
@endsection
        