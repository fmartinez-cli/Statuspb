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
	<title>Estatus general</title>
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
	<link rel="stylesheet" href="css/dataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables/buttons.dataTables.min.css">

<?php
include('css/themes.php');
	?>

<script src="js/dataTables/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/cbpHorizontalSlideOutMenu.min.js"></script> 




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



<!------------------------------------------------------------INICIA BODY------------------------------------------------------------->


<body class="desarroll">



<!--------------------------------------------------------- INICIA HEADER ---------------------------------------------------------------->


<header style="background-image: url('img/try6.jpg');">
	<div class="grupo ">
		<div class="caja">
			<div class="container">
				<header class="clearfix header2">
					<span>Ingenieria de pruebas</span>
					<a href="/Statuspb/index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Microsoft Azure</h1></a>

					<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
						<?php
				if (isset($_SESSION['Nombre'])&& $_SESSION['Nivel']==1){
					echo '
				<div class="" style=" position:absolute; right:5px; top:5px;"> <a class="" href="administrar.php"><img width="25" src="img/admin.png"></a></div><br>
			';
				}


				?>
				</header>

<!--------------------------------------------------------- TERMINA HEADER -------------------------------------------------------------->



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
	</header>
	<section>

    <!-- manual -->
    <section>
    	<div class="grupo">
    		<div class="caja">
    		<a href="manual.php#gral">
    			<div class="" title="Manual" style="color:#3e3e3e; width:45px; height:40px; font-size:30px; text-align:center; position:fixed; bottom:10px; left:5px;"><i class="fa fa-question-circle" aria-hidden="true"></i>
    			</div>
    		</a>
    		</div>
    	</div>
    </section>
    <br> <br>

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

<!------------------------------------------------ TERMINA EL MENU DE NAVEGACION, JUNTO CON LA LOGICA DEL BOTON DE EXPORTAR A EXCEL -------------------------------------------------------------------------------------------->














<!------------------------------------------------------ INICIA EL BODY Y SU CONTENIDO (Tabla y boton para buscar estadisticas por rack) ------------------------------------------------------->

<form style="float:left;" method="post" action="estadisticasporrack.php"> <input type="hidden" id="WO" name="WO" value="<?php echo $_REQUEST['WO']; ?>">
<button class="btn1" >Estadisticas por Rack</button></form>

	<section>

<br><br><br><br>
	


<?php
$log_file = '/var/www/html/error_statuspb';
file_put_contents($log_file, print_r($_POST, true), FILE_APPEND);
$WO = $_POST['WO'];

echo '<center><h1>WO: ' . $WO . '</h1></center>';
echo '<div class="data-table-container">';
echo '<table id="tabla-pruebas" class="display" style="width:100%">';
echo '<thead><tr><th class="text-center">No.</th><th class="text-center">Rack</th><th class="text-center">WO</th><th class="text-center">Prueba</th><th class="text-center">Inicio</th><th class="text-center">Termino</th><th class="text-center">Tiempo Total</th></tr></thead>';
echo '<tbody>';

// Consulta para obtener los NoSerie de los racks asociados a la WO
$query_racks = mysqli_query($enlace, "SELECT NoSerie FROM racks_copy WHERE WO = '$WO'");

$contadorx = 1; // Inicializamos el contador

while ($rack_row = mysqli_fetch_assoc($query_racks)) {
    $rack = $rack_row['NoSerie'];

    // Consulta para obtener los tiempos asociados al NoSerie
    $query_tiempo = mysqli_query($enlace, "SELECT FTOHoraInicial, FTOHoraFinal, QuickTestHoraInicial, QuickTestHoraFinal, StressHoraInicial, StressHoraFinal, MDaaSHoraInicial, MDaaSHoraFinal, RackTestHoraInicial, RackTestHoraFinal, FTIHoraInicial, FTIHoraFinal, BSLHoraInicial, BSLHoraFinal, CTSHoraInicial, CTSHoraFinal, PackingHoraInicial, PackingHoraFinal FROM pruebasMicro_copy WHERE NoSerie = '$rack'");
    $tiempo_row = mysqli_fetch_assoc($query_tiempo);

    $inicio_fto = $tiempo_row['FTOHoraInicial'];
    $termino_fto = $tiempo_row['FTOHoraFinal'];
    $inicio_quicktest = $tiempo_row['QuickTestHoraInicial'];
    $termino_quicktest = $tiempo_row['QuickTestHoraFinal'];
    $inicio_stress = $tiempo_row['StressHoraInicial'];
    $termino_stress = $tiempo_row['StressHoraFinal'];
    $inicio_mdaas = $tiempo_row['MDaaSHoraInicial'];
    $termino_mdaas = $tiempo_row['MDaaSHoraFinal'];
    $inicio_racktest = $tiempo_row['RackTestHoraInicial'];
    $termino_racktest = $tiempo_row['RackTestHoraFinal'];
    $inicio_fti = $tiempo_row['FTIHoraInicial'];
    $termino_fti = $tiempo_row['FTIHoraFinal'];
    $inicio_bsl = $tiempo_row['BSLHoraInicial'];
    $termino_bsl = $tiempo_row['BSLHoraFinal'];
    $inicio_cts = $tiempo_row['CTSHoraInicial'];
    $termino_cts = $tiempo_row['CTSHoraFinal'];
    $inicio_packing = $tiempo_row['PackingHoraInicial'];
    $termino_packing = $tiempo_row['PackingHoraFinal'];

    // Si FTOHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_fto)) {
        $termino_fto = date('Y-m-d H:i:s');
    }

    // Si QuickTestHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_quicktest)) {
        $termino_quicktest = date('Y-m-d H:i:s');
    }

    // Si StressHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_stress)) {
        $termino_stress = date('Y-m-d H:i:s');
    }

    // Si MDaaSHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_mdaas)) {
        $termino_mdaas = date('Y-m-d H:i:s');
    }

    // Si RackTestHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_racktest)) {
        $termino_racktest = date('Y-m-d H:i:s');
    }

    // Si FTIHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_fti)) {
        $termino_fti = date('Y-m-d H:i:s');
    }

    // Si BSLHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_bsl)) {
        $termino_bsl = date('Y-m-d H:i:s');
    }

    // Si CTSHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_cts)) {
        $termino_cts = date('Y-m-d H:i:s');
    }

    // Si PackingHoraFinal es NULL, se toma la hora del sistema
    if (is_null($termino_packing)) {
        $termino_packing = date('Y-m-d H:i:s');
    }

    // Cálculo del total de horas de FTO
    $inicio_fto_dt = new DateTime($inicio_fto);
    $termino_fto_dt = new DateTime($termino_fto);
    $intervalo_fto = $inicio_fto_dt->diff($termino_fto_dt);
    $total_fto = $intervalo_fto->format('%H:%I:%S');

    // Cálculo del total de horas de QuickTest
    $inicio_quicktest_dt = new DateTime($inicio_quicktest);
    $termino_quicktest_dt = new DateTime($termino_quicktest);
    $intervalo_quicktest = $inicio_quicktest_dt->diff($termino_quicktest_dt);
    $total_quicktest = $intervalo_quicktest->format('%H:%I:%S');

    // Cálculo del total de horas de Stress
    $inicio_stress_dt = new DateTime($inicio_stress);
    $termino_stress_dt = new DateTime($termino_stress);
    $intervalo_stress = $inicio_stress_dt->diff($termino_stress_dt);
    $total_stress = $intervalo_stress->format('%H:%I:%S');

    // Cálculo del total de horas de MDaaS
    $inicio_mdaas_dt = new DateTime($inicio_mdaas);
    $termino_mdaas_dt = new DateTime($termino_mdaas);
    $intervalo_mdaas = $inicio_mdaas_dt->diff($termino_mdaas_dt);
    $total_mdaas = $intervalo_mdaas->format('%H:%I:%S');

    // Cálculo del total de horas de RackTest
    $inicio_racktest_dt = new DateTime($inicio_racktest);
    $termino_racktest_dt = new DateTime($termino_racktest);
    $intervalo_racktest = $inicio_racktest_dt->diff($termino_racktest_dt);
    $total_racktest = $intervalo_racktest->format('%H:%I:%S');

    // Cálculo del total de horas de FTI
    $inicio_fti_dt = new DateTime($inicio_fti);
    $termino_fti_dt = new DateTime($termino_fti);
    $intervalo_fti = $inicio_fti_dt->diff($termino_fti_dt);
    $total_fti = $intervalo_fti->format('%H:%I:%S');

    // Cálculo del total de horas de BSL
    $inicio_bsl_dt = new DateTime($inicio_bsl);
    $termino_bsl_dt = new DateTime($termino_bsl);
    $intervalo_bsl = $inicio_bsl_dt->diff($termino_bsl_dt);
    $total_bsl = $intervalo_bsl->format('%H:%I:%S');

    // Cálculo del total de horas de CTS
    $inicio_cts_dt = new DateTime($inicio_cts);
    $termino_cts_dt = new DateTime($termino_cts);
    $intervalo_cts = $inicio_cts_dt->diff($termino_cts_dt);
    $total_cts = $intervalo_cts->format('%H:%I:%S');

    // Cálculo del total de horas de Packing
    $inicio_packing_dt = new DateTime($inicio_packing);
    $termino_packing_dt = new DateTime($termino_packing);
    $intervalo_packing = $inicio_packing_dt->diff($termino_packing_dt);
    $total_packing = $intervalo_packing->format('%H:%I:%S');

    // Lógica para mostrar los racks y tiempos en la tabla
    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">FTO</td>';
    echo '<td class="text-center">' . $inicio_fto . '</td>';
    echo '<td class="text-center">' . $termino_fto . '</td>';
    echo '<td class="text-center">' . $total_fto . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">QuickTest</td>';
    echo '<td class="text-center">' . $inicio_quicktest . '</td>';
    echo '<td class="text-center">' . $termino_quicktest . '</td>';
    echo '<td class="text-center">' . $total_quicktest . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">Stress</td>';
    echo '<td class="text-center">' . $inicio_stress . '</td>';
    echo '<td class="text-center">' . $termino_stress . '</td>';
    echo '<td class="text-center">' . $total_stress . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">MDaaS</td>';
    echo '<td class="text-center">' . $inicio_mdaas . '</td>';
    echo '<td class="text-center">' . $termino_mdaas . '</td>';
    echo '<td class="text-center">' . $total_mdaas . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">RackTest</td>';
    echo '<td class="text-center">' . $inicio_racktest . '</td>';
    echo '<td class="text-center">' . $termino_racktest . '</td>';
    echo '<td class="text-center">' . $total_racktest . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">FTI</td>';
    echo '<td class="text-center">' . $inicio_fti . '</td>';
    echo '<td class="text-center">' . $termino_fti . '</td>';
    echo '<td class="text-center">' . $total_fti . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">BSL</td>';
    echo '<td class="text-center">' . $inicio_bsl . '</td>';
    echo '<td class="text-center">' . $termino_bsl . '</td>';
    echo '<td class="text-center">' . $total_bsl . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">CTS</td>';
    echo '<td class="text-center">' . $inicio_cts . '</td>';
    echo '<td class="text-center">' . $termino_cts . '</td>';
    echo '<td class="text-center">' . $total_cts . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="text-center">' . $contadorx . '</td>';
    echo '<td class="text-center">' . $rack . '</td>';
    echo '<td class="text-center">' . $WO . '</td>';
    echo '<td class="text-center">Packing</td>';
    echo '<td class="text-center">' . $inicio_packing . '</td>';
    echo '<td class="text-center">' . $termino_packing . '</td>';
    echo '<td class="text-center">' . $total_packing . '</td>';
    echo '</tr>';

    $contadorx++; // Incrementamos el contador
}

echo '</tbody>';
echo '</table>';
echo '</div>';
?>


    
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla-pruebas').DataTable({
                dom: '<"data-table-top"Bfl>t<"data-table-bottom"ip>',
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'Column Visibility'
                    },
                    {
                        extend: 'copy',
                        text: 'Copy'
                    },
                    {
                        extend: 'csv',
                        text: 'Excel'
                    },
                    {
                        extend: 'excel',
                        text: 'Excel'
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: 'Print'
                    }
                ],
                lengthMenu: [10, 25, 50, 75, 100] // Selector de entradas
            });
        });
    </script>



			

	<!-- ********************comentario personal***********************************-->


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



	<!-- nota 1*************************************************************************************************** -->
	<div id="miVentana" style="position: fixed; width: 900px; height: 600px; top: 0; left: 0;
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

	<?php
	$variable= $_SESSION['No_Reloj'];
	$query = mysqli_query($enlace, "SELECT Comentario FROM users WHERE No_Reloj = '$variable'");  ?>

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



	<!-- fin de comentario personal -->





</body>
</html>

