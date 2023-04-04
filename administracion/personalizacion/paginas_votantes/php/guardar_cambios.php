<?php
  if(isset($_POST['pass']) and isset($_POST['id_votante'])){
    include '../../php/mysql.php';
    session_start();
    $id_votante = $_POST['id_votante'];
    $pass = $_POST['pass'];
    conn("UPDATE votantes SET pass='$pass' WHERE id_votante = $id_votante");
    $_SESSION['pass'] = $pass;
  }
  header('location: ../../../votantes.php?page=1');
?>