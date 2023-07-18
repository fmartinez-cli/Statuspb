

<?php 
include('conexion.php');
if(isset($_REQUEST['WO2'])){

	$WO=$_REQUEST['WO2'];
	$con=mysqli_query($enlace, "SELECT * FROM racksterminados WHERE WO='$WO'");
	$con2=mysqli_query($enlace, "SELECT * FROM racks WHERE WO='$WO'");

if(preg_match("/^[0-9]{9}$/", $WO)){
	if($cons=mysqli_fetch_row($con)){
			
		if($cons[6]=='Microsoft 8.2'){

			if(!$cons2=mysqli_fetch_row($con2)){
				echo '<form action="estadisticaswo.php" method="post" >
				<input type="hidden" id="WO" name="WO" value="'.$cons[2].'">
				<button style="width:400px;" class="btn1">WO: '.$cons[2].' - Terminada</button></form>';
	}else{
				echo '<form action="buscar.php?WO='.$cons[2].'" method="post" >
				<input type="hidden" id="WO" name="WO" value="'.$cons[2].'">
				<button style="width:400px;" class="btn1">WO: '.$cons[2].' - En piso</button></form>';
	}

}elseif($cons[6]=='Dropbox'){ 
				if(!$cons2=mysqli_fetch_row($con2)){
				echo '<form action="buscar.php?WO='.$cons[2].'" method="post" >
				<input type="hidden" id="WO" name="WO" value="'.$cons[2].'">
				<button  style="background-color:#049372; width:400px;" class="btn1">WO: '.$cons[2].' - Terminada</button></form>';
	}else{
				echo '<form action="buscar.php?WO='.$cons[2].'" method="post" >
				<input type="hidden" id="WO" name="WO" value="'.$cons[2].'">
				<button style="background-color:#049372; width:400px;" class="btn1">WO: '.$cons[2].' - En piso</button></form>';
	}
}
	}else{
			echo '<center><div class="caja"><h2 style="color:white; background:#D91E18;  font-size:20px; padding:5px;width:400px;">No se encontro la WO</h2></div></center>';

	}
}else{
				echo '<center><div class="caja"><h2 style="color:white; background:#D91E18;  font-size:20px; padding:5px;width:400px;">Ingrese una WO v&aacute;lida</h2></div></center>';

}

}else{

	header("Location: index.php");
}

 ?>