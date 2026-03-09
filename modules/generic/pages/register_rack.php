<?php
session_start();
require_once dirname(__DIR__) . '/bootstrap.php';

if (!isset($_SESSION['Nombre']) || !isset($_POST['serial'])) {
    header("Location: index.php");
    exit;
}

$serial = mysqli_real_escape_string($enlace, $_POST['serial']);
$wo = mysqli_real_escape_string($enlace, $_POST['wo']);
$sku = mysqli_real_escape_string($enlace, $_POST['sku']);
$model = $_POST['model'];
$location = mysqli_real_escape_string($enlace, $_POST['location']);
$bay = intval($_POST['bay']);
$technician = $_SESSION['No_Reloj'];

// Verify if serial number already exists
$check = mysqli_query($enlace, "SELECT id FROM racks WHERE serial_number = '$serial'");
if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Serial number already exists!'); history.back();</script>";
    exit;
}

// Verify if location is already occupied
$check_loc = mysqli_query($enlace, "SELECT id FROM racks WHERE location_code = '$location'");
if (mysqli_num_rows($check_loc) > 0) {
    echo "<script>alert('Location already occupied!'); history.back();</script>";
    exit;
}

// Determine model_id based on selection
$model_id = ($model == 'available') ? 'NULL' : intval($model);

// Insert new rack record
$technician_value = is_numeric($technician) ? $technician : 'NULL';
$query = "INSERT INTO racks (unit_id, serial_number, work_order, sku, bay_number, location_code, 
                             model_id, current_status, technician_clock, shift, created_at)
          VALUES (1, '$serial', '$wo', '$sku', $bay, '$location', 
                  $model_id, 'in_test', $technician_value, '{$_SESSION['Turno']}', NOW())";

if (mysqli_query($enlace, $query)) {
    $rack_id = mysqli_insert_id($enlace);
    
    // ============================================
    // SOLUCIÓN 1: Iniciar el primer test automáticamente
    // ============================================
    if ($model != 'available') {
        // Fetch test sequence for the selected model
        $seq_query = "SELECT test_code FROM model_test_sequence 
                      WHERE model_id = $model_id ORDER BY sequence_order";
        $seq_result = mysqli_query($enlace, $seq_query);
        
        $sequence = 1;
        $now = date('Y-m-d H:i:s'); // Hora actual
        
        while ($test = mysqli_fetch_assoc($seq_result)) {
            if ($sequence == 1) {
                // ✅ PRIMER TEST: Inicia inmediatamente con waiting y start_time
                $insert_test = "INSERT INTO test_results 
                               (rack_id, test_code, sequence_order, status, status_time, start_time, created_at)
                               VALUES ($rack_id, '{$test['test_code']}', $sequence, 'waiting', '$now', '$now', NOW())";
            } else {
                // Tests siguientes: pending sin start_time
                $insert_test = "INSERT INTO test_results 
                               (rack_id, test_code, sequence_order, status, created_at)
                               VALUES ($rack_id, '{$test['test_code']}', $sequence, 'pending', NOW())";
            }
            mysqli_query($enlace, $insert_test);
            $sequence++;
        }
    }
    
    echo "<script>location.href='bay1.php';</script>";
} else {
    echo "<script>alert('Error registering rack: " . mysqli_error($enlace) . "'); history.back();</script>";
}
?>