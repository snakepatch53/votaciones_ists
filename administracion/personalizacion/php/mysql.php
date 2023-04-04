<?php
function conn($sql){
  include 'conexion.php';
  $r = mysqli_query($conn,$sql);
  mysqli_close($conn);
  return $r;
}
?>