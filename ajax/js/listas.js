//cargarListas_();
function cargarListas_(){
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      var resultado = innerHTML=conexion.responseText.split("_:_");
      for(let i=0; i<resultado.length-1; i++){
        let subResult = resultado[i].split("-:-");
        let item = '<li><a onclick="abrirLista('+subResult[0]+')">Lista '+subResult[1]+'</a></li>';
        document.getElementById('listas').innerHTML = document.getElementById('listas').innerHTML+item;
      }
    }
  }
  conexion.open("POST","ajax/php/listas.php",true);
  conexion.send();
}