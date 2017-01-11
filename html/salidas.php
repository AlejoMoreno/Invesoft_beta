<?php session_start();?>
<html>
<head>
	<title>salidas</title>
	<?php 
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
		<div id="titulo"><h1 class="usuario"><span id="usuariotitulo"><?php echo $cedula;?></span><br>Tipo: <div id="tipouser"><?php echo $tipou; ?></div><br>Si no cuidas a tus clientes, alguien más lo hará...</h1><h1 class="empresa">OSMED SAS</h1><h1 class="fecha"><br><?php echo $hoy.'<br>'.$ip;?><br><a href="http://wakusoft.wix.com/misitio">@wakusoft Copy Right 2016</a></h1></div>
		<div id="menu"> 
			<ul>
				<li><a href="profile.php" id="binicio"><img src="../imagenes/home.png">inicio</a></li>
				<li id="administrador-bodega"><a href="entradas.php" id="bentrada"><img src="../imagenes/entrada.png">Entrada</a></li>
				<li id="administrador-bodega-comercial" class="active"><a href="salidas.php" id="bsalida"><img src="../imagenes/salida.png">Salida</a></li>
				<li id="administrador-bodega-comercial"><a href="reportes.php" id="breportes"><img src="../imagenes/reportes.png">Reportes</a></li>				
				<li id="administrador"><a href="administrativo.php" id="badministrativo"><img src="../imagenes/reportes.png">Administrador</a></li>
				<li><a href="exit.php" id="bexit"><img src="../imagenes/exit.png">Exit</a></li>
			</ul>
		</div>
	</section>

	<section id="content">
		<div id="content-menu">
			<div id="salida"><img src="../imagenes/salida.png"><div class="content-entrada">
				<div id="titulo"><h1>Salidas del inventario</h1></div><br><br>
				<div class="menu-dos">
					<ul>
						<li class="administrador-bodega-comercial" id="bcrearcliente"><a href="#">Crear Cliente</a></li>
						<li class="administrador-bodega-comercial" id="bcotizacion"><a href="#">Cotización</a></li>
						<li class="administrador-bodega" id="btranslado"><a href="#">Translado Bodegas</a></li>
						<li class="administrador-bodega-comercial" id="bordenpedido"><a href="#">Solicitud De Despacho</a></li>
						<li class="administrador-bodega" id="bregistrarremision"><a href="#">Registrar Remisión</a></li>	
						<li class="administrador-bodega" id="bhojadegasto"><a href="#">Hoja de Gasto</a></li>						
					</ul>
				</div>
				<div id="formulario">
					<div id="help"><br>Selecciona la actividad que desea realizar aquí arriba...<br></div>
					<section id="crearcliente"><?php include('terceros.php'); ?></section>
					<section id="cotizacion"><?php include('../php/menucotizacion.php'); ?></section>
					<section id="translado"><?php include('../php/menutranslado.php'); ?></section>
					<section id="ordenpedido"><?php include('../php/menupedido.php');?></section>
					<section id="registrarremision"><?php include('../php/menuremision.php');?></section>
					<section id="hojadegasto"><?php include('../php/menuhojadegasto.php');?></section>
				</div>
			</div></div>
</section>
</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$(document).ready(function(){
  $('#crearcliente').hide();
  $('#ordenpedido').hide();
  $('#registrarremision').hide();
  $('#hojadegasto').hide();
  $('#translado').hide();
  $('#cotizacion').hide();
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
  	$('.administrador').hide(1000);
  }
});
$('#bcrearcliente').click(function(){
	$('#crearcliente').show(1000);
	$('#ordenpedido').hide();
	$('#registrarremision').hide();
	$('#hojadegasto').hide();
	$('#translado').hide();
	$('#cotizacion').hide();
});
$('#bregistrarremision').click(function(){
	$('#crearcliente').hide();
	$('#ordenpedido').hide();
	$('#registrarremision').show(1000);
	$('#hojadegasto').hide();
	$('#translado').hide();
	$('#cotizacion').hide();
});
$('#bordenpedido').click(function(){
	$('#crearcliente').hide();
	$('#registrarremision').hide();
	$('#ordenpedido').show(1000);
	$('#hojadegasto').hide();
	$('#translado').hide();
	$('#cotizacion').hide();
});
$('#bhojadegasto').click(function(){
	$('#crearcliente').hide();
	$('#registrarremision').hide();
	$('#ordenpedido').hide();
	$('#hojadegasto').show(1000);
	$('#translado').hide();
	$('#cotizacion').hide();
});
$('#btranslado').click(function(){
	$('#crearcliente').hide();
	$('#registrarremision').hide();
	$('#ordenpedido').hide();
	$('#hojadegasto').hide();
	$('#translado').show(1000);
	$('#cotizacion').hide();
});
$('#bcotizacion').click(function(){
	$('#crearcliente').hide();
	$('#registrarremision').hide();
	$('#ordenpedido').hide();
	$('#hojadegasto').hide();
	$('#translado').hide();
	$('#cotizacion').show(1000);
});
</script>