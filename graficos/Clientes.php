<?php
include_once "../php/conexion.php"; 
    $conexion= conexion();
include('../html/encabezado.php');

    echo '
    <section id="encabezado">
        <div id="logo">
            <a href="../html/profile"><img src="../imagenes/logo.png"></a>
        </div>
    </section>
    <center><h2><strong>OSMED S.A.S.<br>NIT. 900.492.217-6</strong></h2><br>Carrera 26 No. 45 C - 23 Barrio Palermo<br>Teléfono: 2884041-2882788<br>Cel. 310 334856<br>director.bodega@osmedsas.com / bodegabogota@osmedsas.com / info@osmedsas.com</center><hr>
        ';

require_once('../php/conexion.php');
$conexion= conexion();
$fechas = array();
$i=0;
$bill_usuarios = mysqli_query($conexion,"SELECT AVG(  `precio` ) AS total,  `fecha_creacion_documento` ,  `cliente` FROM  `kardex` GROUP BY  `documento` ") or die(mysqli_error($conexion));
while ($row = $bill_usuarios->fetch_assoc()) {
    $fechas[$i] = $row;
    $i++;
}
$jsonFechas=json_encode($fechas);
echo '<div id="jsonFechas">'.$jsonFechas.'</div>';

$usuarios = array();
$i=0;
$bill_usuarios = mysqli_query($conexion,"SELECT AVG(  `precio` ) AS total,  `fecha_creacion_documento` ,  `cliente` FROM  `kardex` GROUP BY  `fecha_creacion_documento` ") or die(mysqli_error($conexion));
while ($row = $bill_usuarios->fetch_assoc()) {
    $usuarios[$i] = $row;
    $i++;
}
$jsonusuarios=json_encode($usuarios);

?>




<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Historial de usuario</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () { 

    var jsonFechas = $('#jsonFechas').text();
    var obj = jQuery.parseJSON( jsonFechas );


    $('#container').highcharts({
        title: {
            text: 'Promedio total por Factura',
            x: -20 //center
        },
        subtitle: {
            text: 'wakusoft@2016 / WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: [
            <?php 
            for ($i=0; $i < sizeof($fechas); $i++) { ?>
                "<?php echo $fechas[$i]['fecha_creacion_documento']; ?>", <?php 
            }
            ?>]
        },
        yAxis: {
            title: {
                text: 'Promedio Total'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Pesos'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
            <?php 
            for ($i=0; $i < sizeof($usuarios); $i++) { ?>
                { name: "<?php echo $usuarios[$i]['cliente']; ?>", 
                  data: [
                  <?php 
                    for ($j=0; $j < sizeof($fechas); $j++) { 
                        if($usuarios[$i]['cliente'] == $fechas[$j]['cliente']){
                            ?>
                        <?php echo $fechas[$j]['total']; ?>, <?php 
                        }
                    }
                    ?>
                  0]},
            <?php 
            } 
            ?>
        {
            name: 'otro3',
            data: [2, 4, 1, 1, 5, 1, 1, 4, 1, 1]
        }]
    });
});
    function getFechas(){
        var resultado= '';
        for(i=0;i<obj.length;i++){
            resutado = resultado+','+obj[i].fecha;
        }
        return '['+resultado+']';
    }
        </script>
    </head>
    <body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    </body>
</html>


<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-g4jy{background:#00009b;color:white;vertical-align:top}
.tg .tg-bw1g{color:#00009b;text-align:center;vertical-align:top}
.tg .tg-96dg{color:#9b9b9b;vertical-align:top}
input,select {outline: none;display: block;width: 10%;border: 1px solid #d9d9d9;margin: 10px 10px 20px;padding: 10px 15px 10px 10px;}
input:focus,select:focus{border: 2px solid #BD0A29;}
#boton{ color: #F9F9F9; background: rgba(201,65,90,1);  background: -moz-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(201,65,90,1)), color-stop(100%, rgba(189,10,40,1)));    background: -webkit-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%); background: -o-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);  background: -ms-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%); background: linear-gradient(to bottom, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);   filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9415a', endColorstr='#bd0a28', GradientType=0 );}
#boton:hover{   color: #F9F9F9; background: rgba(194,132,143,1);    background: -moz-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);  background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(194,132,143,1)), color-stop(100%, rgba(186,31,62,1)));  background: -webkit-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);   background: -o-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);    background: -ms-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);   background: linear-gradient(to bottom, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c2848f', endColorstr='#ba1f3e', GradientType=0 );}
.selected:hover{
    background-color: #F9F9F9;
}
</style>




<?php


echo '<div id="jsonusuarios">'.$jsonusuarios.'</div>';

echo '

<table class="tg">
    <tr>
        <td class="tg-g4jy">Cliente</td>
        <td class="tg-g4jy">Precio total</td>
        <td class="tg-g4jy">Fecha</td>
    </tr>';
    for ($i=0; $i < sizeof($fechas); $i++) { 
        echo '
        <tr>
            <td class="tg-iacq">'.$fechas[$i]['cliente'].'</td>
            <td class="tg-iacq">'.$fechas[$i]['total'].'</td>
            <td class="tg-iacq">'.$fechas[$i]['fecha_creacion_documento'].'</td>
        </tr>';
    }

echo '</table>';
?>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-g4jy{background:#00009b;color:white;vertical-align:top}
.tg .tg-bw1g{color:#00009b;text-align:center;vertical-align:top}
.tg .tg-96dg{color:#9b9b9b;vertical-align:top}
input,select {outline: none;display: block;width: 10%;border: 1px solid #d9d9d9;margin: 10px 10px 20px;padding: 10px 15px 10px 10px;}
input:focus,select:focus{border: 2px solid #BD0A29;}
#boton{ color: #F9F9F9; background: rgba(201,65,90,1);  background: -moz-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(201,65,90,1)), color-stop(100%, rgba(189,10,40,1)));    background: -webkit-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%); background: -o-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);  background: -ms-linear-gradient(top, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%); background: linear-gradient(to bottom, rgba(201,65,90,1) 0%, rgba(189,10,40,1) 100%);   filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9415a', endColorstr='#bd0a28', GradientType=0 );}
#boton:hover{   color: #F9F9F9; background: rgba(194,132,143,1);    background: -moz-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);  background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(194,132,143,1)), color-stop(100%, rgba(186,31,62,1)));  background: -webkit-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);   background: -o-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);    background: -ms-linear-gradient(top, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%);   background: linear-gradient(to bottom, rgba(194,132,143,1) 0%, rgba(186,31,62,1) 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c2848f', endColorstr='#ba1f3e', GradientType=0 );}
</style>


<script>
$(document).ready(function(){
  $('#jsonusuarios').hide();
  $('#jsonFechas').hide();
});
</script>