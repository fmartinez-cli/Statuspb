<?php 
include("conexion.php");
include("funciones.php");
 
	/*Esto buscará el número de serie en la tabla "racks" y si no encuentra ningún resultado, 
	asignará el valor "Disponible" a la variable "$NoSerie1".	*/



$constr41=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-41'");
if($contr41=mysqli_fetch_array($constr41)){$NoSerie41=$contr41['NoSerie'];} else {$NoSerie41="Disponible";}

$constr42=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-42'");
if($contr42=mysqli_fetch_array($constr42)){$NoSerie42=$contr42['NoSerie'];} else {$NoSerie42="Disponible";}

$constr43=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-43'");
if($contr43=mysqli_fetch_array($constr43)){$NoSerie43=$contr43['NoSerie'];} else {$NoSerie43="Disponible";}

$constr44=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-44'");
if($contr44=mysqli_fetch_array($constr44)){$NoSerie44=$contr44['NoSerie'];} else {$NoSerie44="Disponible";}

$constr45=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-45'");
if($contr45=mysqli_fetch_array($constr45)){$NoSerie45=$contr45['NoSerie'];} else {$NoSerie45="Disponible";}

$constr46=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-46'");
if($contr46=mysqli_fetch_array($constr46)){$NoSerie46=$contr46['NoSerie'];} else {$NoSerie46="Disponible";}

$constr47=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-47'");
if($contr47=mysqli_fetch_array($constr47)){$NoSerie47=$contr47['NoSerie'];} else {$NoSerie47="Disponible";}

$constr48=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-48'");
if($contr48=mysqli_fetch_array($constr48)){$NoSerie48=$contr48['NoSerie'];} else {$NoSerie48="Disponible";}

$constr49=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-49'");
if($contr49=mysqli_fetch_array($constr49)){$NoSerie49=$contr49['NoSerie'];} else {$NoSerie49="Disponible";}

$constr50=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR05-50'");
if($contr50=mysqli_fetch_array($constr50)){$NoSerie50=$contr50['NoSerie'];} else {$NoSerie50="Disponible";}



					
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					 $Prueba41="&nbsp;"; $Prueba42="&nbsp;"; $Prueba43="&nbsp;"; $Prueba44="&nbsp;";
					$Prueba45="&nbsp;"; $Prueba46="&nbsp;"; $Prueba47="&nbsp;"; $Prueba48="&nbsp;"; $Prueba49="&nbsp;"; $Prueba50="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Quicktestcount=0; $Stresscount=0;  $MDaascount=0; $Racktestcount=0; $FTIcount=0;  $Bootstrapcount=0; 
					$CTScount=0; $Packingcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr41['Modelo']=="Microsoft 8.2" || $contr41['Modelo']=="Microsoft 8.3" || $contr41['Modelo']=="NPI"){$conp41=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie41'");}
if($contr42['Modelo']=="Microsoft 8.2" || $contr42['Modelo']=="Microsoft 8.3" || $contr42['Modelo']=="NPI"){$conp42=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie42'");}
if($contr43['Modelo']=="Microsoft 8.2" || $contr43['Modelo']=="Microsoft 8.3" || $contr43['Modelo']=="NPI"){$conp43=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie43'");}
if($contr44['Modelo']=="Microsoft 8.2" || $contr44['Modelo']=="Microsoft 8.3" || $contr44['Modelo']=="NPI"){$conp44=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie44'");}
if($contr45['Modelo']=="Microsoft 8.2" || $contr45['Modelo']=="Microsoft 8.3" || $contr45['Modelo']=="NPI"){$conp45=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie45'");}
if($contr46['Modelo']=="Microsoft 8.2" || $contr46['Modelo']=="Microsoft 8.3" || $contr46['Modelo']=="NPI"){$conp46=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie46'");}
if($contr47['Modelo']=="Microsoft 8.2" || $contr47['Modelo']=="Microsoft 8.3" || $contr47['Modelo']=="NPI"){$conp47=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie47'");}
if($contr48['Modelo']=="Microsoft 8.2" || $contr48['Modelo']=="Microsoft 8.3" || $contr48['Modelo']=="NPI"){$conp48=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie48'");}
if($contr49['Modelo']=="Microsoft 8.2" || $contr49['Modelo']=="Microsoft 8.3" || $contr49['Modelo']=="NPI"){$conp49=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie49'");}
if($contr50['Modelo']=="Microsoft 8.2" || $contr50['Modelo']=="Microsoft 8.3" || $contr50['Modelo']=="NPI"){$conp50=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie50'");}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr41['Modelo'] == "Microsoft 8.2" || $contr41['Modelo'] == "Microsoft 8.3" || $contr41['Modelo'] == "NPI") {
    if ($consp41 = mysqli_fetch_array($conp41)) {
        if ($consp41['FTO'] == 0) {
            $Prueba41 = $consp41['FTOStatus2'] ? cambiarColorPrueba($consp41['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp41['QuickTest'] == 0) {
            $Prueba41 = $consp41['QuickTestStatus2'] ? cambiarColorPrueba($consp41['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp41['Stress'] == 0) {
            $Prueba41 = $consp41['StressStatus2'] ? cambiarColorPrueba($consp41['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp41['MDaaS'] == 0) {
            $Prueba41 = $consp41['MDaaSStatus2'] ? cambiarColorPrueba($consp41['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp41['RackTest'] == 0) {
            $Prueba41 = $consp41['RackTestStatus2'] ? cambiarColorPrueba($consp41['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp41['FTI'] == 0) {
            $Prueba41 = $consp41['FTIStatus2'] ? cambiarColorPrueba($consp41['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp41['BSL'] == 0) {
            $Prueba41 = $consp41['BSLStatus2'] ? cambiarColorPrueba($consp41['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp41['CTS'] == 0) {
            $Prueba41 = $consp41['CTSStatus2'] ? cambiarColorPrueba($consp41['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp41['Packing'] == 0) {
            $Prueba41 = $consp41['PackingStatus2'] ? cambiarColorPrueba($consp41['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr42['Modelo'] == "Microsoft 8.2" || $contr42['Modelo'] == "Microsoft 8.3" || $contr42['Modelo'] == "NPI") {
    if ($consp42 = mysqli_fetch_array($conp42)) {
        if ($consp42['FTO'] == 0) {
            $Prueba42 = $consp42['FTOStatus2'] ? cambiarColorPrueba($consp42['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp42['QuickTest'] == 0) {
            $Prueba42 = $consp42['QuickTestStatus2'] ? cambiarColorPrueba($consp42['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp42['Stress'] == 0) {
            $Prueba42 = $consp42['StressStatus2'] ? cambiarColorPrueba($consp42['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp42['MDaaS'] == 0) {
            $Prueba42 = $consp42['MDaaSStatus2'] ? cambiarColorPrueba($consp42['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp42['RackTest'] == 0) {
            $Prueba42 = $consp42['RackTestStatus2'] ? cambiarColorPrueba($consp42['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp42['FTI'] == 0) {
            $Prueba42 = $consp42['FTIStatus2'] ? cambiarColorPrueba($consp42['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp42['BSL'] == 0) {
            $Prueba42 = $consp42['BSLStatus2'] ? cambiarColorPrueba($consp42['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp42['CTS'] == 0) {
            $Prueba42 = $consp42['CTSStatus2'] ? cambiarColorPrueba($consp42['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp42['Packing'] == 0) {
            $Prueba42 = $consp42['PackingStatus2'] ? cambiarColorPrueba($consp42['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr43['Modelo'] == "Microsoft 8.2" || $contr43['Modelo'] == "Microsoft 8.3" || $contr43['Modelo'] == "NPI") {
    if ($consp43 = mysqli_fetch_array($conp43)) {
        if ($consp43['FTO'] == 0) {
            $Prueba43 = $consp43['FTOStatus2'] ? cambiarColorPrueba($consp43['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp43['QuickTest'] == 0) {
            $Prueba43 = $consp43['QuickTestStatus2'] ? cambiarColorPrueba($consp43['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp43['Stress'] == 0) {
            $Prueba43 = $consp43['StressStatus2'] ? cambiarColorPrueba($consp43['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp43['MDaaS'] == 0) {
            $Prueba43 = $consp43['MDaaSStatus2'] ? cambiarColorPrueba($consp43['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp43['RackTest'] == 0) {
            $Prueba43 = $consp43['RackTestStatus2'] ? cambiarColorPrueba($consp43['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp43['FTI'] == 0) {
            $Prueba43 = $consp43['FTIStatus2'] ? cambiarColorPrueba($consp43['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp43['BSL'] == 0) {
            $Prueba43 = $consp43['BSLStatus2'] ? cambiarColorPrueba($consp43['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp43['CTS'] == 0) {
            $Prueba43 = $consp43['CTSStatus2'] ? cambiarColorPrueba($consp43['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp43['Packing'] == 0) {
            $Prueba43 = $consp43['PackingStatus2'] ? cambiarColorPrueba($consp43['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr44['Modelo'] == "Microsoft 8.2" || $contr44['Modelo'] == "Microsoft 8.3" || $contr44['Modelo'] == "NPI") {
    if ($consp44 = mysqli_fetch_array($conp44)) {
        if ($consp44['FTO'] == 0) {
            $Prueba44 = $consp44['FTOStatus2'] ? cambiarColorPrueba($consp44['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp44['QuickTest'] == 0) {
            $Prueba44 = $consp44['QuickTestStatus2'] ? cambiarColorPrueba($consp44['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp44['Stress'] == 0) {
            $Prueba44 = $consp44['StressStatus2'] ? cambiarColorPrueba($consp44['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp44['MDaaS'] == 0) {
            $Prueba44 = $consp44['MDaaSStatus2'] ? cambiarColorPrueba($consp44['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp44['RackTest'] == 0) {
            $Prueba44 = $consp44['RackTestStatus2'] ? cambiarColorPrueba($consp44['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp44['FTI'] == 0) {
            $Prueba44 = $consp44['FTIStatus2'] ? cambiarColorPrueba($consp44['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp44['BSL'] == 0) {
            $Prueba44 = $consp44['BSLStatus2'] ? cambiarColorPrueba($consp44['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp44['CTS'] == 0) {
            $Prueba44 = $consp44['CTSStatus2'] ? cambiarColorPrueba($consp44['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp44['Packing'] == 0) {
            $Prueba44 = $consp44['PackingStatus2'] ? cambiarColorPrueba($consp44['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr45['Modelo'] == "Microsoft 8.2" || $contr45['Modelo'] == "Microsoft 8.3" || $contr45['Modelo'] == "NPI") {
    if ($consp45 = mysqli_fetch_array($conp45)) {
        if ($consp45['FTO'] == 0) {
            $Prueba45 = $consp45['FTOStatus2'] ? cambiarColorPrueba($consp45['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp45['QuickTest'] == 0) {
            $Prueba45 = $consp45['QuickTestStatus2'] ? cambiarColorPrueba($consp45['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp45['Stress'] == 0) {
            $Prueba45 = $consp45['StressStatus2'] ? cambiarColorPrueba($consp45['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp45['MDaaS'] == 0) {
            $Prueba45 = $consp45['MDaaSStatus2'] ? cambiarColorPrueba($consp45['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp45['RackTest'] == 0) {
            $Prueba45 = $consp45['RackTestStatus2'] ? cambiarColorPrueba($consp45['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp45['FTI'] == 0) {
            $Prueba45 = $consp45['FTIStatus2'] ? cambiarColorPrueba($consp45['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp45['BSL'] == 0) {
            $Prueba45 = $consp45['BSLStatus2'] ? cambiarColorPrueba($consp45['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp45['CTS'] == 0) {
            $Prueba45 = $consp45['CTSStatus2'] ? cambiarColorPrueba($consp45['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp45['Packing'] == 0) {
            $Prueba45 = $consp45['PackingStatus2'] ? cambiarColorPrueba($consp45['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if ($contr46['Modelo'] == "Microsoft 8.2" || $contr46['Modelo'] == "Microsoft 8.3" || $contr46['Modelo'] == "NPI") {
    if ($consp46 = mysqli_fetch_array($conp46)) {
        if ($consp46['FTO'] == 0) {
            $Prueba46 = $consp46['FTOStatus2'] ? cambiarColorPrueba($consp46['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp46['QuickTest'] == 0) {
            $Prueba46 = $consp46['QuickTestStatus2'] ? cambiarColorPrueba($consp46['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp46['Stress'] == 0) {
            $Prueba46 = $consp46['StressStatus2'] ? cambiarColorPrueba($consp46['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp46['MDaaS'] == 0) {
            $Prueba46 = $consp46['MDaaSStatus2'] ? cambiarColorPrueba($consp46['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp46['RackTest'] == 0) {
            $Prueba46 = $consp46['RackTestStatus2'] ? cambiarColorPrueba($consp46['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp46['FTI'] == 0) {
            $Prueba46 = $consp46['FTIStatus2'] ? cambiarColorPrueba($consp46['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp46['BSL'] == 0) {
            $Prueba46 = $consp46['BSLStatus2'] ? cambiarColorPrueba($consp46['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp46['CTS'] == 0) {
            $Prueba46 = $consp46['CTSStatus2'] ? cambiarColorPrueba($consp46['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp46['Packing'] == 0) {
            $Prueba46 = $consp46['PackingStatus2'] ? cambiarColorPrueba($consp46['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr47['Modelo'] == "Microsoft 8.2" || $contr47['Modelo'] == "Microsoft 8.3" || $contr47['Modelo'] == "NPI") {
    if ($consp47 = mysqli_fetch_array($conp47)) {
        if ($consp47['FTO'] == 0) {
            $Prueba47 = $consp47['FTOStatus2'] ? cambiarColorPrueba($consp47['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp47['QuickTest'] == 0) {
            $Prueba47 = $consp47['QuickTestStatus2'] ? cambiarColorPrueba($consp47['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp47['Stress'] == 0) {
            $Prueba47 = $consp47['StressStatus2'] ? cambiarColorPrueba($consp47['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp47['MDaaS'] == 0) {
            $Prueba47 = $consp47['MDaaSStatus2'] ? cambiarColorPrueba($consp47['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp47['RackTest'] == 0) {
            $Prueba47 = $consp47['RackTestStatus2'] ? cambiarColorPrueba($consp47['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp47['FTI'] == 0) {
            $Prueba47 = $consp47['FTIStatus2'] ? cambiarColorPrueba($consp47['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp47['BSL'] == 0) {
            $Prueba47 = $consp47['BSLStatus2'] ? cambiarColorPrueba($consp47['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp47['CTS'] == 0) {
            $Prueba47 = $consp47['CTSStatus2'] ? cambiarColorPrueba($consp47['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp47['Packing'] == 0) {
            $Prueba47 = $consp47['PackingStatus2'] ? cambiarColorPrueba($consp47['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr48['Modelo'] == "Microsoft 8.2" || $contr48['Modelo'] == "Microsoft 8.3" || $contr48['Modelo'] == "NPI") {
    if ($consp48 = mysqli_fetch_array($conp48)) {
        if ($consp48['FTO'] == 0) {
            $Prueba48 = $consp48['FTOStatus2'] ? cambiarColorPrueba($consp48['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp48['QuickTest'] == 0) {
            $Prueba48 = $consp48['QuickTestStatus2'] ? cambiarColorPrueba($consp48['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp48['Stress'] == 0) {
            $Prueba48 = $consp48['StressStatus2'] ? cambiarColorPrueba($consp48['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp48['MDaaS'] == 0) {
            $Prueba48 = $consp48['MDaaSStatus2'] ? cambiarColorPrueba($consp48['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp48['RackTest'] == 0) {
            $Prueba48 = $consp48['RackTestStatus2'] ? cambiarColorPrueba($consp48['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp48['FTI'] == 0) {
            $Prueba48 = $consp48['FTIStatus2'] ? cambiarColorPrueba($consp48['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp48['BSL'] == 0) {
            $Prueba48 = $consp48['BSLStatus2'] ? cambiarColorPrueba($consp48['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp48['CTS'] == 0) {
            $Prueba48 = $consp48['CTSStatus2'] ? cambiarColorPrueba($consp48['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp48['Packing'] == 0) {
            $Prueba48 = $consp48['PackingStatus2'] ? cambiarColorPrueba($consp48['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr49['Modelo'] == "Microsoft 8.2" || $contr49['Modelo'] == "Microsoft 8.3" || $contr49['Modelo'] == "NPI") {
    if ($consp49 = mysqli_fetch_array($conp49)) {
        if ($consp49['FTO'] == 0) {
            $Prueba49 = $consp49['FTOStatus2'] ? cambiarColorPrueba($consp49['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp49['QuickTest'] == 0) {
            $Prueba49 = $consp49['QuickTestStatus2'] ? cambiarColorPrueba($consp49['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp49['Stress'] == 0) {
            $Prueba49 = $consp49['StressStatus2'] ? cambiarColorPrueba($consp49['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp49['MDaaS'] == 0) {
            $Prueba49 = $consp49['MDaaSStatus2'] ? cambiarColorPrueba($consp49['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp49['RackTest'] == 0) {
            $Prueba49 = $consp49['RackTestStatus2'] ? cambiarColorPrueba($consp49['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp49['FTI'] == 0) {
            $Prueba49 = $consp49['FTIStatus2'] ? cambiarColorPrueba($consp49['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp49['BSL'] == 0) {
            $Prueba49 = $consp49['BSLStatus2'] ? cambiarColorPrueba($consp49['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp49['CTS'] == 0) {
            $Prueba49 = $consp49['CTSStatus2'] ? cambiarColorPrueba($consp49['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp49['Packing'] == 0) {
            $Prueba49 = $consp49['PackingStatus2'] ? cambiarColorPrueba($consp49['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if ($contr50['Modelo'] == "Microsoft 8.2" || $contr50['Modelo'] == "Microsoft 8.3" || $contr50['Modelo'] == "NPI") {
    if ($consp50 = mysqli_fetch_array($conp50)) {
        if ($consp50['FTO'] == 0) {
            $Prueba50 = $consp50['FTOStatus2'] ? cambiarColorPrueba($consp50['FTOStatus2'], "FTO") : "FTO";
            $FTOcount = $FTOcount + 1;
        } elseif ($consp50['QuickTest'] == 0) {
            $Prueba50 = $consp50['QuickTestStatus2'] ? cambiarColorPrueba($consp50['QuickTestStatus2'], "QuickTest") : "QuickTest";
            $Quicktestcount = $Quicktestcount + 1;
        } elseif ($consp50['Stress'] == 0) {
            $Prueba50 = $consp50['StressStatus2'] ? cambiarColorPrueba($consp50['StressStatus2'], "Stress") : "Stress";
            $Stresscount = $Stresscount + 1;
        } elseif ($consp50['MDaaS'] == 0) {
            $Prueba50 = $consp50['MDaaSStatus2'] ? cambiarColorPrueba($consp50['MDaaSStatus2'], "MDaaS") : "MDaaS";
            $MDaascount = $MDaascount + 1;
        } elseif ($consp50['RackTest'] == 0) {
            $Prueba50 = $consp50['RackTestStatus2'] ? cambiarColorPrueba($consp50['RackTestStatus2'], "RackTest") : "RackTest";
            $Racktestcount = $Racktestcount + 1;
        } elseif ($consp50['FTI'] == 0) {
            $Prueba50 = $consp50['FTIStatus2'] ? cambiarColorPrueba($consp50['FTIStatus2'], "FTI") : "FTI";
            $FTIcount = $FTIcount + 1;
        } elseif ($consp50['BSL'] == 0) {
            $Prueba50 = $consp50['BSLStatus2'] ? cambiarColorPrueba($consp50['BSLStatus2'], "BSL") : "BSL";
            $Bootstrapcount = $Bootstrapcount + 1;
        } elseif ($consp50['CTS'] == 0) {
            $Prueba50 = $consp50['CTSStatus2'] ? cambiarColorPrueba($consp50['CTSStatus2'], "CTS") : "CTS";
            $CTScount = $CTScount + 1;
        } elseif ($consp50['Packing'] == 0) {
            $Prueba50 = $consp50['PackingStatus2'] ? cambiarColorPrueba($consp50['PackingStatus2'], "Packing") : "Packing";
            $Packingcount = $Packingcount + 1;
        }
    }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>
