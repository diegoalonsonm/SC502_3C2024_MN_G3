<?php
if (!isset($_SESSION['idUsuario'])) {
  header('Location: login.php');
}
?>

<h1 class="text-center text-bold text-white">Alcantarillas</h1>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarAlcantarilla">
        Agregar Alcantarilla
      </button>
    </div>
  </div>
</div>
<div class="container mt-4">

  <div class="row">
    <div class="col">

      <div class="card p-5" style="background-color: #f0f0f0;">
        <table id="tbAlcantarillas" class="table table-striped table-hover shadow">

          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Código</th>
              <th scope="col">Sensor</th>
              <th scope="col">Dirección</th>
              <th scope="col">Estado</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="direccionModal" tabindex="-1" aria-labelledby="direccionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="direccionModalLabel">Detalles de la Dirección</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="direccionDetalles"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="agregarAlcantarilla" tabindex="-1" aria-labelledby="agregarAlcantarillaModal"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="agregarAlcantarillaModal">Agregar Alcantarilla</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formAgregarAlcantarilla">
          <div class="mb-3">
            <label for="idSensor" class="form-label">Sensor</label>
            <select class="form-control" id="idSensor" required>
              <option value="">Selecciona un sensor</option>
            </select>
          </div>
          <div class="mb-3">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDireccion">
              Seleccionar Dirección
            </button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="agregarAlcantarillabtn" class="btn btn-primary">Agregar Alcantarilla</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalDireccion" tabindex="-1" aria-labelledby="modalDireccionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDireccionLabel">Seleccionar Dirección</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="direccionForm">
          <div class="mb-3">
            <label for="provincia" class="form-label">Provincia</label>
            <select class="form-select" id="provincia" required>
              <option value="">Selecciona una provincia</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="canton" class="form-label">Cantón</label>
            <select class="form-select" id="canton" required>
              <option value="">Selecciona un cantón</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="distrito" class="form-label">Distrito</label>
            <select class="form-select" id="distrito" required>
              <option value="">Selecciona un distrito</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="otrasDirecciones" class="form-label">Otras Direcciones</label>
            <textarea class="form-control" id="otrasDirecciones" rows="3" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="guardarDireccionbtn" class="btn btn-primary">Guardar Dirección</button>
      </div>
    </div>
  </div>
</div>