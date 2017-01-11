<?php 

//session_start(); 


include_once "conexion.php"; 
$conexion= conexion();


if(isset($_POST['enviar'])) 
{ 
    if( 
   
  $_POST['nombre'] == '' or 
  $_POST['descrip'] == '' or 
  $_POST['direcc'] == ''  ) 
    { 
        echo 'Por favor llene todos los campos.'; 
    } 
    else 
    { 
        
     
    $id = $_POST['nit'];
         $nombre = $_POST['nombre'];
     $descrip = $_POST['descrip'];
     $direcc = $_POST['direcc'];
    
  
        
          
         $sql = "INSERT INTO `bodegas` 
      VALUES ('$id',
      '$nombre',
      '$descrip',
      '$direcc')";
                mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
    
                echo 'Usted se ha registrado correctamente.'; 

          $sql = "INSERT INTO  `osmed`.`terceros` (
      `idclientes` ,
      `departamento` ,
      `ciudad` ,
      `nombre` ,
      `institucion` ,
      `nit` ,
      `telefono` ,
      `correo` ,
      `direccion` ,
      `celular` ,
      `estado` ,
      `contacto_directo` ,
      `sede` ,
      `tipo` ,
      `calificacion` ,
      `bodega` ,
      `fechamodificado`
      )
      VALUES (
      NULL ,  '1',  '1',  '$nombre',  '1',  '$id',  '1',  '1',  '$direcc',  '1',  '1',  '1',  '1',  'BODEGA',  '1',  '1',  '1'
      );";
                mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
    
                echo 'Usted se ha registrado correctamente.'; 
            
    } 
} 
           
?> 




<form action="" method="post" > 

    
    <label>Nit:</label> 
<input type="text" name="nit">

  <label>Nombre:</label> 
<input type="text" name="nombre">


   
<label>Descipcion:</label> 
<textarea name="descrip" cols="" rows=""></textarea>

<label>Direccion:</label> 
<input type="text" name="direcc">

   

   
    <input type="submit" name="enviar" value="Registrar">
   

 
</form> 
             

