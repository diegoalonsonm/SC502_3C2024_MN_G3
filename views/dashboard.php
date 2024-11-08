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
                                            <th scope="row">1</th>                                                  
                                            <td>Charlotte Alfamo</td>
                                            <td>2012345678</td>
                                            <td>alfamo.char@example.com</td>
                                            <td>5557-1234</td>
                                            <td>Admin</td>
                                            <td>Activo</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"
                                                 data-bs-toggle="modal" data-bs-target="#editarUsuario">Editar</button>

<div class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="editarUsuarioModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                                                        <div class="modal-body">
                                                            <form id="formEditarUsuario">
                                                                <div class="mb-3">
                                                                    <label for="nombre" class="form-label">Nombre</label>
                                                                    <input type="text" class="form-control" id="nombre" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="cedula" class="form-label">Cédula</label>
                                                                    <input type="text" class="form-control" id="cedula" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="correo" class="form-label">Correo</label>
                                                                    <input type="email" class="form-control" id="correo" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="telefono" class="form-label">Teléfono</label>
                                                                    <input type="text" class="form-control" id="telefono" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="rol" class="form-label">Rol</label>
                                                                    <select class="form-select" id="rol" required>
                                                                        <option value="" disabled selected>Selecciona un rol</option>
                                                                        <option value="admin">Admin</option>
                                                                        <option value="usuario">Usuario</option>
                                                                        <option value="editor">Editor</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="estado" class="form-label">Estado</label>
                                                                    <select class="form-select" id="estado" required>
                                                                        <option value="" disabled selected>Selecciona un estado</option>
                                                                        <option value="activo">Activo</option>
                                                                        <option value="inactivo">Inactivo</option>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="button" class="btn btn-primary">Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <button class="btn btn-danger btn-sm">Borrar</button>
                                            </td>
                                        </tr>
                                        <!-- Puedes agregar más filas aquí -->
                                    </tbody>
                                </table>
                              <div class="mt-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarUsuario">Agregar Usuario</button>

<div class="modal fade" id="agregarUsuario" tabindex="-1" aria-labelledby="agregarUsuarioModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="agregarUsuario">Agregar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarUsuario">
                    <div class="mb-3">
                        <label for="nombreAgregar" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreAgregar" required>
                    </div>
                    <div class="mb-3">
                        <label for="cedulaAgregar" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedulaAgregar" required>
                    </div>
                    <div class="mb-3">
                        <label for="correoAgregar" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correoAgregar" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefonoAgregar" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefonoAgregar" required>
                    </div>
                    <div class="mb-3">
                        <label for="rolAgregar" class="form-label">Rol</label>
                        <select class="form-select" id="rolAgregar" required>
                            <option value="" disabled selected>Selecciona un rol</option>
                            <option value="admin">Admin</option>
                            <option value="usuario">Usuario</option>
                            <option value="editor">Editor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="estadoAgregar" class="form-label">Estado</label>
                        <select class="form-select" id="estadoAgregar" required>
                            <option value="" disabled selected>Selecciona un estado</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Agregar usuario</button>
            </div>
        </div>
    </div>
</div>
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
                                            <p>Antiguedad:</p>   
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary">Guardar</button>
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
                                            <p>Antiguedad:</p>   
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary">Guardar</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <a class="btn btn-success" href="dashboard.php?page=sensor-editar">Editar</a>
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
                                            <p>Antiguedad:</p>   
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary">Guardar</button>
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
                                            <p>Antiguedad:</p>   
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary">Guardar</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <a class="btn btn-success" href="dashboard.php?page=sensor-editar">Editar</a>
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
            case 'ver-reportes':
              echo '
                  <link rel="stylesheet" href="ver-reportes.css">
                  <section class="ver-reportes">
                      <div class="bg-color-reportes py-5">
                          <h1 class="text-center text-white mb-5">Ver Reportes</h1>     
                          <div class="row text-white text-center">
                              <div class="col"><strong>Reporte</strong></div>
                              <div class="col"><strong>Fecha</strong></div>
                              <div class="col"><strong>Dirección</strong></div>
                              <div class="col"><strong>Descripción</strong></div>
                              <div class="col"><strong>Acción</strong></div>
                          </div>
                          <hr class="bg-light">';
              $reportes = [
                ["Reporte #1", "2024-11-01", "Heredia", "Alcantarilla Bloqueada", "#"],
                ["Reporte #2", "2024-11-02", "Alajuela", "Alcantarilla no desbordada", "#"],
                ["Reporte #3", "2024-11-03", "San José", "Alcantarilla Bloqueada", "#"],
                ["Reporte #4", "2024-11-04", "San Carlos", "Alcantarilla desbordada", "#"],
                ["Reporte #5", "2024-11-05", "Cartago", "Alcantarilla desbordada", "#"]
              ];

              foreach ($reportes as $reporte) {
                echo '
                          <div class="row text-white text-center mb-2">
                              <div class="col">' . $reporte[0] . '</div>
                              <div class="col">' . $reporte[1] . '</div>
                              <div class="col">' . $reporte[2] . '</div>
                              <div class="col">' . $reporte[3] . '</div>
                              <div class="col"><a href="' . $reporte[4] . '" class="btn btn-primary btn-sm">Ver</a></div>
                          </div>
                          <hr class="bg-light">
                      ';
              }

              echo '
                      </div>
                  </section>';
              break;
            case 'sensor-editar':
              echo '
    <section class="editar-sensores">
        <div class="container mt-4">
            <h2 class="text-white">Editar sensor</h2>
            <form>
                <div class="mb-3">
                    <label for="id" class="form-label text-white">ID</label>
                    <input type="text" class="form-control" id="id">
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label text-white">Estado</label>
                    <select id="estado" class="form-select">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="coordenadas" class="form-label text-white">Coordenadas</label>
                    <input type="text" class="form-control" id="coordenadas">
                </div>
                <button type="submit" class="btn btn-success text-white">Guardar cambios</button>
            </form>
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

  <script src="./assets/js/cargar-ubicaciones.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>