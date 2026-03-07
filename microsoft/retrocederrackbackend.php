<?php 
session_start();
include('conexion.php');
$NoSerie=$_REQUEST['NoSerie'];
if(preg_match("/^2[mM]{1}2[a-zA-Z0-9]{7}$/", $NoSerie)){
$NoSerieup=strtoupper($NoSerie);	


$query0 = mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie='$NoSerieup'"); 
if($cons=mysqli_fetch_array($query0)){


				if($cons['Modelo']=="Azure 4.1"){

				$query = mysqli_query($enlace, "SELECT racks.Locacion, racks.NoSerie, racks.WO, racks.SKU, 
					racks.Modelo, pruebas.FTO, pruebas.Cisco, pruebas.Rackscan, pruebas.XTEE,  pruebas.Cluster,
					pruebas.Solar, pruebas.Solar2, pruebas.Wiring, pruebas.Bootstrap, pruebas.Sharknado,
					 pruebas.DEID, pruebas.Megamind, pruebas.EOTA
					FROM racks 
					INNER JOIN pruebas on pruebas.NoSerie=racks.NoSerie
					WHERE racks.NoSerie='$NoSerieup'
					ORDER BY Locacion ASC");


				
					echo " <h6><table  class='tablaST'>
						<caption><h1>Azure 4.1</h1></caption>
						<tr><th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th><th>FTO</th><th>Cisco</th><th>Rackscan</th><th>XTEE</th><th>Cluster</th><th>Solar</th>
						<th>Wiring Check</th><th>Bootstrap</th><th>Sharknado</th><th>Deid</th><th>Megamind</th><th>EOTA</th><tr>";
							while ($datos=mysqli_fetch_row($query) ) {


								echo "<td class='tdinfo'>".$datos[0]."</td>";
								echo "<td class='tdinfo'>".$datos[1]."</td>";
								echo "<td class='tdinfo'>".$datos[2]."</td>";
								echo "<td class='tdinfo'>".$datos[3]."</td>";


								if($datos[5]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[6]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[7]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[8]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[9]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[10]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[12]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[13]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[14]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[15]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[16]==1){
									echo "<td bgcolor='#89C4F4'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos[17]==1){
									echo "<td bgcolor='#89C4F4'></td></tr>";
								}else{
									echo "<td></td></tr>";
								}


							}
							echo '</table></h6> 
							<form name="retroaz" id="retroaz" method="post" action="retrocederazure41.php">
							<input type="hidden" name="NoSerie" id="NoSerie" value="'.$NoSerieup.'">
							<button class="btn2" >Desmarcar prueba</button>
							</form>
							';


}elseif($cons['Modelo']=="Dropbox"){


		$query3 = mysqli_query($enlace, "SELECT racks.Locacion, racks.NoSerie, racks.WO, racks.SKU, 
					racks.Modelo, pruebas.FTO, pruebas.Cisco,  pruebas.Rackscan, pruebas.Solar, pruebas.Cluster,
					pruebas.Solar2,  pruebas.Sharknado,
					pruebas.Wiring, pruebas.DEID, pruebas.Megamind, pruebas.EOTA
					FROM racks 
					INNER JOIN pruebas on pruebas.NoSerie=racks.NoSerie
					WHERE racks.NoSerie='$NoSerieup'
					ORDER BY Locacion ASC");

				
					echo "  <h6>
					<table width='100%' class='tablaST'>
						<caption><h1>Dropbox</h1></caption>
						<tr><th>Locacion</th><th>No Serie</th><th>WO</th><th>SKU</th><th>FTO</th><th>Cisco</th><th>Rackscan</th><th>Solar 1</th><th>Cluster</th><th>Solar 2</th>
							<th>Sharknado</th><th>Wiring Check</th><th>Deid</th><th>Megamind</th><th>EOTA</th><tr>

							";
							while ($datos3=mysqli_fetch_row($query3) ) {


								echo "<td class='tdinfo'>".$datos3[0]."</td>";
								echo "<td class='tdinfo'>".$datos3[1]."</td>";
								echo "<td class='tdinfo'>".$datos3[2]."</td>";
								echo "<td class='tdinfo'>".$datos3[3]."</td>";


								if($datos3[5]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[6]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[7]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[8]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[9]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[10]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[11]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[12]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[13]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[14]==1){
									echo "<td bgcolor='#66CC99'></td>";
								}else{
									echo "<td></td>";
								}
								if($datos3[15]==1){
									echo "<td bgcolor='#66CC99'></td></tr>";
								}else{
									echo "<td></td></tr>";
								}



							}

							echo '</table></h6>
							<form name="retrodrop" id="retrdrop" method="post" action="retrocederdrop.php">
							<input type="hidden" name="NoSerie" id="NoSerie" value="'.$NoSerieup.'">
							<button class="btn2" >Desmarcar prueba</button>
							</form>';


}

	}else{
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>No se encontro el rack</span>";
	}
}else{
			echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>Ingrese n&uacute;mero de serie v&aacute;lido</span>";

}



 ?>