function guardar_cambios(){
  let nombre = document.getElementById("nombre");
  let apellido = document.getElementById("apellido");
  let cedula = document.getElementById("cedula");
  let pass = document.getElementById("pass");
  if(nombre.value != "" && apellido.value != "" && cedula.value != "" && pass.value != ""){
    document.getElementById("form_datos").submit();
  }else{
    alert("LOS CAMPOS NO PUEDEN ESTAR VACIOS");
  }
}