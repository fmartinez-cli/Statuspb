  <?php
if (!isset($_SESSION['No_Reloj'])){
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

$bahia = $_REQUEST['Bahia'];
$hora= Date('Y-m-d h:i:s');
$horareport=Date('Y-m-d h-i-s');
$noreloj = $_SESSION['No_Reloj'];
$dia=date('l');
$hr=date('h:i:s');

if($dia=='Saturday'){
  $dia='Sabado';
}else{
  if($dia=='Sunday'){
    $dia='Domingo';
  }
}
$comentario = "Estatus liberado por ".$noreloj." el dia ".$dia." a las ".$hr;

$actual = array("<", ">", "/", '\\', "'", '"', 'ñ','Ñ', 'á', 'é', 'í', 'ó', 'ú');
$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;', '&ntilde;', '&Ntilde;','&aacute;' ,'&eacute;' ,'&iacute;' ,'&oacute;' ,'&uacute;'  );
$Comentariofinal = str_replace($actual, $nuevo, $comentario);

$con1=mysqli_query($enlace,"SELECT * FROM users WHERE No_Reloj='$noreloj'");
$rcon1=mysqli_fetch_array($con1);
$turno1=($rcon1['Turno']);

$desc=mysqli_query($enlace,"SELECT * FROM gibics WHERE Bahiag='$bahia'");

			$insert=mysqli_query($enlace, "INSERT INTO comentariostatus(Comentario, Bahia, No_Reloj, turnoA, horacomentario, descripcion ) VALUES ('$comentario', '$bahia', '$noreloj', '$turno1','$hora', '$horareport') ");
			$update=mysqli_query($enlace,"UPDATE gibics SET No_Reloj=00000 WHERE Bahiag='$bahia'");

//crear archivo text
$fi=fopen("../text/".$horareport.".txt","a")
or die("problemas al crear archivo");

fwrite($fi,"<table class='tablamodal'>");
fwrite($fi,"<caption><h2>Fecha liberacion de estatus: ");
fwrite($fi," ".$hora." </h2></caption>");
fwrite($fi,"\n");
fwrite($fi,"<caption><h3>Libera: ".$noreloj."</h3></caption> \n");
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
  				title: 'Estatus libre!',
  				type: 'success',
  				timer: 5000,
  				html: true,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',2000);
		});
		</script>";

}
 ?>
