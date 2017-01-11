<?php 

if(isset($_POST['RegistrarNN'])){
	echo "<script type='text/javascript'>
			window.open('../php/registrocotizacion.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['ConsultarNN'])) {
		echo "<script type='text/javascript'>
			window.open('../html/consultarremision.php?tipodoc=N', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['estadoNN'])) {
	echo "<script type='text/javascript'>
			window.open('../php/cambiodeestado.php', 'MsgWindow', 'width=800%, height=600');
		</script>";;
}
elseif (isset($_POST['AnularNN'])) {
	echo "<script type='text/javascript'>
			window.open('../php/eliminar/anularDocumento.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
?>

<form action="" method="post">
	<input type="submit" id="boton" value="Registrar Cotización" name="RegistrarNN">
	<input type="submit" id="boton" value="Consultar Cotización" name="ConsultarNN">
	<input type="submit" id="boton" value="Cambio Estado Cotización" name="estadoNN">
	<input type="submit" id="boton" value="Anular Cotización" name="AnularNN">
</form>