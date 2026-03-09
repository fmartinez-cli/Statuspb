<?php
// modules/generic/config/functions.php

function cambiarColorPrueba($status, $test_name) {
    $color = '';
    
    // Convert status to lowercase for case-insensitive comparison
    $status_lower = strtolower($status);
    
    switch ($status_lower) {
        case 'waiting':
            $color = 'orange';
            break;
        case 'running':
            $color = 'yellow';
            break;
        case 'fail':
            $color = 'red';
            break;
        case 'pass':
            $color = 'green';
            break;
        default:
            // If status is empty or unrecognized, return the test name without color
            return $test_name;
    }
    
    // Return the test name with the status colored
    return $test_name . ' | <span style="color: ' . $color . '; font-weight: bold;">' . $status . '</span>';
}

// function to migrate rack data from old database to new database
function migrateRack($enlace_old, $enlace_new, $serial, $unit_id = 1) {
    // gEt rack data from old database
    $query_old = "SELECT * FROM racksmicro WHERE NoSerie = '$serial'";
    $result_old = mysqli_query($enlace_old, $query_old);
    $rack_old = mysqli_fetch_assoc($result_old);
    
    if (!$rack_old) return false;
    
    // map model code from old to new
    global $model_mapping;
    $model_code = $model_mapping[$rack_old['Modelo']] ?? $model_mapping['default'];
    
    // get model id from new database
    $query_model = "SELECT id FROM rack_models WHERE unit_id = $unit_id AND model_code = '$model_code'";
    $result_model = mysqli_query($enlace_new, $query_model);
    $model = mysqli_fetch_assoc($result_model);
    
    if (!$model) return false;
    
    // insert rack data into new database
    $insert = "INSERT INTO racks (unit_id, serial_number, work_order, sku, bay_number, 
                                   location_code, model_id, current_status, technician_clock, shift, comments)
               VALUES ($unit_id, '{$rack_old['NoSerie']}', '{$rack_old['WO']}', '{$rack_old['SKU']}', 
                       {$rack_old['Bahia']}, '{$rack_old['Locacion']}', {$model['id']}, 
                       'in_test', {$rack_old['NoReloj']}, 1, '{$rack_old['comentarios_JRS']}')";
    
    return mysqli_query($enlace_new, $insert);
}
?>