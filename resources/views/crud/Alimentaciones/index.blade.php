@extends('layouts.app')
@section('content')


@if ( session('status'))
    <div class="alert alert-success">{{session('status')}}</div>    
@endif

<nav class="navbar navbar-light bg-light justify-content-between">
<a class="btn btn-primary" href="{{route('alimentaciones.create')}}"> Nueva Alimentacion <span class="sr-only">(current)</span></a>
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
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody></tbody>
        @foreach ($alimentaciones as $alimentacion)
        <tr>
            <td>{{$alimentacion->id}}</td>                
            <td>{{$alimentacion->nombre}}</td>
            
            <td class="d-inline-block">            
                @if (Auth:: user()->tipo == 1)
                <a href="{{ route('alimentaciones.show', $alimentacion->id)}}" class="btn btn-primary">Ver</a> 
                @endif
                    
                
                <a href="{{ route('alimentaciones.edit', $alimentacion->id)}}" class="btn btn-success">Edit</a> 
            
                @if (Auth:: user()->tipo == 1)
                <form action="{{ route('alimentaciones.destroy', $alimentacion->id) }}" method="POST">
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

    {{$alimentaciones->links()}}    <!-- referencia a paginate en controller.index  -->

<button type="button" class="btn btn-primary">
  Contador <span class="badge badge-light">
  <?php
        session_start();
        if(isset($_SESSION['alicontador'])==0){
            $_SESSION['alicontador']=0;
        }
        ++$_SESSION['alicontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"alicontador.php\">".$_SESSION['alicontador']."</p>";
    ?>
  </span>
  <span class="sr-only">unread messages</span>
</button>
    @endsection