$.ajax({
  url: '../controllers/UserController.php?op=registrarUsuario',
  type: 'POST', // Aquí usamos POST
  data: {
      nombre: $('#nombre').val(),
      primerApellido: $('#apellido1').val(),
      segundoApellido: $('#apellido2').val(),
      cedula: $('#cedula').val(),
      telefono: $('#telefono').val(),
      correo: $('#correo').val(),
      contrasena: $('#contrasena').val()
  },
  success: function(response) {
      console.log('Usuario registrado:', response);
      alert('Registro exitoso');
  },
  error: function(xhr, status, error) {
      console.error('Error:', error);
      alert('Error al registrar el usuario.');
  }
});
