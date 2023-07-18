<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1".	*/

$constr1=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-01'");
if($contr1=mysqli_fetch_array($constr1)){$NoSerie1=$contr1['NoSerie'];} else {$NoSerie1="Disponible";}

$constr2=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-02'");
if($contr2=mysqli_fetch_array($constr2)){$NoSerie2=$contr2['NoSerie'];} else {$NoSerie2="Disponible";}

$constr3=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-03'");
if($contr3=mysqli_fetch_array($constr3)){$NoSerie3=$contr3['NoSerie'];} else {$NoSerie3="Disponible";}

$constr4=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-04'");
if($contr4=mysqli_fetch_array($constr4)){$NoSerie4=$contr4['NoSerie'];} else {$NoSerie4="Disponible";}

$constr5=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-05'");
if($contr5=mysqli_fetch_array($constr5)){$NoSerie5=$contr5['NoSerie'];} else {$NoSerie5="Disponible";}

$constr6=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-06'");
if($contr6=mysqli_fetch_array($constr6)){$NoSerie6=$contr6['NoSerie'];} else {$NoSerie6="Disponible";}

$constr7=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-07'");
if($contr7=mysqli_fetch_array($constr7)){$NoSerie7=$contr7['NoSerie'];} else {$NoSerie7="Disponible";}

$constr8=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-08'");
if($contr8=mysqli_fetch_array($constr8)){$NoSerie8=$contr8['NoSerie'];} else {$NoSerie8="Disponible";}

$constr9=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-09'");
if($contr9=mysqli_fetch_array($constr9)){$NoSerie9=$contr9['NoSerie'];} else {$NoSerie9="Disponible";}

$constr10=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR01-10'");
if($contr10=mysqli_fetch_array($constr10)){$NoSerie10=$contr10['NoSerie'];} else {$NoSerie10="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					$Prueba1="&nbsp;"; $Prueba2="&nbsp;"; $Prueba3="&nbsp;"; $Prueba4="&nbsp;"; $Prueba5="&nbsp;"; $Prueba6="&nbsp;"; $Prueba7="&nbsp;"; 
					$Prueba8="&nbsp;"; $Prueba9="&nbsp;"; $Prueba10="&nbsp;"; $Prueba11="&nbsp;"; $Prueba12="&nbsp;"; $Prueba13="&nbsp;"; $Prueba14="&nbsp;";
					$Prueba15="&nbsp;"; $Prueba16="&nbsp;"; $Prueba17="&nbsp;"; $Prueba18="&nbsp;"; $Prueba19="&nbsp;"; $Prueba20="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/


if ($contr1['Modelo'] == "Microsoft 8.2" || $contr1['Modelo'] == "Microsoft 8.3" || $contr1['Modelo'] == "NPI") {
    $conp1 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie1'");
}
if ($contr2['Modelo'] == "Microsoft 8.2" || $contr2['Modelo'] == "Microsoft 8.3" || $contr2['Modelo'] == "NPI") {
    $conp2 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie2'");
}

if ($contr3['Modelo'] == "Microsoft 8.2" || $contr3['Modelo'] == "Microsoft 8.3" || $contr3['Modelo'] == "NPI") {
    $conp3 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie3'");
}

if ($contr4['Modelo'] == "Microsoft 8.2" || $contr4['Modelo'] == "Microsoft 8.3" || $contr4['Modelo'] == "NPI") {
    $conp4 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie4'");
}

if ($contr5['Modelo'] == "Microsoft 8.2" || $contr5['Modelo'] == "Microsoft 8.3" || $contr5['Modelo'] == "NPI") {
    $conp5 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie5'");
}

if ($contr6['Modelo'] == "Microsoft 8.2" || $contr6['Modelo'] == "Microsoft 8.3" || $contr6['Modelo'] == "NPI") {
    $conp6 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie6'");
}

if($contr7['Modelo'] == "Microsoft 8.2" || $contr7['Modelo'] == "Microsoft 8.3" || $contr7['Modelo'] == "NPI") {
    $conp7 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie7'");
}
if ($contr8['Modelo'] == "Microsoft 8.2" || $contr8['Modelo'] == "Microsoft 8.3" || $contr8['Modelo'] == "NPI") {
    $conp8 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie8'");
}

if ($contr9['Modelo'] == "Microsoft 8.2" || $contr9['Modelo'] == "Microsoft 8.3" || $contr9['Modelo'] == "NPI") {
    $conp9 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie9'");
}

if ($contr10['Modelo'] == "Microsoft 8.2" || $contr10['Modelo'] == "Microsoft 8.3" || $contr10['Modelo'] == "NPI") {
    $conp10 = mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie10'");
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */

if ($contr1['Modelo'] == "Microsoft 8.2" || $contr1['Modelo'] == "Microsoft 8.3" || $contr1['Modelo'] == "NPI") {
    if ($consp1 = mysqli_fetch_array($conp1)) {
        if ($consp1['FTO'] == 0) {
            $Prueba1 = $Prueba1 = $consp1['FTOStatus2'] ? cambiarColorPrueba($consp1['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp1['QuickTest'] == 0) {
            $Prueba1 = $consp1['QuickTestStatus2'] ? cambiarColorPrueba($consp1['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp1['Stress'] == 0) {
            $Prueba1 = $consp1['StressStatus2'] ? cambiarColorPrueba($consp1['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp1['MDaaS'] == 0) {
            $Prueba1 = $consp1['MDaaSStatus2'] ? cambiarColorPrueba($consp1['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp1['RackTest'] == 0) {
            $Prueba1 = $consp1['RackTestStatus2'] ? cambiarColorPrueba($consp1['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp1['FTI'] == 0) {
            $Prueba1 = $consp1['FTIStatus2'] ? cambiarColorPrueba($consp1['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp1['BSL'] == 0) {
            $Prueba1 = $consp1['BSLStatus2'] ? cambiarColorPrueba($consp1['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp1['CTS'] == 0) {
            $Prueba1 = $consp1['CTSStatus2'] ? cambiarColorPrueba($consp1['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp1['Packing'] == 0) {
            $Prueba1 = $consp1['PackingStatus2'] ? cambiarColorPrueba($consp1['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}


/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr2['Modelo'] == "Microsoft 8.2" || $contr2['Modelo'] == "Microsoft 8.3" || $contr2['Modelo'] == "NPI") {
    if ($consp2 = mysqli_fetch_array($conp2)) {
        if ($consp2['FTO'] == 0) {
            $Prueba2 = $consp2['FTOStatus2'] ? cambiarColorPrueba($consp2['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp2['QuickTest'] == 0) {
            $Prueba2 = $consp2['QuickTestStatus2'] ? cambiarColorPrueba($consp2['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp2['Stress'] == 0) {
            $Prueba2 = $consp2['StressStatus2'] ? cambiarColorPrueba($consp2['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp2['MDaaS'] == 0) {
            $Prueba2 = $consp2['MDaaSStatus2'] ? cambiarColorPrueba($consp2['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp2['RackTest'] == 0) {
            $Prueba2 = $consp2['RackTestStatus2'] ? cambiarColorPrueba($consp2['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp2['FTI'] == 0) {
            $Prueba2 = $consp2['FTIStatus2'] ? cambiarColorPrueba($consp2['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp2['BSL'] == 0) {
            $Prueba2 = $consp2['BSLStatus2'] ? cambiarColorPrueba($consp2['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp2['CTS'] == 0) {
            $Prueba2 = $consp2['CTSStatus2'] ? cambiarColorPrueba($consp2['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp2['Packing'] == 0) {
            $Prueba2 = $consp2['PackingStatus2'] ? cambiarColorPrueba($consp2['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr3['Modelo'] == "Microsoft 8.2" || $contr3['Modelo'] == "Microsoft 8.3" || $contr3['Modelo'] == "NPI") {
    if ($consp3 = mysqli_fetch_array($conp3)) {
        if ($consp3['FTO'] == 0) {
            $Prueba3 = $consp3['FTOStatus2'] ? cambiarColorPrueba($consp3['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp3['QuickTest'] == 0) {
            $Prueba3 = $consp3['QuickTestStatus2'] ? cambiarColorPrueba($consp3['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp3['Stress'] == 0) {
            $Prueba3 = $consp3['StressStatus2'] ? cambiarColorPrueba($consp3['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp3['MDaaS'] == 0) {
            $Prueba3 = $consp3['MDaaSStatus2'] ? cambiarColorPrueba($consp3['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp3['RackTest'] == 0) {
            $Prueba3 = $consp3['RackTestStatus2'] ? cambiarColorPrueba($consp3['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp3['FTI'] == 0) {
            $Prueba3 = $consp3['FTIStatus2'] ? cambiarColorPrueba($consp3['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp3['BSL'] == 0) {
            $Prueba3 = $consp3['BSLStatus2'] ? cambiarColorPrueba($consp3['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp3['CTS'] == 0) {
            $Prueba3 = $consp3['CTSStatus2'] ? cambiarColorPrueba($consp3['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp3['Packing'] == 0) {
            $Prueba3 = $consp3['PackingStatus2'] ? cambiarColorPrueba($consp3['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr4['Modelo'] == "Microsoft 8.2" || $contr4['Modelo'] == "Microsoft 8.3" || $contr4['Modelo'] == "NPI") {
    if ($consp4 = mysqli_fetch_array($conp4)) {
        if ($consp4['FTO'] == 0) {
            $Prueba4 = $consp4['FTOStatus2'] ? cambiarColorPrueba($consp4['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp4['QuickTest'] == 0) {
            $Prueba4 = $consp4['QuickTestStatus2'] ? cambiarColorPrueba($consp4['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp4['Stress'] == 0) {
            $Prueba4 = $consp4['StressStatus2'] ? cambiarColorPrueba($consp4['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp4['MDaaS'] == 0) {
            $Prueba4 = $consp4['MDaaSStatus2'] ? cambiarColorPrueba($consp4['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp4['RackTest'] == 0) {
            $Prueba4 = $consp4['RackTestStatus2'] ? cambiarColorPrueba($consp4['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp4['FTI'] == 0) {
            $Prueba4 = $consp4['FTIStatus2'] ? cambiarColorPrueba($consp4['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp4['BSL'] == 0) {
            $Prueba4 = $consp4['BSLStatus2'] ? cambiarColorPrueba($consp4['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp4['CTS'] == 0) {
            $Prueba4 = $consp4['CTSStatus2'] ? cambiarColorPrueba($consp4['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp4['Packing'] == 0) {
            $Prueba4 = $consp4['PackingStatus2'] ? cambiarColorPrueba($consp4['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr5['Modelo'] == "Microsoft 8.2" || $contr5['Modelo'] == "Microsoft 8.3" || $contr5['Modelo'] == "NPI") {
    if ($consp5 = mysqli_fetch_array($conp5)) {
        if ($consp5['FTO'] == 0) {
            $Prueba5 = $consp5['FTOStatus2'] ? cambiarColorPrueba($consp5['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp5['QuickTest'] == 0) {
            $Prueba5 = $consp5['QuickTestStatus2'] ? cambiarColorPrueba($consp5['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp5['Stress'] == 0) {
            $Prueba5 = $consp5['StressStatus2'] ? cambiarColorPrueba($consp5['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp5['MDaaS'] == 0) {
            $Prueba5 = $consp5['MDaaSStatus2'] ? cambiarColorPrueba($consp5['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp5['RackTest'] == 0) {
            $Prueba5 = $consp5['RackTestStatus2'] ? cambiarColorPrueba($consp5['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp5['FTI'] == 0) {
            $Prueba5 = $consp5['FTIStatus2'] ? cambiarColorPrueba($consp5['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp5['BSL'] == 0) {
            $Prueba5 = $consp5['BSLStatus2'] ? cambiarColorPrueba($consp5['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp5['CTS'] == 0) {
            $Prueba5 = $consp5['CTSStatus2'] ? cambiarColorPrueba($consp5['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp5['Packing'] == 0) {
            $Prueba5 = $consp5['PackingStatus2'] ? cambiarColorPrueba($consp5['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr6['Modelo'] == "Microsoft 8.2" || $contr6['Modelo'] == "Microsoft 8.3" || $contr6['Modelo'] == "NPI") {
    if ($consp6 = mysqli_fetch_array($conp6)) {
        if ($consp6['FTO'] == 0) {
            $Prueba6 = $consp6['FTOStatus2'] ? cambiarColorPrueba($consp6['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp6['QuickTest'] == 0) {
            $Prueba6 = $consp6['QuickTestStatus2'] ? cambiarColorPrueba($consp6['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp6['Stress'] == 0) {
            $Prueba6 = $consp6['StressStatus2'] ? cambiarColorPrueba($consp6['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp6['MDaaS'] == 0) {
            $Prueba6 = $consp6['MDaaSStatus2'] ? cambiarColorPrueba($consp6['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp6['RackTest'] == 0) {
            $Prueba6 = $consp6['RackTestStatus2'] ? cambiarColorPrueba($consp6['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp6['FTI'] == 0) {
            $Prueba6 = $consp6['FTIStatus2'] ? cambiarColorPrueba($consp6['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp6['BSL'] == 0) {
            $Prueba6 = $consp6['BSLStatus2'] ? cambiarColorPrueba($consp6['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp6['CTS'] == 0) {
            $Prueba6 = $consp6['CTSStatus2'] ? cambiarColorPrueba($consp6['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp6['Packing'] == 0) {
            $Prueba6 = $consp6['PackingStatus2'] ? cambiarColorPrueba($consp6['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr7['Modelo'] == "Microsoft 8.2" || $contr7['Modelo'] == "Microsoft 8.3" || $contr7['Modelo'] == "NPI"){
    if ($consp7 = mysqli_fetch_array($conp7)) {
        if ($consp7['FTO'] == 0) {
            $Prueba7 = $Prueba7 = $consp7['FTOStatus2'] ? cambiarColorPrueba($consp7['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp7['QuickTest'] == 0) {
            $Prueba7 = $consp7['QuickTestStatus2'] ? cambiarColorPrueba($consp7['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp7['Stress'] == 0) {
            $Prueba7 = $consp7['StressStatus2'] ? cambiarColorPrueba($consp7['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp7['MDaaS'] == 0) {
            $Prueba7 = $consp7['MDaaSStatus2'] ? cambiarColorPrueba($consp7['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp7['RackTest'] == 0) {
            $Prueba7 = $consp7['RackTestStatus2'] ? cambiarColorPrueba($consp7['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp7['FTI'] == 0) {
            $Prueba7 = $consp7['FTIStatus2'] ? cambiarColorPrueba($consp7['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp7['BSL'] == 0) {
            $Prueba7 = $consp7['BSLStatus2'] ? cambiarColorPrueba($consp7['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp7['CTS'] == 0) {
            $Prueba7 = $consp7['CTSStatus2'] ? cambiarColorPrueba($consp7['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp7['Packing'] == 0) {
            $Prueba7 = $consp7['PackingStatus2'] ? cambiarColorPrueba($consp7['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr8['Modelo'] == "Microsoft 8.2" || $contr8['Modelo'] == "Microsoft 8.3" || $contr8['Modelo'] == "NPI"){
    if ($consp8 = mysqli_fetch_array($conp8)) {
        if ($consp8['FTO'] == 0) {
            $Prueba8 = $consp8['FTOStatus2'] ? cambiarColorPrueba($consp8['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp8['QuickTest'] == 0) {
            $Prueba8 = $consp8['QuickTestStatus2'] ? cambiarColorPrueba($consp8['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp8['Stress'] == 0) {
            $Prueba8 = $consp8['StressStatus2'] ? cambiarColorPrueba($consp8['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp8['MDaaS'] == 0) {
            $Prueba8 = $consp8['MDaaSStatus2'] ? cambiarColorPrueba($consp8['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp8['RackTest'] == 0) {
            $Prueba8 = $consp8['RackTestStatus2'] ? cambiarColorPrueba($consp8['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp8['FTI'] == 0) {
            $Prueba8 = $consp8['FTIStatus2'] ? cambiarColorPrueba($consp8['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp8['BSL'] == 0) {
            $Prueba8 = $consp8['BSLStatus2'] ? cambiarColorPrueba($consp8['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp8['CTS'] == 0) {
            $Prueba8 = $consp8['CTSStatus2'] ? cambiarColorPrueba($consp8['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp8['Packing'] == 0) {
            $Prueba8 = $consp8['PackingStatus2'] ? cambiarColorPrueba($consp8['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr9['Modelo'] == "Microsoft 8.2" || $contr9['Modelo'] == "Microsoft 8.3" || $contr9['Modelo'] == "NPI"){
    if ($consp9 = mysqli_fetch_array($conp9)) {
        if ($consp9['FTO'] == 0) {
            $Prueba9 = $consp9['FTOStatus2'] ? cambiarColorPrueba($consp9['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp9['QuickTest'] == 0) {
            $Prueba9 = $consp9['QuickTestStatus2'] ? cambiarColorPrueba($consp9['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp9['Stress'] == 0) {
            $Prueba9 = $consp9['StressStatus2'] ? cambiarColorPrueba($consp9['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp9['MDaaS'] == 0) {
            $Prueba9 = $consp9['MDaaSStatus2'] ? cambiarColorPrueba($consp9['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp9['RackTest'] == 0) {
            $Prueba9 = $consp9['RackTestStatus2'] ? cambiarColorPrueba($consp9['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp9['FTI'] == 0) {
            $Prueba9 = $consp9['FTIStatus2'] ? cambiarColorPrueba($consp9['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp9['BSL'] == 0) {
            $Prueba9 = $consp9['BSLStatus2'] ? cambiarColorPrueba($consp9['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp9['CTS'] == 0) {
            $Prueba9 = $consp9['CTSStatus2'] ? cambiarColorPrueba($consp9['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp9['Packing'] == 0) {
            $Prueba9 = $consp9['PackingStatus2'] ? cambiarColorPrueba($consp9['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr10['Modelo'] == "Microsoft 8.2" || $contr10['Modelo'] == "Microsoft 8.3" || $contr10['Modelo'] == "NPI"){
    if ($consp10 = mysqli_fetch_array($conp10)) {
        if ($consp10['FTO'] == 0) {
            $Prueba10 = $consp10['FTOStatus2'] ? cambiarColorPrueba($consp10['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp10['QuickTest'] == 0) {
            $Prueba10 = $consp10['QuickTestStatus2'] ? cambiarColorPrueba($consp10['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp10['Stress'] == 0) {
            $Prueba10 = $consp10['StressStatus2'] ? cambiarColorPrueba($consp10['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp10['MDaaS'] == 0) {
            $Prueba10 = $consp10['MDaaSStatus2'] ? cambiarColorPrueba($consp10['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp10['RackTest'] == 0) {
            $Prueba10 = $consp10['RackTestStatus2'] ? cambiarColorPrueba($consp10['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp10['FTI'] == 0) {
            $Prueba10 = $consp10['FTIStatus2'] ? cambiarColorPrueba($consp10['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp10['BSL'] == 0) {
            $Prueba10 = $consp10['BSLStatus2'] ? cambiarColorPrueba($consp10['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp10['CTS'] == 0) {
            $Prueba10 = $consp10['CTSStatus2'] ? cambiarColorPrueba($consp10['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp10['Packing'] == 0) {
            $Prueba10 = $consp10['PackingStatus2'] ? cambiarColorPrueba($consp10['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr11['Modelo'] == "Microsoft 8.2" || $contr11['Modelo'] == "Microsoft 8.3" || $contr11['Modelo'] == "NPI") {
    if ($consp11 = mysqli_fetch_array($conp11)) {
        if ($consp11['FTO'] == 0) {
            $Prueba11 = $consp11['FTOStatus2'] ? cambiarColorPrueba($consp11['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp11['QuickTest'] == 0) {
            $Prueba11 = $consp11['QuickTestStatus2'] ? cambiarColorPrueba($consp11['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp11['Stress'] == 0) {
            $Prueba11 = $consp11['StressStatus2'] ? cambiarColorPrueba($consp11['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp11['MDaaS'] == 0) {
            $Prueba11 = $consp11['MDaaSStatus2'] ? cambiarColorPrueba($consp11['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp11['RackTest'] == 0) {
            $Prueba11 = $consp11['RackTestStatus2'] ? cambiarColorPrueba($consp11['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp11['FTI'] == 0) {
            $Prueba11 = $consp11['FTIStatus2'] ? cambiarColorPrueba($consp11['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp11['BSL'] == 0) {
            $Prueba11 = $consp11['BSLStatus2'] ? cambiarColorPrueba($consp11['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp11['CTS'] == 0) {
            $Prueba11 = $consp11['CTSStatus2'] ? cambiarColorPrueba($consp11['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp11['Packing'] == 0) {
            $Prueba11 = $consp11['PackingStatus2'] ? cambiarColorPrueba($consp11['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>