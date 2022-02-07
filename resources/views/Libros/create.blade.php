@extends('layouts.app')
@section('content')
<h1>Crear nuevo registro</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('libros.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre del Libro</label>
        <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
    </div>
    <div class="form-group">
        <label for="">Autor</label>
        <input type="text" class="form-control" name="autor" value="{{old('autor')}}">
    </div>
    <div class="form-group">
        <label for="">Genero</label>
        <input type="text" class="form-control" name="genero" value="{{old('genero')}}">
    </div>
    <div class="form-group">
        <label for="">Editorial</label>
        <input type="text" class="form-control" name="editorial" value="{{old('editorial')}}">
    </div>
    <div class="form-group">
        <label for="">Descripcion</label>
        <textarea type="text" class="form-control" name="descripcion"> {{old('nombre')}}</textarea>
    </div>
    <button type="submit" class="btn-primary">
        Registra nuevo Libro
    </button>
</form>
           
@endsection