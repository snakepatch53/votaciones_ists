<?php
  include '../../php/mysql.php';
  date_default_timezone_set('America/Guayaquil');
  $fechaActual = date('Y-m-d H:i:s');
  $r = conn("SELECT MAX(fecha) AS fecha FROM fecha_max;");
  $r = mysqli_fetch_assoc($r);
  $fecha = $r['fecha'];
  if($fechaActual>$fecha){
    echo 'true';
  }else{
    'false';
  }
?>