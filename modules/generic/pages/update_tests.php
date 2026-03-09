<?php
session_start();
require_once dirname(__DIR__) . '/bootstrap.php';

if (!isset($_SESSION['Nombre']) || !isset($_POST['rack_id']) || !isset($_POST['status'])) {
    header("Location: index.php");
    exit;
}

$rack_id = intval($_POST['rack_id']);
$location = mysqli_real_escape_string($enlace, $_POST['location'] ?? '');
$technician = $_SESSION['No_Reloj'];
$current_time = date('Y-m-d H:i:s');

// Get all current test results for this rack, ordered by sequence
$tests_query = mysqli_query($enlace, "SELECT * FROM test_results WHERE rack_id = $rack_id ORDER BY sequence_order");
$tests = [];
while ($t = mysqli_fetch_assoc($tests_query)) {
    $tests[$t['id']] = $t;
}

// Process each test status update
foreach ($_POST['status'] as $test_id => $new_status) {
    $test_id = intval($test_id);
    $new_status = mysqli_real_escape_string($enlace, $new_status);
    
    if (!isset($tests[$test_id])) continue;
    
    $current_test = $tests[$test_id];
    $current_status = $current_test['status'];
    $sequence = $current_test['sequence_order'];
    
    // Determine which fields to update for this test
    $updates = [];
    $updates[] = "status = '$new_status'";
    
    // Set start time if test is starting (was pending/waiting and now running/waiting)
    if (($current_status == 'pending' || $current_status == 'waiting') && 
        ($new_status == 'running' || $new_status == 'waiting') && 
        empty($current_test['start_time'])) {
        $updates[] = "start_time = '$current_time'";
    }
    
    // Set status time always
    $updates[] = "status_time = '$current_time'";
    
    // Set end time if test is passing or failing
    if (($new_status == 'pass' || $new_status == 'fail') && empty($current_test['end_time'])) {
        $updates[] = "end_time = '$current_time'";
    }
    
    // Set technician clock if not set
    if (empty($current_test['technician_clock'])) {
        $updates[] = "technician_clock = '$technician'";
    }
    
    // Update the current test
    $update_query = "UPDATE test_results SET " . implode(', ', $updates) . " WHERE id = $test_id";
    mysqli_query($enlace, $update_query);
    
    // ============================================
    // IMPORTANTE: Si la prueba se completó (pass), activar la siguiente
    // ============================================
    if ($new_status == 'pass') {
        // Buscar la siguiente prueba en la secuencia
        $next_query = "SELECT id FROM test_results 
                       WHERE rack_id = $rack_id 
                       AND sequence_order = " . ($sequence + 1) . "
                       LIMIT 1";
        $next_result = mysqli_query($enlace, $next_query);
        
        if ($next_result && mysqli_num_rows($next_result) > 0) {
            $next = mysqli_fetch_assoc($next_result);
            $next_id = $next['id'];
            
            // Activar la siguiente prueba con waiting y start_time
            $activate_query = "UPDATE test_results 
                               SET status = 'waiting', 
                                   status_time = '$current_time',
                                   start_time = '$current_time',
                                   technician_clock = '$technician'
                               WHERE id = $next_id 
                               AND status = 'pending'";
            mysqli_query($enlace, $activate_query);
            
            error_log("Activada siguiente prueba para rack $rack_id: test_id $next_id");
        }
    }
}

// Check if all tests are now passed
$check_all = mysqli_query($enlace, "SELECT COUNT(*) as total, 
                                     SUM(CASE WHEN status = 'pass' THEN 1 ELSE 0 END) as passed 
                                     FROM test_results WHERE rack_id = $rack_id");
$result = mysqli_fetch_assoc($check_all);

if ($result['total'] == $result['passed']) {
    // All tests passed - update rack status
    mysqli_query($enlace, "UPDATE racks SET current_status = 'completed' WHERE id = $rack_id");
}

// Redirect back
echo "<script>location.href='bay1.php?loc=" . urlencode($location) . "';</script>";
?>