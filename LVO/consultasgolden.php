<?php 
include("conexion.php");

$class1_1="linkgolden"; $class1_2="linkgolden"; $class1_3="linkgolden"; $class1_4="linkgolden"; $class1_5="linkgolden";
$class1_6="linkgolden"; $class1_7="linkgolden"; $class1_8="linkgolden"; $class1_9="linkgolden"; $class1_10="linkgolden";
$class1_11="linkgolden"; $class1_12="linkgolden";

$Estado1_1=""; $Estado1_2=""; $Estado1_3=""; $Estado1_4=""; $Estado1_5=""; $Estado1_6=""; $Estado1_7=""; $Estado1_8="";
$Estado1_9=""; $Estado1_10=""; $Estado1_11=""; $Estado1_12="";

$class2_1="linkgolden"; $class2_2="linkgolden"; $class2_3="linkgolden"; $class2_4="linkgolden"; $class2_5="linkgolden";
$class2_6="linkgolden"; $class2_7="linkgolden"; $class2_8="linkgolden"; $class2_9="linkgolden"; $class2_10="linkgolden";
$class2_11="linkgolden"; $class2_12="linkgolden";

$Estado2_1=""; $Estado2_2=""; $Estado2_3=""; $Estado2_4=""; $Estado2_5=""; $Estado2_6=""; $Estado2_7=""; $Estado2_8="";
$Estado2_9=""; $Estado2_10=""; $Estado2_11=""; $Estado2_12="";

$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_1'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_1=$contr1['NoSerie']; $Estado1_1=$contr1['Estatus']; $class1_1="linkgoldenoc"; }else{ $Nodo1_1="CSLOT 5413"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_2'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_2=$contr1['NoSerie']; $Estado1_2=$contr1['Estatus']; $class1_2="linkgoldenoc"; }else{ $Nodo1_2="CSLOT 5414"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_3'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_3=$contr1['NoSerie']; $Estado1_3=$contr1['Estatus']; $class1_3="linkgoldenoc";}else{ $Nodo1_3="CSLOT 5415"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_4'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_4=$contr1['NoSerie']; $Estado1_4=$contr1['Estatus']; $class1_4="linkgoldenoc"; }else{ $Nodo1_4="CSLOT 5416 -"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_5'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_5=$contr1['NoSerie']; $Estado1_5=$contr1['Estatus']; $class1_5="linkgoldenoc"; }else{ $Nodo1_5="CSLOT 5417"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_6'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_6=$contr1['NoSerie']; $Estado1_6=$contr1['Estatus']; $class1_6="linkgoldenoc"; }else{ $Nodo1_6="CSLOT 5418"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_7'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_7=$contr1['NoSerie']; $Estado1_7=$contr1['Estatus']; $class1_7="linkgoldenoc"; }else{ $Nodo1_7="CSLOT 5419"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_8'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_8=$contr1['NoSerie']; $Estado1_8=$contr1['Estatus']; $class1_8="linkgoldenoc";}else{ $Nodo1_8="CSLOT 5420"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_9'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_9=$contr1['NoSerie']; $Estado1_9=$contr1['Estatus']; $class1_9="linkgoldenoc";}else{ $Nodo1_9="CSLOT 5421"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_10'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_10=$contr1['NoSerie']; $Estado1_10=$contr1['Estatus']; $class1_10="linkgoldenoc"; }else{ $Nodo1_10="CSLOT 5422"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_11'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_11=$contr1['NoSerie']; $Estado1_11=$contr1['Estatus']; $class1_11="linkgoldenoc";}else{ $Nodo1_11="CSLOT 5423"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '1_12'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo1_12=$contr1['NoSerie']; $Estado1_12=$contr1['Estatus']; $class1_12="linkgoldenoc";}else{ $Nodo1_12="CSLOT 5424"; }



$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_1'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_1=$contr1['NoSerie'];  $Estado2_1=$contr1['Estatus']; $class2_1="linkgoldenoc"; }else{ $Nodo2_1="CSLOT 5413"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_2'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_2=$contr1['NoSerie']; $Estado2_2=$contr1['Estatus']; $class2_2="linkgoldenoc"; }else{ $Nodo2_2="CSLOT 5414"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_3'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_3=$contr1['NoSerie']; $Estado2_3=$contr1['Estatus']; $class2_3="linkgoldenoc";  }else{ $Nodo2_3="CSLOT 5415"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_4'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_4=$contr1['NoSerie']; $Estado2_4=$contr1['Estatus']; $class2_4="linkgoldenoc"; }else{ $Nodo2_4="CSLOT 5416"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_5'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_5=$contr1['NoSerie']; $Estado2_5=$contr1['Estatus']; $class2_5="linkgoldenoc"; }else{ $Nodo2_5="CSLOT 5417"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_6'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_6=$contr1['NoSerie']; $Estado2_6=$contr1['Estatus']; $class2_6="linkgoldenoc"; }else{ $Nodo2_6="CSLOT 5418"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_7'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_7=$contr1['NoSerie']; $Estado2_7=$contr1['Estatus']; $class2_7="linkgoldenoc"; }else{ $Nodo2_7="CSLOT 5419"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_8'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_8=$contr1['NoSerie']; $Estado2_8=$contr1['Estatus']; $class2_8="linkgoldenoc"; }else{ $Nodo2_8="CSLOT 5420"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_9'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_9=$contr1['NoSerie']; $Estado2_9=$contr1['Estatus']; $class2_9="linkgoldenoc"; }else{ $Nodo2_9="CSLOT 5421"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_10'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_10=$contr1['NoSerie']; $Estado2_10=$contr1['Estatus']; $class2_10="linkgoldenoc"; }else{ $Nodo2_10="CSLOT 5422"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_11'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_11=$contr1['NoSerie']; $Estado2_11=$contr1['Estatus']; $class2_11="linkgoldenoc"; }else{ $Nodo2_11="CSLOT 5423"; }
$constr1=mysqli_query($enlace, "SELECT * FROM golden WHERE Locacion = '2_12'"); if($contr1=mysqli_fetch_array($constr1)){ 
	$Nodo2_12=$contr1['NoSerie']; $Estado2_12=$contr1['Estatus']; $class2_12="linkgoldenoc"; }else{ $Nodo2_12="CSLOT 5424"; }

?>