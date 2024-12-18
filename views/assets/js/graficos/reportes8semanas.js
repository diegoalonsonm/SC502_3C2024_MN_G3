$.ajax({
    url: "../controllers/reportesController.php?op=listarReportesUltimas8SemanasGrafico",
    type: "POST",
    data: {},
    contentType: false,
    processData: false,
    success: (datos) => {
      let reportes = JSON.parse(datos)
      console.log(reportes)
      let etiquetas = []
      let valores = []      
  
      reportes.forEach((reporte) => {
        etiquetas.push('Semana ' + reporte.semana)
        valores.push(reporte.cantidad_reportes)
      });
  
      const linea = document.getElementById("graficoLineaReportes")
  
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