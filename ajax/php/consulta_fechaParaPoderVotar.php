<?php
if(isset($_GET['user']) and isset($_GET['pass'])){
  include '../../administracion/personalizacion/php/mysql.php';
  $user = $_GET['user'];
  $pass = $_GET['pass'];
  date_default_timezone_set('America/Guayaquil');
  $fecha = date('Y-m-d H:i:s');
  $rs1 = conn("SELECT * FROM fecha_max WHERE fecha < '$fecha'");
  $rs2 = conn("SELECT * FROM fecha_max WHERE fecha > '$fecha'");
  if(
      (mysqli_fetch_assoc($rs1) != null or mysqli_fetch_assoc($rs1) != "") 
      and 
      (mysqli_fetch_assoc($rs2) != null or mysqli_fetch_assoc($rs2) != "")
  ){
    echo "true";
  }else{
    echo "false";
  }
}
?>