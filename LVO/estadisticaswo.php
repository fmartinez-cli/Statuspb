<?php

include('conexion.php');

session_start();
if(!isset($_REQUEST['WO'])){
							header("Location: estadisticas.php");
							}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Estadisticas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- *********************Stylos *********************-->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/stylef.css">
	<link rel="stylesheet" href="../css/popup.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css" />
	<link rel="shortcut icon" href="../img/checkicon.png" />
	<link rel="stylesheet" href="../css/component.css">
	<link rel="stylesheet" href="../css/moodalbox.css">
<?php
include('../css/themes.php');
	?>

	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="style/popup.css">

	<!-- scripts -->
	<script type="text/javascript"> function myFunction() {
		document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
	}
	function justNumbers(e)
	{
		var keynum = window.event ? window.event.keyCode : e.which;
		if ((keynum == 8))
			return true;

		return /\d/.test(String.fromCharCode(keynum));
	}
</script>
<script type="text/javascript" src="../js/mootools.js"></script>
 <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/moodalbox.js"></script>
<link rel="stylesheet" href="style/moodalbox.css" type="text/css" media="screen"/>
<script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
     	$("#FormularioExportacion").submit();
});
});
</script>
<script src="../dist/Chart.bundle.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>
<body class="desarroll">

	<header>
	<div class="grupo ">
		<div class="caja">
			<div class="container">
				<header class="clearfix header2">
					<span>Ingenieria de pruebas</span>
					<a href="/Statuspb/index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs</h1></a>

				<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
				<?php
				if (isset($_SESSION['Nombre'])&& $_SESSION['Nivel']==1){
					echo '
				<div class="" style=" position:absolute; right:10px; top:10px;"> <a class="" href="administrar.php"><img width="25" src="../img/admin.png"></a></div><br>
			';
				}


				?>
				</header>
			</div>
		</div>
	</div>
		<div class="grupo total">
			<div class="grupo total">
			<div class="caja">
				<center>	<nav>
					<ul class="topnav">
						<li ><a  class="hvr-underline-from-center" href="index.php"><img width="15" src="../img/home.png"> Inicio</a></li>
						<li style=""><a  class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia2.php"><img width="10" src="../img/bay.png"> Bahia 2</a></li>
						<li><a class="hvr-underline-from-center" href="bahia3.php"><img width="10" src="../img/bay.png"> Bahia 3</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia4.php"><img width="10" src="../img/bay.png"> Bahia 4</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia5.php"><img width="10" src="../img/bay.png"> Bahia 5</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia6.php"><img width="10" src="../img/bay.png"> Bahia 6</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia7.php"><img width="10" src="../img/bay.png"> Bahia 7</a></li>
						<li><a  class="hvr-underline-from-center" href="golden.php"><img width="15" src="../img/golden.png"> Golden Rack</a></li>
						<li><a style="color:#59ABE3; font-weight:bold;" class="hvr-underline-from-center" href="estadisticas.php"><img width="25" src="../img/estadisticas.png"> Estad&iacute;sticas</a></li>
						<li><a class="hvr-underline-from-center" href="statusgral.php"><img width="32" src="../img/status.png"> Estatus General</a></li>
						<?php  if(isset($_SESSION['Nombre'])){ echo '<li><a class="hvr-underline-from-center" href="logout.php"><img width="25" src="../img/logout.png"></a></li>';}
						else{ echo '<li><a class="hvr-underline-from-center" href="#modal"><img width="25" src="../img/login.png"></a></li>'; }?>
						<li class="icon">
							<a href="javascript:void(0);" onclick="myFunction()">&#9776;</a></li>
						</ul>

					</nav></center>



				</div>
			</div>
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
	<div class="grupo">
<div class="caja">

	<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p class="exportar"><img src="../img/excel.png" width="40" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>



<form style="float:left;" method="post" action="estadisticasporrack.php"> <input type="hidden" id="WO" name="WO" value="<?php echo $_REQUEST['WO']; ?>">
<button class="btn1" >Estadisticas por Rack</button></form>

	<section>

<br><br><br><br>
	<div class="grupo" id="Exportar_a_Excel">
	<div class="caja">
			<?php
			$WO=$_REQUEST['WO'];
			echo '
			<center><h1>WO: '.$WO.'</h1></center>
			<h2 style="color:#22A7F0">XTEE</h2><table class="tablastadis"><tr><th>No.</th> <th>Rack</th> <th>WO</th> <th>Prueba</th> <th>Inicio</th> <th>Termino</th> <th>Total H.</th> <th>Estimado</th></tr>';
			$consulta=mysqli_query($enlace, "SELECT * from racksterminados WHERE WO='$WO'");
			$cont=0; $suma=0; $promedio=0; $mayor=0; $menor=999999;$rackmin=''; $rackmay='';
			$racks='';
			 $horasx=''; $horasc=''; $horass=''; $horasb=''; $contadorx=1; $contadorc=1; $contadors=1; $contadorb=1;
			while($datos=mysqli_fetch_row($consulta)){
						echo '<tr><td style="width:40px;">'.$contadorx.'</td><td>'.$datos[1].'</td><td>'.$datos[2].'</td><td>XTEE</td>';
						$consulta2=mysqli_query($enlace, "SELECT * from pruebasterminados WHERE NoSerie='$datos[1]'");

						$racks = $racks.',"'.$datos[1].'"';

              $contadorx++;
						while($datos2=mysqli_fetch_row($consulta2)){
							$inicio = new DateTime($datos2[11]);
							$final = new DateTime($datos2[14]);
							$interval = $inicio->diff($final);
							$dias = $interval->d;
							$horas = $interval->h;

							$horadias = $dias * 24;
							$minutos = ($interval->i)/60;
							$total= $horas+$minutos+$horadias;
							$cont++;
							$suma=$suma+$total;
							$totfinal= number_format($total, '2', '.', ',');
							if($menor>$total){
								$menor=$total;
								$rackmin=$datos[1];

							}

							if($mayor<$total){
								$mayor=$total;
								$rackmay=$datos[1];
							}

							echo '<td>'.$datos2[11].'</td><td>'.$datos2[14].'</td><td>'.$totfinal.'</td><td>22</td></tr>';
							}
							$horasx = $horasx .','. $totfinal;
						}
					$promedio=$suma/$cont;
					$mayfinal = 	 number_format($mayor, '2', '.', ',');
					$menfinal =	number_format($menor, '2', '.', ',');
					$promfinal = number_format($promedio, '2', '.', ',');
					echo '

			<tr><th colspan="2">Tiempo Maximo</th><th>Rack max</th><th>Tiempo Minimo</th><th>Rack Min</th><th colspan="3">Promedio</th></tr>
			<tr><td colspan="2">'.$mayfinal.'</td><td>'.$rackmay.'</td><td>'.$menfinal.'</td><td>'.$rackmin.'</td><td colspan="3">'.$promfinal.'</td></tr>
			</tr></table><br><br>';

			 ?>




		<!-- *************************************************************************CLUSTER********************************************************* -->

			<?php
			$WO=$_REQUEST['WO'];
			echo '<br><br><br><h2 style="color:#22A7F0">FTO</h2><table class="tablastadis"><tr><th>No.</th> <th>Rack</th> <th>WO</th> <th>Prueba</th> <th>Inicio</th> <th>Termino</th> <th>Total H.</th> <th>Estimado</th></tr>';
			$consulta=mysqli_query($enlace, "SELECT * from racksterminados WHERE WO='$WO'");
			$cont=0; $suma=0; $promedio=0; $mayor=0; $menor=999999; $rackmin=''; $rackmay='';
			while($datos=mysqli_fetch_row($consulta)){
						echo '<tr><td style="width:40px;">'.$contadorc.'</td><td>'.$datos[1].'</td><td>'.$datos[2].'</td><td>FTO</td>';
						$consulta2=mysqli_query($enlace, "SELECT * from pruebasterminados WHERE NoSerie='$datos[1]'");
						$contadorc++;
						while($datos2=mysqli_fetch_row($consulta2)){
							$inicio = new DateTime($datos2[14]);
							$final = new DateTime($datos2[17]);
							$interval = $inicio->diff($final);
							$dias = $interval->d;
							$horas = $interval->h;

							$horadias = $dias * 24;
							$minutos = ($interval->i)/60;
							$total= $horas+$minutos+$horadias;
							$cont++;
							$suma=$suma+$total;
							$totfinal= number_format($total, '2', '.', ',');
							if($menor>$total){
								$menor=$total;
								$rackmin=$datos[1];

							}

							if($mayor<$total){
								$mayor=$total;
								$rackmay=$datos[1];
							}
							echo '<td>'.$datos2[14].'</td><td>'.$datos2[17].'</td><td>'.$totfinal.'</td><td>22</td></tr>';
							}
							$horasc = $horasc .','. $totfinal;
						}
					$promedio=$suma/$cont;
						$mayfinal = 	 number_format($mayor, '2', '.', ',');
					$menfinal =	number_format($menor, '2', '.', ',');
					$promfinal = number_format($promedio, '2', '.', ',');
					echo '

			<tr><th colspan="2">Tiempo Maximo</th><th>Rack max</th><th>Tiempo Minimo</th><th>Rack Min</th><th colspan="3">Promedio</th></tr>
			<tr><td colspan="2">'.$mayfinal.'</td><td>'.$rackmay.'</td><td>'.$menfinal.'</td><td>'.$rackmin.'</td><td colspan="3">'.$promfinal.'</td></tr>
			</tr></table><br><br>';

			 ?>

			<!-- ***********************************************************SOLAR********************************************************************** -->


			<?php
			$WO=$_REQUEST['WO'];
			echo '<br><br><br><h2 style="color:#22A7F0">Solar</h2><table class="tablastadis"><tr><th>No.</th> <th>Rack</th> <th>WO</th> <th>Prueba</th> <th>Inicio</th> <th>Termino</th> <th>Total H.</th> <th>Estimado</th></tr>';
			$consulta=mysqli_query($enlace, "SELECT * from racksterminados WHERE WO='$WO'");
			$cont=0; $suma=0; $promedio=0; $mayor=0; $menor=999999; $rackmin=''; $rackmay='';
			while($datos=mysqli_fetch_row($consulta)){
						echo '<tr><td style="width:40px;">'.$contadors.'</td><td>'.$datos[1].'</td><td>'.$datos[2].'</td><td>SOLAR</td>';
						$consulta2=mysqli_query($enlace, "SELECT * from pruebasterminados WHERE NoSerie='$datos[1]'");
						$contadors++;
						while($datos2=mysqli_fetch_row($consulta2)){
							$inicio = new DateTime($datos2[17]);
							$final = new DateTime($datos2[20]);
							$interval = $inicio->diff($final);
							$dias = $interval->d;
							$horas = $interval->h;

							$horadias = $dias * 24;
							$minutos = ($interval->i)/60;
							$total= $horas+$minutos+$horadias;
							$totfinal= number_format($total, '2', '.', ',');
							$cont++;
							$suma=$suma+$total;

							if($menor>$total){
								$menor=$total;
								$rackmin=$datos[1];

							}

							if($mayor<$total){
								$mayor=$total;
								$rackmay=$datos[1];
							}
							echo '<td>'.$datos2[17].'</td><td>'.$datos2[20].'</td><td>'.$totfinal.'</td><td>22</td></tr>';
							}
							$horass = $horass .','. $totfinal;
						}
					$promedio=$suma/$cont;
					$mayfinal = 	 number_format($mayor, '2', '.', ',');
					$menfinal =	number_format($menor, '2', '.', ',');
					$promfinal = number_format($promedio, '2', '.', ',');
					echo '

			<tr><th colspan="2">Tiempo Maximo</th><th>Rack max</th><th>Tiempo Minimo</th><th>Rack Min</th><th colspan="3">Promedio</th></tr>
			<tr><td colspan="2">'.$mayfinal.'</td><td>'.$rackmay.'</td><td>'.$menfinal.'</td><td>'.$rackmin.'</td><td colspan="3">'.$promfinal.'</td></tr>
			</tr></table><br><br>';

			 ?>


		<!-- ******************************************************************BLS ***************************************************************** -->

			<?php
			$WO=$_REQUEST['WO'];
			echo '<br><br><br><h2 style="color:#22A7F0">Bootstrap</h2><table class="tablastadis"><tr> <th>No.</th><th>Rack</th> <th>WO</th> <th>Prueba</th> <th>Inicio</th> <th>Termino</th> <th>Total H.</th> <th>Estimado</th></tr>';
			$consulta=mysqli_query($enlace, "SELECT * from racksterminados WHERE WO='$WO'");
			$cont=0; $suma=0; $promedio=0; $mayor=0; $menor=999999; $rackmin=''; $rackmay='';
			while($datos=mysqli_fetch_row($consulta)){
						echo '<tr><td style="width:40px;">'.$contadorb.'</td><td>'.$datos[1].'</td><td>'.$datos[2].'</td><td>BOOTSTRAP</td>';
						$consulta2=mysqli_query($enlace, "SELECT * from pruebasterminados WHERE NoSerie='$datos[1]'");
						$contadorb++;
						while($datos2=mysqli_fetch_row($consulta2)){
							$inicio = new DateTime($datos2[26]);
							$final = new DateTime($datos2[29]);
							$interval = $inicio->diff($final);
							$dias = $interval->d;
							$horas = $interval->h;

							$horadias = $dias * 24;
							$minutos = ($interval->i)/60;
							$total= $horas+$minutos+$horadias;
							$cont++;
							$suma=$suma+$total;
							$totfinal= number_format($total, '2', '.', ',');
							if($menor>$total){
								$menor=$total;
								$rackmin=$datos[1];

							}

							if($mayor<$total){
								$mayor=$total;
								$rackmay=$datos[1];
							}
							echo '<td>'.$datos2[26].'</td><td>'.$datos2[29].'</td><td>'.$totfinal.'</td><td>22</td></tr>

							';
							}
							$horasb = $horasb .','. $totfinal;
						}
					$promedio=$suma/$cont;
					$mayfinal = 	 number_format($mayor, '2', '.', ',');
					$menfinal =	number_format($menor, '2', '.', ',');
					$promfinal = number_format($promedio, '2', '.', ',');
					echo '

			<tr><th colspan="2">Tiempo Maximo</th><th>Rack max</th><th>Tiempo Minimo</th><th>Rack Min</th><th colspan="3">Promedio</th></tr>
			<tr><td colspan="2">'.$mayfinal.'</td><td>'.$rackmay.'</td><td>'.$menfinal.'</td><td>'.$rackmin.'</td><td colspan="3">'.$promfinal.'</td></tr>
			</tr></table><br><br>';

			 ?>




</div>
</div>
</section>


<!-- *****************************************************************GRAFICA XTEE******************************************************** -->

<section>
<div class="grupo">
<div class="caja">
<!--  -->


			 <div id="container" style="width: 100%;">
      		  <canvas id="canvas"></canvas>
   			 </div>
   <script>
        var randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };

        var barChartData = {
            labels: [<?php echo $racks; ?>],
            datasets: [{
                type: 'bar',
                label: 'XTEE',
                backgroundColor: "rgba(34, 167, 240,0.5)",
                data: [<?php echo $horasx; ?>],
                borderColor: 'white',
                borderWidth: 2
            }, {
                type: 'bar',
                label: 'Cluster',
                backgroundColor: "rgba(108, 122, 137,0.5)",
                data: [<?php echo $horasc ?>],
                borderColor: 'white',
                borderWidth: 2
            }, {
                type: 'bar',
                label: 'Solar',
                backgroundColor: "rgba(249, 191, 59,0.5)",
                data: [<?php echo $horass; ?>]
            }, {
                type: 'bar',
                label: 'Bootstrap',
                backgroundColor: "rgba(46, 204, 113,0.5)",
                data: [<?php echo $horasb; ?>]
            },
            ]

        };
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Chart.js Combo Bar Line Chart'
                    }
                }
            });
        };

        $('#randomizeData').click(function() {
            $.each(barChartData.datasets, function(i, dataset) {
                dataset.backgroundColor = 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
                dataset.data = [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()];

            });
            window.myBar.update();
        });
    </script>











<!-- ******************************************************************************************************************************************** -->







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
<?php } ?>
