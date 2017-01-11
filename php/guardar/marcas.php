<?php
session_start();
$ns = $_SESSION['id'];
include_once "../conexion.php"; 
$conexion= conexion();

echo "| Transfiriendo datos, espere porfavor";

if(isset($_POST['nombre'])) {
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$proveedor = $_POST['proveedor'];

	$bill_id = mysqli_query($conexion,"SELECT * FROM  `terceros` WHERE  `nit` = '$proveedor'") or die(mysqli_error($conexion));
	$row = $bill_id->fetch_assoc();
	$idproveedor = $row['idclientes'];

	echo "| validando datos";

	if($_POST['nombre']=='' || $_POST['descripcion']==''){
		echo "| Existen datos sin diligenciar";
	}
	else{
		$sql ="INSERT INTO  `osmed`.`marcas` (`idmarcas` ,`idtercero` ,`nombre` ,`descripcion`)
		VALUES (
			NULL ,'$idproveedor',  '$nombre',  '$descripcion');";

		mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
	  	echo '| Registrado correctamente.'; 
	  	echo "<script type='text/javascript'> function redireccionar(){window.location = '../html/Correcto.php?variable=entradas';} 
				setTimeout ('redireccionar()', 1000);</script>";
	  	limpiar();
  	}
}
function limpiar(){
	echo "<script type='text/javascript'>
        document.getElementById('nombre').value= ''; 
        document.getElementById('descripcion').value= ''; 
        </script>";
}
?>