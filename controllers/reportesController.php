<?php
require_once '../models/Reporte.php';
session_start();

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

    case "listarTodosReportes":
        $reporte = new Reporte();
        $reportes = $reporte->listarTodosReportes();
        echo json_encode($reportes);
    break;

    case "listarMisReportes":
        $reporte = new Reporte();
        $reportes = $reporte->listarMisReportes($_SESSION['idUsuario']);        
        echo json_encode($reportes);
    break;
}