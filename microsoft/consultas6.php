<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1".	*/



$constr51=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-51'");
if($contr51=mysqli_fetch_array($constr51)){$NoSerie51=$contr51['NoSerie'];} else {$NoSerie51="Disponible";}

$constr52=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-52'");
if($contr52=mysqli_fetch_array($constr52)){$NoSerie52=$contr52['NoSerie'];} else {$NoSerie52="Disponible";}

$constr53=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-53'");
if($contr53=mysqli_fetch_array($constr53)){$NoSerie53=$contr53['NoSerie'];} else {$NoSerie53="Disponible";}

$constr54=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-54'");
if($contr54=mysqli_fetch_array($constr54)){$NoSerie54=$contr54['NoSerie'];} else {$NoSerie54="Disponible";}

$constr55=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-55'");
if($contr55=mysqli_fetch_array($constr55)){$NoSerie55=$contr55['NoSerie'];} else {$NoSerie55="Disponible";}

$constr56=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-56'");
if($contr56=mysqli_fetch_array($constr56)){$NoSerie56=$contr56['NoSerie'];} else {$NoSerie56="Disponible";}

$constr57=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-57'");
if($contr57=mysqli_fetch_array($constr57)){$NoSerie57=$contr57['NoSerie'];} else {$NoSerie57="Disponible";}

$constr58=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-58'");
if($contr58=mysqli_fetch_array($constr58)){$NoSerie58=$contr58['NoSerie'];} else {$NoSerie58="Disponible";}

$constr59=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-59'");
if($contr59=mysqli_fetch_array($constr59)){$NoSerie59=$contr59['NoSerie'];} else {$NoSerie59="Disponible";}

$constr60=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR06-60'");
if($contr60=mysqli_fetch_array($constr60)){$NoSerie60=$contr60['NoSerie'];} else {$NoSerie60="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					 $Prueba51="&nbsp;"; $Prueba52="&nbsp;"; $Prueba53="&nbsp;"; $Prueba54="&nbsp;";
					$Prueba55="&nbsp;"; $Prueba56="&nbsp;"; $Prueba57="&nbsp;"; $Prueba58="&nbsp;"; $Prueba59="&nbsp;"; $Prueba60="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/



if($contr51['Modelo']=="Microsoft 8.2" || $contr51['Modelo']=="Microsoft 8.3" || $contr51['Modelo']=="NPI"){$conp51=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie51'");}
if($contr52['Modelo']=="Microsoft 8.2" || $contr52['Modelo']=="Microsoft 8.3" || $contr52['Modelo']=="NPI"){$conp52=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie52'");}
if($contr53['Modelo']=="Microsoft 8.2" || $contr53['Modelo']=="Microsoft 8.3" || $contr53['Modelo']=="NPI"){$conp53=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie53'");}
if($contr54['Modelo']=="Microsoft 8.2" || $contr54['Modelo']=="Microsoft 8.3" || $contr54['Modelo']=="NPI"){$conp54=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie54'");}
if($contr55['Modelo']=="Microsoft 8.2" || $contr55['Modelo']=="Microsoft 8.3" || $contr55['Modelo']=="NPI"){$conp55=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie55'");}
if($contr56['Modelo']=="Microsoft 8.2" || $contr56['Modelo']=="Microsoft 8.3" || $contr56['Modelo']=="NPI"){$conp56=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie56'");}
if($contr57['Modelo']=="Microsoft 8.2" || $contr57['Modelo']=="Microsoft 8.3" || $contr57['Modelo']=="NPI"){$conp57=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie57'");}
if($contr58['Modelo']=="Microsoft 8.2" || $contr58['Modelo']=="Microsoft 8.3" || $contr58['Modelo']=="NPI"){$conp58=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie58'");}
if($contr59['Modelo']=="Microsoft 8.2" || $contr59['Modelo']=="Microsoft 8.3" || $contr59['Modelo']=="NPI"){$conp59=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie59'");}
if($contr60['Modelo']=="Microsoft 8.2" || $contr60['Modelo']=="Microsoft 8.3" || $contr60['Modelo']=="NPI"){$conp60=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie60'");}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr51['Modelo'] == "Microsoft 8.2" || $contr51['Modelo'] == "Microsoft 8.3" || $contr51['Modelo'] == "NPI") {
    if ($consp51 = mysqli_fetch_array($conp51)) {
        if ($consp51['FTO'] == 0) {
            $Prueba51 = $consp51['FTOStatus2'] ? cambiarColorPrueba($consp51['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp51['QuickTest'] == 0) {
            $Prueba51 = $consp51['QuickTestStatus2'] ? cambiarColorPrueba($consp51['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp51['Stress'] == 0) {
            $Prueba51 = $consp51['StressStatus2'] ? cambiarColorPrueba($consp51['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp51['MDaaS'] == 0) {
            $Prueba51 = $consp51['MDaaSStatus2'] ? cambiarColorPrueba($consp51['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp51['RackTest'] == 0) {
            $Prueba51 = $consp51['RackTestStatus2'] ? cambiarColorPrueba($consp51['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp51['FTI'] == 0) {
            $Prueba51 = $consp51['FTIStatus2'] ? cambiarColorPrueba($consp51['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp51['BSL'] == 0) {
            $Prueba51 = $consp51['BSLStatus2'] ? cambiarColorPrueba($consp51['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp51['CTS'] == 0) {
            $Prueba51 = $consp51['CTSStatus2'] ? cambiarColorPrueba($consp51['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp51['Packing'] == 0) {
            $Prueba51 = $consp51['PackingStatus2'] ? cambiarColorPrueba($consp51['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr52['Modelo'] == "Microsoft 8.2" || $contr52['Modelo'] == "Microsoft 8.3" || $contr52['Modelo'] == "NPI") {
    if ($consp52 = mysqli_fetch_array($conp52)) {
        if ($consp52['FTO'] == 0) {
            $Prueba52 = $consp52['FTOStatus2'] ? cambiarColorPrueba($consp52['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp52['QuickTest'] == 0) {
            $Prueba52 = $consp52['QuickTestStatus2'] ? cambiarColorPrueba($consp52['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp52['Stress'] == 0) {
            $Prueba52 = $consp52['StressStatus2'] ? cambiarColorPrueba($consp52['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp52['MDaaS'] == 0) {
            $Prueba52 = $consp52['MDaaSStatus2'] ? cambiarColorPrueba($consp52['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp52['RackTest'] == 0) {
            $Prueba52 = $consp52['RackTestStatus2'] ? cambiarColorPrueba($consp52['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp52['FTI'] == 0) {
            $Prueba52 = $consp52['FTIStatus2'] ? cambiarColorPrueba($consp52['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp52['BSL'] == 0) {
            $Prueba52 = $consp52['BSLStatus2'] ? cambiarColorPrueba($consp52['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp52['CTS'] == 0) {
            $Prueba52 = $consp52['CTSStatus2'] ? cambiarColorPrueba($consp52['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp52['Packing'] == 0) {
            $Prueba52 = $consp52['PackingStatus2'] ? cambiarColorPrueba($consp52['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr53['Modelo'] == "Microsoft 8.2" || $contr53['Modelo'] == "Microsoft 8.3" || $contr53['Modelo'] == "NPI") {
    if ($consp53 = mysqli_fetch_array($conp53)) {
        if ($consp53['FTO'] == 0) {
            $Prueba53 = $consp53['FTOStatus2'] ? cambiarColorPrueba($consp53['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp53['QuickTest'] == 0) {
            $Prueba53 = $consp53['QuickTestStatus2'] ? cambiarColorPrueba($consp53['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp53['Stress'] == 0) {
            $Prueba53 = $consp53['StressStatus2'] ? cambiarColorPrueba($consp53['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp53['MDaaS'] == 0) {
            $Prueba53 = $consp53['MDaaSStatus2'] ? cambiarColorPrueba($consp53['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp53['RackTest'] == 0) {
            $Prueba53 = $consp53['RackTestStatus2'] ? cambiarColorPrueba($consp53['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp53['FTI'] == 0) {
            $Prueba53 = $consp53['FTIStatus2'] ? cambiarColorPrueba($consp53['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp53['BSL'] == 0) {
            $Prueba53 = $consp53['BSLStatus2'] ? cambiarColorPrueba($consp53['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp53['CTS'] == 0) {
            $Prueba53 = $consp53['CTSStatus2'] ? cambiarColorPrueba($consp53['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp53['Packing'] == 0) {
            $Prueba53 = $consp53['PackingStatus2'] ? cambiarColorPrueba($consp53['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr54['Modelo'] == "Microsoft 8.2" || $contr54['Modelo'] == "Microsoft 8.3" || $contr54['Modelo'] == "NPI") {
    if ($consp54 = mysqli_fetch_array($conp54)) {
        if ($consp54['FTO'] == 0) {
            $Prueba54 = $consp54['FTOStatus2'] ? cambiarColorPrueba($consp54['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp54['QuickTest'] == 0) {
            $Prueba54 = $consp54['QuickTestStatus2'] ? cambiarColorPrueba($consp54['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp54['Stress'] == 0) {
            $Prueba54 = $consp54['StressStatus2'] ? cambiarColorPrueba($consp54['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp54['MDaaS'] == 0) {
            $Prueba54 = $consp54['MDaaSStatus2'] ? cambiarColorPrueba($consp54['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp54['RackTest'] == 0) {
            $Prueba54 = $consp54['RackTestStatus2'] ? cambiarColorPrueba($consp54['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp54['FTI'] == 0) {
            $Prueba54 = $consp54['FTIStatus2'] ? cambiarColorPrueba($consp54['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp54['BSL'] == 0) {
            $Prueba54 = $consp54['BSLStatus2'] ? cambiarColorPrueba($consp54['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp54['CTS'] == 0) {
            $Prueba54 = $consp54['CTSStatus2'] ? cambiarColorPrueba($consp54['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp54['Packing'] == 0) {
            $Prueba54 = $consp54['PackingStatus2'] ? cambiarColorPrueba($consp54['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*--------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr55['Modelo'] == "Microsoft 8.2" || $contr55['Modelo'] == "Microsoft 8.3" || $contr55['Modelo'] == "NPI") {
    if ($consp55 = mysqli_fetch_array($conp55)) {
        if ($consp55['FTO'] == 0) {
            $Prueba55 = $consp55['FTOStatus2'] ? cambiarColorPrueba($consp55['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp55['QuickTest'] == 0) {
            $Prueba55 = $consp55['QuickTestStatus2'] ? cambiarColorPrueba($consp55['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp55['Stress'] == 0) {
            $Prueba55 = $consp55['StressStatus2'] ? cambiarColorPrueba($consp55['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp55['MDaaS'] == 0) {
            $Prueba55 = $consp55['MDaaSStatus2'] ? cambiarColorPrueba($consp55['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp55['RackTest'] == 0) {
            $Prueba55 = $consp55['RackTestStatus2'] ? cambiarColorPrueba($consp55['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp55['FTI'] == 0) {
            $Prueba55 = $consp55['FTIStatus2'] ? cambiarColorPrueba($consp55['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp55['BSL'] == 0) {
            $Prueba55 = $consp55['BSLStatus2'] ? cambiarColorPrueba($consp55['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp55['CTS'] == 0) {
            $Prueba55 = $consp55['CTSStatus2'] ? cambiarColorPrueba($consp55['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp55['Packing'] == 0) {
            $Prueba55 = $consp55['PackingStatus2'] ? cambiarColorPrueba($consp55['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr56['Modelo'] == "Microsoft 8.2" || $contr56['Modelo'] == "Microsoft 8.3" || $contr56['Modelo'] == "NPI") {
    if ($consp56 = mysqli_fetch_array($conp56)) {
        if ($consp56['FTO'] == 0) {
            $Prueba56 = $consp56['FTOStatus2'] ? cambiarColorPrueba($consp56['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp56['QuickTest'] == 0) {
            $Prueba56 = $consp56['QuickTestStatus2'] ? cambiarColorPrueba($consp56['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp56['Stress'] == 0) {
            $Prueba56 = $consp56['StressStatus2'] ? cambiarColorPrueba($consp56['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp56['MDaaS'] == 0) {
            $Prueba56 = $consp56['MDaaSStatus2'] ? cambiarColorPrueba($consp56['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp56['RackTest'] == 0) {
            $Prueba56 = $consp56['RackTestStatus2'] ? cambiarColorPrueba($consp56['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp56['FTI'] == 0) {
            $Prueba56 = $consp56['FTIStatus2'] ? cambiarColorPrueba($consp56['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp56['BSL'] == 0) {
            $Prueba56 = $consp56['BSLStatus2'] ? cambiarColorPrueba($consp56['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp56['CTS'] == 0) {
            $Prueba56 = $consp56['CTSStatus2'] ? cambiarColorPrueba($consp56['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp56['Packing'] == 0) {
            $Prueba56 = $consp56['PackingStatus2'] ? cambiarColorPrueba($consp56['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr57['Modelo'] == "Microsoft 8.2" || $contr57['Modelo'] == "Microsoft 8.3" || $contr57['Modelo'] == "NPI") {
    if ($consp57 = mysqli_fetch_array($conp57)) {
        if ($consp57['FTO'] == 0) {
            $Prueba57 = $consp57['FTOStatus2'] ? cambiarColorPrueba($consp57['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp57['QuickTest'] == 0) {
            $Prueba57 = $consp57['QuickTestStatus2'] ? cambiarColorPrueba($consp57['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp57['Stress'] == 0) {
            $Prueba57 = $consp57['StressStatus2'] ? cambiarColorPrueba($consp57['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp57['MDaaS'] == 0) {
            $Prueba57 = $consp57['MDaaSStatus2'] ? cambiarColorPrueba($consp57['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp57['RackTest'] == 0) {
            $Prueba57 = $consp57['RackTestStatus2'] ? cambiarColorPrueba($consp57['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp57['FTI'] == 0) {
            $Prueba57 = $consp57['FTIStatus2'] ? cambiarColorPrueba($consp57['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp57['BSL'] == 0) {
            $Prueba57 = $consp57['BSLStatus2'] ? cambiarColorPrueba($consp57['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp57['CTS'] == 0) {
            $Prueba57 = $consp57['CTSStatus2'] ? cambiarColorPrueba($consp57['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp57['Packing'] == 0) {
            $Prueba57 = $consp57['PackingStatus2'] ? cambiarColorPrueba($consp57['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr58['Modelo'] == "Microsoft 8.2" || $contr58['Modelo'] == "Microsoft 8.3" || $contr58['Modelo'] == "NPI") {
    if ($consp58 = mysqli_fetch_array($conp58)) {
        if ($consp58['FTO'] == 0) {
            $Prueba58 = $consp58['FTOStatus2'] ? cambiarColorPrueba($consp58['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp58['QuickTest'] == 0) {
            $Prueba58 = $consp58['QuickTestStatus2'] ? cambiarColorPrueba($consp58['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp58['Stress'] == 0) {
            $Prueba58 = $consp58['StressStatus2'] ? cambiarColorPrueba($consp58['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp58['MDaaS'] == 0) {
            $Prueba58 = $consp58['MDaaSStatus2'] ? cambiarColorPrueba($consp58['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp58['RackTest'] == 0) {
            $Prueba58 = $consp58['RackTestStatus2'] ? cambiarColorPrueba($consp58['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp58['FTI'] == 0) {
            $Prueba58 = $consp58['FTIStatus2'] ? cambiarColorPrueba($consp58['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp58['BSL'] == 0) {
            $Prueba58 = $consp58['BSLStatus2'] ? cambiarColorPrueba($consp58['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp58['CTS'] == 0) {
            $Prueba58 = $consp58['CTSStatus2'] ? cambiarColorPrueba($consp58['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp58['Packing'] == 0) {
            $Prueba58 = $consp58['PackingStatus2'] ? cambiarColorPrueba($consp58['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr59['Modelo'] == "Microsoft 8.2" || $contr59['Modelo'] == "Microsoft 8.3" || $contr59['Modelo'] == "NPI") {
    if ($consp59 = mysqli_fetch_array($conp59)) {
        if ($consp59['FTO'] == 0) {
            $Prueba59 = $consp59['FTOStatus2'] ? cambiarColorPrueba($consp59['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp59['QuickTest'] == 0) {
            $Prueba59 = $consp59['QuickTestStatus2'] ? cambiarColorPrueba($consp59['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp59['Stress'] == 0) {
            $Prueba59 = $consp59['StressStatus2'] ? cambiarColorPrueba($consp59['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp59['MDaaS'] == 0) {
            $Prueba59 = $consp59['MDaaSStatus2'] ? cambiarColorPrueba($consp59['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp59['RackTest'] == 0) {
            $Prueba59 = $consp59['RackTestStatus2'] ? cambiarColorPrueba($consp59['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp59['FTI'] == 0) {
            $Prueba59 = $consp59['FTIStatus2'] ? cambiarColorPrueba($consp59['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp59['BSL'] == 0) {
            $Prueba59 = $consp59['BSLStatus2'] ? cambiarColorPrueba($consp59['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp59['CTS'] == 0) {
            $Prueba59 = $consp59['CTSStatus2'] ? cambiarColorPrueba($consp59['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp59['Packing'] == 0) {
            $Prueba59 = $consp59['PackingStatus2'] ? cambiarColorPrueba($consp59['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr60['Modelo'] == "Microsoft 8.2" || $contr60['Modelo'] == "Microsoft 8.3" || $contr60['Modelo'] == "NPI") {
    if ($consp60 = mysqli_fetch_array($conp60)) {
        if ($consp60['FTO'] == 0) {
            $Prueba60 = $consp60['FTOStatus2'] ? cambiarColorPrueba($consp60['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp60['QuickTest'] == 0) {
            $Prueba60 = $consp60['QuickTestStatus2'] ? cambiarColorPrueba($consp60['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp60['Stress'] == 0) {
            $Prueba60 = $consp60['StressStatus2'] ? cambiarColorPrueba($consp60['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp60['MDaaS'] == 0) {
            $Prueba60 = $consp60['MDaaSStatus2'] ? cambiarColorPrueba($consp60['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp60['RackTest'] == 0) {
            $Prueba60 = $consp60['RackTestStatus2'] ? cambiarColorPrueba($consp60['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp60['FTI'] == 0) {
            $Prueba60 = $consp60['FTIStatus2'] ? cambiarColorPrueba($consp60['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp60['BSL'] == 0) {
            $Prueba60 = $consp60['BSLStatus2'] ? cambiarColorPrueba($consp60['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp60['CTS'] == 0) {
            $Prueba60 = $consp60['CTSStatus2'] ? cambiarColorPrueba($consp60['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp60['Packing'] == 0) {
            $Prueba60 = $consp60['PackingStatus2'] ? cambiarColorPrueba($consp60['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>
