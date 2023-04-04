<?php
  include '../administracion/personalizacion/php/mysql.php';
?>
 <html>
  <head>
   <title>Votaciones ISTS</title>
   <meta charset="utf-8">
   <meta name='viewport' content='width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0'/>
   <link rel="icon" href="../imgs/logo.png">
   <link rel="stylesheet" href="../css/votar.css">
   <script type="text/javascript" src="../js/votar.js"></script>
   <script type="text/javascript" src="../js/votar_extras.js"></script>
   <script type="text/javascript" src="../ajax/js/conexion_ajax.js"></script>
  </head>
  <body>
    <header>
      <a href="../index.html"><img src="../imgs/logo.png"></a>
      <label>INSTITUTO TECNOLOGICO SUPERIOR SUCUA</label>
      <div>
        <a href="../index.html">INICIO</a>
        <a href="../administracion/login/index.php?votante">INICIAR SESION</a>
      </div>
    </header>
    <content>
      <div class="indicaciones">
        <label class="titulo_votaciones">
          <b>INDICACIONES</b>
          - MARQUE SU LISTA PREFERIDA.<br>
          - ESCRIBA SU USUARIO Y CONTRASEÑA.<br>
          - PROCEDA A VOTAR.
        </label>
      </div>
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
          while($r = mysqli_fetch_assoc($rs)){
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
              <style>
                xd{
                  font-family: sans-serif;
                  font-size: 11px;
                  text-shadow: 0 0 10px blue;
                }
              </style>
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
                          display: flex;
                          padding: 0;
                          margin: 0;
                          width: '.$cantidadFotos.'00%;
                          height: 100%;
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
                          bottom: 1;
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
          <?php } ?>
          
          <script type="text/javascript">
            function seleccionarLista(element){
              document.getElementById(element.id).checked = true;
            }
          </script>
          
          <br>
          <br>
          <div class="credenciales">
<!--            <label>LLENE LA SIGUIENTE INFORMACION PARA PODER EMITIR SU VOTO</label>-->
            <input type="text" placeholder="Cedula" name="cedula" id="cedula">
            <input type="password" placeholder="Contraseña" name="pass1" id="pass1">
            <label id="mensaje"></label>
            <input type="button" value="VOTAR" onclick="validarVoto()">
          </div>
        </form>
    </content>
    <footer>
      <a href="../">Inicio</a>
      <a href="../administracion/login">Iniciar Sesion</a>
      <a href="#">Desarrolladores</a>
      <span>Copyright <img src="../imgs/copyright.png"><a href="https://www.facebook.com/Programarte-453395385426480/" target="_blank">Programarte</a> 2019. Todos los derechos   reservados</span>
    </footer>
  </body>
</html>