<?php 

include_once "conexion.php"; 
$conexion= conexion();  


$bill_usuarios = mysqli_query($conexion,"SELECT * FROM salidadeinventario where idkit = 'C89'") or die(mysqli_error($conexion));		

echo '<table>
<tr>
	<td>referencia</td>
</tr>';

while ($row1 = $bill_usuarios->fetch_assoc()) {
	$idinventario = $row1['idinventario'];
	$bill_usuario2 = mysqli_query($conexion,"SELECT * FROM inventario where idinventario = '$idinventario'") or die(mysqli_error($conexion));
	$row2 = $bill_usuario2->fetch_assoc();
	echo '<tr>
		<td>'.$row2['referencia'].'</td>
		</tr>';
}
echo '</table>';
?>