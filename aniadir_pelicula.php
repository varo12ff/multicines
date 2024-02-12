<?php
class Formulario
{
    private $titulo; 
    private $directed; 
    private $cast; 
    private $sinopsis; 
    private $tema;
    private $fecha; 
    private $categoria;
    private $cartel;
    private $img1;
    private $img2;
    private $img3;
    private $img4;

    function __construct($atributos)
    {
        $this->titulo = $atributos['titulo'];
        $this->directed = $atributos['director'];
        $this->cast = $atributos['cast'];
        $this->sinopsis = $atributos['sinopsis'];
        $this->tema = $atributos['tematica'];
        $this->fecha = date($atributos['estreno']);
        $this->categoria = $atributos['categoria'];
        $this->cartel = $atributos['cartel'];
        $this->img1 = $atributos['img1'];
        $this->img2 = $atributos['img2'];
        $this->img3 = $atributos['img3'];
        $this->img4 = $atributos['img4'];
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDirector()
    {
        return $this->directed;
    }

    public function getCasting()
    {
        return $this->cast;
    }

    public function getSinopsis()
    {
        return $this->sinopsis;
    }
    public function getTema()
    {
        return $this->tema;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getCartel()
    {
        return $this->cartel;
    }
    public function getImg1()
    {
        return $this->img1;
    }
    public function getImg2()
    {
        return $this->img2;
    }
    public function getImg3()
    {
        return $this->img3;
    }
    public function getImg4()
    {
        return $this->img4;
    }
}


$formulario = new Formulario($_POST);

require_once('classes/peliculas.class.inc');
$pelicula = new Pelicula();

$pelicula->insertarPelicula($formulario->getTitulo(), $formulario->getDirector(), $formulario->getCasting(),
 $formulario->getSinopsis(), $formulario->getTema(), $formulario->getFecha(), $formulario->getCategoria(), $formulario->getCartel(),
$formulario->getImg1(), $formulario->getImg2(), $formulario->getImg3(), $formulario->getImg4());

header("Location: index.php");

exit;
?>