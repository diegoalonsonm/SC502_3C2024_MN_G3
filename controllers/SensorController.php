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
        $idSensor = isset($_POST['idSensor']) ? $_POST['idSensor'] : null;

        $sensor = new Sensor();
        $sensor->setIdSensor($idSensor);

        $sensor->inactivarSensor();

        echo "Se ha actualizado el estado del sensor";
        
        break;

    case "listarSensoresActivos":
        $sensor = new Sensor();
        $sensores = $sensor->listarSensoresActivos();
        echo json_encode($sensores);
        break;

 case 'AgregarSensor':
        $marca = isset($_POST["marca"]) ? $_POST["marca"] : "";

        $Sensor = new Sensor();

        $Sensor->setMarca($marca);
        $resultado = $Sensor->agregarSensor();

        echo 'Sensor registrado correctamente.';
  break;
    default:
        echo json_encode(["error" => "Operación no válida"]);

   
      
}
