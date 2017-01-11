
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
            $bill_usuarios = mysqli_query($conexion,"SELECT * FROM kardex ") or die(mysqli_error($conexion));
         

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
                text: 'Productos'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
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
            $bill_usuarios = mysqli_query($conexion,"SELECT * FROM kardex ") or die(mysqli_error($conexion));
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

<?php

    $bill_usuarios = mysqli_query($conexion,"SELECT * FROM kardex ") or die(mysqli_error($conexion));
    echo '<div id="consultaLarga">
        <table id="t21" class="tg">
          <tr>
            <th class="tg-g4jy">Fecha documento</th>
            <th class="tg-g4jy">Nombres</th>
    
            </tr>';
    while ($row = $bill_usuarios->fetch_assoc()) {
        $cle=$row['producto'];
        $bill_usuarios2 = mysqli_query($conexion,"SELECT * FROM inventario where idinventario = '$cle' ") or die(mysqli_error($conexion));
        $row2 = $bill_usuarios2->fetch_assoc();
        echo '<tr>
            <td class="tg-iacq">'.$row['fecha_creacion_documento'].'</td>
            <td class="tg-iacq">'.$row2['descripcion'].'</td>
            </tr>';
    }
    echo '</table></div> ';
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

