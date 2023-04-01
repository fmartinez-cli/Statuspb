
<?php
include('conexion.php');
include('consultas1.php');
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>

<head>
 <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
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
        <div class="caja">
          <center>
            <nav>
              <ul class="topnav">
                <li ><a class="hvr-underline-from-center" href="index.php"><img width="15" src="../img/home.png"> Inicio</a></li>
                <li style=""><a  class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
                <li><a  class="hvr-underline-from-center" href="bahia2.php"><img width="10" src="../img/bay.png"> Bahia 2</a></li>
                <li><a class="hvr-underline-from-center" href="bahia3.php"><img width="10" src="../img/bay.png"> Bahia 3</a></li>
                <li><a class="hvr-underline-from-center" href="bahia4.php"><img width="10" src="../img/bay.png"> Bahia 4</a></li>
                <li><a class="hvr-underline-from-center" href="estadisticas.php"><img width="25" src="../img/estadisticas.png"> Estad&iacute;sticas</a></li>
                <li><a class="hvr-underline-from-center" href="statusgral.php"><img width="32" src="../img/status.png"> Estatus General</a></li>
                <?php  if(isset($_SESSION['Nombre'])){ echo '<li><a class="hvr-underline-from-center" href="../logout.php"><img width="25" src="../img/logout.png"></a></li>';}
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
<div class="caja"><div class="caja web-50" style="float:right; position:relative;"><center><br><br><br><h2>Buscar WO</h2></center>
		<form class="buscador" action="buscar.php" method="post">
			<input name='WO' placeholder="WO" type="text" pattern="[0-9]{9}" maxlength="9" required><br>
			<button class="btn2" style="width:300px">Buscar</button>
		</form></div>
		<div class="caja web-50"  style="float:left;  position:relative;"><center><br><br><br><h2>Buscar Rack</h2></center>
		<form class="buscador" action="buscarr.php" method="post">
			<input name='NoSerie' placeholder="No Serie" type="text" pattern="2[mM{1}]2[0-9a-zA-Z]{7}" maxlength="10" required><br>
			<button class="btn2" style="width:300px">Buscar</button>
		</form></div>


		<?php
		if(isset($_REQUEST['NoSerie'])){





		$variable=strtoupper($_REQUEST['NoSerie']);
		$cons=mysqli_query($enlace, "SELECT * FROM racksjv WHERE NoSerie = '$variable'");
		$cons2=mysqli_query($enlace, "SELECT * FROM pruebasjv where NoSerie = '$variable'");
		$consterm=mysqli_query($enlace, "SELECT * FROM racksterminadosjv WHERE NoSerie = '$variable'");
		$consterm2=mysqli_query($enlace, "SELECT * FROM pruebasterminadasjv where NoSerie = '$variable'");

		if($con=mysqli_fetch_array($cons)){
		$modal=1;


 }elseif($conterm=mysqli_fetch_array($consterm)) {
 	$modal=2;
 }else{
 	$modal=3;
 }








switch ($modal) {
	case '1':

$conp=mysqli_fetch_array($cons2);


$ftonr = $conp['FTONoReloj'];
$arista1nr = $conp['Arista0NoReloj'];
$arista2nr = $conp['Arista1NoReloj'];
$rackscannr = $conp['RackscanNoReloj'];
$clustern0nr = $conp['Cluster0NoReloj'];
$clustern1nr = $conp['Cluster1NoReloj'];
$bootstrapnr = $conp['BootstrapNoReloj'];
$CMnr = $conp['CMNoReloj'];
$deidnr = $conp['DEIDNoReloj'];
$eotanr = $conp['EOTANoReloj'];


$consfto=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$ftonr'");
$confto=mysqli_fetch_array($consfto);
$consarista1=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$arista1nr'");
$conarista1=mysqli_fetch_array($consarista1);
$consarista2=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$arista2nr'");
$conarista2=mysqli_fetch_array($consarista2);
$consrackscan=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$rackscannr'");
$conrackscan=mysqli_fetch_array($consrackscan);
$conscluster0=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$clustern0nr'");
$concluster0=mysqli_fetch_array($conscluster0);
$conscluster1=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$clustern1nr'");
$concluster1=mysqli_fetch_array($conscluster1);
$consbootstrap=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$bootstrapnr'");
$conbootstrap=mysqli_fetch_array($consbootstrap);
$conscm=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$CMnr'");
$concm=mysqli_fetch_array($conscm);
$consdeid=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$deidnr'");
$condeid=mysqli_fetch_array($consdeid);
$conseota=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$eotanr'");
$coneota=mysqli_fetch_array($conseota);





$inicionr=$con['NoReloj'];
$consinicio=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$inicionr'");
$conpinicio=mysqli_fetch_array($consinicio);
echo "
<center>
	<table class='tablamodal'>
	<caption><h3>".$con['NoSerie']."</h3></caption>
	<tr><th>WO</th><th>SKU</th><th>Modelo</th><th>Registrado por:</th><th>Hora</th></tr>
	<tr>
	<td>".$con['WO']."</td>".
	"<td>". $con['SKU']."</td>".
	"<td>".$con['Modelo']."</td>".
	"<td><p class='info'>". $con['NoReloj']."<span>".$conpinicio['Nombre']." <br> ".$conpinicio['Turno']."&deg; Turno</span></p></td>".
	"<td>". $conp['HoraInicio']."</td></tr>
	";
echo "</table></center>";

echo "<center>
	<table class='tablaprueba'>
	<tr><th>Prueba</th><th>Status</th><th>Tecnico</th><th>Hora</th></tr>

	<form method='post' action='' id='formazure41'>
	<input form='formazure41' type='hidden' name='tr' value='".$tr."'>
		<input type='hidden' name='noserie' value='".$con['NoSerie']."' form='formazure41'>
		<tr><td>FTO:</td>
		<td>";
			if($conp['FTO']==1){
			echo "<input type='checkbox' name='test' value='fto'  disabled checked >";
		}else{
			echo "<input type='checkbox' name='test' value='fto' form='formazure41' disabled required >";}
echo "		</td>
		<td><p class='info' title=''>".$conp['FTONoReloj']."<span>".$confto['Nombre']."  <br>  ".$confto['Turno']."&deg; Turno</span></p></td>
		<td>".$conp['FTOHoraFinal']."</td>
		</tr>

		<tr><td>Configurar Arista 1:</td>
		<td>";
			if($conp['Arista0']==1){
			echo "<input type='checkbox' name='test' value='arista1' disabled checked>";
			}elseif($conp['FTO']==0){
				echo"<input type='checkbox' name='test' value='arista0'  disabled>";}
			else{ echo"<input type='checkbox' name='test' value='arista0' required disabled form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Arista0NoReloj']."<span>".$conarista1['Nombre']."  <br>  ".$conarista1['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Arista0HoraFinal']."</td>
				</tr>

				<tr><td>Configurar Arista 2:</td>
		<td>";
			if($conp['Arista1']==1){
			echo "<input type='checkbox' name='test' value='arista2' disabled checked>";
			}elseif($conp['Arista1']==0){
				echo"<input type='checkbox' name='test' value='arista1' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='arista1' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Arista1NoReloj']."<span>".$conarista2['Nombre']."  <br>  ".$conarista2['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Arista1HoraFinal']."</td>
				</tr>

				<tr><td>CM:</td>
		<td>";
			if($conp['CM']==1){
			echo "<input type='checkbox' name='test' value='cm' disabled checked>";
			}elseif($conp['Arista1']==0){
				echo"<input type='checkbox' name='test' value='cm' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cm' disabled required form='formazure41'>"; }
echo "</td><td><p   class='info' title=''>".$conp['CMNoReloj']."<span>".$concm['Nombre']."  <br>  ".$concm['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['CMHoraFinal']."</td>
				</tr>

				<tr><td>Cluster Nic 0:</td>
		<td>";
			if($conp['Cluster0']==1){
			echo "<input type='checkbox' name='test' value='cluster0' disabled checked>";
			}elseif($conp['Arista2']==0){
				echo"<input type='checkbox' name='test' value='cluster0' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cluster0' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Cluster0NoReloj']."<span>".$concluster0['Nombre']."  <br>  ".$concluster0['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Cluster0HoraFinal']."</td>
				</tr>

				<tr><td>Cluster Nic 1:</td>
		<td>";
			if($conp['Cluster1']==1){
			echo "<input type='checkbox' name='test' value='cluster1' disabled checked>";
			}elseif($conp['ClusterNic0']==0){
				echo"<input type='checkbox' name='test' value='cluster1' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cluster1' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Cluster1NoReloj']."<span>".$concluster1['Nombre']."  <br>  ".$concluster1['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Cluster1HoraFinal']."</td>
				</tr>



		<tr><td>Bootstrap:</td>
		<td>";
			if($conp['Bootstrap']==1){
			echo "<input type='checkbox' name='test' value='bootstrap' disabled checked>";
			}elseif($conp['Cluster1']==0){
				echo"<input type='checkbox' name='test' value='bootstrap' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='bootstrap' disabled required form='formazure41'>"; }
echo "</td><td><p   class='info' title=''>".$conp['BootstrapNoReloj']."<span>".$conbootstrap['Nombre']."  <br>  ".$conbootstrap['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['BootstrapHoraFinal']."</td>
				</tr>

				<tr><td>Rackscan:</td>
		<td>";
			if($conp['Rackscan']==1){
			echo "<input type='checkbox' name='test' value='rackscan' disabled checked>";
			}elseif($conp['Bootstrap']==0){
				echo"<input type='checkbox' name='test' value='rackscan' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='rackscan' disabled required form='formazure41'>"; }
echo "</td><td><p  class='info'  title=''>".$conp['RackscanNoReloj']."<span>".$conrackscan['Nombre']."  <br>  ".$conrackscan['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['RackscanHoraFinal']."</td>
				</tr>

				<tr><td>DEID:</td>
		<td>";
			if($conp['DEID']==1){
			echo "<input type='checkbox' name='test' value='deid' disabled checked>";
			}elseif($conp['Rackscan']==0){
				echo"<input type='checkbox' name='test' value='deid' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='deid' disabled required form='formazure41'>"; }
echo "</td><td><p  class='info' title=''>".$conp['DEIDNoReloj']."<span>".$condeid['Nombre']."  <br>  ".$condeid['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['DEIDHoraFinal']."</td>
				</tr>

				<tr><td>EOTA:</td>
		<td>";
			if($conp['EOTA']==1){
			echo "<input type='checkbox' name='test' value='eota' disabled checked>";
			}elseif($conp['DEID']==0){
				echo"<input type='checkbox' name='test' value='eota' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='eota' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['EOTANoReloj']."<span>".$coneota['Nombre']."  <br>  ".$coneota['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['EOTAHoraFinal']."</td>
				</tr></table>";




	$query = mysqli_query($enlace, "SELECT * FROM comentarios WHERE NoSerie = '$variable' ORDER BY ID ASC");

echo'<br><h2 style="text-align:left;">Comentarios.</h2>';
while ($datos=mysqli_fetch_row($query) ) {
	$actual = array("<", ">");
	$nuevo  = array("&lt ", "&gt");
	$comentario = str_replace($actual, $nuevo, $datos[5]);
echo '<div style="text-align:left" class="comentarios">
<div><p title="'.$datos[2].'"><h3>Técnico: '.$datos[3].'</h3></p></div><div><h5>Fecha: '.$datos[4].'</h5><br>
<pre>'.$comentario.'</pre>
</div></div><br>';
}
	break;

	case '2':



$conp=mysqli_fetch_array($consterm2);


$ftonr = $conp['FTONoReloj'];
$arista1nr = $conp['Arista0NoReloj'];
$arista2nr = $conp['Arista1NoReloj'];
$rackscannr = $conp['RackscanNoReloj'];
$clustern0nr = $conp['Cluster0NoReloj'];
$clustern1nr = $conp['Cluster1NoReloj'];
$bootstrapnr = $conp['BootstrapNoReloj'];
$CMnr = $conp['CMNoReloj'];
$deidnr = $conp['DEIDNoReloj'];
$eotanr = $conp['EOTANoReloj'];


$consfto=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$ftonr'");
$confto=mysqli_fetch_array($consfto);
$consarista1=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$arista1nr'");
$conarista1=mysqli_fetch_array($consarista1);
$consarista2=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$arista2nr'");
$conarista2=mysqli_fetch_array($consarista2);
$consrackscan=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$rackscannr'");
$conrackscan=mysqli_fetch_array($consrackscan);
$conscluster0=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$clustern0nr'");
$concluster0=mysqli_fetch_array($conscluster0);
$conscluster1=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$clustern1nr'");
$concluster1=mysqli_fetch_array($conscluster1);
$consbootstrap=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$bootstrapnr'");
$conbootstrap=mysqli_fetch_array($consbootstrap);
$conscm=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$CMnr'");
$concm=mysqli_fetch_array($conscm);
$consdeid=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$deidnr'");
$condeid=mysqli_fetch_array($consdeid);
$conseota=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$eotanr'");
$coneota=mysqli_fetch_array($conseota);





$inicionr=$con['NoReloj'];
$consinicio=mysqli_query($enlace, "SELECT Nombre, Turno FROM users where No_Reloj = '$inicionr'");
$conpinicio=mysqli_fetch_array($consinicio);
echo "
<center>
	<table class='tablamodal'>
	<caption><h3>".$conterm['NoSerie']."</h3></caption>
	<tr><th>WO</th><th>SKU</th><th>Modelo</th><th>Registrado por:</th><th>Hora</th></tr>
	<tr>
	<td>".$conterm['WO']."</td>".
	"<td>". $conterm['SKU']."</td>".
	"<td>".$conterm['Modelo']."</td>".
	"<td><p class='info'>". $conterm['NoReloj']."<span>".$conpinicio['Nombre']." <br> ".$conpinicio['Turno']."&deg; Turno</span></p></td>".
	"<td>". $conp['HoraInicio']."</td></tr>
	";
echo "</table></center>";

echo "<center>
	<table class='tablaprueba'>
	<tr><th>Prueba</th><th>Status</th><th>Tecnico</th><th>Hora</th></tr>

	<form method='post' action='' id='formazure41'>
	<input form='formazure41' type='hidden' name='tr' value='".$tr."'>
		<input type='hidden' name='noserie' value='".$con['NoSerie']."' form='formazure41'>
		<tr><td>FTO:</td>
		<td>";
			if($conp['FTO']==1){
			echo "<input type='checkbox' name='test' value='fto'  disabled checked >";
		}else{
			echo "<input type='checkbox' name='test' value='fto' form='formazure41' disabled required >";}
echo "		</td>
		<td><p class='info' title=''>".$conp['FTONoReloj']."<span>".$confto['Nombre']."  <br>  ".$confto['Turno']."&deg; Turno</span></p></td>
		<td>".$conp['FTOHoraFinal']."</td>
		</tr>

		<tr><td>Configurar Arista 1:</td>
		<td>";
			if($conp['Arista0']==1){
			echo "<input type='checkbox' name='test' value='arista1' disabled checked>";
			}elseif($conp['FTO']==0){
				echo"<input type='checkbox' name='test' value='arista0'  disabled>";}
			else{ echo"<input type='checkbox' name='test' value='arista0' required disabled form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Arista0NoReloj']."<span>".$conarista1['Nombre']."  <br>  ".$conarista1['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Arista0HoraFinal']."</td>
				</tr>

				<tr><td>Configurar Arista 2:</td>
		<td>";
			if($conp['Arista1']==1){
			echo "<input type='checkbox' name='test' value='arista2' disabled checked>";
			}elseif($conp['Arista1']==0){
				echo"<input type='checkbox' name='test' value='arista1' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='arista1' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Arista1NoReloj']."<span>".$conarista2['Nombre']."  <br>  ".$conarista2['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Arista1HoraFinal']."</td>
				</tr>

				<tr><td>CM:</td>
		<td>";
			if($conp['CM']==1){
			echo "<input type='checkbox' name='test' value='cm' disabled checked>";
			}elseif($conp['Arista1']==0){
				echo"<input type='checkbox' name='test' value='cm' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cm' disabled required form='formazure41'>"; }
echo "</td><td><p   class='info' title=''>".$conp['CMNoReloj']."<span>".$concm['Nombre']."  <br>  ".$concm['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['CMHoraFinal']."</td>
				</tr>

				<tr><td>Cluster Nic 0:</td>
		<td>";
			if($conp['Cluster0']==1){
			echo "<input type='checkbox' name='test' value='cluster0' disabled checked>";
			}elseif($conp['Arista2']==0){
				echo"<input type='checkbox' name='test' value='cluster0' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cluster0' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Cluster0NoReloj']."<span>".$concluster0['Nombre']."  <br>  ".$concluster0['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Cluster0HoraFinal']."</td>
				</tr>

				<tr><td>Cluster Nic 1:</td>
		<td>";
			if($conp['Cluster1']==1){
			echo "<input type='checkbox' name='test' value='cluster1' disabled checked>";
			}elseif($conp['ClusterNic0']==0){
				echo"<input type='checkbox' name='test' value='cluster1' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='cluster1' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['Cluster1NoReloj']."<span>".$concluster1['Nombre']."  <br>  ".$concluster1['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['Cluster1HoraFinal']."</td>
				</tr>



		<tr><td>Bootstrap:</td>
		<td>";
			if($conp['Bootstrap']==1){
			echo "<input type='checkbox' name='test' value='bootstrap' disabled checked>";
			}elseif($conp['Cluster1']==0){
				echo"<input type='checkbox' name='test' value='bootstrap' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='bootstrap' disabled required form='formazure41'>"; }
echo "</td><td><p   class='info' title=''>".$conp['BootstrapNoReloj']."<span>".$conbootstrap['Nombre']."  <br>  ".$conbootstrap['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['BootstrapHoraFinal']."</td>
				</tr>

				<tr><td>Rackscan:</td>
		<td>";
			if($conp['Rackscan']==1){
			echo "<input type='checkbox' name='test' value='rackscan' disabled checked>";
			}elseif($conp['Bootstrap']==0){
				echo"<input type='checkbox' name='test' value='rackscan' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='rackscan' disabled required form='formazure41'>"; }
echo "</td><td><p  class='info'  title=''>".$conp['RackscanNoReloj']."<span>".$conrackscan['Nombre']."  <br>  ".$conrackscan['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['RackscanHoraFinal']."</td>
				</tr>

				<tr><td>DEID:</td>
		<td>";
			if($conp['DEID']==1){
			echo "<input type='checkbox' name='test' value='deid' disabled checked>";
			}elseif($conp['Rackscan']==0){
				echo"<input type='checkbox' name='test' value='deid' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='deid' disabled required form='formazure41'>"; }
echo "</td><td><p  class='info' title=''>".$conp['DEIDNoReloj']."<span>".$condeid['Nombre']."  <br>  ".$condeid['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['DEIDHoraFinal']."</td>
				</tr>

				<tr><td>EOTA:</td>
		<td>";
			if($conp['EOTA']==1){
			echo "<input type='checkbox' name='test' value='eota' disabled checked>";
			}elseif($conp['DEID']==0){
				echo"<input type='checkbox' name='test' value='eota' disabled>";}
			else{ echo"<input type='checkbox' name='test' value='eota' disabled required form='formazure41'>"; }
echo "</td><td><p class='info' title=''>".$conp['EOTANoReloj']."<span>".$coneota['Nombre']."  <br>  ".$coneota['Turno']."&deg; Turno</span></p></td>
				<td>".$conp['EOTAHoraFinal']."</td>
				</tr></table>";




	$query = mysqli_query($enlace, "SELECT * FROM comentarios WHERE NoSerie = '$variable' ORDER BY ID ASC");

echo'<br><h2 style="text-align:left;">Comentarios.</h2>';
while ($datos=mysqli_fetch_row($query) ) {
	$actual = array("<", ">");
	$nuevo  = array("&lt ", "&gt");
	$comentario = str_replace($actual, $nuevo, $datos[5]);
echo '<div style="text-align:left" class="comentarios">
<div><p title="'.$datos[2].'"><h3>Técnico: '.$datos[3].'</h3></p></div><div><h5>Fecha: '.$datos[4].'</h5><br>
<pre>'.$comentario.'</pre>
</div></div><br>';
}





	break;

	case '3':
				echo '<center><div><h2 style="color:white; background:#D91E18; margin-top:300px; padding:10px; width:500px; ">No se encontr&oacute; el n&uacute;mero de serie</h2></div></center>';

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
