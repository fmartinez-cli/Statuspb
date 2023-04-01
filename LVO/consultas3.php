<?php
include("conexion.php");


	$constr1=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-33'"); if($contr1=mysqli_fetch_array($constr1)){ $NoSerie1=$contr1['NoSerie']; }
	else{ $constr1=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-33' AND area='LVO'");
	if($contr1=mysqli_fetch_array($constr1)){ $NoSerie1=$contr1['NoSerie']; }else{ $NoSerie1="Disponible"; } }
	$constr2=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-34'"); if($contr2=mysqli_fetch_array($constr2)){ $NoSerie2=$contr2['NoSerie']; }
	else{ $constr2=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-34' AND area='LVO'");
	if($contr2=mysqli_fetch_array($constr2)){ $NoSerie2=$contr2['NoSerie']; }else{ $NoSerie2="Disponible"; } }
	$constr3=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-35'"); if($contr3=mysqli_fetch_array($constr3)){ $NoSerie3=$contr3['NoSerie']; }
	else{ $constr3=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-35' AND area='LVO'");
	if($contr3=mysqli_fetch_array($constr3)){ $NoSerie3=$contr3['NoSerie']; }else{ $NoSerie3="Disponible"; } }
	$constr4=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-36'"); if($contr4=mysqli_fetch_array($constr4)){ $NoSerie4=$contr4['NoSerie']; }
	else{ $constr4=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-36' AND area='LVO'");
	if($contr4=mysqli_fetch_array($constr4)){ $NoSerie4=$contr4['NoSerie']; }else{ $NoSerie4="Disponible"; } }
	$constr5=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-37'"); if($contr5=mysqli_fetch_array($constr5)){ $NoSerie5=$contr5['NoSerie']; }
	else{ $constr5=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-37' AND area='LVO'");
	if($contr5=mysqli_fetch_array($constr5)){ $NoSerie5=$contr5['NoSerie']; }else{ $NoSerie5="Disponible"; } }
	$constr6=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-38'"); if($contr6=mysqli_fetch_array($constr6)){ $NoSerie6=$contr6['NoSerie']; }
	else{ $constr6=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-38' AND area='LVO'");
	if($contr6=mysqli_fetch_array($constr6)){ $NoSerie6=$contr6['NoSerie']; }else{ $NoSerie6="Disponible"; } }
	$constr7=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-39'"); if($contr7=mysqli_fetch_array($constr7)){ $NoSerie7=$contr7['NoSerie']; }
	else{ $constr7=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-39' AND area='LVO'");
	if($contr7=mysqli_fetch_array($constr7)){ $NoSerie7=$contr7['NoSerie']; }else{ $NoSerie7="Disponible"; } }
	$constr8=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-40'"); if($contr8=mysqli_fetch_array($constr8)){ $NoSerie8=$contr8['NoSerie']; }
	else{ $constr8=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-40' AND area='LVO'");
	if($contr8=mysqli_fetch_array($constr8)){ $NoSerie8=$contr8['NoSerie']; }else{ $NoSerie8="Disponible"; } }
	$constr9=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-41'"); if($contr9=mysqli_fetch_array($constr9)){ $NoSerie9=$contr9['NoSerie']; }
	else{ $constr9=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-41' AND area='LVO'");
	if($contr9=mysqli_fetch_array($constr9)){ $NoSerie9=$contr9['NoSerie']; }else{ $NoSerie9="Disponible"; } }
	$constr10=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-42'"); if($contr10=mysqli_fetch_array($constr10)){ $NoSerie10=$contr10['NoSerie']; }
	else{ $constr10=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-42' AND area='LVO'");
	if($contr10=mysqli_fetch_array($constr10)){ $NoSerie10=$contr10['NoSerie']; }else{ $NoSerie10="Disponible"; } }
	$constr11=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-43'"); if($contr11=mysqli_fetch_array($constr11)){ $NoSerie11=$contr11['NoSerie']; }
	else{ $constr11=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-43' AND area='LVO'");
	if($contr11=mysqli_fetch_array($constr11)){ $NoSerie11=$contr11['NoSerie']; }else{ $NoSerie11="Disponible"; } }
	$constr12=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-44'"); if($contr12=mysqli_fetch_array($constr12)){ $NoSerie12=$contr12['NoSerie']; }
	else{ $constr12=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-44' AND area='LVO'");
	if($contr12=mysqli_fetch_array($constr12)){ $NoSerie12=$contr12['NoSerie']; }else{ $NoSerie12="Disponible"; } }
	$constr13=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-45'"); if($contr13=mysqli_fetch_array($constr13)){ $NoSerie13=$contr13['NoSerie']; }
	else{ $constr13=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-45' AND area='LVO'");
	if($contr13=mysqli_fetch_array($constr13)){ $NoSerie13=$contr13['NoSerie']; }else{ $NoSerie13="Disponible"; } }
	$constr14=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-46'"); if($contr14=mysqli_fetch_array($constr14)){ $NoSerie14=$contr14['NoSerie']; }
	else{ $constr14=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-46' AND area='LVO'");
	if($contr14=mysqli_fetch_array($constr14)){ $NoSerie14=$contr14['NoSerie']; }else{ $NoSerie14="Disponible"; } }
	$constr15=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-47'"); if($contr15=mysqli_fetch_array($constr15)){ $NoSerie15=$contr15['NoSerie']; }
	else{ $constr15=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-47' AND area='LVO'");
	if($contr15=mysqli_fetch_array($constr15)){ $NoSerie15=$contr15['NoSerie']; }else{ $NoSerie15="Disponible"; } }
	$constr16=mysqli_query($enlace, "SELECT * FROM racks WHERE Locacion = 'TR03-48'"); if($contr16=mysqli_fetch_array($constr16)){ $NoSerie16=$contr16['NoSerie']; }
	else{ $constr16=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR03-48' AND area='LVO'"); 
	if($contr16=mysqli_fetch_array($constr16)){ $NoSerie16=$contr16['NoSerie']; }else{ $NoSerie16="Disponible"; } }






/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$Prueba1="&nbsp;"; $Prueba2="&nbsp;"; $Prueba3="&nbsp;"; $Prueba4="&nbsp;"; $Prueba5="&nbsp;"; $Prueba6="&nbsp;"; $Prueba7="&nbsp;";
					$Prueba8="&nbsp;"; $Prueba9="&nbsp;"; $Prueba10="&nbsp;"; $Prueba11="&nbsp;"; $Prueba12="&nbsp;"; $Prueba13="&nbsp;"; $Prueba14="&nbsp;";
					$Prueba15="&nbsp;"; $Prueba16="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $XTEEcount=0; $Ciscocount=0;  $Rackscancount=0; $Clustercount=0; $Solarcount=0;  $Bootstrapcount=0;
					$Sharknadocount=0; $Wiringcount=0; $DEIDcount=0; $Megacount=0; $EOTAcount=0; $Listocount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOdcount=0; $Ciscodcount=0;  $Rackscandcount=0; $Clusterdcount=0; $Solardcount=0; $Solar2dcount=0;
					$Sharknadodcount=0; $Wiringdcount=0; $DEIDdcount=0; $Megadcount=0; $EOTAdcount=0; $Listodcount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOmcount=0; $Arista0mcount=0; $Arista1mcount=0;  $Rackscanmcount=0; $Cluster0mcount=0; $Cluster1mcount=0;  $Bootstrapmcount=0;
					$DEIDmcount=0;  $EOTAmcount=0; $Listomcount=0; $CMmCount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr1['Modelo']=="Azure 4.1" || $contr1['Modelo']=="Dropbox"){ $conp1=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie1'"); }
else if($contr1['Modelo']=="Microsoft"){ $conp1=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie1'"); }
if($contr2['Modelo']=="Azure 4.1" || $contr2['Modelo']=="Dropbox"){ $conp2=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie2'"); }
else if($contr2['Modelo']=="Microsoft"){ $conp2=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie2'"); }
if($contr3['Modelo']=="Azure 4.1" || $contr3['Modelo']=="Dropbox"){ $conp3=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie3'"); }
else if($contr3['Modelo']=="Microsoft"){ $conp3=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie3'"); }
if($contr4['Modelo']=="Azure 4.1" || $contr4['Modelo']=="Dropbox"){ $conp4=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie4'"); }
else if($contr4['Modelo']=="Microsoft"){ $conp4=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie4'"); }
if($contr5['Modelo']=="Azure 4.1" || $contr5['Modelo']=="Dropbox"){ $conp5=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie5'"); }
else if($contr5['Modelo']=="Microsoft"){ $conp5=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie5'"); }
if($contr6['Modelo']=="Azure 4.1" || $contr6['Modelo']=="Dropbox"){ $conp6=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie6'"); }
else if($contr6['Modelo']=="Microsoft"){ $conp6=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie6'"); }
if($contr7['Modelo']=="Azure 4.1" || $contr7['Modelo']=="Dropbox"){ $conp7=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie7'"); }
else if($contr7['Modelo']=="Microsoft"){ $conp7=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie7'"); }
if($contr8['Modelo']=="Azure 4.1" || $contr8['Modelo']=="Dropbox"){ $conp8=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie8'"); }
else if($contr8['Modelo']=="Microsoft"){ $conp8=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie8'"); }
if($contr9['Modelo']=="Azure 4.1" || $contr9['Modelo']=="Dropbox"){ $conp9=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie9'"); }
else if($contr9['Modelo']=="Microsoft"){ $conp9=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie9'"); }
if($contr10['Modelo']=="Azure 4.1" || $contr10['Modelo']=="Dropbox"){ $conp10=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie10'"); }
else if($contr10['Modelo']=="Microsoft"){ $conp10=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie10'"); }
if($contr11['Modelo']=="Azure 4.1" || $contr11['Modelo']=="Dropbox"){ $conp11=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie11'"); }
else if($contr11['Modelo']=="Microsoft"){ $conp11=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie11'"); }
if($contr12['Modelo']=="Azure 4.1" || $contr12['Modelo']=="Dropbox"){ $conp12=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie12'"); }
else if($contr12['Modelo']=="Microsoft"){ $conp12=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie12'"); }
if($contr13['Modelo']=="Azure 4.1" || $contr13['Modelo']=="Dropbox"){ $conp13=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie13'"); }
else if($contr13['Modelo']=="Microsoft"){ $conp13=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie13'"); }
if($contr14['Modelo']=="Azure 4.1" || $contr14['Modelo']=="Dropbox"){ $conp14=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie14'"); }
else if($contr14['Modelo']=="Microsoft"){ $conp14=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie14'"); }
if($contr15['Modelo']=="Azure 4.1" || $contr15['Modelo']=="Dropbox"){ $conp15=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie15'"); }
else if($contr15['Modelo']=="Microsoft"){ $conp15=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie15'"); }
if($contr16['Modelo']=="Azure 4.1" || $contr16['Modelo']=="Dropbox"){ $conp16=mysqli_query($enlace, "SELECT * FROM pruebas WHERE NoSerie = '$NoSerie16'"); }
else if($contr16['Modelo']=="Microsoft"){ $conp16=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie16'"); }



/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/


if($contr1['Modelo']=="Azure 4.1"){
 if($consp1=mysqli_fetch_array($conp1)){
	if($consp1['FTO']==0){$Prueba1="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp1['Cisco']==0){$Prueba1="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp1['Rackscan']==0){$Prueba1="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp1['XTEE']==0){$Prueba1="XTEE";  $XTEEcount=$XTEEcount+1;}  elseif($consp1['Cluster']==0){$Prueba1="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp1['Solar']==0){$Prueba1="Solar"; $Solarcount=$Solarcount+1;} elseif($consp1['Wiring']==0){$Prueba1="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp1['Bootstrap']==0){$Prueba1="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp1['Sharknado']==0){$Prueba1="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp1['DEID']==0){$Prueba1="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp1['Megamind']==0){$Prueba1="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp1['EOTA']==0){$Prueba1="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba1="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr1['Modelo']=="Dropbox"){
	if($consp1=mysqli_fetch_array($conp1)){
    if($consp1['FTO']==0){$Prueba1="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp1['Cisco']==0){$Prueba1="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp1['Rackscan']==0){$Prueba1="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp1['Solar']==0){$Prueba1="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp1['Cluster']==0){$Prueba1="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp1['Solar2']==0){$Prueba1="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp1['Sharknado']==0){$Prueba1="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp1['Wiring']==0){$Prueba1="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp1['DEID']==0){$Prueba1="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp1['Megamind']==0){$Prueba1="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp1['EOTA']==0){$Prueba1="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba1="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr1['Modelo']=="Microsoft"){
 if($consp1=mysqli_fetch_array($conp1)){
	if($consp1['FTO']==0){$Prueba1="FTO"; $FTOmcount++;}
	elseif($consp1['Arista0']==0){$Prueba1="Conf. Arista 0"; $Arista0mcount++; } elseif($consp1['Arista1']==0){$Prueba1="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp1['CM']==0){$Prueba1="CM"; $CMmCount++;} elseif($consp1['Cluster0']==0){$Prueba1="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp1['Cluster1']==0){$Prueba1="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp1['Bootstrap']==0){$Prueba1="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp1['Rackscan']==0){$Prueba1="Rackscan"; $Rackscanmcount++;} elseif($consp1['DEID']==0){$Prueba1="DEID";$DEIDmcount++;}
	elseif($consp1['EOTA']==0){$Prueba1="EOTA"; $EOTAmcount++;} else{$Prueba1="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr2['Modelo']=="Azure 4.1"){
 if($consp2=mysqli_fetch_array($conp2)){
	if($consp2['FTO']==0){$Prueba2="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp2['Cisco']==0){$Prueba2="Configurar Cisco"; $Ciscocount=$Ciscocount+1; }elseif($consp2['Rackscan']==0){$Prueba2="Rackscan"; $Rackscancount=$Rackscancount+1;}
	 elseif($consp2['XTEE']==0){$Prueba2="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp2['Cluster']==0){$Prueba2="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp2['Solar']==0){$Prueba2="Solar"; $Solarcount=$Solarcount+1;}  elseif($consp2['Wiring']==0){$Prueba2="Wiring check";$Wiringcount=$Wiringcount+1;}
	elseif($consp2['Bootstrap']==0){$Prueba2="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp2['Sharknado']==0){$Prueba2="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp2['DEID']==0){$Prueba2="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp2['Megamind']==0){$Prueba2="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp2['EOTA']==0){$Prueba2="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba2="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr2['Modelo']=="Dropbox"){
	if($consp2=mysqli_fetch_array($conp2)){
    if($consp2['FTO']==0){$Prueba2="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp2['Cisco']==0){$Prueba2="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp2['Rackscan']==0){$Prueba2="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp2['Solar']==0){$Prueba2="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp2['Cluster']==0){$Prueba2="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp2['Solar2']==0){$Prueba2="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp2['Sharknado']==0){$Prueba2="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp2['Wiring']==0){$Prueba2="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp2['DEID']==0){$Prueba2="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp2['Megamind']==0){$Prueba2="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp2['EOTA']==0){$Prueba2="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba2="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr2['Modelo']=="Microsoft"){
 if($consp2=mysqli_fetch_array($conp2)){
	if($consp2['FTO']==0){$Prueba2="FTO"; $FTOmcount++;}
	elseif($consp2['Arista0']==0){$Prueba2="Conf. Arista 0"; $Arista0mcount++; } elseif($consp2['Arista1']==0){$Prueba2="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp2['CM']==0){$Prueba2="CM"; $CMmCount++;} elseif($consp2['Cluster0']==0){$Prueba2="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp2['Cluster1']==0){$Prueba2="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp2['Bootstrap']==0){$Prueba2="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp2['Rackscan']==0){$Prueba2="Rackscan"; $Rackscanmcount++;} elseif($consp2['DEID']==0){$Prueba2="DEID";$DEIDmcount++;}
	elseif($consp2['EOTA']==0){$Prueba2="EOTA"; $EOTAmcount++;} else{$Prueba2="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr3['Modelo']=="Azure 4.1"){
 if($consp3=mysqli_fetch_array($conp3)){
	if($consp3['FTO']==0){$Prueba3="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp3['Cisco']==0){$Prueba3="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp3['Rackscan']==0){$Prueba3="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp3['XTEE']==0){$Prueba3="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp3['Cluster']==0){$Prueba3="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp3['Solar']==0){$Prueba3="Solar"; $Solarcount=$Solarcount+1;}elseif($consp3['Wiring']==0){$Prueba3="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp3['Bootstrap']==0){$Prueba3="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp3['Sharknado']==0){$Prueba3="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp3['DEID']==0){$Prueba3="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp3['Megamind']==0){$Prueba3="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp3['EOTA']==0){$Prueba3="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba3="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr3['Modelo']=="Dropbox"){
	if($consp3=mysqli_fetch_array($conp3)){
    if($consp3['FTO']==0){$Prueba3="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp3['Cisco']==0){$Prueba3="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp3['Rackscan']==0){$Prueba3="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp3['Solar']==0){$Prueba3="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp3['Cluster']==0){$Prueba3="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp3['Solar2']==0){$Prueba3="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp3['Sharknado']==0){$Prueba3="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp3['Wiring']==0){$Prueba3="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp3['DEID']==0){$Prueba3="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp3['Megamind']==0){$Prueba3="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp3['EOTA']==0){$Prueba3="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba3="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr3['Modelo']=="Microsoft"){
 if($consp3=mysqli_fetch_array($conp3)){
	if($consp3['FTO']==0){$Prueba3="FTO"; $FTOmcount++;}
	elseif($consp3['Arista0']==0){$Prueba3="Conf. Arista 0"; $Arista0mcount++; } elseif($consp3['Arista1']==0){$Prueba3="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp3['CM']==0){$Prueba3="CM"; $CMmCount++;} elseif($consp3['Cluster0']==0){$Prueba3="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp3['Cluster1']==0){$Prueba3="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp3['Bootstrap']==0){$Prueba3="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp3['Rackscan']==0){$Prueba3="Rackscan"; $Rackscanmcount++;} elseif($consp3['DEID']==0){$Prueba3="DEID";$DEIDmcount++;}
	elseif($consp3['EOTA']==0){$Prueba3="EOTA"; $EOTAmcount++;} else{$Prueba3="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr4['Modelo']=="Azure 4.1"){
 if($consp4=mysqli_fetch_array($conp4)){
	if($consp4['FTO']==0){$Prueba4="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp4['Cisco']==0){$Prueba4="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp4['Rackscan']==0){$Prueba4="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp4['XTEE']==0){$Prueba4="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp4['Cluster']==0){$Prueba4="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp4['Solar']==0){$Prueba4="Solar"; $Solarcount=$Solarcount+1;}elseif($consp4['Wiring']==0){$Prueba4="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp4['Bootstrap']==0){$Prueba4="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp4['Sharknado']==0){$Prueba4="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp4['DEID']==0){$Prueba4="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp4['Megamind']==0){$Prueba4="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp4['EOTA']==0){$Prueba4="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba4="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr4['Modelo']=="Dropbox"){
	if($consp4=mysqli_fetch_array($conp4)){
    if($consp4['FTO']==0){$Prueba4="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp4['Cisco']==0){$Prueba4="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp4['Rackscan']==0){$Prueba4="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp4['Solar']==0){$Prueba4="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp4['Cluster']==0){$Prueba4="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp4['Solar2']==0){$Prueba4="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp4['Sharknado']==0){$Prueba4="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp4['Wiring']==0){$Prueba4="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp4['DEID']==0){$Prueba4="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp4['Megamind']==0){$Prueba4="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp4['EOTA']==0){$Prueba4="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba4="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr4['Modelo']=="Microsoft"){
 if($consp4=mysqli_fetch_array($conp4)){
	if($consp4['FTO']==0){$Prueba4="FTO"; $FTOmcount++;}
	elseif($consp4['Arista0']==0){$Prueba4="Conf. Arista 0"; $Arista0mcount++; } elseif($consp4['Arista1']==0){$Prueba4="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp4['CM']==0){$Prueba4="CM"; $CMmCount++;} elseif($consp4['Cluster0']==0){$Prueba4="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp4['Cluster1']==0){$Prueba4="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp4['Bootstrap']==0){$Prueba4="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp4['Rackscan']==0){$Prueba4="Rackscan"; $Rackscanmcount++;} elseif($consp4['DEID']==0){$Prueba4="DEID";$DEIDmcount++;}
	elseif($consp4['EOTA']==0){$Prueba4="EOTA"; $EOTAmcount++;} else{$Prueba4="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr5['Modelo']=="Azure 4.1"){
 if($consp5=mysqli_fetch_array($conp5)){
	if($consp5['FTO']==0){$Prueba5="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp5['Cisco']==0){$Prueba5="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp5['Rackscan']==0){$Prueba5="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp5['XTEE']==0){$Prueba5="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp5['Cluster']==0){$Prueba5="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp5['Solar']==0){$Prueba5="Solar"; $Solarcount=$Solarcount+1;}elseif($consp5['Wiring']==0){$Prueba5="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp5['Bootstrap']==0){$Prueba5="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp5['Sharknado']==0){$Prueba5="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp5['DEID']==0){$Prueba5="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp5['Megamind']==0){$Prueba5="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp5['EOTA']==0){$Prueba5="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba5="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr5['Modelo']=="Dropbox"){
	if($consp5=mysqli_fetch_array($conp5)){
    if($consp5['FTO']==0){$Prueba5="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp5['Cisco']==0){$Prueba5="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp5['Rackscan']==0){$Prueba5="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp5['Solar']==0){$Prueba5="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp5['Cluster']==0){$Prueba5="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp5['Solar2']==0){$Prueba5="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp5['Sharknado']==0){$Prueba5="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp5['Wiring']==0){$Prueba5="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp5['DEID']==0){$Prueba5="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp5['Megamind']==0){$Prueba5="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp5['EOTA']==0){$Prueba5="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba5="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr5['Modelo']=="Microsoft"){
 if($consp5=mysqli_fetch_array($conp5)){
	if($consp5['FTO']==0){$Prueba5="FTO"; $FTOmcount++;}
	elseif($consp5['Arista0']==0){$Prueba5="Conf. Arista 0"; $Arista0mcount++; } elseif($consp5['Arista1']==0){$Prueba5="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp5['CM']==0){$Prueba5="CM"; $CMmCount++;} elseif($consp5['Cluster0']==0){$Prueba5="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp5['Cluster1']==0){$Prueba5="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp5['Bootstrap']==0){$Prueba5="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp5['Rackscan']==0){$Prueba5="Rackscan"; $Rackscanmcount++;} elseif($consp5['DEID']==0){$Prueba5="DEID";$DEIDmcount++;}
	elseif($consp5['EOTA']==0){$Prueba5="EOTA"; $EOTAmcount++;} else{$Prueba5="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr6['Modelo']=="Azure 4.1"){
 if($consp6=mysqli_fetch_array($conp6)){
	if($consp6['FTO']==0){$Prueba6="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp6['Cisco']==0){$Prueba6="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp6['Rackscan']==0){$Prueba6="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp6['XTEE']==0){$Prueba6="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp6['Cluster']==0){$Prueba6="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp6['Solar']==0){$Prueba6="Solar"; $Solarcount=$Solarcount+1;}elseif($consp6['Wiring']==0){$Prueba6="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp6['Bootstrap']==0){$Prueba6="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp6['Sharknado']==0){$Prueba6="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp6['DEID']==0){$Prueba6="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp6['Megamind']==0){$Prueba6="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp6['EOTA']==0){$Prueba6="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba6="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr6['Modelo']=="Dropbox"){
	if($consp6=mysqli_fetch_array($conp6)){
    if($consp6['FTO']==0){$Prueba6="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp6['Cisco']==0){$Prueba6="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp6['Rackscan']==0){$Prueba6="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp6['Solar']==0){$Prueba6="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp6['Cluster']==0){$Prueba6="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp6['Solar2']==0){$Prueba6="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp6['Sharknado']==0){$Prueba6="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp6['Wiring']==0){$Prueba6="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp6['DEID']==0){$Prueba6="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp6['Megamind']==0){$Prueba6="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp6['EOTA']==0){$Prueba6="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba6="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr6['Modelo']=="Microsoft"){
 if($consp6=mysqli_fetch_array($conp6)){
	if($consp6['FTO']==0){$Prueba6="FTO"; $FTOmcount++;}
	elseif($consp6['Arista0']==0){$Prueba6="Conf. Arista 0"; $Arista0mcount++; } elseif($consp6['Arista1']==0){$Prueba6="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp6['CM']==0){$Prueba6="CM"; $CMmCount++;} elseif($consp6['Cluster0']==0){$Prueba6="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp6['Cluster1']==0){$Prueba6="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp6['Bootstrap']==0){$Prueba6="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp6['Rackscan']==0){$Prueba6="Rackscan"; $Rackscanmcount++;} elseif($consp6['DEID']==0){$Prueba6="DEID";$DEIDmcount++;}
	elseif($consp6['EOTA']==0){$Prueba6="EOTA"; $EOTAmcount++;} else{$Prueba6="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr7['Modelo']=="Azure 4.1"){
 if($consp7=mysqli_fetch_array($conp7)){
	if($consp7['FTO']==0){$Prueba7="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp7['Cisco']==0){$Prueba7="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp7['Rackscan']==0){$Prueba7="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp7['XTEE']==0){$Prueba7="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp7['Cluster']==0){$Prueba7="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp7['Solar']==0){$Prueba7="Solar"; $Solarcount=$Solarcount+1;}elseif($consp7['Wiring']==0){$Prueba7="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp7['Bootstrap']==0){$Prueba7="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp7['Sharknado']==0){$Prueba7="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp7['DEID']==0){$Prueba7="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp7['Megamind']==0){$Prueba7="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp7['EOTA']==0){$Prueba7="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba7="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr7['Modelo']=="Dropbox"){
	if($consp7=mysqli_fetch_array($conp7)){
    if($consp7['FTO']==0){$Prueba7="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp7['Cisco']==0){$Prueba7="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp7['Rackscan']==0){$Prueba7="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp7['Solar']==0){$Prueba7="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp7['Cluster']==0){$Prueba7="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp7['Solar2']==0){$Prueba7="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp7['Sharknado']==0){$Prueba7="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp7['Wiring']==0){$Prueba7="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp7['DEID']==0){$Prueba7="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp7['Megamind']==0){$Prueba7="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp7['EOTA']==0){$Prueba7="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba7="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr7['Modelo']=="Microsoft"){
 if($consp7=mysqli_fetch_array($conp7)){
	if($consp7['FTO']==0){$Prueba7="FTO"; $FTOmcount++;}
	elseif($consp7['Arista0']==0){$Prueba7="Conf. Arista 0"; $Arista0mcount++; } elseif($consp7['Arista1']==0){$Prueba7="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp7['CM']==0){$Prueba7="CM"; $CMmCount++;} elseif($consp7['Cluster0']==0){$Prueba7="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp7['Cluster1']==0){$Prueba7="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp7['Bootstrap']==0){$Prueba7="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp7['Rackscan']==0){$Prueba7="Rackscan"; $Rackscanmcount++;} elseif($consp7['DEID']==0){$Prueba7="DEID";$DEIDmcount++;}
	elseif($consp7['EOTA']==0){$Prueba7="EOTA"; $EOTAmcount++;} else{$Prueba7="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr8['Modelo']=="Azure 4.1"){
 if($consp8=mysqli_fetch_array($conp8)){
	if($consp8['FTO']==0){$Prueba8="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp8['Cisco']==0){$Prueba8="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp8['Rackscan']==0){$Prueba8="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp8['XTEE']==0){$Prueba8="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp8['Cluster']==0){$Prueba8="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp8['Solar']==0){$Prueba8="Solar"; $Solarcount=$Solarcount+1;}elseif($consp8['Wiring']==0){$Prueba8="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp8['Bootstrap']==0){$Prueba8="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp8['Sharknado']==0){$Prueba8="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp8['DEID']==0){$Prueba8="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp8['Megamind']==0){$Prueba8="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp8['EOTA']==0){$Prueba8="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba8="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr8['Modelo']=="Dropbox"){
	if($consp8=mysqli_fetch_array($conp8)){
    if($consp8['FTO']==0){$Prueba8="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp8['Cisco']==0){$Prueba8="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp8['Rackscan']==0){$Prueba8="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp8['Solar']==0){$Prueba8="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp8['Cluster']==0){$Prueba8="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp8['Solar2']==0){$Prueba8="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp8['Sharknado']==0){$Prueba8="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp8['Wiring']==0){$Prueba8="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp8['DEID']==0){$Prueba8="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp8['Megamind']==0){$Prueba8="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp8['EOTA']==0){$Prueba8="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba8="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr8['Modelo']=="Microsoft"){
 if($consp8=mysqli_fetch_array($conp8)){
	if($consp8['FTO']==0){$Prueba8="FTO"; $FTOmcount++;}
	elseif($consp8['Arista0']==0){$Prueba8="Conf. Arista 0"; $Arista0mcount++; } elseif($consp8['Arista1']==0){$Prueba8="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp8['CM']==0){$Prueba8="CM"; $CMmCount++;} elseif($consp8['Cluster0']==0){$Prueba8="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp8['Cluster1']==0){$Prueba8="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp8['Bootstrap']==0){$Prueba8="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp8['Rackscan']==0){$Prueba8="Rackscan"; $Rackscanmcount++;} elseif($consp8['DEID']==0){$Prueba8="DEID";$DEIDmcount++;}
	elseif($consp8['EOTA']==0){$Prueba8="EOTA"; $EOTAmcount++;} else{$Prueba8="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr9['Modelo']=="Azure 4.1"){
 if($consp9=mysqli_fetch_array($conp9)){
	if($consp9['FTO']==0){$Prueba9="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp9['Cisco']==0){$Prueba9="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp9['Rackscan']==0){$Prueba9="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp9['XTEE']==0){$Prueba9="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp9['Cluster']==0){$Prueba9="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp9['Solar']==0){$Prueba9="Solar"; $Solarcount=$Solarcount+1;}elseif($consp9['Wiring']==0){$Prueba9="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp9['Bootstrap']==0){$Prueba9="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp9['Sharknado']==0){$Prueba9="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp9['DEID']==0){$Prueba9="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp9['Megamind']==0){$Prueba9="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp9['EOTA']==0){$Prueba9="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba9="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr9['Modelo']=="Dropbox"){
	if($consp9=mysqli_fetch_array($conp9)){
    if($consp9['FTO']==0){$Prueba9="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp9['Cisco']==0){$Prueba9="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp9['Rackscan']==0){$Prueba9="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp9['Solar']==0){$Prueba9="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp9['Cluster']==0){$Prueba9="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp9['Solar2']==0){$Prueba9="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp9['Sharknado']==0){$Prueba9="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp9['Wiring']==0){$Prueba9="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp9['DEID']==0){$Prueba9="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp9['Megamind']==0){$Prueba9="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp9['EOTA']==0){$Prueba9="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba9="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr9['Modelo']=="Microsoft"){
 if($consp9=mysqli_fetch_array($conp9)){
	if($consp9['FTO']==0){$Prueba9="FTO"; $FTOmcount++;}
	elseif($consp9['Arista0']==0){$Prueba9="Conf. Arista 0"; $Arista0mcount++; } elseif($consp9['Arista1']==0){$Prueba9="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp9['CM']==0){$Prueba9="CM"; $CMmCount++;} elseif($consp9['Cluster0']==0){$Prueba9="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp9['Cluster1']==0){$Prueba9="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp9['Bootstrap']==0){$Prueba9="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp9['Rackscan']==0){$Prueba9="Rackscan"; $Rackscanmcount++;} elseif($consp9['DEID']==0){$Prueba9="DEID";$DEIDmcount++;}
	elseif($consp9['EOTA']==0){$Prueba9="EOTA"; $EOTAmcount++;} else{$Prueba9="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr10['Modelo']=="Azure 4.1"){
 if($consp10=mysqli_fetch_array($conp10)){
	if($consp10['FTO']==0){$Prueba10="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp10['Cisco']==0){$Prueba10="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp10['Rackscan']==0){$Prueba10="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp10['XTEE']==0){$Prueba10="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp10['Cluster']==0){$Prueba10="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp10['Solar']==0){$Prueba10="Solar"; $Solarcount=$Solarcount+1;}elseif($consp10['Wiring']==0){$Prueba10="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp10['Bootstrap']==0){$Prueba10="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp10['Sharknado']==0){$Prueba10="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp10['DEID']==0){$Prueba10="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp10['Megamind']==0){$Prueba10="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp10['EOTA']==0){$Prueba10="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba10="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr10['Modelo']=="Dropbox"){
	if($consp10=mysqli_fetch_array($conp10)){
    if($consp10['FTO']==0){$Prueba10="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp10['Cisco']==0){$Prueba10="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp10['Rackscan']==0){$Prueba10="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp10['Solar']==0){$Prueba10="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp10['Cluster']==0){$Prueba10="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp10['Solar2']==0){$Prueba10="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp10['Sharknado']==0){$Prueba10="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp10['Wiring']==0){$Prueba10="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp10['DEID']==0){$Prueba10="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp10['Megamind']==0){$Prueba10="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp10['EOTA']==0){$Prueba10="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba10="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr10['Modelo']=="Microsoft"){
 if($consp10=mysqli_fetch_array($conp10)){
	if($consp10['FTO']==0){$Prueba10="FTO"; $FTOmcount++;}
	elseif($consp10['Arista0']==0){$Prueba10="Conf. Arista 0"; $Arista0mcount++; } elseif($consp10['Arista1']==0){$Prueba10="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp10['CM']==0){$Prueba10="CM"; $CMmCount++;} elseif($consp10['Cluster0']==0){$Prueba10="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp10['Cluster1']==0){$Prueba10="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp10['Bootstrap']==0){$Prueba10="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp10['Rackscan']==0){$Prueba10="Rackscan"; $Rackscanmcount++;} elseif($consp10['DEID']==0){$Prueba10="DEID";$DEIDmcount++;}
	elseif($consp10['EOTA']==0){$Prueba10="EOTA"; $EOTAmcount++;} else{$Prueba10="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr11['Modelo']=="Azure 4.1"){
 if($consp11=mysqli_fetch_array($conp11)){
	if($consp11['FTO']==0){$Prueba11="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp11['Cisco']==0){$Prueba11="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp11['Rackscan']==0){$Prueba11="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp11['XTEE']==0){$Prueba11="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp11['Cluster']==0){$Prueba11="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp11['Solar']==0){$Prueba11="Solar"; $Solarcount=$Solarcount+1;}elseif($consp11['Wiring']==0){$Prueba11="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp11['Bootstrap']==0){$Prueba11="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp11['Sharknado']==0){$Prueba11="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp11['DEID']==0){$Prueba11="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp11['Megamind']==0){$Prueba11="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp11['EOTA']==0){$Prueba11="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba11="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr11['Modelo']=="Dropbox"){
	if($consp11=mysqli_fetch_array($conp11)){
    if($consp11['FTO']==0){$Prueba11="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp11['Cisco']==0){$Prueba11="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp11['Rackscan']==0){$Prueba11="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp11['Solar']==0){$Prueba11="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp11['Cluster']==0){$Prueba11="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp11['Solar2']==0){$Prueba11="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp11['Sharknado']==0){$Prueba11="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp11['Wiring']==0){$Prueba11="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp11['DEID']==0){$Prueba11="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp11['Megamind']==0){$Prueba11="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp11['EOTA']==0){$Prueba11="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba11="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr11['Modelo']=="Microsoft"){
 if($consp11=mysqli_fetch_array($conp11)){
	if($consp11['FTO']==0){$Prueba11="FTO"; $FTOmcount++;}
	elseif($consp11['Arista0']==0){$Prueba11="Conf. Arista 0"; $Arista0mcount++; } elseif($consp11['Arista1']==0){$Prueba11="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp11['CM']==0){$Prueba11="CM"; $CMmCount++;} elseif($consp11['Cluster0']==0){$Prueba11="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp11['Cluster1']==0){$Prueba11="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp11['Bootstrap']==0){$Prueba11="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp11['Rackscan']==0){$Prueba11="Rackscan"; $Rackscanmcount++;} elseif($consp11['DEID']==0){$Prueba11="DEID";$DEIDmcount++;}
	elseif($consp11['EOTA']==0){$Prueba11="EOTA"; $EOTAmcount++;} else{$Prueba11="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr12['Modelo']=="Azure 4.1"){
 if($consp12=mysqli_fetch_array($conp12)){
	if($consp12['FTO']==0){$Prueba12="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp12['Cisco']==0){$Prueba12="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp12['Rackscan']==0){$Prueba12="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp12['XTEE']==0){$Prueba12="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp12['Cluster']==0){$Prueba12="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp12['Solar']==0){$Prueba12="Solar"; $Solarcount=$Solarcount+1;}elseif($consp12['Wiring']==0){$Prueba12="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp12['Bootstrap']==0){$Prueba12="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp12['Sharknado']==0){$Prueba12="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp12['DEID']==0){$Prueba12="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp12['Megamind']==0){$Prueba12="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp12['EOTA']==0){$Prueba12="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba12="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr12['Modelo']=="Dropbox"){
	if($consp12=mysqli_fetch_array($conp12)){
    if($consp12['FTO']==0){$Prueba12="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp12['Cisco']==0){$Prueba12="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp12['Rackscan']==0){$Prueba12="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp12['Solar']==0){$Prueba12="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp12['Cluster']==0){$Prueba12="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp12['Solar2']==0){$Prueba12="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp12['Sharknado']==0){$Prueba12="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp12['Wiring']==0){$Prueba12="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp12['DEID']==0){$Prueba12="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp12['Megamind']==0){$Prueba12="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp12['EOTA']==0){$Prueba12="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba12="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr12['Modelo']=="Microsoft"){
 if($consp12=mysqli_fetch_array($conp12)){
	if($consp12['FTO']==0){$Prueba12="FTO"; $FTOmcount++;}
	elseif($consp12['Arista0']==0){$Prueba12="Conf. Arista 0"; $Arista0mcount++; } elseif($consp12['Arista1']==0){$Prueba12="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp12['CM']==0){$Prueba12="CM"; $CMmCount++;} elseif($consp12['Cluster0']==0){$Prueba12="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp12['Cluster1']==0){$Prueba12="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp12['Bootstrap']==0){$Prueba12="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp12['Rackscan']==0){$Prueba12="Rackscan"; $Rackscanmcount++;} elseif($consp12['DEID']==0){$Prueba12="DEID";$DEIDmcount++;}
	elseif($consp12['EOTA']==0){$Prueba12="EOTA"; $EOTAmcount++;} else{$Prueba12="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr13['Modelo']=="Azure 4.1"){
 if($consp13=mysqli_fetch_array($conp13)){
	if($consp13['FTO']==0){$Prueba13="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp13['Cisco']==0){$Prueba13="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp13['Rackscan']==0){$Prueba13="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp13['XTEE']==0){$Prueba13="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp13['Cluster']==0){$Prueba13="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp13['Solar']==0){$Prueba13="Solar"; $Solarcount=$Solarcount+1;}elseif($consp13['Wiring']==0){$Prueba13="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp13['Bootstrap']==0){$Prueba13="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp13['Sharknado']==0){$Prueba13="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp13['DEID']==0){$Prueba13="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp13['Megamind']==0){$Prueba13="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp13['EOTA']==0){$Prueba13="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba13="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr13['Modelo']=="Dropbox"){
	if($consp13=mysqli_fetch_array($conp13)){
    if($consp13['FTO']==0){$Prueba13="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp13['Cisco']==0){$Prueba13="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp13['Rackscan']==0){$Prueba13="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp13['Solar']==0){$Prueba13="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp13['Cluster']==0){$Prueba13="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp13['Solar2']==0){$Prueba13="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp13['Sharknado']==0){$Prueba13="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp13['Wiring']==0){$Prueba13="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp13['DEID']==0){$Prueba13="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp13['Megamind']==0){$Prueba13="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp13['EOTA']==0){$Prueba13="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba13="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr13['Modelo']=="Microsoft"){
 if($consp13=mysqli_fetch_array($conp13)){
	if($consp13['FTO']==0){$Prueba13="FTO"; $FTOmcount++;}
	elseif($consp13['Arista0']==0){$Prueba13="Conf. Arista 0"; $Arista0mcount++; } elseif($consp13['Arista1']==0){$Prueba13="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp13['CM']==0){$Prueba13="CM"; $CMmCount++;} elseif($consp13['Cluster0']==0){$Prueba13="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp13['Cluster1']==0){$Prueba13="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp13['Bootstrap']==0){$Prueba13="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp13['Rackscan']==0){$Prueba13="Rackscan"; $Rackscanmcount++;} elseif($consp13['DEID']==0){$Prueba13="DEID";$DEIDmcount++;}
	elseif($consp13['EOTA']==0){$Prueba13="EOTA"; $EOTAmcount++;} else{$Prueba13="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr14['Modelo']=="Azure 4.1"){
 if($consp14=mysqli_fetch_array($conp14)){
	if($consp14['FTO']==0){$Prueba14="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp14['Cisco']==0){$Prueba14="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp14['Rackscan']==0){$Prueba14="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp14['XTEE']==0){$Prueba14="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp14['Cluster']==0){$Prueba14="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp14['Solar']==0){$Prueba14="Solar"; $Solarcount=$Solarcount+1;}elseif($consp14['Wiring']==0){$Prueba14="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp14['Bootstrap']==0){$Prueba14="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp14['Sharknado']==0){$Prueba14="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp14['DEID']==0){$Prueba14="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp14['Megamind']==0){$Prueba14="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp14['EOTA']==0){$Prueba14="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba14="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr14['Modelo']=="Dropbox"){
	if($consp14=mysqli_fetch_array($conp14)){
    if($consp14['FTO']==0){$Prueba14="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp14['Cisco']==0){$Prueba14="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp14['Rackscan']==0){$Prueba14="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp14['Solar']==0){$Prueba14="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp14['Cluster']==0){$Prueba14="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp14['Solar2']==0){$Prueba14="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp14['Sharknado']==0){$Prueba14="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp14['Wiring']==0){$Prueba14="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp14['DEID']==0){$Prueba14="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp14['Megamind']==0){$Prueba14="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp14['EOTA']==0){$Prueba14="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba14="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr14['Modelo']=="Microsoft"){
 if($consp14=mysqli_fetch_array($conp14)){
	if($consp14['FTO']==0){$Prueba14="FTO"; $FTOmcount++;}
	elseif($consp14['Arista0']==0){$Prueba14="Conf. Arista 0"; $Arista0mcount++; } elseif($consp14['Arista1']==0){$Prueba14="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp14['CM']==0){$Prueba14="CM"; $CMmCount++;} elseif($consp14['Cluster0']==0){$Prueba14="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp14['Cluster1']==0){$Prueba14="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp14['Bootstrap']==0){$Prueba14="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp14['Rackscan']==0){$Prueba14="Rackscan"; $Rackscanmcount++;} elseif($consp14['DEID']==0){$Prueba14="DEID";$DEIDmcount++;}
	elseif($consp14['EOTA']==0){$Prueba14="EOTA"; $EOTAmcount++;} else{$Prueba14="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr15['Modelo']=="Azure 4.1"){
 if($consp15=mysqli_fetch_array($conp15)){
	if($consp15['FTO']==0){$Prueba15="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp15['Cisco']==0){$Prueba15="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp15['Rackscan']==0){$Prueba15="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp15['XTEE']==0){$Prueba15="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp15['Cluster']==0){$Prueba15="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp15['Solar']==0){$Prueba15="Solar"; $Solarcount=$Solarcount+1;}elseif($consp15['Wiring']==0){$Prueba15="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp15['Bootstrap']==0){$Prueba15="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp15['Sharknado']==0){$Prueba15="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp15['DEID']==0){$Prueba15="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp15['Megamind']==0){$Prueba15="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp15['EOTA']==0){$Prueba15="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba15="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr15['Modelo']=="Dropbox"){
	if($consp15=mysqli_fetch_array($conp15)){
    if($consp15['FTO']==0){$Prueba15="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp15['Cisco']==0){$Prueba15="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp15['Rackscan']==0){$Prueba15="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp15['Solar']==0){$Prueba15="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp15['Cluster']==0){$Prueba15="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp15['Solar2']==0){$Prueba15="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp15['Sharknado']==0){$Prueba15="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp15['Wiring']==0){$Prueba15="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp15['DEID']==0){$Prueba15="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp15['Megamind']==0){$Prueba15="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp15['EOTA']==0){$Prueba15="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba15="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr15['Modelo']=="Microsoft"){
 if($consp15=mysqli_fetch_array($conp15)){
	if($consp15['FTO']==0){$Prueba15="FTO"; $FTOmcount++;}
	elseif($consp15['Arista0']==0){$Prueba15="Conf. Arista 0"; $Arista0mcount++; } elseif($consp15['Arista1']==0){$Prueba15="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp15['CM']==0){$Prueba15="CM"; $CMmCount++;} elseif($consp15['Cluster0']==0){$Prueba15="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp15['Cluster1']==0){$Prueba15="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp15['Bootstrap']==0){$Prueba15="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp15['Rackscan']==0){$Prueba15="Rackscan"; $Rackscanmcount++;} elseif($consp15['DEID']==0){$Prueba15="DEID";$DEIDmcount++;}
	elseif($consp15['EOTA']==0){$Prueba15="EOTA"; $EOTAmcount++;} else{$Prueba15="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr16['Modelo']=="Azure 4.1"){
 if($consp16=mysqli_fetch_array($conp16)){
	if($consp16['FTO']==0){$Prueba16="FTO"; $FTOcount=$FTOcount+1;}
	elseif($consp16['Cisco']==0){$Prueba16="Configurar Cisco"; $Ciscocount=$Ciscocount+1; } elseif($consp16['Rackscan']==0){$Prueba16="Rackscan"; $Rackscancount=$Rackscancount+1;}
	elseif($consp16['XTEE']==0){$Prueba16="XTEE";  $XTEEcount=$XTEEcount+1;} elseif($consp16['Cluster']==0){$Prueba16="Cluster"; $Clustercount=$Clustercount+1;}
	elseif($consp16['Solar']==0){$Prueba16="Solar"; $Solarcount=$Solarcount+1;}elseif($consp16['Wiring']==0){$Prueba16="Wiringchek";$Wiringcount=$Wiringcount+1;}
	elseif($consp16['Bootstrap']==0){$Prueba16="Bootstrap"; $Bootstrapcount=$Bootstrapcount+1;} elseif($consp16['Sharknado']==0){$Prueba16="Sharknado"; $Sharknadocount=$Sharknadocount+1;}
	elseif($consp16['DEID']==0){$Prueba16="DEID"; $DEIDcount=$DEIDcount+1;} elseif($consp16['Megamind']==0){$Prueba16="Megamind"; $Megacount=$Megacount+1;}
	elseif($consp16['EOTA']==0){$Prueba16="EOTA"; $EOTAcount=$EOTAcount+1;} else{$Prueba16="Terminado"; $Listocount=$Listocount+1;} }
}elseif($contr16['Modelo']=="Dropbox"){
	if($consp16=mysqli_fetch_array($conp16)){
    if($consp16['FTO']==0){$Prueba16="FTO"; $FTOdcount=$FTOdcount+1;}
    elseif($consp16['Cisco']==0){$Prueba16="Configurar"; $Ciscodcount=$Ciscodcount+1;} elseif($consp16['Rackscan']==0){$Prueba16="Rackscan"; $Rackscandcount=$Rackscandcount+1;}
    elseif($consp16['Solar']==0){$Prueba16="Solar 1";$Solardcount=$Solardcount+1;} elseif($consp16['Cluster']==0){$Prueba16="Cluster"; $Clusterdcount=$Clusterdcount+1;}
    elseif($consp16['Solar2']==0){$Prueba16="Solar 2";$Solar2dcount=$Solar2dcount+1;} elseif($consp16['Sharknado']==0){$Prueba16="Sharknado"; $Sharknadodcount=$Sharknadodcount+1;}
    elseif($consp16['Wiring']==0){$Prueba16="Wiringcheck"; $Wiringdcount=$Wiringdcount+1;} elseif($consp16['DEID']==0){$Prueba16="DEID"; $DEIDdcount=$DEIDdcount+1;}
    elseif($consp16['Megamind']==0){$Prueba16="Megamind"; $Megadcount=$Megadcount+1;} elseif($consp16['EOTA']==0){$Prueba16="EOTA"; $EOTAdcount=$EOTAdcount+1;}
     else{$Prueba16="Terminado"; $Listodcount=$Listodcount+1;}}
}elseif($contr16['Modelo']=="Microsoft"){
 if($consp16=mysqli_fetch_array($conp16)){
	if($consp16['FTO']==0){$Prueba16="FTO"; $FTOmcount++;}
	elseif($consp16['Arista0']==0){$Prueba16="Conf. Arista 0"; $Arista0mcount++; } elseif($consp16['Arista1']==0){$Prueba16="Conf. Arista 1"; $Arista1mcount++;}
	elseif($consp16['CM']==0){$Prueba16="CM"; $CMmCount++;} elseif($consp16['Cluster0']==0){$Prueba16="Cluster Nic 0"; $Cluster0mcount++;} elseif($consp16['Cluster1']==0){$Prueba16="Cluster Nic 1"; $Cluster1mcount++;} elseif($consp16['Bootstrap']==0){$Prueba16="Bootstrap"; $Bootstrapmcount++;}
	elseif($consp16['Rackscan']==0){$Prueba16="Rackscan"; $Rackscanmcount++;} elseif($consp16['DEID']==0){$Prueba16="DEID";$DEIDmcount++;}
	elseif($consp16['EOTA']==0){$Prueba16="EOTA"; $EOTAmcount++;} else{$Prueba16="Terminado"; $Listomcount=$Listomcount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/




/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
// consultas jv
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/









?>
