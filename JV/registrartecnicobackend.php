<?php

	include('conexion.php');
	session_start();
	if($_SESSION['Nivel']!='1'||!isset($_REQUEST['NoReloj'])){
							header("Location: index.php");
							}else{
	$NoReloj=$_REQUEST['NoReloj'];
	$Nombre=$_REQUEST['Nombre'];
	$Pass=$_REQUEST['Pass'];
	$Pass2=$_REQUEST['Pass2'];
	$Turno=$_REQUEST['Turno'];
	$Bahia=$_REQUEST['Bahia'];

	$actual = array("<", ">", "/", '\\', "'", '"');
	$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;' );
	$Passf= sha1(str_replace($actual, $nuevo, $Pass));
	$Passf2= sha1(str_replace($actual, $nuevo, $Pass2));

	if(!preg_match("/^[0-9]{5}$/", $NoReloj)){
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> N&uacutemero de reloj no v&aacute;lido</span>";
	}elseif(!preg_match("/^[a-zA-Z\ñ\Ñ\ \á\é\í\ó\ú]{1,}$/", $Nombre)){
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> Ingrese un nombre v&aacute;lido</span>";
	}elseif(!preg_match("/^.{1,}$/", $Passf)||!preg_match("/^.{1,}$/", $Passf2)){
		echo "<span style='color:white;  background:#CF000F; margin-top:480px; padding:10px; width:500px; '> Ingrese una contrase&ntilde;a v&aacute;lida</span>";
	}elseif($Passf!=$Passf2){
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> Las contrase&ntilde;as no coinciden</span>";
	}elseif($Turno==0){
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> Seleccione un turno</span>";
	}elseif($Bahia==0){
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> Seleccione una bahia</span>";
	}else{

		$consulta=mysqli_query($enlace, "SELECT * FROM users WHERE No_Reloj= '$NoReloj'");

		if($cons=mysqli_fetch_array($consulta)){
				echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> El n&uacute;mero de reloj ya se encuentra registrado</span>";
		}else{
			$sql2="INSERT INTO users (No_Reloj, Nombre, Pass, Turno, Nivel, Bahia)

		VALUES ('$NoReloj', '$Nombre', '$Passf', '$Turno', '2', '$Bahia')";

		$sql3="INSERT INTO stats (NoReloj)
			
		VALUES ('$NoReloj')";
		 if(mysqli_query($enlace, $sql2)){
		 	mysqli_query($enlace, $sql3);
	 		echo "<span style='color:white; background:#22A7F0; margin-top:480px; padding:10px; width:500px; '>El t&eacute;cnico se registro con exito</span>";
		 	//echo '<span>Rack registrado correctamente</span>';
	    }else{echo "<span>Hubo un error al registrar al t&eacute;cnico, favor de intentarlo mas tarde </span>";}
		}
	}
}
 ?>
