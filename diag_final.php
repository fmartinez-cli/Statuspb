<?php
// diagnostico_final.php - EN LA RAÍZ DEL PROYECTO
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🔍 DIAGNÓSTICO COMPLETO DE STATUSPB</h1>";
echo "<hr>";

// 1. Verificar estructura de archivos
echo "<h2>📁 ESTRUCTURA DE ARCHIVOS</h2>";
echo "Directorio actual: " . __DIR__ . "<br>";

$archivos_importantes = [
    'microsoft/conexion.php',
    'microsoft/funciones.php',
    'microsoft/consultas1.php',
    'microsoft/tabla_bahia1.php',
    'index.php'
];

foreach ($archivos_importantes as $archivo) {
    if (file_exists($archivo)) {
        echo "✓ $archivo EXISTE<br>";
    } else {
        echo "✗ $archivo NO EXISTE<br>";
    }
}

echo "<hr>";

// 2. Intentar conexión de diferentes maneras
echo "<h2>🔌 PRUEBAS DE CONEXIÓN</h2>";

// Opción 1: Conexión directa (sin include)
echo "<h3>Opción 1: Conexión directa</h3>";
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'statuspb';

$direct_conn = @new mysqli($host, $user, $pass, $db);
if ($direct_conn->connect_error) {
    echo "✗ Error: " . $direct_conn->connect_error . "<br>";
    
    // Intentar sin seleccionar base de datos
    $direct_conn2 = @new mysqli($host, $user, $pass);
    if (!$direct_conn2->connect_error) {
        echo "✓ Conexión al servidor EXITOSA (sin base de datos)<br>";
        
        // Verificar si la base de datos existe
        $result = $direct_conn2->query("SHOW DATABASES LIKE 'statuspb'");
        if ($result->num_rows > 0) {
            echo "✓ La base de datos 'statuspb' EXISTE<br>";
        } else {
            echo "✗ La base de datos 'statuspb' NO EXISTE<br>";
        }
        $direct_conn2->close();
    }
} else {
    echo "✓ Conexión EXITOSA a la base de datos<br>";
}

// Opción 2: Usar el archivo de conexión si existe
echo "<h3>Opción 2: Usando archivo de conexión</h3>";
if (file_exists('microsoft/conexion.php')) {
    include('microsoft/conexion.php');
    if (isset($enlace) && $enlace) {
        echo "✓ Archivo de conexión funcionando<br>";
    } else {
        echo "✗ Archivo de conexión pero \$enlace no definido<br>";
        
        // Mostrar contenido del archivo
        echo "Contenido de microsoft/conexion.php:<br>";
        highlight_file('microsoft/conexion.php');
    }
} else {
    echo "✗ No se encuentra microsoft/conexion.php<br>";
}

echo "<hr>";

// 3. Ver tablas en la base de datos (si hay conexión)
echo "<h2>📋 VERIFICACIÓN DE TABLAS</h2>";

if (isset($direct_conn) && !$direct_conn->connect_error) {
    $conn = $direct_conn;
} elseif (isset($enlace) && $enlace) {
    $conn = $enlace;
} else {
    // Último intento de conexión
    $conn = @new mysqli('127.0.0.1', 'root', '', 'statuspb');
}

if (isset($conn) && !$conn->connect_error) {
    $result = $conn->query("SHOW TABLES");
    echo "Tablas encontradas en 'statuspb':<br>";
    $tablas = [];
    while ($row = $result->fetch_array()) {
        $tabla = $row[0];
        $tablas[] = $tabla;
        echo "• " . $tabla . "<br>";
    }
    
    // Buscar tablas de pruebas
    echo "<h3>🔎 Búsqueda específica:</h3>";
    $patrones = ['prueba', 'micro', 'test'];
    foreach ($tablas as $tabla) {
        foreach ($patrones as $patron) {
            if (stripos($tabla, $patron) !== false) {
                echo "✓ ENCONTRADA: $tabla (contiene '$patron')<br>";
                
                // Ver estructura
                $estructura = $conn->query("DESCRIBE " . $tabla);
                echo "<div style='margin-left:20px;background:#f0f0f0;padding:5px;'>";
                echo "Campos:<br>";
                $campos = [];
                while ($campo = $estructura->fetch_assoc()) {
                    $campos[] = $campo['Field'];
                    echo "&nbsp;&nbsp;- " . $campo['Field'] . "<br>";
                }
                
                // Ver si tiene datos
                $count = $conn->query("SELECT COUNT(*) as total FROM " . $tabla);
                if ($count) {
                    $total = $count->fetch_assoc()['total'];
                    echo "&nbsp;&nbsp;Registros: $total<br>";
                }
                echo "</div>";
                break;
            }
        }
    }
    
    // Si no se encontraron, mostrar todas las tablas
    if (empty($tablas)) {
        echo "No hay tablas en la base de datos<br>";
    }
    
    // Verificar específicamente 'racks'
    echo "<h3>🔧 Tabla 'racks':</h3>";
    if (in_array('racks', $tablas)) {
        $racks = $conn->query("SELECT COUNT(*) as total FROM racks");
        $total = $racks->fetch_assoc()['total'];
        echo "✓ Tabla 'racks' existe con $total registros<br>";
        
        // Mostrar algunas locaciones
        $loc = $conn->query("SELECT Locacion, NoSerie FROM racks LIMIT 5");
        if ($loc->num_rows > 0) {
            echo "Ejemplos:<br>";
            while ($row = $loc->fetch_assoc()) {
                echo "&nbsp;&nbsp;{$row['Locacion']} → {$row['NoSerie']}<br>";
            }
        }
    } else {
        echo "✗ Tabla 'racks' NO EXISTE<br>";
    }
    
    $conn->close();
} else {
    echo "No hay conexión a la base de datos para verificar tablas<br>";
}

echo "<hr>";
echo "<h2>✅ DIAGNÓSTICO COMPLETADO</h2>";
echo "<p>Si ves errores de conexión, verifica:</p>";
echo "<ol>";
echo "<li>Que MySQL esté corriendo en XAMPP</li>";
echo "<li>Que la base de datos 'statuspb' exista</li>";
echo "<li>Que el usuario root no tenga contraseña</li>";
echo "</ol>";
?>