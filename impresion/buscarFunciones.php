<?php 
include_once "conexion.php"; 


function bill_bodegas($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `bodegas` ") or die(mysqli_error($conexion));
			break;
		case 'nombre':
			$bill = mysqli_query($conexion,"SELECT * FROM  `bodegas` WHERE  `nombre` like '$parametro' ") or die(mysqli_error($conexion));
			break;
		case 'direccion':
			$bill = mysqli_query($conexion,"SELECT * FROM  `bodegas` WHERE  `direccion` like '$parametro' ") or die(mysqli_error($conexion));
			break;
		case 'descripcion':
			$bill = mysqli_query($conexion,"SELECT * FROM  `bodegas` WHERE  `descripcion` like '$parametro' ") or die(mysqli_error($conexion));
			break;
		
		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_ciudades($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `ciudades` ") or die(mysqli_error($conexion));
			break;
		case 'nombre':
			$bill = mysqli_query($conexion,"SELECT * FROM  `ciudades` WHERE  `nombre` LIKE '$parametro' ") or die(mysqli_error($conexion));
			break;
		case 'codigo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `ciudades` WHERE  `codigo` LIKE '$parametro' ") or die(mysqli_error($conexion));
			break;
		case 'iddepartamento	':
			$bill = mysqli_query($conexion,"SELECT * FROM  `ciudades` WHERE  `iddepartamento` LIKE '$parametro' ") or die(mysqli_error($conexion));
			break;
		case 'idciudades	':
			$bill = mysqli_query($conexion,"SELECT * FROM  `ciudades` WHERE  `idciudades` LIKE '$parametro' ") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_departamento($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `departamento`  ") or die(mysqli_error($conexion));
			break;
		case 'nombre':
			$bill = mysqli_query($conexion,"SELECT * FROM  `departamento` WHERE  `nombre` LIKE  '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'codigo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `departamento` WHERE  `codigo` LIKE  '$parametro'") or die(mysqli_error($conexion));
			break;
		
		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_historial($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `historial` ") or die(mysqli_error($conexion));
			break;
		case 'iduser':
			$bill = mysqli_query($conexion,"SELECT * FROM  `historial` WHERE  `iduser` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'ip':
			$bill = mysqli_query($conexion,"SELECT * FROM  `historial` WHERE  `ip` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'fecha':
			$bill = mysqli_query($conexion,"SELECT * FROM  `historial` WHERE  `fecha` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_inventario($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` ") or die(mysqli_error($conexion));
			break;
		case 'idinventario':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `idinventario` = '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idbodega':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `idbodega` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'ncedula':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `ncedula` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idmarcas':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `idmarcas` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idlineas':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `idlineas` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'referencia':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `referencia` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'descripcion':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `descripcion` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'numerolote':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `numerolote` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'tipopresentacion':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `tipopresentacion` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'stockminimo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `stockminimo` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'stockmaximo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `stockmaximo` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'precio':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `precio` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'costo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `costo` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'estado':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `estado` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'saldo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `saldo` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'fechadevencimiento':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `fechadevencimiento` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'iva':
			$bill = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `iva` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_kardex($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `kardex` ") or die(mysqli_error($conexion));
			break;
		case 'idkardex':
			$bill = mysqli_query($conexion,"SELECT * FROM  `kardex` WHERE  `idkardex` LIKE $parametro") or die(mysqli_error($conexion));
			break;
		case 'idsalida':
			$bill = mysqli_query($conexion,"SELECT * FROM  `kardex` WHERE  `idsalida` LIKE $parametro") or die(mysqli_error($conexion));
			break;
		case 'idclientes':
			$bill = mysqli_query($conexion,"SELECT * FROM  `kardex` WHERE  `idclientes` LIKE $parametro") or die(mysqli_error($conexion));
			break;
		case 'fechaventa':
			$bill = mysqli_query($conexion,"SELECT * FROM  `kardex` WHERE  `fechaventa` LIKE $parametro") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_lineas($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `lineas` ") or die(mysqli_error($conexion));
			break;
		case 'idlineas':
			$bill = mysqli_query($conexion,"SELECT * FROM  `lineas` WHERE `idlineas` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'nombre':
			$bill = mysqli_query($conexion,"SELECT * FROM  `lineas` WHERE `nombre` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'descripcion':
			$bill = mysqli_query($conexion,"SELECT * FROM  `lineas` WHERE `descripcion` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_marcas($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `marcas` ") or die(mysqli_error($conexion));
			break;
		case 'idmarcas':
			$bill = mysqli_query($conexion,"SELECT * FROM  `marcas` WHERE `idmarcas` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idtercero':
			$bill = mysqli_query($conexion,"SELECT * FROM  `marcas` WHERE `idtercero` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'nombre':
			$bill = mysqli_query($conexion,"SELECT * FROM  `marcas` WHERE `nombre` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'descripcion':
			$bill = mysqli_query($conexion,"SELECT * FROM  `marcas` WHERE `descripcion` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_pacientes($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `pacientes` ") or die(mysqli_error($conexion));
			break;
		case 'idpaciente':
			$bill = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE `idpaciente` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'nombrecirujano':
			$bill = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE `nombrecirujano` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'nombrepaciente':
			$bill = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE `nombrepaciente` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'numerodecedulapaciente':
			$bill = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE `numerodecedulapaciente` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'historiaclinica':
			$bill = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE `historiaclinica` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'fechacirujia':
			$bill = mysqli_query($conexion,"SELECT * FROM  `pacientes` WHERE `fechacirujia` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		
		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_remision($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` ") or die(mysqli_error($conexion));
			break;
		case 'idremision':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idremision` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idsalida':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idsalida` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idbodega':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idbodega` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idpaciente':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idpaciente` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idusuario':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idusuario` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idclientes':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idclientes` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'fecha':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `fecha` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'total':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `total` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'iva':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `iva` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'descuento':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `descuento` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'fletes':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `fletes` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'estado':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `estado` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'retefuente':
			$bill = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `retefuente` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_salidadeinventario($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` ") or die(mysqli_error($conexion));
			break;
		case 'idsalida':
			$bill = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `idsalida` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idinventario':
			$bill = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `idinventario` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'idkit':
			$bill = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `idkit` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'cantidad':
			$bill = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `cantidad` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'precio':
			$bill = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `precio` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'tipo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `tipo` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_terceros($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` ") or die(mysqli_error($conexion));
			break;
		case 'idclientes':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$idclientes'") or die(mysqli_error($conexion));
			break;
		case 'departamento':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$departamento'") or die(mysqli_error($conexion));
			break;
		case 'nombre':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$nombre'") or die(mysqli_error($conexion));
			break;
		case 'institucion':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$institucion'") or die(mysqli_error($conexion));
			break;
		case 'nit':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$nit'") or die(mysqli_error($conexion));
			break;
		case 'telefono':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$telefono'") or die(mysqli_error($conexion));
			break;
		case 'correo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$correo'") or die(mysqli_error($conexion));
			break;
		case 'direccion':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$direccion'") or die(mysqli_error($conexion));
			break;
		case 'celular':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$celular'") or die(mysqli_error($conexion));
			break;
		case 'estado':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$estado'") or die(mysqli_error($conexion));
			break;
		case 'contacto_directo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$contacto_directo'") or die(mysqli_error($conexion));
			break;
		case 'sede':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$sede'") or die(mysqli_error($conexion));
			break;
		case 'tipo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` LIKE '$tipo'") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

function bill_usuarios($opcion,$parametro){
	$conexion= conexion();
	switch ($opcion) {
		case 'todos':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` ") or die(mysqli_error($conexion));
			break;
		case 'ncedula':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `ncedula` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'iddepartamento':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `iddepartamento` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'tipousuario':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `tipousuario` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'nombre':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `nombre` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'apellido':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `apellido` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'cargo':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `cargo` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'ntelefono':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `ntelefono` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'clave':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `clave` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;
		case 'estado':
			$bill = mysqli_query($conexion,"SELECT * FROM  `usuarios` WHERE  `estado` LIKE '$parametro'") or die(mysqli_error($conexion));
			break;

		default:
			echo 'Seleccione una opcion bill correcta';
			break;
	}
	return $bill;
}

$bill_result = bill_usuarios('todos','');
while ($row = $bill_result->fetch_assoc()){
	echo $row['nombre'];
}
?>