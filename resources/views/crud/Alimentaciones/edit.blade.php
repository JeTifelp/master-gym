@extends('layouts.app')
@section('content')
<h1>Actualizar nuevo Alimentacion</h1>

<form action="{{ route('alimentaciones.update', $alimentacion->id) }}" method="POST">
    @csrf <!-- crar token-->
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$alimentacion->nombre}}">
    </div>
    
    
    
    <button type="submit" class="btn-primary">
        Actualizar alimentacion
    </button>
</form>
           
@endsection