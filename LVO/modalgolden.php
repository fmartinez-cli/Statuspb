<?php 
if(!isset($_REQUEST['ns'])){
							header("Location: index.php");
							}else{
include('conexion.php');
session_start();
$variable= $_GET["ns"];
$loc=$_GET['loc'];

$cons=mysqli_query($enlace, "SELECT * FROM golden WHERE NoSerie = '$variable'"); 

if(isset($_SESSION['Nombre'])){

if($con=mysqli_fetch_array($cons)){
$modal=1;
// sesion y registrado

 }else {
 	$modal=2;
 	// session y no registrado
 }

}else{
if($con=mysqli_fetch_array($cons)){
$modal=3;
// no sesion y registrado
 }else {
 	$modal=4;
 	// no seison y no registrado
 }

}

switch ($modal) {
	case '1':
		
		echo '
		<table class="tablamodal">
		<caption><h3>'.$con["NoSerie"].'</h3></caption>
			<tr><th>WO</th><th>SKU</th><th>Registrado por:</th><th>Fecha</th></tr>
		<td>'.$con['WO'].'</td>'.
		'<td>'. $con['SKU'].'</td>'.
		'<td><p class="info">'. $con['NoReloj'].'</td>'.
		'<td>'. $con['HoraEntrada'].'</td></tr>
		</table>
		<center> 
		<br><br><h1>'.$con['Estatus'].'</h1>
		<form name="actualizagolden" id="actualizagolden" action="actualizargolden.php" method="post">
		<table style="text-align:center;">
		<tr>
		<td>
		<input type="hidden" value="'.$con["NoSerie"].'" name="NoSerie" form="actualizagolden">
		<select required name="Estatus" class = "Selectl" form="actualizagolden" >
		<option disabled selected>Status</option>
		<option value="XTEE-PASS">XTEE-PASS</option>
		<option value="XTEE-RUNNING">XTEE-RUNNING</option>
		<option value="Repair">Repair</option>
		<option value="Troubleshooting">Troubleshooting</option>
		</select></td>
		<tr>
		<td>
		<button class="btn4" form="actualizagolden"><h2>Actualizar</h2></button>
		</td>
		</tr>
		</table>
		
		</form>
		<form name="limpiar" id="limpiar" action="limpiargolden.php" method="post">
		<input type="hidden" value="'.$con["NoSerie"].'" name="NoSerie" form="limpiar">
		<button class="btn4" form="limpiar"><h2>Limpiar posicion</h2></button>
		</form>



		</center>
		';

		$query = mysqli_query($enlace, "SELECT * FROM comentariosgolden WHERE NoSerie = '$variable' ORDER BY ID ASC"); 
echo'<h2>Comentarios.</h2>';
while ($datos=mysqli_fetch_row($query) ) {
	$actual = array("<", ">");
	$nuevo  = array("&lt ", "&gt");
	$comentario = str_replace($actual, $nuevo, $datos[5]);
echo '<div class="comentarios">
<div><p title="'.$datos[2].'"><h3>Técnico: '.$datos[3].'</h3></p></div><div><h5>Fecha: '.$datos[4].'</h5><br>
<p style="white-space: pre-wrap; word-break: break-all;
 word-wrap: break-word;">'.$comentario.'</p>
</div></div><br>';
}
echo '
	<form action="comentargolden.php" method="post">
	<textarea name="comentario" rows="5" cols="60" placeholder="Comentar..." maxlength="255"></textarea>
	<input type="hidden" value="'.$variable.'" name="NoSerie">
	<button class="btn5">Comentar</button>
	</form>

';
		break;
	case '2':
		
		echo '
<center>
<div class="grupo-centar">
<div class="caja">
<div class="registro">
<h1 style="color:white;">Registrar Nodo</h1>
<table class="tablaregistro">
<tr>
<form class="RegistroR" method="post" action="registrogolden.php" id="formregistro">

<td><input type="text" title="Ejemplo: 2M2XXXXXXX" name="NoSerie" placeholder="No. Serie" required form="formregistro" maxlength="10" pattern="2[mM]{1}2[0-9a-zA-Z]{7}"  ></td>
</tr>
<tr>	
<td><input type="text" title="Ejemplo: 123456789" name="WO" id="WO" placeholder="WO" required form="formregistro" maxlength="9" pattern="[0-9]{9}"></td>
</tr>
<tr>	

<td><input type="text" name="SKU" title="Solo numero y/o letras" placeholder="SKU" required form="formregistro" maxlength="10" pattern="[A-Za-z0-9]{6,10}"  ></td>
</tr>

</table>
<Button class="btn4" form="formregistro"><h1>Registrar</h1></Button>
<input form="formregistro" type="hidden" name="loc" value="'.$loc.'">
</form>

</center>
</div>

</div>
</div>
'; 



		break;
	case '3':
		
		echo '
		<table class="tablamodal">
		<caption><h3>'.$con["NoSerie"].'</h3></caption>
			<tr><th>WO</th><th>SKU</th><th>Registrado por:</th><th>Fecha</th></tr>
		<td>'.$con['WO'].'</td>'.
		'<td>'. $con['SKU'].'</td>'.
		'<td><p class="info">'. $con['NoReloj'].'</td>'.
		'<td>'. $con['HoraEntrada'].'</td></tr>
		</table>
		<center> 
		<br><br><h1>'.$con['Estatus'].'</h1>
		
		
		</center>
		';

		$query = mysqli_query($enlace, "SELECT * FROM comentariosgolden WHERE NoSerie = '$variable' ORDER BY ID ASC"); 
echo'<h2>Comentarios.</h2>';
while ($datos=mysqli_fetch_row($query) ) {
	$actual = array("<", ">");
	$nuevo  = array("&lt ", "&gt");
	$comentario = str_replace($actual, $nuevo, $datos[5]);
echo '<div class="comentarios">
<div><p title="'.$datos[2].'"><h3>Técnico: '.$datos[3].'</h3></p></div><div><h5>Fecha: '.$datos[4].'</h5><br>
<p style="white-space: pre-wrap; word-break: break-all;
 word-wrap: break-word;">'.$comentario.'</p>
</div></div><br>';
}


		break;
	case '4':
echo "<center><br><br><br><h1>Debe iniciar sesion para registrar un nodo</h1><br><br><br><img src='img/icono.png' WIDTH=178 HEIGHT=180></center>"; 
		break;						
	
	
}

}

 ?>