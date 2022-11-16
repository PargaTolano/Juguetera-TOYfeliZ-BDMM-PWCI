
const valores = window.location.search;
const urlParams= new URLSearchParams(valores);
var ID_LISTA = urlParams.get("lista");

$.ajax({
    data: {ID_LISTA: ID_LISTA, action: 'getlistaINFO'},
    type: "POST",
    url: './controlador/listas.php',
    async: false,
    success: function(result){
        var data = JSON.parse(result);
        console.log(data);
        $("#nombre_lista").html(data['list'][0].nombre);
        $("#fecha_lista").html(data['list'][0].fechaCreacion);
        $("#desc_list").html(data['list'][0].descripcion);
        $("#Nombre_creador").html(data['list'][0].propietario);
        for (let i = 0; i < data['imgs'].length;i++){
            $("#imagenes").append('<img src="'+ data['imgs'][i].ruta +'" alt=""  width = 200px height = 200px>');
        }
        for (let i = 0; i < data['productos'].length;i++){
            $("#deseos").append('<img src="'+ data['productos'][i].icono +'" alt=""  width = 150px height = 150px> <p> '+ data['productos'][i].nombre +' </p> <button type="button" id="retirarDeLista" class="btn btn-primary btn-info"> Quitar </button> <button type="button" id="Ver' + data['productos'][i].ID_PRODUCTO +'" value="'+  data['productos'][i].ID_PRODUCTO + '" class="btn btn-primmary bg-warning VER" style="right: 10px;"> Ver </button>  <hr>');
        }
       
    },
    error: function(result){
        console.log("La solicitud regreso con un error: " + result);
    }  
});

$(document).ready(function(){
   
});