window.addEventListener("load", function() {
    miformulario.unidadDM.addEventListener("keypress", soloNumeros, false);
  });
  
  //Solo permite introducir numeros.
  function soloNumeros(x){
    var key = window.event ? x.which : x.keyCode;
    if (key < 46 || key > 57) {
      x.preventDefault();
    }
  }