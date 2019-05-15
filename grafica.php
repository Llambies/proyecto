<?php

require_once('conn.php');
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$IdNodo = $_POST['variable1'];
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <title>Gráficas de datos</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
</head>
<body>
    <canvas id="myChart" width="100" height="48"></canvas>
<script>
    
var ctx = document.getElementById("myChart").getContext('2d');    

var opciones = {
        type: 'line',
        data: {
            labels: [
                <?php
                $sql = "SELECT * FROM datos WHERE IdNodo='$IdNodo'";
                $result = mysqli_query($conn, $sql);
                while ($registros = mysqli_fetch_array($result)){
                    $nodo=$registros['IdNodo'];
                ?>
                    '<?php echo $registros["Fecha"] ?>',
                <?php
                }
                ?>
            ] 
            ,
            datasets: [{
                    label: "Temperatura (ºC)",
                    yAxesGroup: 'A',
                    data: 
                    <?php
                    $sql = "SELECT * FROM datos WHERE IdNodo = '$IdNodo'";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    [<?php while($registros = mysqli_fetch_array($result)){ ?>
                    <?php echo $registros["Sol"] 
                        ?>, <?php } ?>],
                    fill: false,
                    backgroundColor: ['rgba(255,100,0,0.6)'],
                    borderColor: ['rgba(255,100,0,1)']
                    },
                       {
                    label: "Humedad (%)",
                    yAxisID: 'A',
                    data: <?php
                    $sql = "SELECT * FROM datos WHERE IdNodo=$IdNodo";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    [<?php while($registros = mysqli_fetch_array($result)){ ?>
                    <?php echo $registros["Agua"] 
                        ?>, <?php } ?>],
                    fill: false,
                    backgroundColor: ['rgba(50,150,240,0.6)'],
                    borderColor: ['rgba(50,120,180,1)']
                    },
                       {
                    label: "Iluminación (%)",
                    yAxisID: 'A',
                    data: <?php
                    $sql = "SELECT * FROM datos WHERE IdNodo=$IdNodo";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    [<?php while($registros = mysqli_fetch_array($result)){ ?>
                    <?php echo $registros["Luz"] 
                        ?>, <?php } ?>],
                    fill: false,
                    backgroundColor: ['rgba(155,255,0,0.6)'],
                    borderColor: ['rgba(155,255,0,1)']
                    },
                       {
                    label: "Salinidad (%)" ,
                    yAxisID: 'A',
                    data: <?php
                    $sql = "SELECT * FROM datos WHERE IdNodo=$IdNodo";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    [<?php while($registros = mysqli_fetch_array($result)){ ?>
                    <?php echo $registros["Sal"] 
                        ?>, <?php } ?>],
                    fill: false,
                    backgroundColor: ['rgba(100,190,240,0.6)'],
                    borderColor: ['rgba(100,190,240,1)']
                    },
                      {
                    label: "Presión (mbar)",
                    yAxisID: 'B',
                    data: <?php
                    $sql = "SELECT * FROM datos WHERE IdNodo=$IdNodo";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    [<?php while($registros = mysqli_fetch_array($result)){ ?>
                    <?php echo $registros["Presion"] 
                        ?>, <?php } ?>],
                    fill: false,
                    backgroundColor: ['rgba(160,100,180,0.6)'],
                    borderColor: ['rgba(160,100,180,1)']
                    } 
                    
            ]
        },
     
    options: {
        scales: {
            yAxes: [{
                    id: 'A',
                    position: 'left',
                    ticks: {
                        beginAtZero: true,
                        min: 0,
                        max: 100
                    } // ticks
                },
                   {
                    id: 'B',
                    position: 'right',
                    ticks: {
                        beginAtZero: false,
                        min: 850,
                        max: 1100
                    } // ticks
                   }    
                ] // yAxes
        }, // scales
        legend: {
            labels: {
                fontSize: 16,
            } // labels
        } // legend
    } // options

    } // opciones    
    
var myChart = new Chart(ctx, opciones);

</script>
</body>
</html>