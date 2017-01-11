<?php
include_once "conexion.php"; 
if($ns==''){
    echo '<div id="vencimiento1" class="si"><h1>REGISTRESE NUEVAMENTE POR FAVOR</h1></div>';
}

$conexion= conexion();
//consulta tabla marcas
$bill_marca = mysqli_query($conexion,"SELECT * FROM lineas") or die(mysqli_error($conexion));
?>
<form method="post" action="" name="lineaRegistrer">
	<center><h2>Registrar Linea/Grupos</h2></center><hr>
	<table width="100%" border="0">
		<tr>
			<td>
                <div><label>Nombre Linea:</label> <input type="text" name="nombre" id="nombrelinea" placeholder="(ej. Biomateriales)" required></div>&nbsp;
            </td>
            <td rowspan="2">
            	<div><h1 id="titulo">Tabla Lineas/Grupos</h1><table id="consultas" width="100%"><tr class="tabletitle"><td>Key</td><td>Marcas</td></tr>
            	<?php
            		 while ($row = $bill_marca->fetch_assoc()) {
            		 	echo '<tr><td>'.$row['idlineas'].'</td><td>'.$row['nombre'].'</td></tr>';
            		 }
            	?>
            	</table></div>
            </td>
        </tr>
        <tr>
            <td>
                <div><label>Descripción:</label> <input type="text" name="descripcion" id="descripcionlinea" placeholder="(ej. linea que constituye ...)" required></div>&nbsp;
            </td>
		</tr>
	</table>
	<input type="button" id="boton" name="enviar" value="Registrar" href="javascript:;" onclick="guardarLinea($('#nombrelinea').val(), $('#descripcionlinea').val());return false;">
	<div id="resultadolineas">Resultado:</div>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
function guardarLinea(nombre, descripcion){
    var parametros = {
            "nombre" : nombre,
            "descripcion" : descripcion
    };
    $.ajax({
            data:  parametros,
            url:   '../php/guardar/linea.php',
            type:  'post',
            beforeSend: function () {
                    $("#resultadolineas").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                $("#resultadolineas").html(response);
            }
    });
}


 

</script>

<style type="text/css">
.si{color:red;}
</style>
