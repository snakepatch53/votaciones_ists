<?php
  include '../../php/mysql.php';
  $r = conn("SELECT MAX(fecha) AS fecha FROM fecha_max;");
  $r = mysqli_fetch_assoc($r);
  $fecha = $r['fecha'];
  echo $fecha;
?>