<?php 
//imprimir el formato de remsion
include_once "../php/conexion.php"; 
$conexion= conexion();  
$documento =  $_GET["documento"];

//toma del documento para imprimir 
$bill_contenedor = mysqli_query($conexion,"SELECT * FROM remision where documento like '$documento'") or die(mysqli_error($conexion));		
$row = $bill_contenedor->fetch_assoc();
$idremision = $row['idremision'];
$idsalida = $row['idsalida'];
$idbodega = $row['idbodega'];
$idpaciente = $row['idpaciente'];
$idusuario = $row['idusuario'];
$idclientes = $row['idclientes'];
$fecha = $row['fecha'];
$subtotal = $row['subtotal'];
$iva = $row['iva'];
$descuento = $row['descuento'];
$fletes = $row['fletes'];
$estado = $row['estado'];
$retefuente = $row['retefuente'];
$total = $row['total'];
$documento = $row['documento'];
$observaciones = $row['observacioneliminado'];
//toma de productos con el documento 
$bill_salidadeinventario = mysqli_query($conexion,"SELECT * FROM salidadeinventario where idkit = '$documento'") or die(mysqli_error($conexion));		
//toma del cliente
$bill_cliente = mysqli_query($conexion,"SELECT * FROM terceros where idclientes = '$idclientes'") or die(mysqli_error($conexion));		
$row3 = $bill_cliente->fetch_assoc();
$nombre_cliente= $row3['institucion'].' <strong>A CARGO DE: </strong>'.$row3['nombre'];
$direccion_cliente= $row3['direccion'];
$celular_cliente= $row3['celular'];
$ciudad_cliente= $row3['ciudad'];
$nit_cliente= $row3['nit'];
$telefono_cliente= $row3['telefono'];
//toma del paciente
$bill_paciente = mysqli_query($conexion,"SELECT * FROM pacientes where idpaciente = '$idpaciente'") or die(mysqli_error($conexion));		
$row4 = $bill_paciente->fetch_assoc();
$cedula = $row4['numerodecedulapaciente'];
$nombrepaciente = $row4['nombrepaciente'];
$nombrecirujano = $row4['nombrecirujano'];
$historiaclinica = $row4['historiaclinica'];
$fechacirujia = $row4['fechacirujia'];

?>

<head>
<meta charset="UTF-8">
</head>
 	<section id="encabezado">
		<div id="logo">
			<a href="../html/profile"><img src="../imagenes/logo.png"></a>
		</div>
	</section>
<div id="titulo"><center><h2><strong>OSMED S.A.S.<br>NIT. 900.492.217-6</strong></h2><br>Carrera 26 No. 45 C - 23 Barrio Palermo<br>Teléfono: 2884041-2882788<br>Cel. 310 334856<br>director.bodega@osmedsas.com / bodegabogota@osmedsas.com / info@osmedsas.com</center></div><hr>
	<div id="numeroremision"><strong>NÚMERO DE REMISIÓN:</strong> <?php echo '   '.$documento;?></div>
	<div id="tablas">
<table class="tg">
	<tr>
		<td class="tg-le8v" colspan="2"><strong>CLIENTE</strong></td>
	    <td class="tg-le8v" colspan="3"><strong>FECHA REMISIÓN</strong></td>
	</tr>
	<tr>
	    <td class="tg-yw4l" colspan="2"><?php echo $nombre_cliente;?></td>
	    <td class="tg-yw4l" colspan="3"><?php echo $fecha;?></td>
	</tr>
	<tr>
	    <td class="tg-yw4l" colspan="2"><strong>NIT:</strong><br> <?php echo $nit_cliente;?></td>
	    <td class="tg-yw4l" width="15%"><strong>VENDEDOR:</strong><br> <?php echo $idusuario;?></td>
	    <td class="tg-yw4l" width="15%"><strong>PEDIDO:</strong><br> </td>
	    <td class="tg-yw4l" width="15%"><strong>ORDEN:</strong><br></td>
	</tr>
	<tr>
	    <td class="tg-yw4l" colspan="2"><br><strong>DIRECCION:</strong> <?php echo $direccion_cliente;?>
	    	<br><strong>TELÉFONO:</strong> <?php echo $telefono_cliente;?>
	    	<br><strong>CELULAR:</strong> <?php echo $celular_cliente;?>
	    	<br><strong>CIUDAD:</strong> <?php echo $ciudad_cliente;?>
	    </td>
	    <td class="tg-yw4l" colspan="3" rowspan="2"><label><strong>DATOS DEL PACIENTE</strong></label>
	    	<table class="datos">
	    		<tr>
	    			<td id="pac"><strong>CEDULA: </strong><br> <?php echo $cedula;?></td>
	    			<td id="pac"><strong>PACIENTE: </strong><br> <?php echo $nombrepaciente;?></td>
	    			<td id="pac"><strong>CIRUJANO: </strong><br> <?php echo $nombrecirujano;?></td>
	    		</tr>
	    		<tr>
	    			<td id="pac"><strong>HISTORIA CLINICA: </strong><br> <?php echo $historiaclinica;?></td>
	    			<td colspan="2" id="pac"><strong>FECHA CIRUJIA </strong><br> <?php echo $fechacirujia;?></td>
	    		</tr>
	    	</table>
	    </td>
	</tr>
</table>

<br><br>
<table id="productos" class="tg">
	<tr>
		<td class="tg-le8v">REFERENCIA</td>
		<td class="tg-le8v">NOMBRE</td>
		<td class="tg-le8v">LOTE</td>
		<td class="tg-le8v">VENCIMIENTO</td>
		<td class="tg-le8v">CANTIDAD</td>
		<td class="tg-le8v">VALOR UNIDAD</td>
		<td class="tg-le8v">VALOR TOTAL</td>
	</tr>
	<tr>
	<?php 
		$i=1;
		while ($row1 = $bill_salidadeinventario->fetch_assoc()) {
			$idinventario = $row1['idinventario'];
			$bill_usuario2 = mysqli_query($conexion,"SELECT * FROM inventario where idinventario = '$idinventario'") or die(mysqli_error($conexion));
			$row2 = $bill_usuario2->fetch_assoc();
			echo '<tr>
					<td class="tg-yw4l">'.$row2['referencia'].'</td>
					<td class="tg-yw4l">'.$row2['descripcion'].'</td>
					<td class="tg-yw4l">'.$row2['numerolote'].'</td>
					<td class="tg-yw4l">'.$row2['fechadevencimiento'].'</td>
					<td class="tg-yw4l">'.$row1['cantidad'].'</td>
					<td class="tg-yw4l">'.number_format($row1['precio'], 0, ",", ".").'</td>
					<td class="tg-yw4l">'.number_format(($row1['cantidad']*$row1['precio']), 0, ",", ".").'</td>
					</tr>';
			$i++;
				}
	?>
</table>

<br><br>
<table class="tg">
	<tr>
		<td><strong>Subtotal: </strong>$ <?php echo number_format($subtotal, 0, ",", ".");?></td>
		<td><strong>Iva: </strong> $ <?php echo number_format($iva, 0, ",", ".");?> </td>
		<td><strong>Descuento:</strong> $ <?php echo number_format($descuento, 0, ",", ".");?></td>
		<td><strong>Fletes:</strong> $ <?php echo number_format($fletes, 0, ",", ".");?></td>
		<td><strong>Retefuente:</strong> <?php echo number_format($retefuente, 0, ",", ".");?></td>
		<td><strong>Total: </strong>$ <?php echo number_format($total, 0, ",", ".");?></td>
	</tr>
</table>
<br><br>

<table class="tg">
	<tr>
		<td colspan="2">OBS: <?php echo $observaciones; ?></td>
	</tr>
	<tr>
		<td height="100px"><br><br><br> ALBA VALBUENA </td>
		<td height="100px"><br><br><br>RECIBIDO</td>
	</tr>
</table>
</div>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;background-color: white;border: 1px solid;color: black;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:2px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-le8v{background-color:#BD0A29;vertical-align:top;color:white;}
.tg .tg-yw4l{vertical-align:top;font-size: 11px;}
table{
	width: 120%;
}
#logo1,#datosempresa,#numeroremision{
	width: 40%;
	float: left;
}
#numeroremision{
	position: absolute;
	left: 75%;
	top: 50px;
}
 #datosPa{
 	margin: 1px 1px 1px;
	padding: 1px 1px 1px 1px;
 }
#datos{
	width: 150%;
}
form input{
	width: 92%;
	height: 30px;
	padding: 10px 10px 10px 10px;
	padding-right: 10px;
}
body{
	font-family: sans-serif;
	color: #9EA3A3;
	font-size: 90%;
}
strong{
	color: black;
}
#pac{
	font-size: 10px;
}
#tablas{
	position: absolute;
	width: 90%;
	left: 5%;
}
#titulo{
	position: relative;
	left: 5%;
}
</style>