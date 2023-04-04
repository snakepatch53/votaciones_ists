<?php
if(isset($_GET['candidatos']) and isset($_GET['user']) and isset($_GET['pass'])){
  include '../../administracion/personalizacion/php/mysql.php';
  $id = $_GET['candidatos'];
  $cedula = $_GET['user'];
  $pass = $_GET['pass'];
  date_default_timezone_set('America/Guayaquil');
  $fecha = date('Y-m-d H:i:s');
  conn("UPDATE votantes SET id_lista = '$id', fecha = '$fecha' WHERE cedula = '$cedula' AND pass = '$pass'");
}
?>