@extends('layouts.app')
@section('content')
<div class="card">            
    <div class="card-body">
      <h5 class="card-title">id:     {{$socio_rutina->id}}</h5>
      <h6>Fecha : {{$socio_rutina->fecha}}</h6>
      <h6>Id Rutina trabajado: {{$socio_rutina->id_rutina}}</h6>
      <h6>Id Usuario : {{$socio_rutina->id_usuario}}</h6>            
      <h6>Created_at: {{$socio_rutina->created_at}}</h6>
      <h6>Updated_at: {{$socio_rutina->updated_at}}</h6>
      
      <!--<p class="card-text">Descripcion: </p> -->
    </div>
  </div>    
@endsection
        