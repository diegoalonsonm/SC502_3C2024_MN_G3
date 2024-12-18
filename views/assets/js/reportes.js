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
        },
        {
          'data': null,
          render: function (data, type, row) {
            if (userRole == 1) {
              return `
              <button class="btn btn-success" onclick="editarReporte(${row.idReporte})">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14">
                  <path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                </svg>
              </button>
              <button class="btn btn-danger" onclick="cambiarEstadoReporte(${row.idReporte})">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14" height="14">
                  <path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                </svg>
              </button>
            `;
            } else {
              return ``;
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

function cambiarEstadoReporte(idReporte) {
  Swal.fire({
    title: '¿Estás seguro?',
    text: "Una vez finalizado, no podrás revertir esta acción.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: '../controllers/reportesController.php?op=desactivar&idReporte=' + idReporte,
        type: 'POST',
        data: { idReporte: idReporte },
        success: function (response) {
          Swal.fire(
            'Finalizado',
            'El reporte ahora está eliminado.',
            'success'
          ).then(() => {
            location.reload();
          });
        },
        error: function (error) {
          console.log(error);
          Swal.fire(
            'Error!',
            'Hubo un problema al eliminar el reporte.',
            'error'
          );
        }
      });
    }
  });
}
