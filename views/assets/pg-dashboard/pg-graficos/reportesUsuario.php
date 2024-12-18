<?php
if ($_SESSION['idRol'] == 1):
?>
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4>
                Usuarios con mayor cantidad de reportes
            </h4>
        </div>
        <canvas id="graficoBarraUsuario"></canvas>
    </div>
</div>
<?php endif; ?>

<script src="./plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./assets/js/graficos/reportesPorUsuario.js"></script>