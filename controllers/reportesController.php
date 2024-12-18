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

    case "crearReporte":
        $comentario = isset($_POST["comentario"]) ? $_POST["comentario"] : "";
        $alcantarilla = isset($_POST["alcantarilla"]) ? $_POST["alcantarilla"] : "";
        $fecha = date('Y-m-d H:i:s'); // Fecha actual
        $usuario = isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : "";

        if (empty($usuario)) {
            echo json_encode(['status' => 'error', 'message' => 'Usuario no autenticado']);
            exit;
        }

        $reporte = new Reporte();
        $reporte->setComentario($comentario);
        $reporte->setIdAlcantarilla($alcantarilla);
        $reporte->setFecha($fecha);
        $reporte->setIdUsuario($usuario);

        $resultado = $reporte->crearReporte();

        echo $resultado;
        break;
    case "desactivar":
        $idReporte = isset($_POST['idReporte']) ? $_POST['idReporte'] : null;

        $reporte = new Reporte();
        $reporte->setIdReporte($idReporte);

        $reporte->desactivar();

        echo json_encode(["status" => "success", "message" => "Se ha cambiado el estado del reporte a Inactivo."]);

        break;


}