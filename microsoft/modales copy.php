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

switch ($modal) {

// ═══════════════════════════════════════════════════════════════════════════════
// CASO 1 — Con sesión y con rack
// ═══════════════════════════════════════════════════════════════════════════════
case 1:
    if (campo($conp, 'FTO', 0) == 0) {
        echo '
        <div class="centrar">
        <details style="background-color:#4f4f4f;">
        <summary>Cambiar Modelo</summary>
        <form name="cambiarmodelo" id="cambiarmodelo" action="CambioModelo.php" method="post">
            <select name="modelo" class="Select2" required>
                <option value="" disabled selected>Modelo</option>
                <option value="Microsoft 8.2">Microsoft 8.2</option>
                <option value="NPI">NPI</option>
                <option value="Microsoft 8.3">Microsoft 8.3</option>
            </select><br>
            <button class="btn1" form="cambiarmodelo">Cambiar</button>
            <input type="hidden" value="'.htmlspecialchars($variable).'" name="NoSerie">
            <input type="hidden" value="'.campo($con,'Modelo').'" name="modeloactual">
            <input type="hidden" value="microsoft" name="Area">
        </form></details></div>';
    }

    $inicionr   = campo($con, 'NoReloj');
    $conpinicio = getTecnico($enlace, $inicionr);

    echo "
    <center>
    <table class='tablamodal'>
    <caption><h3>".htmlspecialchars(campo($con,'NoSerie'))."</h3></caption>
    <tr><th>WO</th><th>SKU</th><th>Modelo</th><th>Registrado por:</th><th>Hora</th></tr>
    <tr>
        <td>".campo($con,'WO')."</td>
        <td>".campo($con,'SKU')."</td>
        <td>".campo($con,'Modelo')."</td>
        <td><p class='info'>$inicionr<span>".campo($conpinicio,'Nombre')." <br> ".campo($conpinicio,'Turno')."&deg; Turno</span></p></td>
        <td>".campo($conp,'HoraInicio')."</td>
    </tr>
    </table></center>";

    echo "<center>
    <table class='tablaprueba'>
    <tr><th>Prueba</th><th>Status2</th><th>Status</th><th>Tecnico</th><th>Hora</th></tr>
    <form method='post' action='actualizarmicrosoft.php' id='formmicrosoft'>
    <input type='hidden' name='tr'      value='".htmlspecialchars($tr)."'                   form='formmicrosoft'>
    <input type='hidden' name='noserie' value='".htmlspecialchars(campo($con,'NoSerie'))."' form='formmicrosoft'>";

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

    echo "<tr><td>$label:</td><td>";

    if ($val == 1) {
        // ✅ Completada
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='$ckid' name='test' value='$selName' disabled checked><label for='$ckid'></label></div>";
    } elseif (!$previoCompletado) {
        // 🔒 Bloqueada
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='$ckid' disabled><label for='$ckid'></label></div>";
    } else {
        // 🔓 Activa — checkbox habilitado solo cuando ya tiene HoraInicial (ya se inició el status)
        $disabled = empty($horaIni) ? 'disabled' : '';
        echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='$ckid' name='test' value='$selName' form='formmicrosoft' $disabled><label for='$ckid'></label></div>";
    }

    echo "</td><td data-status2>";

    // Obtener el status actual de la base de datos
    $statusActual = campo($conp, $cdb.'Status2');

    // Select solo para prueba activa no completada
    if ($val == 0 && $previoCompletado) {
        
        // CASO 1: Ya existe un status guardado en la BD (Waiting, Running, Fail)
        if (!empty($statusActual) && $statusActual != 'Vacio' && $statusActual != '') {
            
            // Mostrar el status como texto con color
            $color = '';
            switch ($statusActual) {
                case 'Waiting': $color = 'orange'; break;
                case 'Running': $color = 'yellow'; break;
                case 'Fail': $color = 'red'; break;
                default: $color = '';
            }
            echo "<span style='color: $color; font-weight: bold;'>$statusActual</span>";
            
            // ⚠️ IMPORTANTE: Enviar el status actual como campo hidden
            echo "<input type='hidden' name='status2_{$selName}' value='{$statusActual}' form='formmicrosoft'>";
            
            // Si no tiene HoraInicial, igual enviamos la hora actual como hidden
            if (empty($horaIni)) {
                echo "<input type='hidden' name='HoraInicial' value='{$HoraActual}' form='formmicrosoft'>";
            }
        }
        // CASO 2: No tiene status guardado (es primera vez) - Mostrar select
        elseif (empty($horaIni)) {
            // Primera vez: select required
            echo "<select name='status2_{$selName}' id='status2_{$selName}' form='formmicrosoft' required>
                    <option value='' disabled selected>Seleccionar</option>
                    <option value='Waiting'>Waiting</option>
                    <option value='Running'>Running</option>
                    <option value='Fail'>Fail</option>
                  </select>";
            echo "<input type='hidden' name='HoraInicial' value='{$HoraActual}' form='formmicrosoft'>";
        }
        // CASO 3: Ya tiene HoraInicial pero no status (select de actualización)
        else {
            echo "<select name='status2_{$selName}' id='status2_{$selName}' form='formmicrosoft'>
                    <option value=''>Seleccionar</option>
                    <option value='Waiting'>Waiting</option>
                    <option value='Running'>Running</option>
                    <option value='Fail'>Fail</option>
                  </select>";
        }
    }
    // Bloqueada o completada: celda vacía
    echo "</td>";
    echo "<td><p class='info' title=''>$noReloj<span>$tecNombre <br> $tecTurno&deg; Turno</span></p></td>";
    echo "<td>$horaStatus</td></tr>";
}

    echo "</table>";

    if (campo($conp, 'Packing', 0) == 0) {
        echo '<br><button class="btn1" style="width:95%;" form="formmicrosoft">Actualizar</button></form></center>';
    } else {
        echo '</form>
        <form action="limpiartr.php" method="post" id="limpiar">
            <input type="hidden" value="'.htmlspecialchars($variable).'" name="NoSerie" form="limpiar">
            <button class="btn1" style="width:95%;" form="limpiar">Limpiar TR</button>
        </form></center>';
    }

    // Comentarios
    $qComentarios = mysqli_query($enlace, "SELECT * FROM comentarios WHERE NoSerie = '$variable' ORDER BY ID ASC");
    echo '<center><h2><hr style="width:95%;margin-top:15px;height:5px;margin-bottom:15px;">Comentarios</h2></center><br>';
    while ($datos = mysqli_fetch_row($qComentarios)) {
        $comentario = htmlspecialchars($datos[5], ENT_QUOTES, 'UTF-8');
        echo '<center><div class="comentarios">
            <div><p title="'.htmlspecialchars($datos[2]).'"><h3>T&eacute;cnico: '.htmlspecialchars($datos[3]).'</h3></p></div>
            <div style="white-space:pre-wrap;word-break:break-all;word-wrap:break-word;">
                <h5 style="color:#2574a9;">Fecha: '.$datos[4].'</h5>
                <p>'.$comentario.'</p>
            </div>
        </div><br></center>';
    }
    echo '<form action="comentar.php" method="post">
        <center><textarea name="comentario" rows="8" style="resize:none;width:95%" placeholder="Comentar..." maxlength="255"></textarea></center>
        <input type="hidden" value="'.htmlspecialchars($variable).'" name="NoSerie">
        <center><button class="btn1" style="width:95%">Comentar</button></center>
    </form>';
    break;

// ═══════════════════════════════════════════════════════════════════════════════
// CASO 2 — Con sesión, sin rack → Registro
// ═══════════════════════════════════════════════════════════════════════════════
case 2:
    echo '
    <center><div class="grupo-centar"><div class="caja">
    <div class="registro">
    <h1 style="color:white;">Registrar Rack</h1>
    <table class="tablaregistro">
    <form class="RegistroR" method="post" action="registrorack.php" id="formregistro">
    <tr><td><input type="text" title="Ejemplo: RXXXXXXXXXXXXXXF" name="Noserie" placeholder="No. Serie"
        required form="formregistro" maxlength="16" pattern="R[0-9a-zA-Z]{15}"></td></tr>
    <tr><td><input type="text" name="WO" placeholder="WO"
        required form="formregistro" maxlength="9" pattern="[0-9]{9}" title="Ejemplo: 123456789"></td></tr>
    <tr><td><input type="text" name="SKU" placeholder="SKU"
        required form="formregistro" maxlength="10" pattern="[A-Za-z0-9]{6,10}" title="Solo números y/o letras"></td></tr>
    <tr><td>
        <select name="Modelo" class="Selectl" required form="formregistro">
            <option value="" disabled selected>Modelo</option>
            <option value="Microsoft 8.2">Microsoft 8.2</option>
            <option value="NPI">NPI</option>
            <option value="Microsoft 8.3">Microsoft 8.3</option>
        </select>
    </td></tr>
    </table>
    <button class="btn1" form="formregistro"><h1>Registrar</h1></button>
    <input type="hidden" name="tr" value="'.htmlspecialchars($tr).'" form="formregistro">
    </form>
    </div></div></div></center>';
    break;

// ═══════════════════════════════════════════════════════════════════════════════
// CASO 3 — Sin sesión, con rack → Solo lectura
// ═══════════════════════════════════════════════════════════════════════════════
case 3:
    $inicionr   = campo($con, 'NoReloj');
    $conpinicio = getTecnico($enlace, $inicionr);

    echo "
    <center>
    <table class='tablamodal'>
    <caption><h3>".htmlspecialchars(campo($con,'NoSerie'))."</h3></caption>
    <tr><th>WO</th><th>SKU</th><th>Modelo</th><th>Registrado por:</th><th>Hora</th></tr>
    <tr>
        <td>".campo($con,'WO')."</td>
        <td>".campo($con,'SKU')."</td>
        <td>".campo($con,'Modelo')."</td>
        <td><p class='info'>$inicionr<span>".campo($conpinicio,'Nombre')." <br> ".campo($conpinicio,'Turno')."&deg; Turno</span></p></td>
        <td>".campo($conp,'HoraInicio')."</td>
    </tr>
    </table></center>";

    echo "<center>
    <table class='tablaprueba'>
    <tr><th>Prueba</th><th>Status2</th><th>Status</th><th>Tecnico</th><th>Hora</th></tr>";

    foreach ($pruebas as $p) {
        list($label, $cdb, $chora, $choraStatus, $ckid, $selName, $claveTec, $previo) = $p;

        $val        = $conp ? (int) campo($conp, $cdb, 0) : 0;
        $previoVal  = ($previo && $conp) ? (int) campo($conp, $previo, 0) : 1;
        $horaStatus = campo($conp, $choraStatus);
        $noReloj    = campo($conp, $cdb.'NoReloj');
        $tecNombre  = campo($tec[$claveTec], 'Nombre');
        $tecTurno   = campo($tec[$claveTec], 'Turno');

        echo "<tr><td>$label:</td><td>";
        if ($val == 1) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='$ckid' disabled checked><label for='$ckid'></label></div>";
        } elseif ($previoVal == 0) {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='$ckid' disabled><label for='$ckid'></label></div>";
        } else {
            echo "<div class='squaredTwo'><input type='checkbox' class='statusCheckbox' id='$ckid'><label for='$ckid'></label></div>";
        }
        echo "</td><td data-status2></td>";
        echo "<td><p class='info' title=''>$noReloj<span>$tecNombre <br> $tecTurno&deg; Turno</span></p></td>";
        echo "<td>$horaStatus</td></tr>";
    }

    echo "</table></center>";
    break;

// ═══════════════════════════════════════════════════════════════════════════════
// CASO 4 — Sin sesión y sin rack
// ═══════════════════════════════════════════════════════════════════════════════
case 4:
    echo "<center><br><br><br>
    <h1>Debe iniciar sesi&oacute;n para registrar un rack</h1>
    <br><br><br>
    <img src='img/icono.png' width='178' height='180'>
    </center>";
    break;
}
?>