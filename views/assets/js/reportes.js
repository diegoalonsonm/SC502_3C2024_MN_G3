$.ajax({
  url: '../controllers/reportesController.php?op=listarTodosReportes',
  method: "GET",
  dataType: 'json',
  success: function (data) {
    $('#tbReportes').DataTable({
      data: data,
      "columns": [
        { 'data': 'idReporte' },
        { 'data': 'comentario' },
        { 'data': 'fecha' },
        { 'data': 'codigo_alcantarilla' },
        { 'data': 'correo' },
        {
          'data': 'idEstado',
          render: function (data, type, row) {
            if (data == 1) {
              return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #28a745; color: white; font-size: 12px; font-weight: bold; text-align: center;">Activo</span>`;
            } else if (data == 2) {
              return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #dc3545; color: white; font-size: 12px; font-weight: bold; text-align: center;">Inactivo</span>`;
            } else if (data == 3) {
              return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #6c757d; color: white; font-size: 12px; font-weight: bold; text-align: center;">Pendiente</span>`;
            } else if (data == 4) {
              return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #E5C100; color: black; font-size: 12px; font-weight: bold; text-align: center;">En mantenimiento</span>`;
            } else {
              return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #6c757d; color: white; font-size: 12px; font-weight: bold; text-align: center;">Desconocido</span>`;
            }
          }
        }
      ]
    })
  },
  error: function (error) {
    console.log(error)
  }
})

$('#submitButton').on('click', (e) => {
  e.preventDefault();

  const comentario = $('#comentario').val();
  const alcantarilla = $('#alcantarilla').val();

  // Validación simple
  if (!comentario || alcantarilla === "0") {
    Swal.fire({
      icon: 'warning',
      title: 'Por favor completa todos los campos',
      showConfirmButton: true
    });
    return;
  }

  $.ajax({
    url: '../controllers/reportesController.php?op=crearReporte',
    type: 'POST',
    data: { comentario, alcantarilla },
    success: (data) => {
      try {
        const response = JSON.parse(data);
        if (response.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: '¡Reporte realizado con éxito!',
            text: 'Tu reporte ha sido registrado correctamente.',
            showConfirmButton: false,
            timer: 1500
          });
          $('#locationForm')[0].reset();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Hubo un problema',
            text: response.message || 'No se pudo completar el reporte.'
          });
        }
      } catch (error) {
        Swal.fire({
          icon: 'error',
          title: 'Error inesperado',
          text: 'No se pudo procesar la respuesta del servidor.'
        });
        console.error('Error al procesar la respuesta:', error, 'Respuesta:', data);
      }
    },
    error: (xhr, status, error) => {
      Swal.fire({
        icon: 'error',
        title: 'Error en la solicitud',
        text: 'Ocurrió un problema al realizar el reporte. Intenta de nuevo.'
      });
      console.error('Error AJAX:', status, error);
    }
  });
});
