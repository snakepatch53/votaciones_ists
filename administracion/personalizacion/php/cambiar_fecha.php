<?php
  if(isset($_POST['id_fecha_max']) and isset($_POST['fecha'])){
    include 'mysql.php';
    $id_fecha_max = $_POST['id_fecha_max'];
    $fecha = $_POST['fecha'];
    conn("UPDATE fecha_max SET fecha = '$fecha' WHERE id_fecha_max = $id_fecha_max");
  }
header('location: ../../index.php?page=6');
?>