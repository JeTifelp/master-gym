@extends('layouts.app')
@section('content')
<!-- validamos sin existe mensaje    y mostramos la alerta -->
@if ( session('status'))
    <div class="alert alert-success">{{session('status')}}</div>    
@endif

<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="btn btn-primary" href="{{route('asistencias.create')}}"> Nuevo Asistencia <span class="sr-only">(current)</span></a>
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
        <th scope="col">Fecha</th>
        <th scope="col">HoraLlegada</th>            
        <th scope="col">SePresento</th>
        <th scope="col">Id_Usuario</th>
        <th scope="col">Nombre_Usuario</th>

        <th scope="col"></th>
        </tr>
    </thead>
    <tbody></tbody>
        @foreach ($asistencias as $asistencia)
        <tr>                
            <td>{{$asistencia->id}}</td>
            <td>{{$asistencia->fecha}}</td>
            <td>{{$asistencia->hora}}</td>
            <td>{{$asistencia->presencia}}</td>
            <td>{{$asistencia->id_usuario}}</td>
            <td>{{$asistencia->UN}}</td>
            <td class="d-inline-block">            
                <a href="{{ route('asistencias.show', $asistencia->id)}}" class="btn btn-primary">Ver</a>               
                                    
                <a href="{{ route('asistencias.edit', $asistencia->id)}}" class="btn btn-success">Edit</a> 

                @if (Auth:: user()->tipo == 1)
                <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST">
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

<button type="button" class="btn btn-primary">
  Contador <span class="badge badge-light">
  <?php
        session_start();
        if(isset($_SESSION['asiscontador'])==0){
            $_SESSION['asiscontador']=0;
        }
        ++$_SESSION['asiscontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"asiscontador.php\">".$_SESSION['asiscontador']."</p>";
    ?>
  </span>
  <span class="sr-only">unread messages</span>
</button>

@endsection
        
    