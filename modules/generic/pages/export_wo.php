<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Ruta correcta al bootstrap.php
require_once dirname(__DIR__) . '/bootstrap.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['Nombre'])) {
    header("Location: index.php");
    exit;
}

// Obtener el WO de la URL
$wo = isset($_GET['wo']) ? $_GET['wo'] : '';

if (empty($wo)) {
    header("Location: stats.php");
    exit;
}

$wo = mysqli_real_escape_string($enlace, $wo);

// Función para formatear tiempo
function formatTimeForExport($seconds) {
    if ($seconds < 60) {
        return round($seconds) . ' sec';
    } elseif ($seconds < 3600) {
        $minutes = floor($seconds / 60);
        $secs = $seconds % 60;
        return $minutes . ' min ' . $secs . ' sec';
    } else {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        return $hours . ' hr ' . $minutes . ' min';
    }
}

// Obtener información general del WO
$wo_info_query = "SELECT 
                    COUNT(DISTINCT r.id) as total_racks,
                    MIN(tr.start_time) as first_test,
                    MAX(tr.end_time) as last_test,
                    AVG(CASE 
                        WHEN tr.end_time IS NOT NULL AND tr.start_time IS NOT NULL 
                        THEN TIMESTAMPDIFF(SECOND, tr.start_time, tr.end_time)
                        ELSE NULL 
                    END) as avg_test_time
                  FROM racks r
                  LEFT JOIN test_results tr ON r.id = tr.rack_id
                  WHERE r.work_order = '$wo'";

$wo_info = mysqli_query($enlace, $wo_info_query);
$wo_data = mysqli_fetch_assoc($wo_info);

// Obtener racks con sus tiempos
$racks_query = "SELECT 
                    r.serial_number,
                    r.location_code,
                    r.sku,
                    r.comments,
                    m.model_code,
                    m.display_name as model_name,
                    COUNT(DISTINCT tr.id) as total_tests,
                    SUM(CASE WHEN tr.status = 'pass' THEN 1 ELSE 0 END) as passed_tests,
                    SUM(CASE WHEN tr.status = 'fail' THEN 1 ELSE 0 END) as failed_tests,
                    SUM(CASE WHEN tr.status = 'waiting' THEN 1 ELSE 0 END) as waiting_tests,
                    SUM(CASE WHEN tr.status = 'running' THEN 1 ELSE 0 END) as running_tests,
                    SUM(CASE WHEN tr.status = 'pending' THEN 1 ELSE 0 END) as pending_tests,
                    MIN(tr.start_time) as first_test_time,
                    MAX(tr.end_time) as last_test_time,
                    TIMESTAMPDIFF(SECOND, MIN(tr.start_time), MAX(tr.end_time)) as total_time_seconds,
                    GROUP_CONCAT(DISTINCT CONCAT(tr.test_code, ':', tr.status) SEPARATOR ' | ') as test_statuses
                FROM racks r
                LEFT JOIN rack_models m ON r.model_id = m.id
                LEFT JOIN test_results tr ON r.id = tr.rack_id
                WHERE r.work_order = '$wo'
                GROUP BY r.id
                ORDER BY r.location_code";

$racks = mysqli_query($enlace, $racks_query);

// Obtener distribución de estados de pruebas
$test_status_query = "SELECT 
                        tr.status,
                        COUNT(*) as count
                      FROM test_results tr
                      JOIN racks r ON tr.rack_id = r.id
                      WHERE r.work_order = '$wo'
                      GROUP BY tr.status";

$test_status = mysqli_query($enlace, $test_status_query);

// Obtener estadísticas por modelo
$model_stats_query = "SELECT 
                        m.model_code,
                        m.display_name as model_name,
                        COUNT(DISTINCT r.id) as rack_count,
                        AVG(CASE 
                            WHEN tr.end_time IS NOT NULL AND tr.start_time IS NOT NULL 
                            THEN TIMESTAMPDIFF(SECOND, tr.start_time, tr.end_time)
                            ELSE NULL 
                        END) as avg_test_time
                      FROM racks r
                      LEFT JOIN rack_models m ON r.model_id = m.id
                      LEFT JOIN test_results tr ON r.id = tr.rack_id
                      WHERE r.work_order = '$wo'
                      GROUP BY m.id";

$model_stats = mysqli_query($enlace, $model_stats_query);

// Nombre del archivo
$filename = "WO_Statistics_" . $wo . "_" . date('Y-m-d') . ".xls";

// Headers para descargar como Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

// Iniciar el contenido del archivo
echo '<html>';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<title>WO Statistics: ' . $wo . '</title>';
echo '<style>';
echo 'th { background-color: #2574A9; color: white; font-weight: bold; text-align: center; }';
echo 'td { text-align: left; }';
echo '.pass { background-color: #008000; color: white; }';
echo '.fail { background-color: #FF0000; color: white; }';
echo '.waiting { background-color: #f7a307; }';
echo '.running { background-color: #FFFF00; }';
echo '.pending { background-color: #6c757d; color: white; }';
echo '.model-a { background-color: #2574A9; color: white; }';
echo '.model-b { background-color: #049372; color: white; }';
echo '.model-d { background-color: #e26715; color: white; }';
echo '.model-default { background-color: #3e3e3e; color: white; }';
echo '</style>';
echo '</head>';
echo '<body>';

// Título
echo '<h1 style="text-align: center;">WORK ORDER STATISTICS: ' . $wo . '</h1>';
echo '<p style="text-align: center;">Generated on: ' . date('Y-m-d H:i:s') . '</p>';
echo '<p style="text-align: center;">Generated by: ' . $_SESSION['Nombre'] . ' (Clock: ' . $_SESSION['No_Reloj'] . ')</p>';
echo '<br>';

// Resumen General
echo '<h2>General Summary</h2>';
echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr>';
echo '<th>Total Racks</th>';
echo '<th>First Test</th>';
echo '<th>Last Test</th>';
echo '<th>Average Test Time</th>';
echo '</tr>';
echo '<tr>';
echo '<td align="center">' . ($wo_data['total_racks'] ?? 0) . '</td>';
echo '<td align="center">' . ($wo_data['first_test'] ? date('Y-m-d H:i:s', strtotime($wo_data['first_test'])) : 'N/A') . '</td>';
echo '<td align="center">' . ($wo_data['last_test'] ? date('Y-m-d H:i:s', strtotime($wo_data['last_test'])) : 'N/A') . '</td>';
echo '<td align="center">' . ($wo_data['avg_test_time'] ? formatTimeForExport($wo_data['avg_test_time']) : 'N/A') . '</td>';
echo '</tr>';
echo '</table>';
echo '<br><br>';

// Test Status Distribution
echo '<h2>Test Status Distribution</h2>';
echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr><th>Status</th><th>Count</th></tr>';
$total_tests = 0;
while ($status = mysqli_fetch_assoc($test_status)) {
    $total_tests += $status['count'];
    $class = $status['status'];
    echo '<tr>';
    echo '<td class="' . $class . '">' . strtoupper($status['status']) . '</td>';
    echo '<td align="center">' . $status['count'] . '</td>';
    echo '</tr>';
}
echo '<tr><th>Total</th><th align="center">' . $total_tests . '</th></tr>';
echo '</table>';
echo '<br><br>';

// Model Statistics
echo '<h2>Statistics by Model</h2>';
echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr>';
echo '<th>Model</th>';
echo '<th>Rack Count</th>';
echo '<th>Average Test Time</th>';
echo '</tr>';

mysqli_data_seek($model_stats, 0);
while ($model = mysqli_fetch_assoc($model_stats)) {
    $model_class = 'model-default';
    if ($model['model_code'] == 'A') $model_class = 'model-a';
    elseif ($model['model_code'] == 'B') $model_class = 'model-b';
    elseif ($model['model_code'] == 'D') $model_class = 'model-d';
    
    echo '<tr>';
    echo '<td class="' . $model_class . '">' . ($model['model_name'] ?: 'Unknown') . '</td>';
    echo '<td align="center">' . $model['rack_count'] . '</td>';
    echo '<td align="center">' . ($model['avg_test_time'] ? formatTimeForExport($model['avg_test_time']) : 'N/A') . '</td>';
    echo '</tr>';
}
echo '</table>';
echo '<br><br>';

// Racks Detail
echo '<h2>Racks Detail</h2>';
echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr>';
echo '<th>Location</th>';
echo '<th>Serial Number</th>';
echo '<th>Model</th>';
echo '<th>SKU</th>';
echo '<th>Total Tests</th>';
echo '<th>Pass/Fail/Wait/Run/Pend</th>';
echo '<th>Start Time</th>';
echo '<th>End Time</th>';
echo '<th>Total Time</th>';
echo '<th>Comments</th>';
echo '<th>Test Details</th>';
echo '</tr>';

$total_time_all = 0;
$rack_count = 0;

mysqli_data_seek($racks, 0);
while ($rack = mysqli_fetch_assoc($racks)) {
    $rack_count++;
    if ($rack['total_time_seconds']) $total_time_all += $rack['total_time_seconds'];
    
    $model_class = 'model-default';
    if ($rack['model_code'] == 'A') $model_class = 'model-a';
    elseif ($rack['model_code'] == 'B') $model_class = 'model-b';
    elseif ($rack['model_code'] == 'D') $model_class = 'model-d';
    
    echo '<tr>';
    echo '<td><strong>' . ($rack['location_code'] ?: 'N/A') . '</strong></td>';
    echo '<td>' . $rack['serial_number'] . '</td>';
    echo '<td class="' . $model_class . '">' . ($rack['model_name'] ?: 'Unknown') . '</td>';
    echo '<td>' . ($rack['sku'] ?: '-') . '</td>';
    echo '<td align="center">' . ($rack['total_tests'] ?: 0) . '</td>';
    echo '<td align="center">';
    echo 'P:' . ($rack['passed_tests'] ?: 0) . ' ';
    echo 'F:' . ($rack['failed_tests'] ?: 0) . ' ';
    echo 'W:' . ($rack['waiting_tests'] ?: 0) . ' ';
    echo 'R:' . ($rack['running_tests'] ?: 0) . ' ';
    echo 'P:' . ($rack['pending_tests'] ?: 0);
    echo '</td>';
    echo '<td>' . ($rack['first_test_time'] ? date('Y-m-d H:i:s', strtotime($rack['first_test_time'])) : '-') . '</td>';
    echo '<td>' . ($rack['last_test_time'] ? date('Y-m-d H:i:s', strtotime($rack['last_test_time'])) : '-') . '</td>';
    echo '<td align="center">' . ($rack['total_time_seconds'] ? formatTimeForExport($rack['total_time_seconds']) : '-') . '</td>';
    echo '<td>' . ($rack['comments'] ?: '') . '</td>';
    echo '<td><small>' . ($rack['test_statuses'] ?: 'No tests') . '</small></td>';
    echo '</tr>';
}

// Fila de totales
echo '<tr style="background-color: #f0f0f0; font-weight: bold;">';
echo '<td colspan="8" align="right">Total Racks:</td>';
echo '<td align="center">' . $rack_count . '</td>';
echo '<td colspan="2"></td>';
echo '</tr>';

if ($rack_count > 0 && $total_time_all > 0) {
    $avg_time = $total_time_all / $rack_count;
    echo '<tr style="background-color: #f0f0f0; font-weight: bold;">';
    echo '<td colspan="8" align="right">Average Time per Rack:</td>';
    echo '<td align="center">' . formatTimeForExport($avg_time) . '</td>';
    echo '<td colspan="2"></td>';
    echo '</tr>';
}

echo '</table>';
echo '<br>';

// Información adicional
echo '<h3>Additional Information</h3>';
echo '<ul>';
echo '<li><strong>Export Date:</strong> ' . date('Y-m-d H:i:s') . '</li>';
echo '<li><strong>Exported by:</strong> ' . $_SESSION['Nombre'] . ' (Clock: ' . $_SESSION['No_Reloj'] . ')</li>';
echo '<li><strong>Work Order:</strong> ' . $wo . '</li>';
echo '</ul>';

echo '</body>';
echo '</html>';
?>