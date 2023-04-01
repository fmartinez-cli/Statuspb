   <?php 
  if(!isset($_REQUEST['comentario'])){
							header("Location: index.php");
							}else{
 session_start();
 include('conexion.php');
$comentario = $_REQUEST['comentario'];
$noserie = $_REQUEST['NoSerie'];
$hora= Date('Y-m-d h:i:s');
$noreloj = $_SESSION['No_Reloj'];
$nombre = $_SESSION['Nombre'];

$actual = array("<", ">", "/", '\\', "'", '"', 'ñ','Ñ', 'á', 'é', 'í', 'ó', 'ú');
$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;', '&ntilde;', '&Ntilde;','&aacute;' ,'&eacute;' ,'&iacute;' ,'&oacute;' ,'&uacute;'  );
$Comentariofinal = str_replace($actual, $nuevo, $comentario);

$insert=mysqli_query($enlace, "INSERT INTO comentariosgolden(NoSerie, NoReloj, Nombre, Hora, Comentario) VALUES ('$noserie', '$noreloj', '$nombre' , '$hora' , '$Comentariofinal') ");
if ($enlace->query($insert) == TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}

 echo "<script>location.href='javascript:history.back(-1);'</script>";
}
 ?>