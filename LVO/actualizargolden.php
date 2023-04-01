<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['Nombre'])||!isset($_REQUEST['Estatus'])){
		header("Location: index.php");
	}else{
include('conexion.php');
$Estatus = $_REQUEST['Estatus'];
$Hora= Date('Y-m-d h:i:s');
$NoReloj = $_SESSION['No_Reloj'];
$NoSerie = $_REQUEST['NoSerie'];



$update=mysqli_query($enlace, "UPDATE golden set  Estatus='$Estatus' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
	echo "<script>location.href='javascript:history.back(-1);'</script>";
}
}
 ?>