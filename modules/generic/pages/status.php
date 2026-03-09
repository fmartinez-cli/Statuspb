<?php
require_once dirname(__DIR__) . '/bootstrap.php';

// Solo ingenieros y líderes (Nivel 3) pueden ver esta página
if (!isset($_SESSION['Nombre']) || $_SESSION['Nivel'] < 3) {
    header("Location: index.php");
    exit;
}

// Function to format time progress - same as bay_table.php
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
        } elseif ($interval->i > 0) {
            $time = $interval->format('%im');
        } else {
            $time = '< 1m';
        }
        
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

// Get filter parameters
$wo_filter = isset($_GET['wo']) && $_GET['wo'] ? "AND r.work_order = '" . mysqli_real_escape_string($enlace, $_GET['wo']) . "'" : "";
$model_filter = isset($_GET['model']) && $_GET['model'] ? "AND m.model_code = '" . mysqli_real_escape_string($enlace, $_GET['model']) . "'" : "";

// Get WO list for filter
$wo_list = mysqli_query($enlace, "SELECT DISTINCT work_order FROM racks 
                                   WHERE work_order IS NOT NULL 
                                   AND work_order != '' 
                                   ORDER BY work_order DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>General Status - Engineer View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Original styles -->
    <link rel="stylesheet" href="/Statuspb/public/css/style.css">
    <link rel="stylesheet" href="/Statuspb/public/css/popup.css">
    <link rel="stylesheet" href="/Statuspb/public/css/default.css">
    <link rel="shortcut icon" href="/Statuspb/public/img/checkicon.png">
    
    <style>
        /* Navbar styles from bay1.php */
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

        /* GLASSMORPHISM — Navbar and Dropdowns */
        nav.navbar {
            background: rgba(0, 0, 0, 0.82) !important;
            backdrop-filter: blur(16px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(16px) saturate(180%) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.3) !important;
            transition: background 0.3s ease !important;
        }
        nav.navbar:hover {
            background: rgba(0, 0, 0, 0.95) !important;
        }
        nav.navbar .nav-link {
            color: rgba(255, 255, 255, 0.82) !important;
            font-weight: 500;
            letter-spacing: 0.02em;
            border-radius: 6px;
            transition: color 0.2s, background 0.2s !important;
        }
        nav.navbar .nav-link:hover,
        nav.navbar .nav-link:focus {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.10) !important;
        }
        nav.navbar .dropdown-menu {
            background: rgba(22, 32, 44, 0.88) !important;
            backdrop-filter: blur(20px) saturate(160%) !important;
            -webkit-backdrop-filter: blur(20px) saturate(160%) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 10px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.35) !important;
            overflow: visible !important;
            z-index: 9999 !important;
            padding: 6px !important;
            margin-top: 6px !important;
        }
        nav.navbar .dropdown-item {
            color: rgba(255, 255, 255, 0.80) !important;
            border-radius: 6px !important;
            padding: 8px 14px !important;
            font-size: 0.9rem !important;
            display: block !important;
            background: transparent !important;
            transition: background 0.18s, color 0.18s !important;
        }
        nav.navbar .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.12) !important;
            color: #ffffff !important;
        }
        nav.navbar .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.3) !important;
        }
        nav.navbar .navbar-toggler-icon {
            filter: invert(1) !important;
        }
        nav.navbar .text-danger {
            color: rgba(255, 100, 100, 0.9) !important;
        }
        nav.navbar .text-danger:hover {
            color: #ff6b6b !important;
            background: rgba(255, 80, 80, 0.12) !important;
        }
        /* Dropdown centered under each item */
        nav.navbar .dropdown-menu {
            left: 50% !important;
            transform: translateX(-50%) !important;
            margin-top: 2px !important;
        }

        /* Header styles from bay1.php */
        header[style*="background-image"] {
            margin-bottom: 0;
        }
        .nombre {
            color: white;
        }
        .nombre span {
            color: rgba(255,255,255,0.7);
            font-size: 0.8em;
        }
        
        /* Admin button */
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
        .admin-button .badge-admin {
            background-color: rgba(255,255,255,0.2);
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 10px;
            margin-left: 5px;
        }
        
        /* Original page styles */
        body {
            font-size: 13px;
            background-color: #f8f9fa;
        }
        
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
            table-layout: fixed;
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
        
        .col-loc { width: 45px; }
        .col-serial { width: 100px; }
        .col-wo { width: 70px; }
        .col-sku { width: 70px; }
        .col-model { width: 60px; }
        .col-test { width: 35px; }
        .col-time { width: 80px; }
        .col-dates { width: 90px; }
        .col-comments { width: 200px; }
        
        .model-a { background-color: #2574A9 !important; color: white !important; font-weight: bold; }
        .model-b { background-color: #049372 !important; color: white !important; font-weight: bold; }
        .model-d { background-color: #e26715 !important; color: white !important; font-weight: bold; }
        .model-available { background-color: #3e3e3e !important; color: white !important; font-weight: bold; }
        
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
        
        .badge.bg-success { background-color: #008000 !important; }
        .badge.bg-warning { background-color: #f7a307 !important; color: black !important; }
        .badge.bg-danger { background-color: #FF0000 !important; }
        .badge.bg-secondary { background-color: #6c757d !important; }
        
        .filter-bar {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
        }
        
        .wo-section {
            margin-bottom: 30px;
        }
        .wo-title {
            background-color: #2574A9;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .wo-title small {
            color: rgba(255,255,255,0.8);
            font-size: 0.85em;
        }
        
        /* Login modal styles */
        #modal {
            display: none;
        }
        #modal:target {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
        }
        .overlay {
            background: rgba(0,0,0,0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }
        .modal-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 8px;
            z-index: 10001;
            width: 500px;
        }
    </style>
</head>
<body class="desarroll">

<!-- Header from bay1.php -->
<header style="background-image: url('/Statuspb/modules/generic/img/try6.jpg');">
    <div class="grupo">
        <div class="caja">
            <div class="container">
                <header class="clearfix header2">
                    <span>Testing Engineering</span>
                    <a href="/Statuspb/modules/generic/pages/index.php">
                        <h1><i class="fas fa-server" aria-hidden="true"></i> Test Dashboard</h1>
                    </a>
                    <?php if(isset($_SESSION['Nombre'])): ?>
                    <div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;">
                        <p class="info" title="">
                            <?php echo $_SESSION['Nombre']; ?>
                            <span>Clock number: <?php echo $_SESSION['No_Reloj']; ?><br>
                            Shift: <?php echo $_SESSION['Turno']; ?>&deg;</span>
                        </p>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['Nombre']) && $_SESSION['Nivel'] == 1): ?>
                    <div style="position:absolute; right:5px; top:5px;">
                        <a href="/Statuspb/modules/generic/pages/admin_panel.php"><img width="25" src="/Statuspb/img/admin.png"></a>
                    </div>
                    <?php endif; ?>
                </header>
            </div>
        </div>
    </div>
</header>

<!-- Admin button (visible only for level 99) -->
<?php if (isset($_SESSION['Nombre']) && $_SESSION['Nivel'] == 99): ?>
<a href="/Statuspb/modules/generic/pages/admin_panel.php" class="admin-button" title="General Administration Panel">
    <i class="fas fa-key"></i>
    <span>Admin</span>
    <span class="badge-admin">Gen</span>
</a>
<?php endif; ?>

<!-- Navbar from bay1.php -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-xl px-0">
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="/Statuspb/modules/generic/pages/index.php">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>

                <!-- LINE 1 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Line 1
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay1.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 1</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay2.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 2</a></li>
                    </ul>
                </li>

                <!-- LINE 2 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Line 2
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay3.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 3</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay4.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 4</a></li>
                    </ul>
                </li>

                <!-- LINE 3 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Line 3
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay5.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 5</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay6.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 6</a></li>
                    </ul>
                </li>

                <!-- LINE 4 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Line 4
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay7.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 7</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay8.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 8</a></li>
                    </ul>
                </li>

                <!-- LINE 5 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Line 5
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay9.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 9</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/modules/generic/pages/bay10.php">
                            <i class="fas fa-location-dot me-2"></i>Bay 10</a></li>
                    </ul>
                </li>

                <!-- LINE 6 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Line 6
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-location-dot me-2"></i>Bay 11</a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-location-dot me-2"></i>Bay 12</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Statuspb/modules/generic/pages/stats.php">
                        <i class="fas fa-chart-line me-1"></i>Times
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Statuspb/modules/generic/pages/status.php">
                        <i class="fas fa-chart-bar me-1"></i>General Status
                    </a>
                </li>

                <li class="nav-item ms-lg-3 ps-lg-3" style="border-left:1px solid rgba(255,255,255,0.15)">
                    <?php if(isset($_SESSION['Nombre'])): ?>
                    <a class="nav-link text-danger" href="/Statuspb/modules/generic/pages/logout.php">
                        <i class="fas fa-right-from-bracket me-1"></i>Logout
                    </a>
                    <?php else: ?>
                    <a class="nav-link" href="#modal">
                        <i class="fas fa-right-to-bracket me-1"></i>Login
                    </a>
                    <?php endif; ?>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Login Modal (CSS :target — original system) -->
<?php if(!isset($_SESSION['Nombre'])): ?>
<center>
<div id="modal" style="width:500px;">
    <div class="modal-content">
        <div class="header"><h2>Login</h2></div>
        <div class="copy">
            <div class="grupo"><div class="caja">
                <form method="post" action="/Statuspb/modules/generic/pages/login.php" class="login">
                    <input type="text" name="Usuario" placeholder="Clock number"
                           required maxlength="5" pattern=".{5,}"
                           onkeypress="return justNumbers(event);">
                    <br>
                    <input type="password" name="Password" placeholder="Password" required>
                    <script>
                        var URLactual = window.location.href + "#";
                        document.write("<input type='hidden' name='Url' value='" + URLactual + "'>");
                    </script>
                    <br><button style="width:300px;" class="btn1">Accept</button>
                    <br><input style="width:250px;" class="btn2" type="button" value="Close"
                               onclick="window.location.href='#'">
                </form>
            </div></div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
</center>
<?php endif; ?>

<div class="container-fluid py-3">
    <!-- =====================================================
         PAGE TITLE
    ====================================================== -->
    <div class="section-title">
        <h2><i class="fas fa-chart-bar"></i>GENERAL STATUS - ENGINEER VIEW</h2>
    </div>

    <!-- =====================================================
         COLOR LEGEND - Same as bay_table.php
    ====================================================== -->
    <div class="legend-container">
        <div class="legend-row">
            <span class="legend-label">Models:</span>
            <div class="legend-items">
                <span class="legend-item model-a"><i class="fas fa-server me-1"></i>Model A</span>
                <span class="legend-item model-b"><i class="fas fa-server me-1"></i>Model B</span>
                <span class="legend-item model-d"><i class="fas fa-server me-1"></i>Model D</span>
                <span class="legend-item model-available"><i class="fas fa-server me-1"></i>Available</span>
            </div>
        </div>
        
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
         FILTER BAR
    ====================================================== -->
    <div class="filter-bar">
        <form method="GET" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Filter by WO</label>
                <select name="wo" class="form-select">
                    <option value="">All Work Orders</option>
                    <?php while ($wo = mysqli_fetch_assoc($wo_list)): ?>
                        <option value="<?php echo $wo['work_order']; ?>" 
                            <?php echo (isset($_GET['wo']) && $_GET['wo'] == $wo['work_order']) ? 'selected' : ''; ?>>
                            <?php echo $wo['work_order']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Filter by Model</label>
                <select name="model" class="form-select">
                    <option value="">All Models</option>
                    <option value="A" <?php echo (isset($_GET['model']) && $_GET['model'] == 'A') ? 'selected' : ''; ?>>Model A</option>
                    <option value="B" <?php echo (isset($_GET['model']) && $_GET['model'] == 'B') ? 'selected' : ''; ?>>Model B</option>
                    <option value="D" <?php echo (isset($_GET['model']) && $_GET['model'] == 'D') ? 'selected' : ''; ?>>Model D</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Date Range</label>
                <select name="days" class="form-select">
                    <option value="7" <?php echo (isset($_GET['days']) && $_GET['days'] == 7) ? 'selected' : ''; ?>>Last 7 days</option>
                    <option value="30" <?php echo (!isset($_GET['days']) || $_GET['days'] == 30) ? 'selected' : ''; ?>>Last 30 days</option>
                    <option value="90" <?php echo (isset($_GET['days']) && $_GET['days'] == 90) ? 'selected' : ''; ?>>Last 90 days</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <a href="?export=pdf<?php echo isset($_GET['wo']) ? '&wo='.$_GET['wo'] : ''; ?>" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-file-pdf me-2"></i>Export
                </a>
            </div>
        </form>
    </div>

    <!-- =====================================================
         TABLES GROUPED BY WO
    ====================================================== -->
    <?php
    // Main query with filters
    $query = "SELECT DISTINCT r.work_order 
              FROM racks r
              LEFT JOIN rack_models m ON r.model_id = m.id
              WHERE r.work_order IS NOT NULL 
              AND r.work_order != ''
              $wo_filter
              $model_filter
              ORDER BY r.work_order DESC";
    
    $work_orders = mysqli_query($enlace, $query);
    
    if (mysqli_num_rows($work_orders) == 0) {
        echo '<div class="alert alert-info">No racks found with the selected filters.</div>';
    }
    
    while ($wo = mysqli_fetch_assoc($work_orders)):
        $current_wo = $wo['work_order'];
        
        // Get racks for this WO
        $racks_query = "SELECT r.*, m.model_code, m.display_name as model_name
                       FROM racks r
                       LEFT JOIN rack_models m ON r.model_id = m.id
                       WHERE r.work_order = '$current_wo'
                       ORDER BY r.location_code";
        $racks = mysqli_query($enlace, $racks_query);
        $rack_count = mysqli_num_rows($racks);
    ?>
    
    <div class="wo-section">
        <div class="wo-title">
            <i class="fas fa-box me-2"></i>WO: <?php echo $current_wo; ?> 
            <small class="ms-3"><?php echo $rack_count; ?> racks</small>
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
                            <th class="col-test" title="Visual Inspection">Vis</th>
                            <th class="col-test" title="Power On Test">Pwr</th>
                            <th class="col-test" title="Stress Test">Str</th>
                            <th class="col-test" title="Diagnostic">Diag</th>
                            <th class="col-test" title="Validation">Val</th>
                            <th class="col-test" title="Preflight">Pre</th>
                            <th class="col-test" title="Performance">Perf</th>
                            <th class="col-test" title="Log Upload">Log</th>
                            <th class="col-test" title="QA Release">QA</th>
                            <th class="col-dates">Start</th>
                            <th class="col-dates">End</th>
                            <th class="col-time">Total Time</th>
                            <th class="col-comments">Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rack = mysqli_fetch_assoc($racks)): 
                            // Get test results for this rack
                            $tests_query = "SELECT tr.*, tc.test_code, tc.test_name
                                          FROM test_results tr
                                          JOIN test_catalog tc ON tr.test_code = tc.test_code
                                          WHERE tr.rack_id = {$rack['id']}
                                          ORDER BY tr.sequence_order";
                            $tests_result = mysqli_query($enlace, $tests_query);
                            
                            $tests = [];
                            while ($test = mysqli_fetch_assoc($tests_result)) {
                                $tests[$test['test_code']] = $test;
                            }
                            
                            // Determine model class
                            $modelClass = 'model-available';
                            if ($rack['model_code'] == 'A') $modelClass = 'model-a';
                            elseif ($rack['model_code'] == 'B') $modelClass = 'model-b';
                            elseif ($rack['model_code'] == 'D') $modelClass = 'model-d';
                            
                            // Calculate total time
                            $first_test = reset($tests);
                            $last_test = end($tests);
                            $startTime = $first_test['start_time'] ?? $rack['created_at'];
                            
                            $totalTime = formatTimeProgress(
                                $startTime,
                                $last_test['end_time'] ?? null
                            );
                            
                            // Test order
                            $test_order = ['visual_inspection', 'power_on_test', 'stress_test', 'diagnostic_test', 
                                          'validation_test', 'preflight_check', 'performance_test', 'log_upload', 'qa_release'];
                        ?>
                        <tr>
                            <td class="fw-bold col-loc"><?php echo htmlspecialchars($rack['location_code'] ?? 'N/A'); ?></td>
                            <td class="col-serial">
                                <a href="modals.php?pb=<?php echo urlencode($rack['serial_number']); ?>&tr=<?php echo urlencode($rack['location_code']); ?>" class="text-decoration-none">
                                    <?php echo htmlspecialchars($rack['serial_number']); ?>
                                </a>
                            </td>
                            <td class="col-wo"><?php echo htmlspecialchars($rack['work_order'] ?? ''); ?></td>
                            <td class="col-sku"><?php echo htmlspecialchars($rack['sku'] ?? ''); ?></td>
                            <td class="<?php echo $modelClass; ?> col-model"><?php echo htmlspecialchars($rack['model_code'] ?? 'Available'); ?></td>
                            
                            <?php foreach ($test_order as $test_code): 
                                $test = $tests[$test_code] ?? null;
                                $status = $test['status'] ?? 'pending';
                                $class = 'test-pending';
                                
                                if ($status == 'pass') $class = 'test-pass';
                                elseif ($status == 'waiting') $class = 'test-waiting';
                                elseif ($status == 'running') $class = 'test-running';
                                elseif ($status == 'fail') $class = 'test-fail';
                            ?>
                                <td class="test-cell col-test"><div class="<?php echo $class; ?>" title="<?php echo ucfirst($status); ?>"></div></td>
                            <?php endforeach; ?>
                            
                            <td class="col-dates"><?php echo $startTime ? date('m-d H:i', strtotime($startTime)) : '-'; ?></td>
                            <td class="col-dates"><?php echo $last_test['end_time'] ? date('m-d H:i', strtotime($last_test['end_time'])) : '-'; ?></td>
                            <td class="text-center col-time"><?php echo $totalTime; ?></td>
                            
                            <!-- Comments column - editable -->
                            <td class="col-comments">
                                <span contenteditable="true" id="comments_<?php echo $rack['id']; ?>" class="d-inline-block w-100">
                                    <?php echo htmlspecialchars($rack['comments'] ?? ''); ?>
                                </span>
                                <input type="hidden" name="rack_ids[]" value="<?php echo $rack['id']; ?>">
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <?php endwhile; ?>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/Statuspb/js/block.js"></script>

<script>
function justNumbers(e) {
    var k = window.event ? window.event.keyCode : e.which;
    return k == 8 || /\d/.test(String.fromCharCode(k));
}

// AJAX for comments
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