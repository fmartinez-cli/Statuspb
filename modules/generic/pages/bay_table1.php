<?php
require_once dirname(__DIR__) . '/bootstrap.php';

// Verificar que $enlace existe
if (!isset($enlace)) {
    die("Error: No database connection");
}

session_start();

// Función para formatear tiempo progresivo
function formatTimeProgress($startTime, $endTime) {
    if (empty($startTime) || $startTime == 'Vacio') {
        return '<span class="badge bg-secondary">Not started</span>';
    }
    
    if (empty($endTime) || $endTime == 'Vacio') {
        $endTime = date('Y-m-d H:i:s');
    }
    
    try {
        $start = new DateTime($startTime);
        $end = new DateTime($endTime);
        $interval = $start->diff($end);
        
        if ($interval->days > 0) {
            $time = $interval->format('%ad %hh %im');
        } elseif ($interval->h > 0) {
            $time = $interval->format('%hh %im');
        } else {
            $time = $interval->format('%im');
        }
        
        // Color coding based on duration
        $totalMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
        if ($totalMinutes < 60) {
            return '<span class="badge bg-success">' . $time . '</span>';
        } elseif ($totalMinutes < 180) {
            return '<span class="badge bg-warning text-dark">' . $time . '</span>';
        } else {
            return '<span class="badge bg-danger">' . $time . '</span>';
        }
        
    } catch (Exception $e) {
        return '<span class="badge bg-secondary">Error</span>';
    }
}

// Get bay number from filename or default to 1
$bay = isset($_GET['bay']) ? intval($_GET['bay']) : 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bay <?php echo $bay; ?> Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body {
            font-size: 13px;
            background-color: #f8f9fa;
        }
        .table {
            font-size: 13px;
            width: 100%;
        }
        .table th {
            background-color: #343a40;
            color: white;
            font-weight: 600;
            padding: 8px 4px;
            white-space: nowrap;
            vertical-align: middle;
            text-align: center;
            font-size: 12px;
        }
        .table td {
            padding: 6px 4px;
            vertical-align: middle;
            white-space: nowrap;
        }
        
        /* Model colors */
        .model-a { background-color: #2574A9 !important; color: white !important; font-weight: bold; }
        .model-b { background-color: #049372 !important; color: white !important; font-weight: bold; }
        .model-d { background-color: #e26715 !important; color: white !important; font-weight: bold; }
        .model-available { background-color: #3e3e3e !important; color: white !important; font-weight: bold; }
        
        /* Test status colors */
        .test-pass { background-color: #008000 !important; }
        .test-waiting { background-color: #f7a307 !important; }
        .test-running { background-color: #FFFF00 !important; }
        .test-fail { background-color: #FF0000 !important; }
        .test-pending { background-color: transparent !important; }
        
        .test-cell {
            padding: 0 !important;
            width: 35px;
            height: 25px;
            text-align: center;
        }
        .test-cell div {
            width: 100%;
            height: 100%;
            min-height: 25px;
        }
        
        /* Editable comments */
        [contenteditable="true"] {
            background-color: #fff9e6;
            padding: 4px 6px;
            border-radius: 4px;
            min-width: 120px;
            display: block;
            cursor: text;
            font-size: 12px;
        }
        [contenteditable="true"]:hover {
            background-color: #fff3cd;
        }
        [contenteditable="true"]:focus {
            background-color: #fff;
            outline: 2px solid #2574A9;
        }
        
        /* Legend */
        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 15px;
            padding: 8px;
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
        }
        .color-box {
            width: 16px;
            height: 16px;
            border: 1px solid #6c757d;
        }
    </style>
</head>
<body>

<div class="container-fluid py-2">
    <!-- Color Legend -->
    <div class="legend">
        <div class="legend-item"><span class="color-box" style="background-color: #2574A9;"></span> Model A</div>
        <div class="legend-item"><span class="color-box" style="background-color: #049372;"></span> Model B</div>
        <div class="legend-item"><span class="color-box" style="background-color: #e26715;"></span> Model D</div>
        <div class="legend-item"><span class="color-box" style="background-color: #3e3e3e;"></span> Available</div>
        <div class="legend-item"><span class="color-box" style="background-color: #008000;"></span> Pass</div>
        <div class="legend-item"><span class="color-box" style="background-color: #f7a307;"></span> Waiting</div>
        <div class="legend-item"><span class="color-box" style="background-color: #FFFF00;"></span> Running</div>
        <div class="legend-item"><span class="color-box" style="background-color: #FF0000;"></span> Fail</div>
    </div>

    <form id='racks-form' method='POST' action='update_comments.php'>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Loc</th>
                        <th>Serial</th>
                        <th>WO</th>
                        <th>SKU</th>
                        <th>Model</th>
                        <th>Vis Insp</th>
                        <th>Power On</th>
                        <th>Stress</th>
                        <th>Diag</th>
                        <th>Valid</th>
                        <th>Preflight</th>
                        <th>Perf</th>
                        <th>Log</th>
                        <th>QA</th>
                        <th>Total Time</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Get racks for this bay
                    $query = "SELECT r.*, m.model_code, m.display_name as model_name, m.color_code
                             FROM racks r
                             LEFT JOIN rack_models m ON r.model_id = m.id
                             WHERE r.bay_number = $bay
                             ORDER BY r.location_code";
                    
                    $racks_result = mysqli_query($enlace, $query);
                    
                    if (!$racks_result) {
                        echo "<tr><td colspan='16' class='text-center text-danger'>Error loading racks: " . mysqli_error($enlace) . "</td></tr>";
                    } else {
                        while ($rack = mysqli_fetch_assoc($racks_result)):
                            
                            // Get test results for this rack
                            $test_query = "SELECT tr.*, tc.test_code, tc.test_name 
                                          FROM test_results tr
                                          JOIN test_catalog tc ON tr.test_code = tc.test_code
                                          WHERE tr.rack_id = {$rack['id']}
                                          ORDER BY tr.sequence_order";
                            $test_result = mysqli_query($enlace, $test_query);
                            
                            // Create associative array of test statuses
                            $tests = [];
                            while ($test = mysqli_fetch_assoc($test_result)) {
                                $tests[$test['test_code']] = $test;
                            }
                            
                            // Determine model class
                            $modelClass = 'model-available';
                            if ($rack['model_code'] == 'A') $modelClass = 'model-a';
                            elseif ($rack['model_code'] == 'B') $modelClass = 'model-b';
                            elseif ($rack['model_code'] == 'D') $modelClass = 'model-d';
                            
                            echo "<tr>";
                            
                            // Basic info columns
                            echo "<td class='fw-bold'>" . htmlspecialchars($rack['location_code'] ?? 'N/A') . "</td>";
                            echo "<td><a href='modals.php?pb=" . urlencode($rack['serial_number']) . "&tr=" . urlencode($rack['location_code']) . "' class='text-decoration-none'>" . 
                                 htmlspecialchars($rack['serial_number']) . "</a></td>";
                            echo "<td>" . htmlspecialchars($rack['work_order'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($rack['sku'] ?? '') . "</td>";
                            echo "<td class='$modelClass'>" . htmlspecialchars($rack['model_name'] ?? 'Available') . "</td>";
                            
                            // Test columns - in order
                            $test_order = ['visual_inspection', 'power_on_test', 'stress_test', 'diagnostic_test', 
                                          'validation_test', 'preflight_check', 'performance_test', 'log_upload', 'qa_release'];
                            
                            foreach ($test_order as $test_code) {
                                $test = $tests[$test_code] ?? null;
                                $status = $test['status'] ?? 'pending';
                                $class = 'test-pending';
                                
                                if ($status == 'pass') $class = 'test-pass';
                                elseif ($status == 'waiting') $class = 'test-waiting';
                                elseif ($status == 'running') $class = 'test-running';
                                elseif ($status == 'fail') $class = 'test-fail';
                                
                                echo "<td class='test-cell'><div class='$class' title='" . ucfirst($status) . "'></div></td>";
                            }
                            
                            // Calculate total time (from first test start to last test end or now)
                            $first_test = reset($tests);
                            $last_test = end($tests);
                            
                            $totalTime = formatTimeProgress(
                                $first_test['start_time'] ?? null,
                                $last_test['end_time'] ?? null
                            );
                            
                            echo "<td class='text-center'>" . $totalTime . "</td>";
                            
                            // Comments column
                            echo "<td>";
                            echo "<span contenteditable='true' id='comments_{$rack['id']}' class='d-inline-block w-100'>" . 
                                 htmlspecialchars($rack['comments'] ?? '') . "</span>";
                            echo "<input type='hidden' name='rack_ids[]' value='{$rack['id']}'>";
                            echo "</td>";
                            
                            echo "</tr>";
                        endwhile;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('[contenteditable="true"]').on('blur', function() {
            var fullId = $(this).attr('id');
            var id = fullId.split('_')[1];
            var value = $(this).text().trim();
            
            $.ajax({
                url: 'update_comments.php',
                type: 'POST',
                data: {
                    rack_id: id,
                    comment: value
                },
                success: function(response) {
                    console.log("Comment saved:", response);
                },
                error: function(xhr, status, error) {
                    console.error("Error saving comment:", error);
                }
            });
        });
    });
</script>

</body>
</html>