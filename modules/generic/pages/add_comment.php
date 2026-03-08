<?php
session_start();
require_once dirname(__DIR__) . '/bootstrap.php';

if (!isset($_SESSION['Nombre']) || !isset($_POST['rack_id']) || !isset($_POST['comment'])) {
    header("Location: index.php");
    exit;
}

$rack_id = intval($_POST['rack_id']);
$comment = mysqli_real_escape_string($enlace, $_POST['comment']);
$user_clock = $_SESSION['No_Reloj'];
$user_name = $_SESSION['Nombre'];
$user_level = $_SESSION['Nivel'];

// Insert comment
$query = "INSERT INTO comments (rack_id, user_clock, user_name, user_level, comment, created_at)
          VALUES ($rack_id, '$user_clock', '$user_name', $user_level, '$comment', NOW())";

if (mysqli_query($enlace, $query)) {
    // Success
} else {
    error_log("Error adding comment: " . mysqli_error($enlace));
}

// Redirect back
echo "<script>location.href='bay1.php';</script>";
?>