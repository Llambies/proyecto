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
        <button class="btn btn-success"  onclick="window.location.href = './index.php';">Cerrar sesión</button>

    </header>

       <div class="cajagrande">




        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
       
        
  <a class="nav-item nav-link active" id="nav-lista-tab" data-toggle="tab" href="#nav-lista" role="tab" aria-controls="nav-lista" aria-selected="true">Listas</a>
  <a class="nav-item nav-link" id="nav-añadirC-tab" data-toggle="tab" href="#nav-añadirC" role="tab" aria-controls="nav-añadirC" aria-selected="false">Añadir Cliente</a>
  <a class="nav-item nav-link" id="nav-añadirU-tab" data-toggle="tab" href="#nav-añadirU" role="tab" aria-controls="nav-añadirU" aria-selected="false">Añadir usuario</a>
  
   
</nav>


<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-lista" role="tabpanel" aria-labelledby="nav-lista-tab">
  <form action="zonaadmin.php" method="post" class="selectorcliente">
            <table class="table">
                <div class="form-row">
                    <div class="form-group col-2" style="margin: auto 0;">
                    <label class="texto">Cliente</label>
                    </div>
                    <div class="form-group col-7">
                        <select name="cliente" class="form-control">
                         <option selected>selecciona un cliente...</option>
                   <?php 

                        $result = mysqli_query($conn, "SELECT * FROM clientes");
                        while ($consulta=mysqli_fetch_array($result)) {
                            $client=$consulta['nombre'];
                            $NIF=$consulta['NIF'];
                           
                            echo '<option value='.$NIF.'>'.$client.'</option>';
                        }

                    ?>
                         </select>

                    </div>
               <div class="form-group col-2">
               <button type="submit" class="btn btn-info" name="btn2">Buscar</button>
               </div>
               </div>
           </table>
           
        
             
            <?php 
                //$_GET["nombre"];
            
            
        if (isset($_POST["btn2"])) {

                $NIF=$_POST['cliente'];
                $result = mysqli_query($conn, "SELECT * FROM clientes WHERE NIF='$NIF'");
                while ($consulta=mysqli_fetch_array($result)) {
                    
                    $nombre=$consulta['nombre'];
                    $telefono=$consulta['telefono'];
                    $direccion=$consulta['direccion'];
                    echo '<div class="card border-info">
                          <div class="card-body text-info">
                            <h5 class="card-title">'.$nombre.'</h5>
                            <p class="card-text">Teléfono: '.$telefono.' <br>Dirección: '.$direccion.'</p>
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
            }
                
            ?>

        
</div>


<div class="tab-pane fade" id="nav-añadirC" role="tabpanel" aria-labelledby="nav-añadirC-tab" >
  <form action="zonaadmin.php" method="post" class="formulario">
          
            
             <div class="form-group col-md-6">
               <label for="nombreC">Nombre del cliente</label>
               <input type="text" class="form-control" name="nombreC" placeholder="Nombre">
             </div>
             <div class="form-group col-md-6">
               <label for="telefono">Teléfono de contacto</label>
               <input type="text" class="form-control" name="telefono" placeholder="666666666">
             </div>
             <div class="form-group col-md-6">
               <label for="direccion">Direccion</label>
               <input type="text" class="form-control col-md-8" name="direccion" placeholder="c/ Ejemplo nº1">
             </div>
             <div class="form-group col-md-6">
               <label for="emailE">Email</label>
               <input type="email" class="form-control col-md-8" name="emailE" placeholder="email@email.com">
             </div>
             <div class="form-group col-md-6">
               <label for="NIF">NIF</label>
               <input type="text" class="form-control col-md-8" name="NIF" placeholder="12345678A">
             </div>
             
            <center><button type="submit" class="btn btn-info" name="btn3">Registrar cliente</button></center>
        
        <?php 

         
         if (isset($_POST["btn3"])) {
            
             $emailE=$_POST['emailE'];
             $telefono=$_POST['telefono'];
             $nombreC=$_POST['nombreC'];
             $direccion=$_POST['direccion'];
             $NIF=$_POST['NIF'];
             

                $aux = mysqli_query($conn, "INSERT INTO `clientes` (`nombre`, `telefono`, `email`, `NIF`,`direccion`)
                  VALUES ('$nombreC','$telefono','$emailE','$NIF','$direccion')"); }?>

</div>




<div class="tab-pane fade" id="nav-añadirU" role="tabpanel" aria-labelledby="nav-añadirU-tab" >
  <form action="zonaadmin.php" method="post" class="formulario">
          
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
             <div class="form-row">
               <div class="form-group col-md-4">
                 <label for="rol">Rol</label>
                 <select name="rol" class="form-control">
                   <option selected value="cliente">Cliente</option>
                   <option value="administrador">Administrador</option>
                 </select>
               </div>
               
             
                    
                    <div class="form-group col-md-4">
                        <label for="cliente">Cliente</label>
                        <select name="cliente" class="form-control">
                         <option>selecciona un cliente...</option>
                   <?php 

                        $result = mysqli_query($conn, "SELECT * FROM clientes");
                        while ($consulta=mysqli_fetch_array($result)) {
                            $client=$consulta['nombre'];
                            $idClient=$consulta['idCliente'];
                           
                            echo '<option value='.$idClient.'>'.$client.'</option>';
                        }

                    ?>
                         </select>

                    </div>
               </div>

             
            <center><button type="submit" class="btn btn-info" name="btn1">Registrar usuario</button></center>
        </form>
        <?php 

         
         if (isset($_POST["btn1"])) {
            
             $usuario=$_POST['usuario'];
             $contrasenya=password_hash($_POST['password'],PASSWORD_DEFAULT);
             $email=$_POST['email'];
             $nombre=$_POST['nombre'];
             $apellidos=$_POST['apellidos'];
             $rol=$_POST['rol'];
             $idCliente=$_POST['cliente'];
             echo $nombre.$contrasenya.$email.$nombre.$apellidos.$rol.$idCliente;

                $aux = mysqli_query($conn, "INSERT INTO `usuarios` ( `idCliente`, `Nombre`, `Apellidos`, `Usuario`, `Password`, `Email`, `Rol`)
                VALUES ( '$idCliente','$nombre','$apellidos','$usuario','$contrasenya','$email','$rol')");}?>
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