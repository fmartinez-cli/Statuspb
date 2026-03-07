<?php
// diagnosticar_racks.php
include("microsoft/conexion.php");

echo "<h2>🔍 Diagnóstico de tabla 'racks'</h2>";

// 1. Ver estructura de la tabla racks
echo "<h3>Estructura de tabla racks:</h3>";
$estructura = $enlace->query("DESCRIBE racks");
if ($estructura) {
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Campo</th><th>Tipo</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    while ($campo = $estructura->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $campo['Field'] . "</td>";
        echo "<td>" . $campo['Type'] . "</td>";
        echo "<td>" . $campo['Null'] . "</td>";
        echo "<td>" . $campo['Key'] . "</td>";
        echo "<td>" . $campo['Default'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . $enlace->error . "<br>";
}

// 2. Ver algunos datos de ejemplo
echo "<h3>Datos de ejemplo (primeros 5 registros):</h3>";
$datos = $enlace->query("SELECT * FROM racks LIMIT 5");
if ($datos && $datos->num_rows > 0) {
    $primer_fila = $datos->fetch_assoc();
    echo "<table border='1' cellpadding='5'>";
    echo "<tr>";
    foreach (array_keys($primer_fila) as $columna) {
        echo "<th>" . $columna . "</th>";
    }
    echo "</tr>";
    
    // Reiniciar el puntero
    $datos->data_seek(0);
    
    while ($row = $datos->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $valor) {
            echo "<td>" . htmlspecialchars($valor ?? 'NULL') . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay datos en la tabla racks<br>";
}

// 3. Buscar específicamente la columna comentarios_JRS
echo "<h3>🔎 Buscando columna 'comentarios_JRS':</h3>";
$check_column = $enlace->query("SHOW COLUMNS FROM racks LIKE 'comentarios_JRS'");
if ($check_column->num_rows > 0) {
    echo "✓ La columna 'comentarios_JRS' SÍ existe<br>";
} else {
    echo "✗ La columna 'comentarios_JRS' NO existe en la tabla racks<br>";
    
    // Sugerir columnas similares
    echo "<br>Columnas disponibles similares:<br>";
    $similares = $enlace->query("SHOW COLUMNS FROM racks WHERE Field LIKE '%coment%' OR Field LIKE '%comment%'");
    if ($similares->num_rows > 0) {
        while ($col = $similares->fetch_assoc()) {
            echo "• " . $col['Field'] . "<br>";
        }
    } else {
        echo "No hay columnas relacionadas con comentarios<br>";
    }
}
?>