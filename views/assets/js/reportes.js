$.ajax({
    url: '../controllers/reportesController.php?op=listarTodosReportes',
    method: "GET",
    dataType: 'json',
    aProcessing: true, //actiavmos el procesamiento de datatables
    aServerSide: true, //paginacion y filtrado del lado del serevr
    dom: 'Bfrtip', //definimos los elementos del control de 
    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
    success: function (data) {      
        $('#tbReportes').DataTable({
            data: data,
            "columns": [
                {'data':'idReporte'},
                {'data':'comentario'},
                {'data':'fecha'},
                {'data':'codigo_alcantarilla'},
                {'data':'correo'},
                {'data':'idEstado',
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

$("#locationForm").submit((e) => {
  e.preventDefault()

  const comentario = $('#comentario').val()
  const alcantarilla = $('#alcantarilla').val()
  const fecha = new Date().toISOString().split('T')[0]

  $.ajax({
    url: '../controllers/reportesController.php?op=crearReporte&comentario=' + comentario + '&alcantarilla=' + alcantarilla + '&fecha=' + fecha,
    type: 'POST',
    data: { comentario, alcantarilla, fecha },
    success: (data) => {
        Swal.fire({
            icon: 'success',
            title: 'Reporte registrado',
            showConfirmButton: false,
            timer: 1500
        })
    },
    error: (e) => {
        Swal.fire({
            icon: 'error',
            title: 'Error al registrar el reporte'
        })
        console.log(e)
      }
  })
})

$("#formAgregarReporteAdmn").submit((e) => {
  e.preventDefault()

  const comentario = $('#comentario').val()
  const alcantarilla = $('#alcantarilla').val()
  const fecha = new Date().toISOString().split('T')[0]

  $.ajax({
    url: '../controllers/reportesController.php?op=crearReporte&comentario=' + comentario + '&alcantarilla=' + alcantarilla + '&fecha=' + fecha,
    type: 'POST',
    data: { comentario, alcantarilla, fecha },
    success: (data) => {
        Swal.fire({
            icon: 'success',
            title: 'Reporte registrado',
            showConfirmButton: false,
            timer: 1500
        })
    },
    error: (e) => {
        Swal.fire({
            icon: 'error',
            title: 'Error al registrar el reporte'
        })
        console.log(e)
      }
  })
})