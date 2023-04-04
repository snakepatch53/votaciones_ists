<link rel="stylesheet" href="personalizacion/css/resultados.css">
<div class="contenedor_all" id="contenedor_resultados"> 
  <?php
  $rs = conn("SELECT curso FROM votantes GROUP BY curso;");
  while($r = mysqli_fetch_assoc($rs)){
    $curso = $r['curso'];
    $totalVotantesCarrera = 0;
    $totalVotaron = 0;
    $totalPorcentaje = 0;
  ?> 
  <section class="contenedor">
    <h2><?php echo $curso ?></h2>
    <div class="resultados">
      <?php
      //Contar total de votos/inicio
      $totalVotantes = mysqli_fetch_assoc(conn("SELECT 
      COUNT(*) AS totalVotantes
      FROM votantes
      WHERE curso LIKE '$curso'"))['totalVotantes'];
      //Contar total de votos/fin
      $rsL = conn("
        SELECT 
          listas.id_lista AS id_lista,
          listas.letra AS lista, 
          COUNT(listas.id_lista) AS votos
        FROM listas 
          INNER JOIN votantes ON listas.id_lista = votantes.id_lista
          WHERE votantes.curso LIKE '$curso'
          GROUP BY listas.id_lista;
      ");
      while($rL = mysqli_fetch_assoc($rsL)){
        $id_lista = $rL['id_lista'];
        $lista = $rL['lista'];
        $votos = $rL['votos'];
        $porcentaje = round((100/$totalVotantes)*$votos, 2);
        
        $totalVotantesCarrera = $totalVotantes;
        $totalVotaron += $votos;
        $totalPorcentaje += $porcentaje;
      ?>
      <div class="lista">
        <label class="label_votos">
          VOTOS 
          <span class="valor_votos"><?php echo $votos ?></span>
        </label>
        <div class="barra_procentual">
          <div class="porcentaje" style="height:0%;">
            <label>
              <span class="valor_porcentajes">0</span>%
              <span class="porcentajesAnimacion" style="display: none;"><?php echo $porcentaje ?></span>
            </label>
          </div>
          
        </div>
<!--        slider / inicio-->
          <div class="slider<?php echo $id_lista ?>">
            <ul>
              <?php
                $cantidadFotos = 0;
                $rsC = conn("SELECT 
                            candidatos.nombre AS nombre,
                            candidatos.foto AS foto,
                            cargos.nombre AS cargo
                            FROM candidatos 
                            INNER JOIN cargos ON candidatos.id_cargo = cargos.id_cargo
                            WHERE candidatos.id_lista = $id_lista");
                while($rC = mysqli_fetch_assoc($rsC)){
                  $nombre = $rC['nombre'];
                  $cargo = $rC['cargo'];
                  $foto = $rC['foto'];
                  $cantidadFotos++;
              ?>
              <li>
                <label class="nombre_candidato_cargo">
                  <b><?php echo $nombre ?></b><br><?php echo $cargo ?>
                </label>
                <img src="personalizacion/fotos_candidatos/<?php echo $foto ?>" class="foto_presi">
              </li>
              <?php } ?>
            </ul>
            <?php
              $tiempoDuracion = $cantidadFotos * 4;
              $porcentaje = 100 / ($cantidadFotos);
              $tamanoDecremental = ($porcentaje / 100) * 10;
              $desplazamientoImagen = 0;
              echo '
                    <style>
                    .slider'.$id_lista.'{
                        margin: 0;
                        width: 100%;
                        height: 130px;
                        overflow: hidden;
                        border-radius: 4px;
                        z-index: 1;
                        background: white;
                        filter: brightness(0.8);
                      }
                      .slider'.$id_lista.' ul{
                        height: 100%;
                        display: flex;
                        padding: 0;
                        margin: 0;
                        width: '.$cantidadFotos.'00%;
                        animation: cambiar'.$id_lista.' '.$tiempoDuracion.'s infinite alternate;
                      }
                      .slider'.$id_lista.' ul li{
                        position: relative;
                        width: 100%;
                        height: 100%;
                        list-style: none;
                        z-index: 1;
                      }
                      .slider'.$id_lista.' ul li .nombre_candidato_cargo{
                        position: absolute;
                        color: white;
                        width: 100%;
                        height: 30px;
                        text-align: center;
                        left: 0;
                        bottom: 0;
                        z-index: 1;
                        font-size: 11px;
                        text-shadow: 0px 0px 5px blue;
                      }
                      .slider'.$id_lista.' ul li img{
                        width: 100%;
                        height: 100%;
                        filter: brightness(0.8);
                      }
                      @keyframes cambiar'.$id_lista.'{
                    ';
                        $i = 0;
                        while($i<100){
                          echo  '
                            '.$i.'% { margin-left: -'.$desplazamientoImagen.'% }
                            ';
                          $i += $porcentaje;
                          echo  '
                            '.$i-$tamanoDecremental.'% { margin-left: -'.$desplazamientoImagen.'% }
                          ';
                          $desplazamientoImagen += 100;
                        }
              echo  '
                    100% { margin-left: -'.($cantidadFotos-1).'00% }
                      }
                    </style>
                   ';
            ?>
          </div>
<!--        slider / fin-->
        <?php
          if($lista != ' '){
            
        ?>
          <h3>LISTA '<?php echo $lista ?>'</h3>
        <?php  }else{ ?>
          <h3>NULOS</h3>
        <?php } ?>
      </div>
      <?php 
        }
        ?>
        <div class="lista">
          <label class="label_votos">
            VOTOS 
            <span class="valor_votos"><?php echo ($totalVotantesCarrera-$totalVotaron) ?></span>
          </label>
          <div class="barra_procentual">
            <div class="porcentaje" style="height:0%;">
              <label>
                  <span class="valor_porcentajes"></span>%
                  <span class="porcentajesAnimacion" style="display: none;"><?php echo (100-$totalPorcentaje) ?></span>
              </label>
            </div>
          </div>
          <img src="../imgs/blanco.png" style="height:108px;">
          <h3>EN BLANCO</h3>
        </div>
    </div>
  </section>
  <?php } ?>
<!--  --------------------------------------------------------------------------->
  <section class="contenedor">  
    <h2>RESULTADOS TOTALES</h2>
    <div class="resultados">
      <?php
      $totalVotantesCarrera = 0;
      $totalVotaron = 0;
      $totalPorcentaje = 0;
      //Contar total de votos/inicio
      $totalVotantes = mysqli_fetch_assoc(conn("SELECT 
      COUNT(*) AS totalVotantes
      FROM votantes"))['totalVotantes'];
      //Contar total de votos/fin
      $rsL = conn("
        SELECT 
          listas.id_lista AS id_lista,
          listas.letra AS lista, 
          COUNT(listas.id_lista) AS votos
        FROM listas 
          INNER JOIN votantes ON listas.id_lista = votantes.id_lista
          GROUP BY listas.id_lista;
      ");
      while($rL = mysqli_fetch_assoc($rsL)){
        $id_lista = $rL['id_lista'];
        $lista = $rL['lista'];
        $votos = $rL['votos'];
        $porcentaje = round((100/$totalVotantes)*$votos, 2);
        
        $totalVotantesCarrera = $totalVotantes;
        $totalVotaron += $votos;
        $totalPorcentaje += $porcentaje;
      ?>
      <div class="lista">
        <label class="label_votos">
          VOTOS 
          <span class="valor_votos"><?php echo $votos ?></span>
        </label>
        <div class="barra_procentual">
          <div class="porcentaje" style="height:0%;">
            <label>
              <span class="valor_porcentajes">0</span>%
              <span class="porcentajesAnimacion" style="display: none;"><?php echo $porcentaje ?></span>
            </label>
          </div>
          
        </div>
<!--        slider / inicio-->
          <div class="slider<?php echo $id_lista ?>">
            <ul>
              <?php
                $cantidadFotos = 0;
                $rsC = conn("SELECT 
                            candidatos.nombre AS nombre,
                            candidatos.foto AS foto,
                            cargos.nombre AS cargo
                            FROM candidatos 
                            INNER JOIN cargos ON candidatos.id_cargo = cargos.id_cargo
                            WHERE candidatos.id_lista = $id_lista");
                while($rC = mysqli_fetch_assoc($rsC)){
                  $nombre = $rC['nombre'];
                  $cargo = $rC['cargo'];
                  $foto = $rC['foto'];
                  $cantidadFotos++;
              ?>
              <li>
                <label class="nombre_candidato_cargo">
                  <b><?php echo $nombre ?></b><br><?php echo $cargo ?>
                </label>
                <img src="personalizacion/fotos_candidatos/<?php echo $foto ?>" class="foto_presi">
              </li>
              <?php } ?>
            </ul>
            <?php
              $tiempoDuracion = $cantidadFotos * 4;
              $porcentaje = 100 / ($cantidadFotos);
              $tamanoDecremental = ($porcentaje / 100) * 10;
              $desplazamientoImagen = 0;
              echo '
                    <style>
                    .slider'.$id_lista.'{
                        margin: 0;
                        width: 100%;
                        height: 130px;
                        overflow: hidden;
                        border-radius: 4px;
                        z-index: 1;
                        background: white;
                        filter: brightness(0.8);
                      }
                      .slider'.$id_lista.' ul{
                        height: 100%;
                        display: flex;
                        padding: 0;
                        margin: 0;
                        width: '.$cantidadFotos.'00%;
                        animation: cambiar'.$id_lista.' '.$tiempoDuracion.'s infinite alternate;
                      }
                      .slider'.$id_lista.' ul li{
                        position: relative;
                        width: 100%;
                        height: 100%;
                        list-style: none;
                        z-index: 1;
                      }
                      .slider'.$id_lista.' ul li .nombre_candidato_cargo{
                        position: absolute;
                        color: white;
                        width: 100%;
                        height: 30px;
                        text-align: center;
                        left: 0;
                        bottom: 0;
                        z-index: 1;
                        font-size: 11px;
                        text-shadow: 0px 0px 5px blue;
                      }
                      .slider'.$id_lista.' ul li img{
                        width: 100%;
                        height: 100%;
                        filter: brightness(0.8);
                      }
                      @keyframes cambiar'.$id_lista.'{
                    ';
                        $i = 0;
                        while($i<100){
                          echo  '
                            '.$i.'% { margin-left: -'.$desplazamientoImagen.'% }
                            ';
                          $i += $porcentaje;
                          echo  '
                            '.$i-$tamanoDecremental.'% { margin-left: -'.$desplazamientoImagen.'% }
                          ';
                          $desplazamientoImagen += 100;
                        }
              echo  '
                    100% { margin-left: -'.($cantidadFotos-1).'00% }
                      }
                    </style>
                   ';
            ?>
          </div>
<!--        slider / fin-->
        <?php
          if($lista != ' '){
            
        ?>
          <h3>LISTA '<?php echo $lista ?>'</h3>
        <?php  }else{ ?>
          <h3>NULOS</h3>
        <?php } ?>
      </div>
      <?php 
        }
        ?>
        <div class="lista">
          <label class="label_votos">
            VOTOS 
            <span class="valor_votos"><?php echo ($totalVotantesCarrera-$totalVotaron) ?></span>
          </label>
          <div class="barra_procentual">
            <div class="porcentaje" style="height:0%;">
              <label>
                  <span class="valor_porcentajes">0</span>%
                  <span class="porcentajesAnimacion" style="display: none;"><?php echo (100-$totalPorcentaje) ?></span>
              </label>
            </div>
          </div>
          <img src="../imgs/blanco.png" style="height:108px;">
          <h3>EN BLANCO</h3>
        </div>
    </div>
  </section>
</div>



<?php
  $id_lista = mysqli_fetch_assoc(conn("SELECT id_lista, COUNT(id_lista) as contando FROM votantes GROUP BY id_lista ORDER BY contando DESC LIMIT 1;"))['id_lista'];
  $r = mysqli_fetch_assoc(conn("SELECT * FROM listas WHERE id_lista = $id_lista;"));
?>
<div class="content_ganador" id="content_ganador">
  <div class="ganador">
    <div class="header_ganador">
      <div class="titulo">LISTA <?php echo '\''.$r['letra'].'\' - '.$r['nombre'] ?></div>
      <div class="cerrar" onclick="ocultar('content_ganador')"><img src="../imgs/close.png"></div>
    </div>
    <div class="candidatos">
      <?php
        $rsC = conn("SELECT 
        candidatos.foto AS foto, 
        candidatos.nombre AS nombre, 
        cargos.nombre AS cargo 
        FROM candidatos 
        INNER JOIN cargos ON candidatos.id_cargo = cargos.id_cargo 
        WHERE candidatos.id_lista = $id_lista");
        while($rC = mysqli_fetch_assoc($rsC)){
      ?>
      <div class="candidatos_item">
        <img src="personalizacion/fotos_candidatos/<?php echo $rC['foto'] ?>">
        <h3><?php echo $rC['nombre'] ?></h3><h4><?php echo $rC['cargo'] ?></h4>
      </div>
      <?php } ?>
    </div>
    <div class="votos">
      <?php
        $rsV = conn("SELECT COUNT(*) AS votos, curso FROM votantes WHERE id_lista = $id_lista GROUP BY curso;");
        $total_votos = 0;
        while($rV = mysqli_fetch_assoc($rsV)){
        $total_votos += $rV['votos'];
      ?>
     <div class="item_votos">
        <h3><?php echo $rV['curso'] ?></h3>
        <h1><?php echo $rV['votos'] ?></h1>
     </div>
     <?php } ?>
     <div class="item_votos">
        <h3>TOTAL</h3>
        <h1><?php echo $total_votos ?></h1>
     </div>
    </div>
    <div class="footer_ganador"><div class="titulo"><?php echo $r['frase'] ?></div></div>
  </div>
</div>




<div class="timer" id="contenedor_timer">00:00:00</div>

<script type="text/javascript" src="../ajax/js/conexion_ajax.js"></script>
<script type="text/javascript" src="personalizacion/js/resultados.js"></script>
<script type="text/javascript" src="personalizacion/js/resultados_timer.js"></script>