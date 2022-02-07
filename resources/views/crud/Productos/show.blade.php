@extends('layouts.app')
@section('content')
<div class="card">            
    <div class="card-body">
      <h5 class="card-title">{{$producto->nombre}}</h5>
      <h6>Nombres: {{$producto->nombre}}</h6>
      <h6>Created_at: {{$producto->created_at}}</h6>
      <h6>Updated_at: {{$producto->updated_at}}</h6>
      
      <!--<p class="card-text">Descripcion: </p> -->
    </div>
  </div>    
@endsection
        