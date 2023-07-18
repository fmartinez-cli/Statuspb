<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
include('conexion.php');

if (!isset($_SESSION['Nombre']) || $_SESSION['Nivel']!='1') {
    ?>
    <center>
        <br><br><br>
        <h1>Debes iniciar sesion </h1>
        <p id="counter"></p>
        <br><br><br>
        <img src='img/icono.png' WIDTH=178 HEIGHT=180>
    </center>
    <script>
        var counter = 4;
        var countdown = setInterval(function() {
            document.getElementById('counter').innerHTML = "Serás redirigido a la pagina principal en " + counter + " segundos...";
            counter--;
            if (counter < 0) {
                clearInterval(countdown);
            }
        }, 1000);
    </script>
    <?php
    header("refresh:4; url=index.php");
    exit(); // Terminamos la ejecución del script aquí.
}
// Resto del código que quieras ejecutar si el usuario está logueado y el Nivel es 1.
?>

<!DOCTYPE html>
<html>
<head>
	<title>Grficas X Rack</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- *********************Stylos *********************-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/stylef.css">
	<link rel="stylesheet" href="css/popup.css">
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="shortcut icon" href="img/checkicon.png" />
	<link rel="stylesheet" href="css/component.css">
	<link rel="stylesheet" href="css/moodalbox.css">
<?php
include('css/themes.php');
	?>
	
    <style>
        footer {
            margin: 7rem 0;
        }
    </style>
  
<script src="js/dataTables/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/cbpHorizontalSlideOutMenu.min.js"></script>
<script type="text/javascript" src="js/echarts.min.js">
<script type="text/javascript" src="js/mootools.js"></script>
<script type="text/javascript" src="js/block.js"></script>

<script language="javascript">
	document.addEventListener('DOMContentLoaded', function() {
  new cbpHorizontalSlideOutMenu(document.getElementById('cbp-hsmenu-wrapper'));
});// Codigo para inicializar la libreria cbpHorizontalSlideOutMenu


	$(document).ready(function() {
		$(".botonExcel").click(function(event) {
			$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
			$("#FormularioExportacion").submit();
		});
});
</script>
<script type="text/javascript" src="js/html2canvas.js"></script>
<script type="text/javascript" src="js/filesaver.js"></script>
</head>

<body class="desarroll">
<header style="background-image: url('img/try6.jpg');">
		<div class="grupo ">
			<div class="caja">
				<div class="container">
					<header class="clearfix header2">
						<span>Ingenieria de pruebas</span>
						<a href="index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Microsoft Azure</h1></a>

						<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
						<?php
				if (isset($_SESSION['Nombre'])&& $_SESSION['Nivel']==1){
					echo '
				<div class="" style=" position:absolute; right:5px; top:5px;"> <a class="" href="administrar.php"><img width="25" src="img/admin.png"></a></div><br>
			';
				}


				?>
						</header>
					</div>
				</div>
			</div>
			<div class="main">
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu">
							<li>
								<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-server" aria-hidden="true"></i> Linea 1 </a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="/Statuspb/microsoft/bahia1.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 1</h3></a></li>
									<li><a href="/Statuspb/microsoft/bahia2.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 2</h3></a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-server" aria-hidden="true"></i> Linea 2 </a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="/Statuspb/microsoft/bahia3.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 3</h3></a></li>
									<li><a href="/Statuspb/microsoft/bahia4.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 4</h3></a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-server" aria-hidden="true"></i> Linea 3 </a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="/Statuspb/microsoft/bahia5.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 5</h3></a></li>
									<li><a href="/Statuspb/microsoft/bahia6.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 6</h3></a></li>
									<!-- <li><a href="/Statuspb/microsoft/estadisticas.php"><h3><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas</h3></a></li>
									<li><a href="/Statuspb/microsoft/statusgral.php"><h3>
										<i class="fa fa-bar-chart" aria-hidden="true"></i> Estatus General
									</h3></a></li>
									<li><a href="/Statuspb/microsoft/buscar.php"><h3><i class="fa fa-search" aria-hidden="true"></i> Buscar Rack/WO</h3></a></li>
									<li><a href="#"></a></li> -->
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-server" aria-hidden="true"></i> Linea 4 </a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="/Statuspb/microsoft/bahia7.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 7</h3></a></li>
									<li><a href="/Statuspb/microsoft/bahia8.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 8</h3></a></li>
									<!-- <li><a href="/Statuspb/microsoft/estadisticas.php"><h3><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas</h3></a></li>
									<li><a href="/Statuspb/microsoft/statusgral.php"><h3>
										<i class="fa fa-bar-chart" aria-hidden="true"></i> Estatus General
									</h3></a></li>
									<li><a href="/Statuspb/microsoft/buscar.php"><h3><i class="fa fa-search" aria-hidden="true"></i> Buscar Rack/WO</h3></a></li>
									<li><a href="#"></a></li> -->
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-server" aria-hidden="true"></i> Linea 5 </a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="/Statuspb/microsoft/bahia9.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 9</h3></a></li>
									<li><a href="/Statuspb/microsoft/bahia10.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 10</h3></a></li>
									<!-- <li><a href="/Statuspb/microsoft/estadisticas.php"><h3><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas</h3></a></li>
									<li><a href="/Statuspb/microsoft/statusgral.php"><h3>
										<i class="fa fa-bar-chart" aria-hidden="true"></i> Estatus General
									</h3></a></li>
									<li><a href="/Statuspb/microsoft/buscar.php"><h3><i class="fa fa-search" aria-hidden="true"></i> Buscar Rack/WO</h3></a></li>
									<li><a href="#"></a></li> -->
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-server" aria-hidden="true"></i> Linea 6 </a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="#"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 11</h3></a></li>
									<li><a href="#"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 12</h3></a></li>
									<!-- <li><a href="/Statuspb/microsoft/estadisticas.php"><h3><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas</h3></a></li>
									<li><a href="/Statuspb/microsoft/statusgral.php"><h3>
										<i class="fa fa-bar-chart" aria-hidden="true"></i> Estatus General
									</h3></a></li>
									<li><a href="/Statuspb/microsoft/buscar.php"><h3><i class="fa fa-search" aria-hidden="true"></i> Buscar Rack/WO</h3></a></li>
									<li><a href="#"></a></li> -->
								</ul>
						
							</li>
							<li>
								<a href="estadisticas.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas </a>
						
							</li>
							<li>
							<li><a href="statusgral.php"><img width="32" src="img/status.png"> Estatus General</a></li>
						
							</li>
							<?php  if(isset($_SESSION['Nombre'])){ echo '<li><a  href="logout.php"><h4>Logout</h4></a></li>';}
						else{ echo '<li><a  href="#modal"><h4>Login</h4></a></li>'; }?>
						<!----------------------------------------------------- Modal para inicio de sesion --------------------------------------------------->
						<?php

if(!isset($_SESSION['Nombre'])){
	echo '<center> <div id="modal" style="width:500px;">
	<div class="modal-content ">
		<div class="header">
			<h2>Iniciar Sesion</h2>
		</div>
		<div class="copy">
			<div class="grupo">
				<div class="caja">
					<form method="post" action="login.php" class="login">
						<input type="text" name="Usuario" placeholder="N&uacute;mero de reloj" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'N&uacute;mero de reloj\'" maxlength="5" pattern=".{5,}" onkeypress="return justNumbers(event);">
						<br><input type="password" name="Password" placeholder="Contrase&ntilde;a" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Contrase&ntilde;a\'">
						<script type="text/javascript"> var URLactual = window.location.href+"#";
							document.write("<input type=\"hidden\" name=\"Url\" value="+URLactual+">");
						</script>
						<br><button style="width:300px;  padding:0px;" class="btn1">Aceptar</button>
						<br><input style="width:250px; padding:0px;" class="btn2" type="button" value="Cerrar" onClick=" window.location.href=\'#\' ">
					</form>

				</div>
			</div>
		</div>
	</div>
	<div class="overlay"></div>
</div></center>'
;}?>

									
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!---------------------------------------------------- Inicia la seccion del manual --------------------------------------------------------------------------------------->
		<section>
				<div class="grupo">
					<div class="caja">
					<a href="microsoft/manual.php">
						<div class="" title="Manual" style="color:#3e3e3e; width:45px; height:40px; font-size:30px; text-align:center; position:fixed; bottom:5px; left:5px;"><i class="fa fa-question-circle" aria-hidden="true"></i>
						</div>
					</a>
					</div>
				</div>
			</section>
			<br> <br>	
		<!---------------------------------------------------- Acaba la seccion del manual --------------------------------------------------------------------------------------->	
	</header>
	<section>
		<!-- ********************LOGIN***********************************-->
		<?php

		if(!isset($_SESSION['Nombre'])){
			echo '<center> <div id="modal" style="width:500px;">
			<div class="modal-content ">
				<div class="header">
					<h2>Iniciar Sesion</h2>
				</div>
				<div class="copy">
					<div class="grupo">
						<div class="caja">
							<form method="post" action="login.php" class="login">
								<input type="text" name="Usuario" placeholder="N&uacute;mero de reloj" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'N&uacute;mero de reloj\'" maxlength="5" pattern=".{5,}" onkeypress="return justNumbers(event);">
								<br><input type="password" name="Password" placeholder="Contrase&ntilde;a" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Contrase&ntilde;a\'">
								<script type="text/javascript"> var URLactual = window.location.href+"#";
									document.write("<input type=\"hidden\" name=\"Url\" value="+URLactual+">");
								</script>
								<br><button style="width:300px;  padding:0px;" class="btn1">Aceptar</button>
								<br><input style="width:250px; padding:0px;" class="btn2" type="button" value="Cerrar" onClick=" window.location.href=\'#\' ">
							</form>

						</div>
					</div>
				</div>
			</div>
			<div class="overlay"></div>
		</div></center>'
		;}?>
		<!-- ********************LOGIN***********************************-->
	</section>
<section>
<div class="grupo">
<div class="caja"><div class="caja web-50" style="float:right; position:relative;"><center><br><br><br><h2>Buscar WO</h2></center>
		<form class="buscador" action="buscar.php" method="post">
			<input name='WO' placeholder="WO" type="text" pattern="[0-9]{9}" maxlength="9" required><br>
			<button class="btn2" style="width:300px">Buscar</button>
			</form></div>
			<div class="caja web-50"  style="float:left;  position:relative;"><center><br><br><br><h2>Buscar Rack</h2></center>
			<form class="buscador" action="buscarr.php" method="post">
			<input name='NoSerie' placeholder="No Serie" type="text" pattern="R[0-9a-zA-Z]{14}F" maxlength="16" required><br>
			<button class="btn2" style="width:300px">Buscar</button>
			</form></div>
			
			
			<?php
		if(isset($_REQUEST['NoSerie'])){
			$variable=strtoupper($_REQUEST['NoSerie']);
			$cons=mysqli_query($enlace, "SELECT * FROM racks_copy WHERE NoSerie = '$variable'");
			$cons2=mysqli_query($enlace, "SELECT * FROM pruebasMicro_copy where NoSerie = '$variable'");
			
			
			$con=mysqli_fetch_array($cons);
			
			
			
			// Consulta para obtener la información de los racks y pruebas Micro
$query0 = mysqli_query($enlace, "SELECT racks_copy.NoSerie, racks_copy.Modelo FROM racks_copy INNER JOIN pruebasMicro_copy ON
pruebasMicro_copy.NoSerie = racks_copy.NoSerie WHERE Bahia BETWEEN 1 AND 10 AND (Modelo = 'Microsoft 8.2' OR Modelo = 'Microsoft 8.3' OR Modelo = 'NPI') AND racks_copy.NoSerie = '$variable'");


$query = mysqli_query($enlace, "SELECT racks_copy.Locacion, racks_copy.NoSerie, racks_copy.WO, racks_copy.SKU,
racks_copy.Modelo,pruebasMicro_copy.FTO, pruebasMicro_copy.QuickTest, pruebasMicro_copy.Stress, pruebasMicro_copy.MDaaS,  pruebasMicro_copy.Racktest,
pruebasMicro_copy.FTI, pruebasMicro_copy.BSL, pruebasMicro_copy.CTS, pruebasMicro_copy.Packing,pruebasMicro_copy.FTOStatus2, pruebasMicro_copy.QuickTestStatus2, pruebasMicro_copy.StressStatus2, pruebasMicro_copy.MDaaSStatus2, pruebasMicro_copy.RackTestStatus2,
pruebasMicro_copy.FTIStatus2, pruebasMicro_copy.BSLStatus2, pruebasMicro_copy.CTSStatus2, pruebasMicro_copy.PackingStatus2
FROM racks_copy
INNER JOIN pruebasMicro_copy ON pruebasMicro_copy.NoSerie = racks_copy.NoSerie
WHERE Bahia BETWEEN 1 AND 10 AND (Modelo = 'Microsoft 8.2' OR Modelo = 'Microsoft 8.3' OR Modelo = 'NPI') AND racks_copy.NoSerie = '$variable'

ORDER BY Locacion ASC");
// Tabla de Status
if($datos0=mysqli_fetch_row($query0)){
	echo "<div class='caja'>
	<table width='100%' style='opacity:.9 ;' class='tablaST'>
	<caption style='background-color:#3e3e3e; padding:5px;'><h1 style='color:white;'>".$con['NoSerie']."</h1></caption>
	<tr>
	<th>Locacion</th><th>WO</th><th>SKU</th>
                <th>FTO</th><th>QuickTest</th><th>StressTest</th><th>MDaaS</th><th>RackTest</th>
                <th>FTI</th><th>Bootstrap</th><th>CTS</th><th>Packing</th>
				</tr>";
				
				while ($datos = mysqli_fetch_row($query)) {
					echo "<tr><td class='tdinfo'>" . $datos[0] . "</td>";
					echo "<td class='tdinfo'>" . $datos[2] . "</td>";
					echo "<td class='tdinfo'>" . $datos[3] . "</td>";
					
					for ($i = 5; $i <= 13; $i++) {
						$statusValue = $datos[$i];
						$status2Value = $datos[$i + 9]; // Obtiene el valor correspondiente de Status2
						$cellContent = '';
						$cellColor = '';
						
						if ($statusValue == 1) {
							$cellColor = '#008000'; // Verde
							// No se asigna contenido
						} elseif ($statusValue == 0) {
							// Se toma como referencia el valor de la columna correspondiente a la prueba de Status2
							if ($status2Value == 'Vacio') {
								// No se asigna color ni contenido
							} elseif ($status2Value == 'Waiting') {
								$cellColor = '#f7a307'; // Naranja
							} elseif ($status2Value == 'Running') {
								$cellColor = '#FFFF00'; // Amarillo
						} elseif ($status2Value == 'Fail') {
							$cellColor = '#FF0000'; // Rojo
						}
					}
					
					echo "<td bgcolor='$cellColor'>$cellContent</td>";
				}
				
				echo "</tr>";
			}
			
			echo "</table></div>
			
			
			
			
			
			</center>";
			}

//Ejecuta la consulta SQL y guarda los resultados en la variable $result
$NoSerie = mysqli_real_escape_string($enlace, strtoupper($_REQUEST['NoSerie']));

$query = "SELECT 
    TIMESTAMPDIFF(MINUTE, HoraInicio, IFNULL(PackingHoraFinal, NOW())) as TotalDuration,
    TIMESTAMPDIFF(MINUTE, FTOHoraInicial, IFNULL(FTOHoraFinal, NOW())) as FTODuration,
    TIMESTAMPDIFF(MINUTE, QuickTestHoraInicial, IFNULL(QuickTestHoraFinal, NOW())) as QuickTestDuration,
    TIMESTAMPDIFF(MINUTE, StressHoraInicial, IFNULL(StressHoraFinal, NOW())) as StressDuration,
    TIMESTAMPDIFF(MINUTE, MDaaSHoraInicial, IFNULL(MDaaSHoraFinal, NOW())) as MDaaSDuration,
    TIMESTAMPDIFF(MINUTE, RackTestHoraInicial, IFNULL(RackTestHoraFinal, NOW())) as RackTestDuration,
    TIMESTAMPDIFF(MINUTE, FTIHoraInicial, IFNULL(FTIHoraFinal, NOW())) as FTIDuration,
    TIMESTAMPDIFF(MINUTE, BSLHoraInicial, IFNULL(BSLHoraFinal, NOW())) as BSLDuration,
    TIMESTAMPDIFF(MINUTE, CTSHoraInicial, IFNULL(CTSHoraFinal, NOW())) as CTSDuration,
    TIMESTAMPDIFF(MINUTE, PackingHoraInicial, IFNULL(PackingHoraFinal, NOW())) as PackingDuration  
FROM 
    pruebasMicro_copy
WHERE 
    NoSerie = '$NoSerie'";

$result = mysqli_query($enlace, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Log total durations
    $totalDuration = $row['TotalDuration'];
    $totalTestDuration = $row['FTODuration'] + $row['QuickTestDuration'] + $row['StressDuration'] + $row['MDaaSDuration'] + $row['RackTestDuration'] + $row['FTIDuration'] + $row['BSLDuration'] + $row['CTSDuration'] + $row['PackingDuration'];

    $otherDuration = $totalDuration - $totalTestDuration;


	#CODIGO PARA DEPURAR, EL RESULTADO DE LAS CONSLUTAS  SE VA AL ARCHIVO 'error_statuspb'
    // $log_message = "Total Duration: " . $totalDuration . "\nTotal Test Duration: " . $totalTestDuration . "\nOther Duration: " . $otherDuration . "\n";
    // file_put_contents('/var/www/html/error_statuspb', $log_message, FILE_APPEND);

    // Prepare data for the chart
    $FTODuration = $row['FTODuration'] ? [$row['FTODuration']] : [];
    $QuickTestDuration = $row['QuickTestDuration'] ? [$row['QuickTestDuration']] : [];
    $StressDuration = $row['StressDuration'] ? [$row['StressDuration']] : [];
    $MDaaSDuration = $row['MDaaSDuration'] ? [$row['MDaaSDuration']] : [];
    $RackTestDuration = $row['RackTestDuration'] ? [$row['RackTestDuration']] : [];
    $FTIDuration = $row['FTIDuration'] ? [$row['FTIDuration']] : [];
    $BSLDuration = $row['BSLDuration'] ? [$row['BSLDuration']] : [];
    $CTSDuration = $row['CTSDuration'] ? [$row['CTSDuration']] : [];
    $PackingDuration = $row['PackingDuration'] ? [$row['PackingDuration']] : [];
	
	// Convert arrays to JSON
	$FTODurationJson = json_encode($FTODuration);
	$QuickTestDurationJson = json_encode($QuickTestDuration);
	$StressDurationJson = json_encode($StressDuration);
	$MDaaSDurationJson = json_encode($MDaaSDuration);
	$RackTestDurationJson = json_encode($RackTestDuration);
	$FTIDurationJson = json_encode($FTIDuration);
	$BSLDurationJson = json_encode($BSLDuration);
	$CTSDurationJson = json_encode($CTSDuration);
	$PackingDurationJson = json_encode($PackingDuration);
	$otherDurationJson = json_encode([$otherDuration]);

	$NoSerieJson = json_encode($NoSerie);

} else {
// Write a message to the log file if there are no results
$error_message = "No results found for this series number.\n";
file_put_contents('/var/www/html/error_statuspb', $error_message, FILE_APPEND);
}
?>

	<div style="display: flex; justify-content: space-between;">
    <div id="pie-chart" style="width: 600px; height:400px; margin: 5rem 1rem;"></div>
    <div id="line-chart" style="width: 600px; height:400px; margin: 5rem 1rem;"></div>
</div>
<?php

$result = mysqli_query($enlace, $query);

if($result){
    $row = mysqli_fetch_assoc($result);
    $totalTime = $row['TotalDuration'];
}
else{
    echo "Error ejecutando la consulta: " . mysqli_error($enlace);
}
?>
<?php
// Add a function to format the time
function formatDuration($minutes) {
    $days = floor($minutes / (60*24));
    $hours = floor(($minutes % (60*24)) / 60);
    $minutes = ($minutes % 60);
    return sprintf("%02d días %02d horas %02d minutos", $days, $hours, $minutes);
}

// Fetch the total duration
$totalTimeQuery = "SELECT TIMESTAMPDIFF(MINUTE, HoraInicio, IFNULL(PackingHoraFinal, NOW())) as TotalDuration FROM pruebasMicro_copy WHERE NoSerie = '$NoSerie'";
$totalTimeResult = mysqli_query($enlace, $totalTimeQuery);
$totalTimeData = mysqli_fetch_assoc($totalTimeResult);
$totalTime = $totalTimeData['TotalDuration'] ? $totalTimeData['TotalDuration'] : "N/A";
if ($totalTime != "N/A") {
    $totalTime = formatDuration($totalTime);
}
echo "<h2>Tiempo Total = " . $totalTime . "</h2>";
echo "<hr>";
echo "<br>";

$variable_rack_comentarios=strtoupper($_REQUEST['NoSerie']);
$query = mysqli_query($enlace, "SELECT * FROM comentarios_copy WHERE NoSerie = '$variable_rack_comentarios' ORDER BY ID ASC");
echo'<h1><br>Comentarios</h1>';
while ($datos=mysqli_fetch_row($query)) {
    $actual = array("<", ">");
    $nuevo  = array("&lt ", "&gt");
    $comentario = str_replace($actual, $nuevo, $datos[5]);
    echo '<div class="comentarios">
    <div><p title="'.$datos[2].'"><h3>Técnico: '.$datos[3].'</h3></p></div><div><h5>Fecha: '.$datos[4].'</h5><br>
    <pre>'.$comentario.'</pre>
    </div></div><br>';
}
?>




<?php
include('conexion.php');

if(isset($_REQUEST['NoSerie'])){
	$variable=strtoupper($_REQUEST['NoSerie']);
	$cons=mysqli_query($enlace, "SELECT * FROM racks_copy WHERE NoSerie = '$variable'");
$cons2=mysqli_query($enlace, "SELECT * FROM pruebasMicro_copy where NoSerie = '$variable'");

$cont=0;
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

$con=mysqli_fetch_array($cons);
$inicionr=$con['NoReloj'];
$consinicio=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$inicionr'");
$conpinicio=mysqli_fetch_array($consinicio);
echo "<hr>";
echo "<br>";
echo "
<center>
<table class='tablamodal table-modal'>
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
	</table>";}}
				?>



</div>
</div>



</section>
<!-- ********************ccomentario personal***********************************-->


<?php if(isset($_SESSION['No_Reloj'])){

  ?>
<p class="flotante " id="yey0" style="width:102px; background-color:#3e3e3e; color:white; font-weight:bold; padding:10px; font-size:12px; z-index:1; bottom:41px;">Nota personal</p>
<form>
<input class="flotante btn2" id="yey" style="width:32px; padding:10px; font-size:12px; z-index:1" type="button"
onclick="mostrarVentana3()"
value="3">
</form>
<form>
<input class="flotante btn2" id="yey2" style="width:32px; padding:10px; font-size:12px; z-index:1; right:40px;" type="button"
onclick="mostrarVentana2()"
value="2">
</form>
<form>
<input class="flotante btn2" id="yey3" style="width:32px; padding:10px; font-size:12px; z-index:1; right:75px;" type="button"
onclick="mostrarVentana()"
value="1">
</form>

<?php
}
?>
<footer>


</footer>


<!-- nota 1*************************************************************************************************** -->
<div id="miVentana" style="position: fixed; width: 900px; height: 600px; top: 0; left: 0;
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

<?php
$variable= $_SESSION['No_Reloj'];
$query = mysqli_query($enlace, "SELECT * FROM comentarios_copy WHERE NoSerie = '$variable' ORDER BY ID ASC");  ?>

<center><h2>Nota personal 1</h2></center>
<form method="post" action="guardarnota.php">
<textarea name="area" cols="20" rows="50" height="600" ><?php if($datos=mysqli_fetch_row($query)){echo $datos[0];} ?></textarea>
<input type="hidden" value="1" name="valor"  id="valor">
<script type="text/javascript">
CKEDITOR.replace('area');
CKEDITOR.config.height = 400
</script>


<input style="float:left;" class="btn1" type="submit" value="Guardar">
</form>

<form  style="float:right;">
<input class="btn1" type="button"
onclick="ocultarVentana()"
value="Cerrar">
</form>
</div>
<!-- fin nota 1*************************************************************************************************** -->

<!-- nota 2*************************************************************************************************** -->
<div id="miVentana2" style="position: fixed; width: 900px; height: 600px; top: 0; left: 0;
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

<?php
$variable= $_SESSION['No_Reloj'];
$query = mysqli_query($enlace, "SELECT Comentario2 FROM users WHERE No_Reloj = '$variable'");  ?>

<center><h2>Nota personal 2</h2></center>
<form method="post" action="guardarnota.php">
<textarea name="area2" cols="20" rows="50" height="600" ><?php if($datos=mysqli_fetch_row($query)){echo $datos[0];} ?></textarea>
<input type="hidden" value="2" name="valor" id="valor">
<script type="text/javascript">
CKEDITOR.replace('area2');
CKEDITOR.config.height = 400
</script>


<input style="float:left;" class="btn1" type="submit" value="Guardar">
</form>

<form  style="float:right;">
<input class="btn1" type="button"
onclick="ocultarVentana()"
value="Cerrar">
</form>
</div>
<!-- fin nota 2*************************************************************************************************** -->

<!-- nota 3*************************************************************************************************** -->
<div id="miVentana3" style="position: fixed; width: 900px; height: 600px; top: 0; left: 0;
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

<?php
$variable= $_SESSION['No_Reloj'];
$query = mysqli_query($enlace, "SELECT Comentario3 FROM users WHERE No_Reloj = '$variable'");  ?>

<center><h2>Nota personal 3</h2></center>
<form method="post" action="guardarnota.php">
<textarea name="area3" cols="20" rows="50" height="600" ><?php if($datos=mysqli_fetch_row($query)){echo $datos[0];} ?></textarea>
<input type="hidden" value="3" name="valor" id="valor">
<script type="text/javascript">
CKEDITOR.replace('area3');
CKEDITOR.config.height = 400
</script>


<input style="float:left;" class="btn1" type="submit" value="Guardar">
</form>

<form  style="float:right;">
<input class="btn1" type="button"
onclick="ocultarVentana()"
value="Cerrar">
</form>
</div>
<!-- fin nota 3*************************************************************************************************** -->



<script type="text/javascript">
function mostrarVentana()
{
  var ventana = document.getElementById('miVentana');
  ventana.style.marginTop = "30px";
  ventana.style.left = ((document.body.clientWidth-900) / 2) +  "px";
  ventana.style.display = 'block';

  var yey0 = document.getElementById('yey0');
  yey0.style.display = 'none';
  var yey = document.getElementById('yey');
  yey.style.display = 'none';
  var yey2 = document.getElementById('yey2');
  yey2.style.display = 'none';
  var yey3 = document.getElementById('yey3');
  yey3.style.display = 'none';
}
function mostrarVentana2()
{
  var ventana = document.getElementById('miVentana2');
  ventana.style.marginTop = "30px";
  ventana.style.left = ((document.body.clientWidth-900) / 2) +  "px";
  ventana.style.display = 'block';

 var yey0 = document.getElementById('yey0');
  yey0.style.display = 'none';
  var yey = document.getElementById('yey');
  yey.style.display = 'none';
  var yey2 = document.getElementById('yey2');
  yey2.style.display = 'none';
  var yey3 = document.getElementById('yey3');
  yey3.style.display = 'none';
}
function mostrarVentana3()
{
  var ventana = document.getElementById('miVentana3');
  ventana.style.marginTop = "30px";
  ventana.style.left = ((document.body.clientWidth-900) / 2) +  "px";
  ventana.style.display = 'block';

  var yey0 = document.getElementById('yey0');
  yey0.style.display = 'none';
  var yey = document.getElementById('yey');
  yey.style.display = 'none';
  var yey2 = document.getElementById('yey2');
  yey2.style.display = 'none';
  var yey3 = document.getElementById('yey3');
  yey3.style.display = 'none';
}


function ocultarVentana()
{
  var ventana = document.getElementById('miVentana');
  ventana.style.display = 'none';
   var ventana = document.getElementById('miVentana2');
  ventana.style.display = 'none';
   var ventana = document.getElementById('miVentana3');
  ventana.style.display = 'none';

  var yey0 = document.getElementById('yey0');
  yey0.style.display = 'block';
  var yey = document.getElementById('yey');
  yey.style.display = 'block';
  var yey2 = document.getElementById('yey2');
  yey2.style.display = 'block';
  var yey3 = document.getElementById('yey3');
  yey3.style.display = 'block';
}

  

</script>

<script type="text/javascript">
    var NoSerie = <?php echo $NoSerieJson; ?>;
    var FTODuration = <?php echo $FTODurationJson; ?>;
    var QuickTestDuration = <?php echo $QuickTestDurationJson; ?>;
    var StressDuration = <?php echo $StressDurationJson; ?>;
    var MDaaSDuration = <?php echo $MDaaSDurationJson; ?>;
    var RackTestDuration = <?php echo $RackTestDurationJson; ?>;
    var FTIDuration = <?php echo $FTIDurationJson; ?>;
    var BSLDuration = <?php echo $BSLDurationJson; ?>;
    var CTSDuration = <?php echo $CTSDurationJson; ?>; 
	var PackingDuration = <?php echo $PackingDurationJson; ?>; 
	var OtherDuration = <?php echo $otherDurationJson; ?>;

    var data = [];

	if (FTODuration[0] !== null && FTODuration[0] !== undefined) {
    var duration = formatDuration(FTODuration[0]);
    data.push({value: FTODuration[0], name: 'FTO', formattedValue: duration});
	}

    if (QuickTestDuration[0] !== null && QuickTestDuration[0] !== undefined) {
		var duration = formatDuration(QuickTestDuration[0]);
        data.push({value: QuickTestDuration[0], name: 'QuickTest', formattedValue: duration});
    }

    if (StressDuration[0] !== null && StressDuration[0] !== undefined) {
		var duration = formatDuration(StressDuration[0]);
        data.push({value: StressDuration[0], name: 'Stress', formattedValue: duration});
    }

    if (MDaaSDuration[0] !== null && MDaaSDuration[0] !== undefined) {
		var duration = formatDuration(MDaaSDuration[0]);
        data.push({value: MDaaSDuration[0], name: 'MDaaS', formattedValue: duration});
    }

    if (RackTestDuration[0] !== null && RackTestDuration[0] !== undefined) {
		var duration = formatDuration(RackTestDuration[0]);
        data.push({value: RackTestDuration[0], name: 'RackTest', formattedValue: duration});
    }

    if (FTIDuration[0] !== null && FTIDuration[0] !== undefined) {
		var duration = formatDuration(FTIDuration[0]);
        data.push({value: FTIDuration[0], name: 'FTI', formattedValue: duration});
    }

    if (BSLDuration[0] !== null && BSLDuration[0] !== undefined) {
		var duration = formatDuration(BSLDuration[0]);
        data.push({value: BSLDuration[0], name: 'BSL', formattedValue: duration});
    }

    if (CTSDuration[0] !== null && CTSDuration[0] !== undefined) {
		var duration = formatDuration(CTSDuration[0]);
        data.push({value: CTSDuration[0], name: 'CTS', formattedValue: duration});
    }

	if (PackingDuration[0] !== null && PackingDuration[0] !== undefined) {
		var duration = formatDuration(PackingDuration[0]);
        data.push({value: PackingDuration[0], name: 'Packing', formattedValue: duration}); 
    }
	if (OtherDuration[0] !== null && OtherDuration[0] !== undefined) {
    var duration = formatDuration(OtherDuration[0]);
    data.push({value: OtherDuration[0], name: 'Otros', formattedValue: duration});
}

	function formatDuration(minutes) {
    let days = Math.floor(minutes / (60 * 24));
    let hours = Math.floor((minutes % (60 * 24)) / 60);
    let mins = minutes % 60;
    let formattedDuration = '';

    if (days > 0) {
        formattedDuration += `${days}d `;
    }
    if (hours > 0 || days > 0) { // Si ya tenemos días, queremos mostrar las horas incluso si es cero.
        formattedDuration += `${hours}h `;
    }
    if (mins > 0 || hours > 0 || days > 0) { // Similarmente para los minutos.
        formattedDuration += `${mins}m`;
    }

    return formattedDuration;
}
    var pieChart = echarts.init(document.getElementById('pie-chart'));

    var pieOption = {
        title: {
            text: 'Tiempo x Prueba',
            subtext: 'Rack:' + NoSerie,
            left: 'center'
        },
		tooltip: {
        trigger: 'item',
        formatter: function(params) {
            return params.seriesName + '<br/>' + params.name + ' : ' + params.data.formattedValue + ' (' + params.percent + '%)';
        }
    },
        toolbox: {
            show: true,
            feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: false },
                restore: { show: true },
                saveAsImage: { show: true }
            }
        },
        legend: {
            bottom: 10,
    left: 'center',
    data: ['FTO', 'QuickTest', 'Stress', 'MDaaS', 'RackTest', 'FTI', 'BSL', 'CTS', 'Packing', 'Otros']
        },
        series: [
            {
                name: 'Tiempo',
                type: 'pie',
                radius: '65%',
                center: ['50%', '50%'],
                data: data,
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };

    pieChart.setOption(pieOption);
</script>
<script type="text/javascript">
    var NoSerie = <?php echo $NoSerieJson; ?>;
    var FTODuration = <?php echo $FTODurationJson; ?>;
    var QuickTestDuration = <?php echo $QuickTestDurationJson; ?>;
    var StressDuration = <?php echo $StressDurationJson; ?>;
	var MDaaSDuration = <?php echo $MDaaSDurationJson; ?>;
    var RackTestDuration = <?php echo $RackTestDurationJson; ?>;
    var FTIDuration = <?php echo $FTIDurationJson; ?>;
    var BSLDuration = <?php echo $BSLDurationJson; ?>;
    var CTSDuration = <?php echo $CTSDurationJson; ?>;
	var PackingDuration = <?php echo $PackingDurationJson; ?>;

    var lineChart = echarts.init(document.getElementById('line-chart'));

var lineOption = {
    title: {
        text: 'Media de las Pruebas',
        subtext: 'Rack:' + NoSerie,
        left: 'center'
    },
    grid: {
        top: '25%', // esto crea un espacio de un 15% del alto total entre el borde superior y el gráfico
        bottom: '15%', // este espacio se aplica en la parte inferior
    },
    tooltip: {
        trigger: 'axis'
    },
    toolbox: {
        show: true,
        feature: {
            mark: { show: true },
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true }
        }
    },
    legend: {
        data:['FTO', 'QuickTest', 'Stress','MDaaS', 'RackTest', 'FTI', 'BSL', 'CTS', 'Packing'],
        bottom: 10,
        left: 'center',
    },
		
        xAxis: {
            type: 'category',
            data: ['FTO', 'QuickTest', 'Stress','MDaaS', 'RackTest', 'FTI', 'BSL', 'CTS', 'Packing']
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: '{value} min'
            }
        },
        series: [
            {
                name:'Duration',
                type:'line',
                data: [FTODuration[0], QuickTestDuration[0], StressDuration[0],MDaaSDuration[0], RackTestDuration[0], FTIDuration[0], BSLDuration[0], CTSDuration[0], PackingDuration[0]],
                markPoint: {
                    data: [
                        {type: 'max', name: 'Max'},
                        {type: 'min', name: 'Min'}
                    ]
                },
                markLine: {
                    data: [
                        {type: 'average', name: 'Average'}
                    ]
                }
            }
        ]
    };

    lineChart.setOption(lineOption);
</script>










<!-- fin de comentario personal -->





</body>
</html>
