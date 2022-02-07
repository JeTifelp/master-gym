@extends('layouts.app')
@section('content')
<h1>Actualizar nuevo Producto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf <!-- crar token-->
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$producto->nombre}}">
    </div>
    
    
    
    <button type="submit" class="btn-primary">
        Actualizar Producto
    </button>
</form>
           
@endsection