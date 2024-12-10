<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/dashboard.css">
  <link rel="stylesheet" href="./assets/css/hacer-reportes.css">
  <link rel="stylesheet" href="./assets/css/mis-reportes.css">
  <link rel="stylesheet" href="./assets/css/ver-reportes.css">
  <link rel="stylesheet" href="./assets/css/editar-sensor.css">
</head>

<body>
  <nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar"
        aria-controls="offcanvasSidebar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php?page=inicio">Dashboard</a>
    </div>
  </nav>

  <?php include './assets/componentes/sidebarMovil.php'; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-lg-2 d-none d-md-block bg-dark text-white p-3">
        <a href="dashboard.php?page=inicio" class="h3 text-center text-decoration-none p-2">Dashboard</a>
        <?php include './assets/componentes/sidebar.php'; ?>
      </div>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-4 py-3">
        <div class="d-flex justify-content-end dropdown">
          <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">
            <strong><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?></strong>
          </a>

          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>

        <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          switch ($page) {
            case 'alarmas':
              require './assets/pg-dashboard/alarmas.php';
              break;
            case 'usuarios':

              require './assets/pg-dashboard/usuarios.php';
              break;
            case 'sensores':
              require './assets/pg-dashboard/sensores.php';
              break;
            case 'alcantarillas':
              require './assets/pg-dashboard/alcantarillas.php';
              break;
            case 'inicio':
              require './assets/pg-dashboard/inicio.php';
              break;
            case 'mis-reportes':
              require './assets/pg-dashboard/mis-reportes.php';
              break;
            case 'hacer-reporte':
              require './assets/pg-dashboard/hacer-reporte.php';
              break;
            case 'ver-reportes':
              require './assets/pg-dashboard/ver-reporte.php';
              break;
            case 'sensor-editar':
              require './assets/pg-dashboard/sensor-editar.php';
              break;
            case 'mantenimiento':
              require './assets/pg-dashboard/mantenimiento.php';
              break;
            default:
              echo '<h1 class="text-white">Contenido principal</h1><p class="text-white">Aquí va el contenido de la página.</p>';
              break;
          }
        } else {
          echo '<h1 class="text-white">Contenido principal</h1><p class="text-white">Aquí va el contenido de la página.</p>';
        }
        ?>
      </main>
    </div>
  </div>

  <script src="./assets/js/cargar-ubicaciones.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
  <script src="./assets/js/tablaUsuarios.js"></script>
  <script src="./plugins/jquery/jquery.min.js"></script>
</body>

</html>