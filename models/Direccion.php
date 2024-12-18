<?php
require_once '../config/Conexion.php';

class Direccion extends Conexion
{
    protected static $cnx;

    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }

    public function insertarDireccion($provincia, $canton, $distrito, $otrasDirecciones)
    {
        $sql = "INSERT INTO direccion (provincia, canton, distrito, otrasDirecciones) 
                VALUES (:provincia, :canton, :distrito, :otrasDirecciones)";

        try {
            self::getConexion();

            $stmt = self::$cnx->prepare($sql);
            $stmt->bindParam(':provincia', $provincia);
            $stmt->bindParam(':canton', $canton);
            $stmt->bindParam(':distrito', $distrito);
            $stmt->bindParam(':otrasDirecciones', $otrasDirecciones);

            $stmt->execute();
            $idInsertado = self::$cnx->lastInsertId();

            self::desconectar();
            return ['success' => true, 'id' => $idInsertado];
        } catch (PDOException $e) {
            self::desconectar();
            return ['error' => $e->getMessage()];
        }
    }

    public function obtenerUltimaDireccion()
    {
        $sql = "SELECT idDireccion FROM direccion ORDER BY idDireccion DESC LIMIT 1";

        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($sql);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            self::desconectar();

            return $row;
        } catch (PDOException $e) {
            self::desconectar();
            return ['error' => $e->getMessage()];
        }
    }

}
