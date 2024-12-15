<?php
require_once '../config/Conexion.php';

class Sensor extends Conexion {
    
    // atributos
    protected static $cnx;
    private $idSensor;
    private $codigo;
    private $marca;
    private $idEstado;

    private $cantidadUsos;

    // constructor
    public function __construct() {
    }

    // getters y setters
    public function getIdSensor() {
        return $this->idSensor;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getIdEstado() {
        return $this->idEstado;
    }

    public function setIdSensor($idSensor) {
        $this->idSensor = $idSensor;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }

    public function setCantidadUsos($cantidadUsos) {
        $this->cantidadUsos = $cantidadUsos;
    }

    // metodos de conexion
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    // metodos 
    public static function listarCantidadSensores() {
        $query = "SELECT * FROM sensor";

        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute();

            self::desconectar();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );
            return json_encode($error);
        }
    }

    public static function listarCantidadSensoresGrafico() {
        $query = "SELECT s.marca, COUNT(s.idSensor) AS cantidad_sensores FROM sensor s GROUP BY s.marca ORDER BY cantidad_sensores DESC LIMIT 3;";

        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute();

            self::desconectar();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );
            return json_encode($error);
        }
    }

}

//$sensor = new Sensor();
//var_dump($sensor->listarCantidadSensoresGrafico());

?>