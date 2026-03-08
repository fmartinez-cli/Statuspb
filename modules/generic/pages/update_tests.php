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

// Get all current test results for this rack
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
    
    // Determine which fields to update
    $updates = [];
    $updates[] = "status = '$new_status'";
    
    // Set start time if test is starting (was pending/waiting and now running)
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
    
    // Update the test
    $update_query = "UPDATE test_results SET " . implode(', ', $updates) . " WHERE id = $test_id";
    mysqli_query($enlace, $update_query);
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