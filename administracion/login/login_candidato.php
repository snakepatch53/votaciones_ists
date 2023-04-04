<?php
if(isset($_POST['user']) and isset($_POST['pass'])){
  include '../personalizacion/php/mysql.php';
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $rs = conn("CALL sp_candidatos_login('$user','$pass')");
  $rs = mysqli_fetch_assoc($rs);
  if($user==$rs['cedula'] and $rs['pass']){
    session_start();
    $_SESSION['id_candidato'] = $rs['id_candidato'];
    $_SESSION['nombre'] = $rs['nombre'];
    $_SESSION['apellido'] = $rs['apellido'];
    $_SESSION['cedula'] = $rs['cedula'];
    $_SESSION['curso'] = $rs['curso'];
    $_SESSION['pass'] = $rs['pass'];
    $_SESSION['foto'] = $rs['foto'];
    
    $_SESSION['id_cargo'] = $rs['id_cargo'];
    $id_cargo = $rs['id_cargo'];
    $rsC = conn("SELECT nombre FROM cargos WHERE id_cargo = $id_cargo");
    $rsC = mysqli_fetch_assoc($rsC);
    $_SESSION['cargo_nombre'] = $rsC['nombre'];
    
    $_SESSION['id_lista'] = $rs['id_lista'];
    $id_lista = $rs['id_lista'];
    $rsC = conn("SELECT * FROM listas WHERE id_lista = $id_lista");
    $rsC = mysqli_fetch_assoc($rsC);
    $_SESSION['lista_letra'] = $rsC['letra'];
    $_SESSION['lista_frase'] = $rsC['frase'];
    $_SESSION['lista_nombre'] = $rsC['nombre'];
  }
}
header('location: ../candidatos.php');
?>