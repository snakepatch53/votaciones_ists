<?php
  if(isset($_GET['fecha'])){
    include '../../php/mysql.php';
    date_default_timezone_set('America/Guayaquil');
    $fechaActual = date('Y-m-d H:i:s');
    $fecha = $_GET['fecha'];
    $fecha1 = new DateTime(''.$fechaActual);
    $fecha2 = new DateTime(''.$fecha);
    $resultado = $fecha1->diff($fecha2);
    echo $resultado->format('%H:%I:%S');
    //echo "hola";
  }
?>