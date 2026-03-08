<?php 
include('conexion.php');
session_start();

if(!isset($_REQUEST['NoSerie'])){
    header("Location: index.php");
    exit;
} else {
    $NoSerie = mysqli_real_escape_string($enlace, $_REQUEST['NoSerie']);
    
    // 1. Primero, obtener la locación del rack (opcional, para debugging)
    $queryLoc = mysqli_query($enlace, "SELECT Locacion FROM racksmicro WHERE NoSerie = '$NoSerie'");
    $locacion = mysqli_fetch_assoc($queryLoc)['Locacion'] ?? 'Desconocida';
    
    // 2. Eliminar el rack de racksmicro (ya no se necesita UPDATE porque se elimina)
    $delete1 = mysqli_query($enlace, "DELETE FROM racksmicro WHERE NoSerie = '$NoSerie'");
    
    // 3. Eliminar las pruebas de pruebasmicro
    $delete2 = mysqli_query($enlace, "DELETE FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
    
    // 4. Eliminar comentarios asociados
    $delete3 = mysqli_query($enlace, "DELETE FROM comentarios WHERE NoSerie = '$NoSerie'");
    
    // Verificar si todas las eliminaciones fueron exitosas
    if ($delete1 && $delete2 && $delete3) {
        // Opcional: registrar la limpieza en un log
        error_log("TR limpiado: Serie $NoSerie, Locación: $locacion");
        echo "<script>location.href='javascript:history.back(-1);'</script>";
    } else {
        error_log("Error al limpiar TR: $NoSerie - " . mysqli_error($enlace));
        echo "<script>location.href='javascript:history.back(-1);'</script>";
    }
}
?>