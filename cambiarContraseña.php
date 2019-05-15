<?php
    session_start();

if (isset($_POST['correo'])) {
    $_SESSION['correo']=$_POST['correo'];
}elseif(isset($_SESSION['correo'])){

}else {
    header('Location: ./index.php');

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./imgs/logo_u15.svg" type="image/x-icon">
    <title>Cambio de contraseña</title>
    <link rel="stylesheet" href="./css/cambiarPass.css">
  
</head>
<body>
    <div class="contenedor">
        <h1>Cambio de contraseña</h1>
        <p>Elige una contraseña segura y no la utilices en otras cuentas.</p>
        <form action="./updatePass.php" method="post">
            <input type="hidden" name="origen" value="<?php echo $_SESSION['correo']; ?>" required>
            <div class="inputConLogo">
                <!--  Esta es la segunda-->
                <img src="./imgs/lock.svg" alt="Logo Candado" height="30px" width="30px">
                <input type="password" name="password" id="" placeholder="Contraseña nueva" class="inputDato" required>
            </div>
            <p class="negrita">Seguridad de la contraseña:</p>
            <p>Usa al menos 8 caracteres. No uses una contraseña de otro sitio ni algo demasiado obvio, como el nombre
                de tu mascota.</p>
            <div class="inputConLogo">
                <!--  Esta es la segunda-->
                <img src="./imgs/lock.svg" alt="Logo Candado" height="30px" width="30px">
                <input type="password" name="password2" id="" placeholder="Confirma la contraseña nueva"
                    class="inputDato" required>
            </div>
            <?php 
                        if (isset($_GET['passIncorrecto'])) {
                        $parametro=$_GET['passIncorrecto'];
                        if ($parametro == true) {
                    

                            echo '  <div style="margin-top:-10px;font-weight: bold; margin-left: 7px; margin-bottom: -15px;">
                                        <p style="color:rgb(189, 6, 6)">Las contraseñas no coinciden</p>
                                    </div>';}
                        }
                    
                        ?>
            <div id="botonesFormulario">
                <!--  Esta es la tercera-->
                <input type="submit" name="" id="botonEnviar" class="botonEnviar" value="Cambiar la contraseña">
            </div>
        </form>
        
    </div>
</body>
</html>
