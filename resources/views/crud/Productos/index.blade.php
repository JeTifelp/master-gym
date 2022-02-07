@extends('layouts.app')
@section('content')


@if ( session('status'))
    <div class="alert alert-success">{{session('status')}}</div>    
@endif

<nav class="navbar navbar-light bg-light justify-content-between">
  @if (Auth:: user()->tipo == 1)
    <a class="btn btn-primary" href="{{route('productos.create')}}"> Nuevo Producto <span class="sr-only">(current)</span></a>
  @endif
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

<br>
<br>
<table  class="table table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody></tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{$producto->id}}</td>                
            <td>{{$producto->nombre}}</td>
            
            <td class="d-inline-block">            
                <a href="{{ route('productos.show', $producto->id)}}" class="btn btn-primary">Ver</a> 
                
                    
               @if (Auth:: user()->tipo == 1)
                   
               
                <a href="{{ route('productos.edit', $producto->id)}}" class="btn btn-success">Edit</a> 

                
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
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
    {{$productos->links()}}    <!-- referencia a paginate en controller.index  -->
    <button type="button" class="btn btn-primary">
  Contador <span class="badge badge-light">
  <?php
        session_start();
        if(isset($_SESSION['prodcontador'])==0){
            $_SESSION['prodcontador']=0;
        }
        ++$_SESSION['prodcontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"prodcontador.php\">".$_SESSION['prodcontador']."</p>";
    ?>
  </span>
  <span class="sr-only">unread messages</span>
</button>
    @endsection