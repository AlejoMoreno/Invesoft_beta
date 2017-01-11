<?php
session_start();
$ns = $_SESSION['id'];
if($ns==''){
	echo '<div id="vencimiento1" class="si"><H1>EL USUARIO NO SE A REGISTRADO POR FAVOR VUELVA A INGRESAR CON SU USUARIO Y CONTRASEÑA  </H1></div>';
	exit();
}

include_once "../conexion.php"; 
$conexion= conexion();

echo "| Transfiriendo datos, espere porfavor";

if(isset($_POST['nombre'])) {
	$referencia = $_POST['referencia'];
	$nombre = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$observaciones = $_POST['obvce'];
	$fecha=date('Y-m-d');

	

	echo "| validando datos";

	if($_POST['nombre']=='' || $_POST['cantidad']=='' || $_POST['referencia']==''|| $_POST['obvce']=='') {
		echo "| Existen datos sin diligenciar";
		echo $referencia;
		echo $nombre;
		echo $cantidad;
		echo $observaciones;
	}
	else{
		$sql ="INSERT INTO  `osmed`.`pedidos` (`idpedido` ,`referencia` ,`nombre` ,`cantidad`,`fechapedido`,`estado`,`idusuario`,`observaciones`)
		VALUES (
			NULL ,'$referencia',  '$nombre',  '$cantidad', '$fecha','1','$ns','observaciones');";

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
<style type="text/css">
.si{color:red;}
</style> 