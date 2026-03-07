<?php
include('conexion.php');
include('consultas1.php');
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bahia 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Estilos originales -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="shortcut icon" href="img/checkicon.png">

    <?php include('css/themes.php'); ?>

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

        /* =====================================================
           CUADROS DE TR's
        ====================================================== */
.tr-cuadro {
    width: 205px;        /* Original 150px +20% */
    height: 140px;       /* Original 120px +20% */
    border-radius: 6px;
    transition: transform 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
}
.tr-cuadro:hover {
    transform: scale(1.05);
}
.trs { background-color: #2574A9; } /* Microsoft 8.2 - Azul */
.trs2 { background-color: #049372; } /* Microsoft 8.3 - Verde */
.trs3 { background-color: #3e3e3e; } /* Disponible - Gris */
.trs4 { background-color: #e26715; } /* NPI - Naranja */

.tr-cuadro a {
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
    padding: 10px 6px;   /* Más padding interno */
    display: flex;
    flex-direction: column;
    height: 100%;
}
.tr-titulo {
    font-weight: bold;
    font-size: 19px;      /* Original 14px +15% = 16.1px */
    margin-bottom: 8px;
    white-space: nowrap;
    line-height: 1.2;
}
.tr-prueba {
    font-size: 20px;      /* Original 13px +15% = 14.95px */
    margin-bottom: 8px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 1.2;
}
/* Los spans con colores heredan el tamaño */
.tr-prueba span {
    font-size: 20px;
    font-weight: bold;
}
.tr-serie {
    font-size: 19px;      /* Original 12px +15% = 13.8px */
    word-break: break-all;
    overflow-wrap: break-word;
    max-width: 189px;     /* Ajustado al nuevo ancho */
    margin: 0 auto;
    line-height: 1.3;
    padding: 0 4px;
}

        /* =====================================================
           NOTEPAD FLOTANTE
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
        .comandos-textarea {
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
        .btn-copiar {
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
        .btn-copiar:hover { background: #1a5a8c; }
        .toast-notificacion {
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
        .toast-notificacion.show { opacity: 1; }

        /* =====================================================
           COMENTARIOS
        ====================================================== */
        .comentario-nota {
            background-color: #f9f9f9;
            border-left: 4px solid #2574A9;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: box-shadow 0.2s ease;
        }
        .comentario-nota:hover { box-shadow: 0 4px 8px rgba(0,0,0,0.15); }
        .comentario-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px dashed #ddd;
        }
        .comentario-tecnico { font-weight: bold; color: #2574A9; font-size: 1.1em; }
        .comentario-reloj { color: #6c757d; font-size: 0.85em; background: #e9ecef; padding: 2px 8px; border-radius: 12px; }
        .comentario-fecha { color: #6c757d; font-size: 0.85em; }
        .comentario-texto { color: #333; line-height: 1.5; white-space: pre-wrap; word-break: break-word; }
    </style>
</head>
<body class="desarroll">

<!-- ═══════════════════════════════════════════
     HEADER ORIGINAL
══════════════════════════════════════════════ -->
<header style="background-image: url('img/try6.jpg');">
    <div class="grupo">
        <div class="caja">
            <div class="container">
                <header class="clearfix header2">
                    <span>Ingenieria de pruebas</span>
                    <a href="index.php">
                        <h1><i class="fas fa-server" aria-hidden="true"></i> Microsoft Azure</h1>
                    </a>
                    <?php if(isset($_SESSION['Nombre'])): ?>
                    <div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;">
                        <p class="info" title="">
                            <?php echo $_SESSION['Nombre']; ?>
                            <span>N&uacute;mero de reloj: <?php echo $_SESSION['No_Reloj']; ?><br>
                            Turno: <?php echo $_SESSION['Turno']; ?>&deg;</span>
                        </p>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['Nombre']) && $_SESSION['Nivel'] == 1): ?>
                    <div style="position:absolute; right:5px; top:5px;">
                        <a href="administrar.php"><img width="25" src="img/admin.png"></a>
                    </div>
                    <?php endif; ?>
                </header>
            </div>
        </div>
    </div>
</header>
<!-- Botón discreto para ADMIN GENERAL (solo visible para nivel 99) -->
<?php if (isset($_SESSION['Nombre']) && $_SESSION['Nivel'] == 99): ?>
<style>
    .admin-button {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        background-color: #2574A9;  /* Azul del sistema */
        color: white;
        padding: 8px 15px;
        border-radius: 20px;  /* Bordes redondeados */
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
        background-color: #1a5a8c;  /* Azul más oscuro al hover */
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
   <i class="fas fa-key"></i></i></i></i></i></i></i></i>  <!-- Icono genérico de admin -->
    <span>Admin</span>
    <span class="badge-admin">Gral</span>
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

<!-- ═══════════════════════════════════════════
     MODAL LOGIN (CSS :target — sistema original)
══════════════════════════════════════════════ -->
<?php if(!isset($_SESSION['Nombre'])): ?>
<center>
<div id="modal" style="width:500px;">
    <div class="modal-content">
        <div class="header"><h2>Iniciar Sesion</h2></div>
        <div class="copy">
            <div class="grupo"><div class="caja">
                <form method="post" action="login.php" class="login">
                    <input type="text" name="Usuario" placeholder="N&uacute;mero de reloj"
                           required maxlength="5" pattern=".{5,}"
                           onkeypress="return justNumbers(event);">
                    <br>
                    <input type="password" name="Password" placeholder="Contrase&ntilde;a" required>
                    <script>
                        var URLactual = window.location.href + "#";
                        document.write("<input type='hidden' name='Url' value='" + URLactual + "'>");
                    </script>
                    <br><button style="width:300px;" class="btn1">Aceptar</button>
                    <br><input style="width:250px;" class="btn2" type="button" value="Cerrar"
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
     LEYENDA DE TIPOS DE RACK
══════════════════════════════════════════════ -->
<section class="container-fluid my-3 px-3">
    <div class="d-flex flex-wrap gap-2">
        <div class="px-3 py-2 rounded fw-bold text-white" style="background:#3e3e3e; opacity:.85; font-size:.85rem;">
            Disponible
        </div>
        <div class="px-3 py-2 rounded fw-bold text-white" style="background:#049372; font-size:.85rem;">
            <i class="fas fa-server me-1"></i>Microsoft 8.3
        </div>
        <div class="px-3 py-2 rounded fw-bold text-white" style="background:#e26715; font-size:.85rem;">
            <i class="fas fa-server me-1"></i>Microsoft NPI
        </div>
        <div class="px-3 py-2 rounded fw-bold text-white" style="background:#2574A9; font-size:.85rem;">
            <i class="fas fa-server me-1"></i>Microsoft 8.2
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     CUADROS DE TR's — 2 FILAS DE 5
══════════════════════════════════════════════ -->
<section class="container-fluid px-3 my-3">

    <!-- FILA 1: TR01-01 a TR01-05 -->
    <div class="d-flex flex-wrap gap-2 mb-2 justify-content-center">
        <?php for($i = 1; $i <= 5; $i++):
            $varModelo  = "contr$i";
            $varNoSerie = "NoSerie$i";
            $varPrueba  = "Prueba$i";

            $claseCuadro = 'trs3';
            if(isset($$varModelo['Modelo'])) {
                if     ($$varModelo['Modelo'] == 'Microsoft 8.2') $claseCuadro = 'trs';
                elseif ($$varModelo['Modelo'] == 'Microsoft 8.3') $claseCuadro = 'trs2';
                elseif ($$varModelo['Modelo'] == 'NPI')           $claseCuadro = 'trs4';
            }
            $trNum = 'TR01-' . str_pad($i, 2, '0', STR_PAD_LEFT);
        ?>
        <div class="tr-cuadro <?php echo $claseCuadro; ?>">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalRack"
               data-serie="<?php echo htmlspecialchars($$varNoSerie ?? ''); ?>"
               data-tr="<?php echo $trNum; ?>">
                <div class="tr-content">
                    <div class="tr-titulo"><?php echo $trNum; ?></div>
                    <div class="tr-prueba"><?php echo $$varPrueba ?? ''; ?></div>
                    <div class="tr-serie"><?php echo $$varNoSerie ?? ''; ?></div>
                </div>
            </a>
        </div>
        <?php endfor; ?>
    </div>

    <!-- FILA 2: TR01-06 a TR01-10 -->
    <div class="d-flex flex-wrap gap-2 justify-content-center">
        <?php for($i = 6; $i <= 10; $i++):
            $varModelo  = "contr$i";
            $varNoSerie = "NoSerie$i";
            $varPrueba  = "Prueba$i";

            $claseCuadro = 'trs3';
            if(isset($$varModelo['Modelo'])) {
                if     ($$varModelo['Modelo'] == 'Microsoft 8.2') $claseCuadro = 'trs';
                elseif ($$varModelo['Modelo'] == 'Microsoft 8.3') $claseCuadro = 'trs2';
                elseif ($$varModelo['Modelo'] == 'NPI')           $claseCuadro = 'trs4';
            }
            $trNum = 'TR01-' . str_pad($i, 2, '0', STR_PAD_LEFT);
        ?>
        <div class="tr-cuadro <?php echo $claseCuadro; ?>">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalRack"
               data-serie="<?php echo htmlspecialchars($$varNoSerie ?? ''); ?>"
               data-tr="<?php echo $trNum; ?>">
                <div class="tr-content">
                    <div class="tr-titulo"><?php echo $trNum; ?></div>
                    <div class="tr-prueba"><?php echo $$varPrueba ?? ''; ?></div>
                    <div class="tr-serie"><?php echo $$varNoSerie ?? ''; ?></div>
                </div>
            </a>
        </div>
        <?php endfor; ?>
    </div>

</section>

<!-- ═══════════════════════════════════════════
     IFRAME TABLA DE JR's (original)
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
        <iframe src="tabla_bahia1.php" loading="lazy"></iframe>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     HERRAMIENTAS (original)
══════════════════════════════════════════════ -->
<center><h1 style="font-size:3em;">Herramientas</h1></center><br>
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
     NOTEPAD PERSONAL (3 pestañas, localStorage)
══════════════════════════════════════════════ -->
<?php if(isset($_SESSION['No_Reloj'])):
    $userKey = 'user_' . $_SESSION['No_Reloj'];
?>
<div class="notepad-container" id="notepadContainer">
    <div class="notepad-header" id="notepadHeader">
        <span><i class="fas fa-terminal me-1"></i> Mis Comandos
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
                <i class="fas fa-code me-1"></i>Rápidos
            </button>
        </div>
        <div class="notepad-content">
            <div class="tab-pane active" id="tab1">
                <textarea class="comandos-textarea" id="comandos1" placeholder="Comandos generales..."></textarea>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <small class="text-muted"><i class="fas fa-floppy-disk me-1"></i>Auto-guardado</small>
                    <button class="btn-copiar" data-target="comandos1">
                        <i class="fas fa-copy me-1"></i>Copiar
                    </button>
                </div>
            </div>
            <div class="tab-pane" id="tab2">
                <textarea class="comandos-textarea" id="comandos2" placeholder="Comandos de configuración..."></textarea>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <small class="text-muted"><i class="fas fa-floppy-disk me-1"></i>Auto-guardado</small>
                    <button class="btn-copiar" data-target="comandos2">
                        <i class="fas fa-copy me-1"></i>Copiar
                    </button>
                </div>
            </div>
            <div class="tab-pane" id="tab3">
                <textarea class="comandos-textarea" id="comandos3" placeholder="Comandos rápidos..."></textarea>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <small class="text-muted"><i class="fas fa-floppy-disk me-1"></i>Auto-guardado</small>
                    <button class="btn-copiar" data-target="comandos3">
                        <i class="fas fa-copy me-1"></i>Copiar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="toast-notificacion" id="toastNotificacion">✅ Copiado</div>

<script>
(function() {
    const header   = document.getElementById('notepadHeader');
    const body     = document.getElementById('notepadBody');
    const chevron  = document.getElementById('notepadChevron');
    const tabs     = document.querySelectorAll('.notepad-tab');
    const panes    = document.querySelectorAll('.tab-pane');
    const toast    = document.getElementById('toastNotificacion');
    const userKey  = '<?php echo $userKey; ?>';
    const textareas = {
        1: document.getElementById('comandos1'),
        2: document.getElementById('comandos2'),
        3: document.getElementById('comandos3')
    };

    function mostrarToast(msg) {
        toast.textContent = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2000);
    }

    document.querySelectorAll('.btn-copiar').forEach(btn => {
        btn.title = 'Ctrl+Enter para copiar';
        btn.addEventListener('click', async function() {
            const ta = document.getElementById(this.dataset.target);
            try { await navigator.clipboard.writeText(ta.value); }
            catch(e) { ta.select(); document.execCommand('copy'); }
            mostrarToast('✅ Copiado');
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
            document.querySelector('.tab-pane.active .btn-copiar')?.click();
        }
    });
})();
</script>
<?php endif; ?>

<!-- ═══════════════════════════════════════════
     MODAL RACK — carga modales.php vía AJAX
══════════════════════════════════════════════ -->
<div class="modal fade" id="modalRack" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:#22313F; border-bottom:1px solid rgba(255,255,255,0.1);">
                <h5 class="modal-title text-white">
                    <i class="fas fa-server me-2" style="color:#59ABE3;"></i>
                    <span id="modalRackTR">Detalles del Rack</span>
                </h5>
                <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body bg-white" id="modalBodyContent">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-2 text-muted">Cargando información...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════
     SCRIPTS — orden obligatorio
══════════════════════════════════════════════ -->
<script src="js/dataTables/jquery-3.5.1.js"></script>
<script src="js/block.js"></script>
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
            <p class="mt-2 text-muted">Cargando...</p>
        </div>`;

    modalEl.addEventListener('show.bs.modal', function(e) {
        const btn   = e.relatedTarget;
        const serie = btn?.dataset.serie || '';
        const tr    = btn?.dataset.tr    || '';

        modalTR.textContent = tr || 'Detalles del Rack';
        modalBody.innerHTML = loadingHtml;

        fetch('modales.php?pb=' + encodeURIComponent(serie) +
                         '&tr=' + encodeURIComponent(tr))
            .then(r => r.ok ? r.text() : Promise.reject(r.status))
            .then(html => { modalBody.innerHTML = html; })
            .catch(() => {
                modalBody.innerHTML = `
                    <div class="alert alert-danger m-3">
                        <i class="fas fa-triangle-exclamation me-2"></i>
                        Error al cargar los datos. Intenta de nuevo.
                    </div>`;
            });
    });

    modalEl.addEventListener('hidden.bs.modal', function() {
        modalBody.innerHTML = loadingHtml;
    });
});
</script>

<?php if(isset($_SESSION['No_Reloj'])): ?>
<center><a href="../img/stats.php" style="opacity:0;">.</a></center>
<?php endif; ?>
</body>
</html>