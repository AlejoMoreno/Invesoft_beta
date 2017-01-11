<?php 



include_once "../conexion.php"; 
$conexion= conexion();
//consulta all terceros
$bill_cliente = mysqli_query($conexion,"SELECT * FROM  `terceros` where `tipo` like 'cliente'") or die(mysqli_error($conexion)); 
$rawdata = array(); //creamos un array
 
//guardamos en un array multidimensional todos los datos de la consulta
$i=0;

while($row = mysqli_fetch_array($bill_cliente))
{
    $rawdata[$i] = $row;
    $i++;
}
//consulta all documentos
$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision`") or die(mysqli_error($conexion)); 
$rawdatadoc = array(); //creamos un array
 
//guardamos en un array multidimensional todos los datos de la consulta
$i=0;

while($row = mysqli_fetch_array($bill_remision))
{
    $rawdatadoc[$i] = $row;
    $i++;
}

//eliminacion de remision
if(isset($_POST['beliminacompra'])){
	$documento = $_POST['documento'];
	$tercero = $_POST['tercero'];

	if($documento == '' or $tercero == ''){
		echo '<p>Faltan campos por diligenciar</p>';
	}
	else{
		$bill_tercero = mysqli_query($conexion,"SELECT * FROM  `terceros` where `nit` like '$tercero'") or die(mysqli_error($conexion));
		$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision` where `documento` like '$documento'") or die(mysqli_error($conexion));  

		$row = $bill_tercero->fetch_assoc();
		$idtercero = $row['idclientes'];
		$tipo = $row['tipo'];
		$row = $bill_remision->fetch_assoc();
		$idtercero1 = $row['idclientes'];
		$idremision = $row['idremision'];

		$tdoc = substr($documento, 0,1);


		if($bill_tercero->num_rows == 0 or $bill_remision->num_rows == 0){
			echo '<p>Verifique los campos ya que no se encuentran registrados</p>';
		}
		elseif ($idtercero != $idtercero1) {
			echo '<p>Verifique los campos ya que el documento no pertenece al tercero</p>';
		}
		else{
			if ($tipo=='PROVEEDOR') {
				$signo = '-';
			}
			else {
				$signo = '+';
			}
			//quitar los saldos de los productos descontar del inventario
			$bill_productos = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `idkit` LIKE  '$documento'") or die(mysqli_error($conexion));
			while($row = $bill_productos->fetch_assoc()){
				$idinventario = $row['idinventario'];
				$cantidad = $row['cantidad'];
				if($tdoc=='O' or $tdoc=='N'){
					echo '<p>Es una Orden no descuenta del inventario</p>';	
				}
				else{
					descontarInventario($idinventario,$cantidad,$signo);	
				}
			}
  
			//DELETE FROM `remision` WHERE `remision.idremision` = '$idremision';
			$sql = "UPDATE `remision` SET `estado` = '4'  WHERE  `idremision` ='$idremision'";
			mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
			echo "Eliminados Satisfactoriamente";
			echo "<script type='text/javascript'>
				window.open('../eliminar/anularDocumento.php', 'MsgWindow', 'width=800%, height=600');
			</script>";
		}
	}
}

function descontarInventario($idinventario,$cantidad,$signo){
	include_once "../conexion.php"; 
	$conexion= conexion();
	$bill_salida = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `idinventario` LIKE '$idinventario' ") or die(mysqli_error($conexion));
	$row = $bill_salida->fetch_assoc();
	$saldoanterior = $row['saldo'];

	if($signo=='-'){
		$saldo = $saldoanterior - $cantidad;	
	}
	else{
		$saldo = $saldoanterior + $cantidad;
	}

	$sql = "UPDATE `inventario` SET  
	  `saldo` = '$saldo'
	   WHERE `inventario`.`idinventario` = '$idinventario'";
   
    mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
	
    echo 'Usted ha actualizado correctamente.'; 
}

?>

<table  class="tg">
	<tr>
		<td class="tg-bw1g">Nombre</td>
		<td class="tg-bw1g">Nit</td>
		<td class="tg-bw1g">Institucion</td>
		<td class="tg-bw1g">Teléfono</td>
	</tr>
	<?php
	for ($i=0; $i < sizeof($rawdata); $i++) { 
		echo '<tr>
		<td  class="tg-96dg">'.$rawdata[$i][3].'</td>
		<td>'.$rawdata[$i][5].'</td>
		<td  class="tg-96dg">'.$rawdata[$i][4].'</td>
		<td  class="tg-96dg">'.$rawdata[$i][6].'</td>
		</tr>';
	}
	?>
</table>
<br><br>
<table  class="tg">
	<tr>
		<td class="tg-bw1g">Nit</td>
		<td class="tg-bw1g">Estado</td>
		<td class="tg-bw1g">Documento</td>		
		<td class="tg-bw1g">Total</td>
	</tr>
	<?php
	for ($i=0; $i < sizeof($rawdatadoc); $i++) { 
		echo '<tr>
		<td  class="tg-96dg">'.$rawdatadoc[$i][5].'</td>
		<td  class="tg-96dg">'.$rawdatadoc[$i][11].'</td>
		<td>'.$rawdatadoc[$i][14].'</td>
		<td  class="tg-96dg">'.$rawdatadoc[$i][13].'</td>
		</tr>';
	}
	?>
</table>
<br><br><hr><br>

<form action="" method="post">
	<label>Documento:</label><input type="text" name="documento" id="documento" placeholder="ej.(C123)">
	<label>Tercero:</label><input type="text" name="tercero" id="tercero" placeholder="Nit.ej.(1030570356)">
	<input type="submit" name="beliminacompra" id="boton" value="Anular">
</form>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-g4jy{color:#00009b;vertical-align:top}
.tg .tg-bw1g{color:#00009b;text-align:center;vertical-align:top}
.tg .tg-96dg{color:#9b9b9b;vertical-align:top}
input,select {outline: none;display: block;width: 10%;border: 1px solid #d9d9d9;margin: 10px 10px 20px;padding: 10px 15px 10px 10px;}
input:focus,select:focus{border: 2px solid #BD0A29;}
#boton{	color: #F9F9F9;	background: rgba(201,65,90,1);	background: -moz-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(201,65,90,1)), color-stop(100%, rgba(189,10,40,1)));	background: -webkit-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -o-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -ms-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: linear-gradient(to bottom, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9415a', endColorstr='#bd0a28', GradientType=0 );}
#boton:hover{	color: #F9F9F9;	background: rgba(194,132,143,1);	background: -moz-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(194,132,143,1)), color-stop(100%, rgba(186,31,62,1)));	background: -webkit-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -o-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -ms-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: linear-gradient(to bottom, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c2848f', endColorstr='#ba1f3e', GradientType=0 );}
</style>