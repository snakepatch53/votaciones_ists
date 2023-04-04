<link rel="stylesheet" href="personalizacion/paginas_votantes/css/inicio.css">
<script type="text/javascript" src="../ajax/js/conexion_ajax.js"></script>
<script type="text/javascript" src="personalizacion/paginas_votantes/js/inicio.js"></script>
<script type="text/javascript">
  function seleccionarLista(element){
      if(document.getElementById(element.id).disabled == false){
        document.getElementById(element.id).checked = true;
      }
  } 
</script>
<body>
  <content>
      <label class="titulo_listas_disp">LISTAS DISPONIBLES PARA VOTACION</label>
      <form action="../php/guardar_voto.php" class="listas" id="formulario_voto" method="post">
        <?php
        $rs = conn("
          SELECT 
          DISTINCT(listas.id_lista) AS id_lista,
          listas.letra AS letra ,
          listas.nombre AS nombre
          FROM listas
          INNER JOIN candidatos ON candidatos.id_lista=listas.id_lista
          INNER JOIN cargos ON cargos.id_cargo=candidatos.id_cargo;
        ");
        $radios;
        $contador_radios = 0;
        while($r = mysqli_fetch_assoc($rs)){
          $radios[$contador_radios] = 'c'.$r['id_lista'];
          $contador_radios++;
        ?>
        <div class="lista_item">
          <div class="slider<?php echo $r['id_lista'] ?>">
            <ul>
              <?php
                $id_lista = $r['id_lista'];
                $cantidadFotos = 0;
                $rsC = conn("SELECT 
                            candidatos.nombre AS nombre,
                            candidatos.foto AS foto,
                            cargos.nombre AS cargo
                            FROM candidatos 
                            INNER JOIN cargos ON candidatos.id_cargo = cargos.id_cargo
                            WHERE candidatos.id_lista = $id_lista");
                while($rC = mysqli_fetch_assoc($rsC)){
                  $cantidadFotos++;
              ?>
              <li>
                <label class="nombre_candidato_cargo">
                  <b><?php echo $rC['nombre'] ?></b><br><?php echo $rC['cargo'] ?>
                </label>
                <img src="../administracion/personalizacion/fotos_candidatos/<?php echo $rC['foto']; ?>" class="foto_presi">
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
                        width: 100%; height: 180px;
                        overflow: hidden;
                        border-radius: 4px;
                      }
                      .slider'.$id_lista.' ul{
                        width: '.$cantidadFotos.'00%; 
                        height: 100%;
                        display: flex;
                        padding: 0;
                        margin: 0;
                        animation: cambiar'.$id_lista.' '.$tiempoDuracion.'s infinite alternate;
                      }
                      .slider'.$id_lista.' ul li{
                        position: relative;
                        width: 100%; height: 100%;
                        list-style: none;
                        z-index: 1;
                      }
                      .slider'.$id_lista.' ul li .nombre_candidato_cargo{
                        position: absolute;
                        color: white;
                        width: 100%; height: 30px;
                        left: 0;
                        bottom: 0;
                        z-index: 1;
                        font-size: 13px;
                        text-shadow: 0px 0px 5px blue;
                      }
                      .slider'.$id_lista.' ul li img{
                        width: 100%; height: 100%;
                        filter: brightness(0.4);
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
          <label for="c<?php echo $r['id_lista'] ?>" class="nombre_presi"><?php echo '<b>Lista '.$r['letra'].'</b><br><b style="font-weight: 100;font-size:12px;">'.$r['nombre'].'</b>' ?></label>

          <div class="casilla_voto" for="c<?php echo $r['id_lista'] ?>" class="nombre_presi" onclick="seleccionarLista(c<?php echo $r['id_lista'] ?>)">
            <input type="radio" name="candidatos" id="c<?php echo $r['id_lista'] ?>" value="<?php echo $r['id_lista'] ?>" required>
          </div>
          
        </div>
        <?php 
          }
          $voto = false;
          for($i=0; $i<$contador_radios; $i++){
            if('c'.$_SESSION['id_lista'] == $radios[$i]){
              $voto = true;
              echo '
                    <script>
                      document.getElementById("c'.$_SESSION['id_lista'].'").checked = true;
                    </script>
                   ';
            }
          }
          if($voto){
            for($i=0; $i<$contador_radios; $i++){
              echo '
                      <script>
                        document.getElementById("'.$radios[$i].'").disabled = true;
                      </script>
                   ';
            }
          }
//            $_SESSION['id_lista'] = $rs['id_lista'];
//            $rsC = conn("SELECT * FROM listas WHERE id_lista = $id_lista");
//            $rsC = mysqli_fetch_assoc($rsC);
//            $_SESSION['lista_letra'] = $rsC['letra'];
//            $_SESSION['lista_frase'] = $rsC['frase'];
//            $_SESSION['lista_nombre'] = $rsC['nombre'];
        ?>
        <br>
        <br>
        <div class="credenciales">
          <input type="hidden" placeholder="Cedula" name="cedula" id="cedula" value="<?php echo $_SESSION['cedula'] ?>">
          <input type="hidden" placeholder="Contraseña" name="pass1" id="pass1" value="<?php echo $_SESSION['pass'] ?>">
          <input type="hidden" placeholder="Confirmar Contraseña" name="pass2" id="pass2" value="<?php echo $_SESSION['pass'] ?>">
          <label id="mensaje"></label>
          <input type="button" value="VOTAR" onclick="validarVoto()">
        </div>
      </form>
  </content>
</body>