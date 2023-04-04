<?php
$id = 0;
$nombre = "";
$apellido = "";
$cedula = "";
$curso = "";
$id_cargo = "";
$cargo = "Cargo";
$id_lista = "";
$lista = "Lista";
$btn = "Guardar nuevo";
$btnClass = "btn btn-block btn-success";
if(isset($_GET['id'])){  
  $id = $_GET['id'];
  $rs = mysqli_fetch_assoc(conn("CALL sp_candidatos_consultaEspecifica($id)"));
  $nombre = $rs['nombre'];
  $apellido = $rs['apellido'];
  $cedula = $rs['cedula'];
  $curso = $rs['curso'];
  $id_cargo = $rs['id_cargo'];
  $cargo = $rs['cargo'];
  $id_lista = $rs['id_lista'];
  $lista = $rs['lista'];
  $btn = "Guardar cambios";
  $btnClass = "btn btn-block btn-primary";
}
?>
 <body>
  <form action="personalizacion/php/guarda_candidato.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" id="formulario">
    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre" required>
    <input type="text" class="form-control" name="apellido" value="<?php echo $apellido ?>" placeholder="Apellido" required>
    <input type="text" class="form-control" name="cedula" value="<?php echo $cedula ?>" placeholder="Cedula" required id="cedula">
    <input type="text" class="form-control" name="curso" value="<?php echo $curso ?>" placeholder="Curso" required>
    <input type="file" class="form-control" name="foto" accept="image/x-png, image/jpeg" required>
    <select name="cargo" class="form-control" required>
      <option value="<?php echo $id_cargo ?>"><?php echo $cargo  ?></option>
      <?php
      $rs = conn("CALL sp_cargos_consulta()");
      while($r = mysqli_fetch_assoc($rs)){
      ?>
      <option value="<?php echo $r['id_cargo'] ?>"><?php echo $r['nombre'] ?></option>
      <?php } ?>
    </select>
    <select name="lista" class="form-control" required>
      <option value="<?php echo $id_lista ?>"><?php echo $lista  ?></option>
      <?php
      $rs = conn("CALL sp_listas_consulta()");
      while($r = mysqli_fetch_assoc($rs)){
      ?>
      <option value="<?php echo $r['id_lista'] ?>"><?php echo $r['letra'].' / '.$r['nombre'] ?></option>
      <?php } ?>
    </select>
    <input type="submit" onclick="ejecutar_formulario()" class="<?php echo $btnClass ?>" value="<?php echo $btn ?>" id="boton_submit">
  </form>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Candidatos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Cedula</th>
          <th>Curso</th>
          <th>Foto</th>
          <th>Cargo</th>
          <th>Lista</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $rs = conn("CALL sp_candidatos_consulta()");
        while($r = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
          <td><?php echo $r['id_candidato'] ?></td>
          <td><?php echo $r['nombre'] ?></td>
          <td><?php echo $r['apellido'] ?></td>
          <td><?php echo $r['cedula'] ?></td>
          <td><?php echo $r['curso'] ?></td>
          <td><img src="<?php echo 'personalizacion/fotos_candidatos/'.$r['foto'] ?>" style="width:40px;height:40px;"></td>
          <td><?php echo $r['cargo'] ?></td>
          <td><?php echo $r['lista'] ?></td>
          <td><a class="btn btn-block btn-primary" href="index.php?page=3&id=<?php echo $r['id_candidato'] ?>">Editar</a></td>
          <td><a class="btn btn-block btn-danger" href="personalizacion/php/eliminar.php?page=3&table=candidatos&id=<?php echo $r['id_candidato'] ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Cedula</th>
          <th>Curso</th>
          <th>Foto</th>
          <th>Cargo</th>
          <th>Lista</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>
<script type="text/javascript">
  function ejecutar_formulario(){
    if(isCedula()){
      document.getElementById("boton_submit").click;
    }else{
      alert("El numero de cedula no es valido..");
    }
  }
  function isCedula(){
    let cedula = document.getElementById("cedula").value;
      if(cedula.length==10){
        cedula = cedula.split("");
        let suma = 0, num = 0, i=0;
        for(i=0; i<cedula.length; i++){
          num = parseInt(cedula[i]);
          if((i+1)%2==0){
            suma += parseInt(num);
          }else{
            if((num*2)>9){
              suma += parseInt((num*2)-9);
            }else{
              suma += parseInt(num*2);
            }
          }
        }
        suma + parseInt(suma+cedula[i]);
        if(suma%10==0){
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
  }
</script>