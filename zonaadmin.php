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
?><?php 

         
         if (isset($_POST["btn3"])) {
            
             $emailE=$_POST['emailE'];
             $telefono=$_POST['telefono'];
             $nombreC=$_POST['nombreC'];
             $direccion=$_POST['direccion'];
             $NIF=$_POST['NIF'];
             

                $aux = mysqli_query($conn, "INSERT INTO `clientes` (`nombre`, `telefono`, `email`, `NIF`,`direccion`)
                  VALUES ('$nombreC','$telefono','$emailE','$NIF','$direccion')"); }?>

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
  
   
</nav>


<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-lista" role="tabpanel" aria-labelledby="nav-lista-tab">
  <form action="zonaadmin.php" method="post" class="selectorcliente">
         
           
        
             
            <?php 
                //$_GET["nombre"];
            
            
       
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
                $result = mysqli_query($conn, "SELECT * FROM clientes");
                while ($consulta=mysqli_fetch_array($result)) {
                    $telefono=$consulta['telefono'];
                    $nombre=$consulta['nombre'];
                    $direccion=$consulta['direccion'];
                    $NIF=$consulta['NIF'];
                    $email=$consulta['email'];
                    
                    echo    "<script>var ww".$NIF."= 0</script>";
                  
                    echo '  <tr >
                              <td scope="row">'.$NIF.'</td>
                              <td scope="row">'.$nombre.'</td>
                              <td scope="row">'.$telefono.'</td>';
                    echo     '<td scope="row" id="a'.$NIF.'">
                              <form action="zonaadminusuarios.php" method="post">
                              <input type="hidden" name="variable1" value="'.$NIF.'" />
                              <button type="submit" class="btn btn-outline-info">+</button>
                              </form>
                              </td>';
                   
                    echo   "</tr>";
                    

                    
                    
                    



                }
            echo "</table>";
            
                
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
               <input required="true" type="text" class="form-control" name="telefono" placeholder="666666666">
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
               <input required="true" type="text" class="form-control col-md-8" name="NIF" placeholder="12345678A">
             </div>
             
            <center><button type="submit" class="btn btn-info" name="btn3">Registrar cliente</button></center>
        
        

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