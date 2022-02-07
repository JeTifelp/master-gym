@extends('layouts.app')
@section('content')
<!-- validamos sin existe mensaje    y mostramos la alerta -->

@if ( session('status'))
    <div class="alert alert-success">{{session('status')}}</div>    
@endif

<!-- busqueda-->
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="btn btn-primary" href="{{route('sociorutinas.create')}}"> Registrar Socio con su Rutina <span class="sr-only">(current)</span></a>
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
        <th scope="col">fecha</th>
        <th scope="col">Id Rutina</th>
        <th scope="col">Id Usuario</th>                   
        <th scope="col">Nombre(socio)</th>
        <th scope="col">Apellido(socio)</th>
        <th scope="col">Nombre(Rutina) </th>
        <th scope="col">Musculo </th>        

        <th scope="col"></th>
        </tr>
    </thead>
    <tbody></tbody>
        @foreach ($socio_rutinas as $sociorutina)
        <tr>
            <td>{{$sociorutina->id}}</td>                
            <td>{{$sociorutina->fecha}}</td>
            <td>{{$sociorutina->id_rutina}}</td>
            <td>{{$sociorutina->id_usuario}}</td>
            <td>{{$sociorutina->UN}}</td>
            <td>{{$sociorutina->UA}}</td>
            <td>{{$sociorutina->RN}}</td>
            <td>{{$sociorutina->RM}}</td>
            
            <td class="d-inline-block">           
                @if (Auth:: check()) 
                <a href="{{ route('sociorutinas.show', $sociorutina->id)}}" class="btn btn-primary">Ver</a>               
                                    
                <a href="{{ route('sociorutinas.edit', $sociorutina->id)}}" class="btn btn-success">Edit</a> 

                <form action="{{ route('sociorutinas.destroy', $sociorutina->id) }}" method="POST">
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
{{$socio_rutinas->links()}}
<button type="button" class="btn btn-primary">
  Contador <span class="badge badge-light">
  <?php
        session_start();
        if(isset($_SESSION['sosrutcontador'])==0){
            $_SESSION['sosrutcontador']=0;
        }
        ++$_SESSION['sosrutcontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"sosrutcontador.php\">".$_SESSION['sosrutcontador']."</p>";
    ?>
  </span>
  <span class="sr-only">unread messages</span>
</button>

@endsection
        
    