<?php
echo 'este es';

$precios = split(',', '123,123,450');
$precio ='';
foreach ($precios as $key => $value) {
	$precio = $precio.$value;
}
echo $precio;
?>
