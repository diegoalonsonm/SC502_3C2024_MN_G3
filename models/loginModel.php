<?php
require_once "../config/conexion.php";

class LoginModel
{
    public static function autenticar($correo, $password)
    {
        try {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM usuario WHERE correo = :correo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                if ($password == $usuario['contrasena']) {
                    return $usuario;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
}
?>