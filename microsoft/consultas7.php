<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1".	*/



$constr61=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-61'");
if($contr61=mysqli_fetch_array($constr61)){$NoSerie61=$contr61['NoSerie'];} else {$NoSerie61="Disponible";}

$constr62=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-62'");
if($contr62=mysqli_fetch_array($constr62)){$NoSerie62=$contr62['NoSerie'];} else {$NoSerie62="Disponible";}

$constr63=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-63'");
if($contr63=mysqli_fetch_array($constr63)){$NoSerie63=$contr63['NoSerie'];} else {$NoSerie63="Disponible";}

$constr64=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-64'");
if($contr64=mysqli_fetch_array($constr64)){$NoSerie64=$contr64['NoSerie'];} else {$NoSerie64="Disponible";}

$constr65=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-65'");
if($contr65=mysqli_fetch_array($constr65)){$NoSerie65=$contr65['NoSerie'];} else {$NoSerie65="Disponible";}

$constr66=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-66'");
if($contr66=mysqli_fetch_array($constr66)){$NoSerie66=$contr66['NoSerie'];} else {$NoSerie66="Disponible";}

$constr67=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-67'");
if($contr67=mysqli_fetch_array($constr67)){$NoSerie67=$contr67['NoSerie'];} else {$NoSerie67="Disponible";}

$constr68=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-68'");
if($contr68=mysqli_fetch_array($constr68)){$NoSerie68=$contr68['NoSerie'];} else {$NoSerie68="Disponible";}

$constr69=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-69'");
if($contr69=mysqli_fetch_array($constr69)){$NoSerie69=$contr69['NoSerie'];} else {$NoSerie69="Disponible";}

$constr70=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR07-70'");
if($contr70=mysqli_fetch_array($constr70)){$NoSerie70=$contr70['NoSerie'];} else {$NoSerie70="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					 $Prueba61="&nbsp;"; $Prueba62="&nbsp;"; $Prueba63="&nbsp;"; $Prueba64="&nbsp;";
					$Prueba65="&nbsp;"; $Prueba66="&nbsp;"; $Prueba67="&nbsp;"; $Prueba68="&nbsp;"; $Prueba69="&nbsp;"; $Prueba70="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/



if($contr61['Modelo']=="Microsoft 8.2" || $contr61['Modelo']=="Microsoft 8.3" || $contr61['Modelo']=="NPI"){$conp61=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie61'");}
if($contr62['Modelo']=="Microsoft 8.2" || $contr62['Modelo']=="Microsoft 8.3" || $contr62['Modelo']=="NPI"){$conp62=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie62'");}
if($contr63['Modelo']=="Microsoft 8.2" || $contr63['Modelo']=="Microsoft 8.3" || $contr63['Modelo']=="NPI"){$conp63=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie63'");}
if($contr64['Modelo']=="Microsoft 8.2" || $contr64['Modelo']=="Microsoft 8.3" || $contr64['Modelo']=="NPI"){$conp64=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie64'");}
if($contr65['Modelo']=="Microsoft 8.2" || $contr65['Modelo']=="Microsoft 8.3" || $contr65['Modelo']=="NPI"){$conp65=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie65'");}
if($contr66['Modelo']=="Microsoft 8.2" || $contr66['Modelo']=="Microsoft 8.3" || $contr66['Modelo']=="NPI"){$conp66=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie66'");}
if($contr67['Modelo']=="Microsoft 8.2" || $contr67['Modelo']=="Microsoft 8.3" || $contr67['Modelo']=="NPI"){$conp67=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie67'");}
if($contr68['Modelo']=="Microsoft 8.2" || $contr68['Modelo']=="Microsoft 8.3" || $contr68['Modelo']=="NPI"){$conp68=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie68'");}
if($contr69['Modelo']=="Microsoft 8.2" || $contr69['Modelo']=="Microsoft 8.3" || $contr69['Modelo']=="NPI"){$conp69=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie69'");}
if($contr70['Modelo']=="Microsoft 8.2" || $contr70['Modelo']=="Microsoft 8.3" || $contr70['Modelo']=="NPI"){$conp70=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie70'");}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr61['Modelo'] == "Microsoft 8.2" || $contr61['Modelo'] == "Microsoft 8.3" || $contr61['Modelo'] == "NPI") {
    if ($consp61 = mysqli_fetch_array($conp61)) {
        if ($consp61['FTO'] == 0) {
            $Prueba61 = $consp61['FTOStatus2'] ? cambiarColorPrueba($consp61['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp61['QuickTest'] == 0) {
            $Prueba61 = $consp61['QuickTestStatus2'] ? cambiarColorPrueba($consp61['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp61['Stress'] == 0) {
            $Prueba61 = $consp61['StressStatus2'] ? cambiarColorPrueba($consp61['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp61['MDaaS'] == 0) {
            $Prueba61 = $consp61['MDaaSStatus2'] ? cambiarColorPrueba($consp61['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp61['RackTest'] == 0) {
            $Prueba61 = $consp61['RackTestStatus2'] ? cambiarColorPrueba($consp61['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp61['FTI'] == 0) {
            $Prueba61 = $consp61['FTIStatus2'] ? cambiarColorPrueba($consp61['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp61['BSL'] == 0) {
            $Prueba61 = $consp61['BSLStatus2'] ? cambiarColorPrueba($consp61['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp61['CTS'] == 0) {
            $Prueba61 = $consp61['CTSStatus2'] ? cambiarColorPrueba($consp61['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp61['Packing'] == 0) {
            $Prueba61 = $consp61['PackingStatus2'] ? cambiarColorPrueba($consp61['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr62['Modelo'] == "Microsoft 8.2" || $contr62['Modelo'] == "Microsoft 8.3" || $contr62['Modelo'] == "NPI") {
    if ($consp62 = mysqli_fetch_array($conp62)) {
        if ($consp62['FTO'] == 0) {
            $Prueba62 = $consp62['FTOStatus2'] ? cambiarColorPrueba($consp62['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp62['QuickTest'] == 0) {
            $Prueba62 = $consp62['QuickTestStatus2'] ? cambiarColorPrueba($consp62['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp62['Stress'] == 0) {
            $Prueba62 = $consp62['StressStatus2'] ? cambiarColorPrueba($consp62['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp62['MDaaS'] == 0) {
            $Prueba62 = $consp62['MDaaSStatus2'] ? cambiarColorPrueba($consp62['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp62['RackTest'] == 0) {
            $Prueba62 = $consp62['RackTestStatus2'] ? cambiarColorPrueba($consp62['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp62['FTI'] == 0) {
            $Prueba62 = $consp62['FTIStatus2'] ? cambiarColorPrueba($consp62['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp62['BSL'] == 0) {
            $Prueba62 = $consp62['BSLStatus2'] ? cambiarColorPrueba($consp62['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp62['CTS'] == 0) {
            $Prueba62 = $consp62['CTSStatus2'] ? cambiarColorPrueba($consp62['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp62['Packing'] == 0) {
            $Prueba62 = $consp62['PackingStatus2'] ? cambiarColorPrueba($consp62['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*----------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr63['Modelo'] == "Microsoft 8.2" || $contr63['Modelo'] == "Microsoft 8.3" || $contr63['Modelo'] == "NPI") {
    if ($consp63 = mysqli_fetch_array($conp63)) {
        if ($consp63['FTO'] == 0) {
            $Prueba63 = $consp63['FTOStatus2'] ? cambiarColorPrueba($consp63['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp63['QuickTest'] == 0) {
            $Prueba63 = $consp63['QuickTestStatus2'] ? cambiarColorPrueba($consp63['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp63['Stress'] == 0) {
            $Prueba63 = $consp63['StressStatus2'] ? cambiarColorPrueba($consp63['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp63['MDaaS'] == 0) {
            $Prueba63 = $consp63['MDaaSStatus2'] ? cambiarColorPrueba($consp63['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp63['RackTest'] == 0) {
            $Prueba63 = $consp63['RackTestStatus2'] ? cambiarColorPrueba($consp63['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp63['FTI'] == 0) {
            $Prueba63 = $consp63['FTIStatus2'] ? cambiarColorPrueba($consp63['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp63['BSL'] == 0) {
            $Prueba63 = $consp63['BSLStatus2'] ? cambiarColorPrueba($consp63['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp63['CTS'] == 0) {
            $Prueba63 = $consp63['CTSStatus2'] ? cambiarColorPrueba($consp63['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp63['Packing'] == 0) {
            $Prueba63 = $consp63['PackingStatus2'] ? cambiarColorPrueba($consp63['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr64['Modelo'] == "Microsoft 8.2" || $contr64['Modelo'] == "Microsoft 8.3" || $contr64['Modelo'] == "NPI") {
    if ($consp64 = mysqli_fetch_array($conp64)) {
        if ($consp64['FTO'] == 0) {
            $Prueba64 = $consp64['FTOStatus2'] ? cambiarColorPrueba($consp64['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp64['QuickTest'] == 0) {
            $Prueba64 = $consp64['QuickTestStatus2'] ? cambiarColorPrueba($consp64['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp64['Stress'] == 0) {
            $Prueba64 = $consp64['StressStatus2'] ? cambiarColorPrueba($consp64['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp64['MDaaS'] == 0) {
            $Prueba64 = $consp64['MDaaSStatus2'] ? cambiarColorPrueba($consp64['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp64['RackTest'] == 0) {
            $Prueba64 = $consp64['RackTestStatus2'] ? cambiarColorPrueba($consp64['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp64['FTI'] == 0) {
            $Prueba64 = $consp64['FTIStatus2'] ? cambiarColorPrueba($consp64['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp64['BSL'] == 0) {
            $Prueba64 = $consp64['BSLStatus2'] ? cambiarColorPrueba($consp64['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp64['CTS'] == 0) {
            $Prueba64 = $consp64['CTSStatus2'] ? cambiarColorPrueba($consp64['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp64['Packing'] == 0) {
            $Prueba64 = $consp64['PackingStatus2'] ? cambiarColorPrueba($consp64['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr65['Modelo'] == "Microsoft 8.2" || $contr65['Modelo'] == "Microsoft 8.3" || $contr65['Modelo'] == "NPI") {
    if ($consp65 = mysqli_fetch_array($conp65)) {
        if ($consp65['FTO'] == 0) {
            $Prueba65 = $consp65['FTOStatus2'] ? cambiarColorPrueba($consp65['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp65['QuickTest'] == 0) {
            $Prueba65 = $consp65['QuickTestStatus2'] ? cambiarColorPrueba($consp65['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp65['Stress'] == 0) {
            $Prueba65 = $consp65['StressStatus2'] ? cambiarColorPrueba($consp65['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp65['MDaaS'] == 0) {
            $Prueba65 = $consp65['MDaaSStatus2'] ? cambiarColorPrueba($consp65['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp65['RackTest'] == 0) {
            $Prueba65 = $consp65['RackTestStatus2'] ? cambiarColorPrueba($consp65['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp65['FTI'] == 0) {
            $Prueba65 = $consp65['FTIStatus2'] ? cambiarColorPrueba($consp65['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp65['BSL'] == 0) {
            $Prueba65 = $consp65['BSLStatus2'] ? cambiarColorPrueba($consp65['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp65['CTS'] == 0) {
            $Prueba65 = $consp65['CTSStatus2'] ? cambiarColorPrueba($consp65['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp65['Packing'] == 0) {
            $Prueba65 = $consp65['PackingStatus2'] ? cambiarColorPrueba($consp65['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr66['Modelo'] == "Microsoft 8.2" || $contr66['Modelo'] == "Microsoft 8.3" || $contr66['Modelo'] == "NPI") {
    if ($consp66 = mysqli_fetch_array($conp66)) {
        if ($consp66['FTO'] == 0) {
            $Prueba66 = $consp66['FTOStatus2'] ? cambiarColorPrueba($consp66['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp66['QuickTest'] == 0) {
            $Prueba66 = $consp66['QuickTestStatus2'] ? cambiarColorPrueba($consp66['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp66['Stress'] == 0) {
            $Prueba66 = $consp66['StressStatus2'] ? cambiarColorPrueba($consp66['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp66['MDaaS'] == 0) {
            $Prueba66 = $consp66['MDaaSStatus2'] ? cambiarColorPrueba($consp66['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp66['RackTest'] == 0) {
            $Prueba66 = $consp66['RackTestStatus2'] ? cambiarColorPrueba($consp66['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp66['FTI'] == 0) {
            $Prueba66 = $consp66['FTIStatus2'] ? cambiarColorPrueba($consp66['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp66['BSL'] == 0) {
            $Prueba66 = $consp66['BSLStatus2'] ? cambiarColorPrueba($consp66['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp66['CTS'] == 0) {
            $Prueba66 = $consp66['CTSStatus2'] ? cambiarColorPrueba($consp66['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp66['Packing'] == 0) {
            $Prueba66 = $consp66['PackingStatus2'] ? cambiarColorPrueba($consp66['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr67['Modelo'] == "Microsoft 8.2" || $contr67['Modelo'] == "Microsoft 8.3" || $contr67['Modelo'] == "NPI") {
    if ($consp67 = mysqli_fetch_array($conp67)) {
        if ($consp67['FTO'] == 0) {
            $Prueba67 = $consp67['FTOStatus2'] ? cambiarColorPrueba($consp67['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp67['QuickTest'] == 0) {
            $Prueba67 = $consp67['QuickTestStatus2'] ? cambiarColorPrueba($consp67['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp67['Stress'] == 0) {
            $Prueba67 = $consp67['StressStatus2'] ? cambiarColorPrueba($consp67['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp67['MDaaS'] == 0) {
            $Prueba67 = $consp67['MDaaSStatus2'] ? cambiarColorPrueba($consp67['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp67['RackTest'] == 0) {
            $Prueba67 = $consp67['RackTestStatus2'] ? cambiarColorPrueba($consp67['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp67['FTI'] == 0) {
            $Prueba67 = $consp67['FTIStatus2'] ? cambiarColorPrueba($consp67['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp67['BSL'] == 0) {
            $Prueba67 = $consp67['BSLStatus2'] ? cambiarColorPrueba($consp67['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp67['CTS'] == 0) {
            $Prueba67 = $consp67['CTSStatus2'] ? cambiarColorPrueba($consp67['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp67['Packing'] == 0) {
            $Prueba67 = $consp67['PackingStatus2'] ? cambiarColorPrueba($consp67['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr68['Modelo'] == "Microsoft 8.2" || $contr68['Modelo'] == "Microsoft 8.3" || $contr68['Modelo'] == "NPI") {
    if ($consp68 = mysqli_fetch_array($conp68)) {
        if ($consp68['FTO'] == 0) {
            $Prueba68 = $consp68['FTOStatus2'] ? cambiarColorPrueba($consp68['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp68['QuickTest'] == 0) {
            $Prueba68 = $consp68['QuickTestStatus2'] ? cambiarColorPrueba($consp68['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp68['Stress'] == 0) {
            $Prueba68 = $consp68['StressStatus2'] ? cambiarColorPrueba($consp68['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp68['MDaaS'] == 0) {
            $Prueba68 = $consp68['MDaaSStatus2'] ? cambiarColorPrueba($consp68['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp68['RackTest'] == 0) {
            $Prueba68 = $consp68['RackTestStatus2'] ? cambiarColorPrueba($consp68['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp68['FTI'] == 0) {
            $Prueba68 = $consp68['FTIStatus2'] ? cambiarColorPrueba($consp68['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp68['BSL'] == 0) {
            $Prueba68 = $consp68['BSLStatus2'] ? cambiarColorPrueba($consp68['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp68['CTS'] == 0) {
            $Prueba68 = $consp68['CTSStatus2'] ? cambiarColorPrueba($consp68['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp68['Packing'] == 0) {
            $Prueba68 = $consp68['PackingStatus2'] ? cambiarColorPrueba($consp68['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr69['Modelo'] == "Microsoft 8.2" || $contr69['Modelo'] == "Microsoft 8.3" || $contr69['Modelo'] == "NPI") {
    if ($consp69 = mysqli_fetch_array($conp69)) {
        if ($consp69['FTO'] == 0) {
            $Prueba69 = $consp69['FTOStatus2'] ? cambiarColorPrueba($consp69['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp69['QuickTest'] == 0) {
            $Prueba69 = $consp69['QuickTestStatus2'] ? cambiarColorPrueba($consp69['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp69['Stress'] == 0) {
            $Prueba69 = $consp69['StressStatus2'] ? cambiarColorPrueba($consp69['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp69['MDaaS'] == 0) {
            $Prueba69 = $consp69['MDaaSStatus2'] ? cambiarColorPrueba($consp69['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp69['RackTest'] == 0) {
            $Prueba69 = $consp69['RackTestStatus2'] ? cambiarColorPrueba($consp69['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp69['FTI'] == 0) {
            $Prueba69 = $consp69['FTIStatus2'] ? cambiarColorPrueba($consp69['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp69['BSL'] == 0) {
            $Prueba69 = $consp69['BSLStatus2'] ? cambiarColorPrueba($consp69['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp69['CTS'] == 0) {
            $Prueba69 = $consp69['CTSStatus2'] ? cambiarColorPrueba($consp69['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp69['Packing'] == 0) {
            $Prueba69 = $consp69['PackingStatus2'] ? cambiarColorPrueba($consp69['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr70['Modelo'] == "Microsoft 8.2" || $contr70['Modelo'] == "Microsoft 8.3" || $contr70['Modelo'] == "NPI") {
    if ($consp70 = mysqli_fetch_array($conp70)) {
        if ($consp70['FTO'] == 0) {
            $Prueba70 = $consp70['FTOStatus2'] ? cambiarColorPrueba($consp70['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp70['QuickTest'] == 0) {
            $Prueba70 = $consp70['QuickTestStatus2'] ? cambiarColorPrueba($consp70['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp70['Stress'] == 0) {
            $Prueba70 = $consp70['StressStatus2'] ? cambiarColorPrueba($consp70['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp70['MDaaS'] == 0) {
            $Prueba70 = $consp70['MDaaSStatus2'] ? cambiarColorPrueba($consp70['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp70['RackTest'] == 0) {
            $Prueba70 = $consp70['RackTestStatus2'] ? cambiarColorPrueba($consp70['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp70['FTI'] == 0) {
            $Prueba70 = $consp70['FTIStatus2'] ? cambiarColorPrueba($consp70['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp70['BSL'] == 0) {
            $Prueba70 = $consp70['BSLStatus2'] ? cambiarColorPrueba($consp70['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp70['CTS'] == 0) {
            $Prueba70 = $consp70['CTSStatus2'] ? cambiarColorPrueba($consp70['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp70['Packing'] == 0) {
            $Prueba70 = $consp70['PackingStatus2'] ? cambiarColorPrueba($consp70['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>
