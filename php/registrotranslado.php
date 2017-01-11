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
$bill_cliente = mysqli_query($conexion,"SELECT * FROM  `bodegas`") or die(mysqli_error($conexion));         

//consulta el ultimo registro remision
$bill_remision = mysqli_query($conexion,"SELECT * FROM  `remision` WHERE  `documento` LIKE  'T%' ORDER BY  `remision`.`idremision` DESC ") or die(mysqli_error($conexion));
$rowremision = $bill_remision->fetch_assoc();
$documento = $rowremision['documento'];
$numdoc = substr($documento, 1)+1;

//consulta all productos
$bill_producto = mysqli_query($conexion,"SELECT * FROM  `inventario` WHERE  `idbodega` = '$bodegaactual' ORDER BY  `inventario`.`descripcion` ASC ") or die(mysqli_error($conexion)); 
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

<section id="encabezado">
		<div id="logo">
			<a href="../html/profile"><img src="../imagenes/logo.png"></a>
		</div>
	</section>
	
<form method="post" action="">
<br>
<center><h2>Translado A-</h2></center><hr>
<table class="tg">
  <tr>
    <th class="tg-031e" colspan="5">
		<div id="numeroremision"><label>Número Translado: </label><?php echo '<input type="text" name="idremision" id="idremision" value="'.$numdoc.'" disabled>';?></div>
    </th>
  </tr>
  <tr>
    <td class="tg-le8v" colspan="2">BODEGA :</td>
    <td class="tg-le8v" colspan="3">FECHA :</td>
  </tr>
  <td class="tg-yw4l" colspan="2">
    	<select name="nombre_cliente" id="nombre_cliente" required>
    		<option value="">SELECCIONE BODEGA</option>
    		<?php
    		while ( $row = $bill_cliente->fetch_assoc() ){
				echo '<option value="'.$row['idbodegas'].'" >'.$row['nombre'].' Direccion:'.$row['direccion'].' </option>';
			}	 
    		?>
    	</select>
    <td class="tg-yw4l" colspan="3"><?php echo '<input type="date" name="fecha_remision" id="fecha_remision" value="'.$hoy.'">'; ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><label>NIT / CEDULA :</label><input type="text" name="nit_cliente" id="nit_cliente" onblur="buscarCedula('nit_cliente')" placeholder="Nit / Cedula ej.(1 030570356)" required></td>
    <td class="tg-yw4l" width="50%"><label>VENDEDOR :</label><input type="text" name="vendedor" id="vendedor" placeholder="Vendedor" value="<?php echo $ns;?>" disabled></td>
  </tr>
  <div id="resultado"></div>
  <tr>
    <td class="tg-yw4l" colspan="4" rowspan="2"><label></label>
    	<table class="datos">
    		<tr>
    			<td><input type="hidden" value="2016" name="datosPaCed" id="datosPaCed" placeholder="Cedula"></td>
    			<td><input type="hidden" value="2016" name="datosPaNPa" id="datosPaNPa" placeholder="Nombre Paciente"></td>
    			<td><input type="hidden" value="2016" name="datosPaNCi" id="datosPaNCi" placeholder="Nombre Cirujano"></td>
    		</tr>
    		<tr>
    			<td><input type="hidden" value="2016" name="datosPaHis" id="datosPaHis" placeholder="Historia Clinica"></td>
    			<td><input type="hidden" value="2016" name="datosPaFec" id="datosPaFec" placeholder="Fecha Cirujia"></td>
    			<td></td>
    		</tr>
    	</table>
    </td>
  </tr>
</table>

<br><br>
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
		<td><input name="nom" id="nom" VALUE="DESCRIPCIÓN :"disabled></td>
		<td width="10%"><input type="hidden" name="cant" id="cant" VALUE="CANTIDAD : "disabled></td>
		<td width="10%"><input name="cant" id="cant" VALUE="CANTIDAD"disabled></td>
		<td width="10%"><input type="hidden" name="precio" id="precio" VALUE="VALOR UNIT. :"disabled></td>
		<td width="5%"><div id="mas"><input value="Agregar" disabled></div></td>
		<td width="5%"><div id="menos"><input value="Eliminar" disabled></div></td>
	</tr>
	<div class="header"></div>
</table>
<div id="recorrido"><td width="5%"><div id="btnRecorrer"><input value="Recorrer" disabled></div></td></div>


<br><br>
<label>Condiciones del Translado: </label><br><textarea id="observaciones" placeholder="Escriba las observaciones de este documento"></textarea>
 
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

var cont=1;
//al hacer click en id mas "Agregar" se crea una nueva fila en la tabla con respecto a un producto nuevo para registrar
$('#mas').click(function(){
	var jsonproductos = $('#jsonproductos').text();
	var trs = $("#productos tr").length;
	//pasar datos productos a json objetct
	var obj = jQuery.parseJSON( jsonproductos );
	//alert(obj[0].ncedula); recorrer el objeto json productos
	var producto='';
	for(i=0;i<obj.length;i++){
		producto = producto+'<option value="'+obj[i].referencia+'">'+obj[i].descripcion+' {Bodega: '+obj[i].idbodega+'LOTE: '+obj[i].numerolote+', SALDO: '+obj[i].saldo+', PRECIO: '+obj[i].precio+', COSTO: '+obj[i].costo+'}</option>';
	}
	$('#productos').append('<tr calss="selected" id="fila'+cont+'" onclick="seleccionar(this.id)"><td><input name="ref" id="ref'+trs+'" required></td><td><select name="nom'+trs+'" id="nom'+trs+'"><option value="1">SELECCIONE PRODUCTO</option>'+producto+'</select></td><td width="10%"><input type="hidden" name="lot" id="lot'+trs+'" required></td><td  width="10%"><input name="cant" id="cant'+trs+'" required></td><td  width="10%"><input type="hidden" name="precio" id="precio'+trs+'" required></td></tr>');	

	//cambiar valor en referencia del producto
	$('#nom'+trs).change(function(){
		var referencia = $('#nom'+trs).val();
		$('#ref'+trs).val(referencia);
	});
	cont++;
	//alert(cont);
});

//boton recorrer el cual brinda la funcion de recorrer la tabla para saber la cantidad de productos y cuales serán dichos productos
$('#btnRecorrer').click(function(){
	var trs=$("#productos tr").length;
	var ref='';
	var resultadoReferencia='';
	var resultadoCantidad='';
	var cantidad=0;
	var nom='';
	for(i=1 ; i<trs; i++){
		ref = $('#ref'+i).val();
		nom = $('#nom'+i).val();
		cant = $('#cant'+i).val();
		//cuenta de subtotal
		if(cant === undefined){
			cant = 0;
		}
		cantidad = cant;
	}
	$('#productos tr:last').after('<input type="hidden" name="cantidadProductos id="cantidadProductos" value="'+(i-1)+'"> ');
	$('#recorrido').html('<input type="button" id="boton" name="enviar" value="Guardar" href="javascript:;" onClick="gruardarRemision();return false;">');
});

//cambiar valor en nit del cliente
$('#nombre_cliente').change(function(){
	var nit = $('#nombre_cliente').val();
	$('#nit_cliente').val(nit);
});

//eliminar una fila de la tabla seleccionada
$('#menos').click(function(){
	eliminar(id_fila_selected);
});

//recorrer el kit 
$('#rkit').click(function(){
	recorrerkit();
});

//esta funcion recorre el kit para saber que productos tiene el kit independientemente de cual sea obteniendo cantidad lote y precio
function recorrerkit(){
	var skit = $('#skit').val();
	var jsonkits = $('#jsonkits').text();
	var obj = jQuery.parseJSON( jsonkits );
	var jsonproductos = $('#jsonproductos').text();
	var objprod = jQuery.parseJSON( jsonproductos );
	//recorrer los kits para encontrar el seleccionado
	for(i=0;i<obj.length;i++){
		//si son iguales se tienen en cuenta
		if(skit==obj[i].idkit){
			//recorrer los productos
			for(j=0;j<objprod.length;j++){
				//se traen los productos del kit
				var trs = $("#productos tr").length;
				var producto='';
				if(obj[i].idinventario==objprod[j].idinventario){
					producto = producto+'<option value="'+objprod[j].referencia+'">'+objprod[j].descripcion+' {LOTE: '+objprod[j].numerolote+', SALDO: '+objprod[j].saldo+', PRECIO: '+objprod[j].precio+', COSTO: '+objprod[j].costo+'}</option>';
					$('#productos').append('<tr calss="selected" id="fila'+cont+'" onclick="seleccionar(this.id)"><td><input name="ref" id="ref'+cont+'" value="'+objprod[j].referencia+'" ></td><td><select name="nom'+cont+'" id="nom'+cont+'">'+producto+'</select></td><td width="10%"><input type="hidden" name="lot" id="lot'+cont+'" value="'+obj[i].lote+'"></td><td  width="10%"><input name="cant" id="cant'+cont+'" value="'+obj[i].cantidad+'"></td><td  width="10%"><input type="hidden" name="precio" id="precio'+cont+'" value="'+obj[i].precio+'"></td></tr>');	
					cont++;
				}

				//cambiar valor en referencia del producto
				$('#nom'+trs).change(function(){
					var referencia = $('#nom'+trs).val();
					$('#ref'+trs).val(referencia);
				});
			}
		}
	}
}
//funcion eliminar fila
function eliminar(id_fila){
	$('#'+id_fila).remove();
}

//funcion seleccionar la fila
function seleccionar(id_fila){
	if($('#'+id_fila).hasClass('seleccionada')){
		$('#'+id_fila).removeClass('seleccionada');
	}
	else{
		$('#'+id_fila).addClass('seleccionada');
	}
	id_fila_selected = id_fila;
}


function recorrerInventario(){
	var trs=$("#productos tr").length;
	var ref='';
	var totalproducto='';
	var cantidad=0;
	var nom='';
	for(i=1 ; i<trs; i++){
		ref = $('#ref'+i).val();
		cant = $('#cant'+i).val();
		totalproducto = totalproducto+':'+ref+','+cant;
	}
	return totalproducto;
}

function recorrerInventario(){
	var trs=$("#productos tr").length;
	var ref='';
	var totalproducto='';
	var cantidad=0;
	var nom='';
	for(i=1 ; i<trs; i++){
		ref = $('#ref'+i).val();
		cant = $('#cant'+i).val();
		totalproducto = totalproducto+':'+ref+','+cant;
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
	var direccion = $('#direccion').val();
	var datosPaCed = $('#datosPaCed').val();
	var datosPaNPa = $('#datosPaNPa').val();
	var datosPaNCi = $('#datosPaNCi').val();
	var datosPaHis = $('#datosPaHis').val();
	var datosPaFec = $('#datosPaFec').val();
	var telefono = $('#telefono').val();
	var observaciones = $('#observaciones').val();

	if(productos == '' || idremision == '' || nombre_cliente == '' || fecha_remision == ''){
		alert('!!!!!!!! Faltan campos por diligenciar. ¡¡¡¡¡¡¡¡');
		//exit();
	}

	var parametros = {
	        "productos" : productos,
	        "nombre_cliente" : nombre_cliente,
			"fecha_remision" : fecha_remision,
			"nit_cliente" : nit_cliente,
			"vendedor" : vendedor,
			"direccion" : direccion,
			"datosPaCed" : datosPaCed,
			"datosPaNPa" : datosPaNPa,
			"datosPaNCi" : datosPaNCi,
			"datosPaHis" : datosPaHis,
			"datosPaFec" : datosPaFec,
			"telefono" : telefono,
			"trs" : trs,
			"idremision" : idremision,
			"observaciones" : observaciones
	};
    $.ajax({
            data:  parametros,
            url:   '../php/guardar/translado.php',
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