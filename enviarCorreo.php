<?php

$destinatario = $_POST['correo']; 
$asunto = "Recuperación de contraseña - GTI Equipo 7"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Prueba de correo</title> 
   <style>
body{
    font-family: Arial, Helvetica, sans-serif;
}
.contenedor{

    width: 80%;
    color: rgb(85, 85, 85)
}
.contenedor h1{
    color: rgb(58, 58, 58);
    font-size: 18pt;
}

.contenedor p{
    font-size: 14pt;
}
.contenedor div{
    width: 100%;
}
.contenedor div form input{
    font-size: 12pt;

    display: block;
    width: 190px;
    text-align: center;
    color: white;
    text-decoration: none;
    background-color: #4DAA50;
    border-radius: 3px;
    box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
    margin-left: auto;
    margin-right: auto;
    padding: 1rem 0;
    border:none;
}
.contenedor a:active{
    box-shadow: none;
}
</style>
</head> 
<body>
<div class="contenedor">
    <h1>Hola</h1> 
    <p>Estás Recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.</p>
    <br>
    <div>
        <form action="http://localhost/cambiarContraseña.php" method="post">
            <input type="hidden" name="correo" value="'. $destinatario .'">
            <input type="submit" value="Recuperar contraseña">
        </form>
    </div>
    <br>
    <p>Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.</p>
    <p>Saludos, Equipo 7</p>
    </div>  
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset='UTF-8'\r\n"; 

//dirección del remitente 
$headers .= "From: Equipo 7 GTI <Administrador@gtiteam7.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: marcalandete@gmail.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: *@*.com\r\n"; 

//direcciones que recibián copia 
// $headers .= "Cc: *@*.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

if(mail($destinatario,$asunto,$cuerpo,$headers)){
    header("Location: ./correoEnviado.html"); 
}
?>