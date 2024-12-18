<?php
require_once '../models/Sensor.php';

switch ($_GET["op"]) {
    case 'listarCantidadSensores':
        $sensores = Sensor::listarCantidadSensores();
        echo json_encode($sensores);
        break;

    case 'listarCantidadSensoresGrafico':
        $sensores = Sensor::listarCantidadSensoresGrafico();
        echo json_encode($sensores);
        break;

    case "listarSensoresActivos":
        $sensor = new Sensor();
        $sensores = $sensor->listarSensoresActivos();
        echo json_encode($sensores);
        break;
    default:
        echo json_encode(["error" => "Operación no válida"]);
        break;
}
