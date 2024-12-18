<?php
if (!isset($_SESSION['idUsuario'])) {
  header('Location: login.php');
}
?>

<h1 class="text-center text-bold text-white">Sensores</h1>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarSensor">
        Agregar Sensor
      </button>
    </div>
  </div>
</div>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <div class="card p-5" style="background-color: #f0f0f0;">
        <table id="tbSensores" class="table table-striped table-hover shadow">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Codigo</th>
              <th scope="col">Marca</th>
              <th scope="col">Estado</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="confirmModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar Acción</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Seguro que quieres marcar este sensor como inactivo?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Inactivar</button>
      </div>
    </div>
  </div>
</div>
<div
  class="modal fade"
  id="agregarSensor"
  tabindex="-1"
  aria-labelledby="agregarSensorModal"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="agregarSensor">
          Agregar Sensor
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formAgregarSensor">
          <div>
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal">
              Cerrar
            </button>
            <button type="submit" id="agregarSensorbtn" class="btn btn-primary">
              Agregar Sensor
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
