<?php 

//session_start(); 


include_once "conexion.php"; 
$conexion= conexion();
//consulta tabla desartamento
$bill_departamento = mysqli_query($conexion,"SELECT * FROM departamento") or die(mysqli_error($conexion));

           
?> 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="/resources/demos/external/jquery.bgiframe-2.1.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://www.proyectosbds.com/html/css/layout.css" />

<form>
<table id="productos">
	<tr>
		<td>Referencia</td>
		<td>Nombre</td>
		<td>cantidad</td>
		<td>precio</td>
	</tr>
	<tr>
		<td><input id="ref"></td>
		<td><input id="nom"></td>
		<td><input id="cant"></td>
		<td><input id="precio"></td>
		<td><div id="mas">agregar</div></td>
		<td><div id="menos">eliminar</div></td>
		<td><div id="btnRecorrer">recorrer</div></td>
	</tr>
</table>
<div id="recorrido"></div>
<script>
$('#mas').click(function(){
	var trs = $("#productos tr").length;
	$('#productos tr:last').after('<tr><td><input id="ref'+trs+'" value="hola'+trs+'"></td><td><input id="nom'+trs+'"></td><td><input id="cant'+trs+'"></td><td><input id="precio'+trs+'"></td></tr>');	
});
$('#menos').click(function(){
	var trs=$("#productos tr").length;
    if(trs>2)
    {
        // Eliminamos la ultima columna
        $("#productos tr:last").remove();
    }
});

$('#btnRecorrer').click(function(){
	var trs=$("#productos tr").length;
	for(var i=0; i<trs; i++){
		$('#recorrido').append($('#ref'+i).val());
		$('#recorrido').append($('#nom'+i).val());
		$('#recorrido').append($('#cant'+i).val());
		$('#recorrido').append($('#precio'+i).val());
	}
});

</script>

    
<div id="dialog" title="Registra Productos" style="display:none;">
	<p></p>
</div>
    
    <button onclick="abrir_dialog()">Abrir ventana emergente</button>
   

 
</form> 

<?php //------------------------script para abrir una nueva ventana ------------------------?>
<script>
/*function abrir_dialog() {
  $( "#dialog" ).dialog({
      modal: true
  });
};*/
</script>


      
<?php 

if(isset($_POST['enviar'])) 
{ 
    if( 
	 
	$_POST['idsalida'] == '' or 
	$_POST['idinve'] == '' or 
	$_POST['idkit'] == '' or 
	$_POST['cantidad'] == '' or 
	$_POST['precio'] == '' or 
	$_POST['tipo'] == ''  ) 
    { 
        echo 'Por favor llene todos los campos.'; 
    } 
    else 
    { 
        
		 
		
         $idsalida = $_POST['idsalida'];
		 $idinve = $_POST['idinve'];
		 $idkit = $_POST['idkit'];
		 $cantidad 	= $_POST['cantidad'];
		 $precio = $_POST['precio'];
		 $tipo = $_POST['tipo'];
		         
          
         $sql = "INSERT INTO `salidadeinventario` 
		  VALUES ($idsalida,
		  '$idinve',
		  '$idkit',
		  '$cantidad',
		  '$precio',
		  '$tipo')";
		
		$bill_iv = mysqli_query($conexion,"SELECT cantidad FROM inventario where idinventario = '$idinve'") or die(mysqli_error($conexion));
		
		
		$row = $bill_iv->fetch_assoc();
		
	
		
		$restar = $row['cantidad'] - $cantidad;


		$bill_id = mysqli_query($conexion,"UPDATE `inventario` SET `cantidad` = '$restar' WHERE `inventario`.`idinventario` = '$idinve'") or die(mysqli_error($conexion));

		  
                mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
  	
                
				echo 'Usted se ha registrado correctamente.'; 
            
			
			
    } 
} 
?> 

</body>
</html>