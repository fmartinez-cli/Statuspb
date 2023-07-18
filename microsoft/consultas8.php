<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1".	*/



$constr71=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-71'");
if($contr71=mysqli_fetch_array($constr71)){$NoSerie71=$contr71['NoSerie'];} else {$NoSerie71="Disponible";}

$constr72=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-72'");
if($contr72=mysqli_fetch_array($constr72)){$NoSerie72=$contr72['NoSerie'];} else {$NoSerie72="Disponible";}

$constr73=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-73'");
if($contr73=mysqli_fetch_array($constr73)){$NoSerie73=$contr73['NoSerie'];} else {$NoSerie73="Disponible";}

$constr74=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-74'");
if($contr74=mysqli_fetch_array($constr74)){$NoSerie74=$contr74['NoSerie'];} else {$NoSerie74="Disponible";}

$constr75=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-75'");
if($contr75=mysqli_fetch_array($constr75)){$NoSerie75=$contr75['NoSerie'];} else {$NoSerie75="Disponible";}

$constr76=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-76'");
if($contr76=mysqli_fetch_array($constr76)){$NoSerie76=$contr76['NoSerie'];} else {$NoSerie76="Disponible";}

$constr77=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-77'");
if($contr77=mysqli_fetch_array($constr77)){$NoSerie77=$contr77['NoSerie'];} else {$NoSerie77="Disponible";}

$constr78=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-78'");
if($contr78=mysqli_fetch_array($constr78)){$NoSerie78=$contr78['NoSerie'];} else {$NoSerie78="Disponible";}

$constr79=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-79'");
if($contr79=mysqli_fetch_array($constr79)){$NoSerie79=$contr79['NoSerie'];} else {$NoSerie79="Disponible";}

$constr80=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR08-80'");
if($contr80=mysqli_fetch_array($constr80)){$NoSerie80=$contr80['NoSerie'];} else {$NoSerie80="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					 $Prueba71="&nbsp;"; $Prueba72="&nbsp;"; $Prueba73="&nbsp;"; $Prueba74="&nbsp;";
					$Prueba75="&nbsp;"; $Prueba76="&nbsp;"; $Prueba77="&nbsp;"; $Prueba78="&nbsp;"; $Prueba79="&nbsp;"; $Prueba80="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/



if($contr71['Modelo']=="Microsoft 8.2" || $contr71['Modelo']=="Microsoft 8.3" || $contr71['Modelo']=="NPI"){$conp71=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie71'");}
if($contr72['Modelo']=="Microsoft 8.2" || $contr72['Modelo']=="Microsoft 8.3" || $contr72['Modelo']=="NPI"){$conp72=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie72'");}
if($contr73['Modelo']=="Microsoft 8.2" || $contr73['Modelo']=="Microsoft 8.3" || $contr73['Modelo']=="NPI"){$conp73=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie73'");}
if($contr74['Modelo']=="Microsoft 8.2" || $contr74['Modelo']=="Microsoft 8.3" || $contr74['Modelo']=="NPI"){$conp74=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie74'");}
if($contr75['Modelo']=="Microsoft 8.2" || $contr75['Modelo']=="Microsoft 8.3" || $contr75['Modelo']=="NPI"){$conp75=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie75'");}
if($contr76['Modelo']=="Microsoft 8.2" || $contr76['Modelo']=="Microsoft 8.3" || $contr76['Modelo']=="NPI"){$conp76=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie76'");}
if($contr77['Modelo']=="Microsoft 8.2" || $contr77['Modelo']=="Microsoft 8.3" || $contr77['Modelo']=="NPI"){$conp77=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie77'");}
if($contr78['Modelo']=="Microsoft 8.2" || $contr78['Modelo']=="Microsoft 8.3" || $contr78['Modelo']=="NPI"){$conp78=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie78'");}
if($contr79['Modelo']=="Microsoft 8.2" || $contr79['Modelo']=="Microsoft 8.3" || $contr79['Modelo']=="NPI"){$conp79=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie79'");}
if($contr80['Modelo']=="Microsoft 8.2" || $contr80['Modelo']=="Microsoft 8.3" || $contr80['Modelo']=="NPI"){$conp80=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie80'");}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr71['Modelo'] == "Microsoft 8.2" || $contr71['Modelo'] == "Microsoft 8.3" || $contr71['Modelo'] == "NPI") {
    if ($consp71 = mysqli_fetch_array($conp71)) {
        if ($consp71['FTO'] == 0) {
            $Prueba71 = $consp71['FTOStatus2'] ? cambiarColorPrueba($consp71['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp71['QuickTest'] == 0) {
            $Prueba71 = $consp71['QuickTestStatus2'] ? cambiarColorPrueba($consp71['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp71['Stress'] == 0) {
            $Prueba71 = $consp71['StressStatus2'] ? cambiarColorPrueba($consp71['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp71['MDaaS'] == 0) {
            $Prueba71 = $consp71['MDaaSStatus2'] ? cambiarColorPrueba($consp71['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp71['RackTest'] == 0) {
            $Prueba71 = $consp71['RackTestStatus2'] ? cambiarColorPrueba($consp71['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp71['FTI'] == 0) {
            $Prueba71 = $consp71['FTIStatus2'] ? cambiarColorPrueba($consp71['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp71['BSL'] == 0) {
            $Prueba71 = $consp71['BSLStatus2'] ? cambiarColorPrueba($consp71['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp71['CTS'] == 0) {
            $Prueba71 = $consp71['CTSStatus2'] ? cambiarColorPrueba($consp71['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp71['Packing'] == 0) {
            $Prueba71 = $consp71['PackingStatus2'] ? cambiarColorPrueba($consp71['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr72['Modelo'] == "Microsoft 8.2" || $contr72['Modelo'] == "Microsoft 8.3" || $contr72['Modelo'] == "NPI") {
    if ($consp72 = mysqli_fetch_array($conp72)) {
        if ($consp72['FTO'] == 0) {
            $Prueba72 = $consp72['FTOStatus2'] ? cambiarColorPrueba($consp72['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp72['QuickTest'] == 0) {
            $Prueba72 = $consp72['QuickTestStatus2'] ? cambiarColorPrueba($consp72['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp72['Stress'] == 0) {
            $Prueba72 = $consp72['StressStatus2'] ? cambiarColorPrueba($consp72['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp72['MDaaS'] == 0) {
            $Prueba72 = $consp72['MDaaSStatus2'] ? cambiarColorPrueba($consp72['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp72['RackTest'] == 0) {
            $Prueba72 = $consp72['RackTestStatus2'] ? cambiarColorPrueba($consp72['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp72['FTI'] == 0) {
            $Prueba72 = $consp72['FTIStatus2'] ? cambiarColorPrueba($consp72['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp72['BSL'] == 0) {
            $Prueba72 = $consp72['BSLStatus2'] ? cambiarColorPrueba($consp72['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp72['CTS'] == 0) {
            $Prueba72 = $consp72['CTSStatus2'] ? cambiarColorPrueba($consp72['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp72['Packing'] == 0) {
            $Prueba72 = $consp72['PackingStatus2'] ? cambiarColorPrueba($consp72['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr73['Modelo'] == "Microsoft 8.2" || $contr73['Modelo'] == "Microsoft 8.3" || $contr73['Modelo'] == "NPI") {
    if ($consp73 = mysqli_fetch_array($conp73)) {
        if ($consp73['FTO'] == 0) {
            $Prueba73 = $consp73['FTOStatus2'] ? cambiarColorPrueba($consp73['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp73['QuickTest'] == 0) {
            $Prueba73 = $consp73['QuickTestStatus2'] ? cambiarColorPrueba($consp73['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp73['Stress'] == 0) {
            $Prueba73 = $consp73['StressStatus2'] ? cambiarColorPrueba($consp73['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp73['MDaaS'] == 0) {
            $Prueba73 = $consp73['MDaaSStatus2'] ? cambiarColorPrueba($consp73['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp73['RackTest'] == 0) {
            $Prueba73 = $consp73['RackTestStatus2'] ? cambiarColorPrueba($consp73['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp73['FTI'] == 0) {
            $Prueba73 = $consp73['FTIStatus2'] ? cambiarColorPrueba($consp73['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp73['BSL'] == 0) {
            $Prueba73 = $consp73['BSLStatus2'] ? cambiarColorPrueba($consp73['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp73['CTS'] == 0) {
            $Prueba73 = $consp73['CTSStatus2'] ? cambiarColorPrueba($consp73['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp73['Packing'] == 0) {
            $Prueba73 = $consp73['PackingStatus2'] ? cambiarColorPrueba($consp73['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr74['Modelo'] == "Microsoft 8.2" || $contr74['Modelo'] == "Microsoft 8.3" || $contr74['Modelo'] == "NPI") {
    if ($consp74 = mysqli_fetch_array($conp74)) {
        if ($consp74['FTO'] == 0) {
            $Prueba74 = $consp74['FTOStatus2'] ? cambiarColorPrueba($consp74['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp74['QuickTest'] == 0) {
            $Prueba74 = $consp74['QuickTestStatus2'] ? cambiarColorPrueba($consp74['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp74['Stress'] == 0) {
            $Prueba74 = $consp74['StressStatus2'] ? cambiarColorPrueba($consp74['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp74['MDaaS'] == 0) {
            $Prueba74 = $consp74['MDaaSStatus2'] ? cambiarColorPrueba($consp74['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp74['RackTest'] == 0) {
            $Prueba74 = $consp74['RackTestStatus2'] ? cambiarColorPrueba($consp74['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp74['FTI'] == 0) {
            $Prueba74 = $consp74['FTIStatus2'] ? cambiarColorPrueba($consp74['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp74['BSL'] == 0) {
            $Prueba74 = $consp74['BSLStatus2'] ? cambiarColorPrueba($consp74['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp74['CTS'] == 0) {
            $Prueba74 = $consp74['CTSStatus2'] ? cambiarColorPrueba($consp74['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp74['Packing'] == 0) {
            $Prueba74 = $consp74['PackingStatus2'] ? cambiarColorPrueba($consp74['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr75['Modelo'] == "Microsoft 8.2" || $contr75['Modelo'] == "Microsoft 8.3" || $contr75['Modelo'] == "NPI") {
    if ($consp75 = mysqli_fetch_array($conp75)) {
        if ($consp75['FTO'] == 0) {
            $Prueba75 = $consp75['FTOStatus2'] ? cambiarColorPrueba($consp75['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp75['QuickTest'] == 0) {
            $Prueba75 = $consp75['QuickTestStatus2'] ? cambiarColorPrueba($consp75['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp75['Stress'] == 0) {
            $Prueba75 = $consp75['StressStatus2'] ? cambiarColorPrueba($consp75['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp75['MDaaS'] == 0) {
            $Prueba75 = $consp75['MDaaSStatus2'] ? cambiarColorPrueba($consp75['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp75['RackTest'] == 0) {
            $Prueba75 = $consp75['RackTestStatus2'] ? cambiarColorPrueba($consp75['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp75['FTI'] == 0) {
            $Prueba75 = $consp75['FTIStatus2'] ? cambiarColorPrueba($consp75['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp75['BSL'] == 0) {
            $Prueba75 = $consp75['BSLStatus2'] ? cambiarColorPrueba($consp75['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp75['CTS'] == 0) {
            $Prueba75 = $consp75['CTSStatus2'] ? cambiarColorPrueba($consp75['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp75['Packing'] == 0) {
            $Prueba75 = $consp75['PackingStatus2'] ? cambiarColorPrueba($consp75['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr76['Modelo'] == "Microsoft 8.2" || $contr76['Modelo'] == "Microsoft 8.3" || $contr76['Modelo'] == "NPI") {
    if ($consp76 = mysqli_fetch_array($conp76)) {
        if ($consp76['FTO'] == 0) {
            $Prueba76 = $consp76['FTOStatus2'] ? cambiarColorPrueba($consp76['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp76['QuickTest'] == 0) {
            $Prueba76 = $consp76['QuickTestStatus2'] ? cambiarColorPrueba($consp76['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp76['Stress'] == 0) {
            $Prueba76 = $consp76['StressStatus2'] ? cambiarColorPrueba($consp76['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp76['MDaaS'] == 0) {
            $Prueba76 = $consp76['MDaaSStatus2'] ? cambiarColorPrueba($consp76['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp76['RackTest'] == 0) {
            $Prueba76 = $consp76['RackTestStatus2'] ? cambiarColorPrueba($consp76['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp76['FTI'] == 0) {
            $Prueba76 = $consp76['FTIStatus2'] ? cambiarColorPrueba($consp76['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp76['BSL'] == 0) {
            $Prueba76 = $consp76['BSLStatus2'] ? cambiarColorPrueba($consp76['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp76['CTS'] == 0) {
            $Prueba76 = $consp76['CTSStatus2'] ? cambiarColorPrueba($consp76['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp76['Packing'] == 0) {
            $Prueba76 = $consp76['PackingStatus2'] ? cambiarColorPrueba($consp76['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr77['Modelo'] == "Microsoft 8.2" || $contr77['Modelo'] == "Microsoft 8.3" || $contr77['Modelo'] == "NPI") {
    if ($consp77 = mysqli_fetch_array($conp77)) {
        if ($consp77['FTO'] == 0) {
            $Prueba77 = $consp77['FTOStatus2'] ? cambiarColorPrueba($consp77['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp77['QuickTest'] == 0) {
            $Prueba77 = $consp77['QuickTestStatus2'] ? cambiarColorPrueba($consp77['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp77['Stress'] == 0) {
            $Prueba77 = $consp77['StressStatus2'] ? cambiarColorPrueba($consp77['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp77['MDaaS'] == 0) {
            $Prueba77 = $consp77['MDaaSStatus2'] ? cambiarColorPrueba($consp77['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp77['RackTest'] == 0) {
            $Prueba77 = $consp77['RackTestStatus2'] ? cambiarColorPrueba($consp77['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp77['FTI'] == 0) {
            $Prueba77 = $consp77['FTIStatus2'] ? cambiarColorPrueba($consp77['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp77['BSL'] == 0) {
            $Prueba77 = $consp77['BSLStatus2'] ? cambiarColorPrueba($consp77['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp77['CTS'] == 0) {
            $Prueba77 = $consp77['CTSStatus2'] ? cambiarColorPrueba($consp77['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp77['Packing'] == 0) {
            $Prueba77 = $consp77['PackingStatus2'] ? cambiarColorPrueba($consp77['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr78['Modelo'] == "Microsoft 8.2" || $contr78['Modelo'] == "Microsoft 8.3" || $contr78['Modelo'] == "NPI") {
    if ($consp78 = mysqli_fetch_array($conp78)) {
        if ($consp78['FTO'] == 0) {
            $Prueba78 = $consp78['FTOStatus2'] ? cambiarColorPrueba($consp78['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp78['QuickTest'] == 0) {
            $Prueba78 = $consp78['QuickTestStatus2'] ? cambiarColorPrueba($consp78['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp78['Stress'] == 0) {
            $Prueba78 = $consp78['StressStatus2'] ? cambiarColorPrueba($consp78['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp78['MDaaS'] == 0) {
            $Prueba78 = $consp78['MDaaSStatus2'] ? cambiarColorPrueba($consp78['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp78['RackTest'] == 0) {
            $Prueba78 = $consp78['RackTestStatus2'] ? cambiarColorPrueba($consp78['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp78['FTI'] == 0) {
            $Prueba78 = $consp78['FTIStatus2'] ? cambiarColorPrueba($consp78['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp78['BSL'] == 0) {
            $Prueba78 = $consp78['BSLStatus2'] ? cambiarColorPrueba($consp78['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp78['CTS'] == 0) {
            $Prueba78 = $consp78['CTSStatus2'] ? cambiarColorPrueba($consp78['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp78['Packing'] == 0) {
            $Prueba78 = $consp78['PackingStatus2'] ? cambiarColorPrueba($consp78['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr79['Modelo'] == "Microsoft 8.2" || $contr79['Modelo'] == "Microsoft 8.3" || $contr79['Modelo'] == "NPI") {
    if ($consp79 = mysqli_fetch_array($conp79)) {
        if ($consp79['FTO'] == 0) {
            $Prueba79 = $consp79['FTOStatus2'] ? cambiarColorPrueba($consp79['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp79['QuickTest'] == 0) {
            $Prueba79 = $consp79['QuickTestStatus2'] ? cambiarColorPrueba($consp79['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp79['Stress'] == 0) {
            $Prueba79 = $consp79['StressStatus2'] ? cambiarColorPrueba($consp79['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp79['MDaaS'] == 0) {
            $Prueba79 = $consp79['MDaaSStatus2'] ? cambiarColorPrueba($consp79['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp79['RackTest'] == 0) {
            $Prueba79 = $consp79['RackTestStatus2'] ? cambiarColorPrueba($consp79['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp79['FTI'] == 0) {
            $Prueba79 = $consp79['FTIStatus2'] ? cambiarColorPrueba($consp79['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp79['BSL'] == 0) {
            $Prueba79 = $consp79['BSLStatus2'] ? cambiarColorPrueba($consp79['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp79['CTS'] == 0) {
            $Prueba79 = $consp79['CTSStatus2'] ? cambiarColorPrueba($consp79['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp79['Packing'] == 0) {
            $Prueba79 = $consp79['PackingStatus2'] ? cambiarColorPrueba($consp79['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr80['Modelo'] == "Microsoft 8.2" || $contr80['Modelo'] == "Microsoft 8.3" || $contr80['Modelo'] == "NPI") {
    if ($consp80 = mysqli_fetch_array($conp80)) {
        if ($consp80['FTO'] == 0) {
            $Prueba80 = $consp80['FTOStatus2'] ? cambiarColorPrueba($consp80['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp80['QuickTest'] == 0) {
            $Prueba80 = $consp80['QuickTestStatus2'] ? cambiarColorPrueba($consp80['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp80['Stress'] == 0) {
            $Prueba80 = $consp80['StressStatus2'] ? cambiarColorPrueba($consp80['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp80['MDaaS'] == 0) {
            $Prueba80 = $consp80['MDaaSStatus2'] ? cambiarColorPrueba($consp80['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp80['RackTest'] == 0) {
            $Prueba80 = $consp80['RackTestStatus2'] ? cambiarColorPrueba($consp80['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp80['FTI'] == 0) {
            $Prueba80 = $consp80['FTIStatus2'] ? cambiarColorPrueba($consp80['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp80['BSL'] == 0) {
            $Prueba80 = $consp80['BSLStatus2'] ? cambiarColorPrueba($consp80['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp80['CTS'] == 0) {
            $Prueba80 = $consp80['CTSStatus2'] ? cambiarColorPrueba($consp80['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp80['Packing'] == 0) {
            $Prueba80 = $consp80['PackingStatus2'] ? cambiarColorPrueba($consp80['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>
