var contenedor_resultados = document.getElementById("contenedor_resultados");
var contenedor_timer = document.getElementById("contenedor_timer");

var fecha_max = "";
var mp3 = new Audio(); mp3.src = "../mp3/segundos.mp3";

tiempoVotoConluido();
function tiempoVotoConluido(){
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      let resultado = conexion.responseText;
      if(resultado == 'true'){
        habilitarResultados();
      }else{
        habilitarTimer();
        traerFechaMaxMysql();
      }
    }
  }
  conexion.open("POST","personalizacion/js/php_ajax/tiempoVotoConcluido.php", true);
  conexion.send();
}


function procesoTiming(){
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      let resultado = conexion.responseText;
      if(resultado == '00:00:00'){
        contenedor_timer.innerHTML = "00:00:00";
        recargar(0, 10);
      }else{
        contenedor_timer.innerHTML = resultado;
        setTimeout('procesoTiming()', 1000);
      }
    }
  }
  conexion.open("POST","personalizacion/js/php_ajax/tiempoFaltante.php?fecha="+fecha_max, true);
  conexion.send();
}




function traerFechaMaxMysql(){
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      let resultado = conexion.responseText;
      fecha_max = resultado;
      procesoTiming();
    }
  }
  conexion.open("POST","personalizacion/js/php_ajax/fecha_max.php", true);
  conexion.send();
}

function recargar(desde, hasta){
  if(desde<hasta){
    desde++;
    contenedor_timer.innerHTML = hasta-desde;
    mp3.play();
    setTimeout('recargar('+desde+','+hasta+')', 1000);
  }else{
    location.reload();
  }
}


function habilitarTimer(){
  contenedor_timer.style.display = "block";
  contenedor_resultados.style.display = "none";
}
function habilitarResultados(){
  contenedor_resultados.style.display = "flex";
  contenedor_timer.style.display = "none";
}