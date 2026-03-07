<?php
include('conexion.php');
include('consultas1.php');

session_start();

// Función para formatear tiempo progresivo
function formatearTiempoProgresivo($horaInicio, $horaFinal) {
    if (empty($horaInicio) || $horaInicio == 'Vacio') {
        return 'No iniciado';
    }
    
    if (empty($horaFinal) || $horaFinal == 'Vacio') {
        $horaFinal = date('Y-m-d H:i:s');
    }
    
    try {
        $inicio = new DateTime($horaInicio);
        $final = new DateTime($horaFinal);
        $interval = $inicio->diff($final);
        
        if ($interval->days > 0) {
            return $interval->format('%ad %hh %im');
        } elseif ($interval->h > 0) {
            return $interval->format('%hh %im');
        } else {
            return $interval->format('%im');
        }
        
    } catch (Exception $e) {
        return 'Error';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla Bahía 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        /* Tamaño de letra original */
        body {
            font-size: 14px;
        }
        .table {
            font-size: 14px;
            width: 100%;
            table-layout: auto;
        }
        .table th {
            background-color: #343a40;
            color: white;
            font-weight: 600;
            padding: 10px 8px;
            white-space: nowrap;
            vertical-align: middle;
            text-align: center;
        }
        .table td {
            padding: 8px 5px;
            vertical-align: middle;
            white-space: nowrap;
        }
        
        /* COLORES PARA EL MODELO */
        .modelo-8-2 { 
            background-color: #2574A9 !important; 
            color: white !important; 
            font-weight: bold; 
            text-align: center;
        }
        .modelo-8-3 { 
            background-color: #049372 !important; 
            color: white !important; 
            font-weight: bold; 
            text-align: center;
        }
        .modelo-npi { 
            background-color: #e26715 !important; 
            color: white !important; 
            font-weight: bold; 
            text-align: center;
        }
        .modelo-other { 
            background-color: #3e3e3e !important; 
            color: white !important; 
            font-weight: bold; 
            text-align: center;
        }
        
        /* COLORES PARA LOS ESTADOS DE LAS PRUEBAS */
        .bg-pass { 
            background-color: #008000 !important; 
            width: 100%;
            height: 100%;
            display: block;
        }
        .bg-waiting { 
            background-color: #f7a307 !important; 
            width: 100%;
            height: 100%;
            display: block;
        }
        .bg-running { 
            background-color: #FFFF00 !important; 
            width: 100%;
            height: 100%;
            display: block;
        }
        .bg-fail { 
            background-color: #FF0000 !important; 
            width: 100%;
            height: 100%;
            display: block;
        }
        .bg-empty { 
            background-color: transparent !important; 
        }
        
        /* Celdas de prueba con altura fija */
        .prueba-cell {
            padding: 0 !important;
            width: 40px;
            height: 30px;
            text-align: center;
            vertical-align: middle;
        }
        .prueba-cell div {
            width: 100%;
            height: 100%;
            min-height: 30px;
        }
        
        /* Comentarios editables */
        [contenteditable="true"] {
            background-color: #fff9e6;
            padding: 5px 8px;
            border-radius: 4px;
            min-width: 150px;
            display: block;
            cursor: text;
        }
        [contenteditable="true"]:hover {
            background-color: #fff3cd;
        }
        [contenteditable="true"]:focus {
            background-color: #fff;
            outline: 2px solid #2574A9;
        }
        
        /* Leyenda de colores */
        .leyenda-colores {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        .leyenda-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .color-box {
            width: 20px;
            height: 20px;
            border: 1px solid #6c757d;
        }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid py-3">
    <h1 class="text-center bg-dark text-white py-3 rounded mb-4">Bahía 1 </h1>
    
 <!-- LEYENDA DE COLORES - DOS LÍNEAS SEPARADAS -->
<div style="margin-bottom: 20px;">
    <!-- Primera línea: Modelos -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px; align-items: center; padding: 10px; background-color: #f8f9fa; border-radius: 5px 5px 0 0; border: 1px solid #dee2e6; border-bottom: none;">
        <span style="font-weight: bold; min-width: 70px;">Modelos:</span>
        <div style="display: flex; flex-wrap: wrap; gap: 15px;">
            <div style="display: flex; align-items: center; gap: 5px;"><span style="display: inline-block; width: 20px; height: 20px; background-color: #2574A9; border: 1px solid #6c757d;"></span> Microsoft 8.2</div>
            <div style="display: flex; align-items: center; gap: 5px;"><span style="display: inline-block; width: 20px; height: 20px; background-color: #049372; border: 1px solid #6c757d;"></span> Microsoft 8.3</div>
            <div style="display: flex; align-items: center; gap: 5px;"><span style="display: inline-block; width: 20px; height: 20px; background-color: #e26715; border: 1px solid #6c757d;"></span> NPI</div>
        </div>
    </div>
    
    <!-- Segunda línea: Estados -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px; align-items: center; padding: 10px; background-color: #f8f9fa; border-radius: 0 0 5px 5px; border: 1px solid #dee2e6; border-top: none;">
        <span style="font-weight: bold; min-width: 70px;">Estados:</span>
        <div style="display: flex; flex-wrap: wrap; gap: 15px;">
            <div style="display: flex; align-items: center; gap: 5px;"><span style="display: inline-block; width: 20px; height: 20px; background-color: #008000; border: 1px solid #6c757d;"></span> Pass</div>
            <div style="display: flex; align-items: center; gap: 5px;"><span style="display: inline-block; width: 20px; height: 20px; background-color: #f7a307; border: 1px solid #6c757d;"></span> Waiting</div>
            <div style="display: flex; align-items: center; gap: 5px;"><span style="display: inline-block; width: 20px; height: 20px; background-color: #FFFF00; border: 1px solid #6c757d;"></span> Running</div>
            <div style="display: flex; align-items: center; gap: 5px;"><span style="display: inline-block; width: 20px; height: 20px; background-color: #FF0000; border: 1px solid #6c757d;"></span> Fail</div>
        </div>
    </div>
</div>
    
    <form id='racks-form' method='POST' action='update_comentariosJRS.php'>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Locación</th>
                        <th>No Serie</th>
                        <th>WO</th>
                        <th>SKU</th>
                        <th>Modelo</th>
                        <th>FTO</th>
                        <th>QuickTest</th>
                        <th>Stress</th>
                        <th>MDaaS</th>
                        <th>RackTest</th>
                        <th>FTI</th>
                        <th>BSL</th>
                        <th>CTS</th>
                        <th>Packing</th>
                        <th>Tiempo Total</th>
                        <th>Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para obtener la información de los racks y pruebas Micro
                    $query = mysqli_query($enlace, "SELECT racksmicro.Locacion, racksmicro.NoSerie, racksmicro.WO, racksmicro.SKU, racksmicro.Modelo, pruebasmicro.FTO, pruebasmicro.QuickTest, pruebasmicro.Stress, pruebasmicro.MDaaS, pruebasmicro.Racktest, pruebasmicro.FTI, pruebasmicro.BSL, pruebasmicro.CTS, pruebasmicro.Packing, pruebasmicro.FTOStatus2, pruebasmicro.QuickTestStatus2, pruebasmicro.StressStatus2, pruebasmicro.MDaaSStatus2, pruebasmicro.RackTestStatus2, pruebasmicro.FTIStatus2, pruebasmicro.BSLStatus2, pruebasmicro.CTSStatus2, pruebasmicro.PackingStatus2, racksmicro.comentarios_JRS, pruebasmicro.HoraInicio, pruebasmicro.PackingHoraFinal FROM racksmicro INNER JOIN pruebasmicro ON pruebasmicro.NoSerie = racksmicro.NoSerie WHERE Bahia = '1' AND (Modelo = 'Microsoft 8.2' OR Modelo = 'Microsoft 8.3' OR Modelo = 'NPI') ORDER BY Locacion ASC");

                    while ($datos = mysqli_fetch_row($query)):
                        
                        // Determinar clase CSS para el modelo
                        $claseModelo = 'modelo-other';
                        if ($datos[4] == 'Microsoft 8.2') $claseModelo = 'modelo-8-2';
                        elseif ($datos[4] == 'Microsoft 8.3') $claseModelo = 'modelo-8-3';
                        elseif ($datos[4] == 'NPI') $claseModelo = 'modelo-npi';
                        
                        echo "<tr>";
                        
                        // Columnas de información básica
                        echo "<td class='fw-bold'>" . $datos[0] . "</td>";
                        echo "<td>" . $datos[1] . "</td>";
                        echo "<td>" . $datos[2] . "</td>";
                        echo "<td>" . $datos[3] . "</td>";
                        echo "<td class='$claseModelo'>" . $datos[4] . "</td>";
                        
                        // Columnas de pruebas (índices 5 a 13 - valores de estado)
                        for ($i = 5; $i <= 13; $i++) {
                            $statusValue = $datos[$i];
                            $status2Value = $datos[$i + 9]; // Status2 correspondiente
                            $claseColor = 'bg-empty';
                            
                            if ($statusValue == 1) {
                                $claseColor = 'bg-pass';
                            } elseif ($statusValue == 0) {
                                if ($status2Value == 'Waiting') {
                                    $claseColor = 'bg-waiting';
                                } elseif ($status2Value == 'Running') {
                                    $claseColor = 'bg-running';
                                } elseif ($status2Value == 'Fail') {
                                    $claseColor = 'bg-fail';
                                }
                            }
                            
                            // Celda con color de fondo
                            echo "<td class='prueba-cell'><div class='$claseColor'></div></td>";
                        }

                        // Calcular tiempo total
                        $horaInicio = $datos[24];
                        $packingHoraFinal = $datos[25];
                        
                        $tiempoTotal = formatearTiempoProgresivo($horaInicio, $packingHoraFinal);
                        
                        echo "<td class='text-center'>" . $tiempoTotal . "</td>";
                        
                        // Columna de comentarios editable
                        echo "<td>";
                        echo "<span contenteditable='true' id='comentarios_" . $datos[1] . "'>" . ($datos[23] ?: '') . "</span>";
                        echo "<input type='hidden' name='ids[]' value='" . $datos[1] . "'>";
                        echo "</td>";
                        
                        echo "</tr>";
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('[contenteditable="true"]').on('blur', function() {
            var fullId = $(this).attr('id');
            var id = fullId.split('_')[1];
            var value = $(this).text().trim();
            
            $.ajax({
                url: 'update_comentariosJRS.php',
                type: 'POST',
                data: {
                    ids: [id],
                    comentarios: [value]
                },
                success: function(response) {
                    console.log("Comentario guardado:", response);
                }
            });
        });
    });
</script>

</body>
</html>