<?php
if (!isset($_GET['film'])) {
   header("Location: index.php");
   exit;
}
?>

<!DOCTYPE HTML>

<head>
   <html lang="es">
   <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
   <script src="js/confirmacion.js"></script>
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

         <a href="informacion.html">
            <li style="--i:white; --j:gray">
               <section class="icons"><i class="fa fa-question-circle-o" style="font-size: 2.5em; color:black"></i>
               </section>
               <section class="titulo">Información</section>
            </li>
         </a>
      </ul>
   </nav>

   <main style="height: 100%; overflow-y: hidden;">
      <?php
      require_once('classes/peliculas.class.inc');
      require_once('classes/valoracion.class.inc');

      $pelicula = new Pelicula();

      $peliculadb = $pelicula->obtenerPelicula($_GET['film']);
      $dato = str_replace(' ', '+', $peliculadb['titulo']);
      $valoracion = new Valoracion();
      $valoraciondb = array();
      $valoraciondb = $valoracion->obtenerValoracionPelicula($peliculadb['titulo']);

      $suma_val = 0;
      $cont = 0;
      if($valoraciondb != null){
         foreach($valoraciondb as $val){
            $cont += 1;
            $suma_val += floatval($val['valoracion']);
         }
         $val_media = $suma_val/$cont;
      }
      else
         $val_media = 0;

      

      if (isset($_SESSION['email'])) {
         if ($_SESSION['rol'] == 'admin') {
            echo ('<a href=eliminar_peli.php?film=' . $dato . ' onclick="return confirmarAccion()">Eliminar</a>');
         }
      }

      $_SESSION['titulo'] = $peliculadb['titulo'];

      echo ('
                        
                        <h1>' . $peliculadb['titulo'] . '</h1>

                        <section class="imgs">
                            <img src = ' . $peliculadb['img1'] . ' alt = "Imagen 1"/>
                            <img src = ' . $peliculadb['img2'] . ' alt = "Imagen 2"/>
                            <img src = ' . $peliculadb['img3'] . ' alt = "Imagen 3"/>
                            <img src = ' . $peliculadb['img4'] . ' alt = "Imagen 4"/>
                        </section>

                        <section class="datos">
                            <p>Título: ' . $peliculadb['titulo'] . '</p>
                            <p>Directed by: ' . $peliculadb['directed'] . '</p>
                            <p>Cast: ' . $peliculadb['cast'] . '</p>
                            <p>Sinopsis: ' . $peliculadb['sinopsis'] . '</p>
                            <p>Temática: ' . $peliculadb['tema'] . '</p>
                            <p>Fecha de estreno: ' . $peliculadb['fecha'] . '</p>
                            <p>Valoración: ' . $val_media . '/5</p>
                            
                    ');
      ?>

      <section class="other-comments">
         <?php
         require_once('classes/comentarios.class.inc');
         $comentarios = new Comentario();
         $comentariosdb = $comentarios->obtenerComentarios($_SESSION['titulo']);

         if ($comentariosdb == null)
            echo ('No hay comentarios');
         else {
            foreach ($comentariosdb as $comentario) {
               echo ('
                              Fecha: ' . $comentario['fecha'] . '<br>
                              Usuario: ' . $comentario['usuario'] . '<br>
                              Comentario: ' . $comentario['comentario'] . '<br><br>
                           ');
            }
         }


         ?>
      </section>
      <section class="comentarios-form">
         <h1>Deja un Comentario</h1>
         <form action="aniadir_comentario.php" method="post">

            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="5" cols="40"></textarea><br><br>

            <input type="submit" value="Enviar Comentario">
         </form><br>
      </section>

      <form action="valoracion.php" method="post">
         <fieldset class="valoracion">
            <legend>Valoración:</legend>
            <!-- Estrella 1 -->
            <input type="radio" id="estrella1" name="valoracion" value="5.0" class="hidden-radio">
            <label for="estrella1" class="radio-icon"><i class="fa fa-star"></i></label>

            <!-- Estrella 2 -->
            <input type="radio" id="estrella2" name="valoracion" value="4.0" class="hidden-radio">
            <label for="estrella2" class="radio-icon"><i class="fa fa-star"></i></label>

            <!-- Estrella 3 -->
            <input type="radio" id="estrella3" name="valoracion" value="3.0" class="hidden-radio">
            <label for="estrella3" class="radio-icon"><i class="fa fa-star"></i></label>

            <!-- Estrella 4 -->
            <input type="radio" id="estrella4" name="valoracion" value="2.0" class="hidden-radio">
            <label for="estrella4" class="radio-icon"><i class="fa fa-star"></i></label>

            <!-- Estrella 5 -->
            <input type="radio" id="estrella5" name="valoracion" value="1.0" class="hidden-radio">
            <label for="estrella5" class="radio-icon"><i class="fa fa-star"></i></label>

            <input type="submit" value="Enviar valoracion">
         </fieldset>
      </form>
      <?php
      if (isset($_SESSION['email'])) {
         if ($_SESSION['rol'] == 'admin') {
            $_SESSION['titulo'] = $peliculadb['titulo'];
            echo ('
                     <h1>MODIFICAR PELICULAS</h1>
                     <form action="modificar_peli.php" method="post" style="display:grid" id="añadir_pelicula">
                        <input type="text" name="titulo" placeholder="Título" maxlength="100">
                        <input type="text" name="director" placeholder="Director" maxlength="20">
                        <input type="text" name="cast" placeholder="Casting" maxlength="50">
                        <input type="text" name="sinopsis" placeholder="Sinopsis" maxlength="500">
                        <input type="text" name="tematica" placeholder="Temática" maxlength="30">
                        <input type="text" name="estreno" placeholder="Fecha de estreno: yyyy-mm-dd">
                        <input type="text" name="categoria" placeholder="Categoría" maxlength="20">
         
                        <p>Imagenes para la pelicula: Cartel seguidas de las imagenes informativas.</p>

                        <input type="text" name="cartel" placeholder="Cartel: img/imagen.jpg" maxlength="50">
                        <input type="text" name="img1" placeholder="Imagen 1: img/imagen.jpg" maxlength="50">
                        <input type="text" name="img2" placeholder="Imagen 2: img/imagen.jpg" maxlength="50">
                        <input type="text" name="img3" placeholder="Imagen3: img/imagen.jpg" maxlength="50">
                        <input type="text" name="img4" placeholder="Imagen4: img/imagen.jpg" maxlength="50">
         
                        <button type="submit">Añadir película</button>
                     </form>
                     ');
         }
      }
      ?>
   </main>

   <footer>
      <nav style="padding-left: 0%;" class="normal">
         <ul>
            <a href="./contacto.php">
               <li style="--i:white; --j:gray">
                  <i class="material-icons" style="font-size: 2.5em; color:black">import_contacts</i>
                  <section class="titulo">Contacto</section>
               </li>
            </a>

            <a href="./como_se_hizo.pdf">
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