<?php
if(isset($_POST['user']) and isset($_POST['pass'])){
  include '../personalizacion/php/mysql.php';
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $rs = conn("CALL sp_votantes_login('$user','$pass')");
  $rs = mysqli_fetch_assoc($rs);
  if($user==$rs['cedula'] and $rs['pass']){
    session_start();
    $_SESSION['id_votante'] = $rs['id_votante'];
    $_SESSION['nombre'] = $rs['nombre'];
    $_SESSION['apellido'] = $rs['apellido'];
    $_SESSION['curso'] = $rs['curso'];
    $_SESSION['cedula'] = $rs['cedula'];
    $_SESSION['pass'] = $rs['pass'];
    $_SESSION['id_lista'] = $rs['id_lista'];
    $id_lista = $rs['id_lista'];
    if($id_lista != 0){
      $rsC = conn("SELECT * FROM listas WHERE id_lista = $id_lista");
      $rsC = mysqli_fetch_assoc($rsC);
      $_SESSION['lista_letra'] = $rsC['letra'];
      $_SESSION['lista_frase'] = $rsC['frase'];
      $_SESSION['lista_nombre'] = $rsC['nombre'];
    }else{
      $_SESSION['lista_letra'] = "";
      $_SESSION['lista_frase'] = "";
      $_SESSION['lista_nombre'] = "";
    }
  }
}
header('location: ../votantes.php');
?>