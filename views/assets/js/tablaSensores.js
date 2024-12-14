$.ajax({
    url: '../controllers/SensorController.php?op=listarCantidadSensores',
    method: "GET",
    dataType: 'json',
    success: function (data) {
        $('#tbSensores').DataTable({
            data: data,
            "columns": [
                {'data' : 'idSensor'},
                {'data':'codigo'},
                {'data':'marca'},
                {'data':'idEstado',
                    render: function (data, type, row) {
                        if (data == 1) {
                          return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #28a745; color: white; font-size: 12px; font-weight: bold; text-align: center;">Activo</span>`;
                        } else if (data == 2) {
                          return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #dc3545; color: white; font-size: 12px; font-weight: bold; text-align: center;">Inactivo</span>`;
                        } else {
                          return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #6c757d; color: white; font-size: 12px; font-weight: bold; text-align: center;">Desconocido</span>`;
                        }
                      }
                }
            ]
        })
    }
});