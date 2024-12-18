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
      <div class="mt-2">
        <div class="modal fade" id="agregarUsuario" tabindex="-1" aria-labelledby="agregarUsuarioModal"
        <div class="modal fade" id="agregarUsuario" tabindex="-1" aria-labelledby="agregarUsuarioModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="agregarUsuario">
                  Agregar usuario
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="formAgregarUsuario">
                  <div class="mb-3">

                    <label for="nombreAgregar" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreAgregar" required />
                  </div>
                  <div class="mb-3">
                    <label for="cedulaAgregar" class="form-label">Cédula</label>
                    <input type="text" class="form-control" id="cedulaAgregar" required />
                  </div>
                  <div class="mb-3">
                    <label for="correoAgregar" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correoAgregar" required />
                  </div>
                  <div class="mb-3">
                    <label for="telefonoAgregar" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefonoAgregar" required />
                    <input
                      type="text"
                      class="form-control"
                      id="nombre"
                      required />

                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>

                  </div>
                  <div class="mb-3">
                    <label for="apellido1" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido1" required>
                  </div>
                  <div class="mb-3">
                    <label for="apellido2" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2" required>
                  </div>
                  <div class="mb-3">
                    <label for="cedula" class="form-label">Cedula</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" required>
                  </div>
                  <div class="mb-3">
                    <label for="numero" class="form-label">Numero telefonico</label>
                    <input type="text" class="form-control" id="numero" name="numero" required>
                  </div>
                  <div class="mb-3">
                    <label for="correo" class="form-label">Correo electronico</label>
                    <input type="email" class="form-control" id="correo" name="correo"
                      aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                  </div>
                  <div class="mb-3">
                    <label for="rolAgregar" class="form-label">Rol</label>
                    <label for="rolAgregar">Seleccionar Rol:</label>
                    <select id="idRol" name="idRol" required>
                      <option value="">Cargando roles...</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal">
                      Cerrar
                    </button>
                    <button type="submit" id="agregarUsuariobtn" class="btn btn-primary">
                      Agregar usuario
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