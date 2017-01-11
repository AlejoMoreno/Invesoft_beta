<?php
include_once "../conexion.php"; 
$conexion= conexion();
$idusuario = $_POST['idusuario'];


if(isset($_POST['actualizar1'])){
	if(	 
	$_POST['ncedula'] == '' or 
	$_POST['iddepartamento'] == '' or 
	$_POST['idciudad'] == '' or 
	$_POST['tipousuario'] == '' or 
	$_POST['nombre'] == '' or 
	$_POST['apellido'] == '' or 
	$_POST['cargo'] == '' or 
	$_POST['ntelefono'] == '' or
	$_POST['estado'] == '' or
	$_POST['clave'] == ''){ 
        echo 'Por favor llene todos los campos.'; 
    } 


	//funcion guardar............................................................................
	elseif ($idusuario=='') {
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cedula = $_POST['ncedula'];
		$tipo = $_POST['tipousuario'];
		$departamento = $_POST['iddepartamento'];
		$idciudad = $_POST['idciudad'];
		$telefono = $_POST['ntelefono'];
		$cargo = $_POST['cargo'];
		$clave = $_POST['clave'];
		$clave1 = $_POST['clave1'];
		$estado = $_POST['estado'];

		echo "| validando datos";

		if($nombre =='' || $apellido =='' || $cedula =='' || $telefono =='' || $clave =='' || $clave1 =='' || $cargo ==''){
			echo "| Existen datos sin diligenciar";
		}
		elseif ($clave1 != $clave) {
			echo "| Las claves no son iguales. Verifique";
		}
		else{
			$sql ="INSERT INTO  `osmed`.`usuarios` (
			`ncedula` ,
			`iddepartamento` ,
			`tipousuario` ,
			`nombre` ,
			`apellido` ,
			`cargo` ,
			`ntelefono` ,
			`clave` ,
			`estado`,
			`idciudad`
			)
			VALUES (
			'$cedula',  '$departamento',  '$tipo',  '$nombre',  '$apellido',  '$cargo',  '$telefono',  '$clave',  '$estado', '$idciudad'
			);";

			mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
		  	echo '| Registrado correctamente.'; 
		  	echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/correcto.php?variable=administrativo';} 
				setTimeout ('redireccionar()', 1000);</script>";
		}
	}

    //funcion actualizar................................................................
    else { 
		$ncedula = $_POST['ncedula'];
		$iddepartamento = $_POST['iddepartamento'];
		$idciudad = $_POST['idciudad'];
		$tipousuario 	= $_POST['tipousuario'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cargo = $_POST['cargo'];
		$ntelefono = $_POST['ntelefono'];
		$clave = $_POST['clave'];
		$estado = $_POST['estado'];
         

		$sql = "UPDATE `usuarios` SET 		  
		  `ncedula` = '$ncedula', 
		  `iddepartamento` = '$iddepartamento', 
		  `idciudad` = '$idciudad', 
		  `tipousuario` = '$tipousuario', 
		  `nombre` = '$nombre', 
		  `apellido` = '$apellido', 
		  `cargo` = '$cargo', 
		  `ntelefono` = '$ntelefono', 
		  `clave` = '$clave',   
		  `estado` = '$estado' WHERE `usuarios`.`ncedula` = '$ncedula'";
       
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 

        echo 'Usted se ha actualizado correctamente.'; 
        echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/correcto.php?variable=administrativo';} 
				setTimeout ('redireccionar()', 1000);</script>";
				
	}
		 
}


if(isset($_POST['borrar'])){

	if( 
	$_POST['ncedula'] == ''){ 
		echo 'Por favor llene todos los campos.'; 
	} 
	else { 	
		$ncedula = $_POST['ncedula'];

		$sql = "DELETE FROM `usuarios` WHERE `usuarios`.`ncedula` = '$ncedula'";
		mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  

		echo 'Usted a eliminado correctamente.'; 
		echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/correcto.php?variable=administrativo';} 
				setTimeout ('redireccionar()', 1000);</script>";
	}		

}

			 
 ?>