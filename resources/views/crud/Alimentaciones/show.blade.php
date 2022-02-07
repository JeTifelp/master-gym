@extends('layouts.app')
@section('content')
<div class="card">            
    <div class="card-body">
      <h5 class="card-title">{{$alimentacion->nombre}}</h5>
      <h6>Nombres: {{$alimentacion->nombre}}</h6>
      <h6>Created_at: {{$alimentacion->created_at}}</h6>
      <h6>Updated_at: {{$alimentacion->updated_at}}</h6>
      
      <!--<p class="card-text">Descripcion: </p> -->
    </div>
  </div>    
@endsection
        