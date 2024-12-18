<?php
require_once '../config/Conexion.php';

class Alcantarilla extends Conexion
{

    // atributos
    protected static $cnx;
    private $idAlcantarilla;
    private $codigo;
    private $idEstado;
    private $idSensor;
    private $idDireccion;

    // constructor
    public function __construct()
    {
    }

    // getters y setters
    public function getIdAlcantarilla()
    {
        return $this->idAlcantarilla;
    }

    public function setIdAlcantarilla($idAlcantarilla)
    {
        $this->idAlcantarilla = $idAlcantarilla;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getIdEstado()
    {
        return $this->idEstado;
    }

    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;
    }

    public function getIdSensor()
    {
        return $this->idSensor;
    }

    public function setIdSensor($idSensor)
    {
        $this->idSensor = $idSensor;
    }

    public function getIdDireccion()
    {
        return $this->idDireccion;
    }

    public function setIdDireccion($idDireccion)
    {
        $this->idDireccion = $idDireccion;
    }

    // metodos de conexion
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }

    // metodos de la clase
    public static function listarAlcantarillasProvinciaGrafico()
    {
        $sql = "SELECT d.provincia, COUNT(a.idAlcantarilla) AS cantidad_alcantarillas FROM alcantarilla a JOIN direccion d ON a.idDireccion = d.idDireccion WHERE a.idEstado = 1 GROUP BY d.provincia ORDER BY cantidad_alcantarillas DESC LIMIT 3;";

        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($sql);
            $resultado->execute();

            self::desconectar();

            return $resultado->fetchAll();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }

    public static function listarAlcantarillasEnMantenimientoGrafico()
    {
        $sql = "SELECT d.provincia, COUNT(a.idAlcantarilla) AS cantidad_alcantarillas_mantenimiento FROM alcantarilla a JOIN direccion d ON a.idDireccion = d.idDireccion WHERE a.idEstado = 4 GROUP BY d.provincia ORDER BY cantidad_alcantarillas_mantenimiento DESC LIMIT 3;";

        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($sql);
            $resultado->execute();

            self::desconectar();

            return $resultado->fetchAll();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }

    public static function listarAlcantarillasTabla()
    {
        $sql = "select a.idAlcantarilla, a.codigo as codigo_alcantarilla, a.idEstado, a.idDireccion, d.provincia, d.canton, d.distrito, d.otrasDirecciones, d.coordenadasY, d.coordenadasX, s.codigo as codigo_sensor from alcantarilla a join direccion d on a.idDireccion = d.idDireccion join sensor s on a.idSensor = s.idSensor;";

        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($sql);
            $resultado->execute();

            self::desconectar();

            return $resultado->fetchAll();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }

    public function insertarAlcantarilla($idSensor, $idDireccion)
    {
        $sql = "INSERT INTO alcantarilla (idSensor, idDireccion) VALUES (:idSensor, :idDireccion)";

        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($sql);
            $stmt->bindParam(':idSensor', $idSensor);
            $stmt->bindParam(':idDireccion', $idDireccion);
            $stmt->execute();

            $idInsertado = self::$cnx->lastInsertId();
            self::desconectar();

            return ['success' => true, 'id' => $idInsertado];
        } catch (PDOException $e) {
            self::desconectar();
            return ['error' => $e->getMessage()];
        }
    }


}

//$alcantarilla = new Alcantarilla();
//var_dump($alcantarilla->listarAlcantarillasTabla());

?>