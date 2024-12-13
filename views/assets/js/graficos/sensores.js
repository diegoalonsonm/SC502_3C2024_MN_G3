$.ajax({
  url: "../controllers/SensorController.php?op=listarCantidadSensores",
  type: "POST",
  data: {},
  contentType: false,
  processData: false,
  success: (datos) => {
    let sensores = JSON.parse(datos)
    let etiquetas = []
    let valores = []

    console.log(sensores)

    sensores.forEach((sensor) => {
      etiquetas.push(sensor.codigo_sensor)
      valores.push(sensor.veces_utilizado)
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