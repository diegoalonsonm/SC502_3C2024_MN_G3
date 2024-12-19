$.ajax({
  url: '../controllers/ReportesController.php?op=listarMisReportes',
  method: "GET",
  dataType: 'json',
  success: function (data) {
    $('#tbMisReportes').DataTable({
      data: data,
      "columns": [
        { 'data': 'idReporte' },
        { 'data': 'comentario' },
        { 'data': 'fecha' },
        { 'data': 'codigo_alcantarilla' },
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
            return `
                     <button class="btn btn-danger" onclick="cambiarEstadoReporte(${row.idReporte})">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14" height="14"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                     </button>`;
          }
        }
      ]
    })    
  },
  error: function (error) {
    console.log(error)
  }
})


