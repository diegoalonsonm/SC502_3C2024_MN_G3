$(document).ready(() => {
    $.ajax({
        url: '../controllers/mantenimientoController.php?op=listarAlcantarillas',
        method: 'GET',
        dataType: 'json',
        success: function(data) {                   
            var select = $('#alcantarilla')
            data.forEach(function(usuario) {
                select.append(`<option value="${usuario.idAlcantarilla}">${usuario.codigo}</option>`)
            })
        }
    })
})