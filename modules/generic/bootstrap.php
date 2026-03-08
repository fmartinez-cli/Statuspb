<?php
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('UNIT_PATH', __DIR__);

// Load database connection
require_once ROOT_PATH . '/conexion.php';

// Load unit configuration and utility functions
require_once __DIR__ . '/config/unit_config.php';

// Load queries and other functions specific to this unit
require_once __DIR__ . '/config/functions.php';
require_once __DIR__ . '/config/queries.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>