<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'statuspb';

    try {
        $enlace = new mysqli($host, $user, $password, $database);

        if ($enlace->connect_errno) {
            throw new Exception('No se pudo conectar: ' . $enlace->connect_error);
        }

    } catch (Exception $e) {
        die($e->getMessage());
    }
?>