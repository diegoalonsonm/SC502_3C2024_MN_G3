<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/dashboard.css">
  <link rel="stylesheet" href="./assets/css/mis-reportes.css">
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
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>username</strong>
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
          </ul>
        </div>

        <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          switch ($page) {
            case 'alarmas':
              echo '
                            <h1 class="text-center text-bold text-white">Alarmas</h1>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p># Sensor:</p>
                                            <p># Alcantarilla:</p>   
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p># Sensor:</p>
                                            <p># Alcantarilla:</p>   
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                    </div>  
                                    <div class="col">
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p># Sensor:</p>
                                            <p># Alcantarilla:</p>   
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p># Sensor:</p>
                                            <p># Alcantarilla:</p>   
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>                                                  
                        ';
              break;
            case 'usuarios':
              echo '
                            <h1 class="text-center text-bold text-white">Usuarios</h1>
                            <div class="container">
                                <div class="row">
                                    <div class="col">  
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Nombre</th>                                                  
                                                  <th scope="col">Cedula</th>
                                                  <th scope="col">Correo</th>
                                                  <th scope="col">Telefono</th>
                                                  <th scope="col">Rol</th>                                                 
                                                  <th scope="col">Estado</th>
                                                  <th scope="col">Acciones</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row">--</th>                                                  
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                </tr>
                                              </tbody>
                                        </table>                         
                                    </div>
                                </div>
                            </div>
                        ';
              break;
            case 'sensores':
              echo '
                            <h1 class="text-center text-bold text-white">Sensores</h1>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p>Coordeadas</p>                                               
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p>Coordeadas</p> 
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                    </div>  
                                    <div class="col">
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p>Coordeadas</p> 
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p>Coordeadas</p>  
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>                                       
                                    </div> 
                                </div>
                            </div>
                        ';
              break;
            case 'alcantarillas':
              echo '
                            <h1 class="text-center text-bold text-white">Alcantarillas</h1>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p># Sensor:</p>
                                            <p>Direccion:</p>   
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p># Sensor:</p>
                                            <p>Direccion:</p>   
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                    </div>  
                                    <div class="col">
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p># Sensor:</p>
                                            <p>Direccion:</p>   
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p># Sensor:</p>
                                            <p>Direccion:</p>   
                                            <div class="mt-2">
                                                <a class="btn btn-primary" href="#">Ver más</a>
                                            </div>                                                                                                                            
                                          </div>
                                        </div>                                       
                                    </div> 
                                </div>
                            </div>
                        ';
              break;
            case 'inicio':
              echo '<h1 class="text-white">Inicio</h1><p class="text-white">Bienvenido al dashboard.</p>';
              break;
            case 'mis-reportes':
              echo '
                  <section class="ver-reportes">
        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
            <div class="list-group d-grid gap-2 border-0 w-50">
                <h1 class="text-center text-white text-bold">Tus reportes</h1>
                <!-- Report items -->
                <label class="list-group-item rounded-3 py-3 label-custom-report">Reporte #4
                    <span class="d-block small opacity-50">Alcantarilla desbordada en San Carlos</span>
                    <div class="button-container">
                        <button class="btn-ver-mas-reportes"><a href="#">Ver más</a></button>
                    </div>
                </label>
                <label class="list-group-item rounded-3 py-3 label-custom-report">Reporte #3
                    <span class="d-block small opacity-50">Alcantarilla desbordada en San José</span>
                    <div class="button-container">
                        <button class="btn-ver-mas-reportes"><a href="#">Ver más</a></button>
                    </div>
                </label>
                <label class="list-group-item rounded-3 py-3 label-custom-report">Reporte #2
                    <span class="d-block small opacity-50">Alcantarilla desbordada en Alajuela</span>
                    <div class="button-container">
                        <button class="btn-ver-mas-reportes"><a href="#">Ver más</a></button>
                    </div>
                </label>
                <label class="list-group-item rounded-3 py-3 label-custom-report">Reporte #1
                    <span class="d-block small opacity-50">Alcantarilla desbordada en Heredia</span>
                    <div class="button-container">
                        <button class="btn-ver-mas-reportes"><a href="#">Ver más</a></button>
                    </div>
                </label>
            </div>
        </div>
    </section>';
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>