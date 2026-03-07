<?php 
include("conexion.php");
include("funciones.php");

/*==========================================================================================
    CONSULTAS A LA TABLA racksmicro - Locaciones TR01-01 hasta TR01-11
==========================================================================================*/

$constr1 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-01'");
if ($contr1 = mysqli_fetch_array($constr1)) { $NoSerie1 = $contr1['NoSerie']; } else { $NoSerie1 = "Disponible"; $contr1 = null; }

$constr2 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-02'");
if ($contr2 = mysqli_fetch_array($constr2)) { $NoSerie2 = $contr2['NoSerie']; } else { $NoSerie2 = "Disponible"; $contr2 = null; }

$constr3 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-03'");
if ($contr3 = mysqli_fetch_array($constr3)) { $NoSerie3 = $contr3['NoSerie']; } else { $NoSerie3 = "Disponible"; $contr3 = null; }

$constr4 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-04'");
if ($contr4 = mysqli_fetch_array($constr4)) { $NoSerie4 = $contr4['NoSerie']; } else { $NoSerie4 = "Disponible"; $contr4 = null; }

$constr5 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-05'");
if ($contr5 = mysqli_fetch_array($constr5)) { $NoSerie5 = $contr5['NoSerie']; } else { $NoSerie5 = "Disponible"; $contr5 = null; }

$constr6 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-06'");
if ($contr6 = mysqli_fetch_array($constr6)) { $NoSerie6 = $contr6['NoSerie']; } else { $NoSerie6 = "Disponible"; $contr6 = null; }

$constr7 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-07'");
if ($contr7 = mysqli_fetch_array($constr7)) { $NoSerie7 = $contr7['NoSerie']; } else { $NoSerie7 = "Disponible"; $contr7 = null; }

$constr8 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-08'");
if ($contr8 = mysqli_fetch_array($constr8)) { $NoSerie8 = $contr8['NoSerie']; } else { $NoSerie8 = "Disponible"; $contr8 = null; }

$constr9 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-09'");
if ($contr9 = mysqli_fetch_array($constr9)) { $NoSerie9 = $contr9['NoSerie']; } else { $NoSerie9 = "Disponible"; $contr9 = null; }

$constr10 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-10'");
if ($contr10 = mysqli_fetch_array($constr10)) { $NoSerie10 = $contr10['NoSerie']; } else { $NoSerie10 = "Disponible"; $contr10 = null; }

$constr11 = mysqli_query($enlace, "SELECT * FROM racksmicro WHERE Locacion = 'TR01-11'");
if ($contr11 = mysqli_fetch_array($constr11)) { $NoSerie11 = $contr11['NoSerie']; } else { $NoSerie11 = "Disponible"; $contr11 = null; }

/*==========================================================================================
    INICIALIZACIÓN DE VARIABLES
==========================================================================================*/

$Prueba1  = "&nbsp;"; $Prueba2  = "&nbsp;"; $Prueba3  = "&nbsp;"; $Prueba4  = "&nbsp;";
$Prueba5  = "&nbsp;"; $Prueba6  = "&nbsp;"; $Prueba7  = "&nbsp;"; $Prueba8  = "&nbsp;";
$Prueba9  = "&nbsp;"; $Prueba10 = "&nbsp;"; $Prueba11 = "&nbsp;";

$FTOcount      = 0; $Quicktestcount = 0; $Stresscount  = 0;
$MDaascount    = 0; $Racktestcount  = 0; $FTIcount     = 0;
$Bootstrapcount= 0; $CTScount       = 0; $Packingcount = 0;

/*==========================================================================================
    FUNCIÓN AUXILIAR para determinar la prueba pendiente de un dispositivo
==========================================================================================*/

function getPruebaPendiente($consp, &$FTOcount, &$Quicktestcount, &$Stresscount, &$MDaascount,
                             &$Racktestcount, &$FTIcount, &$Bootstrapcount, &$CTScount, &$Packingcount) {
    $resultado = "&nbsp;";

    if ($consp['FTO'] == 0) {
        $resultado = $consp['FTOStatus2'] ? cambiarColorPrueba($consp['FTOStatus2'], "FTO") : "FTO";
        $FTOcount++;
    } elseif ($consp['QuickTest'] == 0) {
        $resultado = $consp['QuickTestStatus2'] ? cambiarColorPrueba($consp['QuickTestStatus2'], "QuickTest") : "QuickTest";
        $Quicktestcount++;
    } elseif ($consp['Stress'] == 0) {
        $resultado = $consp['StressStatus2'] ? cambiarColorPrueba($consp['StressStatus2'], "Stress") : "Stress";
        $Stresscount++;
    } elseif ($consp['MDaaS'] == 0) {
        $resultado = $consp['MDaaSStatus2'] ? cambiarColorPrueba($consp['MDaaSStatus2'], "MDaaS") : "MDaaS";
        $MDaascount++;
    } elseif ($consp['RackTest'] == 0) {
        $resultado = $consp['RackTestStatus2'] ? cambiarColorPrueba($consp['RackTestStatus2'], "RackTest") : "RackTest";
        $Racktestcount++;
    } elseif ($consp['FTI'] == 0) {
        $resultado = $consp['FTIStatus2'] ? cambiarColorPrueba($consp['FTIStatus2'], "FTI") : "FTI";
        $FTIcount++;
    } elseif ($consp['BSL'] == 0) {
        $resultado = $consp['BSLStatus2'] ? cambiarColorPrueba($consp['BSLStatus2'], "BSL") : "BSL";
        $Bootstrapcount++;
    } elseif ($consp['CTS'] == 0) {
        $resultado = $consp['CTSStatus2'] ? cambiarColorPrueba($consp['CTSStatus2'], "CTS") : "CTS";
        $CTScount++;
    } elseif ($consp['Packing'] == 0) {
        $resultado = $consp['PackingStatus2'] ? cambiarColorPrueba($consp['PackingStatus2'], "Packing") : "Packing";
        $Packingcount++;
    }

    return $resultado;
}

/*==========================================================================================
    FUNCIÓN AUXILIAR para verificar si el modelo es Microsoft válido
==========================================================================================*/

function esModeloMicrosoft($contr) {
    if (empty($contr) || !isset($contr['Modelo'])) return false;
    return ($contr['Modelo'] == "Microsoft 8.2" || $contr['Modelo'] == "Microsoft 8.3" || $contr['Modelo'] == "NPI");
}

/*==========================================================================================
    CONSULTAS A pruebasmicro Y DETERMINACIÓN DEL STATUS POR LOCACIÓN
==========================================================================================*/

// TR01-01
if (esModeloMicrosoft($contr1)) {
    $conp1 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie1) . "'");
    if ($consp1 = mysqli_fetch_array($conp1)) {
        $Prueba1 = getPruebaPendiente($consp1, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-02
if (esModeloMicrosoft($contr2)) {
    $conp2 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie2) . "'");
    if ($consp2 = mysqli_fetch_array($conp2)) {
        $Prueba2 = getPruebaPendiente($consp2, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-03
if (esModeloMicrosoft($contr3)) {
    $conp3 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie3) . "'");
    if ($consp3 = mysqli_fetch_array($conp3)) {
        $Prueba3 = getPruebaPendiente($consp3, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-04
if (esModeloMicrosoft($contr4)) {
    $conp4 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie4) . "'");
    if ($consp4 = mysqli_fetch_array($conp4)) {
        $Prueba4 = getPruebaPendiente($consp4, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-05
if (esModeloMicrosoft($contr5)) {
    $conp5 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie5) . "'");
    if ($consp5 = mysqli_fetch_array($conp5)) {
        $Prueba5 = getPruebaPendiente($consp5, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-06
if (esModeloMicrosoft($contr6)) {
    $conp6 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie6) . "'");
    if ($consp6 = mysqli_fetch_array($conp6)) {
        $Prueba6 = getPruebaPendiente($consp6, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-07
if (esModeloMicrosoft($contr7)) {
    $conp7 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie7) . "'");
    if ($consp7 = mysqli_fetch_array($conp7)) {
        $Prueba7 = getPruebaPendiente($consp7, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-08
if (esModeloMicrosoft($contr8)) {
    $conp8 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie8) . "'");
    if ($consp8 = mysqli_fetch_array($conp8)) {
        $Prueba8 = getPruebaPendiente($consp8, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-09
if (esModeloMicrosoft($contr9)) {
    $conp9 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie9) . "'");
    if ($consp9 = mysqli_fetch_array($conp9)) {
        $Prueba9 = getPruebaPendiente($consp9, $FTOcount, $Quicktestcount, $Stresscount,
                                       $MDaascount, $Racktestcount, $FTIcount,
                                       $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-10
if (esModeloMicrosoft($contr10)) {
    $conp10 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie10) . "'");
    if ($consp10 = mysqli_fetch_array($conp10)) {
        $Prueba10 = getPruebaPendiente($consp10, $FTOcount, $Quicktestcount, $Stresscount,
                                        $MDaascount, $Racktestcount, $FTIcount,
                                        $Bootstrapcount, $CTScount, $Packingcount);
    }
}

// TR01-11
if (esModeloMicrosoft($contr11)) {
    $conp11 = mysqli_query($enlace, "SELECT * FROM pruebasmicro WHERE NoSerie = '" . mysqli_real_escape_string($enlace, $NoSerie11) . "'");
    if ($consp11 = mysqli_fetch_array($conp11)) {
        $Prueba11 = getPruebaPendiente($consp11, $FTOcount, $Quicktestcount, $Stresscount,
                                        $MDaascount, $Racktestcount, $FTIcount,
                                        $Bootstrapcount, $CTScount, $Packingcount);
    }
}

?>