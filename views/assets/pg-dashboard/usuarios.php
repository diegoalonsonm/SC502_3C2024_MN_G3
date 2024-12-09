<h1 class="text-center text-bold text-white">Usuarios</h1>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cedula</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Rol</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Charlotte Alfamo</td>
            <td>2012345678</td>
            <td>alfamo.char@example.com</td>
            <td>5557-1234</td>
            <td>Admin</td>
            <td>Activo</td>
            <td>
              <button
                class="btn btn-primary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#editarUsuario"
              >
                Editar
              </button>

              <div
                class="modal fade"
                id="editarUsuario"
                tabindex="-1"
                aria-labelledby="editarUsuarioModal"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Editar usuario
                      </h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <form id="formEditarUsuario">
                        <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre</label>
                          <input
                            type="text"
                            class="form-control"
                            id="nombre"
                            required
                          />
                        </div>
                        <div class="mb-3">
                          <label for="cedula" class="form-label">Cédula</label>
                          <input
                            type="text"
                            class="form-control"
                            id="cedula"
                            required
                          />
                        </div>
                        <div class="mb-3">
                          <label for="correo" class="form-label">Correo</label>
                          <input
                            type="email"
                            class="form-control"
                            id="correo"
                            required
                          />
                        </div>
                        <div class="mb-3">
                          <label for="telefono" class="form-label"
                            >Teléfono</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="telefono"
                            required
                          />
                        </div>
                        <div class="mb-3">
                          <label for="rol" class="form-label">Rol</label>
                          <select class="form-select" id="rol" required>
                            <option value="" disabled selected>
                              Selecciona un rol
                            </option>
                            <option value="admin">Admin</option>
                            <option value="usuario">Usuario</option>
                            <option value="editor">Editor</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="estado" class="form-label">Estado</label>
                          <select class="form-select" id="estado" required>
                            <option value="" disabled selected>
                              Selecciona un estado
                            </option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                      >
                        Cerrar
                      </button>
                      <button type="button" class="btn btn-primary">
                        Guardar cambios
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-danger btn-sm">Borrar</button>
            </td>
          </tr>
          <!-- Puedes agregar más filas aquí -->
        </tbody>
      </table>
      <div class="mt-2">
        <button
          class="btn btn-success"
          data-bs-toggle="modal"
          data-bs-target="#agregarUsuario"
        >
          Agregar Usuario
        </button>

        <div
          class="modal fade"
          id="agregarUsuario"
          tabindex="-1"
          aria-labelledby="agregarUsuarioModal"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="agregarUsuario">
                  Agregar usuario
                </h1>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <form id="formAgregarUsuario">
                  <div class="mb-3">
                    <label for="nombreAgregar" class="form-label">Nombre</label>
                    <input
                      type="text"
                      class="form-control"
                      id="nombreAgregar"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="cedulaAgregar" class="form-label">Cédula</label>
                    <input
                      type="text"
                      class="form-control"
                      id="cedulaAgregar"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="correoAgregar" class="form-label">Correo</label>
                    <input
                      type="email"
                      class="form-control"
                      id="correoAgregar"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="telefonoAgregar" class="form-label"
                      >Teléfono</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="telefonoAgregar"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="rolAgregar" class="form-label">Rol</label>
                    <select class="form-select" id="rolAgregar" required>
                      <option value="" disabled selected>
                        Selecciona un rol
                      </option>
                      <option value="admin">Admin</option>
                      <option value="usuario">Usuario</option>
                      <option value="editor">Editor</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="estadoAgregar" class="form-label">Estado</label>
                    <select class="form-select" id="estadoAgregar" required>
                      <option value="" disabled selected>
                        Selecciona un estado
                      </option>
                      <option value="activo">Activo</option>
                      <option value="inactivo">Inactivo</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Cerrar
                </button>
                <button type="button" class="btn btn-primary">
                  Agregar usuario
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
