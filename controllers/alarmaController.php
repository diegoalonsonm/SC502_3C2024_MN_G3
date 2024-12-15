<?php
require_once '../models/Alarma.php';

switch ($_GET["op"]) {
    case "listarAlarmasTabla":
        $alarma = new Alarma();
        $alarmas = $alarma->listarAlarmasTabla();
        echo json_encode($alarmas);
    break;

}