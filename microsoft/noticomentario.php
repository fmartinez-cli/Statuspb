<?php
session_start();
include('conexion.php');
$id=$_REQUEST['ID'];
$comentario=$_REQUEST['comentario'];
$nombre=$_SESSION['Nombre'];
$Fecha= Date('Y-m-d h:i:s');

$actual = array("<", ">", "/", '\\', "'", '"', 'ñ','Ñ', 'á', 'é', 'í', 'ó', 'ú');
$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;', '&ntilde;', '&Ntilde;','&aacute;' ,'&eacute;' ,'&iacute;' ,'&oacute;' ,'&uacute;'  );
$Comentariofinal = str_replace($actual, $nuevo, $comentario);

$insert=mysqli_query($enlace, "INSERT INTO noticomentarios (ID, Comentario, NombreU, Fecha) VALUES ('$id', '$Comentariofinal', '$nombre' , '$Fecha' ) ");
if ($enlace->query($insert) == TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}

 echo "<script>location.href='javascript:history.back(-1);'</script>";


 ?>
