<!DOCTYPE html>
<html lang="en">




<head>
    <!------------------------------------------------------->
    <!----- Meta-información de la página ------------------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Margarita S.L</title>

    <!-- TODO: Añadir metas aquí para el indexado -->

    <!------------------------------------------------------->
    <!-------------- Links ---------------------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/modalLogin.css">

    <!-- TODO: Añadir o juntar modal y demás -->

    <!------------------------------------------------------->
</head>




<body>
   


    <!------------------------------------------------------->
    <!------------- Header ---------------------------------->
    <header>
        <img src="./imgs/logo_u15.svg" alt="Logo Empresarial">

        <button class="inicio" onclick="iniciarModal()">Iniciar sesión</button>

    </header>

    <div class="contenedorInicial">
        <!------------------------------------------------------->
        <!----------- principal -------------------------->

        <div class="principal">

            <div class="letras">
                    <center>Controla tus campos a distancia</center>
            </div> <a href="#carac">
            <button class="btn btn-info">Mas información</button>
            </a>
                    
    
        </div>


        <!------------------------------------------------------->
        <!----------- Características --------------------------->
        <section class="carac" id="carac">

        <div class="card mb-3" style="max-width: 800px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="./imgs/paso1%20adquirir.png" class="card-img" alt="Adquirir producto">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                
                <p class="card-text">Instala el producto</p>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-3" style="max-width: 800px;">
          <div class="row no-gutters">
            
            <div class="col-md-4">
              <img src="./imgs/paso2%20ubicar.png" class="card-img" alt="Adquirir producto">
            </div> 
            <div class="col-md-8">
              <div class="card-body">
                
                <p class="card-text">Ubica tus huertos</p>
              </div>
            </div> 
          </div>
        </div>
         <div class="card mb-3" style="max-width: 800px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="./imgs/paso3%20recibir.png" class="card-img" alt="Adquirir producto">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                
                <p class="card-text">Analiza las medidas</p>
              </div>
            </div>
          </div>
        </div>

        </section>
        <div class="principal2">
        <div class="card" style="background: url(../imgs/wifi.gif);">
          <div class="card-body">
            <p class="card-text">Gracias a nuestra sofisticada aplicación web podrás de ver la informacion directamente de los sensores a tu móvil.</p>
            
          </div>
        </div>
    </div>


      
            
                <a class="boton-contacto" href="./paginaFormulario.html">
                    <center><button class="btn btn-info">Contactanos</button></center>
                </a>
          
     



        <!------------------------------------------------------->
        <!----------- Parte Marc Alandete ----------------------->


        <section id="fondoModal">
            <div class="contenidoModal" id="contenidoModal">
                <p class="cerrarModal" onclick="ocultarModal()"><i class="fas fa-times"></i></p>
                <img src="./imgs/logo_u15.svg" alt="Logo empresarial">





                <form action="./comprobar-login.php" class="" method="POST">
                    <!--Formulario dividido en filas-->
                    <div class="inputConLogo">
                        <!--  Esta es la primera-->
                        <img src="./imgs/user.svg" alt="Logo Usuario" height="30px" width="30px">
                        <input type="text" name="usuario" placeholder="Usuario" class="inputDato" required>
                    </div>

                    <script src="./js/modal.js"></script>

                    <?php

                        if (isset($_GET['loginInvalido'])) {
                        $parametro=$_GET['loginInvalido'];
                        if ($parametro == true) {
                    

                            echo '  <div style="margin-top:-10px;font-weight: bold; margin-left: 7px; margin-bottom: -15px;">
                                        <p style="color:rgb(189, 6, 6)">Usuario o contraseña inválidos</p>
                                    </div>';}
                        }
                    ?>
                    <script>
                        <?php
                    if (isset($_GET['loginInvalido'])) {
                        $parametro=$_GET['loginInvalido'];
                        if ($parametro == true) {
                            
                        
                            echo 'iniciarModal();';
                        unset($_GET['loginInvalido']);
                        }
                    }
                        
                    ?>
    </script>

                    <div class="inputConLogo">
                        <!--  Esta es la segunda-->
                        <img src="./imgs/lock.svg" alt="Logo Usuario" height="30px" width="30px">
                        <input type="password" name="password" id="" placeholder="Contraseña" class="inputDato" required>
                    </div>
                    <div id="botonesFormulario">
                        <!--  Esta es la tercera-->
                        <input type="submit" name="" id="botonEnviar" class="botonEnviar">
                    </div>
                </form>
                <hr>
                <div class="contacto">
                    <p style="color:blue" onclick="recuperarPass()"><a>Recuperar Contraseña</a></p>
                    <p><a>Ayuda</a></p>
                </div>

            </div>
            <div class="recuperarPass" id="recuperarPass">

                <span class="cerrarModal" id="botonCancelar" onclick="ocultarRecuperar()"><i class="fas fa-times"></i></span>
                <h3>Recuperar contraseña</h3>
                <p>Introduzca la dirección del correo electrónico asociado a su cuenta.</p>
                <form action="./enviarCorreo.php" class="" method="POST">
                    <!--Formulario dividido en filas-->
                    <div class="inputConLogo">
                        <!--  Esta es la primera-->
                        <img src="./imgs/close-envelope.svg" alt="Logo Usuario" height="30px" width="30px">
                        <input type="email" name="correo" placeholder="Correo Electrónico" class="inputDato" required>
						
                    </div>
					<input type="submit" class="botonEnviar">


                </form> 
            </div>
        </section>

        <!-- Parte Marc Alandete - FIN -->





    </div>


  

    <!------------------------------------------------------->
</body>


<!--- TODO: añadir 'x' al modal login -->
<!--- TODO: resetear mensaje error login -->
<!--- TODO: meter paja en la landing -->
<!--- TODO: Ver más -->





</html>
