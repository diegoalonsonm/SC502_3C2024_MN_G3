$.ajax({
    url: "../controllers/alcantarillaController.php?op=listarAlcantarillasProvinciaGrafico",
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
        valores.push(alcantarilla.cantidad_alcantarillas)
      });
  
      const pie = document.getElementById("graficoPie")
  
      new Chart(pie, {
        type: "pie",
        data: {
          labels: etiquetas,
          datasets: [
            {
              label: "# de alcantarillas por provincia",
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