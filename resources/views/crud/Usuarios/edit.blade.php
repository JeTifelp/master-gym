@extends('layouts.app')
@section('content')
<h1>Actualizar nuevo Usuario</h1>

<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
    @csrf <!-- crar token-->
    @method('PUT')
    <div class="form-group">
        <label for="">Nombres</label>
        <input type="text" class="form-control" name="nombres" value="{{$usuario->nombres}}">
    </div>
    <div class="form-group">
        <label for="">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" value="{{$usuario->apellidos}}">
    </div>
    <div class="form-group">
        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="{{$usuario->telefono}}">
    </div>
    <div class="form-group">
        <label for="">Fecha Nacimiento</label>
        <input type="text" class="form-control" name="fecha_nacimiento" value="{{$usuario->fecha_nacimiento}}">
    </div>
    <div class="form-group">
        <label for="">Tipo</label>
        <input type="text" class="form-control" name="tipo" value="{{$usuario->tipo}}">
    </div>
    
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="{{$usuario->email}}">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" value="{{$usuario->password}}">
    </div>
    
    
    <button type="submit" class="btn-primary">
        Actualizar Usuario
    </button>
</form>
           
@endsection