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
              <li class="user-header">
                <img src="dist/img/avatar5.png" width="160px" height="160px" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nombres'];?> 
                  <small>Admin</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="cerrar.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
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

include("menu.php");

?>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->    
  </aside>
<?php 
    include("modal_imprimir.php");
   ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- Main content -->
     <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Usuarios Registrados</h3>
            </div>

          

            
            
<div class="box-body" >
          

        
        <!-- /.modal -->
        
              <table id="example1" class="table table-bordered table-hover table-striped" style="width: 100%;">
              
                <thead>
                <tr>
                  <th>C#</th>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Provincia</th>
                  <th>Bloque</th>
                  <th>Acciones</th>

                </tr>
                </thead>
                <tbody>
                  <?php
        while($datos=mysqli_fetch_array($user)){ 
                
        ?>
                <tr>
                  <td ><?php  echo  $datos['numero_cliente'];?></td>
                  <td ><?php  echo  $datos['Cedula'];?></td>
                  <td ><?php  echo  $datos['Nombre'];?></td>
                  <td ><?php  echo  $datos['Email'];?></td>
                  <td ><?php  echo  $datos['nom_provi'];?></td>
                  <td ><?php if($datos['Bloque'] == '1'){
                echo '<span class="label label-success">Bloque1</span>';
              }
                            else if ($datos['Bloque'] == '2' ){
                echo '<span class="label label-success">Bloque2</span>';
              }
                            else if ($datos['Bloque'] == '3' ){
                echo '<span class="label label-success">Bloque3</span>';
              }
                            else if ($datos['Bloque'] == '4' ){
                echo '<span class="label label-success">Bloque4</span>';
 }
                            else if ($datos['Bloque'] == '5' ){
                echo '<span class="label label-warning">Pendiente</span>';
              } else if ($datos['Bloque'] == '6' ){
                echo '<span class="label label-danger">Cancelado</span>';
              }  
              ?></td>
<td>
<?php 
$v=$datos['Cedula'].'.'.$codic;

echo 
                '<a href="edit.php?nik='.base64_encode($v).'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a href="index.php?aksi=delete&nik='.base64_encode($v).'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$datos['Cedula'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                <button  data-toggle="modal" data-target="#'.$datos['Cedula'].'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></button>
              </td>'
              ?>
                </tr>

                 <div class="modal fade" id="<?php echo $datos['Cedula']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Datos del Cliente</h4>
              </div>
             <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php  echo  utf8_encode($datos['Nombre']);?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php  echo  $datos['Email'];?>" >
                </div>
              
                <div class="form-group">
                  <label for="exampleInputEmail1">ClaveATV</label>
                  <input type="text" disabled class="form-control" id="exampleInputEmail1" value="<?php  echo  $datos['ClaveATV'];?>" >
                </div>
                <div class="form-group">
                  <?php if($datos['Bloque'] == '1'){
                echo '<span class="label label-success">Bloque1</span>';
              }
                            else if ($datos['Bloque'] == '2' ){
                echo '<span class="label label-danger">Bloque2</span>';
              }
                            else if ($datos['Bloque'] == '3' ){
                echo '<span class="label label-warning">Bloque3</span>';
              }
                            else if ($datos['Bloque'] == '4' ){
                echo '<span class="label label-info">Bloque4</span>';
              } ?>
                </div>
<div class="form-group">
                  <label for="exampleInputEmail1">Credenciales</label>
 <a href="img-credenciales/<?php echo $datos['img_emple']; ?>"><img id="" src="img-credenciales/<?php echo $datos['img_emple']; ?>" alt="Credenciales" style="width: 100%;" height="300"></a>
                </div>
               
              </div>
              <!-- /.box-body -->
            </form>
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 <?php
}
                ?>
                    </tbody>

                              </table>
            </div>
            <!-- /.box-body -->
</div>
    </div>
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
  <div class="control-sidebar-bg"></div>
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
