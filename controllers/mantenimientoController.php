<?php
require_once '../models/Mantenimiento.php';
session_start();

switch ($_GET["op"]) {
    case "listarTodosTiquetes":
        $mant = new Mantenimiento();
        $mants = $mant->listarTodosTiquetes();
        echo json_encode($mants);
    break;

    case "listarTodosTiquetesEmpleado":
        $mant = new Mantenimiento();
        $mants = $mant->listarTodosTiquetesEmpleado($_SESSION['idUsuario']);
        echo json_encode($mants);
    break;

    case "listarUsuariosMantenimiento":
        $mant = new Mantenimiento();
        $mants = $mant->listarUsuariosMantenimiento();
        echo json_encode($mants);
    break;
    
    case "listarAlcantarillas":
        $mant = new Mantenimiento();
        $mants = $mant->listarAlcantarillas();
        echo json_encode($mants);
    break;

    case "agregarNuevoTiquete":
        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
        $instrucciones = isset($_POST['instrucciones']) ? $_POST['instrucciones'] : null;
        $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
        $idAlcantarilla = isset($_POST['idAlcantarilla']) ? $_POST['idAlcantarilla'] : null;

        $mant = new Mantenimiento();

        $mant->setFechaInicio($fechaInicio);
        $mant->setFechaFin($fechaFin);
        $mant->setInstrucciones($instrucciones);
        $mant->setIdUsuario($idUsuario);
        $mant->setIdAlcantarilla($idAlcantarilla);

        $mant->agregarNuevoTiquete();

        echo "Se ha creado correctamente un nuevo tiquete";
        //echo json_encode(array(
        //    "fechaInicio" => $fechaInicio,
        //    "fechaFin" => $fechaFin,
        //    "instrucciones" => $instrucciones,
        //    "idUsuario" => $idUsuario,
        //    "idAlcantarilla" => $idAlcantarilla
        //));
    break;

    case "finalizarMantenimiento":
        $idMantenimiento = isset($_POST['idMantenimiento']) ? $_POST['idMantenimiento'] : null;

        $mant = new Mantenimiento();
        $mant->setIdMantenimiento($idMantenimiento);

        $mant->finalizarMantenimiento();

        echo "Se ha finalizado correctamente el mantenimiento";
        
        break;    

}