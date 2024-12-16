<!DOCTYPE html>
<html lang="en">

<link>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alcantarillado Costa Rica</title>
<link rel="stylesheet" href="./assets/css/card_reportes.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

</head>

<body>
    <?php include './assets/componentes/header.php' ?>

    <div class="container mt-5">
        <div class="contenedor-reportes">
            <h1 class="text-center text-bold text-white">Mis Reportes</h1>
            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <div class="card p-5" style="background-color: #f0f0f0;">
                            <table id="tbMisReportes" class="table table-striped table-hover shadow">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Alcantarilla</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="btnCrearReporteIncio" class="contenedor-vacio">
                <p class="text-center">No tienes reportes aún. ¿Quieres crear uno?</p>
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-primary boton-crear-reporte">Crear nuevo reporte</a>
            </div>

        </div>

    </div>

    <?php include './assets/componentes/footer.php' ?>

    <div class="copyright">
        Copyright © 2024 Alcantarillado Costa Rica. All Rights Reserved.
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="./assets/js/tablaMisReportes.js"></script>

</html>