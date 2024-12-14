<?php
require_once '../models/Reporte.php';

switch ($_GET["op"]) {
    case "listarReportesUltimas8Semanas":
        $reporte = new Reporte();
        $reportes = $reporte->listarReportesUltimas8Semanas();
        echo json_encode($reportes);
    break;

    case "listarReportesPorUsuario":
        $reporte = new Reporte();
        $reportes = $reporte->listarReportesPorUsuario();
        echo json_encode($reportes);
    break;
}