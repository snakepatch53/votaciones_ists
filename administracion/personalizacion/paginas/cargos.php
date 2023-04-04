<?php
$id = 0;
$nombre = "";
$btn = "Guardar nuevo";
$btnClass = "btn btn-block btn-success";
if(isset($_GET['id'])){  
  $id = $_GET['id'];
  $rs = mysqli_fetch_assoc(conn("CALL sp_cargos_consultaEspecifica($id)"));
  $nombre = $rs['nombre'];
  $btn = "Guardar cambios";
  $btnClass = "btn btn-block btn-primary";
}
?>
 <body>
  <form action="personalizacion/php/guarda_cargo.php?id=<?php echo $id ?>" method="post">
    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre" required>
    <input type="submit" class="<?php echo $btnClass ?>" value="<?php echo $btn ?>">
  </form>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Cargos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $rs = conn("CALL sp_cargos_consulta()");
        while($r = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
          <td><?php echo $r['id_cargo'] ?></td>
          <td><?php echo $r['nombre'] ?></td>
          <td><a class="btn btn-block btn-primary" href="index.php?page=2&id=<?php echo $r['id_cargo'] ?>">Editar</a></td>
          <td><a class="btn btn-block btn-danger" href="personalizacion/php/eliminar.php?page=2&table=cargos&id=<?php echo $r['id_cargo'] ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>