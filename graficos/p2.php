<?php
// Conectamos base de datos
$conexion = mysql_connect('localhost', 'root', '')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('osmed') or die('No se pudo seleccionar la base de datos');
 
//preparamos la consulta
$SQLDatos = "SELECT * FROM historial";
 
//ejecutamos la consulta
$result = mysql_query($SQLDatos);
//obtenemos número filas
$numFilas = mysql_num_rows($result);
 
//cargamos array con los nombres de las métricas a visualizar
$datos[0] = array('iduser','fecha');
 
//recorremos filas
for ($i=1; $i<($numFilas+1); $i++)
{
    $datos[$i] = array(mysql_result($result, $i-1, "fecha"),
    (int) mysql_result($result, $i-1, "iduser"));
}
 
mysql_close($conexion);
?>