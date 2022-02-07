@extends('layouts.app')
@section('content')
<h1>Crear nuevo Usuario</h1>

<form        action="{{ route('usuarios.store') }}" method="POST">
    @csrf <!-- crar token-->
    <div class="form-group">
        <label for="">Nombres</label>
        <input type="text" class="form-control" name="nombres" value="{{old('nombres')}}">
    </div>
    <div class="form-group">
        <label for="">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" value="{{old('apellidos')}}">
    </div>
    <div class="form-group">
        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}">
    </div>
    <div class="form-group">
        <label for="">Fecha Nacimiento</label>
        <input type="text" class="form-control" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
    </div>
    <div class="form-group">
        <label for="">Tipo</label>
        <input type="text" class="form-control" name="tipo" value="{{old('tipo')}}">
    </div>
    
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" value="{{old('password')}}">
    </div>
    
    
    <button type="submit" class="btn-primary">
        Registra Nuevo Usuario
    </button>
</form>
           
@endsection