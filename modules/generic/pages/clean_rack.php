<?php
session_start();
require_once dirname(__DIR__) . '/bootstrap.php';

if (!isset($_SESSION['Nombre']) || !isset($_POST['rack_id'])) {
    header("Location: index.php");
    exit;
}

$rack_id = intval($_POST['rack_id']);

// Optional: Archive test results if needed
// For now, just delete or mark as archived

// Delete the rack (or mark as archived depending on your needs)
mysqli_query($enlace, "DELETE FROM racks WHERE id = $rack_id");
// If you want to keep history, use: UPDATE racks SET current_status = 'archived' WHERE id = $rack_id

// Delete associated test results (they will cascade if foreign key is set)
// or archive them

echo "<script>location.href='bay1.php';</script>";
?>