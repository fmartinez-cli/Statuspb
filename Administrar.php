<?php

include('LVO/conexion.php');

session_start();
?>
<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

  <section>
    <div class="grupo">
      <div class="caja">
        <?php  if(isset($_SESSION['Nombre'])&& $_SESSION['Nivel']=="1"){ ?>
          <center>
            <div class="foto">
              <center>
                <div id="titulo"><h1>Subir Aviso</h1></div><br>
                <form action="Raviso.php" method="post" enctype="multipart/form-data" onsubmit="return Validate(this);">
                  <input type="file" name="imagen">
                  <br /><br/>
                  <input class="inputl" type="text" name="titulo" placeholder="Titulo" required><br><br>
                  <textarea name="descripcion" rows="20" cols="60" placeholder="descripcion..." maxlength="2000" required></textarea>
                  <br><br>
                  <button class="btn1" type="submit">Subir</button>
                </form>
              </div>
            </center>
          </div></center>

          <?php } ?>
        </div>
      </div>
    </section>

    <!-- ********************ccomentario perosnal***********************************-->


  	<?php if(isset($_SESSION['No_Reloj'])){

  		?>
  	<p class="flotante " id="yey0" style="width:102px; background-color:#3e3e3e; color:white; font-weight:bold; padding:10px; font-size:12px; z-index:100; bottom:41px;">Nota personal</p>
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
  	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:100; background-color: #FAFAFA; color: #000000; display:none;">

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
  	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:100; background-color: #FAFAFA; color: #000000; display:none;">

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
  	font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; padding:10px; border: #333333 0px solid; z-index:100; background-color: #FAFAFA; color: #000000; display:none;">

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
</body>

<!-- scripsa adicionales -->
<script src="js/cbpHorizontalSlideOutMenu.min.js"></script>
<script>
var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
</script>

</html>
