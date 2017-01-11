<?php session_start();?>
<html>
<head>
	<title>entradas</title>
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
		<div id="titulo"><h1 class="usuario"><span id="usuariotitulo"><?php echo $cedula;?></span><br>Tipo: <div id="tipouser"><?php echo $tipou; ?></div><br>Hagas lo que hagas, hazlo tan bien para que vuelvan y además traigan a sus amigos...(Walt Disney)</h1><h1 class="empresa">OSMED SAS</h1><h1 class="fecha"><br><?php echo $hoy.'<br>'.$ip;?><br><a href="http://wakusoft.wix.com/misitio">@wakusoft Copy Right 2016</a></h1></div>
		<div id="menu"> 
			<ul>
				<li><a href="profile.php" id="binicio"><img src="../imagenes/home.png">inicio</a></li>
				<li id="administrador-bodega" class="active"><a href="entradas.php" id="bentrada"><img src="../imagenes/entrada.png">Entrada</a></li>
				<li id="administrador-bodega-comercial"><a href="salidas.php" id="bsalida"><img src="../imagenes/salida.png">Salida</a></li>
				<li id="administrador-bodega-comercial"><a href="reportes.php" id="breportes"><img src="../imagenes/reportes.png">Reportes</a></li>				
				<li id="administrador"><a href="administrativo.php" id="badministrativo"><img src="../imagenes/reportes.png">Administrador</a></li>
				<li><a href="exit.php" id="bexit"><img src="../imagenes/exit.png">Exit</a></li>
			</ul>
		</div>
	</section>
	<section id="content">
		<div id="content-menu">
			<div id="entrada"><img src="../imagenes/entrada.png"><div class="content-entrada"> 
				<div id="titulo"><h1>Entradas de inventario</h1></div><br><br>
				<div class="menu-dos">
					<ul>
						<li id="bcrearproducto"><a href="#">Producto</a></li>
						<li id="bcrearproveedor"><a href="#">Crear Proveedor</a></li>
						<li id="bcrearmarcas"><a href="#">Crear Marcas</a></li>
						<li id="bcrearlinea"><a href="#">Crear Lineas</a></li>
						<li id="bregistrarcompra"><a href="#">Registrar Factura Compra</a></li>
						<li id="bregistrarkits"><a href="#">Registrar kits</a></li>
                        <li id="bpedido"><a href="#">Hacer pedido</a></li>
                        <li><a class="other" href="ajusteinventario.html">Ajustes</a></li>
					</ul>
				</div>
				<div id="formulario">
					<div id="help">Selecciona la actividad que desea realizar aquí arriba...</div>
					<section id="crearproducto"><?php include('inventario.php'); ?></section>
					<section id="crearproveedor"><?php include('terceros.php'); ?></section>
					<section id="crearmarcas"><?php include('../php/registrarmarca.php'); ?></section>
					<section id="crearlinea"><?php include('../php/registrarlinea.php'); ?></section>
					<section id="registrarcompra"><?php include('../php/menucompra.php'); ?></section>
					<section id="registrarkits"><?php include('../php/subirarchivo.php'); ?></section>
                    <section id="registropedido"><?php include('../php/pedido.php'); ?></section>
				</div>
			</div></div>
		</div>
	</section>
</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$(document).ready(function(){
	$('#crearproducto').hide();
	$('#crearproveedor').hide();
	$('#crearmarcas').hide();
	$('#crearlinea').hide();
	$('#registrarcompra').hide();
	$('#registrarkits').hide();
	$('#registropedido').hide();
	//ocultar por tipo de usuario
  var tipo = $('#tipouser').text();
  if(tipo=='Comercial'){
  	$('#administrador-bodega').hide(1000);
  	$('#administrador').hide(1000);
  }
  if(tipo=='Bodega'){
  	$('#administrador').hide(1000);
  }
});

$('#bcrearproducto').click(function(){
	$('#crearproducto').show(1000);
	$('#crearproveedor').hide();
	$('#crearmarcas').hide();
	$('#crearlinea').hide();
	$('#registrarcompra').hide();
	$('#registrarkits').hide();
	$('#registropedido').hide();
});
$('#bcrearproveedor').click(function(){
	$('#crearproducto').hide();
	$('#crearproveedor').show(1000);
	$('#crearmarcas').hide();
	$('#crearlinea').hide();
	$('#registrarcompra').hide();
	$('#registrarkits').hide();
	$('#registropedido').hide();
});
$('#bcrearmarcas').click(function(){
	$('#crearproducto').hide();
	$('#crearproveedor').hide();
	$('#crearmarcas').show(1000);
	$('#crearlinea').hide();
	$('#registrarcompra').hide();
	$('#registrarkits').hide();
	$('#registropedido').hide();
});
$('#bcrearlinea').click(function(){
	$('#crearproducto').hide();
	$('#crearproveedor').hide();
	$('#crearmarcas').hide();
	$('#crearlinea').show(1000);
	$('#registrarcompra').hide();
	$('#registrarkits').hide();
	$('#registropedido').hide();
});
$('#bregistrarcompra').click(function(){
	$('#crearproducto').hide();
	$('#crearproveedor').hide();
	$('#crearmarcas').hide();
	$('#crearlinea').hide();
	$('#registrarcompra').show(1000);
	$('#registrarkits').hide();
	$('#registropedido').hide();
});
$('#bregistrarkits').click(function(){
	$('#crearproducto').hide();
	$('#crearproveedor').hide();
	$('#crearmarcas').hide();
	$('#crearlinea').hide();
	$('#registrarcompra').hide();
	$('#registrarkits').show(1000);
	$('#registropedido').hide();
});
$('#bpedido').click(function(){
	$('#crearproducto').hide();
	$('#crearproveedor').hide();
	$('#crearmarcas').hide();
	$('#crearlinea').hide();
	$('#registrarcompra').hide();
	$('#registrarkits').hide();
	$('#registropedido').show(1000);
});
</script>

<style type="text/css">
.other{
	color:red;
}
</style>