<!DOCTYPE HTML>
<head>
   <html lang = "es">
      <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="style.css">
      </head>
      <body>

      <header>
      <a href="index.html"><img class="logo" src="./img/logo.png" alt="Logo del cine" /></a>
      <section class="titu">
         <h1>Cines FAF</h1>
      </section>
      <section class="registro">
         <?php
         require_once('classes/usuario.class.inc');

         $usuario = new User();
         session_start();
         if (!isset($_SESSION['email'])) {
            echo ('
                        <form action="login.php" method="post" name="formLog">
                        <input type="text" id="email" name="email" placeholder="Correo_Electrónico"><br><br>
      
                        <input type="password" id="passwd" name="passwd" placeholder="Contraseña"><br><br>
      
                        <input type="submit" value="Iniciar sesión">
                     </form>
                    
                     <a href="altausuario.html">Registro de usuarios</a>
                        ');
         } else {

            echo ('<p class="usuario">' . $_SESSION["nombre"] . '</p>
                           <p class="usuario">' . $_SESSION['rol'] . '</p>
                           <a href="datos.php">Cambiar datos</a>
                           
                           <a href="logout.php">Cerrar sesión</a>                  
                    ');
            if ($_SESSION['rol'] == 'admin') {
               echo ('<a href="pelis_config.php">Modificar peliculas</a>');
            }
         }
         ?>
      </section>
   </header>

   <nav class="buttons">
      <ul>
         <a href="index.php">
            <li style="--i:white; --j:gray">
               <section class="icons"><i class="fa fa-home" style="font-size: 3.25em; color:black"></i></section>
               <section class="titulo">Inicio</section>
            </li>
         </a>

         <a href="estrenos.php">
            <li style="--i:white; --j:gray">
               <i class="material-icons" style="font-size: 2.5em; color:black">new_releases</i>
               <section class="titulo">Estrenos</section>
            </li>
         </a>

         <a href="cartelera.php">
            <li style="--i:white; --j:gray">
               <section class="icons"><i class="fa fa-film" style="font-size: 2.5em; color:black"></i></section>
               <section class="titulo">Cartelera</section>
            </li>
         </a>

         <a href="horarios.php">
            <li style="--i:white; --j:gray">
               <section class="icons"><i class="fa fa-clock-o" style="font-size: 2.5em; color:black"></i></section>
               <section class="titulo">Horarios</section>
            </li>
         </a>

         <a href="tarifas.php">
            <li style="--i:white; --j:gray">
               <section class="icons"><i class="fa fa-money" style="font-size: 2.5em; color:black"></i></section>
               <section class="titulo">Tarifas</section>
            </li>
         </a>

         <a href="informacion.php">
            <li style="--i:white; --j:gray">
               <section class="icons"><i class="fa fa-question-circle-o" style="font-size: 2.5em; color:black"></i>
               </section>
               <section class="titulo">Información</section>
            </li>
         </a>
      </ul>
   </nav>
         <section class="info">
         <main>
            <h1>INFORMACIÓN GENERAL</h1>
            <p>
               Este es un cine humilde, situado en las afueras de Granada. Abierto desde 2017 cada vez con una cartelera más 
               extensa y de mayor calidad. Abierto de lunes a domingo de 16:30 a 0:00.
            </p>
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
