$.ajax({
  url: "../controllers/SensorController.php?op=listarCantidadSensoresGrafico",
  type: "POST",
  data: {},
  contentType: false,
  processData: false,
  success: (datos) => {
    let sensores = JSON.parse(datos)
    let etiquetas = []
    let valores = []

    sensores.forEach((sensor) => {
      etiquetas.push(sensor.marca)
      valores.push(sensor.cantidad_sensores)
    });

    const barras = document.getElementById("graficoBarras")

    new Chart(barras, {
      type: "bar",
      data: {
        labels: etiquetas,
        datasets: [
          {
            label: "# de veces que un sensor ha sido utilizado",
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