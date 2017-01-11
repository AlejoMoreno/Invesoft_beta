<?php
session_start();
include('../html/encabezado.php');
$ns = $_SESSION['id'];
include_once "conexion.php"; 
$conexion= conexion();
$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `estado` NOT LIKE '2' AND `estado` NOT LIKE '4'  ORDER BY  `remision`.`fecha` ASC ") or die(mysqli_error($conexion));

if(isset($_POST['documento'])){
	$documento = $_POST['documento'];
	$observacion = $_POST['observaciones'];
	$estado = $_POST['estado'];
	$fecha = date('Y-m-d');
	$sql = "INSERT INTO  `osmed`.`observaciones` (
		`id_observacion` ,
		`idusuario` ,
		`documento` ,
		`observacion` ,
		`fecha`
		)
		VALUES (null,  '$ns',  '$documento',  '$observacion',  '$fecha');";
	mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
	echo 'Tomando observaciones.';

	$sql = "UPDATE  `osmed`.`remision` SET  `estado` =  '$estado' WHERE  `remision`.`documento` ='$documento'";   
    mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
    echo 'Actualizado correctamente.';
}	

 ?>
 	<section id="encabezado">
		<div id="logo">
			<a href="../html/profile"><img src="../imagenes/logo.png"></a>
		</div>
	</section>
<form action="" id="formularioin" method="post">
	<div><br><label>Número de documento:</label> 
	<select name="documento" id="documento">
		<option>Seleccione Documento</option>
		<?php 
		while($row = mysqli_fetch_array($bill_remision)){
			if($row['estado']==1){
		    	$estados = 1;
		    }
		    elseif($row['estado']==2){
		    	$estados = 2;
		    }
		    elseif($row['estado']==3){
		    	$estados = 3;
		    }
		    elseif($row['estado']==4){
		    	$estados = 4;
		    }
			echo '<option value="'.$row['documento'].'">'.$row['documento'].' Estado='.$estados.' {Fecha: '.$row['fecha'].', Total: '.$row['total'].', Usuario: '.$row['idusuario'].'}</option>';
		}
		?>
	</select>
<label>Estado:</label>
	<select name="estado" id="estado">
		<option value="3">Proceso</option>
		<option value="2">Aprobado</option>
	</select>
   Observaciones :
   <textarea name="observaciones" id="observaciones" required></textarea>

	<input type="submit" name="enviar" value="Registrar" id="boton" href="javascript:;" onclick="mostrarInv($('#remision').val());return false;">
	</div>
</form>
<div id="imprimir"></div>
<div id="resforin"></div>

<div>Nota:<br> Tenga presente <br>Estado 1 = Pendiente <br>Estado 2 = Aprobado <br>Estado 3 = Proceso <br>Estado 4 = Anulado

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script>

//cambiar valor en el documento e imprimir si se desea
$('#documento').change(function(){
	var documento = $('#documento').val();
	$('#imprimir').html('<a href="../impresion/formatoImpresion.php?documento='+documento+'">Imprima el documento Seleccionado: '+documento+'</a>');
});
</script>
<style type="text/css">
a{
	color:black;
}
a:hover{
	color:red;
}
</style>