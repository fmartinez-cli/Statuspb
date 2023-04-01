  <?php
  if(!isset($_REQUEST['NoReloj2'])){//comentario
							header("Location: index.php");
							}else{
 session_start();
 include('conexion.php');

 	echo '<link rel="stylesheet" type="text/css" href="../css/style.css">';
	echo '<link rel="stylesheet" type="text/css" href="../css/stylef.css">';

 	echo '<script src="../js/jquery-1.3.2.min.js"></script>';
    echo '<script src="../js/functions.js"></script>';
	echo '	<script src="../js/sweetalert.min.js"></script> ';
	echo '	<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">';

	echo "<header>
		<div class='grupo total'>
			<div class='caja'>
				<center>
				<img width='35%' style='padding-top:40px' src='../img/fox.png'>
				</center>
			</div>
		</div>
	</header> ";

$comentario = $_REQUEST['comentario'];
$bahia = $_REQUEST['Bahia'];
$hora= Date('Y-m-d h:i:s');
$horareport=Date('Y-m-d h-i-s');
$noreloj = $_SESSION['No_Reloj'];
$noreloj2 = $_REQUEST['NoReloj2'];
$password=$_REQUEST['Password'];


	$actual2 = array("<", ">", "/", '\\', "'", '"');
	$nuevo2  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;' );
    $Pass= sha1(str_replace($actual2, $nuevo2, $password));

$actual = array("<", ">", "/", '\\', "'", '"', 'ñ','Ñ', 'á', 'é', 'í', 'ó', 'ú');
$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;', '&ntilde;', '&Ntilde;','&aacute;' ,'&eacute;' ,'&iacute;' ,'&oacute;' ,'&uacute;'  );
$Comentariofinal = str_replace($actual, $nuevo, $comentario);

$con1=mysqli_query($enlace,"SELECT * FROM users WHERE No_Reloj='$noreloj'");
$rcon1=mysqli_fetch_array($con1);
$turno1=($rcon1['Turno']);
$con2=mysqli_query($enlace,"SELECT * FROM users WHERE No_Reloj='$noreloj2'");
$rcon2=mysqli_fetch_array($con2);
$turno2=($rcon2['Turno']);

$desc=mysqli_query($enlace,"SELECT * FROM gibics WHERE Bahiag='$bahia'");


$consulta=mysqli_query($enlace, "SELECT * FROM users WHERE No_Reloj = '$noreloj2'");
//revisa nuevo usuario valido
	if($cons=mysqli_fetch_array($consulta)){
		if(($Pass==$cons['Pass'])&&($noreloj2==$cons['No_Reloj'])){

			$insert=mysqli_query($enlace, "INSERT INTO comentariostatus(Comentario, Bahia, No_Reloj, turnoA, No_Reloj2, turnoB, horacomentario, descripcion ) VALUES ('$comentario', '$bahia', '$noreloj', '$turno1','$noreloj2', $turno2, '$hora', '$horareport') ");
			$update=mysqli_query($enlace,"UPDATE gibics SET No_Reloj='$noreloj2' WHERE Bahiag='$bahia'");

//crear archivo text
$fi=fopen("../text/".$horareport.".txt","a")
or die("problemas al crear archivo");

fwrite($fi,"<table class='tablamodal'>");
fwrite($fi,"<caption><h2>Fecha entrega estatus: ");
fwrite($fi," ".$hora." </h2></caption>");
fwrite($fi,"\n");
fwrite($fi,"<caption><h3>Entrega: ".$noreloj." --");
fwrite($fi," Recibe: ".$noreloj2."</h3></caption> \n");
fwrite($fi,"<tr><th>Ct gbic</th><th>Marca</th><th>Bahia</th><th>Rack</th><th>Disponible</th><th>Falla</th><th>Fecha registro</th><th>Fecha de falla</th><th>Responsable</th></tr>");
while($rdes=mysqli_fetch_array($desc)){
	if($rdes['NoSerie']!=''){$rvacio=$rdes['NoSerie'];}else{$rvacio="No asignado";}
	if($rdes['Disponible']==1){$rdisp="Si";}else{$rdisp="No";}
	if($rdes['falla']==1){$rfalla="Si";}else{$rfalla="No";}
	if($rdes['fechafalla']!=''){$rfechfalla=$rdes['fechafalla'];}else{$rfechfalla="Sin registro";}
fwrite($fi,"<tr><td>".$rdes['CtGibic']."</td><td>".$rdes['Marca']."</td><td>".$rdes['Bahiag']."</td><td>".$rvacio."</td><td>".$rdisp."</td><td>".$rfalla."</td><td>".$rdes['fecharegistro']."</td><td>".$rfechfalla."</td><td>".$rdes['No_Reloj']."</td></tr>");
}
fwrite($fi,"</table>");
fclose($fi);
//crear archivo text

			if (($enlace->query($insert) == TRUE)&&$enlace->query($update)==TRUE) {
    			echo "Record updated successfully";
			} else {

			}

		echo "<script>jQuery(function(){swal({
  				title: 'Entrega exitosa!',
  				type: 'success',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
		});
		</script>";

		}else{

		echo "<script>jQuery(function(){swal({
  				title: 'Contraseña incorrecta!',
  				type: 'error',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
		});
		</script>";

		}
	}else{

		echo "<script>jQuery(function(){swal({
  				title: 'El numero de reloj no existe!',
  				type: 'error',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
		});
		</script>";

	}
	//fin validacion
}
 ?>
