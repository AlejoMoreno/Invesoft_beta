<?php 

if(isset($_POST['registrarr'])){
	echo "<script type='text/javascript'>
			window.open('../php/registroremision.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['consultar'])) {
	echo "<script type='text/javascript'>
			window.open('../html/consultarremision.php?tipodoc=R', 'MsgWindow', 'width=800%, height=600');
		</script>";;
}
elseif (isset($_POST['anular'])) {
	echo "<script type='text/javascript'>
			window.open('../php/eliminar/anularDocumento.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['estado'])) {
	echo "<script type='text/javascript'>
			window.open('../php/cambiodeestado.php', 'MsgWindow', 'width=800%, height=600');
		</script>";;
}
elseif (isset($_POST['eliminar'])) {
	echo "<script type='text/javascript'>
			window.open('../php/eliminar/eliminarDocumento.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['pasar'])) {
	echo "<script type='text/javascript'>
			window.open('../html/ordenRemision.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
?>

<form action="" method="post">
	<input type="submit" id="boton" value="Registrar" name="registrarr">
	<input type="submit" id="boton" value="Pasar de Orden a Remision" name="pasar">
	<input type="submit" id="boton" value="Consultar" name="consultar">
	<input type="submit" id="boton" value="Cambio Estado Remision" name="estado">
	<input type="submit" id="boton" value="Anular" name="anular">
	<input type="submit" id="boton" value="Eliminar" name="eliminar">
</form>