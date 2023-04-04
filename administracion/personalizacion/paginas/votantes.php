<?php
$id = 0;
$nombre = "";
$apellido = "";
$curso = "";
$cedula = "";
$pass = "";
$btn = "Guardar nuevo";
$btnClass = "btn btn-block btn-success";
if(isset($_GET['id'])){  
  $id = $_GET['id'];
  $rs = mysqli_fetch_assoc(conn("CALL sp_votantes_consultaEspecifica($id)"));
  $nombre = $rs['nombre'];
  $apellido = $rs['apellido'];
  $curso = $rs['curso'];
  $cedula = $rs['cedula'];
  $pass = $rs['pass'];
  $btn = "Guardar cambios";
  $btnClass = "btn btn-block btn-primary";
}
?>
<link rel="stylesheet" href="personalizacion/css/votantes.css">
 <body>
  <div class="formularios">
    <button onclick="abrirPestaña('formulario');">AGREGAR UN VOTANTE</button>
    <button onclick="abrirPestaña('formulario1');">AGREGAR VARIOS VOTANTES CON ARCHIVO EXCEL .CSV</button>
    <form action="personalizacion/php/guardarCSV.php" method="post" enctype="multipart/form-data" style="display:none;" id="formulario1">
      <input type="number" name="colNombre" placeholder="Numero de columna en el que se encuentran los Nombres" value="5" required class="form-control btn_submit_csv">
      <input type="number" name="colApellido" placeholder="Numero de columna en el que se encuentran los Apellidos" value="5" required class="form-control btn_submit_csv">
      <input type="number" name="colCurso" placeholder="Numero de columna en el que se encuentran los Cursos" value="44" required class="form-control btn_submit_csv">
      <input type="number" name="colCedula" placeholder="Numero de columna en el que se encuentran los numeros de Cedula" value="2" required class="form-control btn_submit_csv">
      <input type="number" name="colPass" placeholder="Numero de columna en el que se encuentran las Contraseñas" value="2" required class="form-control btn_submit_csv">
      <input type="text" name="delimitador" placeholder="Delimitador con el que se separan entre filas" value="," required class="form-control btn_submit_csv">
      <input type="file" name="excel" accept="application/msexcel" required class="form-control btn_submit_csv">
      <input type="submit" value="GUARDAR LISTA DE VOTANTES" class="btn_submit_csv">
    </form>
    
    <form action="personalizacion/php/guarda_votante.php?id=<?php echo $id ?>" method="post" id="formulario">
      <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre" required>
      <input type="text" class="form-control" name="apellido" value="<?php echo $apellido ?>" placeholder="Apellido" required>
      <input type="text" class="form-control" name="curso" value="<?php echo $curso ?>" placeholder="Curso" required>
      <input type="text" class="form-control" name="cedula" value="<?php echo $cedula ?>" placeholder="Cedula" required id="cedula">
      <input type="password" class="form-control" name="pass" value="<?php echo $pass ?>" placeholder="Contraseña" required>
      <input type="submit" onclick="ejecutar_formulario()" class="<?php echo $btnClass ?>" value="<?php echo $btn ?>" id="boton_submit">
    </form>
    
  </div>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Votantes</h3>
      
      <div class="contenedor_reportes_votantes">
        <?php
          $rs = conn("SELECT * FROM votantes GROUP BY curso;");
          while($r = mysqli_fetch_assoc($rs)){
        ?>
        <div class="reportes_votantes">
          <a href="../reportes/votantes.php?curso=<?php echo $r['curso'] ?>" class="btn_reporte_pdf" target="_blank"><img src="../imgs/icon_pdf.png"></a>
          <span><?php echo $r['curso'] ?></span>
        </div>
        <?php } ?>
      </div>
      
    </div>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Curso</th>
          <th>Cedula</th>
          <th>Certificado</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $rs = conn("CALL sp_votantes_consulta()");
        while($r = mysqli_fetch_assoc($rs)){
          $background = 'rgba(45, 169, 222, 0.36)';
          $certificado_link = '#';
          $certificado_disabled = 'disabled';
          $certificado_target = '';
          if($r['id_lista'] != null or $r['id_lista'] != ""){
            $background = 'rgba(45, 169, 222, 0.83)';
            $certificado_link = '../reportes/certificado.php?id='.$r['id_votante'].'';
            $certificado_disabled = '';
            $certificado_target = '_blank';
          }
        ?>
        <tr style="background: <?php echo $background ?>;">
          <td><?php echo $r['id_votante'] ?></td>
          <td><?php echo $r['nombre'] ?></td>
          <td><?php echo $r['apellido'] ?></td>
          <td><?php echo $r['curso'] ?></td>
          <td><?php echo $r['cedula'] ?></td>
          <td><a target="<?php echo $certificado_target ?>" class="btn btn-block btn-success" href="<?php echo $certificado_link ?>" <?php echo $certificado_disabled ?> >Certificado</a></td>
          <td><a class="btn btn-block btn-primary" href="index.php?page=4&id=<?php echo $r['id_votante'] ?>">Editar</a></td>
          <td><a class="btn btn-block btn-danger" href="personalizacion/php/eliminar.php?page=4&table=votantes&id=<?php echo $r['id_votante'] ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Curso</th>
          <th>Cedula</th>
          <th>Certificado</th>
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
  function abrirPestaña(id){
    document.getElementById("formulario").style = "display:none;";
    document.getElementById("formulario1").style = "display:none;";
    document.getElementById(id).style = "display:block;";
  }
</script>
<style>
  .formularios{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }
  .formularios button:nth-child(1){
    border-top-left-radius: 5px;
  }
  .formularios button:nth-child(2){
    border-top-right-radius: 5px;
  }
  .formularios button:nth-child(1):hover{
    box-shadow: -700px 0px 0px 0px #31739A inset;
    color: white;
  }
  .formularios button:nth-child(2):hover{
    box-shadow: 700px 0px 0px 0px #31739A inset;
    color: white;
  }
  .formularios button,
  .formularios form .btn_submit_csv{
    width: 50%;
    border-style: none;
    padding: 10px;
    background: rgba(0,0,0,0);
    font-family: sans-serif;
    font-weight: bold;
    font-size: 15px;
    border: solid 1px #31739A;
    box-shadow: 0px 0px 0px 0px white inset;
    transition: all 0.5s ease;
  }
  .formularios form .btn_submit_csv,
  .formularios form input[type='file']:before{
    width: 100%;
  }
  .formularios form .btn_submit_csv:hover,
  .formularios form input[type='file']:hover:before{
    box-shadow: 0px -80px 0px 0px #31739A inset;
    color: white;
  }
  .formularios form{
    width: 100%;
    border: solid 2px #31739A;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
  }
  .formularios form input[type='file']{
    position: relative;
  }
  .formularios form input[type='file']:before{
    position: absolute;
    content: 'Seleccione un archivo EXCEL con extension .CSV';
    width: 100%;
    height: 100%;
    background: white;
    color: black;
    padding-left: 10px;
    font-family: sans-serif;
    font-size: 13px;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    transition: all 0.5s ease;
  }
</style>