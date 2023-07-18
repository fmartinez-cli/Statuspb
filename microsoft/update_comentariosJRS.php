<?php
include('conexion.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$log_file = '/var/www/html/error_statuspb';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ids = $_POST['ids'];
    $comentarios = $_POST['comentarios'];

    // Imprimir los datos recibidos en la consola
    echo "IDs: ";
    var_dump($ids);
    echo "Comentarios: ";
    var_dump($comentarios);

    $response = array(); // Inicializar el arreglo de respuesta

    try {
        // Iniciar una transacción
        $enlace->begin_transaction();

        for ($i = 0; $i < count($ids); $i++) {
            $id = $ids[$i];
            $comentario = $comentarios[$i];
            $columna = "comentarios_JRS"; // Nombre de la columna en la tabla "racks"
            $source = "racks"; // Identificador "racks" como fuente específica

            // Registrar los datos recibidos en el archivo de registro
            $log_data = "ID: $id, Comentario: $comentario, Columna: $columna, Source: $source\n";
            file_put_contents($log_file, $log_data, FILE_APPEND);

            // Actualizar la columna en la tabla "racks"
            $stmt = $enlace->prepare("UPDATE racks SET $columna=? WHERE NoSerie=?");
            $stmt->bind_param("ss", $comentario, $id);
            $result = $stmt->execute();

            if (!$result) {
                throw new Exception("Error en la actualización para el ID: $id en la columna $columna en la tabla $source");
            }
        }

        // Confirmar la transacción si todas las actualizaciones fueron exitosas
        $enlace->commit();

        // Agregar la respuesta exitosa al arreglo de respuesta
        $response[] = array(
            'status' => 'success',
            'message' => 'Actualización exitosa',
            'comentarios' => $comentarios
        );
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $enlace->rollback();

        // Agregar la respuesta de error al arreglo de respuesta
        $response[] = array(
            'status' => 'error',
            'message' => $e->getMessage()
        );
    }

    // Devolver la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
