<script>
	function Validar2(NoSerie, WO, SKU, Locacion, noserieold, locacionold)
	{
		$.ajax({
			url: "editarrackformbackend.php",
			type: "POST",
			data: "NoSerie="+NoSerie+"&WO="+WO+"&SKU="+SKU+"&Locacion="+Locacion+"&noserieold="+noserieold+"&locacionold="+locacionold,
			success: function(resp){
				$('#resultado2').html(resp)
			}
		});
	}</script>
<?php
session_start();
if($_SESSION['Nivel']!='1'||!isset($_REQUEST['NoSerie'])){
							header("Location: index.php");
							}else{
include('conexion.php');
$NoSerie=$_REQUEST['NoSerie'];
if(preg_match("/^2[mM]{1}2[a-zA-Z0-9]{7}$/", $NoSerie)){
$NoSerieup=strtoupper($NoSerie);

$con=mysqli_query($enlace, "SELECT * FROM racks WHERE NoSerie = '$NoSerieup'");
if($cons=mysqli_fetch_array($con)){

echo '<form id="editarrack"  name="editarrack" method="POST" action="return false" onsubmit="return false">
<input type="hidden" value="'.$cons["NoSerie"].'" name="noserieold" id="noserieold" form="editarrack">
<input type="hidden" value="'.$cons["Locacion"].'" name="locacionold" id="locacionold" form="editarrack">
<input type="text" class="inputl" form="editarrack" title="N&uacute;mero de serie" name="NoSerie2" id="NoSerie2" placeholder="N&uacute;mero de serie" value="'.$cons["NoSerie"].'" maxlength="10" pattern="2[mM]2[a-zA-Z0-9]{7}" required>
<br><input type="text" class="inputl" title="WO: diez digitos" form="editarrack" name="WO" id="WO" placeholder="WO" value="'.$cons["WO"].'" maxlength="9" pattern="[0-9]{9}" required>
<br><input type="text" class="inputl" title="SKU: nueve digistos o letras" form="editarrack" name="SKU" id="SKU" placeholder="SKU" value="'.$cons["SKU"].'" maxlength="10" pattern="[0-9a-zA-Z]{6,10}" required>
<br><input type="text" class="inputl" title="Locacion" form="editarrack" name="Locacion" id="Locacion" placeholder="Locaci&oacute;n" value="'.$cons["Locacion"].'" maxlength="8" pattern="[tT][rR]0[0-9]{1}-[0-9]{2,3}" required>
<br><button name="Actualizar" form="editarrack" style="width:400px;" class="btn1" id="Actualizar"
onclick="Validar2(document.getElementById(\'NoSerie2\').value, document.getElementById(\'WO\').value,
document.getElementById(\'SKU\').value, document.getElementById(\'Locacion\').value, document.getElementById(\'noserieold\').value, document.getElementById(\'locacionold\').value);" >Actualizar</button>
</form>
<br><div id="resultado2" style="font-size:22px;">&nbsp;</div>
';



	}else{
		echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>No se encontro el rack</span>";
	}
}else{
			echo "<span style='color:white; background:#CF000F; margin-top:480px; padding:10px; width:500px; '>Ingrese n&uacute;mero de serie v&aacute;lido</span>";

}


}
 ?>
