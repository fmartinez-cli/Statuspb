<?php
// modules/generic/config/queries.php
// NO incluir conexion.php ni functions.php (ya vienen de bootstrap)

$unit_id = UNIT_ID;

// ============================================
// TR01-01
// ============================================
$constr1 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-01'");
if ($contr1 = mysqli_fetch_array($constr1)) { 
    $NoSerie1 = $contr1['serial_number']; 
} else { 
    $NoSerie1 = "Available"; 
    $contr1 = null; 
}

$Prueba1 = "&nbsp;";

if ($contr1) {
    // Obtener el modelo del rack
    $model_id = $contr1['model_id'];
    
    // Obtener la prueba actual (la primera pendiente)
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr1['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp1 = mysqli_query($enlace, $query);
    if ($consp1 = mysqli_fetch_array($conp1)) {
        $test_code = $consp1['test_code'];
        $status = $consp1['status_text'];
        $test_name = $consp1['test_name'];
        
        // Usar la función cambiarColorPrueba de functions.php
        $Prueba1 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-02
// ============================================
$constr2 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-02'");
if ($contr2 = mysqli_fetch_array($constr2)) { 
    $NoSerie2 = $contr2['serial_number']; 
} else { 
    $NoSerie2 = "Available"; 
    $contr2 = null; 
}

$Prueba2 = "&nbsp;";

if ($contr2) {
    $model_id = $contr2['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr2['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp2 = mysqli_query($enlace, $query);
    if ($consp2 = mysqli_fetch_array($conp2)) {
        $status = $consp2['status_text'];
        $test_name = $consp2['test_name'];
        $Prueba2 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-03
// ============================================
$constr3 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-03'");
if ($contr3 = mysqli_fetch_array($constr3)) { 
    $NoSerie3 = $contr3['serial_number']; 
} else { 
    $NoSerie3 = "Available"; 
    $contr3 = null; 
}

$Prueba3 = "&nbsp;";

if ($contr3) {
    $model_id = $contr3['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr3['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp3 = mysqli_query($enlace, $query);
    if ($consp3 = mysqli_fetch_array($conp3)) {
        $status = $consp3['status_text'];
        $test_name = $consp3['test_name'];
        $Prueba3 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-04
// ============================================
$constr4 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-04'");
if ($contr4 = mysqli_fetch_array($constr4)) { 
    $NoSerie4 = $contr4['serial_number']; 
} else { 
    $NoSerie4 = "Available"; 
    $contr4 = null; 
}

$Prueba4 = "&nbsp;";

if ($contr4) {
    $model_id = $contr4['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr4['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp4 = mysqli_query($enlace, $query);
    if ($consp4 = mysqli_fetch_array($conp4)) {
        $status = $consp4['status_text'];
        $test_name = $consp4['test_name'];
        $Prueba4 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-05
// ============================================
$constr5 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-05'");
if ($contr5 = mysqli_fetch_array($constr5)) { 
    $NoSerie5 = $contr5['serial_number']; 
} else { 
    $NoSerie5 = "Available"; 
    $contr5 = null; 
}

$Prueba5 = "&nbsp;";

if ($contr5) {
    $model_id = $contr5['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr5['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp5 = mysqli_query($enlace, $query);
    if ($consp5 = mysqli_fetch_array($conp5)) {
        $status = $consp5['status_text'];
        $test_name = $consp5['test_name'];
        $Prueba5 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-06
// ============================================
$constr6 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-06'");
if ($contr6 = mysqli_fetch_array($constr6)) { 
    $NoSerie6 = $contr6['serial_number']; 
} else { 
    $NoSerie6 = "Available"; 
    $contr6 = null; 
}

$Prueba6 = "&nbsp;";

if ($contr6) {
    $model_id = $contr6['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr6['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp6 = mysqli_query($enlace, $query);
    if ($consp6 = mysqli_fetch_array($conp6)) {
        $status = $consp6['status_text'];
        $test_name = $consp6['test_name'];
        $Prueba6 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-07
// ============================================
$constr7 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-07'");
if ($contr7 = mysqli_fetch_array($constr7)) { 
    $NoSerie7 = $contr7['serial_number']; 
} else { 
    $NoSerie7 = "Available"; 
    $contr7 = null; 
}

$Prueba7 = "&nbsp;";

if ($contr7) {
    $model_id = $contr7['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr7['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp7 = mysqli_query($enlace, $query);
    if ($consp7 = mysqli_fetch_array($conp7)) {
        $status = $consp7['status_text'];
        $test_name = $consp7['test_name'];
        $Prueba7 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-08
// ============================================
$constr8 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-08'");
if ($contr8 = mysqli_fetch_array($constr8)) { 
    $NoSerie8 = $contr8['serial_number']; 
} else { 
    $NoSerie8 = "Available"; 
    $contr8 = null; 
}

$Prueba8 = "&nbsp;";

if ($contr8) {
    $model_id = $contr8['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr8['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp8 = mysqli_query($enlace, $query);
    if ($consp8 = mysqli_fetch_array($conp8)) {
        $status = $consp8['status_text'];
        $test_name = $consp8['test_name'];
        $Prueba8 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-09
// ============================================
$constr9 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-09'");
if ($contr9 = mysqli_fetch_array($constr9)) { 
    $NoSerie9 = $contr9['serial_number']; 
} else { 
    $NoSerie9 = "Available"; 
    $contr9 = null; 
}

$Prueba9 = "&nbsp;";

if ($contr9) {
    $model_id = $contr9['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr9['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp9 = mysqli_query($enlace, $query);
    if ($consp9 = mysqli_fetch_array($conp9)) {
        $status = $consp9['status_text'];
        $test_name = $consp9['test_name'];
        $Prueba9 = cambiarColorPrueba($status, $test_name);
    }
}

// ============================================
// TR01-10
// ============================================
$constr10 = mysqli_query($enlace, "SELECT * FROM racks 
                                   WHERE unit_id = $unit_id 
                                   AND location_code = 'TR01-10'");
if ($contr10 = mysqli_fetch_array($constr10)) { 
    $NoSerie10 = $contr10['serial_number']; 
} else { 
    $NoSerie10 = "Available"; 
    $contr10 = null; 
}

$Prueba10 = "&nbsp;";

if ($contr10) {
    $model_id = $contr10['model_id'];
    $query = "SELECT tc.test_code, tc.test_name, tr.status, tr.status as status_text
              FROM test_results tr
              JOIN test_catalog tc ON tr.test_code = tc.test_code
              WHERE tr.rack_id = {$contr10['id']} 
              AND tr.status IN ('pending', 'waiting', 'running')
              ORDER BY tr.sequence_order
              LIMIT 1";
    
    $conp10 = mysqli_query($enlace, $query);
    if ($consp10 = mysqli_fetch_array($conp10)) {
        $status = $consp10['status_text'];
        $test_name = $consp10['test_name'];
        $Prueba10 = cambiarColorPrueba($status, $test_name);
    }
}
?>