<?php
include('conexion.php');

// Verificar si la sesión ya está activa antes de iniciarla
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['No_Reloj'])){
    $NoRelojStats = $_SESSION['No_Reloj'];

    $theme = mysqli_query($enlace, "SELECT header, headerdos, body FROM stats WHERE NoReloj = '$NoRelojStats'");
    if ($themes = mysqli_fetch_array($theme)) {
        $header    = '../img/' . $themes['header'];
        $headerdos = '../img/' . $themes['headerdos'];
        $body      = '../img/' . $themes['body'];
    }
    ?>

    <style>
        body {
            background-image: url(<?php echo $body; ?>);
        }
        header {
            background-image: url(<?php echo $header; ?>);
        }
        .header2 {
            background-image: url(<?php echo $headerdos; ?>);
        }
        table td {
            padding: 10px;
        }
    </style>

<?php } ?>