<?php 
session_start();
if($_SESSION['Nivel']!='1'||!isset($_REQUEST['NoSerie'])){
							header("Location: index.php");
							}else{
include('conexion.php');
$NoSerie=$_REQUEST['NoSerie'];
$con = mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie='$NoSerie'"); 
if($cons=mysqli_fetch_array($con)){

	if($cons['FTO']=='1'&&$cons['Cisco']==0){
		$update=$enlace->query("UPDATE pruebas set  FTO='0', FTONoReloj=NULL, FTOHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	// _______________________________________________________________________
	if($cons['Cisco']=='1'&&$cons['Rackscan']==0){
		$update=$enlace->query("UPDATE pruebas set  Cisco='0', CiscoNoReloj=NULL, CiscoHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['Rackscan']=='1'&&$cons['XTEE']==0){
		$update=$enlace->query("UPDATE pruebas set  Rackscan='0',RackscanNoReloj=NULL, RackscanHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['XTEE']=='1'&&$cons['Cluster']==0){
		$update=$enlace->query("UPDATE pruebas set  XTEE='0', XTEENoReloj=NULL,XTEEHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['Cluster']=='1'&&$cons['Solar']==0){
		$update=$enlace->query("UPDATE pruebas set  Cluster='0', ClusterNoReloj=NULL, ClusterHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['Solar']=='1'&&$cons['Wiring']==0){
		$update=$enlace->query("UPDATE pruebas set  Solar='0', SolarNoReloj=NULL, SolarHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['Wiring']=='1'&&$cons['Bootstrap']==0){
		$update=$enlace->query("UPDATE pruebas set  Wiring='0', WiringNoReloj=NULL, WiringHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
		if($cons['Bootstrap']=='1'&&$cons['Sharknado']==0){
		$update=$enlace->query("UPDATE pruebas set  Bootstrap='0', BootstrapNoReloj=NULL, BootstrapHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['Sharknado']=='1'&&$cons['DEID']==0){
		$update=$enlace->query("UPDATE pruebas set  Sharknado='0', SharknadoNoReloj=NULL, SharknadoHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['DEID']=='1'&&$cons['Megamind']==0){
		$update=$enlace->query("UPDATE pruebas set  DEID='0', DEIDNoReloj=NULL, DEIDHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['Megamind']=='1'&&$cons['EOTA']==0){
		$update=$enlace->query("UPDATE pruebas set  Megamind='0', MegamindNoReloj=NULL, MegamindHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
}
	}
	//_______________________________________________________________________
	if($cons['EOTA']=='1'){
		$update=$enlace->query("UPDATE pruebas set  EOTA='0', EOTANoReloj=NULL, EOTAHoraFinal=NULL where NoSerie = '$NoSerie'");
if ($update) {
    echo "<script>location.href = 'retrocederrack.php'</script>";
} else {
   echo "<span style='color:#CF000F; font-size:20px;'> Hubo un error al actualizar</span>";
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