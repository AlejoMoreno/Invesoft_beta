$(document).ready(function(){
	//variable contador de filas general independientemente de quien la este llamando
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
			producto = producto+'<option value="'+obj[i].referencia+'|'+obj[i].numerolote+'">'+obj[i].descripcion+' {LOTE: '+obj[i].numerolote+', SALDO: '+obj[i].saldos+', PRECIO: '+obj[i].precio+', COSTO: '+obj[i].costo+'}</option>';
		}
		$('#productos').append('<tr calss="selected" id="fila'+cont+'" onclick="seleccionar(this.id)"><td><input name="ref" id="ref'+trs+'" ></td><td><select name="nom'+trs+'" id="nom'+trs+'"><option value="1">SELECCIONE PRODUCTO</option>'+producto+'</select></td><td width="10%"><input name="lot" id="lot'+trs+'"></td><td  width="10%"><input name="cant" id="cant'+trs+'"></td><td  width="10%"><input name="precio" id="precio'+trs+'" onblur="separadormiles(this.id)"></td></tr>');	
		//alert(trs);
		//cambiar valor en referencia del producto
		$('#nom'+trs).change(function(){
			var referenciaTotal = $('#nom'+trs).val();
			var Total = referenciaTotal.split("|");
			var referencia = Total[0];
			var lote = Total[1];
			$('#ref'+trs).val(referencia);
			$('#lot'+trs).val(lote);
		});
		cont++;
	});

	//boton recorrer el cual brinda la funcion de recorrer la tabla para saber la cantidad de productos y cuales serán dichos productos
	$('#btnRecorrer').click(function(){
		var trs=$("#productos tr").length;
		var ref='';
		var resultadoReferencia='';
		var resultadoCantidad='';
		var cantidad=0;
		var nom='';
		var precio=0;
		var bruto = 0;
		for(i=1 ; i<cont; i++){
			ref = $('#ref'+i).val();
			nom = $('#nom'+i).val();
			cant = $('#cant'+i).val();
			precio = $('#precio'+i).val();
			//alert(ref);
			//cuenta de subtotal
			cantidad = $('#cant'+i).val();
			precio = $('#precio'+i).val();
			if(cantidad === undefined){
				cantidad = 0;
			}
			if(precio === undefined){
				precio = 0;
			}
			var b = parseInt(cantidad * precio);
			bruto = (bruto + b);

		}
		$('#productos tr:last').after('<input type="hidden" name="cantidadProductos id="cantidadProductos" value="'+(i-1)+'"> ');
		$('#bruto').val(bruto);
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
						$('#productos').append('<tr calss="selected" id="fila'+cont+'" onclick="seleccionar(this.id)"><td><input name="ref" id="ref'+cont+'" value="'+objprod[j].referencia+'" ></td><td><select name="nom'+cont+'" id="nom'+cont+'">'+producto+'</select></td><td width="10%"><input name="lot" id="lot'+cont+'" value="'+obj[i].lote+'"></td><td  width="10%"><input name="cant" id="cant'+cont+'" value="'+obj[i].cantidad+'"></td><td  width="10%"><input name="precio" id="precio'+cont+'" value="'+obj[i].precio+'"></td></tr>');	
						//alert(trs);
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
//fin de la funcion
});

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


function separadormiles(number){
	var numero = $('#'+number).val();
	/*alert(numero);
	var result = '';
	while( number.length > 3 )

	{

	 result = '.' + number.substr(number.length - 3) + result;

	 number = number.substring(0, number.length - 3);

	}

	result = number + result;

	return result;*/

}




