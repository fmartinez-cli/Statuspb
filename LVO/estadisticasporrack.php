 <?php

include('conexion.php');

session_start();
if(!isset($_REQUEST['WO'])){
							header("Location: estadisticas.php");
							}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Estadisticas por rack</title>
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
<script type="text/javascript" src="../js/moodalbox.js"></script>
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
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
					<ul class="topnav">
						<li ><a  class="hvr-underline-from-center" href="index.php"><img width="15" src="../img/home.png"> Inicio</a></li>
						<li style=""><a  class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia2.php"><img width="10" src="../img/bay.png"> Bahia 2</a></li>
						<li><a class="hvr-underline-from-center" href="bahia3.php"><img width="10" src="../img/bay.png"> Bahia 3</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia4.php"><img width="10" src="../img/bay.png"> Bahia 4</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia5.php"><img width="10" src="../img/bay.png"> Bahia 5</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia6.php"><img width="10" src="../img/bay.png"> Bahia 6</a></li>
						<li><a  class="hvr-underline-from-center" href="bahia7.php"><img width="10" src="../img/bay.png"> Bahia 7</a></li>
						<li><a  class="hvr-underline-from-center" href="golden.php"><img width="15" src="../img/golden.png"> Golden Rack</a></li>
						<li><a style="color:#59ABE3; font-weight:bold;" class="hvr-underline-from-center" href="estadisticas.php"><img width="25" src="../img/estadisticas.png"> Estad&iacute;sticas</a></li>
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


<div class="grupo">
<div class="caja">
<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p class="exportar"><img  src="../img/excel.png" width="40" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" >
</form>


<form  style="float:left; " method="post" action="estadisticaswo.php"> <input type="hidden" id="WO" name="WO" value="<?php echo $_REQUEST['WO']; ?>">
<button class="btn1" >Volver</button></form>

</div>
</div>

<section id="Exportar_a_Excel">

		<div class="grupo">
			<div class="caja">

			<?php
			$WO=$_REQUEST['WO'];
			echo '<center><h1>WO: '.$WO.'</h1></center>';
			$con = mysqli_query($enlace, "SELECT * FROM racksterminados where WO='$WO' ");

			while($cons=mysqli_fetch_row($con)){
				echo '<center><table class="tablamodal"><caption><h2>Rack: '.$cons[1].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 SKU: '.$cons[3].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Locaci&oacute;n: '.$cons[5].'</h2></caption><tr><th>prueba</th><th>Inicio</th> <th>Fin</th><th>Tiempo (Hrs)</th></tr>';
				$conpb=mysqli_query($enlace, "SELECT * FROM pruebasterminadosMicro WHERE NoSerie='$cons[1]'");
				$conspb=mysqli_fetch_array($conpb);
				$iniciofto = new DateTime($conspb['HoraInicio']);
				$finalfto = new DateTime($conspb['FTOHoraFinal']);
				$intervalfto = $iniciofto->diff($finalfto);
				$diasfto = $intervalfto->d;
				$horasfto = $intervalfto->h;
				$horadiasfto = $diasfto * 24;
				$minutosfto = ($intervalfto->i)/60;
				$totalfto= $horasfto+$minutosfto+$horadiasfto;
				$totalftofinal = number_format($totalfto, '2', '.', ',');
				echo '<tr> <td>FTO</td> <td>'.$conspb['HoraInicio'].'</td>  <td>'.$conspb['FTOHoraFinal'].'</td> <td>'.$totalftofinal.'</td></tr>';


				$inicioquicktest = new DateTime($conspb['FTOHoraFinal']);
				$finalquicktest = new DateTime($conspb['QuickTestHoraFinal']);
				$intervalquicktest = $inicioquicktest->diff($finalquicktest);
				$diasquicktest = $intervalquicktest->d;
				$horasquicktest = $intervalquicktest->h;
				$horadiasquicktest = $diasquicktest * 24;
				$minutosquicktest = ($intervalquicktest->i)/60;
				$totalquicktest= $horasquicktest+$minutosquicktest+$horadiasquicktest;
				$totalquicktestfinal = number_format($totalquicktest, '2', '.', ',');
				echo '<tr> <td>Conf QuickTest</td> <td>'.$conspb['FTOHoraFinal'].'</td>  <td>'.$conspb['QuickTestHoraFinal'].'</td> <td>'.$totalquicktestfinal.'</td></tr>';

				$iniciostress = new DateTime($conspb['QuickTestHoraFinal']);
				$finalstress = new DateTime($conspb['StressHoraFinal']);
				$intervalstress = $iniciostress->diff($finalstress);
				$diasstress = $intervalstress->d;
				$horasstress = $intervalstress->h;
				$horadiasstress = $diasstress * 24;
				$minutosstress = ($intervalstress->i)/60;
				$totalstress= $horasstress+$minutosstress+$horadiasstress;
				$totalstressfinal = number_format($totalstress, '2', '.', ',');
				echo '<tr> <td>Stress</td> <td>'.$conspb['FTOTestHoraFinal'].'</td>  <td>'.$conspb['StressHoraFinal'].'</td> <td>'.$totalstressfinal.'</td></tr>';

				$iniciomdaas = new DateTime($conspb['StressHoraFinal']);
				$finalmdaas = new DateTime($conspb['MDaaSHoraFinal']);
				$intervalmdaas = $iniciomdaas->diff($finalmdaas);
				$diasmdaas = $intervalmdaas->d;
				$horasmdaas = $intervalmdaas->h;
				$horadiasmdaas = $diasmdaas * 24;
				$minutosmdaas = ($intervalmdaas->i)/60;
				$totalmdaas= $horasmdaas+$minutosmdaas+$horadiasmdaas;
				$totalmdaasfinal = number_format($totalmdaas, '2', '.', ',');
				echo '<tr> <td>MDaaS</td> <td>'.$conspb['StressHoraFinal'].'</td>  <td>'.$conspb['MDaaSHoraFinal'].'</td> <td>'.$totalmdaasfinal.'</td></tr>';

				$inicioracktest = new DateTime($conspb['MDaaSHoraFinal']);
				$finalracktest = new DateTime($conspb['RackTestHoraFinal']);
				$intervalracktest = $inicioracktest->diff($finalracktest);
				$diasracktest = $intervalracktest->d;
				$horasracktest = $intervalracktest->h;
				$horadiasracktest = $diasracktest * 24;
				$minutosracktest = ($intervalracktest->i)/60;
				$totalracktest= $horasracktest+$minutosracktest+$horadiasracktest;
				$totalracktestfinal = number_format($totalracktest, '2', '.', ',');
				echo '<tr> <td>RackTest</td> <td>'.$conspb['MDaaSHoraFinal'].'</td>  <td>'.$conspb['RackTestHoraFinal'].'</td> <td>'.$totalracktestfinal.'</td></tr>';

				$iniciofti = new DateTime($conspb['RackTestHoraFinal']);
				$finalfti = new DateTime($conspb['FTIHoraFinal']);
				$intervalfti = $iniciofti->diff($finalfti);
				$diasfti = $intervalfti->d;
				$horasfti = $intervalfti->h;
				$horadiasfti = $diasfti * 24;
				$minutosfti = ($intervalfti->i)/60;
				$totalfti= $horasfti+$minutosfti+$horadiasfti;
				$totalftifinal = number_format($totalfti, '2', '.', ',');
				echo '<tr> <td>FTI</td> <td>'.$conspb['RackTestHoraFinal'].'</td>  <td>'.$conspb['FTIHoraFinal'].'</td> <td>'.$totalftifinal.'</td></tr>';

				$iniciobootstrap = new DateTime($conspb['FTIHoraFinal']);
				$finalbootstrap = new DateTime($conspb['BSLHoraFinal']);
				$intervalbootstrap = $iniciobootstrap->diff($finalbootstrap);
				$diasbootstrap = $intervalbootstrap->d;
				$horasbootstrap = $intervalbootstrap->h;
				$horadiasbootstrap = $diasbootstrap * 24;
				$minutosbootstrap = ($intervalbootstrap->i)/60;
				$totalbootstrap= $horasbootstrap+$minutosbootstrap+$horadiasbootstrap;
				$totalbootstrapfinal = number_format($totalbootstrap, '2', '.', ',');
				echo '<tr> <td>BSL</td> <td>'.$conspb['FTIHoraFinal'].'</td>  <td>'.$conspb['BSLHoraFinal'].'</td> <td>'.$totalbslfinal.'</td></tr>';

				$iniciocts = new DateTime($conspb['BSLHoraFinal']);
				$finalcts = new DateTime($conspb['CTSHoraFinal']);
				$intervalcts = $iniciocts->diff($finalcts);
				$diascts = $intervalcts->d;
				$horascts = $intervalcts->h;
				$horadiascts = $diascts * 24;
				$minutoscts = ($intervalcts->i)/60;
				$totalcts= $horascts+$minutoscts+$horadiascts;
				$totalctsfinal = number_format($totalcts, '2', '.', ',');
				echo '<tr> <td>CTS</td> <td>'.$conspb['FTIHoraFinal'].'</td>  <td>'.$conspb['CTSHoraFinal'].'</td> <td>'.$totalctsfinal.'</td></tr>';

				$iniciopacking = new DateTime($conspb['CTSHoraFinal']);
				$finalpacking = new DateTime($conspb['PackingHoraFinal']);
				$intervalpacking = $iniciopacking->diff($finalpacking);
				$diaspacking = $intervalpacking->d;
				$horaspacking = $intervalpacking->h;
				$horadiaspacking = $diaspacking * 24;
				$minutospacking = ($intervalpacking->i)/60;
				$totalpacking= $horaspacking+$minutospacking+$horadiaspacking;
				$totalpackingfinal = number_format($totalpacking, '2', '.', ',');
				echo '<tr> <td>Packing</td> <td>'.$conspb['CTSHoraFinal'].'</td>  <td>'.$conspb['PackingHoraFinal'].'</td> <td>'.$totalpackingfinal.'</td></tr>';



				$totaltotal = $totalpackingfinal + $totalctsfinal + $totalbslfinal + $totalftifinal
				+ $totalracktestfinal + $totalmdaasfinal + $totalsterssfinal + $totalquicktestfinal + $totalftofinal;




				echo '</table></center> <h1>Total (Hrs):'.$totaltotal.'</h1><br><br><br><br><hr>';
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

<?php } ?>
