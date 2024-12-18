<?php
require_once '../models/User.php';

switch ($_GET["op"]) {
    case 'listarTabla':
        $Usua = new User();
        $Usuario = $Usua->listarTodosDb();
        echo json_encode($Usuario);
        break;

    case 'registroDesdeLanding':
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $apellido1 = isset($_POST["apellido1"]) ? $_POST["apellido1"] : "";
        $apellido2 = isset($_POST["apellido2"]) ? $_POST["apellido2"] : "";
        $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
        $cedula = isset($_POST["cedula"]) ? $_POST["cedula"] : "";
        $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
        $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";

        $contraHash = password_hash($contrasena, PASSWORD_DEFAULT);

        $usuario = new User();
        $usuario->setCedula($cedula);

        $usuario->setNombre($nombre);
        $usuario->setApellido1($apellido1);
        $usuario->setApellido2($apellido2);
        $usuario->setTelefono($telefono);
        $usuario->setCorreo($correo);
        $usuario->setContrasena($contraHash);

        $resultado = $usuario->registroDesdeLanding();

        echo 'Usuario registrado correctamente.';
        break;

    case 'AgregarComoAdmn':
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $apellido1 = isset($_POST["apellido1"]) ? $_POST["apellido1"] : "";
        $apellido2 = isset($_POST["apellido2"]) ? $_POST["apellido2"] : "";
        $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
        $cedula = isset($_POST["cedula"]) ? $_POST["cedula"] : "";
        $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
        $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
        $rol = isset($_POST["rol"]) ? $_POST["rol"] : "";

        $contraHash = password_hash($contrasena, PASSWORD_DEFAULT);

        $usuario = new User();
        $usuario->setCedula($cedula);
        $usuario->setNombre($nombre);
        $usuario->setApellido1($apellido1);
        $usuario->setApellido2($apellido2);
        $usuario->setTelefono($telefono);
        $usuario->setCorreo($correo);
        $usuario->setContrasena($contraHash);
        $usuario->setIdRol($rol);

        $resultado = $usuario->AgregarUsuarioAdmn();
        echo 'Usuario registrado correctamente.';
        break;

        case 'obtenerRoles':
            $user = new User();
            $usuario=$user->obtenerRoles();
            echo json_encode($usuario);
            break;

    case "listarEmpleadosActivosInactivosGrafico":
        $user = new User();
        $empleados = $user->listarEmpleadosActivosInactivosGrafico();
        echo json_encode($empleados);
        break;
}
