<?php
// Initialize session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once dirname(__DIR__) . '/bootstrap.php';

// Verify user authentication and authorization
if (!isset($_SESSION['Nombre']) || !in_array($_SESSION['Nivel'], [1, 3, 99])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Access Denied</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: Arial, sans-serif;
            }
            .access-denied {
                background: rgba(255, 255, 255, 0.95);
                padding: 40px;
                border-radius: 20px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.2);
                text-align: center;
                max-width: 500px;
            }
            .access-denied h1 {
                color: #dc3545;
                margin-bottom: 20px;
                font-size: 28px;
            }
            .access-denied p {
                color: #333;
                margin-bottom: 30px;
                font-size: 18px;
            }
            .access-denied img {
                margin-bottom: 20px;
                opacity: 0.8;
            }
            .counter {
                font-size: 24px;
                font-weight: bold;
                color: #2574A9;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="access-denied">
            <img src="/Statuspb/public/img/checkicon.png" width="100" height="100" alt="Logo">
            <h1><i class="fas fa-exclamation-triangle me-2"></i>Access Denied</h1>
            <p>You must be logged in as an administrator, engineer, or leader to access this page.</p>
            <p class="counter" id="counter">Redirecting in 4 seconds...</p>
            <a href="index.php" class="btn btn-primary mt-3">Go to Home</a>
        </div>
        
        <script>
            var counter = 4;
            var countdown = setInterval(function() {
                counter--;
                document.getElementById('counter').innerHTML = "Redirecting in " + counter + " seconds...";
                if (counter <= 0) {
                    clearInterval(countdown);
                    window.location.href = "index.php";
                }
            }, 1000);
        </script>
    </body>
    </html>
    <?php
    exit();
}

// gET unique work orders for the dropdown
$wo_list = mysqli_query($enlace, "SELECT DISTINCT work_order FROM racks 
                                   WHERE work_order IS NOT NULL 
                                   AND work_order != '' 
                                   ORDER BY work_order DESC");
?>
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

<a href="/Statuspb/modules/generic/pages/admin_panel.php" class="admin-button" title="Admin Panel">
   <i class="fas fa-key"></i>
    <span>Admin</span>
    <span class="badge-admin">Gen</span>
</a>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Times - Test Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        
        .search-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .wo-button {
            width: 100%;
            text-align: left;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #333;
            transition: all 0.3s;
        }
        .wo-button:hover {
            background-color: #2574A9;
            color: white;
            border-color: #2574A9;
            transform: translateX(5px);
        }
        
        /* Floating notepad styles */
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
        
        header a h1,
        header a h1 i,
        header a h1 i.fa,
        header a h1 i.fa-server {
            color: white !important;
        }
    </style>
</head>
<body class="desarroll">

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
                    
                    <?php if(isset($_SESSION['Nombre']) && $_SESSION['Nivel'] == 99): ?>
                    <div class="" style="position:absolute; right:5px; top:5px;">
                        
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
    <!-- Page title -->
    <div class="section-title">
        <h2><i class="fas fa-chart-line"></i>TIMES & STATISTICS</h2>
    </div>

    <div class="row">
        <!-- Left column: WO Search -->
        <div class="col-md-6 mb-4">
            <div class="search-card">
                <h3 class="mb-4"><i class="fas fa-search me-2" style="color:#2574A9;"></i>Search by Work Order</h3>
                
                <form id="searchForm" method="POST" action="wo_stats.php" class="mb-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" 
                               name="WO" 
                               placeholder="Enter Work Order (9 digits)" 
                               pattern="[0-9]{9}" 
                               maxlength="9"
                               required>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </div>
                </form>

                <div id="resultado" class="mt-3 text-center" style="font-size: 18px;"></div>
            </div>
        </div>

        <!-- Right column: Recent WOs -->
        <div class="col-md-6 mb-4">
            <div class="search-card">
                <h3 class="mb-4"><i class="fas fa-history me-2" style="color:#2574A9;"></i>Recent Work Orders</h3>
                
                <div style="max-height: 300px; overflow-y: auto;">
                    <?php 
                    mysqli_data_seek($wo_list, 0);
                    while ($wo = mysqli_fetch_assoc($wo_list)): 
                    ?>
                    <form action="wo_stats.php" method="POST" class="mb-2">
                        <input type="hidden" name="WO" value="<?php echo $wo['work_order']; ?>">
                        <button type="submit" class="btn wo-button">
                            <i class="fas fa-box me-2"></i>
                            WO: <?php echo $wo['work_order']; ?>
                            <span class="badge bg-secondary float-end">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </button>
                    </form>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats Row (optional - can be expanded later) -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-chart-pie me-2"></i>Quick Overview
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded">
                                <h5>Total Racks</h5>
                                <h2 class="text-primary"><?php 
                                    $total = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) as count FROM racks"));
                                    echo $total['count'];
                                ?></h2>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded">
                                <h5>Active Racks</h5>
                                <h2 class="text-success"><?php 
                                    $active = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) as count FROM racks WHERE work_order IS NOT NULL AND work_order != ''"));
                                    echo $active['count'];
                                ?></h2>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded">
                                <h5>Total WOs</h5>
                                <h2 class="text-info"><?php 
                                    $wos = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(DISTINCT work_order) as count FROM racks WHERE work_order IS NOT NULL AND work_order != ''"));
                                    echo $wos['count'];
                                ?></h2>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded">
                                <h5>Active Users</h5>
                                <h2 class="text-warning"><?php 
                                    $users = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) as count FROM users WHERE is_active = 1"));
                                    echo $users['count'];
                                ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating notepad for personal notes (only for logged in users) -->
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
})();
</script>
<?php endif; ?>

<!-- Manual link -->
<a href="manual.php#stats" class="manual-link" title="Manual" style="position:fixed; bottom:20px; left:20px; z-index:9999;">
    <div style="background:#3e3e3e; color:white; width:45px; height:40px; font-size:24px; text-align:center; border-radius:5px; line-height:40px;">
        <i class="fas fa-question-circle"></i>
    </div>
</a>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AJAX search functionality -->
<script>
$(document).ready(function() {
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        var wo = $('input[name="WO"]').val();
        
        $.ajax({
            url: 'check_wo.php',
            type: 'POST',
            data: { WO: wo },
            success: function(resp) {
                if (resp.trim() === 'exists') {
                    $('#searchForm')[0].submit();
                } else {
                    $('#resultado').html('<div class="alert alert-warning"><i class="fas fa-exclamation-triangle me-2"></i>Work Order ' + wo + ' not found</div>');
                }
            }
        });
    });
});
</script>

</body>
</html>