<?php
$f = fopen("reporte.csv","w");
$sep = ","; //separador

include("../conexion.php");
$conexion = conexion();
$sql = "SELECT  `ubicacion`.`hora`, `ubicacion`.`codigocaja` ,  `ubicacion`.`ncedula` ,  `ubicacion`.`fecha` ,  `ubicacion`.`codigocarpeta` ,  `ubicacion`.`ncaja` ,  `ubicacion`.`ncarpeta` ,  `ubicacion`.`cedulaafiliado` , `ubicacion`.`nivel` ,  `ubicacion`.`pasillo` ,  `ubicacion`.`estante` ,  `ubicacion`.`entrepano` ,  `ubicacion`.`fila` ,  `ubicacion`.`columna` ,  `ubicacion`.`piso` ,  `usuarios`.`ncedula` , `usuarios`.`tipousuario` ,  `usuarios`.`nombre` ,  `usuarios`.`apellido` ,  `usuarios`.`cargo` ,  `usuarios`.`cedula` ,  `usuarios`.`clave` ,  `usuarios`.`estado` 
FROM  `ubicacion` 
INNER JOIN  `usuarios` 
WHERE `ubicacion`.`ncedula` = `usuarios`.`ncedula`";
$bill = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
        

$cabecera = 'USUARIO'.$sep.'NOMBRE'.$sep.'APELLIDO'.$sep.'CEDULA USUARIO'.$sep.'CARGO'.$sep.'TIPO_USUARIO'.$sep.'CLAVE'.$sep.'FECHA INGRESO CARPETA'.$sep.'HORA INGRESO'.$sep.'PISO'.$sep.'PASILLO'.$sep.'ESTANTE'.$sep.'ENTREPAÑO'.$sep.'FILA'.$sep.'COLUMNA'.$sep.'NIVEL'.$sep.'CODIGO DE BARRAS CAJA'.$sep.'NUMERO DE CAJA'.$sep.'CODIGO DE BARRAS CARPETA'.$sep.'NUMERO DE CARPETA'.$sep.'CEDULA';

fwrite($f,$cabecera);
while($row = $bill->fetch_assoc()) {
   $linea = '
   '.$row['ncedula'].$sep.$row['nombre'].$sep.$row['apellido'].$sep.$row['cedula'].$sep.$row['cargo'].$sep.$row['tipousuario'].$sep.$row['clave'].$sep.$row['fecha'].$sep.$row['hora'].$sep.$row['piso'].$sep.$row['pasillo'].$sep.$row['estante'].$sep.$row['entrepano'].$sep.$row['fila'].$sep.$row['columna'].$sep.$row['nivel'].$sep.$row['codigocaja'].$sep.$row['ncaja'].$sep.$row['codigocarpeta'].$sep.$row['ncarpeta'].$sep.$row['cedulaafiliado'].'';
   fwrite($f,$linea);
}

fclose($f);
echo '
<script type="text/javascript">window.location="descargar.php";</script>';
?>