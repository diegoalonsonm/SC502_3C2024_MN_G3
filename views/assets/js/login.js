$('#loginForm').on('submit', (e) => {
    e.preventDefault()

    const correo = $('#correo').val()
    const password = $('#password').val()

    $.ajax({
        url: '../controllers/loginController.php?op=login',
        type: 'POST',
        data: {correo, password},
        success: (datos) => {
            console.log(datos)
            console.log(correo, password)
        }
    })
})