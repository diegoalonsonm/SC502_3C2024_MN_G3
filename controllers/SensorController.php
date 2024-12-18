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


    case 'inactivarSensor':
        if (isset($_POST['idSensor'])) {
            $idSensor = $_POST['idSensor'];
            
            $resultado = Sensor::inactivarSensor($idSensor);
            
            if ($resultado) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No se pudo inactivar el sensor.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'ID del sensor no proporcionado.']);
        }
        break;
}

?>