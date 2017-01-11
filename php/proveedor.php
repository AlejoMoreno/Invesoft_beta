
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<?php 
if(1) 
{ 
	include_once "conexion.php"; 
	$conexion= conexion();

    if( $_POST['nit'] == '') { 
	    echo 'Por favor llene todos los campos.'; 
	} 
    else 
    {
    	$nit = $_POST['nit'];
        $bill_contenedor = mysqli_query($conexion,"SELECT * FROM terceros where nit = '$nit'") or die(mysqli_error($conexion));		
		$row = $bill_contenedor->fetch_assoc();

		$idinventario = $row['idclientes'];
		$departamento = $row['departamento'];
		$idCiudad = $row['ciudad'];
		$nombre = $row['nombre'];
		$institucion = $row['institucion'];
		
		$telefono = $row['telefono'];
		$correo = $row['correo'];
		$direccion = $row['direccion'];
		$celular = $row['celular'];
		$estado = $row['estado'];
		$contacto_directo = $row['contacto_directo'];
		$sede = $row['sede'];
		$tipo = $row['tipo'];
		

		//consulta all departamentos
		$bill_departamentos = mysqli_query($conexion,"SELECT * FROM departamento ORDER BY nombre ") or die(mysqli_error($conexion));
		//consulta all departamentos
		$bill_ciudades = mysqli_query($conexion,"SELECT * FROM ciudades ORDER BY nombre ") or die(mysqli_error($conexion));
		
		//pintar html datos encontrados.............               
		echo '
		<form action="../php/actualizar/proveedores.php" method="post" class="registro">
		<center><h2>Registrar Tercero</h2></center><hr>
		<table width="100%" border="0">
			<tr>
				<td><div><label>Nombre:</label><input type="text" value="'.$nombre.'" name="nombre" placeholder="ej.(Nombre Encargado)"></div></td>
				<td><div><label>Nit:</label><input type="text" value="'.$nit.'" name="nit" placeholder="ej.(800656987)"></div></td>
				<td><div><label>Razón social:</label><input type="text" value="'.$institucion.'" name="institu" placeholder="ej.(Nombre o Razón Social)"></div></td>
			</tr>
			<tr>
				<td><div><label>Numero local:</label><input type="text" value="'.$telefono.'" name="tel" placeholder="ej.(2878595)"></div></td>
				<td><div><label>Numero celular:</label><input type="text" value="'.$celular.'" name="cel" placeholder="ej.(3218965632)"></div></td>
				<td><div><label>Correo:</label><input type="email" value="'.$correo.'" name="correo" placeholder="ej.(email@email.com)"></div></td>
			</tr>
			<tr>
				<td><div><label>Direccion:</label><input type="text" value="'.$direccion.'" name="direcc" placeholder="ej.(CR CL TV DG 98 # 10-20 sur norte)"></div></td>
				<td><label>Departamento:</label>
					<select name="iddepartamento" id="iddepartamento">
						<option value="">Seleccione Departamento</option>';
					
					while ( $row = $bill_departamentos->fetch_assoc() )
					{
						echo '<option value="'.$row['iddepartamento'].'" >'.$row['nombre'].'</option>';
		        	
		        	}
		        	echo '</select></td>
		        <td><label>Ciudad:</label>
					<select name="idciudad" id="idciudad">
						<option value="">Seleccione Ciudad</option>';

					while ( $row = $bill_ciudades->fetch_assoc() )
					{
						echo '<option value="'.$row['idciudades'].'" >'.$row['nombre'].'</option>';
		        	}
		        	echo '</select></td>
		    </tr>
			<tr>
				<td><div><label>Persona a Cargo:</label><input type="text" value="'.$contacto_directo.'" name="cdirec" placeholder="ej.(Nombre Persona a cargo del proveedor)"></div></td>
				<td><div><label>Sede:</label><input type="text" value="'.$sede.'" name="sede" placeholder="ej.(Nombre sede)"></div></td>
				<td><div><label>Tipo:</label><select id="tipo" name="tipo"><option value="CLIENTE">CLIENTE</option><option value="PROVEEDOR">PROVEEDOR</option><option value="TERCERO">TERCERO</option></select></div></td>
			</tr>
			<tr>
				<td><div><label>Estado:</label> 
					<select name="estado" id="estado">
		        	       <option value="">Seleccione estado</option>
		        	       <option value="1">ACTIVO</option>
		        	       <option value="2">INACTIVO</option>
		        	</select></div></td>	    
			</tr>
		</table>
		<input type="submit" id="boton" name="actualizar1" value="Guardar">
		<input type="submit" id="boton" name="borrar" value="Borrar">
		 
		</form> ';

		 echo "<script>
		$(document).ready(function(){
		    $('#iddepartamento > option[value=".$departamento."]').attr('selected', 'selected');
		    $('#idciudad > option[value=".$idCiudad."]').attr('selected', 'selected');
		    $('#tipo > option[value=".$tipo."]').attr('selected', 'selected');
		    $('#estado > option[value=".$estado."]').attr('selected', 'selected');
		});
		
		</script>";

	}
}

?>

