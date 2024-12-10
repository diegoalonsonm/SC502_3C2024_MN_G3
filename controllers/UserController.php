<?php
require_once '../models/User.php';
switch ($_GET["op"]) {
    case 'listarTabla':
        $Usua = new User();
        $Usuario = $Usua->listarTodosDb();
        echo json_encode($Usuario);
        break;
    case 'registrarUsuario':
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $apellido1 = isset($_POST["apellido1"]) ? trim($_POST["apellido1"]) : "";
        $apellido2 = isset($_POST["apellido2"]) ? trim($_POST["apellido2"]) : "";
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : "";
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";
        $estado = 1; // Estado activo por defecto
        $rol = 2; // Rol de usuario por defecto

        // Encriptamos la contraseña
        $clavehash = password_hash($contrasena, PASSWORD_BCRYPT);

        // Creamos el objeto de usuario
        $usuario = new User();
        $usuario->setCedula($cedula);

        // Verificamos si el usuario ya existe
        $existeUsuario = $usuario->verificarExistenciaDb();

        if (!$existeUsuario) {
            $usuario->setNombre($nombre);
            $usuario->setApellido1($apellido1);
            $usuario->setApellido2($apellido2);
            $usuario->setTelefono($telefono);
            $usuario->setCorreo($correo);
            $usuario->setContrasena($clavehash);
            $usuario->setIdEstado($estado);
            $usuario->setIdRol($rol);
            
            // Guardamos el usuario
            $resultado = $usuario->guardar();
            echo json_encode($resultado);
        } else {
            echo json_encode("El usuario ya existe.");
        }
        break;

    }


       
