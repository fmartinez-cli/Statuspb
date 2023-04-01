<?php 
							session_start();
							if($_SESSION['Nivel']!='1'||!isset($_REQUEST['ctgbic'])){
							header("Location: index.php");
							}else{
							include('conexion.php');

							$ctgbic=strtoupper($_REQUEST['ctgbic']);


							if(($ctgbic!='')&&(strlen($ctgbic)>7)){

							$query2= mysqli_query($enlace, "SELECT * FROM gibics where  CtGibic='$ctgbic'") ; 
							
							
							if ($datos=mysqli_fetch_array($query2) ) {

								if($datos['NoSerie']==''){
									$delete=$enlace->query("DELETE FROM gibics  where CtGibic = '$ctgbic'");

									if ($delete) {

    									echo "<span style='color:white; background:#22A7F0; margin-top:480px; padding:10px; width:500px; '> El Gbic se elimin&oacute; correctamente</span>";
									} else {
   										echo "<span style='color:#CF000F; font-size:20px;'>No se pudo eliminar el Gbic</span>";
									}

								}else{
									echo "<span style='color:white; background:#D91E18; margin-top:480px; padding:10px; width:500px; '>El Gbic se encuentra registrado en un Rack</span>";
								}

								}else{

									echo "<span style='color:white; background:#D91E18; margin-top:480px; padding:10px; width:500px; '>No se encontro el Gbic</span>";
								}
								
							}else{
								echo "<span style='color:white; background:#D91E18; margin-top:480px; padding:10px; width:500px; '>Ingrese un Ct de Gbic v&aacute;lido</span>";
							}
						}
								?>