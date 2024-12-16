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
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $instrucciones = $_POST['instrucciones'];
        $idUsuario = $_POST['idUsuario'];
        $idAlcantarilla = $_POST['idAlcantarilla'];

        $mant = new Mantenimiento();

        $mant->setFechaInicio($fechaInicio);
        $mant->setFechaFin($fechaFin);
        $mant->setInstrucciones($instrucciones);
        $mant->setIdUsuario($idUsuario);
        $mant->setIdAlcantarilla($idAlcantarilla);

        $mant->agregarNuevoTiquete();

        echo "Se ha creado correctamente un nuevo tiquete";        
    break;

}