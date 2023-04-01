<?php
	if(!isset($_REQUEST['Usuario'])){
							header("Location: index.php");
							}else{
	include ('conexion.php');
	$usuario=$_REQUEST['Usuario'];
	$password=$_REQUEST['Password'];

	$actual = array("<", ">", "/", '\\', "'", '"');
	$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;' );
    $url=$_REQUEST['Url'];
    $Pass= sha1(str_replace($actual, $nuevo, $password));

	$consulta=mysqli_query($enlace, "SELECT * FROM users WHERE No_Reloj = '$usuario'");

	if($cons=mysqli_fetch_array($consulta)){
		if($Pass==$cons['Pass']){
			session_start();
			$_SESSION['Nombre']  = $cons['Nombre'];
			$_SESSION['No_Reloj'] = $cons['No_Reloj'];
			$_SESSION['Turno']= $cons['Turno'];
			$_SESSION['Bahia']=$cons['Bahia'];
			$_SESSION['Nivel']=$cons['Nivel'];

			echo '<script>alert("Binvenido")</script> ';
			$location = "Location: ".$url;
			header($location);
		}else{

			echo '<script>alert("Contraseña incorrecta")</script> ';
			$location = "Location: ".$url;

header($location);
		}
	}else{

		echo '<script>alert("El numero de reloj no existe")</script> ';
		$location = "Location: ".$url;

header($location);
	}
}
 ?>
