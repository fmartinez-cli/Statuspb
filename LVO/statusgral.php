 <?php
include('conexion.php');

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Estatus general</title>
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
<script type="text/javascript" src="../js/html2canvas.js"></script>
<script type="text/javascript" src="../js/filesaver.js"></script>
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
					<nav>
					<center>
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
						<li><a   class="hvr-underline-from-center" href="estadisticas.php"><img width="25" src="../img/estadisticas.png"> Estad&iacute;sticas</a></li>
						<li><a style="color:#59ABE3; font-weight:bold;" class="hvr-underline-from-center" href="statusgral.php"><img width="32" src="../img/status.png"> Estatus General</a></li>
						<?php  if(isset($_SESSION['Nombre'])){ echo '<li><a class="hvr-underline-from-center" href="logout.php"><img width="25" src="../img/logout.png"></a></li>';}
						else{ echo '<li><a class="hvr-underline-from-center" href="#modal"><img width="25" src="../img/login.png"></a></li>'; }?>
						<li class="icon">
							<a href="javascript:void(0);" onclick="myFunction()">&#9776;</a></li>
						</ul>
					</center>
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
	<div class="grupo">
			<div class="caja">
	 <div class="exportar" >
	<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p><img src="../img/excel.png" width="40" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form></div> <section id="contenido" style="background:white;">
	<section id="Exportar_a_Excel"  >

			<?php
/**Tabla de la pagina web */
$consulta = mysqli_query($enlace, "SELECT DISTINCT(WO) from racks WHERE Modelo='Microsoft 8.2'");
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
		<th>Hora Final</th> <th> </th></tr>
        ';


					$confto=0; $contquicktest=0; $contstress=0; $countmdaas=0; $contracktest=0; $countfti=0; $contbootstrap=0; $contcts=0; $contpacking=0;$terminados=0;
					$consultawo=mysqli_query($enlace, "SELECT * from racks where WO='$datos[0]'");
					while($datoswo=mysqli_fetch_row($consultawo)){


						echo '<tr><td class="tdinfo2">'.$contador.'</td> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswo[0].'">'.$datoswo[0].'</a></td><td class="tdinfo2">'.$datoswo[1].'</td><td class="tdinfo2">'.$datoswo[2].'</td><td class="tdinfo2">'.$datoswo[4].'</td><td class="tdinfo2">'.$datoswo[5].'</td>';
					$consultawop=mysqli_query($enlace, "SELECT * from pruebasMicro where NoSerie='$datoswo[0]'");
							$contador++;
              while($datoswop=mysqli_fetch_row($consultawop)){
								if($datoswop[2]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[5]==0){ $contfto=$contfto+1;
									}
								}else{
									$confto++;
									echo "<td></td>";
								}
								if($datoswop[5]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[8]==0){ $contquicktest=$contquicktest+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[8]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[11]==0){ $contstress=$contstress+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[11]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[14]==0){ $countmdaas=$countmdaas+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[14]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[17]==0){ $countracktest=$countracktest+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[17]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[23]==0){ $countfti=$countfti+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[23]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[26]==0){ $contbootstrap=$contbootstrap+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[26]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[29]==0){ $contcts=$contcts+1;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[29]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[32]==0){ $contpacking=$contpacking+1;
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
								$hora= Date('Y-m-d h:i:s');
								$iniciosem = new DateTime($datoswop[1]);
								$finalsem =  new DateTime($hora);
								$intervalsem = $iniciosem->diff($finalsem);
								$diassem = $intervalsem->d;
								$horassem = $intervalsem->h;
								$horadiassem = $diassem * 24;
								$minutossem = ($intervalsem->i)/60;
								$totalsem= $horassem+$minutossem+$horadiassem;
								$totalsemfinal = number_format($totalsem, '2', '.', ',');
								if($totalsemfinal>=72){
									$semaforo="#F22613";
								}elseif($totalsemfinal>=60&&$totalsemfinal<=71){

									$semaforo="#F9BF3B";}else{
										$semaforo="#2ECC71";

									}

								echo '<td class="tdinfo2">'.$datoswop[1].'</td><td class="tdinfo2">'.$datoswop[40].'</td>
								<td style="color:'.$semaforo.'; background-color:'.$semaforo.'" class="tdinfo2">hola</td>
								</tr>';
							}
					}

					$consultawot=mysqli_query($enlace, "SELECT * from racksterminados where WO='$datos[0]' ");
					while($datoswot=mysqli_fetch_row($consultawot)){
						echo '<tr> <td class="tdinfo2">'.$contador.'</td><td class="tdinfo2"><a style="color:black" href="buscar.php?NoSerie='.$datoswot[1].'">'.$datoswot[1].'</a></td><td class="tdinfo2">'.$datoswot[2].'</td><td class="tdinfo2">'.$datoswot[3].'</td><td class="tdinfo2">'.$datoswot[5].'</td><td class="tdinfo2">'.$datoswot[6].'</td>';
						$consultawotp=mysqli_query($enlace, "SELECT * from pruebasterminadosMicro where NoSerie='$datoswot[1]'");
						$contador++;
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

								echo '<td class="tdinfo2">'.$datoswotp[2].'</td><td class="tdinfo2">'.$datoswotp[41].'</td>
								<td class="tdinfo2"></td>
								</tr>';
							}
					}
					/**Tabla para sumar los racks totales */
					echo '</table> ';
					echo ($confto>0) ? "<b><br>FTO: ".$confto .'</b>':"";
					echo ($contquicktest>0) ? '<b><br>QuickTest: '.$contquicktest .'</b>':"";
					echo ($contstress>0) ? '<b><br>Stress: '.$contstress .'</b>':"";
					echo ($countmdaas>0) ? '<b><br>MDaaS: '.$countmdaas.'</b>' :"";
					echo ($countracktest>0) ? '<b><br>RackTest: '.$countracktest.'</b>' :"";
					echo ($countfti>0) ? '<b><br>FTI: '.$countfti.'</b>' :"";
					echo ($contbootstrap>0) ? '<b><br>BSL: '.$contbootstrap.'</b>' :"";
					echo ($contcts>0) ? '<b><br>CTS: '.$contcts .'</b>':"";
					echo ($contpacking>0) ? '<b><br>Packing: '.$contpacking .'</b>':"";
					echo '<br><br><br><br><hr>';
			}

	$consulta=mysqli_query($enlace, "SELECT DISTINCT(WO) from racks WHERE Modelo='Dropbox'");

      while($datos=mysqli_fetch_row($consulta)){
								$contador2=1;
					echo '<table class="stgral"><caption><h2>WO: '.$datos[0].'</h2></caption>
					<tr><th>No.</th><th>N&uacute;mero de serie</th><th>WO</th><th>SKU</th><th>Locacion</th><th>Modelo</th>
					<th><div class="verticalText">FTO</div></th><th><div class="verticalText">Cisco/HP</div></th><th><div class="verticalText">Rackscan</div></th><th><div class="verticalText">Solar 1</div></th><th><div class="verticalText">Cluster</div></th><th><div class="verticalText">Solar 2</div></th><th><div class="verticalText">Sharknado</div></th><th><div class="verticalText">Wiringcheck</div></th>
					<th><div class="verticalText">DEID</div></th><th><div class="verticalText">Megamind</div></th><th><div class="verticalText">EOTA</div></th><th>Hora Inicio</th><th>Hora Final</th></tr>
					';
					$confto=0; $contcisco=0; $contrackscan=0; $contcluster=0; $countsolar=0; $countsolar2=0; $contshark=0; $contwiring=0; $contdeid=0; $contmega=0;
					$conteota=0; $terminados=0;
					$consultawo=mysqli_query($enlace, "SELECT * from racks where WO='$datos[0]'");
					while($datoswo=mysqli_fetch_row($consultawo)){
						echo '<tr> <td class="tdinfo2">'.$contador2.'</td><td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswo[0].'">'.$datoswo[0].'</a></td><td class="tdinfo2">'.$datoswo[1].'</td><td class="tdinfo2">'.$datoswo[2].'</td><td class="tdinfo2">'.$datoswo[4].'</td><td class="tdinfo2">'.$datoswo[5].'</td>';
					$consultawop=mysqli_query($enlace, "SELECT * from pruebas where NoSerie='$datoswo[0]'");
							$contador2++;
              while($datoswop=mysqli_fetch_row($consultawop)){
								if($datoswop[2]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[5]==0){ $contcisco++;}
								}else{
									echo "<td></td>";
									$confto++;
								}
								if($datoswop[5]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[8]==0){ $contrackscan++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[8]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[17]==0){ $countsolar++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[17]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[14]==0){ $contcluster++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[14]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[20]==0){ $countsolar2++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[20]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[29]==0){ $contshark++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[29]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[23]==0){ $contwiring++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[23]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[32]==0){ $contdeid++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[32]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[35]==0){ $contmega++;}
								}else{
									echo "<td></td>";
								}
								if($datoswop[35]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[38]==0){ $conteota++;}
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

					$consultawot=mysqli_query($enlace, "SELECT * from racksterminados where WO='$datos[0]' ");
					while($datoswot=mysqli_fetch_row($consultawot)){
						echo '<tr> <td class="tdinfo2">'.$contador2.'</td><td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswot[1].'">'.$datoswot[1].'</a></td><td class="tdinfo2">'.$datoswot[2].'</td><td class="tdinfo2">'.$datoswot[3].'</td><td class="tdinfo2">'.$datoswot[5].'</td><td class="tdinfo2">'.$datoswot[6].'</td>';
						$consultawotp=mysqli_query($enlace, "SELECT * from pruebasterminadosMicro where NoSerie='$datoswot[1]'");
						$contador2++;
            while($datoswop=mysqli_fetch_row($consultawotp)){
							if($datoswop[3]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[6]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[9]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[18]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[15]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[21]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[30]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[24]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[33]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[36]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datoswop[39]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									$terminados++;
								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswop[2].'</td><td class="tdinfo2">'.$datoswop[41].'</td></tr>';

							}
					}
					echo '</table>';

					echo ($confto>0) ? "<b>FTO: ".$confto .'</b>':"";
					echo ($contquicktest>0) ? '<b><br>Quick Test:'.$contquicktest .'</b>':"";
					echo ($contstress>0) ? '<b><br>Stress: '.$contstress .'</b>':"";
					echo ($counmdaas>0) ? '<b><br>MDaaS: '.$countmdaas.'</b>' :"";
					echo ($contracktest>0) ? '<b><br>Racktest: '.$contracktest.'</b>' :"";
					echo ($countfti>0) ? '<b><br>FTI: '.$countfti.'</b>' :"";
					echo ($contbootstrap>0) ? '<b><br>BSL: '.$contbootstrap .'</b>':"";
					echo ($contcts>0) ? '<b><br>CTS: '.$contcts .'</b>':"";
					echo ($contpacking>0) ? '<b><br>Packing: '.$contpacking .'</b>':"";
					echo ($terminados>0) ? '<b><br>Terminados: '.$terminados .'</b>':"";
					echo '<br><br><br><br><hr>';
			}
			 ?>

			</div>

		</div>
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

                      /*
                      canvas.toBlob(function(blob) {
                        saveAs(blob, "Dashboard.png");
                      });
                      */
                  }
              });
          });
      });
</script>
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
