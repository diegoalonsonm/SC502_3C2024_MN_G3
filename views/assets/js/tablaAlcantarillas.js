$.ajax({
    url: '../controllers/alcantarillaController.php?op=listarAlcantarillasTabla',
    method: "GET",
    dataType: 'json',
    success: function (data) {        
        $('#tbAlcantarillas').DataTable({
            data: data,
            "columns": [
                {'data':'idAlcantarilla'},
                {'data':'codigo_alcantarilla'},
                {'data':'codigo_sensor'},
                {'data':'idDireccion',
                    render: function (data, type, row) {
                        return `<button class="btn btn-primary" onclick='verDireccion(${JSON.stringify(row)})'>Ver</button>`
                    }
                },                
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

const verDireccion = (row) => {
    $('#direccionModal .modal-body').html(`
        <p>Provincia: ${row.provincia}</p>
        <p>Canton: ${row.canton}</p>
        <p>Distrito: ${row.distrito}</p>
        <p>Otras direcciones: ${row.otrasDirecciones}</p>
        <p>Coordenadas X: ${row.coordenadasX}</p>
        <p>Coordenadas Y: ${row.coordenadasY}</p>
    `)
    $('#direccionModal').modal('show')
}