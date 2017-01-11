<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<?php 
include_once "conexion.php"; 
$conexion= conexion();

if(1) { 
    if( $_POST['iduser'] == '') { 
        echo 'Por favor llene todos los campos.'; 
    } 
    else { 
    	$iduser = $_POST['iduser'];
        $bill_contenedor = mysqli_query($conexion,"SELECT * FROM usuarios where ncedula like '$iduser'") or die(mysqli_error($conexion));		
		$row = $bill_contenedor->fetch_assoc();

		$ncedula = $row['ncedula'];
		$iddepartamento = $row['iddepartamento'];
		$idciudad = $row['idciudad'];
		$tipousuario 	= $row['tipousuario'];
		$nombre = $row['nombre'];
		$apellido = $row['apellido'];
		$cargo = $row['cargo'];
		$ntelefono = $row['ntelefono'];
		$clave = $row['clave'];
		$estado = $row['estado'];
		 
		 
		//consulta all departamentos
		$bill_despartamentos = mysqli_query($conexion,"SELECT * FROM departamento ORDER BY nombre ") or die(mysqli_error($conexion));

		//consulta all ciudades
		$bill_ciudades = mysqli_query($conexion,"SELECT * FROM ciudades ORDER BY nombre ") or die(mysqli_error($conexion));

		//consulta all tipos usuario
		$bill_tipousuarios = mysqli_query($conexion,"SELECT * FROM tipousuario") or die(mysqli_error($conexion));

		//pintar html datos encontrados............. 
		echo '<center><h2>Registrar Usuarios</h2></center><hr>
		<form action="../php/actualizar/usuario.php" method="post" class="registro">
		<table>
			<tr>
				<td>
		            <div><label>Nombres:</label> <input name="nombre" value = "'.$nombre.'" type="text" placeholder="Nombres (ej. Alejandro)"></div>&nbsp;
		        </td>
		        <td>
		            <div><label>Apellidos:</label> <input type="text" value = "'.$apellido.'" id="apellidousuarui" name="apellido" placeholder="Apellidos (ej. Moreno)"></div>&nbsp;
		        </td>
		        <td>
		            <div><label>Cedula:</label> <input type="text" value = "'.$ncedula.'" id="cedulausuario" name="ncedula" placeholder="Cedula (ej. 1030570354)"></div>&nbsp;
		        </td>
			</tr>
			<tr>';
			echo '<td><label>Departameto:</label>
		            <select name="iddepartamento" id="iddepartamento">
		    	       <option value="">Seleccione Línea</option>';
		            
		            while ($row = $bill_despartamentos->fetch_assoc()) { 
		                echo '<option value="'.$row["iddepartamento"].'" >'.$row['nombre'].'</option>';
		            } 
		            echo '</select>&nbsp;
		        </td> ';

		    echo '<td><label>Ciudad:</label>
		            <select name="idciudad" id="idciudad">
		    	       <option value="">Seleccione Línea</option>';
		            
		            while ($row = $bill_ciudades->fetch_assoc()) { 
		                echo '<option value="'.$row["idciudades"].'" >'.$row['nombre'].'</option>';
		            } 
		            echo '</select>&nbsp;
		        </td> ';

		    echo '<td><label>Linea:</label>
		            <select name="tipousuario" id="tipousuario">
		    	       <option value="">Seleccione Línea</option>';
		            
		            while ($row = $bill_tipousuarios->fetch_assoc()) { 
		                echo '<option value="'.$row["idtipousuario"].'" >'.$row['tipo'].'</option>';
		            } 
		            echo '</select>&nbsp;
		        </td>
		    </tr>
		    <tr>';

			echo '<td>
		            <div><label>Cargo:</label> <input type="text" value = "'.$cargo.'" id="cargousuario" name="cargo" placeholder="Escriba su Cargo (JEFE INVENTARIO-ADMINISTRADOR-etc.)"></div>&nbsp;
		        </td>
		        <td>
		            <div><label>Teléfono:</label> <input type="tel" value = "'.$ntelefono.'" id="telefonousuario" name="ntelefono" placeholder="(57)+ 000 0 00 00"></div>&nbsp;
		        </td>
				<td>
		            <div><label>Estado:</label> <input type="text" value = "'.$estado.'" id="estado" name="estado" placeholder="ej.(activo)"></div>&nbsp;
		        </td>
		        
			</tr>
			<tr>
				<td>
		            <div><label>Clave:</label> <input type="password" value = "'.$clave.'" id="claveusuario" name="clave" placeholder="Clave Ingreso"></div>&nbsp;
		        </td>
		        <td>
		            <div><label>Nueva Clave:</label> <input type="password" value = "'.$clave.'" id="claveusuario1" name="clave1" placeholder="Repita Clave Ingreso"></div>&nbsp;
		        </td>
		    </tr>	
		</table>			
		<input type="hidden" name="idusuario" value="'.$ncedula.'">
		<input type="submit" id="boton" name="actualizar1" value="Guardar">
		<input type="submit" id="boton" name="borrar" value="Borrar">
			
		</form>';

		echo "<script>
		$(document).ready(function(){
		    $('#iddepartamento > option[value=".$iddepartamento."]').attr('selected', 'selected');
		    $('#idciudad > option[value=".$idciudad."]').attr('selected', 'selected');
		    $('#tipousuario > option[value=".$tipousuario."]').attr('selected', 'selected');
		});
		</script>";
		
	}
}
?>