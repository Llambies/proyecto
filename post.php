<?php
// conectar a servidor
$conectar = mysqli_connect('localhost', 'root', '', 'proyecto');
// verificar conexion a servidor
if (!$conectar){
    echo "No se pudo conectar con el servidor";
}else{
    // seleccionar bbdd
    $base = mysqli_select_db($conectar, 'proyecto');
    // verificar si se encontro la bbdd
    if (!$base){
        echo "No se encontró la base de datos";
    }
}

// recuperar variables del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// sentencia sql
$sql = "INSERT INTO datosformulario VALUES ('$nombre', 
                                  '$apellidos', 
                                  '$email',
                                  '$telefono',
                                  '$mensaje')";

// ejecutar sentencia sql
$ejecutar = mysqli_query($conectar, $sql);

// verificar ejecucion

if (!$ejecutar){
    echo 'Hubo algun error';
}else{
    echo "Mensaje enviado correctamente<br><a href='paginaFormulario.html'>Volver</a>";
}

?>








