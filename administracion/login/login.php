<?php
if(isset($_POST['user']) and isset($_POST['pass'])){
  include '../personalizacion/php/mysql.php';
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $rs = conn("CALL sp_administradores_login('$user','$pass')");
  $rs = mysqli_fetch_assoc($rs);
  if($user==$rs['cedula'] and $rs['pass']){
    session_start();
    $_SESSION['id_administrador'] = $rs['id_administrador'];
    $_SESSION['nombre'] = $rs['nombre'];
    $_SESSION['cedula'] = $rs['cedula'];
    $_SESSION['pass'] = $rs['pass'];
  }
}
header('location: ../');
?>