<?php

include('LVO/conexion.php');


session_start();
?>
<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
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
	<div class="grupo web-tabla avisoss">

		<div class="caja" style="padding:20px; background:#CC263A;"><center><h1>Avisos</h1></center>

		</div>

				<?php
				$query=mysqli_query($enlace, "SELECT * FROM imagenes WHERE Area='TEST' order by id desc limit 20");
				while($row = mysqli_fetch_array($query)){
				 ?>
				<div title="Leer mas" class=" caja web-1-3 centrar avi">

				<?php echo "<h2>". $row['titulo']."</h2>";

				 ?>
				<img class="centrar" style=" height:100px; border:3px solid #3e3e3e;" src="<?php if ($row['imagen']=='upload/'){echo"upload/Default.jpg";}else{echo $row['imagen'];} ?>" >
				<center><div class="btn1"><a style="text-align:center; text-decoration:none;color:white; " href="aviso.php?id=<?php echo $row['id']; ?>">Leer mas</a></div><br><br><br></center>
				</div>
				<?php
			}
				 ?>


	</div>
	<br><br><br>
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
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:100; background-color: #FAFAFA; color: #000000; display:none;">

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
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:100; background-color: #FAFAFA; color: #000000; display:none;">

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
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:100; background-color: #FAFAFA; color: #000000; display:none;">

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

<!-- scripsa adicionales -->
<script src="js/cbpHorizontalSlideOutMenu.min.js"></script>
<script>
var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
</script>




</body>
</html>
