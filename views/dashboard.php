<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
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
            <div class="text-end">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle text-secondary" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </a>
            </div>
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'alarmas':
                        echo '
                            <h1>Alarmas</h1>
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
                            <h1>Usuarios</h1>
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
                            <h1>Sensores</h1>
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
                            <h1>Alcantarillas</h1>
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
                        echo '<h1>Inicio</h1><p>Bienvenido al dashboard.</p>';
                        break;
                    default:
                        echo '<h1>Contenido principal</h1><p>Aquí va el contenido de la página.</p>';
                        break;
                }
            } else {
                echo '<h1>Contenido principal</h1><p>Aquí va el contenido de la página.</p>';
            }
            ?>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>