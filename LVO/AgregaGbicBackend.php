<?php 

	include('conexion.php');
	session_start();
	if($_SESSION['Nivel']!='1'||!isset($_REQUEST['ctgbic'])){
							header("Location: index.php");
							}else{
	$Hora= Date('Y-m-d h:i:s');
	$ctgbic=strtoupper($_REQUEST['ctgbic']);
	$Bahia=$_REQUEST['Bahia'];
	
	if(strlen($ctgbic)==12){
		$marca="arista";
	}else{
		if(strlen($ctgbic)==11){
			$marca="cisco";
		}else{
			if(strlen($ctgbic)==10){
				$marca="hp";
			}else{
				$marca="enet";
			}
		}
	}

	if(($ctgbic=='')||(strlen($ctgbic)<8)){
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> Ingrese Ct Gbic v&aacute;lido</span>";
	}elseif($Bahia==0){
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> Seleccione una bahia</span>";
	}else{

		$consulta=mysqli_query($enlace, "SELECT * FROM gibics WHERE CtGibic= '$ctgbic'");

		if($cons=mysqli_fetch_array($consulta)){
				echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '> El Ct de Gbic ya se encuentra registrado</span>";
		}else{
			$consultauser=mysqli_query($enlace,"SELECT * FROM gibics WHERE Bahiag='$Bahia'");
			$res=mysqli_fetch_array($consultauser);
			$user=$res['No_Reloj'];

			$sql2="INSERT INTO gibics (CtGibic, Marca, Bahiag, Disponible,fecharegistro,No_Reloj) 
		VALUES ('$ctgbic','$marca','$Bahia',1,'$Hora','$user')";
		 if(mysqli_query($enlace, $sql2)){
	 		echo "<span style='color:white; background:#22A7F0; margin-top:480px; padding:10px; width:500px; '>El Gbic se registro con exito</span>";

	    }else{echo "<span>Hubo un error al registrar Gbic, favor de intentarlo mas tarde </span>";}
		}
	}
}
 ?>