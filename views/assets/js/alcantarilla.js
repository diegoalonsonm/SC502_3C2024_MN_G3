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
                                Swal.fire({
                                    title: 'Éxito',
                                    text: 'Alcantarilla agregada con éxito.',
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar'
                                }).then(() => {
                                    $('#agregarAlcantarilla').modal('hide');
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Error al agregar la alcantarilla: ' + response.error,
                                    icon: 'error',
                                    confirmButtonText: 'Aceptar'
                                });
                            }
                        },
                        error: function (error) {
                            console.log("Error al insertar la alcantarilla:", error);
                            Swal.fire({
                                title: 'Error',
                                text: 'Hubo un error al insertar la alcantarilla.',
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    });
                },
                error: function (error) {
                    console.log("Error al obtener la última dirección:", error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un error al obtener la última dirección.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            });
        } else {
            Swal.fire({
                title: 'Advertencia',
                text: 'Por favor, selecciona un sensor.',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            });
        }
    });
});
