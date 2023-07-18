<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1".	*/



$constr81=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-81'");
if($contr81=mysqli_fetch_array($constr81)){$NoSerie81=$contr81['NoSerie'];} else {$NoSerie81="Disponible";}

$constr82=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-82'");
if($contr82=mysqli_fetch_array($constr82)){$NoSerie82=$contr82['NoSerie'];} else {$NoSerie82="Disponible";}

$constr83=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-83'");
if($contr83=mysqli_fetch_array($constr83)){$NoSerie83=$contr83['NoSerie'];} else {$NoSerie83="Disponible";}

$constr84=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-84'");
if($contr84=mysqli_fetch_array($constr84)){$NoSerie84=$contr84['NoSerie'];} else {$NoSerie84="Disponible";}

$constr85=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-85'");
if($contr85=mysqli_fetch_array($constr85)){$NoSerie85=$contr85['NoSerie'];} else {$NoSerie85="Disponible";}

$constr86=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-86'");
if($contr86=mysqli_fetch_array($constr86)){$NoSerie86=$contr86['NoSerie'];} else {$NoSerie86="Disponible";}

$constr87=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-87'");
if($contr87=mysqli_fetch_array($constr87)){$NoSerie87=$contr87['NoSerie'];} else {$NoSerie87="Disponible";}

$constr88=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-88'");
if($contr88=mysqli_fetch_array($constr88)){$NoSerie88=$contr88['NoSerie'];} else {$NoSerie88="Disponible";}

$constr89=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-89'");
if($contr89=mysqli_fetch_array($constr89)){$NoSerie89=$contr89['NoSerie'];} else {$NoSerie89="Disponible";}

$constr90=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR09-90'");
if($contr90=mysqli_fetch_array($constr90)){$NoSerie90=$contr90['NoSerie'];} else {$NoSerie90="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					 $Prueba81="&nbsp;"; $Prueba82="&nbsp;"; $Prueba83="&nbsp;"; $Prueba84="&nbsp;";
					$Prueba85="&nbsp;"; $Prueba86="&nbsp;"; $Prueba87="&nbsp;"; $Prueba88="&nbsp;"; $Prueba89="&nbsp;"; $Prueba90="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/



if($contr81['Modelo']=="Microsoft 8.2" || $contr81['Modelo']=="Microsoft 8.3" || $contr81['Modelo']=="NPI"){$conp81=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie81'");}
if($contr82['Modelo']=="Microsoft 8.2" || $contr82['Modelo']=="Microsoft 8.3" || $contr82['Modelo']=="NPI"){$conp82=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie82'");}
if($contr83['Modelo']=="Microsoft 8.2" || $contr83['Modelo']=="Microsoft 8.3" || $contr83['Modelo']=="NPI"){$conp83=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie83'");}
if($contr84['Modelo']=="Microsoft 8.2" || $contr84['Modelo']=="Microsoft 8.3" || $contr84['Modelo']=="NPI"){$conp84=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie84'");}
if($contr85['Modelo']=="Microsoft 8.2" || $contr85['Modelo']=="Microsoft 8.3" || $contr85['Modelo']=="NPI"){$conp85=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie85'");}
if($contr86['Modelo']=="Microsoft 8.2" || $contr86['Modelo']=="Microsoft 8.3" || $contr86['Modelo']=="NPI"){$conp86=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie86'");}
if($contr87['Modelo']=="Microsoft 8.2" || $contr87['Modelo']=="Microsoft 8.3" || $contr87['Modelo']=="NPI"){$conp87=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie87'");}
if($contr88['Modelo']=="Microsoft 8.2" || $contr88['Modelo']=="Microsoft 8.3" || $contr88['Modelo']=="NPI"){$conp88=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie88'");}
if($contr89['Modelo']=="Microsoft 8.2" || $contr89['Modelo']=="Microsoft 8.3" || $contr89['Modelo']=="NPI"){$conp89=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie89'");}
if($contr90['Modelo']=="Microsoft 8.2" || $contr90['Modelo']=="Microsoft 8.3" || $contr90['Modelo']=="NPI"){$conp90=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie90'");}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr81['Modelo'] == "Microsoft 8.2" || $contr81['Modelo'] == "Microsoft 8.3" || $contr81['Modelo'] == "NPI") {
    if ($consp81 = mysqli_fetch_array($conp81)) {
        if ($consp81['FTO'] == 0) {
            $Prueba81 = $consp81['FTOStatus2'] ? cambiarColorPrueba($consp81['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp81['QuickTest'] == 0) {
            $Prueba81 = $consp81['QuickTestStatus2'] ? cambiarColorPrueba($consp81['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp81['Stress'] == 0) {
            $Prueba81 = $consp81['StressStatus2'] ? cambiarColorPrueba($consp81['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp81['MDaaS'] == 0) {
            $Prueba81 = $consp81['MDaaSStatus2'] ? cambiarColorPrueba($consp81['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp81['RackTest'] == 0) {
            $Prueba81 = $consp81['RackTestStatus2'] ? cambiarColorPrueba($consp81['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp81['FTI'] == 0) {
            $Prueba81 = $consp81['FTIStatus2'] ? cambiarColorPrueba($consp81['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp81['BSL'] == 0) {
            $Prueba81 = $consp81['BSLStatus2'] ? cambiarColorPrueba($consp81['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp81['CTS'] == 0) {
            $Prueba81 = $consp81['CTSStatus2'] ? cambiarColorPrueba($consp81['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp81['Packing'] == 0) {
            $Prueba81 = $consp81['PackingStatus2'] ? cambiarColorPrueba($consp81['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr82['Modelo'] == "Microsoft 8.2" || $contr82['Modelo'] == "Microsoft 8.3" || $contr82['Modelo'] == "NPI") {
    if ($consp82 = mysqli_fetch_array($conp82)) {
        if ($consp82['FTO'] == 0) {
            $Prueba82 = $consp82['FTOStatus2'] ? cambiarColorPrueba($consp82['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp82['QuickTest'] == 0) {
            $Prueba82 = $consp82['QuickTestStatus2'] ? cambiarColorPrueba($consp82['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp82['Stress'] == 0) {
            $Prueba82 = $consp82['StressStatus2'] ? cambiarColorPrueba($consp82['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp82['MDaaS'] == 0) {
            $Prueba82 = $consp82['MDaaSStatus2'] ? cambiarColorPrueba($consp82['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp82['RackTest'] == 0) {
            $Prueba82 = $consp82['RackTestStatus2'] ? cambiarColorPrueba($consp82['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp82['FTI'] == 0) {
            $Prueba82 = $consp82['FTIStatus2'] ? cambiarColorPrueba($consp82['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp82['BSL'] == 0) {
            $Prueba82 = $consp82['BSLStatus2'] ? cambiarColorPrueba($consp82['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp82['CTS'] == 0) {
            $Prueba82 = $consp82['CTSStatus2'] ? cambiarColorPrueba($consp82['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp82['Packing'] == 0) {
            $Prueba82 = $consp82['PackingStatus2'] ? cambiarColorPrueba($consp82['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr83['Modelo'] == "Microsoft 8.2" || $contr83['Modelo'] == "Microsoft 8.3" || $contr83['Modelo'] == "NPI") {
    if ($consp83 = mysqli_fetch_array($conp83)) {
        if ($consp83['FTO'] == 0) {
            $Prueba83 = $consp83['FTOStatus2'] ? cambiarColorPrueba($consp83['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp83['QuickTest'] == 0) {
            $Prueba83 = $consp83['QuickTestStatus2'] ? cambiarColorPrueba($consp83['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp83['Stress'] == 0) {
            $Prueba83 = $consp83['StressStatus2'] ? cambiarColorPrueba($consp83['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp83['MDaaS'] == 0) {
            $Prueba83 = $consp83['MDaaSStatus2'] ? cambiarColorPrueba($consp83['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp83['RackTest'] == 0) {
            $Prueba83 = $consp83['RackTestStatus2'] ? cambiarColorPrueba($consp83['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp83['FTI'] == 0) {
            $Prueba83 = $consp83['FTIStatus2'] ? cambiarColorPrueba($consp83['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp83['BSL'] == 0) {
            $Prueba83 = $consp83['BSLStatus2'] ? cambiarColorPrueba($consp83['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp83['CTS'] == 0) {
            $Prueba83 = $consp83['CTSStatus2'] ? cambiarColorPrueba($consp83['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp83['Packing'] == 0) {
            $Prueba83 = $consp83['PackingStatus2'] ? cambiarColorPrueba($consp83['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr84['Modelo'] == "Microsoft 8.2" || $contr84['Modelo'] == "Microsoft 8.3" || $contr84['Modelo'] == "NPI") {
    if ($consp84 = mysqli_fetch_array($conp84)) {
        if ($consp84['FTO'] == 0) {
            $Prueba84 = $consp84['FTOStatus2'] ? cambiarColorPrueba($consp84['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp84['QuickTest'] == 0) {
            $Prueba84 = $consp84['QuickTestStatus2'] ? cambiarColorPrueba($consp84['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp84['Stress'] == 0) {
            $Prueba84 = $consp84['StressStatus2'] ? cambiarColorPrueba($consp84['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp84['MDaaS'] == 0) {
            $Prueba84 = $consp84['MDaaSStatus2'] ? cambiarColorPrueba($consp84['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp84['RackTest'] == 0) {
            $Prueba84 = $consp84['RackTestStatus2'] ? cambiarColorPrueba($consp84['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp84['FTI'] == 0) {
            $Prueba84 = $consp84['FTIStatus2'] ? cambiarColorPrueba($consp84['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp84['BSL'] == 0) {
            $Prueba84 = $consp84['BSLStatus2'] ? cambiarColorPrueba($consp84['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp84['CTS'] == 0) {
            $Prueba84 = $consp84['CTSStatus2'] ? cambiarColorPrueba($consp84['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp84['Packing'] == 0) {
            $Prueba84 = $consp84['PackingStatus2'] ? cambiarColorPrueba($consp84['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr85['Modelo'] == "Microsoft 8.2" || $contr85['Modelo'] == "Microsoft 8.3" || $contr85['Modelo'] == "NPI") {
    if ($consp85 = mysqli_fetch_array($conp85)) {
        if ($consp85['FTO'] == 0) {
            $Prueba85 = $consp85['FTOStatus2'] ? cambiarColorPrueba($consp85['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp85['QuickTest'] == 0) {
            $Prueba85 = $consp85['QuickTestStatus2'] ? cambiarColorPrueba($consp85['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp85['Stress'] == 0) {
            $Prueba85 = $consp85['StressStatus2'] ? cambiarColorPrueba($consp85['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp85['MDaaS'] == 0) {
            $Prueba85 = $consp85['MDaaSStatus2'] ? cambiarColorPrueba($consp85['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp85['RackTest'] == 0) {
            $Prueba85 = $consp85['RackTestStatus2'] ? cambiarColorPrueba($consp85['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp85['FTI'] == 0) {
            $Prueba85 = $consp85['FTIStatus2'] ? cambiarColorPrueba($consp85['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp85['BSL'] == 0) {
            $Prueba85 = $consp85['BSLStatus2'] ? cambiarColorPrueba($consp85['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp85['CTS'] == 0) {
            $Prueba85 = $consp85['CTSStatus2'] ? cambiarColorPrueba($consp85['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp85['Packing'] == 0) {
            $Prueba85 = $consp85['PackingStatus2'] ? cambiarColorPrueba($consp85['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr86['Modelo'] == "Microsoft 8.2" || $contr86['Modelo'] == "Microsoft 8.3" || $contr86['Modelo'] == "NPI") {
    if ($consp86 = mysqli_fetch_array($conp86)) {
        if ($consp86['FTO'] == 0) {
            $Prueba86 = $consp86['FTOStatus2'] ? cambiarColorPrueba($consp86['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp86['QuickTest'] == 0) {
            $Prueba86 = $consp86['QuickTestStatus2'] ? cambiarColorPrueba($consp86['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp86['Stress'] == 0) {
            $Prueba86 = $consp86['StressStatus2'] ? cambiarColorPrueba($consp86['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp86['MDaaS'] == 0) {
            $Prueba86 = $consp86['MDaaSStatus2'] ? cambiarColorPrueba($consp86['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp86['RackTest'] == 0) {
            $Prueba86 = $consp86['RackTestStatus2'] ? cambiarColorPrueba($consp86['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp86['FTI'] == 0) {
            $Prueba86 = $consp86['FTIStatus2'] ? cambiarColorPrueba($consp86['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp86['BSL'] == 0) {
            $Prueba86 = $consp86['BSLStatus2'] ? cambiarColorPrueba($consp86['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp86['CTS'] == 0) {
            $Prueba86 = $consp86['CTSStatus2'] ? cambiarColorPrueba($consp86['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp86['Packing'] == 0) {
            $Prueba86 = $consp86['PackingStatus2'] ? cambiarColorPrueba($consp86['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr87['Modelo'] == "Microsoft 8.2" || $contr87['Modelo'] == "Microsoft 8.3" || $contr87['Modelo'] == "NPI") {
    if ($consp87 = mysqli_fetch_array($conp87)) {
        if ($consp87['FTO'] == 0) {
            $Prueba87 = $consp87['FTOStatus2'] ? cambiarColorPrueba($consp87['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp87['QuickTest'] == 0) {
            $Prueba87 = $consp87['QuickTestStatus2'] ? cambiarColorPrueba($consp87['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp87['Stress'] == 0) {
            $Prueba87 = $consp87['StressStatus2'] ? cambiarColorPrueba($consp87['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp87['MDaaS'] == 0) {
            $Prueba87 = $consp87['MDaaSStatus2'] ? cambiarColorPrueba($consp87['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp87['RackTest'] == 0) {
            $Prueba87 = $consp87['RackTestStatus2'] ? cambiarColorPrueba($consp87['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp87['FTI'] == 0) {
            $Prueba87 = $consp87['FTIStatus2'] ? cambiarColorPrueba($consp87['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp87['BSL'] == 0) {
            $Prueba87 = $consp87['BSLStatus2'] ? cambiarColorPrueba($consp87['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp87['CTS'] == 0) {
            $Prueba87 = $consp87['CTSStatus2'] ? cambiarColorPrueba($consp87['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp87['Packing'] == 0) {
            $Prueba87 = $consp87['PackingStatus2'] ? cambiarColorPrueba($consp87['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr88['Modelo'] == "Microsoft 8.2" || $contr88['Modelo'] == "Microsoft 8.3" || $contr88['Modelo'] == "NPI") {
    if ($consp88 = mysqli_fetch_array($conp88)) {
        if ($consp88['FTO'] == 0) {
            $Prueba88 = $consp88['FTOStatus2'] ? cambiarColorPrueba($consp88['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp88['QuickTest'] == 0) {
            $Prueba88 = $consp88['QuickTestStatus2'] ? cambiarColorPrueba($consp88['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp88['Stress'] == 0) {
            $Prueba88 = $consp88['StressStatus2'] ? cambiarColorPrueba($consp88['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp88['MDaaS'] == 0) {
            $Prueba88 = $consp88['MDaaSStatus2'] ? cambiarColorPrueba($consp88['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp88['RackTest'] == 0) {
            $Prueba88 = $consp88['RackTestStatus2'] ? cambiarColorPrueba($consp88['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp88['FTI'] == 0) {
            $Prueba88 = $consp88['FTIStatus2'] ? cambiarColorPrueba($consp88['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp88['BSL'] == 0) {
            $Prueba88 = $consp88['BSLStatus2'] ? cambiarColorPrueba($consp88['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp88['CTS'] == 0) {
            $Prueba88 = $consp88['CTSStatus2'] ? cambiarColorPrueba($consp88['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp88['Packing'] == 0) {
            $Prueba88 = $consp88['PackingStatus2'] ? cambiarColorPrueba($consp88['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr89['Modelo'] == "Microsoft 8.2" || $contr89['Modelo'] == "Microsoft 8.3" || $contr89['Modelo'] == "NPI") {
    if ($consp89 = mysqli_fetch_array($conp89)) {
        if ($consp89['FTO'] == 0) {
            $Prueba89 = $consp89['FTOStatus2'] ? cambiarColorPrueba($consp89['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp89['QuickTest'] == 0) {
            $Prueba89 = $consp89['QuickTestStatus2'] ? cambiarColorPrueba($consp89['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp89['Stress'] == 0) {
            $Prueba89 = $consp89['StressStatus2'] ? cambiarColorPrueba($consp89['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp89['MDaaS'] == 0) {
            $Prueba89 = $consp89['MDaaSStatus2'] ? cambiarColorPrueba($consp89['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp89['RackTest'] == 0) {
            $Prueba89 = $consp89['RackTestStatus2'] ? cambiarColorPrueba($consp89['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp89['FTI'] == 0) {
            $Prueba89 = $consp89['FTIStatus2'] ? cambiarColorPrueba($consp89['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp89['BSL'] == 0) {
            $Prueba89 = $consp89['BSLStatus2'] ? cambiarColorPrueba($consp89['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp89['CTS'] == 0) {
            $Prueba89 = $consp89['CTSStatus2'] ? cambiarColorPrueba($consp89['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp89['Packing'] == 0) {
            $Prueba89 = $consp89['PackingStatus2'] ? cambiarColorPrueba($consp89['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr90['Modelo'] == "Microsoft 8.2" || $contr90['Modelo'] == "Microsoft 8.3" || $contr90['Modelo'] == "NPI") {
    if ($consp90 = mysqli_fetch_array($conp90)) {
        if ($consp90['FTO'] == 0) {
            $Prueba90 = $consp90['FTOStatus2'] ? cambiarColorPrueba($consp90['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp90['QuickTest'] == 0) {
            $Prueba90 = $consp90['QuickTestStatus2'] ? cambiarColorPrueba($consp90['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp90['Stress'] == 0) {
            $Prueba90 = $consp90['StressStatus2'] ? cambiarColorPrueba($consp90['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp90['MDaaS'] == 0) {
            $Prueba90 = $consp90['MDaaSStatus2'] ? cambiarColorPrueba($consp90['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp90['RackTest'] == 0) {
            $Prueba90 = $consp90['RackTestStatus2'] ? cambiarColorPrueba($consp90['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp90['FTI'] == 0) {
            $Prueba90 = $consp90['FTIStatus2'] ? cambiarColorPrueba($consp90['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp90['BSL'] == 0) {
            $Prueba90 = $consp90['BSLStatus2'] ? cambiarColorPrueba($consp90['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp90['CTS'] == 0) {
            $Prueba90 = $consp90['CTSStatus2'] ? cambiarColorPrueba($consp90['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp90['Packing'] == 0) {
            $Prueba90 = $consp90['PackingStatus2'] ? cambiarColorPrueba($consp90['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>
