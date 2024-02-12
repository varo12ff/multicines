<?php
require_once('datosObject.class.inc');
// Cada instancia de la clase usuario se corresponde con una fila/registro de la tabla del mismo nombre

class User extends DataObject
{
    protected $datos = array(
        "nombre" => "",
        "apellido" => "",
        "email" => "",
        "passwd" => ""
    );

    public static function obtenerUsuarios()
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT * FROM " .TABLA_USUARIOS;
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->execute();
            $fila = array();
            $fila = $st->fetchAll();
            parent::desconectar($conexion);
            if ($fila)
                return $fila;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function obtenerUser($filaInicio, $numeroFilas, $orden)
    {
        $conexion = parent::conectar();

        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TABLA_USUARIOS .
            " ORDER BY " . $orden . "LIMIT :filaInicio, :numeroFilas";

        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":filaInicio", $filaInicio, PDO::PARAM_INT);
            $st->bindValue(":numeroFilas", $numeroFilas, PDO::PARAM_INT);
            $st->execute();
            $usuarios = array();
            foreach ($st->fetchAll() as $fila) {
                $usuarios[] = new User();
            }
            $st = $conexion->query("SELECT found_rows() AS filasTotales");
            /* Obtenemos la primera fila (en realidad, la única) de la salida de la
            query, almacenada en $st */
            $fila = $st->fetch();
            parent::desconectar($conexion);
            return array($usuarios, $fila["filasTotales"]);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }       
    public static function obtenerUsuario($email)
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT * FROM " .TABLA_USUARIOS. " WHERE email = :email";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->execute();
            $fila = $st->fetch();
            parent::desconectar($conexion);
            if ($fila)
                return $fila;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function obtenerPasswd($email)
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT passwd FROM " .TABLA_USUARIOS. " WHERE email = :email";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->execute();
            $fila = $st->fetch();
            parent::desconectar($conexion);
            if ($fila)
                return $fila;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }
    public static function insertarUsuario($nombre, $passwd, $email, $apellido, $rol)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO " .TABLA_USUARIOS. " (email, nombre, apellido, passwd, rol) VALUES (:email, :nombre, :apellido, :passwd, :rol)";
        
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue( ":email", $email, PDO::PARAM_STR );
			$st->bindValue( ":nombre", $nombre, PDO::PARAM_STR );
			$st->bindValue( ":apellido", $apellido, PDO::PARAM_STR );
			$st->bindValue( ":passwd", $passwd, PDO::PARAM_STR );
            $st->bindValue( ":rol", $rol, PDO::PARAM_STR );
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarNombre($email, $nuevonom)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_USUARIOS. " SET nombre = :nuevonom WHERE email = :email";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->bindValue(":nuevonom", $nuevonom, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarApellido($email, $nuevoap)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_USUARIOS. " SET apellido = :nuevoap WHERE email = :email";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->bindValue(":nuevoap", $nuevoap, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarEmail($email, $nuevoEm)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_USUARIOS. " SET email = :nuevoEm WHERE email = :email";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->bindValue(":nuevoEm", $nuevoEm, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarPassword($email, $nuevopw)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_USUARIOS. " SET passwd = :nuevopw WHERE email = :email";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->bindValue(":nuevopw", $nuevopw, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }
    // Aquí también se meterían métodos que procesaran los campos de alguna forma.
    public function obtenerTipoCadena()
    {
        return ($this->datos["tipo"] == "s") ? "Seco" : "Carnoso";
    }
}
?>