<?php 

function actualizarSelect($enlace, $NoSerie, $NoReloj, $HoraInicial, $HoraStatus, $pruebas) {
    foreach ($pruebas as $prueba => $status) {
        if (!empty($status)) {
            switch ($prueba) {
                case 'fto':
                    $result = mysqli_query($enlace, "SELECT FTOHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['FTOHoraInicial'] == NULL){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET FTOHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET FTOStatus2='$status', FTONoReloj='$NoReloj', FTOHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
                    
                case 'quicktest':
                    $result = mysqli_query($enlace, "SELECT QuickTestHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['QuickTestHoraInicial'] == NULL || $row['QuickTestHoraInicial'] == ''){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET QuickTestHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET QuickTestStatus2='$status', QuickTestNoReloj='$NoReloj', QuickTestHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
                    
                case 'stress':
                    $result = mysqli_query($enlace, "SELECT StressHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['StressHoraInicial'] == NULL || $row['StressHoraInicial'] == ''){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET StressHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET StressStatus2='$status', StressNoReloj='$NoReloj', StressHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
                    
                case 'mdaas':
                    $result = mysqli_query($enlace, "SELECT MDaaSHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['MDaaSHoraInicial'] == NULL || $row['MDaaSHoraInicial'] == ''){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET MDaaSHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET MDaaSStatus2='$status', MDaaSNoReloj='$NoReloj', MDaaSHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
                    
                case 'racktest':
                    $result = mysqli_query($enlace, "SELECT RackTestHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['RackTestHoraInicial'] == NULL || $row['RackTestHoraInicial'] == ''){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET RackTestHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET RackTestStatus2='$status', RackTestNoReloj='$NoReloj', RackTestHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
                    
                case 'fti':
                    $result = mysqli_query($enlace, "SELECT FTIHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['FTIHoraInicial'] == NULL || $row['FTIHoraInicial'] == ''){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET FTIHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET FTIStatus2='$status', FTINoReloj='$NoReloj', FTIHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
                    
                case 'bsl':
                    $result = mysqli_query($enlace, "SELECT BSLHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['BSLHoraInicial'] == NULL || $row['BSLHoraInicial'] == ''){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET BSLHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET BSLStatus2='$status', BSLNoReloj='$NoReloj', BSLHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
                    
                case 'cts':
                    $result = mysqli_query($enlace, "SELECT CTSHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['CTSHoraInicial'] == NULL || $row['CTSHoraInicial'] == ''){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET CTSHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET CTSStatus2='$status', CTSNoReloj='$NoReloj', CTSHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
                    
                case 'packing':
                    $result = mysqli_query($enlace, "SELECT PackingHoraInicial FROM pruebasmicro WHERE NoSerie = '$NoSerie'");
                    $row = mysqli_fetch_assoc($result);
                    if($row['PackingHoraInicial'] == NULL || $row['PackingHoraInicial'] == ''){
                        $HoraInicial = $_POST['HoraInicial']; 
                        mysqli_query($enlace, "UPDATE pruebasmicro SET PackingHoraInicial ='$HoraInicial' WHERE NoSerie = '$NoSerie'");
                    }
                    mysqli_query($enlace, "UPDATE pruebasmicro SET PackingStatus2='$status', PackingNoReloj='$NoReloj', PackingHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
                    break;
            }
        }
    }
}

function actualizarEstadoPruebaFinal($enlace, $NoSerie, $NoReloj, $HoraFinal, $prueba) {
    switch ($prueba) {
        case 'fto':
            // Marcar FTO como completada con Status2 = 'Pass'
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                FTO = 1, 
                FTOStatus2 = 'Pass',
                FTONoReloj = '$NoReloj',
                FTOHoraFinal = '$HoraFinal',
                QuickTestStatus2 = 'Waiting'
                WHERE NoSerie = '$NoSerie'");
            break;
            
        case 'quicktest':
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                QuickTest = 1, 
                QuickTestStatus2 = 'Pass',
                QuickTestNoReloj = '$NoReloj',
                QuickTestHoraFinal = '$HoraFinal',
                StressStatus2 = 'Waiting'
                WHERE NoSerie = '$NoSerie'");
            break;
            
        case 'stress':
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                Stress = 1, 
                StressStatus2 = 'Pass',
                StressNoReloj = '$NoReloj',
                StressHoraFinal = '$HoraFinal',
                MDaaSStatus2 = 'Waiting'
                WHERE NoSerie = '$NoSerie'");
            break;
            
        case 'mdaas':
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                MDaaS = 1, 
                MDaaSStatus2 = 'Pass',
                MDaaSNoReloj = '$NoReloj',
                MDaaSHoraFinal = '$HoraFinal',
                RackTestStatus2 = 'Waiting'
                WHERE NoSerie = '$NoSerie'");
            break;
            
        case 'racktest':
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                RackTest = 1, 
                RackTestStatus2 = 'Pass',
                RackTestNoReloj = '$NoReloj',
                RackTestHoraFinal = '$HoraFinal',
                FTIStatus2 = 'Waiting'
                WHERE NoSerie = '$NoSerie'");
            break;
            
        case 'fti':
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                FTI = 1, 
                FTIStatus2 = 'Pass',
                FTINoReloj = '$NoReloj',
                FTIHoraFinal = '$HoraFinal',
                BSLStatus2 = 'Waiting'
                WHERE NoSerie = '$NoSerie'");
            break;
            
        case 'bsl':
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                BSL = 1, 
                BSLStatus2 = 'Pass',
                BSLNoReloj = '$NoReloj',
                BSLHoraFinal = '$HoraFinal',
                CTSStatus2 = 'Waiting'
                WHERE NoSerie = '$NoSerie'");
            break;
            
        case 'cts':
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                CTS = 1, 
                CTSStatus2 = 'Pass',
                CTSNoReloj = '$NoReloj',
                CTSHoraFinal = '$HoraFinal',
                PackingStatus2 = 'Waiting'
                WHERE NoSerie = '$NoSerie'");
            break;
            
        case 'packing':
            mysqli_query($enlace, "UPDATE pruebasmicro SET 
                Packing = 1, 
                PackingStatus2 = 'Pass',
                PackingNoReloj = '$NoReloj',
                PackingHoraFinal = '$HoraFinal'
                WHERE NoSerie = '$NoSerie'");
            break;
    }
}

function cambiarColorPrueba($status, $nombrePrueba) {
    $color = '';
    switch ($status) {
        case 'Waiting':
            $color = 'orange';
            break;
        case 'Running':
            $color = 'yellow';
            break;
        case 'Fail':
            $color = 'red';
            break;
        case 'Pass':
            $color = 'green';
            break;
        default:
            $color = '';
            break;
    }
    return $nombrePrueba . ' | <span style="color: ' . $color . '">' . $status . '</span>';
}
?>