<?php
// Ruta correcta al bootstrap.php
require_once __DIR__ . '/modules/generic/bootstrap.php';

echo "<h2>Estructura de la tabla audit_log</h2>";

$result = mysqli_query($enlace, "DESCRIBE audit_log");
if ($result) {
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Campo</th><th>Tipo</th><th>Nulo</th><th>Llave</th><th>Default</th><th>Extra</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . ($row['Default'] ?? 'NULL') . "</td>";
        echo "<td>" . $row['Extra'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . mysqli_error($enlace);
}

// También ver si hay datos
$data = mysqli_query($enlace, "SELECT * FROM audit_log LIMIT 5");
if ($data && mysqli_num_rows($data) > 0) {
    echo "<h3>Datos de ejemplo:</h3>";
    echo "<table border='1' cellpadding='5'>";
    
    $first_row = mysqli_fetch_assoc($data);
    echo "<tr>";
    foreach (array_keys($first_row) as $column) {
        echo "<th>" . $column . "</th>";
    }
    echo "</tr>";
    
    mysqli_data_seek($data, 0);
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . ($value ?? 'NULL') . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay datos en audit_log o la tabla no existe</p>";
}

// Ver todas las tablas
echo "<h2>Todas las tablas en la base de datos:</h2>";
$tables = mysqli_query($enlace, "SHOW TABLES");
echo "<ul>";
while ($table = mysqli_fetch_array($tables)) {
    echo "<li>" . $table[0] . "</li>";
}
echo "</ul>";
?>