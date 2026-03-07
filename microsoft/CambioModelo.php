<?php
// Verifica si se ha enviado el parámetro 'modelo'
if (!isset($_REQUEST['modelo'])) {
    // Redirecciona a la página index.php si no se proporcionó el parámetro
    header("Location: index.php");
    exit;
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
        // Actualiza SOLO en racksmicro (tabla correcta para Microsoft)
        $updateRacks = mysqli_query($enlace, "UPDATE racksmicro SET Modelo='$modelo' WHERE NoSerie='$Serie'");
        
        if ($updateRacks) {
            echo "<script>location.href='javascript:history.back(-1);'</script>";
        } else {
            echo "<script>location.href='javascript:history.back(-1);'</script>";
        }
    }

    // Evalúa el valor de la variable $modeloactual usando una estructura switch
    switch ($modeloactual) {
        case 'Microsoft 8.2':
            // Obtener datos actuales de racksmicro
            $consulta = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE NoSerie='$Serie'");
            if ($datos = mysqli_fetch_array($consulta)) {
                $WO = $datos['WO'];
                $SKU = $datos['SKU'];
                $Bay = $datos['Bahia'];
                $Locacion = $datos['Locacion'];
                $Running = $datos['Corriendo'];
                $NoReloj = $datos['NoReloj'];
                $fecha = date('Y-m-d H:i:s');
            }
            
            if ($modelo == "NPI") {
                // Solo actualizar modelo en racksmicro
                $query = mysqli_query($enlace, "UPDATE racksmicro SET Modelo='$modelo' WHERE NoSerie='$Serie'");
                echo "<script>location.href='javascript:history.back(-1);'</script>";
                
            } elseif ($modelo == "Microsoft 8.3") {
                // Eliminar y recrear en racksmicro (conservando datos)
                $query2 = mysqli_query($enlace, "DELETE FROM racksmicro WHERE NoSerie='$Serie'");
                $query3 = mysqli_query($enlace, "DELETE FROM pruebasmicro WHERE NoSerie='$Serie'");
                
                // Reinsertar en racksmicro
                $query6 = mysqli_query($enlace, "INSERT INTO racksmicro 
                    (NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) 
                    VALUES ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', '$modelo', '1', '$NoReloj')");
                
                // Reinsertar en pruebasmicro con valores por defecto
                $query7 = mysqli_query($enlace, "INSERT INTO pruebasmicro 
                    (NoSerie, HoraInicio, FTO, FTOStatus2, 
                     QuickTest, QuickTestStatus2, Stress, StressStatus2,
                     MDaaS, MDaaSStatus2, RackTest, RackTestStatus2,
                     FTI, FTIStatus2, BSL, BSLStatus2,
                     CTS, CTSStatus2, Packing, PackingStatus2) 
                    VALUES ('$Serie', '$fecha', 
                    0, 'Waiting',
                    0, 'Vacio', 0, 'Vacio',
                    0, 'Vacio', 0, 'Vacio',
                    0, 'Vacio', 0, 'Vacio',
                    0, 'Vacio', 0, 'Vacio')");
                
                echo "<script>location.href='javascript:history.back(-1);'</script>";
            }
            break;
            
        case 'Microsoft 8.3':
            // Obtener datos actuales de racksmicro
            $consulta = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE NoSerie='$Serie'");
            if ($datos = mysqli_fetch_array($consulta)) {
                $WO = $datos['WO'];
                $SKU = $datos['SKU'];
                $Bay = $datos['Bahia'];
                $Locacion = $datos['Locacion'];
                $Running = $datos['Corriendo'];
                $NoReloj = $datos['NoReloj'];
                $fecha = date('Y-m-d H:i:s');
            }
            
            // Eliminar registros actuales
            $query = mysqli_query($enlace, "DELETE FROM racksmicro WHERE NoSerie='$Serie'");
            $query2 = mysqli_query($enlace, "DELETE FROM pruebasmicro WHERE NoSerie='$Serie'");
            
            // Reinsertar en racksmicro con nuevo modelo
            $query6 = mysqli_query($enlace, "INSERT INTO racksmicro 
                (NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) 
                VALUES ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', '$modelo', '1', '$NoReloj')");
            
            // Reinsertar en pruebasmicro con valores por defecto
            $query7 = mysqli_query($enlace, "INSERT INTO pruebasmicro 
                (NoSerie, HoraInicio, FTO, FTOStatus2, 
                 QuickTest, QuickTestStatus2, Stress, StressStatus2,
                 MDaaS, MDaaSStatus2, RackTest, RackTestStatus2,
                 FTI, FTIStatus2, BSL, BSLStatus2,
                 CTS, CTSStatus2, Packing, PackingStatus2) 
                VALUES ('$Serie', '$fecha', 
                0, 'Waiting',
                0, 'Vacio', 0, 'Vacio',
                0, 'Vacio', 0, 'Vacio',
                0, 'Vacio', 0, 'Vacio',
                0, 'Vacio', 0, 'Vacio')");
            
            echo "<script>location.href='javascript:history.back(-1);'</script>";
            break;
            
        case 'NPI':
            // Obtener datos actuales de racksmicro
            $consulta = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE NoSerie='$Serie'");
            if ($datos = mysqli_fetch_array($consulta)) {
                $WO = $datos['WO'];
                $SKU = $datos['SKU'];
                $Bay = $datos['Bahia'];
                $Locacion = $datos['Locacion'];
                $Running = $datos['Corriendo'];
                $NoReloj = $datos['NoReloj'];
                $fecha = date('Y-m-d H:i:s');
            }
            
            if ($modelo == "Microsoft 8.2") {
                // Solo actualizar modelo
                $query = mysqli_query($enlace, "UPDATE racksmicro SET Modelo='$modelo' WHERE NoSerie='$Serie'");
                echo "<script>location.href='javascript:history.back(-1);'</script>";
                
            } elseif ($modelo == "Microsoft 8.3") {
                // Eliminar y recrear
                $query2 = mysqli_query($enlace, "DELETE FROM racksmicro WHERE NoSerie='$Serie'");
                $query3 = mysqli_query($enlace, "DELETE FROM pruebasmicro WHERE NoSerie='$Serie'");
                
                $query6 = mysqli_query($enlace, "INSERT INTO racksmicro 
                    (NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj) 
                    VALUES ('$Serie', '$WO', '$SKU', '$Bay', '$Locacion', '$modelo', '1', '$NoReloj')");
                
                $query7 = mysqli_query($enlace, "INSERT INTO pruebasmicro 
                    (NoSerie, HoraInicio, FTO, FTOStatus2, 
                     QuickTest, QuickTestStatus2, Stress, StressStatus2,
                     MDaaS, MDaaSStatus2, RackTest, RackTestStatus2,
                     FTI, FTIStatus2, BSL, BSLStatus2,
                     CTS, CTSStatus2, Packing, PackingStatus2) 
                    VALUES ('$Serie', '$fecha', 
                    0, 'Waiting',
                    0, 'Vacio', 0, 'Vacio',
                    0, 'Vacio', 0, 'Vacio',
                    0, 'Vacio', 0, 'Vacio',
                    0, 'Vacio', 0, 'Vacio')");
                
                echo "<script>location.href='javascript:history.back(-1);'</script>";
            }
            break;
    }
}
?>