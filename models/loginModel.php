<?php
require_once "../config/conexion.php";

class LoginModel
{
    public static function autenticar($correo, $password)
    {
        try {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM usuario WHERE correo = :correo AND idEstado = 1";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                if (password_verify($password, $usuario['contrasena'])) {
                    return $usuario;
                } else {
                    return "Contraseña incorrecta.";
                }
            } else {
                return "Usuario no encontrado o inactivo.";
            }
        } catch (PDOException $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}

//$resultado = LoginModel::autenticar("scooby.doo@example.com", "password159");

//if ($resultado) {
//    echo "Autenticación exitosa. Usuario: " . print_r($resultado, true);
//} else {
//    echo "Error: " . $resultado;
//}

?>