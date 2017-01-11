
<?php

echo '
	<section id="encabezado">
		<div id="logo">
			<a href="../html/profile"><img src="../imagenes/logo.png"></a>
		</div>
	</section>
	<center><h2><strong>OSMED S.A.S.<br>NIT. 900.492.217-6</strong></h2><br>Carrera 26 No. 45 C - 23 Barrio Palermo<br>Teléfono: 2884041-2882788<br>Cel. 310 334856<br>director.bodega@osmedsas.com / bodegabogota@osmedsas.com / info@osmedsas.com</center><hr>
		<h2>Clientes </h2>';
$tipo='';
$sentencia1='';
$sentencia2='';
$sentencia3='';
$sentencia4='';
$sentencia5='';
$sentencia6='';
$sentencia7='';
$sentencia8='';
$sentencia9='';
$sentencia10='';
$sentencia11=' WHERE `terceros`.`tipo` LIKE "CLIENTE"';
$sentencia12='';
$sentencia13='';
$sentencia14='';


if(isset($_POST['consultar'])){
	$nombre = $_POST['nombre'];
	$R1 = $_POST['R1'];
	$S1 = $_POST['S1'];
	$S2 = $_POST['S2'];
	$S3 = $_POST['S3'];
	$S4 = $_POST['S4'];
	$S5 = $_POST['S5'];
	$R21 = $_POST['R21'];
	$R22 = $_POST['R22'];


	$sentencia1 = ' AND `terceros`.`nombre` LIKE "%'.$nombre.'%"';

	if ($R1!='') {
		$sentencia2 = ' AND  `remision`.`documento` LIKE "%'.$R1.'%"';
	}
	if ($S1!='') {
		$sentencia3 = ' AND `inventario`.`referencia` LIKE "%'.$S1.'%"';
	}
	if ($S2!='') {
		$sentencia4 = ' AND `salidadeinventario`.`cantidad` LIKE "%'.$S2.'%"';
	}
	if ($S3!='') {
		$sentencia5 = ' AND `salidadeinventario`.`precio` LIKE "%'.$S3.'%"';
	}
	if ($S4!='') {
		$sentencia6 = ' AND `salidadeinventario`.`tipo` LIKE "%'.$S4.'%"';
	}
	if ($S5!='') {
		$sentencia7 = ' AND `salidadeinventario`.`lote` LIKE "%'.$S5.'%"';
	}
	
	if($R21!='' && $R22!=''){
		$sentencia14 = ' AND  `remision`.`fecha`  BETWEEN "'.$R21.'" AND "'.$R22.'" ';
	}	
}


?>




<section id="filtro">
	<form method="post" action="">
		<table id="t21">
		<tr>
			
	   	 	<td width="100px"><input type="" name="nombre" placeholder="NOMBRE PROVEEDOR" value=""></td>
	    	<td><input type="" name="R1" placeholder="DOCUMENTO"></td>
	    	<td><input type="date" name="R21" placeholder="FECHA REMISION"></td>
	    	<td><input type="date" name="R22" placeholder="FECHA REMISION"></td>
	    	<td><input type="" name="S1" placeholder="REFERENCIA"></td>
	    
		</tr>

		<tr>
			<td><input type="" name="S2" placeholder="CANTIDAD"></td>
			<td><input type="" name="S3" placeholder="PRECIO"></td>
			<td><input type="" name="S4" placeholder="TIPO"></td>
			<td><input type="" name="S5" placeholder="LOTE"></td>
		</tr>
		
		<tr>
			<td><input type="submit" name="consultar" value="CONSULTAR"></td>
		</tr>
						
	</form>
</section>

			<?php 
include_once "conexion.php"; 
	$conexion= conexion();
include('../html/encabezado.php');

	$sql = "SELECT `terceros`.`nombre`, `remision`.`documento` AS `R1`, `remision`.`fecha` AS `R2`, `inventario`.`referencia` AS `S1`, `salidadeinventario`.`cantidad` AS `S2`, `salidadeinventario`.`precio` AS `S3`, `salidadeinventario`.`tipo` AS `S4`, `salidadeinventario`.`lote` AS `S5` FROM `terceros` INNER JOIN `inventario` INNER JOIN `salidadeinventario` ON `salidadeinventario`.`idinventario`= `inventario`.`idinventario` INNER JOIN `remision` ON `remision` .`documento`=`salidadeinventario`.`idkit` 
		".$sentencia11." ".$sentencia1." ".$sentencia2." ".$sentencia3." ".$sentencia4." ".$sentencia5." ".$sentencia6." ".$sentencia14." ;";

	$bill_usuarios = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));

echo "<h3 id='5'>REPORTE CSV </h3>	
	<form method='POST' action='../descargar/descargarmovimientocliente.php'>
	<input type='hidden' name='sentencia' value='".$sql."'>
	<input type='submit' value='csv'>
	</form>";



	echo '<div id="consultaLarga">
		<table id="t21" class="tg">
		  <tr>
		    <th class="tg-g4jy">TERCERO</th>
		    <th class="tg-g4jy">TIPO DE REMISION</th>
		    <th class="tg-g4jy">FECHA REMISION</th>
		    <th class="tg-g4jy">REFERENCIA</th>
		    <th class="tg-g4jy">CANTIDAD</th>
		    <th class="tg-g4jy">PRECIO</th>
		    <th class="tg-g4jy">TIPO</th>
		    <th class="tg-g4jy">LOTE</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['nombre'].'</td>
		    <td class="tg-iacq">'.$row['R1'].'</td>
		    <td class="tg-iacq">'.$row['R2'].'</td>
		    <td class="tg-iacq">'.$row['S1'].'</td>
		    <td class="tg-iacq">'.$row['S2'].'</td>
		    <td class="tg-iacq">'.$row['S3'].'</td>
		    <td class="tg-iacq">'.$row['S4'].'</td>
		    <td class="tg-iacq">'.$row['S5'].'</td>
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
.descarga{
	color:red;
}
.descarga:hover{
	color:blue;
}
</style>