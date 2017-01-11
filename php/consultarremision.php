<?php 
session_start(); 

//$ns = $_SESSION['id'];

include_once "conexion.php"; 
$conexion= conexion();         
?> 

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<?php


$remision = $_POST['remision'];

 $bill_contenedor = mysqli_query($conexion,"SELECT * FROM remision where documento = '$remision'") or die(mysqli_error($conexion));		
		$row = $bill_contenedor->fetch_assoc();
$idremision = $row['idremision'];
$idsalida = $row['idsalida'];
$idbodega = $row['idbodega'];
$idpaciente = $row['idpaciente'];
$idusuario = $row['idusuario'];
$idclientes = $row['idclientes'];
$fecha = $row['fecha'];
$subtotal = $row['subtotal'];
$iva = $row['iva'];
$descuento = $row['descuento'];
$fletes = $row['fletes'];
$estado = $row['estado'];
$retefuente = $row['retefuente'];
$total = $row['total'];
$documento = $row['documento'];


$bill_usuarios = mysqli_query($conexion,"SELECT * FROM salidadeinventario where idkit = '$documento'") or die(mysqli_error($conexion));		





		$bill_cliente = mysqli_query($conexion,"SELECT * FROM terceros where idclientes = '$idclientes'") or die(mysqli_error($conexion));		
		$row3 = $bill_cliente->fetch_assoc();
		$cedulacliente = $row3['nit'];
		$nombre_cliente= $row3['nombre'];
		$direccion_cliente= $row3['direccion'];
		$telefono_cliente= $row3['telefono'];



$bill_paciente = mysqli_query($conexion,"SELECT * FROM pacientes where idpaciente = '$idpaciente'") or die(mysqli_error($conexion));		
		$row4 = $bill_paciente->fetch_assoc();


$cedula = $row4['numerodecedulapaciente'];
$nombrepaciente = $row4['nombrepaciente'];
$nombrecirujano = $row4['nombrecirujano'];
$historiaclinica = $row4['historiaclinica'];
$fechacirujia = $row4['fechacirujia'];



echo '
<section id="encabezado">
		<div id="logo">
			<a href="../html/profile"><img src="../imagenes/logo.png"></a>
		</div>
	</section>

<form method="post" action="">
<br>
<center><h2></h2></center><hr>
<table class="tg">
  <tr>
    <th class="tg-031e" colspan="5">
		<div id="numeroremision"><label>Numero : </label><input type="text" value="'.$documento.'" name="idremision" id="idremision" disabled></div>
    </th>
  </tr>
  <tr>
    <td class="tg-le8v" colspan="2">CLIENTE :</td>
    <td class="tg-le8v" colspan="3">FECHA :</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><label>NOMBRE :</label><input type="text" value="'.$nombre_cliente.'" name="nombre_cliente" id="nombre_cliente" onkeyup="uppercase(`nombre_cliente`)" placeholder="Ej.(Cooperativa epsifarma)" disabled></td>
    <td class="tg-yw4l" colspan="3"><input type="date" value="'.$fecha.'" name="fecha_remision" id="fecha_remision"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><label>CEDULA/NIT :</label><input type="text" value="'.$cedulacliente.'" name="nit_cliente" id="nit_cliente" onblur="buscarCedula(`nit_cliente`)" placeholder="Nit / Cedula Ej.(1 030570356)"></td>
    <td class="tg-yw4l" width="20%"><label>VENDEDOR :</label><input type="text" value="'.$idusuario.'" name="vendedor" id="vendedor" placeholder="Vendedor" value="<?php echo $ns;?>" disabled></td>
  </tr>
  <div id="resultado"></div>
  <tr>
    <td class="tg-yw4l" colspan="2"><label>DIRECCION :</label><input type="text" value="'.$direccion_cliente.'" name="direccion" id="direccion" onkeyup="uppercase(`direccion`)" placeholder="Ej.(Direccion Autopista medellin)" disabled></td>
    <td class="tg-yw4l" colspan="2" rowspan="2"><label>DATOS DEL PACIENTE :</label>
    	<table class="datos">
    		<tr>
    			<td><label>CEDULA :</label><input name="datosPaCed" value="'.$cedula.'" id="datosPaCed" placeholder="Cedula"></td>
    			<td><label>NOMBRE PACIENTE :</label><input name="datosPaNPa" value="'.$nombrepaciente.'" id="datosPaNPa" placeholder="Nombre Paciente "></td>
    			<td><label>NOMBRE CIRUJANO :</label><input name="datosPaNCi" value="'.$nombrecirujano.'" id="datosPaNCi" placeholder="Nombre Cirujano"></td>
    		</tr>
    		<tr>
    			<td><label>HISTORIA CLINICA :</label><input name="datosPaHis" value="'.$historiaclinica.'" id="datosPaHis" placeholder="Historia Clinica"></td>
    			<td><label>FECHA CIRUGIA : </label><input name="datosPaFec" value="'.$fechacirujia.'" id="datosPaFec" placeholder="Fecha Cirujia"></td>
    			<td></td>
    		</tr>
    	</table>
    </td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><label>TELEFONO :</label><input type="text" value="'.$telefono_cliente.'" name="telefono" id=`telefono` placeholder="Ej.(Telefono 2428521)" disabled></td>
  </tr>
</table>
 

<br><br>

<table id="productos">
	<tr>
		<td>REFERENCIA :</td>
		<td>NOMBRE :</td>
		<td>CANTIDAD :</td>
		<td>PRECIO :</td>
		<td width="5%"><div id="mas"><input value="Agregar" disabled></div></td>
		<td width="5%"><div id="menos"><input value="Eliminar" disabled></div><div id="recorrido"><td width="5%"><div id="btnRecorrer"><input value="Recorrer" disabled></div></td></div></td>
	</tr>
';
	
	//echo '<tr>';
	$i=1;
		while ($row1 = $bill_usuarios->fetch_assoc()) {
			$idinventario = $row1['idinventario'];
			$bill_usuario2 = mysqli_query($conexion,"SELECT * FROM inventario where idinventario = '$idinventario'") or die(mysqli_error($conexion));
			$row2 = $bill_usuario2->fetch_assoc();
			echo '<tr  calss="selected" id="fila'.$i.'" onclick="seleccionar(this.id)">
					<td><input name="ref'.$i.'" id="ref'.$i.'" value="'.$row2['referencia'].'" ></td>
					<td><input name="nom'.$i.'" id="nom'.$i.'" value="'.$row2['descripcion'].'" ></td>
					<td><input name="cant'.$i.'" id="cant'.$i.'" value="'.$row1['cantidad'].'"></td>
					<td><input name="precio'.$i.'" id="precio'.$i.'" value="'.$row1['precio'].'"></td>
					</tr>';
			$i++;
				}

echo '</table>



<br><br>
   
<table>
	<tr>
		<td>Total: <input type="text" value="'.$subtotal.'" name="bruto" id="bruto"></td>
	</tr>
	<tr>
		<td>Iva: <input type="text" value="'.$iva.'" name="iva" id="iva" value="0"></td>
		<td>Descuento: <input type="text" value="'.$descuento.'"name="descuento" id="descuento" value="0"></td>
		<td>Fletes: <input type="text"value="'.$fletes.'" name="fletes" id="fletes" value="0"></td>
		<td>Retefuente: <input type="text" value="'.$retefuente.'" name="retefuente" id="retefuente" value="0" /></td>
	</tr>
</table>
 <input type="button" id="boton" name="enviar" value="Guardar" href="javascript:;" onClick="gruardarRemision();return false;">
</form>

';

?> 

<div id="resultado1">resultado</div>

<script>
var cont=0;
$('#mas').click(function(){
	var trs = $("#productos tr").length;
	$('#productos tr:last').after('<tr calss="selected" id="fila'+cont+'" onclick="seleccionar(this.id)"><td><input name="ref" id="ref'+trs+'" ></td><td><input name="nom" id="nom'+trs+'"></td><td><input name="cant" id="cant'+trs+'"></td><td><input name="precio" id="precio'+trs+'"></td></tr>');	
});

function seleccionar(id_fila){
	if($('#'+id_fila).hasClass('seleccionada')){
		$('#'+id_fila).removeClass('seleccionada');
	}
	else{
		$('#'+id_fila).addClass('seleccionada');
	}
	id_fila_selected = id_fila;
}
$('#menos').click(function(){
	eliminar(id_fila_selected);
});

function eliminar(id_fila){
	$('#'+id_fila).remove();
}
$('#btnRecorrer').click(function(){

	var trs=$("#productos tr").length;
	var ref='';
	var resultadoReferencia='';
	var resultadoCantidad='';
	var cantidad=0;
	var nom='';
	var precio=0;
	var bruto = 0;
	for(i=1 ; i<trs; i++){
		ref = $('#ref'+i).val();
		nom = $('#nom'+i).val();
		cant = $('#cant'+i).val();
		precio = $('#precio'+i).val();
		//cuenta de subtotal
		cantidad = $('#cant'+i).val();
		precio = $('#precio'+i).val();
		var b = parseInt(cantidad * precio);
		bruto = (bruto + b);

	}
	$('#productos tr:last').after('<input type="hidden" name="cantidadProductos id="cantidadProductos" value="'+(i-1)+'"> ');
	$('#bruto').val(bruto);
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
			"idremision" : idremision
	};
    $.ajax({
            data:  parametros,
            url:   '../php/actualizar/remision.php',
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

<script>
var vendedor = <?php echo $ns;?>;



$('#vendedor').val(vendedor);
</script>


<style type="text/css">
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
form input{
	width: 92%;
	height: 30px;
	padding: 10px 10px 10px 10px;
	padding-right: 10px;
}
body{
	font-family: sans-serif;
	color: #9EA3A3;
	font-size: 90%;
}
.seleccionada{
	background-color: #9EA3A3;
}
</style>

</body>
</html>