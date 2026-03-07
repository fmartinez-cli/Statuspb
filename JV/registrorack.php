  <?php
  echo '<link rel="stylesheet" type="text/css" href="../css/style.css">';
  echo '<link rel="stylesheet" type="text/css" href="../css/stylef.css">';
  echo '<script src="../js/jquery-1.3.2.min.js"></script>';
    echo '<script src="../js/functions.js"></script>';
  echo '  <script src="../js/sweetalert.min.js"></script> ';
  echo '  <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">';
include ('conexion.php');
session_start();
	$NoSeriereg=$_REQUEST['Noserie'];
	$WOregd=$_REQUEST['WO'];
	$SKUreg=$_REQUEST['SKU'];
	$NoRelojreg=$_SESSION['No_Reloj'];
	$Trreg=$_REQUEST['tr'];
	$HoraFinalreg= Date('Y-m-d h:i:s');
	$Bahiareg = substr($Trreg, 3,1);
	$NoSerieup=strtoupper($NoSeriereg);

$conreg=mysqli_query($enlace, "SELECT * FROM racksjv WHERE NoSerie = '$NoSerieup'");
$conreg2=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = '$Trreg' AND area='JV'");
$conreg3=mysqli_query($enlace, "SELECT * FROM racks WHERE Noserie ='$NoSerieup'");
 
echo "<header>
  <div class='grupo total'>
    <div class='caja'>
      <center>
      <img width='35%' style='padding-top:40px' src='../img/fox.png'>
      </center>
    </div>
  </div>
</header> ";

if($consreg=mysqli_fetch_array($conreg) || $consreg3=mysqli_fetch_array($conreg3)){


  echo "<script>jQuery(function(){swal({
          title: 'Este rack ya se encuentra en DB!',
          type: 'error',
          timer: 5000,
          showConfirmButton: false
        }); setTimeout('history.back(-1)',2000);
  }); 
  </script>";
}elseif($consreg2=mysqli_fetch_array($conreg2)){
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

$sql="INSERT INTO racksjv(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj, area) values ('$NoSeriereg', '$WOregd', '$SKUreg', '$Bahiareg', '$Trreg', 'Microsoft',
	'1', '$NoRelojreg', 'JV')";
$sql2="INSERT INTO pruebasjv (NoSerie, HoraInicio) VALUES ('$NoSeriereg','$HoraFinalreg')";

if (mysqli_query($enlace, $sql)) {

    if(mysqli_query($enlace, $sql2)){
 echo "<script>location.href='javascript:history.back(-1);'</script>";

    }else{echo "Error updating record: " . mysqli_error($enlace);
}
} else {
    echo "Error updating record: " . mysqli_error($enlace);
}


}







?>
