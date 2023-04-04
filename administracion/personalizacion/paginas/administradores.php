<?php
$id = 0;
$nombre = "";
$cedula = "";
$pass = "";
$btn = "Guardar nuevo";
$btnClass = "btn btn-block btn-success";
if(isset($_GET['id'])){  
  $id = $_GET['id'];
  $rs = mysqli_fetch_assoc(conn("CALL sp_administradores_consultaEspecifica($id)"));
  $nombre = $rs['nombre'];
  $cedula = $rs['cedula'];
  $pass = $rs['pass'];
  $btn = "Guardar cambios";
  $btnClass = "btn btn-block btn-primary";
}
?>
 <body>
  <form action="personalizacion/php/guarda_administrador.php?id=<?php echo $id ?>" method="post" id="formulario">
    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre" required>
    <input type="text" class="form-control" name="cedula" value="<?php echo $cedula ?>" placeholder="Cedula" required id="cedula">
    <input type="password" class="form-control" name="pass" value="<?php echo $pass ?>" placeholder="Contraseña" required>
    <input type="submit" class="<?php echo $btnClass ?>" value="<?php echo $btn ?>" id="boton_submit">
  </form>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Administradores</h3>
    </div>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Cedula</th>
          <th>Contraseña</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $rs = conn("CALL sp_administradores_consulta()");
        while($r = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
          <td><?php echo $r['id_administrador'] ?></td>
          <td><?php echo $r['nombre'] ?></td>
          <td><?php echo $r['cedula'] ?></td>
          <td><?php echo $r['pass'] ?></td>
          <td><a class="btn btn-block btn-primary" href="index.php?page=5&id=<?php echo $r['id_administrador'] ?>">Editar</a></td>
          <td><a class="btn btn-block btn-danger" href="personalizacion/php/eliminar.php?page=5&table=administradores&id=<?php echo $r['id_administrador'] ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Cedula</th>
          <th>Contraseña</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>