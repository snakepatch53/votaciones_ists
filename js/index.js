function abrir_menu_movil(){
  let elements = document.querySelectorAll("header nav");
  for(let i=0; i<elements.length; i++){
    elements[i].style = "left:0;";
  }
  document.querySelector(".img_menu").style.display = "none";
  document.querySelector(".img_salir").style.display = "block";
}
function cerrar_menu_movil(){
  let elements = document.querySelectorAll("header nav");
  for(let i=0; i<elements.length; i++){
    elements[i].style = "left:-101%;";
  }
  document.querySelector(".img_menu").style.display = "block";
  document.querySelector(".img_salir").style.display = "none";
}

window.onscroll = function(){
  if(window.scrollY >= 20){
    document.querySelector("header .img_logo").style = "position:static;width:45px;height:50px;left:0;top:0;";
  }else{
    document.querySelector("header .img_logo").style = "position: absolute;top: 30;left: -26;width: 300px;height: 650%;";
  }
  if(window.scrollY >= 605){
    document.querySelector("header").style = "background: #303032;";
  }else{
    document.querySelector("header").style = "background: rgba(0,0,0,0.0);";
  }
}

window.onresize = function(){
  resizeIframe();
}

function resizeIframe() {
  let obj = document.getElementById("iframe_contenido");
  obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}


function cargar_pagina(ventana){
  document.getElementById("iframe_contenido").src = ""+ventana;
  resizeIframe();
}

function ocultar(id){
  document.getElementById(id).style.display = "none";
}

function remove(id){
  var node = document.getElementById(id);
  node.parentNode.removeChild(node);
}

function src(id, src){
  document.getElementById(id).src = src;
}