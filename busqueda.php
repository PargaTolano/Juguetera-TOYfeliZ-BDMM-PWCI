<?php
include('./templates/header.php');
?>

<section>
<br>
    <div class="container bg-light text-center" style="padding: 30px">
        <div>
            <h1 class="Titulos" > Resultados de búsqueda </h1>
            <h3 class="Titulos"> Usuarios </h3>
            <div id="lista_usuarios">
            </div>
        </div>
        <hr>
        <h3 class="Titulos"> Juguetes </h3>

        <p> Filtro de busqueda </p>
        <p> Ordenar por: </p>
        <select name="" id="Combo">
            <option value="Menor"> Menor precio </option>
            <option value="Mayor"> Mayor precio </option>
        </select>
        <button type="button" id="Ordenar" class="btn btn-primary btn-info"> Ordenar </button>

        <div class="Buscadas">
          
        </div>
        
   


</section>

<div class="container" >
        <FOOTer class="bg-info">
            <div class="text-center py-3">
                <fieldset>
                    <p> Universidad Autonoma de Nuevo Leon</p>
                    <p> Facultad de Ciencias Físico Matemáticas</p>
                    <p> © Blanca Elizabeth Delgadillo Trujillo 1986178</p>
                </fieldset>
            </div>
        </FOOTer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="./js/inicio.js"></script>
    <script src="./js/perfil.js"></script>
    <script src="./js/carrito.js"></script>
    <script src="./js/busqueda.js"></script>


</body>
</html>