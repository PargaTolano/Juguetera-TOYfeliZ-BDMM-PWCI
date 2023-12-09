<?php
include('./templates/header.php');
?>

<section>
<br>
    <div class="container bg-light" style="padding: 30px">
      <div class="row">
        <div class="col-12 col-md-6 mb-4">
          <div class="w-100 juguete-img-container">
            <img class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover;" src="images/logo.png" id="icono_product" >
          </div>
        </div>
        <div class="col-12 col-md-6 mb-4">
            <h5 class="Titulos" id = "nombre_vendedor"> Undefined</h5>
            <h1 class="Titulos" id="nombre_product_grande"> Producto </h1>
            <label>Nombre producto: </label> <label id="nombre_product"> </label> <br>
            
            <label > Categorías: </label>
            <span id="categorias_del_juguete">
            </span>
            <br>
            <label> Descripcion: </label> <label id="desc_product"> </label> <br> <br>
            <label> Precio: MXN </label> <label id="precio_product"> </label> <br> <br>
            <label id="Productocotizar" style="font-weight: bold;"></label> <br><br>
            <label> Cantidad disponible: </label> <label id="cantidad_product"> </label><br> <br>
            <label> Valoración promedio: </label>           
  
            <label> ★ </label>
            <label> ★ </label>
            <label> ★ </label>
            <label> ★ </label>
            <label> ★ </label> <label id="valoraciones">  </label>
            <br> <br>
        </div>
          <br><br>
          <span id="imgs_extra"></span> <br><br>
          <div id="videos"></div>
      </div>
    <div  class="text-center">
        <br>
            <button type="button" id="Autorizar" class="btn btn-primmary bg-warning" style="right: 10px;"> Autorizar </button>
            <button type="button" id="Rechazar" class="btn btn-primmary bg-danger" style="right: 10px;"> Rechazar </button>
    </div>
    <hr>

</section>

<div class="container p-0" >
        <footer class="bg-info">
            <div class="text-center py-3">
                <fieldset>
                    <p> Universidad Autonoma de Nuevo Leon</p>
                    <p> Facultad de Ciencias Físico Matemáticas</p>
                    <p> © Issa Valeria Garza Sánchez 1800003</p>
                </fieldset>
            </div>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="./js/inicio.js"></script>
    <script src="./js/productos.js"></script>
    <script src="./js/perfil.js"></script>
    <script src="./js/busqueda.js"></script>
    <script src="./js/autorizar.js"></script>

</body>
</html>