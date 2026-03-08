<?php 
include ('conexion.php');
session_start();

echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
echo '<link rel="stylesheet" type="text/css" href="css/stylef.css">';
echo '<script src="js/jquery-1.3.2.min.js"></script>';
echo '<script src="js/functions.js"></script>';
echo '	<script src="js/sweetalert.min.js"></script> ';
echo '	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">';

if(!isset($_SESSION['Nombre']) || !isset($_REQUEST['Noserie'])){
    header("Location: index.php");
    exit;
} else {
    $NoSeriereg  = strtoupper($_REQUEST['Noserie']);
    $WOregd      = $_REQUEST['WO'];
    $SKUreg      = strtoupper($_REQUEST['SKU']);
    $Modeloregd  = $_REQUEST['Modelo'];
    $NoRelojreg  = $_SESSION['No_Reloj'];
    $Trreg       = $_REQUEST['tr'];
    $HoraFinalreg= date('Y-m-d H:i:s');
    $Bahiareg    = substr($Trreg, 3, 1);
}

$conreg  = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE NoSerie = '$NoSeriereg'");
$conreg2 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = '$Trreg'");

if ($Modeloregd == 'Microsoft 8.2' || $Modeloregd == 'NPI' || $Modeloregd == 'Microsoft 8.3')
    echo "<header>
       <div class='grupo total'>
           <div class='caja'>
               <center><img width='35%' style='padding-top:40px' src='img/fox.png'></center>
           </div>
       </div> 
    </header>";

if ($conreg = mysqli_fetch_array($conreg)) {

    echo "<script>jQuery(function(){swal({
        title: 'Este rack ya se encuentra Registrado!',
        type: 'error',
        timer: 5000,
        showConfirmButton: false
    }); setTimeout('history.back',2000);
    }); 
    </script>";

} elseif ($conreg2 = mysqli_fetch_array($conreg2)) {

    echo "<script>jQuery(function(){swal({
        title: 'La TR esta ocupada!',
        type: 'error',
        text: 'Se cerrar&aacute; en 3 segundos.',
        timer: 5000,
        showConfirmButton: false
    }); setTimeout('history.back(-1)',3000);
    }); 
    </script>";

} else {

    // Insertar en racksmicro
    $sql = "INSERT INTO racksmicro (NoSerie, WO, SKU, Bahia, Locacion, Modelo, Corriendo, NoReloj)
            VALUES ('$NoSeriereg', '$WOregd', '$SKUreg', '$Bahiareg', '$Trreg', '$Modeloregd', '0', '$NoRelojreg')";

    // Insertar SOLO en pruebasmicro (sin copy)
    $sql2 = "INSERT INTO pruebasmicro (
        NoSerie, 
        HoraInicio,
        FTO, FTOStatus2,
        QuickTest, QuickTestStatus2,
        Stress, StressStatus2,
        MDaaS, MDaaSStatus2,
        RackTest, RackTestStatus2,
        FTI, FTIStatus2,
        BSL, BSLStatus2,
        CTS, CTSStatus2,
        Packing, PackingStatus2
    ) VALUES (
        '$NoSeriereg', 
        '$HoraFinalreg',
        0, 'Waiting',
        0, 'Vacio',
        0, 'Vacio',
        0, 'Vacio',
        0, 'Vacio',
        0, 'Vacio',
        0, 'Vacio',
        0, 'Vacio',
        0, 'Vacio'
    )";

    if (mysqli_query($enlace, $sql)) {
        if (mysqli_query($enlace, $sql2)) {
            echo "<script>location.href='javascript:history.back(-1);'</script>";
        } else {
            echo "Error al registrar pruebas: " . mysqli_error($enlace);
        }
    } else {
        echo "Error al registrar rack: " . mysqli_error($enlace);
    }
}
?>