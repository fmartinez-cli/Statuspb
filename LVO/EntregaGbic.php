<?php
include('conexion.php');

session_start();
$variableg= $_GET["pb"];
$consuser1=mysqli_query($enlace, "SELECT * FROM gibics WHERE Bahiag='$variableg'");
$rescon1=mysqli_fetch_array($consuser1);

if((empty($_SESSION['No_Reloj']))||(empty($_SESSION['Nivel']))){
	header("Location: index.php");
}else{

if (!isset($_SESSION['Nombre'])){
	header("Location: index.php");
	}else{

if(($_SESSION['Nivel']=='1')||($_SESSION['No_Reloj']==$rescon1['No_Reloj'])){


if(!isset($_REQUEST['pb'])){
							header("Location: index.php");
							}else{
//$variableg= $_GET["pb"];


$constatus=mysqli_query($enlace, "SELECT * FROM gibics INNER JOIN racks on racks.NoSerie=gibics.NoSerie WHERE Bahiag='$variableg' AND Disponible='0' ORDER BY Locacion");
$constatus2=mysqli_query($enlace, "SELECT * FROM gibics WHERE Bahiag='$variableg' AND Disponible='1' AND Falla='0'");
$constatus3=mysqli_query($enlace, "SELECT * FROM gibics WHERE Bahiag='$variableg' AND Falla='1'");



?>

<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="img/checkicon.png" />
<head>
	<title>Engrega gbics</title>
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

</head>

	<header>
		<div class="grupo ">
		<div class="caja">
			<div class="container">
				<header class="clearfix header2">
					<span>Ingenieria de pruebas</span>
					<a href="/Statuspb/index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs</h1></a>

				<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
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
						<li><a class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
						<li><a class="hvr-underline-from-center" href="bahia2.php"><img width="10" src="../img/bay.png"> Bahia 2</a></li>
						<li><a class="hvr-underline-from-center" href="bahia3.php"><img width="10" src="../img/bay.png"> Bahia 3</a></li>
						<li><a class="hvr-underline-from-center" href="bahia4.php"><img width="10" src="../img/bay.png"> Bahia 4</a></li>
						<li><a class="hvr-underline-from-center" href="bahia5.php"><img width="10" src="../img/bay.png"> Bahia 5</a></li>
						<li><a class="hvr-underline-from-center" href="bahia6.php"><img width="10" src="../img/bay.png"> Bahia 6</a></li>
						<li><a class="hvr-underline-from-center" href="bahia7.php"><img width="10" src="../img/bay.png"> Bahia 7</a></li>
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
			<center>


		</center>
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
	<center>
		<table class="tablamodal">
			<caption><h3>GBICS EN USO</h3></caption>
			<tr><th>CT gbic</th><th>Rack</th><th>Locacion</th></tr>
			<?php
			while($restatus=mysqli_fetch_array($constatus)){
				echo '<tr><td>'.$restatus['CtGibic'].'</td><td>'.$restatus['NoSerie'].'</td><td>'.$restatus['Locacion'].'</td></tr>';
			}
			?>

		</table>
		<?php
		echo '<table class="tablamodal">
			<caption><h3>GBICS RESTANTES</h3></caption>
			<tr><th>CT gbic</th><th>Status</th></tr>';

			while($restatus2=mysqli_fetch_array($constatus2)){
				echo '<tr><td>'.$restatus2['CtGibic'].'</td><td>Disponible</td></tr>';
			}
			while($restatus3=mysqli_fetch_array($constatus3)){
				echo '<tr><td>'.$restatus3['CtGibic'].'</td><td>Falla</td></tr>';
			}

		echo '</table>';

		echo '<table class="tablamodal">
			<caption><h3>EQUIPO DE TRABAJO</h3></caption>
			<tr><th>Componente</th><th>Cantidad</th></tr>
		</table>

		<br><br>
		<form action="comentarstatus.php" method="post">
		';

		$query = mysqli_query($enlace, "SELECT * FROM comentariostatus WHERE Bahia = '$variableg' ORDER BY id DESC LIMIT 5");

		echo'<h2><hr style="width:95%; margin-top:15px; height:5px; margin-bottom:15px; ">Comentarios</h2><br>';
		while ($datos=mysqli_fetch_array($query) ) {
		$actual = array("<", ">");
		$nuevo  = array("&lt ", "&gt");
		$comentario = str_replace($actual, $nuevo, $datos[1]);
		$vari=$variableg;

		if($datos[5]==0){
		echo '<div class="comentarios" >
		<div><p title="'.$datos[0].'"><h3>Tecnico (Libera estatus): '.$datos[3].'</h3></p></div><div style="white-space: pre-wrap; word-break: break-all; word-wrap: break-word;"><h5 style="color:#2574a9;">
		Fecha: '.$datos[7].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Turno '.$datos[4].'</h5><p style="white-space: pre-wrap; word-break: break-all; word-wrap: break-word;">'.$comentario.'</p><a href="estadotabla.php?pb='.$vari.'&fech='.$datos[8].'">Mostrar tabla</a></div></div><br>';
		}else{
		echo '<div class="comentarios" >
		<div><p title="'.$datos[0].'"><h3>Tecnico: '.$datos[5].'</h3></p></div><div style="white-space: pre-wrap; word-break: break-all; word-wrap: break-word;"><h5 style="color:#2574a9;">
		Fecha: '.$datos[7].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Turno '.$datos[4].' -> '.$datos[6].'<br>Entrega '.$datos[3].' - Recibe '.$datos[5].'</h5><p style="white-space: pre-wrap; word-break: break-all; word-wrap: break-word;">'.$comentario.'</p><a href="estadotabla.php?pb='.$vari.'&fech='.$datos[8].'">Mostrar tabla</a></div></div><br>';
		}
		}
		echo '<textarea name="comentario" rows="8" style=" resize: none; width:95%" placeholder="Comentario de quien recibe estatus" maxlength="255"></textarea>
		<br><br><input type="text" name="NoReloj2" class="Select2" placeholder="Numero de Reloj" required="" maxlength="5"><input type="password" name="Password" class="Select2" placeholder="Contrase&ntilde;a" required="">
		<input type="hidden" value="'.$variableg.'" name="Bahia">
		<button class="btn1" style="width:95%">Aceptar estatus</button>
		</form>
		';
		?>
	</center>
	</div>
	</div>

	<?php

	$dia=date('l');
	$const=mysqli_query($enlace, "SELECT * FROM gibics WHERE Bahiag='$variableg'");
	$conr=mysqli_fetch_array($const);

	if(($dia=='Saturday'||$dia=='Sunday')&&$conr['No_Reloj']!='0'){
		echo '<form action="liberarstatus.php" method="post">
		<input type="hidden" value="'.$variableg.'" name="Bahia">
		<center><button class="btn1">Liberar estatus</button></center>
		</form>';
	}

}//variable pb
}else{
	header("Location: index.php");
}
}//session nombre
}//empty
	?>
