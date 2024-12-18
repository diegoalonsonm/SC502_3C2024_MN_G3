<h1 class="text-center text-bold text-white">Usuarios</h1>

<div class="container mt-4">
  <div class="row">
    <div class="col">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarUsuario">
        Agregar Usuario
      </button>
    </div>
  </div>
</div>

<div class="container mt-4">
  <div class="row">
    <div class="col">
      <div class="card py-3 px-5" style="background-color: #f0f0f0;">
        <table id="tbUsuarios" class="display table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Primer Apellido</th>
              <th scope="col">Segundo Apellido</th>
              <th scope="col">Cedula</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Rol</th>
              <th scope="col">Estado</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
        </table>
      </div>      
    </div>
  </div>
</div>

<div class="modal fade" id="agregarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formAgregarUsuario">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" required>            
          </div>
          <div class="mb-3">
            <label for="apellido1" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="apellido1" required>            
          </div>
          <div class="mb-3">
            <label for="apellido2" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="apellido2" required>            
          </div>
          <div class="mb-3">
            <label for="cedula" class="form-label">Cedula</label>
            <input type="text" class="form-control" id="cedula" required>            
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" required>            
          </div>
          <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="contrasena" required>            
          </div>
          <div class="mb-3">
            <label for="numero" class="form-label">Numero</label>
            <input type="text" class="form-control" id="numero" required>            
          </div>
          <div class="mb-3">
            <label for="idRol" class="form-label">Rol</label>
            <select class="form-select" name="rol" id="idRol" required>
              <option value="0">Seleccione el rol del usuario</option>              
            </select>
          </div>       
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>

