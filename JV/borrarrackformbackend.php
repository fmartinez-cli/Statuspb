<?php
session_start();
if($_SESSION['Nivel']!='1'||!isset($_REQUEST['NoSerie'])){
		header("Location: index.php");
	}else{
include('conexion.php');
$NoSerie=$_REQUEST['NoSerie'];
$WO=$_REQUEST['WO'];
$SKU=$_REQUEST['SKU'];
$Locacion=$_REQUEST['Locacion'];
$noserieold=$_REQUEST['noserieold'];
$locacionold=$_REQUEST['locacionold'];
$NoSerieup=strtoupper($NoSerie);
$SKUup=strtoupper($SKU);
$Locacionup=strtoupper($Locacion);
$Locacionoldup=strtoupper($locacionold);
$Bahia=substr($Locacion, 3,1);
if(!preg_match("/^2M2[0-9A-Z]{7}$/", $NoSerieup)){
	echo "<span style='color:#CF000F; font-size:20px;'> Ingrese un n&uacute;mero de reloj v&aacute;lido</span>";
}elseif(!preg_match("/^[0-9]{9}$/", $WO)){
	echo "<span style='color:#CF000F; font-size:20px;'> Ingrese una WO v&aacute;lida</span>";
}elseif(!preg_match("/^[0-9A-Z]{6,10}$/", $SKUup)){
	echo "<span style='color:#CF000F; font-size:20px;'> Ingrese un SKU v&aacute;lido</span>";
}elseif(!preg_match("/^TR[0-9]{2}\-[0-9]{2,3}$/", $Locacionup)){
	echo "<span style='color:#CF000F; font-size:20px;'> Ingrese una locacion v&aacute;lida</span>";
}else{
	if($Locacionoldup==$Locacionup){

$update=$enlace->query("UPDATE racksjv set Corriendo='0' where NoSerie = '$noserieold'");
		$delete=$enlace->query("DELETE FROM racksjv  where NoSerie = '$noserieold'");
		$delete2=$enlace->query("DELETE FROM pruebasjv  where NoSerie = '$noserieold'");
		$delete3=$enlace->query("DELETE FROM comentarios  where NoSerie = '$noserieold'");
		$delete=$enlace->query("DELETE FROM racksterminadosjv  where NoSerie = '$noserieold'");
		$delete2=$enlace->query("DELETE FROM pruebasterminadosjv  where NoSerie = '$noserieold'");
		$delete3=$enlace->query("DELETE FROM comentariosterminados  where NoSerie = '$noserieold'");

if ($delete) {

    echo "<span style='color:white; background:#22A7F0; margin-top:480px; padding:10px; width:500px; '> El rack se elimin&oacute; correctamente</span>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'>No se pudo eliminar el rack</span>";
}


	}else{
	$contr=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = '$Locacionup'");
	if($constr=mysqli_fetch_array($contr)){
		echo "<span style='color:#CF000F; font-size:20px;'> La locaci&oacute;n esta ocupada</span>";
	}else{
$update=$enlace->query("UPDATE racksjv set Corriendo='0' where NoSerie = '$noserieold'");
$delete=$enlace->query("DELETE FROM racksjv  where NoSerie = '$noserieold'");
$delete2=$enlace->query("DELETE FROM pruebasjv  where NoSerie = '$noserieold'");
$delete3=$enlace->query("DELETE FROM comentarios  where NoSerie = '$noserieold'");
$delete=$enlace->query("DELETE FROM racksterminadosjv  where NoSerie = '$noserieold'");
$delete2=$enlace->query("DELETE FROM pruebasterminadosjv  where NoSerie = '$noserieold'");
$delete3=$enlace->query("DELETE FROM comentariosterminados  where NoSerie = '$noserieold'");
if ($delete) {

    echo "<span  style='color:white; background:#22A7F0; margin-top:480px; padding:10px; width:500px; '> El rack se elimin&oacute; correctamente</span>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'>No se pudo eliminar el rack</span>";
}


	}
	}
}

}

 ?>
