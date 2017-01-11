<?php 
session_start();
$ns = $_SESSION['id'];
include_once "../conexion.php"; 
$conexion= conexion();
$hoy = date("Y-m-d (H:i:s)");

$nit = $_POST['nit'];
$bill_id = mysqli_query($conexion,"SELECT * FROM terceros where nit = '$nit'") or die(mysqli_error($conexion));
if($bill_id->num_rows != 0){
	$row = $bill_id->fetch_assoc();
	$idclientes = $row['idclientes'];
}
else{
	$idclientes ='';
}



if(isset($_POST['actualizar1'])){		
	if(	 
	$_POST['iddepartamento'] == '' or 
	$_POST['nombre'] == '' or 
	$_POST['institu'] == '' or 
	$_POST['nit'] == '' or 
	$_POST['tel'] == '' or 
	$_POST['correo'] == '' or 
	$_POST['direcc'] == '' or 
	$_POST['cel'] == '' or 
	$_POST['estado'] == '' or 
	$_POST['cdirec'] == '' or 
	$_POST['sede'] == '' or 
	$_POST['tipo'] == ''){ 
	    echo 'Por favor llene todos los campos.'; 
	} 

	
	//funcion guardar............................................................................
	elseif ($idclientes==''){
		$departa = $_POST['iddepartamento'];
		$idciudad = $_POST['idciudad'];
		 $nombre = $_POST['nombre'];
		 $institu = $_POST['institu'];
		 $nit 	= $_POST['nit'];
		 $tel = $_POST['tel'];
		 $correo = $_POST['correo'];
		 $direcc = $_POST['direcc'];
		 $cel = $_POST['cel'];
		 $estado = $_POST['estado'];
		 $cdirec = $_POST['cdirec'];
		 $sede = $_POST['sede'];
		 $tipo = $_POST['tipo'];
		 $calificacion = 'A';
  
  echo(' departa '.$departa);
  echo(' idciudad '.$idciudad);
  echo(' nombre '.$nombre);
  echo(' institu '.$institu);
  echo(' nit '.$nit);
  echo(' tel '.$tel);
  echo(' correo '.$correo);
  echo(' direcc '.$direcc);
  echo(' cel '.$cel);
  echo(' estado '.$estado);
  echo(' cdirec '.$cdirec);
  echo(' sede '.$sede);
  echo(' tipo '.$tipo);
  echo(' calificacion '.$calificacion);
  echo(' nit '.$nit);
  echo(' hoy '.$hoy);
  















          
         $sql = "INSERT INTO `terceros` 
		  VALUES (null,
		  '$departa',
		  '$idciudad',
		  '$nombre',
		  '$institu',
		  '$nit',
		  '$tel',
		  '$correo',
		  '$direcc',
		  '$cel',
		  '$estado',
		  '$cdirec',
		  '$sede',
		  '$tipo',
		  '$calificacion',
		  '$nit',
		  '$hoy'
		  )";
                mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  

        $sql2 = "INSERT INTO `bodegas` 
		  VALUES ('$nit',
		  	'$nombre',
		  	'$direcc',
		  	'$tipo'		  
		  )";
                mysqli_query($conexion, $sql2) or die(mysqli_error($conexion));  
  	
        echo 'Usted se ha registrado correctamente.'; 
        echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/correcto.php?variable=entradas';} 
				setTimeout ('redireccionar()', 1000);</script>";
	}
	 
	 //funcion actualizar................................................................
	else { 
	    $departa = $_POST['iddepartamento'];
	    $idciudad = $_POST['idciudad'];
		 $nombre = $_POST['nombre'];
		 $institu = $_POST['institu'];
		 $nit 	= $_POST['nit'];
		 $tel = $_POST['tel'];
		 $correo = $_POST['correo'];
		 $direcc = $_POST['direcc'];
		 $cel = $_POST['cel'];
		 $estado = $_POST['estado'];
		 $cdirec = $_POST['cdirec'];
		 $sede = $_POST['sede'];
		 $tipo = $_POST['tipo'];		 
		 
		
		
		$sql = "UPDATE `terceros` SET 
		  
		  `departamento` = '$departa', 
		  `nombre` = '$nombre', 
		  `institucion` = '$institu', 
		  `nit` = '$nit', 
		  `telefono` = '$tel', 
		  `correo` = '$correo', 
		  `direccion` = '$direcc', 
		  `celular` = '$cel', 
		  `estado` = '$estado', 
		  `contacto_directo` = '$cdirec', 
		  `sede` = '$sede', 
		  `tipo` = '$tipo',
		  `ciudad` = '$idciudad',
		  `fechamodificado` = '$hoy'
		  WHERE `terceros`.`idclientes` = '$idclientes'";
	   
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
		$sql = "DELETE FROM `terceros` WHERE `terceros`.`idclientes` = '$idclientes'";
		mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
		echo 'Usted a eliminado correctamente.'; 
		echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/correcto.php?variable=entradas';} 
				setTimeout ('redireccionar()', 1000);</script>";
		
	}
}
?>