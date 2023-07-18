<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['Nombre'])) {
    header("Location: index.php");
    exit;
}

include('conexion.php');
include('funciones.php');
$prueba = $_REQUEST['test'];
$prueba2 = $_REQUEST['test2'];
$status2 = $_POST['status2_' . $prueba2];
$HoraStatus = date('Y-m-d H:i:s');
$HoraInicial = $_POST['HoraInicial'];
$HoraFinal = date('Y-m-d H:i:s');
$NoReloj = $_SESSION['No_Reloj'];
$NoSerie = $_REQUEST['noserie'];
$status2_fto = $_POST['status2_fto'];
$status2_quicktest = $_POST['status2_quicktest'];
$status2_stress = $_POST['status2_stress'];
$status2_mdaas = $_POST['status2_mdaas'];
$status2_racktest = $_POST['status2_racktest'];
$status2_fti = $_POST['status2_fti'];
$status2_bootstrap = $_POST['status2_bootstrap'];
$status2_cts = $_POST['status2_cts'];
$status2_packing = $_POST['status2_packing'];

//Define la ruta y el nombre del archivo de registro personalizado
// $log_file = '/var/www/html/error_statuspb';

//Registra las variables en el archivo de registro personalizado
// error_log("test: " . print_r($prueba, true) . "\n", 3, $log_file);
// error_log("test2: " . print_r($prueba2, true) . "\n", 3, $log_file);
// error_log("NoSerie: " . print_r($NoSerie, true) . "\n", 3, $log_file);
// error_log("status2_fto: " . print_r($status2_fto, true) . "\n", 3, $log_file);
// error_log("status2_quicktest: " . print_r($status2_quicktest, true) . "\n", 3, $log_file);
// error_log("status2_stress: " . print_r($status2_stress, true). "\n", 3, $log_file);
// error_log("status2_mdaas: " . print_r($status2_mdaas, true). "\n", 3, $log_file);
// error_log("status2_racktest: " . print_r($status2_racktest, true). "\n", 3, $log_file);
// error_log("status2_fti: " . print_r($status2_fti, true). "\n", 3, $log_file);
// error_log("status2_bootstrap: " . print_r($status2_bootstrap, true). "\n", 3, $log_file);
// error_log("status2_cts: " . print_r($status2_cts, true). "\n", 3, $log_file);
// error_log("status2_packing: " . print_r($status2_packing, true). "\n", 3, $log_file);
// error_log("HoraInicial: " . print_r($HoraInicial, true). "\n", 3, $log_file);



$pruebas = [
    'fto' => $status2_fto,
    'quicktest' => $status2_quicktest,
    'stress' => $status2_stress,
    'mdaas' => $status2_mdaas,
    'racktest' => $status2_racktest,
    'fti' => $status2_fti,
    'bootstrap' => $status2_bootstrap,
    'cts' => $status2_cts,
    'packing' => $status2_packing
];

// Bucle para recorrer el array $pruebas y registrar las variables en el archivo de registro personalizado
// foreach ($pruebas as $key => $value) {
// }

// actualizarEstadoPruebaInicial($enlace, $NoSerie,$HoraInicial,$prueba);
// Usar un if/else para seleccionar qué función ejecutar
if (empty($prueba)) {
    // Si $prueba está vacía, ejecuta actualizarSelect
    actualizarSelect($enlace, $NoSerie, $NoReloj, $HoraInicial,$HoraStatus, $pruebas);
} else {
    // Si $prueba no está vacía, ejecuta actualizarEstadoPruebaFinal
    actualizarEstadoPruebaFinal($enlace, $NoSerie, $NoReloj,$HoraFinal, $prueba);
}

echo "<script>location.href='javascript:history.back(-1);'</script>";
?>