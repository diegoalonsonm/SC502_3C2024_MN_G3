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

            $resultado = Alarma::actualizarEstadoAlarma($idAlarma, $nuevoEstado);

            if ($resultado) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "Error al actualizar estado"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Faltan parámetros"]);
        }
        break;
}
?>