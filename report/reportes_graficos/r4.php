<?php
                require_once('../../php/conexion.php');
                
                $conexion= conexion();
?>



<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
#container {
    height: 400px; 
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'Promedio de precio contra costo'
        },

        xAxis: {
            categories: [<?php
            $bill_usuarios = mysqli_query($conexion,"SELECT * from kardex group by producto") or die(mysqli_error($conexion));
         

while ($row = $bill_usuarios->fetch_assoc()) 
{
    $cl = $row['producto'];
            $bill_usuario2 = mysqli_query($conexion,"SELECT * FROM inventario where idinventario = '$cl' group by idinventario
") or die(mysqli_error($conexion));
            $row2 = $bill_usuario2->fetch_assoc();

    ?>

'<?php echo $row2 ["descripcion"];?>',

<?php
}
?>]
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Promedios'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'COSTO',
            data: [ <?php
            $bill_usuarios = mysqli_query($conexion,"SELECT producto,  AVG (costo) AS costopromedio FROM kardex group by producto
") or die(mysqli_error($conexion));
            while ($row = $bill_usuarios->fetch_assoc()) 
                {
                    ?> 
                    <?php echo $row ["costopromedio"]?>,
                    <?php
                }
                    ?>
],
            stack: 'male'
        }, {
            name: 'PRECIO',
            data: [<?php
            $bill_usuarios = mysqli_query($conexion,"SELECT producto, avg (precio) AS preciopromedio FROM kardex group by producto") or die(mysqli_error($conexion));
            while ($row = $bill_usuarios->fetch_assoc()) 
                {
                    ?> 
                    <?php echo $row ["preciopromedio"]?>,
                    <?php
                }
                    ?>],
            stack: 'male'
        }]
    });
});


        </script>
    </head>
    <body>

<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
    </body>
</html>
