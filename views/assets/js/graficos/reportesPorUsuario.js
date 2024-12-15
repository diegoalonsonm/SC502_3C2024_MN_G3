$.ajax({
    url: "../controllers/reportesController.php?op=listarReportesPorUsuarioGrafico",
    type: "POST",
    data: {},
    contentType: false,
    processData: false,
    success: (datos) => {
      let reportes = JSON.parse(datos)
      let etiquetas = []
      let valores = []               
  
      reportes.forEach((reporte) => {
        etiquetas.push('# ' + reporte.idUsuario)
        valores.push(reporte.cantidad_reportes)
      });
  
      const barr = document.getElementById("graficoBarraUsuario")
  
      new Chart(barr, {
        type: "bar",
        data: {
          labels: etiquetas,
          datasets: [
            {
              label: "Usuarios con mas reportes",
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