<?php 
echo '<link rel="stylesheet" type="text/css" href="../css/style.css">';
echo '<link rel="stylesheet" type="text/css" href="../css/stylef.css">';

 	echo '<script src="../js/jquery-1.3.2.min.js"></script>';
    echo '<script src="../js/functions.js"></script>';
	echo '	<script src="../js/sweetalert.min.js"></script> ';
	echo '	<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">';


if(!isset($_REQUEST['ctgbicant'])){
							header("Location: index.php");
							}else{

include('conexion.php');
session_start();

$ctgbicant=$_REQUEST['ctgbicant'];
$ctgbicnue=$_REQUEST['ctgbicnue'];
$Serie=$_REQUEST['NoSerie'];

$ctgbicant=strtoupper($ctgbicant);
$ctgbicnue=strtoupper($ctgbicnue);

$consultg=mysqli_query($enlace, "SELECT * FROM gibics WHERE CtGibic='$ctgbicnue'");
$result=mysqli_fetch_array($consultg);

$consultg1=mysqli_query($enlace, "SELECT * FROM gibics WHERE CtGibic='$ctgbicant'");
$result1=mysqli_fetch_array($consultg1);

$consultrk=mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie='$Serie'");
$result2=mysqli_fetch_array($consultrk);

$consultar=mysqli_query($enlace, "SELECT * FROM gibics WHERE NoSerie='$Serie'");
$result3=mysqli_fetch_array($consultar);

$gbicnue="<font color=#2DADDC>".$ctgbicnue."</font>";
$gbicant="<font color=#2DADDC>".$ctgbicant."</font>";
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

if($result['falla']==1){

		echo "<script>jQuery(function(){swal({
  				title: 'Gbic ".$gbicnue." <br>reportado con falla!',
  				type: 'error',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
		}); 
		</script>";

}else{

if(($result['Disponible']=='1')&&($result1['Disponible']=='0')&&($result1['NoSerie']==$Serie)&&($result['Bahiag']==$result2['Bahia'])){

$update=mysqli_query($enlace, "UPDATE gibics SET NoSerie='',Disponible='1' WHERE NoSerie='$Serie' AND CtGibic='$ctgbicant'");
$update2=mysqli_query($enlace, "UPDATE gibics SET NoSerie='$Serie',Disponible='0' WHERE CtGibic='$ctgbicnue'");

		echo "<script>jQuery(function(){swal({
  				title: 'Cambio exitoso!',
  				type: 'success',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
			}); 
		</script>";

	if (($enlace->query($update) == TRUE)&&$enlace->query($update2) == TRUE) {
    echo "<script>location.href='javascript:history.back(-1);'</script>";
	}
	echo "<script>location.href='javascript:history.back(-1);'</script>";
     
} else {

	if(($result['Disponible']=='0')&&($result['Bahiag']==$result2['Bahia'])){

			echo "<script>jQuery(function(){swal({
  				title: 'Gbic ".$gbicnue.", <br>no disponible, <br>registrado en otro rack!',
  				type: 'error',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
			}); 
			</script>";

	} else {

        if($result==''){

        	echo "<script>jQuery(function(){swal({
  				title: 'Gbic ".$gbicnue.", <br>no existe en DB!',
  				type: 'error',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
			}); 
			</script>";

				} elseif($result1==''){

			echo "<script>jQuery(function(){swal({
  				title: 'Gbic ".$gbicant.", <br>no existe en DB!',
  				type: 'error',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
			}); 
			</script>";

				}
				else{

			echo "<script>jQuery(function(){swal({
  				title: '<font size=5>Gbic ".$gbicnue." pertenece a bahia ".$result['Bahiag'].",<br>Rack ".$rack." pertenece a bahia ".$result2['Bahia'].".</font>',
  				type: 'error',
  				timer: 6000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',5000);
			}); 
			</script>";

				}
        
		   }

	   }//fin primer if else
	}//else falla
}//

 ?>