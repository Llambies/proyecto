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
    $v1 = $_POST['variable1'];
    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE IdUsuario='$v1'");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!------------------------------------------------------------------------------------->
    <link href="./css/jquery.multiselect.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery.min.js"></script>
    

    <!---------------------------------------------------------------------------------------->

    <title>Área personal</title>


</head>
<body >


    <header>
        <img src="./imgs/logo_u15.svg" alt="Logo Empresarial">
        
            
        
        <button class="btn btn-info" onclick="window.location.href = './zonaadmin.php';">Volver</button>

    </header>


    <div class="card">
  <div class="card-header"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellidos'] ?></div> 
  <div class="card-body">
    <h5 class="card-title">Datos de usuario</h5>
    <p class="card-text">
        <form action="editar.php" method="post">
            <input type="hidden" name="variable1" <?php echo 'value="'.$v1.'"';  ?> />
        <div class="form-row" >
               <div class="form-group col-md-6">
                 <label for="usuario">Usuario</label>
                 <input type="text" class="form-control"  
                 <?php 

                 while ($consulta=mysqli_fetch_array($result)) {
                    $usuario1=$consulta['Usuario'];
                    $nombre1=$consulta['Nombre'];
                    $email1=$consulta['Email'];
                    $apellidos1=$consulta['Apellidos'];


                 echo 'value="'.$usuario1.'"';  
                 }
                 ?> 
                 name="usuario" placeholder="Usuario">
               </div>
             </div>
             <div class="form-group">
               <label for="email">E-Mail</label>
               <input type="email" class="form-control col-md-8"
               <?php 
                 

                 echo 'value="'.$email1.'"';  
                 
                 ?> 
                  name="email" placeholder="email@email.com">
             </div>
              <div class="form-row" >
               <div class="form-group col-md-4">
                 <label for="nombre">Nombre</label>
                 <input type="text" class="form-control"
                 <?php 
                 

                 echo 'value="'.$nombre1.'"';  
                 
                 ?>
                  name="nombre" placeholder="Nombre">
               </div>
               <div class="form-group col-md-8">
                 <label for="apellidos">Apellidos</label>
                 <input type="text" class="form-control"
                 <?php 
                 

                 echo 'value="'.$apellidos1.'"';  
               
                 ?> name="apellidos">
               </div>
             </div>

             <button type="submit" class="btn btn-dark" name="btn1">Actualizar datos</button>
             </form>
             <?php 

         
         if (isset($_POST["btn1"])) {
            
             $suario=$_POST['usuario'];
             $mail=$_POST['email'];
             $ombre=$_POST['nombre'];
             $pellidos=$_POST['apellidos'];
             

            

            

            $aux = mysqli_query($conn, "
                UPDATE usuarios
                SET Usuario = '$suario', 
                Nombre= '$ombre',
                Apellidos= '$pellidos', 
                Email= '$mail'
                WHERE IdUsuario = '$v1';");
             
                    
         }
         ?>
           </p>
  </div>
</div>


       <div class="card">
  <h5 class="card-header">Parcelas</h5>
  <div class="card-body">
    <?php 

    
    //echo $v1;
            $result = mysqli_query($conn, "SELECT * FROM usuariosparcelas WHERE IdUsuario = '$v1'");
            while ($consulta=mysqli_fetch_array($result)) {
                $parce=$consulta['IdParcela'];
                $aux = mysqli_query($conn, "SELECT * FROM parcelas WHERE IdParcela = '$parce'");
                while ($consulta2=mysqli_fetch_array($aux)) {
                   $nombre=$consulta2['Nombre'];
                   $color=$consulta2['ColorParcela'];
                   echo '<h5 class="card-title" style="border-right:'.$color.' 20px solid;">'.$nombre.'</h5>';

               }
           }



     ?>

  
 
    
    
  </div>
</div>



</body>
</html>
