<?php
// Activar visualización de errores (solo para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DEFINIR CREDENCIALES (igual que el proyecto funcional)
define('DB_HOST', 'localhost');  // Usa 127.0.0.1 en lugar de localhost
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'statuspb');  // Cambiado a statuspb

// Establecer conexión con PDO (exactamente igual que el proyecto funcional)
try {
    $enlace = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER, 
        DB_PASS,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
    );
    
    // Configurar PDO para que lance excepciones en errores
    $enlace->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conexión exitosa a la base de datos statuspb";
    
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Ahora puedes usar $enlace para tus consultas
// Ejemplo de consulta:
/*
try {
    $query = $enlace->query("SELECT * FROM tu_tabla");
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en consulta: " . $e->getMessage();
}
*/
?>