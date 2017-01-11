<?php 

if(isset($_POST['registrar'])){
	echo "<script type='text/javascript'>
			window.open('../html/hojadegasto.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['consultar'])) {
	echo "<script type='text/javascript'>
			window.open('../html/consultarremision.php?tipodoc=R', 'MsgWindow', 'width=800%, height=600');
		</script>";;
}
elseif (isset($_POST['estado'])) {
	echo "<script type='text/javascript'>
			window.open('../php/cambiodeestado.php', 'MsgWindow', 'width=800%, height=600');
		</script>";;
}
elseif (isset($_POST['anular'])) {
	echo "<script type='text/javascript'>
			window.open('../php/eliminar/anularDocumento.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['eliminar'])) {
	echo "<script type='text/javascript'>
			window.open('../php/eliminar/eliminarDocumento.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
?>

<form action="" method="post">
	<input type="submit" id="boton" value="Registrar Hoja de gasto" name="registrar">
	<input type="submit" id="boton" value="Consultar Hoja de gasto" name="consultar">
	<input type="submit" id="boton" value="Cambio Estado Hoja de gasto" name="estado">
	<input type="submit" id="boton" value="Anular Hoja de gasto" name="anular">
	<input type="submit" id="boton" value="Eliminar Hoja de gasto" name="eliminar">
</form>