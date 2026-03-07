<?php
session_start();
include('conexion.php');

// Verificar que el usuario es ADMIN (Nivel 99)
if (!isset($_SESSION['Nombre']) || $_SESSION['Nivel'] != 99) {
    header("Location: index.php");
    exit;
}

// Procesar acciones del formulario
$mensaje = '';
$error = '';

// 1. REGISTRAR NUEVO USUARIO
if (isset($_POST['action']) && $_POST['action'] == 'register_user') {
    $No_Reloj = mysqli_real_escape_string($enlace, $_POST['No_Reloj']);
    $Nombre = mysqli_real_escape_string($enlace, $_POST['Nombre']);
    $Pass = sha1($_POST['Password']);
    $Turno = intval($_POST['Turno']);
    $Nivel = intval($_POST['Nivel']);
    $Bahia = intval($_POST['Bahia']);
    
    // Verificar si ya existe
    $check = mysqli_query($enlace, "SELECT No_Reloj FROM users WHERE No_Reloj = '$No_Reloj'");
    if (mysqli_num_rows($check) > 0) {
        $error = "El número de reloj $No_Reloj ya está registrado";
    } else {
        $query = "INSERT INTO users (No_Reloj, Pass, Nombre, Turno, Nivel, Bahia) 
                  VALUES ('$No_Reloj', '$Pass', '$Nombre', '$Turno', '$Nivel', '$Bahia')";
        if (mysqli_query($enlace, $query)) {
            $mensaje = "Usuario $Nombre registrado correctamente";
        } else {
            $error = "Error al registrar usuario: " . mysqli_error($enlace);
        }
    }
}

// 2. MOVER RACK DE BAHÍA
if (isset($_POST['action']) && $_POST['action'] == 'move_rack') {
    $NoSerie = mysqli_real_escape_string($enlace, $_POST['NoSerie']);
    $nuevaBahia = intval($_POST['nuevaBahia']);
    $nuevaLocacion = mysqli_real_escape_string($enlace, $_POST['nuevaLocacion']);
    
    // Verificar que la nueva locación esté disponible
    $check = mysqli_query($enlace, "SELECT NoSerie FROM racksmicro WHERE Locacion = '$nuevaLocacion'");
    if (mysqli_num_rows($check) > 0) {
        $error = "La locación $nuevaLocacion ya está ocupada";
    } else {
        $query = "UPDATE racksmicro SET Bahia = '$nuevaBahia', Locacion = '$nuevaLocacion' WHERE NoSerie = '$NoSerie'";
        if (mysqli_query($enlace, $query)) {
            $mensaje = "Rack $NoSerie movido a $nuevaLocacion";
        } else {
            $error = "Error al mover rack: " . mysqli_error($enlace);
        }
    }
}

// 3. MODIFICAR RACK (ACTUALIZAR)
if (isset($_POST['action']) && $_POST['action'] == 'update_rack') {
    $NoSerie = mysqli_real_escape_string($enlace, $_POST['NoSerie']);
    $WO = mysqli_real_escape_string($enlace, $_POST['WO']);
    $SKU = mysqli_real_escape_string($enlace, $_POST['SKU']);
    $Modelo = mysqli_real_escape_string($enlace, $_POST['Modelo']);
    
    $query = "UPDATE racksmicro SET WO = '$WO', SKU = '$SKU', Modelo = '$Modelo' WHERE NoSerie = '$NoSerie'";
    if (mysqli_query($enlace, $query)) {
        $mensaje = "Rack $NoSerie actualizado correctamente";
    } else {
        $error = "Error al actualizar rack: " . mysqli_error($enlace);
    }
}

// 4. ELIMINAR RACK
if (isset($_POST['action']) && $_POST['action'] == 'delete_rack') {
    $NoSerie = mysqli_real_escape_string($enlace, $_POST['NoSerie']);
    
    // Eliminar en orden (primero dependencias)
    mysqli_query($enlace, "DELETE FROM comentarios WHERE NoSerie = '$NoSerie'");
    mysqli_query($enlace, "DELETE FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
    $query = "DELETE FROM racksmicro WHERE NoSerie = '$NoSerie'";
    
    if (mysqli_query($enlace, $query)) {
        $mensaje = "Rack $NoSerie eliminado permanentemente";
    } else {
        $error = "Error al eliminar rack: " . mysqli_error($enlace);
    }
}

// 5. MODIFICAR COMENTARIO DE BAHÍA (JRS)
if (isset($_POST['action']) && $_POST['action'] == 'update_comentario') {
    $NoSerie = mysqli_real_escape_string($enlace, $_POST['NoSerie']);
    $comentario = mysqli_real_escape_string($enlace, $_POST['comentario']);
    
    $query = "UPDATE racksmicro SET comentarios_JRS = '$comentario' WHERE NoSerie = '$NoSerie'";
    if (mysqli_query($enlace, $query)) {
        $mensaje = "Comentario actualizado para $NoSerie";
    } else {
        $error = "Error al actualizar comentario: " . mysqli_error($enlace);
    }
}

// 6. ELIMINAR COMENTARIO DE BAHÍA
if (isset($_POST['action']) && $_POST['action'] == 'delete_comentario') {
    $NoSerie = mysqli_real_escape_string($enlace, $_POST['NoSerie']);
    
    $query = "UPDATE racksmicro SET comentarios_JRS = '' WHERE NoSerie = '$NoSerie'";
    if (mysqli_query($enlace, $query)) {
        $mensaje = "Comentario eliminado para $NoSerie";
    } else {
        $error = "Error al eliminar comentario: " . mysqli_error($enlace);
    }
}

// Obtener listados para los selects
$usuarios = mysqli_query($enlace, "SELECT No_Reloj, Nombre, Nivel, Turno, Bahia FROM users ORDER BY Nivel, Nombre");
$racks = mysqli_query($enlace, "SELECT NoSerie, WO, SKU, Modelo, Bahia, Locacion, comentarios_JRS FROM racksmicro WHERE Modelo IN ('Microsoft 8.2', 'Microsoft 8.3', 'NPI') ORDER BY Locacion");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración General</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Estilos originales -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="shortcut icon" href="img/checkicon.png">

    
    
    <style>
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
        <style>
        /* =====================================================
           FIX: style.css tiene ul/li/nav globales que rompen
           los dropdowns de Bootstrap
        ====================================================== */
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
           GLASSMORPHISM — Navbar y Dropdowns
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
        /* Dropdown centrado bajo cada item — similar al cbp original */
        nav.navbar .dropdown-menu {
            left: 50% !important;
            transform: translateX(-50%) !important;
            margin-top: 2px !important;
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

<!-- HEADER (igual que las demás páginas) -->
<!-- HEADER - EXACTAMENTE IGUAL QUE BAHIA1.PHP -->
<header style="background-image: url('img/try6.jpg');">
    <div class="grupo ">
        <div class="caja">
            <div class="container">
                <header class="clearfix header2">
                    <span>Ingenieria de pruebas</span>
                    <a href="index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Microsoft Azure</h1></a>

                    <?php if(isset($_SESSION['Nombre'])): ?>
                    <div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;">
                        <p class="info" title="">
                            <?php echo $_SESSION["Nombre"]; ?>
                            <span>N&uacute;mero de reloj: <?php echo $_SESSION["No_Reloj"]; ?><br>Turno: <?php echo $_SESSION['Turno']; ?>&deg;</span>
                        </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($_SESSION['Nombre']) && $_SESSION['Nivel']==1): ?>
                    <div class="" style="position:absolute; right:5px; top:5px;">
                        <a class="" href="administrar.php"><img width="25" src="img/admin.png"></a>
                    </div>
                    <?php endif; ?>
                </header>
            </div>
        </div>
    </div>
</header>

<!-- Menú de navegación Bootstrap (igual que bahia1.php) -->
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
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home me-1"></i>Inicio
                    </a>
                </li>

                <!-- LÍNEA 1 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Línea 1
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia1.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 1</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia2.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 2</a></li>
                    </ul>
                </li>

                <!-- LÍNEA 2 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Línea 2
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia3.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 3</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia4.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 4</a></li>
                    </ul>
                </li>

                <!-- LÍNEA 3 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Línea 3
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia5.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 5</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia6.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 6</a></li>
                    </ul>
                </li>

                <!-- LÍNEA 4 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Línea 4
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia7.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 7</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia8.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 8</a></li>
                    </ul>
                </li>

                <!-- LÍNEA 5 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Línea 5
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia9.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 9</a></li>
                        <li><a class="dropdown-item" href="/Statuspb/microsoft/bahia10.php">
                            <i class="fas fa-location-dot me-2"></i>Bahía 10</a></li>
                    </ul>
                </li>

                <!-- LÍNEA 6 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-server me-1"></i>Línea 6
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-location-dot me-2"></i>Bahía 11</a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-location-dot me-2"></i>Bahía 12</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="estadisticas.php">
                        <i class="fas fa-chart-line me-1"></i>Tiempos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="statusgral.php">
                        <i class="fas fa-chart-bar me-1"></i>Estatus General
                    </a>
                </li>

                <li class="nav-item ms-lg-3 ps-lg-3" style="border-left:1px solid rgba(255,255,255,0.15)">
                    <?php if(isset($_SESSION['Nombre'])): ?>
                    <a class="nav-link text-danger" href="logout.php">
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

<!-- Botón flotante para ADMIN GENERAL (solo visible para nivel 99) -->
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

<a href="admin_panel.php" class="admin-button" title="Panel de Administración General">
    <i class="fas fa-user-cog"></i>
    <span>Admin</span>
    <span class="badge-admin">Gral</span>
</a>
<?php endif; ?>

<!-- Contenido principal del panel de administración -->
<div class="container-fluid py-4">
    <!-- Mensajes -->
    <?php if ($mensaje): ?>
        <div class="alert alert-success alert-dismissible fade show"><?php echo $mensaje; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger alert-dismissible fade show"><?php echo $error; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>

    <div class="row">
        <!-- Columna izquierda: Registro de usuarios -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <i class="fas fa-user-plus me-2"></i>Registrar Nuevo Usuario
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="register_user">
                        <div class="mb-3">
                            <label class="form-label">Número de Reloj</label>
                            <input type="number" class="form-control" name="No_Reloj" required maxlength="5">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" name="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="Password" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Turno</label>
                                <select class="form-select" name="Turno" required>
                                    <option value="1">1°</option>
                                    <option value="2">2°</option>
                                    <option value="3">3°</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Nivel</label>
                                <select class="form-select" name="Nivel" required>
                                    <option value="1">1 - Técnico</option>
                                    <option value="2">2 - JR</option>
                                    <option value="3">3 - Ing/Líder</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bahía</label>
                                <select class="form-select" name="Bahia" required>
                                    <?php for ($b = 1; $b <= 10; $b++): ?>
                                    <option value="<?php echo $b; ?>">Bahía <?php echo $b; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-admin w-100"><i class="fas fa-save me-2"></i>Registrar Usuario</button>
                    </form>
                </div>
            </div>

            <!-- Lista de usuarios -->
            <div class="card shadow mt-4">
                <div class="card-header">
                    <i class="fas fa-users me-2"></i>Usuarios Registrados
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 300px;">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>NoReloj</th>
                                    <th>Nombre</th>
                                    <th>Nivel</th>
                                    <th>Turno</th>
                                    <th>Bahía</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($user = mysqli_fetch_assoc($usuarios)): ?>
                                <tr>
                                    <td><?php echo $user['No_Reloj']; ?></td>
                                    <td><?php echo $user['Nombre']; ?></td>
                                    <td>
                                        <?php
                                        if ($user['Nivel'] == 1) echo '<span class="badge bg-secondary">Técnico</span>';
                                        elseif ($user['Nivel'] == 2) echo '<span class="badge bg-warning text-dark">JR</span>';
                                        elseif ($user['Nivel'] == 3) echo '<span class="badge bg-info">Ing/Líder</span>';
                                        else echo '<span class="badge bg-danger">Admin</span>';
                                        ?>
                                    </td>
                                    <td><?php echo $user['Turno']; ?>°</td>
                                    <td><?php echo $user['Bahia']; ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna central: Gestión de racks -->
        <div class="col-md-4 mb-4">
            <!-- Mover rack -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <i class="fas fa-arrows-alt me-2"></i>Mover Rack de Bahía
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="move_rack">
                        <div class="mb-3">
                            <label class="form-label">Seleccionar Rack</label>
                            <select class="form-select" name="NoSerie" required>
                                <option value="">-- Seleccionar --</option>
                                <?php 
                                mysqli_data_seek($racks, 0);
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                ?>
                                <option value="<?php echo $rack['NoSerie']; ?>">
                                    <?php echo $rack['Locacion'] . ' - ' . $rack['NoSerie'] . ' (' . $rack['Modelo'] . ')'; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nueva Bahía</label>
                                <select class="form-select" name="nuevaBahia" required>
                                    <?php for ($b = 1; $b <= 10; $b++): ?>
                                    <option value="<?php echo $b; ?>">Bahía <?php echo $b; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nueva Locación</label>
                                <input type="text" class="form-control" name="nuevaLocacion" placeholder="Ej: TR01-01" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-admin w-100"><i class="fas fa-exchange-alt me-2"></i>Mover Rack</button>
                    </form>
                </div>
            </div>

            <!-- Modificar rack -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-2"></i>Modificar Rack
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="update_rack">
                        <div class="mb-3">
                            <label class="form-label">Seleccionar Rack</label>
                            <select class="form-select" id="rackSelect" name="NoSerie" required>
                                <option value="">-- Seleccionar --</option>
                                <?php 
                                mysqli_data_seek($racks, 0);
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                ?>
                                <option value="<?php echo $rack['NoSerie']; ?>" 
                                        data-wo="<?php echo $rack['WO']; ?>"
                                        data-sku="<?php echo $rack['SKU']; ?>"
                                        data-modelo="<?php echo $rack['Modelo']; ?>">
                                    <?php echo $rack['Locacion'] . ' - ' . $rack['NoSerie']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">WO</label>
                            <input type="text" class="form-control" id="woInput" name="WO" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" id="skuInput" name="SKU" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Modelo</label>
                            <select class="form-select" id="modeloSelect" name="Modelo" required>
                                <option value="Microsoft 8.2">Microsoft 8.2</option>
                                <option value="Microsoft 8.3">Microsoft 8.3</option>
                                <option value="NPI">NPI</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning w-100"><i class="fas fa-save me-2"></i>Actualizar Rack</button>
                    </form>
                </div>
            </div>

            <!-- Eliminar rack -->
            <div class="card shadow border-danger">
                <div class="card-header bg-danger text-white">
                    <i class="fas fa-trash me-2"></i>Eliminar Rack (Permanente)
                </div>
                <div class="card-body">
                    <form method="POST" onsubmit="return confirm('¿Estás SEGURO de eliminar este rack? Se borrarán todas sus pruebas y comentarios.')">
                        <input type="hidden" name="action" value="delete_rack">
                        <div class="mb-3">
                            <label class="form-label">Seleccionar Rack</label>
                            <select class="form-select" name="NoSerie" required>
                                <option value="">-- Seleccionar --</option>
                                <?php 
                                mysqli_data_seek($racks, 0);
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                ?>
                                <option value="<?php echo $rack['NoSerie']; ?>">
                                    <?php echo $rack['Locacion'] . ' - ' . $rack['NoSerie']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger w-100"><i class="fas fa-trash me-2"></i>Eliminar Rack</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Columna derecha: Gestión de comentarios -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <i class="fas fa-comments me-2"></i>Gestionar Comentarios de Bahía (JRS)
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 500px;">
                        <table class="table table-bordered table-hover table-comentarios">
                            <thead class="table-dark">
                                <tr>
                                    <th>Locación</th>
                                    <th>No Serie</th>
                                    <th>Comentario Actual</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                mysqli_data_seek($racks, 0);
                                while ($rack = mysqli_fetch_assoc($racks)): 
                                ?>
                                <tr>
                                    <td><?php echo $rack['Locacion']; ?></td>
                                    <td><?php echo $rack['NoSerie']; ?></td>
                                    <td class="comentario-preview" title="<?php echo htmlspecialchars($rack['comentarios_JRS']); ?>">
                                        <?php echo $rack['comentarios_JRS'] ?: '<span class="text-muted fst-italic">vacío</span>'; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editComentarioModal" 
                                                data-serie="<?php echo $rack['NoSerie']; ?>"
                                                data-comentario="<?php echo htmlspecialchars($rack['comentarios_JRS']); ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar comentario?')">
                                            <input type="hidden" name="action" value="delete_comentario">
                                            <input type="hidden" name="NoSerie" value="<?php echo $rack['NoSerie']; ?>">
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
        </div>
    </div>
</div>

<!-- Modal para editar comentario -->
<div class="modal fade" id="editComentarioModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Editar Comentario de Bahía</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="update_comentario">
                    <input type="hidden" name="NoSerie" id="editNoSerie">
                    <div class="mb-3">
                        <label class="form-label">Comentario</label>
                        <textarea class="form-control" name="comentario" id="editComentario" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Actualizar Comentario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Cargar datos del rack en el formulario de modificar
    $('#rackSelect').change(function() {
        var selected = $(this).find(':selected');
        $('#woInput').val(selected.data('wo'));
        $('#skuInput').val(selected.data('sku'));
        $('#modeloSelect').val(selected.data('modelo'));
    });

    // Cargar datos en el modal de comentarios
    $('#editComentarioModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var serie = button.data('serie');
        var comentario = button.data('comentario');
        
        $('#editNoSerie').val(serie);
        $('#editComentario').val(comentario);
    });
</script>
</body>
</html>