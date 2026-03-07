<!DOCTYPE html>
<html>

<!-- ##################################### -->
<head>
	<title></title>
</head>

<!-- ##################################### -->
<body>
<center>
	<br>
	<h1>Que tipo de falla aparece?</h1>
	<br>
	<form action="expert.php" method="get">
	<input type="radio" name="Falla" value="PXE">PXE <br>
	<input type="radio" name="Falla" value="Linux">Linux command <br>
	<input type="radio" name="Falla" value="Membist"> Membist <br>

	<br>
    <button type="submit">Continuar</button>

</form> </center>

<?php 

$falla=$_REQUEST['Falla'];

switch ($falla) {
	case 'PXE':
	echo'<center>
	<h1>Es uno o varios nodos</h1>
	<br>
	<form action="expert.php" method="get">
	<input type="radio" name="Falla" value="PXE2">Uno<br>
	<input type="radio" name="Falla" value="PXE3">Varios<br>
	

	<br>
    <button type="submit">Continuar</button>

</form> </center>';
		break;
	
	case 'PXE2':
	echo'<center>
	<h1>Checar el cable del cisco al nodo</h1>
	<br>
	<form action="expert.php" method="get">
	<input type="radio" name="Falla" value="PXE4">Funciono<br>
	<input type="radio" name="Falla" value="PXE3">No funciono<br>
	

	<br>
    <button type="submit">Continuar</button>

</form> </center>';
		break;
	case 'PXE3':
	echo'<center>
	<h1>Checa</h1>
	<ul>
	<li>Configuracion del cisco</li>
	<li>Cables rojos o fibra</li>
	<li>Conexion por telnet</li>
	</ul>
	<br>
	<form action="expert.php" method="get">
	<input type="radio" name="Falla" value="PXE4">Funciono<br>
	<input type="radio" name="Falla" value="PXE3">No funciono<br>
	<br>
    <button type="submit">Continuar</button>
</form> </center>';
		break;
}
?>
</body>

</html>

