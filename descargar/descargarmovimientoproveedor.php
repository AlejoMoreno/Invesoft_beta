<?php
$f = fopen("reporte.csv","w");
$sep = ","; //separador

include("../php/conexion.php");
$conexion = conexion();

/*$sql = "SELECT `terceros`.`nombre`, `remision`.`documento` AS `R1`, `remision`.`fecha` AS `R2`, `inventario`.`referencia` AS `S1`, `salidadeinventario`.`cantidad` AS `S2`, `salidadeinventario`.`precio` AS `S3`, `salidadeinventario`.`tipo` AS `S4`, `salidadeinventario`.`lote` AS `S5` FROM `terceros` 
	INNER JOIN `inventario` 
	INNER JOIN `salidadeinventario` ON `salidadeinventario`.`idinventario`= `inventario`.`idinventario` 
	INNER JOIN `remision` ON `remision` .`documento`=`salidadeinventario`.`idkit` 
	WHERE `terceros`.`tipo` = 'PROVEEDOR'
";*/
$sql = $_POST['sentencia'];
echo $sql;
$bill = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));     

$cabecera = 'PROVEEDOR'.$sep.'TIPO DE REMISION'.$sep.'FECHA REMISION'.$sep.'REFERENCIA'.$sep.'CANTIDAD'.$sep.'PRECIO'.$sep.'TIPO'.$sep.'LOTE';

fwrite($f,$cabecera);
while($row = $bill->fetch_assoc()) {
   $linea = '
   '.$row['nombre'].$sep.$row['R1'].$sep.$row['R2'].$sep.$row['S1'].$sep.$row['S2'].$sep.$row['S3'].$sep.$row['S4'].$sep.$row['S5'].'';
   fwrite($f,$linea);
}

fclose($f);
echo '
<script type="text/javascript">window.location="descargar.php";</script>';
?>
