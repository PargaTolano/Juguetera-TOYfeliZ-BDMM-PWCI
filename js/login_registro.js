$(document).ready(function(){

    $("#form_login").submit(function(event){
        event.preventDefault();
        $.ajax({
            data: $(this).serialize(),
            type: 'POST',
            url: './controlador/inicioSesion.php',
            success: function(result){
               if (result == "4"){
                    window.location.href = "inicio.php";
                }else{
                    alert(result);
                }                            
            },
            error: function(data){
                alert("Error en el php.");
                console.log(data);
            }
   
        });
        
    });
    $("#form_registro").submit(function(event){
      if (campoVacio() && validarEmail() && validarContraseña() && validarFecha()) {
        $.ajax({
            data: new FormData(this),
            url: './controlador/registro.php',
            type: 'POST',
            cache: false,
            dataType: 'json',
            contentType: false, /*se envia el formato tal cual está*/
            processData: false, /*acepta el formato sea cual sea en el que esté hecho*/
            success: function(result) {
                if (result == "1"){
                    alert("Hay algun campo vacío.");

                }
                else if (result == "2"){
                    alert("El correo ya existe.");

                }
                else if (result == "3"){
                    alert("El usuario ya existe.");

                }
                else if (result == "4"){
                    alert("exito, te registraste en TZ")
                    // window.location.href = "index.php";
                }                                
            }, error: function(data){
                alert(JSON.stringify(data));
                alert("Error en el php" + data);
                console.log(data);
            }
        })
      }
      return false;
    });      
});


function campoVacio (){
    if(!$("#Nombres").val().trim()) {
        alert("Campo de nombres vacío.");
        return false;
    }
    if(!$("#Apellidos").val().trim()) {
        alert("Campo de apellidos vacío.");
        return false;
    }
    if(!$("#Correo").val().trim()) {
        alert("Campo de correo vacío.");
        return false;
    }
    if($("#Usuario").val().trim().length < 3) {
        alert("El usuario debe tener al menos 3 caracteres.");
        return false;
    }
    if(!$("#Contraseña").val().trim()) {
        alert("Campo de contraseña vacío.");
        return false;
    }

    return true;
};

function validarEmail(){
    //obtiene el valor del input de email
    var email=$("#Correo").val();
    //uso de la expresión regular REGEX
    let reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (reg.test(email)){
        return true;
    }
    else{
        alert("Correo no válido.");
        return false;
    }
};

function validarContraseña(){
    //get input password value
    var pass=$("#Contraseña").val();
    //uso de la expresión regular REGEX
    let regpas = /^(?=.*\d)(?=.*[a-z]).*[A-Z].*[&%$#"!/()=]/;

    if (regpas.test(pass)){
      return true;
    }
   else{
     alert("La contraseña debe tener mínimo 8 caracteres, una mayuscula, una minúscula, un número y un símbolo.");
     return false;
   }
};

function validarFecha(){

    var fechaNac = document.getElementById("fechaNacimiento").value;
  
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var fechaHoy = d.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;
  
    if(Date.parse(fechaNac) >= Date.parse(fechaHoy)){
        alert("Fecha no válida.");
        return false;
    }
    else{
        return true;
    }
  };


function sonLetras(Nm, Ap){
    var txt1=$("#Nombres").val();
    var txt2=$("#Apellidos").val();
    let regtxt = /^[a-zA-Z ]+$/;

    if (regtxt.test(txt1)){
      
    }
   else{
    alert("El nombre solo acepta letras.");
    return false;
   }

   if (regtxt.test(txt2)){
    return true;
  }
  else
  {
    alert("El apellido solo acepta letras.");
    return false;
  }
};