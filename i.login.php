<?php
session_start();

 		include ('conexion.php');

 $usuario = $_POST['usuario'];
$pass = $_POST['clave'];

if(empty($usuario) || empty($pass)){
header("Location: index.php");
exit();
}
 
  $sql = "SELECT * FROM usuarios WHERE correo_usu='$usuario' ";


  //echo $sql=("SELECT * from usuarios WHERE correo='$usuario' ");
$result = mysqli_query($con,$sql);


  //$conexion1=$mysqli->query($sql);
if (mysqli_num_rows($result) > 0) {

    while($rowi = mysqli_fetch_array($result)) {

//if($rowi['clave_usu'] == md5($pass)){
if($rowi['clave_usu'] == $pass){
@$_SESSION['correo_usu'] = $usuario;
@$_SESSION['nombres'] = $rowi['nombre_usu'];
@$_SESSION['id_usu'] = $rowi['id_usu'];

@$_SESSION['privilegios'] = $rowi['privilegios_usu'];


 $permisos=$rowi['privilegios_usu'];
if($permisos == 1){
echo '<script language="javascript">
 window.location.href="index.php";</script>'; 
}
else{
echo '<script language="javascript">alert("EL USUARIO NO TIENE PERMISO");
 window.location.href="admin/login.php";</script>'; 
}
} else{
echo '<script language="javascript">alert("CLAVE INCORRECTA VERIFIQUE QUE LOS DATOS SEAN CORRECTOS");
 window.location.href="login.php";</script>'; 

exit();

}
}
}else{
echo '<script language="javascript">alert("EL USUARIO NO ES VALIDO VERIFIQUE QUE LOS DATOS SEAN CORRECTOS");
 window.location.href="login.php";</script>'; 


 exit();}



?>
