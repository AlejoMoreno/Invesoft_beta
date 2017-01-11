<?php
//session_start();
$ns = $_SESSION['id'];
if($ns==''){
    echo '<div id="vencimiento1" class="si"><h1>REGISTRESE NUEVAMENTE POR FAVOR</h1></div>';
}

include_once "conexion.php"; 
$conexion= conexion();
//consulta tabla marcas
$bill_marca = mysqli_query($conexion,"SELECT * FROM marcas") or die(mysqli_error($conexion));
?>
<form method="post" action="" name="marcasRegistrer">
	<center><h2>Registrar Marca</h2></center><hr>
	<table width="100%" border="0">
		<tr>
			<td>
                <div><label>Nombre Marca:</label> <input type="text" name="nombre" id="nombre" placeholder="(ej. Bayer)" required></div>&nbsp;
            </td>
            <td rowspan="2">
            	<div><h1 id="titulo">Tabla Marcas</h1><table id="consultas" width="100%"><tr class="tabletitle"><td>Key</td><td>Marcas</td></tr>
            	<?php
            		 while ($row = $bill_marca->fetch_assoc()) {
            		 	echo '<tr><td>'.$row['idmarcas'].'</td><td>'.$row['nombre'].'</td></tr>';
            		 }
            	?>
            	</table></div>
            </td>
        </tr>
        <tr>
            <td>
                <div><label>Proveedor:</label> <input type="text" name="proveedor" id="proveedor" placeholder="nit (ej. 1030570356 )" required></div>&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <div><label>Descripción:</label> <input type="text" name="descripcion" id="descripcion" placeholder="(ej. Marca provehida por Bayer. Dirección cl...)" required></div>&nbsp;
            </td>
		</tr>
	</table>
	<input type="button" id="boton" name="enviar" value="Registrar" href="javascript:;" onclick="guardarMarca($('#nombre').val(), $('#descripcion').val(), $('#proveedor').val());return false;">
	<div id="resultadomarcas">Resultado:</div>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
function guardarMarca(nombre, descripcion, proveedor){
    var parametros = {
            "nombre" : nombre,
            "descripcion" : descripcion,
            "proveedor" : proveedor
    };
    $.ajax({
            data:  parametros,
            url:   '../php/guardar/marcas.php',
            type:  'post',
            beforeSend: function () {
                    $("#resultadomarcas").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                $("#resultadomarcas").html(response);
            }
    });
}
</script>

<style type="text/css">
.si{color:red;}
</style>
