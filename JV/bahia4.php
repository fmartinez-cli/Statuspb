<?php
include('conexion.php');
include('consultas4.php');

session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bahia 4</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/stylef.css">
  <link rel="stylesheet" href="../css/popup.css">
  <link rel="stylesheet" type="text/css" href="../css/default.css" />
  <link rel="shortcut icon" href="../img/checkicon.png" />
  <link rel="stylesheet" href="../css/component.css">
  <link rel="stylesheet" href="../css/moodalbox.css">
  <script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="../js/block.js"></script>

  <script type="text/javascript"> function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
  }
  function justNumbers(e)
  {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8))
    return true;

    return /\d/.test(String.fromCharCode(keynum));
  }
  </script>
  <script type="text/javascript" src="../js/mootools.js"></script>
  <script type="text/javascript" src="../js/moodalbox.js"></script>
  <link rel="stylesheet" href="../css/moodalbox.css" type="text/css" media="screen"/>
</head>
<body class="desarroll">
  <header>
    <div class="grupo ">
      <div class="caja">
        <div class="container">
          <header class="clearfix header2">
            <span>Ingenieria de pruebas</span>
            <a href="/Statuspb/index.php"><h1><i class="fa fa-server" aria-hidden="true"></i> Foxconn Cabgs - Joint Venture</h1></a>

            <?php  if(isset($_SESSION['Nombre'])){ echo '<div class="nombre" style="left:1em; height:20px; width:30%; text-align:left;"> <p class="info" title="">'.$_SESSION["Nombre"].' <span>N&uacute;mero de reloj: '.$_SESSION["No_Reloj"].' <br>Turno: '.$_SESSION['Turno'].'&deg; </span></p></div>';}?>
              <?php
              if (isset($_SESSION['Nombre'])){
                echo '
                <div class="" style=" position:absolute; right:10px; top:10px;"> <a class="" href="administrar.php"><img width="25" src="../img/admin.png"></a></div><br>
                ';
              }
              ?>
            </header>
          </div>
        </div>
      </div>
      <div class="grupo total">
        <div class="caja">
          <center>
            <nav>
              <ul class="topnav">
                <li ><a class="hvr-underline-from-center" href="index.php"><img width="15" src="../img/home.png"> Inicio</a></li>
                <li style=""><a  class="hvr-underline-from-center" href="bahia1.php"><img width="10" src="../img/bay.png"> Bahia 1</a></li>
                <li><a class="hvr-underline-from-center" href="bahia2.php"><img width="10" src="../img/bay.png"> Bahia 2</a></li>
                <li><a class="hvr-underline-from-center" href="bahia3.php"><img width="10" src="../img/bay.png"> Bahia 3</a></li>
                <li><a style="color:#CC263A; font-weight:bold;" class="hvr-underline-from-center" href="bahia4.php"><img width="10" src="../img/bay.png"> Bahia 4</a></li>
                <li><a class="hvr-underline-from-center" href="estadisticas.php"><img width="25" src="../img/estadisticas.png"> Estad&iacute;sticas</a></li>
                <li><a class="hvr-underline-from-center" href="statusgral.php"><img width="32" src="../img/status.png"> Estatus General</a></li>
                <?php  if(isset($_SESSION['Nombre'])){ echo '<li><a class="hvr-underline-from-center" href="logout.php"><img width="25" src="../img/logout.png"></a></li>';}
                else{ echo '<li><a class="hvr-underline-from-center" href="#modal"><img width="25" src="../img/login.png"></a></li>'; }?>
                <li class="icon">
                  <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a></li>
                </ul>

              </nav></center>
            </div>
          </div>
        </header>
        <section>
          <!-- ********************LOGIN***********************************-->
          <?php
          if(!isset($_SESSION['Nombre'])){
            echo '<center> <div id="modal" style="width:500px;">
            <div class="modal-content ">
            <div class="header">
            <h2>Iniciar Sesion</h2>
            </div>
            <div class="copy">
            <div class="grupo">
            <div class="caja">
            <form method="post" action="login.php" class="login">
            <input type="text" name="Usuario" placeholder="N&uacute;mero de reloj" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'N&uacute;mero de reloj\'" maxlength="5" pattern=".{5,}" onkeypress="return justNumbers(event);">
            <br><input type="password" name="Password" placeholder="Contrase&ntilde;a" required onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Contrase&ntilde;a\'">
            <script type="text/javascript"> var URLactual = window.location.href+"#";
            document.write("<input type=\"hidden\" name=\"Url\" value="+URLactual+">");
            </script>
            <br><button style="width:300px;  padding:0px;" class="btn1">Aceptar</button>
            <br><input style="width:250px; padding:0px;" class="btn2" type="button" value="Cerrar" onClick=" window.location.href=\'#\' ">
            </form>

            </div>
            </div>
            </div>
            </div>
            <div class="overlay"></div>
            </div></center>'
            ;}?>
            <!-- ********************LOGIN***********************************-->
          </section>
          <section>
            <div class="grupo">
              <div class="caja ">
                <center>
                  <table>
                    <tr>
                      <td id="open1" class="_<?php echo ($contr1['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr1['Modelo'] == 'Microsoft' ? 'trs4' :  'trs3')) ;?> hvr-bob hvr-underline-from-center"> <a id="popup1" class="link1" href="modales.php?pb=<?php echo "$NoSerie1"; ?>&tr=TR04-25" rel="moodalbox" ><div class="link"> TR04-25 <hr> <br><?php echo $Prueba1; echo "</br>".$NoSerie1; ?></div></a></td>
                      <td id="open2" class="_<?php echo ($contr2['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr2['Modelo'] == 'Microsoft' ? 'trs4' :  'trs3')) ;?> hvr-bob hvr-underline-from-center"> <a id="popup2" class="link1" href="modales.php?pb=<?php echo "$NoSerie2"; ?>&tr=TR04-26" rel="moodalbox" ><div class="link">TR04-26 <hr><br> <?php echo $Prueba2; echo "</br>".$NoSerie2; ?></div></a></td>
                      <td id="open3" class="_<?php echo ($contr3['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr3['Modelo'] == 'Microsoft' ? 'trs4' :  'trs3')) ;?> hvr-bob hvr-underline-from-center"><a id="popup3" class="link1" href="modales.php?pb=<?php echo "$NoSerie3"; ?>&tr=TR04-27" rel="moodalbox" > <div class="link">TR04-27 <hr> <br><?php echo $Prueba3; echo "</br>".$NoSerie3; ?></div></a></td>
                      <td id="open4" class="_<?php echo ($contr4['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr4['Modelo'] == 'Microsoft' ? 'trs4' :  'trs3')) ;?> hvr-bob hvr-underline-from-center"> <a id="popup4" class="link1" href="modales.php?pb=<?php echo "$NoSerie4"; ?>&tr=TR04-28" rel="moodalbox" ><div class="link">TR04-28 <hr> <br><?php echo $Prueba4; echo "</br>".$NoSerie4; ?></div></a></td>
                      <td id="open5" class="_<?php echo ($contr5['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr5['Modelo'] == 'Microsoft' ? 'trs4' :  'trs3')) ;?> hvr-bob hvr-underline-from-center">  <a id="popup5" class="link1" href="modales.php?pb=<?php echo "$NoSerie5"; ?>&tr=TR04-29" rel="moodalbox" > <div class="link">TR04-29 <hr><br> <?php echo $Prueba5; echo "</br>".$NoSerie5; ?></div></a></td>
                      <td id="open6" class="_<?php echo ($contr6['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr6['Modelo'] == 'Microsoft' ? 'trs4' :  'trs3')) ;?> hvr-bob hvr-underline-from-center">  <a id="popup6" class="link1" href="modales.php?pb=<?php echo "$NoSerie6"; ?>&tr=TR04-30" rel="moodalbox" > <div class="link">TR04-30 <hr> <br><?php echo $Prueba6; echo "</br>".$NoSerie6; ?></div></a></td>
                      <td id="open7" class="_<?php echo ($contr7['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr7['Modelo'] == 'Microsoft' ? 'trs4' :  'trs3')) ;?> hvr-bob hvr-underline-from-center" > <a id="popup7" class="link1" href="modales.php?pb=<?php echo "$NoSerie7"; ?>&tr=TR04-31" rel="moodalbox" >  <div class="link">TR04-31 <hr><br> <?php echo $Prueba7; echo "</br>".$NoSerie7; ?></div></a></td>
                      <td id="open8" class="_<?php echo ($contr8['Modelo'] == 'Azure 4.1' ? 'trs' :  ($contr8['Modelo'] == 'Microsoft' ? 'trs4' :  'trs3')) ;?> hvr-bob hvr-underline-from-center">  <a id="popup8" class="link1" href="modales.php?pb=<?php echo "$NoSerie8"; ?>&tr=TR04-32" rel="moodalbox" > <div class="link">TR04-32 <hr><br> <?php echo $Prueba8; echo "</br>".$NoSerie8; ?></div></a></td>
                    </tr>
                  </table>
                </center>
              </div>
            </div>
          </section>
          <section>
            <div class="grupo">
              <?php
              $query0 = mysqli_query($enlace, "SELECT racksjv.NoSerie, racksjv.Modelo FROM racksjv INNER JOIN pruebasjv on
              pruebasjv.NoSerie=racksjv.NoSerie WHERE Bahia = '4' AND Modelo='Microsoft' AND area='JV'");
              $query = mysqli_query($enlace, "SELECT racksjv.Locacion, racksjv.NoSerie, racksjv.WO, racksjv.SKU,
              racksjv.Modelo, pruebasjv.FTO, pruebasjv.Arista0, pruebasjv.Arista1, pruebasjv.CM, pruebasjv.Cluster0, pruebasjv.Cluster1,
              pruebasjv.Bootstrap, pruebasjv.Rackscan, pruebasjv.DEID,  pruebasjv.EOTA
              FROM racksjv
              INNER JOIN pruebasjv on pruebasjv.NoSerie=racksjv.NoSerie
              WHERE Bahia='4' AND Modelo = 'Microsoft' AND area='JV'
              ORDER BY Locacion ASC");
              if($datos0=mysqli_fetch_row($query0)){
                echo " <div class='caja'>
                <table width='100%' style='opacity:.9;' class='tablaST'>
                <caption style='background-color:#3e3e3e; opacity:.7; padding:10px; color:white;'><h1>Microsoft</h1></caption>
                <tr><th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th><th>FTO</th><th>Arista 0</th><th>Arista 1</th>
                <th>CM</th><th>Cluster Nic 0</th><th>Cluster Nic 1</th><th>Bootstrap</th>
                <th>Rackscan</th><th>DEID</th><th>EOTA</th></tr>
                ";
                while ($datos=mysqli_fetch_row($query) ) {
                  echo "<tr><td class='tdinfo'>".$datos[0]."</td>";
                  echo "<td class='tdinfo'>".$datos[1]."</td>";
                  echo "<td class='tdinfo'>".$datos[2]."</td>";
                  echo "<td class='tdinfo'>".$datos[3]."</td>";
                  if($datos[5]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[6]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[7]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[8]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[9]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[10]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[11]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[12]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[13]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  if($datos[14]==1){
                    echo "<td bgcolor='#CC263A'></td>";
                  }else{
                    echo "<td></td></tr>";
                  }
                }
                $Total= $FTOcount+$Arista0count+$Arista1count+$Rackscancount+$Cluster0count+$Cluster1count+$Bootstrapcount+$DEIDcount+$CMCount+$EOTAcount+$Listocount;
                echo '<tr>
                <td colspan="2" class="contaz">Total: '.$Total.'</td>
                <td colspan="2" class="contaz">Terminado: '.$Listocount.'</td>
                <td class="contaz">'.$FTOcount.'</td>
                <td class="contaz">'.$Arista0count.'</td>
                <td class="contaz">'.$Arista1count.'</td>
                <td class="contaz">'.$CMCount.'</td>
                <td class="contaz">'.$Cluster0count.'</td>
                <td class="contaz">'.$Cluster1count.'</td>
                <td class="contaz">'.$Bootstrapcount.'</td>
                <td class="contaz">'.$Rackscancount.'</td>
                <td class="contaz">'.$DEIDcount.'</td>
                <td class="contaz">'.$EOTAcount.'</td>
                </tr>

                </table> </div>';
              }
              ?>

            </div>
          </section>
          <section>
            <center>
              <div class="grupo">
                <div class="caja">


                  <!-- ********************ccomentario perosnal***********************************-->


                	<?php if(isset($_SESSION['No_Reloj'])){

                		?>
                	<p class="flotante " id="yey0" style="width:102px; background-color:#3e3e3e; color:white; font-weight:bold; padding:10px; font-size:12px; z-index:1; bottom:41px;">Nota personal</p>
                	<form>
                	<input class="flotante btn2" id="yey" style="width:32px; padding:10px; font-size:12px; z-index:1" type="button"
                	onclick="mostrarVentana3()"
                	value="3">
                	</form>
                	<form>
                	<input class="flotante btn2" id="yey2" style="width:32px; padding:10px; font-size:12px; z-index:1; right:40px;" type="button"
                	onclick="mostrarVentana2()"
                	value="2">
                	</form>
                	<form>
                	<input class="flotante btn2" id="yey3" style="width:32px; padding:10px; font-size:12px; z-index:1; right:75px;" type="button"
                	onclick="mostrarVentana()"
                	value="1">
                	</form>

                	<?php
                	}
                	?>



                	<!-- nota 1*************************************************************************************************** -->
                	<div id="miVentana" style="position: fixed; width: 900px; height: 600px; top: 0; left: 0;
                	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

                	<?php
                	$variable= $_SESSION['No_Reloj'];
                	$query = mysqli_query($enlace, "SELECT Comentario FROM users WHERE No_Reloj = '$variable'");  ?>

                	<center><h2>Nota personal 1</h2></center>
                <form method="post" action="guardarnota.php">
                <textarea name="area" cols="20" rows="50" height="600" ><?php if($datos=mysqli_fetch_row($query)){echo $datos[0];} ?></textarea>
                <input type="hidden" value="1" name="valor"  id="valor">
                <script type="text/javascript">
                CKEDITOR.replace('area');
                 CKEDITOR.config.height = 400
                </script>


                	<input style="float:left;" class="btn1" type="submit" value="Guardar">
                	</form>

                	<form  style="float:right;">
                	<input class="btn1" type="button"
                	onclick="ocultarVentana()"
                	value="Cerrar">
                	</form>
                	</div>
                <!-- fin nota 1*************************************************************************************************** -->

                <!-- nota 2*************************************************************************************************** -->
                <div id="miVentana2" style="position: fixed; width: 900px; height: 600px; top: 0; left: 0;
                	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

                	<?php
                	$variable= $_SESSION['No_Reloj'];
                	$query = mysqli_query($enlace, "SELECT Comentario2 FROM users WHERE No_Reloj = '$variable'");  ?>

                	<center><h2>Nota personal 2</h2></center>
                <form method="post" action="guardarnota.php">
                <textarea name="area2" cols="20" rows="50" height="600" ><?php if($datos=mysqli_fetch_row($query)){echo $datos[0];} ?></textarea>
                <input type="hidden" value="2" name="valor" id="valor">
                <script type="text/javascript">
                CKEDITOR.replace('area2');
                 CKEDITOR.config.height = 400
                </script>


                	<input style="float:left;" class="btn1" type="submit" value="Guardar">
                	</form>

                	<form  style="float:right;">
                	<input class="btn1" type="button"
                	onclick="ocultarVentana()"
                	value="Cerrar">
                	</form>
                	</div>
                <!-- fin nota 2*************************************************************************************************** -->

                <!-- nota 3*************************************************************************************************** -->
                <div id="miVentana3" style="position: fixed; width: 900px; height: 600px; top: 0; left: 0;
                	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; background-color: #FAFAFA; color: #000000; display:none;">

                	<?php
                	$variable= $_SESSION['No_Reloj'];
                	$query = mysqli_query($enlace, "SELECT Comentario3 FROM users WHERE No_Reloj = '$variable'");  ?>

                	<center><h2>Nota personal 3</h2></center>
                <form method="post" action="guardarnota.php">
                <textarea name="area3" cols="20" rows="50" height="600" ><?php if($datos=mysqli_fetch_row($query)){echo $datos[0];} ?></textarea>
                <input type="hidden" value="3" name="valor" id="valor">
                <script type="text/javascript">
                CKEDITOR.replace('area3');
                 CKEDITOR.config.height = 400
                </script>


                	<input style="float:left;" class="btn1" type="submit" value="Guardar">
                	</form>

                	<form  style="float:right;">
                	<input class="btn1" type="button"
                	onclick="ocultarVentana()"
                	value="Cerrar">
                	</form>
                	</div>
                <!-- fin nota 3*************************************************************************************************** -->



                	<script type="text/javascript">
                	function mostrarVentana()
                {
                    var ventana = document.getElementById('miVentana');
                    ventana.style.marginTop = "30px";
                    ventana.style.left = ((document.body.clientWidth-900) / 2) +  "px";
                    ventana.style.display = 'block';

                    var yey0 = document.getElementById('yey0');
                    yey0.style.display = 'none';
                    var yey = document.getElementById('yey');
                    yey.style.display = 'none';
                    var yey2 = document.getElementById('yey2');
                    yey2.style.display = 'none';
                    var yey3 = document.getElementById('yey3');
                    yey3.style.display = 'none';
                }
                function mostrarVentana2()
                {
                    var ventana = document.getElementById('miVentana2');
                    ventana.style.marginTop = "30px";
                    ventana.style.left = ((document.body.clientWidth-900) / 2) +  "px";
                    ventana.style.display = 'block';

                   var yey0 = document.getElementById('yey0');
                    yey0.style.display = 'none';
                    var yey = document.getElementById('yey');
                    yey.style.display = 'none';
                    var yey2 = document.getElementById('yey2');
                    yey2.style.display = 'none';
                    var yey3 = document.getElementById('yey3');
                    yey3.style.display = 'none';
                }
                function mostrarVentana3()
                {
                    var ventana = document.getElementById('miVentana3');
                    ventana.style.marginTop = "30px";
                    ventana.style.left = ((document.body.clientWidth-900) / 2) +  "px";
                    ventana.style.display = 'block';

                    var yey0 = document.getElementById('yey0');
                    yey0.style.display = 'none';
                    var yey = document.getElementById('yey');
                    yey.style.display = 'none';
                    var yey2 = document.getElementById('yey2');
                    yey2.style.display = 'none';
                    var yey3 = document.getElementById('yey3');
                    yey3.style.display = 'none';
                }


                function ocultarVentana()
                {
                    var ventana = document.getElementById('miVentana');
                    ventana.style.display = 'none';
                     var ventana = document.getElementById('miVentana2');
                    ventana.style.display = 'none';
                     var ventana = document.getElementById('miVentana3');
                    ventana.style.display = 'none';

                    var yey0 = document.getElementById('yey0');
                    yey0.style.display = 'block';
                    var yey = document.getElementById('yey');
                    yey.style.display = 'block';
                    var yey2 = document.getElementById('yey2');
                    yey2.style.display = 'block';
                    var yey3 = document.getElementById('yey3');
                    yey3.style.display = 'block';
                }


                </script>



                	<!-- fin de comentario personal -->


                <br><br>

              </div>
            </div>
          </center>
        </section>

        <!-- ********************Sin Sesion***********************************-->

        <!-- ********************LOGIN***********************************-->

      </body>
      </html>
