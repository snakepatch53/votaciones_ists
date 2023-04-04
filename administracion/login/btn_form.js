function administrador(){
  vaciarAdministrador();
  vaciarCandidato();
  vaciarVotante();
  document.getElementById("form_admin").style="display:block";
  document.getElementById("user1").focus();
  document.getElementById("form_candidato").style="display:none";
  document.getElementById("form_votante").style="display:none";
}
function candidato(){
  vaciarAdministrador();
  vaciarCandidato();
  vaciarVotante();
  document.getElementById("form_candidato").style="display:block";
  document.getElementById("user2").focus();
  document.getElementById("form_admin").style="display:none";
  document.getElementById("form_votante").style="display:none";
}
function votante(){
  vaciarAdministrador();
  vaciarCandidato();
  vaciarVotante();
  document.getElementById("form_votante").style="display:block";
  document.getElementById("user3").focus();
  document.getElementById("form_admin").style="display:none";
  document.getElementById("form_candidato").style="display:none";
}
switch(location.href.split("?")[1]){
  case 'administrador': administrador(); break;
  case 'candidato': candidato(); break;
  case 'votante': votante(); break;
  default: administrador(); break;
}

function enterpressalert(e){
  var code = (e.keyCode ? e.keyCode : e.which);
  if(code == 13) { //Enter keycode
    if(document.getElementById("form_admin").style.display == "block"){
      administrador();
    }
    if(document.getElementById("form_candidato").style.display == "block"){
      candidato();
    }
    if(document.getElementById("form_votante").style.display == "block"){
      votante();
    }
  }
}

function vaciarAdministrador(){
  let user = document.getElementById("user1");
  let pass = document.getElementById("pass1");
}
function vaciarCandidato(){
  let user = document.getElementById("user2");
  let pass = document.getElementById("pass2");
}
function vaciarVotante(){
  let user = document.getElementById("user3");
  let pass = document.getElementById("pass3");
}