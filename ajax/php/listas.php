<?php
include '../../administracion/personalizacion/php/mysql.php';
$rs = conn("CALL sp_listas_consulta()");
while($r = mysqli_fetch_assoc($rs)){
  echo '
        '.$r['id_lista'].'-:-'.$r['letra'].'_:_
       ';
}
?>