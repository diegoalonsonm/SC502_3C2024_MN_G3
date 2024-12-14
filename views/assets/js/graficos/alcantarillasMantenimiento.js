$.ajax({
    url: "../controllers/alcantarillaController.php?op=listarAlcantarillasEnMantenimientoGrafico",
    type: "POST",
    data: {},
    contentType: false,
    processData: false,
    success: (datos) => {
      let alcantarillas = JSON.parse(datos)
      let etiquetas = []
      let valores = []
  
      alcantarillas.forEach((alcantarilla) => {
        etiquetas.push(alcantarilla.provincia)
        valores.push(alcantarilla.cantidad_alcantarillas_mantenimiento)
      });
  
      const linea = document.getElementById("graficoLineaAlcantarillas")
  
      new Chart(linea, {
        type: "line",
        data: {
          labels: etiquetas,
          datasets: [
            {
              label: "# de alcantarillas en mantenimiento",
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