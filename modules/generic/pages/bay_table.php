<?php
require_once dirname(__DIR__) . '/bootstrap.php';

// Verify database connection
if (!isset($enlace)) {
    die("Error: No database connection");
}

// Function to format time progress - SOLO COLORES ORIGINALES
function formatTimeProgress($startTime, $endTime) {
    if (empty($startTime) || $startTime == 'Vacio') {
        // Si no hay start_time, mostrar "Not started" en gris
        return '<span class="badge bg-secondary">Not started</span>';
    }
    
    if (empty($endTime) || $endTime == 'Vacio') {
        $endTime = date('Y-m-d H:i:s');
    }
    
    try {
        $start = new DateTime($startTime);
        $end = new DateTime($endTime);
        $interval = $start->diff($end);
        
        // Formatear el texto del tiempo
        if ($interval->days > 0) {
            $time = $interval->format('%ad %hh %im');
        } elseif ($interval->h > 0) {
            $time = $interval->format('%hh %im');
        } elseif ($interval->i > 0) {
            $time = $interval->format('%im');
        } else {
            $time = '< 1m';
        }
        
        // Calcular total de minutos para decidir color
        $totalMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
        
        // SOLO COLORES ORIGINALES
        if ($totalMinutes < 60) {
            // Menos de 1 hora - Verde
            return '<span class="badge bg-success">' . $time . '</span>';
        } elseif ($totalMinutes < 180) {
            // Entre 1 y 3 horas - Naranja (usamos bg-warning que es naranja en Bootstrap)
            return '<span class="badge bg-warning text-dark">' . $time . '</span>';
        } else {
            // Más de 3 horas - Rojo
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
        
        /* =====================================================
           TITLE SEPARATOR - Navbar style (black with white text)
        ====================================================== */
        .section-title {
            background-color: #212529;
            padding: 15px 0;
            margin: 30px 0 20px 0;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .section-title h2 {
            color: white;
            font-size: 2em;
            font-weight: 500;
            margin: 0;
            padding: 0;
        }
        .section-title h2 i {
            color: white;
            margin-right: 15px;
            font-size: 0.9em;
        }
        
        .table {
            font-size: 13px;
            width: 100%;
            table-layout: fixed; /* Fija los anchos de columna */
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
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        /* =====================================================
           ANCHOS DE COLUMNA - Comments tiene más espacio
        ====================================================== */
        .col-loc { width: 45px; }      /* Loc */
        .col-serial { width: 100px; }   /* Serial */
        .col-wo { width: 70px; }        /* WO */
        .col-sku { width: 70px; }       /* SKU */
        .col-model { width: 80px; }     /* Model */
        .col-test { width: 35px; }      /* Cada columna de test */
        .col-time { width: 80px; }      /* Total Time */
        .col-comments { width: 200px; }  /* Comments - MÁS ESPACIO */
        
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
        
        /* Editable comments - AHORA MÁS ANCHO */
        [contenteditable="true"] {
            background-color: #fff9e6;
            padding: 4px 6px;
            border-radius: 4px;
            width: 100%;
            display: block;
            cursor: text;
            font-size: 12px;
            white-space: normal;
            word-break: break-word;
            min-width: 180px;
            max-width: 100%;
        }
        [contenteditable="true"]:hover {
            background-color: #fff3cd;
        }
        [contenteditable="true"]:focus {
            background-color: #fff;
            outline: 2px solid #2574A9;
        }
        
        /* Legend styles */
        .legend-container {
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
        }
        .legend-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            padding: 8px 15px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        .legend-row:first-child {
            border-radius: 8px 8px 0 0;
            border-bottom: none;
        }
        .legend-row:last-child {
            border-radius: 0 0 8px 8px;
        }
        .legend-label {
            font-weight: bold;
            min-width: 70px;
            color: #333;
        }
        .legend-items {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 10px;
            border-radius: 4px;
            font-weight: 500;
        }
        .legend-item.model-a {
            background-color: #2574A9;
            color: white;
        }
        .legend-item.model-b {
            background-color: #049372;
            color: white;
        }
        .legend-item.model-d {
            background-color: #e26715;
            color: white;
        }
        .legend-item.model-available {
            background-color: #3e3e3e;
            color: white;
        }
        .legend-item.status {
            background-color: transparent;
            padding: 4px 0;
        }
        .status-box {
            width: 20px;
            height: 20px;
            border: 1px solid #6c757d;
            display: inline-block;
        }
        .status-pass { background-color: #008000; }
        .status-waiting { background-color: #f7a307; }
        .status-running { background-color: #FFFF00; }
        .status-fail { background-color: #FF0000; }
        
        /* Time badge colors - SOLO LOS COLORES ORIGINALES */
        .badge.bg-success { background-color: #008000 !important; }
        .badge.bg-warning { background-color: #f7a307 !important; color: black !important; }
        .badge.bg-danger { background-color: #FF0000 !important; }
        .badge.bg-secondary { background-color: #6c757d !important; }
    </style>
</head>
<body>

<div class="container-fluid py-2">
    <!-- =====================================================
         COLOR LEGEND - SOLO COLORES ORIGINALES
    ====================================================== -->
    <div class="legend-container">
        <!-- First row: Models -->
        <div class="legend-row">
            <span class="legend-label">Models:</span>
            <div class="legend-items">
                <span class="legend-item model-a"><i class="fas fa-server me-1"></i>Model A</span>
                <span class="legend-item model-b"><i class="fas fa-server me-1"></i>Model B</span>
                <span class="legend-item model-d"><i class="fas fa-server me-1"></i>Model D</span>
                <span class="legend-item model-available"><i class="fas fa-server me-1"></i>Available</span>
            </div>
        </div>
        
        <!-- Second row: Status - SOLO WAITING, RUNNING, FAIL, PASS -->
        <div class="legend-row">
            <span class="legend-label">Status:</span>
            <div class="legend-items">
                <span class="legend-item status">
                    <span class="status-box status-pass"></span> Pass
                </span>
                <span class="legend-item status">
                    <span class="status-box status-waiting"></span> Waiting
                </span>
                <span class="legend-item status">
                    <span class="status-box status-running"></span> Running
                </span>
                <span class="legend-item status">
                    <span class="status-box status-fail"></span> Fail
                </span>
            </div>
        </div>
    </div>

    <!-- =====================================================
         TITLE SEPARATOR - Navbar style
    ====================================================== -->
    <div class="section-title">
        <h2><i class="fas fa-clipboard-list"></i>JR Bay <?php echo $bay; ?> Table</h2>
    </div>

    <form id='racks-form' method='POST' action='update_comments.php'>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col-loc">Loc</th>
                        <th class="col-serial">Serial</th>
                        <th class="col-wo">WO</th>
                        <th class="col-sku">SKU</th>
                        <th class="col-model">Model</th>
                        <th class="col-test">Vis Insp</th>
                        <th class="col-test">Power On</th>
                        <th class="col-test">Stress</th>
                        <th class="col-test">Diag</th>
                        <th class="col-test">Valid</th>
                        <th class="col-test">Preflight</th>
                        <th class="col-test">Perf</th>
                        <th class="col-test">Log</th>
                        <th class="col-test">QA</th>
                        <th class="col-time">Total Time</th>
                        <th class="col-comments">Comments</th>
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
                            echo "<td class='fw-bold col-loc'>" . htmlspecialchars($rack['location_code'] ?? 'N/A') . "</td>";
                            echo "<td class='col-serial'><a href='modals.php?pb=" . urlencode($rack['serial_number']) . "&tr=" . urlencode($rack['location_code']) . "' class='text-decoration-none'>" . 
                                 htmlspecialchars($rack['serial_number']) . "</a></td>";
                            echo "<td class='col-wo'>" . htmlspecialchars($rack['work_order'] ?? '') . "</td>";
                            echo "<td class='col-sku'>" . htmlspecialchars($rack['sku'] ?? '') . "</td>";
                            echo "<td class='$modelClass col-model'>" . htmlspecialchars($rack['model_name'] ?? 'Available') . "</td>";
                            
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
                                
                                echo "<td class='test-cell col-test'><div class='$class' title='" . ucfirst($status) . "'></div></td>";
                            }
                            
                            // Calculate total time (from first test start to last test end or now)
                            $first_test = reset($tests);
                            $last_test = end($tests);
                            
                            // Si el primer test tiene start_time, usarlo, si no usar created_at del rack
                            $startTime = $first_test['start_time'] ?? $rack['created_at'];
                            
                            $totalTime = formatTimeProgress(
                                $startTime,
                                $last_test['end_time'] ?? null
                            );
                            
                            echo "<td class='text-center col-time'>" . $totalTime . "</td>";
                            
                            // Comments column - CON MÁS ESPACIO
                            echo "<td class='col-comments'>";
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