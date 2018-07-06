<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administraci&oacute;n Facto Consulting</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
  <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="animate.css">


  <!--ZOOM PARA IMAGENES -->

</head>
<?php



 @$id_user=$_SESSION['id_usu'];
  
include('conexion.php');

$sql=("SELECT e.*,p.*,c.*, pl.* FROM empleados as e inner join provincias as p on (p.id_provi=e.Provincia) inner join cantones as c on (c.id_canto=e.Canton) inner join planes as pl on (pl.id_plan=e.Plan)");
$user =mysqli_query($con,$sql);

 $codic = rand(10000000,20000000);   
 
  if(@$privilegios=$_SESSION['privilegios']=="1"){ 


      if(isset($_GET['aksi']) == 'delete'){

        $cedula=$_GET['nik'];
$ce=base64_decode($cedula);
$id_user=$_SESSION['id_usu'];
$url = explode(".", $ce);
  $n=$url[0];
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($con,(strip_tags($n,ENT_QUOTES)));
        $cek = mysqli_query($con, "SELECT * FROM empleados WHERE Cedula='$nik'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($con, "DELETE FROM empleados WHERE Cedula='$nik'");
          if($delete){
           echo '<script language="javascript">alert("ELIMINADO CON EXITO");
 window.location.href="index.php";</script>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
      ?>
      

<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">

   <header class="main-header">
  
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #769CC3;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
          
              
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar5.png" width="160px" height="160px" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nombres'];?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-body" id="boton_logout">
                <div class="pull-left" id="tamaño" >
                  <a href="cerrar.php" class="btn btn-flat" id="boton_size" >Cerrar Sesión
                 <i id="icono_logout" class="fa fa-sign-out" aria-hidden="true"></i>
                  </a>
                </div>

               
                
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar" style="background-color: #2A3F54; color: white;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" width="160px" height="160px" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="font-size: 2em;">
          <p><?php echo $_SESSION['nombres'];?> </p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
              
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
        
        
       <?php

include("menu.php");?> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php 
    include("modal_imprimir.php");
   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
     <!-- Main content -->
     <section class="content ">
       <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Reportes de Clientes</h3>
              </div>

            
               
              </div>
            </div>
          </div>

          <div class="row div_botones">
          	<center><h3>Imprimir Listado por <strong>Bloque</strong></h3></center>
          	<center><button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#imprimir" > Imprimir</button></center>
          </div>


          <div class="row div_botones">
          	<center><h3>Para exportar en Formato Excel todos los Clientes</h3></center>
          	<center><a href="exportar_cliente.php" type="button" class="btn btn-lg btn-primary">Exportar</a>
          </div>


          <div class="row div_botones">
          	<center><h3>Para importar de Excel con Datos del Cliente</strong></h3></center>
          	<center><a href="importar.php" type="button" class="btn btn-lg btn-primary">Importar</a>
          </div>

    </section>
          <!-- small box -->     
  </div>

     

    
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Facto Sistemas</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/chart/Chart.bundle.js"></script>


        
</body>


<?php
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="login.php";</script>'; }
?>


</html>
