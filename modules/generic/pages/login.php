<?php
// Verify that the request contains the 'Usuario' parameter
if(!isset($_REQUEST['Usuario'])){
    header("Location: index.php");
    exit;
}

// DB connection parameters
$host = 'localhost';
$user = 'root';
$password_db = '';
$database = 'factory_test_system';

$enlace = mysqli_connect($host, $user, $password_db, $database);

if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($enlace, "utf8mb4");

$usuario = mysqli_real_escape_string($enlace, $_REQUEST['Usuario']);
$password = $_REQUEST['Password'];

// clean input
$actual = array("<", ">", "/", '\\', "'", '"');
$nuevo  = array("&lt;", "&gt;", "&#47;", "&#92;", "&#39;", "&#34;");

$url = $_REQUEST['Url'];
// Extract base URL without fragment
$url_parts = explode('#', $url);
$url2 = $url_parts[0];
$Pass = sha1(str_replace($actual, $nuevo, $password));

// Search for user in the database
$consulta = mysqli_query($enlace, "SELECT * FROM users WHERE clock_number = '$usuario'");

if($consulta && $cons = mysqli_fetch_array($consulta)){
    // Verify password
    if($Pass == $cons['password_hash']){
        session_start();
        
        // Save user info in session
        $_SESSION['No_Reloj'] = $cons['clock_number'];  
        $_SESSION['Nombre'] = $cons['full_name'];        
        $_SESSION['Turno'] = $cons['shift'];             
        $_SESSION['Bahia'] = $cons['default_bay'] ?? 0;  
        $_SESSION['Nivel'] = $cons['level'];             
        
        // Update last login time
        mysqli_query($enlace, "UPDATE users SET last_login = NOW() WHERE id = {$cons['id']}");
        
        // Redirect to the original URL
        header("Location: " . $url);
        exit;
    } else {
        // Wrong password - redirect back to modal
        $redirect_url = $url2 . "#modal";
        header("Location: " . $redirect_url);
        exit;
    }
} else {
    // User not found - redirect back to modal
    $redirect_url = $url2 . "#modal";
    header("Location: " . $redirect_url);
    exit;
}
?>