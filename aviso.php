<?php

include('microsoft/conexion.php');

$id=$_GET['id'];
$consulta=mysqli_query($enlace,"SELECT * FROM imagenes WHERE id='$id'");
$result=mysqli_num_rows($consulta);

if($result>0){
	echo '';

}else{
	header('Location: index.php');
}

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
			<div class="grupo web-tabla">
				<div class="caja" >

					<center>
						<?php
						$id=$_GET['id'];
						$query=mysqli_query($enlace, "SELECT * FROM imagenes where ID ='$id'");
						while ($datos=mysqli_fetch_row($query)) {
							$actual = array("<", ">");
							$nuevo  = array("&lt ", "&gt");

							if ($datos[3]=='upload/'){$dir="upload/Default.jpg";}else{$dir=$datos[3];}
							$comentario = str_replace($actual, $nuevo, $datos[4]);
							echo "<br><h1 style='font-size:2.5em;'>".$datos[2]."</h1><br><br>";
							echo "<img style='width:400px; border:#3e3e3e solid 4px;'  src='".$dir."'> <br><br></center>";
							echo "<div class='caja noticiad' style='text-align:justify;   padding:20px; font-size:15px; white-space: pre-wrap; word-break: break-all;
							word-wrap: break-word;'> <p  style='white-space: pre-wrap; word-break: break-all;
							word-wrap: break-word;'><h3 style='color:#3e3e3e;'>".$comentario."</h3></p><br><p style='font-weight:bold; color:#3e3e3e;	text-align:right;'>Publicado por: ". $datos[1]. "<br>Fecha: ".$datos[5]."</p></div>";
						}


						//  <!-- ******************comentarios************************ -->
						$query = mysqli_query($enlace, "SELECT * FROM noticomentarios WHERE id = '$id' ORDER BY ID ASC");

						echo'<center><h2><hr style="width:95%; margin-top:15px; height:5px;margin-bottom:15px; ">Comentarios</h2></center><br>';
						while ($datos=mysqli_fetch_row($query) ) {
							$actual = array("<", ">");
							$nuevo  = array("&lt ", "&gt");
							$comentario = str_replace($actual, $nuevo, $datos[1]);
							echo '<center><div class="comentarios" style="  color:#59ABE3;">
							<div><p title="'.$datos[2].'"><h3> '.$datos[2].'</h3></p></div><div style="white-space: pre-wrap; word-break: break-all;
							word-wrap: break-word;"><h5 style="color:#2574a9;">Fecha: '.$datos[3].'</h5>
							<p style=" white-space: pre-wrap; text-align:left; padding-left:40px; word-break: break-all;
							word-wrap: break-word; font-size:20px; color:#3e3e3e;">'.$comentario.'</p>
							</div></div><br></center>';}
							?>
		       	</div>
									</div>
									<!--  ********************************************************-->
									<?php  if(isset($_SESSION['Nombre'])&& $_SESSION['Nivel']=="1"){ ?>
										<div class="grupo">
											<div class="caja">
												<form action="noticomentario.php" method="post">

													<center><textarea name="comentario" rows="8" style=" resize: none; width:95%" placeholder="Comentar..." maxlength="255" required=""></textarea></center>
													<input type="hidden" value="<?php echo $id ; ?>" name="ID">
													<center><button class="btn1" style="width:95%">Comentar</button></center></form>
												</div>
											</div> <?php }?>
											<!--  ********************************************************-->
									<div class="grupo">
										<div class="caja">
											<?php  if(isset($_SESSION['Nombre'])&& $_SESSION['Nivel']=="1"){ ?>
												<div class="btn1" style="float:left; padding:20px;"><a style="text-align:center; text-decoration:none;color:white; " href="modificarAviso.php?id=<?php echo $id; ?>" > <h3> Modificar</h3></a></div>
												<div style="float:right;"><form method="post" action="eliminarA.php">
													<input type="hidden" name="id" value="<?php echo $id; ?>">
													<button class="btn1" style="float:left;"><h3>Eliminar</h3></button></form></div>
												</div>
											</div> <?php }?>
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
						font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; background-color: #FAFAFA; z-index:100; color: #000000; display:none;">

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
