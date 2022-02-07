@extends('layouts.app')
@section('content')
<h1>Asignar Rutina a Socio</h1>

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

<form action="{{ route('sociorutinas.store') }}" method="POST">
    @csrf <!-- crar token-->

    
        
    
    <div class="form-group">
        <label for="">Fecha : </label>
        <input type="text" class="form-control" name="fecha" value="{{old('fecha')}}" placeholder="2022-02-04">
    </div>
    
    
    <div class="form-group">
        <label for="">Id Usuario :</label>
        
        <p style="font-size:70%;">{{$socios}}</p>
        <input type="text" class="form-control" name="id_usuario" value="{{old('id_usuario')}}">
    </div>
    
    <div class="form-group">
        <label for="">Id Rutinas :</label>       
        
        <p style="font-size:50%;">{{$rutinas}}</p>        
        
        <input type="text" class="form-control" name="id_rutina" value="{{old('id_rutina')}}">
    </div>
    
    <br>
    
    
    <button type="submit" class="btn-primary">
        Registra Socio Rutina
    </button>
</form>
           
@endsection