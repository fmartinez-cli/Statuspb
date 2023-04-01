
<head>
	<title>Home</title>
	<!-- Styles -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/stylef.css">
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="shortcut icon" href="img/checkicon.png" />
	<link rel="stylesheet" href="css/component.css">
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>

	<!-- fin de style -->

	<!-- javascrips -->
	<script src="js/modernizr.custom.js"></script> 

</head>
<body class="desarroll">
	<header>
		<div class="grupo ">
			<div class="caja">
				<div class="container">
					<header class="clearfix header2">
						<span>Ingenieria de pruebas</span>
						<a href="index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs</h1></a>

						<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
						</header>
					</div>
				</div>
			</div>
			<center><div class="main">
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu">
							<li>
								<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
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
							<?php if(isset($_SESSION['Nombre'])&&$_SESSION['Nivel']==1){ ?>

							<li><a href="Administrar.php">Administrar</a></li>
							<?php }else{echo "";}
							 ?>
							<li>
								<?php  if(isset($_SESSION['Nombre'])){
									echo '<a  href="logout.php"><img width="20" src="img/login.png"> Cerrar sesion</a>';
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