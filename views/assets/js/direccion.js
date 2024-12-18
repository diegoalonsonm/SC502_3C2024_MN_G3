document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('guardarDireccionbtn').addEventListener('click', function () {
        const provinciaSelect = document.getElementById('provincia');
        const cantonSelect = document.getElementById('canton');
        const distritoSelect = document.getElementById('distrito');
        const otrasDirecciones = document.getElementById('otrasDirecciones').value;

        const provinciaNombre = provinciaSelect.selectedOptions[0].textContent;
        const cantonNombre = cantonSelect.selectedOptions[0].textContent;
        const distritoNombre = distritoSelect.selectedOptions[0].textContent;

        if (provinciaNombre && cantonNombre && distritoNombre && otrasDirecciones) {
            Swal.fire({
                title: 'Dirección seleccionada',
                html: `
                    <p>Provincia: ${provinciaNombre}</p>
                    <p>Cantón: ${cantonNombre}</p>
                    <p>Distrito: ${distritoNombre}</p>
                    <p>Otras: ${otrasDirecciones}</p>
                `,
                icon: 'info',
                confirmButtonText: 'Aceptar'
            });

            const direccionData = {
                provincia: provinciaNombre,
                canton: cantonNombre,
                distrito: distritoNombre,
                otrasDirecciones: otrasDirecciones,
            };

            enviarDireccion(direccionData);

            const modalDireccion = bootstrap.Modal.getInstance(document.getElementById('modalDireccion'));
            modalDireccion.hide();

            resetearCampos();
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Por favor, completa todos los campos de la dirección.',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            });
        }
    });
});

document.getElementById('guardarDireccionbtn').addEventListener('click', function () {
    const modalDireccion = bootstrap.Modal.getInstance(document.getElementById('modalDireccion'));
    modalDireccion.hide();

    const modalAgregarAlcantarilla = new bootstrap.Modal(document.getElementById('agregarAlcantarilla'));
    modalAgregarAlcantarilla.show();
});

function enviarDireccion(data) {
    fetch('../controllers/direccionController.php?op=insertarDireccion', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((result) => {
            if (result.success) {
                Swal.fire({
                    title: 'Éxito',
                    text: 'Dirección guardada con éxito.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Error al guardar la dirección: ' + result.error,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        })
        .catch((error) => {
            console.error('Error en la solicitud:', error);
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al guardar la dirección.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        });
}

function resetearCampos() {
    document.getElementById('direccionForm').reset();

    limpiarSelector('canton');
    limpiarSelector('distrito');
}

function limpiarSelector(id) {
    const select = document.getElementById(id);
    select.innerHTML = '<option value="">Selecciona una opción</option>';
}
