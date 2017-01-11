<?php
//session_start();
$ns = $_SESSION['id'];
include_once "conexion.php"; 
$conexion= conexion();
//consulta tabla marcas
$bill_producto = mysqli_query($conexion,"SELECT * FROM pedidos") or die(mysqli_error($conexion));
?>
<form method="post" action="" name="marcasRegistrer">
    <center><h2>Registrar Pedido</h2></center><hr>
    
    <table width="100%" border="0">
       <tr>
       <td>
                <div><label>Referencia:</label> <input type="text" name="referencia1" id="referencia1" placeholder="(ej. Numero de unidades de producto solicitado)" required></div>&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <div><label>Nombre:</label> <input type="text" name="nombre1" id="nombre1" placeholder=" (ej. Nombre producto )" required></div>&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <div><label>Cantidad:</label> <input type="text" name="cantidad" id="cantidad" placeholder="(ej. Numero de unidades de producto solicitado)" required></div>&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <div><label>Observacion:</label> <input type="text" name="obvce" id="obvce" placeholder="(ej. Observacion del pedido )" required></div>&nbsp;
            </td>
        </tr>
       
        
    </table></td>
       <td><table width="100%" border="0">
            <td rowspan="2">
                <div><h1 id="titulo">Tabla Producto</h1><table id="consultas" width="100%"><tr class="tabletitle"><td>Id pedido</td><td>Nombre</td><td>Referencia</td></tr>
                <?php
                     while ($row = $bill_producto->fetch_assoc()) {
                        echo '<tr><td>'.$row['idpedido'].'</td><td>'.$row['nombre'].'</td><td>'.$row['referencia'].'</td></tr>';
                     }
                ?>
                </table></td>
       </tr> <tr>
            
    <input type="button" id="boton" name="enviar" value="Registrar" href="javascript:;" onClick="guardarPedido($('#referencia1').val(), $('#nombre1').val(), $('#cantidad').val(),$('#obvce').val());return false;">
    <div id="resultadopedidos">Resultado:</div>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
function guardarPedido(referencia,nombre,cantidad,obvce){
    var parametros = {
        "referencia" : referencia,
            "nombre" : nombre,
            "cantidad" : cantidad,
            "obvce" : obvce
    };
    $.ajax({
            data:  parametros,
            url:   '../php/guardar/pedidos.php',
            type:  'post',
            beforeSend: function () {
                    $("#resultadopedidos").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                $("#resultadopedidos").html(response);
            }
    });
}
</script>