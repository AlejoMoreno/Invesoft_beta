<?php
//Si la variable archivo que pasamos por URL no esta 
//establecida acabamos la ejecucion del script.
//Utilizamos basename por seguridad, devuelve el 
//nombre del archivo eliminando cualquier ruta. 
$archivo = 'reporte.csv';
$ruta = $archivo;
//echo $ruta;
if (is_file($ruta))
{
   header('Content-Type: application/force-download');
   header('Content-Disposition: attachment; filename='.$archivo);
   header('Content-Transfer-Encoding: binary');
   header('Content-Length: '.filesize($ruta));

   readfile($ruta);
   echo '<script type="text/javascript">window.location="../html/reportes.php";</script>';
}
else{
echo '<script type="text/javascript">window.location="../html/reportes.php";</script>';
   exit();
}
echo '<script type="text/javascript">window.location="../html/reportes.php";</script>';
?>