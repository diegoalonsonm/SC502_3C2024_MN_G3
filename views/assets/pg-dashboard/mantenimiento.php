<?php
if (!isset($_SESSION['idUsuario'])) {
  header('Location: login.php');
}
?>

<h1 class="text-center text-bold text-white">Mantenimiento</h1>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Crear nuevo tiquete
      </button>
    </div>
  </div>
</div>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <div class="card p-5" style="background-color: #f0f0f0;">      
        <table id="tbMantenimiento" class="table table-striped table-hover shadow">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Instrucciones</th>
              <th scope="col">Usuario</th>
              <th scope="col">Alcantarilla</th>
              <th scope="col">Fecha Inicio</th>
              <th scope="col">Fecha Fin</th>
              <th scope="col">Estado</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los datos solicitados</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="instrucciones" class="form-label">Instrucciones del mantenimiento</label>
            <input type="text" class="form-control" id="instrucciones" required>
          </div>
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario encargado</label>
            <select class="form-select" name="usuario" id="usuario" required>
              <option value="0">Seleccione un usuario</option>              
            </select>
          </div>
          <div class="mb-3">
            <label for="alcantarilla" class="form-label">Alcantarilla a trabajar</label>
            <select class="form-select" name="alcantarilla" id="alcantarilla" required>
              <option value="0">Seleccione una alcantarilla</option>              
            </select>
          </div>
          <div class="mb-3">
            <label for="fechaInicio" class="form-label">Inicio de mantenimiento</label>
            <input type="date" class="form-control" id="fechaInicio" required>
          </div>
          <div class="mb-3">
            <label for="fechaFin" class="form-label">Fin de mantenimiento</label>
            <input type="date" class="form-control" id="fechaFin" required>
          </div> 
          <button type="submit" class="btn btn-success">Crear</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>