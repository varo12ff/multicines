<?php

class Formulario
{
    private $titulo; 
    private $usuario; 
    private $valoracion; 

    function __construct($atributos)
    {
        //$this->titulo = $atributos['titulo'];
        //$this->fecha = date($atributos['fecha']);
        //$this->usuario = $atributos['usuario'];
        $this->valoracion = $atributos['valoracion'];
    }

    public function getValoracion()
    {
        return $this->valoracion;
    }
}

require_once('classes/valoracion.class.inc');
require_once('classes/peliculas.class.inc');

session_start();

$formulario = new Formulario($_POST);

$valoracion = new Valoracion();
$valoraciondb = $valoracion->obtenerPeliculaValorada($_SESSION['nombre']);

$valorada = false;

foreach($valoraciondb as $valor){
    if($valor == $_SESSION['titulo']){
        $valorada = true;
        break;
    }
}

if($valorada)
    $valoracion->modificarValoracion($_SESSION['nombre'], $_SESSION['titulo'], $formulario->getValoracion());
else
    $valoracion->insertarValoracion($_SESSION['nombre'], $_SESSION['titulo'], $formulario->getValoracion());



header("Location: index.php");

?>