@extends('layouts.app')
@section('content')
    

    <?php
        session_start();
        $con=0;$c1=0;$c2=0;$c3=0;$c4=0;$c5=0;$c6=0;$c7=0;
        if(isset($_SESSION['alicontador'])==0){
            $_SESSION['alicontador']=0;
        }
        if(isset($_SESSION['asiscontador'])==0){
            $_SESSION['asiscontador']=0;
        }
        if(isset($_SESSION['mensscontador'])==0){
            $_SESSION['mensscontador']=0;
        }
        if(isset($_SESSION['prodcontador'])==0){
            $_SESSION['prodcontador']=0;
        }
        if(isset($_SESSION['sosrutcontador'])==0){
            $_SESSION['sosrutcontador']=0;
        }
        if(isset($_SESSION['usucontador'])==0){
            $_SESSION['usucontador']=0;
        }
        if(isset($_SESSION['vencontador'])==0){
            $_SESSION['vencontador']=0;
        }
        $c1=$_SESSION['alicontador'];
        $c2=$_SESSION['asiscontador'];
        $c3=$_SESSION['mensscontador'];
        $c4=$_SESSION['prodcontador'];
        $c5=$_SESSION['sosrutcontador'];
        $c6=$_SESSION['usucontador'];
        $c7=$_SESSION['vencontador'];
        $con=$c1+$c2+$c3+$c4+$c5+$c6+$c7;
        if($con!=0){
            $c1=($c1/$con)*100;
            $c2=($c2/$con)*100;
            $c3=($c3/$con)*100;
            $c4=($c4/$con)*100;
            $c5=($c5/$con)*100;
            $c6=($c6/$con)*100;
            $c7=($c7/$con)*100;
        }
    ?>
    {{-- <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Estadísticas de Visitas</h2>
            <ol class="breadcrumb">
                
            </ol>
        </div>
        <br>
        <div class="ibox-content">
            <p>Visitas al Gestión de Usuarios <strong><?php echo $c1."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c1;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar bg-primary">
                </div>
            </div>
        </div>
        <br>
        <div class="ibox-content">
            <p>Visitas al Gestión de Productos <strong><?php echo $c2."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c2;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar bg-secondary">
                </div>
            </div>
        </div>
        <br>
        <div class="ibox-content">
            <p>Visitas al Gestión de Ventas <strong><?php echo $c3."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c3;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar bg-danger">
                </div>
            </div>
        </div>
        <br>
        <div class="ibox-content">
            <p>Visitas al Gestión de Asistencias <strong><?php echo $c4."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c4;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar bg-success">
                </div>
            </div>
        </div>
        <br>
        <div class="ibox-content">
            <p>Visitas al Gestión de Mensualidades <strong><?php echo $c5."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c5;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar bg-warning ">
                </div>
            </div>
        </div>
        <br>
        <div class="ibox-content">
            <p>Visitas al Gestión de Alimentaciones <strong><?php echo $c6."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c6;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar bg-light">
                </div>
            </div>
        </div>
        <br>
        <div class="ibox-content">
            <p>Visitas al Gestión de Rutinas de Socios <strong><?php echo $c7."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c7;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar bg-dark">
                </div>
            </div>
        </div>
    </div>
    <br> --}}

    <br>
    <br>
    <br>

<div class=" container">
    <div class="col-lg-10">
        <h2>Estadísticas de Visitas</h2>
        
    </div>
    

  <br>
    <p>Visitas al Gestión de Alimentos <strong><?php echo $c1."%";?></strong></p>
    <div class="progress">
       
      <div class="p-3 mb-2 bg-info text-white" role="progressbar" style="width: <?php echo $c1;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <br>
    <br>
    <p>Visitas al Gestión de Asistencia <strong><?php echo $c2."%";?></strong></p>
    <div class="progress">
       <!-- <p>Visitas al Gestión de Productos <strong><?php echo $c2."%";?></strong></p>-->
        <div class="p-3 mb-2 bg-warning text-dark" role="progressbar" style="width: <?php echo $c2;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <br>
    <br>
    <p>Visitas al Gestión de Mensualidades <strong><?php echo $c3."%";?></strong></p>
    <div class="progress">
        <!--<p>Visitas al Gestión de Ventas <strong><?php echo $c3."%";?></strong></p>-->
        <div class="p-3 mb-2 bg-dark text-white" role="progressbar" style="width: <?php echo $c3;?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <br>
    <br>
    <p>Visitas al Gestión de Producto <strong><?php echo $c4."%";?></strong></p>
    <div class="progress">
        <!--<p>Visitas al Gestión de Asistencias <strong><?php echo $c4."%";?></strong></p>-->
        
        <div class="p-3 mb-2 bg-danger text-white" role="progressbar" style="width: <?php echo $c4;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <br>
    <br>
    <p>Visitas al Gestión de Socios-Rutina <strong><?php echo $c5."%";?></strong></p>
    <div class="progress">
        <!--<p>Visitas al Gestión de Asistencias <strong><?php echo $c5."%";?></strong></p>-->
        
        <div class="p-3 mb-2 bg-success text-white" role="progressbar" style="width: <?php echo $c5;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <br>
    <br>
    <p>Visitas al Gestión de Usuarios <strong><?php echo $c6."%";?></strong></p>
    <div class="progress">
        <!--<p>Visitas al Gestión de Asistencias <strong><?php echo $c6."%";?></strong></p>-->
        
        <div class="p-3 mb-2 bg-secondary text-white" role="progressbar" style="width: <?php echo $c6;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <br>
    <br>
    <p>Visitas al Gestión de Ventas <strong><?php echo $c7."%";?></strong></p>
    <div class="progress">
        
        
        <div class="p-3 mb-2 bg-primary text-white" role="progressbar" style="width: <?php echo $c7;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    
    
</div>    
<br>
@if (Auth:: user()->tipo == 1)
<form action="">
    <button type="submit" class="btn-primary">
        Generar
    </button>
</form>
@endif


@endsection