<?php
    session_start();
?>

<!DOCTYPE HTML>
<head>
   <html lang = "es">
      <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="style.css">
      <script src="js/validation.js"></script>
      </head>
      <body>

         <header>
            <a href="index.html"><img class="logo" src = "./img/logo.png" alt = "Logo del cine"/></a>
            <section class="titu">
            <h1>Cines FAF</h1>
            </section>
            <section class="registro">
            <?php
                    require_once('classes/usuario.class.inc');
                    $usuario = new User();
                    echo('<p class="usuario">' .$_SESSION["nombre"]. '</p>');
               ?>
              
               <a href="datos.php">Cambiar datos</a>

               <a href="logout.php">Cerrar sesión</a>
            </section>
         </header>

         <nav class="buttons">
            <ul>
               <a href="index.php">
                  <li style="--i:white; --j:gray">
                     <section class="icons" ><i class="fa fa-home" style="font-size: 3.25em; color:black"></i></section>
                     <section class="titulo">Inicio</section>
                  </li>
               </a>

               <a href="estrenos.html">
                  <li style="--i:white; --j:gray">
                     <i class="material-icons" style="font-size: 2.5em; color:black">new_releases</i>
                     <section class="titulo">Estrenos</section>
                  </li>
               </a>

               <a href="cartelera.html">
                  <li style="--i:white; --j:gray">
                     <section class="icons" ><i class="fa fa-film" style="font-size: 2.5em; color:black"></i></section>
                     <section class="titulo">Cartelera</section>
                  </li>
               </a>

               <a href="horarios.html">
                  <li style="--i:white; --j:gray">
                     <section class="icons" ><i class="fa fa-clock-o" style="font-size: 2.5em; color:black"></i></section>
                     <section class="titulo">Horarios</section>
                  </li>
               </a>

               <a href="tarifas.html">
                  <li style="--i:white; --j:gray">
                     <section class="icons" ><i class="fa fa-money" style="font-size: 2.5em; color:black"></i></section>
                     <section class="titulo">Tarifas</section>
                  </li>
               </a>

               <a href="informacion.html">
                  <li style="--i:white; --j:gray">
                     <section class="icons" ><i class="fa fa-question-circle-o" style="font-size: 2.5em; color:black"></i></section>
                     <section class="titulo">Información</section>
                  </li>
               </a>
            </ul>
         </nav>
         
         
         <main>

         <h1>DATOS PERSONALES</h1>
            
            <section class="formulario">
           
               <?php
                    require_once('classes/usuario.class.inc');
                    
                    $usuario = new User();

                    $usuariodb = $usuario->obtenerUsuario($_SESSION['email']);

                    echo('
                            <label>Nombre: </label>'
                            .$usuariodb['nombre'].'<br>
                            
                            <label>Apellido: </label>'
                            .$usuariodb['apellido'].'<br>

                            <label>Correo Electrónico: </label>'
                            .$usuariodb['email'].'<br>
                    ')
               ?>
               

            <h1>CAMBIAR DATOS PERSONALES</h1>
            
            <section class="formulario">
            <form id="formModUser" name="formModUser" action="cambiar_datos.php" method="post" onsubmit="return validacionPass()">
               
               <input type="text" id="nombre" name="nombre" placeholder="Nuevo nombre"  maxlength="50"><br><br>
      
               
               <input type="text" id="apellido" name="apellido" placeholder="Nuevo apellido"  maxlength="50"><br><br>
      
               
               <input type="email" id="email" name="email" placeholder="Nuevo correo Electrónico"  maxlength="50"><br><br>
      
               
               <input type="password" id="passwd" name="passwd" placeholder="Nuevo contraseña" minlength="5" maxlength="20"><br><br>

               
               <input type="password" id="rep_passwd" name="rep_contraseña" placeholder="Repita contraseña" minlength="5" maxlength="20"><br><br>
      
               <input type="submit" value="Cambiar">
            </form>
         </main>
         </section> 

         <footer>
            <nav style="padding-left: 0%;" class="normal">
               <ul >
                  <a href="contacto.html">
                     <li style="--i:white; --j:gray">
                        <i class="material-icons" style="font-size: 2.5em; color:black">import_contacts</i>
                        <section class="titulo">Contacto</section>
                     </li>
                  </a>

                  <a href="como_se_hizo.pdf">
                     <li style="--i:white; --j:gray">
                        <section class="icons" ><i class="fa fa-bookmark" style="font-size: 2.5em; color:black"></i></section>
                        <section class="titulo">Cómo se hizo</section>
                     </li>
                  </a>
               </ul>
            </nav>
         </footer>
      </body>
   </html>
