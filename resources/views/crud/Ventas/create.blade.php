@extends('layouts.app')
@section('content')
<h1>Crear nueva Venta</h1>

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

<form action="{{ route('ventas.store') }}" method="POST">
    @csrf <!-- crar token-->

    
        
    
    <div class="form-group">
        <label for="">Cantidad : </label>
        <input type="text" class="form-control" name="cantidad" value="{{old('cantidad')}}">
    </div>
    <div class="form-group">
        <label for="">Fecha : </label>
        <input type="text" class="form-control" name="fecha" value="{{old('fecha')}}">
    </div>
    <div class="form-group">
        <label for="">Precio :</label>
        <input type="text" class="form-control" name="precio" value="{{old('precio')}}">
    </div>
    
    <div class="form-group">
        <label for="">Id_Producto :</label>
        <p>{{$productos}}</p>
        <input type="text" class="form-control" name="id_producto" value="{{old('id_producto')}}">
    </div>
     
    
    
    <br>
    
    <button type="submit" class="btn-primary">
        Registra Nueva Venta
    </button>
</form>
           
@endsection