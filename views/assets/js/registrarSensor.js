
$("#formAgregarSensor").submit((e) => { 

    const marca = $('#marca').val()
   

    e.preventDefault()

    $.ajax({
        url: '../controllers/SensorController.php?op=AgregarSensor&marca=' + marca,
        type: 'POST',
        data: { marca },
        success: (data) => {
            console.log(marca)
            Swal.fire({
                icon: 'success',
                title: 'Sensor registrado',
                showConfirmButton: false,
               
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