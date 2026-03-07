<?php
include('conexion.php');
include('consultas7.php');

session_start();
?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="img/checkicon.png" />
<head>
	<title>Bahia 7</title>
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
	<!-- mensaje no olvidar gbics -->
		<script src="../js/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
		<script>
		function EventoAlert(){
			swal({
  				title: 'No olvides retirar los Gbics!',
  				type: 'success',
  				text: 'Se cerrar&aacute; en 3 segundos.',
  				timer: 3000,
  				showConfirmButton: false
				});
		}
		</script>
	<!-- mensaje no olvidar gbics -->

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
			<nav>
				<center>	<ul class="topnav">
						<li ><a class="hvr-underline-from-center" href="index.php">
						<img width="15" src="../img/home.png"> Inicio</a></li>
						<li style=""><a  class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
						<li><a class="hvr-underline-from-center" href="bahia2.php"><img width="10" src="../img/bay.png"> Bahia 2</a></li>
						<li><a class="hvr-underline-from-center" href="bahia3.php"><img width="10" src="../img/bay.png"> Bahia 3</a></li>
						<li><a class="hvr-underline-from-center" href="bahia4.php"><img width="10" src="../img/bay.png"> Bahia 4</a></li>
						<li><a class="hvr-underline-from-center" href="bahia5.php"><img width="10" src="../img/bay.png"> Bahia 5</a></li>
						<li><a class="hvr-underline-from-center" href="bahia6.php"><img width="10" src="../img/bay.png"> Bahia 6</a></li>
						<li><a style="color:#59ABE3; font-weight:bold;" class="hvr-underline-from-center" href="bahia7.php"><img width="10" src="../img/bay.png"> Bahia 7</a></li>
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

<!-- manual -->
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

<!--  nuevo div de gbics -->

<div id="popup" style="display: none;">
    <div class="content-popup">
        <div class="close"><a href="#" id="close"><img src="../img/closelabel.gif"/></a></div>
        <div>
           <center><h2>Gbics registrados: Bahía 7</h2>
           <br>
           <?php
           $NoBahia='7';

           $existencia=mysqli_query($enlace, "SELECT * FROM gibics WHERE Bahiag='$NoBahia'");
           $resexist=mysqli_fetch_array($existencia);

           if(empty($resexist['Bahiag'])){
            echo '<p><span>Aun no se han registrado gbics en DB</span>';
           }else{

           $consulta=mysqli_query($enlace, "SELECT CtGibic,NoSerie FROM gibics WHERE Bahiag='$NoBahia' and Disponible=0 ORDER BY NoSerie");

           echo '<details><summary>Gbics en uso</summary><br>';
           while ($resultado=mysqli_fetch_array($consulta)){
           echo '<p>CT de Gbic: <span>'.$resultado['CtGibic'].'</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rack: <span>'.$resultado['NoSerie'].'</span></p><br>';
           }
           echo '</details>';

           $confalla=mysqli_query($enlace,"SELECT * FROM gibics WHERE falla='1' AND Bahiag='$NoBahia'");
           $confalla2=mysqli_query($enlace,"SELECT * FROM gibics WHERE falla='1' AND Bahiag='$NoBahia'");
           $resfalla2=mysqli_fetch_array($confalla2);

           if($resfalla2['CtGibic']!=0){
           echo '<details><summary>Gbics con reporte de falla</summary><br>';

           while($resfalla=mysqli_fetch_array($confalla)){
            echo '<p>Ct de Gbic: <span style="color:red;">'.$resfalla['CtGibic'].'</span></p><br>';
           }

           echo '</details>';
           }//fin if

           $sinfalla=mysqli_query($enlace, "SELECT * FROM gibics WHERE Bahiag='$NoBahia' AND Disponible='1' AND falla='0'");
           $sinfalla2=mysqli_query($enlace, "SELECT * FROM gibics WHERE Bahiag='$NoBahia' AND Disponible='1' AND falla='0'");
           $ressinfalla2=mysqli_fetch_array($sinfalla2);

           if($ressinfalla2['CtGibic']!=0){
           echo '<details><summary>Gbics funcionales disponibles</summary><br>';

           while($ressinfalla=mysqli_fetch_array($sinfalla)){
            echo '<p>Ct de Gbic: <span style="color:green;">'.$ressinfalla['CtGibic'].'</span></p><br>';
           }

           echo '</details>';

           }//fin if

            echo '<hr size="1px" color="black" />';
            $encarga=mysqli_query($enlace, "SELECT * FROM gibics INNER JOIN users on users.No_Reloj=gibics.No_Reloj WHERE Bahiag='$NoBahia'");
      $resencarga=mysqli_fetch_array($encarga);

      if(empty($resencarga['No_Reloj'])){
        echo '<span style="color:red;">No hay persona a cargo de estatus, contacte a supervisor jr!</span>';
      }else{
      echo '<span style="color:gray;">'.$resencarga['Nombre'].' recibio estatus.<span>';
      }

      $consuser=mysqli_query($enlace, "SELECT * FROM gibics WHERE Bahiag='$NoBahia'");
      $rescon=mysqli_fetch_array($consuser);

      if (empty($_SESSION['No_Reloj'])) { echo '';
      }else{
        if(($_SESSION['No_Reloj']==$rescon['No_Reloj'])||($_SESSION['Nivel']=='1')){

            ?>
            </center>
            <a class="hvr-underline-from-center" style="color:#73B2BA; padding:6px; align:left;" href="EntregaGbic.php?pb=<?php echo "$NoBahia"; ?>"><img width="15" src="../img/relevo.png"> Entregar estatus</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="hvr-underline-from-center" style="color:#73B2BA; padding:6px;" href="graficagbic.php"><img width="15" src="../img/graf.png"> Grafico fallas</a><br>

      <?php
         }else{
          echo '';
         }//fin else
      }//fin empty
    }//fin if empty en DB
      ?>

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
		<!-- Acceso a informacion gbics de bahia-->
				<div class="caja" style="float:left; width:0px; margin-top:-8px; padding:0px;"><br><a href="#" id="open"><INPUT class="ima" TYPE="image" NAME="envio" SRC="../img/gibc.jpg"></INPUT></a></div>
		<!-- Acesso a informacion gbics de bahia-->
			<div style=" opacity:.7; float:right; text-align:center; width:100px; margin-top:10px; padding:5px; background-color:#3e3e3e; font-weight:bold; color:white;">Disponible</div>
				<div style=" opacity:.7; float:right; text-align:center; width:100px; margin-top:10px; padding:5px; background-color:#049372; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Dropbox</div>
				<div style=" opacity:.7; float:right; text-align:center; width:100px; margin-top:10px; padding:5px; background-color:#CC263A; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Microsoft</div>
				<div style=" opacity:.7; float:right; text-align:center; width:100px; margin-top:10px; padding:5px; background-color:#2574A9; font-weight:bold; color:white;"><i class="fa fa-server" aria-hidden="true"></i> Azure 4.1</div>
		</div>
	</div>
		<div class="grupo">
			<div class="caja ">


				<center>
					<table>

						<tr>
							<td id="open1" class="_<?php echo ($contr1['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr1['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr1['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup1" class="link1" href="modales.php?pb=<?php echo "$NoSerie1"; ?>&tr=TR07-97" rel="moodalbox" ><div class="link"> TR07-97 <hr> <br><?php echo $Prueba1; echo "</br>".$NoSerie1; ?></div></a></td>
							<td id="open2" class="_<?php echo ($contr2['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr2['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr2['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup2" class="link1" href="modales.php?pb=<?php echo "$NoSerie2"; ?>&tr=TR07-98" rel="moodalbox" ><div class="link">TR07-98 <hr> <br><?php echo $Prueba2; echo "</br>".$NoSerie2; ?></div></a></td>
							<td id="open3" class="_<?php echo ($contr3['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr3['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr3['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"><a id="popup3" class="link1" href="modales.php?pb=<?php echo "$NoSerie3"; ?>&tr=TR07-99" rel="moodalbox" > <div class="link">TR07-99 <hr> <br><?php echo $Prueba3; echo "</br>".$NoSerie3; ?></div></a></td>
							<td id="open4" class="_<?php echo ($contr4['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr4['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr4['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup4" class="link1" href="modales.php?pb=<?php echo "$NoSerie4"; ?>&tr=TR07-100" rel="moodalbox" ><div class="link">TR07-100 <hr> <br><?php echo $Prueba4; echo "</br>".$NoSerie4; ?></div></a></td>
							<td id="open5" class="_<?php echo ($contr5['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr5['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr5['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right">  <a id="popup5" class="link1" href="modales.php?pb=<?php echo "$NoSerie5"; ?>&tr=TR07-101" rel="moodalbox" > <div class="link">TR07-101 <hr> <br><?php echo $Prueba5; echo "</br>".$NoSerie5; ?></div></a></td>
							<td id="open6" class="_<?php echo ($contr6['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr6['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr6['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right">  <a id="popup6" class="link1" href="modales.php?pb=<?php echo "$NoSerie6"; ?>&tr=TR07-102" rel="moodalbox" > <div class="link">TR07-102 <hr> <br><?php echo $Prueba6; echo "</br>".$NoSerie6; ?></div></a></td>
							<td id="open7" class="_<?php echo ($contr7['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr7['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr7['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right" > <a id="popup7" class="link1" href="modales.php?pb=<?php echo "$NoSerie7"; ?>&tr=TR07-103" rel="moodalbox" >  <div class="link">TR07-103 <hr> <br><?php echo $Prueba7; echo "</br>".$NoSerie7; ?></div></a></td>
							<td id="open8" class="_<?php echo ($contr8['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr8['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr8['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right">  <a id="popup8" class="link1" href="modales.php?pb=<?php echo "$NoSerie8"; ?>&tr=TR07-104" rel="moodalbox" > <div class="link">TR07-104 <hr> <br><?php echo $Prueba8; echo "</br>".$NoSerie8; ?></div></a></td>
						</tr>

						<tr>
							<td id="open16" class="_<?php echo ($contr16['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr16['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr16['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup16" class="link1" href="modales.php?pb=<?php echo "$NoSerie16"; ?>&tr=TR07-112" rel="moodalbox" ><div class="link"> TR07-112 <hr> <br><?php echo $Prueba16; echo "</br>".$NoSerie16; ?></div></a></td>
							<td id="open15" class="_<?php echo ($contr15['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr15['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr15['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup15" class="link1" href="modales.php?pb=<?php echo "$NoSerie15"; ?>&tr=TR07-111" rel="moodalbox" ><div class="link"> TR07-111<hr> <br><?php echo $Prueba15; echo "</br>".$NoSerie15; ?></div></a></td>
							<td id="open14" class="_<?php echo ($contr14['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr14['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr14['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup14" class="link1" href="modales.php?pb=<?php echo "$NoSerie14"; ?>&tr=TR07-110" rel="moodalbox" ><div class="link"> TR07-110 <hr> <br><?php echo $Prueba14; echo "</br>".$NoSerie14; ?></div></a></td>
							<td id="open13" class="_<?php echo ($contr13['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr13['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr13['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup13" class="link1" href="modales.php?pb=<?php echo "$NoSerie13"; ?>&tr=TR07-109" rel="moodalbox" ><div class="link"> TR07-109 <hr> <br><?php echo $Prueba13; echo "</br>".$NoSerie13; ?></div></a></td>
							<td id="open12" class="_<?php echo ($contr12['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr12['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr12['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup12" class="link1" href="modales.php?pb=<?php echo "$NoSerie12"; ?>&tr=TR07-108" rel="moodalbox" ><div class="link"> TR07-108 <hr> <br><?php echo $Prueba12; echo "</br>".$NoSerie12; ?></div></a></td>
							<td id="open11" class="_<?php echo ($contr11['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr11['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr11['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup11" class="link1" href="modales.php?pb=<?php echo "$NoSerie11"; ?>&tr=TR07-107" rel="moodalbox" ><div class="link"> TR07-107 <hr> <br><?php echo $Prueba11; echo "</br>".$NoSerie11; ?></div></a></td>
							<td id="open10" class="_<?php echo ($contr10['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr10['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr10['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup10" class="link1" href="modales.php?pb=<?php echo "$NoSerie10"; ?>&tr=TR07-106" rel="moodalbox" ><div class="link"> TR07-106 <hr> <br><?php echo $Prueba10; echo "</br>".$NoSerie10; ?></div></a></td>
							<td id="open9" class="_<?php echo ($contr9['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr9['Modelo'] == 'Dropbox' ? 'trs2' :  ($contr9['Modelo'] == 'Microsoft' ? 'trs4' : 'trs3'))) ;?> hvr-bob hvr-underline-from-center hvr-sweep-to-right"> <a id="popup9" class="link1" href="modales.php?pb=<?php echo "$NoSerie9"; ?>&tr=TR07-105" rel="moodalbox" ><div class="link"> TR07-105 <hr> <br><?php echo $Prueba9; echo "</br>".$NoSerie9; ?></div></a></td>
						</tr>


					</table>
				</center>
			</div>
		</div>

	</section>
	<section>
		<div class="grupo">


				<?php

				$query0 = mysqli_query($enlace, "SELECT racks.NoSerie, racks.Modelo FROM racks INNER JOIN pruebas on
					pruebas.NoSerie=racks.NoSerie WHERE Bahia = '7' AND Modelo='Azure 4.1'");
				$query = mysqli_query($enlace, "SELECT racks.Locacion, racks.NoSerie, racks.WO, racks.SKU,
					racks.Modelo, pruebas.FTO, pruebas.Cisco, pruebas.Rackscan, pruebas.XTEE,  pruebas.Cluster,
					pruebas.Solar, pruebas.Solar2, pruebas.Wiring, pruebas.Bootstrap, pruebas.Sharknado,
					 pruebas.DEID, pruebas.Megamind, pruebas.EOTA
					FROM racks
					INNER JOIN pruebas on pruebas.NoSerie=racks.NoSerie
					WHERE Bahia='7' AND Modelo = 'Azure 4.1'
					ORDER BY Locacion ASC");


				if($datos0=mysqli_fetch_row($query0)){
					echo " <div class='caja'>
					<table width='100%' class='tablaST'>
						<caption style='background-color:#3e3e3e;  padding:10px;'><h1 style='color:white;'>Azure 4.1</h1></caption>
						<tr><th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th><th>FTO</th><th>Cisco</th><th>Rackscan</th><th>XTEE</th><th>Cluster</th><th>Solar</th>
						<th>Wiring Check</th><th>Bootstrap</th><th>Sharknado</th><th>Deid</th><th>Megamind</th><th>EOTA</th><tr>

							";
							while ($datos=mysqli_fetch_row($query) ) {


								echo "<td class='tdinfo'>".$datos[0]."</td>";
								echo "<td class='tdinfo'>".$datos[1]."</td>";
								echo "<td class='tdinfo'>".$datos[2]."</td>";
								echo "<td class='tdinfo'>".$datos[3]."</td>";


								if($datos[5]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[6]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[7]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[8]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[9]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[10]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[12]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[13]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[14]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[15]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[16]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[17]==1){
									echo "<td bgcolor='#89C4F4'></td></tr>";
								}else{
									echo "<td></td></tr>";
								}


							}
							$Total= $FTOcount+$Ciscocount+$XTEEcount+$Rackscancount+$Clustercount+$Solarcount+$Bootstrapcount+$Sharknadocount+$Wiringcount+$DEIDcount+$Megacount+$EOTAcount+$Listocount;
							echo '<tr>
							<td colspan="2" class="contaz">Total: '.$Total.'</td>
							<td colspan="2" class="contaz">Terminado: '.$Listocount.'</td>
							<td class="contaz">'.$FTOcount.'</td><td class="contaz">'.$Ciscocount.'</td>
							<td class="contaz">'.$Rackscancount.'</td>
							<td class="contaz">'.$XTEEcount.'</td>
							<td class="contaz">'.$Clustercount.'</td>
							<td class="contaz">'.$Solarcount.'</td>
							<td class="contaz">'.$Wiringcount.'</td>
							<td class="contaz">'.$Bootstrapcount.'</td>
							<td class="contaz">'.$Sharknadocount.'</td>
							<td class="contaz">'.$DEIDcount.'</td>
							<td class="contaz">'.$Megacount.'</td>
							<td class="contaz">'.$EOTAcount.'</td>
						</tr>

					</table> </div>';

				}


				$query2 = mysqli_query($enlace, "SELECT racks.NoSerie, racks.Modelo FROM racks INNER JOIN pruebas on
					pruebas.NoSerie=racks.NoSerie WHERE Bahia = '7' AND Modelo='Dropbox'");

				$query3 = mysqli_query($enlace, "SELECT racks.Locacion, racks.NoSerie, racks.WO, racks.SKU,
					racks.Modelo, pruebas.FTO, pruebas.Cisco,  pruebas.Rackscan, pruebas.Solar, pruebas.Cluster,
					pruebas.Solar2,  pruebas.Sharknado,
					pruebas.Wiring, pruebas.DEID, pruebas.Megamind, pruebas.EOTA
					FROM racks
					INNER JOIN pruebas on pruebas.NoSerie=racks.NoSerie
					WHERE Bahia='7' AND Modelo = 'Dropbox'
					ORDER BY Locacion ASC");

				if($datos2=mysqli_fetch_row($query2)){
					echo "  <div class='caja'>
					<table width='100%' class='tablaST'>
						<caption style='background-color:#3e3e3e; opacity:.7; padding:10px;'><h1 style='color:white;'>Dropbox</h1></caption>
						<tr><th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th><th>FTO</th><th>Cisco</th><th>Rackscan</th><th>Solar 1</th><th>Cluster</th><th>Solar 2</th>
							<th>Sharknado</th><th>Wiring Check</th><th>Deid</th><th>Megamind</th><th>EOTA</th><tr>

							";
							while ($datos3=mysqli_fetch_row($query3) ) {


								echo "<td class='tdinfo'>".$datos3[0]."</td>";
								echo "<td class='tdinfo'>".$datos3[1]."</td>";
								echo "<td class='tdinfo'>".$datos3[2]."</td>";
								echo "<td class='tdinfo'>".$datos3[3]."</td>";


								if($datos3[5]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[6]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[7]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[8]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[9]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[10]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[11]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[12]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[13]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[14]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[15]==1){
									echo "<td bgcolor='#66CC99'></td></tr>";
								}else{
									echo "<td></td></tr>";
								}



							}
							$Totald =$FTOdcount+$Ciscodcount+$Rackscandcount+$Solardcount+$Clusterdcount+$Solar2dcount+$Sharknadodcount+$Wiringdcount+$DEIDdcount+$Megadcount+$EOTAdcount+$Listodcount;

							echo '<tr><td colspan="2" class="contdr">Total: '.$Totald.'</td>
							<td colspan="2" class="contdr">Terminado: '.$Listodcount.'</td>
							<td class="contdr">'.$FTOdcount.'</td>
							<td class="contdr">'.$Ciscodcount.'</td>
							<td class="contdr">'.$Rackscandcount.'</td>
							<td class="contdr">'.$Solardcount.'</td>
							<td class="contdr">'.$Clusterdcount.'</td>
							<td class="contdr">'.$Solar2dcount.'</td>
							<td class="contdr">'.$Sharknadodcount.'</td>
							<td class="contdr">'.$Wiringdcount.'</td>
							<td class="contdr">'.$DEIDdcount.'</td>
							<td class="contdr">'.$Megadcount.'</td>
							<td class="contdr">'.$EOTAdcount.'</td>
						</tr>


					</table> </div>';
				}else{echo "";}

				?>

		</div>
	</section>

<!-- status de JV -->

  <section>
            <div class="grupo">
              <?php
              $query0 = mysqli_query($enlace, "SELECT racksjv.NoSerie, racksjv.Modelo FROM racksjv INNER JOIN pruebasjv on
              pruebasjv.NoSerie=racksjv.NoSerie WHERE Bahia = '7' AND Modelo='Microsoft' AND area='LVO'");
              $query = mysqli_query($enlace, "SELECT racksjv.Locacion, racksjv.NoSerie, racksjv.WO, racksjv.SKU,
              racksjv.Modelo, pruebasjv.FTO, pruebasjv.Arista0, pruebasjv.Arista1, pruebasjv.CM, pruebasjv.Cluster0, pruebasjv.Cluster1,
              pruebasjv.Bootstrap, pruebasjv.Rackscan, pruebasjv.DEID,  pruebasjv.EOTA
              FROM racksjv
              INNER JOIN pruebasjv on pruebasjv.NoSerie=racksjv.NoSerie
              WHERE Bahia='7' AND Modelo = 'Microsoft' AND area='LVO'
              ORDER BY Locacion ASC");
              if($datos0=mysqli_fetch_row($query0)){
                echo " <div class='caja'>
                <table width='100%' style='opacity:.9;' class='tablaST'>
                <caption style='background-color:#3e3e3e; opacity:.7; padding:10px; color:white;'><h1>Microsoft</h1></caption>
                <tr><th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th><th>FTO</th><th>Arista 0</th><th>Arista 1</th>
                <th>CM</th><th>Cluster Nic 0</th><th>Cluster Nic 1</th><th>Bootstrap</th>
                <th>Rackscan</th><th>DEID</th><th>EOTA</th></tr>
                ";
                while ($datos=mysqli_fetch_row($query) ) {
                  echo "<tr><td class='tdinfo'>".$datos[0]."</td>";
                  echo "<td class='tdinfo'>".$datos[1]."</td>";
                  echo "<td class='tdinfo'>".$datos[2]."</td>";
                  echo "<td class='tdinfo'>".$datos[3]."</td>";
                  if($datos[5]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[6]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[7]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[8]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[9]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[10]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[11]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[12]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[13]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[14]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td></tr>";
                  }
                }
                $Totalm= $FTOmcount+$Arista0mcount+$Arista1mcount+$Rackscanmcount+$Cluster0mcount+$Cluster1mcount+$Bootstrapmcount+$DEIDmcount+$CMmCount+$EOTAmcount+$Listomcount;
                echo '<tr>
                <td colspan="2" class="contaz">Total: '.$Totalm.'</td>
                <td colspan="2" class="contaz">Terminado: '.$Listomcount.'</td>
                <td class="contaz">'.$FTOmcount.'</td>
                <td class="contaz">'.$Arista0mcount.'</td>
                <td class="contaz">'.$Arista1mcount.'</td>
                <td class="contaz">'.$CMmCount.'</td>
                <td class="contaz">'.$Cluster0mcount.'</td>
                <td class="contaz">'.$Cluster1mcount.'</td>
                <td class="contaz">'.$Bootstrapmcount.'</td>
                <td class="contaz">'.$Rackscanmcount.'</td>
                <td class="contaz">'.$DEIDmcount.'</td>
                <td class="contaz">'.$EOTAmcount.'</td>
                </tr>

                </table> </div>';
              }
              ?>

            </div>
          </section>
		<br><br><center><h1 style="font-size:3em;"> Herramientas</h1></center><br>


<section>
		<center>
			<div class="grupo total">
				<div class="caja">
<!-- codigo para obtener ip -->

<?php $host= $_SERVER["HTTP_HOST"];
	$url="172.16.5.10";
	$url2="10.19.17.101";


?>

<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Repair System</summary>
<?php

	if($host==$url){

	 ?>
	<iframe src="http://172.16.3.214/RepairSystem/en/index" width="100%" height="700x">
	</iframe>

<?php
}else if($host==$url2) { ?>
	<iframe src="http://10.19.9.222/RepairSystem/en/" width="100%" height="700x">
	</iframe>
	<?php
}

 ?>
</details>


				</div>
			</div>
		</center>

		<center>
			<div class="grupo total">
				<div class="caja">
<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Megamind</summary>

	<?php

	if($host==$url){

	 ?>
	<iframe src="http://172.16.1.245/extras/EOTAudit/ConfigCheck/ConfigCheck.cgi" width="100%" height="700x">
</iframe>
<?php
}else if($host==$url2) { ?>
<iframe src="http://10.19.15.131/extras/EOTAudit/ConfigCheck/ConfigCheck.cgi" width="100%" height="700x">
</iframe>
	<?php
}

 ?>
</details>


				</div>
			</div>
		</center>

		<center>
			<div class="grupo total">
				<div class="caja">
<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Sharknado</summary>

<?php

	if($host==$url){

	 ?>
	<iframe src="http://172.16.1.245/cgi-bin/upload.cgi" width="100%" height="700x">
</iframe>
<?php
}else if($host==$url2) { ?>
<iframe src="http://10.19.15.131/cgi-bin/upload.cgi" width="100%" height="700x">
</iframe>
	<?php
}

 ?>
</details>


				</div>
			</div>
		</center>

		<center>
			<div class="grupo total">
				<div class="caja">
<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Wiring Check</summary>
<?php

	if($host==$url){

	 ?>
	<iframe src="http://172.16.1.245/extras/wcu.cgi" width="100%" height="700x">
</iframe>
<?php
}else if($host==$url2) { ?>
<iframe src="http://10.19.15.131/extras/wcu.cgi" width="100%" height="700x">
</iframe>
	<?php
}

 ?>
</details>


				</div>
			</div>
		</center>

		<center>
			<div class="grupo total">
				<div class="caja">
<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Upload macs 4.1 36 - 48 nodes</summary>
<?php

	if($host==$url){

	 ?>
	<iframe src="http://172.16.2.151/cgi-bin/wcs_azure41.pl" width="100%" height="700x">
</iframe>
<?php
}
 ?>
</details>


				</div>
			</div>
		</center>

		<center>
			<div class="grupo total">
				<div class="caja">
<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Upload macs 4.1 23 nodes</summary>
<?php

	if($host==$url){

	 ?>
	<iframe src="http://172.16.2.151/cgi-bin/wcs_azure43.pl" width="100%" height="700x">
</iframe>
<?php
}
 ?>
</details>


				</div>
			</div>
		</center>

		<center>
			<div class="grupo total">
				<div class="caja">
<details class="iventana">
	<summary style="background-color:#3e3e3e; padding:20px">Solar</summary>
<?php

	if($host==$url){

	 ?>

	<iframe src="http://172.16.8.235/Solar/main.aspx" width="100%" height="700x">
</iframe>
<?php
}
 ?>
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





</body>
</html>
