<?php 
if(!isset($_REQUEST['comentario'])){
    header("Location: index.php");
    exit;
} else {
    session_start();
    include('conexion.php');
    
    $comentario = $_REQUEST['comentario'];
    $noserie = $_REQUEST['NoSerie'];
    $hora = date('Y-m-d h:i:s');
    $noreloj = $_SESSION['No_Reloj'];
    $nombre = $_SESSION['Nombre'];

    $actual = array("<", ">", "/", '\\', "'", '"', '�','�', '�', '�', '�', '�', '�');
    $nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;', '&ntilde;', '&Ntilde;','&aacute;' ,'&eacute;' ,'&iacute;' ,'&oacute;' ,'&uacute;');
    $Comentariofinal = str_replace($actual, $nuevo, $comentario);

    // Insertar SOLO en comentarios
    $insert = mysqli_query($enlace, "INSERT INTO comentarios(NoSerie, NoReloj, Nombre, Hora, Comentario) 
                                    VALUES ('$noserie', '$noreloj', '$nombre', '$hora', '$Comentariofinal')");

    if ($insert) {
        // El registro se insertó correctamente
        echo "Registro insertado correctamente en comentarios.";
    } else {
        // Ocurrió un error al insertar
        echo "Error al insertar en comentarios: " . mysqli_error($enlace);
    }

    echo "<script>location.href='javascript:history.back(-1);'</script>";
}
?>