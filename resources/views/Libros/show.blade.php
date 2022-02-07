@extends('layouts.app')
@section('content')
<div class="card">            
    <div class="card-body">
      <h5 class="card-title">{{$libro->nombre}}</h5>
      <h6>Autor: {{$libro->nombre}}</h6>
      <h6>Genero: {{$libro->genero}}</h6>
      <h6>Editorial: {{$libro->editorial}}</h6>
      <p class="card-text">Descripcion: {{$libro->descripcion}}</p>
    </div>
  </div>    
@endsection
        
    