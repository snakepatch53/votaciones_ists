<?php
if(isset($_GET['user']) and isset($_GET['pass'])){
  include '../../administracion/personalizacion/php/mysql.php';
  $user = $_GET['user'];
  $pass = $_GET['pass'];
  $rs = conn("SELECT * FROM votantes WHERE cedula='$user' AND pass = '$pass'");
  if(mysqli_fetch_assoc($rs) != null or mysqli_fetch_assoc($rs) != ""){
    echo "true";
  }else{
    echo "false";
  }
}
?>