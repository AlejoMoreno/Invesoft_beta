<?php 

if(isset($_POST['r1'])){
	echo "<script type='text/javascript'>
			window.open('../graficos/r1.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['r2'])) {
	echo "<script type='text/javascript'>
			window.open('../graficos/r2.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['r3'])) {
	echo "<script type='text/javascript'>
			window.open('../graficos/r3.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['r4'])) {
	echo "<script type='text/javascript'>
			window.open('../graficos/r4.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['historial'])) {
	echo "<script type='text/javascript'>
			window.open('../graficos/historia.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['facturaprom'])) {
	echo "<script type='text/javascript'>
			window.open('../graficos/Clientes.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['clinteremi'])) {
	echo "<script type='text/javascript'>
			window.open('../graficos/r6.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
?>

<form action="" method="post">
	<input type="submit" id="boton" value="Inventario" name="r1">
	<input type="submit" id="boton" value="Movimiento por fecha del inventario" name="r2">
	<input type="submit" id="boton" value="Movimiento Clientes Por Fecha" name="r3">
	<input type="submit" id="boton" value="Promedio de precio contra costo " name="r4">
	<input type="submit" id="boton" value="Historial de logueo " name="historial">
	<input type="submit" id="boton" value="Promedio total por factura " name="facturaprom">
	<input type="submit" id="boton" value="Clientes Porcentaje Por Remisiones " name="clinteremi">
</form>