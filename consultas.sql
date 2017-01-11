--consulta de los documentos en general (funcion para reporte x producto)--
SELECT * 
FROM salidadeinventario
INNER JOIN  `inventario` ON salidadeinventario.`idinventario` = inventario.`idinventario` 
INNER JOIN  `remision` ON remision.`idsalida` = salidadeinventario.`idsalida` 
INNER JOIN  `terceros` ON terceros.`idclientes` = remision.`idclientes` 
INNER JOIN  `pacientes` ON pacientes.`idpaciente` = remision.`idpaciente` 


