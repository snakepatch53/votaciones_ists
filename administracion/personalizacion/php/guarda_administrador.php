<?php
if(isset($_POST['nombre']) and isset($_POST['cedula']) and isset($_POST['pass']) and isset($_GET['id'])){
  include 'mysql.php';
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $cedula = $_POST['cedula'];
  $pass = $_POST['pass'];
  if($id == 0){
    conn("CALL sp_administradores_guardar('$nombre','$cedula','$pass')");
  }else{
    conn("CALL sp_administradores_editar('$nombre','$cedula','$pass',$id)");
  }
}
header('location: ../../index.php?page=5');
?>