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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

<script>
function provi(str) {
            var ced=0;

    if (str == "") {
        document.getElementById("provi").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("provi").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","provi.php?q="+str+"&&"+"c="+ced,true);
        xmlhttp.send();
    }
}


</script>

</head>
<?php



 @$id_user=$_SESSION['id_usu'];
  
include('conexion.php');

$sql=("SELECT * FROM planes ORDER BY nom_plan ASC
");
$plane =mysqli_query($con,$sql);

$sql1=("SELECT * FROM provincias ORDER BY nom_provi ASC
");
$provi =mysqli_query($con,$sql1);
 ?>

<?php  if(@$privilegios=$_SESSION['privilegios']=="1"){ ?>


<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">

   <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Y</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b></b>Facto</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
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
                  <a href="cerrar.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
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
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" width="160px" height="160px" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
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
  <!-- Content Wrapper. Contains page content -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Panel de Control <small>Facto Consulting</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row"><!-- ./col --><!-- ./col --><!-- ./col --></div>
      <!-- /.row -->
      <!-- Main row --><!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row"><!-- ./col -->
   
 <!-- /.INICIO DE LA LINEA DE USO -->
    </div>

      <div class="container">
    <div class="content">
      <h2>Datos de los Clientes &raquo; Agregar datos</h2>
      <hr />
      <?php
      if(isset($_POST['add'])){
       //Escanpando caracteres 
        $Numero_Cliente        = mysqli_real_escape_string($con, (strip_tags($_POST["Numero_Cliente"], ENT_QUOTES)));//Escanpando caracteres
        $Cedula                = mysqli_real_escape_string($con,(strip_tags($_POST["Cedula"],ENT_QUOTES)));//Escanpando caracteres 
        $Nombre                = mysqli_real_escape_string($con,(strip_tags($_POST["Nombre"],ENT_QUOTES)));//Escanpando caracteres 
        $Telefono              = mysqli_real_escape_string($con,(strip_tags($_POST["Telefono"],ENT_QUOTES)));//Escanpando caracteres 
        $Email                 = mysqli_real_escape_string($con,(strip_tags($_POST["Email"],ENT_QUOTES)));//Escanpando caracteres 
        $Provincia             = mysqli_real_escape_string($con,(strip_tags($_POST["Provincia"],ENT_QUOTES)));//Escanpando caracteres 
        $Canton                = mysqli_real_escape_string($con,(strip_tags($_POST["Canton"],ENT_QUOTES)));//Escanpando caracteres 
        $Tiempo                = mysqli_real_escape_string($con,(strip_tags($_POST["Tiempo"],ENT_QUOTES)));//Escanpando caracteres 
        $Bloque                = mysqli_real_escape_string($con,(strip_tags($_POST["Bloque"],ENT_QUOTES)));//Escanpando caracteres 
        $Plan                  = mysqli_real_escape_string($con,(strip_tags($_POST["Plan"],ENT_QUOTES)));//Escanpando caracteres 
        $ClaveATV              = mysqli_real_escape_string($con,(strip_tags($_POST["ClaveATV"],ENT_QUOTES)));//Escanpando caracteres 

//imagen destacada//
 $imagen=$_FILES['img_emple']['name'];
 $tipo=$_FILES['img_emple']['type'];
 $tmp=$_FILES['img_emple']['tmp_name'];
$carpeta="img-credenciales";
$img = explode("/", $tipo);
$n=$img[1];
if ($n=='png' || $n=='jpg' || $n=='jpeg') {
  # code...
$image=$Cedula.'.'.$n;  
move_uploaded_file($tmp, $carpeta.'/'.$Cedula.'.'.$n);

$archivos1= file_get_contents($carpeta.'/'.$Cedula.'.'.$n);
}else{
  echo '<script language="javascript">alert("La imagen principal no cumple con los formatos");
 window.location.href="add.php";</script>'; 

exit();

}

       /* $cek_numero = mysqli_query($con, "SELECT * FROM empleados WHERE numero_cliente='$Numero_Cliente'");
            if(mysqli_num_rows($cek_numero) > 0){
               echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Numero de               Cliente ya existe!
                 </div>';
               exit;
            }*/
        
        $cek = mysqli_query($con, "SELECT * FROM empleados WHERE Cedula='$Cedula'");
        if(mysqli_num_rows($cek) == 0){
            $insert = mysqli_query($con, "INSERT INTO empleados(Cedula,numero_cliente, Nombre, Telefono, Email, Provincia, Canton, Tiempo, Bloque,Plan, ClaveATV,img_emple)
               VALUES('$Cedula','$Numero_Cliente', '$Nombre', '$Telefono', '$Email', '$Provincia', '$Canton', '$Tiempo', '$Bloque','$Plan' ,'$ClaveATV','$image')") or die(mysqli_error());
            if($insert){
              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con Exito.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }
           
        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Cedula existe!</div>';
        }

      }
      ?>

<form enctype="multipart/form-data" class="form-horizontal" action="" method="post">
        <div class="form-group">
          <label class="col-sm-3 control-label">N&uacute;mero de Cliente</label>
          <div class="col-sm-4">
            <input type="text" name="Numero_Cliente" class="form-control" placeholder="Numero del Cliente" required>
          </div>
        </div>
        <div class="form-group"> 
          <label class="col-sm-3 control-label">C&eacute;dula</label>
          <div class="col-sm-4">
            <input type="text" name="Cedula" class="form-control" placeholder="Cedula" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Nombre Completo</label>
          <div class="col-sm-4">
            <input type="text" name="Nombre" class="form-control" placeholder="Nombre" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Tel&eacute;fono</label>
          <div class="col-sm-4">
            <input type="text" name="Telefono" class="form-control" placeholder="Telefono" required>
          </div>
        
            </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Email</label>
          <div class="col-sm-4">
            <input type="text" name="Email" class="form-control" placeholder="Email" required>
          </div>
            </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Provincia</label>
          <div class="col-sm-4">
            <select name="Provincia" class="form-control" onchange="provi(this.value)" required>
            <option value="">...</option>
             <?php
        while($datos=mysqli_fetch_array($provi)){ ?>
              <option value="<?php  echo  $datos['id_provi'];?>"><?php  echo  utf8_encode($datos['nom_provi']);?></option>
              <?php } ?>
            </select>
          </div>
            </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Cant&oacute;n</label>
         
<div id="provi" class="col-sm-4"> </div>
            </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Tiempo</label>
          <div class="col-sm-3">
            <select name="Tiempo" class="form-control">
                            <option value="1">Mensual</option>
              <option value="2">Anual</option>
            </select>
          </div>  
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Bloque</label>
          <div class="col-sm-3">
            <select name="Bloque" class="form-control">
                            <option value="1">Bloque1</option>
              <option value="2">Bloque2</option>
              <option value="3">Bloque3</option>
              <option value="4">Bloque4</option>
              <option value="5" >Pendiente</option>
              <option value="6" >Cancelado</option>
            </select>
          </div>
            </div>
 <div class="form-group">
          <label class="col-sm-3 control-label">Plan</label>
          <div class="col-sm-4">
            <select name="Plan" class="form-control" required>
            <option value="">...</option>
             <?php
        while($datos2=mysqli_fetch_array($plane)){ ?>
              <option value="<?php  echo  $datos2['id_plan'];?>"><?php  echo  utf8_encode($datos2['nom_plan']);?></option>
              <?php } ?>
            </select>
          </div>
            </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">CLAVE ATV</label>
          <div class="col-sm-4">
            <input type="text" name="ClaveATV" class="form-control" placeholder="ClaveATV" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Credenciales</label>
          <div class="col-sm-4">
            <input type="file" name="img_emple" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">&nbsp;</label>
          <div class="col-sm-6">
            <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
            <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
  </div>  

     </div>

 <!-- /.FIN DE LA LINEA DE USO -->

  <div class="box-footer no-border">
              <div class="row">
                <p>
                  <!-- ./col -->
                  <!-- ./col -->
                  <!-- ./col -->
                </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
    </div>
    <!-- /.row -->
    </div>
            <!-- /.box-footer -->
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

 <script src="jQuery.print.js"></script>
        
</body>


<?php
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="login.php";</script>'; }
?>


</html>
