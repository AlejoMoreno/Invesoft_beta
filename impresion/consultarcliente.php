<?php 

	echo '
	<section id="encabezado">
		<div id="logo">
			<a href="../html/profile"><img src="../imagenes/logo.png"></a>
		</div>
	</section>

	<center><h2><strong>OSMED S.A.S.<br>NIT. 900.492.217-6</strong></h2><br>Carrera 26 No. 45 C - 23 Barrio Palermo<br>Teléfono: 2884041-2882788<br>Cel. 310 334856<br>director.bodega@osmedsas.com / bodegabogota@osmedsas.com / info@osmedsas.com</center><hr>
	

	
	';

$tipoc='';
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
$sentencia11='';
$sentencia12='';

		
	

if(isset($_POST['consultar'])){

	$nombre = $_POST['nombre'];
	$R1 = $_POST['R1'];
	$R2 = $_POST['R2'];
	$institucion = $_POST['institucion'];
	$nit = $_POST['nit'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	$direccion = $_POST['direccion'];
	$celular = $_POST['celular'];
	$estado = $_POST['estado'];
	$contacto_directo = $_POST['contacto_directo'];
	$tipoc = $_POST['tipoc'];
	$calificacion = $_POST['calificacion'];


	$sentencia1 = ' AND  `terceros`.`nombre` LIKE "%'.$nombre.'%"';

	if ($R1!='') {
		$sentencia2 = ' AND  `departamento`.`nombre` LIKE "%'.$R1.'%"';
	}
	if ($R2!='') {
		$sentencia3 = ' AND `ciudades`.`nombre` LIKE "%'.$R2.'%"';
	}
	if ($institucion!='') {
		$sentencia4 = ' AND `terceros`.`institucion` LIKE "%'.$institucion.'%"';
	}
	if ($nit!='') {
		$sentencia5 = ' AND `terceros`.`nit` LIKE "%'.$nit.'%"';
	}
	if ($telefono!='') {
		$sentencia6 = ' AND `terceros`.`telefono` LIKE "%'.$telefono.'%"';
	}
	if ($correo!='') {
		$sentencia7 = ' AND `terceros`.`correo` LIKE "%'.$correo.'%"';
	}
	if ($direccion!='') {
		$sentencia8 = ' AND `terceros`.`direccion` LIKE "%'.$direccion.'%"';
	}
	if ($celular!='') {
		$sentencia9 = ' AND `terceros`.`celular` LIKE "%'.$celular.'%"';
	}
	if ($contacto_directo!='') {
		$sentencia10 = ' AND `terceros`.`contacto_directo` LIKE "%'.$contacto_directo.'%"';
	}
	if ($tipoc!='') {
		$sentencia11 = ' WHERE `terceros`.`tipo` LIKE "%'.$tipoc.'%"';
	}
	if ($calificacion!='') {
		$sentencia12 = ' AND `terceros`.`calificacion` LIKE "%'.$calificacion.'%"';
	}
}

?>


<section id="filtro">
	<form method="post" action="">
		<table id="t21">
		<tr>
			
	   	 	<td><input type="" name="R1" placeholder="DEPARTAMENTO" value=""></td>
	    	<td><input type="" name="R2" placeholder="CIUDAD"></td>
	    	<td><input type="" name="nombre" placeholder="NOMBRE"></td>
	    	<td><input type="" name="institucion" placeholder="INSTITUCION"></td>
	    
		</tr>

		<tr>
			<td><input type="" name="nit" placeholder="NIT"></td>
			<td><input type="" name="telefono" placeholder="TELEFONO"></td>
			<td><input type="" name="correo" placeholder="CORREO"></td>
			<td><input type="" name="direccion" placeholder="DIRECCION"></td>
		</tr>
		<tr>
			<td><input type="" name="celular" placeholder="CELULAR"></td>
			<td><input type="" name="estado" placeholder="ESTADO"></td>
			<td><input type="" name="contacto_directo" placeholder="CONTACTO DIRECTO"></td>
			<td><input type="" name="tipoc" placeholder="TIPO" value="CLIENTE"></td>
		</tr>
		
		<tr>
			<td><input type="" name="calificacion" placeholder="CALIFICACION"></td>
			<td COLSPAN="3"><input type="submit" name="consultar" value="consultar"></td>
		</tr>
	</form>
</section>

	
<?php 
include_once "conexion.php"; 
	$conexion= conexion();
include('../html/encabezado.php');

	$sql = "SELECT 
	`terceros`.`idclientes`,
	`departamento`.`nombre` AS `R1`,
	`ciudades`.`nombre` AS `R2`,
	`terceros`.`nombre` , 
	`terceros`.`institucion` , 
	`terceros`.`nit` , 
	`terceros`.`telefono` , 
	`terceros`.`correo` , 
	`terceros`.`direccion` , 
	`terceros`.`celular` , 
	`terceros`.`estado` , 
	`terceros`.`contacto_directo` , 
	`terceros`.`tipo` , 
	`terceros`.`calificacion` , 
	`terceros`.`bodega` , 
	`terceros`.`fechamodificado` 
	FROM `terceros` 
	INNER JOIN `ciudades` ON `ciudades`. `idciudades` = `terceros`.`ciudad` 
	INNER JOIN `departamento` ON `departamento`.`iddepartamento` = `terceros`.`departamento` 
	".$sentencia11." ".$sentencia1." ".$sentencia2." ".$sentencia3." ".$sentencia4." ".$sentencia5." ".$sentencia6." ".$sentencia7." ".$sentencia8." ".$sentencia9." ".$sentencia10." ".$sentencia12." ;";

	echo "<h3 id='5'>REPORTE CSV Nueva</h3>	
	<form method='POST' action='../descargar/descargarcliente.php'>
	<input type='' name='sentencia' value='".$sql."'>
	<input type='submit' value='csv'>
	</form>";

	$bill_usuarios = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
	echo '<div id="consultaLarga">
		<table id="t21" class="tg">
		  <tr>
		    <th class="tg-g4jy">DEPARTAMENTO</th>
		    <th class="tg-g4jy">CIUDAD</th>
		    <th class="tg-g4jy">NOMBRE</th>
		    <th class="tg-g4jy">INSTITUCION</th>
		    <th class="tg-g4jy">NIT</th>
		    <th class="tg-g4jy">TELEFONO</th>
		    <th class="tg-g4jy">CORREO</th>
		    <th class="tg-g4jy">DIRECCION</th>
		    <th class="tg-g4jy">CELULAR</th>
		    <th class="tg-g4jy">ESTADO</th>
		    <th class="tg-g4jy">CONTACTO DIRECTO</th>
		    <th class="tg-g4jy">TIPO</th>
		    <th class="tg-g4jy">CALIFICACION</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['R1'].'</td>
		    <td class="tg-iacq">'.$row['R2'].'</td>
		    <td class="tg-iacq">'.$row['nombre'].'</td>
		    <td class="tg-iacq">'.$row['institucion'].'</td>
		    <td class="tg-iacq">'.$row['nit'].'</td>
		    <td class="tg-iacq">'.$row['telefono'].'</td>
		    <td class="tg-iacq">'.$row['correo'].'</td>
		    <td class="tg-iacq">'.$row['direccion'].'</td>
		    <td class="tg-iacq">'.$row['celular'].'</td>
		    <td class="tg-iacq">'.$row['estado'].'</td>
		    <td class="tg-iacq">'.$row['contacto_directo'].'</td>
		    <td class="tg-iacq">'.$row['tipo'].'</td>
		    <td class="tg-iacq">'.$row['calificacion'].'</td>
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
</style>