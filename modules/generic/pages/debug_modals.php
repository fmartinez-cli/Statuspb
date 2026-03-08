<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<pre style='font-family:monospace; font-size:13px; padding:20px;'>";
echo "=== DIAGNÓSTICO v2 ===\n\n";

// ── 1. Rutas reales ───────────────────────────────────────────────────────
echo "1. RUTAS:\n";
echo "   __FILE__      = " . __FILE__ . "\n";
echo "   __DIR__       = " . __DIR__ . "\n";
echo "   DOCUMENT_ROOT = " . ($_SERVER['DOCUMENT_ROOT'] ?? 'N/A') . "\n\n";

// ── 2. Buscar conexion.php hacia arriba ───────────────────────────────────
echo "2. BUSCAR conexion.php (desde aqui hacia arriba):\n";
$dir = __DIR__;
$conexionPath = null;
for ($i = 0; $i < 6; $i++) {
    $try = $dir . DIRECTORY_SEPARATOR . 'conexion.php';
    echo "   " . $try . " ... " . (file_exists($try) ? "** ENCONTRADO **\n" : "no existe\n");
    if (file_exists($try)) { $conexionPath = $try; break; }
    $dir = dirname($dir);
}
if (!$conexionPath) echo "   !! conexion.php NO encontrado en ninguna carpeta padre\n";

// ── 3. Estructura de carpetas (solo archivos clave) ───────────────────────
echo "\n3. ARCHIVOS CLAVE EN EL PROYECTO:\n";
$root = $_SERVER['DOCUMENT_ROOT'] ?? dirname(__DIR__, 4);
try {
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    $claves = ['conexion.php','modals.php','bay1.php','index.php','database.php','config.php'];
    foreach ($it as $path => $info) {
        if ($it->getDepth() > 5) continue;
        if ($info->isFile() && in_array(basename($path), $claves)) {
            echo "   " . str_replace($root, '', $path) . "\n";
        }
    }
} catch (Exception $e) {
    echo "   Error listando: " . $e->getMessage() . "\n";
}

// ── 4. Conectar con la ruta encontrada ────────────────────────────────────
echo "\n4. CONEXION BD:\n";
if ($conexionPath) {
    include($conexionPath);
    if (isset($enlace) && $enlace && !$enlace->connect_errno) {
        $dbName = $enlace->query("SELECT DATABASE()")->fetch_row()[0];
        echo "   OK — Conectado. BD activa: $dbName\n";
    } else {
        echo "   ERROR — " . (isset($enlace) ? $enlace->connect_error : 'Variable $enlace no definida') . "\n";
    }
} else {
    echo "   SKIP — no se encontró conexion.php\n";
}

// ── 5. Tablas y columnas ──────────────────────────────────────────────────
if (isset($enlace) && $enlace && !$enlace->connect_errno) {
    echo "\n5. TABLAS EN LA BD:\n";
    $r = $enlace->query("SHOW TABLES");
    while ($row = $r->fetch_row()) echo "   " . $row[0] . "\n";

    echo "\n6. COLUMNAS TABLAS REQUERIDAS:\n";
    foreach (['racks','test_results','test_catalog','comments','users','rack_models'] as $t) {
        $r = $enlace->query("DESCRIBE `$t`");
        if (!$r) { echo "   FALTA  $t\n"; continue; }
        $cols = [];
        while ($row = $r->fetch_assoc()) $cols[] = $row['Field'];
        echo "   OK     $t: " . implode(', ', $cols) . "\n";
    }

    // ── 6. Query real que usa modals.php ─────────────────────────────────
    echo "\n7. QUERY PRINCIPAL DE MODALS.PHP:\n";
    $q = "SELECT r.*, m.display_name AS modelo_nombre
          FROM racks r
          LEFT JOIN rack_models m ON r.model_id = m.id
          WHERE r.serial_number = 'TEST' LIMIT 1";
    $res = $enlace->query($q);
    if ($res === false) {
        echo "   ERROR: " . $enlace->error . "\n";
        echo "   QUERY: $q\n";
    } else {
        echo "   OK — query ejecutada sin errores\n";
    }

    $q2 = "SELECT tr.test_code, tr.status, tr.technician_clock,
                   tr.start_time, tr.status_time, tr.end_time
            FROM test_results tr WHERE tr.rack_id = 1 ORDER BY tr.sequence_order";
    $res2 = $enlace->query($q2);
    echo "   test_results query: " . ($res2 !== false ? "OK" : "ERROR: " . $enlace->error) . "\n";
}

// ── 7. Verificar modals.php en esta carpeta ───────────────────────────────
echo "\n8. MODALS.PHP EN ESTA CARPETA:\n";
$modalsPath = __DIR__ . DIRECTORY_SEPARATOR . 'modals.php';
if (!file_exists($modalsPath)) {
    echo "   !! NO EXISTE modals.php en " . __DIR__ . "\n";
} else {
    echo "   OK existe\n";
    $content = file_get_contents($modalsPath);
    preg_match_all("/include[_once]*\s*\(['\"]([^'\"]+)['\"]\)/i", $content, $m);
    echo "   includes en modals.php: " . implode(', ', $m[1] ?? []) . "\n";
    // Buscar si tiene match() que requiere PHP 8
    if (strpos($content, 'match(') !== false) echo "   USA match() — requiere PHP 8+\n";
    else echo "   match() no encontrado — OK\n";
}

echo "\n=== FIN DIAGNOSTICO ===\n</pre>";