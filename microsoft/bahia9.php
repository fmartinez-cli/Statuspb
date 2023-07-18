<?php
include('conexion.php');
include('consultas9.php');

session_start();
?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="img/checkicon.png" />
<head>
	<title>Bahia 9</title>
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
include('../microsoft/css/themes.php');
	?>

	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>


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
<script>
    function go(loc){
        alert(loc);
        document.getElementById('myframe').src = loc;
    }
</script>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/cbpHorizontalSlideOutMenu.min.js"></script>
<script type="text/javascript" src="js/mootools.js"></script>
<script type="text/javascript" src="js/moodalbox.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/block.js"></script>

<!-- <link rel="stylesheet" href="../microsoft/css/moodalbox.css" type="text/css" media="screen"/> -->

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
								<a href="../microsoft/estadisticas.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas </a>
						
							</li>
							<li>
							<li><a href="../microsoft/statusgral.php"><img width="32" src="img/status.png"> Estatus General</a></li>
						
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
		<!---------------------------------------------------- Iicia la seccion del manual --------------------------------------------------------------------------------------->
		<section>
				<div class="grupo">
					<div class="caja">
					<a href="../microsoft/manual.php">
						<div class="" title="Manual" style="color:#3e3e3e; width:45px; height:40px; font-size:30px; text-align:center; position:fixed; bottom:5px; left:5px;"><i class="fa fa-question-circle" aria-hidden="true"></i>
						</div>
					</a>
					</div>
				</div>
			</section>
			<br> <br>	
		<!---------------------------------------------------- Acaba la seccion del manual --------------------------------------------------------------------------------------->	
	</header>
<!-------------------------------------------------- Leyenda de los tipos de Racks en las bahias--------------------------------------------------------------------------------------------------------------------------------------------->
	<section>
	<div class="grupo" style="text-align:left;">
  <div class="caja">
    <div style="opacity:.7; float:left; text-align:center; height:33px; margin-top:5px; padding:5px; background-color:#3e3e3e; font-weight:bold; color:white;">Disponible</div>
    <div style="opacity:.7; float:left; text-align:center; height:33px; margin-top:5px; padding:5px; background-color:#049372; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Microsoft 8.3</div>
    <div style="opacity:.7; float:left; text-align:center; height:33px; margin-top:5px; padding:5px; background-color:#CC263A; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Microsoft NPI</div>
    <div style="opacity:.7; float:left; text-align:center; height:33px; margin-top:5px; padding:5px; background-color:#2574A9; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Microsoft 8.2</div>
  </div>
</div>
<!-------------------------------------------------- Leyenda de los tipos de Racks en las bahias--------------------------------------------------------------------------------------------------------------------------------------------->
<table>
	<tr>
	<td id="open81" class="_<?php echo ($contr81['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr81['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr81['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup81" class="link1" href="modales.php?pb=<?php echo "$NoSerie81"; ?>&tr=TR09-81" rel="moodalbox"><div class="link">TR09-81 <hr> <br><?php echo $Prueba81; echo "</br>".$NoSerie81; ?></div></a></td>
	<td id="open82" class="_<?php echo ($contr82['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr82['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr82['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup82" class="link1" href="modales.php?pb=<?php echo "$NoSerie82"; ?>&tr=TR09-82" rel="moodalbox"><div class="link">TR09-82 <hr> <br><?php echo $Prueba82; echo "</br>".$NoSerie82; ?></div></a></td>
	<td id="open83" class="_<?php echo ($contr83['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr83['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr83['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup83" class="link1" href="modales.php?pb=<?php echo "$NoSerie83"; ?>&tr=TR09-83" rel="moodalbox"><div class="link">TR09-83 <hr> <br><?php echo $Prueba83; echo "</br>".$NoSerie83; ?></div></a></td>
	<td id="open84" class="_<?php echo ($contr84['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr84['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr84['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup84" class="link1" href="modales.php?pb=<?php echo "$NoSerie84"; ?>&tr=TR09-84" rel="moodalbox"><div class="link">TR09-84 <hr> <br><?php echo $Prueba84; echo "</br>".$NoSerie84; ?></div></a></td>
	<td id="open85" class="_<?php echo ($contr85['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr85['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr85['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup85" class="link1" href="modales.php?pb=<?php echo "$NoSerie85"; ?>&tr=TR09-85" rel="moodalbox"><div class="link">TR09-85 <hr> <br><?php echo $Prueba85; echo "</br>".$NoSerie85; ?></div></a></td>
	</tr>
	<td id="open86" class="_<?php echo ($contr86['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr86['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr86['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup86" class="link1" href="modales.php?pb=<?php echo "$NoSerie86"; ?>&tr=TR09-86" rel="moodalbox"><div class="link">TR09-86 <hr> <br><?php echo $Prueba86; echo "</br>".$NoSerie86; ?></div></a></td>
	<td id="open87" class="_<?php echo ($contr87['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr87['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr87['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup87" class="link1" href="modales.php?pb=<?php echo "$NoSerie87"; ?>&tr=TR09-87" rel="moodalbox"><div class="link">TR09-87 <hr> <br><?php echo $Prueba87; echo "</br>".$NoSerie87; ?></div></a></td>
	<td id="open88" class="_<?php echo ($contr88['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr88['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr88['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup88" class="link1" href="modales.php?pb=<?php echo "$NoSerie88"; ?>&tr=TR09-88" rel="moodalbox"><div class="link">TR09-88 <hr> <br><?php echo $Prueba88; echo "</br>".$NoSerie88; ?></div></a></td>
	<td id="open89" class="_<?php echo ($contr89['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr89['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr89['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup89" class="link1" href="modales.php?pb=<?php echo "$NoSerie89"; ?>&tr=TR09-89" rel="moodalbox"><div class="link">TR09-89 <hr> <br><?php echo $Prueba89; echo "</br>".$NoSerie89; ?></div></a></td>
	<td id="open90" class="_<?php echo ($contr90['Modelo'] == 'Microsoft 8.2' ? 'trs' : ($contr90['Modelo'] == 'Microsoft 8.3' ? 'trs2' : ($contr90['Modelo'] == 'NPI' ? 'trs4' : 'trs3')));?> hvr-bob hvr-underline-from-center"><a id="popup90" class="link1" href="modales.php?pb=<?php echo "$NoSerie90"; ?>&tr=TR09-90" rel="moodalbox"><div class="link">TR09-90 <hr> <br><?php echo $Prueba90; echo "</br>".$NoSerie90; ?></div></a></td>





	</tr>
</table>
	</section>
<!-------------------------------------------------- TERMINA CUADROS DE TR's PARA LOS TECNICOS--------------------------------------------------------------------------------------------------------------------------------------------->
<section>
    
        <div>
            <style>
                .iframe-container {
                    position: relative;
                    padding-bottom: 75%; /* Ajusta el porcentaje según el tamaño deseado del iframe */
                    height: 0;
					width: 100%;
                    overflow: hidden;
                }

                .iframe-container iframe {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 50em;
                    border: 0;
                }
            </style>

            <div class="iframe-container">
                <iframe src="tabla_bahia9.php" frameborder="0" scrolling="no"></iframe>
         
    </div>
</section>
<!-------------------------------------------------- TERMINA TABLA DE JR'S s--------------------------------------------------------------------------------------------------------------------------------------------->
	<br><br><center><h1 style="font-size:3em;"> Herramientas</h1></center><br>
<section>
		<center>
			<div class="grupo total">
				<div class="caja">




<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Repair System</summary>

	<iframe src="http://10.19.17.101/RepairSystem" width="100%" height="700x">
	</iframe>


</details>


				</div>
			</div>
		</center>

		<center>
			<div class="grupo total">
				<div class="caja">
<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Megamind</summary>


	<iframe src="" width="100%" height="700x">
</iframe>

</details>
				</div>
			</div>
		</center>

		
	</section><br><br>
	<br><br>

	<!-- ********************Sin Sesion***********************************-->

	<!-- ********************LOGIN***********************************-->

	<!-- ********************ccomentario perosnal***********************************-->


	<?php if(isset($_SESSION['No_Reloj'])){

		?>
	<p class="flotante " id="yey0" style="width:102px; background-color:#3e3e3e; color:white; font-weight:bold; padding:5px; font-size:12px; z-index:1; bottom:41px;">Nota personal</p>
	<form>
	<input class="flotante btn2" id="yey" style="width:32px; padding:5px; font-size:12px; z-index:1" type="button"
	onclick="mostrarVentana3()"
	value="3">
	</form>
	<form>
	<input class="flotante btn2" id="yey2" style="width:32px; padding:5px; font-size:12px; z-index:1; right:40px;" type="button"
	onclick="mostrarVentana2()"
	value="2">
	</form>
	<form>
	<input class="flotante btn2" id="yey3" style="width:32px; padding:5px; font-size:12px; z-index:1; right:75px;" type="button"
	onclick="mostrarVentana()"
	value="1">
	</form>

	<?php
	}
	?>
	<!-- nota 1*************************************************************************************************** -->
	<div id="miVentana" style="position: fixed; width: 900px; height: 600px; top: 0; left: 0;
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:5px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

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
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:5px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

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
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:5px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

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
<script src="js/cbpHorizontalSlideOutMenu.min.js"></script>
<script>
var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
</script>
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
<?php if(isset($_SESSION['No_Reloj'])){ ?>
<center><a href="../img/stats.php" style="opacity:0;">.</a></center>
<?php } ?>
</body>
</html>
