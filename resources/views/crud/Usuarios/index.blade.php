@extends('layouts.app')
@section('content')
@if ( session('status'))
    <div class="alert alert-success">{{session('status')}}</div>    
@endif

<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="btn btn-primary" href="{{route('usuarios.create')}}"> Nuevo Usuario <span class="sr-only">(current)</span></a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>



<table  class="table table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>            
        <th scope="col">Telefono</th>
        <th scope="col">FechaNacimiento</th>
        <th scope="col">Tipo</th>
        <th scope="col">Estado</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody></tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>                
            <td>{{$usuario->nombres}}</td>
            <td>{{$usuario->apellidos}}</td>
            <td>{{$usuario->telefono}}</td>
            <td>{{$usuario->fecha_nacimiento}}</td>
            <td>{{$usuario->tipo}}</td>
            <td>{{$usuario->estado}}</td>
            <td>{{$usuario->email}}</td>

            @if (Auth::check())                
            
            <td class="d-inline-block">            

                <a href="{{ route('usuarios.show', $usuario->id)}}" class="btn btn-primary">Ver</a> 
                
                    
                
                <a href="{{ route('usuarios.edit', $usuario->id)}}" class="btn btn-success">Edit</a> 
                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " displ>Eliminar</button>
                </form>
                
            </td>
            @endif
        </tr>    
        @endforeach
        
    </tbody>
    </table>
    {{$usuarios->links()}}    <!-- referencia a paginate en controller.index  -->
    
<button type="button" class="btn btn-primary">
  Contador <span class="badge badge-light">
  <?php
        session_start();
        if(isset($_SESSION['usucontador'])==0){
            $_SESSION['usucontador']=0;
        }
        ++$_SESSION['usucontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"usucontador.php\">".$_SESSION['usucontador']."</p>";
    ?>
  </span>
  <span class="sr-only">unread messages</span>
</button>

    @endsection