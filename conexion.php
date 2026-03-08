<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'factory_test_system'; 

// mysqli
$enlace = new mysqli($host, $user, $password, $database);

if ($enlace->connect_error) {
    die("Connection failed: " . $enlace->connect_error);
}

$enlace->set_charset("utf8mb4");


?>