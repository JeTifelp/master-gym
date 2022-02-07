@extends('layouts.app')
@section('content')
<h1>Actualizar nuevo Mensualidad</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mensualidades.update', $mensualidad->id) }}" method="POST">
    @csrf <!-- crar token-->
    @method('PUT')

    <div class="form-group">
        <label for="">Fecha Inicio</label>
        <input type="text" class="form-control" name="fecha_inicio" value="{{$mensualidad->fecha_inicio}}">
    </div>
    <div class="form-group">
        <label for="">Fecha Fin</label>
        <input type="text" class="form-control" name="fecha_fin" value="{{$mensualidad->fecha_fin}}">
    </div>
    <div class="form-group">
        <label for="">Monto</label>
        <input type="text" class="form-control" name="monto" value="{{$mensualidad->monto}}">
    </div>
    <div class="form-group">
        <label for="">Id Promocion</label>
        <p style="font-size:50%;">{{$promociones}}</p>
        <input type="text" class="form-control" name="id_promocion" value="{{$mensualidad->id_promocion}}">
    </div>
    <div class="form-group">
        <label for="">Id_Usuario</label>
        <p style="font-size:60%;">{{$socios}}</p>
        <input type="text" class="form-control" name="id_usuario" value="{{$mensualidad->id_usuario}}">
    </div>
    
    
    
    <button type="submit" class="btn-primary">
        Actualizar Mensualidad
    </button>
</form>
           
@endsection