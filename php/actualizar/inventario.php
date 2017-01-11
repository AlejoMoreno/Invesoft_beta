<?php 
session_start();
$ns = $_SESSION['id'];
$bodegaactual = $_SESSION['bodegaactual'];
include_once "../conexion.php"; 
$conexion= conexion();
$hoy = date("Y-m-d (H:i:s)");

$refe = $_POST['refe'];
$bill_id = mysqli_query($conexion,"SELECT idinventario FROM inventario where referencia = '$refe'") or die(mysqli_error($conexion));
$row = $bill_id->fetch_assoc();
$idinventario = $row['idinventario'];


if(isset($_POST['actualizar1'])){		
	if(	 
	$_POST['marca'] == '' or 
	$_POST['idlineas'] == '' or 
	$_POST['refe'] == '' or 
	$_POST['descrip'] == '' or 
	$_POST['nlote'] == '' or 
	$_POST['tprese'] == '' or 
	$_POST['smax'] == '' or 
	$_POST['smin'] == '' or 
	$_POST['precio'] == '' or 
	$_POST['costo'] == '' or 
	$_POST['estado'] == '' or 
	$_POST['fc'] == ''){ 
	    echo 'Por favor llene todos los campos.'; 
	} 

	
	//funcion guardar............................................................................
	elseif ($idinventario==''){
		$marca = $_POST['marca'];
		 $linea = $_POST['idlineas'];
		 $refe 	= $_POST['refe'];
		 $descrip = $_POST['descrip'];
		 $nlote = $_POST['nlote'];
		 $tprese = $_POST['tprese'];
		 $smax = $_POST['smax'];
		 $smin = $_POST['smin'];
		 $precio = $_POST['precio'];
		 $costo = $_POST['costo'];
		 $estado = $_POST['estado'];
		 $saldo = $_POST['saldo'];
		 $fc = $_POST['fc'];
		 $iva = $_POST['iva'];
		 $bodega = $_POST['ubi']; 
  
        
          
         $sql = "INSERT INTO `inventario` 
		  VALUES (null,
		  '$bodega',
		  '$ns',
		  '$marca',
		  '$linea',
		  '$refe',
		  '$descrip',
		  '$nlote',
		  '$tprese',
		  '$smin',
		  '$smax',
		  '$preci',
		  '$costo',
		  '$estado',
		  '$saldo',
		  '$fc',
		  '$iva',
		  '$hoy'
		  )";

        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  

        echo '| Usted se ha registrado correctamente.'; 
        echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/correcto.php?variable=entradas';} 
				setTimeout ('redireccionar()', 1000);</script>";
	}
	 
	 //funcion actualizar................................................................
	else { 
	    $idmarca = $_POST['marca'];		 
		$idlinea = $_POST['idlineas'];
		$refe 	= $_POST['refe'];
		$descrip = $_POST['descrip'];
		$nlote = $_POST['nlote'];
		$tprese = $_POST['tprese'];
		$smax = $_POST['smax'];
		$smin = $_POST['smin'];
		$precio = $_POST['precio'];
		$costo = $_POST['costo'];
		$estado = $_POST['estado'];
		$saldo = $_POST['saldo'];
		$fc = $_POST['fc'];
		$iva = $_POST['iva'];
		$ubi = $_POST['ubi']; 

		$bill_id = mysqli_query($conexion,"SELECT idinventario FROM inventario where referencia = '$refe'") or die(mysqli_error($conexion));
		$row = $bill_id->fetch_assoc();
		$idinventario = $row['idinventario'];
	 
	 	$bill_iv = mysqli_query($conexion,"SELECT idmarcas FROM marcas where nombre = '$marca'") or die(mysqli_error($conexion));
			
		$row = $bill_iv->fetch_assoc();
	
		$marca = $row['idmarcas'];
		 
		$bill_iv1 = mysqli_query($conexion,"SELECT idlineas FROM lineas where nombre = '$linea'") or die(mysqli_error($conexion));
				
		$row1 = $bill_iv1->fetch_assoc();
		
		$idlineas = $row1['idlineas'];
		 
		 
		
		
		$sql = "UPDATE `inventario` SET `idbodega` = '$ubi',
		  
		  `idmarcas` = '$idmarca', 
		  `idlineas` = '$idlinea', 
		  `referencia` = '$refe', 
		  `descripcion` = '$descrip', 
		  `numerolote` = '$nlote', 
		  `tipopresentacion` = '$tprese', 
		  `stockminimo` = '$smin', 
		  `stockmaximo` = '$smax', 
		  `precio` = '$precio', 
		  `costo` = '$costo', 
		  `estado` = '$estado', 
		  `saldo` = '$saldo', 
		  `fechadevencimiento` = '$fc', 
		  `fechamodificado` = '$hoy', 
		  `iva` = '$iva' WHERE `inventario`.`idinventario` = '$idinventario'";
	   
	    mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
		
	    echo 'Usted se ha actualizado correctamente.'; 
				
		echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/correcto.php?variable=entradas';} 
				setTimeout ('redireccionar()', 1000);</script>";
	}
		 
}

if(isset($_POST['borrar'])){
	if( 
	$idinventario == ''){ 
		echo 'Por favor llene todos los campos.'; 
	} 
	else { 
		$sql = "DELETE FROM `inventario` WHERE `inventario`.`idinventario` = '$idinventario'";
		mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
		echo 'Usted a eliminado correctamente.'; 
		echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/correcto.php?variable=entradas';} 
				setTimeout ('redireccionar()', 1000);</script>";
		
	}
}
?>