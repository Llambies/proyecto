<?php
session_start();
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] != "cliente") {
        header('Location:index.php');
    }
}
else {
    header('Location:index.php');
}

// conexion
			
include 'conn.php';	
			
			
// variables conexion
			
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			
// comprobar conexion
			
if (!$conn) {
				
	die("Connection failed: " . mysqli_connect_error());
			
}


    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM usuariosparcelas WHERE IdUsuario = '$id'");

//    $result = mysqli_query($conn, 'SELECT * FROM parcelas WHERE IdUsuarioParcela = "$id"');
//    Array que guarda el resultado del query
//    $row = mysqli_fetch_assoc($result);
    
    $parcelas = mysqli_fetch_assoc($result);
    

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilos.css">

    <!------------------------------------------------------------------------------------->
    <link href="./css/jquery.multiselect.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery.min.js"></script>

    <!---------------------------------------------------------------------------------------->

    <title>Área personal</title>


</head>

<body>


    <header>
        <img src="./imgs/logo_u15.svg" alt="Logo Empresarial">
        <h4>Bienvenido
            <?php echo $_SESSION['nombre'] ?>
        </h4>
        <p class="Boton_sesion" onclick=""><a href="./index.php">Cerrar sesión</a></p>

    </header>

    <div class="soporte_header">
        <h6>.</h6>
    </div>

    <div id="listaParcelas">
        <div class="chekbox">
            <input type="checkbox"  id="selParcela-1" onchange="seleccionarParcela(this.checked, this.id, vertices1, punto1, color1)">
            <label>Parcela 1</label>
        </div>
        <div class="chekbox">
            <input type="checkbox"  id="selParcela-2" onchange="seleccionarParcela(this.checked, this.id, vertices2, punto2, color2)">
            <label>Parcela 2</label>
        </div>
    </div>





    <!-- TODO: Aquí mostrar parcela en mapa -->
    <div id="map" class="map">
        <script>
            var map;

            function initMap() {

                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 38.9965838,
                        lng: -0.1662285
                    },
                    zoom: 16,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                });
            }
			

        </script>
    </div>

    <script src="js/parcelas.js"></script>
    <script>
        //getParcelas(1);

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>

</body>

</html>
