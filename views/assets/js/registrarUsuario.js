function registrarUsuario() {
  // Obtener los valores de los campos del formulario
  const nombre = $("#nombre").val().trim();
  const apellido1 = $("#apellido1").val().trim();
  const apellido2 = $("#apellido2").val().trim();
  const telefono = $("#telefono").val().trim();
  const cedula = $("#cedula").val().trim();
  const correo = $("#correo").val().trim();
  const contrasena = $("#contrasena").val().trim();

  // Verificar que los campos no estén vacíos
  if (!nombre || !apellido1 || !apellido2 || !telefono || !cedula || !correo || !contrasena) {
      alert("Por favor, complete todos los campos.");
      return;
  }

  // Crear un objeto con los datos
  const datos = {
      nombre: nombre,
      apellido1: apellido1,
      apellido2: apellido2,
      telefono: telefono,
      cedula: cedula,
      correo: correo,
      contrasena: contrasena,
      action: "registrarUsuario" // Acción para el servidor
  };

  // Enviar la solicitud al servidor con $.ajax
  $.ajax({
      url: "ruta_del_servidor.php", // Ruta al archivo PHP que maneja el registro
      type: "POST",
      data: datos, // Enviar los datos como parámetros
      success: function(response) {
          // Manejo de la respuesta del servidor
          if (response === true) {
              alert("Usuario registrado exitosamente.");
          } else if (response === "El usuario ya existe.") {
              alert("Este usuario ya está registrado.");
          } else {
              alert("Hubo un error al registrar el usuario.");
          }
      },
      error: function(xhr, status, error) {
          // Manejo de errores
          console.error("Error:", error);
          alert("Hubo un problema con la solicitud.");
      }
  });
}

// Asignar la función al evento de un botón de registro
$("#registrarBtn").on("click", registrarUsuario);