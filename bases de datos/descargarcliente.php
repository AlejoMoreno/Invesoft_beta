<?php
$f = fopen("reporte.csv","w");
$sep = ","; //separador

include("../php/conexion.php");
$conexion = conexion();
 	
/*$sql = "SELECT 
	`terceros`.`idclientes`,
	`departamento`.`nombre` AS `R1`,
	`ciudades`.`nombre` AS `R2`,
	`terceros`.`nombre` , 
	`terceros`.`institucion` , 
	`terceros`.`nit` , 
	`terceros`.`telefono` , 
	`terceros`.`correo` , 
	`terceros`.`direccion` , 
	`terceros`.`celular` , 
	`terceros`.`estado` , 
	`terceros`.`contacto_directo` , 
	`terceros`.`tipo` , 
	`terceros`.`calificacion` , 
	`terceros`.`bodega` , 
	`terceros`.`fechamodificado` 
	FROM `terceros` 
	INNER JOIN `ciudades` ON `ciudades`. `idciudades` = `terceros`.`ciudad` 
	INNER JOIN `departamento` ON `departamento`.`iddepartamento` = `terceros`.`departamento` 
	WHERE `terceros`.`tipo` = 'CLIENTE'
";*/
$sql = $_POST['sentencia'];
echo $sql;
$bill = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));     

$cabecera = 'ID CLIENTE'.$sep.
			'DEPARTAMENTO'.$sep.
			'CIUDAD'.$sep.
			'NOMBRE'.$sep.
			'INSTITUCION'.$sep.
			'NIT'.$sep.
			'TELEFONO'.$sep.
			'CORREO'.$sep.
			'DIRECCION'.$sep.
			'CELULAR'.$sep.
			'ESTADO' .$sep.
			'CONTACTO DIRECTO'.$sep.
			'TIPO'.$sep.
			'CALIFICACION'.$sep.
			'BODEGA'.$sep.
			'FECHA MODIFICADO';

fwrite($f,$cabecera);
while($row = $bill->fetch_assoc()) {
   $linea = '
   '.$row['idclientes'].$sep.$row['R1'].$sep.$row['R2'].$sep.$row['nombre'].$sep.$row['institucion'].$sep.$row['nit'].$sep.$row['telefono'].$sep.$row['correo'].$sep.$row['direccion'].$sep.$row['celular'].$sep.$row['estado'].$sep.$row['contacto_directo'].$sep.$row['tipo'].$sep.$row['calificacion'].$sep.$row['bodega'].$sep.$row['fechamodificado'].'';
   fwrite($f,$linea);
}

fclose($f);
echo '
<script type="text/javascript">window.location="descargar.php";</script>';
?>
