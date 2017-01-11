<form action="" method="post" class="registro">
	<div><label>Identificacion de usuario:</label> 
	<input type="text" name="iduser" id="iduser" placeholder="ej.(1030570356)"></div> &nbsp;
	<input type="button" name="enviar" value="Registrar" id="boton" href="javascript:;" onclick="mostrarusu($('#iduser').val());return false;">
	</div>
</form>   
<div id="resforus"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script>
function mostrarusu(iduser){
    var parametros = {
            "iduser" : iduser
    };
    $.ajax({
            data:  parametros,
            url:   '../php/usuario.php',
            type:  'post',
            beforeSend: function () {
                    $("#resforus").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                $("#resforus").html(response);
            }
    });
}
</script>