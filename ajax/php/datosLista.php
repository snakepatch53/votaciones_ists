<?php
include '../../administracion/personalizacion/php/mysql.php';
$id = $_GET['id'];
$rs = conn("SELECT candidatos.nombre AS nombre, candidatos.apellido AS apellido, candidatos.curso AS curso, candidatos.foto AS foto, cargos.nombre AS cargo FROM candidatos INNER JOIN cargos ON candidatos.id_cargo = cargos.id_cargo WHERE candidatos.id_lista = $id");
while($r = mysqli_fetch_assoc($rs)){
  echo '
        '.$r['nombre'].' '.$r['apellido'].'-:-'.$r['curso'].'-:-'.$r['foto'].'-:-'.$r['cargo'].'_:_
       ';
}
?>