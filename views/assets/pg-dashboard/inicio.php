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
        <div class="col-6">
            <?php require_once 'pg-graficos/barras.php'; ?>
        </div>
        <div class="col-6">
            <?php require_once 'pg-graficos/pie.php'; ?>
        </div>
    </div>
</div>