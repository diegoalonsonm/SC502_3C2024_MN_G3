
<?php
  session_start(); 
  
  if (isset($_SESSION['idUsuario'])) {
      include './assets/componentes/reportes_ConLogueo.php'; 
  } else {
      include './assets/componentes/reportes_SinLoguear.php'; 
  }
?>

   

