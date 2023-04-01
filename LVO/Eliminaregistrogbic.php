<?php 
echo '<link rel="stylesheet" type="text/css" href="../css/style.css">';
echo '<link rel="stylesheet" type="text/css" href="../css/stylef.css">';

 	echo '<script src="../js/jquery-1.3.2.min.js"></script>';
    echo '<script src="../js/functions.js"></script>';
	echo '	<script src="../js/sweetalert.min.js"></script> ';
	echo '	<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">';

if(!isset($_REQUEST['ctgbic'])){//llave if isset
							header("Location: index.php");
							}//fin llave if isset
							else{//llave else isset

include('conexion.php');
session_start();

$ctgbic=$_REQUEST['ctgbic'];
$Serie=$_REQUEST['NoSerie'];

$ctgbic=strtoupper($ctgbic);

$consultg1=mysqli_query($enlace, "SELECT * FROM gibics WHERE NoSerie='$Serie' AND CtGibic='$ctgbic'");
$result1=mysqli_fetch_array($consultg1);
//Consulta informacion de tabla gibics del rack en gestion
$consultg=mysqli_query($enlace, "SELECT * FROM gibics WHERE NoSerie='$Serie'");
$result=mysqli_fetch_array($consultg);
//Consulta informacion de tabla gibics sobre gbic ingresado a descasar
$consultrk=mysqli_query($enlace, "SELECT * FROM gibics WHERE CtGibic='$ctgbic'");
$result2=mysqli_fetch_array($consultrk);

$cts=mysqli_query($enlace,"SELECT * FROM gibics");
//$res=mysqli_fetch_array($cts);

$gbic="<font color=#2DADDC>".$ctgbic."</font>";
$rack="<font color=#2DADDC>".$Serie."</font>";

	echo "<header>
		<div class='grupo total'>
			<div class='caja'>
				<center>
				<img width='35%' style='padding-top:40px' src='../img/fox.png'>
				</center>
			</div>
		</div>
	</header> ";
	

if(($result['Disponible']=='0')&&($result1['CtGibic']==$ctgbic)){
$update=mysqli_query($enlace, "UPDATE gibics SET NoSerie='',Disponible='1' WHERE CtGibic='$ctgbic'");

		echo "<script>jQuery(function(){swal({
  				title: 'Registro Gbic ".$gbic.", <br>eliminado!',
  				type: 'success',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
			}); 
		</script>";

	if ($enlace->query($update) == TRUE) {
    echo "<script>location.href='javascript:history.back(-1);'</script>";
	}
	echo "<script>location.href='javascript:history.back(-1);'</script>";
     
} else {// llave else update

	if($result['Bahiag']!=$result2['Bahiag']){

        if($result2==''){

        	echo "<script>jQuery(function(){swal({
  				title: 'Gbic ".$gbic.", <br>no existe en DB!',
  				type: 'error',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
			}); 
			</script>";

				} else {

			echo "<script>jQuery(function(){swal({
  				title: '<font size=5>Gbic ".$gbic." pertenece a bahia ".$result2['Bahiag'].",<br>Rack ".$rack." pertenece a bahia ".$result['Bahiag'].".</font>',
  				type: 'error',
  				timer: 6000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',5000);
			}); 
			</script>";

				}
        
	} else {

			echo "<script>jQuery(function(){swal({
  				title: 'Gbic ".$gbic." incorrecto, <br>no pertenece a este rack!',
  				type: 'error',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
			}); 
			</script>";

		   }

	   }//fin llave else update
}//fin llave else isset
 ?>