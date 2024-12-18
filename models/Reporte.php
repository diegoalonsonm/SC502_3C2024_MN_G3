<?php
require_once '../config/Conexion.php';

class Reporte extends Conexion
{

    // atributos 
    protected static $cnx;
    private $idReporte;
    private $comentario;
    private $fecha;
    private $idAlcantarilla;
    private $idUsuario;
    private $idEstado;

    // constructor
    public function __construct()
    {
    }

    // getters y setters
    public function getIdReporte()
    {
        return $this->idReporte;
    }

    public function setIdReporte($idReporte)
    {
        $this->idReporte = $idReporte;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getIdAlcantarilla()
    {
        return $this->idAlcantarilla;
    }

    public function setIdAlcantarilla($idAlcantarilla)
    {
        $this->idAlcantarilla = $idAlcantarilla;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdEstado()
    {
        return $this->idEstado;
    }

    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;
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

    public function desactivar()
    {
        $query = "UPDATE reportes SET idEstado=2 WHERE idReporte=:idReporte";

        try {
            self::getConexion();

            $idReporte = $this->getIdReporte();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":idReporte", $idReporte, PDO::PARAM_INT);

            $resultado->execute();

            self::desconectar();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    // metodos
    public static function listarReportesUltimas8SemanasGrafico()
    {
        $sql = "SELECT YEAR(fecha) AS anno, WEEK(fecha) AS semana, COUNT(idReporte) AS cantidad_reportes FROM reportes WHERE fecha >= DATE_SUB(CURDATE(), INTERVAL 7 WEEK) GROUP BY anno, semana ORDER BY anno DESC, semana DESC;";

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

    public static function listarReportesPorUsuarioGrafico()
    {
        $sql = "SELECT r.idUsuario, COUNT(r.idReporte) AS cantidad_reportes FROM reportes r GROUP BY r.idUsuario ORDER BY cantidad_reportes DESC LIMIT 3;";

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

    public static function listarTodosReportes()
    {
        $sql = "select r.idReporte, r.comentario, r.fecha, u.correo, a.codigo as codigo_alcantarilla, e.idEstado from reportes r join alcantarilla a on r.idAlcantarilla = a.idAlcantarilla join estado e on r.idEstado = e.idEstado join usuario u on r.idUsuario = u.idUsuario";

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

    public static function listarMisReportes($idUsuario)
    {
        $sql = "SELECT r.idReporte, r.comentario, r.fecha, a.codigo as codigo_alcantarilla, e.idEstado FROM reportes r JOIN alcantarilla a ON r.idAlcantarilla = a.idAlcantarilla JOIN estado e ON r.idEstado = e.idEstado WHERE r.idUsuario = :idUsuario";

        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($sql);
            $resultado->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $resultado->execute();

            self::desconectar();

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }

    public function crearReporte()
    {
        $sql = "INSERT INTO reportes (comentario, fecha, idAlcantarilla, idUsuario, idEstado) VALUES (:comentario, :fecha, :idAlcantarilla, :idUsuario, 1)";

        try {
            self::getConexion();

            $comentario = $this->getComentario();
            $fecha = $this->getFecha();
            $idAlcantarilla = $this->getIdAlcantarilla();
            $idUsuario = $this->getIdUsuario();

            $resultado = self::$cnx->prepare($sql);

            $resultado->bindParam(':comentario', $comentario, PDO::PARAM_STR);
            $resultado->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $resultado->bindParam(':idAlcantarilla', $idAlcantarilla, PDO::PARAM_INT);
            $resultado->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

            $resultado->execute();

            self::desconectar();
            return json_encode(['status' => 'success', 'message' => 'Reporte creado correctamente']);
        } catch (PDOException $Exception) {
            self::desconectar();
            return json_encode(['status' => 'error', 'message' => $Exception->getMessage()]);
        }
    }





}

//$reporte = new Reporte();
//var_dump($reporte->listarMisReportes(10));

?>