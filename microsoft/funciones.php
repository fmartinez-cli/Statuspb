<?php 

function actualizarSelect($enlace, $NoSerie, $NoReloj,$HoraInicial,$HoraStatus,$pruebas) {
foreach ($pruebas as $prueba => $status) {
if (!empty($status)) {
    switch ($prueba) {
        case 'fto':
            $result = mysqli_query($enlace, "SELECT FTOHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['FTOHoraInicial'] == NULL){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set FTOHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set FTOHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET FTOStatus2='$status', FTONoReloj='$NoReloj',FTOHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET FTOStatus2='$status', FTONoReloj='$NoReloj',FTOHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        case 'quicktest':
            $result = mysqli_query($enlace, "SELECT QuickTestHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['QuickTestHoraInicial'] == NULL || $row['QuickTestHoraInicial'] == ''){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set QuickTestHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set QuickTestHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET QuickTestStatus2='$status', QuickTestNoReloj='$NoReloj',QuickTestHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET QuickTestStatus2='$status', QuickTestNoReloj='$NoReloj',QuickTestHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        case 'stress':
            $result = mysqli_query($enlace, "SELECT StressHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['StressHoraInicial'] == NULL || $row['StressHoraInicial'] == ''){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set StressHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set StressHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET StressStatus2='$status', StressNoReloj='$NoReloj',StressHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET StressStatus2='$status', StressNoReloj='$NoReloj',StressHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        case 'mdaas':
            $result = mysqli_query($enlace, "SELECT MDaaSHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['MDaaSHoraInicial'] == NULL || $row['MDaaSHoraInicial'] == ''){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set MDaaSHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set MDaaSHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET MDaaSStatus2='$status', MDaaSNoReloj='$NoReloj',MDaaSHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET MDaaSStatus2='$status', MDaaSNoReloj='$NoReloj',MDaaSHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        case 'racktest':
            $result = mysqli_query($enlace, "SELECT RackTestHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['RackTestHoraInicial'] == NULL || $row['RackTestHoraInicial'] == ''){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set RackTestHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set RackTestHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET RackTestStatus2='$status', RackTestNoReloj='$NoReloj',RackTestHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET RackTestStatus2='$status', RackTestNoReloj='$NoReloj',RackTestHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        case 'fti':
            $result = mysqli_query($enlace, "SELECT FTIHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['FTIHoraInicial'] == NULL || $row['FTIHoraInicial'] == ''){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set FTIHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set FTIHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET FTIStatus2='$status', FTINoReloj='$NoReloj',FTIHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET FTIStatus2='$status', FTINoReloj='$NoReloj',FTIHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        case 'bootstrap':
            $result = mysqli_query($enlace, "SELECT BSLHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['BSLHoraInicial'] == NULL || $row['BSLHoraInicial'] == ''){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set BSLHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set BSLHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET BSLStatus2='$status', BSLNoReloj='$NoReloj',BSLHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET BSLStatus2='$status', BSLNoReloj='$NoReloj',BSLHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        case 'cts':
            $result = mysqli_query($enlace, "SELECT CTSHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['CTSHoraInicial'] == NULL || $row['CTSHoraInicial'] == ''){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set CTSHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set CTSHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET CTSStatus2='$status', CTSNoReloj='$NoReloj',CTSHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET CTSStatus2='$status', CTSNoReloj='$NoReloj',CTSHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        case 'packing':
            $result = mysqli_query($enlace, "SELECT PackingHoraInicial FROM pruebasMicro WHERE NoSerie = '$NoSerie'");
            $row = mysqli_fetch_assoc($result);
            if($row['PackingCTSHoraInicial'] == NULL || $row['PackingHoraInicial'] == ''){
            $HoraInicial = $_POST['HoraInicial']; 
            mysqli_query($enlace, "UPDATE pruebasMicro set PackingHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy set PackingHoraInicial ='$HoraInicial' where NoSerie = '$NoSerie'");
            }

            mysqli_query($enlace, "UPDATE pruebasMicro SET PackingStatus2='$status', PackingNoReloj='$NoReloj',PackingHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            mysqli_query($enlace, "UPDATE pruebasMicro_copy SET PackingStatus2='$status', PackingNoReloj='$NoReloj',PackingHoraStatus='$HoraStatus' WHERE NoSerie = '$NoSerie'");
            break;
        }
}
}
}


function actualizarEstadoPruebaFinal($enlace, $NoSerie, $NoReloj,$HoraFinal, $prueba) {
switch ($prueba) {
case 'fto':
    mysqli_query($enlace, "UPDATE pruebasMicro set FTO=1, FTONoReloj='$NoReloj',FTOHoraFinal='$HoraFinal', QuickTestStatus2='Waiting' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set FTO=1, FTONoReloj='$NoReloj',FTOHoraFinal='$HoraFinal', QuickTestStatus2='Waiting' where NoSerie = '$NoSerie'");
    break;
case 'quicktest':
    mysqli_query($enlace, "UPDATE pruebasMicro set QuickTest=1,QuickTestNoReloj='$NoReloj', QuickTestHoraFinal='$HoraFinal',StressStatus2='Waiting' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set QuickTest=1, QuickTestNoReloj='$NoReloj',QuickTestHoraFinal='$HoraFinal',StressStatus2='Waiting' where NoSerie = '$NoSerie'");
    break;
case 'stress':
    mysqli_query($enlace, "UPDATE pruebasMicro set Stress=1, StressNoReloj='$NoReloj', StressHoraFinal='$HoraFinal',MDaaSStatus2='Waiting' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set Stress=1, StressNoReloj='$NoReloj',StressHoraFinal='$HoraFinal',MDaaSStatus2='Waiting' where NoSerie = '$NoSerie'");
    break;
case 'mdaas':
    mysqli_query($enlace, "UPDATE pruebasMicro set MDaaS=1, MDaaSNoReloj='$NoReloj',  MDaaSHoraFinal='$HoraFinal',RackTestStatus2='Waiting' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set MDaaS=1, MDaaSNoReloj='$NoReloj',MDaaSHoraFinal='$HoraFinal',RackTestStatus2='Waiting' where NoSerie = '$NoSerie'");
    break;
case 'racktest':
    mysqli_query($enlace, "UPDATE pruebasMicro set RackTest=1,RackTestNoReloj='$NoReloj',RackTestHoraFinal='$HoraFinal',FTIStatus2='Waiting' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set RackTest=1,RackTestNoReloj='$NoReloj',RackTestHoraFinal='$HoraFinal',FTIStatus2='Waiting' where NoSerie = '$NoSerie'");
    break;
case 'fti':
    mysqli_query($enlace, "UPDATE pruebasMicro set FTI=1, FTINoReloj='$NoReloj',FTIHoraFinal='$HoraFinal',BSLStatus2='Waiting' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set FTI=1, FTINoReloj='$NoReloj',FTIHoraFinal='$HoraFinal',BSLStatus2='Waiting' where NoSerie = '$NoSerie'");
    break;
case 'bsl':
    mysqli_query($enlace, "UPDATE pruebasMicro set BSL=1, BSLNoReloj='$NoReloj',BSLHoraFinal='$HoraFinal',CTSStatus2='Waiting' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set BSL=1, BSLNoReloj='$NoReloj',BSLHoraFinal='$HoraFinal',CTSStatus2='Waiting' where NoSerie = '$NoSerie'");
    break;
case 'cts':
    mysqli_query($enlace, "UPDATE pruebasMicro set CTS=1, CTSNoReloj='$NoReloj',CTSHoraFinal='$HoraFinal',PackingStatus2='Waiting' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set CTS=1, CTSNoReloj='$NoReloj',CTSHoraFinal='$HoraFinal',PackingStatus2='Waiting' where NoSerie = '$NoSerie'");
    break;
case 'packing':
    mysqli_query($enlace, "UPDATE pruebasMicro set Packing=1, PackingNoReloj='$NoReloj',PackingHoraFinal='$HoraFinal' where NoSerie = '$NoSerie'");
    mysqli_query($enlace, "UPDATE pruebasMicro_copy set Packing=1, PackingNoReloj='$NoReloj', PackingHoraFinal='$HoraFinal' where NoSerie = '$NoSerie'");
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
        default:
            $color = '';
            break;
    }
    return $nombrePrueba . ' | <span style="color: ' . $color . '">' . $status . '</span>';
}

$log_file = '/var/www/html/error_statuspb';

// Obtener los datos que deseas enviar al archivo
$data = array(
    'status' => $status,
    'nombrePrueba' => $nombrePrueba,
    'color' => $color
);

// Convertir los datos a una cadena formateada
$data_string = var_export($data, true);

// Escribir los datos en el archivo de registro
file_put_contents($log_file, $data_string . PHP_EOL, FILE_APPEND);
