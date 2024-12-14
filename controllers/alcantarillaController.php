<?php
require_once '../models/Alcantarilla.php';

switch ($_GET["op"]) {
    case "listarAlcantarillasProvincia":
        $alcantarilla = new Alcantarilla();
        $alcantarillas = $alcantarilla->listarAlcantarillasProvincia();
        echo json_encode($alcantarillas);
    break;

    case "listarAlcantarillasEnMantenimiento":
        $alcantarilla = new Alcantarilla();
        $alcantarillas = $alcantarilla->listarAlcantarillasEnMantenimiento();
        echo json_encode($alcantarillas);
    break;
}