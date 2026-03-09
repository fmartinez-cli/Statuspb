<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Ruta correcta al bootstrap.php (está en modules/generic/)
require_once __DIR__ . '/modules/generic/bootstrap.php';

// Obtener estadísticas generales para el dashboard
$total_racks = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) as count FROM racks"))['count'];
$active_racks = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) as count FROM racks WHERE work_order IS NOT NULL AND work_order != ''"))['count'];
$total_racks_today = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) as count FROM racks WHERE DATE(created_at) = CURDATE()"))['count'];
$total_users = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) as count FROM users WHERE is_active = 1"))['count'];

// Obtener racks activos recientes
$recent_racks = mysqli_query($enlace, "SELECT r.serial_number, r.location_code, r.work_order, 
                                              r.created_at, m.model_code, m.display_name as model_name
                                       FROM racks r
                                       LEFT JOIN rack_models m ON r.model_id = m.id
                                       WHERE r.work_order IS NOT NULL AND r.work_order != ''
                                       ORDER BY r.created_at DESC
                                       LIMIT 10");

// Obtener últimas pruebas
$recent_tests = mysqli_query($enlace, "SELECT tr.*, r.serial_number, r.location_code, 
                                              tc.test_name
                                       FROM test_results tr
                                       JOIN racks r ON tr.rack_id = r.id
                                       JOIN test_catalog tc ON tr.test_code = tc.test_code
                                       ORDER BY tr.end_time DESC
                                       LIMIT 10");

// Incluir el header y navbar desde el index de pages para mantener consistencia
// Pero como ya tenemos todo el HTML aquí, no es necesario incluir el otro archivo
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Dashboard - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Original styles - rutas corregidas -->
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
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3.5em;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2em;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            height: 100%;
            text-align: center;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .stat-icon {
            font-size: 48px;
            color: #2574A9;
            margin-bottom: 15px;
        }
        .stat-value {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }
        .stat-label {
            font-size: 16px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .bay-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        .bay-card {
            background: linear-gradient(135deg, #2574A9, #1a5a8c);
            color: white;
            padding: 20px 10px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            transition: transform 0.3s;
        }
        .bay-card:hover {
            transform: scale(1.05);
            color: white;
        }
        .bay-card i {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .bay-card span {
            font-size: 18px;
            font-weight: bold;
        }
        
        .model-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
            color: white;
        }
        .model-a { background-color: #2574A9; }
        .model-b { background-color: #049372; }
        .model-d { background-color: #e26715; }
        .model-default { background-color: #3e3e3e; }
        
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
        }
        .admin-button:hover {
            background-color: #1a5a8c;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            transform: translateY(-2px);
            color: white;
        }
        
        header a h1,
        header a h1 i,
        header a h1 i.fa,
        header a h1 i.fa-server {
            color: white !important;
        }
        
        .login-modal {
            display: none;
        }
        .login-modal:target {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
        }
        
        /* Corregir rutas de imágenes */
        header[style*="background-image"] {
            background-image: url('/Statuspb/public/img/try6.jpg') !important;
        }
    </style>
</head>
<body class="desarroll">

<!-- Admin floating button (only for level 99) -->
<?php if (isset($_SESSION['Nombre']) && $_SESSION['Nivel'] == 99): ?>
<a href="/Statuspb/modules/generic/pages/admin_panel.php" class="admin-button" title="General Administration Panel">
    <i class="fas fa-user-cog"></i>
    <span>Admin</span>
    <span class="badge-admin">Gral</span>
</a>
<?php endif; ?>

<!-- HEADER -->
<header style="background-image: url('/Statuspb/public/img/try6.jpg');">
    <div class="grupo">
        <div class="caja">
            <div class="container">
                <header class="clearfix header2">
                    <span>Testing Engineering</span>
                    <a href="/Statuspb/"><h1><i class="fa fa-server" aria-hidden="true"></i> Test Dashboard</h1></a>

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

<!-- Navigation menu - rutas corregidas -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-xl px-0">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/Statuspb/"><i class="fas fa-home me-1"></i>Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 1</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay1.php">Bay 1</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay2.php">Bay 2</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 2</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay3.php">Bay 3</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay4.php">Bay 4</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 3</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay5.php">Bay 5</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay6.php">Bay 6</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 4</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay7.php">Bay 7</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay8.php">Bay 8</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Line 5</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay9.php">Bay 9</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay10.php">Bay 10</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Statuspb/modules/generic/pages/stats.php"><i class="fas fa-chart-line me-1"></i>Times</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Statuspb/modules/generic/pages/status.php"><i class="fas fa-chart-bar me-1"></i>General Status</a>
                </li>
                <li class="nav-item ms-lg-3 ps-lg-3" style="border-left:1px solid rgba(255,255,255,0.15)">
                    <?php if(isset($_SESSION['Nombre'])): ?>
                    <a class="nav-link text-danger" href="/Statuspb/modules/generic/pages/logout.php"><i class="fas fa-right-from-bracket me-1"></i>Logout</a>
                    <?php else: ?>
                    <a class="nav-link" href="#modal"><i class="fas fa-right-to-bracket me-1"></i>Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1><i class="fas fa-microchip me-3"></i>Test Dashboard</h1>
        <p>Comprehensive testing management system for manufacturing and quality assurance</p>
        <?php if(!isset($_SESSION['Nombre'])): ?>
        <a href="#modal" class="btn btn-light btn-lg mt-4">
            <i class="fas fa-sign-in-alt me-2"></i>Login to Access
        </a>
        <?php endif; ?>
    </div>
</section>

<!-- Statistics Cards -->
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-server"></i></div>
                <div class="stat-value"><?php echo $total_racks; ?></div>
                <div class="stat-label">Total Racks</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-check-circle text-success"></i></div>
                <div class="stat-value"><?php echo $active_racks; ?></div>
                <div class="stat-label">Active Racks</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-calendar-day text-info"></i></div>
                <div class="stat-value"><?php echo $total_racks_today; ?></div>
                <div class="stat-label">Added Today</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-users text-warning"></i></div>
                <div class="stat-value"><?php echo $total_users; ?></div>
                <div class="stat-label">Active Users</div>
            </div>
        </div>
    </div>

    <!-- Quick Access to Bays - rutas corregidas -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-map-marked-alt me-2"></i>Quick Access to Bays
                </div>
                <div class="card-body">
                    <div class="bay-grid">
                        <?php for($line = 1; $line <= 5; $line++): ?>
                            <?php for($bay = 1; $bay <= 2; $bay++): 
                                $bay_num = ($line - 1) * 2 + $bay;
                                if($bay_num <= 10):
                            ?>
                            <a href="/Statuspb/modules/generic/pages/bay<?php echo $bay_num; ?>.php" class="bay-card">
                                <i class="fas fa-location-dot"></i>
                                <span>Line <?php echo $line; ?><br>Bay <?php echo $bay_num; ?></span>
                            </a>
                            <?php endif; endfor; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Racks -->
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-clock me-2"></i>Recently Added Racks
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Location</th>
                                    <th>Serial</th>
                                    <th>Model</th>
                                    <th>WO</th>
                                    <th>Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rack = mysqli_fetch_assoc($recent_racks)): ?>
                                <tr>
                                    <td><strong><?php echo $rack['location_code']; ?></strong></td>
                                    <td>
                                        <a href="/Statuspb/modules/generic/pages/modals.php?pb=<?php echo urlencode($rack['serial_number']); ?>" class="text-decoration-none">
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
                                    <td><?php echo $rack['work_order']; ?></td>
                                    <td><?php echo date('m-d H:i', strtotime($rack['created_at'])); ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Tests -->
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-flask me-2"></i>Recent Test Results
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Location</th>
                                    <th>Serial</th>
                                    <th>Test</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($test = mysqli_fetch_assoc($recent_tests)): ?>
                                <tr>
                                    <td><?php echo $test['location_code']; ?></td>
                                    <td><?php echo $test['serial_number']; ?></td>
                                    <td><?php echo $test['test_name']; ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo $test['status']; ?>">
                                            <?php echo ucfirst($test['status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $test['end_time'] ? date('H:i', strtotime($test['end_time'])) : 'Running'; ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-info-circle me-2"></i>System Information
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-database fa-2x text-primary me-3"></i>
                                <div>
                                    <small class="text-muted">Database</small>
                                    <h6 class="mb-0">factory_test_system</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock fa-2x text-success me-3"></i>
                                <div>
                                    <small class="text-muted">Server Time</small>
                                    <h6 class="mb-0"><?php echo date('Y-m-d H:i:s'); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user fa-2x text-info me-3"></i>
                                <div>
                                    <small class="text-muted">Logged in</small>
                                    <h6 class="mb-0"><?php echo isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : 'Not logged in'; ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-layer-group fa-2x text-warning me-3"></i>
                                <div>
                                    <small class="text-muted">Version</small>
                                    <h6 class="mb-0">2.0.0</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal - ruta corregida -->
<?php if(!isset($_SESSION['Nombre'])): ?>
<div id="modal" class="login-modal">
    <div class="modal show" style="display:block; background:rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background:#2574A9; color:white;">
                    <h5 class="modal-title"><i class="fas fa-sign-in-alt me-2"></i>Login</h5>
                    <a href="#" class="btn-close btn-close-white"></a>
                </div>
                <div class="modal-body">
                    <form method="post" action="/Statuspb/modules/generic/pages/login.php">
                        <div class="mb-3">
                            <label class="form-label">Clock Number</label>
                            <input type="text" class="form-control" name="Usuario" 
                                   required maxlength="5" pattern="[0-9]{5}"
                                   onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="Password" required>
                        </div>
                        <script>
                            var URLactual = window.location.href.split('#')[0] + "#";
                            document.write("<input type='hidden' name='Url' value='" + URLactual + "'>");
                        </script>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="#" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Manual link - ruta corregida -->
<a href="/Statuspb/modules/generic/pages/manual.php" class="manual-link" title="User Manual" style="position:fixed; bottom:20px; left:20px; z-index:9999;">
    <div style="background:#3e3e3e; color:white; width:45px; height:40px; font-size:24px; text-align:center; border-radius:5px; line-height:40px;">
        <i class="fas fa-question-circle"></i>
    </div>
</a>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function justNumbers(e) {
    var key = window.event ? window.event.keyCode : e.which;
    return key == 8 || (key >= 48 && key <= 57);
}
</script>

</body>
</html>