<?php 

include('conexion.php');
session_start();
if(!isset($_REQUEST['NoSerie'])){
							header("Location: index.php");
							}else{
								$NoSerie = $_REQUEST['NoSerie'];
								
								// Actualiza los datos en la tabla racks
								$update = $enlace->query("UPDATE racks set Corriendo='0' where NoSerie = '$NoSerie'");
								
								// Elimina datos de las tablas
								$delete = mysqli_query($enlace, "DELETE FROM racks where NoSerie='$NoSerie'");
								$delete2 = mysqli_query($enlace, "DELETE FROM pruebasMicro where NoSerie='$NoSerie'");
								$delete3 = mysqli_query($enlace, "DELETE FROM comentarios where NoSerie='$NoSerie'");
								

if (($enlace->query($delete) == TRUE) && ($enlace->query($delete2) == TRUE) &&($enlace->query($delete3) == TRUE)) {
    
     		    echo "<script>location.href='javascript:history.back(-1);'</script>";

    
}else {
echo "<script>location.href='javascript:history.back(-1);'</script>";

}
}
 ?>






 
