<?php

class Formulario
{
    private $email;
    private $nombre;
    private $apellido;
    private $passwd;

    function __construct($atributos)
    {
        $this->email = $atributos['email'];
        $this->nombre = $atributos['nombre'];
        $this->apellido = $atributos['apellido'];
        $this->passwd = $atributos['passwd'];
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getPassword()
    {
        return $this->passwd;
    }
}
session_start();
$formulario = new Formulario($_POST);

require_once('classes/usuario.class.inc');
$usuario = new User();
$usuariodb = $usuario->obtenerUsuario($_SESSION['email']);

if($formulario->getNombre() != ''){
    $usuario->modificarNombre($_SESSION['email'], $formulario->getNombre());
    $_SESSION['nombre'] = $formulario->getNombre();

}

if($formulario->getApellido() != ''){
    $usuario->modificarApellido($_SESSION['email'], $formulario->getApellido());

}

if($formulario->getEmail() != ''){
    $usuario->modificarEmail($_SESSION['email'], $formulario->getEmail());
    $_SESSION['email'] = $formulario->getEmail();

}

if($formulario->getPassword() != ''){
    $usuario->modificarPassword($_SESSION['email'], $formulario->getPassword());
}

header("Location: datos.php");
exit;

?>