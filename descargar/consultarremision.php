<?php
session_start();
include('encabezado.php');
$ns = $_SESSION['id'];
$bodegaactual = $_SESSION['bodegaactual'];
include_once "../php/conexion.php"; 
$conexion= conexion();
$tipodoc = $_GET['tipodoc'];
$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE `documento` LIKE '$tipodoc%'  ORDER BY  `remision`.`fecha` ASC ") or die(mysqli_error($conexion));

 ?>
 <section id="encabezado">
    <div id="logo">
        <a href="../html/profile"><img src="../imagenes/logo.png"></a>
    </div>
</section>
<form action="" id="formularioin" method="post">
	<div><br><label>Número de documento:</label> 
        <select name="remision" id="remision">
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
   
	<input type="button" name="enviar" value="Cambiar" id="boton" href="javascript:;" onclick="mostrarInv($('#remision').val());return false;">
	</div>
</form>
<div id="imprimir">Imprimir Documento</div>
<div id="resforin"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script>
function mostrarInv(remision){
    var parametros = {
            "remision" : remision
          

    };
    $.ajax({
            data:  parametros,
            url:   '../php/consultarremision.php',
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

<script>

//cambiar valor en el documento e imprimir si se desea
$('#remision').change(function(){
    var documento = $('#remision').val();
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