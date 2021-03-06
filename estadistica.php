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
  <link rel="stylesheet" type="text/css" href="animate.css">
  <link rel="stylesheet" type="text/css" href="estilos.css">

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

   <header class="main-header" >
   
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
                <h3 class="box-title">Estadisticas</h3>
              </div>

              <!--CONSULTAS SQL-->
              <?php 
   $bloque1 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='1'");
          $bloque1_row= mysqli_num_rows($bloque1);

    $bloque2 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='2'");
          $bloque2_row= mysqli_num_rows($bloque2);

    $bloque3 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='3'");
          $bloque3_row= mysqli_num_rows($bloque3);

    $bloque4 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='4'");
          $bloque4_row= mysqli_num_rows($bloque4);

    $bloque5 = mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='5'");
          $bloque5_row= mysqli_num_rows($bloque5);

    $bloque6= mysqli_query($con, "SELECT * FROM empleados WHERE Bloque='6'");
          $bloque6_row= mysqli_num_rows($bloque6);
   
  $total=  $bloque1_row+ $bloque2_row+ $bloque3_row+ $bloque4_row+ $bloque5_row+ $bloque6_row; 


  if($total ==0){


    $total = 1;
  }       
               
  ?>
                          <!--CONSULTAS SQL-->

               
              </div>
            </div>
          </div>

          <div class="row div_externo">
                  <div class="col-md-3 col-sm-6 col-xs-6 div_interno_bloque1" >
                          <div class="col-md-10 col-xs-10 col-sm-10">  
                             <input type="hidden" value=" <?php echo $bloque1_row; ?>" id="bloque_1"> 
                              <h2><i class="fa fa-user icono-fa"></i>Bloque 1</h2>
                              <h1><?php echo $bloque1_row; ?></h1>
                           </div> 
                           
                           <div class="col-md-2 col-sm-2 col-xs-1 linea_divisoria1">  
                             
                           </div>  
                  </div>
                 <div class="col-md-3 col-sm-6 col-xs-6 div_interno_bloque2">

                    <div class="col-md-10 col-xs-10 col-sm-10"> 
                       <input type="hidden" value="<?php echo $bloque2_row; ?>" id="bloque_2"> 
                        <h2><i class="fa fa-user icono-fa"></i>Bloque 2</h2>
                        <h1><?php echo $bloque2_row; ?></h1>
                    </div>  
                    
                    <div class="col-md-2 col-sm-2 col-xs-1 linea_divisoria2">  
                             
                    </div> 
                </div>

               <div class="linea_horizontal">
                         <div class="col-md-3 col-sm-6 col-xs-6 div_interno_bloque3"  >
                            <div class="col-md-10 col-xs-10 col-sm-10">  
                                <input type="hidden" value="<?php echo $bloque3_row; ?>" id="bloque_3"> 
                                <h2><i class="fa fa-user icono-fa"></i>Bloque 3</h2>
                                <h1><?php echo $bloque3_row; ?></h1>
                             </div>    
                            <div class="col-md-2 col-sm-2 col-xs-1 linea_divisoria3">                               
                           </div>  
                        </div>

                         <div class="col-md-3 col-sm-6 col-xs-6 div_interno_bloque4" >
                        <div class="col-md-10 col-xs-10 col-sm-10"> 
                            <input type="hidden" value="<?php echo $bloque4_row; ?>" id="bloque_4">
                            <input type="hidden" value="<?php echo $bloque5_row; ?>" id="bloque_5"> 
                            <input type="hidden" value="<?php echo $bloque6_row; ?>" id="bloque_6"> 
                            <h2><i class="fa fa-user icono-fa"></i>Bloque 4</h2>
                            <h1><?php echo $bloque4_row; ?></h1>
                        </div>    
                        </div>
               </div>  


            </div>

            <div class="row " > 
                
                  <?php
                    if ($bloque1_row==0 AND $bloque2_row==0 AND $bloque3_row==0 AND $bloque4_row==0 AND $bloque5_row==0 AND $bloque6_row==0) { 
                  ?>

                   <center><h2>NO HAY INFORMACION DISPONIBLE</h2></center>
                 
                  <?php
                    }else{
                  ?>

                <div class="col-md-9 col-sm-9 col-xs-9 ">
                  
                     <canvas id="myChart"></canvas>
                
                </div>

                <div class="col-md-3 col-sm-3 col-xs-2 menu_abierta" id="menu_id">
                  <ul class="list-group lista_porcentaje" id="menu">
                    <li class="sinborde" >
                     <span id="caja1"></span>
                      <?php echo round(($bloque1_row/$total)*100); ?>% Bloque 1
                    </li>
                    <li class="sinborde">
                      <span id="caja2"></span>
                       <?php echo round(($bloque2_row / $total) * 100); ?>% Bloque 2
                    </li>
                    <li class="sinborde">
                     <span id="caja3"></span>
                       <?php echo round(($bloque3_row / $total) * 100); ?>% Bloque 3
                    </li>
                    <li class="sinborde">
                      <span id="caja4"></span>
                       <?php echo round(($bloque4_row / $total) * 100); ?>% Bloque 4
                    </li>
                    <li class="sinborde" >
                      <span id="caja5"></span>
                       <?php echo round(($bloque5_row / $total) * 100); ?>% Pendiente
                    </li>
                     <li class="sinborde">
                      <span id="caja6"></span>
                       <?php echo round(($bloque6_row / $total) * 100); ?>% Cancelado
                      </li>
                  </ul>
                 </div>

                  <?php
                    }
                  ?>


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
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var bloque1 =  document.getElementById("bloque_1").value;
var bloque2 =  document.getElementById("bloque_2").value;
var bloque3 =  document.getElementById("bloque_3").value;
var bloque4 =  document.getElementById("bloque_4").value;
var bloque5 =  document.getElementById("bloque_5").value;
var bloque6 =  document.getElementById("bloque_6").value;
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Bloque 1", "Bloque 2", "Bloque 3", "Bloque 4", "Pendiente", "Cancelado"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: [
                '#C64134',
                '#24B193',
                '#3497DA',
                '#BDC3C7',
                '#9A58B5',
                '#455C73'
            ],
           borderColor: [
                '#C64134',
                '#24B193',
                '#3497DA',
                '#BDC3C7',
                '#9A58B5',
                '#455C73'
            ],
            data: [bloque1, bloque2, bloque3, bloque4, bloque5, bloque6],
        }]
    },
   options: {    
           
   }
  
   
});

</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
     language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
},
"aaSorting": [[ 0, "desc" ]]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "bSort": false,
      
    });
  });
</script>
  <!--ZOOM PARA IMAGENES -->

  <!--ZOOM PARA IMAGENES -->

        
</body>


<?php
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="login.php";</script>'; }
?>


</html>
