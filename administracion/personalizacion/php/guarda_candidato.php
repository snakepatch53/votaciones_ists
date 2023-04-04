<?php
if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['cedula']) and isset($_POST['curso']) and isset($_POST['cargo']) and isset($_POST['lista']) and isset($_GET['id'])){
  include 'mysql.php';
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['cedula'];
  $curso = $_POST['curso'];
  $fotoName = $_FILES['foto']['name'];
  $fotoPath = $_FILES['foto']['tmp_name'];
  $cargo = $_POST['cargo'];
  $lista = $_POST['lista'];  
  if($id == 0){
    conn("CALL sp_candidatos_guardar('$nombre','$apellido','$cedula','$curso','$fotoName','$cargo','$lista')");
    copy($fotoPath,'../fotos_candidatos/'.$fotoName);
  }else{
    conn("CALL sp_candidatos_editar('$nombre','$apellido','$cedula','$curso','$fotoName','$cargo','$lista',$id)");
    copy($fotoPath,'../fotos_candidatos/'.$fotoName);
  }
}
header('location: ../../index.php?page=3');
?>