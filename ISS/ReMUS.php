<?php

include('LVO/conexion.php');
include('LVO/consultas1.php');

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ReMUS</title>
	<!-- Styles -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/stylef.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css" />
	<link rel="shortcut icon" href="../img/checkicon.png" />
	<link rel="stylesheet" href="../css/component.css">
	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="style/popup.css">

	<!-- fin de style -->

	<!-- javascrips -->
	<script src="../js/modernizr.custom.js"></script>

</head>
<body>
<header>
	<div class="grupo ">
		<div class="caja">
			<div class="container">
				<header class="clearfix header2">
					<span>Ingenieria de pruebas</span>
					<a href="../index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs</h1></a><br>

				<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].'<span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
				</header>
			</div>
		</div>
	</div>
	<center><div class="main">
		<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
			<div class="cbp-hsinner">
				<ul class="cbp-hsmenu">
					<li>
						<a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-server" aria-hidden="true"></i> LVO</a>
						<ul class="cbp-hssubmenu cbp-hssub-rows">
							<li><a href="/Statuspb/LVO/index.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Inicio</h3></a></li>
							<li><a href="/Statuspb/LVO/bahia1.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 1</h3></a></li>
							<li><a href="/Statuspb/LVO/bahia2.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 2</h3></a></li>
							<li><a href="/Statuspb/LVO/bahia3.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 3</h3></a></li>
							<li><a href="/Statuspb/LVO/bahia4.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 4</h3></a></li>
							<li><a href="/Statuspb/LVO/bahia5.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 5</h3></a></li>
							<li><a href="/Statuspb/LVO/bahia6.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 6</h3></a></li>
							<li><a href="/Statuspb/LVO/bahia7.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 7</h3></a></li>
							<li><a href="/Statuspb/LVO/golden.php"><h3><i class="fa fa-server" aria-hidden="true"></i> Golden Rack</h3></a></li>
							<li><a href="/Statuspb/LVO/estadisticas.php"><h3><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas</h3></a></li>
							<li><a href="/Statuspb/LVO/statusgral.php"><h3>
								<i class="fa fa-bar-chart" aria-hidden="true"></i> Estatus General
							</h3></a></li>
							<li><a href="/Statuspb/LVO/buscar.php"><h3><i class="fa fa-search" aria-hidden="true"></i> Buscar Rack/WO</h3></a></li>
							<li><a href="#"></a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-server" aria-hidden="true"></i> JV</a>
						<ul class="cbp-hssubmenu">
							<li><a href="/Statuspb/JV/index.php"><h3><i class="fa fa-home" aria-hidden="true"></i> Inicio</h3></a></li>
							<li><a href="/Statuspb/JV/bahia1.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 1</h3></a></li>
							<li><a href="/Statuspb/JV/bahia2.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 2</h3></a></li>
							<li><a href="/Statuspb/JV/bahia3.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 3</h3></a></li>
							<li><a href="/Statuspb/JV/bahia4.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 4</h3></a></li>
							<li><a href="#"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Single nodes</h3></a></li>
							<li><a href="/Statuspb/JV/estadisticas.php"><h3><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas</h3></a></li>
							<li><a href="/Statuspb/JV/statusgral.php"><h3>
								<i class="fa fa-bar-chart" aria-hidden="true"></i> Estatus General
							</h3></a></li>
						</ul>
					</li>
					<li><a href="#">HPSD</a></li>
					<li><a href="#">ISS</a>
							<ul class="cbp-hssubmenu">
							<li><a href="ISS/ReMUS.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> ReMUS</h3></a></li>
						</ul>
					</li>
					<li><a href="../Administrar.php">Administrar</a></li>

					<li>
					<?php  if(isset($_SESSION['Nombre'])){
						 echo '<a  href="logout.php"><img width="20" src="../img/login.png"> Cerrar sesion</a>';
					}
				else{
					?>
<a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesion</a>
						<ul class="cbp-hssubmenu">
							<li>
								<div class="grupo">
			<div class="caja">
				<form method="post" action="LVO/login.php" class="login">
					<input type="text" title="Introduzca solo numeros" name="Usuario" placeholder="N&uacute;mero de reloj" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'N&uacute;mero de reloj\'" maxlength="5" pattern="[0-9]{5}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
					<input type="password" name="Password" placeholder="Contrase&ntilde;a" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Contrase&ntilde;a\'">
					<script type="text/javascript"> var URLactual = window.location.href+"#";
						document.write("<input type=\"hidden\" name=\"Url\" value="+URLactual+">");
					</script>
					<button class="btn1" style="width:300px;">Aceptar</button>
				</form>

			</div>
		</div>
							<?php

							}?>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div></center>
</header>
	<section>
		<div class="grupo total">
			<div class="caja">
				<iframe style="width:100%; height:1000px; " src="http://10.19.17.66/ReMUS/default.aspx"></iframe>

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
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:200 ;background-color: #FAFAFA; color: #000000; display:none;">

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
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:200 ; background-color: #FAFAFA; color: #000000; display:none;">

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
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:200 ; background-color: #FAFAFA; color: #000000; display:none;">

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
<!-- scripsa adicionales -->
<script src="../js/cbpHorizontalSlideOutMenu.min.js"></script>
<script>
	var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
</script>

</html>
