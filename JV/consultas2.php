<?php
include("conexion.php");


					$constr1=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR02-09' AND area='JV'"); if($contr1=mysqli_fetch_array($constr1)){ $NoSerie1=$contr1['NoSerie']; }else{ $NoSerie1="Disponible"; }
					$constr2=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR02-10' AND area='JV'"); if($contr2=mysqli_fetch_array($constr2)){ $NoSerie2=$contr2['NoSerie']; }else{ $NoSerie2="Disponible"; }
					$constr3=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR02-11' AND area='JV'"); if($contr3=mysqli_fetch_array($constr3)){ $NoSerie3=$contr3['NoSerie']; }else{ $NoSerie3="Disponible"; }
					$constr4=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR02-12' AND area='JV'"); if($contr4=mysqli_fetch_array($constr4)){ $NoSerie4=$contr4['NoSerie']; }else{ $NoSerie4="Disponible"; }
					$constr5=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR02-13' AND area='JV'"); if($contr5=mysqli_fetch_array($constr5)){ $NoSerie5=$contr5['NoSerie']; }else{ $NoSerie5="Disponible"; }
					$constr6=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR02-14' AND area='JV'"); if($contr6=mysqli_fetch_array($constr6)){ $NoSerie6=$contr6['NoSerie']; }else{ $NoSerie6="Disponible"; }
					$constr7=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR02-15' AND area='JV'"); if($contr7=mysqli_fetch_array($constr7)){ $NoSerie7=$contr7['NoSerie']; }else{ $NoSerie7="Disponible"; }
					$constr8=mysqli_query($enlace, "SELECT * FROM racksjv WHERE Locacion = 'TR02-16' AND area='JV'"); if($contr8=mysqli_fetch_array($constr8)){ $NoSerie8=$contr8['NoSerie']; }else{ $NoSerie8="Disponible"; }

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$Prueba1="&nbsp;"; $Prueba2="&nbsp;"; $Prueba3="&nbsp;"; $Prueba4="&nbsp;"; $Prueba5="&nbsp;"; $Prueba6="&nbsp;"; $Prueba7="&nbsp;";
					$Prueba8="&nbsp;";
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$FTOcount=0; $Arista0count=0; $Arista1count=0;  $Rackscancount=0; $Cluster0count=0; $Cluster1count=0;  $Bootstrapcount=0;
					$DEIDcount=0;  $EOTAcount=0; $Listocount=0; $CMCount=0;

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$conp1=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie1'");
$conp2=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie2'");
$conp3=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie3'");
$conp4=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie4'");
$conp5=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie5'");
$conp6=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie6'");
$conp7=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie7'");
$conp8=mysqli_query($enlace, "SELECT * FROM pruebasjv WHERE NoSerie = '$NoSerie8'");

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr1['Modelo']=="Microsoft"){
 if($consp1=mysqli_fetch_array($conp1)){
	if($consp1['FTO']==0){$Prueba1="FTO"; $FTOcount++;}
	elseif($consp1['Arista0']==0){$Prueba1="Conf. Arista 0"; $Arista0count++; } elseif($consp1['Arista1']==0){$Prueba1="Conf. Arista 1"; $Arista1count++;}
	elseif($consp1['CM']==0){$Prueba1="CM"; $CMCount++;} elseif($consp1['Cluster0']==0){$Prueba1="Cluster Nic 0"; $Cluster0count++;} elseif($consp1['Cluster1']==0){$Prueba1="Cluster Nic 1"; $Cluster1count++;} elseif($consp1['Bootstrap']==0){$Prueba1="Bootstrap"; $Bootstrapcount++;}
	elseif($consp1['Rackscan']==0){$Prueba1="Rackscan"; $Rackscancount++;} elseif($consp1['DEID']==0){$Prueba1="DEID";$DEIDcount++;}
	elseif($consp1['EOTA']==0){$Prueba1="EOTA"; $EOTAcount++;} else{$Prueba1="Terminado"; $Listocount=$Listocount+1;} }
}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if($contr2['Modelo']=="Microsoft"){
 if($consp2=mysqli_fetch_array($conp2)){
	if($consp2['FTO']==0){$Prueba2="FTO"; $FTOcount++;}
	elseif($consp2['Arista0']==0){$Prueba2="Conf. Arista 0"; $Arista0count++; } elseif($consp2['Arista1']==0){$Prueba2="Conf. Arista 1"; $Arista1count++;}
	elseif($consp2['CM']==0){$Prueba2="CM"; $CMCount++;} elseif($consp2['Cluster0']==0){$Prueba2="Cluster Nic 0"; $Cluster0count++;} elseif($consp2['Cluster1']==0){$Prueba2="Cluster Nic 1"; $Cluster1count++;} elseif($consp2['Bootstrap']==0){$Prueba2="Bootstrap"; $Bootstrapcount++;}
	elseif($consp2['Rackscan']==0){$Prueba2="Rackscan"; $Rackscancount++;} elseif($consp2['DEID']==0){$Prueba2="DEID";$DEIDcount++;}
	elseif($consp2['EOTA']==0){$Prueba2="EOTA"; $EOTAcount++;} else{$Prueba2="Terminado"; $Listocount=$Listocount+1;} }
}


/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr3['Modelo']=="Microsoft"){
 if($consp3=mysqli_fetch_array($conp3)){
	if($consp3['FTO']==0){$Prueba3="FTO"; $FTOcount++;}
	elseif($consp3['Arista0']==0){$Prueba3="Conf. Arista 0"; $Arista0count++; } elseif($consp3['Arista1']==0){$Prueba3="Conf. Arista 1"; $Arista1count++;}
	elseif($consp3['CM']==0){$Prueba3="CM"; $CMCount++;} elseif($consp3['Cluster0']==0){$Prueba3="Cluster Nic 0"; $Cluster0count++;} elseif($consp3['Cluster1']==0){$Prueba3="Cluster Nic 1"; $Cluster1count++;} elseif($consp3['Bootstrap']==0){$Prueba3="Bootstrap"; $Bootstrapcount++;}
	elseif($consp3['Rackscan']==0){$Prueba3="Rackscan"; $Rackscancount++;} elseif($consp3['DEID']==0){$Prueba3="DEID";$DEIDcount++;}
	elseif($consp3['EOTA']==0){$Prueba3="EOTA"; $EOTAcount++;} else{$Prueba3="Terminado"; $Listocount=$Listocount+1;} }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr4['Modelo']=="Microsoft"){
 if($consp4=mysqli_fetch_array($conp4)){
	if($consp4['FTO']==0){$Prueba4="FTO"; $FTOcount++;}
	elseif($consp4['Arista0']==0){$Prueba4="Conf. Arista 0"; $Arista0count++; } elseif($consp4['Arista1']==0){$Prueba4="Conf. Arista 1"; $Arista1count++;}
	elseif($consp4['CM']==0){$Prueba4="CM"; $CMCount++;} elseif($consp4['Cluster0']==0){$Prueba4="Cluster Nic 0"; $Cluster0count++;} elseif($consp4['Cluster1']==0){$Prueba4="Cluster Nic 1"; $Cluster1count++;} elseif($consp4['Bootstrap']==0){$Prueba4="Bootstrap"; $Bootstrapcount++;}
	elseif($consp4['Rackscan']==0){$Prueba4="Rackscan"; $Rackscancount++;} elseif($consp4['DEID']==0){$Prueba4="DEID";$DEIDcount++;}
	elseif($consp4['EOTA']==0){$Prueba4="EOTA"; $EOTAcount++;} else{$Prueba4="Terminado"; $Listocount=$Listocount+1;} }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr5['Modelo']=="Microsoft"){
 if($consp5=mysqli_fetch_array($conp5)){
	if($consp5['FTO']==0){$Prueba5="FTO"; $FTOcount++;}
	elseif($consp5['Arista0']==0){$Prueba5="Conf. Arista 0"; $Arista0count++; } elseif($consp5['Arista1']==0){$Prueba5="Conf. Arista 1"; $Arista1count++;}
	elseif($consp5['CM']==0){$Prueba5="CM"; $CMCount++;} elseif($consp5['Cluster0']==0){$Prueba5="Cluster Nic 0"; $Cluster0count++;} elseif($consp5['Cluster1']==0){$Prueba5="Cluster Nic 1"; $Cluster1count++;} elseif($consp5['Bootstrap']==0){$Prueba5="Bootstrap"; $Bootstrapcount++;}
	elseif($consp5['Rackscan']==0){$Prueba5="Rackscan"; $Rackscancount++;} elseif($consp5['DEID']==0){$Prueba5="DEID";$DEIDcount++;}
	elseif($consp5['EOTA']==0){$Prueba5="EOTA"; $EOTAcount++;} else{$Prueba5="Terminado"; $Listocount=$Listocount+1;} }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr6['Modelo']=="Microsoft"){
 if($consp6=mysqli_fetch_array($conp6)){
	if($consp6['FTO']==0){$Prueba6="FTO"; $FTOcount++;}
	elseif($consp6['Arista0']==0){$Prueba6="Conf. Arista 0"; $Arista0count++; } elseif($consp6['Arista1']==0){$Prueba6="Conf. Arista 1"; $Arista1count++;}
	elseif($consp6['CM']==0){$Prueba6="CM"; $CMCount++;} elseif($consp6['Cluster0']==0){$Prueba6="Cluster Nic 0"; $Cluster0count++;} elseif($consp6['Cluster1']==0){$Prueba6="Cluster Nic 1"; $Cluster1count++;} elseif($consp6['Bootstrap']==0){$Prueba6="Bootstrap"; $Bootstrapcount++;}
	elseif($consp6['Rackscan']==0){$Prueba6="Rackscan"; $Rackscancount++;} elseif($consp6['DEID']==0){$Prueba6="DEID";$DEIDcount++;}
	elseif($consp6['EOTA']==0){$Prueba6="EOTA"; $EOTAcount++;} else{$Prueba6="Terminado"; $Listocount=$Listocount+1;} }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr7['Modelo']=="Microsoft"){
 if($consp7=mysqli_fetch_array($conp7)){
	if($consp7['FTO']==0){$Prueba7="FTO"; $FTOcount++;}
	elseif($consp7['Arista0']==0){$Prueba7="Conf. Arista 0"; $Arista0count++; } elseif($consp7['Arista1']==0){$Prueba7="Conf. Arista 1"; $Arista1count++;}
	elseif($consp7['CM']==0){$Prueba7="CM"; $CMCount++;} elseif($consp7['Cluster0']==0){$Prueba7="Cluster Nic 0"; $Cluster0count++;} elseif($consp7['Cluster1']==0){$Prueba7="Cluster Nic 1"; $Cluster1count++;} elseif($consp7['Bootstrap']==0){$Prueba7="Bootstrap"; $Bootstrapcount++;}
	elseif($consp7['Rackscan']==0){$Prueba7="Rackscan"; $Rackscancount++;} elseif($consp7['DEID']==0){$Prueba7="DEID";$DEIDcount++;}
	elseif($consp7['EOTA']==0){$Prueba7="EOTA"; $EOTAcount++;} else{$Prueba7="Terminado"; $Listocount=$Listocount+1;} }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

if($contr8['Modelo']=="Microsoft"){
 if($consp8=mysqli_fetch_array($conp8)){
	if($consp8['FTO']==0){$Prueba8="FTO"; $FTOcount++;}
	elseif($consp8['Arista0']==0){$Prueba8="Conf. Arista 0"; $Arista0count++; } elseif($consp8['Arista1']==0){$Prueba8="Conf. Arista 1"; $Arista1count++;}
	elseif($consp8['CM']==0){$Prueba8="CM"; $CMCount++;} elseif($consp8['Cluster0']==0){$Prueba8="Cluster Nic 0"; $Cluster0count++;} elseif($consp8['Cluster1']==0){$Prueba8="Cluster Nic 1"; $Cluster1count++;} elseif($consp8['Bootstrap']==0){$Prueba8="Bootstrap"; $Bootstrapcount++;}
	elseif($consp8['Rackscan']==0){$Prueba8="Rackscan"; $Rackscancount++;} elseif($consp8['DEID']==0){$Prueba8="DEID";$DEIDcount++;}
	elseif($consp8['EOTA']==0){$Prueba8="EOTA"; $EOTAcount++;} else{$Prueba8="Terminado"; $Listocount=$Listocount+1;} }
}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

?>
