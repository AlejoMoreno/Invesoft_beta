<?php session_start();?>
<html>
<head>
	<title>administrativo</title>
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
		<div id="titulo"><h1 class="usuario"><span id="usuariotitulo"><?php echo $cedula;?></span><br>Tipo: <div id="tipouser"><?php echo $tipou; ?></div><br>Quiero dejar una marca en el universo...(Steve Jobs)</h1><h1 class="empresa">OSMED SAS</h1><h1 class="fecha"><br><?php echo $hoy.'<br>'.$ip;?><br><a href="http://wakusoft.wix.com/misitio">@wakusoft Copy Right 2016</a></h1></div>
		<div id="menu"> 
			<ul>
				<li><a href="profile.php" id="binicio"><img src="../imagenes/home.png">inicio</a></li>
				<li id="administrador-bodega"><a href="entradas.php" id="bentrada"><img src="../imagenes/entrada.png">Entrada</a></li>
				<li id="administrador-bodega-comercial"><a href="salidas.php" id="bsalida"><img src="../imagenes/salida.png">Salida</a></li>
				<li id="administrador-bodega-comercial"><a href="reportes.php" id="breportes"><img src="../imagenes/reportes.png">Reportes</a></li>				
				<li id="administrador" class="active"><a href="administrativo.php" id="badministrativo"><img src="../imagenes/reportes.png">Administrador</a></li>
				<li><a href="exit.php" id="bexit"><img src="../imagenes/exit.png">Exit</a></li>
			</ul>
		</div>
	</section>

	<section id="content">
		<div id="content-menu">
			<div id="administrativo"><img src="../imagenes/reportes.png"><div class="content-entrada">
				<div id="titulo"><h1>Administratvo</h1></div><br><br>
				<div class="menu-dos">
					<ul>
						<li id="bregistrarusuario"><a href="#">Registrar Usuarios</a></li>
						<li id="bregistrarbodega"><a href="#">Registrar Bodega</a></li>
					</ul>
				</div>
				<div id="formulario">
					<div id="help"><br>Selecciona la actividad que desea realizar aquí arriba...<br></div>
					<section id="registrarusuario"><?php include('usuarios.php'); ?></section></div>
					<section id="registrarbodega"><?php include('../php/registrobodega.php'); ?></section>
			</div></div>
			</div>
		</div>
	</section>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$(document).ready(function(){
  $('#registrarusuario').hide();
   $('#registrarbodega').hide();
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
$('#bregistrarusuario').click(function(){
	$('#registrarusuario').show(1000);
	$('#registrarbodega').hide();
});
$('#bregistrarbodega').click(function(){
	$('#registrarusuario').hide();
	$('#registrarbodega').show(1000);
});
</script>