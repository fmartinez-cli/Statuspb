<?php 
	
	$enlace =  mysqli_connect('localhost', 'root', 'mantecadas');
	

if($enlace){
		mysqli_select_db($enlace,"statuspb");
	}else{
		die('No pudo conectarse: ' . mysqli_error());
	}

 ?>