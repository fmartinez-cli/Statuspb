<?php

include('microsoft/conexion.php');

session_start();
?>
<!DOCTYPE html>
<html>
<?php include('header.php');?>

	<section>
		<div class="grupo">
			<div class="caja">
				<section>
					<div class="grupo avisosP " >

						<div class="caja" style=" background:#2574a9;"><center><h1 style="font-size:4em;">Noticias </h1><br></center>
							<div><a href="Tavisos.php"> <center><h4 style=" border-radius:30px; background:transparent; color:white; width:50%; padding:10px;">Ver todas las noticias</h4></center></a></div><br>
						</div>
					</div>

					<?php
					$query=mysqli_query($enlace, "SELECT * FROM imagenes WHERE Area='TEST' order by id desc limit 5");




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

									<img style="height: 200px;  margin-left:0px; width:100%;" src="<?php if ($row['imagen']=='upload/'){echo"upload/Default.jpg";}else{echo $row['imagen'];} ?>" >
								</center>
							</div>
							<div class="caja web-2-3" style="">
							
							<div style="float:right;">
							<i class="fa fa-calendar-o"> <?php echo $row['fecha'].'   ';?> </i>
							<i style="margin-left:40px; margin-right:10px; margin-top:10px;" class="fa fa-comments"><?php echo ' '.$contante.' ';?></i>
							</div>

								<?php echo "<h2>". $row['titulo']."</h2><br>";

								?>

								<div class="leer" style="margin-right:0px;" >
								<br><br>
									<center><a  href="aviso.php?id=<?php echo $row['id']; ?>"><div class="btn1">Leer m&aacute;s  &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right fa-lg"></i></div></a>
								</center>
								</div>



								<?php echo "<p style='white-space: pre-wrap; 
							word-wrap: break-word;'>". substr($row['descripcion'],0,150)."...
								</p>";

								?>
								
							</div>
						</div>
						<?php
					}
					?>
				</section>

			</div>
		</div>
	</section>

	<!-- ********************ccomentario personal***********************************-->


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
</body>
<!-- scripsa adicionales -->
<script src="js/cbpHorizontalSlideOutMenu.min.js"></script>
<script>
var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
</script>



</html>
