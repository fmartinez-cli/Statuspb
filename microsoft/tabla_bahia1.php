<?php
include('conexion.php');
include('consultas1.php');

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabla Bahía 1</title>
    <link href="css/estilos_tablas.css" rel="stylesheet">
    <link href="css/bootstrap5.0.2.min.css" rel="stylesheet">
</head>
<body >
<div class="container-fluid">
<section class="mt-5">
<div class="table-responsive">
<h1 class="text-center bg-dark text-white p-3">Bahia 1</h1>
        <form id='racks-form' method='POST' action='update_comentariosJRS.php'>

        <table class="table-bordered table table-striped">
                <thead class="text-center  p-3 display-10">
                    <tr>
                        <th>Locacion</th>
                        <th>No Serie</th>
                        <th>WO</th>
                        <th>SKU</th>
                        <th>Modelo</th>
                        <th>FTO</th>
                        <th>QuickTest</th>
                        <th>StressTest</th>
                        <th>MDaaS</th>
                        <th>RackTest</th>
                        <th>FTI</th>
                        <th>Bootstrap</th>
                        <th>CTS</th>
                        <th>Packing</th>
                        <th>Tiempo Total</th>
                        <th>Comentarios</th>
                    </tr>
                </thead>
                        <?php
                        // Consulta para obtener la información de los racks y pruebas Micro
                        $query = mysqli_query($enlace, "SELECT racks.Locacion, racks.NoSerie, racks.WO, racks.SKU, racks.Modelo, pruebasMicro.FTO, pruebasMicro.QuickTest, pruebasMicro.Stress, pruebasMicro.MDaaS, pruebasMicro.Racktest, pruebasMicro.FTI, pruebasMicro.BSL, pruebasMicro.CTS, pruebasMicro.Packing, pruebasMicro.FTOStatus2, pruebasMicro.QuickTestStatus2, pruebasMicro.StressStatus2, pruebasMicro.MDaaSStatus2, pruebasMicro.RackTestStatus2, pruebasMicro.FTIStatus2, pruebasMicro.BSLStatus2, pruebasMicro.CTSStatus2, pruebasMicro.PackingStatus2, racks.comentarios_JRS, pruebasMicro.HoraInicio, pruebasMicro.PackingHoraFinal FROM racks INNER JOIN pruebasMicro ON pruebasMicro.NoSerie = racks.NoSerie WHERE Bahia = '1' AND (Modelo = 'Microsoft 8.2' OR Modelo = 'Microsoft 8.3' OR Modelo = 'NPI') ORDER BY Locacion ASC");

                        while ($datos = mysqli_fetch_row($query)) {
                            echo "<tr>
                            <td class='tdinfo'>" . $datos[0] . "</td>
                            <td class='tdinfo'>" . $datos[1] . "</td>
                            <td class='tdinfo'>" . $datos[2] . "</td>
                            <td class='tdinfo'>" . $datos[3] . "</td>
                            <td class='tdinfo'>" . $datos[4] . "</td>";
                        
                            for ($i = 5; $i <= 13; $i++) {
                                $statusValue = $datos[$i];
                                $status2Value = $datos[$i + 9]; // Obtiene el valor correspondiente de Status2
                                $cellContent = '';
                                $cellColor = '';
                        
                                if ($statusValue == 1) {
                                    $cellColor = '#008000'; // Verde
                                    // No se asigna contenido
                                } elseif ($statusValue == 0) {
                                    // Se toma como referencia el valor de la columna correspondiente a la prueba de Status2
                                    if ($status2Value == 'Vacio') {
                                        // No se asigna color ni contenido
                                    } elseif ($status2Value == 'Waiting') {
                                        $cellColor = '#f7a307'; // Naranja
                                    } elseif ($status2Value == 'Running') {
                                        $cellColor = '#FFFF00'; // Amarillo
                                    } elseif ($status2Value == 'Fail') {
                                        $cellColor = '#FF0000'; // Rojo
                                    }
                                }
                        
                                echo "<td style='background-color: $cellColor'>$cellContent</td>";
                            }

                            // Calcula el tiempo total
                            $horaInicio = $datos[24];
                            $packingHoraFinal = $datos[25];
                            $totalTime = "N/A";

                            // Verifica que tanto la fecha de inicio como la fecha de finalización de la prueba de Packing no estén vacías
                            if (!empty($horaInicio) && !empty($packingHoraFinal)) {
                                $horaInicioDateTime = new DateTime($horaInicio);
                                $packingHoraFinalDateTime = new DateTime($packingHoraFinal);
                            } else {
                                // Si alguna de las fechas está vacía, se utiliza la hora actual del sistema
                                $horaInicioDateTime = new DateTime($horaInicio);
                                $packingHoraFinalDateTime = new DateTime(date('Y-m-d H:i:s'));
                            }

                            // Realiza la resta entre las fechas y obtiene el intervalo
                            $interval = $packingHoraFinalDateTime->diff($horaInicioDateTime);

                            // Obtiene los componentes del intervalo
                            $dias = $interval->format('%a');
                            $horas = $interval->format('%H');
                            $minutos = $interval->format('%I');

                            // Construye el tiempo total en el formato "Días, Horas y Minutos"
                            $totalTime = "";
                            if ($dias > 0) {
                                $totalTime .= $dias ."d,";
                            }
                            $totalTime .= $horas . "h,".$minutos ."min";

                            // Muestra el tiempo total en la columna "Tiempo Total"
                            echo "<td class='tdinfo'>" . $totalTime . "</td>";


                            // Agrega la columna de comentarios editable
                            echo "<td contenteditable='true' id='comentarios_" . $datos[1] . "'>" . $datos[23] . "</td>";
                            echo "<input type='hidden' name='ids[]' value='" . $datos[1] . "'>";

                            echo "</tr>";
                        }
                        ?>
                     </table>
        </form>
    </div> <!-- Fin div container -->
    </section>

</div> <!-- Fin div main -->
    <script src="js/dataTables/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('[contenteditable="true"]').on('blur', function() {
                var fullId = $(this).attr('id');
                var id = fullId.split('_')[1]; // toma la segunda parte de la cadena dividida, que es el número de serie
                var value = $(this).text();
                console.log("Full ID: " + fullId);
                console.log("ID: " + id);
                console.log("Value: " + value);
                $.ajax({
                    url: 'update_comentariosJRS.php',
                    type: 'POST',
                    data: {
                        ids: [id], // Envía un arreglo con un solo elemento
                        comentarios: [value] // Envía un arreglo con un solo elemento
                    },
                    success: function(response) {
                        // puedes agregar algo aquí para manejar la respuesta del servidor si lo deseas
                        console.log(response);
                        // No es necesario recargar la página porque los cambios se guardan automáticamente
                    }
                });
            });
        });
    </script>

</body>
</html>
