$.ajax({
  url: '../controllers/UserController.php?op=listarTabla',
  method: "GET",
  dataType: 'json',
  success: function (data) {
    $('#tbUsuarios').DataTable({
      data: data,
      "columns": [
        { "data": "idUsuario" },
        { "data": "nombre" },
        { "data": "apellido1" },
        { "data": "apellido2" },
        { "data": "cedula" },
        { "data": "correo" },
        { "data": "telefono" },
        { "data": "idRol" 
          , render: function(data,type,row){
            if(data==1){
              return '<span>Administrador</span>'
            }else{
              return '<span>Usuario</span>'
            }
          }
        },
        {
          "data": 'idEstado',
          render: function (data, type, row) {
            if (data == 1) {
              return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #28a745; color: white; font-size: 12px; font-weight: bold; text-align: center;">Activo</span>`;
            } else if (data == 2) {
              return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #dc3545; color: white; font-size: 12px; font-weight: bold; text-align: center;">Inactivo</span>`;
            } else {
              return `<span style="display: inline-block; padding: 5px 10px; border-radius: 5px; background-color: #6c757d; color: white; font-size: 12px; font-weight: bold; text-align: center;">Desconocido</span>`;
            }
          }
        }
      
      ]
    });
  },
  error: function (xhr, status, error) {
    console.error("Error al cargar los datos: ", error);
    alert("No se pudieron cargar los datos.");
  }
});
