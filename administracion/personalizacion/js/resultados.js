//VARIABLES GLOBALES / INICIO
  var tiempo = 10; //Tiempo en segundos..
  //CALCULAR / INICIO
    let aux = tiempo;
    tiempo = tiempo * 1000;
  //CALCULAR / FIN
//VARIABLES GLOBALES / FIN

//OBTENER ELEMENTOS / INICIO
  var elementoVotos = document.querySelectorAll(".valor_votos");

  var elementoPorcentajesV = document.querySelectorAll(".valor_porcentajes");

  var elementoPorcentajesC = document.querySelectorAll(".porcentaje");

  var porcentajesAnimacion = document.querySelectorAll(".porcentajesAnimacion");
//OBTENER ELEMENTOS / FIN
//____________________________________________________________________________________
//LLAMADAS / INICIO
    votos();
    porcentajes();
    mostrarContent_ganador(0, 10);
//LLAMADAS / FIN

//___________________________________  MODO 1  _______________________________________
//____________________________________________________________________________________
//FUNCIONES DE LLAMADA A ANIMACION / INICIO
  function votos(){
    for(let i = 0; i<elementoVotos.length; i++){
      animarVotos(0, elementoVotos[i].innerHTML, i);
    }
  }

  function porcentajes(){
    for(let i = 0; i<elementoPorcentajesV.length; i++){
      animarPorcentajes(0, porcentajesAnimacion[i].innerHTML, i);
    }
  }
//FUNCIONES DE LLAMADA A ANIMACION / FIN
//____________________________________________________________________________________
//FUNCIONES DE ANIMACION / INICIO
  function animarVotos(desde, hasta, posicion){
    desde++;
    elementoVotos[posicion].innerHTML = desde;
    if(desde<hasta){
      setTimeout('animarVotos('+desde+','+hasta+','+posicion+')', calcularTiempo(hasta));
    }
  }

  function animarPorcentajes(desde, hasta, posicion){
    desde++;
    if(desde<hasta){
      elementoPorcentajesV[posicion].innerHTML = desde;
      elementoPorcentajesC[posicion].style.height = desde+"%";
      setTimeout('animarPorcentajes('+desde+','+hasta+','+posicion+')', calcularTiempo(hasta));
    }else{
      elementoPorcentajesV[posicion].innerHTML = porcentajesAnimacion[posicion].innerHTML;
      elementoPorcentajesC[posicion].style.height = porcentajesAnimacion[posicion].innerHTML+"%";
    }
  }
//FUNCIONES DE ANIMACION / FIN
//____________________________________________________________________________________
function calcularTiempo(cantidad){
  return (tiempo/cantidad);
}

//____________________________________________________________________________________




//FUNCIONES EXTRA / INICIO
function ocultar(id){
  document.getElementById(id).style = "display:none;";
}
function mostrarContent_ganador(desde, hasta){
  desde++;
  if(desde<hasta){
    setTimeout('mostrarContent_ganador('+desde+','+hasta+')', calcularTiempo(hasta)+500);
  }else{
    if(document.getElementById("contenedor_resultados").style.display == "flex"){
      document.getElementById("content_ganador").style = "display:flex;";
    }
  }
}
//FUNCIONES EXTRA / FIN




