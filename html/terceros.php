<form action="" id="formular" method="post">
	<div><br><label>Digite el nit o numero de cedula:</label> 
	<input type="text" name="nit" id="nit" placeholder="ej.(78442545)"> &nbsp;
	<input type="button" name="enviar" value="Registrar" id="boton" href="javascript:;" onclick="mostrarPro($('#nit').val());return false;">
	</div>
</form>
<div id="resforpro"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


<script>
function mostrarPro(nit){
    var parametros = {
            "nit" : nit
    };
    $.ajax({
            data:  parametros,
            url:   '../php/proveedor.php',
            type:  'post',
            beforeSend: function () {
                    $("#resforpro").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                $("#resforpro").html(response);
            }
    });
}
</script>