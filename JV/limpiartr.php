<?php
include('conexion.php');
session_start();
$NoSerie=$_REQUEST['NoSerie'];

$delete = mysqli_query($enlace, "DELETE FROM racksjv where NoSerie='$NoSerie'");
$delete2 = mysqli_query($enlace, "DELETE FROM pruebasjv where NoSerie='$NoSerie'");
$delete3 = mysqli_query($enlace, "DELETE FROM comentarios where NoSerie='$NoSerie'");

if (($enlace->query($delete) == TRUE) && ($enlace->query($delete2) == TRUE) &&($enlace->query($delete3) == TRUE)) {

     		    echo "<script>location.href='javascript:history.back(-1);'</script>";


}else {
echo "<script>location.href='javascript:history.back(-1);'</script>";

}
 ?>
