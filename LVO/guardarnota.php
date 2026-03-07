<?php 

session_start();
 include('conexion.php');

if(isset($_SESSION['Nombre'])){

 if(!isset($_REQUEST['valor'])){
							header("Location: index.php");
							}else{
 

$noreloj = $_SESSION['No_Reloj'];
$nolan=$_REQUEST['valor'];


switch ($nolan) {
	case '1':
		$nota = $_REQUEST['area'];
		$insert=mysqli_query($enlace, "UPDATE users SET Comentario= '$nota' WHERE No_Reloj = '$noreloj'");
if ($enlace->query($insert) == TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}

 echo "<script>location.href='javascript:history.back(-1);'</script>";

		break;

	case '2':
	$nota = $_REQUEST['area2'];
		$insert=mysqli_query($enlace, "UPDATE users SET Comentario2= '$nota' WHERE No_Reloj = '$noreloj'");
if ($enlace->query($insert) == TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}

 echo "<script>location.href='javascript:history.back(-1);'</script>";

		break;

	case '3':
		$nota = $_REQUEST['area3'];
		$insert=mysqli_query($enlace, "UPDATE users SET Comentario3= '$nota' WHERE No_Reloj = '$noreloj'");
if ($enlace->query($insert) == TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}

 echo "<script>location.href='javascript:history.back(-1);'</script>";
		break;
	
	default:
		# code...
		break;
}




}

}else{
	header("Location: index.php");
}
 ?>