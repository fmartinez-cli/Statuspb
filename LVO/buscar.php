  <?php
include('conexion.php');
include('consultas1.php');
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buscar</title>
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

<script type="text/javascript" src="../js/moodalbox.js"></script>

<link rel="stylesheet" href="style/moodalbox.css" type="text/css" media="screen"/>

</head>
<body class="desarroll">

	<header>
	<div class="grupo ">
		<div class="caja">
			<div class="container">
				<header class="clearfix header2">
					<span>Ingenieria de pruebas</span>
					<a href="/Statuspb/index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs</h1></a>
					<div>
				<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?></div>
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
					<center>			<nav>
					<ul class="topnav">
						<li ><a  class="hvr-underline-from-center" href="index.php"><img width="15" src="../img/home.png"> Inicio</a></li>
						<li style=""><a  class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia2.php"><img width="10" src="../img/bay.png"> Bahia 2</a></li>
						<li><a class="hvr-underline-from-center" href="bahia3.php"><img width="10" src="../img/bay.png"> Bahia 3</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia4.php"><img width="10" src="../img/bay.png"> Bahia 4</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia5.php"><img width="10" src="../img/bay.png"> Bahia 5</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia6.php"><img width="10" src="../img/bay.png"> Bahia 6</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia7.php"><img width="10" src="../img/bay.png"> Bahia 7</a></li>
						<li><a class="hvr-underline-from-center" href="golden.php"><img width="15" src="../img/golden.png"> Golden Rack</a></li>
						<li><a class="hvr-underline-from-center" href="estadisticas.php"><img width="25" src="../img/estadisticas.png"> Estad&iacute;sticas</a></li>
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
<section>
<div class="grupo">
<div class="caja"><div class="caja web-50" style="float:right;"><center><br><br><br><h2>Buscar WO</h2></center>
		<form class="buscador" action="buscar.php" method="post">
			<input name='WO' placeholder="WO" type="text" pattern="[0-9]{9}" maxlength="9" required><br>
			<button class="btn2" style="width:300px">Buscar</button>
		</form></div>
		<div class="caja web-50" style="float:left;"><center><br><br><br><h2>Buscar Rack</h2></center>
		<form class="buscador" action="buscarr.php" method="post">
			<input name='NoSerie' placeholder="No Serie" type="text" pattern="2[mM]{1}2[0-9a-zA-Z]{7}" maxlength="10" required><br>
			<button class="btn2" style="width:300px">Buscar</button>
		</form></div>

		<?php
		if(isset($_REQUEST['WO'])){
		$WO=$_REQUEST['WO'];

		$con01=mysqli_query($enlace, "SELECT * FROM racksterminados WHERE WO='$WO'");
		$con0=mysqli_query($enlace, "SELECT * FROM racks WHERE WO='$WO'");
		$con1=mysqli_query($enlace, "SELECT * FROM racks WHERE WO='$WO'");
		$con2=mysqli_query($enlace, "SELECT * FROM racksterminados WHERE WO='$WO'");

		if($cons0=mysqli_fetch_row($con0)&&$cons01=mysqli_fetch_row($con01)){
			$var=1;
		}elseif($cons1=mysqli_fetch_row($con1)){
			$var=2;
		}elseif($cons2=mysqli_fetch_row($con2)){
			$var=3;
		}else{$var=4;}

switch($var){
	// _____________________________________________________________________________case 1___________________________________________________
case 1:


					$conmod=mysqli_query($enlace, "SELECT Modelo FROM racks where WO='$WO' AND Modelo='Azure 4.1'");
					$conmod2=mysqli_query($enlace, "SELECT Modelo FROM racksterminados where WO='$WO' AND Modelo ='Azure 4.1'");

					if($consmod=mysqli_fetch_array($conmod)||$consmod2=mysqli_fetch_array($conmod2)){


					echo '<table class="stgral"><caption><h2>WO: '.$WO.'</h2></caption>
					<tr><th>Numero de serie</th><th>WO</th><th>SKU</th><th>Locacion</th><th>Modelo</th>
					<th><div class="verticalText">FTO</div></th><th><div class="verticalText">Cisco</div></th><th><div class="verticalText">Rackscan</div></th>
					<th><div class="verticalText">XTEE</div></th><th><div class="verticalText">Cluster</div></th><th><div class="verticalText">Solar</div></th>
					<th><div class="verticalText">Wiringcheck</div></th><th><div class="verticalText">Bootstrap</div></th><th><div class="verticalText">Sharknado</div></th>
					<th><div class="verticalText">DEID</div></th><th><div class="verticalText">Megamind</div></th><th><div class="verticalText">EOTA</div></th><th>Hora Inicial</th><th>Hora Final</th></tr>
					';
					$confto=0; $contcisco=0; $contrackscan=0; $contxtee=0; $contcluster=0; $countsolar=0; $contbootstrap=0; $contshark=0; $contwiring=0; $contdeid=0; $contmega=0;
					$conteota=0; $terminados=0;
					$consultawo=mysqli_query($enlace, "SELECT * from racks where WO='$WO' AND Modelo='Azure 4.1'");
					while($datoswo=mysqli_fetch_row($consultawo)){
						echo '<tr> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswo[0].'">'.$datoswo[0].'</a></td><td class="tdinfo2">'.$datoswo[1].'</td><td class="tdinfo2">'.$datoswo[2].'</td><td class="tdinfo2">'.$datoswo[4].'</td><td class="tdinfo2">'.$datoswo[5].'</td>';
					$consultawop=mysqli_query($enlace, "SELECT * from pruebas where NoSerie='$datoswo[0]'");
							while($datoswop=mysqli_fetch_row($consultawop)){
								if($datoswop[2]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[5]==0){ $contcisco=$contcisco+1;
									}
								}else{
									$confto++;
									echo "<td></td>";
								}
								if($datoswop[5]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[8]==0){ $contrackscan=$contrackscan+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[8]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[11]==0){ $contxtee=$contxtee+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[11]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[14]==0){ $contcluster=$contcluster+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[14]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[17]==0){ $countsolar=$countsolar+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[17]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[23]==0){ $contwiring=$contwiring+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[23]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[26]==0){  $contbootstrap=$contbootstrap+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[26]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[29]==0){ $contshark=$contshark+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[29]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[32]==0){ $contdeid=$contdeid+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[32]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[35]==0){ $contmega=$contmega+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[35]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[38]==0){ $conteota=$conteota+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[38]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									$terminados++;

								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswop[1].'</td><td class="tdinfo2">'.$datoswop[40].'</td></tr>';
							}
					}

					$consultawot=mysqli_query($enlace, "SELECT * from racksterminados where WO='$WO' AND Modelo='Azure 4.1' ");
					while($datoswot=mysqli_fetch_row($consultawot)){
						echo '<tr> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswot[1].'">'.$datoswot[1].'</a></td><td class="tdinfo2">'.$datoswot[2].'</td><td class="tdinfo2">'.$datoswot[3].'</td><td class="tdinfo2">'.$datoswot[5].'</td><td class="tdinfo2">'.$datoswot[6].'</td>';
						$consultawotp=mysqli_query($enlace, "SELECT * from pruebasterminados where NoSerie='$datoswot[1]'");
						while($datoswotp=mysqli_fetch_row($consultawotp)){

								if($datoswotp[3]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[6]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[9]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[12]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[15]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[18]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[24]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[27]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[30]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[33]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[36]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[39]==1){
									$terminados++;
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}

								echo '<td class="tdinfo2">'.$datoswotp[2].'</td><td class="tdinfo2">'.$datoswotp[41].'</td></tr>';
							}
					}
					echo '</table> ';
					echo ($confto>0) ? "<b><br>FTO: ".$confto .'</b>':"";
					echo ($contcisco>0) ? '<b><br>Cisco: '.$contcisco .'</b>':"";
					echo ($contrackscan>0) ? '<b><br>Rackscan: '.$contrackscan .'</b>':"";
					echo ($contxtee>0) ? '<b><br>XTEE: '.$contxtee.'</b>' :"";
					echo ($contcluster>0) ? '<b><br>Cluster: '.$contcluster.'</b>' :"";
					echo ($countsolar>0) ? '<b><br>Solar: '.$countsolar.'</b>' :"";
					echo ($contbootstrap>0) ? '<b><br>Bootstrap: '.$contbootstrap.'</b>' :"";
					echo ($contshark>0) ? '<b><br>Sharknado: '.$contshark .'</b>':"";
					echo ($contwiring>0) ? '<b><br>Wiring check: '.$contwiring .'</b>':"";
					echo ($contdeid>0) ? '<b><br>DEID: '.$contdeid .'</b>':"";
					echo ($contmega>0) ? '<b><br>Megamind: '.$contmega .'</b>':"";
					echo ($conteota>0) ? '<b><br>EOTA: '.$conteota .'</b>':"";
					echo ($terminados>0) ? '<b><br>Terminados: '.$terminados .'</b>':"";
					echo '<br><br><br><br><hr>';


	}else{

					echo '<table class="stgral"><caption><h2>WO: '.$WO.'</h2></caption>
					<tr><th>N&uacute;mero de serie</th><th>WO</th><th>SKU</th><th>Locacion</th><th>Modelo</th>
					<th><div class="verticalText">FTO</div></th><th><div class="verticalText">Cisco/HP</div></th><th><div class="verticalText">Rackscan</div></th><th><div class="verticalText">Solar 1</div></th><th><div class="verticalText">Cluster</div></th><th><div class="verticalText">Solar 2</div></th><th><div class="verticalText">Sharknado</div></th><th><div class="verticalText">Wiringcheck</div></th>
					<th><div class="verticalText">DEID</div></th><th><div class="verticalText">Megamind</div></th><th><div class="verticalText">EOTA</div></th><th>Hora Inicio</th><th>Hora Final</th></tr>
					';
					$confto=0; $contcisco=0; $contrackscan=0; $contcluster=0; $countsolar=0; $countsolar2=0; $contshark=0; $contwiring=0; $contdeid=0; $contmega=0;
					$conteota=0; $terminados=0;
					$consultawo=mysqli_query($enlace, "SELECT * from racks where WO='$WO' AND Modelo='Dropbox'");
					while($datoswo=mysqli_fetch_row($consultawo)){
						echo '<tr> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswo[0].'">'.$datoswo[0].'</a></td><td class="tdinfo2">'.$datoswo[1].'</td><td class="tdinfo2">'.$datoswo[2].'</td><td class="tdinfo2">'.$datoswo[4].'</td><td class="tdinfo2">'.$datoswo[5].'</td>';
					$consultawop=mysqli_query($enlace, "SELECT * from pruebas where NoSerie='$datoswo[0]'");
							while($datoswop=mysqli_fetch_row($consultawop)){
								if($datoswop[2]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[5]==0){ $contcisco++;}
								}else{
									echo "<td></td>";
									$confto++;
								}
								if($datoswop[5]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[8]==0){ $contrackscan++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[8]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[17]==0){ $countsolar++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[17]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[14]==0){ $contcluster++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[14]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[20]==0){ $countsolar2++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[20]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[29]==0){ $contshark++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[29]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[23]==0){ $contwiring++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[23]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[32]==0){ $contdeid++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[32]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[35]==0){ $contmega++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[35]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[38]==0){ $conteota++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[38]==1){
									echo "<td bgcolor='#66CC99'></td>";
									 $terminados++;
								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswop[1].'</td><td class="tdinfo2">'.$datoswop[40].'</td></tr>';
							}
					}

					$consultawot=mysqli_query($enlace, "SELECT * from racksterminados where WO='$WO' AND Modelo='Dropbox' ");
					while($datoswot=mysqli_fetch_row($consultawot)){
						echo '<tr> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswot[1].'">'.$datoswot[1].'</a></td><td class="tdinfo2">'.$datoswot[2].'</td><td class="tdinfo2">'.$datoswot[3].'</td><td class="tdinfo2">'.$datoswot[5].'</td><td class="tdinfo2">'.$datoswot[6].'</td>';
						$consultawotp=mysqli_query($enlace, "SELECT * from pruebasterminados where NoSerie='$datoswot[1]'");
						while($datoswop=mysqli_fetch_row($consultawotp)){
								if($datoswop[3]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[6]==0){ $contcisco++;}
								}else{
									echo "<td></td>";
									$confto++;
								}
								if($datoswop[6]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[9]==0){ $contrackscan++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[9]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[18]==0){ $countsolar++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[18]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[15]==0){ $contcluster++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[15]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[21]==0){ $countsolar2++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[21]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[30]==0){ $contshark++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[30]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[24]==0){ $contwiring++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[24]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[33]==0){ $contdeid++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[33]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[36]==0){ $contmega++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[36]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[39]==0){ $conteota++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[39]==1){
									echo "<td bgcolor='#66CC99'></td>";
									 $terminados++;
								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswop[2].'</td><td class="tdinfo2">'.$datoswop[41].'</td></tr>';

							}
					}
					echo '</table>';

					echo ($confto>0) ? "<b>FTO: ".$confto .'</b>':"";
					echo ($contcisco>0) ? '<b><br>Cisco: '.$contcisco .'</b>':"";
					echo ($contrackscan>0) ? '<b><br>Rackscan: '.$contrackscan .'</b>':"";
					echo ($countsolar>0) ? '<b><br>Solar 1: '.$countsolar.'</b>' :"";
					echo ($contcluster>0) ? '<b><br>Cluster: '.$contcluster.'</b>' :"";
					echo ($countsolar2>0) ? '<b><br>Solar 2: '.$countsolar2.'</b>' :"";
					echo ($contshark>0) ? '<b><br>Sharknado: '.$contshark .'</b>':"";
					echo ($contwiring>0) ? '<b><br>Wiring check: '.$contwiring .'</b>':"";
					echo ($contdeid>0) ? '<b><br>DEID: '.$contdeid .'</b>':"";
					echo ($contmega>0) ? '<b><br>Megamind: '.$contmega .'</b>':"";
					echo ($conteota>0) ? '<b><br>EOTA: '.$conteota .'</b>':"";
					echo ($terminados>0) ? '<b><br>Terminados: '.$terminados .'</b>':"";
					echo '<br><br><br><br><hr>';
			}

break;

// _____________________________________________________________________________case 2___________________________________________________
case 2:









$conmod=mysqli_query($enlace, "SELECT Modelo FROM racks where WO='$WO' AND Modelo='Azure 4.1'");


					if($consmod=mysqli_fetch_array($conmod)){


					echo '<table class="stgral"><caption><h2>WO: '.$WO.'</h2></caption>
					<tr><th>Numero de serie</th><th>WO</th><th>SKU</th><th>Locacion</th><th>Modelo</th>
					<th><div class="verticalText">FTO</div></th><th><div class="verticalText">Cisco</div></th><th><div class="verticalText">Rackscan</div></th>
					<th><div class="verticalText">XTEE</div></th><th><div class="verticalText">Cluster</div></th><th><div class="verticalText">Solar</div></th>
					<th><div class="verticalText">Wiringcheck</div></th><th><div class="verticalText">Bootstrap</div></th><th><div class="verticalText">Sharknado</div></th>
					<th><div class="verticalText">DEID</div></th><th><div class="verticalText">Megamind</div></th><th><div class="verticalText">EOTA</div></th><th>Hora Inicial</th><th>Hora Final</th></tr>
					';
					$confto=0; $contcisco=0; $contrackscan=0; $contxtee=0; $contcluster=0; $countsolar=0; $contbootstrap=0; $contshark=0; $contwiring=0; $contdeid=0; $contmega=0;
					$conteota=0; $terminados=0;
					$consultawo=mysqli_query($enlace, "SELECT * from racks where WO='$WO' AND Modelo='Azure 4.1'");
					while($datoswo=mysqli_fetch_row($consultawo)){
						echo '<tr> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswo[0].'">'.$datoswo[0].'</a></td><td class="tdinfo2">'.$datoswo[1].'</td><td class="tdinfo2">'.$datoswo[2].'</td><td class="tdinfo2">'.$datoswo[4].'</td><td class="tdinfo2">'.$datoswo[5].'</td>';
					$consultawop=mysqli_query($enlace, "SELECT * from pruebas where NoSerie='$datoswo[0]'");
							while($datoswop=mysqli_fetch_row($consultawop)){
								if($datoswop[2]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[5]==0){ $contcisco=$contcisco+1;
									}
								}else{
									$confto++;
									echo "<td></td>";
								}
								if($datoswop[5]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[8]==0){ $contrackscan=$contrackscan+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[8]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[11]==0){ $contxtee=$contxtee+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[11]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[14]==0){ $contcluster=$contcluster+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[14]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[17]==0){ $countsolar=$countsolar+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[17]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[23]==0){ $contwiring=$contwiring+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[23]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[26]==0){  $contbootstrap=$contbootstrap+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[26]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[29]==0){ $contshark=$contshark+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[29]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[32]==0){ $contdeid=$contdeid+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[32]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[35]==0){ $contmega=$contmega+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[35]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[38]==0){ $conteota=$conteota+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[38]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									$terminados++;

								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswop[1].'</td><td class="tdinfo2">'.$datoswop[40].'</td></tr>';


							}
					}
					echo '</table> ';
					echo ($confto>0) ? "<b><br>FTO: ".$confto .'</b>':"";
					echo ($contcisco>0) ? '<b><br>Cisco: '.$contcisco .'</b>':"";
					echo ($contrackscan>0) ? '<b><br>Rackscan: '.$contrackscan .'</b>':"";
					echo ($contxtee>0) ? '<b><br>XTEE: '.$contxtee.'</b>' :"";
					echo ($contcluster>0) ? '<b><br>Cluster: '.$contcluster.'</b>' :"";
					echo ($countsolar>0) ? '<b><br>Solar: '.$countsolar.'</b>' :"";
					echo ($contbootstrap>0) ? '<b><br>Bootstrap: '.$contbootstrap.'</b>' :"";
					echo ($contshark>0) ? '<b><br>Sharknado: '.$contshark .'</b>':"";
					echo ($contwiring>0) ? '<b><br>Wiring check: '.$contwiring .'</b>':"";
					echo ($contdeid>0) ? '<b><br>DEID: '.$contdeid .'</b>':"";
					echo ($contmega>0) ? '<b><br>Megamind: '.$contmega .'</b>':"";
					echo ($conteota>0) ? '<b><br>EOTA: '.$conteota .'</b>':"";
					echo ($terminados>0) ? '<b><br>Terminados: '.$terminados .'</b>':"";
					echo '<br><br><br><br><hr>';


	}else{

					echo '<table class="stgral"><caption><h2>WO: '.$WO.'</h2></caption>
					<tr><th>N&uacute;mero de serie</th><th>WO</th><th>SKU</th><th>Locacion</th><th>Modelo</th>
					<th><div class="verticalText">FTO</div></th><th><div class="verticalText">Cisco/HP</div></th><th><div class="verticalText">Rackscan</div></th><th><div class="verticalText">Solar 1</div></th><th><div class="verticalText">Cluster</div></th><th><div class="verticalText">Solar 2</div></th><th><div class="verticalText">Sharknado</div></th><th><div class="verticalText">Wiringcheck</div></th>
					<th><div class="verticalText">DEID</div></th><th><div class="verticalText">Megamind</div></th><th><div class="verticalText">EOTA</div></th><th>Hora Inicio</th><th>Hora Final</th></tr>
					';
					$confto=0; $contcisco=0; $contrackscan=0; $contcluster=0; $countsolar=0; $countsolar2=0; $contshark=0; $contwiring=0; $contdeid=0; $contmega=0;
					$conteota=0; $terminados=0;
					$consultawo=mysqli_query($enlace, "SELECT * from racks where WO='$WO' AND Modelo='Dropbox'");
					while($datoswo=mysqli_fetch_row($consultawo)){
						echo '<tr> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswo[0].'">'.$datoswo[0].'</a></td><td class="tdinfo2">'.$datoswo[1].'</td><td class="tdinfo2">'.$datoswo[2].'</td><td class="tdinfo2">'.$datoswo[4].'</td><td class="tdinfo2">'.$datoswo[5].'</td>';
					$consultawop=mysqli_query($enlace, "SELECT * from pruebas where NoSerie='$datoswo[0]'");
							while($datoswop=mysqli_fetch_row($consultawop)){
								if($datoswop[2]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[5]==0){ $contcisco++;}
								}else{
									echo "<td></td>";
									$confto++;
								}
								if($datoswop[5]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[8]==0){ $contrackscan++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[8]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[17]==0){ $countsolar++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[17]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[14]==0){ $contcluster++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[14]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[20]==0){ $countsolar2++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[20]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[29]==0){ $contshark++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[29]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[23]==0){ $contwiring++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[23]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[32]==0){ $contdeid++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[32]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[35]==0){ $contmega++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[35]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[38]==0){ $conteota++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[38]==1){
									echo "<td bgcolor='#66CC99'></td>";
									 $terminados++;
								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswop[1].'</td><td class="tdinfo2">'.$datoswop[40].'</td></tr>';
							}
					}


					echo '</table>';

					echo ($confto>0) ? "<b>FTO: ".$confto .'</b>':"";
					echo ($contcisco>0) ? '<b><br>Cisco: '.$contcisco .'</b>':"";
					echo ($contrackscan>0) ? '<b><br>Rackscan: '.$contrackscan .'</b>':"";
					echo ($countsolar>0) ? '<b><br>Solar 1: '.$countsolar.'</b>' :"";
					echo ($contcluster>0) ? '<b><br>Cluster: '.$contcluster.'</b>' :"";
					echo ($countsolar2>0) ? '<b><br>Solar 2: '.$countsolar2.'</b>' :"";
					echo ($contshark>0) ? '<b><br>Sharknado: '.$contshark .'</b>':"";
					echo ($contwiring>0) ? '<b><br>Wiring check: '.$contwiring .'</b>':"";
					echo ($contdeid>0) ? '<b><br>DEID: '.$contdeid .'</b>':"";
					echo ($contmega>0) ? '<b><br>Megamind: '.$contmega .'</b>':"";
					echo ($conteota>0) ? '<b><br>EOTA: '.$conteota .'</b>':"";
					echo ($terminados>0) ? '<b><br>Terminados: '.$terminados .'</b>':"";
					echo '<br><br><br><br><hr>';
			}








break;
// _____________________________________________________________________________case 3___________________________________________________
case 3:







					$conmod2=mysqli_query($enlace, "SELECT Modelo FROM racksterminados where WO='$WO' AND Modelo ='Azure 4.1'");

					if($consmod2=mysqli_fetch_array($conmod2)){


					echo '<table class="stgral"><caption><h2>WO: '.$WO.'</h2></caption>
					<tr><th>Numero de serie</th><th>WO</th><th>SKU</th><th>Locacion</th><th>Modelo</th>
					<th><div class="verticalText">FTO</div></th><th><div class="verticalText">Cisco</div></th>
					<th><div class="verticalText">Rackscan</div></th><th><div class="verticalText">XTEE</div></th>
					<th><div class="verticalText">Cluster</div></th><th><div class="verticalText">Solar</div></th>
					<th><div class="verticalText">Wiringcheck</div></th><th><div class="verticalText">Bootstrap</div></th>
					<th><div class="verticalText">Sharknado</div></th>
					<th><div class="verticalText">DEID</div></th><th><div class="verticalText">Megamind</div></th>
					<th><div class="verticalText">EOTA</div></th><th>Hora Inicial</th><th>Hora Final</th></tr>
					';
					$confto=0; $contcisco=0; $contrackscan=0; $contxtee=0; $contcluster=0; $countsolar=0; $contbootstrap=0; $contshark=0; $contwiring=0; $contdeid=0; $contmega=0;
					$conteota=0; $terminados=0;


					$consultawot=mysqli_query($enlace, "SELECT * from racksterminados where WO='$WO' AND Modelo='Azure 4.1' ");
					while($datoswot=mysqli_fetch_row($consultawot)){
						echo '<tr> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswot[1].'">'.$datoswot[1].'</a></td><td class="tdinfo2">'.$datoswot[2].'</td><td class="tdinfo2">'.$datoswot[3].'</td><td class="tdinfo2">'.$datoswot[5].'</td><td class="tdinfo2">'.$datoswot[6].'</td>';
						$consultawotp=mysqli_query($enlace, "SELECT * from pruebasterminados where NoSerie='$datoswot[1]'");
						while($datoswotp=mysqli_fetch_row($consultawotp)){

								if($datoswotp[3]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[6]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[9]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[12]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[15]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[18]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[24]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[27]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[30]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[33]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[36]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswotp[39]==1){
									$terminados++;
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}

								echo '<td class="tdinfo2">'.$datoswotp[2].'</td><td class="tdinfo2">'.$datoswotp[41].'</td></tr>';
							}
					}
					echo '</table> ';
					echo ($confto>0) ? "<b><br>FTO: ".$confto .'</b>':"";
					echo ($contcisco>0) ? '<b><br>Cisco: '.$contcisco .'</b>':"";
					echo ($contrackscan>0) ? '<b><br>Rackscan: '.$contrackscan .'</b>':"";
					echo ($contxtee>0) ? '<b><br>XTEE: '.$contxtee.'</b>' :"";
					echo ($contcluster>0) ? '<b><br>Cluster: '.$contcluster.'</b>' :"";
					echo ($countsolar>0) ? '<b><br>Solar: '.$countsolar.'</b>' :"";
					echo ($contbootstrap>0) ? '<b><br>Bootstrap: '.$contbootstrap.'</b>' :"";
					echo ($contshark>0) ? '<b><br>Sharknado: '.$contshark .'</b>':"";
					echo ($contwiring>0) ? '<b><br>Wiring check: '.$contwiring .'</b>':"";
					echo ($contdeid>0) ? '<b><br>DEID: '.$contdeid .'</b>':"";
					echo ($contmega>0) ? '<b><br>Megamind: '.$contmega .'</b>':"";
					echo ($conteota>0) ? '<b><br>EOTA: '.$conteota .'</b>':"";
					echo ($terminados>0) ? '<b><br>Terminados: '.$terminados .'</b>':"";
					echo '<br><br><br><br><hr>';


	}else{

					echo '<table class="stgral"><caption><h2>WO: '.$WO.'</h2></caption>
					<tr><th>N&uacute;mero de serie</th><th>WO</th><th>SKU</th><th>Locacion</th><th>Modelo</th>
					<th><div class="verticalText">FTO</div></th><th><div class="verticalText">Cisco/HP</div></th><th><div class="verticalText">Rackscan</div></th><th><div class="verticalText">Solar 1</div></th><th><div class="verticalText">Cluster</div></th><th><div class="verticalText">Solar 2</div></th><th><div class="verticalText">Sharknado</div></th><th><div class="verticalText">Wiringcheck</div></th>
					<th><div class="verticalText">DEID</div></th><th><div class="verticalText">Megamind</div></th><th><div class="verticalText">EOTA</div></th><th>Hora Inicio</th><th>Hora Final</th></tr>
					';
					$confto=0; $contcisco=0; $contrackscan=0; $contcluster=0; $countsolar=0; $countsolar2=0; $contshark=0; $contwiring=0; $contdeid=0; $contmega=0;
					$conteota=0; $terminados=0;


					$consultawot=mysqli_query($enlace, "SELECT * from racksterminados where WO='$WO' AND Modelo='Dropbox' ");
					while($datoswot=mysqli_fetch_row($consultawot)){
						echo '<tr> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswot[1].'">'.$datoswot[1].'</a></td><td class="tdinfo2">'.$datoswot[2].'</td><td class="tdinfo2">'.$datoswot[3].'</td><td class="tdinfo2">'.$datoswot[5].'</td><td class="tdinfo2">'.$datoswot[6].'</td>';
						$consultawotp=mysqli_query($enlace, "SELECT * from pruebasterminados where NoSerie='$datoswot[1]'");
						while($datoswop=mysqli_fetch_row($consultawotp)){
								if($datoswop[3]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[6]==0){ $contcisco++;}
								}else{
									echo "<td></td>";
									$confto++;
								}
								if($datoswop[6]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[9]==0){ $contrackscan++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[9]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[18]==0){ $countsolar++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[18]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[15]==0){ $contcluster++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[15]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[21]==0){ $countsolar2++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[21]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[30]==0){ $contshark++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[30]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[24]==0){ $contwiring++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[24]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[33]==0){ $contdeid++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[33]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[36]==0){ $contmega++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[36]==1){
									echo "<td bgcolor='#66CC99'></td>";
									if($datoswop[39]==0){ $conteota++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[39]==1){
									echo "<td bgcolor='#66CC99'></td>";
									 $terminados++;
								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswop[2].'</td><td class="tdinfo2">'.$datoswop[41].'</td></tr>';

							}
					}
					echo '</table>';

					echo ($confto>0) ? "<b>FTO: ".$confto .'</b>':"";
					echo ($contcisco>0) ? '<b><br>Cisco: '.$contcisco .'</b>':"";
					echo ($contrackscan>0) ? '<b><br>Rackscan: '.$contrackscan .'</b>':"";
					echo ($countsolar>0) ? '<b><br>Solar 1: '.$countsolar.'</b>' :"";
					echo ($contcluster>0) ? '<b><br>Cluster: '.$contcluster.'</b>' :"";
					echo ($countsolar2>0) ? '<b><br>Solar 2: '.$countsolar2.'</b>' :"";
					echo ($contshark>0) ? '<b><br>Sharknado: '.$contshark .'</b>':"";
					echo ($contwiring>0) ? '<b><br>Wiring check: '.$contwiring .'</b>':"";
					echo ($contdeid>0) ? '<b><br>DEID: '.$contdeid .'</b>':"";
					echo ($contmega>0) ? '<b><br>Megamind: '.$contmega .'</b>':"";
					echo ($conteota>0) ? '<b><br>EOTA: '.$conteota .'</b>':"";
					echo ($terminados>0) ? '<b><br>Terminados: '.$terminados .'</b>':"";
					echo '<br><br><br><br><hr>';
			}




































break;
// _____________________________________________________________________________case 4___________________________________________________
case 4:
	echo '<center><div class="caja"><h2 style="color:white; background:#D91E18; margin-top:480px; padding:10px; width:500px;">No se encontro la WO</h2></div></center>';
break;
}





















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
