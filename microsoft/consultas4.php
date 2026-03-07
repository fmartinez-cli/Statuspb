<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1".	*/



$constr31=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-31'");
if($contr31=mysqli_fetch_array($constr31)){$NoSerie31=$contr31['NoSerie'];} else {$NoSerie31="Disponible";}

$constr32=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-32'");
if($contr32=mysqli_fetch_array($constr32)){$NoSerie32=$contr32['NoSerie'];} else {$NoSerie32="Disponible";}

$constr33=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-33'");
if($contr33=mysqli_fetch_array($constr33)){$NoSerie33=$contr33['NoSerie'];} else {$NoSerie33="Disponible";}

$constr34=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-34'");
if($contr34=mysqli_fetch_array($constr34)){$NoSerie34=$contr34['NoSerie'];} else {$NoSerie34="Disponible";}

$constr35=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-35'");
if($contr35=mysqli_fetch_array($constr35)){$NoSerie35=$contr35['NoSerie'];} else {$NoSerie35="Disponible";}

$constr36=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-36'");
if($contr36=mysqli_fetch_array($constr36)){$NoSerie36=$contr36['NoSerie'];} else {$NoSerie36="Disponible";}

$constr37=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-37'");
if($contr37=mysqli_fetch_array($constr37)){$NoSerie37=$contr37['NoSerie'];} else {$NoSerie37="Disponible";}

$constr38=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-38'");
if($contr38=mysqli_fetch_array($constr38)){$NoSerie38=$contr38['NoSerie'];} else {$NoSerie38="Disponible";}

$constr39=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-39'");
if($contr39=mysqli_fetch_array($constr39)){$NoSerie39=$contr39['NoSerie'];} else {$NoSerie39="Disponible";}

$constr40=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR04-40'");
if($contr40=mysqli_fetch_array($constr40)){$NoSerie40=$contr40['NoSerie'];} else {$NoSerie40="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					 $Prueba31="&nbsp;"; $Prueba32="&nbsp;"; $Prueba33="&nbsp;"; $Prueba34="&nbsp;";
					$Prueba35="&nbsp;"; $Prueba36="&nbsp;"; $Prueba37="&nbsp;"; $Prueba38="&nbsp;"; $Prueba39="&nbsp;"; $Prueba40="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/


if($contr31['Modelo']=="Microsoft 8.2" || $contr31['Modelo']=="Microsoft 8.3" || $contr31['Modelo']=="NPI"){$conp31=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie31'");}
if($contr32['Modelo']=="Microsoft 8.2" || $contr32['Modelo']=="Microsoft 8.3" || $contr32['Modelo']=="NPI"){$conp32=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie32'");}
if($contr33['Modelo']=="Microsoft 8.2" || $contr33['Modelo']=="Microsoft 8.3" || $contr33['Modelo']=="NPI"){$conp33=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie33'");}
if($contr34['Modelo']=="Microsoft 8.2" || $contr34['Modelo']=="Microsoft 8.3" || $contr34['Modelo']=="NPI"){$conp34=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie34'");}
if($contr35['Modelo']=="Microsoft 8.2" || $contr35['Modelo']=="Microsoft 8.3" || $contr35['Modelo']=="NPI"){$conp35=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie35'");}
if($contr36['Modelo']=="Microsoft 8.2" || $contr36['Modelo']=="Microsoft 8.3" || $contr36['Modelo']=="NPI"){$conp36=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie36'");}
if($contr37['Modelo']=="Microsoft 8.2" || $contr37['Modelo']=="Microsoft 8.3" || $contr37['Modelo']=="NPI"){$conp37=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie37'");}
if($contr38['Modelo']=="Microsoft 8.2" || $contr38['Modelo']=="Microsoft 8.3" || $contr38['Modelo']=="NPI"){$conp38=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie38'");}
if($contr39['Modelo']=="Microsoft 8.2" || $contr39['Modelo']=="Microsoft 8.3" || $contr39['Modelo']=="NPI"){$conp39=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie39'");}
if($contr40['Modelo']=="Microsoft 8.2" || $contr40['Modelo']=="Microsoft 8.3" || $contr40['Modelo']=="NPI"){$conp40=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie40'");}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr31['Modelo'] == "Microsoft 8.2" || $contr31['Modelo'] == "Microsoft 8.3" || $contr31['Modelo'] == "NPI") {
    if ($consp31 = mysqli_fetch_array($conp31)) {
        if ($consp31['FTO'] == 0) {
            $Prueba31 = $consp31['FTOStatus2'] ? cambiarColorPrueba($consp31['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp31['QuickTest'] == 0) {
            $Prueba31 = $consp31['QuickTestStatus2'] ? cambiarColorPrueba($consp31['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp31['Stress'] == 0) {
            $Prueba31 = $consp31['StressStatus2'] ? cambiarColorPrueba($consp31['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp31['MDaaS'] == 0) {
            $Prueba31 = $consp31['MDaaSStatus2'] ? cambiarColorPrueba($consp31['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp31['RackTest'] == 0) {
            $Prueba31 = $consp31['RackTestStatus2'] ? cambiarColorPrueba($consp31['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp31['FTI'] == 0) {
            $Prueba31 = $consp31['FTIStatus2'] ? cambiarColorPrueba($consp31['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp31['BSL'] == 0) {
            $Prueba31 = $consp31['BSLStatus2'] ? cambiarColorPrueba($consp31['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp31['CTS'] == 0) {
            $Prueba31 = $consp31['CTSStatus2'] ? cambiarColorPrueba($consp31['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp31['Packing'] == 0) {
            $Prueba31 = $consp31['PackingStatus2'] ? cambiarColorPrueba($consp31['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr32['Modelo'] == "Microsoft 8.2" || $contr32['Modelo'] == "Microsoft 8.3" || $contr32['Modelo'] == "NPI") {
    if ($consp32 = mysqli_fetch_array($conp32)) {
        if ($consp32['FTO'] == 0) {
            $Prueba32 = $consp32['FTOStatus2'] ? cambiarColorPrueba($consp32['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp32['QuickTest'] == 0) {
            $Prueba32 = $consp32['QuickTestStatus2'] ? cambiarColorPrueba($consp32['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp32['Stress'] == 0) {
            $Prueba32 = $consp32['StressStatus2'] ? cambiarColorPrueba($consp32['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp32['MDaaS'] == 0) {
            $Prueba32 = $consp32['MDaaSStatus2'] ? cambiarColorPrueba($consp32['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp32['RackTest'] == 0) {
            $Prueba32 = $consp32['RackTestStatus2'] ? cambiarColorPrueba($consp32['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp32['FTI'] == 0) {
            $Prueba32 = $consp32['FTIStatus2'] ? cambiarColorPrueba($consp32['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp32['BSL'] == 0) {
            $Prueba32 = $consp32['BSLStatus2'] ? cambiarColorPrueba($consp32['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp32['CTS'] == 0) {
            $Prueba32 = $consp32['CTSStatus2'] ? cambiarColorPrueba($consp32['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp32['Packing'] == 0) {
            $Prueba32 = $consp32['PackingStatus2'] ? cambiarColorPrueba($consp32['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr33['Modelo'] == "Microsoft 8.2" || $contr33['Modelo'] == "Microsoft 8.3" || $contr33['Modelo'] == "NPI") {
    if ($consp33 = mysqli_fetch_array($conp33)) {
        if ($consp33['FTO'] == 0) {
            $Prueba33 = $consp33['FTOStatus2'] ? cambiarColorPrueba($consp33['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp33['QuickTest'] == 0) {
            $Prueba33 = $consp33['QuickTestStatus2'] ? cambiarColorPrueba($consp33['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp33['Stress'] == 0) {
            $Prueba33 = $consp33['StressStatus2'] ? cambiarColorPrueba($consp33['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp33['MDaaS'] == 0) {
            $Prueba33 = $consp33['MDaaSStatus2'] ? cambiarColorPrueba($consp33['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp33['RackTest'] == 0) {
            $Prueba33 = $consp33['RackTestStatus2'] ? cambiarColorPrueba($consp33['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp33['FTI'] == 0) {
            $Prueba33 = $consp33['FTIStatus2'] ? cambiarColorPrueba($consp33['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp33['BSL'] == 0) {
            $Prueba33 = $consp33['BSLStatus2'] ? cambiarColorPrueba($consp33['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp33['CTS'] == 0) {
            $Prueba33 = $consp33['CTSStatus2'] ? cambiarColorPrueba($consp33['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp33['Packing'] == 0) {
            $Prueba33 = $consp33['PackingStatus2'] ? cambiarColorPrueba($consp33['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr34['Modelo'] == "Microsoft 8.2" || $contr34['Modelo'] == "Microsoft 8.3" || $contr34['Modelo'] == "NPI") {
    if ($consp34 = mysqli_fetch_array($conp34)) {
        if ($consp34['FTO'] == 0) {
            $Prueba34 = $consp34['FTOStatus2'] ? cambiarColorPrueba($consp34['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp34['QuickTest'] == 0) {
            $Prueba34 = $consp34['QuickTestStatus2'] ? cambiarColorPrueba($consp34['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp34['Stress'] == 0) {
            $Prueba34 = $consp34['StressStatus2'] ? cambiarColorPrueba($consp34['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp34['MDaaS'] == 0) {
            $Prueba34 = $consp34['MDaaSStatus2'] ? cambiarColorPrueba($consp34['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp34['RackTest'] == 0) {
            $Prueba34 = $consp34['RackTestStatus2'] ? cambiarColorPrueba($consp34['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp34['FTI'] == 0) {
            $Prueba34 = $consp34['FTIStatus2'] ? cambiarColorPrueba($consp34['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp34['BSL'] == 0) {
            $Prueba34 = $consp34['BSLStatus2'] ? cambiarColorPrueba($consp34['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp34['CTS'] == 0) {
            $Prueba34 = $consp34['CTSStatus2'] ? cambiarColorPrueba($consp34['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp34['Packing'] == 0) {
            $Prueba34 = $consp34['PackingStatus2'] ? cambiarColorPrueba($consp34['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr35['Modelo'] == "Microsoft 8.2" || $contr35['Modelo'] == "Microsoft 8.3" || $contr35['Modelo'] == "NPI") {
    if ($consp35 = mysqli_fetch_array($conp35)) {
        if ($consp35['FTO'] == 0) {
            $Prueba35 = $consp35['FTOStatus2'] ? cambiarColorPrueba($consp35['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp35['QuickTest'] == 0) {
            $Prueba35 = $consp35['QuickTestStatus2'] ? cambiarColorPrueba($consp35['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp35['Stress'] == 0) {
            $Prueba35 = $consp35['StressStatus2'] ? cambiarColorPrueba($consp35['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp35['MDaaS'] == 0) {
            $Prueba35 = $consp35['MDaaSStatus2'] ? cambiarColorPrueba($consp35['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp35['RackTest'] == 0) {
            $Prueba35 = $consp35['RackTestStatus2'] ? cambiarColorPrueba($consp35['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp35['FTI'] == 0) {
            $Prueba35 = $consp35['FTIStatus2'] ? cambiarColorPrueba($consp35['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp35['BSL'] == 0) {
            $Prueba35 = $consp35['BSLStatus2'] ? cambiarColorPrueba($consp35['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp35['CTS'] == 0) {
            $Prueba35 = $consp35['CTSStatus2'] ? cambiarColorPrueba($consp35['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp35['Packing'] == 0) {
            $Prueba35 = $consp35['PackingStatus2'] ? cambiarColorPrueba($consp35['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr36['Modelo'] == "Microsoft 8.2" || $contr36['Modelo'] == "Microsoft 8.3" || $contr36['Modelo'] == "NPI") {
    if ($consp36 = mysqli_fetch_array($conp36)) {
        if ($consp36['FTO'] == 0) {
            $Prueba36 = $consp36['FTOStatus2'] ? cambiarColorPrueba($consp36['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp36['QuickTest'] == 0) {
            $Prueba36 = $consp36['QuickTestStatus2'] ? cambiarColorPrueba($consp36['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp36['Stress'] == 0) {
            $Prueba36 = $consp36['StressStatus2'] ? cambiarColorPrueba($consp36['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp36['MDaaS'] == 0) {
            $Prueba36 = $consp36['MDaaSStatus2'] ? cambiarColorPrueba($consp36['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp36['RackTest'] == 0) {
            $Prueba36 = $consp36['RackTestStatus2'] ? cambiarColorPrueba($consp36['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp36['FTI'] == 0) {
            $Prueba36 = $consp36['FTIStatus2'] ? cambiarColorPrueba($consp36['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp36['BSL'] == 0) {
            $Prueba36 = $consp36['BSLStatus2'] ? cambiarColorPrueba($consp36['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp36['CTS'] == 0) {
            $Prueba36 = $consp36['CTSStatus2'] ? cambiarColorPrueba($consp36['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp36['Packing'] == 0) {
            $Prueba36 = $consp36['PackingStatus2'] ? cambiarColorPrueba($consp36['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr37['Modelo'] == "Microsoft 8.2" || $contr37['Modelo'] == "Microsoft 8.3" || $contr37['Modelo'] == "NPI") {
    if ($consp37 = mysqli_fetch_array($conp37)) {
        if ($consp37['FTO'] == 0) {
            $Prueba37 = $consp37['FTOStatus2'] ? cambiarColorPrueba($consp37['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp37['QuickTest'] == 0) {
            $Prueba37 = $consp37['QuickTestStatus2'] ? cambiarColorPrueba($consp37['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp37['Stress'] == 0) {
            $Prueba37 = $consp37['StressStatus2'] ? cambiarColorPrueba($consp37['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp37['MDaaS'] == 0) {
            $Prueba37 = $consp37['MDaaSStatus2'] ? cambiarColorPrueba($consp37['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp37['RackTest'] == 0) {
            $Prueba37 = $consp37['RackTestStatus2'] ? cambiarColorPrueba($consp37['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp37['FTI'] == 0) {
            $Prueba37 = $consp37['FTIStatus2'] ? cambiarColorPrueba($consp37['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp37['BSL'] == 0) {
            $Prueba37 = $consp37['BSLStatus2'] ? cambiarColorPrueba($consp37['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp37['CTS'] == 0) {
            $Prueba37 = $consp37['CTSStatus2'] ? cambiarColorPrueba($consp37['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp37['Packing'] == 0) {
            $Prueba37 = $consp37['PackingStatus2'] ? cambiarColorPrueba($consp37['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr38['Modelo'] == "Microsoft 8.2" || $contr38['Modelo'] == "Microsoft 8.3" || $contr38['Modelo'] == "NPI") {
    if ($consp38 = mysqli_fetch_array($conp38)) {
        if ($consp38['FTO'] == 0) {
            $Prueba38 = $consp38['FTOStatus2'] ? cambiarColorPrueba($consp38['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp38['QuickTest'] == 0) {
            $Prueba38 = $consp38['QuickTestStatus2'] ? cambiarColorPrueba($consp38['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp38['Stress'] == 0) {
            $Prueba38 = $consp38['StressStatus2'] ? cambiarColorPrueba($consp38['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp38['MDaaS'] == 0) {
            $Prueba38 = $consp38['MDaaSStatus2'] ? cambiarColorPrueba($consp38['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp38['RackTest'] == 0) {
            $Prueba38 = $consp38['RackTestStatus2'] ? cambiarColorPrueba($consp38['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp38['FTI'] == 0) {
            $Prueba38 = $consp38['FTIStatus2'] ? cambiarColorPrueba($consp38['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp38['BSL'] == 0) {
            $Prueba38 = $consp38['BSLStatus2'] ? cambiarColorPrueba($consp38['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp38['CTS'] == 0) {
            $Prueba38 = $consp38['CTSStatus2'] ? cambiarColorPrueba($consp38['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp38['Packing'] == 0) {
            $Prueba38 = $consp38['PackingStatus2'] ? cambiarColorPrueba($consp38['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr39['Modelo'] == "Microsoft 8.2" || $contr39['Modelo'] == "Microsoft 8.3" || $contr39['Modelo'] == "NPI") {
    if ($consp39 = mysqli_fetch_array($conp39)) {
        if ($consp39['FTO'] == 0) {
            $Prueba39 = $consp39['FTOStatus2'] ? cambiarColorPrueba($consp39['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp39['QuickTest'] == 0) {
            $Prueba39 = $consp39['QuickTestStatus2'] ? cambiarColorPrueba($consp39['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp39['Stress'] == 0) {
            $Prueba39 = $consp39['StressStatus2'] ? cambiarColorPrueba($consp39['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp39['MDaaS'] == 0) {
            $Prueba39 = $consp39['MDaaSStatus2'] ? cambiarColorPrueba($consp39['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp39['RackTest'] == 0) {
            $Prueba39 = $consp39['RackTestStatus2'] ? cambiarColorPrueba($consp39['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp39['FTI'] == 0) {
            $Prueba39 = $consp39['FTIStatus2'] ? cambiarColorPrueba($consp39['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp39['BSL'] == 0) {
            $Prueba39 = $consp39['BSLStatus2'] ? cambiarColorPrueba($consp39['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp39['CTS'] == 0) {
            $Prueba39 = $consp39['CTSStatus2'] ? cambiarColorPrueba($consp39['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp39['Packing'] == 0) {
            $Prueba39 = $consp39['PackingStatus2'] ? cambiarColorPrueba($consp39['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr40['Modelo'] == "Microsoft 8.2" || $contr40['Modelo'] == "Microsoft 8.3" || $contr40['Modelo'] == "NPI") {
    if ($consp40 = mysqli_fetch_array($conp40)) {
        if ($consp40['FTO'] == 0) {
            $Prueba40 = $consp40['FTOStatus2'] ? cambiarColorPrueba($consp40['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp40['QuickTest'] == 0) {
            $Prueba40 = $consp40['QuickTestStatus2'] ? cambiarColorPrueba($consp40['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp40['Stress'] == 0) {
            $Prueba40 = $consp40['StressStatus2'] ? cambiarColorPrueba($consp40['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp40['MDaaS'] == 0) {
            $Prueba40 = $consp40['MDaaSStatus2'] ? cambiarColorPrueba($consp40['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp40['RackTest'] == 0) {
            $Prueba40 = $consp40['RackTestStatus2'] ? cambiarColorPrueba($consp40['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp40['FTI'] == 0) {
            $Prueba40 = $consp40['FTIStatus2'] ? cambiarColorPrueba($consp40['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp40['BSL'] == 0) {
            $Prueba40 = $consp40['BSLStatus2'] ? cambiarColorPrueba($consp40['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp40['CTS'] == 0) {
            $Prueba40 = $consp40['CTSStatus2'] ? cambiarColorPrueba($consp40['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp40['Packing'] == 0) {
            $Prueba40 = $consp40['PackingStatus2'] ? cambiarColorPrueba($consp40['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>
