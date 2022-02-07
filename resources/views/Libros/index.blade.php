@extends('layouts.app')
@section('content')
<!-- validamos sin existe mensaje    y mostramos la alerta -->
@if ( session('status'))
    <div class="alert alert-success">{{session('status')}}</div>    
@endif
<!-- nuevo botton para crear -->
<a class="btn btn-primary" href="{{route('libros.create')}}"> Nuevo Libro <span class="sr-only">(current)</span></a>
<br>
<br>

<table  class="table table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Autor</th>            
        <th scope="col">Genero</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody></tbody>
        @foreach ($libros as $libro)
        <tr>                
            <td>{{$libro->id}}</td>
            <td>{{$libro->nombre}}</td>
            <td>{{$libro->autor}}</td>
            <td>{{$libro->genero}}</td>
            <td class="d-inline-block">            
                <a href="{{ route('libros.show', $libro->id)}}" class="btn btn-primary">Ver</a> 
                @if (Auth::check())
                    
                
                <a href="{{ route('libros.edit', $libro->id)}}" class="btn btn-success">Edit</a> 
                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " displ>Eliminar</button>
                </form>
                @endif
            </td>
        </tr>    
        @endforeach
        
    </tbody>
    </table>
{{$libros->links()}}    <!-- referencia a paginate en controller.index  -->
@endsection
        
    