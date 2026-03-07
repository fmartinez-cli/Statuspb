<?php 
 if(!isset($_REQUEST['area'])){
							header("Location: index.php");
							}else{
 session_start();
 include('LVO/conexion.php');
$nota = $_REQUEST['area'];
$noreloj = $_SESSION['No_Reloj'];


$insert=mysqli_query($enlace, "UPDATE users SET Comentario= '$nota' WHERE No_Reloj = '$noreloj'");
if ($enlace->query($insert) == TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}

 echo "<script>location.href='javascript:history.back(-1);'</script>";
}
 ?>