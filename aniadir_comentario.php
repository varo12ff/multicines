<?php
class Formulario
{
    private $titulo; 
    private $usuario; 
    private $comentario; 
    private $fecha; 
    private $id;

    function __construct($atributos)
    {
        $this->comentario = $atributos['comentario'];
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getComentario()
    {
        return $this->comentario;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
}

session_start();

require_once('classes/comentarios.class.inc');

$formulario = new Formulario($_POST);

$comentario = new Comentario();

$comentario->insertarComentario($_SESSION['nombre'], $_SESSION['titulo'], $formulario->getComentario(), date('Y-m-d'));

header("Location: index.php");
exit;
