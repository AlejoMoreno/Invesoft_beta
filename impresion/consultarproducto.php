<?php 

	echo '
	<section id="encabezado">
		<div id="logo">
			<a href="../html/profile"><img src="../imagenes/logo.png"></a>
		</div>
	</section>

	<center><h2><strong>OSMED S.A.S.<br>NIT. 900.492.217-6</strong></h2><br>Carrera 26 No. 45 C - 23 Barrio Palermo<br>Teléfono: 2884041-2882788<br>Cel. 310 334856<br>director.bodega@osmedsas.com / bodegabogota@osmedsas.com / info@osmedsas.com</center><hr>

	';




$sentencia1 = '  `marcas`.`nombre` LIKE "%%"';
$sentencia2='';
$sentencia3='';
$sentencia4='';
$sentencia5='';
$sentencia6='';
$sentencia7='';
$sentencia8='';
$sentencia9='';
$sentencia10='';
$sentencia11='';
$sentencia12='';
$sentencia13='';
$sentencia14='';

if(isset($_POST['consultar'])){
	$nomarcas = $_POST['nomarcas'];
	$nlineas = $_POST['nlineas'];
	$nbodega = $_POST['nbodega'];
	$referencia = $_POST['referencia'];
	$descripcion = $_POST['descripcion'];
	$numerolote = $_POST['numerolote'];
	$tipodepresentacion = $_POST['tipodepresentacion'];
	$maximo = $_POST['maximo'];
	$minimo = $_POST['minimo'];
	$precio = $_POST['precio'];
	$costo = $_POST['costo'];
	$estado = $_POST['estado'];
	$saldo = $_POST['saldo'];
	$fechadevencimiento1 = $_POST['fechadevencimiento1'];
	$fechadevencimiento2 = $_POST['fechadevencimiento2'];


	$sentencia1 = '  `marcas`.`nombre` LIKE "%'.$nomarcas.'%"';

	if ($nlineas!='') {
		$sentencia2 = ' AND  `lineas`.`nombre` LIKE "%'.$nlineas.'%"';
	}
	if ($nbodega!='') {
		$sentencia3 = ' AND `bodegas`.`nombre` LIKE "%'.$nbodega.'%"';
	}
	if ($referencia!='') {
		$sentencia4 = ' AND `inventario`.`referencia` LIKE "%'.$referencia.'%"';
	}
	if ($descripcion!='') {
		$sentencia5 = ' AND `inventario`.`descripcion` LIKE "%'.$descripcion.'%"';
	}
	if ($numerolote!='') {
		$sentencia6 = ' AND `inventario`.`numerolote` = '.$numerolote.'';
	}
	if ($tipodepresentacion!='') {
		$sentencia7 = ' AND `inventario`.`tipopresentacion` LIKE "%'.$tipodepresentacion.'%"';
	}
	if ($maximo!='') {
		$sentencia8 = ' AND `inventario`.`stockmaximo` = '.$maximo.'';
	}
	if ($minimo!='') {
		$sentencia9 = ' AND `inventario`.`stockminimo` = '.$minimo.'';
	}
	if ($precio!='') {
		$sentencia10 = ' AND `inventario`.`precio` = '.$precio.'';
	}
	if ($costo!='') {
		$sentencia11 = ' AND `inventario`.`costo` = '.$costo.'';
	}
	if ($estado!='') {
		$sentencia12 = ' AND `inventario`.`estado` LIKE "%'.$estado.'%"';
	}
	if ($saldo!='') {
		$sentencia13 = ' AND `inventario`.`saldo` '.$saldo.' ';
	}
	if($fechadevencimiento1!='' && $fechadevencimiento2!=''){
		$sentencia14 = ' and `inventario`.`fechadevencimiento` BETWEEN "'.$fechadevencimiento1.'" AND "'.$fechadevencimiento1.'" ';
	}	
}

?>
	

<section id="filtro">
	<form method="post" action="">
		<table id="t21">
		<tr>
			
	   	 	<td width="100px"><input type="" name="nomarcas" placeholder="NOMBRE MARCAS" value=""></td>
	    	<td><input type="" name="nlineas" placeholder="NOMBRE LINEA"></td>
	    	<td><input type="" name="nbodega" placeholder="NOMBRE BODEGA"></td>
	    	<td><input type="" name="referencia" placeholder="REFERENCIA"></td>
	    
		</tr>

		<tr>
			<td><input type="" name="referencia" placeholder="REFERENCIA"></td>
			<td><input type="" name="descripcion" placeholder="DESCRIPCION "></td>
			<td><input type="" name="numerolote" placeholder="NUMERO LOTE"></td>
			<td><input type="" name="tipodepresentacion" placeholder="TIPO PRESENTACION"></td>
		</tr>
		<tr>
			<td><input type="" name="maximo" placeholder="MAXIMO"></td>
			<td><input type="" name="minimo" placeholder="MINIMO"></td>
			<td><input type="" name="precio" placeholder="PRECIO"></td>
			<td><input type="" name="costo" placeholder="COSTO"></td>
		</tr>
		
		<tr>
			<td><input type="" name="estado" placeholder="ESTADO"></td>
			<td><input type="" name="saldo" placeholder="SALDO"></td>
			<td><input type="date" name="fechadevencimiento1"></td>
			<td><input type="date" name="fechadevencimiento2"></td>
		</tr>
		<tr>
			<td><input type="submit" name="consultar" value="consultar"></td>
		</tr>
						
	</form>
</section>



<?php 

include_once "conexion.php"; 
	$conexion= conexion();
	$fecha = date("Y-m-d");
	include('../html/encabezado.php');
	$sql = "SELECT `inventario`.`idinventario`, `bodegas`.`nombre` AS `tbodega`, `inventario`.`ncedula`  , `usuarios`.`nombre` AS `tnusuario` , `marcas`.`nombre` AS `tmnom`, `lineas`.`nombre` AS `tln`, `inventario`.`referencia`, `inventario`.`descripcion`, `inventario`.`numerolote`, `inventario`.`tipopresentacion`, `inventario`.`stockminimo`, `inventario`.`stockmaximo`, `inventario`.`precio`, `inventario`.`costo`, `inventario`.`estado` , `inventario`.`saldo`, `inventario`.`fechadevencimiento`, `inventario`.`iva`, `inventario`.`fechamodificado`
		FROM `inventario`
		INNER JOIN  `usuarios` ON `usuarios` .`ncedula`=`inventario`.`ncedula`
		INNER JOIN `bodegas` ON `bodegas` .`idbodegas`=`inventario`.`idbodega`
		INNER JOIN `marcas` ON `marcas` .`idmarcas`=`inventario`.`idmarcas`
		INNER JOIN `lineas` ON `lineas` .`idlineas`=`inventario`.`idlineas`
		WHERE ".$sentencia1." ".$sentencia2." ".$sentencia3." ".$sentencia4." ".$sentencia5." ".$sentencia6." ".$sentencia7." ".$sentencia8." ".$sentencia9." ".$sentencia10." ".$sentencia11." ".$sentencia12." ".$sentencia13." ".$sentencia14." ;";
	$bill_usuarios = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
	
echo "<h3 id='5'>REPORTE CSV Nueva</h3>	
	<form method='POST' action='../descargar/descargarinventario.php'>
	<input type='hidden' name='sentencia' value='".$sql."'>
	<input type='submit' value='csv'>
	</form>
	<h2>Productos ".$fecha."</h2>";
	



	echo '<div id="consultaLarga">
		<table id="t21" class="tg">
		  <tr>
		    <th class="tg-g4jy">MARCAS</th>
		    <th class="tg-g4jy">LINEAS</th>
		    <th class="tg-g4jy">BODEGA</th>
		    <th class="tg-g4jy">REFERENCIA PRODUCTO</th>
		    <th class="tg-g4jy">DESCRIPCION PRODUCTO</th>
		    <th class="tg-g4jy">NUMERO LOTE</th>
		    <th class="tg-g4jy">TIPO DE PRESENTACION</th>
		    <th class="tg-g4jy">STOCK MAXIMO</th>
		    <th class="tg-g4jy">STOCK MINIMO</th>
		    <th class="tg-g4jy">PRECIO A LA VENTA</th>
		    <th class="tg-g4jy">COSTO COMPRA</th>
		    <th class="tg-g4jy">ESTADO PRODUCTO</th>
		    <th class="tg-g4jy">SALDO EXISTENCIAS</th>
			<th class="tg-g4jy">FECHA VENCIMIENTO</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr class="selected">
		    <td class="tg-iacq">'.$row['tmnom'].'</td>
		    <td class="tg-iacq">'.$row['tln'].'</td>
		    <td class="tg-iacq">'.$row['tbodega'].'</td>
		    <td class="tg-iacq">'.$row['referencia'].'</td>
		    <td class="tg-iacq">'.$row['descripcion'].'</td>
		    <td class="tg-iacq">'.$row['numerolote'].'</td>
		    <td class="tg-iacq">'.$row['tipopresentacion'].'</td>
		    <td class="tg-iacq">'.$row['stockmaximo'].'</td>
		    <td class="tg-iacq">'.$row['stockminimo'].'</td>
		    <td class="tg-iacq">'.$row['precio'].'</td>
		    <td class="tg-iacq">'.$row['costo'].'</td>
		    <td class="tg-iacq">'.$row['estado'].'</td>
		    <td class="tg-iacq">'.$row['saldo'].'</td>
		    <td class="tg-iacq">'.$row['fechadevencimiento'].'</td>
		    </tr>';
	}
	echo '</table></div>';
	?>

<style type="text/css">
#t21 {
	width: 100%;
}
#t21 input{
	width: 100%;
}
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
.selected:hover{
	background-color: #F9F9F9;
}
</style>
