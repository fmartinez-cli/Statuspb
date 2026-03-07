<?php
session_start();
include('conexion.php');

// Verificar que el usuario está logueado
if (!isset($_SESSION['Nombre'])) {
    header("Location: index.php");
    exit;
}

// SOLO JRs (Nivel 2) pueden modificar comentarios
if ($_SESSION['Nivel'] != 2) {
    echo "Error: Solo los JRs pueden modificar comentarios";
    exit;
}

// Verificar que llegaron los datos
if (!isset($_POST['ids']) || !isset($_POST['comentarios'])) {
    echo "Error: Datos incompletos";
    exit;
}

$ids = $_POST['ids'];
$comentarios = $_POST['comentarios'];

for ($i = 0; $i < count($ids); $i++) {
    $NoSerie = mysqli_real_escape_string($enlace, $ids[$i]);
    $comentario = mysqli_real_escape_string($enlace, $comentarios[$i]);
    
    // Actualizar el comentario en racksmicro
    $query = "UPDATE racksmicro SET comentarios_JRS = '$comentario' WHERE NoSerie = '$NoSerie'";
    mysqli_query($enlace, $query);
}

echo "Comentarios actualizados correctamente";
?>