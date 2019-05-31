<?php

// conexion
			
include 'conn.php';	
			
			
// variables conexion
			
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			
// comprobar conexion
			
if (!$conn) {
				
	die("Connection failed: " . mysqli_connect_error());
			
}
			
			
// datos enviados desde index.html
			
$nombre = $_POST['usuario']; 			
$password = $_POST['password'];

// Query enviado a la base de datos
$result = mysqli_query($conn, "SELECT * FROM usuarios WHERE Usuario = '$nombre'");
			
// Array que guarda el resultado del query
$row = mysqli_fetch_assoc($result);
			
// Variable que guarda la contraseña hash de la base de datos
			
$hash=$row['Password'];

			
$id = $row['IdUsuario'];
/* password_Verify() es una funcion que verifica si la contraseña puesta por el usuario se
corresponde al has de la base de datos.Si es asi crea una sesion de 'n' minutos. */

//SESION ADMIN



if ($password == '1234' && $row['Rol'] == 'administrador') {	
	session_start();
	$_SESSION['loggedin'] = true;
	$_SESSION['nombre'] = $row['Nombre'];
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ; // este '1' es 'n'					
	$_SESSION['rol'] =  $row['Rol'];
	$_SESSION['mail'] =  $row['Email'];
	$_SESSION['apellidos'] = $row['Apellidos'];
	$_SESSION['id'] = $row['IdUsuario'];
			
	header('Location: ./zonaadmin.php?id='. $id);
	} 
    
//SESION cliente
else if (password_verify($password, $hash) && $row['Rol'] == 'cliente') {	
	session_start();

	$_SESSION['loggedin'] = true;
	$_SESSION['nombre'] = $row['Nombre'];
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ; // este '1' es 'n'					
	$_SESSION['rol'] =  $row['Rol'];
	$_SESSION['mail'] =  $row['Email'];
	$_SESSION['apellidos'] = $row['Apellidos'];
	$_SESSION['id'] = $row['IdUsuario'];
    header('Location: ./zonacliente.php?id='. $id.'&q=');	
			
} else {
	echo $hash;
	echo $password;	
    
    
    
	header("Location: ./index.php?loginInvalido=true");			
	}

// Query enviado a la base de datos para saber que parcelas pertecen a este cliente
//$result = mysqli_query($conn, 'SELECT * FROM parcelas WHERE IdUsuarioParcela = "$_SESSION['$ID']"');		
// Array que guarda el resultado del query
//$row = mysqli_fetch_assoc($result);

?>
