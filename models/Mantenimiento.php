<?php
require_once '../config/Conexion.php';

class Mantenimiento extends Conexion {

    // atributos
    protected static $cnx;
    private $idMantenimiento;
    private $fechaInicio;
    private $fechaFin;
    private $instrucciones;
    private $idUsuario;
    private $idAlcantarilla;
    private $idEstado;

    // constructor
    public function __construct() {
    }

    // getters y setters
    public function getIdMantenimiento() {
        return $this->idMantenimiento;
    }

    public function setIdMantenimiento($idMantenimiento) {
        $this->idMantenimiento = $idMantenimiento;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaFin() {
        return $this->fechaFin;
    }

    public function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    public function getInstrucciones() {
        return $this->instrucciones;
    }

    public function setInstrucciones($instrucciones) {
        $this->instrucciones = $instrucciones;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getIdAlcantarilla() {
        return $this->idAlcantarilla;
    }

    public function setIdAlcantarilla($idAlcantarilla) {
        $this->idAlcantarilla = $idAlcantarilla;
    }

    public function getIdEstado() {
        return $this->idEstado;
    }

    public function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }

    // metodos de conexion
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    // metodos
    public static function listarTodosTiquetes() {
        $sql = "select m.idMantenimiento, m.fechaInicio, m.fechaFin, m.instrucciones, u.correo as usuario, a.codigo as alcantarilla, m.idEstado as estado from mantenimiento m join usuario u on m.idUsuario = u.idUsuario join alcantarilla a on m.idAlcantarilla = a.idAlcantarilla join estado e on m.idEstado = e.idEstado";

        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($sql);
            $resultado->execute();

            self::desconectar();
            
            return $resultado->fetchAll();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );
            return json_encode($error);
        }
    }

    public static function listarTodosTiquetesEmpleado($idUsuario) {
        $sql = "select m.idMantenimiento, m.fechaInicio, m.fechaFin, m.instrucciones, u.correo as usuario, a.codigo as alcantarilla, m.idEstado as estado from mantenimiento m join usuario u on m.idUsuario = u.idUsuario join alcantarilla a on m.idAlcantarilla = a.idAlcantarilla join estado e on m.idEstado = e.idEstado where m.idUsuario = :idUsuario";

        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($sql);
            $resultado->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $resultado->execute();

            self::desconectar();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );
            return json_encode($error);
        }
    }

    public static function listarUsuariosMantenimiento() {

        $sql = "select idUsuario, correo from usuario where idRol = 3";
        
        try {
            self::getConexion();
            
            $resultado = self::$cnx->prepare($sql);
            $resultado->execute();
            
            self::desconectar();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );
            return json_encode($error);
        }
    }

    public static function listarAlcantarillas() {
        $sql = "select idAlcantarilla, codigo from alcantarilla";

        try {
            self::getConexion();
            
            $resultado = self::$cnx->prepare($sql);
            $resultado->execute();
            
            self::desconectar();
            
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );
            return json_encode($error);
        }
    }

    public static function agregarNuevoTiquete() {
        $sql = "insert into mantenimiento (fechaInicio, fechaFin, instrucciones, idUsuario, 
            idAlcantarilla) values (:fechaInicio, :fechaFin, :instrucciones, :idUsuario, 
            :idAlcantarilla)";

        try {
            self::getConexion();

            $fechaInicio = $this->getFechaInicio();
            $fechaFin = $this->getFechaFin();
            $instrucciones = $this->getInstrucciones();
            $idUsuario = $this->getIdUsuario();
            $idAlcantarilla = $this->getIdAlcantarilla();

            $resultado = self::$cnx->prepare($sql);

            $resultado->bindParam(':fechaInicio', $fechaInicio, PDO::PARAM_STR);
            $resultado->bindParam(':fechaFin', $fechaFin, PDO::PARAM_STR);
            $resultado->bindParam(':instrucciones', $instrucciones, PDO::PARAM_STR);
            $resultado->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $resultado->bindParam(':idAlcantarilla', $idAlcantarilla, PDO::PARAM_INT);
            $resultado->execute();

            self::desconectar();

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
          return json_encode($error);
        }
    }

}

//$mant = new Mantenimiento();
//var_dump($mant->listarAlcantarillas());

?>