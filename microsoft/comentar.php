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

$actual = array("<", ">", "/", '\\', "'", '"', '�','�', '�', '�', '�', '�', '�');
$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;', '&ntilde;', '&Ntilde;','&aacute;' ,'&eacute;' ,'&iacute;' ,'&oacute;' ,'&uacute;'  );
$Comentariofinal = str_replace($actual, $nuevo, $comentario);

$insert = mysqli_query($enlace, "INSERT INTO comentarios(NoSerie, NoReloj, Nombre, Hora, Comentario) 
                                VALUES ('$noserie', '$noreloj', '$nombre', '$hora', '$Comentariofinal')");

$insert_copy = mysqli_query($enlace, "INSERT INTO comentarios_copy(NoSerie, NoReloj, Nombre, Hora, Comentario) 
                                      VALUES ('$noserie', '$noreloj', '$nombre', '$hora', '$Comentariofinal')");

if ($insert && $insert_copy) {
    // El registro se insertó correctamente en ambas tablas
    echo "Registro insertado correctamente en comentarios y comentarios_copy.";
} else {
    // Ocurrió un error al insertar en al menos una de las tablas
    echo "Error al insertar en comentarios o comentarios_copy.";
}


 echo "<script>location.href='javascript:history.back(-1);'</script>";
}
 ?> 