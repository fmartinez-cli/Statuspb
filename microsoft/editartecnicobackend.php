<?php 
							session_start();
							if($_SESSION['Nivel']!='1'||!isset($_REQUEST['NoReloj'])){
							header("Location: index.php");
							}else{
							include('conexion.php');
							$NoReloj=$_REQUEST['NoReloj'];


							if(preg_match("/^[0-9]{5}$/", $NoReloj)){

							$query2= mysqli_query($enlace, "SELECT * FROM users where  Nivel='2' AND No_Reloj='$NoReloj'") ; 
							
							
							if ($datos=mysqli_fetch_row($query2) ) {
								echo '
								<div><form action="editartecnicoform.php" method="post" >
								<input type="hidden" name="NoReloj" value="'.$datos["0"].'">
								<button class="btn2" style="width:800px;"><h6><b>Nombre: <b>'.$datos["2"].'<b>  &nbsp;&nbsp;&nbsp;  <b>No. Reloj:</b> '.$datos["0"].' &nbsp;&nbsp;&nbsp;  <b>Turno:</b> '.$datos["3"].'  &nbsp;&nbsp;&nbsp;  <b>Bahia:</b> '.$datos["5"].'</h6></button>
								</form>
								</div>	

								';

								}else{

									echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>No se encontro el n&uacute;mero de reloj</span>";
								}
								
							}else{
								echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>Ingrese un n&uacute;mero de reloj v&aacute;lido</span>";
							}
						}
								?>