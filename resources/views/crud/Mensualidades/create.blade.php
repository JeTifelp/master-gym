@extends('layouts.app')
@section('content')
<h1>Registrar nueva Mensualidad</h1>

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

<form action="{{ route('mensualidades.store') }}" method="POST">
    @csrf <!-- crar token-->

    
        
    
    <div class="form-group">
        <label for="">Fecha Inicio : </label>
        <input type="text" class="form-control" name="fecha_inicio" value="{{old('fecha_inicio')}}" placeholder="2022-02-02">
    </div>
    <div class="form-group">
        <label for="">Fecha Fin : </label>
        <input type="text" class="form-control" name="fecha_fin" value="{{old('fecha_fin')}}">
    </div>
    <div class="form-group">
        <label for="">Monto :</label>
        <input type="text" class="form-control" name="monto" value="{{old('monto')}}">
    </div>
    
    <div class="form-group">
        <label for="">Id Usuario :</label>
        
        <p style="font-size:70%;">{{$socios}}</p>
        <input type="text" class="form-control" name="id_usuario" value="{{old('id_usuario')}}">
    </div>
    
    <div class="form-group">
        <label for="">Id Promocion :</label>        
        
        <p style="font-size:50%;">{{$promociones}}</p>
        
        
        <input type="text" class="form-control" name="id_promocion" value="{{old('id_promocion')}}">
    </div>
    
    <br>
    
    
    <button type="submit" class="btn-primary">
        Registra Nueva Mensualidad
    </button>
</form>
           
@endsection