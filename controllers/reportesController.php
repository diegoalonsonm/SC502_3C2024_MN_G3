<?php
require_once '../models/Reporte.php';

switch ($_GET["op"]) {
    case "listarReportesUltimas8SemanasGrafico":
        $reporte = new Reporte();
        $reportes = $reporte->listarReportesUltimas8SemanasGrafico();
        echo json_encode($reportes);
    break;

    case "listarReportesPorUsuarioGrafico":
        $reporte = new Reporte();
        $reportes = $reporte->listarReportesPorUsuarioGrafico();
        echo json_encode($reportes);
    break;
}