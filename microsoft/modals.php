<?php
if(!isset($_REQUEST['pb'])){
    header("Location: index.php");
    exit;
}

include('conexion.php');
$variable = mysqli_real_escape_string($enlace, $_GET["pb"]);
$tr       = mysqli_real_escape_string($enlace, $_GET['tr']);
session_start();

// ── Tablas correctas: racksmicro y pruebasmicro (minúsculas) ─────────────────
$cons  = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE NoSerie = '$variable'");
$cons2 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '$variable'");

$con  = mysqli_fetch_array($cons);
$conp = mysqli_fetch_array($cons2);

// ── Helper seguro para leer campos de cualquier array ────────────────────────
function campo($arr, $key, $default = '') {
    return (is_array($arr) && isset($arr[$key]) && $arr[$key] !== null) ? $arr[$key] : $default;
}

// ── Consultar nombre/turno del técnico solo si el NoReloj no está vacío ──────
function getTecnico($enlace, $noReloj) {
    if (empty($noReloj)) return [];
    $nr  = mysqli_real_escape_string($enlace, $noReloj);
    $res = mysqli_query($enlace, "SELECT Nombre, Turno FROM users WHERE No_Reloj = '$nr'");
    return $res ? (mysqli_fetch_array($res) ?: []) : [];
}

// ── Extraer NoReloj de cada prueba ───────────────────────────────────────────
$nr = [
    'fto'       => campo($conp, 'FTONoReloj'),
    'quicktest' => campo($conp, 'QuickTestNoReloj'),
    'stress'    => campo($conp, 'StressNoReloj'),
    'mdaas'     => campo($conp, 'MDaaSNoReloj'),
    'racktest'  => campo($conp, 'RackTestNoReloj'),
    'fti'       => campo($conp, 'FTINoReloj'),
    'bsl'       => campo($conp, 'BSLNoReloj'),
    'cts'       => campo($conp, 'CTSNoReloj'),
    'packing'   => campo($conp, 'PackingNoReloj'),
];

$tec = [
    'fto'       => getTecnico($enlace, $nr['fto']),
    'quicktest' => getTecnico($enlace, $nr['quicktest']),
    'stress'    => getTecnico($enlace, $nr['stress']),
    'mdaas'     => getTecnico($enlace, $nr['mdaas']),
    'racktest'  => getTecnico($enlace, $nr['racktest']),
    'fti'       => getTecnico($enlace, $nr['fti']),
    'bsl'       => getTecnico($enlace, $nr['bsl']),
    'cts'       => getTecnico($enlace, $nr['cts']),
    'packing'   => getTecnico($enlace, $nr['packing']),
];

// ── Modal a mostrar ──────────────────────────────────────────────────────────
if (isset($_SESSION['Nombre'])) {
    $modal = $con ? 1 : 2;
} else {
    $modal = $con ? 3 : 4;
}

// ── Definición de pruebas en orden del flujo ─────────────────────────────────
// [label, campo_DB, campo_HoraInicial, campo_HoraStatus, ck_id, select_name, clave_tec, prueba_previa]
$pruebas = [
    ['FTO',       'FTO',       'FTOHoraInicial',       'FTOHoraStatus',       'ck1', 'fto',       'fto',       null],
    ['QuickTest', 'QuickTest', 'QuickTestHoraInicial', 'QuickTestHoraStatus', 'ck2', 'quicktest', 'quicktest', 'FTO'],
    ['Stress',    'Stress',    'StressHoraInicial',    'StressHoraStatus',    'ck3', 'stress',    'stress',    'QuickTest'],
    ['MDaaS',     'MDaaS',     'MDaaSHoraInicial',     'MDaaSHoraStatus',     'ck4', 'mdaas',     'mdaas',     'Stress'],
    ['RackTest',  'RackTest',  'RackTestHoraInicial',  'RackTestHoraStatus',  'ck5', 'racktest',  'racktest',  'MDaaS'],
    ['FTI',       'FTI',       'FTIHoraInicial',       'FTIHoraStatus',       'ck6', 'fti',       'fti',       'RackTest'],
    ['BSL',       'BSL',       'BSLHoraInicial',       'BSLHoraStatus',       'ck7', 'bsl',       'bsl',       'FTI'],
    ['CTS',       'CTS',       'CTSHoraInicial',       'CTSHoraStatus',       'ck8', 'cts',       'cts',       'BSL'],
    ['Packing',   'Packing',   'PackingHoraInicial',   'PackingHoraStatus',   'ck9', 'packing',   'packing',   'CTS'],
];

// Estilos adicionales para los checkboxes personalizados
echo '<style>
    .squaredTwo {
        width: 20px;
        height: 20px;
        margin: 0 auto;
    }
    .squaredTwo input[type=checkbox] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .squaredTwo input[type=checkbox]:disabled {
        cursor: not-allowed;
        opacity: 0.6;
    }
    .info {
        cursor: help;
        border-bottom: 1px dotted #666;
    }
    .info span {
        display: none;
    }
    .info:hover span {
        display: block;
        position: absolute;
        background: #333;
        color: white;
        padding: 5px;
        border-radius: 3px;
        margin-top: 5px;
    }
    .tablamodal, .tablaprueba {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 15px;
    }
    .tablamodal th, .tablaprueba th {
        background: #3e3e3e;
        color: white;
        padding: 8px;
        font-size: 14px;
    }
    .tablamodal td, .tablaprueba td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: center;
    }
    .tablamodal caption h3 {
        margin: 10px 0;
        color: #2574A9;
    }
    .btn1 {
        background: #2574A9;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn1:hover {
        background: #1a5a8c;
    }
    .comentarios {
        background: #f9f9f9;
        border-left: 4px solid #2574A9;
        padding: 10px;
        margin: 10px 0;
        text-align: left;
    }
</style>';

switch ($modal) {

// ═══════════════════════════════════════════════════════════════════════════════
// CASO 1 — Con sesión y con rack
// ═══════════════════════════════════════════════════════════════════════════════
case 1:
    if (campo($conp, 'FTO', 0) == 0) {
        echo '
        <div class="container my-3">
            <div class="accordion" id="cambioModeloAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseModelo">
                            Cambiar Modelo
                        </button>
                    </h2>
                    <div id="collapseModelo" class="accordion-collapse collapse" data-bs-parent="#cambioModeloAccordion">
                        <div class="accordion-body">
                            <form name="cambiarmodelo" id="cambiarmodelo" action="CambioModelo.php" method="post" class="row g-3">
                                <div class="col-12">
                                    <select name="modelo" class="form-select" required>
                                        <option value="" disabled selected>Seleccionar Modelo</option>
                                        <option value="Microsoft 8.2">Microsoft 8.2</option>
                                        <option value="NPI">NPI</option>
                                        <option value="Microsoft 8.3">Microsoft 8.3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100" form="cambiarmodelo">Cambiar</button>
                                </div>
                                <input type="hidden" value="'.htmlspecialchars($variable).'" name="NoSerie">
                                <input type="hidden" value="'.campo($con,'Modelo').'" name="modeloactual">
                                <input type="hidden" value="microsoft" name="Area">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }

    $inicionr   = campo($con, 'NoReloj');
    $conpinicio = getTecnico($enlace, $inicionr);

    echo '
    <div class="container my-4">
        <h3 class="text-center text-primary">'.htmlspecialchars(campo($con,'NoSerie')).'</h3>
        <table class="table table-bordered table-striped tablamodal">
            <thead class="table-dark">
                <tr>
                    <th>WO</th>
                    <th>SKU</th>
                    <th>Modelo</th>
                    <th>Registrado por</th>
                    <th>Hora Inicio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'.campo($con,'WO').'</td>
                    <td>'.campo($con,'SKU').'</td>
                    <td>'.campo($con,'Modelo').'</td>
                    <td>
                        <span class="info" title="'.$inicionr.'">'.$inicionr.'
                            <span class="badge bg-secondary">'.campo($conpinicio,'Nombre').'<br>'.campo($conpinicio,'Turno').'° Turno</span>
                        </span>
                    </td>
                    <td>'.campo($conp,'HoraInicio').'</td>
                </tr>
            </tbody>
        </table>';

    echo '
    <form method="post" action="actualizarmicrosoft.php" id="formmicrosoft">
        <input type="hidden" name="tr" value="'.htmlspecialchars($tr).'" form="formmicrosoft">
        <input type="hidden" name="noserie" value="'.htmlspecialchars(campo($con,'NoSerie')).'" form="formmicrosoft">
        <table class="table table-bordered table-striped tablaprueba">
            <thead class="table-dark">
                <tr>
                    <th>Prueba</th>
                    <th>Check</th>
                    <th>Status</th>
                    <th>Técnico</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($pruebas as $p) {
        list($label, $cdb, $chora, $choraStatus, $ckid, $selName, $claveTec, $previo) = $p;

        $val        = (int) campo($conp, $cdb, 0);
        $horaIni    = campo($conp, $chora);
        $horaStatus = campo($conp, $choraStatus);
        $noReloj    = campo($conp, $cdb.'NoReloj');
        $tecNombre  = campo($tec[$claveTec], 'Nombre');
        $tecTurno   = campo($tec[$claveTec], 'Turno');
        $HoraActual = date('Y-m-d H:i:s');

        // Alcanzable: sin previa (FTO) o la previa ya completada
        $previoCompletado = ($previo === null) ? true : ((int) campo($conp, $previo, 0) == 1);

        echo "<tr><td class='fw-bold'>$label:</td><td>";

        if ($val == 1) {
            // ✅ Completada
            echo "<div class='squaredTwo'><input type='checkbox' class='form-check-input' id='$ckid' name='test' value='$selName' disabled checked><label for='$ckid'></label></div>";
        } elseif (!$previoCompletado) {
            // 🔒 Bloqueada
            echo "<div class='squaredTwo'><input type='checkbox' class='form-check-input' id='$ckid' disabled><label for='$ckid'></label></div>";
        } else {
            // 🎯 Activa
            if ($label == 'FTO') {
                // ✅ FTO siempre habilitado (primera prueba)
                echo "<div class='squaredTwo'><input type='checkbox' class='form-check-input' id='$ckid' name='test' value='$selName' form='formmicrosoft'><label for='$ckid'></label></div>";
            } else {
                // Para las demás pruebas, checkbox habilitado solo cuando ya tienen HoraInicial
                $disabled = empty($horaIni) ? 'disabled' : '';
                echo "<div class='squaredTwo'><input type='checkbox' class='form-check-input' id='$ckid' name='test' value='$selName' form='formmicrosoft' $disabled><label for='$ckid'></label></div>";
            }
        }

        echo "</td><td>";

        // SI LA PRUEBA ESTÁ COMPLETADA (val == 1)
        if ($val == 1) {
            // Mostrar "Pass" en verde
            echo "<span class='badge bg-success'>Pass</span>";
        } 
        // SI LA PRUEBA NO ESTÁ COMPLETADA
        else {
            // Obtener el status actual de la base de datos
            $statusActual = campo($conp, $cdb.'Status2');

            // Select solo para prueba activa no completada
            if ($val == 0 && $previoCompletado) {
                
                // Determinar cuál opción debe estar seleccionada por defecto
                $selectedWaiting = '';
                $selectedRunning = '';
                $selectedFail = '';
                
                if (!empty($statusActual) && $statusActual != 'Vacio') {
                    // Si ya hay un status guardado, seleccionar ese
                    $selectedWaiting = ($statusActual == 'Waiting') ? 'selected' : '';
                    $selectedRunning = ($statusActual == 'Running') ? 'selected' : '';
                    $selectedFail = ($statusActual == 'Fail') ? 'selected' : '';
                } else {
                    // Por defecto, seleccionar Waiting
                    $selectedWaiting = 'selected';
                }
                
                // Mostrar select con la opción correcta seleccionada
                echo "<select name='status2_{$selName}' id='status2_{$selName}' class='form-select form-select-sm' form='formmicrosoft'>";
                echo "<option value='Waiting' $selectedWaiting>Waiting</option>";
                echo "<option value='Running' $selectedRunning>Running</option>";
                echo "<option value='Fail' $selectedFail>Fail</option>";
                echo "</select>";
                
                // Si no tiene HoraInicial, enviamos la hora actual
                if (empty($horaIni)) {
                    echo "<input type='hidden' name='HoraInicial' value='{$HoraActual}' form='formmicrosoft'>";
                }
            }
            // Bloqueada: celda vacía
        }
        echo "</td>";
       echo "<td><span class='info' title='$noReloj'>$noReloj<span class='badge bg-secondary'>$tecNombre <br> " . $tecTurno . "° Turno</span></span></td>";
        echo "<td>$horaStatus</td></tr>";
    }

    echo '</tbody></table>';

    if (campo($conp, 'Packing', 0) == 0) {
        echo '<div class="d-grid gap-2"><button type="submit" class="btn btn-primary" form="formmicrosoft">Actualizar</button></div></form>';
    } else {
        echo '</form>
        <form action="limpiartr.php" method="post" id="limpiar">
            <input type="hidden" value="'.htmlspecialchars($variable).'" name="NoSerie" form="limpiar">
            <div class="d-grid gap-2"><button type="submit" class="btn btn-success" form="limpiar">Limpiar TR</button></div>
        </form>';
    }

    // Comentarios - Con estilo de nota
$qComentarios = mysqli_query($enlace, "SELECT * FROM comentarios WHERE NoSerie = '$variable' ORDER BY ID DESC");

if (mysqli_num_rows($qComentarios) > 0) {
    echo '<hr class="my-4"><h4 class="text-center mb-4">Comentarios</h4>';
    
    while ($datos = mysqli_fetch_row($qComentarios)) {
        $noRelojCom = htmlspecialchars($datos[2] ?? '', ENT_QUOTES, 'UTF-8');
        $tecnico = htmlspecialchars($datos[3] ?? '', ENT_QUOTES, 'UTF-8');
        $fecha = htmlspecialchars($datos[4] ?? '', ENT_QUOTES, 'UTF-8');
        $comentario = htmlspecialchars($datos[5] ?? '', ENT_QUOTES, 'UTF-8');
        
        echo '<div class="comentario-nota">';
        echo '  <div class="comentario-header">';
        echo '      <span class="comentario-tecnico"><i class="fas fa-user me-2"></i>' . $tecnico . '</span>';
        echo '      <span class="comentario-reloj"><i class="far fa-id-card me-1"></i>' . $noRelojCom . '</span>';
        echo '  </div>';
        echo '  <div class="comentario-texto">' . nl2br($comentario) . '</div>';
        echo '  <div class="mt-2 text-end">';
        echo '      <small class="comentario-fecha"><i class="far fa-clock me-1"></i>' . $fecha . '</small>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    // Opcional: mostrar un mensaje si no hay comentarios
    echo '<p class="text-center text-muted my-4"><i class="far fa-comment-dots me-2"></i>No hay comentarios para este rack</p>';
}

// Formulario para agregar comentarios (manteniendo estilo Bootstrap)
echo '<div class="mt-4 p-3 bg-light rounded">';
echo '<form action="comentar.php" method="post">';
echo '  <div class="mb-3">';
echo '      <label for="comentario" class="form-label"><i class="fas fa-pen me-2"></i>Agregar comentario</label>';
echo '      <textarea name="comentario" class="form-control" id="comentario" rows="3" placeholder="Escribe tu comentario..." maxlength="255" required></textarea>';
echo '  </div>';
echo '  <input type="hidden" value="'.htmlspecialchars($variable).'" name="NoSerie">';
echo '  <div class="d-grid">';
echo '      <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i>Comentar</button>';
echo '  </div>';
echo '</form>';
echo '</div>';
    break;

// ═══════════════════════════════════════════════════════════════════════════════
// CASO 2 — Con sesión, sin rack → Registro
// ═══════════════════════════════════════════════════════════════════════════════
case 2:
    echo '
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Registrar Nuevo Rack</h4>
            </div>
            <div class="card-body">
                <form method="post" action="registrorack.php" id="formregistro">
                    <div class="mb-3">
                        <label class="form-label">No. Serie</label>
                        <input type="text" class="form-control" name="Noserie" placeholder="Ej: RXXXXXXXXXXXXXXF" 
                               required pattern="R[0-9a-zA-Z]{15}" maxlength="16" title="Debe comenzar con R y tener 16 caracteres">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">WO</label>
                        <input type="text" class="form-control" name="WO" placeholder="Ej: 123456789" 
                               required pattern="[0-9]{9}" maxlength="9" title="Deben ser 9 dígitos">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKU</label>
                        <input type="text" class="form-control" name="SKU" placeholder="SKU" 
                               required pattern="[A-Za-z0-9]{6,10}" maxlength="10" title="6-10 caracteres alfanuméricos">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <select name="Modelo" class="form-select" required>
                            <option value="" disabled selected>Seleccionar Modelo</option>
                            <option value="Microsoft 8.2">Microsoft 8.2</option>
                            <option value="NPI">NPI</option>
                            <option value="Microsoft 8.3">Microsoft 8.3</option>
                        </select>
                    </div>
                    <input type="hidden" name="tr" value="'.htmlspecialchars($tr).'">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registrar Rack</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
    break;

// ═══════════════════════════════════════════════════════════════════════════════
// CASO 3 — Sin sesión, con rack → Solo lectura
// ═══════════════════════════════════════════════════════════════════════════════
case 3:
    $inicionr   = campo($con, 'NoReloj');
    $conpinicio = getTecnico($enlace, $inicionr);

    echo '
    <div class="container my-4">
        <h3 class="text-center text-primary">'.htmlspecialchars(campo($con,'NoSerie')).'</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>WO</th>
                    <th>SKU</th>
                    <th>Modelo</th>
                    <th>Registrado por</th>
                    <th>Hora Inicio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'.campo($con,'WO').'</td>
                    <td>'.campo($con,'SKU').'</td>
                    <td>'.campo($con,'Modelo').'</td>
                    <td>
                        <span class="info" title="'.$inicionr.'">'.$inicionr.'
                            <span class="badge bg-secondary">'.campo($conpinicio,'Nombre').'<br>'.campo($conpinicio,'Turno').'° Turno</span>
                        </span>
                    </td>
                    <td>'.campo($conp,'HoraInicio').'</td>
                </tr>
            </tbody>
        </table>';

    echo '<table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Prueba</th>
                    <th>Check</th>
                    <th>Status</th>
                    <th>Técnico</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($pruebas as $p) {
        list($label, $cdb, $chora, $choraStatus, $ckid, $selName, $claveTec, $previo) = $p;

        $val        = $conp ? (int) campo($conp, $cdb, 0) : 0;
        $horaStatus = campo($conp, $choraStatus);
        $noReloj    = campo($conp, $cdb.'NoReloj');
        $tecNombre  = campo($tec[$claveTec], 'Nombre');
        $tecTurno   = campo($tec[$claveTec], 'Turno');
        
        // Obtener el status actual para mostrarlo como texto
        $statusActual = campo($conp, $cdb.'Status2');

        echo "<tr><td class='fw-bold'>$label:</td><td>";
        
        // TODOS los checkboxes deshabilitados SIN importar el estado
        if ($val == 1) {
            // Completada - mostrar check marcado y deshabilitado
            echo "<div class='squaredTwo'><input type='checkbox' class='form-check-input' id='$ckid' disabled checked><label for='$ckid'></label></div>";
        } else {
            // No completada - mostrar check vacío y deshabilitado
            echo "<div class='squaredTwo'><input type='checkbox' class='form-check-input' id='$ckid' disabled><label for='$ckid'></label></div>";
        }
        
        echo "</td><td>";
        
        // Mostrar el status como texto con color (sin select)
        if ($val == 1) {
            // Si está completada, mostrar "Pass" en verde
            echo "<span class='badge bg-success'>Pass</span>";
        } elseif (!empty($statusActual) && $statusActual != 'Vacio' && $statusActual != '') {
            $badgeClass = '';
            switch ($statusActual) {
                case 'Waiting': $badgeClass = 'bg-warning text-dark'; break;
                case 'Running': $badgeClass = 'bg-info text-dark'; break;
                case 'Fail': $badgeClass = 'bg-danger'; break;
                default: $badgeClass = 'bg-secondary';
            }
            echo "<span class='badge $badgeClass'>$statusActual</span>";
        }
        
        echo "</td>";        echo "<td><span class='info' title='$noReloj'>$noReloj<span class='badge bg-secondary'>$tecNombre <br> " . $tecTurno . "° Turno</span></span></td>";

        echo "<td>$horaStatus</td></tr>";
    }

    echo '</tbody></table></div>';
    break;

// ═══════════════════════════════════════════════════════════════════════════════
// CASO 4 — Sin sesión y sin rack
// ═══════════════════════════════════════════════════════════════════════════════
case 4:
    echo '
    <div class="container text-center py-5">
        <div class="alert alert-warning">
            <h4 class="alert-heading">¡Debe iniciar sesión!</h4>
            <p>Para registrar un rack necesitas iniciar sesión.</p>
            <hr>
            <a href="#modal" class="btn btn-primary">Iniciar Sesión</a>
        </div>
        <img src="img/icono.png" width="178" height="180" class="mt-3" alt="Icono">
    </div>';
    break;
}
?>