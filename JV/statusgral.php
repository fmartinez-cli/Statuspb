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


	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="style/popup.css">
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
<link rel="stylesheet" href="../style/moodalbox.css" type="text/css" media="screen"/>
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
					<a href="/Statuspb/index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs - Joint Venture</h1></a>

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
                <li><a style="color:#CC263A; font-weight:bold;" class="hvr-underline-from-center" href="statusgral.php"><img width="32" src="../img/status.png"> Estatus General</a></li>
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
		;}?>
		<!-- ********************LOGIN***********************************-->
	</section>
	<div class="grupo">
			<div class="caja">
	 <div class="exportar" >
	<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p><img src="img/excel.png" width="40" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form></div>
	<section id="Exportar_a_Excel">

			<?php

			$consulta=mysqli_query($enlace, "SELECT DISTINCT(WO) from racksjv WHERE Modelo='Microsoft'");
			while($datos=mysqli_fetch_row($consulta)){
							 $contador=1;
					echo '<table class="stgral"><caption><h2>WO: '.$datos[0].'</h2></caption>
					<tr><th>No.</th><th>Numero de serie</th><th>WO</th>
					<th>SKU</th><th>Locacion</th><th>Modelo</th>
					<th><div class="verticalText">FTO</div></th>
					<th><div class="verticalText">Config. Arista</div></th>
					<th><div class="verticalText">Config. Arista 2</div></th>
					<th><div class="verticalText">CM</div></th>
					<th><div class="verticalText">Cluster nic 0</div></th>
					<th><div class="verticalText">Cluster nic 1</div></th>
					<th><div class="verticalText">Bootstrap</div></th>
					<th><div class="verticalText">Rackscan</div></th>
					<th><div class="verticalText">DEID</div></th>
					<th><div class="verticalText">EOTA</div></th>
					<th>Hora Inicial</th><th>Hora Final</th></tr>
					';
					$confto=0; $conta1=0; $conta2=0; $contc1=0; $contc2=0; $contcm=0; $contboot=0; $contrack=0; $contd=0; $conteo=0;  $terminados=0;
					$consultawo=mysqli_query($enlace, "SELECT * from racksjv where WO='$datos[0]'");
					while($datoswo=mysqli_fetch_row($consultawo)){
						echo '<tr><td class="tdinfo2">'.$contador.'</td> <td class="tdinfo2"><a style="color:black" href="buscarr.php?NoSerie='.$datoswo[0].'">'.$datoswo[0].'</a></td>
						<td class="tdinfo2">'.$datoswo[1].'</td><td class="tdinfo2">'.$datoswo[2].'</td><td class="tdinfo2">'.$datoswo[4].'</td><td class="tdinfo2">'.$datoswo[5].'</td>';
					$consultawop=mysqli_query($enlace, "SELECT * from pruebasjv where NoSerie='$datoswo[0]'");
							$contador++;
              while($datoswop=mysqli_fetch_row($consultawop)){
								if($datoswop[2]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[5]==0){ $conta1++;
									}
								}else{
									$confto++;
									echo "<td></td>";
								}
								if($datoswop[5]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[8]==0){ $conta2++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[8]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[11]==0){ $contc1++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[11]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[14]==0){ $contc2++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[14]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[17]==0){ $contcm++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[17]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[20]==0){$contboot++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[20]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[23]==0){$contrack++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[23]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[26]==0){$contd++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[26]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswop[29]==0){ $conteo++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswop[29]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									$terminados++;

								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswop[1].'</td><td class="tdinfo2">'.$datoswop[31].'</td></tr>';
							}
					}

					$consultawot=mysqli_query($enlace, "SELECT * from racksterminadosjv where WO='$datos[0]' ");
					while($datoswot=mysqli_fetch_row($consultawot)){
						echo '<tr> <td class="tdinfo2">'.$contador.'</td><td class="tdinfo2"><a style="color:black" href="buscar.php?NoSerie='.$datoswot[1].'">'.$datoswot[1].'</a></td><td class="tdinfo2">'.$datoswot[2].'</td><td class="tdinfo2">'.$datoswot[3].'</td><td class="tdinfo2">'.$datoswot[5].'</td><td class="tdinfo2">'.$datoswot[6].'</td>';
						$consultawotp=mysqli_query($enlace, "SELECT * from pruebasterminadasjv where NoSerie='$datoswot[1]'");
						$contador++;
            while($datoswotp=mysqli_fetch_row($consultawotp)){
								if($datoswotp[3]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[6]==0){ $conta1++;
									}
								}else{
									$confto++;
									echo "<td></td>";
								}
								if($datoswotp[6]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[9]==0){ $conta2++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswotp[9]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[12]==0){ $contc1++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswotp[12]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[15]==0){ $contc2++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswotp[15]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[18]==0){ $contcm++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswotp[18]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[21]==0){$contboot++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswotp[21]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[24]==0){$contrack++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswotp[24]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[27]==0){$contd++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswotp[27]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									if($datoswotp[30]==0){ $conteo++;
									}
								}else{
									echo "<td></td>";
								}
								if($datoswotp[30]==1){
									echo "<td bgcolor='#89C4F4'></td>";
									$terminados++;

								}else{
									echo "<td></td>";
								}
								echo '<td class="tdinfo2">'.$datoswotp[2].'</td><td class="tdinfo2">'.$datoswotp[32].'</td></tr>';
							}
					}
					echo '</table> ';
					echo ($confto>0) ? "<b><br>FTO: ".$confto .'</b>':"";
					echo ($conta1>0) ? '<b><br>Conf. Arista 0: '.$conta1 .'</b>':"";
					echo ($conta2>0) ? '<b><br>Config Arista 1: '.$conta2 .'</b>':"";
					echo ($contc1>0) ? '<b><br>Cluster nic 0: '.$contc1.'</b>' :"";
					echo ($contc2>0) ? '<b><br>Cluster nic 1: '.$contc2.'</b>' :"";
					echo ($contcm>0) ? '<b><br>CM: '.$contcm.'</b>' :"";
					echo ($contboot>0) ? '<b><br>Bootstrap: '.$contboot.'</b>' :"";
					echo ($contrack>0) ? '<b><br>Rackscan: '.$contrack .'</b>':"";
					echo ($contd>0) ? '<b><br>DEID: '.$contd .'</b>':"";
					echo ($conteo>0) ? '<b><br>EOTA: '.$conteo .'</b>':"";
					echo ($terminados>0) ? '<b><br>Terminados: '.$terminados .'</b>':"";
					echo '<br><br><br><br><hr>';
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
