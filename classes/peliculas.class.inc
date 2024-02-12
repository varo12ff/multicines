<?php
require_once('datosObject.class.inc');
// Cada instancia de la clase usuario se corresponde con una fila/registro de la tabla del mismo nombre

class Pelicula extends DataObject
{
    protected $datos = array(
        "nombre" => "",
        "apellido" => "",
        "email" => "",
        "passwd" => ""
    );

    public static function eliminarPeli($titulo){
        $conexion = parent::conectar();

        $sql = "DELETE FROM " .TABLA_PELICULAS. " WHERE titulo = :titulo";

        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->execute();
            parent::desconectar($conexion);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }

    }

         
    public static function obtenerPelicula($titulo)
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT * FROM " .TABLA_PELICULAS. " WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
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

    public static function obtenerPeliculaCategoria($categoria)
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT * FROM " .TABLA_PELICULAS. " WHERE categoria = :categoria";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":categoria", $categoria, PDO::PARAM_STR);
            $st->execute();
            $peliculas = array();
            $peliculas = $st->fetchAll();
            parent::desconectar($conexion);
            if ($peliculas)
                return $peliculas;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function obtenerPeliculas()
    {
        
        $conexion = parent::conectar();
        
        $sql = "SELECT * FROM " .TABLA_PELICULAS;
        
        try {
            
            $st = $conexion->prepare($sql);
            
            
            $st->execute();
            $peliculas = array();
            $peliculas = $st->fetchAll();
            parent::desconectar($conexion);
            if ($peliculas)
                return $peliculas;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function insertarPelicula($titulo, $directed, $cast, $sinopsis, $tema, $fecha, $categoria, $cartel, $img1,
    $img2, $img3, $img4)
    {
        $cartel = 'img/'.$cartel;
        $img1 = 'img/'.$img1;
        $img2 = 'img/'.$img2;
        $img3 = 'img/'.$img3;
        $img4 = 'img/'.$img4;

        $conexion = parent::conectar();
        $sql = "INSERT INTO " .TABLA_PELICULAS. " (titulo, directed, cast, sinopsis, tema, fecha, categoria, cartel, img1, img2, img3, img4) 
        VALUES (:titulo, :directed, :cast, :sinopsis, :tema, :fecha, :categoria, :cartel, :img1, :img2, :img3, :img4)";
        
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue( ":titulo", $titulo, PDO::PARAM_STR );
			$st->bindValue( ":directed", $directed, PDO::PARAM_STR );
			$st->bindValue( ":cast", $cast, PDO::PARAM_STR );
			$st->bindValue( ":sinopsis", $sinopsis, PDO::PARAM_STR );
            $st->bindValue( ":tema", $tema, PDO::PARAM_STR );
            $st->bindValue( ":fecha", $fecha, PDO::PARAM_STR );
            $st->bindValue( ":categoria", $categoria, PDO::PARAM_STR );
            $st->bindValue( ":cartel", $cartel, PDO::PARAM_STR );
            $st->bindValue( ":img1", $img1, PDO::PARAM_STR );
            $st->bindValue( ":img2", $img2, PDO::PARAM_STR );
            $st->bindValue( ":img3", $img3, PDO::PARAM_STR );
            $st->bindValue( ":img4", $img4, PDO::PARAM_STR );
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarValoracion($titulo, $nuevoval)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET valoracion = :nuevoval WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevoval", $nuevoval, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarTitulo($titulo, $nuevotit)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET titulo = :nuevotit WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevotit", $nuevotit, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarDirector($titulo, $nuevodir)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET directed = :nuevodir WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevodir", $nuevodir, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarCasting($titulo, $nuevocast)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET cast = :nuevocast WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevocast", $nuevocast, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarSinopsis($titulo, $nuevosin)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET sinopsis = :nuevosin WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevosin", $nuevosin, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarTema($titulo, $nuevotem)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET tema = :nuevotem WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevotem", $nuevotem, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarFecha($titulo, $nuevofecha)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET fecha = :nuevofecha WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevofecha", $nuevofecha, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarCategoria($titulo, $nuevocat)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET categoria = :nuevocat WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevocat", $nuevocat, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarCartel($titulo, $nuevocart)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET cartel = :nuevocart WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevocart", $nuevocart, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarImg1($titulo, $nuevoimg1)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET img1 = :nuevoimg1 WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevoimg1", $nuevoimg1, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarImg2($titulo, $nuevoimg2)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET img2 = :nuevoimg2 WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevoimg2", $nuevoimg2, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarImg3($titulo, $nuevoimg3)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET img3 = :nuevoimg3 WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevoimg3", $nuevoimg3, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function modificarImg4($titulo, $nuevoimg4)
    {
        
        $conexion = parent::conectar();
        
        $sql = "UPDATE " .TABLA_PELICULAS. " SET img4 = :nuevoimg4 WHERE titulo = :titulo";
        
        try {
            
            $st = $conexion->prepare($sql);
            
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":nuevoimg4", $nuevoimg4, PDO::PARAM_STR);
            $st->execute();
            
            parent::desconectar($conexion);
            
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }
}
?>