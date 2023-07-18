<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1".	*/



$constr91=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-91'");
if($contr91=mysqli_fetch_array($constr91)){$NoSerie91=$contr91['NoSerie'];} else {$NoSerie91="Disponible";}

$constr92=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-92'");
if($contr92=mysqli_fetch_array($constr92)){$NoSerie92=$contr92['NoSerie'];} else {$NoSerie92="Disponible";}

$constr93=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-93'");
if($contr93=mysqli_fetch_array($constr93)){$NoSerie93=$contr93['NoSerie'];} else {$NoSerie93="Disponible";}

$constr94=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-94'");
if($contr94=mysqli_fetch_array($constr94)){$NoSerie94=$contr94['NoSerie'];} else {$NoSerie94="Disponible";}

$constr95=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-95'");
if($contr95=mysqli_fetch_array($constr95)){$NoSerie95=$contr95['NoSerie'];} else {$NoSerie95="Disponible";}

$constr96=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-96'");
if($contr96=mysqli_fetch_array($constr96)){$NoSerie96=$contr96['NoSerie'];} else {$NoSerie96="Disponible";}

$constr97=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-97'");
if($contr97=mysqli_fetch_array($constr97)){$NoSerie97=$contr97['NoSerie'];} else {$NoSerie97="Disponible";}

$constr98=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-98'");
if($contr98=mysqli_fetch_array($constr98)){$NoSerie98=$contr98['NoSerie'];} else {$NoSerie98="Disponible";}

$constr99=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-99'");
if($contr99=mysqli_fetch_array($constr99)){$NoSerie99=$contr99['NoSerie'];} else {$NoSerie99="Disponible";}

$constr100=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR10-100'");
if($contr100=mysqli_fetch_array($constr100)){$NoSerie100=$contr100['NoSerie'];} else {$NoSerie100="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					 $Prueba91="&nbsp;"; $Prueba92="&nbsp;"; $Prueba93="&nbsp;"; $Prueba94="&nbsp;";
					$Prueba95="&nbsp;"; $Prueba96="&nbsp;"; $Prueba97="&nbsp;"; $Prueba98="&nbsp;"; $Prueba99="&nbsp;"; $Prueba100="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/



if($contr91['Modelo']=="Microsoft 8.2" || $contr91['Modelo']=="Microsoft 8.3" || $contr91['Modelo']=="NPI"){$conp91=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie91'");}
if($contr92['Modelo']=="Microsoft 8.2" || $contr92['Modelo']=="Microsoft 8.3" || $contr92['Modelo']=="NPI"){$conp92=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie92'");}
if($contr93['Modelo']=="Microsoft 8.2" || $contr93['Modelo']=="Microsoft 8.3" || $contr93['Modelo']=="NPI"){$conp93=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie93'");}
if($contr94['Modelo']=="Microsoft 8.2" || $contr94['Modelo']=="Microsoft 8.3" || $contr94['Modelo']=="NPI"){$conp94=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie94'");}
if($contr95['Modelo']=="Microsoft 8.2" || $contr95['Modelo']=="Microsoft 8.3" || $contr95['Modelo']=="NPI"){$conp95=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie95'");}
if($contr96['Modelo']=="Microsoft 8.2" || $contr96['Modelo']=="Microsoft 8.3" || $contr96['Modelo']=="NPI"){$conp96=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie96'");}
if($contr97['Modelo']=="Microsoft 8.2" || $contr97['Modelo']=="Microsoft 8.3" || $contr97['Modelo']=="NPI"){$conp97=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie97'");}
if($contr98['Modelo']=="Microsoft 8.2" || $contr98['Modelo']=="Microsoft 8.3" || $contr98['Modelo']=="NPI"){$conp98=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie98'");}
if($contr99['Modelo']=="Microsoft 8.2" || $contr99['Modelo']=="Microsoft 8.3" || $contr99['Modelo']=="NPI"){$conp99=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie99'");}
if($contr100['Modelo']=="Microsoft 8.2" || $contr100['Modelo']=="Microsoft 8.3" || $contr100['Modelo']=="NPI"){$conp100=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie100'");}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr91['Modelo'] == "Microsoft 8.2" || $contr91['Modelo'] == "Microsoft 8.3" || $contr91['Modelo'] == "NPI") {
    if ($consp91 = mysqli_fetch_array($conp91)) {
        if ($consp91['FTO'] == 0) {
            $Prueba91 = $consp91['FTOStatus2'] ? cambiarColorPrueba($consp91['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp91['QuickTest'] == 0) {
            $Prueba91 = $consp91['QuickTestStatus2'] ? cambiarColorPrueba($consp91['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp91['Stress'] == 0) {
            $Prueba91 = $consp91['StressStatus2'] ? cambiarColorPrueba($consp91['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp91['MDaaS'] == 0) {
            $Prueba91 = $consp91['MDaaSStatus2'] ? cambiarColorPrueba($consp91['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp91['RackTest'] == 0) {
            $Prueba91 = $consp91['RackTestStatus2'] ? cambiarColorPrueba($consp91['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp91['FTI'] == 0) {
            $Prueba91 = $consp91['FTIStatus2'] ? cambiarColorPrueba($consp91['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp91['BSL'] == 0) {
            $Prueba91 = $consp91['BSLStatus2'] ? cambiarColorPrueba($consp91['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp91['CTS'] == 0) {
            $Prueba91 = $consp91['CTSStatus2'] ? cambiarColorPrueba($consp91['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp91['Packing'] == 0) {
            $Prueba91 = $consp91['PackingStatus2'] ? cambiarColorPrueba($consp91['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr92['Modelo'] == "Microsoft 8.2" || $contr92['Modelo'] == "Microsoft 8.3" || $contr92['Modelo'] == "NPI") {
    if ($consp92 = mysqli_fetch_array($conp92)) {
        if ($consp92['FTO'] == 0) {
            $Prueba92 = $consp92['FTOStatus2'] ? cambiarColorPrueba($consp92['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp92['QuickTest'] == 0) {
            $Prueba92 = $consp92['QuickTestStatus2'] ? cambiarColorPrueba($consp92['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp92['Stress'] == 0) {
            $Prueba92 = $consp92['StressStatus2'] ? cambiarColorPrueba($consp92['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp92['MDaaS'] == 0) {
            $Prueba92 = $consp92['MDaaSStatus2'] ? cambiarColorPrueba($consp92['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp92['RackTest'] == 0) {
            $Prueba92 = $consp92['RackTestStatus2'] ? cambiarColorPrueba($consp92['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp92['FTI'] == 0) {
            $Prueba92 = $consp92['FTIStatus2'] ? cambiarColorPrueba($consp92['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp92['BSL'] == 0) {
            $Prueba92 = $consp92['BSLStatus2'] ? cambiarColorPrueba($consp92['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp92['CTS'] == 0) {
            $Prueba92 = $consp92['CTSStatus2'] ? cambiarColorPrueba($consp92['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp92['Packing'] == 0) {
            $Prueba92 = $consp92['PackingStatus2'] ? cambiarColorPrueba($consp92['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr93['Modelo'] == "Microsoft 8.2" || $contr93['Modelo'] == "Microsoft 8.3" || $contr93['Modelo'] == "NPI") {
    if ($consp93 = mysqli_fetch_array($conp93)) {
        if ($consp93['FTO'] == 0) {
            $Prueba93 = $consp93['FTOStatus2'] ? cambiarColorPrueba($consp93['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp93['QuickTest'] == 0) {
            $Prueba93 = $consp93['QuickTestStatus2'] ? cambiarColorPrueba($consp93['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp93['Stress'] == 0) {
            $Prueba93 = $consp93['StressStatus2'] ? cambiarColorPrueba($consp93['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp93['MDaaS'] == 0) {
            $Prueba93 = $consp93['MDaaSStatus2'] ? cambiarColorPrueba($consp93['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp93['RackTest'] == 0) {
            $Prueba93 = $consp93['RackTestStatus2'] ? cambiarColorPrueba($consp93['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp93['FTI'] == 0) {
            $Prueba93 = $consp93['FTIStatus2'] ? cambiarColorPrueba($consp93['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp93['BSL'] == 0) {
            $Prueba93 = $consp93['BSLStatus2'] ? cambiarColorPrueba($consp93['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp93['CTS'] == 0) {
            $Prueba93 = $consp93['CTSStatus2'] ? cambiarColorPrueba($consp93['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp93['Packing'] == 0) {
            $Prueba93 = $consp93['PackingStatus2'] ? cambiarColorPrueba($consp93['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr94['Modelo'] == "Microsoft 8.2" || $contr94['Modelo'] == "Microsoft 8.3" || $contr94['Modelo'] == "NPI") {
    if ($consp94 = mysqli_fetch_array($conp94)) {
        if ($consp94['FTO'] == 0) {
            $Prueba94 = $consp94['FTOStatus2'] ? cambiarColorPrueba($consp94['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp94['QuickTest'] == 0) {
            $Prueba94 = $consp94['QuickTestStatus2'] ? cambiarColorPrueba($consp94['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp94['Stress'] == 0) {
            $Prueba94 = $consp94['StressStatus2'] ? cambiarColorPrueba($consp94['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp94['MDaaS'] == 0) {
            $Prueba94 = $consp94['MDaaSStatus2'] ? cambiarColorPrueba($consp94['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp94['RackTest'] == 0) {
            $Prueba94 = $consp94['RackTestStatus2'] ? cambiarColorPrueba($consp94['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp94['FTI'] == 0) {
            $Prueba94 = $consp94['FTIStatus2'] ? cambiarColorPrueba($consp94['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp94['BSL'] == 0) {
            $Prueba94 = $consp94['BSLStatus2'] ? cambiarColorPrueba($consp94['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp94['CTS'] == 0) {
            $Prueba94 = $consp94['CTSStatus2'] ? cambiarColorPrueba($consp94['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp94['Packing'] == 0) {
            $Prueba94 = $consp94['PackingStatus2'] ? cambiarColorPrueba($consp94['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr95['Modelo'] == "Microsoft 8.2" || $contr95['Modelo'] == "Microsoft 8.3" || $contr95['Modelo'] == "NPI") {
    if ($consp95 = mysqli_fetch_array($conp95)) {
        if ($consp95['FTO'] == 0) {
            $Prueba95 = $consp95['FTOStatus2'] ? cambiarColorPrueba($consp95['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp95['QuickTest'] == 0) {
            $Prueba95 = $consp95['QuickTestStatus2'] ? cambiarColorPrueba($consp95['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp95['Stress'] == 0) {
            $Prueba95 = $consp95['StressStatus2'] ? cambiarColorPrueba($consp95['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp95['MDaaS'] == 0) {
            $Prueba95 = $consp95['MDaaSStatus2'] ? cambiarColorPrueba($consp95['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp95['RackTest'] == 0) {
            $Prueba95 = $consp95['RackTestStatus2'] ? cambiarColorPrueba($consp95['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp95['FTI'] == 0) {
            $Prueba95 = $consp95['FTIStatus2'] ? cambiarColorPrueba($consp95['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp95['BSL'] == 0) {
            $Prueba95 = $consp95['BSLStatus2'] ? cambiarColorPrueba($consp95['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp95['CTS'] == 0) {
            $Prueba95 = $consp95['CTSStatus2'] ? cambiarColorPrueba($consp95['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp95['Packing'] == 0) {
            $Prueba95 = $consp95['PackingStatus2'] ? cambiarColorPrueba($consp95['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr96['Modelo'] == "Microsoft 8.2" || $contr96['Modelo'] == "Microsoft 8.3" || $contr96['Modelo'] == "NPI") {
    if ($consp96 = mysqli_fetch_array($conp96)) {
        if ($consp96['FTO'] == 0) {
            $Prueba96 = $consp96['FTOStatus2'] ? cambiarColorPrueba($consp96['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp96['QuickTest'] == 0) {
            $Prueba96 = $consp96['QuickTestStatus2'] ? cambiarColorPrueba($consp96['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp96['Stress'] == 0) {
            $Prueba96 = $consp96['StressStatus2'] ? cambiarColorPrueba($consp96['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp96['MDaaS'] == 0) {
            $Prueba96 = $consp96['MDaaSStatus2'] ? cambiarColorPrueba($consp96['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp96['RackTest'] == 0) {
            $Prueba96 = $consp96['RackTestStatus2'] ? cambiarColorPrueba($consp96['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp96['FTI'] == 0) {
            $Prueba96 = $consp96['FTIStatus2'] ? cambiarColorPrueba($consp96['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp96['BSL'] == 0) {
            $Prueba96 = $consp96['BSLStatus2'] ? cambiarColorPrueba($consp96['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp96['CTS'] == 0) {
            $Prueba96 = $consp96['CTSStatus2'] ? cambiarColorPrueba($consp96['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp96['Packing'] == 0) {
            $Prueba96 = $consp96['PackingStatus2'] ? cambiarColorPrueba($consp96['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr97['Modelo'] == "Microsoft 8.2" || $contr97['Modelo'] == "Microsoft 8.3" || $contr97['Modelo'] == "NPI") {
    if ($consp97 = mysqli_fetch_array($conp97)) {
        if ($consp97['FTO'] == 0) {
            $Prueba97 = $consp97['FTOStatus2'] ? cambiarColorPrueba($consp97['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp97['QuickTest'] == 0) {
            $Prueba97 = $consp97['QuickTestStatus2'] ? cambiarColorPrueba($consp97['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp97['Stress'] == 0) {
            $Prueba97 = $consp97['StressStatus2'] ? cambiarColorPrueba($consp97['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp97['MDaaS'] == 0) {
            $Prueba97 = $consp97['MDaaSStatus2'] ? cambiarColorPrueba($consp97['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp97['RackTest'] == 0) {
            $Prueba97 = $consp97['RackTestStatus2'] ? cambiarColorPrueba($consp97['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp97['FTI'] == 0) {
            $Prueba97 = $consp97['FTIStatus2'] ? cambiarColorPrueba($consp97['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp97['BSL'] == 0) {
            $Prueba97 = $consp97['BSLStatus2'] ? cambiarColorPrueba($consp97['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp97['CTS'] == 0) {
            $Prueba97 = $consp97['CTSStatus2'] ? cambiarColorPrueba($consp97['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp97['Packing'] == 0) {
            $Prueba97 = $consp97['PackingStatus2'] ? cambiarColorPrueba($consp97['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr98['Modelo'] == "Microsoft 8.2" || $contr98['Modelo'] == "Microsoft 8.3" || $contr98['Modelo'] == "NPI") {
    if ($consp98 = mysqli_fetch_array($conp98)) {
        if ($consp98['FTO'] == 0) {
            $Prueba98 = $consp98['FTOStatus2'] ? cambiarColorPrueba($consp98['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp98['QuickTest'] == 0) {
            $Prueba98 = $consp98['QuickTestStatus2'] ? cambiarColorPrueba($consp98['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp98['Stress'] == 0) {
            $Prueba98 = $consp98['StressStatus2'] ? cambiarColorPrueba($consp98['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp98['MDaaS'] == 0) {
            $Prueba98 = $consp98['MDaaSStatus2'] ? cambiarColorPrueba($consp98['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp98['RackTest'] == 0) {
            $Prueba98 = $consp98['RackTestStatus2'] ? cambiarColorPrueba($consp98['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp98['FTI'] == 0) {
            $Prueba98 = $consp98['FTIStatus2'] ? cambiarColorPrueba($consp98['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp98['BSL'] == 0) {
            $Prueba98 = $consp98['BSLStatus2'] ? cambiarColorPrueba($consp98['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp98['CTS'] == 0) {
            $Prueba98 = $consp98['CTSStatus2'] ? cambiarColorPrueba($consp98['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp98['Packing'] == 0) {
            $Prueba98 = $consp98['PackingStatus2'] ? cambiarColorPrueba($consp98['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr99['Modelo'] == "Microsoft 8.2" || $contr99['Modelo'] == "Microsoft 8.3" || $contr99['Modelo'] == "NPI") {
    if ($consp99 = mysqli_fetch_array($conp99)) {
        if ($consp99['FTO'] == 0) {
            $Prueba99 = $consp99['FTOStatus2'] ? cambiarColorPrueba($consp99['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp99['QuickTest'] == 0) {
            $Prueba99 = $consp99['QuickTestStatus2'] ? cambiarColorPrueba($consp99['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp99['Stress'] == 0) {
            $Prueba99 = $consp99['StressStatus2'] ? cambiarColorPrueba($consp99['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp99['MDaaS'] == 0) {
            $Prueba99 = $consp99['MDaaSStatus2'] ? cambiarColorPrueba($consp99['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp99['RackTest'] == 0) {
            $Prueba99 = $consp99['RackTestStatus2'] ? cambiarColorPrueba($consp99['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp99['FTI'] == 0) {
            $Prueba99 = $consp99['FTIStatus2'] ? cambiarColorPrueba($consp99['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp99['BSL'] == 0) {
            $Prueba99 = $consp99['BSLStatus2'] ? cambiarColorPrueba($consp99['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp99['CTS'] == 0) {
            $Prueba99 = $consp99['CTSStatus2'] ? cambiarColorPrueba($consp99['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp99['Packing'] == 0) {
            $Prueba99 = $consp99['PackingStatus2'] ? cambiarColorPrueba($consp99['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr100['Modelo'] == "Microsoft 8.2" || $contr100['Modelo'] == "Microsoft 8.3" || $contr100['Modelo'] == "NPI") {
    if ($consp100 = mysqli_fetch_array($conp100)) {
        if ($consp100['FTO'] == 0) {
            $Prueba100 = $consp100['FTOStatus2'] ? cambiarColorPrueba($consp100['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp100['QuickTest'] == 0) {
            $Prueba100 = $consp100['QuickTestStatus2'] ? cambiarColorPrueba($consp100['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp100['Stress'] == 0) {
            $Prueba100 = $consp100['StressStatus2'] ? cambiarColorPrueba($consp100['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp100['MDaaS'] == 0) {
            $Prueba100 = $consp100['MDaaSStatus2'] ? cambiarColorPrueba($consp100['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp100['RackTest'] == 0) {
            $Prueba100 = $consp100['RackTestStatus2'] ? cambiarColorPrueba($consp100['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp100['FTI'] == 0) {
            $Prueba100 = $consp100['FTIStatus2'] ? cambiarColorPrueba($consp100['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp100['BSL'] == 0) {
            $Prueba100 = $consp100['BSLStatus2'] ? cambiarColorPrueba($consp100['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp100['CTS'] == 0) {
            $Prueba100 = $consp100['CTSStatus2'] ? cambiarColorPrueba($consp100['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp100['Packing'] == 0) {
            $Prueba100 = $consp100['PackingStatus2'] ? cambiarColorPrueba($consp100['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>
