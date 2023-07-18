<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'm@ntecad4s123';
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