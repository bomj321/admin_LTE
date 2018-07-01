
 <?php 
ini_set('memory_limit', '2048M');
ini_set('max_execution_time', 123456);

echo $_POST['importar_clave'];
if (isset($_POST['importar_clave']) AND !empty($_POST['importar_clave'])) {


//cargamos el archivo al servidor con el mismo nombre
        //solo le agregue el sufijo bak_ 
        $archivo = $_FILES['importar_archivo']['name'];
        $tipo = $_FILES['importar_archivo']['type'];
        $carpeta = $_SERVER['DOCUMENT_ROOT']. "/empresa/tmp/";
        $destino = $carpeta."bak_" . $archivo;
        if (copy($_FILES['importar_archivo']['tmp_name'],$destino)){
            echo "Archivo Cargado Con Éxito";
        }
        else{
            echo "Error Al Cargar el Archivo";
        }
        if (file_exists($destino)) {

        	/*INVOCACION DE CLASES Y CONEXION A BASE DE DATOS*/
			/** Invocacion de Clases necesarias */
			 
			require_once '../Classes/PHPExcel.php';
			require_once '../Classes/PHPExcel/Reader/Excel2007.php';
			//DATOS DE CONEXION A LA BASE DE DATOS
			require_once '../conexion.php';
			/*$cn = mysqli_connect ("localhost","root","") or die ("ERROR EN LA CONEXION");
			$db = mysqli_select_db ("logoteck_proyecto",$cn) or die ("ERROR AL CONECTAR A LA BD");*/		
			// Cargando la hoja de calculo
			$objReader = new PHPExcel_Reader_Excel2007(); //instancio un objeto como PHPExcelReader(objeto de captura de datos de excel)
			$objPHPExcel = $objReader->load($destino); //carga en objphpExcel por medio de objReader,el nombre del archivo
			$objFecha = new PHPExcel_Shared_Date();
			 
			// Asignar hoja de excel activa
			$objPHPExcel->setActiveSheetIndex(0); //objPHPExcel tomara la posicion de hoja (en esta caso 0 o 1) con el setActiveSheetIndex(numeroHoja)
 
            // Llenamos un arreglo con los datos del archivo xlsx
				$i=7; //celda inicial en la cual empezara a realizar el barrido de la grilla de excel
				$param=0;
				$contador=0;
				while($param==0) //mientras el parametro siga en 0 (iniciado antes) que quiere decir que no ha encontrado un NULL entonces siga metiendo datos
				{
				 
				$cedula=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
				$numero_cliente=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
				$nombre=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
				$telefono=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
				$email=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
				$provincia=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
				$canton=$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
				$tiempo=$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
				$plan=$objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
				$claveATV=$objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
				$bloque=$objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();





				 /*  $sql_user="INSERT INTO empleados (Cedula,numero_cliente) VALUES (?,?)";
           			 $resultado_user=mysqli_prepare($con, $sql_user);
           			mysqli_stmt_bind_param($resultado_user, "ss",$cedula,$numero_cliente);
            		$ok=mysqli_stmt_execute($resultado_user);*/





				 
				$insert = mysqli_query($con, "INSERT INTO empleados(Cedula,numero_cliente, Nombre, Telefono, Email, Provincia, Canton, Tiempo,Plan, ClaveATV,Bloque,img_emple)
               VALUES('$cedula','$numero_cliente','$nombre', '$telefono', '$email', '$provincia', '$canton', '$tiempo' , '$plan','$claveATV' ,'$bloque','')") or die('Error: ' . mysqli_error($con));
				if (!$insert) {
					echo "ERROR </br>";
					echo $c . '</br>';
				}
				 
				if($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()==NULL) 
				//pregunto que si ha encontrado un valor null en una columna inicie un parametro en 1 que indicaria el fin del ciclo while
				{
				$param=1; //para detener el ciclo cuando haya encontrado un valor NULL
				}
				$i++;
				$contador=$contador+1;

				}
				$totalIngresados=$contador-1; //(porque se se para con un NULL y le esta registrando como que tambien un dato)
				echo "Total elementos subidos: $totalIngresados ";
				
                }//si por algo no cargo el archivo bak_ 
              else 
               {
            echo "Necesitas primero importar el archivo";
                }
        	unlink($destino);
                }
        
        
        //una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
        




 ?>