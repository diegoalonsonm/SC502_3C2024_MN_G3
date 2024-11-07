<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alcantarillado Costa Rica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<header>
        <nav>
            <div class="nav-logo">
                <a href="index.php"><img src="assets/img/aya_logo.png" alt=""></a>
            </div>
            <div class="nav-container">
                <ul class="nav-links">
                    <li class="link"><a href="alertas.php">Alertas</a></li>
                    <li class="link"><a href="Mapa.php">Mapa</a></li>
                    <li class="link"><a href="reportes.php">Reportar</a></li>
                </ul>
            </div>
            <a href="#"><button class="btn-login"><i class="fa-solid fa-right-to-bracket"></i></button></a>
        </nav>
    </header>
    
<div class="d-flex justify-content-center align-items-center">
    <div class="container mx-auto">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg w-50 mx-auto">
                    <form action="" class="p-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="" class="text-dark">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                            <h2 class="flex-grow-1 text-center m-0">Crear una cuenta</h2>
                            <div style="width: 24px;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" required>
                        </div>
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control" id="cedula" required>
                        </div>
                        <div class="mb-3">
                            <label for="numero" class="form-label">Numero telefonico</label>
                            <input type="text" class="form-control" id="numero" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo electronico</label>
                            <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-2">Crear</button>
                        <br>
                        <a href="login.php">¿Ya tienes una cuenta? Inicia sesion</a>
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
