<?php
// Mostrar todos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Diagnóstico de conexión MySQL</h2>";

// Información del sistema
echo "<h3>Información del servidor:</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Servidor: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";

// Extensiones cargadas
echo "<h3>Extensiones de MySQL cargadas:</h3>";
$extensions = get_loaded_extensions();
$mysql_extensions = preg_grep('/mysql/i', $extensions);
if (!empty($mysql_extensions)) {
    echo "✓ Extensiones encontradas: " . implode(', ', $mysql_extensions) . "<br>";
} else {
    echo "✗ No hay extensiones MySQL cargadas<br>";
}

// Probar diferentes métodos de conexión
echo "<h3>Pruebas de conexión:</h3>";

$tests = [
    ['host' => 'localhost', 'desc' => 'localhost (socket Unix)'],
    ['host' => '127.0.0.1', 'desc' => '127.0.0.1 (TCP/IP)'],
    ['host' => '::1', 'desc' => '::1 (IPv6 localhost)']
];

foreach ($tests as $test) {
    echo "<b>Probando: {$test['desc']}</b><br>";
    
    $conn = @new mysqli($test['host'], 'root', '');
    
    if ($conn->connect_error) {
        echo "✗ Error: " . $conn->connect_error . "<br>";
        echo "&nbsp;&nbsp;Código de error: " . $conn->connect_errno . "<br>";
    } else {
        echo "✓ Conexión exitosa!<br>";
        echo "&nbsp;&nbsp;Información del servidor: " . $conn->server_info . "<br>";
        $conn->close();
    }
    echo "<br>";
}

// Probar con la base de datos específica
echo "<h3>Probando conexión a la base de datos 'statuspb':</h3>";
$conn = @new mysqli('localhost', 'root', '', 'statuspb');
if ($conn->connect_error) {
    echo "✗ Error conectando a statuspb: " . $conn->connect_error . "<br>";
    
    // Intentar crear la base de datos si no existe
    echo "<br>Intentando crear la base de datos...<br>";
    $conn2 = @new mysqli('localhost', 'root', '');
    if (!$conn2->connect_error) {
        $conn2->query("CREATE DATABASE IF NOT EXISTS statuspb");
        echo "✓ Base de datos statuspb creada/verificada<br>";
        $conn2->close();
    }
} else {
    echo "✓ Conexión exitosa a statuspb!<br>";
    $conn->close();
}
?>