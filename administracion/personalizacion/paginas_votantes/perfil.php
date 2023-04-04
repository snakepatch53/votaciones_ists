<body>
 <script src="personalizacion/paginas_votantes/js/controles.js"></script>
  <div class="col-md-13">
    <div class="box box-widget widget-user">
      <div class="widget-user-header bg-aqua-active" style="background-image: url('../imgs/portada_candidato.png');height:300px;">
        <h3 class="widget-user-username"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido'] ?></h3>
<!--        <h5 class="widget-user-desc"><?php echo $_SESSION['lista_frase'] ?></h5>-->
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="../imgs/logo.png" alt="User Avatar" style="transform:scale(2.4);margin-top:190px;height:90px;background:white;">
      </div>
      <div class="box-footer" style="margin-top: 100px;">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header"><?php echo $_SESSION['curso'] ?></h5>
              <span class="description-text">CICLO</span>
            </div>
          </div>
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header"><?php echo $_SESSION['cedula'] ?></h5>
              <span class="description-text">CEDULA</span>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
                <h5 class="description-header">Votante</h5>
              <span class="description-text">CUENTA</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <section class="datos">
      <form action="personalizacion/paginas_votantes/php/guardar_cambios.php" method="post" enctype="multipart/form-data" id="form_datos">
        <input type="hidden" name="id_votante" value="<?php echo $_SESSION['id_votante'] ?>">
        <div class="fila_form">
          <label>NOMBRE: </label>
          <input type="text" name="nombre" placeholder="Nombre" required id="nombre" value="<?php echo $_SESSION['nombre'] ?>" disabled>
        </div>
        <div class="fila_form">
          <label>APELLIDO: </label>
          <input type="text" name="apellido" placeholder="Apellido" required id="apellido" value="<?php echo $_SESSION['apellido'] ?>" disabled>
        </div>
        <div class="fila_form">
          <label>CEDULA: </label>
          <input type="text" name="cedula" placeholder="Cedula" required id="cedula" value="<?php echo $_SESSION['cedula'] ?>" disabled>
        </div>
        <div class="fila_form">
          <label>CONTRASEÑA: </label>
          <input type="password" name="pass" placeholder="Contraseña"  required id="pass" value="<?php echo $_SESSION['pass'] ?>">
        </div>
        <div class="fila_form">
          <input type="button" onclick="guardar_cambios()" value="Guardar Cambios">
        </div>
      </form>
    </section>
</body>
<style>
  .datos .fila_form{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .datos input,
  .datos label{
    display: inline-flex;
    align-items: center;
    margin: 0px;
    margin-bottom: 1px;
    height: 40px;
    font-family: sans-serif;
  }
  .datos input{
    padding-left: 20px;
    width: 100%;
    border-style: none;
    border: solid 1px #3C8DBC;
  }

  .datos input,
  .datos input[type="file"]:before{
    box-shadow: 0px 0px 0px 0px #fff inset;
    transition: all 0.8s ease;
  }
  .datos input:hover,
  .datos input[type="file"]:hover:before{
    box-shadow: 700px 0px 0px 0px #31739a inset,
                -700px 0px 0px 0px #31739a inset;
    padding-left: 5%;
  }
  .datos input[type="file"]{
    position: relative;
    padding-left: 0px;
  }
  .datos input[type="file"]:before{
    padding-left: 20px;
    content: 'SELECCIONAR FOTO';
    position: absolute;
    display: flex;
    width: 100%;
    align-items: center;
    height: 100%;
    background: white;
  }
  .datos label{
    background: #3C8DBC;
    justify-content: flex-end;
    width: 150px;
  }
  .datos input[type="button"]{
    justify-content: center;
    background: #3C8DBC;
    color: white;
    font-weight: bold;
  }
</style>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!--
  <style>
    .nav-tabs-custom{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 500px;
    }
    .img_inicio{
      width: 100%;
      max-width: 400px;
      height: 100%;
      max-height: 400px;
    }
    .titulo_ini,
    .titulo_fin{
      width: 100%;
      text-align: center;
      margin: auto;
      font-size: 30px;
    }
    .titulo_fin{
      font-size: 18px;
      color: #9c0000;
    }
  </style>
<label class="titulo_ini">BIENVENIDO/A <?php echo strtoupper ($_SESSION['nombre']) ?> AL SISTEMA DE CONTROL DE VOTACIONES ISTS</label>
<div class="nav-tabs-custom">
  <img src="../imgs/logo.png" class="img_inicio">
</div>
<label class="titulo_fin">USTED HA INICIADO SESION COMO CANDIDATO</label>-->
