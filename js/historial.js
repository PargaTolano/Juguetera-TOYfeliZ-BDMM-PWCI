$(document).ready(function(){
    $("#buscar_Compras").click(function(){
        $.ajax({
            data: {fecha1: $('#desde').val(), fecha2: $('#hasta').val(), action: 'HistorialCliente'},
            type: "GET",
            url: './controlador/consultas.php',
            async: false,
            success: function(result){
                alert(result);
                $("#pedidos").empty();

                var data = JSON.parse(result);
                for (let i = 0; i < data.length;i++){
                    $("#pedidos").append('<span> <b> Fecha: </b></span> <span> '+ data[i].fechaCOMPRA + '</span> <br> <br>  <div class="row"> <div class="col-3"> <span> ' + data[i].nombre + ' </span> </div> <div class="col-3"> <div class="row"> <div class="col-6"> <span> '+ data[i].cantidadCompradaVendida + ' </span></div> <div class="col-6"> <span> ' + data[i].precioFinalProducto + ' </span>  </div> </div> </div> <div class="col-3"> <span> '+ data[i].categoria +' </span> </div> <div class="col-3"> <span> '+ data[i].calificación +' </span> </div> </div>');
                }
            },
            error: function(result){
                console.log("La solicitud regreso con un error: " + result);
            }  
        });
    });
    $("#buscar_Ventas").click(function(){
        $.ajax({
            data: {fecha1: $('#desde_2').val(), fecha2: $('#hasta_2').val(), action: 'HistorialVendedor'},
            type: "GET",
            url: './controlador/consultas.php',
            async: false,
            success: function(result){
                alert(result);
                    $("#ventas_historia").empty();

                var data = JSON.parse(result);
                for (let i = 0; i < data.length;i++){

                    $("#ventas_historia").append(' <span> <b> Fecha: </b></span> <span> ' + data[i].fechaCOMPRA +' </span><div class="container"><div class="row"><div class="col-3"><span> Producto: </span> </div><div class="col-3"><div class="row"><div class="col-6"><span> Existencia: </span></div><div class="col-6"><span> Precio: </span></div></div></div><div class="col-3"><span> Categoría: </span></div><div class="col-3"><span> Calificacion recibida: </span></div></div></div> <div class="row"> <div class="col-3"> <span> '+ data[i].nombre +' </span> </div> <div class="col-3"><div class="row"><div class="col-6"><span> '+ data[i].cantidad +' </span> </div> <div class="col-6"> <span> MXN '+data[i].precioFinalProducto  +'</span> </div></div></div><div class="col-3"><span> '+data[i].categoria  +'</span> </div><div class="col-3"><span> ' + data[i].calificación +' </span> </div> </div>');
                }
            },
            error: function(result){
                console.log("La solicitud regreso con un error: " + result);
            }  
        });
    });
});
