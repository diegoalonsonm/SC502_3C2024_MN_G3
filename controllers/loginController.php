<?php
session_start();
require_once "../models/loginModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $usuario = LoginModel::autenticar($correo, $password);

    if ($usuario) {
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['correo'] = $usuario['correo'];
        $_SESSION['idRol'] = $usuario['idRol'];

        header("Location: ../views/dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Correo o contraseña incorrectos.";
        header("Location: ../views/login.php");
        exit();
    }
}
?>