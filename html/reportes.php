<?php session_start();?>
<html>
<head>
	<title>reportes</title>
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
		<div id="titulo"><h1 class="usuario"><span id="usuariotitulo"><?php echo $cedula;?></span><br>Tipo: <div id="tipouser"><?php echo $tipou; ?></div><br>Bien hecho es mejor que bien dicho...(Benjamin Franklin)</h1><h1 class="empresa">OSMED SAS</h1><h1 class="fecha"><br><?php echo $hoy.'<br>'.$ip;?><br><a href="http://wakusoft.wix.com/misitio">@wakusoft Copy Right 2016</a></h1></div>
		<div id="menu"> 
			<ul>
				<li><a href="profile.php" id="binicio"><img src="../imagenes/home.png">Inicio</a></li>
				<li id="administrador-bodega"><a href="entradas.php" id="bentrada"><img src="../imagenes/entrada.png">Entrada</a></li>
				<li id="administrador-bodega-comercial"><a href="salidas.php" id="bsalida"><img src="../imagenes/salida.png">Salida</a></li>
				<li id="administrador-bodega-comercial" class="active"><a href="reportes.php" id="breportes"><img src="../imagenes/reportes.png">Reportes</a></li>				
				<li id="administrador"><a href="administrativo.php" id="badministrativo"><img src="../imagenes/reportes.png">Administrador</a></li>
				<li><a href="exit.php" id="bexit"><img src="../imagenes/exit.png">Exit</a></li>
			</ul>
		</div>
	</section>

	<section id="content">
		<div id="content-menu">
			<div id="reportes"><img src="../imagenes/reportes.png"><div class="content-entrada">
				<div id="titulo"><h1>Reportes</h1></div><br><br>
				<div class="op">
					<ul class="nav">
						
						<li class="administrador" id="bcierreinventario"><a href="#">Cierre de Inventario</a></li>
						<li class="administrador-bodega" id="bcostosaldos"><a href="#">Costos y Saldos</a></li>
						<li class="administrador-bodega-comercial" id="bconsultas"><a href="#">Consultas Rapidas</a></li>		
						<li class="administrador-bodega" id="bgraficas"><a href="#">Consultas Graficas</a></li>
					</ul>
				</div>

				<div id="formulario">
					<div id="help">Selecciona la actividad que desea realizar aquí arriba...</div>
					<section id="cierreinventario"><?php include('../graficos/cierremensual.php'); ?></section>
					<section id="consultas"><?php include('../php/menureportes.php'); ?></section>					
					<section id="graficas"><?php include('../php/graficas.php'); ?></section>
				</div>
			</div></div>
		</div>
	</section>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$(document).ready(function(){
	$('#consultarcliente').hide();
	$('#consultarproducto').hide();
	$('#consultarproveedor').hide();
	$('#consultas').hide();
	$('#pyg').hide();
	$('#costosaldos').hide();
	$('#cierreinventario').hide();	
	$('#graficas').hide();
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
  if($tipo=='Administrador'){
  	$('#administrador-bodega').hide(1000);
  	$('.administrador-bodega').hide(1000);
  	$('#administrador-bodega-comercial').hide(1000);
  	$('.administrador-bodega-comercial').hide(1000);
  }
});

$('#bclientes').click(function(){
	$('#consultarcliente').show (1000);
	$('#consultarproducto').hide();
	$('#consultarproveedor').hide();
	$('#consultas').hide();
	$('#pyg').hide();
	$('#costosaldos').hide();
	$('#cierreinventario').hide();
	$('#graficas').hide();
});
$('#bproducto').click(function(){
	$('#consultarcliente').hide();
	$('#consultarproducto').show (1000);
	$('#consultarproveedor').hide();
	$('#consultas').hide();
	$('#pyg').hide();
	$('#costosaldos').hide();
	$('#cierreinventario').hide();
	$('#graficas').hide();
});
$('#bproveedor').click(function(){
	$('#consultarcliente').hide();
	$('#consultarproducto').hide();
	$('#consultarproveedor').show (1000);
	$('#consultas').hide();
	$('#pyg').hide();
	$('#costosaldos').hide();
	$('#cierreinventario').hide();
	$('#graficas').hide();
});
$('#bconsultas').click(function(){
	$('#consultarcliente').hide();
	$('#consultarproducto').hide();
	$('#consultarproveedor').hide ();
	$('#consultas').show(1000);
	$('#pyg').hide();
	$('#costosaldos').hide();
	$('#cierreinventario').hide();
	$('#graficas').hide();
});
$('#bpyg').click(function(){
	$('#consultarcliente').hide();
	$('#consultarproducto').hide();
	$('#consultarproveedor').hide ();
	$('#consultas').hide();
	$('#pyg').show(1000);
	$('#costosaldos').hide();
	$('#cierreinventario').hide();
	$('#graficas').hide();
});
$('#bcostosaldos').click(function(){
	$('#consultarcliente').hide();
	$('#consultarproducto').hide();
	$('#consultarproveedor').hide ();
	$('#consultas').hide();
	$('#pyg').hide();
	$('#costosaldos').show(1000);
	$('#cierreinventario').hide();
	$('#graficas').hide();
});
$('#bcierreinventario').click(function(){
	$('#consultarcliente').hide();
	$('#consultarproducto').hide();
	$('#consultarproveedor').hide ();
	$('#consultas').hide();
	$('#pyg').hide();
	$('#costosaldos').hide();
	$('#cierreinventario').show(1000);
	$('#graficas').hide();
});
$('#bgraficas').click(function(){
	$('#consultarcliente').hide();
	$('#consultarproducto').hide();
	$('#consultarproveedor').hide ();
	$('#consultas').hide();
	$('#pyg').hide();
	$('#costosaldos').hide();
	$('#cierreinventario').hide();
	$('#graficas').show(1000);
});
</script>
