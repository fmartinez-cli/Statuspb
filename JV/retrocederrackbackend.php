<?php
session_start();
include('conexion.php');
$NoSerie=$_REQUEST['NoSerie'];
if(preg_match("/^2[mM]{1}2[a-zA-Z0-9]{7}$/", $NoSerie)){
$NoSerieup=strtoupper($NoSerie);


$query0 = mysqli_query($enlace, "SELECT * FROM racksjv WHERE NoSerie='$NoSerieup'");
if($cons=mysqli_fetch_array($query0)){


				if($cons['Modelo']=="Microsoft"){

					$query0 = mysqli_query($enlace, "SELECT racksjv.NoSerie, racksjv.Modelo FROM racksjv INNER JOIN pruebasjv on
					pruebasjv.NoSerie=racksjv.NoSerie WHERE Bahia = '1' AND Modelo='Microsoft' AND area='JV'");
					$query = mysqli_query($enlace, "SELECT racksjv.Locacion, racksjv.NoSerie, racksjv.WO, racksjv.SKU,
					racksjv.Modelo, pruebasjv.FTO, pruebasjv.Arista0, pruebasjv.Arista1, pruebasjv.CM, pruebasjv.Cluster0, pruebasjv.Cluster1,
					pruebasjv.Bootstrap, pruebasjv.Rackscan, pruebasjv.DEID,  pruebasjv.EOTA
					FROM racksjv
					INNER JOIN pruebasjv on pruebasjv.NoSerie=racksjv.NoSerie
					WHERE  racksjv.NoSerie='$NoSerieup'
					ORDER BY Locacion ASC");
					if($datos0=mysqli_fetch_row($query0)){
						echo " <div class='caja'>
						<table width='100%' style='opacity:.9;' class='tablaST'>
						<caption style='background-color:#3e3e3e; opacity:.7; padding:10px; color:white;'><h1>Microsoft</h1></caption>
						<tr><th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th><th>FTO</th><th>Arista 0</th><th>Arista 1</th>
						<th>CM</th><th>Cluster Nic 0</th><th>Cluster Nic 1</th><th>Bootstrap</th>
						<th>Rackscan</th><th>DEID</th><th>EOTA</th></tr>
						";
						while ($datos=mysqli_fetch_row($query) ) {
							echo "<tr><td class='tdinfo'>".$datos[0]."</td>";
							echo "<td class='tdinfo'>".$datos[1]."</td>";
							echo "<td class='tdinfo'>".$datos[2]."</td>";
							echo "<td class='tdinfo'>".$datos[3]."</td>";
							if($datos[5]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[6]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[7]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[8]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[9]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[10]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[11]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[12]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[13]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td>";
							}
							if($datos[14]==1){
								echo "<td bgcolor='#CC263A'></td>";
							}else{
								echo "<td></td></tr>";
							}
						}
					}
				}

					// echo " <h6><table  class='tablaST'>
					// 	<caption><h1>Azure 4.1</h1></caption>
					// 	<tr><th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th><th>FTO</th><th>Cisco</th><th>Rackscan</th><th>XTEE</th><th>Cluster</th><th>Solar</th>
					// 	<th>Wiring Check</th><th>Bootstrap</th><th>Sharknado</th><th>Deid</th><th>Megamind</th><th>EOTA</th><tr>";
					// 		while ($datos=mysqli_fetch_row($query) ) {
					//
					//
					// 			echo "<td class='tdinfo'>".$datos[0]."</td>";
					// 			echo "<td class='tdinfo'>".$datos[1]."</td>";
					// 			echo "<td class='tdinfo'>".$datos[2]."</td>";
					// 			echo "<td class='tdinfo'>".$datos[3]."</td>";
					//
					//
					// 			if($datos[5]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[6]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[7]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[8]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[9]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[10]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[12]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[13]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[14]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[15]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[16]==1){
					// 				echo "<td bgcolor='#89C4F4'></td>";
					// 			}else{
					// 				echo "<td></td>";
					// 			}
					// 			if($datos[17]==1){
					// 				echo "<td bgcolor='#89C4F4'></td></tr>";
					// 			}else{
					// 				echo "<td></td></tr>";
					// 			}
					//
					//
					// 		}
							echo '</table></h6>
							<form name="retroaz" id="retroaz" method="post" action="retrocederJV.php">
							<input type="hidden" name="NoSerie" id="NoSerie" value="'.$NoSerieup.'">
							<button class="btn1" >Desmarcar prueba</button>
							</form>
							';




	}else{
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>No se encontro el rack</span>";
	}
}else{
			echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>Ingrese n&uacute;mero de serie v&aacute;lido</span>";

}



 ?>
