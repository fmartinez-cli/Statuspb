<?php 
session_start();
if($_SESSION['Nivel']!='1'||!isset($_REQUEST['NoReloj'])){
							header("Location: index.php");
							}else{
include('conexion.php');
$NoReloj=$_REQUEST['NoReloj'];
$oldnoreloj=$_REQUEST['oldnoreloj'];
$Nombre=$_REQUEST['Nombre'];
$Pass=$_REQUEST['Pass'];
$Pass2=$_REQUEST['Pass2'];
$Turno=$_REQUEST['Turno'];
$Bahia=$_REQUEST['Bahia'];

$actual = array("<", ">", "/", '\\', "'", '"');
$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;' );
$Passf= str_replace($actual, $nuevo, $Pass);
$Passf2= str_replace($actual, $nuevo, $Pass2);


if(!preg_match("/^[0-9]{5}$/", $NoReloj)){
		echo "<span style='color:#CF000F; font-size:20px;'> N&uacutemero de reloj no v&aacute;lido</span>";
	}elseif(!preg_match("/^[a-zA-Z\ñ\Ñ\ ]{1,}$/", $Nombre)){
		echo "<span style='color:#CF000F; font-size:20px;'> Ingrese un nombre v&aacute;lido</span>";
	}elseif(!preg_match("/^.{1,}$/", $Passf)||!preg_match("/^.{1,}$/", $Passf2)){
		echo "<span style='color:#CF000F; font-size:20px;'> Ingrese una contrase&ntilde;a v&aacute;lida</span>";
	}elseif($Passf!=$Passf2){
		echo "<span style='color:#CF000F; font-size:20px;'> Las contrase&ntilde;as no coinciden</span>";
	}elseif($Turno==0){
		echo "<span style='color:#CF000F; font-size:20px;'> Seleccione un turno</span>";
	}elseif($Bahia==0){
		echo "<span style='color:#CF000F; font-size:20px;'> Seleccione una bahia</span>";
	}else{

	

			$update=$enlace->query("DELETE FROM users where No_Reloj = '$oldnoreloj'");
if ($update) {

     echo "<span style='color:white; background:#22A7F0; margin-top:480px; padding:10px; width:500px; '> El t&eacute;cnico ha sido eliminado correctamente</span>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}



		
	}






}
?>