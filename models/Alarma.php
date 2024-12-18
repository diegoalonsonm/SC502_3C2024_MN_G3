<?php
require_once '../config/Conexion.php';

class Alarma extends Conexion {

    // atributos
    protected static $cnx;
    private $idAlarma;
    private $textoAlarma;
    private $idEstado;
    private $idAlcantarilla;
    private $idUsuarioAlertar;

    // constructor
    public function __construct() {
    }

    // getters y setters
    public function getIdAlarma() {
        return $this->idAlarma;
    }

    public function setIdAlarma($idAlarma) {
        $this->idAlarma = $idAlarma;
    }

    public function getTextoAlara() {
        return $this->textoAlara;
    }

    public function setTextoAlara($textoAlara) {
        $this->textoAlara = $textoAlara;
    }

    public function getIdEstado() {
        return $this->idEstado;
    }

    public function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }

    public function getIdAlcantarilla() {
        return $this->idAlcantarilla;
    }

    public function setIdAlcantarilla($idAlcantarilla) {
        $this->idAlcantarilla = $idAlcantarilla;
    }

    public function getIdUsuarioAlertar() {
        return $this->idUsuarioAlertar;
    }

    public function setIdUsuarioAlertar($idUsuarioAlertar) {
        $this->idUsuarioAlertar = $idUsuarioAlertar;
    }

    // metodos de conexion
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    // Métodos
    public static function listarAlarmasTabla() {
        $sql = "select a.idAlarma, a.textoAlerta, a.idEstado, u.correo, al.codigo 
                from alarma a 
                join usuario u on a.idUsuarioAlertar = u.idUsuario 
                join alcantarilla al on a.idAlcantarilla = al.idAlcantarilla";

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($sql);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    // actualizar el estado de la alarma a inactivo (cambiar de activo a inactivo)
    public static function actualizarEstadoAlarma($idAlarma, $nuevoEstado) {
        $sql = "UPDATE alarma SET idEstado = :nuevoEstado WHERE idAlarma = :idAlarma"; 
    
        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($sql);
            $stmt->bindParam(':idAlarma', $idAlarma, PDO::PARAM_INT);
            $stmt->bindParam(':nuevoEstado', $nuevoEstado, PDO::PARAM_INT);
    
            $resultado = $stmt->execute();
            self::desconectar();
    
            return $resultado;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    
}

//$alarma = new Alarma();
//var_dump($alarma->listarAlarmasTabla());

?>