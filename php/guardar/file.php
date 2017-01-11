<?php 
include_once "../conexion.php"; 
$conexion= conexion();

$fname = $_FILES['sel_file']['name'];
echo 'Cargando nombre del archivo: '.$fname.' ';
$chk_ext = explode(".",$fname);

if(strtolower(end($chk_ext)) == "csv")
{
 //si es correcto, entonces damos permisos de lectura para subir
 $filename = $_FILES['sel_file']['tmp_name'];
 $handle = fopen($filename, "r");

 while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
 {
   //Insertamos los datos con los valores...
    $sql = "INSERT INTO  `osmed`.`salidadeinventario` (
`idsalida` ,
`idinventario` ,
`idkit` ,
`cantidad` ,
`precio` ,
`tipo`
)
VALUES (
null,'$data[1]','$data[2]','$data[3]','$data[4]','$data[5]'
);";
    mysqli_query($conexion, $sql) or die(mysqli_error($conexion));  
    //echo $data[0].'<br>';
 }
 //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
 fclose($handle);
 echo "Importación exitosa!";
 echo "<script type='text/javascript'> function redireccionar(){window.location = '../../html/Correcto.php?variable=entradas';} 
setTimeout ('redireccionar()', 1000);</script>";
 
}
else
{
//si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             //ver si esta separado por " , "
 echo "Archivo invalido!";
}   