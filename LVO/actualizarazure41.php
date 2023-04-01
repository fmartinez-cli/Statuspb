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
$Trreg=$_REQUEST['tr'];
$Bahiareg = substr($Trreg, 3,1);

switch($prueba){
case 'fto':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  FTO=1, FTONoReloj='$NoReloj', FTOHoraFinal='$Hora' where NoSerie = '$NoSerie'");
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


case 'quicktest':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  QuickTest=1, QuickTestNoReloj='$NoReloj', QuickTestHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  QuickTest = QuickTest + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);

break; 

case 'stress':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  Stress=1, StressNoReloj='$NoReloj', StressHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Stress = Stress + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'mdaas':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  MDaaS=1, MDaaSNoReloj='$NoReloj', MDaaSHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 200 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  MDaaS = MDaaS + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;


case 'RackTest':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  RackTest=1, RackTestNoReloj='$NoReloj', RackTestHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  RackTest = RackTest + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'fti':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  FTI=1, FTINoReloj='$NoReloj', FTIHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  FTI = FTI + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'bootstrap':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  BSL=1, BSLNoReloj='$NoReloj', BSLHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  BSL = BSL + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'cts':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  BSL=1, BSLNoReloj='$NoReloj', BSLHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}
$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 100 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  BSL = BSL + 1 where NoReloj = '$NoReloj'");
$enlace->query($update4);
break;

case 'packing':
$update=mysqli_query($enlace, "UPDATE pruebasMicro set  Packing=1, SharknadoNoReloj='$NoReloj', PackingHoraFinal='$Hora' where NoSerie = '$NoSerie'");
if ($enlace->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $enlace->error;
}$update2=mysqli_query($enlace, "UPDATE stats set  Puntos = Puntos + 50 where NoReloj = '$NoReloj'");
$enlace->query($update2);
$update4=mysqli_query($enlace, "UPDATE stats set  Packing = Packing + 1 where NoReloj = '$NoReloj'");
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