<?php

include('conexion.php');
include('consultas1.php');

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
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
	<link rel="stylesheet" href="../style/popup.css">

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

<link rel="stylesheet" href="../style/moodalbox.css" type="text/css" media="screen"/>
</head>
<body class="desarroll">

	<header>
	 <div class="grupo ">
      <div class="caja">
        <div class="container">
          <header class="clearfix header2">
            <span>Ingenieria de pruebas</span>
            <a href="/Statuspb/index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs - Joint Venture</h1></a>

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
					<nav>
				<center>	<ul class="topnav">
						<li ><a style="color:#CC263A; font-weight:bold;" class="hvr-underline-from-center" href="index.php">
						<img width="15" src="../img/home.png"> Inicio</a></li>
						<li style=""><a  class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
						<li><a class="hvr-underline-from-center" href="bahia2.php"><img width="10" src="../img/bay.png"> Bahia 2</a></li>
						<li><a class="hvr-underline-from-center" href="bahia3.php"><img width="10" src="../img/bay.png"> Bahia 3</a></li>
						<li><a class="hvr-underline-from-center" href="bahia4.php"><img width="10" src="../img/bay.png"> Bahia 4</a></li>
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
		<div class="grupo avisos ">

			<div class="caja" ><center><h1 style="font-size:4em;">Noticias JV</h1><br></center>
				<div><a href="Tavisos.php"> <center><h4 style=" border-radius:30px; background:transparent; color:white; width:50%; padding:10px;">Ver todas las noticias</h4></center></a><br></div>
			</div>
		</div>
			<?php
			$query=mysqli_query($enlace, "SELECT * FROM imagenes WHERE Area='JV' order by id desc limit 5");
			while($row = mysqli_fetch_array($query)){
						$idcom=$row['id'];
					$querty=mysqli_query($enlace, "SELECT * FROM noticomentarios WHERE ID='$idcom'");
					$contante=0;
					while($quertyrow = mysqli_fetch_array($querty)){
						$contante++;
					}
				?>
				<div class="grupo web-tabla noticias" style="color:white;">
				<div class="caja web-1-3" style="padding-left:0px; ">
								<center>

									<img style="height: 200px;  margin-left:0px; width:100%;" src="<?php if ($row['imagen']=='../upload/'){echo"../upload/Default.jpg";}else{echo $row['imagen'];} ?>" >
								</center>
							</div>
				<div class="caja web-2-3">
					<div style="float:right;">
							<i class="fa fa-calendar-o"> <?php echo $row['fecha'].'   ';?> </i>
							<i style="margin-left:40px; margin-right:10px; margin-top:10px;" class="fa fa-comments"><?php echo ' '.$contante.' ';?></i>
							</div>
					<?php echo "<h2>". $row['titulo']."</h2><br>";

					?>

					<?php echo "<p>". substr($row['descripcion'],0,50)."...
</p><br>";

					?>
					<div class="leer" style=" ">
					<center><a  href="aviso.php?id=<?php echo $row['id']; ?>"><div class="btn1">Leer m&aacute;s  &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right fa-lg"></i></div></a>
								</center>
					</div>
				</div>
				</div><br>
				<?php
			}
			?>
		</section>
			<section>
				<div class="grupo">
					<div class="caja">

						<center>

							<br><br><a href="buscar.php"><div class="btn1" style="width:50%;"> Buscar Rack / WO</div></a>


						</center>
					</div></div>
			</section>

	</section>
	<br><br><br>

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
