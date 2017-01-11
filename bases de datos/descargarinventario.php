<?php
$f = fopen("reporte.csv","w");
$sep = ","; //separador

include("../php/conexion.php");
$conexion = conexion();

/*$sql = " SELECT `inventario`.`idinventario`, `bodegas`.`nombre` AS `tbodega`, `inventario`.`ncedula`  , `usuarios`.`nombre` AS `tnusuario` , `marcas`.`nombre` AS `tmnom`, `lineas`.`nombre` AS `tln`, `inventario`.`referencia`, `inventario`.`descripcion`, `inventario`.`numerolote`, `inventario`.`tipopresentacion`, `inventario`.`stockminimo`, `inventario`.`stockmaximo`, `inventario`.`precio`, `inventario`.`costo`, `inventario`.`estado` , `inventario`.`saldo`, `inventario`.`fechadevencimiento`, `inventario`.`iva`, `inventario`.`fechamodificado`
FROM `inventario`
INNER JOIN  `usuarios` ON `usuarios` .`ncedula`=`inventario`.`ncedula`
INNER JOIN `bodegas` ON `bodegas` .`idbodegas`=`inventario`.`idbodega`
INNER JOIN `marcas` ON `marcas` .`idmarcas`=`inventario`.`idmarcas`
INNER JOIN `lineas` ON `lineas` .`idlineas`=`inventario`.`idlineas`
";*/
$sql = $_POST['sentencia'];
echo $sql;
$bill = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));     

$cabecera = 'IDENTIFICACION INVENTARIO'.$sep.'BODEGA'.$sep.'CEDULA USUARIO'.$sep.'NOMBRE USUARIO'.$sep.'MARCA'.$sep.'LINEA'.$sep.'REFERENCIA'.$sep.'DESCRIPCION'.$sep.'NUMERO DE LOTE'.$sep.'TIPO DE PRESENTACION'.$sep.'STOCK MINIMO'.$sep.'STOCK MAXIMO'.$sep.'PRECIO'.$sep.'COSTO'.$sep.'ESTADO'.$sep.'SALDO'.$sep.'FECHA DE VENCIMIENTO'.$sep.'IVA'.$sep.'FECHA MODIFICADO';

fwrite($f,$cabecera);
while($row = $bill->fetch_assoc()) {
   $linea = '
   '.$row['idinventario'].$sep.$row['tbodega'].$sep.$row['ncedula'].$sep.$row['tnusuario'].$sep.$row['tmnom'].$sep.$row['tln'].$sep.$row['referencia'].$sep.$row['descripcion'].$sep.$row['numerolote'].$sep.$row['tipopresentacion'].$sep.$row['stockminimo'].$sep.$row['stockmaximo'].$sep.$row['precio'].$sep.$row['costo'].$sep.$row['estado'].$sep.$row['saldo'].$sep.$row['fechadevencimiento'].$sep.$row['iva'].$sep.$row['fechamodificado'].'';
   fwrite($f,$linea);
}

fclose($f);
echo '
<script type="text/javascript">window.location="descargar.php";</script>';
?>
