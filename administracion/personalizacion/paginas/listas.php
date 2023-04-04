<?php
$id = 0;
$letra = "";
$frase = "";
$nombre = "";
$btn = "Guardar nuevo";
$btnClass = "btn btn-block btn-success";
if(isset($_GET['id'])){  
  $id = $_GET['id'];
  $rs = mysqli_fetch_assoc(conn("CALL sp_listas_consultaEspecifica($id)"));
  $letra = $rs['letra'];
  $frase = $rs['frase'];
  $nombre = $rs['nombre'];
  $btn = "Guardar cambios";
  $btnClass = "btn btn-block btn-primary";
}
?>
 <body>
  <form action="personalizacion/php/guarda_lista.php?id=<?php echo $id ?>" method="post">
    <input type="text" class="form-control" name="letra" value="<?php echo $letra ?>" placeholder="Letra" required>
    <input type="text" class="form-control" name="frase" value="<?php echo $frase ?>" placeholder="Frase" required>
    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre" required>
    <input type="submit" class="<?php echo $btnClass ?>" value="<?php echo $btn ?>">
  </form>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Listas</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Letra</th>
          <th>Frase</th>
          <th>Nombre</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $rs = conn("CALL sp_listas_consulta()");
        while($r = mysqli_fetch_assoc($rs)){
        ?>
        <tr>
          <td><?php echo $r['id_lista'] ?></td>
          <td><?php echo $r['letra'] ?></td>
          <td><?php echo $r['frase'] ?></td>
          <td><?php echo $r['nombre'] ?></td>
          <td><a class="btn btn-block btn-primary" href="index.php?page=1&id=<?php echo $r['id_lista'] ?>">Editar</a></td>
          <td><a class="btn btn-block btn-danger" href="personalizacion/php/eliminar.php?page=1&table=listas&id=<?php echo $r['id_lista'] ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
          <th>ID</th>
          <th>Letra</th>
          <th>Frase</th>
          <th>Nombre</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>