<?php
if (!isset($_SESSION['idUsuario'])) {
  header('Location: login.php');
}
?>

<h1 class="text-center text-bold text-white">Alcantarillas</h1>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <div class="card p-5" style="background-color: #f0f0f0;">      
        <table id="tbAlcantarillas" class="table table-striped table-hover shadow">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Codigo</th>
              <th scope="col">Sensor</th>
              <th scope="col">Direccion</th>              
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
        <!-- Aquí se rellenarán los detalles de la dirección -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>