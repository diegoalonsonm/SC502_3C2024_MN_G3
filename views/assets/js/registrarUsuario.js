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