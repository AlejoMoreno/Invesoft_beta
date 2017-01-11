<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 

//session_start(); 


include_once "conexion.php"; 
$conexion= conexion();           
?> 

<form action="" method="post" class="registro">  
  
  
    <div><label>Nombre cirujano:</label> 
<input type="text" name="ncirujano"></div>



    <div><label>Nombre paciente:</label> 
<input type="text" name="npaciente"></div> &nbsp;
  
  
    <div><label>Numero de cedula:</label> 
<input type="text" name="ncedula"></div>&nbsp;


    <div><label>Historia clinica:</label> 
<input type="text" name="hclinica"></div> &nbsp;


    <div><label>fecha cirujia:</label> 
<input type="text" name="fcirujia"></div>&nbsp; 
   

   
    <input type="submit" name="enviar" value="Registrar"></div> &nbsp;
    
</form> 
             
<?php 

if(isset($_POST['enviar'])) 
{ 
    if( 
	 
	$_POST['ncirujano'] == '' or 
	$_POST['npaciente'] == '' or 
	$_POST['ncedula'] == '' or 
	$_POST['hclinica'] == '' or 
	$_POST['fcirujia'] == ''  ) 
    { 
        echo 'Por favor llene todos los campos.'; 
    } 
    else 
    { 
        
		 
		
         $ncirujano = $_POST['ncirujano'];
		 $npaciente = $_POST['npaciente'];
		 $ncedula = $_POST['ncedula'];
		 $hclinica 	= $_POST['hclinica'];
		 $fcirujia = $_POST['fcirujia'];
		 
        
          
         $sql = "INSERT INTO `pacientes` 
		  VALUES (null,
		  '$ncirujano',
		  '$npaciente',
		  '$ncedula',
		  '$hclinica',
		  '$fcirujia')";
                mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
  	
                echo 'Usted se ha registrado correctamente.'; 
            
    } 
} 
?> 

</body>
</html>