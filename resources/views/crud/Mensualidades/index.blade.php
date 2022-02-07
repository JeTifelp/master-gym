@extends('layouts.app')
@section('content')
<!-- validamos sin existe mensaje    y mostramos la alerta -->

@if ( session('status'))
    <div class="alert alert-success">{{session('status')}}</div>    
@endif

<!-- busqueda-->
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="btn btn-primary" href="{{route('mensualidades.create')}}"> Registrar Mensualidad <span class="sr-only">(current)</span></a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
<!-- nuevo botton para crear -->


<br>

<table  class="table table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Fecha_Inicio</th>
        <th scope="col">Fecha_fin</th>
        <th scope="col">Monto</th> 
        <th scope="col">Id Promo</th>            
        <th scope="col">Id Usuario</th>
        <th scope="col">Nombre(socio)</th>
        <th scope="col">Apellido(socio)</th>

        <th scope="col">Promocion Adquirida</th>
        

        <th scope="col"></th>
        </tr>
    </thead>
    <tbody></tbody>
        @foreach ($mensualidades as $mensualidad)
        <tr>
            <td>{{$mensualidad->id}}</td>                
            <td>{{$mensualidad->fecha_inicio}}</td>
            <td>{{$mensualidad->fecha_fin}}</td>
            <td>{{$mensualidad->monto}}</td>
            <td>{{$mensualidad->id_promocion}}</td>
            <td>{{$mensualidad->id_usuario}}</td>
            <td>{{$mensualidad->UN}}</td>
            <td>{{$mensualidad->UA}}</td>
            <td>{{$mensualidad->PD}}</td>
            <td class="d-inline-block">            
                @if (Auth:: user()->tipo == 1)
                <a href="{{ route('mensualidades.show', $mensualidad->id)}}" class="btn btn-primary">Ver</a>               
                @endif                                    
                <a href="{{ route('mensualidades.edit', $mensualidad->id)}}" class="btn btn-success">Edit</a> 
                @if (Auth:: user()->tipo == 1)
                <form action="{{ route('mensualidades.destroy', $mensualidad->id) }}" method="POST">
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
{{$mensualidades->links()}}
<button type="button" class="btn btn-primary">
  Contador <span class="badge badge-light">
  <?php
        session_start();
        if(isset($_SESSION['mensscontador'])==0){
            $_SESSION['mensscontador']=0;
        }
        ++$_SESSION['mensscontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"mensscontador.php\">".$_SESSION['mensscontador']."</p>";
    ?>
  </span>
  <span class="sr-only">unread messages</span>
</button>

@endsection
        
    