<?php

$temperatura;
$humedad;
$salinidad;
$presion;
$iluminacion;
$aceleracion;
$latitud;
$longitud;

for($i = 0; $i < 300; $i++){
$temperatura = rand (0, 400)/10;
$humedad = rand (0, 100);
$salinidad = rand (0, 100);
$presion = rand (90000, 110000)/100;
$iluminacion = rand (0, 100);
//$aceleracion = rand (0, 1);

$latitud = 0.12129388235;
$longitud = 0.8523859137491;

$sql = "INSERT INTO `mediciones` SET ($temperatura, $humedad, $salinidad, $presion, $iluminacion,$latitud, $longitud)";

echo $sql.'<br>';
}
    
