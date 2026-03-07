<?php
include('conexion.php');
$variable= $_GET["pb"];
$tr=$_GET['tr'];
session_start();
$cons=mysqli_query($enlace, "SELECT * FROM racksjv WHERE NoSerie = '$variable'");
$cons2=mysqli_query($enlace, "SELECT * FROM pruebasjv where NoSerie = '$variable'");



$conp=mysqli_fetch_array($cons2);


$ftonr = $conp['FTONoReloj'];
$arista1nr = $conp['Arista0NoReloj'];
$arista2nr = $conp['Arista1NoReloj'];
$rackscannr = $conp['RackscanNoReloj'];
$clustern0nr = $conp['Cluster0NoReloj'];
$clustern1nr = $conp['Cluster1NoReloj'];
$bootstrapnr = $conp['BootstrapNoReloj'];
$CMnr = $conp['CMNoReloj'];
$deidnr = $conp['DEIDNoReloj'];
$eotanr = $conp['EOTANoReloj'];


$consfto=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$ftonr'");
$confto=mysqli_fetch_array($consfto);
$consarista1=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$arista1nr'");
$conarista1=mysqli_fetch_array($consarista1);
$consarista2=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$arista2nr'");
$conarista2=mysqli_fetch_array($consarista2);
$consrackscan=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$rackscannr'");
$conrackscan=mysqli_fetch_array($consrackscan);
$conscluster0=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$clustern0nr'");
$concluster0=mysqli_fetch_array($conscluster0);
$conscluster1=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$clustern1nr'");
$concluster1=mysqli_fetch_array($conscluster1);
$consbootstrap=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$bootstrapnr'");
$conbootstrap=mysqli_fetch_array($consbootstrap);
$conscm=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$CMnr'");
$concm=mysqli_fetch_array($conscm);
$consdeid=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$deidnr'");
$condeid=mysqli_fetch_array($consdeid);
$conseota=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$eotanr'");
$coneota=mysqli_fetch_array($conseota);


if(isset($_SESSION['Nombre'])){

if($con=mysqli_fetch_array($cons)){
$modal=1;


 }else {
 	$modal=2;
 }

}else{
if($con=mysqli_fetch_array($cons)){
$modal=3;

 }else {
 	$modal=4;
 }

}




switch ($modal) {
	//------------------------------------------------------------------------------------modal con sesion---------------------------------------------------------------------
case 1:
//---------------------------------------------------------------------------------------------Azure 4.1 con sesion---------------------------------------------------------------

$inicionr=$con['NoReloj'];
$consinicio=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$inicionr'");
$conpinicio=mysqli_fetch_array($consinicio);
echo "
<center>
	<table class='tablamodal'>
	<caption><h3>".$con['NoSerie']."</h3></caption>
	<tr><th>WO</th><th>SKU</th><th>Modelo</th><th>Registrado por:</th><th>Hora</th></tr>
	<tr>
	<td>".$con['WO']."</td>".
	"<td>". $con['SKU']."</td>".
	"<td>".$con['Modelo']."</td>".
	"<td><p class='info'>". $con['NoReloj']."<span>".$conpinicio['Nombre']." <br> ".$conpinicio['Turno']."&deg; Turno</span></p></td>".
	"<td>". $conp['HoraInicio']."</td></tr>
	";
echo "</table></center>";

echo "<center>
	<table class='tablaprueba'>
	<tr><th>Prueba</th><th>Status</th><th>Tecnico</th><th>Hora</th></tr>

	<form method='post' action='actualizarjv.php' id='formazure41'>
	<input form='formazure41' type='hidden' name='tr' value='".$tr."'>
		<input type='hidden' name='noserie' value='".$con['NoSerie']."' form='formazure41'>
		<tr><td>FTO:</td>
		<td>";
			if($conp['FTO']==1){
			echo "<input type='checkbox' name='test' value='fto'  disabled checked >";
		}else{
			echo "<input type='checkbox' name='test' value='fto' form='formazure41' required >";}
echo "		</td>
		<td><p class='info' title=''>".$conp['FTONoReloj']."<span>".$confto['Nombre']."  <br>  ".$confto['Turno']."&deg; Turno</span></p></td>
		<td>".$conp['FTOHoraFinal']."</td>
		</tr>

		<tr><td>Configurar Arista 1:</td>
		<td>";
			if($conp['Arista0']==1){
			echo "<input type='checkbox' name='test' value='arista0' disabled checked>";
			}elseif($conp['FTO']==0){
				echo"<input type='checkbox' name='test' value='arista0'  disabled>";}
			else{ echo"<input type='checkbox' name='test' value='arista0' required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Arista0NoReloj']."<span>".$conarista1['Nombre']."  <br>  ".$conarista1['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Arista0HoraFinal']."</td>
				</tr>

				<tr><td>Configurar Arista 2:</td>
		<td>";
			if($conp['Arista1']==1){
			echo "<input type='checkbox' name='test' value='arista1' disabled checked>";
			}elseif($conp['Arista0']==0){
				echo"<input type='checkbox' name='test' value='arista1' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='arista1' required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Arista1NoReloj']."<span>".$conarista2['Nombre']."  <br>  ".$conarista2['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Arista1HoraFinal']."</td>
				</tr>

				<tr><td>CM:</td>
		<td>";
			if($conp['CM']==1){
			echo "<input type='checkbox' name='test' value='cm' disabled checked>";
			}elseif($conp['Arista1']==0){
				echo"<input type='checkbox' name='test' value='cm' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cm' required form='formazure41'>"; }
echo "</td><td><p   class='info' title=''>".$conp['CMNoReloj']."<span>".$concm['Nombre']."  <br>  ".$concm['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['CMHoraFinal']."</td>
				</tr>

				<tr><td>Cluster Nic 0:</td>
		<td>";
			if($conp['Cluster0']==1){
			echo "<input type='checkbox' name='test' value='cluster0' disabled checked>";
			}elseif($conp['CM']==0){
				echo"<input type='checkbox' name='test' value='cluster0' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cluster0' required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Cluster0NoReloj']."<span>".$concluster0['Nombre']."  <br>  ".$concluster0['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Cluster0HoraFinal']."</td>
				</tr>

				<tr><td>Cluster Nic 1:</td>
		<td>";
			if($conp['Cluster1']==1){
			echo "<input type='checkbox' name='test' value='cluster1' disabled checked>";
			}elseif($conp['Cluster0']==0){
				echo"<input type='checkbox' name='test' value='cluster1' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cluster1' required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Cluster1NoReloj']."<span>".$concluster1['Nombre']."  <br>  ".$concluster1['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Cluster1HoraFinal']."</td>
				</tr>

		<tr><td>Bootstrap:</td>
		<td>";
			if($conp['Bootstrap']==1){
			echo "<input type='checkbox' name='test' value='bootstrap' disabled checked>";
			}elseif($conp['Cluster1']==0){
				echo"<input type='checkbox' name='test' value='bootstrap' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='bootstrap' required form='formazure41'>"; }
echo "</td><td><p   class='info' title=''>".$conp['BootstrapNoReloj']."<span>".$conbootstrap['Nombre']."  <br>  ".$conbootstrap['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['BootstrapHoraFinal']."</td>
				</tr>

				<tr><td>Rackscan:</td>
		<td>";
			if($conp['Rackscan']==1){
			echo "<input type='checkbox' name='test' value='rackscan' disabled checked>";
			}elseif($conp['Bootstrap']==0){
				echo"<input type='checkbox' name='test' value='rackscan' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='rackscan' required form='formazure41'>"; }
echo "</td><td><p  class='info'  title=''>".$conp['RackscanNoReloj']."<span>".$conrackscan['Nombre']."  <br>  ".$conrackscan['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['RackscanHoraFinal']."</td>
				</tr>

				<tr><td>DEID:</td>
		<td>";
			if($conp['DEID']==1){
			echo "<input type='checkbox' name='test' value='deid' disabled checked>";
			}elseif($conp['Rackscan']==0){
				echo"<input type='checkbox' name='test' value='deid' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='deid' required form='formazure41'>"; }
echo "</td><td><p  class='info' title=''>".$conp['DEIDNoReloj']."<span>".$condeid['Nombre']."  <br>  ".$condeid['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['DEIDHoraFinal']."</td>
				</tr>

				<tr><td>EOTA:</td>
		<td>";
			if($conp['EOTA']==1){
			echo "<input type='checkbox' name='test' value='eota' disabled checked>";
			}elseif($conp['DEID']==0){
				echo"<input type='checkbox' name='test' value='eota' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='eota' required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['EOTANoReloj']."<span>".$coneota['Nombre']."  <br>  ".$coneota['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['EOTAHoraFinal']."</td>
				</tr></table>";


if($conp['EOTA']==0){
	echo '<br><button class="btn1" form="formazure41">Actualizar</button></form>
	</center>';
}else{
echo '
	</form><form action="limpiartr.php" method="post" id="limpiar">
<input type="hidden" value="'.$variable.'" form="limpiar" name="NoSerie">
	<button class="btn1" form="limpiar">Limpiar TR</button></center>
</form>';

}

$query = mysqli_query($enlace, "SELECT * FROM comentarios WHERE NoSerie = '$variable' ORDER BY ID ASC");
echo'<center><h2><hr style="width:95%; margin-top:15px; height:5px;margin-bottom:15px; ">Comentarios</h2></center><br>';
while ($datos=mysqli_fetch_row($query) ) {
$actual = array("<", ">");
$nuevo  = array("&lt ", "&gt");
$comentario = str_replace($actual, $nuevo, $datos[5]);
echo '<center><div class="comentarios">
<div><p title="'.$datos[2].'"><h3>T&eacute;cnico: '.$datos[3].'</h3></p></div><div><h5 style="color:#2574a9;">Fecha: '.$datos[4].'</h5><br>
<p style="white-space: pre-wrap; word-break: break-all;
 word-wrap: break-word;">'.$comentario.'</p>
</div></div><br></center>';
}
echo '
<form action="comentar.php" method="post">
<center><textarea name="comentario" rows="8" style=" resize: none; 	font-size: 20px; width:95%" placeholder="Comentar..." maxlength="255"></textarea></center>
<input type="hidden" value="'.$variable.'" name="NoSerie">
<center><button class="btn1" style="width:95%">Comentar</button></center>
</form>

';

// echo '<a href="http://172.16.3.214/RepairSystem/en/searchRack?rack='.$variable.'" target="_blank">Repair system</a>';


break;
//---------------------------------------------------------------------------------Registro de racks-------------------------------------------------------------------------------
case 2:



echo '
<center>
<div class="grupo-centar">
<div class="caja">
<div class="registro">
<h1>Registrar Rack</h1>
<table class="tablaregistro">
<tr>
	<form class="RegistroR" method="post" action="registrorack.php" id="formregistro">

	<td><input type="text" title="Ejemplo: 2M2XXXXXXX" name="Noserie" placeholder="No. Serie" required form="formregistro" maxlength="10" pattern="2M2[0-9A-Z]{7}" onKeyUp="this.value = this.value.toUpperCase();" ></td>
</tr>
<tr>
	<td><input type="text" title="Ejemplo: 123456789" name="WO" id="WO" placeholder="WO" required form="formregistro" maxlength="9" pattern="[0-9]{9}"></td>
</tr>
<tr>

	<td><input type="text" name="SKU" title="Solo numero y/o letras" placeholder="SKU" required form="formregistro" maxlength="10" pattern="[A-Z0-9]{10}"  onKeyUp="this.value = this.value.toUpperCase();"></td>
</tr>

</table>
<Button class="btn1" form="formregistro" onclick="EventoAlert()"><h1>Registrar</h1></Button>
<input form="formregistro" type="hidden" name="tr" value="'.$tr.'">
	</form>

</center>

</div>
</div>
</div>
';
break;
//----------------------------------------------------------------------------------------Informacion de racks sin sesion---------------------------------------------------------------
case 3:

$inicionr=$con['NoReloj'];
$consinicio=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$inicionr'");
$conpinicio=mysqli_fetch_array($consinicio);
echo "
<center>
	<table class='tablamodal'>
	<caption><h3>".$con['NoSerie']."</h3></caption>
	<tr><th>WO</th><th>SKU</th><th>Modelo</th><th>Registrado por:</th><th>Hora</th></tr>
	<tr>
	<td>".$con['WO']."</td>".
	"<td>". $con['SKU']."</td>".
	"<td>".$con['Modelo']."</td>".
	"<td><p class='info'>". $con['NoReloj']."<span>".$conpinicio['Nombre']." <br> ".$conpinicio['Turno']."&deg; Turno</span></p></td>".
	"<td>". $conp['HoraInicio']."</td></tr>
	";
echo "</table></center>";

echo "<center>
	<table class='tablaprueba'>
	<tr><th>Prueba</th><th>Status</th><th>Tecnico</th><th>Hora</th></tr>

	<form method='post' action='' id='formazure41'>
	<input form='formazure41' type='hidden' name='tr' value='".$tr."'>
		<input type='hidden' name='noserie' value='".$con['NoSerie']."' form='formazure41'>
		<tr><td>FTO:</td>
		<td>";
			if($conp['FTO']==1){
			echo "<input type='checkbox' name='test' value='fto'  disabled checked >";
		}else{
			echo "<input type='checkbox' name='test' value='fto' form='formazure41' disabled required >";}
echo "		</td>
		<td><p class='info' title=''>".$conp['FTONoReloj']."<span>".$confto['Nombre']."  <br>  ".$confto['Turno']."&deg; Turno</span></p></td>
		<td>".$conp['FTOHoraFinal']."</td>
		</tr>

		<tr><td>Configurar Arista 1:</td>
		<td>";
			if($conp['Arista0']==1){
			echo "<input type='checkbox' name='test' value='arista1' disabled checked>";
			}elseif($conp['FTO']==0){
				echo"<input type='checkbox' name='test' value='arista0'  disabled>";}
			else{ echo"<input type='checkbox' name='test' value='arista0' required disabled form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Arista0NoReloj']."<span>".$conarista1['Nombre']."  <br>  ".$conarista1['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Arista0HoraFinal']."</td>
				</tr>

				<tr><td>Configurar Arista 2:</td>
		<td>";
			if($conp['Arista1']==1){
			echo "<input type='checkbox' name='test' value='arista2' disabled checked>";
			}elseif($conp['Arista1']==0){
				echo"<input type='checkbox' name='test' value='arista1' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='arista1' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Arista1NoReloj']."<span>".$conarista2['Nombre']."  <br>  ".$conarista2['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Arista1HoraFinal']."</td>
				</tr>

				<tr><td>CM:</td>
		<td>";
			if($conp['CM']==1){
			echo "<input type='checkbox' name='test' value='cm' disabled checked>";
			}elseif($conp['Arista1']==0){
				echo"<input type='checkbox' name='test' value='cm' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cm' disabled required form='formazure41'>"; }
echo "</td><td><p   class='info' title=''>".$conp['CMNoReloj']."<span>".$concm['Nombre']."  <br>  ".$concm['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['CMHoraFinal']."</td>
				</tr>

				<tr><td>Cluster Nic 0:</td>
		<td>";
			if($conp['Cluster0']==1){
			echo "<input type='checkbox' name='test' value='cluster0' disabled checked>";
			}elseif($conp['Arista2']==0){
				echo"<input type='checkbox' name='test' value='cluster0' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cluster0' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Cluster0NoReloj']."<span>".$concluster0['Nombre']."  <br>  ".$concluster0['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Cluster0HoraFinal']."</td>
				</tr>

				<tr><td>Cluster Nic 1:</td>
		<td>";
			if($conp['Cluster1']==1){
			echo "<input type='checkbox' name='test' value='cluster1' disabled checked>";
			}elseif($conp['ClusterNic0']==0){
				echo"<input type='checkbox' name='test' value='cluster1' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cluster1' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Cluster1NoReloj']."<span>".$concluster1['Nombre']."  <br>  ".$concluster1['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Cluster1HoraFinal']."</td>
				</tr>



		<tr><td>Bootstrap:</td>
		<td>";
			if($conp['Bootstrap']==1){
			echo "<input type='checkbox' name='test' value='bootstrap' disabled checked>";
			}elseif($conp['Cluster1']==0){
				echo"<input type='checkbox' name='test' value='bootstrap' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='bootstrap' disabled required form='formazure41'>"; }
echo "</td><td><p   class='info' title=''>".$conp['BootstrapNoReloj']."<span>".$conbootstrap['Nombre']."  <br>  ".$conbootstrap['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['BootstrapHoraFinal']."</td>
				</tr>

				<tr><td>Rackscan:</td>
		<td>";
			if($conp['Rackscan']==1){
			echo "<input type='checkbox' name='test' value='rackscan' disabled checked>";
			}elseif($conp['Bootstrap']==0){
				echo"<input type='checkbox' name='test' value='rackscan' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='rackscan' disabled required form='formazure41'>"; }
echo "</td><td><p  class='info'  title=''>".$conp['RackscanNoReloj']."<span>".$conrackscan['Nombre']."  <br>  ".$conrackscan['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['RackscanHoraFinal']."</td>
				</tr>

				<tr><td>DEID:</td>
		<td>";
			if($conp['DEID']==1){
			echo "<input type='checkbox' name='test' value='deid' disabled checked>";
			}elseif($conp['Rackscan']==0){
				echo"<input type='checkbox' name='test' value='deid' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='deid' disabled required form='formazure41'>"; }
echo "</td><td><p  class='info' title=''>".$conp['DEIDNoReloj']."<span>".$condeid['Nombre']."  <br>  ".$condeid['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['DEIDHoraFinal']."</td>
				</tr>

				<tr><td>EOTA:</td>
		<td>";
			if($conp['EOTA']==1){
			echo "<input type='checkbox' name='test' value='eota' disabled checked>";
			}elseif($conp['DEID']==0){
				echo"<input type='checkbox' name='test' value='eota' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='eota' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['EOTANoReloj']."<span>".$coneota['Nombre']."  <br>  ".$coneota['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['EOTAHoraFinal']."</td>
				</tr></table>";




	$query = mysqli_query($enlace, "SELECT * FROM comentarios WHERE NoSerie = '$variable' ORDER BY ID ASC");

echo'<br><h2 style="text-align:left;">Comentarios.</h2>';
while ($datos=mysqli_fetch_row($query) ) {
	$actual = array("<", ">");
	$nuevo  = array("&lt ", "&gt");
	$comentario = str_replace($actual, $nuevo, $datos[5]);
echo '<div style="text-align:left" class="comentarios">
<div><p title="'.$datos[2].'"><h3>Técnico: '.$datos[3].'</h3></p></div><div><h5>Fecha: '.$datos[4].'</h5><br>
<pre>'.$comentario.'</pre>
</div></div><br>';
}



break;
case 4:
echo "<center><br><br><br><h1>Debe iniciar sesion para registrar un rack</h1><br><br><br><img src='img/icono.png' WIDTH=178 HEIGHT=180></center>";


break;


}


 ?>
