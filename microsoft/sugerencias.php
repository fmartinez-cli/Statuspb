 <?php 
  if(!isset($_REQUEST['sugerencia'])){
							header("Location: index.php");
							}else{
 session_start();
 include('conexion.php');
$comentario = $_REQUEST['sugerencia'];
$hora= Date('Y-m-d h:i:s');
$noreloj = $_SESSION['No_Reloj'];


$actual = array("<", ">", "/", '\\', "'", '"', 'ñ','Ñ', 'á', 'é', 'í', 'ó', 'ú');
$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;', '&ntilde;', '&Ntilde;','&aacute;' ,'&eacute;' ,'&iacute;' ,'&oacute;' ,'&uacute;'  );
$Comentariofinal = str_replace($actual, $nuevo, $comentario);

$insert=mysqli_query($enlace, "INSERT INTO sugerencia (Sugerencia, NoReloj, Fecha, status) VALUES ('$Comentariofinal', '$noreloj',  '$hora', '1') ");
if ($enlace->query($insert) == TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}

  echo "<script>location.href='javascript:history.back(-1);'</script>";
}
 ?> 