$(document).ready(() => {
    $.ajax({
        url: '../controllers/mantenimientoController.php?op=listarAlcantarillas',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            var select = $('#alcantarilla')
            data.forEach(function (usuario) {
                select.append(`<option value="${usuario.idAlcantarilla}">${usuario.codigo}</option>`)
            })
        }
    })
})

$(document).ready(function () {
    $('#agregarAlcantarillabtn').click(function () {
        const idSensor = $('#idSensor').val();
        if (idSensor) {
            $.ajax({
                url: '../controllers/direccionController.php?op=obtenerUltimaDireccion',
                method: 'GET',
                dataType: 'json',
                success: function (direccionData) {
                    const idDireccion = direccionData.idDireccion;

                    const alcantarillaData = {
                        idSensor: idSensor,
                        idDireccion: idDireccion
                    };

                    $.ajax({
                        url: '../controllers/alcantarillaController.php?op=insertarAlcantarilla',
                        method: 'POST',
                        dataType: 'json',
                        data: alcantarillaData,
                        success: function (response) {
                            if (response.success) {
                                alert('Alcantarilla agregada con éxito.');
                                $('#agregarAlcantarilla').modal('hide');
                            } else {
                                alert('Error al agregar la alcantarilla: ' + response.error);
                            }
                        },
                        error: function (error) {
                            console.log("Error al insertar la alcantarilla:", error);
                        }
                    });
                },
                error: function (error) {
                    console.log("Error al obtener la última dirección:", error);
                }
            });
        } else {
            alert("Por favor, selecciona un sensor.");
        }
    });
});
