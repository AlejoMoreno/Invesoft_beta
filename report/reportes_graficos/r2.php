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
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Movimiento por fecha del inventario',
            x: -20 //center
        },
        subtitle: {
            text: 'OSMED SAS',
            x: -20
        },
        xAxis: {

                

            categories: [ 
            <?php
            $bill_usuarios = mysqli_query($conexion,"SELECT * FROM kardex group by fecha_creacion_documento") or die(mysqli_error($conexion));
         

while ($row = $bill_usuarios->fetch_assoc()) 
{

    ?>

'<?php echo $row ["fecha_creacion_documento"];?>',

<?php
}
?>

    ]


            
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Inventario',
            data: [
            <?php
            $bill_usuarios = mysqli_query($conexion,"SELECT * FROM kardex") or die(mysqli_error($conexion));
            while ($row = $bill_usuarios->fetch_assoc()) 
                {
                    ?> 
                    <?php echo $row ["producto"]?>,
                    <?php
                }
                    ?>


            ]
        
        }]
    });
});
        </script>
    </head>
    <body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    </body>
</html>
