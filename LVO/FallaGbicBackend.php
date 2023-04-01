<?php 
							session_start();
							if($_SESSION['Nivel']!='1'||!isset($_REQUEST['ctgbic'])){
							header("Location: index.php");
							}else{
							include('conexion.php');

							//$ctgbic=$_REQUEST['ctgbic'];
							$ctgbic=strtoupper($_REQUEST['ctgbic']);
							$Hora= Date('Y-m-d h:i:s');

							$cons=mysqli_query($enlace,"SELECT * FROM gibics where  CtGibic='$ctgbic'");
							$rescons=mysqli_fetch_array($cons);

							if($rescons['falla']=='1'){
								echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>Gbic fue registrado anteriormente</span>";

							}else{

							if(($ctgbic!='')&&(strlen($ctgbic)>7)){

							$query2= mysqli_query($enlace, "SELECT * FROM gibics where  CtGibic='$ctgbic'") ;

							
							if ($datos=mysqli_fetch_array($query2) ) {

								if($datos['NoSerie']==''){
									$delete=$enlace->query("UPDATE gibics SET falla='1', fechafalla='$Hora' where CtGibic = '$ctgbic'");

									if ($delete) {

    									echo "<span style='color:white; background:#22A7F0; margin-top:480px; padding:10px; width:500px; '> Se registr&oacute; Gbic con falla correctamente</span>";
									} else {
   										echo "<span style='color:#CF000F; font-size:20px;'>No se pudo registrar falla Gbic</span>";
									}

								}else{
									echo "<span style='color:white; background:#D91E18; margin-top:480px; padding:10px; width:500px; '>El Gbic se encuentra registrado en un Rack</span>";
								}

								}else{

									echo "<span style='color:white; background:#D91E18; margin-top:480px; padding:10px; width:500px; '>No se encontro el Gbic</span>";
								} 
								
							}else{
								echo "<span style='color:white; background:#D91E18; margin-top:480px; padding:10px; width:500px; '>Ingrese un Ct de Gbic v&aacute;lido</span>";
							}  //fin else principal
						}//falla
						}
								?>