<?php
require_once '../models/Direccion.php';

switch ($_GET['op']) {
    case 'insertarDireccion':
        $direccion = new Direccion();

        $data = json_decode(file_get_contents("php://input"), true);

        $provincia = $data['provincia'];
        $canton = $data['canton'];
        $distrito = $data['distrito'];
        $otrasDirecciones = $data['otrasDirecciones'];

        $resultado = $direccion->insertarDireccion($provincia, $canton, $distrito, $otrasDirecciones);
        echo json_encode($resultado);
        break;
    case 'obtenerUltimaDireccion':
        $direccion = new Direccion();

        // Obtener el último idDireccion
        $resultado = $direccion->obtenerUltimaDireccion();
        echo json_encode($resultado);
        break;
    default:
        echo json_encode(['error' => 'Operación no definida']);
        break;


}
