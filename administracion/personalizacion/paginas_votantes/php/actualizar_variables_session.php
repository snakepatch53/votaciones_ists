<?php
  if(isset($_GET['id_lista'])){
    session_start();
    $_SESSION['id_lista'] = $_GET['id_lista'];
  }
?>