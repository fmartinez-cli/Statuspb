
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
$racktestnr = $conp['RackTestNoReloj'];
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
$conmdaas=mysqli_fetch_array($consmdaas);
$consracktest=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$racktestnr'");
$conracktest=mysqli_fetch_array($consracktest);
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
	//---------------------------------------------------------------------------------------------Microsoft 8.2 con sesion CAMBIO DE MODELO---------------------------------------------------------------
	
	if (isset($con) && ($con['Modelo'] == "Microsoft 8.2" || $con['Modelo'] == "Microsoft 8.3" || $con['Modelo'] == "NPI"))
{
	
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
	<input type="hidden" value="microsoft" name="Area">
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
	
	//-----------------------------------------------------Microsoft 8.2 con Sesion PRUEBAS SIN CAMBIO DE MODELO-------------------------------------------------------------------------------------------------------------------
	echo "<center>
    <table class='tablaprueba'>
    <tr><th>Prueba</th><th>Status2</th><th>Status</th><th>Tecnico</th><th>Hora</th></tr>
    
    <form method='post' action='actualizarmicrosoft.php' id='formmicrosoft'>
    <input form='formmicrosoft' type='hidden' name='tr' value='".$tr."'>
    <input type='hidden' name='noserie' value='".$con['NoSerie']."' form='formmicrosoft'>
    <td>FTO:</td>
    <td>";
    # Si la prueba de QuickTest se ha completado, muestra una checkbox marcada y desactivada
    if ($conp['FTO'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo' name='test' value='fto' disabled checked><label for='squaredTwo'></label></div>";
    } else {
        // Si FTOHoraInicial es NULL, deshabilita el checkbox
        $checkboxDisabled = is_null($conp['FTOHoraInicial']) ? 'disabled' : '';
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo' name='test' value='fto' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo'></label></div>";
    }
    echo "</td>";

    echo "<td data-status2>";
    switch ($conp['FTO']) {
        case 1:
            // Si la prueba de FTO se ha completado, no se muestra ningún contenido en la columna de Status2
            break;
        case 0:
            // Si la prueba de FTO no se ha completado
            if (is_null($conp['FTOHoraInicial'])) {
                // Si FTOHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                $HoraInicial = date('Y-m-d H:i:s');
                echo "<select name='status2_fto' id='status2_fto' form='formmicrosoft' required>
                    <option value='' disabled selected>Seleccionar</option>
                    <option value='Waiting'>Waiting</option>
                    <option value='Running'>Running</option>
                    <option value='Fail'>Fail</option>
                    <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                </select>";
            } else {
                $HoraInicial = date('Y-m-d H:i:s');
                // Si FTOHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                echo "<select name='status2_fto' id='status2_fto' form='formmicrosoft'>
                    <option value=''>Seleccionar</option>
                    <option value='Waiting'>Waiting</option>
                    <option value='Running'>Running</option>
                    <option value='Fail'>Fail</option>
                    <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                </select>";
            }
            break;
    }
    echo "</td>";

    echo "<td><p class='info' title=''>".$conp['FTONoReloj']."<span>".$confto['Nombre']."  <br>  ".$confto['Turno']."&deg; Turno</span></p></td>";
    echo "<td>".$conp['FTOHoraStatus']."</td>";
    echo "</tr>


        
        <!-- ###############################   Fila de la prueba  de QuickTest    ################################## -->

        <td>QuickTest:</td>
        <td>";
        # Si la prueba de QuickTest se ha completado, muestra una checkbox marcada y desactivada
        if ($conp['QuickTest'] == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo2' name='test' value='quicktest' disabled checked><label for='squaredTwo2'></label></div>";
        } else {
            # Si QuickTestHoraInicial es NULL, deshabilita el checkbox
            $checkboxDisabled = is_null($conp['QuickTestHoraInicial']) ? 'disabled' : '';
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo2' name='test' value='quicktest' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo2'></label></div>";
        }
        echo "</td>";

        echo "<td data-status2>";
        switch ($conp['QuickTest']) {
            case 1:
                if ($conp['FTO'] == 1 && !$conp['QuickTest']) {
                    // Si la prueba de FTO se ha completado y la prueba de QuickTest no se ha completado, no se muestra ningún elemento select
                }
                break;
            case 2:
                if ($conp['QuickTest'] == 1) {
                    // Si la prueba de QuickTest se ha completado, no se muestra ningún contenido en la columna de Status2
                }
                break;
            case 0:
                if ($conp['FTO'] == 0 && $conp['QuickTest'] == 0) {
                    // Si la prueba de FTO no se ha completado y la prueba de QuickTest no se ha completado, no se muestra ningún elemento select
                } elseif ($conp['QuickTest'] == 0 && is_null($conp['QuickTestHoraInicial'])) {
                    $HoraInicial = date('Y-m-d H:i:s');
                    // Si QuickTestHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                    echo "<select name='status2_quicktest' id='status2_quicktest' form='formmicrosoft' required>
                        <option value='' disabled selected>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                } else {
                    // Si QuickTestHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                    echo "<select name='status2_quicktest' id='status2_quicktest' form='formmicrosoft'>
                        <option value=''>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                }
                break;
        }
        echo "</td>
        <td><p class='info' title=''>".$conp['QuickTestNoReloj']."<span>".$conquicktest['Nombre']."  <br>  ".$conquicktest['Turno']."&deg; Turno</span></p></td>
        <td>".$conp['QuickTestHoraStatus']."</td>
    </tr>


<!-- ###############################   Fila de la prueba  de Stress    ################################## -->

<td>Stress:</td>
        <td>";
        # Si la prueba de Stress se ha completado, muestra una checkbox marcada y desactivada
        if ($conp['Stress'] == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo3' name='test' value='stress' disabled checked><label for='squaredTwo3'></label></div>";
        } else {
            # Si StressHoraInicial es NULL, deshabilita el checkbox
            $checkboxDisabled = is_null($conp['StressHoraInicial']) ? 'disabled' : '';
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo3' name='test' value='stress' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo3'></label></div>";
        }
        echo "</td>";

        echo "<td data-status2>";
        switch ($conp['Stress']) {
            case 1:
                if ($conp['QuickTest'] == 1 && !$conp['Stress']) {
                    // Si la prueba de QuickTest se ha completado y la prueba de Stress no se ha completado, no se muestra ningún elemento select
                }
                break;
            case 2:
                if ($conp['Stress'] == 1) {
                    // Si la prueba de Stress se ha completado, no se muestra ningún contenido en la columna de Status2
                }
                break;
            case 0:
                if ($conp['QuickTest'] == 0 && $conp['Stress'] == 0) {
                    // Si la prueba de QuickTest no se ha completado y la prueba de Stress no se ha completado, no se muestra ningún elemento select
                } elseif ($conp['Stress'] == 0 && is_null($conp['StressHoraInicial'])) {
                    $HoraInicial = date('Y-m-d H:i:s');
                    // Si StressHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                    echo "<select name='status2_stress' id='status2_stress' form='formmicrosoft' required>
                        <option value='' disabled selected>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                } else {
                    // Si StressHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                    echo "<select name='status2_stress' id='status2_stress' form='formmicrosoft'>
                        <option value=''>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                }
                break;
        }
echo "</td>
<td><p class='info' title=''>".$conp['StressNoReloj']."<span>".$constress['Nombre']."  <br>  ".$constress['Turno']."&deg; Turno</span></p></td>
<td>".$conp['StressHoraStatus']."</td>
</tr>

<!-- ###############################   Fila de la prueba  de MDaaS    ################################## -->

<td>MDaaS:</td>
<td>";
        # Si la prueba de MDaaS se ha completado, muestra una checkbox marcada y desactivada
        if ($conp['MDaaS'] == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo4' name='test' value='mdaas' disabled checked><label for='squaredTwo4'></label></div>";
        } else {
            # Si MDaaSHoraInicial es NULL, deshabilita el checkbox
            $checkboxDisabled = is_null($conp['MDaaSHoraInicial']) ? 'disabled' : '';
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo4' name='test' value='mdaas' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo4'></label></div>";
        }
        echo "</td>";

        echo "<td data-status2>";
        switch ($conp['MDaaS']) {
            case 1:
                if ($conp['Stress'] == 1 && !$conp['MDaaS']) {
                    // Si la prueba de Stess se ha completado y la prueba de MDaaS no se ha completado, no se muestra ningún elemento select
                }
                break;
            case 2:
                if ($conp['MDaaS'] == 1) {
                    // Si la prueba de MDaaS se ha completado, no se muestra ningún contenido en la columna de Status2
                }
                break;
            case 0:
                if ($conp['Stress'] == 0 && $conp['MDaaS'] == 0) {
                    // Si la prueba de Stress no se ha completado y la prueba de MDaaS no se ha completado, no se muestra ningún elemento select
                } elseif ($conp['MDaaS'] == 0 && is_null($conp['MDaaSHoraInicial'])) {
                    $HoraInicial = date('Y-m-d H:i:s');
                    // Si MDaaSHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                    echo "<select name='status2_mdaas' id='status2_mdaas' form='formmicrosoft' required>
                        <option value='' disabled selected>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                } else {
                    // Si MDaaSHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                    echo "<select name='status2_mdaas' id='status2_mdaas' form='formmicrosoft'>
                        <option value=''>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                }
                break;
        }
echo "</td>
<td><p class='info' title=''>".$conp['MDaaSNoReloj']."<span>".$conmdaas['Nombre']."  <br>  ".$conmdaas['Turno']."&deg; Turno</span></p></td>
<td>".$conp['MDaaSHoraStatus']."</td>
</tr>


<!-- ###############################   Fila de la prueba  de RackTest   ################################## -->

<td>RackTest:</td>
<td>";
        # Si la prueba de RackTest se ha completado, muestra una checkbox marcada y desactivada
        if ($conp['RackTest'] == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo5' name='test' value='racktest' disabled checked><label for='squaredTwo5'></label></div>";
        } else {
            # Si RackTestHoraInicial es NULL, deshabilita el checkbox
            $checkboxDisabled = is_null($conp['RackTestHoraInicial']) ? 'disabled' : '';
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo5' name='test' value='racktest' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo5'></label></div>";
        }
        echo "</td>";

        echo "<td data-status2>";
        switch ($conp['RackTest']) {
            case 1:
                if ($conp['MDaaS'] == 1 && !$conp['RackTest']) {
                    // Si la prueba de MDaaS se ha completado y la prueba de RackTest no se ha completado, no se muestra ningún elemento select
                }
                break;
            case 2:
                if ($conp['RackTest'] == 1) {
                    // Si la prueba de RackTest se ha completado, no se muestra ningún contenido en la columna de Status2
                }
                break;
            case 0:
                if ($conp['MDaaS'] == 0 && $conp['RackTest'] == 0) {
                    // Si la prueba de MDaaS no se ha completado y la prueba de RackTest no se ha completado, no se muestra ningún elemento select
                } elseif ($conp['RackTest'] == 0 && is_null($conp['RackTestHoraInicial'])) {
                    $HoraInicial = date('Y-m-d H:i:s');
                    // Si RackTestHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                    echo "<select name='status2_racktest' id='status2_racktest' form='formmicrosoft' required>
                        <option value='' disabled selected>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                } else {
                    // Si RackTestHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                    echo "<select name='status2_racktest' id='status2_racktest' form='formmicrosoft'>
                        <option value=''>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                }
                break;
        }
echo "</td>
<td><p class='info' title=''>".$conp['RackTestNoReloj']."<span>".$conracktest['Nombre']."  <br>  ".$conracktest['Turno']."&deg; Turno</span></p></td>
<td>".$conp['RackTestHoraStatus']."</td>
</tr>

<!-- ###############################   Fila de la prueba  de FTI   ################################## -->

<td>FTI:</td>
<td>";
        # Si la prueba de FTI se ha completado, muestra una checkbox marcada y desactivada
        if ($conp['FTI'] == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo6' name='test' value='fti' disabled checked><label for='squaredTwo6'></label></div>";
        } else {
            # Si FTIHoraInicial es NULL, deshabilita el checkbox
            $checkboxDisabled = is_null($conp['FTIHoraInicial']) ? 'disabled' : '';
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo6' name='test' value='fti' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo6'></label></div>";
        }
        echo "</td>";

        echo "<td data-status2>";
        switch ($conp['FTI']) {
            case 1:
                if ($conp['RackTest'] == 1 && !$conp['FTI']) {
                    // Si la prueba de RackTest se ha completado y la prueba de FTI no se ha completado, no se muestra ningún elemento select
                }
                break;
            case 2:
                if ($conp['FTI'] == 1) {
                    // Si la prueba de RackTest se ha completado, no se muestra ningún contenido en la columna de Status2
                }
                break;
            case 0:
                if ($conp['RackTest'] == 0 && $conp['FTI'] == 0) {
                    // Si la prueba de RackTest no se ha completado y la prueba de FTI no se ha completado, no se muestra ningún elemento select
                } elseif ($conp['FTI'] == 0 && is_null($conp['FTIHoraInicial'])) {
                    $HoraInicial = date('Y-m-d H:i:s');
                    // Si FTIHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                    echo "<select name='status2_fti' id='status2_fti' form='formmicrosoft' required>
                        <option value='' disabled selected>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                } else {
                    // Si FTIHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                    echo "<select name='status2_fti' id='status2_fti' form='formmicrosoft'>
                        <option value=''>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                }
                break;
        }
echo "</td>

<td><p class='info' title=''>".$conp['FTINoReloj']."<span>".$confti['Nombre']."  <br>  ".$confti['Turno']."&deg; Turno</span></p></td>
<td>".$conp['FTIHoraStatus']."</td>
</tr>

<!-- ###############################   Fila de la prueba  de BSL   ################################## -->

<td>BSL:</td>
<td>";
        # Si la prueba de BSL se ha completado, muestra una checkbox marcada y desactivada
        if ($conp['BSL'] == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo7' name='test' value='bsl' disabled checked><label for='squaredTwo7'></label></div>";
        } else {
            # Si BSLHoraInicial es NULL, deshabilita el checkbox
            $checkboxDisabled = is_null($conp['BSLHoraInicial']) ? 'disabled' : '';
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo7' name='test' value='bsl' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo7'></label></div>";
        }
        echo "</td>";

        echo "<td data-status2>";
        switch ($conp['BSL']) {
            case 1:
                if ($conp['FTI'] == 1 && !$conp['BSL']) {
                    // Si la prueba de FTI se ha completado y la prueba de BSL no se ha completado, no se muestra ningún elemento select
                }
                break;
            case 2:
                if ($conp['BSL'] == 1) {
                    // Si la prueba de FTI se ha completado, no se muestra ningún contenido en la columna de Status2
                }
                break;
            case 0:
                if ($conp['FTI'] == 0 && $conp['BSL'] == 0) {
                    // Si la prueba de FTI no se ha completado y la prueba de BSL no se ha completado, no se muestra ningún elemento select
                } elseif ($conp['BSL'] == 0 && is_null($conp['BSLHoraInicial'])) {
                    $HoraInicial = date('Y-m-d H:i:s');
                    // Si BSLHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                    echo "<select name='status2_bootstrap' id='status2_bootstrap' form='formmicrosoft' required>
                        <option value='' disabled selected>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                } else {
                    // Si BSLHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                    echo "<select name='status2_bootstrap' id='status2_bootstrap' form='formmicrosoft'>
                        <option value=''>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                }
                break;
        }
        echo "</td>

        <td><p class='info' title=''>".$conp['BSLNoReloj']."<span>".$conbootstrap['Nombre']."  <br>  ".$conbootstrap['Turno']."&deg; Turno</span></p></td>
        <td>".$conp['BSLHoraStatus']."</td>
        </tr>

<!-- ###############################   Fila de la prueba  de CTS   ################################## -->

<td>CTS:</td>
<td>";
        # Si la prueba de CTS se ha completado, muestra una checkbox marcada y desactivada
        if ($conp['CTS'] == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo8' name='test' value='cts' disabled checked><label for='squaredTwo8'></label></div>";
        } else {
            # Si CTSHoraInicial es NULL, deshabilita el checkbox
            $checkboxDisabled = is_null($conp['CTSHoraInicial']) ? 'disabled' : '';
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo8' name='test' value='cts' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo8'></label></div>";
        }
        echo "</td>";

        echo "<td data-status2>";
        switch ($conp['CTS']) {
            case 1:
                if ($conp['BSL'] == 1 && !$conp['CTS']) {
                    // Si la prueba de BSL se ha completado y la prueba de CTS no se ha completado, no se muestra ningún elemento select
                }
                break;
            case 2:
                if ($conp['CTS'] == 1) {
                    // Si la prueba de CTS se ha completado, no se muestra ningún contenido en la columna de Status2
                }
                break;
            case 0:
                if ($conp['BSL'] == 0 && $conp['CTS'] == 0) {
                    // Si la prueba de BSL no se ha completado y la prueba de CTS no se ha completado, no se muestra ningún elemento select
                } elseif ($conp['CTS'] == 0 && is_null($conp['CTSHoraInicial'])) {
                    $HoraInicial = date('Y-m-d H:i:s');
                    // Si CTSHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                    echo "<select name='status2_cts' id='status2_cts' form='formmicrosoft' required>
                        <option value='' disabled selected>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                } else {
                    // Si CTSHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                    echo "<select name='status2_cts' id='status2_cts' form='formmicrosoft'>
                        <option value=''>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                }
                break;
        }
        echo "</td>
        
        <td><p class='info' title=''>".$conp['CTSNoReloj']."<span>".$concts['Nombre']."  <br>  ".$concts['Turno']."&deg; Turno</span></p></td>
        <td>".$conp['CTSHoraStatus']."</td>
        </tr>
<!-- ###############################   Fila de la prueba  de Packing   ################################## -->

<td>Packing:</td>
<td>";
        # Si la prueba de Packing se ha completado, muestra una checkbox marcada y desactivada
        if ($conp['Packing'] == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo9' name='test' value='packing' disabled checked><label for='squaredTwo9'></label></div>";
        } else {
            # Si PackingHoraInicial es NULL, deshabilita el checkbox
            $checkboxDisabled = is_null($conp['PackingHoraInicial']) ? 'disabled' : '';
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo9' name='test' value='packing' form='formmicrosoft' $checkboxDisabled><label for='squaredTwo9'></label></div>";
        }
        echo "</td>";

        echo "<td data-status2>";
        switch ($conp['Packing']) {
            case 1:
                if ($conp['CTS'] == 1 && !$conp['Packing']) {
                    // Si la prueba de CTS se ha completado y la prueba de Packing no se ha completado, no se muestra ningún elemento select
                }
                break;
            case 2:
                if ($conp['Packing'] == 1) {
                    // Si la prueba de Packing se ha completado, no se muestra ningún contenido en la columna de Status2
                }
                break;
            case 0:
                if ($conp['CTS'] == 0 && $conp['Packing'] == 0) {
                    // Si la prueba de CTS no se ha completado y la prueba de Packing no se ha completado, no se muestra ningún elemento select
                } elseif ($conp['Packing'] == 0 && is_null($conp['PackingHoraInicial'])) {
                    $HoraInicial = date('Y-m-d H:i:s');
                    // Si PackingHoraInicial es NULL, se muestra un elemento select con opciones de status y la opción de required
                    echo "<select name='status2_packing' id='status2_packing' form='formmicrosoft' required>
                        <option value='' disabled selected>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                } else {
                    // Si PackingHoraInicial contiene una fecha, se muestra el checkbox habilitado en la columna de Status2 y el select sin la opción de required en la columna de Status
                    echo "<select name='status2_packing' id='status2_packing' form='formmicrosoft'>
                        <option value=''>Seleccionar</option>
                        <option value='Waiting'>Waiting</option>
                        <option value='Running'>Running</option>
                        <option value='Fail'>Fail</option>
                        <input type='hidden' name='HoraInicial' value='$HoraInicial' form='formmicrosoft'>
                    </select>";
                }
                break;
        }
        echo "</td>
        
        <td><p class='info' title=''>".$conp['PackingNoReloj']."<span>".$conpacking['Nombre']."  <br>  ".$conpacking['Turno']."&deg; Turno</span></p></td>
        <td>".$conp['PackingHoraStatus']."</td>
        </tr>

        </table>";


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
            // ################################################Mostrar comentarios en el MODAL##########################################################

            $query = mysqli_query($enlace, "SELECT * FROM comentarios WHERE NoSerie = '$variable' ORDER BY ID ASC");
           

            echo'<center><h2><hr style="width:95%; margin-top:15px; height:5px;margin-bottom:15px; ">Comentarios</h2></center><br>';
            while ($datos=mysqli_fetch_row($query) ) {
            $actual = array("<", ">");
            $nuevo  = array("&lt ", "&gt");
            $comentario = str_replace($actual, $nuevo, $datos[5]);
            echo '<center><div class="comentarios" >
            <div><p title="'.$datos[2].'"><h3>T&eacute;cnico: '.$datos[3].'</h3></p></div><div style="white-space: pre-wrap; word-break: break-all;
             word-wrap: break-word;"><h5 style="color:#2574a9;">Fecha: '.$datos[4].'</h5>
            <p style="white-space: pre-wrap; word-break: break-all;
             word-wrap: break-word;">'.$comentario.'</p>
            </div></div><br></center>';
            }
echo '
<form action="comentar.php" method="post">
<center><textarea name="comentario" rows="8" style=" resize: none; width:95%" placeholder="Comentar..." maxlength="255"></textarea></center>
<input type="hidden" value="'.$variable.'" name="NoSerie">
<center><button class="btn1" style="width:95%">Comentar</button></center>
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
	
	//-----------------------------------------------------Microsoft 8.2 sin Sesion ------------------------------------------------------------------------------------------------------------------
	echo "<center>
    <table class='tablaprueba'>
    <tr><th>Prueba</th><th>Status2</th><th>Status</th><th>Tecnico</th><th>Hora</th></tr>
    
    <form method='post' action='actualizarmicrosoft.php' id='formmicrosoft'>
    <input form='formmicrosoft' type='hidden' name='tr' value='".$tr."'>
        <input type='hidden' name='noserie' value='".$con['NoSerie']."' form='formmicrosoft'>
        <td>FTO:</td>
<td>";
#Si la prueba de QuickTest se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['FTO'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo' name='test' value='fto' disabled checked><label for='squaredTwo'></label></div>";

#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo' name='test' value='fto' form='formmicrosoft'><label for='squaredTwo'></label></div>";
    }
echo "</td>

<!-- Si la prueba de FTO no se ha completado y QuickTest no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['FTO'] == 1) {
    
#Si la prueba de FTO se ha completado y la prueba de QuickTest NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['FTO'] == 0 ) {
//     $HoraInicial = date('Y-m-d H:i:s'); // obtiene la fecha y hora actuales
//     echo "<select name='status2_fto' id='status2_fto' form='formmicrosoft'>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
    
//     </select>";
// }
echo "</td>
        <td><p class='info' title=''>".$conp['FTONoReloj']."<span>".$confto['Nombre']."  <br>  ".$confto['Turno']."&deg; Turno</span></p></td>
        <td>".$conp['FTOHoraStatus']."</td>
        </tr>


		
        <!-- ###############################   Fila de la prueba  de QuickTest    ################################## -->

<td>QuickTest:</td>
<td>";
#Si la prueba de QuickTest se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['QuickTest'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo2' name='test' value='quicktest' disabled checked><label for='squaredTwo2'></label></div>";
#Si FTO está completo, muestra un checkbox desactivado
    } elseif ($conp['FTO'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo2' name='test' value='quicktest' disabled><label for='squaredTwo2'></label></div>";
#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo2' name='test' value='quicktest' form='formmicrosoft'><label for='squaredTwo2'></label></div>";
    }
echo "</td>

<!-- Si la prueba de FTO no se ha completado y QuickTest no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['FTO'] == 0 && ($conp['QuickTest'] == 0)) {
    
// #Si la prueba de FTO se ha completado y la prueba de QuickTest NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['FTO'] == 1 && !$conp['QuickTest']) {
//     $HoraInicial = date('Y-m-d H:i:s');
//     echo "<select name='status2_quicktest' id='status2_quicktest' form='formmicrosoft'>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
//     </select>";
// }
echo "</td>
<td><p class='info' title=''>".$conp['QuickTestNoReloj']."<span>".$conquicktest['Nombre']."  <br>  ".$conquicktest['Turno']."&deg; Turno</span></p></td>
<td>".$conp['QuickTestHoraStatus']."</td>
</tr>


<!-- ###############################   Fila de la prueba  de Stress    ################################## -->

<td>Stress:</td>
<td>";
#Si la prueba de Stress se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['Stress'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo3' name='test' value='stress' disabled checked><label for='squaredTwo3'></label></div>";
#Si QuickTest no está completo, muestra una casilla desactivada
    } elseif ($conp['QuickTest'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo3' name='test' value='stress' disabled><label for='squaredTwo3'></label></div>";
#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo3' name='test' value='stress' form='formmicrosoft'><label for='squaredTwo3'></label></div>";
    }
echo "</td>

<!-- Si la prueba de QuickTest no se ha completado y Stress no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['QuickTest'] == 0 && ($conp['Stress'] == 0)) {
   

#Si la prueba de QuickTest se ha completado y la prueba de Stress NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['QuickTest'] == 1 && !$conp['Stress']) {
//     $HoraInicial = date('Y-m-d H:i:s');
//     echo "<select name='status2_stress'  id='status2_stress' form='formmicrosoft'>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
//     </select>";
// }
echo "</td>
<td><p class='info' title=''>".$conp['StressNoReloj']."<span>".$constress['Nombre']."  <br>  ".$constress['Turno']."&deg; Turno</span></p></td>
<td>".$conp['StressHoraStatus']."</td>
</tr>

<!-- ###############################   Fila de la prueba  de MDaaS    ################################## -->

<td>MDaaS:</td>
<td>";
#Si la prueba de MDaaS se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['MDaaS'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo4' name='test' value='mdaas' disabled checked><label for='squaredTwo4'></label></div>";
#Si Stress está completo, muestra un checkbox desactivado
    } elseif ($conp['Stress'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo4' name='test' value='mdaas' disabled><label for='squaredTwo4'></label></div>";
#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo4' name='test' value='mdaas' form='formmicrosoft'><label for='squaredTwo4'></label></div>";
    }
echo "</td>

<!-- Si la prueba de Stress no se ha completado y MDaaS no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['Stress'] == 0 && ($conp['MDaaS'] == 0)) {
   

#Si la prueba de Stress se ha completado y la prueba de MDaaS NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['Stress'] == 1 && !$conp['MDaaS']) {
//     $HoraInicial = date('Y-m-d H:i:s');
//     echo "<select name='status2_mdaas' id='status2_mdass' form='formmicrosoft'>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
//     </select>";
// }
echo "</td>
<td><p class='info' title=''>".$conp['MDaaSNoReloj']."<span>".$conmdaas['Nombre']."  <br>  ".$conmdaas['Turno']."&deg; Turno</span></p></td>
<td>".$conp['MDaaSHoraStatus']."</td>
</tr>


<!-- ###############################   Fila de la prueba  de RackTest   ################################## -->

<td>RackTest:</td>
<td>";
#Si la prueba de RackTest se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['RackTest'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo5' name='test' value='racktest' disabled checked><label for='squaredTwo5'></label></div>";
#Si MDaaS está completo, muestra un checkbox desactivado
    } elseif ($conp['MDaaS'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo5' name='test' value='racktest' disabled><label for='squaredTwo5'></label></div>";
#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo5' name='test' value='racktest' form='formmicrosoft'><label for='squaredTwo5'></label></div>";
    }
echo "</td>

<!-- Si la prueba de MDaaS no se ha completado y RackTest no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['MDaaS'] == 0 && ($conp['RackTest'] == 0)) {
    

#Si la prueba de MDaaS se ha completado y la prueba de RackTest NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['MDaaS'] == 1 && !$conp['RackTest']) {
//     $HoraInicial = date('Y-m-d H:i:s');
//     echo "<select name='status2_racktest' id='status2_racktest' form='formmicrosoft''>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
//     </select>";
// }
echo "</td>
<td><p class='info' title=''>".$conp['RackTestNoReloj']."<span>".$conracktest['Nombre']."  <br>  ".$conracktest['Turno']."&deg; Turno</span></p></td>
<td>".$conp['RackTestHoraStatus']."</td>
</tr>

<!-- ###############################   Fila de la prueba  de FTI   ################################## -->

<td>FTI:</td>
<td>";
#Si la prueba de FTI se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['FTI'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo6' name='test' value='fti' disabled checked><label for='squaredTwo6'></label></div>";
#Si RackTest está completo, muestra un checkbox desactivado
    } elseif ($conp['RackTest'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo6' name='test' value='fti' disabled><label for='squaredTwo6'></label></div>";
#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo6' name='test' value='fti' form='formmicrosoft'><label for='squaredTwo6'></label></div>";
    }
echo "</td>

<!-- Si la prueba de RackTest no se ha completado y FTI no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['RackTest'] == 0 && ($conp['FTI'] == 0)) {
   

#Si la prueba de MDaaS se ha completado y la prueba de RackTest NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['RackTest'] == 1 && !$conp['FTI']) {
//     $HoraInicial = date('Y-m-d H:i:s');
//     echo "<select name='status2_fti' id='status2_fti' form='formmicrosoft'>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
//     </select>";
// }
echo "</td>
<td><p class='info' title=''>".$conp['FTINoReloj']."<span>".$confti['Nombre']."  <br>  ".$confti['Turno']."&deg; Turno</span></p></td>
<td>".$conp['FTIHoraStatus']."</td>
</tr>

<!-- ###############################   Fila de la prueba  de BSL   ################################## -->

<td>BSL:</td>
<td>";
#Si la prueba de BSL se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['BSL'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo7' name='test' value='bootstrap' disabled checked><label for='squaredTwo7'></label></div>";
#Si FTI está completo, muestra un checkbox desactivado
    } elseif ($conp['FTI'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo7' name='test' value='bootstrap' disabled><label for='squaredTwo7'></label></div>";
#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo7' name='test' value='bootstrap' form='formmicrosoft'><label for='squaredTwo7'></label></div>";
    }
echo "</td>

<!-- Si la prueba de FTI no se ha completado y BSL no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['FTI'] == 0 && ($conp['BSL'] == 0)) {
    

#Si la prueba de FTI se ha completado y la prueba de bsl NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['FTI'] == 1 && !$conp['BSL']) {
//     $HoraInicial = date('Y-m-d H:i:s');
//     echo "<select name='status2_bootstrap' id='status2_bootstrap' form='formmicrosoft'>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
//     </select>";
// }
echo"<td><p class='info' title=''>".$conp['BSLNoReloj']."<span>".$conbootstrap['Nombre']." <br> ".$conbootstrap['Turno']."° Turno</span></p></td>
<td>".$conp['BSLHoraStatus']."</td>

</tr>

<!-- ###############################   Fila de la prueba  de CTS   ################################## -->

<td>CTS:</td>
<td>";
#Si la prueba de CTS se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['CTS'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo8' name='test' value='cts' disabled checked><label for='squaredTwo8'></label></div>";
#Si BSL está completo, muestra un checkbox desactivado
    } elseif ($conp['BSL'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo8' name='test' value='cts' disabled><label for='squaredTwo8'></label></div>";
#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo8' name='test' value='cts' form='formmicrosoft'><label for='squaredTwo8'></label></div>";
    }
echo "</td>

<!-- Si la prueba de BSL no se ha completado y CTS no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['BSL'] == 0 && ($conp['CTS'] == 0)) {
   
#Si la prueba de BSL se ha completado y la prueba de CTS NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['BSL'] == 1 && !$conp['CTS']) {
//     $HoraInicial = date('Y-m-d H:i:s');
//     echo "<select name='status2_cts' id='status2_cts' form='formmicrosoft'>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
//     </select>";
// }
    echo"<td><p class='info' title=''>".$conp['CTSNoReloj']."<span>".$concts['Nombre']."  <br>  ".$concts['Turno']."&deg; Turno</span></p></td>
    <td>".$conp['CTSHoraStatus']."</td>
</tr>

<!-- ###############################   Fila de la prueba  de Packing   ################################## -->

<td>Packing:</td>
<td>";
#Si la prueba de Packing se ha completado, muestra una checkbox  marcado y desactivado
    if ($conp['Packing'] == 1) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo9' name='test' value='packing' disabled checked><label for='squaredTwo9'></label></div>";
#Si BSL está completo, muestra un checkbox desactivado
    } elseif ($conp['CTS'] == 0) {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo9' name='test' value='packing' disabled><label for='squaredTwo9'></label></div>";
#En caso contrario, mostrar una casilla activada
    } else {
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='squaredTwo9' name='test' value='packing' form='formmicrosoft'><label for='squaredTwo9'></label></div>";
    }
echo "</td>


<!-- Si la prueba de CTS no se ha completado y Packing no se ha completado, muestre un select oculto -->
<td data-status2>";
// if ($conp['CTS'] == 0 && ($conp['Packing'] == 0)) {
    

#Si la prueba de   CTS se ha completado y la prueba de Packing NO se ha completado, muestre un elemento de selección visible
// } elseif ($conp['CTS'] == 1 && !$conp['Packing']) {
//     $HoraInicial = date('Y-m-d H:i:s');
//     echo "<select name='status2_packing' id='status2_packing' form='formmicrosoft'>
//     <option value='Seleccionar'>Seleccionar</option>
//     <option value='Waiting'>Waiting</option>
//     <option value='Running'>Running</option>
//     <option value='Fail'>Fail</option>
//     <input type='hidden' name='HoraInicial' value= '$HoraInicial' form='formmicrosoft'>
//     </select>";
// }
	echo"<td><p class='info' title=''>".$conp['PackingNoReloj']."<span>".$conpacking['Nombre']." <br> ".$conpacking['Turno']."° Turno</span></p></td>
		<td>".$conp['PackingHoraStatus']."</td>
		
		</tr>     
        </table>";
  
            break;
            case 4:
                echo "<center><br><br><br><h1>Debe iniciar sesion para registrar un rack</h1><br><br><br><img src='img/icono.png' WIDTH=178 HEIGHT=180></center>";
                
                
                break;
                
                
            }
}
?>

