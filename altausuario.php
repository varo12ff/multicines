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


$formulario = new Formulario($_POST);

require_once('classes/usuario.class.inc');
$usuario = new User();
$all_users = $usuario->obtenerUsuarios();

$validacion = true;
$nombre = false;
$email = false;

foreach($all_users as $user){
    if($user['email'] == $formulario->getEmail()){
        $email = true;
        $validacion = false;
        break;
    }

    if($user['nombre'] == $formulario->getNombre()){
        $nombre = true;
        $validacion = false;
        break;
    }
}

if($validacion){
    session_start();

    $usuario->insertarUsuario($formulario->getNombre(), $formulario->getPassword(), $formulario->getEmail(), $formulario->getApellido(), 'user');
    $_SESSION["nombre"] = $formulario->getNombre();
    $_SESSION["email"] = $formulario->getEmail();
    $_SESSION['rol'] = 'user';
    header("Location: index.php");
}
else{

    if($nombre){
        echo('
            
            <script>
                window.onload = function() {
                alert("Nombre ya registrado");
            }
            </script>
        ');
    }
    else{
        echo('
            
            <script>
                window.onload = function() {
                alert("Email ya registrado");
            }
            </script>
        ');
    }
}

exit;
?>