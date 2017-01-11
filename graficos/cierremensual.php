
<?php 
$ns = $_SESSION['id'];
$hoy = date("Y-m-d");


include_once "../php/conexion.php"; 
$conexion= conexion();

/*$sql =" CREATE TABLE `cierreInventario` (
  `idinventario` int(15) NOT NULL auto_increment,
  `idbodega` int(15) NOT NULL,
  `ncedula` int(15) NOT NULL,
  `idmarcas` int(15) NOT NULL,
  `idlineas` int(15) NOT NULL,
  `referencia` varchar(15) collate utf8_bin NOT NULL,
  `descripcion` varchar(100) collate utf8_bin NOT NULL,
  `numerolote` varchar(15) collate utf8_bin NOT NULL,
  `tipopresentacion` varchar(15) collate utf8_bin NOT NULL,
  `stockminimo` int(4) NOT NULL,
  `stockmaximo` int(4) NOT NULL,
  `precio` int(15) NOT NULL,
  `costo` int(15) NOT NULL,
  `estado` varchar(30) collate utf8_bin NOT NULL,
  `saldo` int(15) NOT NULL,
  `fechadevencimiento` varchar(15) collate utf8_bin NOT NULL,
  `iva` int(11) NOT NULL,
  `fecha_registro` varchar(15) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`idinventario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1141" ;


if (@mysql_db_query($basedatos, $sql, $link)) {
	echo "<h2 align='center'>La tabla se ha creado con éxito</h2>";
} else {
	echo "<h2 align='center'>No se ha podido crear la tabla</h2>";
}*/

/*$sql = "INSERT INTO cierreinventario 
	( `idbodega`,`ncedula`,`idmarcas`,`idlineas`,`referencia`,`descripcion`,`numerolote`,`tipopresentacion`,
		`stockminimo`,`stockmaximo`,`precio`,`costo`,`estado`,`saldo`,`fechadevencimiento`,`iva`) 
	SELECT `idbodega`,`ncedula`,`idmarcas`,`idlineas`,`referencia`,`descripcion`,`numerolote`,`tipopresentacion`,
		`stockminimo`,`stockmaximo`,`precio`,`costo`,`estado`,`saldo`,`fechadevencimiento`,`iva` FROM `inventario` ";

$variablemula = mysql_query("insert into Tabla_Destino (select id, campo1, campo2, campo5, campo6 from Tabla_Fuente where campo1=xxx and campo2<>0)");
mysqli_query($conexion, $sqlPaciente) or die(mysqli_error($conexion)); */


?>

<form method="post" action="../graficos/consultar.php">
	<p>El cierre de inventario consiste en tomar los datos del inventario a la fecha de hoy para poder recuperar en otro momento.</p>
	<input type="date" name="fecha" id="fecha">
	<input type="submit" name="colsultar" id="boton" value="Consultar">
	<input type="button" id="boton" class="enviar" name="enviar" value="Hacer cierre" href="javascript:;" onClick="registrarCierre();return false;">
</form>
<div id="resultado1"></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
function registrarCierre(){
	var enviar = 'si';
    var parametros = {
            "enviar" : enviar
    };
    $.ajax({
            data:  parametros,
            url:   '../graficos/cierre.php',
            type:  'post',
            beforeSend: function () {
                    $("#resultado1").html("Procesando, espere por favor...<center><img src='../imagenes/gif-load.gif'/></center>");
            },
            success:  function (response) {
                $("#resultado1").html("Cierre de inventario exitoso");
            }
    });
}

</script>
