<?php
if(isset($_POST['letra']) and isset($_POST['frase']) and isset($_POST['nombre']) and isset($_GET['id'])){
  include 'mysql.php';
  $id = $_GET['id'];
  $letra = $_POST['letra'];
  $frase = $_POST['frase'];
  $nombre = $_POST['nombre'];
  if($id == 0){
    conn("CALL sp_listas_guardar('$letra','$frase','$nombre')");
  }else{
    conn("CALL sp_listas_editar('$letra','$frase','$nombre',$id)");
  }
}
header('location: ../../index.php?page=1');
?>