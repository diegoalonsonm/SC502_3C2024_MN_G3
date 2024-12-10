<link rel="stylesheet" href="ver-reportes.css" />
<section class="ver-reportes">
  <div class="bg-color-reportes py-5">
    <h1 class="text-center text-white mb-5">Ver Reportes</h1>
    <div class="row text-white text-center">
      <div class="col"><strong>Reporte</strong></div>
      <div class="col"><strong>Fecha</strong></div>
      <div class="col"><strong>Dirección</strong></div>
      <div class="col"><strong>Descripción</strong></div>
      <div class="col"><strong>Acción</strong></div>
    </div>
    <hr class="bg-light" />
    <?php
      $reportes = [ 
        ["Reporte #1", "2024-11-01", "Heredia", "Alcantarilla Bloqueada", "#"], 
        ["Reporte #2", "2024-11-02", "Alajuela", "Alcantarilla no desbordada", "#"], 
        ["Reporte #3", "2024-11-03", "San José", "Alcantarilla Bloqueada", "#"], 
        ["Reporte #4", "2024-11-04", "San Carlos", "Alcantarilla desbordada", "#"], 
        ["Reporte #5", "2024-11-05", "Cartago", "Alcantarilla desbordada", "#"] 
      ]; 
      
      foreach ($reportes as $reporte) { 
        echo '
          <div class="row text-white text-center mb-2">
            <div class="col">' . $reporte[0] . '</div>
            <div class="col">' . $reporte[1] . '</div>
            <div class="col">' . $reporte[2] . '</div>
            <div class="col">' . $reporte[3] . '</div>
            <div class="col">
              <a href="' . $reporte[4] . '" class="btn btn-primary btn-sm">Ver</a>
            </div>
          </div>
          <hr class="bg-light" />
      '; 
    } 
    ?>
  </div>
</section>
