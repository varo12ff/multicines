<?php
    class FormularioLog{
        private $email;
        private $passwd;

        function __construct($atr){
            $this->email = $atr['email'];
            $this->passwd = $atr['passwd'];
        }

        public function getEmail(){
			return $this->email;
		}

		public function getPassword(){
			return $this->passwd;
		}
    }

    $form = new FormularioLog($_POST);


    require_once ('classes/usuario.class.inc');
    
    $user = new User();
    
    $usuariodb = $user->obtenerUsuario($form->getEmail());

    if($form->getEmail() == $usuariodb['email'] && $form->getPassword() == $usuariodb['passwd']){

        session_start();
    
        $_SESSION['email'] = $usuariodb['email'];
        $_SESSION['nombre'] = $usuariodb['nombre'];
        $_SESSION['rol'] = $usuariodb['rol'];

        header("Location: index.php");
    }
    else{
        header("Location: index.php");
        echo('
            
            <script>
                window.onload = function() {
                alert("email o contraseña incorrectos");
            }
            </script>
        ');
        
    }
    

        exit;
?>