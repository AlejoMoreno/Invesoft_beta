SELECT * 
FROM  `salidadeinventario` 
INNER JOIN  `remision` ON  `salidadeinventario`.`idkit` =  `remision`.`documento` 
INNER JOIN  `pacientes` ON  `pacientes`.`idpaciente` =  `remision`.`idpaciente` 
inner join `terceros` on `terceros`.`idclientes` = `remision`.`idclientes` 
WHERE  `remision`.`documento` LIKE  'R%'
ORDER BY  `pacientes`.`fechacirujia` DESC 