<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='../scripts/funciones.js'></script>

<?php 
if(1) 
{ 
	include_once "conexion.php"; 
	$conexion= conexion();

    if( $_POST['referencia'] == '' or $_POST['lote'] == '') { 
	    echo 'Por favor llene todos los campos.'; 
	} 
    else 
    {
    	$referencia = $_POST['referencia'];
    	$lote = $_POST['lote'];

        $bill_contenedor = mysqli_query($conexion,"SELECT * FROM inventario where referencia = '$referencia' and numerolote = '$lote'") or die(mysqli_error($conexion));		
		$row = $bill_contenedor->fetch_assoc();

		$idinventario = $row['idinventario'];
		$bodega = $row['idbodega'];
		$idmarca = $row['idmarcas'];
		$linea = $row['idlineas'];
		$refe 	= $row['referencia'];
		$descrip = $row['descripcion'];
		$nlote = $row['numerolote'];
		$tprese = $row['tipopresentacion'];
		$smax = $row['stockmaximo'];
		$smin = $row['stockminimo'];
		$precio = $row['precio'];
		$costo = $row['costo'];
		$estado = $row['estado'];
		$saldo = $row['saldo'];
		$fc = $row['fechadevencimiento'];
		$iva = $row['iva'];
		
		//$fc = date("Y-m-d", $fc);
          
  		//consulta tabla lineas
		$bill_linea = mysqli_query($conexion,"SELECT * FROM lineas where idlineas = '$linea'") or die(mysqli_error($conexion));
		$row1 = $bill_linea->fetch_assoc();
		$linea2 = $row1['nombre'];
		$idlinea2 = $row['idlineas'];

		//consulta tabla marcas
		$bill_marca = mysqli_query($conexion,"SELECT * FROM marcas where idmarcas = '$idmarca'") or die(mysqli_error($conexion));
		$row11 = $bill_marca->fetch_assoc();
		$marca2 = $row11['nombre'];
		$idmarcas2 = $row['idmarcas'];

		//consulta tabla bodegas
		$bill_bodega = mysqli_query($conexion,"SELECT * FROM bodegas where idbodegas = '$bodega'") or die(mysqli_error($conexion));
		$row = $bill_bodega->fetch_assoc();
		$bodega2 = $row['nombre'];
		$idbodegas2 = $row['idbodegas'];

		//consulta tabla lineas
		$bill_lineas = mysqli_query($conexion,"SELECT * FROM lineas") or die(mysqli_error($conexion));
		//consulta tabla marcas
		$bill_marcas = mysqli_query($conexion,"SELECT * FROM marcas") or die(mysqli_error($conexion));
		//consulta bodegas
		$bill_bodegas = mysqli_query($conexion,"SELECT * FROM bodegas") or die(mysqli_error($conexion));
		
		//pintar html datos encontrados.............               
		echo '
			<form name="formulario" action="../php/actualizar/inventario.php" method="post" class="registro">
				<table width="200" border="0">
				<tr><td colspan="3"><center><h2>Registrar Producto</h2></center><hr></td></tr>
				<tr>
					<td><label>Linea:</label>
		                <select name="idlineas" id="idlineas">
		        	       <option value="">Seleccione Línea</option>';
		                
		                while ($row = $bill_lineas->fetch_assoc()) { 
		                    echo '<option value="'.$row["idlineas"].'" >'.$row['nombre'].'</option>';
		                } 
		                echo '</select>&nbsp;
		            </td> 

		            <td><label>Marca:</label>
		                <select name="marca" id="idmarcas">
		        	       <option value="">Seleccione Marca</option>';
		               
		                while ($row = $bill_marcas->fetch_assoc()) { 
		                    echo '<option value="'.$row['idmarcas'].'" >'.$row['nombre'].'</option>';
		                }
		                echo '</select>&nbsp;
		            </td>';
		    	echo '</tr>
		  		<tr>
		    		<td><div><label>Referencia:</label> 
					<input type="text" value="'.$referencia.'"name="refe" id="refe" onkeypress="uppercase(this)" placeholder="Referencia (ej. 52142536)" required></div>&nbsp;</td>'; 	
	     	  echo '<td><div><label>Descripcion:</label> 
					<input type="text" name="descrip" value="'.$descrip.'"  placeholder="Descripción del Producto" required></div>&nbsp;</td>'; 
			  echo '<td><div><label>Numero de lote:</label> 
					<input type="text" value="'. $lote.'" name="nlote" placeholder="Lote (ej. 21053)"></div> &nbsp;</td>';
		  echo '</tr>
		  		<tr>
		    		<td><div><label>Presentacion:</label> 
					<input type="text" value="'.$tprese.'" name="tprese" placeholder="Presentación (ej. Unidad)"></div>&nbsp;</td>';
			echo '<td><div><label>Stock Minimo:</label> 
					<input type="number" value="'.$smin .'" name="smin" placeholder="Min (ej. 1-100)"></div>&nbsp;</td>';
			  echo '<td><div><label>Stock Maximo:</label> 
					<input type="number" value="'.$smax .'" name="smax" placeholder="Max (ej. 1-100)"></div> &nbsp;</td>';
			 
		  echo '</tr>
		  		<tr>
		    		<td><div><label>Precio:</label> 
					<input type="number" value="'. $precio.'" name="precio" placeholder="$ (ej. 1000)" required></div>&nbsp;</td>';
			  echo '<td><div><label>costo:</label> 
					<input type="number" value="'.$costo.'" name="costo" placeholder="$ (ej. 500)" required></div>&nbsp;</td>';
			  echo '<td><div><label>Estado:</label> 
					<select name="estado" id="estado">
		        	       <option value="">Seleccione estado</option>
		        	       <option value="1">ACTIVO</option>
		        	       <option value="2">INACTIVO</option>
		        	</select>';	                
		        
				
		  echo '</tr>
		    	<tr>
		    		<td><div><label>Saldo:</label> <input type="hidden" name="idinventario" value="'.$idinventario.'" >
					<input type="number" value="'.$saldo .'" id="" name="saldo" placeholder="(ej. 10)" ></div>&nbsp;</td>';
			  echo '<td><div><label>Fecha de vencimiento:</label> 
					<input type="date" value="'.$fc .'" name="fc"></div>&nbsp;</td>';	

			 echo '<td><div><label>Iva:</label> 
					<input type="number" value="'.$iva.'" name="iva" placeholder="% (ej. 16)"></div>&nbsp;</td>
		  		</tr>
		    	<tr>
		    		<td><label>Bodega:</label>
		                <select name="ubi" id="idbodegasc">
		        	       <option value="">Seleccione Bodegas</option>';
		               
		                while ($row = $bill_bodegas->fetch_assoc()) { 
		                    echo '<option value="'.$row['idbodegas'].'" >'.$row['nombre'].'</option>';
		                }
		                echo '</select>&nbsp;
		            </td>
		    		<td>&nbsp;</td>
		    		<td> &nbsp;</td>
		  		</tr>
				</table>
			<input type="submit" id="boton" name="actualizar1" value="Guardar"><input type="submit" id="boton" name="borrar" value="Borrar"></div></div> 
		</form> ';

		 echo "<script>
		$(document).ready(function(){
		    $('#idlineas > option[value=".$idlinea2."]').attr('selected', 'selected');
		    $('#idmarcas > option[value=".$idmarcas2."]').attr('selected', 'selected');
		    $('#idbodegasc > option[value=".$idbodegas2."]').attr('selected', 'selected');
		    $('#estado > option[value=".$estado."]').attr('selected', 'selected');
		    $('#formulariopr').hide();
		});

			</script>";

	}
}





?>

