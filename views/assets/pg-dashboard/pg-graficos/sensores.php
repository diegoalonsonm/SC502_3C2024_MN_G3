<?php
if ($_SESSION['idRol'] == 1 || $_SESSION['idRol'] == 3):
?>
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4>
                Sensores por marca
            </h4>
        </div>
        <canvas id="graficoBarras"></canvas>
    </div>
</div>
<?php endif; ?>

<script src="./plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./assets/js/graficos/sensores.js"></script>