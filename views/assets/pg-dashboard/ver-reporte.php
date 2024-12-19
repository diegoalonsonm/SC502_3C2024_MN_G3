<?php
if (!isset($_SESSION['idUsuario'])) {
  header('Location: login.php');
}
?>
<h1 class="text-center text-bold text-white">Reportes</h1>

<?php if ($_SESSION['idRol'] != 3): ?>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarReporte">
        Agregar Reporte
      </button>
    </div>
  </div>
</div>
<?php endif; ?>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <div class="card p-5" style="background-color: #f0f0f0;">
        <table id="tbReportes" class="table table-striped table-hover shadow">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Comentario</th>
              <th scope="col">Fecha</th>
              <th scope="col">Alcantarilla</th>
              <th scope="col">Usuario</th>
              <th scope="col">Estado</th>
              <?php if ($_SESSION['idRol'] == 1): ?>
                <th scope="col">Opciones</th>
              <?php endif; ?>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="agregarReporte" tabindex="-1" aria-labelledby="agregarReporteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="agregarReporte">
          Agregar Reporte
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formAgregarReporteAdmn">
          <div class="mb-3">
            <label for="comentario">Comentario</label>
            <textarea class="form-control" placeholder="Dejan aquí la situación" id="comentario"></textarea>
          </div>
          <div class="mb-3">
            <select class="form-select" name="alcantarilla" id="alcantarilla">
              <option value="0">Selecciona la alcantarilla</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cerrar
            </button>
            <button type="submit" id="agregarReportebtn" class="btn btn-primary">
              Agregar Reporte
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

<script>
  var userRole = <?php echo $_SESSION['idRol']; ?>;
</script>