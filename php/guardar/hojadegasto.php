<?php 
session_start();
$ns = $_SESSION['id'];
if($ns==''){
	echo '<div id="vencimiento1" class="si"><H1>EL USUARIO NO SE A REGISTRADO POR FAVOR VUELVA A INGRESAR CON SU USUARIO Y CONTRASEÑA  </H1></div>';
	exit();
}

include_once "../conexion.php"; 
$bodegaactual = $_SESSION['bodegaactual'];
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
	echo 'El paciente y la historia clinica ya existen.<br>';
}


echo 'Proceso del registro del PACIENTE ......<br>';


//llamado a la funcion creacion de concecutivo donde da el consecutivo siguiente de la remision
$remision = substr($_POST['idremision'], 1);
$consecutivo2 = 'R'.$remision;
//consulta el ultimo registro remision
$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `documento` LIKE  'R%' ORDER BY  `remision`.`idremision` DESC ") or die(mysqli_error($conexion));
$rowremision = $bill_remision->fetch_assoc();
$documento = $rowremision['documento'];
$numdoc = substr($documento, 1)+1;
$consecutivo = 'H'.$numdoc;
//llamado a funcion salidaInventario Donde registra producto por producto
SalidaInventario($consecutivo);
echo '<br>Proceso del registro de los PRODUCTOS .....<br>';
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
null,  '$idsalida',  '$bodegaactual',  '$idpaciente',  '$ns',  '$idclientes',  '$fecha_remision',  '$subtotal',  '$iva',  '$descuento',  '$fletes',  '1',  '$retefuente', '$total', '$consecutivo');";
mysqli_query($conexion, $sqlSalida) or die(mysqli_error($conexion));

$sql = "UPDATE  `osmed`.`remision` SET  `estado` =  '2' WHERE  `remision`.`documento`='$consecutivo2'";
mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
echo '<br>Actualizada la Remision '.$consecutivo2.' correctamente.'; 

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

function SalidaInventario($consecutivo){
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
		$devolucion  = $producto[4];
		//busqueda del id del producto
		$bill_salida = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `referencia` LIKE '$referencia' ") or die(mysqli_error($conexion));
		$row = $bill_salida->fetch_assoc();
		$idinventario = $row['idinventario'];
		$lote = $row['numerolote'];
		$costo = $row['costo'];
		$saldoanterior = $row['saldo'];
		$remision = substr($_POST['idremision'], 1);
		//registro de la salida del producto
		$sqlSalida ="INSERT INTO  `osmed`.`salidadeinventario` VALUES (null,  '$idinventario',  '$consecutivo',  '$cantidad',  '$precio',  'HOJADEGASTO', '$lote');";
		descontarInventario($idinventario,$devolucion,$_POST['nit_cliente']);
		mysqli_query($conexion, $sqlSalida) or die(mysqli_error($conexion));
		$fechacreacion = date('Y-m-d');
		$horacreacion = date('H:i:s');
		registroKardex($idinventario,  $consecutivo,  $fechacreacion,  $horacreacion,  $_SESSION['bodegaactual'],  $_POST['nit_cliente'],  $_SESSION['id'],  $cantidad,  $precio,  $costo,  $_POST['nit_cliente'],  $saldoanterior,  '0',  $cantidad,  ($saldoanterior-$cantidad),  'HOJADEGASTO',  '-');
	}
}

function descontarInventario($idinventario,$cantidad,$clientebodega){
	include_once "../conexion.php"; 
	$conexion= conexion();
	$bill_salida = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `idinventario` LIKE '$idinventario' ") or die(mysqli_error($conexion));
	$row = $bill_salida->fetch_assoc();
	$saldoanterior = $row['saldo'];

	$saldo = $saldoanterior + $cantidad;	

	$sql = "UPDATE `inventario` SET 
	  `saldo` = '$saldo'
	   WHERE `inventario`.`idinventario` = '$idinventario'";
   
    mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
	
    echo '<br>Actualizado el saldo del producto: '.$idinventario.' correctamente.'; 
}
?>
<style type="text/css">
.si{color:red;}
</style> 