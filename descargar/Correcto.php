<html>
<head>
	<title>Correcto</title>
	<?php include('encabezado.php');?>
</head>
<body>
	<section id="encabezado">
		<div id="logo">
			<img src="../imagenes/logo.png">
		</div>
	</section>
	<section id="cuerpo">
		<div id="titulo"><h1>Fue correcto el ingreso</h1></div>
		<?

		?>
		<div id="error"> <?php $variable=$_GET['variable']; echo "<script type='text/javascript'> window.location = '".$variable.".php'; </script>"; ?></div>
	</section>
</body>
</html>