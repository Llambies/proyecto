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

    
//    Array que guarda el resultado del query
    
    
   
    

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
 <link rel="stylesheet" href="./css/pestannas.css">
    <!------------------------------------------------------------------------------------->
    <link href="./css/jquery.multiselect.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery.min.js"></script>
    <script src="js/pestannas.js"></script>

    <!---------------------------------------------------------------------------------------->

    <title>Área personal</title>


</head>
<body >


    <header>
        <img src="./imgs/logo_u15.svg" alt="Logo Empresarial">
       
        <a href="./index.php"> <button class="cerrar">Cerrar sesión</button></a>

    </header>
<div class="contingut">
    
       
   <div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <div id="listaParcelas">
           <p>
             
               <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded=    "false" aria-controls="collapseExample">
                 Button with data-target
               </button>
             </p>
         
         <div class="collapse" id="collapseExample">
        <?php
             while ($consulta=mysqli_fetch_array($result)) {


                $parce=$consulta['IdParcela'];
                
                

                $aux = mysqli_query($conn, "SELECT * FROM parcelas WHERE IdParcela = '$parce'");

                 while ($consulta2=mysqli_fetch_array($aux)) {
                    
                    $nombre=$consulta2['Nombre'];
                    $color=$consulta2['ColorParcela'];

                    $nodos=[];
                    $i1=0;

                    $aux2 = mysqli_query($conn, "SELECT * FROM nodos WHERE IdParcela = '$parce'");
                    while ($consulta3=mysqli_fetch_array($aux2)) {
                        $nodos[$i1]=$consulta3['Latitud'];
                        $i1++;
                        $nodos[$i1]=$consulta3['Longitud'];
                        $i1++;
                        $idNodo=$consulta3['IdNodo'];
                    }
                    

                    $i2=0;
                    $vertices=[];

                    $aux3 = mysqli_query($conn, "SELECT * FROM vertices WHERE IdParcela ='$parce'");
                    while ($consulta4=mysqli_fetch_array($aux3)) {
                        $vertices[$i2]=$consulta4['Latitud'];
                        $i2++;
                        $vertices[$i2]=$consulta4['Longitud'];
                        $i2++;

                    }

                    echo    "<script>var color".$parce."=";
                    echo    '"'.$color.'"';
                    echo    ';var parcelaid'.$parce.'="parcela'.$parce.'"';
                    echo    "; var nodo".$parce."=";
                    echo    json_encode($nodos);
                    echo    "; var caja".$parce."=";
                    echo    '"caja'.$parce.'"';
                    echo    ";var vertex".$parce."=";
                    echo    json_encode($vertices);
                    echo    ";</script>";
                    echo    '<div id="caja'.$parce.'" class="checkparcela" for="check'.$parce.'" style="border-right:'.$color.' 20px solid;"><input id="check'.$parce.'" class="checkbox" type="checkbox" onchange="seleccionarParcela(this.checked,'.$parce.',vertex'.$parce.',nodo'.$parce.',color'.$parce.',parcelaid'.$parce.',datos'.$parce.',caja'.$parce.','.$idNodo.')"><label class="nombreparcela" for="check'.$parce.'">'.$nombre.'</label></div><br>';
                    echo ' <style type="text/css">:root {color'.$parce.':'.$color.';}</style>';
                 }
             }
        ?>
    </div>
    </div>
</div>
    <div class="col-md-10">
   
    
<div class="card">
<ul class="nav nav-tabs">
       
        <li class="nav-item">
  <a class="nav-link active" onclick="openCity(event, 'London')">Mapa</a>
    </li>
    <li class="nav-item">
  <a class="nav-link" onclick="openCity(event, 'Paris')">Datos</a>
    </li>

</ul>
<div id="London" class="tabcontent">
    <div id="map" class="map">
        <script>
            var map;
            

            function initMap() {

                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 38.9965838,
                        lng: -0.1662285
                    },
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                });
            }
            

        </script>
        </div>
</div>

     

<div id="Paris" class="tabcontent">
  


 <?php
            $result = mysqli_query($conn, "SELECT * FROM usuariosparcelas WHERE IdUsuario = '$id'");
            while ($consulta=mysqli_fetch_array($result)) {


                $parce=$consulta['IdParcela'];
               

                $aux = mysqli_query($conn, "SELECT * FROM parcelas WHERE IdParcela = '$parce'");

                 while ($consulta2=mysqli_fetch_array($aux)) {
                    
                    $nombre=$consulta2['Nombre'];
                    $color=$consulta2['ColorParcela'];
                    $aux2 = mysqli_query($conn, "SELECT * FROM nodos WHERE IdParcela = '$parce'");
                    while ($consulta3=mysqli_fetch_array($aux2)) {
                    $nodo=$consulta3['IdNodo'];
                    $nodoname=$consulta3['Nombre'];


                        $aux3 = mysqli_query($conn, "SELECT * FROM datos WHERE IdNodo = '$nodo'");
                        while ($consulta4=mysqli_fetch_array($aux3)) {
                            $humedad=$consulta4['Agua'];
                            $luz=$consulta4['Luz'];
                            $sal=$consulta4['Sal'];
                            $temperatura=$consulta4['Sol'];
                            $presion=$consulta4['Presion'];
                            $fecha=$consulta4['Fecha'];

                            
                           
                        }
                    
                    echo'<div id="datos" class="datos">
            <div class="parcela" id="parcela'.$parce.'" style="border-right:'.$color.' 20px solid;">
                <p class="nombre_parcela" id="nombre">'.$nombre.'</p>
                <div class="nodo">
                    <p class="nombre_nodo">Nodo '.$nodo.'</p>
                    <div class="medidas">
                        <div id="temperatura" class="medida">
                            <p class="num" id="medida-temperarura">'.$temperatura.'º</p>
                            
                            <p class="descript">Temperatura</p>
                        </div>
                        <div id="humedad" class="medida">
                            <p class="num" id="medida-humedad">'.$humedad.'%</p>
                            
                            <p class="descript">Humedad</p>
                        </div>
                        <div id="luminosidad" class="medida">
                            <p class="num" id="medida-luz">'.$luz.'%</p>
                            
                            <p class="descript">Luz</p>
                        </div>
                        <div id="salinidad" class="medida">
                            <p class="num" id="medida-sal">'.$sal.'%</p>
                            
                            <p class="descript">Saliidad</p>
                        </div>
                        <div id="presion" class="medida">
                            <p class="num" id="medida-presion">'.$presion.'mb</p>
                            
                            <p class="descript">Presión</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>';


        echo "<script>";
        echo "var datos".$parce."=[";
        echo $temperatura.",";
        echo $humedad.",";
        echo $luz.",";
        echo $sal.",";
        echo $presion.",";
        echo '"'.$fecha.'",';
        echo '"'.$nodoname.'"];';
        echo "</script>";

        
                  
                    }

                 }
              
             }

        ?>

</div>

  </div>            
   
</div>
  </div>
</div>

    

    <script src="js/parcelas.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
</div>
</body>

</html>
