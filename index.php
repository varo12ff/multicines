<!DOCTYPE HTML>

<head>
   <html lang="es">
   <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
   <script src="js/ventana.js"></script>
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

   <section class="news">
      <aside>
         <section class="new">
            <a href="noticia1.html">
               <img class="small" src="./img/noticia1.jpg" alt="Noticia 1">
               <p>Películas Netflix 2023: los 30 mejores estrenos</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia2.html">
               <img class="small" src="./img/noticia2.jpg" alt="Noticia 2">
               <p>El spin off que se merecen los fans de Harry Potter</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia3.html">
               <img class="small" src="./img/noticia3.jpg" alt="Noticia 3">
               <p>Este es el cine español que llegará en 2023</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia4.html">
               <img class="small" src="./img/noticia4.jpg" alt="Noticia 4">
               <p>'La sirenia': fecha de estreno, tráiler, reparto</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia5.html">
               <img class="small" src="./img/noticia5.jpg" alt="Noticia 5">
               <p>Nuevo tráiler de SpiderMan: Cruzando el Multiverso</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia6.html">
               <img class="small" src="./img/noticia6.jpg" alt="Noticia 6">
               <p>Un día en los estudios de Pixar en San Francisco</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia7.html">
               <img class="small" src="./img/noticia7.jpg" alt="Noticia 7">
               <p>¿Por qué 'Barbie' va a ser la película del año?</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia8.html">
               <img class="small" src="./img/noticia8.jpg" alt="Noticia 8">
               <p>5 momentos del papa en 'Amén: Francisco responde'</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia9.html">
               <img class="small" src="./img/noticia9.jpeg" alt="Noticia 9">
               <p>Las 60 películas más esperadas de 2023</p>
            </a>
         </section>

         <section class="new">
            <a href="noticia10.html">
               <img class="small" src="./img/noticia10.jpg" alt="Noticia 10">
               <p>Por qué Hugh Grant escogió 'Dungeons and Dragons'</p>
            </a>
         </section>
      </aside>
   </section>

   <section class="films">
      <main>
         <h1>ESTRENOS DE LA SEMANA</h1>
         <section class="seccion">
            <?php

            require_once('classes/peliculas.class.inc');
            require_once('classes/valoracion.class.inc');

            $pelicula = new Pelicula();
            $peliculadb = array();
            $peliculadb = $pelicula->obtenerPeliculaCategoria('estrenos');

            if ($peliculadb != null) {

               $tresPelis = array_slice($peliculadb, 0, 3);

               foreach ($tresPelis as $peli) {

                  $valoracion = new Valoracion();
                  $valoraciondb = array();
                  $valoraciondb = $valoracion->obtenerValoracionPelicula($peli['titulo']);

                  $suma_val = 0;
                  $cont = 0;
                  if ($valoraciondb != null) {
                     foreach ($valoraciondb as $val) {
                        $cont += 1;
                        $suma_val += floatval($val['valoracion']);
                     }
                     $val_media = $suma_val / $cont;
                  } else
                     $val_media = 0;

                  $dato = str_replace(' ', '+', $peli['titulo']);
                  echo ('<section class="film">
                        <a href=pelicula.php?film=' . $dato . '>
                        <img class="medium" src=' . $peli['cartel'] . ' alt=' . $peli['titulo'] . ' onmouseover="showPopup(\'' . $peli['titulo'] . '\');" onmouseout="hidePopup();">
                        <p>' . $peli['titulo'] . '</p>
                        <p>Directed by: ' . $peli['directed'] . '</p>
                        <p>Cast: ' . $peli['cast'] . '</p>
                        <p>Valoración media: '.$val_media.'/5</p>
                        <p>Fecha de estreno: ' . $peli['fecha'] . '</p>
                        </a>
                     </section>');
               }
            }
            ?>
            <div class="popup" id="popup">
               <p id="popupTitle"></p>
            </div>
         </section>

         <a href="estrenos.php">Ver todas las peliculas</a>

         <h1>CARTELERA</h1>

         <section class="seccion">
            <?php
            require_once('classes/peliculas.class.inc');
            require_once('classes/valoracion.class.inc');

            $pelicula = new Pelicula();
            $peliculadb = array();
            $peliculadb = $pelicula->obtenerPeliculas();
            if ($peliculadb != null) {
               $tresPelis = array_slice($peliculadb, 0, 3);

               foreach ($tresPelis as $peli) {

                  $valoracion = new Valoracion();
                  $valoraciondb = array();
                  $valoraciondb = $valoracion->obtenerValoracionPelicula($peli['titulo']);

                  $suma_val = 0;
                  $cont = 0;
                  if ($valoraciondb != null) {
                     foreach ($valoraciondb as $val) {
                        $cont += 1;
                        $suma_val += floatval($val['valoracion']);
                     }
                     $val_media = $suma_val / $cont;
                  } else
                     $val_media = 0;

                  $dato = str_replace(' ', '+', $peli['titulo']);
                  echo ('<section class="film">
                        <a href=pelicula.php?film=' . $dato . '>
                        <img class="medium" src=' . $peli['cartel'] . ' alt=' . $peli['titulo'] . ' onmouseover="showPopup(\'' . $peli['titulo'] . '\');" onmouseout="hidePopup();">
                        <p>' . $peli['titulo'] . '</p>
                        <p>Directed by: ' . $peli['directed'] . '</p>
                        <p>Cast: ' . $peli['cast'] . '</p>
                        <p>Valoración media: '.$val_media.'/5</p>
                        <p>Fecha de estreno: ' . $peli['fecha'] . '</p>
                        </a>
                     </section>');
               }
            }
            ?>
         </section>

         <a href="cartelera.php">Ver todas las peliculas</a>

         <h1>MÁS VALORADAS</h1>

         <section class="seccion">
            <?php
            require_once('classes/peliculas.class.inc');
            require_once('classes/valoracion.class.inc');

            $pelicula = new Pelicula();
            $peliculadb = array();
            $peliculadb = $pelicula->obtenerPeliculaCategoria('mas_valoradas');
            if ($peliculadb != null) {
               $tresPelis = array_slice($peliculadb, 0, 3);

               foreach ($tresPelis as $peli) {

                  $valoracion = new Valoracion();
                  $valoraciondb = array();
                  $valoraciondb = $valoracion->obtenerValoracionPelicula($peli['titulo']);

                  $suma_val = 0;
                  $cont = 0;
                  if ($valoraciondb != null) {
                     foreach ($valoraciondb as $val) {
                        $cont += 1;
                        $suma_val += floatval($val['valoracion']);
                     }
                     $val_media = $suma_val / $cont;
                  } else
                     $val_media = 0;

                  $dato = str_replace(' ', '+', $peli['titulo']);
                  echo ('<section class="film">
                        <a href=pelicula.php?film=' . $dato . '>
                        <img class="medium" src=' . $peli['cartel'] . ' alt=' . $peli['titulo'] . ' onmouseover="showPopup(\'' . $peli['titulo'] . '\');" onmouseout="hidePopup();">
                        <p>' . $peli['titulo'] . '</p>
                        <p>Directed by: ' . $peli['directed'] . '</p>
                        <p>Cast: ' . $peli['cast'] . '</p>
                        <p>Valoración media: '.$val_media.'/5</p>
                        <p>Fecha de estreno: ' . $peli['fecha'] . '</p>
                        </a>
                     </section>');
               }
            }
            ?>
         </section>

         <a href="masvaloradas.php">Ver todas las peliculas</a>

         <h1>PROXIMAMENTE</h1>

         <section class="seccion">
            <?php
            require_once('classes/peliculas.class.inc');

            $pelicula = new Pelicula();
            $peliculadb = array();
            $peliculadb = $pelicula->obtenerPeliculaCategoria('proximas');
            if ($peliculadb != null) {
               $tresPelis = array_slice($peliculadb, 0, 3);

               foreach ($tresPelis as $peli) {

                  $valoracion = new Valoracion();
                  $valoraciondb = array();
                  $valoraciondb = $valoracion->obtenerValoracionPelicula($peli['titulo']);

                  $suma_val = 0;
                  $cont = 0;
                  if ($valoraciondb != null) {
                     foreach ($valoraciondb as $val) {
                        $cont += 1;
                        $suma_val += floatval($val['valoracion']);
                     }
                     $val_media = $suma_val / $cont;
                  } else
                     $val_media = 0;
                     
                  $dato = str_replace(' ', '+', $peli['titulo']);
                  echo ('<section class="film">
                        <a href=pelicula.php?film=' . $dato . '>
                        <img class="medium" src=' . $peli['cartel'] . ' alt=' . $peli['titulo'] . ' onmouseover="showPopup(\'' . $peli['titulo'] . '\');" onmouseout="hidePopup();">
                        <p>' . $peli['titulo'] . '</p>
                        <p>Directed by: ' . $peli['directed'] . '</p>
                        <p>Cast: ' . $peli['cast'] . '</p>
                        <p>Valoración media: '.$val_media.'/5</p>
                        <p>Fecha de estreno: ' . $peli['fecha'] . '</p>
                        </a>
                     </section>');
               }
            }
            ?>
         </section>

         <a href="proximas.php">Ver todas las peliculas</a>
      </main>
   </section>

   <footer>
      <nav style="padding-left: 0%;" class="normal">
         <ul>
            <a href="contacto.php">
               <li style="--i:white; --j:gray">
                  <i class="material-icons" style="font-size: 2.5em; color:black">import_contacts</i>
                  <section class="titulo">Contacto</section>
               </li>
            </a>

            <a href="como_se_hizo.pdf">
               <li style="--i:white; --j:gray">
                  <section class="icons"><i class="fa fa-bookmark" style="font-size: 2.5em; color:black"></i></section>
                  <section class="titulo">Cómo se hizo</section>
               </li>
            </a>
         </ul>
      </nav>
   </footer>
</body>

</html>