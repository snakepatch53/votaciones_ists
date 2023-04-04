let fullScreen = false;
document.onkeydown = function(e) {
  var evtobj = window.event ? event : e;
  if (evtobj.keyCode == 122 && evtobj.ctrlKey){
    if(fullScreen){
      fullScreen = false;
      document.querySelector("header").style.display = "flex";
      document.querySelector("footer").style.display = "block";
    }else{
      fullScreen = true;
      document.querySelector("header").style.display = "none";
      document.querySelector("footer").style.display = "none";
    }
  }
}
//
//document.onkeydown = function(e) {
//  var evtobj = window.event ? event : e;
//  if (evtobj.keyCode == 122 && evtobj.ctrlKey)
//    alert("[JS] Ctrl + F11 pressed");
//}