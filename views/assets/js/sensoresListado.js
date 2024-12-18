document.addEventListener('DOMContentLoaded', function () {
    const agregarAlcantarillaModal = document.getElementById('agregarAlcantarilla');

    agregarAlcantarillaModal.addEventListener('shown.bs.modal', function () {
        console.log("Modal abierto");
        cargarSensoresActivos();
    });
});

function cargarSensoresActivos() {
    console.log("cargarSensoresActivos se ejecutó");

    $.ajax({
        url: '../controllers/SensorController.php?op=listarSensoresActivos',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log("Respuesta de los sensores activos:", data);
            const idSensorSelect = document.getElementById('idSensor');
            idSensorSelect.innerHTML = '<option value="">Selecciona un sensor</option>';

            if (Array.isArray(data)) {
                data.forEach(sensor => {
                    const option = document.createElement('option');
                    option.value = sensor.idSensor;
                    option.textContent = sensor.codigo;
                    idSensorSelect.appendChild(option);
                });
            } else {
                console.error('La respuesta no es un arreglo válido de sensores');
            }
        },
        error: function (error) {
            console.error('Error al cargar los sensores activos:', error);
        }
    });
}
