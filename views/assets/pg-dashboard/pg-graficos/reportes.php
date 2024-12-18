<?php
if ($_SESSION['idRol'] == 1):
?>
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4>
                Cantidad de reportes en las ultimas 8 semanas
            </h4>
        </div>
        <canvas id="graficoLineaReportes"></canvas>
    </div>
</div>
<?php endif; ?>

<script src="./plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./assets/js/graficos/reportes8semanas.js"></script>