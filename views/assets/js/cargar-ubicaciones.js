document.addEventListener('DOMContentLoaded', function () {
    cargarProvincias();
});

function cargarProvincias() {
    fetch('https://ubicaciones.paginasweb.cr/provincias.json')
        .then(response => response.json())
        .then(data => {
            const provinciaSelect = document.getElementById('provincia');
            for (const id in data) {
                const option = document.createElement('option');
                option.value = id;
                option.textContent = data[id];
                provinciaSelect.appendChild(option);
            }
        })
        .catch(error => console.error('Error al cargar provincias:', error));
}

document.getElementById('provincia').addEventListener('change', function () {
    const provinciaId = this.value;
    if (provinciaId) {
        cargarCantones(provinciaId);
    } else {
        limpiarSelector('canton');
        limpiarSelector('distrito');
    }
});

function cargarCantones(provinciaId) {
    fetch(`https://ubicaciones.paginasweb.cr/provincia/${provinciaId}/cantones.json`)
        .then(response => response.json())
        .then(data => {
            limpiarSelector('canton');
            limpiarSelector('distrito');
            limpiarSelector('distrito');
            const cantonSelect = document.getElementById('canton');
            for (const id in data) {
                const option = document.createElement('option');
                option.value = id;
                option.textContent = data[id];
                cantonSelect.appendChild(option);
            }
        })
        .catch(error => console.error('Error al cargar cantones:', error));
}


document.getElementById('canton').addEventListener('change', function () {
    const provinciaId = document.getElementById('provincia').value;
    const cantonId = this.value;
    if (provinciaId && cantonId) {
        cargarDistritos(provinciaId, cantonId);
    } else {
        limpiarSelector('distrito');
    }
});

function cargarDistritos(provinciaId, cantonId) {
    fetch(`https://ubicaciones.paginasweb.cr/provincia/${provinciaId}/canton/${cantonId}/distritos.json`)
        .then(response => response.json())
        .then(data => {
            limpiarSelector('distrito');
            const distritoSelect = document.getElementById('distrito');
            for (const id in data) {
                const option = document.createElement('option');
                option.value = id;
                option.textContent = data[id];
                distritoSelect.appendChild(option);
            }
        })
        .catch(error => console.error('Error al cargar distritos:', error));
}

function limpiarSelector(id) {
    const select = document.getElementById(id);
    select.innerHTML = '<option value="">Selecciona una opción</option>';
}