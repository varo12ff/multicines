<?php
require_once('datosObject.class.inc');
// Cada instancia de la clase usuario se corresponde con una fila/registro de la tabla del mismo nombre

class Comentario extends DataObject
{
    protected $datos = array(
        "id" => "",
        "pelicula" => "",
        "usuario" => "",
        "comentario" => "",
        "fecha" => ""
    );

    public static function insertarComentario($usuario, $pelicula, $comentario, $fecha)
    {

        $conexion = parent::conectar();
        $sql = "INSERT INTO " .TABLA_COMENTARIOS. " (usuario, pelicula, comentario, fecha) 
        VALUES (:usuario, :pelicula, :comentario, :fecha)";
        
        try {
            $st = $conexion->prepare($sql);
			$st->bindValue( ":usuario", $usuario, PDO::PARAM_STR );
			$st->bindValue( ":pelicula", $pelicula, PDO::PARAM_STR );
			$st->bindValue( ":comentario", $comentario, PDO::PARAM_STR );
            $st->bindValue( ":fecha", $fecha, PDO::PARAM_STR );

            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function obtenerComentarios($pelicula)
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT * FROM " .TABLA_COMENTARIOS. " WHERE pelicula = :pelicula";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue( ":pelicula", $pelicula, PDO::PARAM_STR );
            $st->execute();
            $comentarios = array();
            $comentarios = $st->fetchAll();
            parent::desconectar($conexion);
            if ($comentarios)
                return $comentarios;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }
}
?>