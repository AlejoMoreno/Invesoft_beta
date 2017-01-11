<script src='../scripts/funciones.js'></script>
<form action="" id="formularioin" method="post">
	<div><br><label>Referencia del producto:</label> 
	<input type="text" name="referencia" id="referencia" onkeypress="uppercase('referencia')" placeholder="ej.(78442545)"> &nbsp;
    <br><label>Numero de lote:</label>
    <input type="text" name="lote" id="lote" placeholder="ej.(784425)"> &nbsp;
	<input type="button" name="enviar" value="Registrar" id="boton" href="javascript:;" onclick="mostrarInv($('#referencia').val(),$('#lote').val());return false;">
	</div>
</form>
<div id="resforin"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script>
function mostrarInv(referencia,lote){
    var parametros = {
            "referencia" : referencia,
            "lote" : lote

    };
    $.ajax({
            data:  parametros,
            url:   '../php/inventario.php',
            type:  'post',
            beforeSend: function () {
                    $("#resforin").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                $("#resforin").html(response);
            }
    });
}
</script>