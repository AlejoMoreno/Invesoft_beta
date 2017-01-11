<?php 

if(isset($_POST['RegistrarCo'])){
	echo "<script type='text/javascript'>
			window.open('../php/registrocompra.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['ConsultarCo'])) {
	echo "<script type='text/javascript'>
			window.open('../html/consultarremision.php?tipodoc=C', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['estado'])) {
	echo "<script type='text/javascript'>
			window.open('../php/cambiodeestado.php', 'MsgWindow', 'width=800%, height=600');
		</script>";;
}
elseif (isset($_POST['EliminarCo'])) {
	echo "<script type='text/javascript'>
			window.open('../php/eliminar/eliminarDocumento.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['AnularOr'])) {
	echo "<script type='text/javascript'>
			window.open('../php/eliminar/anularDocumento.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
?>

<form action="" method="post">
	<input type="submit" id="boton" value="Registrar Compra" name="RegistrarCo">
	<input type="submit" id="boton" value="Consultar Compra" name="ConsultarCo">
	<input type="submit" id="boton" value="Cambio Estado Compra" name="estado">
	<input type="submit" id="boton" value="Anular Orden" name="AnularOr">
	<input type="submit" id="boton" value="Eliminar Compra" name="EliminarCo">

</form>