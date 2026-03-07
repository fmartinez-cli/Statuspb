
<head>
	
	<!-- Styles -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/stylef.css">
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="shortcut icon" href="img/checkicon.png" />
	<link rel="stylesheet" href="component.css">
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>

	<!-- fin de style -->

	<!-- javascrips -->
	<script src="js/modernizr.custom.js"></script> 

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
				<div class="" style=" position:absolute; right:5px; top:5px;"> <a class="" href="./microsoft/administrar.php"><img width="25" src="./microsoft/img/admin.png"></a></div><br>
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
								<a href="/Statuspb/microsoft/estadisticas.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas </a>
						
							</li>
							<li>
							<li><a href="microsoft/statusgral.php"><img width="32" src="img/status.png"> Estatus General</a></li>
						
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