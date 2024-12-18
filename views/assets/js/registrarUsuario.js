$("form").submit((e) => {
    e.preventDefault()

    const nombre = $('#nombre').val()
    const apellido1 = $('#apellido1').val()
    const apellido2 = $('#apellido2').val()
    const correo = $('#correo').val()
    const contrasena = $('#contrasena').val()
    const telefono = $('#numero').val()
    const cedula = $('#cedula').val()

    $.ajax({
        url: '../controllers/UserController.php?op=registroDesdeLanding&nombre=' + nombre + '&apellido1=' + apellido1 + '&apellido2=' + apellido2 + '&correo=' + correo + '&contrasena=' + contrasena + '&telefono=' + telefono + '&cedula=' + cedula,
        type: 'POST',
        data: { nombre, apellido1, apellido2, correo, contrasena, telefono, cedula },
        success: (data) => {
            Swal.fire({
                icon: 'success',
                title: 'Usuario registrado',
                showConfirmButton: false,
                timer: 1500
            })
            setTimeout(() => {
                window.location.href = 'login.php'
            }, 1500)
        },
        error: (e) => {
            Swal.fire({
                icon: 'error',
                title: 'Error al registrar el usuario'
            })
            console.log(e)
        }
    })
})



$(document).ready(function () {
    $.ajax({
        url: '../controllers/UserController.php?op=obtenerRoles',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.error) {
                alert('Error: ' + data.error);
                return;
            }

            let select = $('#idRol');
            select.empty();
            select.append('<option value="">Seleccionar Rol</option>');

            data.forEach(rol => {
                select.append(`<option value="${rol.idRol}">${rol.descrpcion}</option>`);
            });
        },
        error: function (xhr, status, error) {
            alert('Error al cargar los roles: ' + error);
        }
    });
});

$("form").submit((e) => {

    const nombre = $('#nombre').val()
    const apellido1 = $('#apellido1').val()
    const apellido2 = $('#apellido2').val()
    const correo = $('#correo').val()
    const contrasena = $('#contrasena').val()
    const telefono = $('#telefono').val()
    const cedula = $('#cedula').val()
    const rol = $('#rol').val()

    e.preventDefault()

    $.ajax({
        url: '../controllers/UserController.php?op=AgregarComoAdmn&nombre=' + nombre + '&apellido1=' + apellido1 + '&apellido2=' + apellido2 + '&correo=' + correo + '&contrasena=' + contrasena + '&telefono=' + telefono + '&cedula=' + cedula + '&idRol=' + rol,
        type: 'POST',
        data: { nombre, apellido1, apellido2, correo, contrasena, telefono, cedula, rol },
        success: (data) => {
            Swal.fire({
                icon: 'success',
                title: 'Usuario registrado',
                showConfirmButton: false,
                timer: 1500
            })

        },
        error: (e) => {
            Swal.fire({
                icon: 'error',
                title: 'Error al registrar el usuario'
            })
            console.log(e)
        }
    });
})