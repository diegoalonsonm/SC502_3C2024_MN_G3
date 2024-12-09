<section class="editar-sensores">
  <div class="container mt-4">
    <h2 class="text-white">Editar sensor</h2>
    <form>
      <div class="mb-3">
        <label for="id" class="form-label text-white">ID</label>
        <input type="text" class="form-control" id="id" />
      </div>
      <div class="mb-3">
        <label for="estado" class="form-label text-white">Estado</label>
        <select id="estado" class="form-select">
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="coordenadas" class="form-label text-white"
          >Coordenadas</label
        >
        <input type="text" class="form-control" id="coordenadas" />
      </div>
      <button type="submit" class="btn btn-success text-white">
        Guardar cambios
      </button>
    </form>
  </div>
</section>
