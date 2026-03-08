<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
include('conexion.php');

if (!isset($_SESSION['Nombre']) || $_SESSION['Nivel'] != '1') {
    ?>
    <center>
        <br><br><br>
        <h1>Debes iniciar sesión </h1>
        <p id="counter"></p>
        <br><br><br>
        <img src='img/icono.png' WIDTH=178 HEIGHT=180>
    </center>
    <script>
        var counter = 4;
        var countdown = setInterval(function() {
            document.getElementById('counter').innerHTML = "Serás redirigido a la página principal en " + counter + " segundos...";
            counter--;
            if (counter < 0) {
                clearInterval(countdown);
                window.location.href = "index.php";
            }
        }, 1000);
    </script>
    <?php
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
								<a href="estadisticas.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Tiempos </a>
						
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
	<div class="grupo2">
			<div class="caja">
	 <div class="exportar" >
	<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p><img src="img/excel.png" width="40" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form></div> <section id="contenido" style="background:white;">
    
<form  style="float:left; " method="post" action="estadisticaswo.php"> <input type="hidden" id="WO" name="WO" value="<?php echo $_REQUEST['WO']; ?>">
<button class="btn1" >Volver</button></form>
<section id="Exportar_a_Excel">
    
    <div class="grupo">
        <div class="caja">
            
			<?php
$WO = $_REQUEST['WO'];
echo '<center><h1>WO: ' . $WO . '</h1></center>';

// Consulta para obtener los datos de las pruebas relacionadas con la WO
$query_pruebas = "SELECT r.NoSerie, r.SKU, r.Locacion, r.Modelo, p.FTOHoraInicial, p.FTOHoraFinal, p.QuickTestHoraInicial, p.QuickTestHoraFinal, p.StressHoraInicial, p.StressHoraFinal, p.MDAASHoraInicial, p.MDAASHoraFinal, p.RackTestHoraInicial, p.RackTestHoraFinal, p.FTIHoraInicial, p.FTIHoraFinal, p.BSLHoraInicial, p.BSLHoraFinal, p.CTSHoraInicial, p.CTSHoraFinal, p.PackingHoraInicial, p.PackingHoraFinal
    FROM racks_copy r
    INNER JOIN pruebasMicro_copy p ON r.NoSerie = p.NoSerie
    WHERE r.WO = '$WO'";

$result_pruebas = mysqli_query($enlace, $query_pruebas);

if ($result_pruebas) {
    while ($row_prueba = mysqli_fetch_assoc($result_pruebas)) {
        $no_serie = $row_prueba['NoSerie'];
        $sku = $row_prueba['SKU'];
        $locacion = $row_prueba['Locacion'];
        $modelo = $row_prueba['Modelo'];

        $pruebas = array();
        $tiempo_total = 0; // Variable para almacenar el tiempo total de todas las pruebas

        // Verificar y agregar la prueba FTO si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_fto = $row_prueba['FTOHoraInicial'];
        $termino_fto = $row_prueba['FTOHoraFinal'];
        if ((!is_null($inicio_fto) && is_null($termino_fto)) || !is_null($inicio_fto)) {
            $termino_fto = is_null($termino_fto) ? date('Y-m-d H:i:s') : $termino_fto; // Hora actual si termino_fto es NULL
            $duracion_fto = sumarTiempo($inicio_fto, $termino_fto);
            $tiempo_total += $duracion_fto;
            $pruebas[] = array('Prueba' => 'FTO', 'Inicio' => $inicio_fto, 'Fin' => $termino_fto, 'Tiempo' => formatearTiempo($duracion_fto));
        }

        // Verificar y agregar la prueba QuickTest si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_quicktest = $row_prueba['QuickTestHoraInicial'];
        $termino_quicktest = $row_prueba['QuickTestHoraFinal'];
        if ((!is_null($inicio_quicktest) && is_null($termino_quicktest)) || !is_null($inicio_quicktest)) {
            $termino_quicktest = is_null($termino_quicktest) ? date('Y-m-d H:i:s') : $termino_quicktest; // Hora actual si termino_quicktest es NULL
            $duracion_quicktest = sumarTiempo($inicio_quicktest, $termino_quicktest);
            $tiempo_total += $duracion_quicktest;
            $pruebas[] = array('Prueba' => 'QuickTest', 'Inicio' => $inicio_quicktest, 'Fin' => $termino_quicktest, 'Tiempo' => formatearTiempo($duracion_quicktest));
        }

        // Verificar y agregar la prueba Stress si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_stress = $row_prueba['StressHoraInicial'];
        $termino_stress = $row_prueba['StressHoraFinal'];
        if ((!is_null($inicio_stress) && is_null($termino_stress)) || !is_null($inicio_stress)) {
            $termino_stress = is_null($termino_stress) ? date('Y-m-d H:i:s') : $termino_stress; // Hora actual si termino_stress es NULL
            $duracion_stress = sumarTiempo($inicio_stress, $termino_stress);
            $tiempo_total += $duracion_stress;
            $pruebas[] = array('Prueba' => 'Stress', 'Inicio' => $inicio_stress, 'Fin' => $termino_stress, 'Tiempo' => formatearTiempo($duracion_stress));
        }

        // Verificar y agregar la prueba MDaaS si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_mdaas = $row_prueba['MDAASHoraInicial'];
        $termino_mdaas = $row_prueba['MDAASHoraFinal'];
        if ((!is_null($inicio_mdaas) && is_null($termino_mdaas)) || !is_null($inicio_mdaas)) {
            $termino_mdaas = is_null($termino_mdaas) ? date('Y-m-d H:i:s') : $termino_mdaas; // Hora actual si termino_mdaas es NULL
            $duracion_mdaas = sumarTiempo($inicio_mdaas, $termino_mdaas);
            $tiempo_total += $duracion_mdaas;
            $pruebas[] = array('Prueba' => 'MDaaS', 'Inicio' => $inicio_mdaas, 'Fin' => $termino_mdaas, 'Tiempo' => formatearTiempo($duracion_mdaas));
        }

        // Verificar y agregar la prueba RackTest si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_racktest = $row_prueba['RackTestHoraInicial'];
        $termino_racktest = $row_prueba['RackTestHoraFinal'];
        if ((!is_null($inicio_racktest) && is_null($termino_racktest)) || !is_null($inicio_racktest)) {
            $termino_racktest = is_null($termino_racktest) ? date('Y-m-d H:i:s') : $termino_racktest; // Hora actual si termino_racktest es NULL
            $duracion_racktest = sumarTiempo($inicio_racktest, $termino_racktest);
            $tiempo_total += $duracion_racktest;
            $pruebas[] = array('Prueba' => 'RackTest', 'Inicio' => $inicio_racktest, 'Fin' => $termino_racktest, 'Tiempo' => formatearTiempo($duracion_racktest));
        }

        // Verificar y agregar la prueba FTI si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_fti = $row_prueba['FTIHoraInicial'];
        $termino_fti = $row_prueba['FTIHoraFinal'];
        if ((!is_null($inicio_fti) && is_null($termino_fti)) || !is_null($inicio_fti)) {
            $termino_fti = is_null($termino_fti) ? date('Y-m-d H:i:s') : $termino_fti; // Hora actual si termino_fti es NULL
            $duracion_fti = sumarTiempo($inicio_fti, $termino_fti);
            $tiempo_total += $duracion_fti;
            $pruebas[] = array('Prueba' => 'FTI', 'Inicio' => $inicio_fti, 'Fin' => $termino_fti, 'Tiempo' => formatearTiempo($duracion_fti));
        }

        // Verificar y agregar la prueba BSL si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_bsl = $row_prueba['BSLHoraInicial'];
        $termino_bsl = $row_prueba['BSLHoraFinal'];
        if ((!is_null($inicio_bsl) && is_null($termino_bsl)) || !is_null($inicio_bsl)) {
            $termino_bsl = is_null($termino_bsl) ? date('Y-m-d H:i:s') : $termino_bsl; // Hora actual si termino_bsl es NULL
            $duracion_bsl = sumarTiempo($inicio_bsl, $termino_bsl);
            $tiempo_total += $duracion_bsl;
            $pruebas[] = array('Prueba' => 'BSL', 'Inicio' => $inicio_bsl, 'Fin' => $termino_bsl, 'Tiempo' => formatearTiempo($duracion_bsl));
        }

        // Verificar y agregar la prueba CTS si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_cts = $row_prueba['CTSHoraInicial'];
        $termino_cts = $row_prueba['CTSHoraFinal'];
        if ((!is_null($inicio_cts) && is_null($termino_cts)) || !is_null($inicio_cts)) {
            $termino_cts = is_null($termino_cts) ? date('Y-m-d H:i:s') : $termino_cts; // Hora actual si termino_cts es NULL
            $duracion_cts = sumarTiempo($inicio_cts, $termino_cts);
            $tiempo_total += $duracion_cts;
            $pruebas[] = array('Prueba' => 'CTS', 'Inicio' => $inicio_cts, 'Fin' => $termino_cts, 'Tiempo' => formatearTiempo($duracion_cts));
        }

        // Verificar y agregar la prueba Packing si existe hora inicial y hora final es NULL o si la hora inicial no es NULL
        $inicio_packing = $row_prueba['PackingHoraInicial'];
        $termino_packing = $row_prueba['PackingHoraFinal'];
        if ((!is_null($inicio_packing) && is_null($termino_packing)) || !is_null($inicio_packing)) {
            $termino_packing = is_null($termino_packing) ? date('Y-m-d H:i:s') : $termino_packing; // Hora actual si termino_packing es NULL
            $duracion_packing = sumarTiempo($inicio_packing, $termino_packing);
            $tiempo_total += $duracion_packing;
            $pruebas[] = array('Prueba' => 'Packing', 'Inicio' => $inicio_packing, 'Fin' => $termino_packing, 'Tiempo' => formatearTiempo($duracion_packing));
        }

        // Mostrar los datos de las pruebas para cada NoSerie
        if (!empty($pruebas)) {
            echo '<center><table class="tablamodal"><caption><h2>Rack: ' . $no_serie . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SKU: ' . $sku . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Locación: ' . $locacion . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modelo: ' . $modelo . '</h2></caption><tr><th>Prueba</th><th>Inicio</th> <th>Fin</th><th>Tiempo (Días Horas Minutos)</th></tr>';
            foreach ($pruebas as $prueba) {
                echo '<tr><td>' . $prueba['Prueba'] . '</td><td>' . $prueba['Inicio'] . '</td><td>' . $prueba['Fin'] . '</td><td>' . $prueba['Tiempo'] . '</td></tr>';
            }
            
            echo '<tr><td colspan="3"></td><td style="text-align: left;"><h1>Tiempo Total: ' . formatearTiempo($tiempo_total) . '</h1></td></tr>';
            echo '<tr><td colspan="4"><hr></td></tr>';
            
        }
    }
} else {
    echo 'Error en la consulta: ' . mysqli_error($enlace);
}

// Función para sumar el tiempo en minutos
function sumarTiempo($inicio, $termino) {
    $fecha_inicio = new DateTime($inicio);
    $fecha_termino = new DateTime($termino);
    $intervalo = $fecha_inicio->diff($fecha_termino);

    $dias = $intervalo->d;
    $horas = $intervalo->h;
    $minutos = $intervalo->i;

    return ($dias * 24 * 60) + ($horas * 60) + $minutos;
}

// Función para formatear el tiempo en días, horas y minutos
function formatearTiempo($minutos) {
    $dias = floor($minutos / 1440);
    $horas = floor(($minutos % 1440) / 60);
    $minutos = $minutos % 60;

    $tiempo_formateado = '';
    if ($dias > 0) {
        $tiempo_formateado .= $dias . 'd ';
    }
    if ($horas > 0) {
        $tiempo_formateado .= $horas . 'h ';
    }
    if ($minutos > 0) {
        $tiempo_formateado .= $minutos . 'm';
    }

    return $tiempo_formateado;
}
?>
























			</div>
		</div>
	</section>

  <!-- ********************ccomentario perosnal***********************************-->


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


