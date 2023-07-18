 
 <?php 
include ('conexion.php');
session_start();

echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
echo '<link rel="stylesheet" type="text/css" href="css/stylef.css">';
echo '<script src="js/jquery-1.3.2.min.js"></script>';
echo '<script src="js/functions.js"></script>';
echo '	<script src="js/sweetalert.min.js"></script> ';
echo '	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">';

if(!isset($_SESSION['Nombre'])||!isset($_REQUEST['Noserie'])){
					   header("Location: index.php");
					   }else{
$NoSeriereg=strtoupper($_REQUEST['Noserie']);
$WOregd=$_REQUEST['WO'];
$SKUreg=strtoupper($_REQUEST['SKU']);
$Modeloregd=$_REQUEST['Modelo'];
$NoRelojreg=$_SESSION['No_Reloj'];
$Trreg=$_REQUEST['tr'];
$HoraFinalreg= date('Y-m-d H:i:s');
$Bahiareg = substr($Trreg, 3,1);}

$conreg=mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie = '$NoSeriereg'");
$conreg2=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = '$Trreg' ");

// $conreg_copy=mysqli_query($enlace, "SELECT * FROM racks_copy WHERE NoSerie = '$NoSeriereg'");
// $conreg2_copy=mysqli_query($enlace, "SELECT * FROM racks_copy WHERE Locacion = '$Trreg' ");

if($Modeloregd=='Microsoft 8.2' || $Modeloregd=='NPI'|| $Modeloregd=='Microsoft 8.3')

echo "<header>
   <div class='grupo total'>
	   <div class='caja'>
		   <center>
		   <img width='35%' style='padding-top:40px' src='img/fox.png'>
		   </center>
	   </div>
   </div> 
</header> ";

if($conreg=mysqli_fetch_array($conreg)){

    echo "<script>jQuery(function(){swal({
        title: 'Este rack ya se encuentra Registrado!',
        type: 'error',
        timer: 5000,
        showConfirmButton: false
    }); setTimeout('history.back',2000);
    }); 
    </script>";

} elseif($conreg2=mysqli_fetch_array($conreg2) ){

    echo "<script>jQuery(function(){swal({
        title: 'La TR esta ocupada!',
        type: 'error',
        text: 'Se cerrar&aacute; en 3 segundos.',
        timer: 5000,
        showConfirmButton: false
    }); setTimeout('history.back(-1)',3000);
    }); 
    </script>";

} else {

    $sql="INSERT INTO racks(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) values ('$NoSeriereg', '$WOregd', '$SKUreg', '$Bahiareg', '$Trreg', '$Modeloregd', 
    '0', '$NoRelojreg')";
    $sql_copy="INSERT INTO racks_copy(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) values ('$NoSeriereg', '$WOregd', '$SKUreg', '$Bahiareg', '$Trreg', '$Modeloregd', 
    '0', '$NoRelojreg')";

    $sql2 = "INSERT INTO pruebasMicro (FTOStatus2,QuickTestStatus2,StressStatus2,MDaaSStatus2,RackTestStatus2,FTIStatus2,BSLStatus2,CTSStatus2,PackingStatus2,NoSerie, HoraInicio) VALUES ('Waiting','Vacio','Vacio','Vacio','Vacio','Vacio','Vacio','Vacio','Vacio','$NoSeriereg', '$HoraFinalreg')";
    $sql2_copy = "INSERT INTO pruebasMicro_copy (FTOStatus2,QuickTestStatus2,StressStatus2,MDaaSStatus2,RackTestStatus2,FTIStatus2,BSLStatus2,CTSStatus2,PackingStatus2,NoSerie, HoraInicio) VALUES ('Waiting','Vacio','Vacio','Vacio','Vacio','Vacio','Vacio','Vacio','Vacio','$NoSeriereg', '$HoraFinalreg')";

    if (mysqli_query($enlace, $sql) && mysqli_query($enlace, $sql_copy)) {

        if(mysqli_query($enlace, $sql2) && mysqli_query($enlace, $sql2_copy)){

            echo "<script>location.href='javascript:history.back(-1);'</script>";

        } else {
            echo "Error updating record1: " . mysqli_error($enlace);
        }

    } else {
        echo "Error updating record2: " . mysqli_error($enlace);
    }
}


?>