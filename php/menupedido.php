<?php 

if(isset($_POST['RegistrarOr'])){
	echo "<script type='text/javascript'>
			window.open('../php/registropedidoinv.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['ConsultarOr'])) {
		echo "<script type='text/javascript'>
			window.open('../html/consultarremision.php?tipodoc=O', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['estado'])) {
	echo "<script type='text/javascript'>
			window.open('../php/cambiodeestado.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
elseif (isset($_POST['AnularOr'])) {
	echo "<script type='text/javascript'>
			window.open('../php/eliminar/anularDocumento.php', 'MsgWindow', 'width=800%, height=600');
		</script>";
}
?>

<form action="" method="post">
	<input type="submit" id="boton" value="Registrar Orden" name="RegistrarOr">
	<input type="submit" id="boton" value="Consultar Orden" name="ConsultarOr">
	<input type="submit" id="boton" value="Cambio Estado Orden" name="estado">
	<input type="submit" id="boton" value="Anular Orden" name="AnularOr">
</form>