<html>
  <head>
   <title></title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="../css/inicio.css">
  </head>
  <body>
    <h1>LISTAS Y SUS CANDIDATOS</h1>
    <?php
      include '../administracion/personalizacion/php/mysql.php';
      $rs = conn(" SELECT * FROM listas 
                  WHERE letra != ' ' AND frase != ' ';");
      while($r = mysqli_fetch_assoc($rs)){
    ?>
    <div class="tips">
     <h1><?php echo 'LISTA \''.strtoupper($r['letra']).'\' ('.strtoupper($r['nombre']).')' ?></h1>
     <h2><?php echo strtoupper($r['frase']) ?></h2>
      <?php
      $id = $r['id_lista'];
        $rsC = conn("
                      SELECT
                        candidatos.nombre AS nombre,
                        candidatos.apellido AS apellido,
                        candidatos.cedula AS cedula,
                        candidatos.curso AS curso,
                        candidatos.foto AS foto,
                        cargos.nombre AS cargo
                      FROM candidatos 
                        INNER JOIN cargos ON candidatos.id_cargo = cargos.id_cargo
                      WHERE candidatos.id_lista = $id");
        while($rC = mysqli_fetch_assoc($rsC)){
      ?>
      <div class="item">
        <img src="../administracion/personalizacion/fotos_candidatos/<?php echo $rC['foto'] ?>">
        <h2><?php echo $rC['cargo'] ?></h2>
        <h3>
          <?php
          echo 'Yo <b>'.$rC['nombre'].'</b> '.$rC['apellido'].' estudiante de <b>'.$rC['curso'].'</b> con el numero de cedula <b>'.$rC['cedula'].'</b> formo parte de la <b> Lista '.$r['letra'].'</b> como candidato a <b>'.$rC['cargo'].'.';
          ?>
        </h3>
      </div>
      <?php } ?>
    </div>
    <?php } ?>
  </body>
</html>