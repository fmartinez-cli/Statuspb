<!DOCTYPE html>
<html>

<style type="text/css">p{font-size:22px} section{padding-top:50px;}</style>

<head>
	<title></title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/stylef.css">
	<link rel="stylesheet" href="../css/popup.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css" />
	<link rel="shortcut icon" href="../img/checkicon.png" />
	<link rel="stylesheet" href="../css/component.css">
	<link rel="stylesheet" href="../css/moodalbox.css">
</head>


<body class="desarroll" style="background:#ecf0f1;">

<header style="height:50px; background:#3e3e3e;">

			<center><nav>
					<ul class="topnav" style="position:fixed; width:100%; padding-top:10px;">
						<li ><a style="color:#59ABE3; font-weight:bold;" class="hvr-underline-from-center" href="#inicio">
						<img width="15" src="../img/home.png"> Inicio</a></li>
						<li style=""><a  class="hvr-underline-from-center" href="#buscar"><img width="10" src="../img/bay.png"> Buscar Rack / WO</a></li>
						<li><a class="hvr-underline-from-center" href="#bahia"><img width="10" src="../img/bay.png"> Bahias</a></li>
						<li><a class="hvr-underline-from-center" href="#gbic"><img width="10" src="../img/bay.png"> Boton gbic</a></li>
						<li><a class="hvr-underline-from-center" href="#gold"><img width="10" src="../img/bay.png">Golden Rack</a></li>
						<li><a class="hvr-underline-from-center" href="#estadistic"><img width="10" src="../img/bay.png"> Estadisticas</a></li>
						<li><a class="hvr-underline-from-center" href="#gral"><img width="10" src="../img/bay.png">Status Gral</a></li>
						<li><a class="hvr-underline-from-center" href="index.php"><img width="10" src="../img/bay.png"> LVO</a></li>
						<li><a class="hvr-underline-from-center" href="#"><img width="15" src="../img/golden.png"> Golden Rack</a></li>
						</ul>

					</nav>
			</center>


</header>



<br><br>
<section id="inicio">
	<div class="grupo">
		<div class="caja" style="padding-right:10%; padding-left:10%;">
		<h1 style="font-size:2.5em;">Inicio</h1>
			<p >Esta es la pagina de inicio, donde podras encontrar las ultimas 3 noticias y avisos mas relevantes del area de LVO.</p>
			<br><p>Al iniciar sesi&oacute;n se mostrara el nombre del usuario arriba de la barra de menus.</p>
		<img src="../img/inicio.JPG" style="margin-top:15px; margin-bottom:35px;">
			<p>Cada aviso cuenta con la capacidad de hacer comentarios adicionales o preguntas que puedan surgir por parte del personal.</p>
		<img src="../img/comentarios_noticias.JPG" style="margin-top:15px; margin-bottom:35px;">
			<p>En inicio podras reportar fallas, dar sugerencias o comentarios directamente a los programadores para tratar de mantener el sistema al dia y cubrir las nesecidades del departamento. <br><br>
			Tambien encontraras una rapida busqueda de Work Orders y Racks.</p>
		<img src="../img/inicio_buzon.JPG" style="margin-top:15px; margin-bottom:35px;">


		</div>
	</div>
</section>


<hr><br><br>
<section id="buscar">
	<div class="grupo">
		<div class="caja" style="padding-right:10%; padding-left:10%;">
		<h1 style="font-size:2.5em;">Buscar Rack / WO</h1>
			<p >Esta es la pagina de busqueda de rack y work orders.
			<br><br> Para realizar una busqueda ingrese el n&uacute;mero de serie y presione el boton de buscar correspondiente
			</p>

		<img src="../img/buscar.JPG" style="margin-top:15px; margin-bottom:35px;">
			<p>S&iacute; el n&uacute;mero de serie no se encuentra en la base de datos se mostrara uno de los siguientes mensajes dependiendo del caso:</p>
		<img src="../img/noseencontro.JPG" style="margin-top:15px; margin-bottom:35px;">
		<img src="../img/noseencontro2.JPG" style="margin-top:15px; margin-bottom:35px;">
			<p>Al encontrar un rack o WO se mostrara lo siguiente dependiendo del caso:
			<br><br><p>rack</p>
		<img src="../img/rackencontrado.JPG" style="margin-top:15px; margin-bottom:35px;">
		<p>WO</p>
		<img src="../img/woencontrada.JPG" style="margin-top:15px; margin-bottom:35px;">



		</div>
	</div>
</section>

<hr><br><br>
<section id="bahia">
	<dir class="grupo acot">
		<div class="caja" style="padding-right:10%; padding-left:10%;">
		<h1 style="font-size:2.5em;">Seccion de bahia</h1>
		<p>El contenido de esta seccion esta dedicada al buen uso de tu bahia.
		<br><br>Del lado izquierdo, encontramos un boton en el cual se muestra el estatus de los gbics registrados en esa bahia (Para mas informacion visite la seccion "Boton gbic").
		<br><br>En el lado derecho encontramos el codigo de colores indicando la unidad de negocio.
		<br><br>Debajo se muestra un layout de las TRs de las bahias y en cada boton se muestra el estatus de la TR:
		<br><br><ul style="padding-left:15px; padding-bottom:5px; ">
			<li class="fa fa-check" style="padding:5px;"> Disponible: Signica que en esa TR no existe un rack registrado.</li>
			<li class="fa fa-check" style="padding:5px;"> Color azul: Significa que el rack es de modelo 4.1.</li>
			<li class="fa fa-check" style="padding:5px;"> Color verde: Significa que el rack es de modelo Dropbox.</li>
			<li class="fa fa-check" style="padding:5px;"> Color rojo: Significa que el rack es de modelo </li>
		</ul>

		</p>
		<br><img src="../img/bahiaexplica.JPG" style="margin-top:15px; margin-bottom:35px;">
		<br><p>Para registrar un nuevo rack se debera haber iniciado sesi&oacute;n y seleccionar una TR disponible
		<br><br>Al dar click en un rack el t&eacute;cnico podra actualizar las pruebas, de no haber iniciado sesi&oacute;n solo podra observar el estatus del mismo.
		<br><img src="../img/checklist.JPG" style="margin-top:15px; margin-bottom:35px;">
		<br>El tecnico podra cambiar el modelo del rack en caso de una equivocacion, solo en caso de que aun no haya sido actualizado el checklist.
		<br><br>REGISTRO DE CT GBIC A RACK:
		<br><br>Al alcanzar la prueba de rackscan se te solicitara que ingreses el CT del Gbic que se utilizara en el rack para las pruebas posteriores.
		Despues de ingregar el CT de gbic el usuario podra continuar actualizando el checklist. Al llegar a la prueba de bootstrap se solicitara ingresar el o los CTs de los gbics para descasarlos del rack y puedan ser guardados en la caja de herramientas.
		<br><br>ESTADISTICAS DE BAHIA:
		<br><br>Es representada con la tabla que se muestra debajo del layout de TRs, se muestra la informacion de los racks dentro de la bahia y su estatus.
		<img src="../img/statusbahia.JPG">
		<br><br>HERRAMIENTAS:
		<br><br>En esta parte estan contenidas las paginas necesarias para el proceso de pruebas, solo basta con dar clic en cada una para hacer uso de ellas.</p>
		<img src="../img/herramientas.JPG">
		</dir>
	</dir><
</section>

<hr><br><br>
<section id="gbic">
	<dir class="grupo">
		<div class="caja" style="padding-right:10%; padding-left:10%;">
		<h1 style="font-size:2.5em;">Boton gbics</h1>
		<br><center><img src="../img/bgibic.JPG" style="margin-top:15px; margin-bottom:35px; width:80px;"></center>
		<br><p>La funcion de este boton es el proporcionar al usuario la infomacion sobre el estatus de los gbic que pertenecen a la bahia.
		<br><br>Al dar clic sobre el boton se abrira la siguiente ventana:</p>
		<br><img src="../img/vistagbic.JPG" style="margin-top:15px; margin-bottom:35px;">
		<br><br><p>En la ventana se despliega la informacion de los gbic en uso o casados a un rack (en azul), los que se reportaron con falla (en rojo) y los que estan disponibles y funciones (en verde).
		<br><br>Los gbics estaran a cargo de una persona sea tecnico o supervisor jr durante el turno y el estatus podra ser entregado a otra persona sea del mismo turno o del siguiente. En la parte inferior se mostrara el nombre de la persona a cargo en turno y la opcion de entregar el estatus y observar el grafico y estadisticas de gbics con reporte de falla (esta parte solo estara disponible para el encargado del estatus o un supervisor).
		<!-- <br><br>PASAR ESTATUS A OTRO USUARIO:
		<br><br>El encargado del estatus o un supervisor debera entrar a la ventana anterior y dar clic en "Entrega estatus" y sera direccionado a un sitio donde se muestra la informacion general de los dispositivos que pertenecen a la bahia. Para hacer la entrega del estatus sera necesario el numero de reloj y la contrasena del usuario quien recibira el estatus y este ultimo podra hacer comentarios sobre si esta correcta la informacion respecto a lo que esta presente fisicamente en la bahia para tener registro sobre el cambio de estatus.</p>
		<img src="../img/pasarstatus.JPG" style="margin-top:15px; margin-bottom:35px; "> -->
		<br><br></p>
		</div>
	</div>

</section>

<hr><br><br>
<section id=gold>
	<dir class="grupo">
		<div class="caja" style="padding-right:10%; padding-left:10%;">
			<h1 style="font-size:2.5em;">Golden Rack</h1>
			<br><br><br>



		</div>
	</dir>
</section>

<hr><br><br>
<section id=estadistic>
	<dir class="grupo">
		<div class="caja" style="padding-right:10%; padding-left:10%;">
			<h1 style="font-size:2.5em;">Estadisticas</h1>
			<br><p>
				En esta ventana se podran buscar los tiempo de pruebas por Work Order terminadas.

			</p>
			<br><center><img src="../img/estadisticas.JPG" style="margin-top:15px; margin-bottom:35px; width:100%;"></center>

		</div>
	</dir>
</section>


</body>
</html>
