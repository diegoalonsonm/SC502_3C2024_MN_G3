<?php
    require_once '../models/User.php';
           $Usua = new User();
           $Usuario = $Usua->listarTodosDb();
           echo json_encode($Usuario); 
       
?>