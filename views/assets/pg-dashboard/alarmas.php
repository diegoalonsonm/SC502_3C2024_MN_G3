<?php
if (!isset($_SESSION['idUsuario'])) {
  header('Location: login.php');
}
?>

<h1 class="text-center text-bold text-white">Alarmas</h1>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <div class="card p-5" style="background-color: #f0f0f0;">      
        <table id="tbAlarmas" class="table table-striped table-hover shadow">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Mensaje</th>
              <th scope="col">Usuario a Alertar</th>
              <th scope="col">Alcantarilla</th>              
              <th scope="col">Estado</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>