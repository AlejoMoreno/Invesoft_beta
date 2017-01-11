<?php 
$fecha = $_POST['fecha'];
include_once "../php/conexion.php"; 
	$conexion= conexion();
	include('../html/encabezado.php');
	$bill_usuarios = mysqli_query($conexion,"SELECT marcas.nombre as nomarcas , lineas.nombre as nlineas, bodegas.nombre as nbodega,cierreinventario.referencia as referencia,cierreinventario.descripcion as descripcion, cierreinventario.numerolote as numerolote, cierreinventario.tipopresentacion as tipodepresentacion,cierreinventario.stockmaximo as maximo,cierreinventario.stockminimo as minimo,cierreinventario.precio as precio,cierreinventario.costo as costo , cierreinventario.estado as estado ,cierreinventario.saldo as saldo,fechadevencimiento
	 FROM cierreinventario,bodegas,marcas,lineas WHERE fecha_registro LIKE '$fecha' group by referencia") or die(mysqli_error($conexion));

	echo '<center><h2><strong>OSMED S.A.S.<br>NIT. 900.492.217-6</strong></h2><br>Carrera 26 No. 45 C - 23 Barrio Palermo<br>Teléfono: 2884041-2882788<br>Cel. 310 334856<br>director.bodega@osmedsas.com / bodegabogota@osmedsas.com / info@osmedsas.com</center><hr>
		<h2>Cierre Inventario '.$fecha.'</h2>
	';

	$salto='<center><h2><strong>OSMED S.A.S.<br>NIT. 900.492.217-6</strong></h2><br>Carrera 26 No. 45 C - 23 Barrio Palermo<br>Teléfono: 2884041-2882788<br>Cel. 310 334856<br>director.bodega@osmedsas.com / bodegabogota@osmedsas.com / info@osmedsas.com</center><hr>
		<h2>Cierre Inventario '.$fecha.'</h2>
		';
			

	echo '<div id="consultaLarga">
		<table id="t21" class="tg">
		  <tr>
		    <th class="tg-g4jy">Marcas</th>
		    <th class="tg-g4jy">Lineas</th>
		    <th class="tg-g4jy">Bodega</th>
		    <th class="tg-g4jy">Referencia producto</th>
		    <th class="tg-g4jy">Descripcion del producto</th>
		    <th class="tg-g4jy">Numero lote</th>
		    <th class="tg-g4jy">Tipo de presentacion</th>
		    <th class="tg-g4jy">Stock maximo</th>
		    <th class="tg-g4jy">Stock minimo</th>
		    <th class="tg-g4jy">Precio a la venta</th>
		    <th class="tg-g4jy">Costo compra</th>
		    <th class="tg-g4jy">Estado producto</th>
		    <th class="tg-g4jy">Saldo existente</th>
			<th class="tg-g4jy">Fecha de vencimiento</th>
		    </tr>';
	$i=0;
	while ($row = $bill_usuarios->fetch_assoc()) {
		/*if($i==15 or $i==28){
			echo ' </table></div>
				<div class="saltopagina">'.$salto.'</div>
				<div id="consultaLarga">
				<table id="t21" class="tg">
				  <tr>
				    <th class="tg-g4jy">Marcas</th>
				    <th class="tg-g4jy">Lineas</th>
				    <th class="tg-g4jy">Bodega</th>
				    <th class="tg-g4jy">Referencia producto</th>
				    <th class="tg-g4jy">Descripcion del producto</th>
				    <th class="tg-g4jy">Numero lote</th>
				    <th class="tg-g4jy">Tipo de presentacion</th>
				    <th class="tg-g4jy">Stock maximo</th>
				    <th class="tg-g4jy">Stock minimo</th>
				    <th class="tg-g4jy">Precio a la venta</th>
				    <th class="tg-g4jy">Costo compra</th>
				    <th class="tg-g4jy">Estado producto</th>
				    <th class="tg-g4jy">Saldo existente</th>
					<th class="tg-g4jy">Fecha de vencimiento</th>
				    </tr>';
		}*/
		echo '<tr>
		    <td class="tg-iacq">'.$row['nomarcas'].'</td>
		    <td class="tg-iacq">'.$row['nlineas'].'</td>
		    <td class="tg-iacq">'.$row['nbodega'].'</td>
		    <td class="tg-iacq">'.$row['referencia'].'</td>
		    <td class="tg-iacq">'.$row['descripcion'].'</td>
		    <td class="tg-iacq">'.$row['numerolote'].'</td>
		    <td class="tg-iacq">'.$row['tipodepresentacion'].'</td>
		    <td class="tg-iacq">'.$row['maximo'].'</td>
		    <td class="tg-iacq">'.$row['minimo'].'</td>
		    <td class="tg-iacq">'.$row['precio'].'</td>
		    <td class="tg-iacq">'.$row['costo'].'</td>
		    <td class="tg-iacq">'.$row['estado'].'</td>
		    <td class="tg-iacq">'.$row['saldo'].'</td>
		    <td class="tg-iacq">'.$row['fechadevencimiento'].'</td>
		    </tr>';
		    $i++;

	}
	echo '</table></div>';
	?>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-g4jy{background:#00009b;color:white;vertical-align:top}
.tg .tg-bw1g{color:#00009b;text-align:center;vertical-align:top}
.tg .tg-96dg{color:#9b9b9b;vertical-align:top}
input,select {outline: none;display: block;width: 10%;border: 1px solid #d9d9d9;margin: 10px 10px 20px;padding: 10px 15px 10px 10px;}
input:focus,select:focus{border: 2px solid #BD0A29;}
#boton{	color: #F9F9F9;	background: rgba(201,65,90,1);	background: -moz-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(201,65,90,1)), color-stop(100%, rgba(189,10,40,1)));	background: -webkit-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -o-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -ms-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: linear-gradient(to bottom, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9415a', endColorstr='#bd0a28', GradientType=0 );}
#boton:hover{	color: #F9F9F9;	background: rgba(194,132,143,1);	background: -moz-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(194,132,143,1)), color-stop(100%, rgba(186,31,62,1)));	background: -webkit-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -o-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -ms-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: linear-gradient(to bottom, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c2848f', endColorstr='#ba1f3e', GradientType=0 );}
@media all {
   div.saltopagina{
      display: none;
   }
}
   
@media print{
   div.saltopagina{ 
      display:block; 
      page-break-before:always;
   }
}
</style>
