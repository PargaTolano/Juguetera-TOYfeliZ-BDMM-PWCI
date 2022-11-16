<?php
include('./templates/header.php');
?>
<section>


<br>
    <div class="container bg-light text-center" style="padding: 30px; height : 100vh;" >
        <h1 class="Titulos"> Mis listas </h1>
        <button type="button" id="Crear_lista" class="btn btn-primary btn-info" data-bs-toggle="modal" data-bs-target="#registroModal" > Crear lista </button>
        <hr>
        <div>
            <ol id="list_container">
                
            </ol>
            <br>
            <hr>
        </div>
    </div>



    <div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" id="form_listas" enctype = "multipart/form-data">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title Titulos" id="exampleModalLabel">Crear lista </h5>
                    </div>
                <div class="modal-body">
                    <input type="text" name="NOMBRE" class="full_input" id="nombreLista" placeholder="Nombre de la lista">
                    <input type="text" name="DESCRIPCION" class="full_input" id="descLista" placeholder="Descripcion">
                    <select id="" class="full_input" name= "privacidad">
                        <option value="Publica"> Publica </option>
                        <option value="Privada"> Privada </option>
                    </select>
                    Subir imagenes: <input type="file" name="imagenes[]" multiple="">
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-warning" data-dismiss="modal"> Cerrar </button>
                        <input type="submit" id="Crear_Lista" class="btn btn-primary btn-info" value="Crear Lista" name="">
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

<?php
include('./templates/footer.php');
?>