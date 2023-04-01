<?php
if(!isset($_REQUEST['modelo'])){
							header("Location: index.php");
							}else{

include('conexion.php');
session_start();
$modeloactual=$_REQUEST['modeloactual'];
$area=$_REQUEST['Area'];
$modelo=$_REQUEST['modelo'];
$Serie=$_REQUEST['NoSerie'];

if($area=='LVO'){


$update=mysqli_query($enlace, "UPDATE racks SET Modelo='$modelo' WHERE NoSerie='$Serie'");
if ($enlace->query($update) == TRUE) {
     echo "<script>location.href='javascript:history.back(-1);'</script>";
} else {
     echo "<script>location.href='javascript:history.back(-1);'</script>";
}
}



switch ($modeloactual) {
	case 'Microsoft82':
		# code...
		$consulta=mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie='$Serie'");
		if($datos=mysqli_fetch_array($consulta)){
			$WO=$datos['WO'];
			$SKU=$datos['SKU'];
			$Bay=$datos['Bahia'];
			$Locacion=$datos['Locacion'];
			$Running=$datos['Corriendo'];
			$NoReloj=$datos['NoReloj'];
			$fecha=date('Y-m-d h:i:s');
		}
		if($modelo=="NPI"){
			$query=mysqli_query($enlace, "UPDATE racks SET Modelo='$modelo' WHERE NoSerie='$Serie'");
			
     			echo "<script>location.href='javascript:history.back(-1);'</script>";
	
		}elseif(($modelo=="Microsoft83")) {
			$query2=mysqli_query($enlace, "DELETE FROM racks WHERE NoSerie='$Serie'");
			$query3=mysqli_query($enlace, "DELETE FROM racksterminados WHERE NoSerie='$Serie'");
			$query4=mysqli_query($enlace, "DELETE FROM pruebasMicro WHERE NoSerie='$Serie'");
			$query5=mysqli_query($enlace, "DELETE FROM pruebasterminados WHERE NoSerie='$Serie'");
			$query6=mysqli_query($enlace, "INSERT INTO racks(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj, area) values ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', 'Microsoft',
				'1', '$NoReloj', 'LVO')");
			$query7=mysqli_query($enlace, "INSERT INTO pruebasMicro (NoSerie, HoraInicio) VALUES ('$Serie','$fecha')");
			echo "<script>location.href='javascript:history.back(-1);'</script>";
		}
		break;
		case 'Microsoft82':
			# code...
			$consulta=mysqli_query($enlace, "SELECT * FROM racks WHERE Noserie='$Serie'");
			if($datos=mysqli_fetch_array($consulta)){
			$WO=$datos['WO'];
			$SKU=$datos['SKU'];
			$Bay=$datos['Bahia'];
			$Locacion=$datos['Locacion'];
			$Running=$datos['Corriendo'];
			$NoReloj=$datos['NoReloj'];
			$fecha=date('Y-m-d h:i:s');
			}
			$query=mysqli_query($enlace, "DELETE FROM racks WHERE Noserie='$Serie'");
			$query2=mysqli_query($enlace, "DELETE From pruebasMicro WHERE Noserie='$Serie'");
			$query3=mysqli_query($enlace, "DELETE From pruebasterminadas WHERE Noserie='$Serie'");
			$query4=mysqli_query($enlace, "DELETE FROM racksterminados WHERE Noserie='$Serie'");
			$query6=mysqli_query($enlace, "INSERT INTO racks(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) values ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', '$modelo',
				'1', '$NoReloj')");
			$query7=mysqli_query($enlace, "INSERT INTO pruebasMicro (NoSerie, HoraInicio) VALUES ('$Serie','$fecha')");
echo "<script>location.href='javascript:history.back(-1);'</script>";

			
		break;
		case 'NPI':
		# code...
		$consulta=mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie='$Serie'");
		if($datos=mysqli_fetch_array($consulta)){
			$WO=$datos['WO'];
			$SKU=$datos['SKU'];
			$Bay=$datos['Bahia'];
			$Locacion=$datos['Locacion'];
			$Running=$datos['Corriendo'];
			$NoReloj=$datos['NoReloj'];
			$fecha=date('Y-m-d h:i:s');
		}
		if($modelo=="Microsoft 8.2"){
			$query=mysqli_query($enlace, "UPDATE racks SET Modelo='$modelo' WHERE NoSerie='$Serie'");
			
     			echo "<script>location.href='javascript:history.back(-1);'</script>";
	
		}elseif(($modelo=="Microsoft 8.3")) {
			$query2=mysqli_query($enlace, "DELETE FROM racks WHERE NoSerie='$Serie'");
			$query3=mysqli_query($enlace, "DELETE FROM racksterminados WHERE NoSerie='$Serie'");
			$query4=mysqli_query($enlace, "DELETE FROM pruebasMicro WHERE NoSerie='$Serie'");
			$query5=mysqli_query($enlace, "DELETE FROM pruebasterminados WHERE NoSerie='$Serie'");
			$query6=mysqli_query($enlace, "INSERT INTO racks(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj, area) values ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', 'Microsoft',
				'1', '$NoReloj', 'LVO')");
			$query7=mysqli_query($enlace, "INSERT INTO pruebasMicro (NoSerie, HoraInicio) VALUES ('$Serie','$fecha')");
			echo "<script>location.href='javascript:history.back(-1);'</script>";
		}
		break;
	
}

}
 ?>