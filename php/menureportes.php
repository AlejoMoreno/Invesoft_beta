<?php 

if(isset($_POST['consultaclientes'])){
	echo "<script type='text/javascript'>
			window.open('../php/consultarcliente.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['consultaproductos'])) {
	echo "<script type='text/javascript'>
			window.open('../php/consultarproducto.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['consultarproveedor'])) {
	echo "<script type='text/javascript'>
			window.open('../php/consultarproveedor.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['consultarmovimientoproveedor'])) {
	echo "<script type='text/javascript'>
			window.open('../php/consultarmovimientoproveedor.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['consultarmovimientocliente'])) {
	echo "<script type='text/javascript'>
			window.open('../php/consultarmovimientocliente.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}

?>

<form action="" method="post">
    <input type="submit" id="boton" value="Consultar productos" name="consultaproductos">
	<input type="submit" id="boton" value="Consultar clientes" name="consultaclientes">
	<input type="submit" id="boton" value="Consultar movimiento clientes" name="consultarmovimientocliente">
	<input type="submit" id="boton" value="Consultar proveedor" name="consultarproveedor">
	<input type="submit" id="boton" value="Consultar movimiento proveedor" name="consultarmovimientoproveedor">
	
</form>
