<html>
  <head>
   <title>Login | Votaciones</title>
   <meta charset="utf-8">
   <meta name='viewport' content='width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0'/>
   <link rel="icon" href="../../imgs/logo.png">
   <link rel="stylesheet" href="estilos.css">
  </head>
  <body id="particles-js">
   
    <form action="login.php" method="post" id="form_admin">
      <div class="tipos_session">
        <input type="button" onclick="administrador()" value="Administrador"/>
        <input type="button" onclick="candidato()" value="Candidato"/>
        <input type="button" onclick="votante()" value="Votante"/>
      </div>
      <img src="../../imgs/logo.png">
      <label>ADMINISTRADOR</label>
      <input type="text" name="user" id="user1" placeholder="Usuario" required>
      <input type="password" name="pass" id="pass1" placeholder="Contraseña" required>
      <input type="submit" value="Iniciar sesion">
      <div class="btnsRegresar">
        <a class="btn_regresar" href="../"><img src="../../imgs/regresar.png"> INICIO</a>
        <a class="btn_regresar2" href="../../paginas/votar.php">VOTAR <img src="../../imgs/regresar.png"></a>
      </div>
    </form>
    
    <form action="login_candidato.php" method="post" id="form_candidato">
      <div class="tipos_session">
        <input type="button" onclick="administrador()" value="Administrador"/>
        <input type="button" onclick="candidato()" value="Candidato"/>
        <input type="button" onclick="votante()" value="Votante"/>
      </div>
      <img src="../../imgs/logo.png">
      <label>CANDIDATO</label>
      <input type="text" name="user" id="user2" placeholder="Usuario" required>
      <input type="password" name="pass" id="pass2" placeholder="Contraseña" required>
      <input type="submit" value="Iniciar sesion">
      <div class="btnsRegresar">
        <a class="btn_regresar" href="../"><img src="../../imgs/regresar.png"> INICIO</a>
        <a class="btn_regresar2" href="../../paginas/votar.php">VOTAR <img src="../../imgs/regresar.png"></a>
      </div>
    </form>
    
    <form action="login_votante.php" method="post" id="form_votante">
      <div class="tipos_session">
        <input type="button" onclick="administrador()" value="Administrador"/>
        <input type="button" onclick="candidato()" value="Candidato"/>
        <input type="button" onclick="votante()" value="Votante"/>
      </div>
      <img src="../../imgs/logo.png">
      <label>VOTANTE</label>
      <input type="text" name="user" id="user3" placeholder="Usuario" required>
      <input type="password" name="pass" id="pass3" placeholder="Contraseña" required>
      <input type="submit" value="Iniciar sesion">
      <div class="btnsRegresar">
        <a class="btn_regresar" href="../"><img src="../../imgs/regresar.png"> INICIO</a>
        <a class="btn_regresar2" href="../../paginas/votar.php">VOTAR <img src="../../imgs/regresar.png"></a>
      </div>
    </form>
    
    <script src="particles.js"></script>
    <script src="config_particles.js"></script>
    <script src="btn_form.js"></script>
  </body>
</html>