<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alcantarillado Costa Rica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="icon" href="./assets/img/aya_logo.ico" type="image/x-icon">

</head>

<body>
    <?php include './assets/componentes/header.php' ?>

    <div class="d-flex justify-content-center align-items-center">
        <div class="container mx-auto">
            <div class="row">
                <div class="col">
                    <div class="card shadow-lg w-50 mx-auto">
                        <form action="../controllers/loginController.php" method="POST" class="p-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="./index.php" class="text-dark">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </a>
                                <h2 class="flex-grow-1 text-center m-0">Inicia Sesion</h2>
                                <div style="width: 24px;"></div>
                            </div>

                            <?php
                            if (isset($_SESSION['error'])) {
                                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                                unset($_SESSION['error']);
                            }
                            ?>

                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary px-4 mb-2">Ingresar</button>
                            <br>
                            <a href="registro.php">¿Aún no tienes una cuenta? Regístrate aquí</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        Copyright © 2024 Alcantarillado Costa Rica. All Rights Reserved.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>