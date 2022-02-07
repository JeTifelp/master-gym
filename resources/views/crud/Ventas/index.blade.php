@extends('layouts.app')
@section('content')
<!-- validamos sin existe mensaje    y mostramos la alerta -->
@if ( session('status'))
    <div class="alert alert-success">{{session('status')}}</div>    
@endif
<nav class="navbar navbar-light bg-light justify-content-between">
    @if (Auth:: user()->tipo == 1)
    <a class="btn btn-primary" href="{{route('ventas.create')}}"> Nueva Venta <span class="sr-only">(current)</span></a>
    @endif
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
<!-- nuevo botton para crear -->



<table  class="table table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Fecha</th>            
        <th scope="col">Precio</th>
        <th scope="col">Id_Producto</th>
        <th scope="col">Nombre_Producto</th>

        <th scope="col"></th>
        </tr>
    </thead>
    <tbody></tbody>
        @foreach ($ventas as $venta)
        <tr>                
            <td>{{$venta->id}}</td>
            <td>{{$venta->cantidad}}</td>
            <td>{{$venta->fecha}}</td>
            <td>{{$venta->precio}}</td>
            <td>{{$venta->id_producto}}</td>
            <td>{{$venta->nombre}}</td>
            <td class="d-inline-block">            
                @if (Auth:: user()->tipo == 1)
                <a href="{{ route('ventas.show', $venta->id)}}" class="btn btn-primary">Ver</a>               
                                    
                <a href="{{ route('ventas.edit', $venta->id)}}" class="btn btn-success">Edit</a> 

                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST">
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
    {{$ventas->links()}} 
<button type="button" class="btn btn-primary">
  Contador <span class="badge badge-light">
  <?php
        session_start();
        if(isset($_SESSION['vencontador'])==0){
            $_SESSION['vencontador']=0;
        }
        ++$_SESSION['vencontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"vencontador.php\">".$_SESSION['vencontador']."</p>";
    ?>
  </span>
  <span class="sr-only">unread messages</span>
</button>
@endsection
        
    