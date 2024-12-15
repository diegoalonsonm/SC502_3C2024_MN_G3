<?php
require_once '../models/Alcantarilla.php';

switch ($_GET["op"]) {
    case "listarAlcantarillasProvinciaGrafico":
        $alcantarilla = new Alcantarilla();
        $alcantarillas = $alcantarilla->listarAlcantarillasProvinciaGrafico();
        echo json_encode($alcantarillas);
    break;

    case "listarAlcantarillasEnMantenimientoGrafico":
        $alcantarilla = new Alcantarilla();
        $alcantarillas = $alcantarilla->listarAlcantarillasEnMantenimientoGrafico();
        echo json_encode($alcantarillas);
    break;

    case "listarAlcantarillasTabla":
        $alcantarilla = new Alcantarilla();
        $alcantarillas = $alcantarilla->listarAlcantarillasTabla();
        echo json_encode($alcantarillas);
    break;
}