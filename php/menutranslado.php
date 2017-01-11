<?php 

if(isset($_POST['registrarT'])){
	echo "<script type='text/javascript'>
			window.open('../php/registrotranslado.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['consultar'])) {
	echo "<script type='text/javascript'>
			window.open('../html/consultarremision.php?tipodoc=T', 'MsgWindow', 'width=800%, height=600');
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
?>

<form action="" method="post">
	<input type="submit" id="boton" value="Registrar Translado entre bodegas" name="registrarT">
	<input type="submit" id="boton" value="Consultar Translado entre bodegas" name="consultar">
	<input type="submit" id="boton" value="Cambio Estado Translado entre bodegas" name="estado">
	<input type="submit" id="boton" value="Anular Translado entre bodegas" name="anular">
	<input type="submit" id="boton" value="Eliminar Translado entre bodegas" name="eliminar">
</form>