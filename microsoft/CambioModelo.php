<?php
// Verifica si se ha enviado el parámetro 'modelo'
if (!isset($_REQUEST['modelo'])) {
    // Redirecciona a la página index.php si no se proporcionó el parámetro
    header("Location: index.php");
} else {
    // Incluye el archivo de conexión y comienza la sesión
    include('conexion.php');
    session_start();
    
    // Obtén los valores de los parámetros enviados
    $modeloactual = $_REQUEST['modeloactual'];
    $area = $_REQUEST['Area'];
    $modelo = $_REQUEST['modelo'];
    $Serie = $_REQUEST['NoSerie'];
    
    // Verifica si el área es 'microsoft'
    if ($area == 'microsoft') {
    // Actualiza el modelo en la tabla 'racks' y 'racks_copy' para el número de serie especificado
    $updateRacks = mysqli_query($enlace, "UPDATE racks SET Modelo='$modelo' WHERE NoSerie='$Serie'") &&  $updateRacksCopy = mysqli_query($enlace, "UPDATE racks_copy SET Modelo='$modelo' WHERE NoSerie='$Serie'");
    // Verifica si se actualizó el modelo en la tabla 'racks'
    if ($updateRacks && $updateRacksCopy) {
        echo "<script>location.href='javascript:history.back(-1);'</script>";
    } else {
        echo "<script>location.href='javascript:history.back(-1);'</script>";
    }
}

    
    // Evalúa el valor de la variable $modeloactual usando una estructura switch
    switch ($modeloactual) {
        case 'Microsoft 8.2':
            // Realiza una consulta en la tabla 'racks' para obtener los datos relacionados con el número de serie
            $consulta = mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie='$Serie'");
            if ($datos = mysqli_fetch_array($consulta)) {
                // Asigna los valores obtenidos a variables individuales
                $WO = $datos['WO'];
                $SKU = $datos['SKU'];
                $Bay = $datos['Bahia'];
                $Locacion = $datos['Locacion'];
                $Running = $datos['Corriendo'];
                $NoReloj = $datos['NoReloj'];
                $fecha = date('Y-m-d h:i:s');
            }
            if ($modelo == "NPI") {
                // Actualiza el modelo en la tabla 'racks' para el número de serie especificado
                $query = mysqli_query($enlace, "UPDATE racks SET Modelo='$modelo' WHERE NoSerie='$Serie'");
                echo "<script>location.href='javascript:history.back(-1);'</script>";
            } elseif ($modelo == "Microsoft 8.3") {
                // Realiza varias consultas y acciones para eliminar registros y agregar nuevos registros en diferentes tablas de la base de datos
                $query2 = mysqli_query($enlace, "DELETE FROM racks WHERE NoSerie='$Serie'");
                $query3 = mysqli_query($enlace, "DELETE FROM racksterminados WHERE NoSerie='$Serie'");
                $query4 = mysqli_query($enlace, "DELETE FROM pruebasMicro WHERE NoSerie='$Serie'");
                $query5 = mysqli_query($enlace, "DELETE FROM pruebasterminados WHERE NoSerie='$Serie'");
                $query6 = mysqli_query($enlace, "INSERT INTO racks(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj, area) values ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', 'Microsoft', '1', '$NoReloj', 'microsoft')");
                $query7 = mysqli_query($enlace, "INSERT INTO pruebasMicro (NoSerie, HoraInicio) VALUES ('$Serie','$fecha')");
                echo "<script>location.href='javascript:history.back(-1);'</script>";
            }
            break;
            
        case 'Microsoft 8.3':
            // Realiza una consulta en la tabla 'racks' para obtener los datos relacionados con el número de serie
            $consulta = mysqli_query($enlace, "SELECT * FROM racks WHERE Noserie='$Serie'");
            if ($datos = mysqli_fetch_array($consulta)) {
                // Asigna los valores obtenidos a variables individuales
                $WO = $datos['WO'];
                $SKU = $datos['SKU'];
                $Bay = $datos['Bahia'];
                $Locacion = $datos['Locacion'];
                $Running = $datos['Corriendo'];
                $NoReloj = $datos['NoReloj'];
                $fecha = date('Y-m-d h:i:s');
            }
            // Realiza varias consultas para eliminar registros en diferentes tablas de la base de datos
            $query = mysqli_query($enlace, "DELETE FROM racks WHERE Noserie='$Serie'");
            $query2 = mysqli_query($enlace, "DELETE From pruebasMicro WHERE Noserie='$Serie'");
            $query3 = mysqli_query($enlace, "DELETE From pruebasterminadas WHERE Noserie='$Serie'");
            $query4 = mysqli_query($enlace, "DELETE FROM racksterminados WHERE Noserie='$Serie'");
            // Agrega un nuevo registro en la tabla 'racks' con los valores correspondientes, incluyendo el valor del modelo
            $query6 = mysqli_query($enlace, "INSERT INTO racks(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) values ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', '$modelo', '1', '$NoReloj')");
            // Agrega un nuevo registro en la tabla 'pruebasMicro' con el número de serie y la fecha actual
            $query7 = mysqli_query($enlace, "INSERT INTO pruebasMicro (NoSerie, HoraInicio) VALUES ('$Serie','$fecha')");
            echo "<script>location.href='javascript:history.back(-1);'</script>";
            break;
            
        case 'NPI':
            // Realiza una consulta en la tabla 'racks' para obtener los datos relacionados con el número de serie
            $consulta = mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie='$Serie'");
            if ($datos = mysqli_fetch_array($consulta)) {
                // Asigna los valores obtenidos a variables individuales
                $WO = $datos['WO'];
                $SKU = $datos['SKU'];
                $Bay = $datos['Bahia'];
                $Locacion = $datos['Locacion'];
                $Running = $datos['Corriendo'];
                $NoReloj = $datos['NoReloj'];
                $fecha = date('Y-m-d h:i:s');
            }
            if ($modelo == "Microsoft 8.2") {
                // Actualiza el modelo en la tabla 'racks' para el número de serie especificado
                $query = mysqli_query($enlace, "UPDATE racks SET Modelo='$modelo' WHERE NoSerie='$Serie'");
                echo "<script>location.href='javascript:history.back(-1);'</script>";
            } elseif ($modelo == "Microsoft 8.3") {
                // Realiza varias consultas y acciones para eliminar registros y agregar nuevos registros en diferentes tablas de la base de datos
                $query2 = mysqli_query($enlace, "DELETE FROM racks WHERE NoSerie='$Serie'");
                $query3 = mysqli_query($enlace, "DELETE FROM racksterminados WHERE NoSerie='$Serie'");
                $query4 = mysqli_query($enlace, "DELETE FROM pruebasMicro WHERE NoSerie='$Serie'");
                $query5 = mysqli_query($enlace, "DELETE FROM pruebasterminados WHERE NoSerie='$Serie'");
                $query6 = mysqli_query($enlace, "INSERT INTO racks(Noserie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj, area) values ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', 'Microsoft', '1', '$NoReloj', 'microsoft')");
                $query7 = mysqli_query($enlace, "INSERT INTO pruebasMicro (NoSerie, HoraInicio) VALUES ('$Serie','$fecha')");
                echo "<script>location.href='javascript:history.back(-1);'</script>";
            }
            break;
    }
}
?>
