<?php
include('conexion.php');
include('consultas1.php');

session_start();
?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="img/checkicon.png" />
<head>
	<title>Bahia 1</title>
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
<script type="text/javascript" src="../js/mootools.js"></script>
<script type="text/javascript" src="../js/moodalbox.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/block.js"></script>

<link rel="stylesheet" href="../css/moodalbox.css" type="text/css" media="screen"/>

</head>
<body class="desarroll">

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
						<li style=""><a style="color:#59ABE3; font-weight:bold;" class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
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
			<section>
				<div class="grupo">
					<div class="caja">
					<a href="manual.php#bahia">
						<div class="" title="Manual" style="color:#3e3e3e; width:45px; height:40px; font-size:30px; text-align:center; position:fixed; bottom:10px; left:5px;"><i class="fa fa-question-circle" aria-hidden="true"></i>
						</div>
					</a>
					</div>
				</div>
			</section>
			<br> <br>	
	</header>
        </div>
    </div>
</div>

<div class="popup-overlay"></div>

<!-- fin de nuevo div de gbics -->

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
			<div class="caja">
			
			<div style=" opacity:.7; float:right; text-align:center; width:100px; margin-top:10px; padding:5px; background-color:#3e3e3e; font-weight:bold; color:white;">Disponible</div>
				<div style=" opacity:.7; float:right; text-align:center; width:100px; margin-top:10px; padding:5px; background-color:#049372; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Microsoft 8.3</div>
				<div style=" opacity:.7; float:right; text-align:center; width:100px; margin-top:10px; padding:5px; background-color:#CC263A; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Microsoft NPI</div>
				<div style=" opacity:.7; float:right; text-align:center; width:100px; margin-top:10px; padding:5px; background-color:#2574A9; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Microsoft 8.2</div>
		</div>
		</div>
		
					<table>

						<tr>
							
						<td id="open1" class="_<?php echo ($contr1['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup1" class="link1" href="modales.php?pb=<?php echo "$NoSerie1"; ?>&tr=TR01-01" rel="moodalbox"><div class="link">TR01-01 <hr> <br><?php echo $Prueba1; echo "</br>".$NoSerie1; ?></div></a></td>
						<td id="open2" class="_<?php echo ($contr2['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup2" class="link1" href="modales.php?pb=<?php echo "$NoSerie2"; ?>&tr=TR01-02" rel="moodalbox"><div class="link">TR01-02 <hr> <br><?php echo $Prueba2; echo "</br>".$NoSerie2; ?></div></a></td>
						<td id="open3" class="_<?php echo ($contr3['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup3" class="link1" href="modales.php?pb=<?php echo "$NoSerie3"; ?>&tr=TR01-03" rel="moodalbox"><div class="link">TR01-03 <hr> <br><?php echo $Prueba3; echo "</br>".$NoSerie3; ?></div></a></td>
						<td id="open4" class="_<?php echo ($contr4['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup4" class="link1" href="modales.php?pb=<?php echo "$NoSerie4"; ?>&tr=TR01-04" rel="moodalbox"><div class="link">TR01-04 <hr> <br><?php echo $Prueba4; echo "</br>".$NoSerie4; ?></div></a></td>
						<td id="open5" class="_<?php echo ($contr5['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup5" class="link1" href="modales.php?pb=<?php echo "$NoSerie5"; ?>&tr=TR01-05" rel="moodalbox"><div class="link">TR01-05 <hr> <br><?php echo $Prueba5; echo "</br>".$NoSerie5; ?></div></a></td>
						<td id="open6" class="_<?php echo ($contr6['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup6" class="link1" href="modales.php?pb=<?php echo "$NoSerie6"; ?>&tr=TR01-06" rel="moodalbox"><div class="link">TR01-06 <hr> <br><?php echo $Prueba6; echo "</br>".$NoSerie6; ?></div></a></td>
						<td id="open7" class="_<?php echo ($contr7['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup7" class="link1" href="modales.php?pb=<?php echo "$NoSerie7"; ?>&tr=TR01-07" rel="moodalbox"><div class="link">TR01-07 <hr> <br><?php echo $Prueba7; echo "</br>".$NoSerie7; ?></div></a></td>
						<td id="open8" class="_<?php echo ($contr8['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup8" class="link1" href="modales.php?pb=<?php echo "$NoSerie8"; ?>&tr=TR01-08" rel="moodalbox"><div class="link">TR01-08 <hr> <br><?php echo $Prueba8; echo "</br>".$NoSerie8; ?></div></a></td>
						<td id="open9" class="_<?php echo ($contr9['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup9" class="link1" href="modales.php?pb=<?php echo "$NoSerie9"; ?>&tr=TR01-09" rel="moodalbox"><div class="link">TR01-09 <hr> <br><?php echo $Prueba9; echo "</br>".$NoSerie9; ?></div></a></td>
						<td id="open10" class="_<?php echo ($contr10['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup10" class="link1" href="modales.php?pb=<?php echo "$NoSerie10"; ?>&tr=TR01-10" rel="moodalbox"><div class="link">TR01-10 <hr> <br><?php echo $Prueba10; echo "</br>".$NoSerie10; ?></div></a></td>
						<tr>
						<td id="open20" class="_<?php echo ($contr20['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup20" class="link1" href="modales.php?pb=<?php echo "$NoSerie20"; ?>&tr=TR02-20" rel="moodalbox"><div class="link">TR02-20 <hr> <br><?php echo $Prueba20; echo "</br>".$NoSerie20; ?></div></a></td>
						<td id="open19" class="_<?php echo ($contr19['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup19" class="link1" href="modales.php?pb=<?php echo "$NoSerie19"; ?>&tr=TR02-19" rel="moodalbox"><div class="link">TR02-19 <hr> <br><?php echo $Prueba19; echo "</br>".$NoSerie19; ?></div></a></td>
						<td id="open18" class="_<?php echo ($contr18['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup18" class="link1" href="modales.php?pb=<?php echo "$NoSerie18"; ?>&tr=TR02-18" rel="moodalbox"><div class="link">TR02-18 <hr> <br><?php echo $Prueba18; echo "</br>".$NoSerie18; ?></div></a></td>
						<td id="open17" class="_<?php echo ($contr17['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup17" class="link1" href="modales.php?pb=<?php echo "$NoSerie17"; ?>&tr=TR02-17" rel="moodalbox"><div class="link">TR02-17 <hr> <br><?php echo $Prueba17; echo "</br>".$NoSerie17; ?></div></a></td>
						<td id="open16" class="_<?php echo ($contr16['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup16" class="link1" href="modales.php?pb=<?php echo "$NoSerie16"; ?>&tr=TR02-16" rel="moodalbox"><div class="link">TR02-16 <hr> <br><?php echo $Prueba16; echo "</br>".$NoSerie16; ?></div></a></td>
						<td id="open15" class="_<?php echo ($contr15['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup15" class="link1" href="modales.php?pb=<?php echo "$NoSerie15"; ?>&tr=TR02-15" rel="moodalbox"><div class="link">TR02-15 <hr> <br><?php echo $Prueba15; echo "</br>".$NoSerie15; ?></div></a></td>
						<td id="open14" class="_<?php echo ($contr14['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup14" class="link1" href="modales.php?pb=<?php echo "$NoSerie14"; ?>&tr=TR02-14" rel="moodalbox"><div class="link">TR02-14 <hr> <br><?php echo $Prueba14; echo "</br>".$NoSerie14; ?></div></a></td>
						<td id="open13" class="_<?php echo ($contr13['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup13" class="link1" href="modales.php?pb=<?php echo "$NoSerie13"; ?>&tr=TR02-13" rel="moodalbox"><div class="link">TR02-13 <hr> <br><?php echo $Prueba13; echo "</br>".$NoSerie13; ?></div></a></td>
						<td id="open12" class="_<?php echo ($contr12['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup12" class="link1" href="modales.php?pb=<?php echo "$NoSerie12"; ?>&tr=TR02-12" rel="moodalbox"><div class="link">TR02-12 <hr> <br><?php echo $Prueba12; echo "</br>".$NoSerie12; ?></div></a></td>
						<td id="open11" class="_<?php echo ($contr11['Modelo'] == 'Microsoft 8.2' ? 'trs' : 'trs3');?> hvr-bob hvr-underline-from-center"><a id="popup11" class="link1" href="modales.php?pb=<?php echo "$NoSerie11"; ?>&tr=TR02-11" rel="moodalbox"><div class="link">TR02-11 <hr> <br><?php echo $Prueba11; echo "</br>".$NoSerie11; ?></div></a></td>

						</tr>
					</table>
	</section>

	<section>
		<div class="grupo">


		<?php
// Consulta para obtener la información de los racks y pruebas Micro
$query0 = mysqli_query($enlace, "SELECT racks.NoSerie, racks.Modelo FROM racks INNER JOIN pruebasMicro on
                                pruebasMicro.NoSerie=racks.NoSerie WHERE Bahia = '1' AND Modelo='Microsoft 8.2'");
$query = mysqli_query($enlace, "SELECT racks.Locacion, racks.NoSerie, racks.WO, racks.SKU,
racks.Modelo,pruebasMicro.FTO, pruebasMicro.QuickTest, pruebasMicro.Stress, pruebasMicro.MDaaS,  pruebasMicro.Racktest,
pruebasMicro.FTI, pruebasMicro.BSL, pruebasMicro.CTS, pruebasMicro.Packing,pruebasMicro.FTOStatus2, pruebasMicro.QuickTestStatus2, pruebasMicro.StressStatus2, pruebasMicro.MDaaSStatus2, pruebasMicro.RackTestStatus2,
pruebasMicro.FTIStatus2, pruebasMicro.BSLStatus2, pruebasMicro.CTSStatus2, pruebasMicro.PackingStatus2
FROM racks
INNER JOIN pruebasMicro ON pruebasMicro.NoSerie = racks.NoSerie
WHERE Bahia='1' AND Modelo = 'Microsoft 8.2'
ORDER BY Locacion ASC");

// Tabla para JR's
if($datos0=mysqli_fetch_row($query0)){
    echo "<div class='caja'>
            <table width='100%' style='opacity:.9;' class='tablaST'>
                <caption style='background-color:#3e3e3e; padding:10px;'><h1 style='color:white;'>Microsoft 8.2</h1></caption>
                <tr>
                    <th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th>
                    <th>FTO</th><th>QuickTest</th><th>StressTest</th><th>MDaaS</th><th>RackTest</th>
                    <th>FTI</th><th>Bootstrap</th><th>CTS</th><th>Packing</th>
                </tr>";

				while ($datos = mysqli_fetch_row($query)) {
					echo "<tr><td class='tdinfo'>" . $datos[0] . "</td>";
					echo "<td class='tdinfo'>" . $datos[1] . "</td>";
					echo "<td class='tdinfo'>" . $datos[2] . "</td>";
					echo "<td class='tdinfo'>" . $datos[3] . "</td>";
				
// Crear un arreglo para almacenar el estado de marcado de cada columna de prueba
$marcado = array_fill(0, 8, false);

for ($i = 5; $i <= 12; $i++) {
    $statusValue = $datos[$i];
    $cellColor = '';
    $cellContent = '';

    // Definir el contenido de la celda y el color de fondo de la celda según las dos lógicas
    if ($statusValue == 1 || ($statusValue == 0 && !$marcado[$i - 5])) {
        $cellContent = ''; // No mostrar 1 ni 0

        if ($statusValue == 1) {
            $cellColor = '#008000'; // Verde
        } else {
            switch ($datos[$i + 8]) { // Usar el valor correspondiente de la columna pruebasMicro (Status2)
                case 'Running':
                    $cellColor = '#F7FF33'; // Amarillo
                    break;
                case 'Waiting':
                    $cellColor = '#f7a307'; // Amarillo Fuerte
                    break;
                case 'Passed':
                    $cellColor = '#008000'; // Verde
                    break;
                case 'Fail':
                    $cellColor = '#F70F07'; // Rojo
                    break;
            }
        }

        $marcado[$i - 5] = true; // Marcar variable auxiliar para evitar marcar varios 0 seguidos en esta columna de prueba
    }

    if ($cellColor != '') {
        echo "<td bgcolor='$cellColor'>$cellContent</td>"; // Marcar celda con el contenido y el color asignado
    } else {
        echo "<td>$cellContent</td>"; // Dejar celda vacía si no hay color asignado
    }
}

						
        echo "</tr>";
    }

    echo "</table></div>";
				}
              ?>

            </div>
          </section>
	<br><br><center><h1 style="font-size:3em;"> Herramientas</h1></center><br>
<section>
		<center>
			<div class="grupo total">
				<div class="caja">




<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Repair System</summary>

	<iframe src="http://10.19.17.101/RepairSystem" width="100%" height="700x">
	</iframe>


</details>


				</div>
			</div>
		</center>

		<center>
			<div class="grupo total">
				<div class="caja">
<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Megamind</summary>


	<iframe src="" width="100%" height="700x">
</iframe>

</details>
				</div>
			</div>
		</center>

		
	</section><br><br>
	<br><br>

	<!-- ********************Sin Sesion***********************************-->

	<!-- ********************LOGIN***********************************-->

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
<?php if(isset($_SESSION['No_Reloj'])){ ?>
<center><a href="../img/stats.php" style="opacity:0;">.</a></center>
<?php } ?>
</body>
</html>
