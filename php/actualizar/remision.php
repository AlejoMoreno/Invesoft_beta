<?php 
session_start();
$ns = $_SESSION['id'];
include_once "../conexion.php"; 
$conexion= conexion();

$remision = $_POST['idremision'];
$nombre_cliente = $_POST['nombre_cliente'];
$fecha_remision = $_POST['fecha_remision'];
$nit_cliente = $_POST['nit_cliente'];
$vendedor = $_POST['vendedor'];
$numerodecedulapaciente = $_POST['datosPaCed'];
$nombrepaciente = $_POST['datosPaNPa'];
$nombrecirujano = $_POST['datosPaNCi'];
$historiaclinica = $_POST['datosPaHis'];
$fechacirujia = $_POST['datosPaFec'];
$iva = $_POST['iva'];
$descuento = $_POST['descuento'];
$fletes = $_POST['fletes'];
$retefuente = $_POST['retefuente'];
$subtotal = $_POST['bruto'];
$trs = $_POST['trs'];

echo 'Toma de datos del formulario ....<br>';


//Seleccion del viejo registro y eliminación del mismo
$bill_tercero = mysqli_query($conexion,"SELECT * FROM  `terceros` where `nit` like '$nit_cliente'") or die(mysqli_error($conexion));
$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision` where `documento` like '$remision'") or die(mysqli_error($conexion));  
$row = $bill_tercero->fetch_assoc();
$idtercero = $row['idclientes'];
$tipo = $row['tipo'];
$row = $bill_remision->fetch_assoc();
$idremision = $row['idremision'];
$tdoc = substr($remision, 0,1);
if ($tipo=='PROVEEDOR') {
	$signo = '-';
}
else {
	$signo = '+';
}
//quitar los saldos de los productos descontar del inventario
$bill_productos = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `idkit` LIKE  '$remision'") or die(mysqli_error($conexion));
while($row = $bill_productos->fetch_assoc()){
	$idinventario = $row['idinventario'];
	$cantidad = $row['cantidad'];
	if($tdoc=='O' or $tdoc=='N'){
		echo '<p>Es una Orden no descuenta del inventario</p>';	
	}
	else{
		descontarInventario1($idinventario,$cantidad,$signo);	
	}
}
//DELETE FROM `salidadeinventario` WHERE  `idkit` LIKE  '$documento';
$sql = "DELETE FROM `salidadeinventario` WHERE  `idkit` LIKE  '$remision';";
mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
//DELETE FROM `remision` WHERE `remision.idremision` = '$idremision';
$sql = "DELETE FROM  `remision` WHERE  `idremision` ='$idremision'";
mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
echo '<br>Documento anterior Eliminado';

//----------------------------REGISTRO DEL NUEVO DOCUMENTO-------------------------//
//registro de paciente
//registro de paciente
$bill_paciente = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE  `numerodecedulapaciente` ='$numerodecedulapaciente' AND  `historiaclinica` LIKE  '$historiaclinica'") or die(mysqli_error($conexion));
//si no esta registrado guardelo
if($bill_paciente->num_rows == 0){
	$sqlPaciente ="INSERT INTO  `osmed`.`pacientes` (
	`idpaciente` ,
	`nombrecirujano` ,
	`nombrepaciente` ,
	`numerodecedulapaciente` ,
	`historiaclinica` ,
	`fechacirujia`
	)
	VALUES (
	NULL ,  '$nombrecirujano',  '$nombrepaciente',  '$numerodecedulapaciente',  '$historiaclinica',  '$fechacirujia');";
	mysqli_query($conexion, $sqlPaciente) or die(mysqli_error($conexion)); 
	echo 'El paciente y la hisoria clinica son nuevos, se tendrá un nuevo registro.';
}
else{
	echo 'El paciente y la historia clinica ya existen.';
}


echo 'Proceso del registro del PACIENTE ......<br>';

//llamado a la funcion creacion de concecutivo donde da el consecutivo siguiente de la remision
$consecutivo = $_POST['idremision'];
//llamado a funcion salidaInventario Donde registra producto por producto
SalidaInventario($tdoc);
echo 'Proceso del registro de los PRODUCTOS .....<br>';
//registro remision
$bill_cliente = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$nit_cliente';") or die(mysqli_error($conexion));
$row = $bill_cliente->fetch_assoc();
$idclientes = $row['idclientes'];
echo 'Seleccionado el tercero <br>';

$bill_paciente = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE  `numerodecedulapaciente` like $numerodecedulapaciente;") or die(mysqli_error($conexion));
$row = $bill_paciente->fetch_assoc();
$idpaciente = $row['idpaciente'];
echo 'Seleccionado el paciente <br>';

$bill_salida = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `idkit` LIKE  '$consecutivo'") or die(mysqli_error($conexion));
$row = $bill_salida->fetch_assoc();
$idsalida = $row['idsalida'];
echo 'Seleccion del consecutivo <br>';

$total = $subtotal - $descuento - $fletes - $retefuente;
echo 'Toma de datos Complementarios<br>';

$sqlSalida ="INSERT INTO  `osmed`.`remision` (
`idremision` ,
`idsalida` ,
`idbodega` ,
`idpaciente` ,
`idusuario` ,
`idclientes` ,
`fecha` ,
`subtotal` ,
`iva` ,
`descuento` ,
`fletes` ,
`estado` ,
`retefuente`,
`total`,
`documento`
)
VALUES (
null,  '$idsalida',  '1',  '$idpaciente',  '$ns',  '$idclientes',  '$fecha_remision',  '$subtotal',  '$iva',  '$descuento',  '$fletes',  '1',  '$retefuente', '$total', '$consecutivo');";
mysqli_query($conexion, $sqlSalida) or die(mysqli_error($conexion));

echo 'Remision completada<br>';


echo '<a href="../impresion/formatoImpresion.php?documento='.$consecutivo.'">Imprima el documento</a>';



function registroKardex($producto,  $documento,  $fechacreacion,  $horacreacion,  $bodegasalida,  $bodegaentrada,  $usuariosalida,  $cantidad,  $precio,  $costo,  $cliente,  $saldoanterior,  $entrada,  $salida,  $saldonuevo,  $consepto,  $signo){
	include_once "../conexion.php"; 
	$conexion= conexion();
	$sql = "INSERT INTO  `osmed`.`kardex` (
		`idkardex` ,
		`producto` ,
		`documento` ,
		`fecha_creacion_documento` ,
		`hora_creacion_documento` ,
		`bodega_salida` ,
		`bodega_entrada` ,
		`usuario_salida` ,
		`cantidad` ,
		`precio` ,
		`costo` ,
		`cliente` ,
		`saldo_anterior` ,
		`entrada` ,
		`salida` ,
		`saldo_nuevo` ,
		`concepto` ,
		`signo`
		)
		VALUES (
		null,  '$producto',  '$documento',  '$fechacreacion',  '$horacreacion',  '$bodegasalida',  '$bodegaentrada',  '$usuariosalida',  '$cantidad',  '$precio',  '$costo',  '$cliente',  '$saldoanterior',  '$entrada',  '$salida',  '$saldonuevo',  '$consepto',  '$signo'
		);";
	mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
}

function SalidaInventario($tdoc){
	$productos = split(':', $_POST['productos']);
	$trs = $_POST['trs'] -1;
	include_once "../conexion.php"; 
	$conexion= conexion();
	//recorrer (referencia-cantidad-precio)
	for ($i=1; $i <= $trs; $i++) { 
		$producto = split(',', $productos[$i]);
		//tomar los datos del producto
		$referencia = $producto[0];
		$nombre = $producto[1];
		$cantidad = $producto[2];
		$precio  = $producto[3];
		//busqueda del id del producto
		$bill_salida = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `referencia` LIKE '$referencia' ") or die(mysqli_error($conexion));
		$row = $bill_salida->fetch_assoc();
		$idinventario = $row['idinventario'];
		$lote = $row['numerolote'];
		$costo = $row['costo'];
		$saldoanterior = $row['saldo'];
		$consecutivo = $_POST['idremision'];
		//registro de la salida del producto
		$sqlSalida ="INSERT INTO  `osmed`.`salidadeinventario` VALUES (null,  '$idinventario',  '$consecutivo',  '$cantidad',  '$precio',  'REMISION', '$lote');";
		mysqli_query($conexion, $sqlSalida) or die(mysqli_error($conexion));
		if($tdoc=='O' or $tdoc=='N'){
			echo '<p>Es una Orden no descuenta del inventario</p>';	
		}
		else{
			descontarInventario($idinventario,$cantidad,$_POST['nit_cliente']);	
		}
		//registro en el kardex por producto
		$fechacreacion = date('Y-m-d');
		$horacreacion = date('H:i:s');
		registroKardex($idinventario,  $consecutivo,  $fechacreacion,  $horacreacion,  '1',  $_POST['nit_cliente'],  $_SESSION['id'],  $cantidad,  $precio,  $costo,  $_POST['nit_cliente'],  $saldoanterior,  '0',  $cantidad,  ($saldoanterior-$cantidad),  'REMISION',  '-');
	}
}

function descontarInventario($idinventario,$cantidad,$clientebodega){
	include_once "../conexion.php"; 
	$conexion= conexion();
	$bill_salida = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `idinventario` LIKE '$idinventario' ") or die(mysqli_error($conexion));
	$row = $bill_salida->fetch_assoc();
	$saldoanterior = $row['saldo'];

	$saldo = $saldoanterior - $cantidad;	

	$sql = "UPDATE `inventario` SET 
	  `saldo` = '$saldo'
	   WHERE `inventario`.`idinventario` = '$idinventario'";
   
    mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
	
    echo 'Usted se ha actualizado correctamente.'; 
}
//descuenta del inventario para elimnar
function descontarInventario1($idinventario,$cantidad,$signo){
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