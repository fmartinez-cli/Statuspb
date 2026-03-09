<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Registrar el logout en la base de datos (opcional)
if (isset($_SESSION['No_Reloj'])) {
    // Can be implemented to log user logout actions, e.g.:
    /*
    require_once dirname(dirname(dirname(__DIR__))) . '/bootstrap.php';
    $clock = mysqli_real_escape_string($enlace, $_SESSION['No_Reloj']);
    mysqli_query($enlace, "INSERT INTO audit_log (user_id, action, timestamp) 
                          VALUES ((SELECT id FROM users WHERE clock_number = '$clock'), 'logout', NOW())");
    */
}

// Delete session and redirect to index with modal
$_SESSION = array();

// Delete session cookie if it exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Redirect to index page with modal
header("Location: index.php#modal");
exit;
?>