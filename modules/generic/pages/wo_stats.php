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

// Obtener el WO de la URL o POST
$wo = isset($_GET['wo']) ? $_GET['wo'] : (isset($_POST['WO']) ? $_POST['WO'] : '');

if (empty($wo)) {
    header("Location: stats.php");
    exit;
}

$wo = mysqli_real_escape_string($enlace, $wo);

// Función para formatear tiempo
function formatTime($seconds) {
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
                    COUNT(DISTINCT tr.rack_id) as racks_with_tests,
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
                    r.id,
                    r.serial_number,
                    r.location_code,
                    r.sku,
                    m.model_code,
                    m.display_name as model_name,
                    COUNT(DISTINCT tr.id) as total_tests,
                    SUM(CASE WHEN tr.status = 'pass' THEN 1 ELSE 0 END) as passed_tests,
                    SUM(CASE WHEN tr.status = 'fail' THEN 1 ELSE 0 END) as failed_tests,
                    MIN(tr.start_time) as first_test_time,
                    MAX(tr.end_time) as last_test_time,
                    TIMESTAMPDIFF(SECOND, MIN(tr.start_time), MAX(tr.end_time)) as total_time_seconds
                FROM racks r
                LEFT JOIN rack_models m ON r.model_id = m.id
                LEFT JOIN test_results tr ON r.id = tr.rack_id
                WHERE r.work_order = '$wo'
                GROUP BY r.id
                ORDER BY r.location_code";

$racks = mysqli_query($enlace, $racks_query);

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

// Obtener distribución de estados de pruebas
$test_status_query = "SELECT 
                        tr.status,
                        COUNT(*) as count
                      FROM test_results tr
                      JOIN racks r ON tr.rack_id = r.id
                      WHERE r.work_order = '$wo'
                      GROUP BY tr.status";

$test_status = mysqli_query($enlace, $test_status_query);
$status_counts = ['pass' => 0, 'fail' => 0, 'waiting' => 0, 'running' => 0, 'pending' => 0];
while ($status = mysqli_fetch_assoc($test_status)) {
    $status_counts[$status['status']] = $status['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WO Statistics - <?php echo $wo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Chart.js for graphics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Original styles -->
    <link rel="stylesheet" href="/Statuspb/public/css/style.css">
    <link rel="stylesheet" href="/Statuspb/public/css/default.css">
    <link rel="shortcut icon" href="/Statuspb/public/img/checkicon.png">
    
    <style>
        /* Navbar styles */
        nav.navbar { margin-top: 0 !important; }

        nav.navbar ul,
        nav.navbar .navbar-nav,
        nav.navbar .dropdown-menu {
            background-color: transparent !important;
            overflow: visible !important;
            list-style: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        nav.navbar .nav-item,
        nav.navbar .dropdown-menu li {
            display: list-item !important;
        }

        /* Glassmorphism Navbar */
        nav.navbar {
            background: rgba(0, 0, 0, 0.82) !important;
            backdrop-filter: blur(16px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(16px) saturate(180%) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.3) !important;
        }
        nav.navbar .nav-link {
            color: rgba(255, 255, 255, 0.82) !important;
        }
        nav.navbar .nav-link:hover {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.10) !important;
        }
        nav.navbar .dropdown-menu {
            background: rgba(22, 32, 44, 0.88) !important;
            backdrop-filter: blur(20px) saturate(160%) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
        }
        nav.navbar .dropdown-item {
            color: rgba(255, 255, 255, 0.80) !important;
        }
        nav.navbar .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.12) !important;
            color: #ffffff !important;
        }
        
        /* Page specific styles */
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
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            height: 100%;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .stat-icon {
            font-size: 40px;
            color: #2574A9;
            margin-bottom: 15px;
        }
        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }
        .stat-label {
            font-size: 14px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .model-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .model-a { background-color: #2574A9; color: white; }
        .model-b { background-color: #049372; color: white; }
        .model-d { background-color: #e26715; color: white; }
        .model-default { background-color: #3e3e3e; color: white; }
        
        .status-badge {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
        }
        .status-pass { background-color: #008000; color: white; }
        .status-fail { background-color: #FF0000; color: white; }
        .status-waiting { background-color: #f7a307; color: black; }
        .status-running { background-color: #FFFF00; color: black; }
        .status-pending { background-color: #6c757d; color: white; }
        
        .admin-button {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            background-color: #2574A9;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
        }
        .admin-button:hover {
            background-color: #1a5a8c;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            transform: translateY(-2px);
            color: white;
        }
        
        .export-btn {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 9998;
        }
        
        header a h1,
        header a h1 i,
        header a h1 i.fa,
        header a h1 i.fa-server {
            color: white !important;
        }
    </style>
</head>
<body class="desarroll">

<!-- Admin floating button (only for level 99) -->
<?php if (isset($_SESSION['Nombre']) && $_SESSION['Nivel'] == 99): ?>
<a href="admin_panel.php" class="admin-button" title="General Administration Panel">
    <i class="fas fa-user-cog"></i>
    <span>Admin</span>
    <span class="badge-admin">Gral</span>
</a>
<?php endif; ?>

<!-- Export button -->
<a href="export_wo.php?wo=<?php echo urlencode($wo); ?>" class="export-btn btn btn-success">
    <i class="fas fa-file-excel me-2"></i>Export to Excel
</a>

<!-- HEADER -->
<header style="background-image: url('/Statuspb/public/img/try6.jpg');">
    <div class="grupo">
        <div class="caja">
            <div class="container">
                <header class="clearfix header2">
                    <span>Testing Engineering</span>
                    <a href="index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Test Dashboard</h1></a>

                    <?php if(isset($_SESSION['Nombre'])): ?>
                    <div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;">
                        <p class="info" title="">
                            <?php echo $_SESSION["Nombre"]; ?>
                            <span>Clock number: <?php echo $_SESSION["No_Reloj"]; ?><br>Shift: <?php echo $_SESSION['Turno']; ?>&deg;</span>
                        </p>
                    </div>
                    <?php endif; ?>
                </header>
            </div>
        </div>
    </div>
</header>

<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-xl px-0">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-home me-1"></i>Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 1</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="bay1.php">Bay 1</a></li>
                        <li><a class="dropdown-item" href="bay2.php">Bay 2</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 2</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="bay3.php">Bay 3</a></li>
                        <li><a class="dropdown-item" href="bay4.php">Bay 4</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 3</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="bay5.php">Bay 5</a></li>
                        <li><a class="dropdown-item" href="bay6.php">Bay 6</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 4</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="bay7.php">Bay 7</a></li>
                        <li><a class="dropdown-item" href="bay8.php">Bay 8</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 5</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="bay9.php">Bay 9</a></li>
                        <li><a class="dropdown-item" href="bay10.php">Bay 10</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="stats.php"><i class="fas fa-chart-line me-1"></i>Times</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="status.php"><i class="fas fa-chart-bar me-1"></i>General Status</a>
                </li>
                <li class="nav-item ms-lg-3 ps-lg-3" style="border-left:1px solid rgba(255,255,255,0.15)">
                    <a class="nav-link text-danger" href="logout.php"><i class="fas fa-right-from-bracket me-1"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main content -->
<div class="container-fluid py-4">
    <!-- Page title with WO -->
    <div class="section-title">
        <h2><i class="fas fa-chart-line"></i>WORK ORDER STATISTICS: <?php echo $wo; ?></h2>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="stat-card text-center">
                <div class="stat-icon"><i class="fas fa-boxes"></i></div>
                <div class="stat-value"><?php echo $wo_data['total_racks'] ?? 0; ?></div>
                <div class="stat-label">Total Racks</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card text-center">
                <div class="stat-icon"><i class="fas fa-check-circle text-success"></i></div>
                <div class="stat-value"><?php echo $wo_data['racks_with_tests'] ?? 0; ?></div>
                <div class="stat-label">Racks with Tests</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card text-center">
                <div class="stat-icon"><i class="fas fa-clock"></i></div>
                <div class="stat-value"><?php echo $wo_data['avg_test_time'] ? formatTime($wo_data['avg_test_time']) : 'N/A'; ?></div>
                <div class="stat-label">Avg Test Time</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card text-center">
                <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
                <div class="stat-value" style="font-size: 18px;">
                    <?php echo $wo_data['first_test'] ? date('m/d H:i', strtotime($wo_data['first_test'])) : 'N/A'; ?>
                </div>
                <div class="stat-label">First Test</div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-chart-pie me-2"></i>Test Status Distribution
                </div>
                <div class="card-body">
                    <canvas id="statusChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-chart-bar me-2"></i>Average Time by Model
                </div>
                <div class="card-body">
                    <canvas id="modelChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Model Statistics -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-cubes me-2"></i>Statistics by Model
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Model</th>
                                    <th>Rack Count</th>
                                    <th>Average Test Time</th>
                                    <th>Performance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($model = mysqli_fetch_assoc($model_stats)): ?>
                                <tr>
                                    <td>
                                        <span class="model-badge <?php 
                                            echo $model['model_code'] == 'A' ? 'model-a' : 
                                                ($model['model_code'] == 'B' ? 'model-b' : 
                                                ($model['model_code'] == 'D' ? 'model-d' : 'model-default')); 
                                        ?>">
                                            <?php echo $model['model_name'] ?: 'Unknown'; ?>
                                        </span>
                                    </td>
                                    <td><strong><?php echo $model['rack_count']; ?></strong></td>
                                    <td><?php echo $model['avg_test_time'] ? formatTime($model['avg_test_time']) : 'N/A'; ?></td>
                                    <td>
                                        <?php
                                        if ($model['avg_test_time']) {
                                            $avg = $model['avg_test_time'];
                                            if ($avg < 1800) { // Less than 30 minutes
                                                echo '<span class="badge bg-success">Fast</span>';
                                            } elseif ($avg < 3600) { // 30-60 minutes
                                                echo '<span class="badge bg-warning text-dark">Normal</span>';
                                            } else { // More than 60 minutes
                                                echo '<span class="badge bg-danger">Slow</span>';
                                            }
                                        } else {
                                            echo '<span class="badge bg-secondary">N/A</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Racks Detail Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-server me-2"></i>Racks Detail
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="racksTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>Location</th>
                                    <th>Serial Number</th>
                                    <th>Model</th>
                                    <th>SKU</th>
                                    <th>Tests</th>
                                    <th>Pass/Fail</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Total Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total_time_all = 0;
                                $rack_count = 0;
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                    $rack_count++;
                                    if ($rack['total_time_seconds']) $total_time_all += $rack['total_time_seconds'];
                                ?>
                                <tr>
                                    <td><strong><?php echo $rack['location_code'] ?: 'N/A'; ?></strong></td>
                                    <td>
                                        <a href="modals.php?pb=<?php echo urlencode($rack['serial_number']); ?>&tr=<?php echo urlencode($rack['location_code']); ?>" class="text-decoration-none">
                                            <?php echo $rack['serial_number']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="model-badge <?php 
                                            echo $rack['model_code'] == 'A' ? 'model-a' : 
                                                ($rack['model_code'] == 'B' ? 'model-b' : 
                                                ($rack['model_code'] == 'D' ? 'model-d' : 'model-default')); 
                                        ?>">
                                            <?php echo $rack['model_name'] ?: 'Unknown'; ?>
                                        </span>
                                    </td>
                                    <td><?php echo $rack['sku'] ?: '-'; ?></td>
                                    <td><?php echo $rack['total_tests'] ?: 0; ?></td>
                                    <td>
                                        <?php if ($rack['total_tests'] > 0): ?>
                                            <span class="badge bg-success me-1">P: <?php echo $rack['passed_tests']; ?></span>
                                            <span class="badge bg-danger">F: <?php echo $rack['failed_tests']; ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">No tests</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $rack['first_test_time'] ? date('m-d H:i', strtotime($rack['first_test_time'])) : '-'; ?></td>
                                    <td><?php echo $rack['last_test_time'] ? date('m-d H:i', strtotime($rack['last_test_time'])) : '-'; ?></td>
                                    <td>
                                        <?php 
                                        if ($rack['total_time_seconds']) {
                                            $time = formatTime($rack['total_time_seconds']);
                                            if ($rack['total_time_seconds'] < 1800) {
                                                echo '<span class="badge bg-success">' . $time . '</span>';
                                            } elseif ($rack['total_time_seconds'] < 3600) {
                                                echo '<span class="badge bg-warning text-dark">' . $time . '</span>';
                                            } else {
                                                echo '<span class="badge bg-danger">' . $time . '</span>';
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot class="table-secondary">
                                <tr>
                                    <td colspan="8" class="text-end"><strong>Total Racks:</strong></td>
                                    <td><strong><?php echo $rack_count; ?></strong></td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="text-end"><strong>Average Time per Rack:</strong></td>
                                    <td>
                                        <strong>
                                        <?php 
                                        if ($rack_count > 0 && $total_time_all > 0) {
                                            echo formatTime($total_time_all / $rack_count);
                                        } else {
                                            echo 'N/A';
                                        }
                                        ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back button -->
<a href="stats.php" class="btn btn-secondary" style="position: fixed; bottom: 20px; left: 20px; z-index: 9999;">
    <i class="fas fa-arrow-left me-2"></i>Back to Stats
</a>

<!-- Manual link -->
<a href="manual.php#wo_stats" class="btn btn-dark" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    <i class="fas fa-question-circle me-2"></i>Help
</a>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Charts initialization -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Status Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'pie',
        data: {
            labels: ['Pass', 'Fail', 'Waiting', 'Running', 'Pending'],
            datasets: [{
                data: [
                    <?php echo $status_counts['pass']; ?>,
                    <?php echo $status_counts['fail']; ?>,
                    <?php echo $status_counts['waiting']; ?>,
                    <?php echo $status_counts['running']; ?>,
                    <?php echo $status_counts['pending']; ?>
                ],
                backgroundColor: [
                    '#008000',
                    '#FF0000',
                    '#f7a307',
                    '#FFFF00',
                    '#6c757d'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Model Chart
    <?php 
    mysqli_data_seek($model_stats, 0);
    $model_labels = [];
    $model_times = [];
    while ($model = mysqli_fetch_assoc($model_stats)) {
        if ($model['avg_test_time']) {
            $model_labels[] = $model['model_name'] ?: 'Unknown';
            $model_times[] = round($model['avg_test_time'] / 60, 1); // Convert to minutes
        }
    }
    ?>
    
    if (<?php echo count($model_labels); ?> > 0) {
        const modelCtx = document.getElementById('modelChart').getContext('2d');
        new Chart(modelCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($model_labels); ?>,
                datasets: [{
                    label: 'Average Time (minutes)',
                    data: <?php echo json_encode($model_times); ?>,
                    backgroundColor: '#2574A9',
                    borderColor: '#1a5a8c',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Minutes'
                        }
                    }
                }
            }
        });
    } else {
        document.getElementById('modelChart').parentNode.innerHTML = '<div class="text-center p-5"><i class="fas fa-chart-bar fa-3x text-muted mb-3"></i><p class="text-muted">No model data available</p></div>';
    }
});
</script>

<!-- Optional: Add DataTables for better table interaction -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#racksTable').DataTable({
        pageLength: 25,
        order: [[0, 'asc']],
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ racks",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });
});
</script>

</body>
</html>