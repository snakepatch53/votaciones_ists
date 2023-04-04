cargarDatos();
function cargarDatos(){
  let id = (window.location+"").split("#")[1];
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      var resultado = innerHTML=conexion.responseText.split("_:_");
      for(let i=0; i<resultado.length-1; i++){
        let subResult = resultado[i].split("-:-");
        let item = '<div id="item">'+
                   '<img src="../administracion/personalizacion/fotos_candidatos/'+subResult[2]+'">'+
                   '<h2 id="nombre">'+subResult[0]+'</h2>' +
                   '<h2 id="cargo">'+subResult[3]+'</h2>' +
                   '<h2 id="cargo">'+subResult[1]+'</h2>' +
                   '</div>';
        document.getElementById('contenedor').innerHTML = document.getElementById('contenedor').innerHTML+item;
      }
    }
  }
  conexion.open("POST","../ajax/php/datosLista.php?id="+id,true);
  conexion.send();
}