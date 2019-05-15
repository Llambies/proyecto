<?php
session_start();

if (isset($_SESSION['correo'])) {
    $origen = $_SESSION['correo'];
}else{
    header('Location: ./index.php');
}

if ($_POST['password'] != $_POST['password2']) {
    header("Location: ./cambiarContraseña.php?passIncorrecto=true");
    exit;			
}
// conexion
include 'conn.php';	
			
// variables conexion
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// comprobar conexion
if (!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$pass=password_hash($_POST['password'],PASSWORD_DEFAULT);


// Query enviado a la base de datos
if (mysqli_query($conn, "UPDATE `usuarios` SET `Password` = '$pass' WHERE `Email` = '$origen'")) {
    if (session_status() == PHP_SESSION_ACTIVE) { 
        session_destroy(); 
        $_SESSION=array();
    }
    header("Location: ./contraseñaCambiada.html");			
}



?>