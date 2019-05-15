<?php
$destinatario = "marcalandete@gmail.com"
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
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
            <form action="http://localhost/cambiarContraseña.html" method="post">
                <input type="hidden" name="correo" value="<?php echo $destinatario?>">
                <input type="submit" value="Recuperar contraseña">
            </form>
        </div>
        <br>
        <p>Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.</p>
        <p>Saludos, Equipo 7</p>
    </div>  
</body>
</html>