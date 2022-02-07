@extends('layouts.app')
@section('content')
<h1>Actualizar nuevo Socio - Rutina</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('sociorutinas.update', $socio_rutina->id) }}" method="POST">
    @csrf <!-- crar token-->
    @method('PUT')

    <div class="form-group">
        <label for="">Fecha</label>
        <input type="text" class="form-control" name="fecha" value="{{$socio_rutina->fecha}}">
    </div>
    
    <div class="form-group">
        <label for="">Id Rutina</label>
        <p style="font-size:50%;">{{$rutinas}}</p>
        <input type="text" class="form-control" name="id_rutina" value="{{$socio_rutina->id_rutina}}">
    </div>
    <div class="form-group">
        <label for="">Id_Usuario</label>
        <p style="font-size:60%;">{{$socios}}</p>
        <input type="text" class="form-control" name="id_usuario" value="{{$socio_rutina->id_usuario}}">
    </div>
    
    
    
    <button type="submit" class="btn-primary">
        Actualizar Socio - Rutina
    </button>
</form>
           
@endsection