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
			<title>Administrar</title>
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
	<link rel="stylesheet" href="../style/popup.css">

	<!-- scripts -->
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

		<script type="text/javascript" src="js/mootools.js"></script>
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/moodalbox.js"></script> 
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
					
				<?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
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
						<li ><a style="color:#59ABE3; font-weight:bold;" class="hvr-underline-from-center" href="index.php">
						<img width="15" src="../img/home.png"> Inicio</a></li>
						<li style=""><a  class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
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
	</header>	
				<section>
					<!-- ********************LOGIN***********************************-->
					<?php  

					if(!isset($_SESSION['Nombre'])){  
						echo '<center> <div id="modal">
						<div class="modal-content ">
							<div class="header">
								<h2>Iniciar Sesion</h2>
							</div>
							<div class="copy">
								<div class="grupo">
									<div class="caja">
										<form method="post" action="login.php" class="login">
											<input type="text" name="Usuario" placeholder="N&uacute;mero de reloj" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'N&uacute;mero de reloj\'" maxlength="5" pattern=".{5,}" onkeypress="return justNumbers(event);">
											<input type="password" name="Password" placeholder="Contrase&ntilde;a" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Contrase&ntilde;a\'">
											<script type="text/javascript"> var URLactual = window.location.href+"#"; 
												document.write("<input type=\"hidden\" name=\"Url\" value="+URLactual+">");
											</script>
											<button class="btn1">Aceptar</button>
											<input class="btn2" type="button" value="Cerrar" onClick=" window.location.href=\'#\' ">
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
        <div class="caja">

       <?php 
       $id=$_GET['id'];
     

        ?>
            <?php  if(isset($_SESSION['Nombre'])&& $_SESSION['Nivel']=="1"){ ?>
            	<center>
		<div class="foto">
		<center>
		<div id="titulo"><h1>Subir Aviso</h1></div><br>
		<form action="modificarA.php" method="post" enctype="multipart/form-data">
			<input type="file" name="imagen">
			<br /><br/>
			<input class="inputl" type="text" name="titulo" placeholder="Titulo" required><br><br>
			<textarea name="descripcion" rows="20" cols="60" placeholder="descripcion..." maxlength="2000" required></textarea>
			<br><br>
			<button class="btn1" type="submit">Subir</button>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		</form>
		</div>
		</center>
		</div></center>

               <?php } ?>
        </div>
    </div>
</section>

						</body>
						</html>

						<?php }} ?>