$.ajax({
    url: '../controllers/MantenimientoController.php?op=listarTodosTiquetes',
    method: "GET",
    dataType: 'json',
    success: function (data) {                
        $('#tbMantenimiento').DataTable({
            data: data,
            "columns": [
                {'data':'idMantenimiento'},
                {'data':'instrucciones'},
                {'data':'usuario'},
                {'data':'alcantarilla'},
                {'data':'fechaInicio',
                    render: function (data, type, row) {
                        return new Date(data).toLocaleDateString();
                    }
                },
                {'data':'fechaFin',
                    render: function (data, type, row) {
                        return new Date(data).toLocaleDateString();
                    }
                },                
                {'data':'estado',
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

var today = new Date().toISOString().split('T')[0]
$('#fechaInicio').attr('min', today)

$('#fechaInicio').on('change', function() {
    var startDate = $(this).val()
    $('#fechaFin').attr('min', startDate)
})

$.ajax({
    url: '../controllers/mantenimientoController.php?op=listarUsuariosMantenimiento',
    method: 'GET',
    dataType: 'json',
    success: function(data) {            
        var select = $('#usuario')
        data.forEach(function(usuario) {
            select.append(`<option value="${usuario.idUsuario}">${usuario.correo}</option>`)
        })
    }
})

$.ajax({
    url: '../controllers/mantenimientoController.php?op=listarAlcantarillas',
    method: 'GET',
    dataType: 'json',
    success: function(data) {                   
        var select = $('#alcantarilla')
        data.forEach(function(usuario) {
            select.append(`<option value="${usuario.idAlcantarilla}">${usuario.codigo}</option>`)
        })
    }
})

$("form").submit((e) => {
    e.preventDefault()

    const instrucciones = $('#instrucciones').val()
    const usuario = $('#usuario').val()
    const alcantarilla = $('#alcantarilla').val()
    const fechaInicio = $('#fechaInicio').val()
    const fechaFin = $('#fechaFin').val()

    $.ajax({
        url: '../controllers/mantenimientoController.php?op=agregarNuevoTiquete&instrucciones=' +
            instrucciones + '&idUsuario=' + usuario + '&idAlcantarilla=' + alcantarilla + '&fechaInicio='
            + fechaInicio + '&fechaFin=' + fechaFin,
        type: 'POST',
        data: { instrucciones, usuario, alcantarilla, fechaInicio, fechaFin },
        success: function(data) {
            console.log(data)
            Swal.fire({
                icon: 'success',
                title: 'Tiquete registrado',
                text: 'El tiquete ha sido creado y asignado correctamente'
            })
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salió mal. Por favor, intenta de nuevo.'
            });
        }
    })
})