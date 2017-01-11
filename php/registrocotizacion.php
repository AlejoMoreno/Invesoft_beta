<?php 
session_start(); 

$ns = $_SESSION['id'];
$bodegaactual = $_SESSION['bodegaactual'];
$hoy = date("Y-m-d");
if($ns==''){
	echo '<div id="vencimiento1" class="si"><h1>REGISTRESE NUEVAMENTE POR FAVOR</h1></div>';
}


include_once "conexion.php"; 
$conexion= conexion();
//consulta all clientes
$bill_cliente = mysqli_query($conexion,"SELECT * FROM  `terceros` where `tipo` like 'CLIENTE'") or die(mysqli_error($conexion));         

//consulta el ultimo registro remision
$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `documento` LIKE  'N%' ORDER BY  `remision`.`idremision` DESC ") or die(mysqli_error($conexion));
$rowremision = $bill_remision->fetch_assoc();
$documento = $rowremision['documento'];
$numdoc = substr($documento, 1)+1;

//consulta all productos
$bill_producto = mysqli_query($conexion,"SELECT *, sum(saldo) as saldos FROM  `inventario` WHERE  `idbodega` = '$bodegaactual' GROUP BY `referencia` ORDER BY  `inventario`.`descripcion` ASC ") or die(mysqli_error($conexion)); 
$rawdata = array(); //creamos un array
 
//guardamos en un array multidimensional todos los datos de la consulta
$i=0;

while($row = mysqli_fetch_array($bill_producto))
{
    $rawdata[$i] = $row;
    $i++;
}
$jsonproductos=json_encode($rawdata);
echo '<div id="jsonproductos">'.$jsonproductos.'</div>';

//bill kit consulta
$bill_kit = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE  `tipo` LIKE 'kit' GROUP BY `idkit` ") or die(mysqli_error($conexion)); 

$bill_kits = mysqli_query($conexion,"SELECT * FROM  `salidadeinventario` WHERE `tipo` LIKE 'kit' ORDER BY `idkit` ") or die(mysqli_error($conexion)); 
$rawdata = array(); //creamos un array

//guardamos en un array multidimensional todos los datos de la consulta
$i=0;

while($row = mysqli_fetch_array($bill_kits))
{
    $rawdata[$i] = $row;
    $i++;
}
$jsonkits=json_encode($rawdata);
echo '<div id="jsonkits">'.$jsonkits.'</div>';
?> 

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='../scripts/funciones.js'></script>
<script src='../scripts/kits.js'></script>

<section id="encabezado">
		<div id="logo">
			<a href="../html/profile"><img src="../imagenes/logo.png"></a>
		</div>
	</section>

<form method="post" action="">
<br>
<center><h2>Cotización -N</h2></center><hr>
<table class="tg">
  <tr>
    <th class="tg-031e" colspan="5">
		<div id="numeroremision"><label>Numero: </label><?php echo '<input type="text" name="idremision" id="idremision" value="'.$numdoc.'" disabled>';?></div>
    </th>
  </tr>
  <tr>
    <td class="tg-le8v" colspan="2">CLIENTE :</td>
    <td class="tg-le8v" colspan="3">FECHA :</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2">
    	<select name="nombre_cliente" id="nombre_cliente">
    		<option value="">SELECCIONE CLIENTE</option>
    		<?php
    		while ( $row = $bill_cliente->fetch_assoc() ){
				echo '<option value="'.$row['nit'].'" >'.$row['nombre'].' NIT:'.$row['nit'].' </option>';
			}	 
    		?>
    	</select>
    <td class="tg-yw4l" colspan="3"><?php echo '<input type="date" name="fecha_remision" id="fecha_remision" value="'.$hoy.'">'; ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><label>NIT / CEDULA :</label><input type="text" name="nit_cliente" id="nit_cliente" onblur="buscarCedula('nit_cliente')" placeholder="Nit / Cedula ej.(1 030570356)"></td>
    <td class="tg-yw4l" width="20%"><label>VENDEDOR :</label><input type="text" name="vendedor" id="vendedor" placeholder="Vendedor" value="<?php echo $ns;?>" disabled></td>
  </tr>
  <div id="resultado"></div>
  <tr>
    <td class="tg-le8v" colspan="4" rowspan="2"><label></label>
    	<table class="datos">
    		<tr>
    			<td><input type="hidden" name="datosPaCed" id="datosPaCed" value="2016" placeholder="Cedula"></td>
    			<td><input type="hidden" name="datosPaNPa" id="datosPaNPa" value="" placeholder="Nombre Paciente"></td>
    			<td><input type="hidden" name="datosPaNCi" id="datosPaNCi" value="" placeholder="Nombre Cirujano"></td>
    		</tr>
    		<tr>
    			<td><input type="hidden" name="datosPaHis" id="datosPaHis" value="2016" placeholder="Historia Clinica"></td>
    			<td><input type="hidden" name="datosPaFec" id="datosPaFec" value="" placeholder="Fecha Cirujia"></td>
    			<td></td>
    		</tr>
    	</table>
    </td>
  </tr>
</table>

 
<br><br>
<label>KIT :</label><br>
<select name="skit" id="skit">
	<option value="">Seleccione Kit</option>
	<?php 
	while($row = mysqli_fetch_array($bill_kit)){
		echo '<option value="'.$row['idkit'].'">Nombre del Kit: '.$row['idkit'].'</option>';
	}
	?>
</select>
<div id="rkit"><input value="Registrar Kit" disabled></div>
<br><br>

<table id="productos">
	<tr>
		<td width="15%"><input name="ref" id="ref" value="REFERENCIA :" disabled></td>
		<td><input name="nom" id="nom" VALUE="DESCRIPCIÓN"disabled></td>
		<td width="10%"><input name="lote" id="lote" VALUE="LOTE :"disabled></td>
		<td width="10%"><input name="cant" id="cant" VALUE="CANTIDAD :"disabled></td>
		<td width="10%"><input name="precio" id="precio" VALUE="VALOR UNIT. :"disabled></td>
		<td width="5%"><div id="mas"><input value="Agregar" disabled></div></td>
		<td width="5%"><div id="menos"><input value="Eliminar" disabled></div></td>
	</tr>
</table>
<div id="recorrido"><td width="5%"><div id="btnRecorrer"><input value="Recorrer" disabled></div></td></div>

<br><br>
   
<table>
	<tr>
		<td>SubTotal: <input type="text" name="bruto" id="bruto"></td>
		<td>Iva: <input type="text" name="iva" id="iva" value="0"></td>
		<td>Descuento: <input type="text" name="descuento" id="descuento" value="0"></td>
		<td>Fletes: <input type="text" name="fletes" id="fletes" value="0"></td>
		<td>Retefuente: <input type="text" name="retefuente" id="retefuente" value="0" /></td>
	</tr>
	<tr>
		<td colspan="5"><label>Condiciones de esta cotización :</label><br><textarea id="observaciones" placeholder="Escriba las observaciones de este documento"></textarea></td>
	</tr>
</table>
 <input type="button" id="boton" name="enviar" value="Guardar" href="javascript:;" onClick="gruardarRemision();return false;">
</form> 

<div id="resultado1">resultado</div>


<!-- LIBRERIAS JQUERY -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$(document).ready(function(){
	$('#jsonproductos').hide();
	$('#jsonkits').hide();
});

function recorrerInventario(){
	var trs=$("#productos tr").length;
	var ref='';
	var totalproducto='';
	var cantidad=0;
	var nom='';
	var precio=0;
	var bruto = 0;
	for(i=1 ; i<trs; i++){
		ref = $('#ref'+i).val();
		nom = $('#nom'+i).val();
		cant = $('#cant'+i).val();
		precio = $('#precio'+i).val();
		totalproducto = totalproducto+':'+ref+','+nom+','+cant+','+precio;
	}
	return totalproducto;
}

function gruardarRemision(){
	var trs=$("#productos tr").length;
	//toma de datos del formulario
	var productos = recorrerInventario();
	var idremision = $('#idremision').val();
	var nombre_cliente = $('#nombre_cliente').val();
	var fecha_remision = $('#fecha_remision').val();
	var nit_cliente = $('#nit_cliente').val();
	var vendedor = $('#vendedor').val();
	var pedido = $('#pedido').val();
	var orden = $('#orden').val();
	var direccion = $('#direccion').val();
	var datosPaCed = $('#datosPaCed').val();
	var datosPaNPa = $('#datosPaNPa').val();
	var datosPaNCi = $('#datosPaNCi').val();
	var datosPaHis = $('#datosPaHis').val();
	var datosPaFec = $('#datosPaFec').val();
	var telefono = $('#telefono').val();
	var bruto = $('#bruto').val();
	var iva = $('#iva').val();
	var descuento = $('#descuento').val();
	var fletes = $('#fletes').val();
	var retefuente = $('#retefuente').val();
	var observaciones = $('#observaciones').val();

	if(productos == '' || idremision == '' || nit_cliente == '' || vendedor == '' || observaciones == ''){
		alert('!!!!!!!! Faltan campos por diligenciar. ¡¡¡¡¡¡¡¡');
		exit();
	}

	var parametros = {
	        "productos" : productos,
	        "nombre_cliente" : nombre_cliente,
			"fecha_remision" : fecha_remision,
			"nit_cliente" : nit_cliente,
			"vendedor" : vendedor,
			"pedido" : pedido,
			"orden" : orden,
			"direccion" : direccion,
			"datosPaCed" : datosPaCed,
			"datosPaNPa" : datosPaNPa,
			"datosPaNCi" : datosPaNCi,
			"datosPaHis" : datosPaHis,
			"datosPaFec" : datosPaFec,
			"telefono" : telefono,
			"bruto" : bruto,
			"iva" : iva,
			"descuento" : descuento,
			"fletes" : fletes,
			"retefuente" : retefuente,
			"trs" : trs,
			"idremision" : idremision,
			"observaciones" : observaciones
	};
    $.ajax({
            data:  parametros,
            url:   '../php/guardar/cotizacion.php',
            type:  'post',
            beforeSend: function () {
                    $("#resultado1").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                $("#resultado1").html(response);
            }
    });
}

</script>

<style type="text/css">
.si{color:red;}
.tg  {border-collapse:collapse;border-spacing:0;background-color: white;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-le8v{background-color:#c0c0c0;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
table{
	border: 1px solid;
	width: 100%;
}
#logo1,#datosempresa,#numeroremision{
	width: 40%;
	float: left;
}
 #datosPa{
 	margin: 1px 1px 1px;
	padding: 1px 1px 1px 1px;
 }
#datos{
	width: 150%;
}
form input,textarea{
	width: 92%;
	height: 30px;
	padding: 10px 10px 10px 10px;
	padding-right: 10px;
}
select{
	width: 92%;
	height: 50px;
	padding: 10px 10px 10px 10px;
	padding-right: 10px;
}
body{
	font-family: sans-serif;
	color: #9EA3A3;
	font-size: 90%;
}

#boton{
	color: #F9F9F9;
	background: rgba(201,65,90,1);
	background: -moz-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);
	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(201,65,90,1)), color-stop(100%, rgba(189,10,40,1)));
	background: -webkit-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);
	background: -o-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);
	background: -ms-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);
	background: linear-gradient(to bottom, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9415a', endColorstr='#bd0a28', GradientType=0 );
}
#boton:hover{
	color: #F9F9F9;
	background: rgba(194,132,143,1);
	background: -moz-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);
	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(194,132,143,1)), color-stop(100%, rgba(186,31,62,1)));
	background: -webkit-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);
	background: -o-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);
	background: -ms-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);
	background: linear-gradient(to bottom, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c2848f', endColorstr='#ba1f3e', GradientType=0 );
}
#idremision{
	width: 100px;
}
#btnRecorrer input:hover,#mas input:hover,#menos input:hover{
	background: #9EA3A3;
}
.seleccionada{
	background-color: #9EA3A3;
}
</style>

</body>
</html>