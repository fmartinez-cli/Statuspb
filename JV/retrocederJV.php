<?php
session_start();
if($_SESSION['Nivel']!='1'||!isset($_REQUEST['NoSerie'])){
							header("Location: index.php");
							}else{
include('conexion.php');
$NoSerie=$_REQUEST['NoSerie'];
$con = mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie='$NoSerie'");
if($cons=mysqli_fetch_array($con)){

	if($cons['FTO']=='1'&&$cons['Arista0']==0){
		$update=$enlace->query("UPDATE pruebasjv set  FTO='0', FTONoReloj=NULL, FTOHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	// _______________________________________________________________________
	if($cons['Arista0']=='1'&&$cons['Arista1']==0){
		$update=$enlace->query("UPDATE pruebasjv set  Arista0='0', Arista0NoReloj=NULL, Arista0HoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	//_______________________________________________________________________
	if($cons['Arista1']=='1'&&$cons['CM']==0){
		$update=$enlace->query("UPDATE pruebasjv set  Arista1='0',Arista1NoReloj=NULL, Arista1HoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	//_______________________________________________________________________
	if($cons['CM']=='1'&&$cons['Cluster0']==0){
		$update=$enlace->query("UPDATE pruebasjv set  CM='0', CMNoReloj=NULL,CMHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	//_______________________________________________________________________
	if($cons['Cluster0']=='1'&&$cons['Cluster1']==0){
		$update=$enlace->query("UPDATE pruebasjv set  Cluster0='0', Cluster0NoReloj=NULL, Cluster0HoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	//_______________________________________________________________________
	if($cons['Cluster1']=='1'&&$cons['Bootstrap']==0){
		$update=$enlace->query("UPDATE pruebasjv set  Cluster1='0', Cluster1NoReloj=NULL, Cluster1HoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	//_______________________________________________________________________
	if($cons['Bootstrap']=='1'&&$cons['Rackscan']==0){
		$update=$enlace->query("UPDATE pruebasjv set  Bootstrap='0', BootstrapNoReloj=NULL, BootstrapHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	//_______________________________________________________________________
		if($cons['Rackscan']=='1'&&$cons['DEID']==0){
		$update=$enlace->query("UPDATE pruebasjv set  Rackscan='0', RackscanNoReloj=NULL, RackscanHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	//_______________________________________________________________________
	if($cons['DEID']=='1'&&$cons['EOTA']==0){
		$update=$enlace->query("UPDATE pruebasjv set  DEID='0', DEIDNoReloj=NULL, DEIDHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}

	//_______________________________________________________________________
	if($cons['EOTA']=='1'){
		$update=$enlace->query("UPDATE pruebasjv set  EOTA='0', EOTANoReloj=NULL, EOTAHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>".mysqli_error($enlace);
}
	}
	//_______________________________________________________________________
	if($cons['FTO']=='0'){

    echo "<script>location.href = 'retrocederrack.php'</script>";

	}
	//_______________________________________________________________________

}
}
 ?>
