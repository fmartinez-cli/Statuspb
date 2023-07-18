<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['Nombre'])){
	header("Location: index.php");
}else{

	if($_SESSION['Nivel']!='1'){
		header("Location: index.php");
	}else{

		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Editar t&eacute;cnico</title>
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
			<script type="text/javascript" src="../js/tecnicos.js"></script>
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
		<!-- ________________________________________________________________________________________ -->
<script>
	function Validar(NoReloj, Nombre, Pass, Pass2, Turno, Bahia, oldnoreloj)
	{
		$.ajax({
			url: "editartecnicoformbackend.php",
			type: "POST",
			data: "NoReloj="+NoReloj+"&Nombre="+Nombre+"&Pass="+Pass+"&Pass2="+Pass2+"&Turno="+Turno+"&Bahia="+Bahia+"&oldnoreloj="+oldnoreloj,
			success: function(resp){
				$('#resultado').html(resp)
			}
		});
	}</script>
	<!-- ________________________________________________________________________________________ -->
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

	</head>
	<body class="desarroll">

		<header>
		<div class="grupo ">
		<div class="caja">
			<div class="container">
				<header class="clearfix header2">
					<span>Ingenieria de pruebas</span>
					<a href="/Statuspb/index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs</h1></a><br>

				<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
				<?php
				if (isset($_SESSION['Nombre'])){
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
						<li style=""><a class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
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
				<section>
<center>
<?php
$NoReloj=$_REQUEST['NoReloj'];
$consulta=mysqli_query($enlace, "SELECT * FROM users WHERE No_Reloj= '$NoReloj'");

		if($cons=mysqli_fetch_array($consulta)){
				$Pass=$cons['Pass'];
				$Nombre=$cons['Nombre'];
				$Bahia=$cons['Bahia'];
				$Turno=$cons['Turno'];
		}else{
			header("Location: index.php");
		}
 ?>

					<div class="grupo">
						<div class="caja">
							<form id="registrotec" name="registrotec" method="POST" action="return false" onsubmit="return false">
<table class="formsadmin">
<tr><th><h2>Editar t&eacute;cnico</h2></th></tr>
<tr><td>
	<input type="hidden" name="oldnoreloj" id="oldnoreloj" value="<?php echo $NoReloj; ?>" form="registrotec">
	<input type="text" title="Ejemplo: 12345" value="<?php echo $NoReloj; ?>" name="NoReloj" form="registrotec" class="inputl" id="NoReloj" required placeholder="N&uacute;mero de reloj" pattern="[0-9]{5}" maxlength="5"></td></tr>
<tr><td><input type="text" title="Introduzca solo letras" style="text-transform:none;" value="<?php echo $Nombre; ?>" name="Nombre" form="registrotec" class="inputl" id="Nombre" required placeholder="Nombre" pattern="[a-zA-Z\ñ\Ñ\ ]{1,}" maxlength="30"></td></tr>
<tr><td><input type="password" name="Pass" form="registrotec" value="<?php echo $Pass; ?>" class="inputl" id="Pass" required placeholder="Contrase&ntilde;a"  maxlength="15"></td></tr>
<tr><td><input type="password" name="Pass2" form="registrotec" value="<?php echo $Pass; ?>" class="inputl" id="Pass2" required placeholder="Confirmar contrase&ntilde;a"  maxlength="15"></td></tr>
<tr><td><select class="inputl" name="Turno" id="Turno" form="registrotec" required>
<option value="<?php echo $Turno; ?>">Turno: <?php echo $Turno; ?></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
<tr><td><select class="inputl" name="Bahia" id="Bahia" form="registrotec" required>
<option value="<?php echo $Bahia; ?>">Bahia: <?php echo $Bahia; ?></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>

</select>
<tr>

<td ><button name="Registrar" form="registrotec" style="width:400px;" class="btn1" id="Registrar"
onclick="Validar(document.getElementById('NoReloj').value, document.getElementById('Nombre').value, document.getElementById('Pass').value,
document.getElementById('Pass2').value, document.getElementById('Turno').value, document.getElementById('Bahia').value, document.getElementById('oldnoreloj').value);">Actualizar</button></td></tr>
<tr><td><button class="btn1" form="none" onclick="location.href = 'administrar.php'">volver</button></td></tr>
</table>
<div id="resultado" style="font-size:22px;">&nbsp;</div>



        </div>
      </div>
  </center>
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

						<?php }} ?>
