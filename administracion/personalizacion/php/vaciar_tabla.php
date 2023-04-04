<?php
  if(isset($_POST['pass1']) and isset($_POST['pass2']) and isset($_POST['tabla']) ){
    $tabla = $_POST['tabla'];
    include 'mysql.php';
    conn("TRUNCATE TABLE $tabla");
    if($tabla == "administradores"){
      conn("INSERT INTO administradores SET nombre = 'Administrador', cedula='admin', pass='admin'");
    }
  }
header('location: ../../index.php?page=6');
?>