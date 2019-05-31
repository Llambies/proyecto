<?php
    session_start();
    
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] != "administrador") {
            header('Location:index.php');
        }
    }
    else {
        header('Location:index.php');
    }
    include 'conn.php'; 
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM usuarios");
    $NIF = $_POST['variable1'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href="./css/admin.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Fira+Sans');
    </style>
    <title>Área Administrador</title>
    

</head>
<body >
     
    <header>
        <img src="./imgs/logo_u15.svg" alt="Logo Empresarial">
        <button class="btn btn-success"  onclick="window.location.href = './zonaadmin.php';">Atras</button>

    </header>

       <div class="cajagrande">




        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
       
        
  <a class="nav-item nav-link active" id="nav-lista-tab" data-toggle="tab" href="#nav-lista" role="tab" aria-controls="nav-lista" aria-selected="true">Listas</a>
  <a class="nav-item nav-link" id="nav-añadirU-tab" data-toggle="tab" href="#nav-añadirU" role="tab" aria-controls="nav-añadirU" aria-selected="false">Añadir usuario</a>
  
   
      </nav>


<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-lista" role="tabpanel" aria-labelledby="nav-lista-tab">
  <form action="zonaadminusuarios.php" method="post" class="selectorcliente">
            <?php 
                //$_GET["nombre"];

    
               
                $result = mysqli_query($conn, "SELECT * FROM clientes WHERE NIF='$NIF'");
                while ($consulta=mysqli_fetch_array($result)) {
                    $telefono=$consulta['telefono'];
                    $nombre=$consulta['nombre'];
                    $direccion=$consulta['direccion'];
                    $email=$consulta['email'];
                    echo '<div class="card border-info">
                          <div class="card-body text-info">
                            <h5 class="card-title">'.$nombre.'</h5>
                            <p class="card-text">NIF:'.$NIF.'<br>Teléfono: '.$telefono.' <br>Dirección: '.$direccion.'<br>E-Mail: '.$email.'</p>
                          </div>
                        </div>' ;
                }
                echo '</form>
                           <table class="table table-striped" >
                                   <thead class="thead-light">
                                     <tr>
                                       <th scope="col">Id</th>
                                       <th scope="col">Usuario</th>
                                       <th scope="col">E-Mail</th>
                                       <th scope="col">+Info</th>
                                       
                                     </tr>
                                   </thead>';
                $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE NIF='$NIF'");
                while ($consulta=mysqli_fetch_array($result)) {
                    $usuario=$consulta['IdUsuario'];
                    $nombre=$consulta['Nombre'];
                    $apellido=$consulta['Apellidos'];
                    $nick=$consulta['Usuario'];
                    $email=$consulta['Email'];
                    
                    echo    "<script>var ww".$usuario."= 0</script>";
                  
                    echo '  <tr >
                              <td scope="row">'.$usuario.'</td>
                              <td scope="row">'.$nick.'</td>
                              <td scope="row">'.$email.'</td>';
                    echo     '<td scope="row" id="a'.$usuario.'">
                              <form action="editar.php" method="post">
                              <input type="hidden" name="variable1" value="'.$usuario.'" />
                              <button type="submit" class="btn btn-outline-info">+</button>
                              </form>
                              </td>';
                   
                    echo   "</tr>";
                }
            echo "</table>";
             
            ?>

        
</div>
<div class="tab-pane fade" id="nav-añadirU" role="tabpanel" aria-labelledby="nav-añadirU-tab" >
  <form action="zonaadminusuarios.php" method="post" class="formulario">
          
            <div class="form-row" >
               <div class="form-group col-md-6">
                 <label for="usuario">Usuario</label>
                 <input type="text" class="form-control" name="usuario" placeholder="Usuario">
               </div>
               <div class="form-group col-md-6">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Contraseña">
               </div>
             </div>
             <div class="form-group">
               <label for="email">E-Mail</label>
               <input type="email" class="form-control col-md-8" name="email" placeholder="email@email.com">
             </div>
              <div class="form-row" >
               <div class="form-group col-md-4">
                 <label for="nombre">Nombre</label>
                 <input type="text" class="form-control" name="nombre" placeholder="Nombre">
               </div>
               <div class="form-group col-md-8">
                 <label for="apellidos">Apellidos</label>
                 <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
               </div>
             </div>
             <?php echo '<input type="hidden" name="variable1" value="'.$usuario.'" />' ?>
            <center><button type="submit" class="btn btn-info" name="btn1">Registrar usuario</button></center>
        </form>
        <?php 

         
         if (isset($_POST["btn1"])) {
            
             $usuario=$_POST['usuario'];
             $contrasenya=password_hash($_POST['password'],PASSWORD_DEFAULT);
             $email=$_POST['email'];
             $nombre=$_POST['nombre'];
             $apellidos=$_POST['apellidos'];
             
            

                $aux = mysqli_query($conn, "INSERT INTO `usuarios` ( `NIF`, `Nombre`, `Apellidos`, `Usuario`, `Password`, `Email`, `Rol`)
                VALUES ( '$NIF','$nombre','$apellidos','$usuario','$contrasenya','$email','cliente')");}?>
</div>
</div>
</div>       
</div> 
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/pestannas.js"></script>
    
</body>
</html>