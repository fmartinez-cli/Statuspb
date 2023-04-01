<?php 

 	echo '<link rel="stylesheet" type="text/css" href="../css/style.css">';
 	echo '<link rel="stylesheet" type="text/css" href="../css/stylef.css">';
 	echo '<script src="../js/jquery-1.3.2.min.js"></script>';
    echo '<script src="../js/functions.js"></script>';
	echo '	<script src="../js/sweetalert.min.js"></script> ';
	echo '	<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">';

include('conexion.php');

$id=$_REQUEST['id'];
 $query="DELETE FROM imagenes WHERE id='$id'";

	echo "<header>
		<div class='grupo total'>
			<div class='caja'>
				<center>
				<img width='35%' style='padding-top:40px' src='../img/fox.png'>
				</center>
			</div>
		</div>
	</header> ";

 if (mysqli_query($enlace, $query)){

	echo "<script>jQuery(function(){swal({
  				title: 'Aviso eliminado con exito!',
  				type: 'success',
  				timer: 5000,
  				showConfirmButton: false
				}); setTimeout('history.back(-1)',1500);
	}); 
	</script>";

 }else{echo "Error updating record1: ";
 }
 ?>