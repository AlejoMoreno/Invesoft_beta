<?php 
session_start();
require_once('conexion.php');
$conexion= conexion();

if(isset($_POST['enviar'])){
	$idorden = $_POST['orden'];
	$bill_orden = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idremision` ='$idorden'") or die(mysqli_error($conexion));
	$row = $bill_orden->fetch_assoc();
	$idsalida = $row['idsalida'];
	$idbodega = $row['idbodega'];
	$idpaciente = $row['idpaciente'];
	$idusuario = $row['idusuario'];
	$idclientes = $row['idclientes'];
	$fecha = $row['fecha'];
	$subtotal = $row['subtotal'];
	$iva = $row['iva'];
	$descuento = $row['descuento'];
	$fletes = $row['fletes'];
	$estado = $row['estado'];
	$retefuente = $row['retefuente'];
	$total = $row['total'];
	$documento = $row['documento'];
	//reformar documento a R
	$newdoc = 'R'.substr($documento, 1);
	//registro de la salida del inventario
	//registro de la remision nueva
}

?>
<form>
	<label>Orden de pedido: </label>
	<select name="orden">
		<option value="">SELECCIONE ORDEN</option>
		<option value="1">Remision numero 1</option>
	</select>
	<input type="submit" name="enviar" id="boton" value="Pasar a remisión">
</form>