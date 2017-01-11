<?php 
$ns = $_SESSION['id'];
$hoy = date("Y-m-d");


include_once "../php/conexion.php"; 
$conexion= conexion();


	$bill_inventario = mysqli_query($conexion,"SELECT * FROM  `inventario` ") or die(mysqli_error($conexion));
	while ($row = $bill_inventario->fetch_assoc()) {
		$idbodega = $row['idbodega'];
		$ncedula = $row['ncedula'];
		$idmarcas = $row['idmarcas'];
		$idlineas = $row['idlineas'];
		$referencia = $row['referencia'];
		$descripcion = $row['descripcion'];
		$numerolote = $row['numerolote'];
		$tipopresentacion = $row['tipopresentacion'];
		$stockminimo = $row['stockminimo'];
		$stockmaximo = $row['stockmaximo'];
		$precio = $row['precio'];
		$costo = $row['costo'];
		$estado = $row['estado'];
		$saldo = $row['saldo'];
		$fechadevencimiento = $row['fechadevencimiento'];
		$iva = $row['iva'];
		$sql ="INSERT INTO `cierreinventario` (
			`idinventario`, 
			`idbodega`, 
			`ncedula`, 
			`idmarcas`, 
			`idlineas`, 
			`referencia`, 
			`descripcion`, 
			`numerolote`, 
			`tipopresentacion`, 
			`stockminimo`, 
			`stockmaximo`, 
			`precio`, 
			`costo`, 
			`estado`, 
			`saldo`, 
			`fechadevencimiento`, 
			`iva`, 
			`fecha_registro`)
			VALUES (
			null,  '$idbodega',  '$ncedula',  '$idmarcas',  '$idlineas',  '$referencia',  '$descripcion',  '$numerolote',  '$tipopresentacion',  '$stockminimo',  '$stockmaximo',  '$precio',  '$costo',  '$estado',  '$saldo',  '$fechadevencimiento',  '$iva',  '$hoy');";
		mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
		$i++;
		echo $i;
	}

?>