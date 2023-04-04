<?php
if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['curso']) and isset($_POST['cedula']) and isset($_POST['pass']) and isset($_GET['id'])){
  include 'mysql.php';
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $curso = $_POST['curso'];
  $cedula = $_POST['cedula'];
  $pass = $_POST['pass'];
  if($id == 0){
    conn("CALL sp_votantes_guardar('$nombre','$apellido','$curso','$cedula','$pass')");
  }else{
    conn("CALL sp_votantes_editar('$nombre','$apellido','$curso','$cedula','$pass',$id)");
  }
}
header('location: ../../index.php?page=4');
?>