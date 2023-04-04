function validarVoto() {
  let form = document.getElementById("cedula");
  let radio = document.getElementById("cedula");
  let cedula = document.getElementById("cedula");
  let pass1 = document.getElementById("pass1");
  let pass2 = document.getElementById("pass2");
  let mensaje = document.getElementById("mensaje");
  if(isCheck()){
    mensaje.innerHTML = "";
  }else{
    document.getElementById("mensaje").style = "color: #be0000";
    mensaje.innerHTML = "Aun no ha seleccionado una lista";
  }
  if(isLlenosPass(pass1.value, pass2.value)){
    if(isIgualesPass(pass1.value, pass2.value)){
      pass1.style = "border: solid 3px green;";
      pass2.style = "border: solid 3px green;";
    }else{
      pass1.style = "border: solid 3px red;";
      pass2.style = "border: solid 3px red;";
      document.getElementById("mensaje").style = "color: #be0000";
      mensaje.innerHTML = "Las contraseñas no coinciden";
      pass2.focus();
    }
  }else{
    pass1.style = "border: solid 3px red;";
    pass2.style = "border: solid 3px red;";
    document.getElementById("mensaje").style = "color: #be0000";
    mensaje.innerHTML = "Hay campos vacios";
    pass1.focus();
  }
  if(isCedula(cedula.value)){
    cedula.style = "border: solid 3px green;";
  }else{
    cedula.style = "border: solid 3px RED;";
    document.getElementById("mensaje").style = "color: #be0000";
    mensaje.innerHTML = "Numero de cedula no valido";
    cedula.focus();
  }
  //if general
  if(
    isCedula(cedula.value) && 
    isIgualesPass(pass1.value, pass2.value) && 
    isLlenosPass(pass1.value, pass2.value &&
    isCheck()
   )){
    isFechaParaPoderVotar(cedula.value,pass1.value);
  }
}
function mensajeDEmisionDeVoto(){
  document.getElementById("mensaje").innerHTML = "¡VOTO GUARDADO EXITOSAMENTE!";
  document.getElementById("mensaje").style = "color: green";
  document.getElementById("cedula").focus();
}
function mensajeDEcancelacionDeVoto(){
  document.getElementById("mensaje").innerHTML = "¡EL VOTO SE CANCELO A TIEMPO!";
  document.getElementById("mensaje").style = "color: green";
  document.getElementById("cedula").focus();
}
function efectuarVoto(user, pass){
  let id = document.querySelector('input[name="candidatos"]:checked').value;
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      mensajeDEmisionDeVoto();
      actualizarVariableDeSesion(id);
    }
  }
  conexion.open("POST","../ajax/php/guardar_voto.php?user="+user+"&pass="+pass+"&candidatos="+id, true);
  conexion.send();
}

function actualizarVariableDeSesion(id){
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      location.href='votantes.php';
    }
  }
  conexion.open("POST","personalizacion/paginas_votantes/php/actualizar_variables_session.php?id_lista="+id, true);
  conexion.send();
}

function isFechaParaPoderVotar(user, pass){
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      let resultado = conexion.responseText;
      if(resultado == "true"){
        isVotante(user,pass);
      }else{
        document.getElementById("mensaje").style = "color: #be0000";
        document.getElementById("mensaje").innerHTML = "Las votaciones no estan habilitadas";
      }
    }
  }
  conexion.open("POST","../ajax/php/consulta_fechaParaPoderVotar.php?user="+user+"&pass="+pass,true);
  conexion.send();
}
function isVotante(user, pass){
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      let resultado = conexion.responseText;
      if(resultado == "true"){
        yaVoto(user, pass);
      }else{
        document.getElementById("mensaje").style = "color: #be0000";
        document.getElementById("mensaje").innerHTML = "Usted no esta registrado como votante";
      }
    }
  }
  conexion.open("POST","../ajax/php/consultar_datos_votar.php?user="+user+"&pass="+pass,true);
  conexion.send();
}
function yaVoto(user, pass){
  conexion.onreadystatechange=function(){
    if(conexion.readyState==4 && conexion.status==200){
      let resultado = conexion.responseText;
      if(resultado == "true"){
        if(confirm("¿Esta seguro de su elección?")){
          efectuarVoto(user, pass);
        }else{
          mensajeDEcancelacionDeVoto();
        }
      }else{
        document.getElementById("mensaje").style = "color: #be0000";
        document.getElementById("mensaje").innerHTML = "Su voto ya ha sido realizado";
      }
    }
  }
  conexion.open("POST","../ajax/php/consultar_siYaVoto.php?user="+user+"&pass="+pass,true);
  conexion.send();
}
function isCheck(){
  if(!document.querySelector('input[name="candidatos"]:checked')){
    return false;
  }else{
    return true;
  }
}
function isIgualesPass(pass1, pass2){
  if(pass1 == pass2){
    return true;
  }else{
    return false;
  }
}
function isLlenosPass(pass1, pass2){
  if(pass1 != "" && pass2 != ""){
    return true;
  }else{
    return false;
  }
}
function isCedula(cedula){
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