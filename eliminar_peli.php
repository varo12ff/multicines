<?php
    require_once('classes/peliculas.class.inc');
    if(!isset($_GET['film'])){
        header("Location: index.php");
        exit;
    }
    $pelicula = new Pelicula();
    $peliculadb = $pelicula->obtenerPelicula($_GET['film']);
    $pelicula->eliminarPeli($peliculadb['titulo']);
    header("Location: index.php");
    exit;

?>