$.ajax({
    url: "../controllers/UserController.php?op=listarEmpleadosActivosInactivosGrafico",
    type: "POST",
    data: {},
    contentType: false,
    processData: false,
    success: (datos) => {
      let empleados = JSON.parse(datos)
      let etiquetas = []
      let valores = []
  
      empleados.forEach((empleado) => {
        etiquetas.push(empleado.estado)
        valores.push(empleado.cantidad_empleados)
      });
  
      const barras = document.getElementById("graficoBarrasEmpleados")
  
      new Chart(barras, {
        type: "bar",
        data: {
          labels: etiquetas,
          datasets: [
            {
              label: "# de empleados activos/inactivos",
              data: valores,
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      })
    },
    error: function (e) {
      console.log(e.responseText);
    },
  })