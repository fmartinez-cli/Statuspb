<?php

include('../LVO/conexion.php');

session_start();



// if(isset($_SESSION['No_Reloj'])){
// if(isset($_REQUEST['contra'])&&SHA1($_REQUEST['contra'])=="d89bc2d044d228900a79a2de3cbbf4fad20faef6")
// {








?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- Styles -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/stylef.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css" />
	<link rel="shortcut icon" href="img/checkicon.png" />
	<link rel="stylesheet" href="../css/component.css">

<?php

include('../LVO/conexion.php');


session_start();

$NoRelojStats = $_SESSION['No_Reloj'];

$theme = mysqli_query($enlace, "SELECT header, headerdos, body FROM stats Where  NoReloj = '$NoRelojStats'");
if ($themes=mysqli_fetch_array($theme)) {

				 		$header=$themes['header'];
				 		$headerdos=$themes['headerdos'];
						$body=$themes['body'];

}
	?>

<style>

body{
  background-image: url(<?php  echo $body;?>);
}

header{
  background-image: url(<?php  echo $header;?>);
}
.header2{
  background-image: url(<?php  echo $headerdos;?>);
}
table td{
padding:10px;
}
</style>


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
					<a href="../index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs</h1></a>

				<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em;  height:20px; width:30%; text-align:left;"> <p style="color:white;" class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
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
									<li><a href="../LVO/index.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Inicio</h3></a></li>
									<li><a href="../LVO/bahia1.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 1</h3></a></li>
									<li><a href="../LVO/bahia2.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 2</h3></a></li>
									<li><a href="../LVO/bahia3.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 3</h3></a></li>
									<li><a href="../LVO/bahia4.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 4</h3></a></li>
									<li><a href="../LVO/bahia5.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 5</h3></a></li>
									<li><a href="../LVO/bahia6.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 6</h3></a></li>
									<li><a href="../LVO/bahia7.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 7</h3></a></li>
									<li><a href="../LVO/golden.php"><h3><i class="fa fa-server" aria-hidden="true"></i> Golden Rack</h3></a></li>
									<li><a href="../LVO/estadisticas.php"><h3><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas</h3></a></li>
									<li><a href="../LVO/statusgral.php"><h3>
										<i class="fa fa-bar-chart" aria-hidden="true"></i> Estatus General
									</h3></a></li>
									<li><a href="../Statuspb/LVO/buscar.php"><h3><i class="fa fa-search" aria-hidden="true"></i> Buscar Rack/WO</h3></a></li>
									<li><a href="#"></a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-server" aria-hidden="true"></i> JV</a>
								<ul class="cbp-hssubmenu">
									<li><a href="../Statuspb/JV/index.php"><h3><i class="fa fa-home" aria-hidden="true"></i> Inicio</h3></a></li>
									<li><a href="../Statuspb/JV/bahia1.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 1</h3></a></li>
									<li><a href="../Statuspb/JV/bahia2.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 2</h3></a></li>
									<li><a href="../Statuspb/JV/bahia3.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 3</h3></a></li>
									<li><a href="../Statuspb/JV/bahia4.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Bahia 4</h3></a></li>
									<li><a href="#"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Single nodes</h3></a></li>
									<li><a href="../Statuspb/JV/estadisticas.php"><h3><i class="fa fa-line-chart" aria-hidden="true"></i> Estadisticas</h3></a></li>
									<li><a href="../Statuspb/JV/statusgral.php"><h3>
										<i class="fa fa-bar-chart" aria-hidden="true"></i> Estatus General
									</h3></a></li>
								</ul>
							</li>
							<li><a href="#">HPSD</a></li>
							<li><a href="#">ISS</a>
									<ul class="cbp-hssubmenu">
									<li><a href="..ISS/ReMUS.php"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> ReMUS</h3></a></li>
								</ul>
							</li>
							<li><a href="../Administrar.php">Administrar</a></li>

							<li>
							<?php  if(isset($_SESSION['Nombre'])){
								 echo '<a  href="../logout.php"><img width="20" src="login.png"> Cerrar sesion</a>';
							}
						else{
							?>
<a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesion</a>
								<ul class="cbp-hssubmenu">
									<li>
										<div class="grupo">
					<div class="caja">
						<form method="post" action="../LVO/login.php" class="login">
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
	<section style="margin-top:55px;">
		<div class="grupo">
			<div class="caja">

				<style type="text/css">
progress[value] {
width: 80%;
height: 12px;
}
progress[value] {
/* Eliminamos la apariencia por defecto */
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
/* Quitamos el borde que aparece en Firefox */
border: none;

/* Aplicamos las dimensiones */
width: 80%;
height: 12px;

/* Aplicamos color a la barra */
color: blue;
}

/* Compatibilidad de color en Firefox y Chrome */
progress::-moz-progress-bar { background: #3e3e3e; }
progress::-webkit-progress-value { background: #3e3e3e; }

.tabs{

    opacity:0.9;
    overflow: scroll;
}

.tabs::-webkit-scrollbar {
    width: .5em;
     opacity: 0.5;

}

.tabs::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.2);
    display: none;
}

.tabs::-webkit-scrollbar-thumb {
  background-color: #2C3E50;
  outline: 1px solid black;

}
p{
	color: #3e3e3e;
}

.btnsts{
width:50%;
height:35px;
background-color:#3e3e3e;
color:white;
font-size:16px;
font-weight:bold;
border:none;
opacity: 1;
}
.btnsts:hover{
	background-color: #2c2c2c;
}

.btnsts:disabled {
opacity:.3;

}

.btnsts:disabled {
opacity:.3;
cursor: default;
}

.tablamodal2 th{
  background: #3e3e3e;

  text-align: center;
  color: white;
   border-bottom: 1px solid #ddd;
}
.tablamodal2{
  width: 100%;
   border-collapse:collapse;
   font-size:12px;

}
.tablamodal2 tr:nth-child(odd) {
    background: #ddd;
    color: black;
}

.tablamodal2 tr:nth-child(even) {
    background: #fff;
    color: black;
}


				</style>

				<?php
					$NoRelojStats = $_SESSION['No_Reloj'];
					$querystats = mysqli_query($enlace, "SELECT * FROM stats WHERE NoReloj = '$NoRelojStats'");

				 	if ($datosstats=mysqli_fetch_array($querystats)) {

				 		$nivel=$datosstats['Nivel'];
				 		$puntos=$datosstats['Puntos'];

				 		$puntosfinal=$puntos-($nivel*1000);
				 		$maxpuntos=1000;



				 		echo '<div style="background-color:white; opacity:.8;"><div  style="width:100%; background-color:white; opacity:.8;  padding:10px; "><img src="'.$datosstats['Imagen'].'" style="margin-right:16px;" align="left" width="132" height="132">
				 		<p style="font-size:32px; color:#3e3e3e; ">Nivel '.$datosstats["Nivel"].'</p>
				 		<p style="font-size:16px; color:#3e3e3e; ">Puntaje: '.$datosstats["Puntos"].'</p>
				 		</div>
				 		<progress value="'.$puntosfinal.'" max="'.$maxpuntos.'">

        				</progress>
				 		<div style="  padding:10px;">
				 		<p style="font-size:16px; color:#3e3e3e; font-weight:bold;">'.$datosstats["Nombre"].'</p>
				 		<p style="font-size:14px; color:#3e3e3e;">'.$datosstats["Descripcion"].'</p>
				 		</div></div>
				 		<hr><br>';


				 		if($datosstats['Puntos']>=1000){ $Niv1= "1000/1000"; $Niv1op="opacity:1;"; $Niv1med="false";
				 		}else{$Niv1= $datosstats['Puntos'].'/1000'; $Niv1op="opacity:.2;"; $Niv1med="true";}


				 		if($datosstats['Puntos']>=5000){ $Niv5= "5000/5000"; $Niv5op="opacity:1;"; $Niv5med="false";
				 		}else{$Niv5= $datosstats['Puntos'].'/5000'; $Niv5op="opacity:.2;"; $Niv5med="true";}


				 		if($datosstats['Puntos']>=10000){ $Niv10= "10000/10000"; $Niv10op="opacity:1;"; $Niv10med="false";
				 		}else{$Niv10= $datosstats['Puntos'].'/10000'; $Niv10op="opacity:.2;"; $Niv10med="true";}


				 		if($datosstats['Puntos']>=15000){ $Niv15= "15000/15000"; $Niv15op="opacity:1;"; $Niv15med="false";
				 		}else{$Niv15= $datosstats['Puntos'].'/15000'; $Niv15op="opacity:.2;"; $Niv15med="true";	}


				 		if($datosstats['Puntos']>=20000){ $Niv20= "20000/20000"; $Niv20op="opacity:1;"; $Niv20med="false";
				 		}else{$Niv20= $datosstats['Puntos'].'/20000'; $Niv20op="opacity:.2;"; $Niv20med="true";}


				 		if($datosstats['Puntos']>=25000){ $Niv25= "25000/25000"; $Niv25op="opacity:1;"; $Niv25med="false";
				 		}else{$Niv25= $datosstats['Puntos'].'/25000'; $Niv25op="opacity:.2;"; $Niv25med="true";}


				 		if($datosstats['Puntos']>=30000){ $Niv30= "30000/30000"; $Niv30op="opacity:1;"; $Niv30med="false";
				 		}else{$Niv30= $datosstats['Puntos'].'/30000'; $Niv30op="opacity:.2;"; $Niv30med="true";}

				 		if($datosstats['FTO']>=10){ $FTO1= "10/10"; $FTO1op="opacity:1;"; $FTO1med="false";
				 		}else{$FTO1= $datosstats['FTO'].'/10'; $FTO1op="opacity:.2;"; $FTO1med="true";}

				 		if($datosstats['Cisco']>=10){ $cisco1= "10/10"; $cisco1op="opacity:1;"; $cisco1med="false";
				 		}else{$cisco1= $datosstats['Cisco'].'/10'; $cisco1op="opacity:.2;"; $cisco1med="true";}

				 		if($datosstats['Rackscan']>=10){ $rackscan1= "10/10"; $rackscan1op="opacity:1;"; $rackscan1med="false";
				 		}else{$rackscan1= $datosstats['Rackscan'].'/10'; $rackscan1op="opacity:.2;"; $rackscan1med="true";}

				 		if($datosstats['Xtee']>=10){ $xtee1= "10/10"; $xtee1op="opacity:1;"; $xtee1med="false";
				 		}else{$xtee1= $datosstats['Xtee'].'/10'; $xtee1op="opacity:.2;"; $xtee1med="true";}

				 		if($datosstats['Cluster']>=10){ $cluster1= "10/10"; $cluster1op="opacity:1;"; $cluster1med="false";
				 		}else{$cluster1= $datosstats['Cluster'].'/10'; $cluster1op="opacity:.2;"; $cluster1med="true";}

				 		if($datosstats['Solar']>=10){ $solar1= "10/10"; $solar1op="opacity:1;"; $solar1med="false";
				 		}else{$solar1= $datosstats['Solar'].'/10'; $solar1op="opacity:.2;"; $solar1med="true";}

				 		if($datosstats['Wiring']>=10){ $wiring1= "10/10"; $wiring1op="opacity:1;"; $wiring1med="false";
				 		}else{$wiring1= $datosstats['Wiring'].'/10'; $wiring1op="opacity:.2;"; $wiring1med="true";}

				 		if($datosstats['Bootstrap']>=10){ $bootstrap1= "10/10"; $bootstrap1op="opacity:1;"; $bootstrap1med="false";
				 		}else{$bootstrap1= $datosstats['Bootstrap'].'/10'; $bootstrap1op="opacity:.2;"; $bootstrap1med="true";}

				 		if($datosstats['Sharknado']>=10){ $sharknado1= "10/10"; $sharknado1op="opacity:1;"; $sharknado1med="false";
				 		}else{$sharknado1= $datosstats['Sharknado'].'/10'; $sharknado1op="opacity:.2;"; $sharknado1med="true";}

				 		if($datosstats['Deid']>=10){ $deid1= "10/10"; $deid1op="opacity:1;"; $deid1med="false";
				 		}else{$deid1= $datosstats['Deid'].'/10'; $deid1op="opacity:.2;"; $deid1med="true";}

				 		if($datosstats['Megamind']>=10){ $megamind1= "10/10"; $megamind1op="opacity:1;"; $megamind1med="false";
				 		}else{$megamind1= $datosstats['Megamind'].'/10'; $megamind1op="opacity:.2;"; $megamind1med="true";}

				 		if($datosstats['Eota']>=10){ $eota1= "10/10"; $eota1op="opacity:1;"; $eota1med="false";
				 		}else{$eota1= $datosstats['Eota'].'/10'; $eota1op="opacity:.2;"; $eota1med="true";}





				 		echo '<div style="float:left; background-color:#3e3e3e; opacity:.8; padding:10px; width:48%; height:50px; text-align:center;"><h1 style="color:white">Medallas</h1></div>
							  <div style="float:right; background-color:#3e3e3e; opacity:.8; padding:10px; width:48%; height:50px; text-align:center;"><h1 style="color:white">Tabla de posiciones</h1></div>
				 		      <br><br><br>





				 		<div class="tabs" style="float:left; padding:10px; background-color:white; opacity:.8; width:48%; height:450px; ">

				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato\'; document.getElementById(\'Desc\').value=\'Te han registrado en el sistema - Tampoco es que haya sido muy dificil\'; document.getElementById(\'Img\').value=\'img/default.png\'; document.getElementById(\'boton\').disabled=false;" title="Registrate en el sistema" src="img/default.png" width="66" align="left" style="margin-right:12px; ">
				 		<p>Novato</p><p style="float:right; margin-right:10%;">0/0</p><progress value="1" max="1"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Aprendiz\'; document.getElementById(\'Desc\').value=\'Has alcanzado el nivel 1\'; document.getElementById(\'Img\').value=\'img/nivel1.png\'; document.getElementById(\'boton\').disabled='.$Niv1med.';" title="Alcanza el nivel 1" src="img/nivel1.png" width="66" align="left" style="margin-right:12px; '.$Niv1op.'">
				 		<p style="float:left;">Aprendiz</p><p style="float:right; margin-right:10%;">'.$Niv1.'</p><progress value="'.$puntos.'" max="1000"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Conocedor\'; document.getElementById(\'Desc\').value=\'Has alcanzado el nivel 5 - Quiza debas descansar\'; document.getElementById(\'Img\').value=\'img/nivel5.png\'; document.getElementById(\'boton\').disabled='.$Niv5med.';" title="Alcanza el nivel 5" src="img/nivel5.png" width="66" align="left" style="margin-right:12px; '.$Niv5op.'">
				 		<p  style="float:left;">Conocedor</p><p style="float:right; margin-right:10%;">'.$Niv5.'</p><progress value="'.$puntos.'" max="5000"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Respetable\'; document.getElementById(\'Desc\').value=\'Has alcanzado el nivel 10 - Deja algo a tus compa&ntilde;eros\'; document.getElementById(\'Img\').value=\'img/nivel10.png\'; document.getElementById(\'boton\').disabled='.$Niv10med.';" title="Alcanza el nivel 10" src="img/nivel10.png" width="66" align="left" style="margin-right:12px; '.$Niv10op.'">
				 		<p  style="float:left;">Respetable</p><p style="float:right; margin-right:10%;">'.$Niv10.'</p><progress value="'.$puntos.'" max="10000"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Experto\'; document.getElementById(\'Desc\').value=\'Has alcanzado el nivel 15 - Vas a terminar con el trabajo tu solo\'; document.getElementById(\'Img\').value=\'img/nivel15.png\'; document.getElementById(\'boton\').disabled='.$Niv15med.';" title="Alcanza el nivel 15" src="img/nivel15.png" width="66" align="left" style="margin-right:12px; '.$Niv15op.'">
				 		<p  style="float:left;">Experto</p><p style="float:right; margin-right:10%;">'.$Niv15.'</p><progress value="'.$puntos.'" max="15000"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Maestro\'; document.getElementById(\'Desc\').value=\'Has alcanzado el nivel 20 - Deberian de llamarte jefe\'; document.getElementById(\'Img\').value=\'img/nivel20.png\'; document.getElementById(\'boton\').disabled='.$Niv20med.';" title="Alcanza el nivel 20" src="img/nivel20.png" width="66" align="left" style="margin-right:12px; '.$Niv20op.'">
				 		<p  style="float:left;">Maestro</p><p style="float:right; margin-right:10%;">'.$Niv20.'</p><progress value="'.$puntos.'" max="20000"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Jefe Maestro\'; document.getElementById(\'Desc\').value=\'Has alcanzado el nivel 25 - Ustedes empezaron la guerra, nosotros la acabamos\'; document.getElementById(\'Img\').value=\'img/nivel25.png\'; document.getElementById(\'boton\').disabled='.$Niv25med.';" title="Alcanza el nivel 25" src="img/nivel25.png" width="66" align="left" style="margin-right:12px; '.$Niv25op.'">
				 		<p  style="float:left;">Jefe Maestro</p><p style="float:right; margin-right:10%;">'.$Niv25.'</p><progress value="'.$puntos.'" max="25000"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Se&ntilde;or de las pruebas\'; document.getElementById(\'Desc\').value=\'Has alcanzado el nivel 30 - Quiza debas hacer algo mas que trabajar\'; document.getElementById(\'Img\').value=\'img/nivel30.png\'; document.getElementById(\'boton\').disabled='.$Niv30med.';" title="Alcanza el nivel 30" src="img/nivel30.png" width="66" align="left" style="margin-right:12px; '.$Niv30op.'">
				 		<p  style="float:left;">Se&ntilde;or de las pruebas</p><p style="float:right; margin-right:10%;">'.$Niv30.'</p><progress value="'.$puntos.'" max="30000"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato en FTO\'; document.getElementById(\'Desc\').value=\'Has completado FTO diez veces - Podria apostar a que solo lo marcas sin hacerlo\'; document.getElementById(\'Img\').value=\'img/fto1.png\'; document.getElementById(\'boton\').disabled='.$FTO1med.';" title="completa FTO 10 veces" src="img/fto1.png" width="66" align="left" style="margin-right:12px; '.$FTO1op.'">
				 		<p  style="float:left;">Novato en FTO</p><p style="float:right; margin-right:10%;">'.$FTO1.'</p><progress value="'.$datosstats["FTO"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato en switches\'; document.getElementById(\'Desc\').value=\'Has configurado 10 switches - Ya le vas agarrando a esto\'; document.getElementById(\'Img\').value=\'img/cisco1.png\'; document.getElementById(\'boton\').disabled='.$cisco1med.';" title="Configura 10 ciscos o aristas" src="img/cisco1.png" width="66" align="left" style="margin-right:12px; '.$cisco1op.'">
				 		<p  style="float:left;">Novato en switches</p><p style="float:right; margin-right:10%;">'.$cisco1.'</p><progress value="'.$datosstats["Cisco"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Escaner novato\'; document.getElementById(\'Desc\').value=\'Has completado rackscan 10 veces - De seguro no le sueltas el escaner a nadie\'; document.getElementById(\'Img\').value=\'img/rackscan1.png\'; document.getElementById(\'boton\').disabled='.$rackscan1med.';" title="Realiza rackscan 10 veces" src="img/rackscan1.png" width="66" align="left" style="margin-right:12px; '.$rackscan1op.'">
				 		<p  style="float:left;">Escaner novato</p><p style="float:right; margin-right:10%;">'.$rackscan1.'</p><progress value="'.$datosstats["Rackscan"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato de xtee\'; document.getElementById(\'Desc\').value=\'Has completado Xtee 10 veces - A que te empieza a caer mal\'; document.getElementById(\'Img\').value=\'img/xtee1.png\'; document.getElementById(\'boton\').disabled='.$xtee1med.';" title="Termina Xtee 10 veces" src="img/xtee1.png" width="66" align="left" style="margin-right:12px; '.$xtee1op.'">
				 		<p  style="float:left;">Novato de Xtee</p><p style="float:right; margin-right:10%;">'.$xtee1.'</p><progress value="'.$datosstats["Xtee"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato en esperas\'; document.getElementById(\'Desc\').value=\'Has completado cluster 10 veces - Seguro que te has aburrido\'; document.getElementById(\'Img\').value=\'img/cluster1.png\'; document.getElementById(\'boton\').disabled='.$cluster1med.';" title="Finaliza cluster 10 veces" src="img/cluster1.png" width="66" align="left" style="margin-right:12px; '.$cluster1op.'">
				 		<p  style="float:left;">Novato en esperas</p><p style="float:right; margin-right:10%;">'.$cluster1.'</p><progress value="'.$datosstats["Cluster"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato en HPSA, digo, Solar\'; document.getElementById(\'Desc\').value=\'Has completado Solar 10 veces - Eso sin contar las veces que se ha caido\'; document.getElementById(\'Img\').value=\'img/solar1.png\'; document.getElementById(\'boton\').disabled='.$solar1med.';" title="Realiza solar 10 veces" src="img/solar1.png" width="66" align="left" style="margin-right:12px; '.$solar1op.'">
				 		<p  style="float:left;">Novato en HPSA, digo, Solar</p><p style="float:right; margin-right:10%;">'.$solar1.'</p><progress value="'.$datosstats["Solar"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato en cableado\'; document.getElementById(\'Desc\').value=\'Has completado Wiring Check 10 veces - &#191;No te ha salido algun cable invertido&#63;	\'; document.getElementById(\'Img\').value=\'img/wiring1.png\'; document.getElementById(\'boton\').disabled='.$wiring1med.';" title="Realiza Wiring check 10 veces" src="img/wiring1.png" width="66" align="left" style="margin-right:12px; '.$wiring1op.'">
				 		<p  style="float:left;">Novato en cableado</p><p style="float:right; margin-right:10%;">'.$wiring1.'</p><progress value="'.$datosstats["Wiring"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato haciendo ping a 10.42.1.200\'; document.getElementById(\'Desc\').value=\'Has completado Bootstrap 10 veces - Seguro que en una de esas alguien te lo desconecto	\'; document.getElementById(\'Img\').value=\'img/bootstrap1.png\'; document.getElementById(\'boton\').disabled='.$bootstrap1med.';" title="Finaliza Bootstrap 10 veces" src="img/bootstrap1.png" width="66" align="left" style="margin-right:12px; '.$bootstrap1op.'">
				 		<p  style="float:left;">Novato haciendo ping a 10.42.1.200</p><p style="float:right; margin-right:10%;">'.$bootstrap1.'</p><progress value="'.$datosstats["Bootstrap"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato copiando y pegando\'; document.getElementById(\'Desc\').value=\'Has comletado Sharknado 10 veces - Ya te debes de saber los comandos de memoria\'; document.getElementById(\'Img\').value=\'img/shark1.png\'; document.getElementById(\'boton\').disabled='.$sharknado1med.';" title="Realiza Sharknado 10 veces" src="img/shark1.png" width="66" align="left" style="margin-right:12px; '.$sharknado1op.'">
				 		<p  style="float:left;">Novato copiando y pegando</p><p style="float:right; margin-right:10%;">'.$sharknado1.'</p><progress value="'.$datosstats["Sharknado"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato dando clic en aceptar\'; document.getElementById(\'Desc\').value=\'Has completado DEID 10 veces - Probablemente mas de una fallara en EOTA\'; document.getElementById(\'Img\').value=\'img/deid1.png\'; document.getElementById(\'boton\').disabled='.$deid1med.';" title="Completa DEID 10 veces" src="img/deid1.png" width="66" align="left" style="margin-right:12px; '.$deid1op.'">
				 		<p  style="float:left;">Novato dando clic en aceptar</p><p style="float:right; margin-right:10%;">'.$deid1.'</p><progress value="'.$datosstats["Deid"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato observador\'; document.getElementById(\'Desc\').value=\'Has terminado Megamind 10 veces - &#191;Si revisaste las tablas de abajo&#63;\'; document.getElementById(\'Img\').value=\'img/mega1.png\'; document.getElementById(\'boton\').disabled='.$megamind1med.';" title="Finaliza Megamind 10 veces" src="img/mega1.png" width="66" align="left" style="margin-right:12px; '.$megamind1op.'">
				 		<p  style="float:left;">Novato observador</p><p style="float:right; margin-right:10%;">'.$megamind1.'</p><progress value="'.$datosstats["Megamind"].'" max="10"></progress><br><br><br>


				 		<img onclick="document.getElementById(\'Nomb\').value=\'Novato en EOTA\'; document.getElementById(\'Desc\').value=\'Has completado EOTA 10 veces - Bueno, tu no\'; document.getElementById(\'Img\').value=\'img/eota1.png\'; document.getElementById(\'boton\').disabled='.$eota1med.';" title="Finaliza EOTA 10 veces" src="img/eota1.png" width="66" align="left" style="margin-right:12px; '.$eota1op.'">
				 		<p  style="float:left;">Novato en EOTA</p><p style="float:right; margin-right:10%;">'.$eota1.'</p><progress value="'.$datosstats["Eota"].'" max="10"></progress><br><br><br>





				 		</div>';

				 		echo '<div class="tabs" style="float:right; padding:10px; width:48%; height:450px;">';
				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Nivel DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">General</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Medalla</th><th>Nivel</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Nombre'].'</td><td>'.$positions['Nivel'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';



				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY FTO DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">FTO</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>FTO</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['FTO'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Cisco DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">Switch</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Switch</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Cisco'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Rackscan DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">Rackscan</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Rackscan</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Rackscan'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Xtee DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">XTEE</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>XTEE</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Xtee'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Cluster DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">Cluster</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Cluster</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Cluster'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Solar DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">Solar</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Solar</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Solar'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Wiring DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">Wiring check</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Wiring check</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Wiring'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Bootstrap DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">Bootstrap</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Bootstrap</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Bootstrap'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Sharknado DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">Sharknado</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Sharknado</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Sharknado'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Deid DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">DEID</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>DEID</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Deid'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Megamind DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">Megamind</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>Megamind</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Megamind'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';


				 		$position = mysqli_query($enlace, "SELECT * FROM stats ORDER BY Eota DESC limit 5");
				 		$pos=1;
				 		echo '<center><h1 style="color:#3e3e3e;">EOTA</h1><table class="tablamodal2" style="margin-top:0px; margin-bottom:25px; text-align:center; width:100%; background-color:white; color:#3e3e3e;"><tr><th>Posici&oacute;n</th><th>N&uacute;mero de reloj</th><th>Nombre</th><th>EOTA</th></tr>';
				 		while($positions=mysqli_fetch_array($position)){
				 			$norel=$positions['NoReloj'];
				 			$nombre = mysqli_query($enlace, "SELECT Nombre FROM users Where No_Reloj= '$norel'");
				 			$nombres=mysqli_fetch_row($nombre);
				 			echo '<tr><td>'.$pos.'</td><td>'.$norel.'</td><td>'.$nombres[0].'</td><td>'.$positions['Eota'].'</td></tr>';
				 			$pos++;
				 		}
				 		echo '</table></center>';



				 		echo '</div>';
				 	}

				 ?>


				 <div style="padding-top:16px; width:49%; float:left">
				 <center>
				 <form  method="POST" action="stats2.php">
				 	<input style="border:none; background-color:#2574a9; text-align:center; width:50%; height:30px; font-size:16px; color:white; font-weight:bolder;" type="text"   id="Nomb" name="Nomb" width="300" value="Sin selecci&oacute;n" readonly="readonly"><br>
					<input type="hidden" id="Desc" name="Desc" width="300" value="">
					<input type="hidden" id="Img" name="Img" width="300" value="">
					<button  class="btnsts"  disabled name="boton" id="boton" >Usar medalla</button>
				</form>
			</center>
				</div>


				<div style="padding-top:16px; width:49%; float:right">
				<center>
				<form  method="POST" action="stats3.php">
				 <input style="border:none; background-color:#2574a9; text-align:center; width:50%; height:30px; font-size:16px; color:white; font-weight:bolder;" type="text"   id="Nombtheme" name="Nombtheme" width="300" value="Sin selecci&oacute;n" readonly="readonly"><br>
				 <input type="hidden" id="bodytheme" name="bodytheme" width="300" value="">
				 <input type="hidden" id="headertheme" name="headertheme" width="300" value="">
				 <input type="hidden" id="header2theme" name="header2theme" width="300" value="">
				 <button  class="btnsts"  disabled name="botontheme" id="botontheme" >Usar tema</button>
			 </form>
		 </center>
			 </div>
			 <hr style="width:100%">
					<?php
	 		echo '<div class="" align="center"  style=" background-color:white; opacity:.8; padding:10px; width:100%;  height:18%;">
			 <center>
			<h1>Temas</h1></center>
			<table style="margin:10px; text-align:center;"><tr>

			<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'Default\'; document.getElementById(\'bodytheme\').value=\'themes/red.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/try6.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="Default" src="themes/try6.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Default</p></td>

			<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'El chavo\'; document.getElementById(\'bodytheme\').value=\'themes/chavo2.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/chavo1.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="El chavo" src="themes/chavo2.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>El Chavo</p></td>';


			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'Minions\'; document.getElementById(\'bodytheme\').value=\'themes/minion2.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/minion1.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="Minions" src="themes/minion1.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Minions</p></td>';

			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'Illuminati\'; document.getElementById(\'bodytheme\').value=\'themes/illuminati2.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/illuminati3.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="Illuminati" src="themes/illuminati2.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Illuminati</p></td>';

			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'Dark Souls\'; document.getElementById(\'bodytheme\').value=\'themes/dark1.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/dark2.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="Dark souls" src="themes/dark1.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Dark Souls</p></td>';

			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'Navidad\'; document.getElementById(\'bodytheme\').value=\'themes/navidad1.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/navidad2.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="Navidad" src="themes/navidad1.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Navidad</p></td>';

			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'Halloween\'; document.getElementById(\'bodytheme\').value=\'themes/halloween1.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/halloween2.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="Halloween" src="themes/halloween1.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Halloween</p></td>';


			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'Cthulhu\'; document.getElementById(\'bodytheme\').value=\'themes/lovecraft1.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/lovecraft2.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="Cthulhu" src="themes/lovecraft1.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Cthulhu</p></td>';

			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'invasor\'; document.getElementById(\'bodytheme\').value=\'themes/invasor1.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/invasor2.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="invasor" src="themes/invasor1.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>invasor</p></td>';

			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'halo\'; document.getElementById(\'bodytheme\').value=\'themes/halofont.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/haloheader.png\'; document.getElementById(\'botontheme\').disabled=false;" title="halo" src="themes/haloselect.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>halo</p></td>';

			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'lovecraft\'; document.getElementById(\'bodytheme\').value=\'themes/hp_love2.jpg\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/thulhu.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="lovecraft" src="themes/lovecraft.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Lovecraft</p></td>';

			echo '<td><img position="relative" onclick="document.getElementById(\'Nombtheme\').value=\'trump\'; document.getElementById(\'bodytheme\').value=\'themes/trumpmuro.png\'; document.getElementById(\'headertheme\').value=\'themes/try6.jpg\'; document.getElementById(\'header2theme\').value=\'themes/trumpbandera.jpg\'; document.getElementById(\'botontheme\').disabled=false;" title="trump" src="themes/trumpicono.jpg" style="height:60px; width:60px;" align="left" style="margin-right:12px; ">
			<br><br><br><p>Mr Trump</p></td>';

			echo '</tr></table></div>';
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
<!-- scripsa adicionales -->
<script src="../js/cbpHorizontalSlideOutMenu.min.js"></script>
<script>
	var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
</script>



</html>

<?php

// }else {


// echo '<center><div style="margin-top:25%;"><i style="font-size:32px; font-weight:bold;">
// "Por mi se va a la ciudad del llanto; por mi se va al eterno dolor; por mi se va hacia la raza condenada; la justicia anim&oacute; a mi sublime arquitecto; me hizo la divina potestad, la suprema sabiduria y el primer amor. Antes que yo no hubo nada creado, a excepci&oacute;n de lo eterno, y yo duro eternamente. !Oh vosotros los que entr&aacute;is, abandonad toda esperanza!" </i>
// <br><br><br>
// <form  method="POST" action="stats.php">
// <input style=" border:none; right:0px; bottom:0px;" type="password" name="contra" required>
// </form></div></center>
// <p style="position:absolute; top:5px; right:5 px; color:white;">la puerta al infierno</p>
// ';

// }

// }else{

// 	header("Location: ../index.php");
// } ?>
