<body>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Fecha De Votaciones</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">DESDE / HASTA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">FECHA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">CAMBIAR FECHA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">CONTRASEÑA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">CONFIRMAR CONTRASEÑA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">ACCION</th>
        </tr>
        </thead>
        <tbody>
          <?php
          $tbl = "DESDE";
          $rs = conn("SELECT * FROM fecha_max");
          while($r = mysqli_fetch_assoc($rs)){
            $id_fecha = $r['id_fecha_max'];
          ?>
          <tr>
            <form action="personalizacion/php/cambiar_fecha.php" method="post" id="frm<?php echo $id_fecha ?>">
             <input type="hidden" value="<?php echo $id_fecha ?>" name="id_fecha_max">
              <td style="border: solid 1px #31739A;"><b style="color:#31739A;"><?php echo $tbl ?></b></td>
              <td style="border: solid 1px #31739A;"><b style="color:#31739A;"><?php echo $r['fecha'] ?></b></td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="datetime-local" name="fecha" required class="form-control" style="width:100%;" id="fecha<?php echo $id_fecha ?>">
              </td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" id="pass1_<?php echo $id_fecha ?>" placeholder="CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px; border: solid 1px #31739A;">
                <input type="password" id="pass2_<?php echo $id_fecha ?>" placeholder="CONFIRMAR CONTRASEÑA" required class="form-control" style="width:100%;">
              </td>
              <td style="margin:0px;padding:0px;">
                <input type="button" onclick="ejecutar('pass1_<?php echo $id_fecha ?>', 'pass2_<?php echo $id_fecha ?>', 'frm<?php echo $id_fecha ?>', 'fecha<?php echo $id_fecha ?>')" class="btn" style="width:100%; border: solid 1px #31739A;" value="CAMBIAR FECHA"/>
              </td>
            </form>
          </tr>
          <?php $tbl = "HASTA"; } ?>
          
        </tbody>
        <tfoot>
        <tr>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">DESDE / HASTA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">FECHA</th>
          <th style="border: solid 2px #31739A; background: #31739A; color: white;">CAMBIAR FECHA</th>
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
  function ejecutar(pss1, pss2, frm, date){
    let pass = document.getElementById("pass").value;
    let pass1 = document.getElementById(pss1);
    let pass2 = document.getElementById(pss2);
    let fecha = document.getElementById(date);
    if(pass1.value == pass && pass2.value == pass){
      if(fecha.value != ""){
        if(confirm("¿Esta seguro de cambiar la fecha?")){
          document.getElementById(frm).submit();
        }
      }else{
        alert("Debe seleccionar una fecha y hora");
      }
    }else{
      alert("Contraseñas incorrectas");
    }
  }
</script>


















































