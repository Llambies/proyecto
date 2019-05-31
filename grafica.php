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
    <style>
        @import url('https://fonts.googleapis.com/css?family=Mukta');

        body {
            font-family: 'Mukta', sans-serif;
        }
        html, body {
            margin: 0;
            background: url(imgs/back.jpg)no-repeat center center;
            background-size: cover;
            height: 100%;
        }
        header {
            display: flex;
            position: relative;
            width: 100%;
            height: 50px;
            background: #fff;
            align-items: center;
            justify-content: space-between;
            box-shadow: 5px 3px 6px black;
            margin-top: 0px;
        }
        
        header a img {
            height: 50px;
        }
        
        header a .atras {
            margin-right: 1rem;
            background: #820053;
            width: 105px;
            height: 30px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }
        
        header a .atras:hover {
            background: rgb(105, 0, 44);
        }
        canvas {
            background: white;
            margin: 40px 0 20px 0;
        }
    </style>
</head>
<body>
   <header>
        <a href="#"><img src="imgs/logo_u15.svg" alt="logo"></a>
        <a href="zonacliente.php"><button type="button" class="atras">Atrás</button></a>
    </header>
    <canvas id="myChart" width="80%" height="50%"></canvas>
<script>
    
var ctx = document.getElementById("myChart").getContext('2d');    
    
var opciones = {
        responsive: true,
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
                        max: 100, 
                        fontColor: "black"
                    }, // ticks
                    scaleLabel: {
                        display: true,
                        labelString: 'Tª, Hum., Ilum., Sal.',
                        fontSize: 18,
                        fontColor: "black"
                    } // scaleLabel
                    ,gridLines: {
                        display: false,
                        color: "black"
                    }
                }, // eje izquierda
                   {
                    id: 'B',
                    position: 'right',
                    ticks: {
                        beginAtZero: false,
                        min: 850,
                        max: 1100,
                        fontColor: "black"
                    }, // ticks
                    scaleLabel: {
                        display: true,
                        labelString: 'Presión',
                        fontSize: 18,
                        fontColor: "black"
                    } // scaleLabel 
                    ,gridLines: {
                        display: false,
                        color: "black"
                    }
                   } // eje derecha    
                ], // yAxes
            xAxes: [{
                ticks: {
                    fontColor: "black"
                } // ticks
                ,gridLines: {
                    display: false,
                    color: "black"    
                    }
            }] // xAxes
        }, // scales
        legend: {
            labels: {
                fontSize: 16,
                fontColor: "black"
            } // labels
        }, // legend
        maintainAspectRatio: false
    } // options

    } // opciones    
    
var myChart = new Chart(ctx, opciones);

</script>
</body>
</html>