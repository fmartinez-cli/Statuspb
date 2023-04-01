  <?php

session_start();
include('conexion.php');
$prueba = $_REQUEST['test'];
$Hora= Date('Y-m-d h:i:s');
$NoReloj = $_SESSION['No_Reloj'];
$NoSerie = $_REQUEST['noserie'];
$Trreg=$_REQUEST['tr'];
$Bahiareg = substr($Trreg, 3,1);

switch($prueba){
case 'fto':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  FTO=1, FTONoReloj='$NoReloj', FTOHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  FTO = FTO + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'arista0':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  Arista0=1, Arista0NoReloj='$NoReloj', Arista0HoraFinal='$Hora' where NoSerie = '$NoSerie'");
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

case 'arista1':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  Arista1=1, Arista1NoReloj='$NoReloj', Arista1HoraFinal='$Hora' where NoSerie = '$NoSerie'");
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

case 'cluster0':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  Cluster0=1, Cluster0NoReloj='$NoReloj', Cluster0HoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Cluster = Cluster + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'cluster1':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  Cluster1=1, Cluster1NoReloj='$NoReloj', Cluster1HoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Cluster = Cluster + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'cm':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  CM=1, CMNoReloj='$NoReloj', CMHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
break;

case 'bootstrap':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  Bootstrap=1, BootstrapNoReloj='$NoReloj', BootstrapHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Bootstrap = Bootstrap + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'rackscan':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  Rackscan=1, RackscanNoReloj='$NoReloj', RackscanHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Rackscan = Rackscan + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'deid':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  DEID=1, DEIDNoReloj='$NoReloj', DEIDHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Deid = Deid + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'eota':
$update=mysqli_query($enlace, "UPDATE pruebasjv set  EOTA=1, EOTANoReloj='$NoReloj', EOTAHoraFinal='$Hora' where NoSerie = '$NoSerie'");
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
 ?>