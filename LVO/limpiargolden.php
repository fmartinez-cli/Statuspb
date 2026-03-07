<?php 

include('conexion.php');
session_start();
if(!isset($_REQUEST['NoSerie'])){
							header("Location: index.php");
							}else{
$NoSerie=$_REQUEST['NoSerie'];
$delete = mysqli_query($enlace, "DELETE FROM golden where NoSerie='$NoSerie'");
$delete3 = mysqli_query($enlace, "DELETE FROM comentariosgolden where NoSerie='$NoSerie'");

if (($enlace->query($delete) == TRUE) &&($enlace->query($delete3) == TRUE)) {
    
     		    echo "<script>location.href='javascript:history.back(-1);'</script>";

    
}else {
echo "<script>location.href='javascript:history.back(-1);'</script>";

}
}
 ?>






 
