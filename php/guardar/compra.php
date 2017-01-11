<?php 
session_start();
$ns = $_SESSION['id'];
if($ns==''){
	echo '<div id="vencimiento1" class="si"><H1>EL USUARIO NO SE A REGISTRADO POR FAVOR VUELVA A INGRESAR CON SU USUARIO Y CONTRASEÑA  </H1></div>';
	exit();
}

include_once "../conexion.php"; 
$conexion= conexion();

$remision = $_POST['idremision'];
$nombre_cliente = $_POST['nombre_cliente'];
$fecha_remision = $_POST['fecha_remision'];
$nit_cliente = $_POST['nit_cliente'];
$vendedor = $_POST['vendedor'];
$iva = $_POST['iva'];
$descuento = $_POST['descuento'];
$fletes = $_POST['fletes'];
$retefuente = $_POST['retefuente'];
$subtotal = $_POST['bruto'];
$trs = $_POST['trs'];
$observaciones = $_POST['observaciones'];

echo 'Toma de datos del formulario ....<br>';

//llamado a la funcion creacion de concecutivo donde da el consecutivo siguiente de la remision
$consecutivo = 'C'.$_POST['idremision'];
$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `documento` LIKE  '$consecutivo'") or die(mysqli_error($conexion));
//si no esta registrado guardelo
if($bill_remision->num_rows != 0){
	echo 'El documento ya existe.';
	exit();
}
//llamado a funcion salidaInventario Donde registra producto por producto
EntradaInventario($ns);
echo 'Proceso del registro de los PRODUCTOS .....<br>';

//registro remision
$bill_cliente = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$nit_cliente';") or die(mysqli_error($conexion));
$row = $bill_cliente->fetch_assoc();
$idclientes = $row['idclientes'];
echo 'Seleccionado el tercero <br>';

$bill_paciente = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE  `numerodecedulapaciente` like '2016';") or die(mysqli_error($conexion));
$row = $bill_paciente->fetch_assoc();
$idpaciente = $row['idpaciente'];
echo 'Seleccionado el paciente <br>';

$bill_salida = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `idkit` LIKE  '$consecutivo'") or die(mysqli_error($conexion));
$row = $bill_salida->fetch_assoc();
$idsalida = $row['idsalida'];
echo 'Seleccion del consecutivo <br>';

$total = $subtotal - $descuento - $fletes - $retefuente;
echo 'Toma de datos Complementarios<br>';
//PARA INICIALIZAR EL SISTEMA SE DEBE CREAR UN PACIENTE 2016 EL CUAL SERA EL PACIENTE DE LAS COMPRAS....................................................
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
`documento`,
`observacioneliminado`
)
VALUES (
null,  '$idsalida',  '1',  '$idpaciente',  '$ns',  '$idclientes',  '$fecha_remision',  '$subtotal',  '$iva',  '$descuento',  '$fletes',  '1',  '$retefuente', '$total', '$consecutivo', '$observaciones');";
mysqli_query($conexion, $sqlSalida) or die(mysqli_error($conexion));

echo 'Remision completada<br>';

//echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/Correcto.php?variable=salidas';} 
//setTimeout ('redireccionar()', 1000);</script>";
 

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

function EntradaInventario($ns){
	$hoy = date("Y-m-d");
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
		$lotefactura = $producto[4];
		//busqueda del id del producto
		$bill_salida = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `referencia` LIKE '$referencia' AND `numerolote` LIKE '$lotefactura' ") or die(mysqli_error($conexion));
		//si el producto tiene diferente lote es un producto nuevo asi tenga la misma referencia
		if($bill_salida->num_rows == 0){
			echo 'PRODUCTO CON DIFERENTE LOTE<br>';
			//creacion del nuevo producto
			$bill_crear = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `referencia` LIKE '$referencia' ") or die(mysqli_error($conexion));
			$row_crear = $bill_crear->fetch_assoc();
			$idmarcas = $row_crear['idmarcas'];
			$idlineas = $row_crear['idlineas'];
			$referencia = $row_crear['referencia'];
			$descripcion = $row_crear['descripcion'];
			$numerolote = $row_crear['numerolote'];
			$tipopresentacion = $row_crear['tipopresentacion'];
			$stockminimo = $row_crear['stockminimo'];
			$stockmaximo = $row_crear['stockmaximo'];
			$precio = $row_crear['precio'];
			$costo = $row_crear['costo'];
			$estado = $row_crear['estado'];
			$fechadevencimiento = $row_crear['fechadevencimiento'];
			$iva = $row_crear['iva'];

			echo 'COPIA DEL PRODUCTO OK<br>';
			//insertar en la base de datos 
			$sql = "INSERT INTO  `osmed`.`inventario` (
			`idinventario` ,
			`idbodega` ,
			`ncedula` ,
			`idmarcas` ,
			`idlineas` ,
			`referencia` ,
			`descripcion` ,
			`numerolote` ,
			`tipopresentacion` ,
			`stockminimo` ,
			`stockmaximo` ,
			`precio` ,
			`costo` ,
			`estado` ,
			`saldo` ,
			`fechadevencimiento` ,
			`iva` ,
			`fechamodificado`
			)
			VALUES (
			NULL ,  '1',  '$ns',  '$idmarcas',  '$idlineas',  '$referencia',  '$descripcion',  '$lotefactura',  '$tipopresentacion',  '$stockminimo',  '$stockmaximo',  '$precio',  '$costo',  '$estado',  '0',  '$hoy',  '$iva',  '$hoy'
			);";
			mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
			echo 'CREACION DEL PRODUCTO OK<br>';
		}
		//si existe unicamente se traen los valores correspondientes
		
		//busqueda del id del producto
		$bill_salida1 = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `referencia` LIKE '$referencia' AND `numerolote` LIKE '$lotefactura' ") or die(mysqli_error($conexion));
		$row = $bill_salida1->fetch_assoc();
		$idinventario = $row['idinventario'];
		$lote = $row['numerolote'];
		$costo = $row['costo'];
		$saldoanterior = $row['saldo'];	
		
		$consecutivo = 'C'.$_POST['idremision'];
		//registro de la salida del producto
		$sqlSalida ="INSERT INTO  `osmed`.`salidadeinventario` VALUES (null,  '$idinventario',  '$consecutivo',  '$cantidad',  '$precio',  'COMPRA', '$lote');";
		mysqli_query($conexion, $sqlSalida) or die(mysqli_error($conexion));
		aumentarInventario($idinventario,$cantidad,$_POST['nit_cliente'],$precio);
		$fechacreacion = date('Y-m-d');
		$horacreacion = date('H:i:s');
		registroKardex($idinventario,  $consecutivo,  $fechacreacion,  $horacreacion,  $_POST['nit_cliente'],  '1',  $_SESSION['id'],  $cantidad,  $precio,  $costo,  $_POST['nit_cliente'],  $saldoanterior,  $cantidad,  '0',  ($saldoanterior+$cantidad),  'COMPRA',  '+');
	}
}

function aumentarInventario($idinventario,$cantidad,$clientebodega,$costo){
	include_once "../conexion.php"; 
	$conexion= conexion();
	$bill_salida = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE `idinventario` LIKE '$idinventario' ") or die(mysqli_error($conexion));
	$row = $bill_salida->fetch_assoc();
	$saldoanterior = $row['saldo'];
	$costoanterior = $row['costo'];

	$saldo = $saldoanterior + $cantidad;	
	$costopromedio = ($costoanterior+$costo)/2;

	$sql = "UPDATE `inventario` SET 
	  `saldo` = '$saldo',
	  `costo` = '$costopromedio'
	   WHERE `inventario`.`idinventario` = '$idinventario'";
   
    mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
	
    echo '<BR>Se actualizado el saldo del producto: '.$idinventario.' correctamente.'; 
}
?>
<style type="text/css">
.si{color:red;}
</style> 