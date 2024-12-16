<?php
if (!isset($_SESSION['idUsuario'])) {
  header('Location: login.php');
}
?>

<section class="hacer-reporte-form">
  <div class="container mt-4">
    <h2>Llena el formulario para realizar tu reporte:</h2>
    <form id="locationForm">
      <div class="mb-3 mt-5">
        <label for="nombreCompleto" class="form-label">Nombre completo</label>
        <input type="text" class="form-control" id="nombreCompleto" required />
      </div>

      <div class="mb-3">
        <label for="cedula" class="form-label">Cédula</label>
        <input
          type="text"
          class="form-control"
          id="cedula"
          maxlength="9"
          pattern="\d{9}"
          placeholder="123456789"
          required
        />
        <div class="form-text text-white">
          Ingrese su número de cédula sin guiones ni espacios (9 dígitos).
        </div>
        <div class="invalid-feedback">
          La cédula debe tener exactamente 9 dígitos.
        </div>
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
        <input type="text" class="form-control" id="direccion" />
        <div class="form-text text-white">
          *Ingrese la dirección exacta donde se encuentra el problema o alguna
          referencia.
        </div>
      </div>

      <div class="mb-3">
        <label for="imagen" class="form-label">Adjunta una imagen</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" />
        <div class="form-text text-white">
          *Adjuntar una imagen del problema puede ayudar a los especialistas a
          ver la gravedad.
        </div>
      </div>

      <button type="submit" class="btn">Realizar reporte</button>
    </form>
  </div>
</section>
