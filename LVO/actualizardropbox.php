<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['Nombre'])||!isset($_REQUEST['test'])){
    header("Location: index.php");
  }else{
include('conexion.php');
$prueba = $_REQUEST['test'];
$Hora= Date('Y-m-d h:i:s');
$NoReloj = $_SESSION['No_Reloj'];
$NoSerie = $_REQUEST['noserie'];

switch($prueba){
case 'fto':
$update=mysqli_query($enlace, "UPDATE pruebas set  FTO=1, FTONoReloj='$NoReloj', FTOHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  FTO = FTO + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'cisco':
$update=mysqli_query($enlace, "UPDATE pruebas set  Cisco=1, CiscoNoReloj='$NoReloj', CiscoHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Cisco = Cisco + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'rackscan':
$update=mysqli_query($enlace, "UPDATE pruebas set  Rackscan=1, RackscanNoReloj='$NoReloj', RackscanHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Rackscan = Rackscan + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'solar':
$update=mysqli_query($enlace, "UPDATE pruebas set  Solar=1, SolarNoReloj='$NoReloj', SolarHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {$enlace->query($update2);
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Solar = Solar + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'cluster':
$update=mysqli_query($enlace, "UPDATE pruebas set  Cluster=1, ClusterNoReloj='$NoReloj', ClusterHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Cluster = Cluster + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'solar2':
$update=mysqli_query($enlace, "UPDATE pruebas set  Solar2=1, Solar2NoReloj='$NoReloj', Solar2HoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Solar = Solar + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'sharknado':
$update=mysqli_query($enlace, "UPDATE pruebas set  Sharknado=1, SharknadoNoReloj='$NoReloj', SharknadoHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Sharknado = Sharknado + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'wiring':
$update=mysqli_query($enlace, "UPDATE pruebas set  Wiring=1, WiringNoReloj='$NoReloj', WiringHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Wiring = Wiring + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'deid':
$update=mysqli_query($enlace, "UPDATE pruebas set  DEID=1, DEIDNoReloj='$NoReloj', DEIDHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Deid = Deid + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'mega':
$update=mysqli_query($enlace, "UPDATE pruebas set  Megamind=1, MegamindNoReloj='$NoReloj', MegamindHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Mega = Mega + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'eota':
$update=mysqli_query($enlace, "UPDATE pruebas set  EOTA=1, EOTANoReloj='$NoReloj', EOTAHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Eota = Eota + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;
}

$querystats = mysqli_query($enlace, "SELECT * FROM stats WHERE NoReloj = '$NoReloj'"); 
if ($datosstats=mysqli_fetch_array($querystats)) {
  $nivel=$datosstats['Nivel'];
  $puntos=$datosstats['Puntos'];

  $puntosmax=($nivel+1)*1000;
  if($puntos>=$puntosmax){
      $update3=mysqli_query($enlace, "UPDATE stats set  Nivel = Nivel + 1 where NoReloj = '$NoReloj'");
      $enlace->query($update3);
      $nivel2=$nivel+1;
      switch (($nivel2)) {
       case '1':
          $update5=mysqli_query($enlace, "UPDATE stats set  Imagen = 'img/nivel1.png',  Nombre='Aprendiz', Descripcion='Has alcanzado el nivel 1'  where NoReloj = '$NoReloj'");
          $enlace->query($update5);
          break;
        case '5':
          $update5=mysqli_query($enlace, "UPDATE stats set  Imagen = 'img/nivel5.png',  Nombre='Conocedor', Descripcion='Has alcanzado el nivel 5 - Quiza debas descansar'  where NoReloj = '$NoReloj'");
          $enlace->query($update5);
          break;
        case '10':
          $update5=mysqli_query($enlace, "UPDATE stats set  Imagen = 'img/nivel10.png',  Nombre='Respetable', Descripcion='Has alcanzado el nivel 10 - Dejale algo a tus compa&ntilde;eros'  where NoReloj = '$NoReloj'");
          $enlace->query($update5);
          break;
        case '15':
          $update5=mysqli_query($enlace, "UPDATE stats set  Imagen = 'img/nivel15.png',  Nombre='Experto', Descripcion='Has alcanzado el nivel 15 - Vas a terminar con el trabajo tu solo'  where NoReloj = '$NoReloj'");
          $enlace->query($update5);
          break;
        case '20':
          $update5=mysqli_query($enlace, "UPDATE stats set  Imagen = 'img/nivel20.png',  Nombre='Maestro', Descripcion='Has alcanzado el nivel 20 - Deberian de llamarte jefe'  where NoReloj = '$NoReloj'");
          $enlace->query($update5);
          break;  
        case '25':
          $update5=mysqli_query($enlace, "UPDATE stats set  Imagen = 'img/nivel25.png',  Nombre='Jefe Maestro', Descripcion='Has alcanzado el nivel 25 - Ustedes empezaron la guerra, nosotros la acabamos'  where NoReloj = '$NoReloj'");
          $enlace->query($update5);
          break;
        case '30':
          $update5=mysqli_query($enlace, "UPDATE stats set  Imagen = 'img/nivel30.png',  Nombre='Se&ntilde;or de las pruebas', Descripcion='Has alcanzado el nivel 30 - Quiza debas hacer algo mas que trabajar'  where NoReloj = '$NoReloj'");
          $enlace->query($update5);
          break;        
      }
 
  }

  }

 echo "<script>location.href='javascript:history.back(-1);'</script>";
 }
 ?>