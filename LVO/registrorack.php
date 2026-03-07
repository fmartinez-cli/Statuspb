 
 <?php 

echo '<link rel="stylesheet" type="text/css" href="../css/style.css">';
echo '<link rel="stylesheet" type="text/css" href="../css/stylef.css">';
echo '<script src="../js/jquery-1.3.2.min.js"></script>';
echo '<script src="../js/functions.js"></script>';
echo '	<script src="../js/sweetalert.min.js"></script> ';
echo '	<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">';

include ('conexion.php');
session_start();
if(!isset($_SESSION['Nombre'])||!isset($_REQUEST['Noserie'])){
					   header("Location: index.php");
					   }else{
$NoSeriereg=strtoupper($_REQUEST['Noserie']);
$WOregd=$_REQUEST['WO'];
$SKUreg=strtoupper($_REQUEST['SKU']);
$Modeloregd=$_REQUEST['Modelo'];
$NoRelojreg=$_SESSION['No_Reloj'];
$Trreg=$_REQUEST['tr'];
$HoraFinalreg= Date('Y-m-d h:i:s');
$Bahiareg = substr($Trreg, 3,1);}

$conreg=mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie = '$NoSeriereg'");
$conreg2=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = '$Trreg' ");

if($Modeloregd=='Microsoft 8.2' || $Modeloregd=='NPI'|| $Modeloregd=='Microsoft 8.3')

echo "<header>
   <div class='grupo total'>
	   <div class='caja'>
		   <center>
		   <img width='35%' style='padding-top:40px' src='../img/fox.png'>
		   </center>
	   </div>
   </div> 
</header> ";

if($conreg=mysqli_fetch_array($conreg)){


echo "<script>jQuery(function(){swal({
			 title: 'Este rack ya se encuentra en DB!',
			 type: 'error',
			 timer: 5000,
			 showConfirmButton: false
		   }); setTimeout('history.back',2000);
}); 
</script>";

}elseif($conreg2=mysqli_fetch_array($conreg2)){

echo "<script>jQuery(function(){swal({
			 title: 'La TR esta ocupada!',
			 type: 'error',
			 text: 'Se cerrar&aacute; en 3 segundos.',
			 timer: 5000,
			 showConfirmButton: false
		   }); setTimeout('history.back(-1)',3000);
}); 
</script>";

}else{

$sql="INSERT INTO racks(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) values ('$NoSeriereg', '$WOregd', '$SKUreg', '$Bahiareg', '$Trreg', '$Modeloregd', 
'1', '$NoRelojreg')";
$sql2="INSERT INTO pruebasMicro (NoSerie, HoraInicio) VALUES ('$NoSeriereg','$HoraFinalreg')";}

if (mysqli_query($enlace, $sql)) {

if(mysqli_query($enlace, $sql2)){

echo "<script>location.href='javascript:history.back(-1);'</script>";

}else{echo "Error updating record1: " . mysqli_error($enlace);
}
} else {
echo "Error updating record2: " . mysqli_error($enlace);
}

?>