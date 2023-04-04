<?php
require_once 'mpdf/mpdf.php';
require_once '../administracion/personalizacion/php/mysql.php';
$mpdf = new mPDF('utf-8', 'Letter', 0, '', 0, 0, 0, 0, 0, 0);
$id_lista = mysqli_fetch_assoc(conn("SELECT id_lista, COUNT(id_lista) as contando FROM votantes GROUP BY id_lista ORDER BY contando DESC LIMIT 1;"))['id_lista'];
$r = mysqli_fetch_assoc(conn("SELECT * FROM listas WHERE id_lista = $id_lista;"));
$html .= '
  <html>
    <head>
      <title>RESULTADOS</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../css/pdf_lista_ganadores.css">
    </head>
    <body>
      <div class="ganador">
        <div class="header_ganador">LISTA '.$r['letra'].' - '.$r['nombre'].'</div>
        <div class="candidatos">
';
        $rsC = conn("SELECT 
          candidatos.foto AS foto, 
          candidatos.nombre AS nombre, 
          cargos.nombre AS cargo 
          FROM candidatos 
          INNER JOIN cargos ON candidatos.id_cargo = cargos.id_cargo 
          WHERE candidatos.id_lista = $id_lista");
        while($rC = mysqli_fetch_assoc($rsC)){
$html .= '
          <div class="candidatos_item">
            <img src="../administracion/personalizacion/fotos_candidatos/'.$rC['foto'].'">
            <h3>'.$rC['nombre'].'</h3><h4>'.$rC['cargo'].'</h4>
          </div>
';
          }
$html .= '
        </div>
        <div class="votos">
';
        $rsV = conn("SELECT COUNT(*) AS votos, curso FROM votantes WHERE id_lista = $id_lista GROUP BY curso;");
        $total_votos = 0;
        while($rV = mysqli_fetch_assoc($rsV)){
        $total_votos += $rV['votos'];
$html .= '
          <div class="item_votos">
            <h3>'.$rV['curso'].'</h3>
            <h1>'.$rV['votos'].'</h1>
          </div>
';
        }
$html .= '
          <div class="item_votos">
            <h3>TOTAL</h3>
            <h1>'.$total_votos.'</h1>
          </div>
        </div>
        <div class="footer_ganador"><div class="titulo">'.$r['frase'].'</div></div>
      </div>
    </body>
  </html>
';
$mpdf->WriteHTML($html);
$mpdf->Output();
?>