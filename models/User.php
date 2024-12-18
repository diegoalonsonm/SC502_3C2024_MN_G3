<?php
require_once '../config/Conexion.php';

class User extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idUsuario = null;
    private $nombre = null;
    private $cedula = null;
    private $apellido1 = null;
    private $apellido2 = null;
    private $telefono = null;
    private $contrasena = null;
    private $correo = null;
    private $idestado = null;
    private $idRol = null;

    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Contructores de la Clase          =
    =============================================*/
    public function __construct()
    {
    }
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getCedula()
    {
        return $this->cedula;
    }
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    public function getApellido1()
    {
        return $this->apellido1;
    }
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    }
    public function getApellido2()
    {
        return $this->apellido2;
    }
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    }
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
    public function getContrasena()
    {
        return $this->contrasena;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getIdEstado()
    {
        return $this->idestado;
    }
    public function setIdEstado($idestado)
    {
        $this->idestado = $idestado;
    }
    public function getIdRol()
    {
        return $this->idRol;
    }
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/

    /*=============================================
    =            Metodos de la Clase              =
    =============================================*/
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }

    public function listarTodosDb()
    {
        $query = "SELECT * FROM usuario";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function verificarExistenciaDb()
    {
        $query = "SELECT * FROM usuarios where cedula=:cedula";
        try {
            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $cedula = $this->getCedula();

            $resultado->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $resultado->execute();

            self::desconectar();

            $encontrado = false;
            $arr = array();

            foreach ($resultado->fetchAll() as $reg) {
                $arr[] = $reg['idUsuario'];
                $arr[] = $reg['nombre'];
                $arr[] = $reg['apellido1'];
                $arr[] = $reg['apellido2'];
                $arr[] = $reg['cedula'];
                $arr[] = $reg['correo'];
                $arr[] = $reg['telefono'];
                $arr[] = $reg['contrasena'];
                $arr[] = $reg['idEstado'];
                $arr[] = $reg['idRol'];
            }

            return $arr;

            return $encontrado;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function registroDesdeLanding()
    {
        $query = "INSERT INTO `usuario`(`nombre`, `apellido1`, `apellido2`, `cedula`, `correo`, `telefono`, `contrasena`, `idRol`) 
                      VALUES (:nombre, :apellido1, :apellido2, :cedula, :correo, :telefono, :contrasena, 2)";

        try {
            self::getConexion();

            $nombre = $this->getNombre();
            $apellido1 = $this->getApellido1();
            $apellido2 = $this->getApellido2();
            $cedula = $this->getCedula();
            $telefono = $this->getTelefono();
            $correo = $this->getCorreo();
            $contrasena = $this->getContrasena();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellido1", $apellido1, PDO::PARAM_STR);
            $resultado->bindParam(":apellido2", $apellido2, PDO::PARAM_STR);
            $resultado->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);                       

            $resultado->execute();

            self::desconectar();
            return true;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }


    public function activar()
    {
        $idUsuario = $this->getIdUsuario();
        $query = "UPDATE usuarios SET idEstado='1' WHERE idUsuario=:idUsuario";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $idUsuario, PDO::PARAM_INT);
            self::$cnx->beginTransaction(); //desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit(); //realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function desactivar()
    {
        $idUsuario = $this->getIdUsuario();
        $query = "UPDATE usuarios SET idEstado='0' WHERE idUsuario=:idUsuario";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            self::$cnx->beginTransaction(); //desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit(); //realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public static function mostrar($correo)
    {
        $query = "SELECT * FROM usuario where correo=:idUsuario";
        $idUsuario = $correo;
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetch();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function llenarCampos($idUsuario)
    {
        $query = "SELECT * FROM usuarios where idUsuario=:idUsuario";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdUsuario($encontrado['idUsuario']);
                $this->setNombre($encontrado['nombre']);
                $this->setidEstado($encontrado['idEstado']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function actualizarUsuario()
    {
        $query = "update usuarios set nombre=:nombre,telefono=:telefono,apellido1=:apellido1,apellido2=:apellido2,cedula=:cedula where idUsuario=:idUsuario and correo=:correo";
        try {
            self::getConexion();
            $idUsuario = $this->getIdUsuario();
            $correo = $this->getCorreo();
            $nombre = $this->getNombre();
            $apellido1 = $this->getApellido1();
            $apellido2 = $this->getApellido2();
            $cedula = $this->getCedula();
            $telefono = $this->getTelefono();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $resultado->bindParam("apellido1", $apellido1, pdo::PARAM_STR);
            $resultado->bindParam("apellido2", $apellido2, pdo::PARAM_STR);
            $resultado->bindParam("cedula", $cedula, pdo::PARAM_STR);
            self::$cnx->beginTransaction(); //desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit(); //realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function verificarExistenciaCorreo()
    {
        $query = "SELECT correo,idUsuario,nombre,telefono FROM usuarios where correo=:correo and estado =1";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $correo = $this->getCorreo();
            $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            $encontrado = false;
            $arr = array();
            foreach ($resultado->fetchAll() as $reg) {
                $arr[] = $reg['id'];
                $arr[] = $reg['correo'];
                $arr[] = $reg['nombre'];
                $arr[] = $reg['telefono'];
            }
            return $arr;
            return $encontrado;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public static function listarEmpleadosActivosInactivosGrafico() {
        $sql = "SELECT CASE WHEN idEstado = 1 THEN 'Activo' WHEN idEstado = 2 THEN 'Inactivo' END AS estado, COUNT(*) AS cantidad_empleados FROM usuario WHERE idEstado IN (1, 2) AND idRol IN (1, 3) GROUP BY idEstado;";

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($sql);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public static function actualizarContrasenaHasheada($idUsuario)
    {
        $querySelect = "SELECT contrasena FROM usuario WHERE idUsuario = :idUsuario";
        $queryUpdate = "UPDATE usuario SET contrasena = :contrasena WHERE idUsuario = :idUsuario";
        
        try {
            self::getConexion();
            
            // Fetch the current password
            $resultado = self::$cnx->prepare($querySelect);
            $resultado->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $resultado->execute();
            $currentPassword = $resultado->fetchColumn();
            
            // Hash the current password
            $hashedPassword = password_hash($currentPassword, PASSWORD_DEFAULT);
            
            // Update the password with the hashed version
            $resultado = self::$cnx->prepare($queryUpdate);
            $resultado->bindParam(":contrasena", $hashedPassword, PDO::PARAM_STR);
            $resultado->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $resultado->execute();
            
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    /*=====  End of Metodos de la Clase  ======*/
}
//$mode = new User();
//var_dump($mode->actualizarContrasenaHasheada(22));