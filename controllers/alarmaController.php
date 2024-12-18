<?php
require_once '../models/Alarma.php';

switch ($_GET["op"]) {
    case "listarAlarmasTabla":
        $alarma = new Alarma();
        $alarmas = $alarma->listarAlarmasTabla();
        echo json_encode($alarmas);
    break;

    case "actualizarEstadoAlarma":
        if (isset($_POST['idAlarma']) && isset($_POST['nuevoEstado'])) {
            $idAlarma = $_POST['idAlarma'];
            $nuevoEstado = $_POST['nuevoEstado']; 

            // Verifica que los parámetros sean válidos
            if (!is_numeric($idAlarma) || !is_numeric($nuevoEstado)) {
                echo json_encode([
                    "success" => false, 
                    "message" => "Parámetros inválidos. idAlarma y nuevoEstado deben ser números."
                ]);
                break;
            }

            // Llama al modelo para actualizar el estado
            $resultado = Alarma::actualizarEstadoAlarma($idAlarma, $nuevoEstado);

            if ($resultado) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "Error al actualizar el estado"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Faltan parámetros (idAlarma o nuevoEstado)"]);
        }
        break;

    default:
        echo json_encode(["success" => false, "message" => "Operación no válida"]);
        break;
}
?>