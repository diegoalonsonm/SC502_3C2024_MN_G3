$.ajax({
    url: '../controllers/alarmaController.php?op=listarAlarmasTabla',
    method: "GET",
    dataType: 'json',
    success: function (data) {      
        $('#tbAlarmas').DataTable({
            data: data,
            "columns": [
                {'data':'idAlarma'},
                {'data':'textoAlerta'},
                {'data':'correo'},
                {'data':'codigo'},                
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