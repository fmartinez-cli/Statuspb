<?php
include('conexion.php');
include('consultas4.php');

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabla Bahía 4</title>

    <link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="css/stylef.css">
	<!-- <link rel="stylesheet" href="css/popup.css"> -->
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="shortcut icon" href="img/checkicon.png" />
	<!-- <link rel="stylesheet" href="css/component.css"> -->
	<!-- <link rel="stylesheet" href="css/moodalbox.css"> -->



    
  
</head>
<body>
    <section>
        <div class="grupo">
            <div class='caja'>
                <form id='racks-form' method='POST' action='update_comentariosJRS.php'>
                    <table width='100%' style='opacity:.9 ;' class='tablaST'>
                        <caption style='background-color:#3e3e3e; padding:5px;'><h1 style='color:white;'>Microsoft 8.2</h1></caption>
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
                            <th>Comentarios</th>
                        </tr>
                        <?php
                        // Consulta para obtener la información de los racks y pruebas Micro
                        $query = mysqli_query($enlace, "SELECT racks.Locacion, racks.NoSerie, racks.WO, racks.SKU, racks.Modelo, pruebasMicro.FTO, pruebasMicro.QuickTest, pruebasMicro.Stress, pruebasMicro.MDaaS, pruebasMicro.Racktest, pruebasMicro.FTI, pruebasMicro.BSL, pruebasMicro.CTS, pruebasMicro.Packing, pruebasMicro.FTOStatus2, pruebasMicro.QuickTestStatus2, pruebasMicro.StressStatus2, pruebasMicro.MDaaSStatus2, pruebasMicro.RackTestStatus2, pruebasMicro.FTIStatus2, pruebasMicro.BSLStatus2, pruebasMicro.CTSStatus2, pruebasMicro.PackingStatus2, racks.comentarios_JRS, pruebasMicro.HoraInicio, pruebasMicro.PackingHoraFinal FROM racks INNER JOIN pruebasMicro ON pruebasMicro.NoSerie = racks.NoSerie WHERE Bahia = '4' AND (Modelo = 'Microsoft 8.2' OR Modelo = 'Microsoft 8.3' OR Modelo = 'NPI') ORDER BY Locacion ASC");
                        
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
                                
                                echo "<td bgcolor='$cellColor'>$cellContent</td>";
                            }
                            
                            // Agrega la columna de comentarios editable
                            echo "<td contenteditable='true' id='comentarios_" . $datos[1] . "'>" . $datos[23] . "</td>";
                            echo "<input type='hidden' name='ids[]' value='" . $datos[1] . "'>";
                            
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </form>
            </div>
        </div>
    </section>
    <script src="js/dataTables/jquery-3.5.1.js"></script> 

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
