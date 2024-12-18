<?php
if (!isset($_SESSION['idUsuario'])) {
  header('Location: login.php');
}
?>

<section class="hacer-reporte-form">
  <div class="container mt-4">
    <h2>Llena el formulario para realizar tu reporte:</h2>
    <form id="locationForm">
      <div class="mb-3">
        <label for="comentario">Comentario</label>
        <textarea class="form-control" placeholder="Déjanos aquí tu situación" id="comentario"></textarea>
      </div>
      <div class="mb-3">
        <label for="alcantarilla">Selecciona la alcantarilla que deseas reportar</label>
        <select class="form-select" name="alcantarilla" id="alcantarilla">
          <option value="0">Selecciona la alcantarilla</option>
        </select>
      </div>
      <button type="button" id="submitButton" class="btn">Realizar reporte</button>
    </form>
  </div>
</section>


<!--
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
</div> -->