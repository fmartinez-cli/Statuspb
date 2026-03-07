

<?php
if(!isset($_REQUEST['pb'])){
							header("Location: index.php");
							}else{
include('conexion.php');
$variable= $_GET["pb"];
$tr=$_GET['tr'];
session_start();
$cons=mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie = '$variable'");

$cons2=mysqli_query($enlace, "SELECT * FROM pruebasMicro where NoSerie = '$variable'");




$conp=mysqli_fetch_array($cons2);



$ftonr = $conp['FTONoReloj'];
$quicktestnr = $conp['QuickTestNoReloj'];
$stressnr = $conp['StressNoReloj'];
$mdaasnr = $conp['MDaaSNoReloj'];
$ftinr = $conp['FTINoReloj'];
$bootstrapnr = $conp['BSLNoReloj'];
$ctsnr = $conp['CTSNoReloj'];
$packingnr = $conp['PackingNoReloj'];


$consfto=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$ftonr'");
$confto=mysqli_fetch_array($consfto);
$consquicktest=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$quicktestnr'");
$conquicktest=mysqli_fetch_array($consquicktest);
$consstress=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$stressnr'");
$constress=mysqli_fetch_array($consstress);
$consmdaas=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$mdaasnr'");
$conmdass=mysqli_fetch_array($consmdaas);
$consfti=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$ftinr'");
$confti=mysqli_fetch_array($consfti);
$consbootstrap=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$bootstrapnr'");
$conbootstrap=mysqli_fetch_array($consbootstrap);
$conscts=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$ctsnr'");
$concts=mysqli_fetch_array($conscts);
$conspacking=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$packingnr'");
$conpacking=mysqli_fetch_array($conspacking);

$status2_selected = $conp['Status2'];


// Se obtiene la información de los racks para el No. de Serie recibido mediante GET
$con=mysqli_fetch_array($cons);

// Se verifica si hay una sesión activa
if(isset($_SESSION['Nombre'])){

    // Si no hay sesión activa, se verifica si hay información de racks para el No. de Serie recibido
    if($con!=''){
        $modal=1;  //con sesion y con rack
    }else if($con==''){
        $modal=2; //con sesion y sin rack
    }

}else{
    // si hay un registro de rack en la tabla
    if($con!=''){
        $modal=3; // mostrar modal de información sin sesión y con rack
    }
    // si no hay registro de rack en la tabla
    elseif($con=='') {
        $modal=4; // mostrar modal de información sin sesión y sin rack
    }
}




switch ($modal) {
case 1:
	//---------------------------------------------------------------------------------------------Microsoft 8.2 con sesion---------------------------------------------------------------
	
	if(isset($con)&&$con['Modelo']=="Microsoft 8.2"){
	
	if($conp['FTO']==0){
	
	echo '
	<div class="centrar">
		<details style="background-color: #4f4f4f;">
	<summary>Cambiar Modelo</summary>
	
	<form name="cambiarmodelo" id="cambiarmodelo" action="CambioModelo.php" method="post">
	
	<Select name="modelo" class="Select2" required >
	<option  value="" disabled selected>Modelo</option>
	<option  value="Microsoft 8.2">Microsoft 8.2</option>
	<option  value="NPI">NPI</option>
	<option  value="Microsoft 8.3">Microsoft 8.3</option>
	</Select><br>
	<button class="btn1" form="cambiarmodelo" >Cambiar</button>
	<input type="hidden" value="'.$variable.'" name="NoSerie">
	<input type="hidden" value="'.$con['Modelo'].'" name = "modeloactual">
	<input type="hidden" value="LVO" name="Area">
	</form></details></div>
	';
	}else{
	echo '';
	}
	
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
	
	//-----------------------------------------------------Microsoft 8.2 con Sesion-------------------------------------------------------------------------------------------------------------------
	echo "<center>
	<table class='tablaprueba'>
	<tr><th>Prueba</th><th>Status</th><th>Status2</th><th>Tecnico</th><th>Hora</th></tr>
	
	<form method='post' action='actualizarmicrosoft.php' id='formmicrosoft'>
    <input form='formmicrosoft' type='hidden' name='tr' value='".$tr."'>
        <input type='hidden' name='noserie' value='".$con['NoSerie']."' form='formmicrosoft'>
        <tr><td>FTO:</td>
        <td>";
		if ($conp['FTO'] == 1) {
			// Mostrar la casilla de verificación marcada y deshabilitada
			echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo' name='test' value='fto' disabled checked><label for='squaredTwo'></label></div>";
			
			// Mostrar la celda con el color verde
			echo "<td style='background-color: green;'>FTO Terminado</td>";
		} else {
			// Mostrar la casilla de verificación
			echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo' name='test' value='fto' form='formmicrosoft'><label for='squaredTwo'></label></div>";
			
			// Mostrar el select en la celda
			echo "<td><select name='ftostatus2' class='selectpicker' form='formmicrosoft'>";
			echo "<option value='Incompleto'>Incompleto</option>";
			echo "<option value='Pasa'>Pasa</option>";
			echo "<option value='Falla'>Falla</option>";
			echo "</select>
</td>

<td><p class='info' title=''>".$conp['FTONoReloj']."<span>".$confto['Nombre']."  <br>  ".$confto['Turno']."&deg; Turno</span></p></td>
<td>".$conp['FTOHoraFinal']."</td>
</tr>

<td>Quick Test:</td>
<td>";
    if ($conp['QuickTest'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo2' name='test' value='quicktest' disabled checked><label for='squaredTwo2'></label></div>";
    } elseif ($conp['FTO'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo2' name='test' value='quicktest' disabled><label for='squaredTwo2'></label></div>";
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo2' name='test' value='quicktest' form='formmicrosoft'><label for='squaredTwo2'></label></div>";
    }
echo "</td>
<td data-status2>
    <select name='status2_mdaas' id='status2_mdaas' form='formmicrosoft'>
		<option value='Waiting'>Waiting</option>
		<option value='Running'>Running</option>
        <option value='Fail'>Fail</option>
    </select>
</td>
<td><p class='info' title=''>".$conp['QuickTestNoReloj']."<span>".$conquicktest['Nombre']."  <br>  ".$conquicktest['Turno']."&deg; Turno</span></p></td>
<td>".$conp['QuickTestHoraFinal']."</td>
</tr>

<td>Stress:</td>
<td>";
	if ($conp['Stress'] == 1) {
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo3' name='test' value='stress' disabled checked><label for='squaredTwo3'></label></div>";
	} elseif ($conp['QuickTest'] == 0) {
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo3' name='test' value='stress' disabled><label for='squaredTwo3'></label></div>";
	} else {
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo3' name='test' value='stress'  form='formmicrosoft'><label for='squaredTwo3'></label></div>";
	}
echo "</td>
<td>
	<select name='status2_stress' form='formmicrosoft'>
		<option value='Waiting'>Waiting</option>
		<option value='Running'>Running</option>
		<option value='Fail'>Fail</option>
	</select>
</td>
<td><p class='info' title=''>".$conp['StressNoReloj']."<span>".$constress['Nombre']."  <br>  ".$constress['Turno']."&deg; Turno</span></p></td>
<td>".$conp['StressHoraFinal']."</td>
</tr>

<td>MDaaS:</td>
<td>";
	if ($conp['MDaaS'] == 1) {
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo4' name='test' value='mdaas' disabled checked><label for='squaredTwo4'></label></div>";
	} elseif ($conp['Stress'] == 0) {
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo4' name='test' value='mdaas' disabled><label for='squaredTwo4'></label></div>";
	} else {
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo4' name='test' value='mdaas' form='formmicrosoft'><label for='squaredTwo4'></label></div>";
	}
echo "</td>
<td>
	<select name='status2_mdaas' form='formmicrosoft'>
		<option value='Running'>Running</option>
		<option value='Waiting'>Waiting</option>
		<option value='Fail'>Fail</option>
	</select>
</td>
<td><p class='info' title=''>".$conp['MDaaSNoReloj']."<span>".$conmdaas['Nombre']."  <br>  ".$conmdaas['Turno']."&deg; Turno</span></p></td>
<td>".$conp['MDaaSHoraFinal']."</td>
</tr>

<tr><td>RackTest:</td>
<td>";
	if($conp['RackTest']==1){
	echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo5'  name='test' value='racktest' disabled checked><label for='squaredTwo5'></label></div>";
	}elseif($conp['MDaaS']==0){
		echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo5'  name='test' value='racktest' disabled><label for='squaredTwo5'></label></div>";}
	else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo5'  name='test' value='racktest' form='formmicrosoft'><label for='squaredTwo5'></label></div>"; }
echo "</td>
<td>
	<select name='status2_racktest' form='formmicrosoft'>
		<option value='Running'>Running</option>
		<option value='Waiting'>Waiting</option>
		<option value='Fail'>Fail</option>
	</select>
</td>
<td><p class='info' title=''>".$conp['RackTestNoReloj']."<span>".$conracktest['Nombre']."  <br>  ".$conracktest['Turno']."&deg; Turno</span></p></td>
<td>".$conp['RackTestHoraFinal']."</td>
</tr>

<tr><td>FTI:</td>
<td>";
	if($conp['FTI']==1){
	echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo6'  name='test' value='fti' disabled checked><label for='squaredTwo6'></label></div>";
	}elseif($conp['RackTest']==0){
		echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo6'  name='test' value='fti' disabled><label for='squaredTwo6'></label></div>";}
	else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo6'  name='test' value='fti' form='formmicrosoft'><label for='squaredTwo6'></label></div>"; }
echo "</td>
<td>
	<select name='status2_fti' form='formmicrosoft'>
		<option value='Running'>Running</option>
		<option value='Waiting'>Waiting</option>
		<option value='Fail'>Fail</option>
	</select>
</td>
<td><p class='info' title=''>".$conp['FTINoReloj']."<span>".$confti['Nombre']."  <br>  ".$confti['Turno']."&deg; Turno</span></p></td>
<td>".$conp['FTIHoraFinal']."</td>
</tr>

<tr><td>Bootstrap:</td>
<td>";
	if($conp['BSL']==1){
	echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo9'  name='test' value='bootstrap' disabled checked><label for='squaredTwo9'></label></div>";
}elseif($conp['FTI']==0){
echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo9'  name='test' value='bootstrap' disabled><label for='squaredTwo9'></label></div>";}
else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo9'  name='test' value='bootstrap' form='formmicrosoft'><label for='squaredTwo9'></label></div>"; }
echo "</td>
<td>
<select name='status2_bootstrap' form='formmicrosoft'>
<option value='Running'>Running</option>
<option value='Waiting'>Waiting</option>
<option value='Fail'>Fail</option>
</select>
</td>
<td><p class='info' title=''>".$conp['BSLNoReloj']."<span>".$conbootstrap['Nombre']." <br> ".$conbootstrap['Turno']."° Turno</span></p></td>
<td>".$conp['BSLHoraFinal']."</td>

</tr>
<tr><td>CTS:</td>
    <td>";
        if($conp['CTS']==1){
        echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo7'  name='test' value='cts' disabled checked><label for='squaredTwo7'></label></div>";
        }elseif($conp['BSL']==0){
            echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo7'  name='test' value='cts' disabled><label for='squaredTwo7'></label></div>";}
        else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo7'  name='test' value='cts' form='formmicrosoft'><label for='squaredTwo7'></label></div>"; }
    echo "</td>
    <td>
        <select name='status2_cts' form='formmicrosoft'>
            <option value='Running'>Running</option>
            <option value='Waiting'>Waiting</option>
            <option value='Fail'>Fail</option>
        </select>
    </td>
    <td><p class='info' title=''>".$conp['CTSNoReloj']."<span>".$concts['Nombre']."  <br>  ".$concts['Turno']."&deg; Turno</span></p></td>
    <td>".$conp['CTSHoraFinal']."</td>
</tr>
<tr><td>Packing:</td>
    <td>";
        if($conp['Packing']==1){
        echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo8'  name='test' value='packing' disabled checked><label for='squaredTwo8'></label></div>";
        }elseif($conp['CTS']==0){
            echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo8'  name='test' value='packing' disabled><label for='squaredTwo8'></label></div>";}
        else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo8'  name='test' value='packing' form='formmicrosoft'><label for='squaredTwo8'></label></div>"; }
		echo "</td>
		<td>
		<select name='status2_packing' form='formmicrosoft'>
		<option value='Running'>Running</option>
		<option value='Waiting'>Waiting</option>
		<option value='Fail'>Fail</option>
		</select>
		</td>
		<td><p class='info' title=''>".$conp['PackingNoReloj']."<span>".$conpacking['Nombre']." <br> ".$conpacking['Turno']."° Turno</span></p></td>
		<td>".$conp['PackingHoraFinal']."</td>
		
		</tr>
			

		</tr></table>";


if($conp['Packing']==0){
echo '<br><button class="btn1" style="width:95%;" form="formmicrosoft">Actualizar</button></form>
</center>';
}else{
echo '
</form><form action="limpiartr.php" method="post" id="limpiar">
<input type="hidden" value="'.$variable.'" form="limpiar" name="NoSerie">
<button class="btn1" style="width:95%;" form="limpiar">Limpiar TR</button></center>
</form>';

}



echo '
<form action="comentar.php" method="post">
<center><textarea name="comentario" rows="8" style=" resize: none; width:95%" placeholder="Comentar..." maxlength="255"></textarea></center>
<input type="hidden" value="'.$variable.'" name="NoSerie">
<center><button class="btn1" style="width:95%">Comentar</button></center>
</form>
</form>
';

}//******************************************************************************************************************************fin elseif microsoft
break;
//---------------------------------------------------------------------------------Registro de racks-------------------------------------------------------------------------------


case 2:

echo '
<center>
<div class="grupo-centar">
<div class="caja">
<div class="registro">
<h1 style="color:white;">Registrar Rack</h1>
<table class="tablaregistro">
<tr>
<form class="RegistroR" method="post" action="registrorack.php" id="formregistro">

<td><input type="text" title="Ejemplo: RXXXXXXXXXXXXXXF" name="Noserie" placeholder="No. Serie" required form="formregistro" maxlength="16" pattern="R[0-9a-zA-Z]{15}"></td>
</tr>
<tr>
<td><input type="text" title="Ejemplo: 123456789" name="WO" id="WO" placeholder="WO" required form="formregistro" maxlength="9" pattern="[0-9]{9}"></td>
</tr>
<tr>

<td><input type="text" name="SKU" title="Solo numero y/o letras" placeholder="SKU" required form="formregistro" maxlength="10" pattern="[A-Za-z0-9]{6,10}"  ></td>
</tr>
<tr>
<td><Select name="Modelo" class="Selectl" required form="formregistro">
<option  value="" disabled selected>Modelo</option>
<option  value="Microsoft 8.2">Microsoft 8.2</option>
<option  value="NPI">NPI</option>
<option  value="Microsoft 8.3">Microsoft 8.3</option>
</Select></td>
</tr>
</table>
<Button class="btn1" form="formregistro"><h1>Registrar</h1></Button>
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

if($con['Modelo']=="Microsoft 8.2"){
$inicionr=$con['NoReloj'];
$consinicio=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$inicionr'");
$conpinicio=mysqli_fetch_array($consinicio);
echo "
<center>
<table class='tablamodal'>
<caption><h1>".$con['NoSerie']."</h1></caption>
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

<form action='funcionesprueba.php method='post'>

	<tr><td>FTO:</td>
	<td>";
		if($conp['FTO']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo'  name='FTO' value='1' disabled checked><label for='squaredOne'></label></div>";
	}else{
		echo"
	<div class='squaredTwo'><input type='checkbox' id='squaredTwo'  name='FTO' value='1'  disabled><label for='squaredOne'></label></div>";}
echo "		</td>
	<td><p class='info' title=''>".$conp['FTONoReloj']."<span>".$confto['Nombre']."  <br>  ".$confto['Turno']."&deg; Turno</span></p></td>
	<td>".$conp['FTOHoraFinal']."</td>
	</tr>

	<tr><td>Quick Test:</td>
	<td>";
		if($conp['QuickTest']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo2'  name='test' value='quicktest' disabled checked><label for='squaredTwo2'></label></div>";
		}elseif($conp['fto']==0){
			echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo2'  name='test' value='quicktest'  disabled><label for='squaredTwo2'></label></div>";}
		else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo2'  name='test' value='quicktest' required form='formmicrosoft'><label for='squaredTwo2'></label></div>"; }
echo "</td><td><p class='info' title=''>".$conp['QuickTestNoReloj']."<span>".$conquicktest['Nombre']."  <br>  ".$conquicktest['Turno']."&deg; Turno</span></p></td>
			<td>".$conp['QuickTestHoraFinal']."</td>
			</tr>

			<tr><td>Stress:</td>
	<td>";
	if($conp['Stress']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo3'  name='test' value='stress' disabled checked><label for='squaredTwo3'></label></div>";
		}elseif($conp['quicktest']==0){
			echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo3'  name='test' value='stress' disabled><label for='squaredTwo3'></label></div>";}
		else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo3'  name='test' value='stress' required form='formmicrosoft'><label for='squaredTwo3'></label></div>"; }
echo "</td><td><p class='info' title=''>".$conp['StressNoReloj']."<span>".$constress['Nombre']."  <br>  ".$constress['Turno']."&deg; Turno</span></p></td>
			<td>".$conp['StressHoraFinal']."</td>
			</tr>

			<tr><td>MDaaS:</td>
	<td>";
		if($conp['MDaaS']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo4'  name='test' value='mdaas' disabled checked><label for='squaredTwo4'></label></div>";
		}elseif($conp['stress']==0){
			echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo4'  name='test' value='mdaas' disabled><label for='squaredTwo4'></label></div>";}
		else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo4'  name='test' value='mdaas' required form='formmicrosoft'><label for='squaredTwo4'></label></div>"; }
echo "</td><td><p class='info' title=''>".$conp['MDaaSNoReloj']."<span>".$conmdaas['Nombre']."  <br>  ".$conmdaas['Turno']."&deg; Turno</span></p></td>
			<td>".$conp['MDaaSHoraFinal']."</td>
			</tr>

			<tr><td>RackTest:</td>
	<td>";

		if($conp['RackTest']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo5'  name='test' value='racktest' disabled checked><label for='squaredTwo5'></label></div>";
		}elseif($conp['mdaas']==0){
			echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo5'  name='test' value='racktest' disabled><label for='squaredTwo5'></label></div>";}
		else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo5'  name='test' value='racktest' required form='formmicrosoft'><label for='squaredTwo5'></label></div>"; }
echo "</td><td><p class='info' title=''>".$conp['RackTestNoReloj']."<span>".$conracktest['Nombre']."  <br>  ".$conracktest['Turno']."&deg; Turno</span></p></td>
			<td>".$conp['RackTestHoraFinal']."</td>
			</tr>

			<tr><td>FTI:</td>
	<td>";
		if($conp['FTI']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo6'  name='test' value='fti' disabled checked><label for='squaredTwo6'></label></div>";
		}elseif($conp['Cluster']==0){
			echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo6'  name='test' value='fti' disabled><label for='squaredTwo6'></label></div>";}
		else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo6'  name='test' value='fti' required form='formmicrosoft'><label for='squaredTwo6'></label></div>"; }
echo "</td><td><p   class='info' title=''>".$conp['FTINoReloj']."<span>".$confti['Nombre']."  <br>  ".$confti['Turno']."&deg; Turno</span></p></td>
			<td>".$conp['FTIHoraFinal']."</td>
			</tr>

	<tr><td>Bootstrap:</td>
	<td>";
	if($conp['BSL']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo9'  name='test' value='bootstrap' disabled checked><label for='squaredTwo9'></label></div>";
		}elseif($conp['fti']==0){
			echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo9'  name='test' value='bootstrap' disabled><label for='squaredTwo9'></label></div>";}
		else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo9'  name='test' value='bootstrap' required form='formmicrosoft'><label for='squaredTwo9'></label></div>"; }
echo "</td><td><p  class='info' title=''>".$conp['BSLNoReloj']."<span>".$conbootstrap['Nombre']."  <br>  ".$conbootstrap['Turno']."&deg; Turno</span></p></td>
			<td>".$conp['BSLHoraFinal']."</td>
			</tr>

			<tr><td>CTS:</td>
	<td>";
		if($conp['CTS']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo7'  name='test' value='cts' disabled checked><label for='squaredTwo7'></label></div>";
		}elseif($conp['fti']==0){
			echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo7'  name='test' value='cts' disabled><label for='squaredTwo7'></label></div>";}
		else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo7'  name='test' value='cts' required form='formmicrosoft'><label for='squaredTwo7'></label></div>"; }
echo "</td><td><p   class='info' title=''>".$conp['CTSNoReloj']."<span>".$concts['Nombre']."  <br>  ".$concts['Turno']."&deg; Turno</span></p></td>
			<td>".$conp['CTSHoraFinal']."</td>
			</tr>

			<tr><td>Packing:</td>
	<td>";
		if($conp['Packing']==1){
		echo "<div class='squaredTwo'><input type='checkbox' id='squaredTwo8'  name='test' value='packing' disabled checked><label for='squaredTwo8'></label></div>";
		}elseif($conp['bootstrap']==0){
			echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo8'  name='test' value='packing' disabled><label for='squaredTwo8'></label></div>";}
		else{ echo"<div class='squaredTwo'><input type='checkbox' id='squaredTwo8'  name='test' value='packing' required form='formmicrosoft'><label for='squaredTwo8'></label></div>"; }
echo "</td><td><p  class='info'  title=''>".$conp['PackingNoReloj']."<span>".$conpacking['Nombre']."  <br>  ".$conpacking['Turno']."&deg; Turno</span></p></td>
			<td>".$conp['PackingHoraFinal']."</td>
			

		</tr></table>
</center>";
$query = mysqli_query($enlace, "SELECT * FROM comentarios WHERE NoSerie = '$variable' ORDER BY ID ASC");
echo'<h1><br><br><br></h1>';
while ($datos=mysqli_fetch_row($query) ) {
$actual = array("<", ">");
$nuevo  = array("&lt ", "&gt");
$comentario = str_replace($actual, $nuevo, $datos[5]);
echo '<div class="comentarios">
<div><p title="'.$datos[2].'"><h3>T&eacute;cnico: '.$datos[3].'</h3></p></div><div><h5 style="color:#2574a9;">Fecha: '.$datos[4].'</h5><br>
<p style="white-space: pre-wrap; word-break: break-all;
 word-wrap: break-word;">'.$comentario.'</p>
</div></div><br>';
}
}


break;
case 4:
echo "<center><br><br><br><h1>Debe iniciar sesion para registrar un rack</h1><br><br><br><img src='../img/icono.png' WIDTH=178 HEIGHT=180></center>";


break;


}
}

?>
