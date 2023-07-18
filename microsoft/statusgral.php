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
<?php
include('css/themes.php');
	?>

<script src="js/dataTables/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/cbpHorizontalSlideOutMenu.min.js"></script> 

<script type="text/javascript"> 
    $(document).ready(function(){
		$('[contenteditable="true"]').on('blur', function() {
			var fullId = $(this).attr('id');
			var id = fullId.split('_')[1]; // toma la segunda parte de la cadena dividida, que es el número de serie
			var value = $(this).text();
			console.log("Full ID: " + fullId);
			console.log("ID: " + id);
			console.log("Value: " + value);
			$.ajax({
				url: 'update_comentarios.php',
				type: 'POST',
				data: {
					id: id,
					comentario: value
				},
				success: function(response) {
					// puedes agregar algo aquí para manejar la respuesta del servidor si lo deseas
					console.log(response);
				}
			});
		});
	});
</script>


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
	<section id="Exportar_a_Excel"  >

























<!------------------------------------------------------- Tabla de la pagina web ------------------------------------------------->
			<?php
$consulta = mysqli_query($enlace, "SELECT DISTINCT(WO) FROM racks_copy WHERE Modelo='Microsoft 8.2' OR Modelo='Microsoft 8.3' OR Modelo='NPI'");
while ($datos = mysqli_fetch_row($consulta)) {
    $contador = 1;
    echo '<table class="stgral"><caption><h2>WO: ' . $datos[0] . '</h2></caption>
        <tr><th>No.</th><th>Numero de serie</th><th>WO</th><th>SKU</th><th>Locacion</th><th>Modelo</th>
        <th><div class="verticalText">FTO</div></th><th><div class="verticalText">QuickTest</div></th>
        <th><div class="verticalText">Stress</div></th>
        <th><div class="verticalText">MDaaS</div></th>
        <th><div class="verticalText">RackTest</div></th>
        <th><div class="verticalText">FTI</div>
		</th><th><div class="verticalText">BSL</div></th>
		<th><div class="verticalText">CTS</div></th>
		<th><div class="verticalText">Packing</div></th>
		<th>Hora Inicial</th>
		<th>Hora Final</th> <th>Tiempo Total </th>
		<th>Comentarios </th>
		</tr>
        ';


					$confto=0; $contquicktest=0; $contstress=0; $countmdaas=0; $contracktest=0; $countfti=0; $contbootstrap=0; $contcts=0; $contpacking=0;$terminados=0;
					$consultawo = mysqli_query($enlace, "SELECT * from racks_copy where WO='$datos[0]'");
					while ($datoswo = mysqli_fetch_row($consultawo)) {
						echo "<tr><td class='tdinfo2'>" . $contador . "</td>";
						echo "<td class='tdinfo2'><a style='color:black' href='buscarr.php?NoSerie=" . $datoswo[0] . "'>" . $datoswo[0] . "</a></td>";
						echo "<td class='tdinfo2'>" . $datoswo[1] . "</td>";
						echo "<td class='tdinfo2'>" . $datoswo[2] . "</td>";
						echo "<td class='tdinfo2'>" . $datoswo[4] . "</td>";
						echo "<td class='tdinfo2'>" . $datoswo[5] . "</td>";
				
						$consultawop = mysqli_query($enlace, "SELECT * from pruebasMicro_copy where NoSerie='$datoswo[0]'");
						$contador++;
				
						while ($datoswop = mysqli_fetch_row($consultawop)) {
							for ($i = 2; $i <= 54; $i += 6) {
								$statusValue = $datoswop[$i];
								$status2Value = $datoswop[$i + 1]; 
								$cellContent = '';
								$cellColor = '';
				
								if ($statusValue == 1) {
									$cellColor = '#008000'; 
								} elseif ($statusValue == 0) {
									if ($status2Value == 'Vacio') {
									} elseif ($status2Value == 'Waiting') {
										$cellColor = '#f7a307';
									} elseif ($status2Value == 'Running') {
										$cellColor = '#FFFF00';
									} elseif ($status2Value == 'Fail') {
										$cellColor = '#FF0000'; 
									}
								}
				
								echo "<td bgcolor='$cellColor'>$cellContent</td>";
							}

								
								// Tomar la hora actual si 'PackingHoraFinal' es NULL
								$horaFinal = is_null($datoswop[54]) ? Date('Y-m-d H:i:s') : $datoswop[54];

								$inicio = new DateTime($datoswop[1]);
								$final = new DateTime($horaFinal);
								$interval = $inicio->diff($final);
								$tiempoTranscurrido = $interval->format(' %d d, %h h, %i min');
					
								echo '<td class="tdinfo2">'.$datoswop[1].'</td><td class="tdinfo2">'.$datoswop[54].'</td>';
								echo '<td class="tdinfo2">'.$tiempoTranscurrido.'</td>';  // Muestra el tiempo transcurrido
								echo '<td class="tdinfo2" contenteditable="true" id="comentarios_'.$datoswo[0].'">'.$datoswo[8].'</td></tr>';
							}
						}
						echo '</table>';
						echo '<br><br><br><br><hr>';
					}

	
			 ?>

			</div>

		</div>


<!------------------------------------------------------- TERMINA Tabla de la pagina web ------------------------------------------------->
<center><button id="crearimagen" class="form-control btn1">Crear Imagen</button></center>
		 <!-- El div id="img-out" sera el contenedor en donde visualizaremos la imagen exportada -->


	</section>

	</section>
	<div class="grupo">
	<center><div id="img-out" class="cimagen" style="text-align:center; ">

	</div></center>
</div>
<script type="text/javascript">
	$(function() {
          $("#crearimagen").click(function() {
              html2canvas($("#contenido"), {
                  onrendered: function(canvas) {
                      theCanvas = canvas;
                      document.body.appendChild(canvas);

                      
                    //   canvas.toBlob(function(blob) {
                    //     saveAs(blob, "Dashboard.png");
                    //   });
                      
                  }
              });
          });
      });
</script>	
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
$query = mysqli_query($enlace, "SELECT Comentario3 FROM users WHERE No_Reloj = '$variable'");  ?>

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

<script>

//funcion de AJAX para actualizar la columna comentario
function updateComentarios(id, comentario) {
    $.ajax({
        url: "update_comentarios.php",
        type: "POST",
        data: {
    id: id,
    comentario: value
},
        success: function(data){
            console.log(data);
        }
    });
}
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




</body>
</html>