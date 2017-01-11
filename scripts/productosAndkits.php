<h1>Consumir servicio kits y productos</h1>
<div id="consulta">
<?php 
include_once "../php/conexion.php"; 
$conexion= conexion();

//consulta all productos
$bill_producto = mysqli_query($conexion,"SELECT * FROM  `inventario` ORDER BY  `inventario`.`descripcion` ASC ") or die(mysqli_error($conexion)); 
$rawdata = array(); //creamos un array

//guardamos en un array multidimensional todos los datos de la consulta
$i=0;

while($row = mysqli_fetch_array($bill_producto))
{
    $rawdata[$i] = $row;
    $i++;
}
$jsonproductos=json_encode($rawdata);
echo '<br><h2>Productos</h2><hr><br><div id="jsonproductos">'.$jsonproductos.'</div>';

//bill kit consulta
$bill_kit = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `tipo` LIKE 'kit' GROUP BY `idkit` ") or die(mysqli_error($conexion)); 

$bill_kits = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE `tipo` LIKE 'kit' ORDER BY `idkit` ") or die(mysqli_error($conexion)); 
$rawdata = array(); //creamos un array

//guardamos en un array multidimensional todos los datos de la consulta
$i=0;

while($row = mysqli_fetch_array($bill_kits))
{
    $rawdata[$i] = $row;
    $i++;
}
$jsonkits=json_encode($rawdata);
echo '<br><h2>Kits</h2><hr><br><div id="jsonkits">'.$jsonkits.'</div>';

?>
</div>