@extends('layouts.app')
@section('content')
<form action="{{ route('libros.update', $libro->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre del Libro</label>
        <input type="text" class="form-control" name="nombre" value="{{$libro->nombre}}">
    </div>
    <div class="form-group">
        <label for="">Autor</label>
        <input type="text" class="form-control" name="autor" value="{{$libro->autor}}">
    </div>
    <div class="form-group">
        <label for="">Genero</label>
        <input type="text" class="form-control" name="genero" value="{{$libro->genero}}">
    </div>
    <div class="form-group">
        <label for="">Editorial</label>
        <input type="text" class="form-control" name="editorial" value="{{$libro->editorial}}">
    </div>
    <div class="form-group">
        <label for="">Descripcion</label>
        <textarea type="text" class="form-control" name="descripcion" > {{$libro->descripcion}}</textarea>
    </div>
    <button type="submit" class="btn-primary">
        Editar Libro
    </button>
</form>
    
@endsection