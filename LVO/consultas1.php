<?php 
include("conexion.php");
 
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


if($contr1['Modelo']=="Microsoft 8.2"){$conp1=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie1'");}
if($contr2['Modelo']=="Microsoft 8.2"){$conp2=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie2'");}
if($contr3['Modelo']=="Microsoft 8.2"){$conp3=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie3'");}
if($contr4['Modelo']=="Microsoft 8.2"){$conp4=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie4'");}
if($contr5['Modelo']=="Microsoft 8.2"){$conp5=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie5'");}
if($contr6['Modelo']=="Microsoft 8.2"){$conp6=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie6'");}
if($contr7['Modelo']=="Microsoft 8.2"){$conp7=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie7'");}
if($contr8['Modelo']=="Microsoft 8.2"){$conp8=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie8'");}
if($contr9['Modelo']=="Microsoft 8.2"){$conp9=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie9'");}
if($contr10['Modelo']=="Microsoft 8.2"){$conp10=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie10'");}
if($contr11['Modelo']=="Microsoft 8.2"){$conp11=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie11'");}
if($contr12['Modelo']=="Microsoft 8.2"){$conp12=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie12'");}
if($contr13['Modelo']=="Microsoft 8.2"){$conp13=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie13'");}
if($contr14['Modelo']=="Microsoft 8.2"){$conp14=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie14'");}
if($contr15['Modelo']=="Microsoft 8.2"){$conp15=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie15'");}
if($contr16['Modelo']=="Microsoft 8.2"){$conp16=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie16'");}
if($contr17['Modelo']=="Microsoft 8.2"){$conp17=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie17'");}
if($contr18['Modelo']=="Microsoft 8.2"){$conp18=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie18'");}
if($contr19['Modelo']=="Microsoft 8.2"){$conp19=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie19'");}
if($contr20['Modelo']=="Microsoft 8.2"){$conp20=mysqli_query($enlace, "SELECT * FROM pruebasMicro WHERE NoSerie = '$NoSerie20'");}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/**De aqui Saca el status para mostrarlo en la tabla tr para el Tecnico */

if($contr1['Modelo']=="Microsoft 8.2"){
 if($consp1=mysqli_fetch_array($conp1)){ 
	if($consp1['FTO']==0){$Prueba1="FTO"; $FTOcount=$FTOcount+1;} 
	elseif($consp1['QuickTest']==0){$Prueba1="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp1['Stress']==0){$Prueba1="Stress"; $Stresscount=$Stresscount+1;}
	elseif($consp1['MDaaS']==0){$Prueba1="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp1['RackTest']==0){$Prueba1="RackTest"; $Racktestcount=$Racktestcount+1;} 
	elseif($consp1['FTI']==0){$Prueba1="FTI"; $FTIcount=$FTIcount+1;} elseif($consp1['BSL']==0){$Prueba1="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	elseif($consp1['CTS']==0){$Prueba1="CTS"; $CTScount=$CTScount+1;} elseif($consp1['Packing']==0){$Prueba1="Packing"; $Packingcount=$Packingcount+1;} 
 }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr2['Modelo']=="Microsoft 8.2"){
	if($consp2=mysqli_fetch_array($conp2)){ 
	   if($consp2['FTO']==0){$Prueba2="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp2['QuickTest']==0){$Prueba2="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp2['Stress']==0){$Prueba2="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp2['MDaaS']==0){$Prueba2="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp2['RackTest']==0){$Prueba2="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp2['FTI']==0){$Prueba2="FTI"; $FTIcount=$FTIcount+1;} elseif($consp2['BSL']==0){$Prueba2="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp2['CTS']==0){$Prueba2="CTS"; $CTScount=$CTScount+1;} elseif($consp2['Packing']==0){$Prueba2="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr3['Modelo']=="Microsoft 8.2"){
	if($consp3=mysqli_fetch_array($conp3)){ 
	   if($consp3['FTO']==0){$Prueba3="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp3['QuickTest']==0){$Prueba3="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp3['Stress']==0){$Prueba3="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp3['MDaaS']==0){$Prueba3="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp3['RackTest']==0){$Prueba3="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp3['FTI']==0){$Prueba3="FTI"; $FTIcount=$FTIcount+1;} elseif($consp3['BSL']==0){$Prueba3="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp3['CTS']==0){$Prueba3="CTS"; $CTScount=$CTScount+1;} elseif($consp3['Packing']==0){$Prueba3="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr4['Modelo']=="Microsoft 8.2"){
	if($consp4=mysqli_fetch_array($conp4)){ 
	   if($consp4['FTO']==0){$Prueba4="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp4['QuickTest']==0){$Prueba4="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp4['Stress']==0){$Prueba4="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp4['MDaaS']==0){$Prueba4="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp4['RackTest']==0){$Prueba4="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp4['FTI']==0){$Prueba4="FTI"; $FTIcount=$FTIcount+1;} elseif($consp4['BSL']==0){$Prueba4="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp4['CTS']==0){$Prueba4="CTS"; $CTScount=$CTScount+1;} elseif($consp4['Packing']==0){$Prueba4="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr5['Modelo']=="Microsoft 8.2"){
	if($consp5=mysqli_fetch_array($conp5)){ 
	   if($consp5['FTO']==0){$Prueba5="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp5['QuickTest']==0){$Prueba5="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp5['Stress']==0){$Prueba5="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp5['MDaaS']==0){$Prueba5="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp5['RackTest']==0){$Prueba5="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp5['FTI']==0){$Prueba5="FTI"; $FTIcount=$FTIcount+1;} elseif($consp5['BSL']==0){$Prueba5="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp5['CTS']==0){$Prueba5="CTS"; $CTScount=$CTScount+1;} elseif($consp5['Packing']==0){$Prueba5="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr6['Modelo']=="Microsoft 8.2"){
	if($consp6=mysqli_fetch_array($conp6)){ 
	   if($consp6['FTO']==0){$Prueba6="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp6['QuickTest']==0){$Prueba6="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp6['Stress']==0){$Prueba6="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp6['MDaaS']==0){$Prueba6="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp6['RackTest']==0){$Prueba6="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp6['FTI']==0){$Prueba6="FTI"; $FTIcount=$FTIcount+1;} elseif($consp6['BSL']==0){$Prueba6="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp6['CTS']==0){$Prueba6="CTS"; $CTScount=$CTScount+1;} elseif($consp6['Packing']==0){$Prueba6="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr7['Modelo']=="Microsoft 8.2"){
	if($consp7=mysqli_fetch_array($conp7)){ 
	   if($consp7['FTO']==0){$Prueba7="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp7['QuickTest']==0){$Prueba7="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp7['Stress']==0){$Prueba7="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp7['MDaaS']==0){$Prueba7="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp7['RackTest']==0){$Prueba7="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp7['FTI']==0){$Prueba7="FTI"; $FTIcount=$FTIcount+1;} elseif($consp7['BSL']==0){$Prueba7="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp7['CTS']==0){$Prueba7="CTS"; $CTScount=$CTScount+1;} elseif($consp7['Packing']==0){$Prueba7="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr8['Modelo']=="Microsoft 8.2"){
	if($consp8=mysqli_fetch_array($conp8)){ 
	   if($consp8['FTO']==0){$Prueba8="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp8['QuickTest']==0){$Prueba8="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp8['Stress']==0){$Prueba8="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp8['MDaaS']==0){$Prueba8="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp8['RackTest']==0){$Prueba8="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp8['FTI']==0){$Prueba8="FTI"; $FTIcount=$FTIcount+1;} elseif($consp8['BSL']==0){$Prueba8="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp8['CTS']==0){$Prueba8="CTS"; $CTScount=$CTScount+1;} elseif($consp8['Packing']==0){$Prueba8="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr9['Modelo']=="Microsoft 8.2"){
	if($consp9=mysqli_fetch_array($conp9)){ 
	   if($consp9['FTO']==0){$Prueba9="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp9['QuickTest']==0){$Prueba9="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp9['Stress']==0){$Prueba9="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp9['MDaaS']==0){$Prueba9="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp9['RackTest']==0){$Prueba9="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp9['FTI']==0){$Prueba9="FTI"; $FTIcount=$FTIcount+1;} elseif($consp9['BSL']==0){$Prueba9="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp9['CTS']==0){$Prueba9="CTS"; $CTScount=$CTScount+1;} elseif($consp9['Packing']==0){$Prueba9="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr10['Modelo']=="Microsoft 8.2"){
	if($consp10=mysqli_fetch_array($conp10)){ 
	   if($consp10['FTO']==0){$Prueba10="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp10['QuickTest']==0){$Prueba10="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp10['Stress']==0){$Prueba10="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp10['MDaaS']==0){$Prueba10="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp10['RackTest']==0){$Prueba10="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp10['FTI']==0){$Prueba10="FTI"; $FTIcount=$FTIcount+1;} elseif($consp10['BSL']==0){$Prueba10="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp10['CTS']==0){$Prueba10="CTS"; $CTScount=$CTScount+1;} elseif($consp10['Packing']==0){$Prueba10="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr11['Modelo']=="Microsoft 8.2"){
	if($consp11=mysqli_fetch_array($conp11)){ 
	   if($consp11['FTO']==0){$Prueba11="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp11['QuickTest']==0){$Prueba11="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp11['Stress']==0){$Prueba11="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp11['MDaaS']==0){$Prueba11="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp11['RackTest']==0){$Prueba11="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp11['FTI']==0){$Prueba11="FTI"; $FTIcount=$FTIcount+1;} elseif($consp11['BSL']==0){$Prueba11="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp11['CTS']==0){$Prueba11="CTS"; $CTScount=$CTScount+1;} elseif($consp11['Packing']==0){$Prueba11="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr12['Modelo']=="Microsoft 8.2"){
	if($consp12=mysqli_fetch_array($conp12)){ 
	   if($consp12['FTO']==0){$Prueba12="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp12['QuickTest']==0){$Prueba12="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp12['Stress']==0){$Prueba12="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp12['MDaaS']==0){$Prueba12="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp12['RackTest']==0){$Prueba12="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp12['FTI']==0){$Prueba12="FTI"; $FTIcount=$FTIcount+1;} elseif($consp12['BSL']==0){$Prueba12="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp12['CTS']==0){$Prueba12="CTS"; $CTScount=$CTScount+1;} elseif($consp12['Packing']==0){$Prueba12="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr13['Modelo']=="Microsoft 8.2"){
	if($consp13=mysqli_fetch_array($conp13)){ 
	   if($consp13['FTO']==0){$Prueba13="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp13['QuickTest']==0){$Prueba13="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp13['Stress']==0){$Prueba13="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp13['MDaaS']==0){$Prueba13="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp13['RackTest']==0){$Prueba13="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp13['FTI']==0){$Prueba13="FTI"; $FTIcount=$FTIcount+1;} elseif($consp13['BSL']==0){$Prueba13="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp13['CTS']==0){$Prueba13="CTS"; $CTScount=$CTScount+1;} elseif($consp13['Packing']==0){$Prueba13="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr14['Modelo']=="Microsoft 8.2"){
	if($consp14=mysqli_fetch_array($conp14)){ 
	   if($consp14['FTO']==0){$Prueba14="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp14['QuickTest']==0){$Prueba14="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp14['Stress']==0){$Prueba14="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp14['MDaaS']==0){$Prueba14="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp14['RackTest']==0){$Prueba14="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp14['FTI']==0){$Prueba14="FTI"; $FTIcount=$FTIcount+1;} elseif($consp14['BSL']==0){$Prueba14="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp14['CTS']==0){$Prueba14="CTS"; $CTScount=$CTScount+1;} elseif($consp14['Packing']==0){$Prueba14="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr15['Modelo']=="Microsoft 8.2"){
	if($consp15=mysqli_fetch_array($conp15)){ 
	   if($consp15['FTO']==0){$Prueba15="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp15['QuickTest']==0){$Prueba15="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp15['Stress']==0){$Prueba15="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp15['MDaaS']==0){$Prueba15="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp15['RackTest']==0){$Prueba15="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp15['FTI']==0){$Prueba15="FTI"; $FTIcount=$FTIcount+1;} elseif($consp15['BSL']==0){$Prueba15="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp15['CTS']==0){$Prueba15="CTS"; $CTScount=$CTScount+1;} elseif($consp15['Packing']==0){$Prueba15="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr16['Modelo']=="Microsoft 8.2"){
	if($consp16=mysqli_fetch_array($conp16)){ 
	   if($consp16['FTO']==0){$Prueba16="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp16['QuickTest']==0){$Prueba16="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp16['Stress']==0){$Prueba16="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp16['MDaaS']==0){$Prueba16="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp16['RackTest']==0){$Prueba16="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp16['FTI']==0){$Prueba16="FTI"; $FTIcount=$FTIcount+1;} elseif($consp16['BSL']==0){$Prueba16="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp16['CTS']==0){$Prueba16="CTS"; $CTScount=$CTScount+1;} elseif($consp16['Packing']==0){$Prueba16="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr17['Modelo']=="Microsoft 8.2"){
	if($consp17=mysqli_fetch_array($conp17)){ 
	   if($consp17['FTO']==0){$Prueba17="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp17['QuickTest']==0){$Prueba17="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp17['Stress']==0){$Prueba17="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp17['MDaaS']==0){$Prueba17="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp17['RackTest']==0){$Prueba17="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp17['FTI']==0){$Prueba17="FTI"; $FTIcount=$FTIcount+1;} elseif($consp17['BSL']==0){$Prueba17="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp17['CTS']==0){$Prueba17="CTS"; $CTScount=$CTScount+1;} elseif($consp17['Packing']==0){$Prueba17="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr18['Modelo']=="Microsoft 8.2"){
	if($consp18=mysqli_fetch_array($conp18)){ 
	   if($consp18['FTO']==0){$Prueba18="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp18['QuickTest']==0){$Prueba18="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp18['Stress']==0){$Prueba18="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp18['MDaaS']==0){$Prueba18="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp18['RackTest']==0){$Prueba18="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp18['FTI']==0){$Prueba18="FTI"; $FTIcount=$FTIcount+1;} elseif($consp18['BSL']==0){$Prueba18="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp18['CTS']==0){$Prueba18="CTS"; $CTScount=$CTScount+1;} elseif($consp18['Packing']==0){$Prueba18="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr19['Modelo']=="Microsoft 8.2"){
	if($consp19=mysqli_fetch_array($conp19)){ 
	   if($consp19['FTO']==0){$Prueba19="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp19['QuickTest']==0){$Prueba19="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp19['Stress']==0){$Prueba19="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp19['MDaaS']==0){$Prueba19="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp19['RackTest']==0){$Prueba19="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp19['FTI']==0){$Prueba19="FTI"; $FTIcount=$FTIcount+1;} elseif($consp19['BSL']==0){$Prueba19="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp19['CTS']==0){$Prueba19="CTS"; $CTScount=$CTScount+1;} elseif($consp19['Packing']==0){$Prueba19="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr20['Modelo']=="Microsoft 8.2"){
	if($consp20=mysqli_fetch_array($conp20)){ 
	   if($consp20['FTO']==0){$Prueba20="FTO"; $FTOcount=$FTOcount+1;} 
	   elseif($consp20['QuickTest']==0){$Prueba20="QuickTest"; $Quicktestcount=$Quicktestcount+1; } elseif($consp20['Stress']==0){$Prueba20="Stress"; $Stresscount=$Stresscount+1;}
	   elseif($consp20['MDaaS']==0){$Prueba20="MDaaS";  $MDaascount=$MDaascount+1;}  elseif($consp20['RackTest']==0){$Prueba20="RackTest"; $Racktestcount=$Racktestcount+1;} 
	   elseif($consp20['FTI']==0){$Prueba20="FTI"; $FTIcount=$FTIcount+1;} elseif($consp20['BSL']==0){$Prueba20="BSL";$Bootstrapcount=$Bootstrapcount+1;}
	   elseif($consp20['CTS']==0){$Prueba20="CTS"; $CTScount=$CTScount+1;} elseif($consp20['Packing']==0){$Prueba20="Packing"; $Packingcount=$Packingcount+1;} 
	}
   }
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>