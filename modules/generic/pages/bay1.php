<?php
require_once dirname(__DIR__) . '/bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bay 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Original styles -->
    <link rel="stylesheet" href="/Statuspb/public/css/style.css">
    <link rel="stylesheet" href="/Statuspb/public/css/popup.css">
    <link rel="stylesheet" href="/Statuspb/public/css/default.css">
    <link rel="shortcut icon" href="/Statuspb/public/img/checkicon.png">

    <style>
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

        /* =====================================================
           GLASSMORPHISM — Navbar and Dropdowns
        ====================================================== */
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
        /* Dropdown centered under each item — similar to original cbp */
        nav.navbar .dropdown-menu {
            left: 50% !important;
            transform: translateX(-50%) !important;
            margin-top: 2px !important;
        }

        /* =====================================================
           TEST RACK BOXES - AGRANDADOS
        ====================================================== */
        .tr-box {
            width: 300px;        
            height: 170px;       
            border-radius: 8px;
            transition: transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
        }
        .tr-box:hover {
            transform: scale(1.05);
        }
        .model-a { background-color: #2574A9; } /* Model A - Blue */
        .model-b { background-color: #049372; } /* Model B - Green */
        .model-c { background-color: #3e3e3e; } /* Model C - Gray */
        .model-d { background-color: #e26715; } /* Model D - Orange */

        .tr-box a {
            color: white;
            text-decoration: none;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .tr-content {
            width: 100%;
            padding: 12px 8px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .tr-title {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
            white-space: nowrap;
            line-height: 1.2;
        }
        .tr-test {
            font-size: 20px;
            margin-bottom: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.3;
            padding: 0 2px;
        }
        .tr-test span {
            font-size: 20px;
            font-weight: bold;
        }
        .tr-serial {
            font-size: 18px;
            word-break: break-all;
            overflow-wrap: break-word;
            max-width: 280px;
            margin: 0 auto;
            line-height: 1.3;
            padding: 0 4px;
        }

        /* =====================================================
           FLOATING NOTEPAD
        ====================================================== */
        .notepad-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            width: 380px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            font-family: Arial, sans-serif;
        }
        .notepad-header {
            background: #3e3e3e;
            color: white;
            padding: 10px 15px;
            border-radius: 8px 8px 0 0;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            user-select: none;
        }
        .notepad-body.collapsed { display: none; }
        .notepad-tabs {
            display: flex;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .notepad-tab {
            flex: 1;
            padding: 10px 5px;
            text-align: center;
            background: #f8f9fa;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
            color: #6c757d;
            font-size: 13px;
        }
        .notepad-tab:hover { background: #e9ecef; color: #495057; }
        .notepad-tab.active {
            border-bottom-color: #2574A9;
            background: white;
            color: #2574A9;
            font-weight: 600;
        }
        .notepad-content { padding: 15px; }
        .tab-pane { display: none; }
        .tab-pane.active { display: block; }
        .commands-textarea {
            font-family: 'Courier New', monospace;
            font-size: 13px;
            line-height: 1.5;
            background: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
            min-height: 180px;
            resize: vertical;
            box-sizing: border-box;
        }
        .btn-copy {
            background: #2574A9;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
        }
        .btn-copy:hover { background: #1a5a8c; }
        .toast-notification {
            position: fixed;
            bottom: 100px;
            right: 420px;
            background: #28a745;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            z-index: 10000;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
            font-size: 13px;
        }
        .toast-notification.show { opacity: 1; }

        /* =====================================================
           COMMENTS
        ====================================================== */
        .comment-note {
            background-color: #f9f9f9;
            border-left: 4px solid #2574A9;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: box-shadow 0.2s ease;
        }
        .comment-note:hover { box-shadow: 0 4px 8px rgba(0,0,0,0.15); }
        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px dashed #ddd;
        }
        .comment-tech { font-weight: bold; color: #2574A9; font-size: 1.1em; }
        .comment-clock { color: #6c757d; font-size: 0.85em; background: #e9ecef; padding: 2px 8px; border-radius: 12px; }
        .comment-date { color: #6c757d; font-size: 0.85em; }
        .comment-text { color: #333; line-height: 1.5; white-space: pre-wrap; word-break: break-word; }
    </style>
</head>
<body class="desarroll">

<!-- ═══════════════════════════════════════════
     HEADER
══════════════════════════════════════════════ -->
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
<style>
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
    .admin-button i {
        font-size: 16px;
    }
    .admin-button .badge-admin {
        background-color: rgba(255,255,255,0.2);
        padding: 2px 6px;
        border-radius: 10px;
        font-size: 10px;
        margin-left: 5px;
    }
</style>

<a href="/Statuspb/modules/generic/pages/admin_panel.php" class="admin-button" title="General Administration Panel">
   <i class="fas fa-key"></i>
    <span>Admin</span>
    <span class="badge-admin">Gen</span>
</a>
<?php endif; ?>

<!-- ═══════════════════════════════════════════
     NAVBAR BOOTSTRAP 5.3 + GLASSMORPHISM
══════════════════════════════════════════════ -->
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

<!-- ═══════════════════════════════════════════
     LOGIN MODAL (CSS :target — original system)
══════════════════════════════════════════════ -->
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

<!-- ═══════════════════════════════════════════
     RACK TYPE LEGEND
══════════════════════════════════════════════ -->
<section class="container-fluid my-3 px-3">
    <div class="d-flex flex-wrap gap-2">
        <div class="px-3 py-2 rounded fw-bold text-white" style="background:#3e3e3e; opacity:.85; font-size:.85rem;">
            Available
        </div>
        <div class="px-3 py-2 rounded fw-bold text-white" style="background:#049372; font-size:.85rem;">
            <i class="fas fa-server me-1"></i>Model B
        </div>
        <div class="px-3 py-2 rounded fw-bold text-white" style="background:#e26715; font-size:.85rem;">
            <i class="fas fa-server me-1"></i>Model D
        </div>
        <div class="px-3 py-2 rounded fw-bold text-white" style="background:#2574A9; font-size:.85rem;">
            <i class="fas fa-server me-1"></i>Model A
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     TEST RACK BOXES — 2 ROWS OF 5
══════════════════════════════════════════════ -->
<section class="container-fluid px-3 my-3">

  <!-- ROW 1: TR01-01 to TR01-05 -->
<div class="d-flex flex-wrap gap-2 mb-2 justify-content-center">
    <?php for($i = 1; $i <= 5; $i++):
        $varNoSerie = "NoSerie$i";
        $varPrueba  = "Prueba$i";
        $varModelo  = "Modelo$i";
        $contrVar   = "contr$i";
        
        $trNum = 'TR01-' . str_pad($i, 2, '0', STR_PAD_LEFT);
        $testStatus = isset($$varPrueba) ? $$varPrueba : '&nbsp;';
        $serialNum = isset($$varNoSerie) ? $$varNoSerie : 'Available';
        
        // Determinate box class based on model code, default to model-c (gray)
        $boxClass = 'model-c';
        
        // Only check model code if there's a valid serial number (not "Available") and the variable is set
        if ($serialNum != 'Available' && isset($$contrVar) && isset($$contrVar['model_code'])) {
            switch ($$contrVar['model_code']) {
                case 'A':
                    $boxClass = 'model-a';
                    break;
                case 'B':
                    $boxClass = 'model-b';
                    break;
                case 'D':
                    $boxClass = 'model-d';
                    break;
            }
        }
        // If serial number is "Available", we keep the default gray class regardless of model code
    ?>
    <div class="tr-box <?php echo $boxClass; ?>">
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalRack"
           data-serie="<?php echo htmlspecialchars($serialNum); ?>"
           data-tr="<?php echo $trNum; ?>">
            <div class="tr-content">
                <div class="tr-title"><?php echo $trNum; ?></div>
                <div class="tr-test"><?php echo $testStatus; ?></div>
                <div class="tr-serial"><?php echo htmlspecialchars($serialNum); ?></div>
            </div>
        </a>
    </div>
    <?php endfor; ?>
</div>

    <!-- ROW 2: TR01-06 to TR01-10 -->
<div class="d-flex flex-wrap gap-2 mb-2 justify-content-center">
    <?php for($i = 6; $i <= 10; $i++):
        $varNoSerie = "NoSerie$i";
        $varPrueba  = "Prueba$i";
        $varModelo  = "Modelo$i";
        $contrVar   = "contr$i";
        
        $trNum = 'TR01-' . str_pad($i, 2, '0', STR_PAD_LEFT);
        $testStatus = isset($$varPrueba) ? $$varPrueba : '&nbsp;';
        $serialNum = isset($$varNoSerie) ? $$varNoSerie : 'Available';
        
        // Determinate box class based on model code, default to model-c (gray)
        $boxClass = 'model-c';
        
        // Only check model code if there's a valid serial number (not "Available") and the variable is set
        if ($serialNum != 'Available' && isset($$contrVar) && isset($$contrVar['model_code'])) {
            switch ($$contrVar['model_code']) {
                case 'A':
                    $boxClass = 'model-a';
                    break;
                case 'B':
                    $boxClass = 'model-b';
                    break;
                case 'D':
                    $boxClass = 'model-d';
                    break;
            }
        }
        // If serial number is "Available", we keep the default gray class regardless of model code
    ?>
    <div class="tr-box <?php echo $boxClass; ?>">
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalRack"
           data-serie="<?php echo htmlspecialchars($serialNum); ?>"
           data-tr="<?php echo $trNum; ?>">
            <div class="tr-content">
                <div class="tr-title"><?php echo $trNum; ?></div>
                <div class="tr-test"><?php echo $testStatus; ?></div>
                <div class="tr-serial"><?php echo htmlspecialchars($serialNum); ?></div>
            </div>
        </a>
    </div>
    <?php endfor; ?>
</div>

</section>

<!-- ═══════════════════════════════════════════
     JR TABLE IFRAME (original)
══════════════════════════════════════════════ -->
<section>
    <style>
        .iframe-container {
            position: relative;
            padding-bottom: 60%;
            height: 0;
            width: 100%;
            overflow: hidden;
        }
        .iframe-container iframe {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            border: 0;
        }
    </style>
    <div class="iframe-container">
        <iframe src="/Statuspb/modules/generic/pages/bay_table.php" loading="lazy"></iframe>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     TOOLS (original)
══════════════════════════════════════════════ -->
<center><h1 style="font-size:3em;">Tools</h1></center><br>
<section>
    <center>
        <div class="grupo total"><div class="caja">
            <details>
                <summary style="background-color:#3e3e3e; padding:20px">Repair System</summary>
                <iframe src="http://10.19.17.101/RepairSystem" width="100%" height="700" loading="lazy"></iframe>
            </details>
        </div></div>
    </center>
    <center>
        <div class="grupo total"><div class="caja">
            <details>
                <summary style="background-color:#3e3e3e; padding:20px">Terminal</summary>
                <iframe src="" width="100%" height="700"></iframe>
            </details>
        </div></div>
    </center>
</section>
<br><br>

<!-- ═══════════════════════════════════════════
     PERSONAL NOTEPAD (3 tabs, localStorage)
══════════════════════════════════════════════ -->
<?php if(isset($_SESSION['No_Reloj'])):
    $userKey = 'user_' . $_SESSION['No_Reloj'];
?>
<div class="notepad-container" id="notepadContainer">
    <div class="notepad-header" id="notepadHeader">
        <span><i class="fas fa-terminal me-1"></i> My Commands
            (<?php echo htmlspecialchars(substr($_SESSION['Nombre'], 0, 15)); ?>)
        </span>
        <i class="fas fa-chevron-up" id="notepadChevron"></i>
    </div>
    <div class="notepad-body" id="notepadBody">
        <div class="notepad-tabs">
            <button class="notepad-tab active" data-tab="1">
                <i class="fas fa-terminal me-1"></i>General
            </button>
            <button class="notepad-tab" data-tab="2">
                <i class="fas fa-gear me-1"></i>Config
            </button>
            <button class="notepad-tab" data-tab="3">
                <i class="fas fa-code me-1"></i>Quick
            </button>
        </div>
        <div class="notepad-content">
            <div class="tab-pane active" id="tab1">
                <textarea class="commands-textarea" id="commands1" placeholder="General commands..."></textarea>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <small class="text-muted"><i class="fas fa-floppy-disk me-1"></i>Auto-save</small>
                    <button class="btn-copy" data-target="commands1">
                        <i class="fas fa-copy me-1"></i>Copy
                    </button>
                </div>
            </div>
            <div class="tab-pane" id="tab2">
                <textarea class="commands-textarea" id="commands2" placeholder="Configuration commands..."></textarea>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <small class="text-muted"><i class="fas fa-floppy-disk me-1"></i>Auto-save</small>
                    <button class="btn-copy" data-target="commands2">
                        <i class="fas fa-copy me-1"></i>Copy
                    </button>
                </div>
            </div>
            <div class="tab-pane" id="tab3">
                <textarea class="commands-textarea" id="commands3" placeholder="Quick commands..."></textarea>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <small class="text-muted"><i class="fas fa-floppy-disk me-1"></i>Auto-save</small>
                    <button class="btn-copy" data-target="commands3">
                        <i class="fas fa-copy me-1"></i>Copy
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="toast-notification" id="toastNotification">✅ Copied</div>

<script>
(function() {
    const header   = document.getElementById('notepadHeader');
    const body     = document.getElementById('notepadBody');
    const chevron  = document.getElementById('notepadChevron');
    const tabs     = document.querySelectorAll('.notepad-tab');
    const panes    = document.querySelectorAll('.tab-pane');
    const toast    = document.getElementById('toastNotification');
    const userKey  = '<?php echo $userKey; ?>';
    const textareas = {
        1: document.getElementById('commands1'),
        2: document.getElementById('commands2'),
        3: document.getElementById('commands3')
    };

    function showToast(msg) {
        toast.textContent = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2000);
    }

    document.querySelectorAll('.btn-copy').forEach(btn => {
        btn.title = 'Ctrl+Enter to copy';
        btn.addEventListener('click', async function() {
            const ta = document.getElementById(this.dataset.target);
            try { await navigator.clipboard.writeText(ta.value); }
            catch(e) { ta.select(); document.execCommand('copy'); }
            showToast('✅ Copied');
        });
    });

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const n = this.dataset.tab;
            tabs.forEach(t => t.classList.remove('active'));
            panes.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            document.getElementById('tab' + n).classList.add('active');
            localStorage.setItem(userKey + '_activeTab', n);
        });
    });

    for(let i = 1; i <= 3; i++) {
        const saved = localStorage.getItem(userKey + '_tab' + i);
        if(saved && textareas[i]) textareas[i].value = saved;
    }

    const activeTab = localStorage.getItem(userKey + '_activeTab');
    if(activeTab) document.querySelector('[data-tab="' + activeTab + '"]')?.click();

    let timers = {};
    for(let i = 1; i <= 3; i++) {
        if(textareas[i]) {
            textareas[i].addEventListener('input', function() {
                clearTimeout(timers[i]);
                timers[i] = setTimeout(() =>
                    localStorage.setItem(userKey + '_tab' + i, textareas[i].value), 1500);
            });
        }
    }
    window.addEventListener('beforeunload', () => {
        for(let i = 1; i <= 3; i++)
            if(textareas[i]) localStorage.setItem(userKey + '_tab' + i, textareas[i].value);
    });

    let collapsed = localStorage.getItem(userKey + '_collapsed') === 'true';
    function applyCollapse() {
        body.classList.toggle('collapsed', collapsed);
        chevron.className = collapsed ? 'fas fa-chevron-down' : 'fas fa-chevron-up';
    }
    applyCollapse();
    header.addEventListener('click', function() {
        collapsed = !collapsed;
        localStorage.setItem(userKey + '_collapsed', collapsed);
        applyCollapse();
    });

    document.addEventListener('keydown', function(e) {
        if(e.ctrlKey && e.key === 'Enter') {
            e.preventDefault();
            document.querySelector('.tab-pane.active .btn-copy')?.click();
        }
    });
})();
</script>
<?php endif; ?>

<!-- ═══════════════════════════════════════════
     RACK MODAL — loads modals.php via AJAX
══════════════════════════════════════════════ -->
<div class="modal fade" id="modalRack" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:#22313F; border-bottom:1px solid rgba(255,255,255,0.1);">
                <h5 class="modal-title text-white">
                    <i class="fas fa-server me-2" style="color:#59ABE3;"></i>
                    <span id="modalRackTR">Rack Details</span>
                </h5>
                <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white" id="modalBodyContent">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-2 text-muted">Loading information...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════
     SCRIPTS — required order
══════════════════════════════════════════════ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function justNumbers(e) {
    var k = window.event ? window.event.keyCode : e.which;
    return k == 8 || /\d/.test(String.fromCharCode(k));
}

document.addEventListener('DOMContentLoaded', function() {
    const modalEl   = document.getElementById('modalRack');
    const modalBody = document.getElementById('modalBodyContent');
    const modalTR   = document.getElementById('modalRackTR');

    const loadingHtml = `
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-2 text-muted">Loading...</p>
        </div>`;

    modalEl.addEventListener('show.bs.modal', function(e) {
        const btn   = e.relatedTarget;
        const serie = btn?.dataset.serie || '';
        const tr    = btn?.dataset.tr    || '';

        modalTR.textContent = tr || 'Rack Details';
        modalBody.innerHTML = loadingHtml;

        fetch('modals.php?pb=' + encodeURIComponent(serie) + '&tr=' + encodeURIComponent(tr))
            .then(r => r.ok ? r.text() : Promise.reject(r.status))
            .then(html => { modalBody.innerHTML = html; })
            .catch(() => {
                modalBody.innerHTML = `
                    <div class="alert alert-danger m-3">
                        <i class="fas fa-triangle-exclamation me-2"></i>
                        Error loading data. Please try again.
                    </div>`;
            });
    });

    modalEl.addEventListener('hidden.bs.modal', function() {
        modalBody.innerHTML = loadingHtml;
    });
});
</script>

<?php if(isset($_SESSION['No_Reloj'])): ?>
<center><a href="/Statuspb/public/img/stats.php" style="opacity:0;">.</a></center>
<?php endif; ?>
</body>
</html>