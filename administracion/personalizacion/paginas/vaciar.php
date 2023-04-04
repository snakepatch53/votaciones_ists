<body>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tablas</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">TABLA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">CONTRASEÑA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">CONFIRMAR CONTRASEÑA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">ACCION</th>
        </tr>
        </thead>
        <tbody>
         
          <tr>
            <form action="personalizacion/php/vaciar_tabla.php" method="post" id="frm1">
             <input type="hidden" value="listas" name="tabla">
              <td style="border: solid 1px #31739A;"><b style="color:#31739A;">LISTAS</b></td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass1" id="pass1_1" placeholder="CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass2" id="pass2_1" placeholder="CONFIRMAR CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px; ">
                <input type="button" onclick="ejecutar('pass1_1', 'pass2_1', 'frm1')" class="btn" style="width:100%; border: solid 1px #31739A;" value="VACIAR TABLA"/>
              </td>
            </form>
          </tr>
           
          <tr>
            <form action="personalizacion/php/vaciar_tabla.php" method="post" id="frm2">
             <input type="hidden" value="cargos" name="tabla">
              <td style="border: solid 1px #31739A;"><b style="color:#31739A;">CARGOS</b></td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass1" id="pass1_2" placeholder="CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass2" id="pass2_2" placeholder="CONFIRMAR CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px;">
                <input type="button" onclick="ejecutar('pass1_2', 'pass2_2', 'frm2')" class="btn" style="width:100%; border: solid 1px #31739A;" value="VACIAR TABLA"/>
              </td>
            </form>
          </tr>
           
          <tr>
            <form action="personalizacion/php/vaciar_tabla.php" method="post" id="frm3">
             <input type="hidden" value="candidatos" name="tabla">
              <td style="border: solid 1px #31739A;"><b style="color:#31739A;">CANDIDATOS</b></td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass1" id="pass1_3" placeholder="CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass2" id="pass2_3" placeholder="CONFIRMAR CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px;">
                <input type="button" onclick="ejecutar('pass1_3', 'pass2_3', 'frm3')" class="btn" style="width:100%; border: solid 1px #31739A;" value="VACIAR TABLA"/>
              </td>
            </form>
          </tr>
           
          <tr>
            <form action="personalizacion/php/vaciar_tabla.php" method="post" id="frm4">
             <input type="hidden" value="votantes" name="tabla">
              <td style="border: solid 1px #31739A;"><b style="color:#31739A;">VOTANTES</b></td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass1" id="pass1_4" placeholder="CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass2" id="pass2_4" placeholder="CONFIRMAR CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px;">
                <input type="button" onclick="ejecutar('pass1_4', 'pass2_4', 'frm4')" class="btn" style="width:100%; border: solid 1px #31739A;" value="VACIAR TABLA"/>
              </td>
            </form>
          </tr>
           
          <tr>
            <form action="personalizacion/php/vaciar_tabla.php" method="post" id="frm5">
             <input type="hidden" value="administradores" name="tabla">
              <td style="border: solid 1px #31739A; border: solid 1px #31739A;"><b style="color:#31739A;">ADMINISTRADORES</b></td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass1" id="pass1_5" placeholder="CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" name="pass2" id="pass2_5" placeholder="CONFIRMAR CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px;">
                <input type="button" onclick="ejecutar('pass1_5', 'pass2_5', 'frm5')" class="btn" style="width:100%; border: solid 1px #31739A;" value="VACIAR TABLA"/>
              </td>
            </form>
          </tr>
          
        </tbody>
        <tfoot>
        <tr>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">TABLA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">CONTRASEÑA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">CONFIRMAR CONTRASEÑA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">ACCION</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>
<input type="hidden" value="<?php echo $_SESSION['pass'] ?>" id="pass" />
<style>
  .btn{
    background: #E08E0B;
    color: white;
    box-shadow: 0px 0px 0px 0px #E08E0B inset,
                0px 0px 0px 0px #E08E0B inset;
    transition: all 0.4s ease;
  }
  .btn:hover{
    box-shadow: 140px 0px 0px 0px #ba7609 inset,
                -140px 0px 0px 0px #ba7609 inset;
  }
</style>
<script>
  function ejecutar(pss1, pss2, frm){
    let pass = document.getElementById("pass").value;
    let pass1 = document.getElementById(pss1);
    let pass2 = document.getElementById(pss2);
    if(pass1.value == pass && pass2.value == pass){
      if(confirm("¿Esta seguro de borrar todos los registros de esta tabla?")){
        document.getElementById(frm).submit();
      }
    }else{
      alert("Contraseñas incorrectas");
    }
  }
</script>


















































