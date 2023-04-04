<?php
session_start();
if(isset($_SESSION['id_candidato'])){
include 'personalizacion/php/mysql.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administracion Votaciones</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="../imgs/logo.png">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b>IS</b>TS</span>
        <span class="logo-lg"><b>INSTITUTO</b> SUCUA</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../administracion/personalizacion/fotos_candidatos/<?php echo $_SESSION['foto'] ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido'] ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="../administracion/personalizacion/fotos_candidatos/<?php echo $_SESSION['foto'] ?>" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $_SESSION['cargo_nombre'] ?>
                  </p>
                  <a href="login/logout.php" style="background:white;">Cerrar sesion</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../administracion/personalizacion/fotos_candidatos/<?php echo $_SESSION['foto'] ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nombre'] ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
          <li>
            <a href="candidatos.php?page=0">
              <i class="fa fa-home"></i>
              <span>Inicio</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li>
            <a href="candidatos.php?page=1">
              <i class="fa fa-user"></i>
              <span>Perfil</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      <section class="content" style="padding:0;">
        <?php
        $path = "personalizacion/paginas_candidato/";
        if(isset($_GET['page'])){
          switch($_GET['page']){
            case 0: include $path.'inicio.php'; break;
            case 1: include $path.'perfil.php'; break;
          }
        }else{
          include $path.'inicio.php';
        }
        ?>
      </section>
    </div>
    <footer class="main-footer">
      <strong>
        Copyright &copy; 2019 
        <a ref="https://www.facebook.com/Programarte-453395385426480/?modal=admin_todo_tour" target="_blank">Programarte</a>.
      </strong> 
      Todos los derechos reservados.
    </footer>
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script>$.widget.bridge('uibutton', $.ui.button);</script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/raphael/raphael.min.js"></script>
  <script src="bower_components/morris.js/morris.min.js"></script>
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>
  
  <script src="personalizacion/js/dashboard.js"></script>
  
</body>
</html>
<?php }else{ header('location: ../'); } ?>