<?php
  if(isset($_POST['nombre']) and isset($_POST['apellido']) and isset($_POST['cedula']) and isset($_POST['pass']) and isset($_POST['id_candidato'])){
    include '../../php/mysql.php';
    session_start();
    $id = $_POST['id_candidato'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $pass = $_POST['pass'];
    $fotoPath = $_FILES['foto']['tmp_name'];
    $fotoName = $id.'.png';
    if($fotoPath != "" or $fotoPath != null){
      copy($fotoPath,'../../fotos_candidatos/'.$fotoName);
      conn("UPDATE candidatos SET nombre='$nombre', apellido='$apellido', foto='$fotoName', cedula='$cedula', pass='$pass' WHERE id_candidato = $id");
      $_SESSION['foto'] = $fotoName;
    }else{
      conn("UPDATE candidatos SET nombre='$nombre', apellido='$apellido', cedula='$cedula', pass='$pass' WHERE id_candidato = $id");
    }
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['cedula'] = $cedula;
    $_SESSION['pass'] = $pass;
  }
  header('location: ../../../candidatos.php?page=1');
?>