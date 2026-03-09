<?php
// Conexión directa a la base de datos
$host = 'localhost';
$user = 'root';
$password_db = '';
$database = 'factory_test_system'; // Cambiado a la base de datos correcta

$enlace = mysqli_connect($host, $user, $password_db, $database);

if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($enlace, "utf8mb4");

echo "<h2>Diagnóstico de Base de Datos</h2>";

// Verificar qué tablas existen
$tables = mysqli_query($enlace, "SHOW TABLES");
echo "<h3>Tablas en la base de datos:</h3>";
echo "<ul>";
while ($table = mysqli_fetch_array($tables)) {
    echo "<li>" . $table[0] . "</li>";
}
echo "</ul>";

// Verificar estructura de la tabla users
$result = mysqli_query($enlace, "DESCRIBE users");
if ($result) {
    echo "<h3>Estructura de la tabla 'users':</h3>";
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
    echo "<p>La tabla 'users' no existe</p>";
}

// Verificar si hay algún usuario
$users = mysqli_query($enlace, "SELECT * FROM users LIMIT 5");
if ($users && mysqli_num_rows($users) > 0) {
    echo "<h3>Primeros 5 usuarios:</h3>";
    echo "<table border='1' cellpadding='5'>";
    
    // Obtener los nombres de las columnas
    $first_row = mysqli_fetch_assoc($users);
    echo "<tr>";
    foreach (array_keys($first_row) as $column) {
        echo "<th>" . $column . "</th>";
    }
    echo "</tr>";
    
    // Mostrar la primera fila
    mysqli_data_seek($users, 0); // Resetear el puntero
    while ($row = mysqli_fetch_assoc($users)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . ($value ?? 'NULL') . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay usuarios en la tabla</p>";
}

// Sugerencia para crear usuario admin
echo "<h3>Sugerencia para crear usuario admin:</h3>";
echo "<p>Basado en la estructura, usa este SQL (ajusta los nombres de columna según veas arriba):</p>";
echo "<pre>";
echo "INSERT INTO users (No_Reloj, Nombre, Pass, Nivel, Turno, Bahia) \n";
echo "VALUES ('99999', 'Admin Test', SHA1('admin123'), 99, 1, 'Admin');\n";
echo "</pre>";

mysqli_close($enlace);
?>