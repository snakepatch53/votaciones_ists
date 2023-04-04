<?php
if(isset($_GET['page']) and isset($_GET['table']) and isset($_GET['id'])){
  include 'mysql.php';
  $page = $_GET['page'];
  $table = $_GET['table'];
  $id = $_GET['id'];
  conn("CALL sp_".$table."_eliminar($id)");
  header('location: ../../index.php?page='.$page);
}else{
  header('location: ../../index.php');
}
?>