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

         <section class="horarios">
         <main>
            <table border="1" summary="Esta tabla nos ofrece un ejemplo de cómo construirlas en HTML">
               <thead>
               <tr>
               <th rowspan="5">Peliculas</th>

               </tr>
               <tr>
               <th>Hora</th>
               <th>Sala</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                  <th>Super Mario Bros Movie</th>
                  <td>16:30</td>
                  <td>1</td>
               </tr>
               <tr>
                  <th>El Exorcista del Papa</th>
                  <td>16:30</td>
                  <td>2</td>
               </tr>
               <tr>
                  <th>Renfield</th>
                  <td>16:30</td>
                  <td>3</td>
               </tr>
               <tr>
                  <th>Air</th>
                  <td>16:30</td>
                  <td>4</td>
               </tr>
               <tr>
                  <th>Blue Jean</th>
                  <td>16:30</td>
                  <td>5</td>
               </tr>
               <tr>
                  <th>El Inocente</th>
                  <td>18:15</td>
                  <td>1</td>
               </tr>
               <tr>
                  <th>John Wick 4</th>
                  <td>18:20</td>
                  <td>2</td>
               </tr>
               <tr>
                  <th>Creed III</th>
                  <td>18:15</td>
                  <td>3</td>
               </tr>
               <tr>
                  <th>Scream VI</th>
                  <td>18:45</td>
                  <td>4</td>
               </tr>
               <tr>
                  <th>Aftersun</th>
                  <td>18:15</td>
                  <td>5</td>
               </tr>
               <tr>
                  <th>Fight Club</th>
                  <td>20:00</td>
                  <td>1</td>
               </tr>
               <tr>
                  <th>The Wale</th>
                  <td>21:20</td>
                  <td>2</td>
               </tr>
               <tr>
                  <th>Requiem For a Dream</th>
                  <td>20:15</td>
                  <td>3</td>
               </tr>
               <tr>
                  <th>Seven</th>
                  <td>20:45</td>
                  <td>4</td>
               </tr>
               <tr>
                  <th>Soy Leyenda</th>
                  <td>20:00</td>
                  <td>5</td>
               </tr>
               <tr>
                  <th>Forest Gump</th>
                  <td>22:30</td>
                  <td>1</td>
               </tr>
               <tr>
                  <th>The Wale</th>
                  <td>22:15</td>
                  <td>2</td>
               </tr>
               </tbody>
               </table>
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
