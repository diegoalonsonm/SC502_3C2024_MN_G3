<div class="container ms-0 mt-3 text-white">
    <div class="row">
        <div class="col">
            <h1>
                Pagina principal
            </h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <h3>
                Nuestras estadisticas
            </h3>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <?php require_once 'pg-graficos/alcantarillas.php'; ?>
        </div>
        <div class="col-4">
            <?php require_once 'pg-graficos/alcantarillasMante.php'; ?>
        </div>
        <div class="col-4">
            <?php require_once 'pg-graficos/empleados.php'; ?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <?php require_once 'pg-graficos/reportes.php'; ?>
        </div>
        <div class="col-4">
            <?php require_once 'pg-graficos/reportesUsuario.php'; ?>
        </div>
        <div class="col-4">
            <?php require_once 'pg-graficos/sensores.php'; ?>
        </div>
    </div>
</div>