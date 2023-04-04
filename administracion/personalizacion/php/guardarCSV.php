<?php
if(
  isset($_POST['colNombre']) and 
  isset($_POST['colApellido']) and 
  isset($_POST['colCurso']) and 
  isset($_POST['colCedula']) and 
  isset($_POST['colPass']) and 
  isset($_POST['delimitador']) and 
  isset($_FILES['excel']) 
){
  if( substr($_FILES['excel']['name'], -3) == "csv" ){
    date_default_timezone_set('America/Guayaquil');
    include 'mysql.php';
    $fecha = date('d-m-Y H_i_s');
    //col --> columna
    $colNombre = $_POST['colNombre'];
    $colApellido = $_POST['colApellido'];
    $colCurso = $_POST['colCurso'];
    $colCedula = $_POST['colCedula'];
    $colPass = $_POST['colPass'];
    $delimitador = $_POST['delimitador'];
    $archivo = $_FILES['excel'];
    $desde = $archivo['tmp_name'];
    $hacia = "csv_temp/".$fecha.' '.$archivo['name'];
    
    if(copy($desde, $hacia)){
      $fp = fopen($hacia, "r");
      $row = 0;
      while ($datos = fgetcsv($fp, 0, ",")){
          
          echo trim($datos[0]);
          
          $nombre = trim($datos[$colNombre]);
          $apellido = trim($datos[$colApellido]);
          $curso = trim($datos[$colCurso]);
          $cedula = trim($datos[$colCedula]);
          $pass = trim($datos[$colPass]);
          $row++;
        if($row!=1 and $nombre!="" and $apellido!="" and $curso!="" and $cedula!="" and $pass!="" ){
          $nombre = getNombre($nombre);
          $apellido = getApellido($apellido);
          $curso = $curso;
          $cedula = getCedula($cedula);
          if($colCedula == $colPass){
            $pass = getCedula($pass);
          }else{
            $pass = $pass;
          }
          conn("
                INSERT INTO votantes SET 
                nombre = '$nombre',
                apellido = '$apellido',
                curso = '$curso',
                cedula = '$cedula',
                pass = '$pass'
          ");
        }
      }
      fclose($fp);
      unlink($hacia);
    }
  }
}
header('location: ../../index.php?page=4');

  function getNombre($nombre){
    $resultNombre = "";
    $vecNombre = explode(" ", $nombre);
    $sizeNombre = sizeof($vecNombre);
      switch($sizeNombre){
        case 1: $resultNombre = $vecNombre[0]; break;
        case 2: $resultNombre = $vecNombre[1]; break;
        case 3: $resultNombre = $vecNombre[2]; break;
        case 4: $resultNombre = $vecNombre[2].' '.$vecNombre[3]; break;
        case 5: $resultNombre = $vecNombre[3].' '.$vecNombre[4]; break;
        default: $resultNombre = $vecNombre[0]; break;
      }
    return $resultNombre;
  }
  function getApellido($apellido){
    $resultApellido = "";
    $vecApellido = explode(" ", $apellido);
    $sizeApellido = sizeof($vecApellido);
    switch($sizeApellido){
      case 1: $resultApellido = $vecApellido[0]; break;
      case 2: $resultApellido = $vecApellido[0]; break;
      case 3: $resultApellido = $vecApellido[0]; break;
      case 4: $resultApellido = $vecApellido[0].' '.$vecApellido[1]; break;
      case 5: $resultApellido = $vecApellido[0].' '.$vecApellido[1]; break;
      default: $resultApellido = $vecApellido[0]; break;
    }
    return $resultApellido;
  }
  function getCedula($cedula){
    $resultCedula = "";
    $sizeCedula = strlen($cedula);
    if($sizeCedula == 9){
      $resultCedula = '0'.$cedula;
    }else{
      $resultCedula = $cedula;
    }
    return $resultCedula;
  }
?>