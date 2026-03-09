<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Ruta correcta al bootstrap.php
require_once dirname(__DIR__) . '/bootstrap.php';

// Verificar que el usuario es ADMIN (Nivel 99)
if (!isset($_SESSION['Nombre']) || $_SESSION['Nivel'] != 99) {
    header("Location: index.php");
    exit;
}

// Procesar acciones del formulario
$mensaje = '';
$error = '';

// Función para registrar en audit_log
function registrarAudit($enlace, $table_name, $record_id, $action, $old_data = null, $new_data = null) {
    $user_clock = isset($_SESSION['No_Reloj']) ? intval($_SESSION['No_Reloj']) : 'NULL';
    $old_data = $old_data ? "'" . mysqli_real_escape_string($enlace, json_encode($old_data, JSON_UNESCAPED_UNICODE)) . "'" : "NULL";
    $new_data = $new_data ? "'" . mysqli_real_escape_string($enlace, json_encode($new_data, JSON_UNESCAPED_UNICODE)) . "'" : "NULL";
    
    $query = "INSERT INTO audit_log (table_name, record_id, action, user_clock, old_data, new_data, created_at) 
              VALUES ('$table_name', '$record_id', '$action', $user_clock, $old_data, $new_data, NOW())";
    
    return mysqli_query($enlace, $query);
}

// 1. REGISTER NEW USER
if (isset($_POST['action']) && $_POST['action'] == 'register_user') {
    $clock_number = mysqli_real_escape_string($enlace, $_POST['clock_number']);
    $full_name = mysqli_real_escape_string($enlace, $_POST['full_name']);
    $password = sha1($_POST['password']);
    $shift = intval($_POST['shift']);
    $level = intval($_POST['level']);
    $default_bay = intval($_POST['default_bay']);
    
    // Check if already exists
    $check = mysqli_query($enlace, "SELECT id FROM users WHERE clock_number = '$clock_number'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Clock number $clock_number is already registered";
    } else {
        $query = "INSERT INTO users (clock_number, full_name, password_hash, shift, level, default_bay, is_active, created_at) 
                  VALUES ('$clock_number', '$full_name', '$password', '$shift', '$level', '$default_bay', 1, NOW())";
        if (mysqli_query($enlace, $query)) {
            $user_id = mysqli_insert_id($enlace);
            $mensaje = "User $full_name registered successfully";
            
            // Register in audit_log
            $new_data = [
                'clock_number' => $clock_number,
                'full_name' => $full_name,
                'shift' => $shift,
                'level' => $level,
                'default_bay' => $default_bay
            ];
            registrarAudit($enlace, 'users', $user_id, 'INSERT', null, $new_data);
        } else {
            $error = "Error registering user: " . mysqli_error($enlace);
        }
    }
}

// 2. MOVE/UPDATE RACK
if (isset($_POST['action']) && $_POST['action'] == 'move_rack') {
    $rack_id = intval($_POST['rack_id']);
    $new_bay = isset($_POST['new_bay']) && $_POST['new_bay'] !== '' ? intval($_POST['new_bay']) : null;
    $new_location = !empty($_POST['new_location']) ? mysqli_real_escape_string($enlace, $_POST['new_location']) : null;
    
    // Get current rack data
    $rack_query = mysqli_query($enlace, "SELECT * FROM racks WHERE id = '$rack_id'");
    if (!$rack_query || mysqli_num_rows($rack_query) == 0) {
        $error = "Selected rack does not exist";
    } else {
        $rack_actual = mysqli_fetch_assoc($rack_query);
        
        // Check if new location is available (if not empty)
        if (!empty($new_location)) {
            $location_check = mysqli_query($enlace, "SELECT id FROM racks WHERE location_code = '$new_location' AND id != '$rack_id'");
            if (mysqli_num_rows($location_check) > 0) {
                $error = "Location $new_location is already occupied by another rack";
            }
        }
        
        if (empty($error)) {
            $update_fields = [];
            $old_data = [];
            $new_data = [];
            
            if (!is_null($new_bay) && $new_bay != $rack_actual['bay_number']) {
                $update_fields[] = "bay_number = '$new_bay'";
                $old_data['bay_number'] = $rack_actual['bay_number'];
                $new_data['bay_number'] = $new_bay;
            }
            
            if (!empty($new_location) && $new_location != $rack_actual['location_code']) {
                $update_fields[] = "location_code = '$new_location'";
                $old_data['location_code'] = $rack_actual['location_code'];
                $new_data['location_code'] = $new_location;
            }
            
            if (!empty($update_fields)) {
                $query = "UPDATE racks SET " . implode(', ', $update_fields) . " WHERE id = '$rack_id'";
                if (mysqli_query($enlace, $query)) {
                    $mensaje = "Rack " . $rack_actual['serial_number'] . " updated successfully";
                    
                    // Register in audit_log
                    registrarAudit($enlace, 'racks', $rack_id, 'UPDATE', $old_data, $new_data);
                } else {
                    $error = "Error moving rack: " . mysqli_error($enlace);
                }
            }
        }
    }
}

// 3. MODIFY RACK
if (isset($_POST['action']) && $_POST['action'] == 'update_rack') {
    $rack_id = intval($_POST['rack_id']);
    
    // Get current rack data
    $rack_query = mysqli_query($enlace, "SELECT * FROM racks WHERE id = '$rack_id'");
    if (!$rack_query || mysqli_num_rows($rack_query) == 0) {
        $error = "Selected rack does not exist";
    } else {
        $rack_actual = mysqli_fetch_assoc($rack_query);
        
        $work_order = !empty($_POST['work_order']) ? "'" . mysqli_real_escape_string($enlace, $_POST['work_order']) . "'" : "NULL";
        $sku = !empty($_POST['sku']) ? "'" . mysqli_real_escape_string($enlace, $_POST['sku']) . "'" : "NULL";
        $model_id = !empty($_POST['model_id']) ? intval($_POST['model_id']) : "NULL";
        
        $update_fields = [];
        $old_data = [];
        $new_data = [];
        
        if ($work_order != "NULL" && $work_order != "'" . $rack_actual['work_order'] . "'") {
            $update_fields[] = "work_order = $work_order";
            $old_data['work_order'] = $rack_actual['work_order'];
            $new_data['work_order'] = $_POST['work_order'];
        }
        
        if ($sku != "NULL" && $sku != "'" . $rack_actual['sku'] . "'") {
            $update_fields[] = "sku = $sku";
            $old_data['sku'] = $rack_actual['sku'];
            $new_data['sku'] = $_POST['sku'];
        }
        
        if ($model_id != "NULL" && $model_id != $rack_actual['model_id']) {
            $update_fields[] = "model_id = $model_id";
            $old_data['model_id'] = $rack_actual['model_id'];
            $new_data['model_id'] = $model_id;
        }
        
        if (!empty($update_fields)) {
            $query = "UPDATE racks SET " . implode(', ', $update_fields) . " WHERE id = '$rack_id'";
            if (mysqli_query($enlace, $query)) {
                $mensaje = "Rack " . $rack_actual['serial_number'] . " updated successfully";
                
                // Register in audit_log
                registrarAudit($enlace, 'racks', $rack_id, 'UPDATE', $old_data, $new_data);
            } else {
                $error = "Error updating rack: " . mysqli_error($enlace);
            }
        } else {
            $mensaje = "No changes were made to the rack";
        }
    }
}

// 4. DELETE RACK
if (isset($_POST['action']) && $_POST['action'] == 'delete_rack') {
    $rack_id = intval($_POST['rack_id']);
    
    // Get rack information before deleting
    $rack_info = mysqli_query($enlace, "SELECT * FROM racks WHERE id = '$rack_id'");
    if (!$rack_info || mysqli_num_rows($rack_info) == 0) {
        $error = "Selected rack does not exist";
    } else {
        $rack = mysqli_fetch_assoc($rack_info);
        $serial = $rack['serial_number'] ?? 'Unknown';
        
        // Register in audit_log before deleting
        registrarAudit($enlace, 'racks', $rack_id, 'DELETE', $rack, null);
        
        // Delete in order (dependencies first)
        mysqli_query($enlace, "DELETE FROM comments WHERE rack_id = '$rack_id'");
        mysqli_query($enlace, "DELETE FROM test_results WHERE rack_id = '$rack_id'");
        $query = "DELETE FROM racks WHERE id = '$rack_id'";
        
        if (mysqli_query($enlace, $query)) {
            $mensaje = "Rack $serial permanently deleted";
        } else {
            $error = "Error deleting rack: " . mysqli_error($enlace);
        }
    }
}

// 5. UPDATE RACK COMMENT
if (isset($_POST['action']) && $_POST['action'] == 'update_comment') {
    $rack_id = intval($_POST['rack_id']);
    $comment = mysqli_real_escape_string($enlace, $_POST['comment']);
    
    // Get current comment
    $rack_query = mysqli_query($enlace, "SELECT comments FROM racks WHERE id = '$rack_id'");
    $rack_actual = mysqli_fetch_assoc($rack_query);
    
    $query = "UPDATE racks SET comments = '$comment' WHERE id = '$rack_id'";
    if (mysqli_query($enlace, $query)) {
        $mensaje = "Comment updated for rack ID $rack_id";
        
        // Register in audit_log
        $old_data = ['comments' => $rack_actual['comments']];
        $new_data = ['comments' => $comment];
        registrarAudit($enlace, 'racks', $rack_id, 'UPDATE', $old_data, $new_data);
    } else {
        $error = "Error updating comment: " . mysqli_error($enlace);
    }
}

// 6. DELETE RACK COMMENT
if (isset($_POST['action']) && $_POST['action'] == 'delete_comment') {
    $rack_id = intval($_POST['rack_id']);
    
    // Get current comment
    $rack_query = mysqli_query($enlace, "SELECT comments FROM racks WHERE id = '$rack_id'");
    $rack_actual = mysqli_fetch_assoc($rack_query);
    
    $query = "UPDATE racks SET comments = NULL WHERE id = '$rack_id'";
    if (mysqli_query($enlace, $query)) {
        $mensaje = "Comment deleted for rack ID $rack_id";
        
        // Register in audit_log
        $old_data = ['comments' => $rack_actual['comments']];
        $new_data = ['comments' => null];
        registrarAudit($enlace, 'racks', $rack_id, 'UPDATE', $old_data, $new_data);
    } else {
        $error = "Error deleting comment: " . mysqli_error($enlace);
    }
}

// 7. ACTIVATE/DEACTIVATE USER
if (isset($_POST['action']) && $_POST['action'] == 'toggle_user') {
    $user_id = intval($_POST['user_id']);
    $is_active = intval($_POST['is_active']);
    
    // Get current status
    $user_query = mysqli_query($enlace, "SELECT is_active FROM users WHERE id = '$user_id'");
    $user_actual = mysqli_fetch_assoc($user_query);
    
    $query = "UPDATE users SET is_active = '$is_active' WHERE id = '$user_id'";
    if (mysqli_query($enlace, $query)) {
        $status = $is_active ? 'activated' : 'deactivated';
        $mensaje = "User ID $user_id $status successfully";
        
        // Register in audit_log
        $old_data = ['is_active' => $user_actual['is_active']];
        $new_data = ['is_active' => $is_active];
        registrarAudit($enlace, 'users', $user_id, 'UPDATE', $old_data, $new_data);
    } else {
        $error = "Error changing user status: " . mysqli_error($enlace);
    }
}

// Get lists for selects
$usuarios = mysqli_query($enlace, "SELECT id, clock_number, full_name, level, shift, default_bay, is_active, last_login 
                                   FROM users ORDER BY level DESC, full_name");

$racks = mysqli_query($enlace, "SELECT r.id, r.serial_number, r.work_order, r.sku, r.bay_number, 
                                       r.location_code, r.comments, r.created_at,
                                       m.model_code, m.display_name as model_name
                                FROM racks r
                                LEFT JOIN rack_models m ON r.model_id = m.id
                                ORDER BY r.location_code");

// Get models for select
$modelos = mysqli_query($enlace, "SELECT id, model_code, display_name FROM rack_models ORDER BY model_code");

// Get audit log
$audit_log = mysqli_query($enlace, "SELECT * FROM audit_log ORDER BY created_at DESC LIMIT 50");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Test Dashboard</title>
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
        
        .card-header {
            background-color: #2574A9;
            color: white;
            font-weight: bold;
        }
        .btn-admin {
            background-color: #2574A9;
            color: white;
        }
        .btn-admin:hover {
            background-color: #1a5a8c;
            color: white;
        }
        .table-comentarios {
            font-size: 12px;
        }
        .comentario-preview {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .audit-log {
            font-size: 11px;
            max-height: 200px;
            overflow-y: auto;
        }
        .audit-log td {
            padding: 4px;
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
                    <a class="nav-link" href="stats.php"><i class="fas fa-chart-line me-1"></i>Times</a>
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
    <!-- Messages -->
    <?php if ($mensaje): ?>
        <div class="alert alert-success alert-dismissible fade show"><?php echo $mensaje; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger alert-dismissible fade show"><?php echo $error; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>

    <div class="row">
        <!-- Left column: User registration -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <i class="fas fa-user-plus me-2"></i>Register New User
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="register_user">
                        <div class="mb-3">
                            <label class="form-label">Clock Number</label>
                            <input type="number" class="form-control" name="clock_number" required maxlength="5">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="full_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Shift</label>
                                <select class="form-select" name="shift" required>
                                    <option value="1">1st</option>
                                    <option value="2">2nd</option>
                                    <option value="3">3rd</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Level</label>
                                <select class="form-select" name="level" required>
                                    <option value="1">1 - Technician</option>
                                    <option value="2">2 - JR</option>
                                    <option value="3">3 - Eng/Leader</option>
                                    <option value="99">99 - Admin</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Default Bay</label>
                                <select class="form-select" name="default_bay">
                                    <option value="0">None</option>
                                    <?php for ($b = 1; $b <= 10; $b++): ?>
                                    <option value="<?php echo $b; ?>">Bay <?php echo $b; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-admin w-100"><i class="fas fa-save me-2"></i>Register User</button>
                    </form>
                </div>
            </div>

            <!-- User list -->
            <div class="card shadow mt-4">
                <div class="card-header">
                    <i class="fas fa-users me-2"></i>Registered Users
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 300px;">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Clock</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Shift</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($user = mysqli_fetch_assoc($usuarios)): ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['clock_number']; ?></td>
                                    <td><?php echo $user['full_name']; ?></td>
                                    <td>
                                        <?php
                                        if ($user['level'] == 1) echo '<span class="badge bg-secondary">Technician</span>';
                                        elseif ($user['level'] == 2) echo '<span class="badge bg-warning text-dark">JR</span>';
                                        elseif ($user['level'] == 3) echo '<span class="badge bg-info">Eng/Leader</span>';
                                        elseif ($user['level'] == 99) echo '<span class="badge bg-danger">Admin</span>';
                                        ?>
                                    </td>
                                    <td><?php echo $user['shift']; ?>°</td>
                                    <td>
                                        <?php if ($user['is_active']): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="action" value="toggle_user">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            <input type="hidden" name="is_active" value="<?php echo $user['is_active'] ? 0 : 1; ?>">
                                            <button type="submit" class="btn btn-sm <?php echo $user['is_active'] ? 'btn-warning' : 'btn-success'; ?>">
                                                <i class="fas <?php echo $user['is_active'] ? 'fa-ban' : 'fa-check'; ?>"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center column: Rack management -->
        <div class="col-md-4 mb-4">
            <!-- Move rack -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <i class="fas fa-arrows-alt me-2"></i>Move/Update Rack
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="move_rack">
                        <div class="mb-3">
                            <label class="form-label">Select Rack</label>
                            <select class="form-select" name="rack_id" required>
                                <option value="">-- Select --</option>
                                <?php 
                                mysqli_data_seek($racks, 0);
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                ?>
                                <option value="<?php echo $rack['id']; ?>">
                                    <?php echo $rack['location_code'] . ' - ' . $rack['serial_number'] . ' (' . ($rack['model_name'] ?? 'No model') . ')'; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">New Bay</label>
                                <select class="form-select" name="new_bay">
                                    <option value="">No change</option>
                                    <?php for ($b = 1; $b <= 10; $b++): ?>
                                    <option value="<?php echo $b; ?>">Bay <?php echo $b; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">New Location</label>
                                <input type="text" class="form-control" name="new_location" placeholder="Ex: TR01-01">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-admin w-100"><i class="fas fa-exchange-alt me-2"></i>Update Rack</button>
                    </form>
                </div>
            </div>

            <!-- Modify rack -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-2"></i>Modify Rack
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="update_rack">
                        <div class="mb-3">
                            <label class="form-label">Select Rack</label>
                            <select class="form-select" id="rackSelect" name="rack_id" required>
                                <option value="">-- Select --</option>
                                <?php 
                                mysqli_data_seek($racks, 0);
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                ?>
                                <option value="<?php echo $rack['id']; ?>" 
                                        data-wo="<?php echo $rack['work_order']; ?>"
                                        data-sku="<?php echo $rack['sku']; ?>"
                                        data-model="<?php echo $rack['model_id']; ?>">
                                    <?php echo $rack['location_code'] . ' - ' . $rack['serial_number']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Work Order</label>
                            <input type="text" class="form-control" id="woInput" name="work_order">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" id="skuInput" name="sku">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Model</label>
                            <select class="form-select" id="modelSelect" name="model_id">
                                <option value="">Select model</option>
                                <?php 
                                mysqli_data_seek($modelos, 0);
                                while ($modelo = mysqli_fetch_assoc($modelos)): 
                                ?>
                                <option value="<?php echo $modelo['id']; ?>">
                                    <?php echo $modelo['model_code'] . ' - ' . $modelo['display_name']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning w-100"><i class="fas fa-save me-2"></i>Update Rack</button>
                    </form>
                </div>
            </div>

            <!-- Delete rack -->
            <div class="card shadow border-danger">
                <div class="card-header bg-danger text-white">
                    <i class="fas fa-trash me-2"></i>Delete Rack (Permanent)
                </div>
                <div class="card-body">
                    <form method="POST" onsubmit="return confirm('Are you SURE you want to delete this rack? All tests and comments will be deleted.')">
                        <input type="hidden" name="action" value="delete_rack">
                        <div class="mb-3">
                            <label class="form-label">Select Rack</label>
                            <select class="form-select" name="rack_id" required>
                                <option value="">-- Select --</option>
                                <?php 
                                mysqli_data_seek($racks, 0);
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                ?>
                                <option value="<?php echo $rack['id']; ?>">
                                    <?php echo $rack['location_code'] . ' - ' . $rack['serial_number']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger w-100"><i class="fas fa-trash me-2"></i>Delete Rack</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right column: Comments and audit log -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <i class="fas fa-comments me-2"></i>Manage Comments
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 300px;">
                        <table class="table table-bordered table-hover table-comentarios">
                            <thead class="table-dark">
                                <tr>
                                    <th>Location</th>
                                    <th>Serial</th>
                                    <th>Comment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                mysqli_data_seek($racks, 0);
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                ?>
                                <tr>
                                    <td><?php echo $rack['location_code']; ?></td>
                                    <td><?php echo $rack['serial_number']; ?></td>
                                    <td class="comentario-preview" title="<?php echo htmlspecialchars($rack['comments'] ?? ''); ?>">
                                        <?php echo $rack['comments'] ?: '<span class="text-muted fst-italic">empty</span>'; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editCommentModal" 
                                                data-id="<?php echo $rack['id']; ?>"
                                                data-serial="<?php echo $rack['serial_number']; ?>"
                                                data-comment="<?php echo htmlspecialchars($rack['comments'] ?? ''); ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Delete comment?')">
                                            <input type="hidden" name="action" value="delete_comment">
                                            <input type="hidden" name="rack_id" value="<?php echo $rack['id']; ?>">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Audit Log -->
            <div class="card shadow mt-4">
                <div class="card-header">
                    <i class="fas fa-history me-2"></i>Recent Audit Log
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive audit-log">
                        <?php if ($audit_log && mysqli_num_rows($audit_log) > 0): ?>
                        <table class="table table-sm table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Table</th>
                                    <th>Record</th>
                                    <th>Action</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($log = mysqli_fetch_assoc($audit_log)): ?>
                                <tr>
                                    <td><?php echo date('m/d H:i', strtotime($log['created_at'])); ?></td>
                                    <td><?php echo $log['table_name']; ?></td>
                                    <td><?php echo $log['record_id']; ?></td>
                                    <td>
                                        <?php
                                        $badge_class = 'secondary';
                                        if ($log['action'] == 'INSERT') $badge_class = 'success';
                                        elseif ($log['action'] == 'UPDATE') $badge_class = 'warning';
                                        elseif ($log['action'] == 'DELETE') $badge_class = 'danger';
                                        ?>
                                        <span class="badge bg-<?php echo $badge_class; ?>"><?php echo $log['action']; ?></span>
                                    </td>
                                    <td><?php echo $log['user_clock'] ?: 'System'; ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <div class="text-center p-3 text-muted">
                            <i class="fas fa-info-circle me-2"></i>No audit records found
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for editing comments -->
<div class="modal fade" id="editCommentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Edit Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="update_comment">
                    <input type="hidden" name="rack_id" id="editRackId">
                    <div class="mb-3">
                        <label class="form-label">Rack: <span id="editRackSerial" class="fw-bold"></span></label>
                        <textarea class="form-control" name="comment" id="editComment" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Update Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Load rack data in modify form
    $('#rackSelect').change(function() {
        var selected = $(this).find(':selected');
        $('#woInput').val(selected.data('wo'));
        $('#skuInput').val(selected.data('sku'));
        $('#modelSelect').val(selected.data('model'));
    });

    // Load data in comment modal
    $('#editCommentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var serial = button.data('serial');
        var comment = button.data('comment');
        
        $('#editRackId').val(id);
        $('#editRackSerial').text(serial);
        $('#editComment').val(comment);
    });
</script>
</body>
</html>