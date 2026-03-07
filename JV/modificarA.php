<?php
echo '<link rel="stylesheet" type="text/css" href="../css/style.css">
 		 <meta http-equiv="Refresh" content="2; url=index.php">		';
 	echo '<link rel="stylesheet" type="text/css" href="../css/stylef.css">';
 	echo '<script src="../js/jquery-1.3.2.min.js"></script>';
    echo '<script src="../js/functions.js"></script>';
	echo '	<script src="../js/sweetalert.min.js"></script> ';
	echo '	<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">';
include("conexion.php");
$id=$_REQUEST['id'];
echo $id;
$titulo=$_REQUEST['titulo'];
$comentario=$_REQUEST['descripcion'];
$ruta="../upload";
$imagen=$_FILES['imagen']['tmp_name'];
$imagenn=$_FILES['imagen']['name'];
move_uploaded_file($imagen, $ruta."/".$imagenn);

$ruta= $ruta."/".$imagenn;
$actual = array("<", ">", "/", '\\', "'", '"', 'ñ','Ñ', 'á', 'é', 'í', 'ó', 'ú');
$nuevo  = array("&lt ", "&gt", "&#47;", "&#92;", "&#39;", '&#34;', '&ntilde;', '&Ntilde;','&aacute;' ,'&eacute;' ,'&iacute;' ,'&oacute;' ,'&uacute;'  );
$Comentariofinal = str_replace($actual, $nuevo, $comentario);

echo "<header>
		<div class='grupo total'>
			<div class='caja'>
				<center>
				<img width='35%' style='padding-top:40px' src='../img/fox.png'>
				</center>
			</div>
		</div>
	</header> ";

 $query="UPDATE imagenes SET titulo='$titulo', imagen='$ruta', descripcion='$comentario' WHERE id='$id'";
 if (mysqli_query($enlace, $query)){
 	echo "<script>jQuery(function(){swal({
  				title: 'Aviso modificado con exito!',
  				type: 'success',
  				timer: 5000,
  				showConfirmButton: false
				});
	});
	</script>";
 }else{echo "Error updating record1: ";
 }

 ?>
