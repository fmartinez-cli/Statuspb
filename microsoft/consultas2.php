<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1". 
    Nota:Para agregar otro Modelo, aqui no se modiica nada	*/
    
$constr11=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-11'");
if($contr11=mysqli_fetch_array($constr11)){$NoSerie11=$contr11['NoSerie'];} else {$NoSerie11="Disponible";}

$constr12=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-12'");
if($contr12=mysqli_fetch_array($constr12)){$NoSerie12=$contr12['NoSerie'];} else {$NoSerie12="Disponible";}

$constr13=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-13'");
if($contr13=mysqli_fetch_array($constr13)){$NoSerie13=$contr13['NoSerie'];} else {$NoSerie13="Disponible";}

$constr14=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-14'");
if($contr14=mysqli_fetch_array($constr14)){$NoSerie14=$contr14['NoSerie'];} else {$NoSerie14="Disponible";}

$constr15=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-15'");
if($contr15=mysqli_fetch_array($constr15)){$NoSerie15=$contr15['NoSerie'];} else {$NoSerie15="Disponible";}

$constr16=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-16'");
if($contr16=mysqli_fetch_array($constr16)){$NoSerie16=$contr16['NoSerie'];} else {$NoSerie16="Disponible";}

$constr17=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-17'");
if($contr17=mysqli_fetch_array($constr17)){$NoSerie17=$contr17['NoSerie'];} else {$NoSerie17="Disponible";}

$constr18=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-18'");
if($contr18=mysqli_fetch_array($constr18)){$NoSerie18=$contr18['NoSerie'];} else {$NoSerie18="Disponible";}

$constr19=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-19'");
if($contr19=mysqli_fetch_array($constr19)){$NoSerie19=$contr19['NoSerie'];} else {$NoSerie19="Disponible";}

$constr20=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR02-20'");
if($contr20=mysqli_fetch_array($constr20)){$NoSerie20=$contr20['NoSerie'];} else {$NoSerie20="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					$Prueba1="&nbsp;"; $Prueba2="&nbsp;"; $Prueba3="&nbsp;"; $Prueba4="&nbsp;"; $Prueba5="&nbsp;"; $Prueba6="&nbsp;"; $Prueba7="&nbsp;"; 
					$Prueba8="&nbsp;"; $Prueba9="&nbsp;"; $Prueba10="&nbsp;"; $Prueba11="&nbsp;"; $Prueba12="&nbsp;"; $Prueba13="&nbsp;"; $Prueba14="&nbsp;";
					$Prueba15="&nbsp;"; $Prueba16="&nbsp;"; $Prueba17="&nbsp;"; $Prueba18="&nbsp;"; $Prueba19="&nbsp;"; $Prueba20="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/



if($contr11['Modelo']=="Microsoft 8.2" || $contr11['Modelo']=="Microsoft 8.3" || $contr11['Modelo']=="NPI"){$conp11=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie11'");}
if($contr12['Modelo']=="Microsoft 8.2" || $contr12['Modelo']=="Microsoft 8.3" || $contr12['Modelo']=="NPI"){$conp12=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie12'");}
if($contr13['Modelo']=="Microsoft 8.2" || $contr13['Modelo']=="Microsoft 8.3" || $contr13['Modelo']=="NPI"){$conp13=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie13'");}
if($contr14['Modelo']=="Microsoft 8.2" || $contr14['Modelo']=="Microsoft 8.3" || $contr14['Modelo']=="NPI"){$conp14=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie14'");}
if($contr15['Modelo']=="Microsoft 8.2" || $contr15['Modelo']=="Microsoft 8.3" || $contr15['Modelo']=="NPI"){$conp15=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie15'");}
if($contr16['Modelo']=="Microsoft 8.2" || $contr16['Modelo']=="Microsoft 8.3" || $contr16['Modelo']=="NPI"){$conp16=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie16'");}
if($contr17['Modelo']=="Microsoft 8.2" || $contr17['Modelo']=="Microsoft 8.3" || $contr17['Modelo']=="NPI"){$conp17=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie17'");}
if($contr18['Modelo']=="Microsoft 8.2" || $contr18['Modelo']=="Microsoft 8.3" || $contr18['Modelo']=="NPI"){$conp18=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie18'");}
if($contr19['Modelo']=="Microsoft 8.2" || $contr19['Modelo']=="Microsoft 8.3" || $contr19['Modelo']=="NPI"){$conp19=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie19'");}
if($contr20['Modelo']=="Microsoft 8.2" || $contr20['Modelo']=="Microsoft 8.3" || $contr20['Modelo']=="NPI"){$conp20=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie20'");}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**Cambio de status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr11['Modelo'] == "Microsoft 8.2" || $contr11['Modelo'] == "Microsoft 8.3" || $contr11['Modelo'] == "NPI") {
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
if ($contr12['Modelo'] == "Microsoft 8.2" || $contr12['Modelo'] == "Microsoft 8.3" || $contr12['Modelo'] == "NPI") {
    if ($consp12 = mysqli_fetch_array($conp12)) {
        if ($consp12['FTO'] == 0) {
            $Prueba12 = $consp12['FTOStatus2'] ? cambiarColorPrueba($consp12['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp12['QuickTest'] == 0) {
            $Prueba12 = $consp12['QuickTestStatus2'] ? cambiarColorPrueba($consp12['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp12['Stress'] == 0) {
            $Prueba12 = $consp12['StressStatus2'] ? cambiarColorPrueba($consp12['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp12['MDaaS'] == 0) {
            $Prueba12 = $consp12['MDaaSStatus2'] ? cambiarColorPrueba($consp12['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp12['RackTest'] == 0) {
            $Prueba12 = $consp12['RackTestStatus2'] ? cambiarColorPrueba($consp12['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp12['FTI'] == 0) {
            $Prueba12 = $consp12['FTIStatus2'] ? cambiarColorPrueba($consp12['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp12['BSL'] == 0) {
            $Prueba12 = $consp12['BSLStatus2'] ? cambiarColorPrueba($consp12['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp12['CTS'] == 0) {
            $Prueba12 = $consp12['CTSStatus2'] ? cambiarColorPrueba($consp12['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp12['Packing'] == 0) {
            $Prueba12 = $consp12['PackingStatus2'] ? cambiarColorPrueba($consp12['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr13['Modelo'] == "Microsoft 8.2" || $contr13['Modelo'] == "Microsoft 8.3" || $contr13['Modelo'] == "NPI") {
    if ($consp13 = mysqli_fetch_array($conp13)) {
        if ($consp13['FTO'] == 0) {
            $Prueba13 = $consp13['FTOStatus2'] ? cambiarColorPrueba($consp13['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp13['QuickTest'] == 0) {
            $Prueba13 = $consp13['QuickTestStatus2'] ? cambiarColorPrueba($consp13['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp13['Stress'] == 0) {
            $Prueba13 = $consp13['StressStatus2'] ? cambiarColorPrueba($consp13['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp13['MDaaS'] == 0) {
            $Prueba13 = $consp13['MDaaSStatus2'] ? cambiarColorPrueba($consp13['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp13['RackTest'] == 0) {
            $Prueba13 = $consp13['RackTestStatus2'] ? cambiarColorPrueba($consp13['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp13['FTI'] == 0) {
            $Prueba13 = $consp13['FTIStatus2'] ? cambiarColorPrueba($consp13['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp13['BSL'] == 0) {
            $Prueba13 = $consp13['BSLStatus2'] ? cambiarColorPrueba($consp13['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp13['CTS'] == 0) {
            $Prueba13 = $consp13['CTSStatus2'] ? cambiarColorPrueba($consp13['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp13['Packing'] == 0) {
            $Prueba13 = $consp13['PackingStatus2'] ? cambiarColorPrueba($consp13['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr14['Modelo'] == "Microsoft 8.2" || $contr14['Modelo'] == "Microsoft 8.3" || $contr14['Modelo'] == "NPI") {
    if ($consp14 = mysqli_fetch_array($conp14)) {
        if ($consp14['FTO'] == 0) {
            $Prueba14 = $consp14['FTOStatus2'] ? cambiarColorPrueba($consp14['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp14['QuickTest'] == 0) {
            $Prueba14 = $consp14['QuickTestStatus2'] ? cambiarColorPrueba($consp14['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp14['Stress'] == 0) {
            $Prueba14 = $consp14['StressStatus2'] ? cambiarColorPrueba($consp14['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp14['MDaaS'] == 0) {
            $Prueba14 = $consp14['MDaaSStatus2'] ? cambiarColorPrueba($consp14['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp14['RackTest'] == 0) {
            $Prueba14 = $consp14['RackTestStatus2'] ? cambiarColorPrueba($consp14['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp14['FTI'] == 0) {
            $Prueba14 = $consp14['FTIStatus2'] ? cambiarColorPrueba($consp14['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp14['BSL'] == 0) {
            $Prueba14 = $consp14['BSLStatus2'] ? cambiarColorPrueba($consp14['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp14['CTS'] == 0) {
            $Prueba14 = $consp14['CTSStatus2'] ? cambiarColorPrueba($consp14['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp14['Packing'] == 0) {
            $Prueba14 = $consp14['PackingStatus2'] ? cambiarColorPrueba($consp14['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr15['Modelo'] == "Microsoft 8.2" || $contr15['Modelo'] == "Microsoft 8.3" || $contr15['Modelo'] == "NPI") {
    if ($consp15 = mysqli_fetch_array($conp15)) {
        if ($consp15['FTO'] == 0) {
            $Prueba15 = $consp15['FTOStatus2'] ? cambiarColorPrueba($consp15['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp15['QuickTest'] == 0) {
            $Prueba15 = $consp15['QuickTestStatus2'] ? cambiarColorPrueba($consp15['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp15['Stress'] == 0) {
            $Prueba15 = $consp15['StressStatus2'] ? cambiarColorPrueba($consp15['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp15['MDaaS'] == 0) {
            $Prueba15 = $consp15['MDaaSStatus2'] ? cambiarColorPrueba($consp15['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp15['RackTest'] == 0) {
            $Prueba15 = $consp15['RackTestStatus2'] ? cambiarColorPrueba($consp15['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp15['FTI'] == 0) {
            $Prueba15 = $consp15['FTIStatus2'] ? cambiarColorPrueba($consp15['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp15['BSL'] == 0) {
            $Prueba15 = $consp15['BSLStatus2'] ? cambiarColorPrueba($consp15['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp15['CTS'] == 0) {
            $Prueba15 = $consp15['CTSStatus2'] ? cambiarColorPrueba($consp15['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp15['Packing'] == 0) {
            $Prueba15 = $consp15['PackingStatus2'] ? cambiarColorPrueba($consp15['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr16['Modelo'] == "Microsoft 8.2" || $contr16['Modelo'] == "Microsoft 8.3" || $contr16['Modelo'] == "NPI") {
    if ($consp16 = mysqli_fetch_array($conp16)) {
        if ($consp16['FTO'] == 0) {
            $Prueba16 = $consp16['FTOStatus2'] ? cambiarColorPrueba($consp16['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp16['QuickTest'] == 0) {
            $Prueba16 = $consp16['QuickTestStatus2'] ? cambiarColorPrueba($consp16['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp16['Stress'] == 0) {
            $Prueba16 = $consp16['StressStatus2'] ? cambiarColorPrueba($consp16['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp16['MDaaS'] == 0) {
            $Prueba16 = $consp16['MDaaSStatus2'] ? cambiarColorPrueba($consp16['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp16['RackTest'] == 0) {
            $Prueba16 = $consp16['RackTestStatus2'] ? cambiarColorPrueba($consp16['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp16['FTI'] == 0) {
            $Prueba16 = $consp16['FTIStatus2'] ? cambiarColorPrueba($consp16['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp16['BSL'] == 0) {
            $Prueba16 = $consp16['BSLStatus2'] ? cambiarColorPrueba($consp16['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp16['CTS'] == 0) {
            $Prueba16 = $consp16['CTSStatus2'] ? cambiarColorPrueba($consp16['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp16['Packing'] == 0) {
            $Prueba16 = $consp16['PackingStatus2'] ? cambiarColorPrueba($consp16['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr17['Modelo'] == "Microsoft 8.2" || $contr17['Modelo'] == "Microsoft 8.3" || $contr17['Modelo'] == "NPI") {
    if ($consp17 = mysqli_fetch_array($conp17)) {
        if ($consp17['FTO'] == 0) {
            $Prueba17 = $consp17['FTOStatus2'] ? cambiarColorPrueba($consp17['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp17['QuickTest'] == 0) {
            $Prueba17 = $consp17['QuickTestStatus2'] ? cambiarColorPrueba($consp17['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp17['Stress'] == 0) {
            $Prueba17 = $consp17['StressStatus2'] ? cambiarColorPrueba($consp17['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp17['MDaaS'] == 0) {
            $Prueba17 = $consp17['MDaaSStatus2'] ? cambiarColorPrueba($consp17['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp17['RackTest'] == 0) {
            $Prueba17 = $consp17['RackTestStatus2'] ? cambiarColorPrueba($consp17['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp17['FTI'] == 0) {
            $Prueba17 = $consp17['FTIStatus2'] ? cambiarColorPrueba($consp17['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp17['BSL'] == 0) {
            $Prueba17 = $consp17['BSLStatus2'] ? cambiarColorPrueba($consp17['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp17['CTS'] == 0) {
            $Prueba17 = $consp17['CTSStatus2'] ? cambiarColorPrueba($consp17['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp17['Packing'] == 0) {
            $Prueba17 = $consp17['PackingStatus2'] ? cambiarColorPrueba($consp17['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr18['Modelo'] == "Microsoft 8.2" || $contr18['Modelo'] == "Microsoft 8.3" || $contr18['Modelo'] == "NPI") {
    if ($consp18 = mysqli_fetch_array($conp18)) {
        if ($consp18['FTO'] == 0) {
            $Prueba18 = $consp18['FTOStatus2'] ? cambiarColorPrueba($consp18['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp18['QuickTest'] == 0) {
            $Prueba18 = $consp18['QuickTestStatus2'] ? cambiarColorPrueba($consp18['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp18['Stress'] == 0) {
            $Prueba18 = $consp18['StressStatus2'] ? cambiarColorPrueba($consp18['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp18['MDaaS'] == 0) {
            $Prueba18 = $consp18['MDaaSStatus2'] ? cambiarColorPrueba($consp18['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp18['RackTest'] == 0) {
            $Prueba18 = $consp18['RackTestStatus2'] ? cambiarColorPrueba($consp18['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp18['FTI'] == 0) {
            $Prueba18 = $consp18['FTIStatus2'] ? cambiarColorPrueba($consp18['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp18['BSL'] == 0) {
            $Prueba18 = $consp18['BSLStatus2'] ? cambiarColorPrueba($consp18['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp18['CTS'] == 0) {
            $Prueba18 = $consp18['CTSStatus2'] ? cambiarColorPrueba($consp18['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp18['Packing'] == 0) {
            $Prueba18 = $consp18['PackingStatus2'] ? cambiarColorPrueba($consp18['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr19['Modelo'] == "Microsoft 8.2" || $contr19['Modelo'] == "Microsoft 8.3" || $contr19['Modelo'] == "NPI") {
    if ($consp19 = mysqli_fetch_array($conp19)) {
        if ($consp19['FTO'] == 0) {
            $Prueba19 = $consp19['FTOStatus2'] ? cambiarColorPrueba($consp19['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp19['QuickTest'] == 0) {
            $Prueba19 = $consp19['QuickTestStatus2'] ? cambiarColorPrueba($consp19['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp19['Stress'] == 0) {
            $Prueba19 = $consp19['StressStatus2'] ? cambiarColorPrueba($consp19['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp19['MDaaS'] == 0) {
            $Prueba19 = $consp19['MDaaSStatus2'] ? cambiarColorPrueba($consp19['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp19['RackTest'] == 0) {
            $Prueba19 = $consp19['RackTestStatus2'] ? cambiarColorPrueba($consp19['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp19['FTI'] == 0) {
            $Prueba19 = $consp19['FTIStatus2'] ? cambiarColorPrueba($consp19['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp19['BSL'] == 0) {
            $Prueba19 = $consp19['BSLStatus2'] ? cambiarColorPrueba($consp19['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp19['CTS'] == 0) {
            $Prueba19 = $consp19['CTSStatus2'] ? cambiarColorPrueba($consp19['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp19['Packing'] == 0) {
            $Prueba19 = $consp19['PackingStatus2'] ? cambiarColorPrueba($consp19['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr20['Modelo'] == "Microsoft 8.2" || $contr20['Modelo'] == "Microsoft 8.3" || $contr20['Modelo'] == "NPI") {
    if ($consp20 = mysqli_fetch_array($conp20)) {
        if ($consp20['FTO'] == 0) {
            $Prueba20 = $consp20['FTOStatus2'] ? cambiarColorPrueba($consp20['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp20['QuickTest'] == 0) {
            $Prueba20 = $consp20['QuickTestStatus2'] ? cambiarColorPrueba($consp20['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp20['Stress'] == 0) {
            $Prueba20 = $consp20['StressStatus2'] ? cambiarColorPrueba($consp20['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp20['MDaaS'] == 0) {
            $Prueba20 = $consp20['MDaaSStatus2'] ? cambiarColorPrueba($consp20['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp20['RackTest'] == 0) {
            $Prueba20 = $consp20['RackTestStatus2'] ? cambiarColorPrueba($consp20['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp20['FTI'] == 0) {
            $Prueba20 = $consp20['FTIStatus2'] ? cambiarColorPrueba($consp20['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp20['BSL'] == 0) {
            $Prueba20 = $consp20['BSLStatus2'] ? cambiarColorPrueba($consp20['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp20['CTS'] == 0) {
            $Prueba20 = $consp20['CTSStatus2'] ? cambiarColorPrueba($consp20['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp20['Packing'] == 0) {
            $Prueba20 = $consp20['PackingStatus2'] ? cambiarColorPrueba($consp20['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>