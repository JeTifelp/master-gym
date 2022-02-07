@extends('layouts.app')
@section('content')
<h1>Actualizar  Venta</h1>

<!-- validacion  de campos -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('ventas.update', $venta->id) }}" method="POST">
    @csrf <!-- crar token-->
    @method('PUT')
    <div class="form-group">
        <label for="">Cantidad</label>
        <input type="text" class="form-control" name="cantidad" value="{{$venta->cantidad}}">
    </div>
    <div class="form-group">
        <label for="">Fecha</label>
        <input type="text" class="form-control" name="fecha" value="{{$venta->fecha}}">
    </div>
    <div class="form-group">
        <label for="">Precio</label>
        <input type="text" class="form-control" name="precio" value="{{$venta->precio}}">
    </div>
    <div class="form-group">
        <label for="">Id_Producto</label>
        <p>{{$productos}}</p>
        <input type="text" class="form-control" name="id_producto" value="{{$venta->id_producto}}">
    </div>
    
    
    
    <button type="submit" class="btn-primary">
        Actualizar Venta
    </button>
</form>
           
@endsection