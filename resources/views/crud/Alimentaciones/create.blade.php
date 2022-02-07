@extends('layouts.app')
@section('content')
<h1>Crear nueva Alimentacion</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('alimentaciones.store') }}" method="POST">
    @csrf <!-- crar token-->
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
    </div>
    
    
    
    <button type="submit" class="btn-primary">
        Registra Nuevoa Alimentacion
    </button>
</form>
           
@endsection