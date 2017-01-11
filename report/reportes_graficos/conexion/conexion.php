

	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
	
	function conexion()
	{
	    $db_connection =  mysqli_connect("localhost", "root", "");
	
        	if (!$db_connection) {
			echo 'conexion';
		    die('No pudo conectarse: ' . mysqli_error($db_connection));
		}
		//--------------------------------------------------------------
		mysqli_select_db($db_connection,"reportes_graficos_db") or die(mysqli_error($db_connection));
		return $db_connection;

	}
?>

</body>
</html>

