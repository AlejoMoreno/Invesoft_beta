<?php
include_once "../conexion.php"; 
$conexion= conexion();

echo "| Transfiriendo datos, espere porfavor";

if(isset($_POST['nombre'])) {
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];

	echo "| validando datos";

	if($_POST['nombre']=='' || $_POST['descripcion']==''){
		echo "| Existen datos sin diligenciar";
	}
	else{
		$sql ="INSERT INTO  `osmed`.`lineas` (
			`idlineas` ,
			`nombre` ,
			`descripcion`)VALUES (
			NULL ,  '$nombre',  '$descripcion');";

		mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
	  	echo '| Registrado correctamente.'; 
	  	echo "<script type='text/javascript'> function redireccionar(){window.location = '../html/Correcto.php?variable=entradas';} 
				setTimeout ('redireccionar()', 1000);</script>";
  	}
}
function limpiar(){
	echo "<script type='text/javascript'>
        document.getElementById('nombre').value= ''; 
        document.getElementById('descripcion').value= ''; 
        </script>";
}
?>