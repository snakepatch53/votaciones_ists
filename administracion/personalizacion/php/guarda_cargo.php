<?php
if(isset($_POST['nombre']) and isset($_GET['id'])){
  include 'mysql.php';
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  if($id == 0){
    conn("CALL sp_cargos_guardar('$nombre')");
  }else{
    conn("CALL sp_cargos_editar('$nombre',$id)");
  }
}
header('location: ../../index.php?page=2');
?>