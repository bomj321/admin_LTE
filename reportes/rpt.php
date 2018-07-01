<?php 
session_start();
date_default_timezone_set('America/Costa_Rica');

  if(@$privilegios=$_SESSION['privilegios']=="1"){ 

      if(isset($_POST['Bloque'])){


include('../conexion.php');
error_reporting(7); //esto debe ir en la primera linea
include('class.ezpdf.php');

$Bloque=$_POST['Bloque'];

  $sql=("SELECT e.*,p.*,c.*, pl.* FROM empleados as e inner join provincias as p on (p.id_provi=e.Provincia) inner join cantones as c on (c.id_canto=e.Canton) inner join planes as pl on (pl.id_plan=e.Plan) WHERE Bloque='$Bloque' ORDER BY  e.Nombre ASC 
");

$user =mysqli_query($con,$sql);
$user1 =mysqli_query($con,$sql);

 while($row8=mysqli_fetch_array($user1)){

$Bloque1=$row8['Bloque'];
}

//titulos de la tabla
$titulo[0]='Cedula';
$titulo[1]='Nombre';
$titulo[2]='Email';
$titulo[3]='ClaveATV';
$titulo[4]='Bloque';

$total=0;


//valores de la tabla
while($row=mysqli_fetch_array($user)){
  $registro[$titulo[0]]= $row['Cedula'];
  $registro[$titulo[1]]= $row['Nombre'];
  $registro[$titulo[2]]= $row['Email'];
  $registro[$titulo[3]]= $row['ClaveATV'];
  $registro[$titulo[4]]= $row['Bloque'];

  $tabla[]=$registro;
}


$pdf = new Cezpdf('LETTER');
$pdf->ezSetCmMargins(1,2,4,4); // Configuración de los margenes en centímetros por orden superior(2), inferior(2), izquierdo(4) y derecho(4)
$pdf->ezStartPageNumbers(725,550,9,'','',1); // Insertar el número de página
$pdf-> setLineStyle (1);



$pdf->addText(490,700,8,"Fecha:".date("Y-m-d H:i:s")); // Agregar la fecha
  
//para colocar la imagen

//
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->setStrokeColor(0,0,0);
$pdf->setColor(0,0,0);
$pdf->ezSetCmMargins(1,1,1,1);
$pdf->ezText(utf8_decode("Listado de Clientes por Bloque"),8,array('justification'=>'center'));



$la=array('showHeadings'=>1, // Mostrar encabezados
'fontSize' => 8, // Tamaño de Letras
'titleFontSize' => 12,  // Tamaño de Letras de los títulos
'showLines'=>1, // Mostrar Líneas
'shaded'=>1, // Sombra entre líneas
'width'=>700, // Ancho de la tabla
'maxWidth'=>900,
'lineCol'=>array(0,0,0),
  'textCol' => 0,0,0 ,
'height'=>700,
'maxHeight'=>900, // Ancho Máximo de la tabla
'xOrientation'=>center, // Orientación de la tabla
'cols'=>array('Cedula'=>array('justification'=>'center','width'=>70),
      'Nombre'=>array('justification'=>'center','width'=>150),
      'Email'=>array('justification'=>'left','width'=>150),
      'ClaveATV'=>array('justification'=>'center','width'=>70),
      'Bloque'=>array('justification'=>'center','width'=>50)

      )
      );
    
      $pdf->ezSetCmMargins(4,1,1.5,1);

  

$pdf->ezTable($tabla, $row, 'Listado de clientes Bloque'.$Bloque1, $la); 



      
 $pdf-> ezStream ();


}else{
echo '<script language="javascript">alert("Debe proprocionar un dato valido");
 window.location.href="../index.php";</script>'; }
}else{
echo '<script language="javascript">alert("No tiene permisos para este modulo");
 window.location.href="../login.php";</script>'; }
?>