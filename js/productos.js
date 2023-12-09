const valores = window.location.search;

const urlParams = new URLSearchParams(valores);
const ID_PRODUCTO = urlParams.get("ID_PRODUCTO");

cargarinfo();
function cargarinfo(){

    $.ajax({
        data: {action: 'getJuguete', ID_PRODUCTO},
        type: "POST",
        url: './controlador/juguetes.php',
        async: false,
        success: function(result){
          try {
            const data = JSON.parse(result);
            const [jug] = data['jug'];

            $("#valoraciones").html(jug.valoracion);
            $("#nombre_vendedor").html(jug.vendedor);
            $("#nombre_product_grande").html(jug.nombre);
            $("#nombre_product").html(jug.nombre);
            $("#desc_product").html(jug.descripcion);
            $("#cantidad_product").html(jug.cantidad);
            $("#precio_product").html(jug.precio);
            if (jug.tipoVenta == "Cotizar"){
                $("#Productocotizar").html(jug.tipoVenta);
                if (jug.cantidad > 0){
                    $("#botones").append('<button type="button" id="aCarrito" class="btn btn-primary btn-info" data-bs-toggle="modal" data-bs-target="#cotModal"> Agregar al carrito </button> ' );
                    $("#acomprar").attr("max", jug.cantidad );
                }
            }
            else{
                $("#Productocotizar").html("Venta");
                
                if (jug.cantidad > 0){
                    $("#botones").append(`
                      <button 
                        type="button" 
                        id="aCarrito" 
                        class="btn btn-primary btn-info" 
                        data-bs-toggle="modal" 
                        data-bs-target="#añadirCarrModal"
                      > 
                        Agregar al carrito 
                      </button>
                    `);
                    $("#acomprar").attr("max", jug.cantidad );
                }

            }
            $("#icono_product").attr("src",jug.icono);

            for (const juguete of data['jug']) {
                $("#categorias_del_juguete").append(`<label><a href="">${juguete.categorias}</a></label>`);
            }
            for (const img of data['imgs']) {
              $("#imgs_extra").append(`
                <img 
                  style="object-fit: cover;" 
                  src="${img.imagen}" 
                  alt="" 
                  width="170px" height="170px"
                >`);
            }
            for (const vid of data['vids']){
                $("#videos").append(`
                  <video
                    style="width: 100%";
                    controls="controls"
                    src="${vid.video}"
                  >
                  </video>`
                );
            }            
            for (const comment of data['coment']) {
              $('#comentarios')
                .append(`<label> Calificacion: </label>${
                  '<label> ★ </label'.repeat(parseInt(comment.calificación))
                }`)
                .append(`
                  <img src="${comment.foto}" width="40px"> 
                  <label>${comment.usuario}</label><br>
                  <label> Enviado el </label> <label>${comment.fechaCreacion}</label><br>
                  <p>${comment.descripcionc}</p><br>` 
                ); 
            }
          } catch {
            console.log(result);
          }
        },
        error: function(result){
            console.log("La solicitud regreso con un error: " + result);
        }  
    });
    
    
}

function recargarcomentarios(){

    $.ajax({
        data: {action: 'getJuguete', ID_PRODUCTO},
        type: "POST",
        url: './controlador/juguetes.php',
        async: false,
        success: function(result){
          try {
            const data = JSON.parse(result);

            $("#valoraciones").html(data['jug'][0].valoracion);
            
            for (const comment of data['coment']) {
              $('#comentarios')
                .append(`<label> Calificacion: </label>${
                  '<label> ★ </label'.repeat(parseInt(comment.calificación))
                }`)
                .append(`
                  <img src="${comment.foto}" width="40px"> 
                  <label>${comment.usuario}</label><br>
                  <label> Enviado el </label> <label>${comment.fechaCreacion}</label><br>
                  <p>${comment.descripcionc}</p><br>` 
                ); 
            }
          } catch {
            console.log(result);
          }
        },
        error: function(result){
            console.log("La solicitud regreso con un error: " + result);
        }  
    });
    
    
}

$(document).ready(function(){  
    $("#aLista").click(function(){
            $.ajax({
                type: "POST",
                url: './controlador/listas.php',
                data: {action: 'setTOlist', ID_PRODUCTO, ID_LISTA:  $("#listasdisp").val()}, 
                success: function(result) {
                    alert(result);
                }, error: function(result){
                    alert("Error en el php" + result);
                }
            })
    });

    $("#quitarTodo").click(function(){
        $.ajax({
            type: "POST",
            url: './controlador/carrito.php',
            data: { action: 'vaciar'}, 
            success: function(result) {
                alert(result);
            }, error: function(result){
                alert("Error en el php" + result);
            }
        })
    });

    $("#AñadirAlCarrito").click(function(){
        $.ajax({
            type: "POST",
            url: './controlador/carrito.php',
            data: {ID_PRODUCTO, cantidad:  $("#acomprar").val(), action: 'agregarproducto'}, 
            success: function(result) {
                alert(result);
            }, error: function(result){
                alert("Error en el php" + result.responseText);
            }
        })
    });

    $("#EditarJuguete").click(function(){
        window.location.href = "editar_info_producto.php?ID_PRODUCTO"+ $(this).val() ;
    });
    
    $("#coment_form").submit(function(event){
        event.preventDefault();
        
        $.ajax({
            type: "POST",
            url: './controlador/juguetes.php',
            data: {action: 'setComent', ID_PRODUCTO, comentario: $("#comentario").val().trim(), estrellas: $("input:radio[name=estrellas]:checked").val() }, 
            success: function(result) {
                if (result == '1'){
                    alert('Ya calificaste este producto antes..');
                }
                else if (result = 3){
                   alert( "Llena todos los campos.");

                }
                else{
                    $("#comentarios").empty();
                    recargarcomentarios();
                }


            }, error: function(result){
                alert("Error en el php" + result);
            }
        })
    });

    $("#form_registro_producto").submit(function(event){
        event.preventDefault();
        
        $.ajax({
            type: "POST",
            url: './controlador/juguetes.php',
            data: new FormData(this),
            contentType: false, 
            processData: false, 
            success: function(result) {
                console.log(result);
                if (result == "Producto enviado a revision."){
                    window.location.href = "inicio.php";
                }
            }, error: function(result){
                alert("Error en el php" + result);
            }
        })
    });

});
