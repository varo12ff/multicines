<?php
require_once('datosObject.class.inc');
// Cada instancia de la clase usuario se corresponde con una fila/registro de la tabla del mismo nombre

class Valoracion extends DataObject
{
    protected $datos = array(
        "id" => "",
        "usuario" => "",
        "pelicula" => "",
        "valoracion" => ""
    );

    public static function insertarValoracion($usuario, $pelicula, $valoracion)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO " .TABLA_VALORACION. " (usuario, pelicula, valoracion) VALUES (:usuario, :pelicula, :valoracion)";
        
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue( ":usuario", $usuario, PDO::PARAM_STR );
			$st->bindValue( ":pelicula", $pelicula, PDO::PARAM_STR );
			$st->bindValue( ":valoracion", $valoracion, PDO::PARAM_STR );
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function obtenerPeliculaValorada($usuario)
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT pelicula FROM " .TABLA_VALORACION. " WHERE usuario = :usuario";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":usuario", $usuario, PDO::PARAM_STR);
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

    public static function obtenerValoracionPelicula($pelicula)
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT valoracion FROM " .TABLA_VALORACION. " WHERE pelicula = :pelicula";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":pelicula", $pelicula, PDO::PARAM_STR);
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

    public static function modificarValoracion($usuario, $pelicula, $nuevoval)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_VALORACION. " SET valoracion = :nuevoval WHERE usuario = :usuario AND pelicula = :pelicula";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":usuario", $usuario, PDO::PARAM_STR);
            $st->bindValue(":pelicula", $pelicula, PDO::PARAM_STR);
            $st->bindValue(":nuevoval", $nuevoval, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }
}



?>