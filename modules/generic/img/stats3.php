<?php

include('../LVO/conexion.php');

session_start();

if(isset($_REQUEST['Nombtheme'])){
		$Nombre=$_REQUEST['Nombtheme'];
		$body=$_REQUEST['bodytheme'];
		$header=$_REQUEST['headertheme'];
		$header2=$_REQUEST['header2theme'];
		$NoReloj=$_SESSION['No_Reloj'];
		$update2=mysqli_query($enlace, "UPDATE stats set  body='$body', header='$header', headerdos='$header2'  where NoReloj = '$NoReloj'");
		$enlace->query($update2);





		echo "<script>location.href='javascript:history.back(-1);'</script>";

} else {
	
}
?>
