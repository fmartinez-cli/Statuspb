<?php 
include("conexion.php");
include("funciones.php");
 
/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1". 
    Nota:Para agregar otro Modelo, aqui no se modiica nada	*/



$constr21=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-21'");
if($contr21=mysqli_fetch_array($constr21)){$NoSerie21=$contr21['NoSerie'];} else {$NoSerie21="Disponible";}

$constr22=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-22'");
if($contr22=mysqli_fetch_array($constr22)){$NoSerie22=$contr22['NoSerie'];} else {$NoSerie22="Disponible";}

$constr23=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-23'");
if($contr23=mysqli_fetch_array($constr23)){$NoSerie23=$contr23['NoSerie'];} else {$NoSerie23="Disponible";}

$constr24=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-24'");
if($contr24=mysqli_fetch_array($constr24)){$NoSerie24=$contr24['NoSerie'];} else {$NoSerie24="Disponible";}

$constr25=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-35'");
if($contr25=mysqli_fetch_array($constr25)){$NoSerie25=$contr25['NoSerie'];} else {$NoSerie25="Disponible";}

$constr26=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-26'");
if($contr26=mysqli_fetch_array($constr26)){$NoSerie26=$contr26['NoSerie'];} else {$NoSerie26="Disponible";}

$constr27=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-27'");
if($contr27=mysqli_fetch_array($constr27)){$NoSerie27=$contr27['NoSerie'];} else {$NoSerie27="Disponible";}

$constr28=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-28'");
if($contr28=mysqli_fetch_array($constr28)){$NoSerie28=$contr28['NoSerie'];} else {$NoSerie28="Disponible";}

$constr29=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-29'");
if($contr29=mysqli_fetch_array($constr29)){$NoSerie29=$contr29['NoSerie'];} else {$NoSerie29="Disponible";}

$constr30=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-30'");
if($contr30=mysqli_fetch_array($constr30)){$NoSerie30=$contr30['NoSerie'];} else {$NoSerie30="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					 $Prueba21="&nbsp;"; $Prueba22="&nbsp;"; $Prueba23="&nbsp;"; $Prueba24="&nbsp;";
					$Prueba25="&nbsp;"; $Prueba26="&nbsp;"; $Prueba27="&nbsp;"; $Prueba28="&nbsp;"; $Prueba29="&nbsp;"; $Prueba30="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/


if($contr21['Modelo']=="Microsoft 8.2" || $contr21['Modelo']=="Microsoft 8.3" || $contr21['Modelo']=="NPI"){$conp21=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie21'");}
if($contr22['Modelo']=="Microsoft 8.2" || $contr22['Modelo']=="Microsoft 8.3" || $contr22['Modelo']=="NPI"){$conp22=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie22'");}
if($contr23['Modelo']=="Microsoft 8.2" || $contr23['Modelo']=="Microsoft 8.3" || $contr23['Modelo']=="NPI"){$conp23=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie23'");}
if($contr24['Modelo']=="Microsoft 8.2" || $contr24['Modelo']=="Microsoft 8.3" || $contr24['Modelo']=="NPI"){$conp24=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie24'");}
if($contr25['Modelo']=="Microsoft 8.2" || $contr25['Modelo']=="Microsoft 8.3" || $contr25['Modelo']=="NPI"){$conp25=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie25'");}
if($contr26['Modelo']=="Microsoft 8.2" || $contr26['Modelo']=="Microsoft 8.3" || $contr26['Modelo']=="NPI"){$conp26=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie26'");}
if($contr27['Modelo']=="Microsoft 8.2" || $contr27['Modelo']=="Microsoft 8.3" || $contr27['Modelo']=="NPI"){$conp27=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie27'");}
if($contr28['Modelo']=="Microsoft 8.2" || $contr28['Modelo']=="Microsoft 8.3" || $contr28['Modelo']=="NPI"){$conp28=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie28'");}
if($contr29['Modelo']=="Microsoft 8.2" || $contr29['Modelo']=="Microsoft 8.3" || $contr29['Modelo']=="NPI"){$conp29=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie29'");}
if($contr30['Modelo']=="Microsoft 8.2" || $contr30['Modelo']=="Microsoft 8.3" || $contr21['Modelo']=="NPI"){$conp30=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie30'");}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr21['Modelo'] == "Microsoft 8.2" || $contr21['Modelo'] == "Microsoft 8.3" || $contr21['Modelo'] == "NPI") {
    if ($consp21 = mysqli_fetch_array($conp21)) {
        if ($consp21['FTO'] == 0) {
            $Prueba21 = $consp21['FTOStatus2'] ? cambiarColorPrueba($consp21['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp21['QuickTest'] == 0) {
            $Prueba21 = $consp21['QuickTestStatus2'] ? cambiarColorPrueba($consp21['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp21['Stress'] == 0) {
            $Prueba21 = $consp21['StressStatus2'] ? cambiarColorPrueba($consp21['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp21['MDaaS'] == 0) {
            $Prueba21 = $consp21['MDaaSStatus2'] ? cambiarColorPrueba($consp21['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp21['RackTest'] == 0) {
            $Prueba21 = $consp21['RackTestStatus2'] ? cambiarColorPrueba($consp21['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp21['FTI'] == 0) {
            $Prueba21 = $consp21['FTIStatus2'] ? cambiarColorPrueba($consp21['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp21['BSL'] == 0) {
            $Prueba21 = $consp21['BSLStatus2'] ? cambiarColorPrueba($consp21['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp21['CTS'] == 0) {
            $Prueba21 = $consp21['CTSStatus2'] ? cambiarColorPrueba($consp21['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp21['Packing'] == 0) {
            $Prueba21 = $consp21['PackingStatus2'] ? cambiarColorPrueba($consp21['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr22['Modelo'] == "Microsoft 8.2" || $contr22['Modelo'] == "Microsoft 8.3" || $contr22['Modelo'] == "NPI") {
    if ($consp22 = mysqli_fetch_array($conp22)) {
        if ($consp22['FTO'] == 0) {
            $Prueba22 = $consp22['FTOStatus2'] ? cambiarColorPrueba($consp22['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp22['QuickTest'] == 0) {
            $Prueba22 = $consp22['QuickTestStatus2'] ? cambiarColorPrueba($consp22['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp22['Stress'] == 0) {
            $Prueba22 = $consp22['StressStatus2'] ? cambiarColorPrueba($consp22['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp22['MDaaS'] == 0) {
            $Prueba22 = $consp22['MDaaSStatus2'] ? cambiarColorPrueba($consp22['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp22['RackTest'] == 0) {
            $Prueba22 = $consp22['RackTestStatus2'] ? cambiarColorPrueba($consp22['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp22['FTI'] == 0) {
            $Prueba22 = $consp22['FTIStatus2'] ? cambiarColorPrueba($consp22['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp22['BSL'] == 0) {
            $Prueba22 = $consp22['BSLStatus2'] ? cambiarColorPrueba($consp22['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp22['CTS'] == 0) {
            $Prueba22 = $consp22['CTSStatus2'] ? cambiarColorPrueba($consp22['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp22['Packing'] == 0) {
            $Prueba22 = $consp22['PackingStatus2'] ? cambiarColorPrueba($consp22['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr23['Modelo'] == "Microsoft 8.2" || $contr23['Modelo'] == "Microsoft 8.3" || $contr23['Modelo'] == "NPI") {
    if ($consp23 = mysqli_fetch_array($conp23)) {
        if ($consp23['FTO'] == 0) {
            $Prueba23 = $consp23['FTOStatus2'] ? cambiarColorPrueba($consp23['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp23['QuickTest'] == 0) {
            $Prueba23 = $consp23['QuickTestStatus2'] ? cambiarColorPrueba($consp23['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp23['Stress'] == 0) {
            $Prueba23 = $consp23['StressStatus2'] ? cambiarColorPrueba($consp23['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp23['MDaaS'] == 0) {
            $Prueba23 = $consp23['MDaaSStatus2'] ? cambiarColorPrueba($consp23['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp23['RackTest'] == 0) {
            $Prueba23 = $consp23['RackTestStatus2'] ? cambiarColorPrueba($consp23['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp23['FTI'] == 0) {
            $Prueba23 = $consp23['FTIStatus2'] ? cambiarColorPrueba($consp23['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp23['BSL'] == 0) {
            $Prueba23 = $consp23['BSLStatus2'] ? cambiarColorPrueba($consp23['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp23['CTS'] == 0) {
            $Prueba23 = $consp23['CTSStatus2'] ? cambiarColorPrueba($consp23['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp23['Packing'] == 0) {
            $Prueba23 = $consp23['PackingStatus2'] ? cambiarColorPrueba($consp23['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr24['Modelo'] == "Microsoft 8.2" || $contr24['Modelo'] == "Microsoft 8.3" || $contr24['Modelo'] == "NPI") {
    if ($consp24 = mysqli_fetch_array($conp24)) {
        if ($consp24['FTO'] == 0) {
            $Prueba24 = $consp24['FTOStatus2'] ? cambiarColorPrueba($consp24['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp24['QuickTest'] == 0) {
            $Prueba24 = $consp24['QuickTestStatus2'] ? cambiarColorPrueba($consp24['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp24['Stress'] == 0) {
            $Prueba24 = $consp24['StressStatus2'] ? cambiarColorPrueba($consp24['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp24['MDaaS'] == 0) {
            $Prueba24 = $consp24['MDaaSStatus2'] ? cambiarColorPrueba($consp24['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp24['RackTest'] == 0) {
            $Prueba24 = $consp24['RackTestStatus2'] ? cambiarColorPrueba($consp24['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp24['FTI'] == 0) {
            $Prueba24 = $consp24['FTIStatus2'] ? cambiarColorPrueba($consp24['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp24['BSL'] == 0) {
            $Prueba24 = $consp24['BSLStatus2'] ? cambiarColorPrueba($consp24['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp24['CTS'] == 0) {
            $Prueba24 = $consp24['CTSStatus2'] ? cambiarColorPrueba($consp24['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp24['Packing'] == 0) {
            $Prueba24 = $consp24['PackingStatus2'] ? cambiarColorPrueba($consp24['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr25['Modelo'] == "Microsoft 8.2" || $contr25['Modelo'] == "Microsoft 8.3" || $contr25['Modelo'] == "NPI") {
    if ($consp25 = mysqli_fetch_array($conp25)) {
        if ($consp25['FTO'] == 0) {
            $Prueba25 = $consp25['FTOStatus2'] ? cambiarColorPrueba($consp25['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp25['QuickTest'] == 0) {
            $Prueba25 = $consp25['QuickTestStatus2'] ? cambiarColorPrueba($consp25['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp25['Stress'] == 0) {
            $Prueba25 = $consp25['StressStatus2'] ? cambiarColorPrueba($consp25['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp25['MDaaS'] == 0) {
            $Prueba25 = $consp25['MDaaSStatus2'] ? cambiarColorPrueba($consp25['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp25['RackTest'] == 0) {
            $Prueba25 = $consp25['RackTestStatus2'] ? cambiarColorPrueba($consp25['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp25['FTI'] == 0) {
            $Prueba25 = $consp25['FTIStatus2'] ? cambiarColorPrueba($consp25['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp25['BSL'] == 0) {
            $Prueba25 = $consp25['BSLStatus2'] ? cambiarColorPrueba($consp25['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp25['CTS'] == 0) {
            $Prueba25 = $consp25['CTSStatus2'] ? cambiarColorPrueba($consp25['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp25['Packing'] == 0) {
            $Prueba25 = $consp25['PackingStatus2'] ? cambiarColorPrueba($consp25['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr26['Modelo'] == "Microsoft 8.2" || $contr26['Modelo'] == "Microsoft 8.3" || $contr26['Modelo'] == "NPI") {
    if ($consp26 = mysqli_fetch_array($conp26)) {
        if ($consp26['FTO'] == 0) {
            $Prueba26 = $consp26['FTOStatus2'] ? cambiarColorPrueba($consp26['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp26['QuickTest'] == 0) {
            $Prueba26 = $consp26['QuickTestStatus2'] ? cambiarColorPrueba($consp26['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp26['Stress'] == 0) {
            $Prueba26 = $consp26['StressStatus2'] ? cambiarColorPrueba($consp26['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp26['MDaaS'] == 0) {
            $Prueba26 = $consp26['MDaaSStatus2'] ? cambiarColorPrueba($consp26['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp26['RackTest'] == 0) {
            $Prueba26 = $consp26['RackTestStatus2'] ? cambiarColorPrueba($consp26['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp26['FTI'] == 0) {
            $Prueba26 = $consp26['FTIStatus2'] ? cambiarColorPrueba($consp26['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp26['BSL'] == 0) {
            $Prueba26 = $consp26['BSLStatus2'] ? cambiarColorPrueba($consp26['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp26['CTS'] == 0) {
            $Prueba26 = $consp26['CTSStatus2'] ? cambiarColorPrueba($consp26['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp26['Packing'] == 0) {
            $Prueba26 = $consp26['PackingStatus2'] ? cambiarColorPrueba($consp26['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr27['Modelo'] == "Microsoft 8.2" || $contr27['Modelo'] == "Microsoft 8.3" || $contr27['Modelo'] == "NPI") {
    if ($consp27 = mysqli_fetch_array($conp27)) {
        if ($consp27['FTO'] == 0) {
            $Prueba27 = $consp27['FTOStatus2'] ? cambiarColorPrueba($consp27['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp27['QuickTest'] == 0) {
            $Prueba27 = $consp27['QuickTestStatus2'] ? cambiarColorPrueba($consp27['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp27['Stress'] == 0) {
            $Prueba27 = $consp27['StressStatus2'] ? cambiarColorPrueba($consp27['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp27['MDaaS'] == 0) {
            $Prueba27 = $consp27['MDaaSStatus2'] ? cambiarColorPrueba($consp27['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp27['RackTest'] == 0) {
            $Prueba27 = $consp27['RackTestStatus2'] ? cambiarColorPrueba($consp27['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp27['FTI'] == 0) {
            $Prueba27 = $consp27['FTIStatus2'] ? cambiarColorPrueba($consp27['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp27['BSL'] == 0) {
            $Prueba27 = $consp27['BSLStatus2'] ? cambiarColorPrueba($consp27['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp27['CTS'] == 0) {
            $Prueba27 = $consp27['CTSStatus2'] ? cambiarColorPrueba($consp27['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp27['Packing'] == 0) {
            $Prueba27 = $consp27['PackingStatus2'] ? cambiarColorPrueba($consp27['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr28['Modelo'] == "Microsoft 8.2" || $contr28['Modelo'] == "Microsoft 8.3" || $contr28['Modelo'] == "NPI") {
    if ($consp28 = mysqli_fetch_array($conp28)) {
        if ($consp28['FTO'] == 0) {
            $Prueba28 = $consp28['FTOStatus2'] ? cambiarColorPrueba($consp28['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp28['QuickTest'] == 0) {
            $Prueba28 = $consp28['QuickTestStatus2'] ? cambiarColorPrueba($consp28['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp28['Stress'] == 0) {
            $Prueba28 = $consp28['StressStatus2'] ? cambiarColorPrueba($consp28['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp28['MDaaS'] == 0) {
            $Prueba28 = $consp28['MDaaSStatus2'] ? cambiarColorPrueba($consp28['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp28['RackTest'] == 0) {
            $Prueba28 = $consp28['RackTestStatus2'] ? cambiarColorPrueba($consp28['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp28['FTI'] == 0) {
            $Prueba28 = $consp28['FTIStatus2'] ? cambiarColorPrueba($consp28['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp28['BSL'] == 0) {
            $Prueba28 = $consp28['BSLStatus2'] ? cambiarColorPrueba($consp28['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp28['CTS'] == 0) {
            $Prueba28 = $consp28['CTSStatus2'] ? cambiarColorPrueba($consp28['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp28['Packing'] == 0) {
            $Prueba28 = $consp28['PackingStatus2'] ? cambiarColorPrueba($consp28['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr29['Modelo'] == "Microsoft 8.2" || $contr29['Modelo'] == "Microsoft 8.3" || $contr29['Modelo'] == "NPI") {
    if ($consp29 = mysqli_fetch_array($conp29)) {
        if ($consp29['FTO'] == 0) {
            $Prueba29 = $consp29['FTOStatus2'] ? cambiarColorPrueba($consp29['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp29['QuickTest'] == 0) {
            $Prueba29 = $consp29['QuickTestStatus2'] ? cambiarColorPrueba($consp29['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp29['Stress'] == 0) {
            $Prueba29 = $consp29['StressStatus2'] ? cambiarColorPrueba($consp29['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp29['MDaaS'] == 0) {
            $Prueba29 = $consp29['MDaaSStatus2'] ? cambiarColorPrueba($consp29['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp29['RackTest'] == 0) {
            $Prueba29 = $consp29['RackTestStatus2'] ? cambiarColorPrueba($consp29['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp29['FTI'] == 0) {
            $Prueba29 = $consp29['FTIStatus2'] ? cambiarColorPrueba($consp29['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp29['BSL'] == 0) {
            $Prueba29 = $consp29['BSLStatus2'] ? cambiarColorPrueba($consp29['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp29['CTS'] == 0) {
            $Prueba29 = $consp29['CTSStatus2'] ? cambiarColorPrueba($consp29['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp29['Packing'] == 0) {
            $Prueba29 = $consp29['PackingStatus2'] ? cambiarColorPrueba($consp29['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr30['Modelo'] == "Microsoft 8.2" || $contr30['Modelo'] == "Microsoft 8.3" || $contr30['Modelo'] == "NPI") {
    if ($consp30 = mysqli_fetch_array($conp30)) {
        if ($consp30['FTO'] == 0) {
            $Prueba30 = $consp30['FTOStatus2'] ? cambiarColorPrueba($consp30['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp30['QuickTest'] == 0) {
            $Prueba30 = $consp30['QuickTestStatus2'] ? cambiarColorPrueba($consp30['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp30['Stress'] == 0) {
            $Prueba30 = $consp30['StressStatus2'] ? cambiarColorPrueba($consp30['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp30['MDaaS'] == 0) {
            $Prueba30 = $consp30['MDaaSStatus2'] ? cambiarColorPrueba($consp30['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp30['RackTest'] == 0) {
            $Prueba30 = $consp30['RackTestStatus2'] ? cambiarColorPrueba($consp30['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp30['FTI'] == 0) {
            $Prueba30 = $consp30['FTIStatus2'] ? cambiarColorPrueba($consp30['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp30['BSL'] == 0) {
            $Prueba30 = $consp30['BSLStatus2'] ? cambiarColorPrueba($consp30['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp30['CTS'] == 0) {
            $Prueba30 = $consp30['CTSStatus2'] ? cambiarColorPrueba($consp30['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp30['Packing'] == 0) {
            $Prueba30 = $consp30['PackingStatus2'] ? cambiarColorPrueba($consp30['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>