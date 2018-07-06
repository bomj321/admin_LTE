<?php

session_start();

	  $id=$_SESSION['id_usu'];
unset ($SESSION['id_usu']);

 	
session_destroy();
header("Location: index.php");
 
?>
