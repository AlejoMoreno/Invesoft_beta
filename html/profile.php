<?php session_start();?>
<html>
<head>
	<title>Profile</title>
	<?php 
	include_once "../php/conexion.php"; 
    $conexion= conexion();
	$bodegaactual = $_SESSION['bodegaactual'];
	$cedula = $_SESSION['id'];
	$tipousuario = $_SESSION['tipousuario'];
	//$tipousuario ='3';
	
	if($tipousuario=='1'){
		$tipou = 'Administrador';
	}
	elseif ($tipousuario=='2') {
		$tipou = 'Comercial';
	}
	elseif ($tipousuario=='3') {
		$tipou = 'Bodega';
	}

	include('encabezado.php');
	$hoy = date("Y-m-d");
	include('../php/basicfunctions.php');
	$ip = getRealIP();
	?>
</head>
<body>
	<section id="encabezado">
		<div id="logo">
			<img src="../imagenes/logo.png">
		</div>
	</section>
	<section id="cuerpo">
		<div id="titulo"><h1 class="usuario"><span id="usuariotitulo"><?php echo $cedula;?></span><br>Tipo: <div id="tipouser"><?php echo $tipou.'</div><br>Bodega: '.$bodegaactual; ?><br>Vive cada día como si fuera el último...(Steve Jobs)</h1><h1 class="empresa">OSMED SAS</h1><h1 class="fecha"><br><?php echo $hoy.'<br>'.$ip;?><br><a href="http://wakusoft.wix.com/misitio">@wakusoft Copy Right 2016</a></h1></div>
		<div id="menu"> 
			<ul>
				<li class="active"><a href="profile.php" id="binicio"><img src="../imagenes/home.png">Inicio</a></li>
				<li id="administrador-bodega"><a href="entradas.php" id="bentrada"><img src="../imagenes/entrada.png">Entrada</a></li>
				<li id="administrador-bodega-comercial"><a href="salidas.php" id="bsalida"><img src="../imagenes/salida.png">Salida</a></li>
				<li id="administrador-bodega-comercial"><a href="reportes.php" id="breportes"><img src="../imagenes/reportes.png">Reportes</a></li>				
				<li id="administrador"><a href="administrativo.php" id="badministrativo"><img src="../imagenes/reportes.png">Administrador</a></li>
				<li><a href="exit.php" id="bexit"><img src="../imagenes/exit.png">Exit</a></li>
			</ul>
		</div>
	</section>
	<!-- empieza seccion de entradas del inventario -->
	<section id="content">
		<div id="content-menu">

	<?php
	if($tipousuario=='1'){
	$bill_usuarios = mysqli_query($conexion,"SELECT referencia,numerolote,fechadevencimiento,CURDATE(),DATEDIFF(fechadevencimiento,CURDATE()) FROM inventario WHERE DATEDIFF(fechadevencimiento,CURDATE())<728
 AND `idbodega` = '$bodegaactual'") or die(mysqli_error($conexion));
	
	$c1=0;

	echo '<h2>ALERTAS</h2><hr><div class="reportes" id="administrador-bodega">
	<h3 id="2">Productos Con Pocos Días De Vencimiento</h3>
		<table id="t1" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia del Producto</th>
		    <th class="tg-2fs7">Lote</th>
		    <th class="tg-2fs7">Fecha de Vencimiento</th>
		    <th class="tg-2fs7">Días Faltantes</th>
		    </tr>' ;
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['referencia'].'</td>
		    <td class="tg-iacq">'.$row['numerolote'].'</td>
		    <td class="tg-iacq">'.$row['fechadevencimiento'].'</td>
		    <td class="tg-iacq">'.$row['DATEDIFF(fechadevencimiento,CURDATE())'].'</td>
		    </tr>' ;
		    $c1++ ;
	}
	echo '</table>';
	
	if($c1==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c1.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento1" class="si">Tiene '.$c1.' Notificaciones</div>'; 
	}
	
$bill_usuarios11 = mysqli_query($conexion,"SELECT * FROM remision where `idbodega` = '$bodegaactual' and estado != 2
") or die(mysqli_error($conexion));
	
	
$c2=0;
	echo '</div><div class="reportes" id="administrador-bodega-comercial">
	<h3 id="2">Remisiones Pendientes</h3>
		<table id="t2" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia Remisión</th>
		    <th class="tg-2fs7">Estado</th>
		    
		    </tr>';
	while ($row11 = $bill_usuarios11->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row11['documento'].'</td>';
		    
		    if($row11['estado']==1){
		    	echo '<td class="tg-iacq">Pendiente <div class="e" id="e1">.</div></td>';
		    }
		    elseif($row11['estado']==2){
		    	echo '<td class="tg-iacq">Aprobado <div class="e" id="e2">.</div></td>';
		    }
		    elseif($row11['estado']==3){
		    	echo '<td class="tg-iacq">Proceso <div class="e" id="e3">.</div></td>';
		    }
		    elseif($row11['estado']==4){
		    	echo '<td class="tg-iacq">Anulado <div class="e" id="e4">.</div></td>';
		    }
		    
		    echo '</tr>';
	 $c2++;
	}
	echo '</table>';
if($c2==0){
	echo '<div id="vencimiento" class="no">Tiene '.$c2.' Notificaciones</div>'; 
}
else{
	echo '<div id="vencimiento2" class="si">Tiene '.$c2.' Notificaciones</div>'; 
}

	echo '</div><div class="reportes" id="administrador-bodega">			
        <h3 id="2">Este Producto Excede El Máximo De Existencias</h3>';

	$bill_usuarios = mysqli_query($conexion,"SELECT * FROM inventario WHERE `saldo` > `stockmaximo` AND `idbodega` = '$bodegaactual'") or die(mysqli_error($conexion));
	$c3=0;
	echo '
		<table id="t3" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia del Producto</th>
		    <th class="tg-2fs7">Lote</th>
		    <th class="tg-2fs7">Stok Máximo</th>
		    <th class="tg-2fs7">Existencias</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['referencia'].'</td>
		    <td class="tg-iacq">'.$row['numerolote'].'</td>
		    <td class="tg-iacq">'.$row['stockmaximo'].'</td>
		    <td class="tg-iacq">'.$row['saldo'].'</td>
		    </tr>';
	 $c3++;

	}
	echo '</table>';
	if($c3==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c3.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento3" class="si">Tiene '.$c3.' Notificaciones</div>'; 
	}


	$bill_usuarios = mysqli_query($conexion,"SELECT * FROM inventario WHERE `saldo` < `stockminimo` AND `idbodega` = '$bodegaactual'") or die(mysqli_error($conexion));
$c4=0;

	echo '</div><div class="reportes" id="administrador-bodega">
	<h3 id="2">Este Producto Excede El Mínimo De Existencias</h3>
		<table id="t4" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia del Producto</th>
		    <th class="tg-2fs7">Lote</th>
		    <th class="tg-2fs7">Stok Mínimo</th>
		    <th class="tg-2fs7">Existencias</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['referencia'].'</td>
		    <td class="tg-iacq">'.$row['numerolote'].'</td>
		    <td class="tg-iacq">'.$row['stockminimo'].'</td>
		    <td class="tg-iacq">'.$row['saldo'].'</td>
		    </tr>';
	 $c4++;
	}

	echo '</table>';
	
	if($c4==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c4.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento4" class="si">Tiene '.$c4.' Notificaciones</div>'; 
	}
	

	$bill_usuarios = mysqli_query($conexion,"SELECT *,CURDATE(),DATEDIFF(fechacirujia,CURDATE()) FROM pacientes WHERE DATEDIFF(fechacirujia,CURDATE())<1") or die(mysqli_error($conexion));
	$c5=0;

	echo '</div><div class="reportes" id="administrador-bodega">
	<h3 id="2">Cirugia Prontas</h3>
		<table id="t5" class="tg">
		  <tr>
		    <th class="tg-2fs7">Fecha Cirugia</th>
		    <th class="tg-2fs7">Documento</th>
		    <th class="tg-2fs7">Estado Documento</th>
		    <th class="tg-2fs7">Nombre Cirujano</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		$idpaciente = $row['idpaciente'];
		$bill_usuarios1 = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idpaciente` =$idpaciente") or die(mysqli_error($conexion));
		$row2 = $bill_usuarios1->fetch_assoc();
		echo '<tr>
		    <td class="tg-iacq">'.$row['fechacirujia'].'</td>
		    <td class="tg-iacq">'.$row2['documento'].'</td>
		    <td class="tg-iacq">'.$row2['estado'].'</td>
		    <td class="tg-iacq">'.$row['nombrecirujano'].'</td>
		    </tr>';
	 $c5++;
	}

	echo '</table>';
	if($c5==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c5.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento5" class="si">Tiene '.$c5.' Notificaciones</div>'; 
	}
	echo '</div>';
	?>
       
            
		</div>
	</section>
	<?php	
	}
	elseif ($tipousuario=='2') {
		
$bill_usuarios = mysqli_query($conexion,"SELECT * FROM remision where `idbodega` = '$bodegaactual' and estado != 2
") or die(mysqli_error($conexion));
	
	
$c2=0;
	echo '</div><div class="reportes" id="administrador-bodega-comercial">
	<h3 id="2">Remisiones Pendientes</h3>
		<table id="t2" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia Remisión</th>
		    <th class="tg-2fs7">Estado</th>
		    
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['documento'].'</td>';
		    
		    if($row['estado']==1){
		    	echo '<td class="tg-iacq">Pendiente <div class="e" id="e1">.</div></td>';
		    }
		    elseif($row['estado']==2){
		    	echo '<td class="tg-iacq">Aprobado <div class="e" id="e2">.</div></td>';
		    }
		    elseif($row['estado']==3){
		    	echo '<td class="tg-iacq">Proceso <div class="e" id="e3">.</div></td>';
		    }
		    elseif($row['estado']==4){
		    	echo '<td class="tg-iacq">Anulado <div class="e" id="e4">.</div></td>';
		    }
		    
		    echo '</tr>';
	 $c2++;
	}
	echo '</table>';
if($c2==0){
	echo '<div id="vencimiento" class="no">Tiene '.$c2.' Notificaciones</div>'; 
}
else{
	echo '<div id="vencimiento2" class="si">Tiene '.$c2.' Notificaciones</div>'; 
}



	$bill_usuarios = mysqli_query($conexion,"SELECT *,CURDATE(),DATEDIFF(fechacirujia,CURDATE()) FROM pacientes WHERE DATEDIFF(fechacirujia,CURDATE())<1") or die(mysqli_error($conexion));
	$c5=0;

	echo '</div><div class="reportes" id="administrador-bodega">
	<h3 id="2">Proximas Cirugias</h3>
		<table id="t5" class="tg">
		  <tr>
		    <th class="tg-2fs7">Fecha Cirugia</th>
		    <th class="tg-2fs7">Documento</th>
		    <th class="tg-2fs7">Estado Documento</th>
		    <th class="tg-2fs7">Nombre Cirujano</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		$idpaciente = $row['idpaciente'];
		$bill_usuarios1 = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idpaciente` =$idpaciente") or die(mysqli_error($conexion));
		$row2 = $bill_usuarios1->fetch_assoc();
		echo '<tr>
		    <td class="tg-iacq">'.$row['fechacirujia'].'</td>
		    <td class="tg-iacq">'.$row2['documento'].'</td>
		    <td class="tg-iacq">'.$row2['estado'].'</td>
		    <td class="tg-iacq">'.$row['nombrecirujano'].'</td>
		    </tr>';
	 $c5++;
	}

	echo '</table>';
	if($c5==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c5.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento5" class="si">Tiene '.$c5.' Notificaciones</div>'; 
	}
	echo '</div>';
	?>
       
            
		</div>
	</section>
	<?php
	}
	elseif ($tipousuario=='3') {
		$bill_usuarios = mysqli_query($conexion,"SELECT referencia,numerolote,fechadevencimiento,CURDATE(),DATEDIFF(fechadevencimiento,CURDATE()) FROM inventario WHERE DATEDIFF(fechadevencimiento,CURDATE())<728
") or die(mysqli_error($conexion));
	
	$c1=0;

	echo '<h2>ALERTAS</h2><hr><div class="reportes" id="administrador-bodega">
	<h3 id="2">Productos Con Pocos Días De Vencimiento</h3>
		<table id="t1" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia del Producto</th>
		    <th class="tg-2fs7">Lote</th>
		    <th class="tg-2fs7">Fecha de Vencimiento</th>
		    <th class="tg-2fs7">Días Faltantes</th>
		    </tr>' ;
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['referencia'].'</td>
		    <td class="tg-iacq">'.$row['numerolote'].'</td>
		    <td class="tg-iacq">'.$row['fechadevencimiento'].'</td>
		    <td class="tg-iacq">'.$row['DATEDIFF(fechadevencimiento,CURDATE())'].'</td>
		    </tr>' ;
		    $c1++ ;
	}
	echo '</table>';
	
	if($c1==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c1.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento1" class="si">Tiene '.$c1.' Notificaciones</div>'; 
	}
	
$bill_usuarios = mysqli_query($conexion,"SELECT * FROM remision where `idbodega` = '$bodegaactual' and estado != 2
") or die(mysqli_error($conexion));
	
	
$c2=0;
	echo '</div><div class="reportes" id="administrador-bodega-comercial">
	<h3 id="2">Remisiones Pendientes</h3>
		<table id="t2" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia Remisión</th>
		    <th class="tg-2fs7">Estado</th>
		    
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['documento'].'</td>';
		    
		    if($row['estado']==1){
		    	echo '<td class="tg-iacq">Pendiente <div class="e" id="e1">.</div></td>';
		    }
		    elseif($row['estado']==2){
		    	echo '<td class="tg-iacq">Aprobado <div class="e" id="e2">.</div></td>';
		    }
		    elseif($row['estado']==3){
		    	echo '<td class="tg-iacq">Proceso <div class="e" id="e3">.</div></td>';
		    }
		    elseif($row['estado']==4){
		    	echo '<td class="tg-iacq">Anulado <div class="e" id="e4">.</div></td>';
		    }
		    
		    echo '</tr>';
	 $c2++;
	}
	echo '</table>';
if($c2==0){
	echo '<div id="vencimiento" class="no">Tiene '.$c2.' Notificaciones</div>'; 
}
else{
	echo '<div id="vencimiento2" class="si">Tiene '.$c2.' Notificaciones</div>'; 
}

	echo '</div><div class="reportes" id="administrador-bodega">			
        <h3 id="2">Este Producto Excede El Máximo De Existencias</h3>';

	$bill_usuarios = mysqli_query($conexion,"SELECT * FROM inventario WHERE `saldo` > `stockmaximo`") or die(mysqli_error($conexion));
	$c3=0;
	echo '
		<table id="t3" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia del Producto</th>
		    <th class="tg-2fs7">Lote</th>
		    <th class="tg-2fs7">Stok Máximo</th>
		    <th class="tg-2fs7">Existencias</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['referencia'].'</td>
		    <td class="tg-iacq">'.$row['numerolote'].'</td>
		    <td class="tg-iacq">'.$row['stockmaximo'].'</td>
		    <td class="tg-iacq">'.$row['saldo'].'</td>
		    </tr>';
	 $c3++;

	}
	echo '</table>';
	if($c3==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c3.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento3" class="si">Tiene '.$c3.' Notificaciones</div>'; 
	}


	$bill_usuarios = mysqli_query($conexion,"SELECT * FROM inventario WHERE `saldo` < `stockminimo`") or die(mysqli_error($conexion));
$c4=0;

	echo '</div><div class="reportes" id="administrador-bodega">
	<h3 id="2">Este Producto Excede El Mínimo De Existencias</h3>
		<table id="t4" class="tg">
		  <tr>
		    <th class="tg-2fs7">Referencia del Producto</th>
		    <th class="tg-2fs7">Lote</th>
		    <th class="tg-2fs7">Stok Mínimo</th>
		    <th class="tg-2fs7">Existencias</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		echo '<tr>
		    <td class="tg-iacq">'.$row['referencia'].'</td>
		    <td class="tg-iacq">'.$row['numerolote'].'</td>
		    <td class="tg-iacq">'.$row['stockminimo'].'</td>
		    <td class="tg-iacq">'.$row['saldo'].'</td>
		    </tr>';
	 $c4++;
	}

	echo '</table>';
	
	if($c4==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c4.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento4" class="si">Tiene '.$c4.' Notificaciones</div>'; 
	}
	

	$bill_usuarios = mysqli_query($conexion,"SELECT *,CURDATE(),DATEDIFF(fechacirujia,CURDATE()) FROM pacientes WHERE DATEDIFF(fechacirujia,CURDATE())<1") or die(mysqli_error($conexion));
	$c5=0;

	echo '</div><div class="reportes" id="administrador-bodega">
	<h3 id="2">Proximas Cirugias</h3>
		<table id="t5" class="tg">
		  <tr>
		    <th class="tg-2fs7">Fecha Cirugia</th>
		    <th class="tg-2fs7">Documento</th>
		    <th class="tg-2fs7">Estado Documento</th>
		    <th class="tg-2fs7">Nombre Cirujano</th>
		    </tr>';
	while ($row = $bill_usuarios->fetch_assoc()) {
		$idpaciente = $row['idpaciente'];
		$bill_usuarios1 = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `idpaciente` =$idpaciente") or die(mysqli_error($conexion));
		$row2 = $bill_usuarios1->fetch_assoc();
		echo '<tr>
		    <td class="tg-iacq">'.$row['fechacirujia'].'</td>
		    <td class="tg-iacq">'.$row2['documento'].'</td>
		    <td class="tg-iacq">'.$row2['estado'].'</td>
		    <td class="tg-iacq">'.$row['nombrecirujano'].'</td>
		    </tr>';
	 $c5++;
	}

	echo '</table>';
	if($c5==0){
		echo '<div id="vencimiento" class="no">Tiene '.$c5.' Notificaciones</div>'; 
	}
	else{
		echo '<div id="vencimiento5" class="si">Tiene '.$c5.' Notificaciones</div>'; 
	}
	echo '</div>';
	?>
       
            
		</div>
	</section>
	<?php	
	}
?>
	


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$(document).ready(function(){
  $('#t1').hide();
  $('#t2').hide();
  $('#t3').hide();
  $('#t4').hide();
  $('#t5').hide();

  //ocultar por tipo de usuario
  var tipo = $('#tipouser').text();
  if(tipo=='Comercial'){
  	$('#administrador-bodega').hide(1000);
  	$('#administrador').hide(1000);
  	$('.administrador-bodega').hide(1000);
  	$('.administrador').hide(1000);
  }
  if(tipo=='Bodega'){
  	$('#administrador').hide(1000);
  }
});
$('#vencimiento1').click(function(){
	$('#t1').show(1000);
	$('#t2').hide();
	$('#t3').hide();
	$('#t4').hide();
	$('#t5').hide();
});
$('#vencimiento2').click(function(){
	$('#t1').hide();
	$('#t2').show(1000);
	$('#t3').hide();
	$('#t4').hide();
	$('#t5').hide();
});
$('#vencimiento3').click(function(){
	$('#t1').hide();
	$('#t2').hide();
	$('#t3').show(1000);
	$('#t4').hide();
	$('#t5').hide();
});
$('#vencimiento4').click(function(){
	$('#t1').hide();
	$('#t2').hide();
	$('#t3').hide();
	$('#t4').show(1000);
	$('#t5').hide();
});
$('#vencimiento5').click(function(){
	$('#t1').hide();
	$('#t2').hide();
	$('#t3').hide();
	$('#t4').hide();
	$('#t5').show(1000);
});
</script>

<style type="text/css">
.no{color:green;}
.si{color:red;}
h2,h3{color:#BD0A29;}
.tg  {border-collapse:collapse;border-spacing:0; width: 50%;background-color: white;color:#BD0A29;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-2fs7{vertical-align:top;font-size: 16px;}
.tg .tg-{color:#00009b;text-align:center;vertical-align:top}
.tg .tg-iacq{color:#9b9b9b;vertical-align:top}
input,select {outline: none;display: block;width: 10%;border: 1px solid #d9d9d9;margin: 10px 10px 20px;padding: 10px 15px 10px 10px;}
input:focus,select:focus{border: 2px solid #BD0A29;}
#boton{	color: #F9F9F9;	background: rgba(201,65,90,1);	background: -moz-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(201,65,90,1)), color-stop(100%, rgba(189,10,40,1)));	background: -webkit-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -o-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: -ms-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	background: linear-gradient(to bottom, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9415a', endColorstr='#bd0a28', GradientType=0 );}
#boton:hover{	color: #F9F9F9;	background: rgba(194,132,143,1);	background: -moz-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(194,132,143,1)), color-stop(100%, rgba(186,31,62,1)));	background: -webkit-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -o-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: -ms-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	background: linear-gradient(to bottom, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c2848f', endColorstr='#ba1f3e', GradientType=0 );}
#e1{background-color:red;}
#e2{background-color:green;}
#e3{background-color:yellow;}
#e4{background-color:black;}
.e{
	width: 15px;
	border-radius: 200px 200px 200px 200px;
	-moz-border-radius: 200px 200px 200px 200px;
	-webkit-border-radius: 200px 200px 200px 200px;
	border: 0px solid #000000;
}
.reportes{
	width: 100%;
}
</style>
</body>
</html>

