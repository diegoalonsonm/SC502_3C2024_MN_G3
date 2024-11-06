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
                            <div class="container mt-4">
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
                            <div class="container mt-4">
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
                            <div class="container mt-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="card mb-2">
                                          <div class="card-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p>Coordenadas</p>                                               
                                            <div class="mt-2">
                                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Ver más</a>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Información del sensor</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                            <p>Id:</p>
                                            <p>Estado:</p>
                                            <p>Coordenadas:</p>
                                            <p>asdlksa:</p>   
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <a class="btn btn-success" href="dashboard.php?page=sensor-editar">Editar</a>
                                                <a class="btn btn-danger" href="#">Borrar</a>
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
                                                <a class="btn btn-success" href="#">Editar</a>
                                                <a class="btn btn-danger" href="#">Borrar</a>
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
                                                <a class="btn btn-success" href="#">Editar</a>
                                                <a class="btn btn-danger" href="#">Borrar</a>
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
                                                <a class="btn btn-success" href="#">Editar</a>
                                                <a class="btn btn-danger" href="#">Borrar</a>
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
                            <div class="container mt-4">
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
            case 'hacer-reporte':
              echo '
    <section class="hacer-reporte-form">
        <div class="container mt-4">
            <h2>Llena el formulario para realizar tu reporte: </h2>
            <form id="locationForm">

                <div class="mb-3 mt-5">
                    <label for="nombreCompleto" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="nombreCompleto" required>
                </div>

                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control" id="cedula" maxlength="9" pattern="\d{9}"
                        placeholder="123456789" required>
                    <div class="form-text text-white">Ingrese su número de cédula sin guiones ni espacios (9 dígitos).
                    </div>
                    <div class="invalid-feedback">La cédula debe tener exactamente 9 dígitos.</div>
                </div>

                <div class="mb-3">
                    <label for="provincia" class="form-label">Provincia</label>
                    <select id="provincia" class="form-select" required>
                        <option value="">Selecciona una provincia</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="canton" class="form-label">Cantón</label>
                    <select id="canton" class="form-select" required>
                        <option value="">Selecciona un cantón</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="distrito" class="form-label">Distrito</label>
                    <select id="distrito" class="form-select" required>
                        <option value="">Selecciona un distrito</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección exacta</label>
                    <input type="text" class="form-control" id="direccion">
                    <div class="form-text text-white">*Ingrese la dirección exacta donde se encuentra el problema o
                        alguna referencia.</div>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Adjunta una imagen</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*">
                    <div class="form-text text-white">*Adjuntar una imagen del problema puede ayudar a los especialistas a ver la gravedad.</div>
                </div>

                <button type="submit" class="btn">Realizar reporte</button>
            </form>
        </div>
    </section>';
              break;
            case 'sensor-editar':
              echo '
    <section class="editar-sensores">
        <div class="container mt-4">
            <h2>Editar sensor</h2>
            <form>
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id">
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" class="form-select">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="coordenadas" class="form-label">Coordenadas</label>
                    <input type="text" class="form-control" id="coordenadas">
                </div>
                <button type="submit" class="btn">Guardar cambios</button>
            </form>
        </div>
    </section>';
              break;
            case 'usuario-editar':
              echo '
              
              
              ';
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
</body>

</html>