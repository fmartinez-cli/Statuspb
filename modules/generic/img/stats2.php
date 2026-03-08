<?php 

include('../LVO/conexion.php');

session_start();

if(isset($_REQUEST['Nomb'])){
		$Nombre=$_REQUEST['Nomb'];
		$Desc=$_REQUEST['Desc'];
		$Img=$_REQUEST['Img'];
		$NoReloj=$_SESSION['No_Reloj'];
		$update2=mysqli_query($enlace, "UPDATE stats set  Nombre='$Nombre', Descripcion='$Desc', Imagen='$Img'  where NoReloj = '$NoReloj'");
		$enlace->query($update2);


		


		echo "<script>location.href='javascript:history.back(-1);'</script>";

} else {
	echo $_REQUEST['Nomb'];
}
?>