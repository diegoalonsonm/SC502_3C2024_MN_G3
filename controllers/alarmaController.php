<?php
require_once '../models/Alarma.php';

switch ($_GET["op"]) {
    case "listarAlarmasTabla":
        $alarma = new Alarma();
        $alarmas = $alarma->listarAlarmasTabla();
        echo json_encode($alarmas);
    break;

    case "actualizarEstadoAlarma":
        $idAlarma = isset($_POST['idAlarma']) ? $_POST['idAlarma'] : null;

        $alarma = new Alarma();
        $alarma->setIdAlarma($idAlarma);

        $alarma->actualizarEstadoAlarma();

        echo "Se ha actualizado correctamente el estado de la alarma";        
    break;
}
?>