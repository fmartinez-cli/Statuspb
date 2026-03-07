<?php
// datos de la conexión
$servername = "localhost";
$username = "root";
$password = "1Maginart3";
$database = "statuspb";

// crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// cerrar la conexión
$conn->close();
?>




<!-- ANTIGUA FORMA DE CONECTARSE -->
<!-- <?php 
	
	$enlace =  mysqli_connect('localhost', 'root', '1Maginart3', 'statuspb');
	

if($enlace){
		mysqli_select_db($enlace,"statuspb");
	}else{
		die('No pudo conectarse: ' . mysqli_error());
	}

 ?> -->