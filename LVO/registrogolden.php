<?php 
include ('conexion.php');
 session_start();
if(isset($_SESSION['Nombre'])||isset($_REQUEST['NoSerie'])){
	$NoSerie=strtoupper($_REQUEST['NoSerie']);
	$WO=$_REQUEST['WO'];
	$SKU=strtoupper($_REQUEST['SKU']);
	$Loc=$_REQUEST['loc'];
	$NoRelojreg=$_SESSION['No_Reloj'];
	$Hora= Date('Y-m-d h:i:s');
	$Estatus='XTEE-RUNNING';

$conreg=mysqli_query($enlace, "SELECT * FROM golden WHERE NoSerie = '$NoSerie'");
if($consreg=mysqli_fetch_array($conreg)){

	
	echo '<script> alert("El nodo ya existe en la base de datos");</script>';
echo "<script>location.href='javascript:history.back(-1);'</script>";	
}else{

$sql="INSERT INTO golden(NoSerie, WO, SKU,  Locacion,  Estatus, NoReloj, HoraEntrada) 
values ('$NoSerie', '$WO', '$SKU',  '$Loc', '$Estatus', '$NoRelojreg', '$Hora')";


if (mysqli_query($enlace, $sql)) {
   
   
 echo "<script>location.href='javascript:history.back(-1);'</script>";

} else {
    //echo "Error updating record: " . mysqli_error($conn);
}


}







}else{

header("Location: index.php");	
}


 ?>