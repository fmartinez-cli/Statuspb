<?php
include('conexion.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $comentario = $_POST['comentario'];

    $stmt = $enlace->prepare("UPDATE racksmicro SET comentarios=? WHERE NoSerie=?");
    $stmt->bind_param("ss", $comentario, $id);
    $result = $stmt->execute();
    if ($result) {
        echo "Actualización exitosa";
    } else {
        echo "Error en la actualización";
    }
}
?>